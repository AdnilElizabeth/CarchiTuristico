<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Imagen aleatoria</title>

//Creamos en la cabecera el siguiente código Javascript:
<script language="JavaScript">

// Indicamos el número de imagenes que se mostraran de manera aleatoria.
var numeroImagenes = 4 ;
// Calculamos un número aleatorio entre 1 y numeroImagenes
var numeroAleatorio = Math.floor(Math.random() * numeroImagenes ) + 1;

</script>

</head>

<body>

<p align="center">

<script language="JavaScript">

// Escribimos en el lugar de la página en el que deseemos mostrar la imagen
// aleatoria el siguiente código Javascript.
document.write('<imgmages/galeria' + numeroAleatorio + '.jpg">');

</script>

</p>

</body>
</html>