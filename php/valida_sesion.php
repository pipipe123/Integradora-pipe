<?php
// Iniciar la sesión
session_start();

//revisa la sesion
if(isset($_SESSION["id_usuario"])){
    $id_usuario= $_SESSION['id_usuario'];
}else{
    echo("No existe una sesion activa");
    // header("location:login.php");
}

?>
