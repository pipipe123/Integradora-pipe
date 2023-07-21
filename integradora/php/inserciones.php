<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
     //Desactivar las noticias y mostrar los errores
    //  error_reporting(E_ALL ^ E_NOTICE);

     //1.- Conectarse a la BD
     include_once("conexion.php");
     //2.- Traer los datos del formulario
     $nombre=$_POST['nombre'];
     $pass=$_POST['pass'];
     $email=$_POST['email'];
     $tipo=$_POST['tipo'];
     $proyecto=$_POST['proyecto'];


    
        echo "nombre: ".$nombre."<br>";
          echo "pass: ".$pass."<br>";
          echo "email: ".$email."<br>";
          echo "proyecto: ".$proyecto."<br>";
          echo "tipo: ".$tipo."<br>";


        // user <-- solo puede visualizar
        // admin <-- crud

    switch ($tipo) {
        case 'cliente':
            $sql="insert into cliente values(null,'$nombre','$pass','$email','$proyecto','user')";
            echo "entre";
            break;

        case 'tecnico':
            // $sql="insert into programador values(null,'$nombre','$email','$pass',null,null)";
            $sql="insert into tecnico (id,nombre,contra,email,priv,especialidad) values(null,'$nombre','$pass','$email','admin',null)";
                
            break;

        case 'administrador':
            //$sql="insert into administrador values(null,'$nombre','$email','$pass')";
            $sql="insert into admin(id, nombre,contra , Email,priv) values(null,'$nombre','$email','$pass','admin')";
            break;
        }
                // print($sql);
    $ejecutar_sql=$conexion->query($sql);

         
    if ($ejecutar_sql)
    {
        $sql ="insert into usuarios(id, nombre, pass, email, tipo, proyecto) values(null,'$nombre','$pass','$email','$tipo','$proyecto')";
        $ejecutar_sql=$conexion->query($sql);
        echo "tambien";

        if($ejecutar_sql){
            echo " <script>   
            alert('...  usuario $tipo agregado correctamente... ');
            location.href='login.php';
         </script>";
         

        }   else
        {
        echo " <script>   
                 alert('... No fue posible agregar al usuario $tipo  verifique por favor... ');
              </script>";
              print($sql);
        }
    }
 
}

?>

