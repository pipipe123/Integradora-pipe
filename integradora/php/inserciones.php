<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
     //Desactivar las noticias y mostrar los errores
      error_reporting(E_ALL ^ E_NOTICE);

     //1.- Conectarse a la BD
     include_once("conexion.php");
     //2.- Traer los datos del formulario
     $nombre= $_POST['nombre'];
     $pass=$_POST['pass'];
     $email=$_POST['email'];
     $rol=$_POST['rol'];

        // user <-- solo puede visualizar
        // admin <-- crud

    switch ($rol) {
        case 'cliente':
            $sql="INSERT INTO usuarios VALUES (null,'$nombre','$pass','$email',2, 'user')";
            $ejecutar_sql=$conexion->query($sql);
            
            break;

        case 'tecnico':
            include_once("insertecnico.php");
            
            break;

        case 'admin':
            include_once("insertadmin.php");
            break;
        }
 }

?>

