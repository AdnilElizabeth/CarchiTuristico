<?php 
require('../../admin/class.php');
$class=new constante();
	// busqueda tipo comidas
	if(isset($_POST['llenar_tipo_comida'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_comidas_bebidas WHERE ESTADO=1");	
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
		$resultado = $class->consulta("INSERT INTO comidas_bebidas VALUES('$id','$_POST[sel_tipo]',upper('$_POST[txt_nombre]'),'$_POST[txt_propietario]','$_POST[txt_direccion]','$_POST[txt_latitud]','$_POST[txt_longitud]','$_POST[sel_categoria]','$_POST[txt_nhab]','$_POST[txt_nplazas]','$_POST[txt_telf]','$_POST[txt_correo]','$_POST[txt_web]','$_POST[descripcion]','img','$_POST[sel_parroquia]',1,'$fecha')");	
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
            	$resultado = $class->consulta("INSERT INTO FOTOGRAFIAS_comidas_bebidas VALUES('$id_img','$destino','$id','1','$fecha')");	
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
		$resultado = $class->consulta("SELECT * FROM tipo_comidas_bebidas WHERE ESTADO=1");	
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
	if(isset($_POST['existencia_comidas'])) {
		$resultado = $class->consulta("SELECT * FROM comidas_bebidas WHERE ESTADO=1 and nombre='$_POST[reg]' and tipo='$_POST[reg1]' and id_parroquia='$_POST[reg2]'");
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
		// guardar comidas_bebidas
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO comidas_bebidas VALUES('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_4]','$_POST[txt_5]','$_POST[txt_6]','$_POST[txt_7]','$_POST[txt_8]','$_POST[txt_9]','$_POST[txt_10]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_13]','$_POST[txt_14]','$_POST[txt_15]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	// eliminar comidas_bebidas
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE comidas_bebidas SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

		// editar comidas_bebidas tipo
	if(isset($_POST['editar_tipo_alojamiento'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE comidas_bebidas SET tipo_comidas_bebidas='$_POST[valor]' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas nombre
	if(isset($_POST['editar_nombre'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// editar comidas_bebidas propietario
	if(isset($_POST['editar_propietario'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET PROPIETARIO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// editar comidas_bebidas direccion
	if(isset($_POST['editar_direccion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET DIRECCION=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas LONGITUD
	if(isset($_POST['editar_longitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET LONGITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas LATITUD
	if(isset($_POST['editar_latitud'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET LATITUD=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas categoria
	if(isset($_POST['editar_categoria'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET categoria=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas habitaciones
	if(isset($_POST['editar_habitaciones'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET n_mesas='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas PLAZAS
	if(isset($_POST['editar_plazas'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET n_plazas='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas TELEFONO
	if(isset($_POST['editar_telefono'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET TELEFONO=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas CORREO
	if(isset($_POST['editar_correo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET CORREO='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas WEB
	if(isset($_POST['editar_web'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET SITIO_WEB='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar comidas_bebidas DESCRIPCION
	if(isset($_POST['editar_descripcion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE comidas_bebidas SET DESCRIPCION=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT T.NOMBRE, A.NOMBRE, P.NOMBRE, A.CODIGO FROM COMIDAS_BEBIDAS A, TIPO_COMIDAS_BEBIDAS T, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO= T.CODIGO AND A.ID_PARROQUIA=P.CODIGO");	
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
