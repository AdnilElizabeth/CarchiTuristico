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
	
 ?>
