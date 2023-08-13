<?php
// Iniciar la sesión
session_start();

//revisa la sesion
if(!($_SESSION["id_rol"])=='3'){

    header("location:login.php");
}