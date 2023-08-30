<?php

//revisa la sesion

if(($_SESSION['id_rol'])!=='2'){
    header("location:login.php");
}