<?php 
require('../../admin/class.php');
$class=new constante();
	// busqueda tipo alojamiento
	if(isset($_POST['llenar_tipo_alojamiento'])) {
		$resultado = $class->consulta("SELECT * FROM TIPO_ALOJAMIENTO WHERE ESTADO=1");		
		print'<option>Seleccionar</option>';
		while ($row=$class->fetch_array($resultado)) {					
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
	 	}
	}
	
 ?>
