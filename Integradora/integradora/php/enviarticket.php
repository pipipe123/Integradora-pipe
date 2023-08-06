<?php
 include_once("conexion.php");
 include_once("valida_sesion.php");

$proyecto=$_POST['proyecto'];
$des=$_POST['des'];
$img =addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
$folio = "null";
// Se revisa que los datos enviados no sean codigos malisiosos

$proyecto = mysqli_real_escape_string($conexion, $proyecto);
$des = mysqli_real_escape_string($conexion, $des);
//toma los datos del ticket para insertarlos en la tabla pero no se como tomar el id del cliente para insertarlo
$resultado = mysqli_query($conexion, "INSERT INTO tickets(descripcion,estado, proyecto, id_usuario) values ('$des','activo','$proyecto', '$id_usuario')");
$query="INSERT INTO pruebas VALUES ('null','$id_usuario', '$img')";
$res=$conexion->query($query);
//solo es para ver si jalo
if ($resultado) {
    header("location:../html/index.html");
}else {
    echo('No se pudo generar el ticket');
}
mysqli_close($conexion);
?>