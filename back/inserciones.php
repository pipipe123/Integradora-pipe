<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
     //Desactivar las noticias y mostrar los errores
     error_reporting(E_ALL ^ E_NOTICE);

     //1.- Conectarse a la BD
     include_once("conexion.php");
     //2.- Traer los datos del formulario
     $nombre=$_POST['nombre'];
     $pass=$_POST['pass'];
     $email=$_POST['email'];
     $tipo=$_POST['tipo-usuario'];
     $proyecto=$_POST['proyecto'];


    
        // echo "nombre: ".$nombre."<br>";
        //   echo "pass: ".$pass."<br>";
        //   echo "email: ".$email."<br>";
        //   echo "proyecto: ".$proyecto."<br>";
        //   echo "tipo: ".$tipo."<br>";


    switch ($tipo) {
        case 'cliente':
            $sql="insert into cliente values(null,'$nombre','$email','$pass','$proyecto')";

            break;

        case 'tecnico':
            // $sql="insert into programador values(null,'$nombre','$email','$pass',null,null)";
            $sql="insert into programador (id_programador,nombre,pass,email,n_tickets,lider_de_proyecto) values          (null,'$nombre','$pass','$email',null,null)";
                
            break;

        case 'administrador':
            //$sql="insert into administrador values(null,'$nombre','$email','$pass')";
            $sql="insert into administrador(id_admin, nombre, Email,Clave) values(null,'$nombre','$email','$pass')";
            break;
        }
                // print($sql);
    $ejecutar_sql=$conexion->query($sql);

         
    if ($ejecutar_sql)
    {
       echo " <script>   
                alert('... Usuario $tipo Agregado Correctamente ... ');
             </script>";
    }
    else
    {
    echo " <script>   
             alert('... No fue posible agregar al usuario $tipo  verifique por favor... ');
          </script>";
    }
}

?>

