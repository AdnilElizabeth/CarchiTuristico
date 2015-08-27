<?php 
// Menu cabecera

function menu_cabecera(){
	print'
	<div class="navbar-container" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="index.html" class="navbar-brand">
					<i class="menu-icon fa fa-desktop"></i>
					Administrador
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-black">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="../../dist/avatars/user.jpg" alt="Jasons Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							Jason
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#">
								<i class="ace-icon fa fa-cog"></i>
								Settings
							</a>
						</li>

						<li>
							<a href="profile.html">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
	';
}

// menu lateral
function menu_lateral(){
	print'
	<div id="sidebar" class="sidebar responsive">
				

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-home"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-cutlery"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-picture-o"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>						
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="../inicio/index.php">
							<i class="menu-icon fa fa-dashboard"></i>
							<span class="menu-text"> Carchi </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="../alojamiento/">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Alojamiento </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="../comidas_bebidas/">
							<i class="menu-icon fa fa-cutlery"></i>
							<span class="menu-text"> Comidas y Bebidas </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="../atractivos/">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Atractivos </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Configuración </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../tipo_alojamiento/">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Alojamiento
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="../tipo_comidas_bebidas/">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo, Comidas y bebidas
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../tipo_atractivo/">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo, Atractivos
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
				
			</div>

	';
}


?>