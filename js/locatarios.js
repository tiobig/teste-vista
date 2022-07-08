function editar(IdLocatarios) {
    let destino = document.URL + '/getUserData';
	$.ajax({
		type: "POST",
		url: destino,
		data: {
			"IdLocatarios": IdLocatarios,
		},
		error: function(error){
			alert('Houve um erro na requisição. Entre em contato com o administrador.');
			console.log(error);
		},
		success: function(data){
			var json = $.parseJSON(data);
			if (json.mensagem == "OK") {
				$("#IdLocatarios").val(IdLocatarios);
				$("#editNome").val(json.NomeLocatarios);
				$("#editEmail").val(json.EmailLocatarios);
				$("#editTelefone").val(json.TelefoneLocatarios);
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

function deletar(IdLocatarios) {
    let destino = document.URL + '/deleteUserData';
    if (confirm ("Tem certeza que quer deletar o locatário? Isso irá apagar todos os aluguéis do mesmo.") == true) {
        $.ajax({
            type: "POST",
            url: destino,
            data: {
                "IdLocatarios": IdLocatarios,
            },
            error: function(error){
                alert('Houve um erro na requisição. Entre em contato com o administrador.');
                console.log(error);
            },
            success: function(data){
                var json = $.parseJSON(data);
                if (json.mensagem == "OK") {
                    $('table#table tbody tr#' + IdLocatarios).remove();
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
		var IdLocatarios = $("#IdLocatarios").val();
		var EmailLocatarios = $("#editEmail").val();
		var NomeLocatarios = $("#editNome").val();
		var TelefoneLocatarios = $("#editTelefone").val();
		$.ajax({
			type: "POST",
			url: $("#formEditUser").attr("action"),
			data: {
				"EmailLocatarios": EmailLocatarios,
				"NomeLocatarios": NomeLocatarios,
				"TelefoneLocatarios": TelefoneLocatarios,
				"IdLocatarios": IdLocatarios
			},
			error: function(error){
				bootstrap_alert('Houve um erro. Por favor tente mais tarde.', 'danger', 'alertaEdit');
				console.log(error);
			},
			success: function(data){
                console.log(data);
				var json = $.parseJSON(data);
				if (json.mensagem == "OK") {
					$('table#table tbody tr#' + IdLocatarios).remove();
					var temp = '<tr id="'+IdLocatarios+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeLocatarios+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailLocatarios+'" target="_blank" title="Enviar e-mail para '+EmailLocatarios+'" alt="Enviar e-mail para '+EmailLocatarios+'">'+EmailLocatarios+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneLocatarios+'" target="_blank" title="Telefonar para '+NomeLocatarios+'" alt="Telefonar para '+NomeLocatarios+'">'+telefone(TelefoneLocatarios)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneLocatarios+'" target="_blank" title="Chamar '+NomeLocatarios+' no WhatsApp" alt="Chamar '+NomeLocatarios+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+IdLocatarios+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+IdLocatarios+')"><i class="fas fa-trash"></i></button></div></td></tr>';
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
		var EmailLocatarios = $("#addEmail").val();
		var NomeLocatarios = $("#addNome").val();
		var TelefoneLocatarios = $("#addTelefone").val();
				$.ajax({
					type: "POST",
					url: $("#formAddUser").attr("action"),
					data: {
						"EmailLocatarios": EmailLocatarios,
						"NomeLocatarios": NomeLocatarios,
						"TelefoneLocatarios": TelefoneLocatarios,
					},
					error: function(error){
						bootstrap_alert('Houve um erro. Entre em contato com o administrador.', 'danger', 'alerta');
						console.log(error);
					},
					success: function(data){
						var json = $.parseJSON(data);
						if (json.mensagem == "OK") {
							var temp = '<tr id="'+json.IdLocatarios+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeLocatarios+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailLocatarios+'" target="_blank" title="Enviar e-mail para '+EmailLocatarios+'" alt="Enviar e-mail para '+EmailLocatarios+'">'+EmailLocatarios+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneLocatarios+'" target="_blank" title="Telefonar para '+NomeLocatarios+'" alt="Telefonar para '+NomeLocatarios+'">'+telefone(TelefoneLocatarios)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneLocatarios+'" target="_blank" title="Chamar '+NomeLocatarios+' no WhatsApp" alt="Chamar '+NomeLocatarios+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+json.IdLocatarios+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+json.IdLocatarios+')"><i class="fas fa-trash"></i></button></div></td></tr>';
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