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
							+'</div>'
				        ] ).draw();		
					};		        		   
				}
			});
		}
	// proceso tabla configuracion
		// edicion de registro
			function editar(id){				
				$('#txt_id_parroquia').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-editar').modal('show');	
						$('#select_tipo').text(data[0])				
						$('#lbl_nombre').text(data[1])				
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
		// inicializacion de procesos con nuevos frameworks nativos
	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	//editables 
	
	//text editable
    $('#lbl_parroquia').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite nombre, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_parroquia').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_nombre:'ok',id:id,valor:newValue}          		                
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
			var id=$('#txt_id_parroquia').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_tipo_comida:'ok',id:id,valor:newValue}	            		                
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
                    alert(xhr.status);
                    alert(thrownError);
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
	            data: {existencia_comidas:'ok',reg:registro,reg1:reg1,reg2:reg2},            
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;  
			    } 		                
	    	});
		return result ; 
	}
	jQuery.validator.addMethod("existe_comidas", function (value, element) {
		var a=value;
		var reg=$('#txt_nombre').val().toUpperCase();
		var reg1=$('#sel_tipo').val();
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
			sel_tipo: {
				required: true
			},			
			txt_nombre: {
				required: true,
				existe_comidas: true
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
	// llenar select tipo comida bebida
	$.ajax({
		url:'app.php',
		type:'POST',
		data:{llenar_tipo_comida:':)'},
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