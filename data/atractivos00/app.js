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
								+'<a href="#" class="blue"  onclick=mostrar_info("'+data[i+3]+'")>'
									+'<i class="ace-icon fa fa-eye bigger-130"></i>'
								+'</a>'
							+'</div>'
				        ] ).draw();		
					};		        		   
				}
			});
		}
	// proceso tabla configuracion
		// edicion de registro
			function editar(id){				
				$('#txt_id_atractivo').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-editar').modal('show');
						$('#select_categoria').text(data[0]);	
						$('#select_tipo').text(data[0]);
						$('#select_subtipo').text(data[0]);				
						$('#lbl_nombre').text(data[1]);	
						$('#lbl_propietario').text(data[2]);	
						$('#select_canton').text(data[3]);	
						$('#select_parroquia').text(data[4]);	
						$('#lbl_direccion').text(data[5]);								
						$('#lbl_latitud').text(data[6]);	
						$('#lbl_longitud').text(data[7]);
						$('#select_clima').text(data[8]);							
						$('#lbl_telefono').text(data[11]);	
						$('#lbl_correo').text(data[12]);	
						$('#lbl_web').text(data[13]);	
						$('#lbl_descripcion').text(data[14]);	
						$('#lbl_foto').text(data[15]);	


						$('#select_categoria').editable('setValue', data[0]);
						$('#select_tipo').editable('setValue', data[0]);
						$('#select_subtipo').editable('setValue', data[0]);
						$('#lbl_nombre').editable('setValue', data[1]);
						$('#lbl_propietario').editable('setValue', data[2]);
						$('#select_canton').editable('setValue', data[3]);
						$('#select_parroquia').editable('setValue', data[4]);
						$('#lbl_direccion').editable('setValue', data[5]);						
						$('#lbl_latitud').editable('setValue', data[6]);
						$('#lbl_longitud').editable('setValue', data[7]);
						$('#select_clima').editable('setValue', data[8]);
						$('#lbl_telefono').editable('setValue', data[11]);
						$('#lbl_correo').editable('setValue', data[12]);
						$('#lbl_web').editable('setValue', data[13]);
						$('#lbl_descripcion').editable('setValue', data[14]);
						$('#lbl_foto').editable('setValue', data[15]);



						// procesos
						
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
	// fin proceso tabla configuracion

// inicialisando procesos del dom para ejecución de jquery
$(function(){

		// proceso subir imagenes
	$('#txt_fotos').ace_file_input({
		style:'well',
		btn_choose:'Soltar archivos aquí o hager clic para elegir',
		btn_change:null,
		no_icon:'ace-icon fa fa-cloud-upload',
		droppable:true,
		thumbnail:'small',
		preview_error : function(filename, error_code) {
			
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});
		// inicializacion de procesos con nuevos frameworks nativos
	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	//editables 
	//text editable
    $('#select_tipo').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite tipo, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_tipo:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

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
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_nombre:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

    	//text editable
    $('#lbl_propietario').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite propietario, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_propietario:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

	  // select editabl
    $('#select_canton').editable({
		type:'select2',
		select2:{
			placeholder: "Selec. Canton",
			containerCssClass: "" ,
			'width': 170
		},		
		value : 'NL',
		source: select_canton(),
		success: function(response, newValue) {						
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_canton:'ok',id:id,valor:newValue}	            		                
	    	});
			
		}		
    });


    	//text editable
    $('#select_parroquia').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite parroquia, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_parroquia:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

	//text editable
    $('#lbl_direccion').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite dirección, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_direccion:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

    	//text editable
    $('#lbl_longitud').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite longitud, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_longitud:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

 	//text editable
    $('#lbl_latitud').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite latitud, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_latitud:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

     	//text editable
    $('#select_clima').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, seleccione categoría, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_clima:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });
 
	//text editable
    $('#lbl_telefono').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite teléfono, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_telefono:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

    	//text editable
    $('#lbl_correo').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite correo, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_correo:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

 	//text editable
    $('#lbl_web').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite Sitio Web, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_web:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

     	//text editable
    $('#lbl_descripcion').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite descripcion, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_descripcion:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

 	//text editable
    $('#lbl_foto').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite correo, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_foto:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });


    function select_canton(){
		var b="source";
		var result;
		$.ajax({
            type: "POST",
            url:"app.php",
            data:{llenar_canton2:'ok'},                   
            contentType:"application/x-www-form-urlencoded; charset=UTF-8", 
            global:false,
            async: false,
            dataType: "json",
            success: function(response) {                             
                  result=response;
            },
            error:function (xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
            }
		});  
		 return result;
	}


	// llamando funciones
		llenar();		
	// funcion de validar registros existentes
	
	function buscando(registro,r,reg1,reg2){			
		var result = "" ; 					
		$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {existencia_atractivo:'ok',reg:registro,reg1:reg1,reg2:reg2},        
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;  
			    } 		                
	    	});
		return result ; 
	}
	jQuery.validator.addMethod("existe_atractivo", function (value, element) {
		var a=value;
		var reg=$('#txt_nombre').val().toUpperCase();
		var reg1=$('#sel_subtipo').val();
		var reg2=$('#sel_parroquia').val();

		if (buscando(reg,0,reg1,reg2)==0) {						
			return true;
		};
		if(buscando(reg,0,reg1,reg2)!=0){						
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
			sel_categoria: {
				required: true
			},
			sel_tipo_a: {
				required: true
			},
			sel_subtipo: {
				required: true
			},
			txt_nombre: {
				required: true,
				existe_atractivo: true
			},
			sel_canton: {
				required: true
			},
			sel_parroquia: {
				required: true
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
			sel_clima: {
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
			sel_categoria: {
				required: "Este campo es requerido."
			},
			sel_tipo_a: {
				required: "Este campo es requerido."
			},
			sel_subtipo: {
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
			sel_clima: {
				required: "Este campo es requerido."
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
			var formObj = new FormData(form);
			$.ajax({
				url: "app.php", // Url to which the request is send
				type: "POST", 
				contentType: false,       // The content type used when sending data to the server.
				processData:false,              // Type of request to be send, called as method
				data:formObj, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				success: function(data){
					var data=parseInt(data);
					if (data==0) {
						$.gritter.add({						
							title: '..Mensaje..!',						
							text: 'OK: <br><i class="icon-cloud purple bigger-230"></i>  Sus datos fueron almacenados correctamente. <br><i class="icon-spinner icon-spin green bigger-230"></i>',						
							//image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',						
							sticky: false,						
							time: 2000,
							class_name: 'gritter-info gritter-center'
						});
						$('#form-guardar').each (function(){this.reset();});
						$('#txt_fotos').ace_file_input('reset_input');
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
	//ocultar select tipo atractivo y subtipo
	$('#sel_tipo_a').hide();
	$('#sel_subtipo').hide();

//llenar categoria
	$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_categoria_atractivo:':)'},
		success:function(data){
			$('#sel_categoria').html(data);
		}
	})

	//llenar tipo atractivo
	$('#sel_categoria').change(function(){
		$('#sel_tipo_a').show();
		var id_categoria=$('#sel_categoria'). val();
		$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_tipo_a:':)', id:id_categoria},
		success:function(data){
			$('#sel_tipo_a').html(data);
			console.log(data);
		}
	})
	})
//llenar subtipo atractivo
	$('#sel_tipo_a').change(function(){
		$('#sel_subtipo').show();
		var id_tipo_a=$('#sel_tipo_a'). val();
		$.ajax({
			url:'app.php',
			type:'POST',
			data:{llenar_subtipo:':)', id:id_tipo_a},
			success:function(data){
				$('#sel_subtipo').html(data);
				console.log(data);
			}
		});
	});

	//llenar clima
	$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_clima:':)'},
		success:function(data){
			$('#sel_clima').html(data);
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
			}
		});
	})

});