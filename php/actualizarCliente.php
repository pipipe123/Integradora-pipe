<?php
 include_once("valida_sesion.php");
include_once("conexion.php");
 $sql1 = mysqli_query($conexion, "select * from usuarios where id = '$id_usuario'");
//  $ejecutar_sql=$conexion->query($sql1);
 if ($fila = $sql1->fetch_assoc())
 {
     //me guarda el registro en el objeto $fila
 }

 if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
            //actualizar un registro de la BD
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        $sql="update usuarios set nombre='$nombre', email='$email', pass=md5('$pass') where id = '$id_usuario'";

        $ejecutar_sql=$conexion->query($sql);

        if ($ejecutar_sql)
        {
            echo " <script>   
                    alert('... Empleado Actualizado Correctamente ... ');
                    </script>";
        }
        else
        {
            echo " <script>   
                    alert('... No fue posible actualizar al empleado, verifique por favor... ');
                </script>";
        }

        echo "<script>
                    location.href='actualizarCliente.php';
                </script>";



  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion</title>
    <link rel="stylesheet" href="../css/actualiza.css">
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



    <div class="container">
    <div class="content">
        <h1 class="title">Mi cuenta</h1>
        <h2 class="subtitle">Si deseas realizar un cambio a tu cuenta ya establecida, ¡Aquí puedes realizarlo! Solo ingresa los nuevos datos de tu preferencia en el formulario.</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $fila['nombre'] ?>">
            <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $fila['email'] ?>">
            <input type="password" placeholder="Contraseña" id="pass" name="pass" value="<?php echo $fila['pass'] ?>">
            <input type="submit" value="Actualizar">
        </form>
        <a class="back-link" href="cliente.php">Atrás</a>
    </div>
    <div class="image">
        <!-- Agrega aquí tu imagen -->
        <img src="../img/actua.png" height="300px" width="300px">
    </div>
</div>







    
</body>
</html>

