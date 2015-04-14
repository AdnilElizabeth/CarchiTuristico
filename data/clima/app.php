<?php 
require('../../admin/class.php');
$class=new constante();

	// verificar existencia
	if(isset($_POST['existencia_clima'])) {
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
	
 ?>
