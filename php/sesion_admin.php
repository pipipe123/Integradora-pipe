<?php

//revisa la sesion
session_start();
if(($_SESSION['id_rol'])!=='1'){
    header("location:login.php");
}