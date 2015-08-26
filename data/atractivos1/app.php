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
		// guardar Atractivo
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO atractivo_turistico VALUES('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_4]','$_POST[txt_5]','$_POST[txt_6]','$_POST[txt_7]','$_POST[txt_8]','$_POST[txt_9]','$_POST[txt_10]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_13]',1,'$fecha')");	
		if (!$resultado) {
			print($resultado);
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
	// editar atractivo_turistico nombre
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

	// editar atractivo_turistico tipo
	if(isset($_POST['editar_tipo_alojamiento'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE atractivo_turistico SET tipo_alojamiento='$_POST[valor]' WHERE codigo='$_POST[id]'");	
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
		$resultado = $class->consulta("SELECT S.NOMBRE, A.NOMBRE, P.NOMBRE, A.CODIGO  from ATRACTIVO_TURISTICO A, SUBTIPO_ATRACTIVO_TURISTICO S, PARROQUIAS P WHERE A.ESTADO=1 AND A.ID_SUBTIPO=S.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND A.CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
	 	}
	 	print_r(json_encode($acu));
	}
 ?>
