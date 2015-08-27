<?php 
require('../../admin/class.php');
$class=new constante();
		// busqueda categoria atractivos
	if(isset($_POST['llenar_categoria_atractivo'])) {
		$resultado = $class->consulta("SELECT * FROM categoria_atractivo_turistico WHERE ESTADO=1");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}	
	if (isset($_POST['obj_guardar'])) {
		$carpeta = 'img/';
		if (!file_exists($carpeta)) {
		    mkdir($carpeta, 0777, true);
		}
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		// $resultado = $class->consulta("INSERT INTO atractivo_turistico VALUES('$id','$_POST[sel_tipo_a]',upper('$_POST[txt_nombre]'),'$_POST[txt_propietario]','$_POST[txt_direccion]','$_POST[txt_latitud]','$_POST[txt_longitud]','$_POST[sel_categoria]','$_POST[txt_nhab]','$_POST[txt_nplazas]','$_POST[txt_telf]','$_POST[txt_correo]','$_POST[txt_web]','$_POST[descripcion]','img','$_POST[sel_parroquia]',1,'$fecha')");	
		$resultado = $class->consulta("INSERT INTO atractivo_turistico VALUES('$id', upper('$_POST[txt_nombre]'), upper('$_POST[txt_propietario]'),upper('$_POST[txt_direccion]'),'$_POST[txt_latitud]','$_POST[txt_longitud]','$_POST[txt_telf]','$_POST[txt_correo]','$_POST[txt_web]','$_POST[sel_clima]','$_POST[descripcion]','img','$_POST[sel_subtipo]','$_POST[sel_parroquia]',1,'$fecha')");	


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

	// busqueda tipo atractivo	
	if(isset($_POST['llenar_tipo_a'])) {
		$id_categoria=$_POST['id'];
		$resultado = $class->consulta("SELECT * FROM tipo_atractivo_turistico WHERE ESTADO=1 and id_categoria='$id_categoria'");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}
	

		// busqueda subtipo atractivo	
	if(isset($_POST['llenar_subtipo'])) {
		$id_tipo_a=$_POST['id'];
		$resultado = $class->consulta("SELECT * FROM subtipo_atractivo_turistico WHERE ESTADO=1 and id_tipo='$id_tipo_a'");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}
	// busqueda clima
	if(isset($_POST['llenar_clima'])) {
		$resultado = $class->consulta("SELECT * FROM clima WHERE ESTADO=1");	
		print'<option value="">Seleccionar</option>';	
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
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
	if(isset($_POST['existencia_atractivo'])) {
		$resultado = $class->consulta("SELECT * FROM atractivo_turistico WHERE ESTADO=1 and nombre='$_POST[reg]' and id_subtipo='$_POST[reg1]' and id_parroquia='$_POST[reg2]'");
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
		$resultado = $class->consulta("INSERT INTO atractivo_turistico VALUES('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_4]','$_POST[txt_5]','$_POST[txt_6]','$_POST[txt_7]','$_POST[txt_8]','$_POST[txt_9]','$_POST[txt_10]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_13]','$_POST[txt_14]','$_POST[txt_15]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	// eliminar atractivo_turistico
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE atractivo_turistico SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

		// editar alojamiento tipo
	if(isset($_POST['editar_subtipo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE atractivo_turistico SET tipo_alojamiento='$_POST[valor]' WHERE codigo='$_POST[id]'");	
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
			$resultado = $class->consulta("UPDATE atractivo_turistico SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
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
			$resultado = $class->consulta("UPDATE atractivo_turistico SET PROPIETARIO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// editar atractivo_turistico direccion
	if(isset($_POST['editar_direccion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET DIRECCION=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico LONGITUD
	if(isset($_POST['editar_longitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET LONGITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico LATITUD
	if(isset($_POST['editar_latitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET LATITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico categoria
	if(isset($_POST['editar_categoria'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET categoria=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico habitaciones
	if(isset($_POST['editar_habitaciones'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET n_hab='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico PLAZAS
	if(isset($_POST['editar_plazas'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET n_plazas='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico TELEFONO
	if(isset($_POST['editar_telefono'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET TELEFONO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico CORREO
	if(isset($_POST['editar_correo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET CORREO='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico WEB
	if(isset($_POST['editar_web'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET SITIO_WEB='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar atractivo_turistico DESCRIPCION
	if(isset($_POST['editar_descripcion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE atractivo_turistico SET DESCRIPCION=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT S.NOMBRE, A.NOMBRE, P.NOMBRE, A.CODIGO  from ATRACTIVO_TURISTICO A, SUBTIPO_ATRACTIVO_TURISTICO S, PARROQUIAS P WHERE A.ESTADO=1 AND A.ID_SUBTIPO=S.CODIGO AND A.ID_PARROQUIA=P.CODIGO");	
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
