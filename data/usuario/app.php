<?php 
require('../../admin/class.php');
$class=new constante();

	// verificar existencia
		if(isset($_POST['existencia_nombre_usuario'])) {
		$resultado = $class->consulta("SELECT * FROM usuario u, usuario1 u1 WHERE u.ESTADO=1 and u1.estado=1 and u.nombre='$_POST[reg]'");
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
		if(isset($_POST['existencia_usuario'])) {
		$resultado = $class->consulta("SELECT * FROM usuario u, usuario1 u1 WHERE u.ESTADO=1 and u1.estado=1 and u1.usuario='$_POST[reg1]'");
		$acu=0;
		while ($row=$class->fetch_array($resultado)) {					
			$acu=1;
	 	}
	 	print$acu;
	}
	// guardar usuario
	if(isset($_POST['guardar'])) {
		$id=$class->idz();
		$id2=$class->idz();
		$id3=$class->idz();
		$fecha=$class->fecha_hora();
		$resultado = $class->consulta("INSERT INTO usuario VALUES('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]',1,'$fecha')");	
		if (!$resultado) {
			print('1');
		}else{
			print('0');
		}
		$res= $class->consulta("INSERT INTO usuario1 VALUES('$id2','$_POST[txt_4]',md5('$_POST[txt_6]'),'$_POST[txt_5]','$id',1,'$fecha')");	
		$res= $class->consulta("INSERT INTO privilegios VALUES('$id3','$id','{0,0,0,0,0,0,0,0,0,0}')");
	}
		// editar nombre
	if(isset($_POST['editar_nombre'])) {
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

if(isset($_POST['editar_telefono'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario SET telefono='$valor' WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	if(isset($_POST['editar_direccion'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario SET direccion=upper('$valor') WHERE codigo='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
		if(isset($_POST['editar_nombre_usuario'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario1 SET usuario=upper('$valor') WHERE id_usuario='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	if(isset($_POST['editar_tipo_usuario'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario1 SET tipo_usuario=upper('$valor') WHERE id_usuario='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}		
	}
	if(isset($_POST['editar_clave'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$valor=$_POST['valor'];
			$resultado = $class->consulta("UPDATE usuario1 SET clave='$valor' WHERE id_usuario='$_POST[id]'");	
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
			$resultado1 = $class->consulta("UPDATE usuario1 SET estado=0 WHERE id_usuario='$_POST[id]'");	
		if (!$resultado) {
			print('0');
		}else{
			print('1');
		}	

	}
// llenar tabla
	if (isset($_POST['llenar'])) {
		$resultado = $class->consulta("SELECT u.nombre, u1.usuario, u1.tipo_usuario, u.codigo from usuario u, usuario1 u1 where u1.estado=1 and u.codigo=u1.id_usuario;");	
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
		$resultado = $class->consulta("SELECT u.nombre, u.telefono, u.direccion, u1.usuario, u1.tipo_usuario, u1.clave from usuario u, usuario1 u1 where u1.estado=1 and u.codigo=u1.id_usuario and u.codigo='$_POST[id]'");	
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$acu[]=$row[0];
			$acu[]=$row[1];
			$acu[]=$row[2];
			$acu[]=$row[3];
			$acu[]=$row[5];
			$acu[]=$row[4];
	 	}
	 	print_r(json_encode($acu));
	}
	
 ?>
