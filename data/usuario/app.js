// funcion llenar data table
function llenar(){
			$.ajax({
				url:'app.php',
				type:'POST',
				dataType:'json',
				data:{llenar:'ok'},
				success:function(data){	
					$('#tabla-informacion').DataTable().clear().draw();		
					var a=0;		
					for (var i = 0; i<data.length; i=i+4) {
						a++;
						$('#tabla-informacion').DataTable().row.add( [
							a,
				            data[i+0],
				            data[i+1],
				            data[i+2],
				            '<div class="hidden-sm hidden-xs action-buttons">'	
								+'<a href="#" class="green" onclick=editar("'+data[i+3]+'")>'
									+'<i class="ace-icon fa fa-pencil bigger-130"></i>'
								+'</a>'
								+'<a href="#" class="red"  onclick=eliminar("'+data[i+3]+'")>'
									+'<i class="ace-icon fa fa-trash-o bigger-130"></i>'
								+'</a>'
								+'<a href="#" class="blue"  onclick=privilegios("'+data[i+3]+'")>'
									+'<i class="ace-icon fa fa-lock bigger-130"></i>'
								+'</a>'
							+'</div>'
				        ] ).draw();		
					};		        		   
				}
			});
		}
	// proceso tabla configuracion
		// edicion de registro

			function privilegios(id){
				$('#modal-privilegios').modal('show');
				

			}

			function editar(id){				
				$('#txt_id_usuario').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-editar').modal('show');										
						$('#lbl_nombre').text(data[0]);
						$('#lbl_telefono').text(data[1]);
						$('#lbl_direccion').text(data[2]);
						$('#lbl_nombre_user').text(data[3]);
						$('#select_user').text(data[5]);
						$('#lbl_clave').text(data[4]);
						$('#lbl_clave1').text(data[4]);

						$('#lbl_nombre').editable('setValue', data[0]);
						$('#lbl_telefono').editable('setValue', data[1]);
						$('#lbl_direccion').editable('setValue', data[2]);
						$('#lbl_nombre_user').editable('setValue', data[3]);
						//$('#select_user').editable('setValue', data[0]);
						$('#lbl_clave').editable('setValue', data[4]);
						$('#lbl_clave1').editable('setValue', data[4]); //clear values

						//editables de aka
						//text editable
					    		
					}
				})
			}
		// eliminar registros
			function eliminar(id){
				bootbox.confirm("Esta seguro que desea eliminar el registro..?", function(result) {
					if(result) {
						$.ajax({
							url:'app.php',
							type:'POST',
							data:{eliminar:'ok',id:id},
							success:function(data){
								if (data==1){
									bootbox.alert("Registro eliminado");
									llenar();
								}
								else{
									bootbox.alert("Tenemos inconvenientes intente mas tarde");	
								}								
							}
						})
					}
				});
				
			}

// inicialisando procesos del dom para ejecución de jquery
$(function(){

	// evento click boton ayuda
	$('#btn_ayuda').click(function(){
		$('#modal-ayuda').modal('show')
		iniciar();
	});

	// inicializacion de procesos con nuevos frameworks nativos
	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	//editables 
	
	//text editable
	$('#lbl_nombre').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite nombre, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_nombre:'ok',id:id,valor:newValue}          		                
	    	});
	    	llenar();
		}
    });	

        $('#lbl_telefono').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite teléfono, campo requerido';
		    }
		    // validar solo numero
		    if (!/^([0-9])*$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_telefono:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

        $('#lbl_direccion').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite dirección, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_direccion:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

  	$('#lbl_nombre_user').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite nombre, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_nombre_usuario:'ok',id:id,valor:newValue}          		                
	    	});
	    	llenar();
		}
    });

    $('#select_user').editable({
		type: 'select',
		name: 'username',
		source:[{value: 'SUPERADMINISTRADOR', text: 'SUPERADMINISTRADOR'},
				{value: 'ADMINISTRADOR', text: 'ADMINISTRADOR'},
				{value: 'USUARIO', text: 'USUARIO'}
				],
		validate: function(value) {
		    if($.trim(value) == ''){
		        return 'Por favor, seleccione tipo de usuario, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_tipo_usuario:'ok',id:id,valor:newValue},
	            success:function(){}
	    	});
	    	llenar();
		}
    });
      	$('#lbl_clave').editable({
		type: 'password',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite clave, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_usuario').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_clave:'ok',id:id,valor:newValue}          		                
	    	});
	    	llenar();
		}
    });
	// llamando funciones
		llenar();	

		function buscando(registro,r){			
		var result = "" ; 					
		$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {existencia_nombre_usuario:'ok',reg:registro},
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;
			    }
	    	});
		return result ; 
	}
	function buscando1(registro,r){			
		var result = "" ; 					
		$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {existencia_usuario:'ok',reg1:registro},
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;
			    }
	    	});
		return result ; 
	}
	jQuery.validator.addMethod("clave", function (value, element) {
		var reg=$('#txt_clave').val();
		var reg1=$('#txt_clave1').val();

		if (reg==reg1) {						
			return true;
		}
		else{
			return false;
		};
	}, "Las contraseñas no coinciden.");
	jQuery.validator.addMethod("existe_nombre_usuario", function (value, element) {
		var a=value;
		var reg=$('#txt_nombre').val().toUpperCase();
		if (buscando(reg,0)==0) {
			return true;
		};
		if(buscando(reg,0)!=0){
			return false;
		};
	}, "El usuario ya existe!!!.");

	jQuery.validator.addMethod("existe_usuario", function (value, element) {
		var a=value;
		var reg1=$('#txt_user').val().toUpperCase();

		if (buscando1(reg1,0)==0) {
			return true;
		};
		if(buscando1(reg1,0)!=0){
			return false;
		};
	}, "El nombre de usuario ya existe!!!.");
	// validacion de formulario
	$('#form-guardar').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_nombre: {
				required: true,
				existe_nombre_usuario:true
			},
			txt_telf: {
				number: true,
				required: true
			},
			txt_direccion: {
				required: true,
			},
			txt_user: {
				required: true,
				existe_usuario:true
			},
			sel_usuario: {
				required: true
			},
			txt_clave: {
				required: true
			},
			txt_clave1: {
				required: true,
				clave:true
			}
		},

		messages: {
			txt_nombre: {
				required: "Este campo es requerido."
			},
			txt_telf: {
				required: "Este campo es requerido.",
				number: "Ingrese solo números."
			},
			txt_direccion: {
				required: "Este campo es requerido."
			},
			txt_user: {
				required: "Este campo es requerido."
			},
			sel_usuario: {
				required: "Este campo es requerido."
			},
			txt_clave: {
				required: "Este campo es requerido."
			},
			txt_clave1: {
				required: "Este campo es requerido."
			},
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
					txt_1:$('#txt_nombre').val().toUpperCase(),
					txt_2:$('#txt_telf').val(),
					txt_3:$('#txt_direccion').val().toUpperCase(),
					txt_4:$('#txt_user').val().toUpperCase(),
					txt_5:$('#sel_usuario').val(),
					txt_6:$('#txt_clave').val()
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
						llenar();
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
		}		
	});


});