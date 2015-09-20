<?php 
require('../../admin/class.php');
$class=new constante();


	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, P.NOMBRE, A.DIRECCION, A.TELEFONO, A.CODIGO FROM ALOJAMIENTO A, TIPO_ALOJAMIENTO T, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO_ALOJAMIENTO= T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON='20150413153432552c2858816e7'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
			$acu[]=$row[4];
			$acu[]=$row[5];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, A.PROPIETARIO, C.NOMBRE, P.NOMBRE, A.DIRECCION, A.LATITUD, A.LONGITUD, A.CATEGORIA, A.N_HAB, A.N_PLAZAS, A.TELEFONO, A.CORREO, A.SITIO_WEB, A.DESCRIPCION, A.FOTO, A.precio FROM ALOJAMIENTO A, TIPO_ALOJAMIENTO T, CANTONES C, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO_ALOJAMIENTO=T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON=C.CODIGO AND A.CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
			$acu[]=$row[4];
			$acu[]=$row[5];
			$acu[]=$row[6];
			$acu[]=$row[7];
			$acu[]=$row[8];
			$acu[]=$row[9];
			$acu[]=$row[10];
			$acu[]=$row[11];
			$acu[]=$row[12];
			$acu[]=$row[13];
			$acu[]=$row[14];
			$acu[]=$row[15];
			$acu[]=$row[16];
	 	}
	 	print_r(json_encode($acu));
	}

		if(isset($_POST['edicion_imagenes1'])) {
		$resultado = $class->consulta("SELECT F.* FROM ALOJAMIENTO A, FOTOGRAFIAS_ALOJAMIENTO F WHERE F.ESTADO=1 AND F.ID_ALOJAMIENTO=A.CODIGO AND F.ID_ALOJAMIENTO='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {		
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/alojamiento/'.$row[1].'" />
						
					</div>
				</li>
			';
		}
		print'</ul>';
	}

	if(isset($_POST['edicion_imagenes'])) {
		$resultado = $class->consulta("SELECT F.* FROM ALOJAMIENTO A, FOTOGRAFIAS_ALOJAMIENTO F WHERE F.ESTADO=1 AND F.ID_ALOJAMIENTO=A.CODIGO AND F.ID_ALOJAMIENTO='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {		
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/alojamiento/'.$row[1].'" />
						<div class="text">
							<div class="inner" id="default-button">
								<button class="btn btn-white btn-yellow btn-sm btn-round" onclick=eliminar_img("'.$row[0].'")><i class="ace-icon fa fa-times bigger-120 blue"></i></button>
							</div>
						</div>
					</div>
				</li>
			';
		}
		print'</ul>';
	}
	if(isset($_POST['alojamientos'])) {
		$resultado = $class->consulta("SELECT F.* FROM ALOJAMIENTO A, FOTOGRAFIAS_ALOJAMIENTO F WHERE F.ESTADO=1 AND F.ID_ALOJAMIENTO=A.CODIGO AND F.ID_ALOJAMIENTO='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {		
			print'
			<div class="row">
                <div class="col-sm-6">
                    <div class="row bg-fondo_1">
                        <div class="col-sm-6">
                            <div class="row">
                                <h1>
                                CANTÓN TULCÁN
                                ESTABLECIMIENTOS
                                TURÍSTICOS DEL
                                CARCHI
                                </h1>
                            </div>
                            <div class="row">
                                <div class="jumbotron">
                                    <h1>MOTELES</h1>
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h3>lo1</h3>
                            <h3>lo2</h3>
                            <h3>lo4</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row bg-fondo_2">
                        <div class="col-sm-6">
                            <div class="row">
                                <h3>
                                CANTÓN TULCÁN
                                ESTABLECIMIENTOS
                                TURÍSTICOS DEL
                                CARCHI
                                </h3>
                            </div>
                            <div class="row">
                                <div class="jumbotron">
                                    <h5>MOTELES</h5>
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            locales
                        </div>
                    </div>
                </div>
            </div>

			';
		}
		print'</ul>';
	}
 ?>
