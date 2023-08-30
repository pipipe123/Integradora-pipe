<?php 
$entrar="";
//AQUI ENTRA DESPUES DE PRESIONAR EL BOTON DE SUBMIT

session_start();

//verificar que existan las variables de inicio de sesion 
if (isset($_SESSION))
{
   session_destroy();
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
     include_once("conexion.php");
    
    session_start();
    
     $us=$_POST['nombre'];
     $ps=$_POST['pass'];
     // echo $us." ".$ps;
     
     //Instruccion SQL sin encriptar
     $sql="select id_rol, id from usuarios where pass = md5('$ps') and nombre ='$us' or pass = md5('$ps') and email= '$us'";

    // Verificar la conexión

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error); //<- si algo sale mal lo truena
    }
    $id_usuario =0;
    $resultado = $conexion->query($sql);  //<- interpreta el query pasandolo de cadena a ya la consulta
    $tipo =""; // <- la inicializa en nada para evitar errores

    if($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()) {//<- es lo que trae el contenido del renglon
            # code...
            // print("tipo".$fila["tipo"]);
            
           
            $id_usuario = $fila["id"];
            $tipo =$fila["id_rol"]; //fila es lo que trae los resultados de el renglon asociado [tipo] es lo que estaba buscando
            $_SESSION["id_usuario"]=$id_usuario;
            $_SESSION['id_rol']=$tipo;
        }
        switch ($tipo) {
            case '2':
                $entrar="acceso";

                break;
                
            case '3':
                $entrar="acceso1";

                break;
                    
            case '1':
                $entrar="acceso2";

                break;
        }
    }else{
       $entrar="no";
    }
    
    //   if($sql){
    //      $tipo= $sql;
    //      echo "$tipo";
    //   }
        //Instruccion SQL encriptada
        // print($sql);

    $conexion->close(); //<- hay que cerrar la conexion para evitar pedos
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_login.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <title>Login</title>
</head>
<body>

    <div class="header">
        <a href="https://engranedigital.com/">
            <img src="https://engranedigital.com/wp-content/uploads/2018/09/Engrane_digital_logo_2.png" alt="Engranito" width="350px" height="100px">
        </a>
        <ul class="menu">
            <li><a href="https://engranedigital.com/" class="cabe">Home</a></li>
            <li><a href="https://engranedigital.com/guias-engrane/index.html" class="cabe">Guias</a></li>
            <li><a href="https://engranedigital.com/nosotros/index.html" class="cabe">Nosotros</a></li>
            <li><a href="https://engranedigital.com/contacto/index.html" class="cabe">Contacto</a></li>
        </ul>
    </div>
    
    <div class="content">
        <header>
            <h1 style="color: black">Bienvenido al inicio de sesión</h1>

        </header>
        <form  method="POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  ">

            <input type="text" placeholder="Ingrese nombre o email" id="nombre" name="nombre">
            <input type="password" placeholder="Contraseña" id="contraseña" name="pass">

            

            <input type="submit" value="Entrar" name="entrar" onclick="validarEmail()">
            <a href="../html/lostpass.html" id="recPass">Recuperar contraseña</a>
            <a href="registrar.php">Registrate</a>

        </form>
        


    </div>
</body>
</html>

<?php include_once("alertas.php"); ?>
