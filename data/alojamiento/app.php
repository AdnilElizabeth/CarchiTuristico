<?php 
require('../../admin/class.php');
$class=new constante();
	// busqueda tipo alojamiento
	if(isset($_POST['llenar_tipo_alojamiento'])) {
		$resultado = $class->consulta("SELECT * FROM TIPO_ALOJAMIENTO WHERE ESTADO=1");	
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
 ?>
