<?php
require('../admin/class.php');
$class=new constante();
session_start();
if (isset($_POST['login_usuario'])) {
	$usuario=$_POST['usuarios'];
	$password=$_POST['claves'];
	$resultado = $class->consulta("	SELECT U1.USUARIO, U1.ID_USUARIO, U1.TIPO_USUARIO, U.NOMBRE 
									from usuario1 U1, usuario U 
									where U1.ID_USUARIO=U.CODIGO AND U1.ESTADO=1 AND U1.USUARIO='".$usuario."' AND U1.CLAVE=MD5('".$password."');
");
	$acu[0]=0;
	while ($row=$class->fetch_array($resultado)) {					
		$acu[0]=1;
		$_SESSION['id']=$row[1];
		$_SESSION['nombre']=$row[3];
		$_SESSION['usuario']=$row[0];
		$acu[1]=$row[3];
		$_SESSION["autentificado"]="SI";
	}
	print_r(json_encode($acu));
}
?>
