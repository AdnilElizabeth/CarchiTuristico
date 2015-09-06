<?php 
require('../../admin/class.php');
$class=new constante();
	// busqueda tipo alojamiento
	if(isset($_POST['llenar_tipo_alojamiento'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_alojamiento WHERE ESTADO=1");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}	

	if(isset($_POST['llenar_tipo_alojamiento_select'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_alojamiento WHERE ESTADO=1");
		$acu;
		while ($row=$class->fetch_array($resultado)) {		
			$arr = array('id' => $row[0], 'text' => $row[1]);
			$acu[]=$arr;
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
						<img width="100" height="100" alt="150x150" src="'.$row[1].'" />
						
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
						<img width="100" height="100" alt="150x150" src="'.$row[1].'" />
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

	if (isset($_POST['obj_guardar'])) {
		$carpeta = 'img/';
		if (!file_exists($carpeta)) {
		    mkdir($carpeta, 0777, true);
		}
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO alojamiento VALUES('$id','$_POST[sel_tipo]',upper('$_POST[txt_nombre]'),upper('$_POST[txt_propietario]'),upper('$_POST[txt_direccion]'),'$_POST[txt_latitud]','$_POST[txt_longitud]','$_POST[sel_categoria]','$_POST[txt_nhab]','$_POST[txt_nplazas]','$_POST[txt_telf]','$_POST[txt_correo]','$_POST[txt_web]','$_POST[descripcion]','img','$_POST[sel_parroquia]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}			
		$carpetaDestino=$carpeta;
		for($i=0;$i<count($_FILES['txt_fotos']['name']);$i++)
        { 
        	$extension=$_FILES["txt_fotos"]["name"][$i];
        	$extension=(string)$extension;
        	$e=explode('.', $extension);
        	$id_img=$class->idz();

            $origen=$_FILES["txt_fotos"]["tmp_name"][$i];
            $destino=$carpetaDestino.$id_img.'.'.$e[1];				
            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {
            	//guardando
            	$resultado = $class->consulta("INSERT INTO FOTOGRAFIAS_ALOJAMIENTO VALUES('$id_img','$destino','$id','1','$fecha')");	
				if (!$resultado) {
					print('1');
				}else{
					print('0');
				}

            }
        }


	}
	if (isset($_POST['obj_guardar_nuevo'])) {
		$carpeta = 'img/';
		if (!file_exists($carpeta)) {
		    mkdir($carpeta, 0777, true);
		}
		$carpetaDestino=$carpeta;
		for($i=0;$i<count($_FILES['txt_fotos2']['name']);$i++)
        { 
        	$extension=$_FILES["txt_fotos2"]["name"][$i];
        	$extension=(string)$extension;
        	$e=explode('.', $extension);
        	$id_img=$class->idz();
        	$fecha=$class->fecha_hora();

            $origen=$_FILES["txt_fotos2"]["tmp_name"][$i];
            $destino=$carpetaDestino.$id_img.'.'.$e[1];				
            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {
            	//guardando
            	$resultado = $class->consulta("INSERT INTO FOTOGRAFIAS_ALOJAMIENTO VALUES('$id_img','$destino','$_POST[txt_id_alojamiento_img]','1','$fecha')");	
				if (!$resultado) {
					print('1');
				}else{
					print('0');
				}

            }
        }


	}

	
		if(isset($_POST['llenar_canton2'])) {
		$resultado = $class->consulta("SELECT * FROM cantones WHERE ESTADO=1");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {		
			$arr = array('id' => $row[0], 'text' => $row[1]);
			$acu[]=$arr;
		}
		print_r(json_encode($acu));
	}

	if(isset($_POST['llenar_tipo2'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_alojamiento WHERE ESTADO=1");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {		
			$arr = array('id' => $row[0], 'text' => $row[1]);
			$acu[]=$arr;
		}
		print_r(json_encode($acu));
	}

		// busqueda canton
	if(isset($_POST['llenar_canton'])) {
		$resultado = $class->consulta("SELECT * FROM cantones WHERE ESTADO=1");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}

	// busqueda parroquia
	if(isset($_POST['llenar_parroquia'])) {
		$id_canton=$_POST['id'];
		$resultado = $class->consulta("SELECT * FROM parroquias WHERE ESTADO=1 and cod_canton='$id_canton'");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}

	// verificar existencia
	if(isset($_POST['existencia_alojamiento'])) {
		$resultado = $class->consulta("SELECT * FROM alojamiento WHERE ESTADO=1 and nombre='$_POST[reg]' and tipo_alojamiento='$_POST[reg1]' and id_parroquia='$_POST[reg2]'");
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
		// guardar alojamiento
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO alojamiento VALUES('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_4]','$_POST[txt_5]','$_POST[txt_6]','$_POST[txt_7]','$_POST[txt_8]','$_POST[txt_9]','$_POST[txt_10]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_13]','$_POST[txt_14]','$_POST[txt_15]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	// eliminar alojamiento
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE alojamiento SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	if(isset($_POST['eliminar_imgs'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE fotografias_alojamiento SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

		// editar alojamiento tipo
	if(isset($_POST['editar_tipo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE alojamiento SET tipo_alojamiento='$_POST[valor]' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento nombre
	if(isset($_POST['editar_nombre'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// editar alojamiento propietario
	if(isset($_POST['editar_propietario'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET PROPIETARIO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// editar alojamiento direccion
	if(isset($_POST['editar_direccion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET DIRECCION=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento LONGITUD
	if(isset($_POST['editar_longitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET LONGITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento LATITUD
	if(isset($_POST['editar_latitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET LATITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	if(isset($_POST['editar_lon_lat'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
		$valor1=$_POST['valor1'];
			$resultado = $class->consulta("UPDATE alojamiento SET LONGITUD=upper('$valor'), LATITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento categoria
	if(isset($_POST['editar_categoria'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET categoria=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento habitaciones
	if(isset($_POST['editar_habitaciones'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET n_hab='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento PLAZAS
	if(isset($_POST['editar_plazas'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET n_plazas='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento TELEFONO
	if(isset($_POST['editar_telefono'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET TELEFONO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento CORREO
	if(isset($_POST['editar_correo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET CORREO='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento WEB
	if(isset($_POST['editar_web'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET SITIO_WEB='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar alojamiento DESCRIPCION
	if(isset($_POST['editar_descripcion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE alojamiento SET DESCRIPCION='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, P.NOMBRE, A.CODIGO FROM ALOJAMIENTO A, TIPO_ALOJAMIENTO T, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO_ALOJAMIENTO= T.CODIGO AND A.ID_PARROQUIA=P.CODIGO");	
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
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, A.PROPIETARIO, C.NOMBRE, P.NOMBRE, A.DIRECCION, A.LATITUD, A.LONGITUD, A.CATEGORIA, A.N_HAB, A.N_PLAZAS, A.TELEFONO, A.CORREO, A.SITIO_WEB, A.DESCRIPCION, A.FOTO FROM ALOJAMIENTO A, TIPO_ALOJAMIENTO T, CANTONES C, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO_ALOJAMIENTO=T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON=C.CODIGO AND A.CODIGO='$_POST[id]'");	
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