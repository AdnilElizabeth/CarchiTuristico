<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
	<title>Alojamiento</title>


		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../../dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../dist/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../../dist/css/select2.min.css" />
		<link rel="stylesheet" href="../../dist/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="../../dist/css/bootstrap-editable.min.css" />
		<link rel="stylesheet" href="../../dist/css/colorbox.min.css" />
		<link rel="stylesheet" href="../../dist/fonts/fonts.googleapis.com.css" />


		<!-- text fonts -->
		<link rel="stylesheet" href="../../dist/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../../dist/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../../dist/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../../dist/js/ace-extra.min.js"></script>
				
               
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../../dist/js/html5shiv.min.js"></script>
		<script src="../../dist/js/respond.min.js"></script>
		<![endif]-->
	</head>

<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">

			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Carchi</a>
							</li>
							<li class="active">Alojamiento</li>
						</ul><!-- /.breadcrumb -->

					
					</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-16">
								<!-- PAGE CONTENT BEGINS -->
								
								<table id="tabla-informacion" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center" width="60px">
													<i class="fa fa-list-ol"></i>
												</th>
												<th>Tipo</th>
												<th width="400px">Nombre</th>
												<th width="300px">Parroquia</th>
												<th  width="550px">Dirección</th>
												<th width="400px">Teléfono</th>
												<th width="90px"><i class="fa fa-cogs"></i></th>
											</tr>
										</thead>

										<tbody>
										</tbody>
								</table>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
	<!-- 		 <?php
  $can=$_GET['can']; 

?> -->

			<div id="modal-ver" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header no-padding">
							<div class="table-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
								</button>
								Alojamiento
							</div>
						</div>
						<div class="modal-body padding">
							<div class="row">
								<div class="col-xs-6">
									<h4 class="header orange">Información General</h4>
									<div class="profile-user-info no-padding">

										<div class="profile-info-row">
											<div class="profile-info-name"> Tipo: </div>											

											<div class="profile-info-value">
												<input type="hidden" id="txt_id_alojamiento1">
												<span class="editable" id="select_tipo1">Tipo</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Nombre: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_nombre1" >..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Propietario: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_propietario1">..</span>
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<h4 class="header orange">Ubicación</h4>
									<div class="profile-user-info no-padding">
										<div class="profile-info-row">
											<div class="profile-info-name"> Canton: </div>

											<div class="profile-info-value">										
												<span class="editable" id="select_canton1">Cantón</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Parroquia: </div>

											<div class="profile-info-value" >
												<span class="editable" id="select_parroquia1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Dirección: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_direccion1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Longitud: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_longitud1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Latitud: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_latitud1">..</span>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<h4 class="header orange">Detalles</h4>
									<div class="profile-user-info no-padding">
										<div class="profile-user-info">
											<div class="profile-info-row">
											<div class="profile-info-name"> Categoría: </div>

											<div class="profile-info-value">										
												<span class="editable" id="select_categoria1">Categoría</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> N° Hab.: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_habitaciones1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> N° Plazas: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_plazas1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Precio: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_precio1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Teléfono: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_telefono1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Correo: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_correo1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Sitio Web: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_web1">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Descripción: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_descripcion1">..</span>
												
											</div>
										</div>
									</div>

									</div>
								</div>
								<div class="col-xs-6">
									<h3 class="row header smaller lighter orange">
											<span class="col-sm-8">
												<i class="ace-icon fa fa-camera"></i>
												Fotografías
											</span><!-- /.col -->

										</h3>

									<div id="obj_img1"></div>
								</div>

								<div class="form-group">
									<center><div class="hidden-sm hidden-xs action-buttons">
										<button class="btn btn-white btn-info btn-bold" type="button" id="btn_mapa_ver">
											<i class="ace-icon fa fa-globe bigger-120 blue"></i>
											Mapa
										</button>
									</div></center>
								</div>
							</div>							
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div id="modal-mapa" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header no-padding">
							<div class="table-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
								</button>
								Mapa
							</div>
						</div>
						<div class="modal-body padding">
							<div id="obj_mapa" style="width:1180px;height:500px;">
								
							</div>
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
		

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">http://www.carchi.gob.ec/</span>
							 &copy; 2014-2015
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>			
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../../dist/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../../dist/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../../dist/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../dist/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../../dist/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../../dist/js/jquery-ui.custom.min.js"></script>
		<script src="../../dist/js/jquery.dataTables.min.js"></script>
		<script src="../../dist/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../../dist/js/dataTables.tableTools.min.js"></script>
		<script src="../../dist/js/dataTables.colVis.min.js"></script>
		<script src="../../dist/js/jquery.validate.min.js"></script>
		<script src="../../dist/js/additional-methods.min.js"></script>
		<script src="../../dist/js/select2.min.js"></script>
		<script src="../../dist/js/jquery.gritter.min.js"></script>
		<script src="../../dist/js/bootbox.min.js"></script>
		<script src="../../dist/js/bootstrap-editable.min.js"></script>
		<script src="../../dist/js/ace-editable.min.js"></script>
		<script src="../../dist/js/jquery.autosize.min.js"></script>
		<script src="../../dist/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="../../dist/js/jquery.maskedinput.min.js"></script>
		<script src="../../dist/js/bootstrap-tag.min.js"></script>
		<script src="../../dist/js/jquery.colorbox.min.js"></script>
		<script src="http://www.openlayers.org/api/OpenLayers.js"></script>





		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		<script src="app.js"></script>

		<!-- inline scripts related to this page -->	
		<script type="text/javascript">
			// abriendo acceso y manipulacion del dom
			$(function(){
				//dando valores iniciales
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
				// inicializando tabla, cambiando el idioma 
				$('#tabla-informacion').dataTable( {
			        language: {
					    "sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar: ",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    }
					}	 

			    });
			});			

			jQuery(function($) {
				var $overflow = '';
				var colorbox_params = {
					rel: 'colorbox',
					reposition:true,
					scalePhotos:true,
					scrolling:false,
					previous:'<i class="ace-icon fa fa-arrow-left"></i>',
					next:'<i class="ace-icon fa fa-arrow-right"></i>',
					close:'&times;',
					current:'{current} of {total}',
					maxWidth:'100%',
					maxHeight:'100%',
					onOpen:function(){
						$overflow = document.body.style.overflow;
						document.body.style.overflow = 'hidden';
					},
					onClosed:function(){
						document.body.style.overflow = $overflow;
					},
					onComplete:function(){
						$.colorbox.resize();
					}
				};

				$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
				$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
				$(document).one('ajaxloadstart.page', function(e) {
					$('#colorbox, #cboxOverlay').remove();
			   });
			})

		</script>	
	</body>
</html>
<style type="text/css">
	#modal-editar .modal-dialog  {width:90%;}
	#modal-ver .modal-dialog  {width:90%;}
	#modal-mapa .modal-dialog  {width:90%;}
</style>

		
