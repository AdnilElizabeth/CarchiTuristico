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
	// verificar existencia
	if(isset($_POST['existencia_tipo_atractivo'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_atractivo_turistico WHERE ESTADO=1 and NOMBRE='$_POST[reg]'");	
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
	// guardar tipo atractivo
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO tipo_atractivo_turistico VALUES('$id','$_POST[txt_1]','$_POST[txt_2]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	
	// eliminar tipo atractivo
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE tipo_atractivo_turistico SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar parroquias
	if(isset($_POST['editar_tipo_a'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE tipo_atractivo_turistico SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

	// editar canton parroquias
	if(isset($_POST['editar_canton_parroquia'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE tipo_atractivo_turistico SET cod_canton='$_POST[valor]' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, P.NOMBRE,P.CODIGO FROM tipo_atractivo_turistico P, categoria_atractivo_turistico C WHERE P.ESTADO='1' AND P.id_categoria=C.CODIGO");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, P.NOMBRE,P.CODIGO FROM tipo_atractivo_turistico P, categoria_atractivo_turistico C WHERE P.ESTADO='1' AND P.id_categoria=C.CODIGO AND P.CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
	 	}
	 	print_r(json_encode($acu));
	}
 ?>