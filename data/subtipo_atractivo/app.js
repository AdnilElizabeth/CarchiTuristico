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
				$('#txt_id_subtipo_atractivo').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-editar').modal('show');	
						$('#select_categoria').text(data[0]);
						$('#select_tipo').text(data[1]);				
						$('#lbl_subtipo').text(data[2])	
						$('#select_categoria').editable('setValue', data[0]) //clear values				
						$('#select_tipo').editable('setValue', data[1]) //clear values				
						$('#lbl_subtipo').editable('setValue', data[2]) //clear values							
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
    $('#lbl_subtipo').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite subtipo, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_subtipo_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_subtipo:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });
    // select editabl
    $('#select_categoria').editable({
		type:'select2',
		select2:{
			placeholder: "Selec. categoria",
			containerCssClass: "" ,
			'width': 170
		},		
		value : 'NL',
		source: select_categoria(),
		success: function(response, newValue) {						
			var id=$('#txt_id_subtipo_atractivo').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_categoria_tipo:'ok',id:id,valor:newValue}	            		                
	    	});
			llenar();
		}		
    });
    function select_categoria(){
		var b="source";
		var result;
		$.ajax({
            type: "POST",
            url:"app.php",
            data:{llenar_categoria2:'ok'},                   
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
	function buscando(registro){			
		var result = "" ; 					
		$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {existencia_subtipo_atractivo:'ok',reg:registro},            
	            success : function ( data )  {
	            	console.log(data)
			         result = data ;  
			    } 		                
	    	});
		return result ; 
	}
	jQuery.validator.addMethod("existe_subtipo_atractivo", function (value, element) {
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
			sel_categoria: {
				required: true
			},
			sel_tipo_a: {
				required: true
			},	
			txt_nombre: {
				required: true,
				existe_subtipo_atractivo:true
			}
		},

		messages: {
			sel_categoria: {
				required: "Este campo es requerido."
			},
			sel_tipo_a: {
				required: "Este campo es requerido."
			},
			txt_nombre: {
				required: "Este campo es requerido."
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
				url:'app.php',
				type:'POST',
				data:{
					guardar:'ok',
					txt_1:$('#txt_nombre').val().toUpperCase(),
					txt_2:$('#sel_tipo_a').val()
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

//ocultar select canton
	$('#sel_tipo_a').hide();

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
});