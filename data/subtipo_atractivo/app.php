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
	// verificar existencia
	if(isset($_POST['existencia_subtipo_atractivo'])) {
		$resultado = $class->consulta("SELECT * FROM subtipo_atractivo_turistico WHERE ESTADO=1 and NOMBRE='$_POST[reg]'");	
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
	// guardar subtipo atractivo
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO subtipo_atractivo_turistico VALUES('$id','$_POST[txt_1]','$_POST[txt_2]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}		
	}
	
 ?>
