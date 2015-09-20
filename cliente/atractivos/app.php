<?php 
require('../../admin/class.php');
$class=new constante();
		// busqueda categoria atractivos
if(isset($_POST['edicion_imagenes1'])) {
		$resultado = $class->consulta("SELECT F.* FROM atractivo_turistico A, FOTOGRAFIAS_atractivos F WHERE F.ESTADO=1 AND F.ID_atractivo=A.CODIGO AND F.ID_atractivo='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/atractivos/'.$row[1].'" />
					</div>
				</li>
			';
		}
		print'</ul>';
	}

	if(isset($_POST['edicion_imagenes'])) {
		$resultado = $class->consulta("SELECT F.* FROM atractivo_turistico A, FOTOGRAFIAS_atractivos F WHERE F.ESTADO=1 AND F.ID_atractivo=A.CODIGO AND F.ID_atractivo='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/atractivos/'.$row[1].'" />
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

	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT S.NOMBRE, A.NOMBRE, P.NOMBRE, A.CODIGO  from ATRACTIVO_TURISTICO A, SUBTIPO_ATRACTIVO_TURISTICO S, PARROQUIAS P WHERE A.ESTADO=1 AND A.ID_SUBTIPO=S.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON='20150413153432552c2858816e7'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, T.NOMBRE, S.NOMBRE, A.NOMBRE, A.PROPIETARIO, CT.NOMBRE, P.NOMBRE, A.DIRECCION, A.LATITUD, A.LONGITUD, CL.NOMBRE, A.TELEFONO, A.CORREO, A.SITIO_WEB, A.DESCRIPCION, A.ACTIVIDADES, A.ESTADO_CONSERVACION, A.RUTAS, A.POBLADO, A.PARA_QUIEN, A.CONTACTO, A.ALOJAMIENTO, A.ALIMENTACION, A.ATRACTIVOS_CERCANOS, A.PRECIO FROM ATRACTIVO_TURISTICO A, SUBTIPO_ATRACTIVO_TURISTICO S, TIPO_ATRACTIVO_TURISTICO T, CATEGORIA_ATRACTIVO_TURISTICO C, PARROQUIAS P, CANTONES CT, CLIMA CL WHERE A.ESTADO=1 AND A.ID_SUBTIPO=S.CODIGO AND S.ID_TIPO=T.CODIGO AND T.ID_CATEGORIA=C.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON=CT.CODIGO AND A.ID_CLIMA=CL.CODIGO AND A.CODIGO='$_POST[id]'");	
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
			$acu[]=$row[17];
			$acu[]=$row[18];
			$acu[]=$row[19];
			$acu[]=$row[20];
			$acu[]=$row[21];
			$acu[]=$row[22];
			$acu[]=$row[23];
			$acu[]=$row[24];
	 	}
	 	print_r(json_encode($acu));
	}
 ?>
