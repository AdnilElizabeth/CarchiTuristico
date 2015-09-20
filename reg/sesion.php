<?php
	//error_reporting(0);
	include 'conexion.php';
	
	session_start();
	$myusername=$_POST['txtuser'];
	$mypassword=$_POST['txtclave'];
	
	//Obtengo la version encriptada del password
    //$pw_enc = encrypt($mypassword,"macroequipos");
	
	/////consulta//////
	 $resultado = pg_query($con, "SELECT * FROM usuario1 where usuario='".$myusername."' and clave='".$mypassword."' and estado='"."1"."'");
		  if (!$resultado) { 
		  echo "<b>Error de busqueda</b>"; 
		  exit;
		  }
		  
		  $filas=pg_numrows($resultado); 
		  if ($filas==0) {?>
			  <script language="javascript" type="text/javascript">
        document.location.href="index.html";
        alert('Sus Datos son Incorrectos. Intente nuevamente');
    </script>
               <?php
               } 
                else
               {
              session_start();
              $_SESSION["autentificado"]="si";
			  $_SESSION["usuario"] = $filas[1];
			  header("location:../data/inicio/index.php");
			  
               }

?>
