<?php
 include_once("conexion.php");
$nombre=$_POST['name'];
$proyecto=$_POST['proyecto'];
$des=$_POST['des'];

//Obtiene el id de la sesión si existe
if(isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
    // Se revisa que los datos enviados no sean codigos malisiosos
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $proyecto = mysqli_real_escape_string($conexion, $proyecto);
    $des = mysqli_real_escape_string($conexion, $des);
    //toma los datos del ticket para insertarlos en la tabla pero no se como tomar el id del cliente para insertarlo
    $resultado = mysqli_query($conexion, "INSERT INTO tickets(descripcion, proyecto, nombre, id_usuario) values ('$des','$proyecto','$nombre', '$id_usuario')");
    //solo es para ver si jalo
    if ($resultado) {
        echo('ticket generado con exito');
    }else {
        echo('No se pudo generar el ticket');
    }
    mysqli_close($conexion);
}else{

    echo('No se ha iniciado sesión');
}


?>