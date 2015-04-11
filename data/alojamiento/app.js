// inicialisando procesos del dom para ejecución de jquery
$(function(){

	// validacion de formulario
	$('#form-guardar').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			sel_tipo: {
				required: true
			},			
			txt_nombre: {
				required: true
			},
			txt_propietario: {
				required: true,
				lettersonly: true 
			},
			sel_canton: {
				required: true
			},
			sel_parroquia: {
				required: true
			},
			txt_direccion: {
				required: true,
			},
			txt_longitud: {
				required: true,
				number: true
			}
		},

		messages: {
			sel_tipo: {
				required: "este campo es requerido."
			},
			txt_nombre: {
				required: "este campo es requerido."
			},
			txt_propietario:{
				required: "este campo es requerido.",
				lettersonly:"Ingrese solo letra"
			},
			sel_canton: {
				required: "este campo es requerido."
			},
			sel_parroquia: {
				required: "este campo es requerido."
			},
			state: "Please choose state",
			subscription: "Please choose at least one option",
			gender: "Please choose gender",
			agree: "Please accept our policy"
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

		},
		invalidHandler: function (form) {
		}
	});
	// llenar select tipo alojamiento
	$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_tipo_alojamiento:':)'},
		success:function(data){
			$('#sel_tipo').html(data);
		}
	})

//ocultar select canton
	$('#sel_parroquia').hide();


//llenar canton
	$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_canton:':)'},
		success:function(data){
			$('#sel_canton').html(data);
		}
	})

	//llenar parroquia
	$('#sel_canton').change(function(){
		$('#sel_parroquia').show();
		var id_canton=$('#sel_canton'). val();
		$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_parroquia:':)', id:id_canton},
		success:function(data){
			$('#sel_parroquia').html(data);
			console.log(data);
		}
	})
	})

});