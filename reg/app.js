

$(function(){
	$('#form-login').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_usuario: {
				required: true,
			},
			txt_pass: {
				required:true
			}
		},

		messages: {
			txt_usuario: {
				required: 'campos requeridos',
			},
			txt_pass: {
				required:'campos requeridos'
			}
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},

		submitHandler: function (form) {
			// envio datos a app.php para guardar
			$.ajax({
				url:"app.php", // Url to which the request is send
				type:"post", 
				data:{login_usuario:'',usuarios:$('#txt_usuario').val(),claves:$('#txt_pass').val()},
				dataType:'json',
				success: function(data){
					console.log(data[0]);
					if (data[0]=='0') {
						alert('Usuario y contraseña no reconocidos')
					}
					if (data[0]=='1') {
						alert('Bienvenido: '+data[1]);
						window.location = "../data/inicio"
					}
				}
			});
		}
	});

});
