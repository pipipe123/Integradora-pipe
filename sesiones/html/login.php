<?php 


//AQUI ENTRA DESPUES DE PRESIONAR EL BOTON DE SUBMIT
if ($_SERVER["REQUEST_METHOD"]=="POST"){
     include_once("../../back/conexion.php");

     
     $us=$_POST['nombre'];
     $ps=$_POST['pass'];
     $em=$_POST['email'];
     // echo $us." ".$ps;
     
     //Instruccion SQL sin encriptar
     $sql="select tipo from usuarios where nombre='$us' and pass='$ps' and email='$em'";
     // Conexión a la base de datos
    /*$servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "nombre_de_tu_base_de_datos";

    $conn = new mysqli($servername, $username, $password, $dbname);
    */
    // Verificar la conexión

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error); //<- si algo sale mal lo truena
    }

    $resultado = $conexion->query($sql);  //<- interpreta el query pasandolo de cadena a ya la consulta
    $tipo =""; // <- la inicializa en nada para evitar errores

    if($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()) {//<- es lo que trae el contenido del renglon
            # code...
            // print("tipo".$fila["tipo"]);
            $tipo =$fila["tipo"]; //fila es lo que trae los resultados de el renglon asociado [tipo] es lo que estaba buscando
        }
        switch ($tipo) {
            case 'cliente':
                header("location:../../vistas/Cliente/Cliente(semifinal)/Index.html");
                break;
                
            case 'tecnico':
                header("location:../../vistas/tecnico/tecnico.html");
                break;
                    
            case 'administrador':
                header("location:../../vistas/admin/integradora.html");
                break;
        }
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
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilos_login.css">
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
            <li>
                <a href="#" class="cabe">Más</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Opción 1</a></li>
                    <li><a href="#">Opción 2</a></li>
                    <li><a href="#">Opción 3</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Bienvenido al inicio de sesión</h1>
            <div class="atras">
                <a href="registrar.php" id="atras">

                    <img src="../img/descarga.png" alt="Estructura de una pagina Web" for="atras">
                </a>
            </div>
        </header>
        <form  method="POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  ">

            <input type="text" placeholder="Nombre" id="nombre" name="nombre">
            <input type="password" placeholder="Contraseña" id="contraseña" name="pass">
            <input type="email" placeholder="Email" id="email" name="email">

            <script>
                function validarEmail() {
                    var email = document.getElementById("email").value;
                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!regex.test(email)) {
                    
                        alert("El correo electrónico no es válido.");
                    }
                }
            </script>

            <input type="submit" value="Entrar" name="entrar" onclick="validarEmail()">
            <a href="lostpass.html" id="recPass">Recuperar contraseña</a>

        </form>
        


    </div>
</body>
</html>

