function editar(idUsuario) {
    let destino = document.URL + '/getUserData';
	$.ajax({
		type: "POST",
		url: destino,
		data: {
			"idUsuario": idUsuario,
		},
		error: function(error){
			alert('Houve um erro na requisição. Entre em contato com o administrador.');
			console.log(error);
		},
		success: function(data){
			var json = $.parseJSON(data);
			if (json.mensagem == "OK") {
				$("#idUsuario").val(idUsuario);
				$("#editNome").val(json.NomeUser);
				$("#editEmail").val(json.EmailUser);
				$("#editTelefone").val(json.TelefoneUser);
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

function deletar(idUsuario) {
    let destino = document.URL + '/deleteUserData';
	if (confirm ("Tem certeza que quer deletar o usuário?") == true) {
		$.ajax({
			type: "POST",
			url: destino,
			data: {
				"idUsuario": idUsuario,
			},
			error: function(error){
				alert('Houve um erro na requisição. Entre em contato com o administrador.');
				console.log(error);
			},
			success: function(data){
				var json = $.parseJSON(data);
				if (json.mensagem == "OK") {
					$('table#table tbody tr#' + idUsuario).remove();
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
		var idUsuario = $("#idUsuario").val();
		var EmailUser = $("#editEmail").val();
		var NomeUser = $("#editNome").val();
		var TelefoneUser = $("#editTelefone").val();
		$.ajax({
			type: "POST",
			url: $("#formEditUser").attr("action"),
			data: {
				"EmailUser": EmailUser,
				"NomeUser": NomeUser,
				"TelefoneUser": TelefoneUser,
				"idUsuario": idUsuario
			},
			error: function(error){
				bootstrap_alert('Houve um erro. Por favor tente mais tarde.', 'danger', 'alertaEdit');
				console.log(error);
			},
			success: function(data){
				var json = $.parseJSON(data);
				if (json.mensagem == "OK") {
					$('table#table tbody tr#' + idUsuario).remove();
					var temp = '<tr id="'+idUsuario+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeUser+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailUser+'" target="_blank" title="Enviar e-mail para '+EmailUser+'" alt="Enviar e-mail para '+EmailUser+'">'+EmailUser+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneUser+'" target="_blank" title="Telefonar para '+NomeUser+'" alt="Telefonar para '+NomeUser+'">'+telefone(TelefoneUser)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneUser+'" target="_blank" title="Chamar '+NomeUser+' no WhatsApp" alt="Chamar '+NomeUser+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+idUsuario+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+idUsuario+')"><i class="fas fa-trash"></i></button></div></td></tr>';
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
		var EmailUser = $("#addEmail").val();
		var NomeUser = $("#addNome").val();
		var TelefoneUser = $("#addTelefone").val();
		var SenhaUser = $("#addSenha").val();
		var senha = $("#addConfirmaSenha").val();
		var filtrosenha = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*?])[A-Za-z\d!@#$%&*?]{8,32}/;
		if (filtrosenha.test(SenhaUser)) {
			if (senha == SenhaUser){
				$.ajax({
					type: "POST",
					url: $("#formAddUser").attr("action"),
					data: {
						"EmailUser": EmailUser,
						"NomeUser": NomeUser,
						"TelefoneUser": TelefoneUser,
						"SenhaUser": SenhaUser
					},
					error: function(error){
						bootstrap_alert('Houve um erro. Entre em contato com o administrador.', 'danger', 'alerta');
						console.log(error);
					},
					success: function(data){
						var json = $.parseJSON(data);
						if (json.mensagem == "OK") {
							var temp = '<tr id="'+json.IdUser+'"><td data-label="Nome" data-title="Nome" class="align-middle">'+NomeUser+'</td><td data-label="Email" data-title="Email" class="align-middle"><a href="mailto:'+EmailUser+'" target="_blank" title="Enviar e-mail para '+EmailUser+'" alt="Enviar e-mail para '+EmailUser+'">'+EmailUser+'</a></td><td data-label="Telefone" data-title="Telefone" class="align-middle"><a href="tel:+55'+TelefoneUser+'" target="_blank" title="Telefonar para '+NomeUser+'" alt="Telefonar para '+NomeUser+'">'+telefone(TelefoneUser)+'</a>&nbsp;|&nbsp;<a href="https://wa.me/55'+TelefoneUser+'" target="_blank" title="Chamar '+NomeUser+' no WhatsApp" alt="Chamar '+NomeUser+' no WhatsApp"><i class="fab fa-whatsapp"></i></a></td><td data-label="Editar" class="align-middle"><div class="btn-group"><button type="button" class="btn btn-default bg-primary text-light" onClick="editar('+json.IdUser+')"><i class="fas fa-user-edit"></i></button><button type="button" class="btn btn-default bg-primary text-light" onClick="deletar('+json.IdUser+')"><i class="fas fa-trash"></i></button></div></td></tr>';
							$('table#table tbody').append(temp);
							fechaModal('modalAdd', 'formAddUser');
						} else {
							bootstrap_alert(json.mensagem, 'warning', 'alertaAdd');
							console.log(data);
						}
					}
				});
			} else {
				$("#addConfirmaSenha").addClass("is-invalid");
			}
		} else {
			$("#addSenha").addClass("is-invalid");
		}
	});

})