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

	// buscar categoria atractivos2
	if(isset($_POST['llenar_categoria2'])) {
	$resultado = $class->consulta("SELECT * FROM categoria_atractivo_turistico WHERE ESTADO=1");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {		
			$arr = array('id' => $row[0], 'text' => $row[1]);
			$acu[]=$arr;
		}
		print_r(json_encode($acu));
	}
	// buscar categoria atractivos2
	if(isset($_POST['llenar_tipo2'])) {
		$resultado = $class->consulta(" SELECT C.* FROM tipo_atractivo_turistico P, categoria_atractivo_turistico C, subtipo_atractivo_turistico S 
										WHERE S.ESTADO='1' AND P.id_categoria=C.CODIGO AND S.id_tipo=P.codigo AND S.CODIGO='$_POST[id]'");
		$acu;
		while ($row1=$class->fetch_array($resultado)) {	
			$dcacu=$row1[0];
			$res = $class->consulta("SELECT * FROM TIPO_ATRACTIVO_TURISTICO T, CATEGORIA_ATRACTIVO_TURISTICO C WHERE T.ESTADO=1 AND T.ID_CATEGORIA=C.CODIGO AND C.CODIGO='$dcacu'");
			while ($row=$class->fetch_array($res)) {
				$arr = array('id' => $row[0], 'text' => $row[1]);
				$acu[]=$arr;
			}
		}
		print_r(json_encode($acu));
	}
	// buscar categoria atractivos2
	if(isset($_POST['llenar_tipo3'])) {		
		$acu;		
		$res = $class->consulta("SELECT * FROM TIPO_ATRACTIVO_TURISTICO T, CATEGORIA_ATRACTIVO_TURISTICO C WHERE T.ESTADO=1 AND T.ID_CATEGORIA=C.CODIGO AND T.ID_CATEGORIA='$_POST[id]'");
		while ($row=$class->fetch_array($res)) {
			$arr = array('id' => $row[0], 'text' => $row[1]);
			$acu[]=$arr;
		}
		print_r(json_encode($acu));
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
	// eliminar parroquias
	if(isset($_POST['eliminar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
			$resultado = $class->consulta("UPDATE subtipo_atractivo_turistico SET estado=0 WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar subtipo texto no SELECT
	if(isset($_POST['editar_subtipo'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE subtipo_atractivo_turistico SET NOMBRE=upper('$valor') WHERE codigo='$_POST[idindex]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	// editar parroquias
	if(isset($_POST['editar_parroquia'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE subtipo_atractivo_turistico SET NOMBRE=upper('$valor') WHERE codigo='$_POST[id]'");	
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
			$resultado = $class->consulta("UPDATE subtipo_atractivo_turistico SET cod_canton='$_POST[valor]' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}

	// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, P.NOMBRE, S.nombre, S.CODIGO FROM tipo_atractivo_turistico P, categoria_atractivo_turistico C, subtipo_atractivo_turistico S WHERE S.ESTADO='1' AND P.id_categoria=C.CODIGO AND S.id_tipo=P.codigo order by P.nombre");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
	 	}
	 	print_r(json_encode($acu));
	}
	// buscar id tipo categoria con relacion tipo
	if (isset($_POST['id_tipo_categoria_relacion'])) {
		$resultado = $class->consulta("SELECT T.ID_CATEGORIA FROM TIPO_ATRACTIVO_TURISTICO T WHERE CODIGO='$_POST[id]'");	
		while ($row=$class->fetch_array($resultado)) {					
			print $row[0];	
	 	}
	 	// print($acu);
	}
	
	// llenar tabla
	if (isset($_POST['datos_editar'])) {
		$resultado = $class->consulta("SELECT C.NOMBRE, P.NOMBRE, S.nombre, S.CODIGO, P.ID_CATEGORIA, S.ID_TIPO FROM tipo_atractivo_turistico P, categoria_atractivo_turistico C, subtipo_atractivo_turistico S WHERE S.ESTADO='1' AND P.id_categoria=C.CODIGO AND S.id_tipo=P.codigo AND S.CODIGO='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {					
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[4];
			$acu[]=$row[5];
	 	}
	 	print_r(json_encode($acu));
	}
	
 ?>
