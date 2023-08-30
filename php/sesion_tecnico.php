<?php
session_start();
if(($_SESSION['id_rol'])!=='3'){

    header("location:login.php");
}

