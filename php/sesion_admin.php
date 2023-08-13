<?php
// Iniciar la sesión
session_start();

//revisa la sesion
if(!($_SESSION["id_rol"])=='admin'){

    header("location:login.php");
}