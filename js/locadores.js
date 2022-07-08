function editar(IdLocadores) {
    let destino = document.URL + '/getUserData';
	$.ajax({
		type: "POST",
		url: destino,
		data: {
			"IdLocadores": IdLocadores,
		},
		error: function(error){
			alert('Houve um erro na requisição. Entre em contato com o administrador.');
			console.log(error);
		},
		success: function(data){
			var json = $.parseJSON(data);
			if (json.mensagem == "OK") {
				$("#IdLocadores").val(IdLocadores);
				$("#editNome").val(json.NomeLocadores);
				$("#editEmail").val(json.EmailLocadores);
				$("#editTelefone").val(json.TelefoneLocadores);
				openModal('modalEdit');
			} else {
				alert(json.mensagem);
			}
		}
	});
};

function adicionar() {
	openModal('modalAdd');
};

function deletar(IdLocadores) {
    let destino = document.URL + '/deleteUserData';
    if (confirm ("Tem certeza que quer deletar o locador? Isso irá apagar todos os imóveis do mesmo.") == true) {
        $.ajax({
            type: "POST",
            url: destino,
            data: {
                "IdLocadores": IdLocadores,
            },
            error: function(error){
                alert('Houve um erro na requisição. Entre em contato com o administrador.');
                console.log(error);
            },
            success: function(data){
                var json = $.parseJSON(data);
                if (json.mensagem == "OK") {
                    $('table#table tbody tr#' + IdLocadores).remove();
                    alert('Usuário deletado com sucesso');
                } else {
                    alert(json.mensagem);
                }
            }
        });
    }
};

$(document).ready(function(){

	$("#formEditUser").submit(function(e) {
		e.preventDefault();
		var IdLocadores = $("#IdLocadores").val();
		var EmailLocadores = $("#editEmail").val();
		var NomeLocadores = $("#editNome").val();
		var TelefoneLocadores = $("#editTelefone").val();
		$.ajax({
			type: "POST",
			url: $("#formEditUser").attr("action"),
			data: {
				"EmailLocadores": EmailLocadores,
				"NomeLocadores": NomeLocadores,
				"TelefoneLocadores": TelefoneLocadores,
				"IdLocadores": IdLocadores
			},
			error: function(error){
				bootstrap_alert('Houve um erro. Por favor tente mais tarde.', 'danger', 'alertaEdit');
				console.log(error);
			},
			success: function(data){
                console.log(data);
				var json = $.parseJSON(data);
				if (json.mensagem == "OK") {
					$('table#table tbody tr#' + IdLocadores).remove();
					var temp = '<tr id="'+IdLocadores+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeLocadores+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailLocadores+'" target="_blank" title="Enviar e-mail para '+EmailLocadores+'" alt="Enviar e-mail para '+EmailLocadores+'">'+EmailLocadores+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneLocadores+'" target="_blank" title="Telefonar para '+NomeLocadores+'" alt="Telefonar para '+NomeLocadores+'">'+telefone(TelefoneLocadores)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneLocadores+'" target="_blank" title="Chamar '+NomeLocadores+' no WhatsApp" alt="Chamar '+NomeLocadores+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+IdLocadores+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+IdLocadores+')"><i class="fas fa-trash"></i></button></div></td></tr>';
					$('table#table tbody').append(temp);
					fechaModal('modalEdit', 'formEditUser');
				} else {
					bootstrap_alert(json.mensagem, 'warning', 'alertaEdit');
				}
			}
		});
	});

	$("#formAddUser").submit(function(e) {
		e.preventDefault();
		var EmailLocadores = $("#addEmail").val();
		var NomeLocadores = $("#addNome").val();
		var TelefoneLocadores = $("#addTelefone").val();
				$.ajax({
					type: "POST",
					url: $("#formAddUser").attr("action"),
					data: {
						"EmailLocadores": EmailLocadores,
						"NomeLocadores": NomeLocadores,
						"TelefoneLocadores": TelefoneLocadores,
					},
					error: function(error){
						bootstrap_alert('Houve um erro. Entre em contato com o administrador.', 'danger', 'alerta');
						console.log(error);
					},
					success: function(data){
						var json = $.parseJSON(data);
						if (json.mensagem == "OK") {
							var temp = '<tr id="'+json.IdLocadores+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeLocadores+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailLocadores+'" target="_blank" title="Enviar e-mail para '+EmailLocadores+'" alt="Enviar e-mail para '+EmailLocadores+'">'+EmailLocadores+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneLocadores+'" target="_blank" title="Telefonar para '+NomeLocadores+'" alt="Telefonar para '+NomeLocadores+'">'+telefone(TelefoneLocadores)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneLocadores+'" target="_blank" title="Chamar '+NomeLocadores+' no WhatsApp" alt="Chamar '+NomeLocadores+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+json.IdLocadores+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+json.IdLocadores+')"><i class="fas fa-trash"></i></button></div></td></tr>';
							$('table#table tbody').append(temp);
							fechaModal('modalAdd', 'formAddUser');
						} else {
							bootstrap_alert(json.mensagem, 'warning', 'alertaAdd');
							console.log(data);
						}
					}
				});
	});

})