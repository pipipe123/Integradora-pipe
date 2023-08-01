<?php
echo("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

 include_once("conexion.php");
$nombre=$_POST['name'];
$proyecto=$_POST['proyecto'];
$des=$_POST['des'];

// Se revisa que los datos enviados no sean codigos malisiosos

$nombre = mysqli_real_escape_string($conexion, $nombre);
$proyecto = mysqli_real_escape_string($conexion, $proyecto);
$des = mysqli_real_escape_string($conexion, $des);

$resultado = mysqli_query($conexion, "INSERT INTO tickets(descripcion, proyecto, nombre) values ('$des','$proyecto','$nombre')");

if ($resultado) {
    echo('ticket generado con exito');
}else {
    echo('No se pudo generar el ticket');
}
mysqli_close($conexion);
?>