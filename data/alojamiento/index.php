<?php require('../menu/index.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Administrador</title>

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
			<?php menu_cabecera(); ?>
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php menu_lateral() ?>
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

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-6">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Registro Alojamiento</h5>

										<div class="widget-toolbar">
											<div class="widget-menu">
												<a href="#" data-action="settings" data-toggle="dropdown">
													<i class="ace-icon fa fa-bars"></i>
												</a>											
											</div>

											<a href="#" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>

											<a href="#" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>									
										</div>
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<div></div>
											<form class="form-horizontal" name="form-guardar" id="form-guardar" enctype="multipart/form-data">
												<h4 class="header orange">Información General</h4>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Tipo:</label>
													<div class="col-xs-12 col-sm-9">
														<select id="sel_tipo" name="sel_tipo" data-placeholder="Seleccione Tipo">
															
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nombre:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="txt_nombre" id="txt_nombre" style='text-transform:uppercase;' class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Propietario:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="txt_propietario" id="txt_propietario" style='text-transform:uppercase;' class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<h4 class="header orange">Ubicación</h4>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Cantón:</label>

													<div class="col-xs-12 col-sm-9">
														<select id="sel_canton" name="sel_canton">								
														</select>
													</div>													
												</div>	
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Parroquia:</label>

													<div class="col-xs-12 col-sm-9">
														<select id="sel_parroquia" name="sel_parroquia"></select>
													</div>													
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Dirección:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="txt_direccion" id="txt_direccion" style='text-transform:uppercase;' class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<center><div class="hidden-sm hidden-xs action-buttons">
														<button class="btn btn-white btn-info btn-bold" type="button" id="btn_mapa">
															<i class="ace-icon fa fa-globe bigger-120 blue"></i>
															Mapa
														</button>

													</div></center>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Longitud:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="number" name="txt_longitud" id="txt_longitud" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Latitud:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="number" name="txt_latitud" id="txt_latitud" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<h4 class="header orange">Detalles</h4>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Categoría:</label>

													<div class="col-xs-12 col-sm-9">
														<select id="sel_categoria" name="sel_categoria">
															<option value="">Seleccionar</option>
															<option value="UNA ESTRELLAS">UNA ESTRELLA</option>
															<option value="DOS ESTRELLAS">DOS ESTRELLAS</option>
															<option value="TRES ESTRELLAS">TRES ESTRELLAS</option>
															<option value="CUATRO ESTRELLAS">CUATRO ESTRELLAS</option>
															<option value="CINCO ESTRELLAS">CINCO ESTELLAS</option>
														</select>
													</div>													
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">N° habitaciones:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="number" name="txt_nhab" id="txt_nhab" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">N° plazas:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="number" name="txt_nplazas" id="txt_nplazas" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Teléfono:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input name="txt_telf" id="txt_telf" type="tel" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Correo:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input name="txt_correo" type="email" id="txt_correo" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Sitio Web:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input name="txt_web" id="txt_web" type="url" class="col-xs-12 col-sm-10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment">Descripción:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<textarea class="col-xs-12 col-sm-10" name="descripcion" id="descripcion" ></textarea>
														</div>
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fotografia:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input multiple="multiple" type="file" id="txt_fotos" name="txt_fotos[]" accept="image/*" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment"></label>
													<input type="hidden" name="obj_guardar">
													<div class="col-xs-12 col-sm-9">
														<button class="btn btn-inverse btn-next" data-last="Finish">
															Guardar
															<i class="ace-icon fa fa-save icon-save"></i>
														</button>
													</div>
												</div>										
											</form>
										</div>
									</div>
								</div>								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							<div class="col-xs-6">
								<!-- PAGE CONTENT BEGINS -->
								
								<table id="tabla-informacion" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center" width="60px">
													<i class="fa fa-list-ol"></i>
												</th>
												<th>Tipo</th>
												<th>Nombre</th>
												<th>Parroquia</th>
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

			<div id="modal-editar" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header no-padding">
							<div class="table-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
								</button>
								Actualizar Alojamiento
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
												<input type="hidden" id="txt_id_alojamiento">
												<span class="editable" id="select_tipo">Tipo</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Nombre: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_nombre" >..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Propietario: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_propietario">..</span>
												
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
												<span class="editable" id="select_canton">Cantón</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Parroquia: </div>

											<div class="profile-info-value" >
												<span class="editable" id="select_parroquia">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Dirección: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_direccion">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Longitud: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_longitud">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Latitud: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_latitud">..</span>
												
											</div>
										</div>
										<span class="col-sm-4">
												<label class="pull-right inline">
													<button type="button" class="btn btn-white btn-primary" id="btn_mapa_editar">Mapa</button>
												</label>
										</span><!-- /.col -->
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
												<span class="editable" id="select_categoria">Categoría</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> N° Hab.: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_habitaciones">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> N° Plazas: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_plazas">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Teléfono: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_telefono">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Correo: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_correo">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Sitio Web: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_web">..</span>
												
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Descripción: </div>

											<div class="profile-info-value" >
												<span class="editable" id="lbl_descripcion">..</span>
												
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

											<span class="col-sm-4">
												<label class="pull-right inline">
													<button type="button" class="btn btn-white btn-primary" id="btn_nuevo">Nuevo</button>
												</label>
											</span><!-- /.col -->
										</h3>

									<div id="obj_img"></div>
								</div>
							</div>							
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
			<div id="img_nuevo" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header no-padding">
							<div class="table-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
								</button>
								Registro imagenes
							</div>
						</div>
						<div class="modal-body padding">
							<form class="form-horizontal" name="form-guardar_nuevo" id="form-guardar_nuevo" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fotografia:</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="hidden" name="txt_id_alojamiento_img" id="txt_id_alojamiento_img">
											<input multiple="multiple" type="file" id="txt_fotos2" name="txt_fotos2[]" accept="image/*" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment"></label>
									<input type="hidden" name="obj_guardar_nuevo">
									<div class="col-xs-12 col-sm-9">
										<button class="btn btn-inverse btn-next" data-last="Finish">
											Guardar
											<i class="ace-icon fa fa-save icon-save"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

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