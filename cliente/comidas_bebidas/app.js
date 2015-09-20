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
					for (var i = 0; i<data.length; i=i+5) {
						a++;
						$('#tabla-informacion').DataTable().row.add( [
							a,
				            data[i+0],
				            data[i+1],
				            data[i+2],
				            data[i+3],
				            '<div class="hidden-sm hidden-xs action-buttons">'
								+'<a href="#" class="blue"  onclick=mostrar_info("'+data[i+4]+'")>'
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
				$('#txt_id_comida').val(id)
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

	// fin proceso tabla configuracion
// procesando mapas
var centerWGS84, centerOSM;
var projWGS84, projSphericalMercator;
function iniciar_mapa()
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
		var lon=document.getElementById("lbl_longitud1").innerHTML;
		var lat=document.getElementById("lbl_latitud1").innerHTML;
		
	projWGS84 = new OpenLayers.Projection("EPSG:4326");
	projSphericalMercator = new OpenLayers.Projection("EPSG:900913");
	//Centrar el mapa en el punto dado	
	centerWGS84=new OpenLayers.LonLat(lon,lat);
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
	mapa.setCenter(centerOSM, 18);
	//Adicion de controles al mapa	
	//Evento para el movimiento del mouse
	mapa.events.register("mousemove", mapa, mouseMoveHandler);
	//Control para el click del mouse en el mapa
	// var click = new OpenLayers.Control.Click();
 //    mapa.addControl(click);
 //    click.activate();
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
						$('#lbl_longitud').text(longitud);
						$('#lbl_latitud').text(latitud);
					}
				});
    }
});

// inicialisando procesos del dom para ejecución de jquery
$(function(){
	$('#btn_mapa_ver').click(function(){
		$('#modal-mapa').modal('show')
		iniciar_mapa();

	});
llenar();
 

	});