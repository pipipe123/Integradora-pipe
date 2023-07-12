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
     $proyecto=$_POST['proyecto'];
     $tipo=$_POST['tipo-usuario'];


    
        // echo "nombre: ".$nombre."<br>";
        //   echo "pass: ".$pass."<br>";
        //   echo "email: ".$email."<br>";
        //   echo "proyecto: ".$proyecto."<br>";
        //   echo "tipo: ".$tipo."<br>";


    switch ($tipo) {
        case 'cliente':
            $sql="insert into cliente values(null,'$nombre','$email','$pass','$proyecto')";
            echo " <script>   
            alert('cuenta .$tipo. agregada correctamente');
         </script>";
            break;

            case 'tecnico':
                $sql="insert into programador values(null,'$nombre','$email','$pass',null,null)";
                echo " <script>   
                alert('cuenta .$tipo. agregada correctamente');
             </script>";
                    break;

                case 'administrador':
                    $sql="insert into administrador values(null,'$nombre','$email','$pass')";
                    echo " <script>   
                    alert('cuenta .$tipo. agregada correctamente');
                 </script>";   
            break;

        default:
            echo " <script>   
            alert('algo salio mal');
            </script>";
        break;
    }
}

?>

