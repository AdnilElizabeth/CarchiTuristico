// inicialisando procesos del dom para ejecución de jquery
$(function(){
	function buscando(registro){			
		var result = "" ; 					
		$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {existencia_alojamiento:'ok',reg:registro},            
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;  
			    } 		                
	    	});
		return result ; 
	}
	jQuery.validator.addMethod("existe_alojamiento", function (value, element) {
		var a=value;
		var reg=$('#txt_nombre').val().toUpperCase();

		if (buscando(reg,0)==0) {						
			return true;
		};
		if(buscando(reg,0)!=0){						
			return false;
		};
	}, "El registro ya existe!!!.");

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
				required: true,
				existe_alojamiento: true
			},
			txt_propietario: {
				required: true				 
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
			},
			txt_latitud: {
				required: true,
				number: true
			},
			sel_categoria: {
				required: true
			},
			txt_nhab: {
				required: true,
				number: true
			},
			txt_nplazas: {
				required: true,
				number: true
			},
			txt_telf: {
				number: true
			}
		},

		messages: {
			sel_tipo: {
				required: "Este campo es requerido."
			},
			txt_nombre: {
				required: "Este campo es requerido."
			},
			txt_propietario:{
				required: "Este campo es requerido.",				
			},
			sel_canton: {
				required: "Este campo es requerido."
			},
			sel_parroquia: {
				required: "Este campo es requerido."
			},
			txt_direccion: {
				required: "Este campo es requerido."
			},
			txt_longitud: {
				required: "Este campo es requerido.",
				number: "Ingrese solo números."
			},
			txt_latitud: {
				required: "Este campo es requerido.",
				number: "Ingrese solo números."
			},
			sel_categoria: {
				required: "Este campo es requerido."
			},
			txt_nhab: {
				required: "Este campo es requerido.",
				number: "Ingrese solo números."
			},
			txt_nplazas: {
				required: "Este campo es requerido.",
				number: "Ingrese solo números."
			},
			txt_telf: {				
				number: "Ingrese solo números."
			},
			txt_correo: {				
				email: "Ingrese una dirección de correo electrónico válida."
			},
			txt_web:{
				url: "Ingrese un sitio web válido."
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
			// envio datos a app.php para guardar
			$.ajax({
				url:'app.php',
				type:'POST',
				data:{
					guardar:'ok',
					txt_1:$('#sel_tipo').val(),
					txt_2:$('#txt_nombre').val().toUpperCase(),
					txt_3:$('#txt_propietario').val().toUpperCase(),
					txt_4:$('#txt_direccion').val().toUpperCase(),
					txt_5:$('#txt_latitud').val(),
					txt_6:$('#txt_longitud').val(),
					txt_7:$('#sel_categoria').val(),
					txt_8:$('#txt_nhab').val(),
					txt_9:$('#txt_nplazas').val(),
					txt_10:$('#txt_telf').val(),
					txt_11:$('#txt_correo').val(),
					txt_12:$('#txt_web').val(),
					txt_13:$('#descripcion').val(),
					txt_14:$('#txt_fotos').val(),
					txt_15:$('#sel_parroquia').val()
				},
				success:function(data){
					console.log(data)
					if (data==0) {
						$.gritter.add({						
							title: '..Mensaje..!',						
							text: 'OK: <br><i class="icon-cloud purple bigger-230"></i>  Sus datos fueron almacenados correctamente. <br><i class="icon-spinner icon-spin green bigger-230"></i>',						
							//image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',						
							sticky: false,						
							time: 2000,
							class_name: 'gritter-info gritter-center'
						});
						$('#form-guardar').each (function(){
							this.reset();
						})
					}
					if (data!=0) {
						$.gritter.add({						
							title: '..Mensaje..!',						
							text: 'OK: <br><i class="icon-cloud purple bigger-230"></i>  Sus datos no fueron almacenados correctamente. <br><i class="icon-spinner icon-spin green bigger-230"></i>',						
							//image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',						
							sticky: false,						
							time: 2000,
							class_name: 'gritter-error gritter-center'
						});
					};
				}
			});
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