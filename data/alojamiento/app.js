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

	function mostrar_info(id){				
				
				$('#txt_id_alojamiento_img').val(id)
				$('#txt_id_alojamiento').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-ver').modal('show');	
						$('#select_tipo1').text(data[0]);
						$('#lbl_nombre1').text(data[1]);
						$('#lbl_propietario1').text(data[2]);
						$('#select_canton1').text(data[3]);
						$('#select_parroquia1').text(data[4]);
						$('#lbl_direccion1').text(data[5]);
						$('#lbl_latitud1').text(data[6]);
						$('#lbl_longitud1').text(data[7]);
						$('#select_categoria1').text(data[8]);
						$('#lbl_habitaciones1').text(data[9]);
						$('#lbl_plazas1').text(data[10]);
						$('#lbl_telefono1').text(data[11]);
						$('#lbl_correo1').text(data[12]);
						$('#lbl_web1').text(data[13]);
						$('#lbl_descripcion1').text(data[14]);
						$('#lbl_foto1').text(data[15]);
					}
				})
				// edicion de imagenes
				mostrar_img1(id);
		
			}
		// edicion de registro
			function editar(id){				
				$('#txt_id_alojamiento_img').val(id)
				$('#txt_id_alojamiento').val(id)
				// edicion
				$.ajax({
					url:'app.php',
					type:'POST',
					dataType:'json',
					data:{datos_editar:'ok',id:id},
					success:function(data){
						$('#modal-editar').modal('show');	
						$('#select_tipo').text(data[0]);				
						$('#lbl_nombre').text(data[1]);	
						$('#lbl_propietario').text(data[2]);	
						$('#select_canton').text(data[3]);	
						$('#select_parroquia').text(data[4]);	
						$('#lbl_direccion').text(data[5]);								
						$('#lbl_latitud').text(data[6]);	
						$('#lbl_longitud').text(data[7]);
						$('#select_categoria').text(data[8]);	
						$('#lbl_habitaciones').text(data[9]);	
						$('#lbl_plazas').text(data[10]);	
						$('#lbl_telefono').text(data[11]);	
						$('#lbl_correo').text(data[12]);	
						$('#lbl_web').text(data[13]);	
						$('#lbl_descripcion').text(data[14]);	
						$('#lbl_foto').text(data[15]);	


						// $('#select_tipo').editable('setValue', data[0]);
						$('#lbl_nombre').editable('setValue', data[1]);
						$('#lbl_propietario').editable('setValue', data[2]);
						//$('#select_canton').editable('setValue', data[3]);
						$('#select_parroquia').editable('setValue', data[4]);
						$('#lbl_direccion').editable('setValue', data[5]);						
						$('#lbl_latitud').editable('setValue', data[6]);
						$('#lbl_longitud').editable('setValue', data[7]);
						$('#select_categoria').editable('setValue', data[8]);
						$('#lbl_habitaciones').editable('setValue', data[9]);
						$('#lbl_plazas').editable('setValue', data[10]);
						$('#lbl_telefono').editable('setValue', data[11]);
						$('#lbl_correo').editable('setValue', data[12]);
						$('#lbl_web').editable('setValue', data[13]);
						$('#lbl_descripcion').editable('setValue', data[14]);
						$('#lbl_foto').editable('setValue', data[15]);
					}
				})

				// edicion de imagenes
				mostrar_img(id);
		
			}

			function mostrar_img1(id){
				$.ajax({
					url: 'app.php',
					type: 'POST',
					data: {edicion_imagenes1: 'ok',id:id},
					success:function(data){
						$('#obj_img1').html(data)
					}
				});
			}
			function mostrar_img(id){
				$.ajax({
					url: 'app.php',
					type: 'POST',
					data: {edicion_imagenes: 'ok',id:id},
					success:function(data){
						$('#obj_img').html(data)
					}
				});
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
// procesando mapas
var centerWGS84, centerOSM;
var projWGS84, projSphericalMercator;
function iniciar()
{

	 // layer = new OpenLayers.Layer.OSM( "Simple OSM Map");
            // map.addLayer(layer);
            // map.setCenter(
            //     new OpenLayers.LonLat(-71.147, 42.472).transform(
            //         new OpenLayers.Projection("EPSG:4326"),
            //         map.getProjectionObject()
            //     ), 12
            // );    
	//Para tener coordenadas estandar
	projWGS84 = new OpenLayers.Projection("EPSG:4326");
	projSphericalMercator = new OpenLayers.Projection("EPSG:900913");
	//Centrar el mapa en el punto dado	
	centerWGS84=new OpenLayers.LonLat(-77.9137,0.6502);
	//Transformar coordenadas anteriores
	centerOSM = transformToSphericalMercator(centerWGS84);
	//Creacion del mapa
	$('#obj_mapa').html('')
	mapa=new OpenLayers.Map("obj_mapa");
	//Creacion de capas
	capa=new OpenLayers.Layer.OSM("Simple OSM Map");

	//Adicion de capas al mapa
	mapa.addLayer(capa);

	//Centro el mapa en la posicion dada
	mapa.setCenter(centerOSM, 15);
	//Adicion de controles al mapa	
	//Evento para el movimiento del mouse
	mapa.events.register("mousemove", mapa, mouseMoveHandler);
	//Control para el click del mouse en el mapa
	var click = new OpenLayers.Control.Click();
    mapa.addControl(click);
    click.activate();
}
//Funcion que registrar el movimiento del mouse
function mouseMoveHandler(e) 
{
    var position = this.events.getMousePosition(e);
    var lonlat = mapa.getLonLatFromPixel(position);
	//alert(lonlat);
    $("#coordenadas").attr('value','Evento MouseMove: '+transformMouseCoords(lonlat));
}

function transformMouseCoords(lonlat) 
{
        	var newlonlat=transformToWGS84(lonlat);
			var x = Math.round(newlonlat.lon*10000)/10000;
			var y = Math.round(newlonlat.lat*10000)/10000;
			newlonlat = new OpenLayers.LonLat(x,y);
			return newlonlat;
}
function transformToWGS84( sphMercatorCoords) 
{
        	// Transforma desde SphericalMercator a WGS84
        	// Devuelve un OpenLayers.LonLat con el pto transformado
        	var clon = sphMercatorCoords.clone(); // Si no uso un clon me transforma el punto original
        	var pointWGS84= clon.transform(
                    new OpenLayers.Projection("EPSG:900913"), // to Spherical Mercator Projection;
        			new OpenLayers.Projection("EPSG:4326")); // transform from WGS 1984
        	return pointWGS84;
}
function transformToSphericalMercator( wgs84LonLat) 
{
        	// Transforma desde SphericalMercator a WGS84
        	// Devuelve un OpenLayers.LonLat con el pto transformado
        	var clon = wgs84LonLat.clone(); // Si no uso un clon me transforma el punto original
        	var pointSphMerc= clon.transform(
                    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                    new OpenLayers.Projection("EPSG:900913")); // to Spherical Mercator Projection;
        	return pointSphMerc;
}
//Es un evento que se activa cuando se da clic sobre el mapa
OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, 
{                
     defaultHandlerOptions: 
	 {
        'single': true,
        'double': false,
        'pixelTolerance': 0,
        'stopSingle': false,
        'stopDouble': false
     },
	initialize: function(options) 
	{
        this.handlerOptions = OpenLayers.Util.extend({}, this.defaultHandlerOptions);
        OpenLayers.Control.prototype.initialize.apply(this, arguments); 
        this.handler = new OpenLayers.Handler.Click(this,{'click': this.trigger}, this.handlerOptions);
    }, 
	trigger: function(e) 
	{
        //Convierto la posicion del mouse, a coordenadas
		var lonlat = mapa.getLonLatFromPixel(e.xy);
		var acu=transformMouseCoords(lonlat);
		var longitud=acu.lon;
		var latitud=acu.lat;
		// console.log("Evento MouseClick: "+transformMouseCoords(C))	

		bootbox.confirm("Esta seguro que desea seleccionar esta ubicación", function(result) {
					if(result) {
						$('#modal-mapa').modal('hide');
						$('#txt_longitud').val(longitud);
						$('#txt_latitud').val(latitud);
						success: function(response, newValue) {
							var id=$('#txt_id_alojamiento').val();			
							$.ajax({
					            url:'app.php',
					            async :  false ,   
					            type:  'post',
					            data: {editar_lon_lat:'ok',id:id,valor:longitud, valor:latitud}
					    	});
						};
						// $('#lbl_longitud').text(longitud);
						// $('#lbl_latitud').text(latitud);
					}
				});
    }
});
// inicialisando procesos del dom para ejecución de jquery
$(function(){

	// evento click boton mapa
	$('#btn_mapa').click(function(){
		$('#modal-mapa').modal('show')
		iniciar();

	});
// evento click boton mapa editar
	$('#btn_mapa_editar').click(function(){
		$('#modal-mapa').modal('show')
		iniciar();

	});
		// proceso subir imagenes
	$('#txt_fotos').ace_file_input({
		style:'well',
		btn_choose:'Soltar archivos aquí o haga clic para elegir',
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

	$('#txt_fotos2').ace_file_input({
		style:'well',
		btn_choose:'Soltar archivos aquí o haga clic para elegir',
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
	$('#btn_nuevo').click(function(){
		$('#img_nuevo').modal('show');
	});
	//editables 
	//text editable
    $('#select_tipo').editable({
		type:'select2',
		select2:{
			placeholder: "Selec. categoría",
			'width': 200
		},
		value : 'NL',
		source:llenar_tipo_alojamiento(),
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite tipo, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_tipo:'ok',id:id,valor:newValue},
	            success:function(){
	            	llenar();
	            }
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
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_nombre:'ok',id:id,valor:newValue},
	            success:function(){
	            	llenar();
	            }    		                
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
		    var reg = /^([a-z ñáéíóú]{2,60})$/i;
		    if(!reg.test(value))
			    return 'Por favor, digite solo letras, campo requerido';
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_propietario:'ok',id:id,valor:newValue},
	            success:function(){
	            	llenar();
	            }    		                     		                
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
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_canton:'ok',id:id,valor:newValue},
	            success:function(){
	            	llenar();
	            }    		                	            		                
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
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_parroquia:'ok',id:id,valor:newValue},
	            success:function(){
	            	llenar();
	            }
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
			var id=$('#txt_id_alojamiento').val();			
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
		    // validar solo numero
		    if (!/^[+-]?[0-9]{1,9}(?:\.[0-9]{1,20})?$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
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
		    // validar solo numero
		    if (!/^[+-]?[0-9]{1,9}(?:\.[0-9]{1,20})?$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_latitud:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });

     	//text editable
    $('#select_categoria').editable({
		type: 'select',
		name: 'username',
		source:[{value: 'UNA ESTRELLA', text: 'UNA ESTRELLA'},
				{value: 'DOS ESTRELLAS', text: 'DOS ESTRELLAS'},
				{value: 'TRES ESTRELLAS', text: 'TRES ESTRELLAS'},
				{value: 'CUATRO ESTRELLAS', text: 'CUATRO ESTRELLAS'},
				{value: 'CINCO ESTRELLAS', text: 'CINCO ESTRELLAS'}
				],
		validate: function(value) {
		    if($.trim(value) == ''){
		        return 'Por favor, seleccione categoría, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_categoria:'ok',id:id,valor:newValue},
	            success:function(){}
	    	});
		}
    });
  

  	//text editable
    $('#lbl_habitaciones').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite num de mesas, campo requerido';
		    }
		    // validar solo numero
		    if (!/^([0-9])*$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_habitaciones:'ok',id:id,valor:newValue}          		                
	    	});
		}
    });
  

  	//text editable
    $('#lbl_plazas').editable({
		type: 'text',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite num de plazas, campo requerido';
		    }
		    // validar solo numero
		    if (!/^([0-9])*$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
			$.ajax({
	            url:'app.php',
	            async :  false ,   
	            type:  'post',
	            data: {editar_plazas:'ok',id:id,valor:newValue}          		                
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
		    // validar solo numero
		    if (!/^([0-9])*$/.test(value)){
      			return 'Por favor, solo numeros, campo requerido';
		    }
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
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
		    // validacion correos
		    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if(value.search(patron)!=0){
				return 'Por favor, correo invalido, campo requerido';
			}
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
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
			var id=$('#txt_id_alojamiento').val();			
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
		type:  'textarea',
		name: 'username',
		validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Por favor, digite descripcion, campo requerido';
		    }		    
		},
		success: function(response, newValue) {	
			var id=$('#txt_id_alojamiento').val();			
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
			var id=$('#txt_id_alojamiento').val();			
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
	            data: {existencia_alojamiento:'ok',reg:registro,reg1:reg1,reg2:reg2},
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
		var reg1=$('#sel_tipo').val();
		var reg2=$('#sel_parroquia').val();

		if (buscando(reg,0,reg1,reg2)==0) {
			return true;
		};
		if(buscando(reg,0,reg1,reg2)!=0){
			return false;
		};
	}, "El registro ya existe!!!.");


	$('#form-guardar_nuevo').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_fotos2:{
				required:false
			}
		},

		messages: {
			txt_fotos2:{
				required:'sdfds'
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
						$('#txt_fotos2').ace_file_input('reset_input');
						mostrar_img($('#txt_id_alojamiento_img').val());
						$('#img_nuevo').modal('hide')
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
						llenar();
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

	llenar();
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
	})
	})

});

// funciones generales

	function llenar_tipo_alojamiento(id){
		var b="source";
		var result;
		$.ajax({
            type: "POST",
            url:"app.php",
            data:{llenar_tipo_alojamiento_select:'ok'},
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
	function eliminar_img(id){    	
		bootbox.confirm("Esta seguro que desea eliminar el registro..?", function(result) {
			if(result) {
				$.ajax({
					url:'app.php',
					type:'POST',
					data: {eliminar_imgs:'ok', id:id},        
					success:function(data){
						var id=$('#txt_id_alojamiento_img').val();
	        			mostrar_img(id)
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