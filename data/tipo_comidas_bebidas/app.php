<?php 
require('../../admin/class.php');
$class=new constante();

	// verificar existencia
	if(isset($_POST['existencia_tipo_comidas'])) {
		$resultado = $class->consulta("SELECT * FROM tipo_comidas_bebidas WHERE ESTADO=1 and NOMBRE='$_POST[reg]'");	
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
	// guardar tipo alojamiento
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO tipo_comidas_bebidas VALUES('$id','$_POST[txt_1]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	// eliminar tipo alojamiento
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE tipo_comidas_bebidas SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar tipo alojamiento
	if(isset($_POST['editar_tipo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE tipo_comidas_bebidas SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT NOMBRE, CODIGO FROM tipo_comidas_bebidas WHERE ESTADO=1");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT NOMBRE, CODIGO FROM tipo_comidas_bebidas WHERE ESTADO='1' AND CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
	 	}
	 	print_r(json_encode($acu));
	}
 ?>
