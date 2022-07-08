$(document).ready(function(){

	$("#login").submit(function(e) {
		e.preventDefault();
		var email = $("#email").val();
		var senha = $("#senha").val();
		var filtrosenha = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*?])[A-Za-z\d!@#$%&*?]{8,32}/;
		if (filtrosenha.test(senha)) {
			$.ajax({
				type: "POST",
				url: $("#login").attr("action"),
				data: {
					"email": email,
					"senha": senha,
				},
				error: function(error){
					bootstrap_alert('Houve um erro. Por favor tente mais tarde.', 'danger', 'alerta');
				},
				success: function(data){
					var json = $.parseJSON(data);
					if (json.mensagem == "OK") {
						window.location.reload(true);
					} else {
						bootstrap_alert(json.mensagem, 'warning', 'alerta');
					}
				}
			});
		} else {
			$("#senha").addClass("is-invalid");
		}
	});
	
});