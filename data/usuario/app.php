<?php 
require('../../admin/class.php');
$class=new constante();

	// verificar existencia
	if(isset($_POST['existencia_usuario'])) {
		$resultado = $class->consulta("SELECT * FROM clima WHERE ESTADO=1 and NOMBRE='$_POST[reg]'");	
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
	// guardar clima
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO clima VALUES('$id','$_POST[txt_1]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
		// editar clima
	if(isset($_POST['editar_clima'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

	// eliminar clima
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE usuario SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT NOMBRE, CODIGO FROM clima WHERE ESTADO='1'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
	 	}
	 	print_r(json_encode($acu));
	}
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, C.CODIGO FROM clima C WHERE C.ESTADO='1' AND C.CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
	 	}
	 	print_r(json_encode($acu));
	}
	
 ?>
