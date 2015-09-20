<?php 
require('../../admin/class.php');
$class=new constante();
	// busqueda tipo comidas

	if(isset($_POST['edicion_imagenes1'])) {
		$resultado = $class->consulta("SELECT F.* FROM COMIDAS_BEBIDAS A, FOTOGRAFIAS_COMIDAS_BEBIDAS F WHERE F.ESTADO=1 AND F.ID_COMIDAS_BEBIDAS=A.CODIGO AND F.ID_COMIDAS_BEBIDAS='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {		
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/comidas_bebidas/'.$row[1].'" />
						
					</div>
				</li>
			';
		}
		print'</ul>';
	}

	if(isset($_POST['edicion_imagenes'])) {
		$resultado = $class->consulta("SELECT F.* FROM COMIDAS_BEBIDAS A, FOTOGRAFIAS_COMIDAS_BEBIDAS F WHERE F.ESTADO=1 AND F.ID_COMIDAS_BEBIDAS=A.CODIGO AND F.ID_COMIDAS_BEBIDAS='$_POST[id]'");
		$acu=0;
		print'<ul class="ace-thumbnails clearfix">';
		while ($row=$class->fetch_array($resultado)) {		
			print'
				<li>
					<div>
						<img width="100" height="100" alt="150x150" src="../../data/comidas_bebidas/'.$row[1].'" />
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
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, P.NOMBRE, A.DIRECCION, A.CODIGO FROM COMIDAS_BEBIDAS A, TIPO_COMIDAS_BEBIDAS T, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO= T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON='20150413153432552c2858816e7'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
			$acu[]=$row[4];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, A.PROPIETARIO, C.NOMBRE, P.NOMBRE, A.DIRECCION, A.LATITUD, A.LONGITUD, A.CATEGORIA, A.N_MESAS, A.N_PLAZAS, A.TELEFONO, A.CORREO, A.SITIO_WEB, A.DESCRIPCION, A.FOTO FROM COMIDAS_BEBIDAS A, TIPO_COMIDAS_BEBIDAS T, CANTONES C, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO=T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON=C.CODIGO AND A.CODIGO='$_POST[id]'");	
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
	 	}
	 	print_r(json_encode($acu));
	}
 ?>