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
        echo "
        <script>
        var accion = 'actualizado';
        var tipo = 'usuario';
        var lugar = 'cliente.php';
     </script>";
        if ($ejecutar_sql)
        {
            echo " <script src='../js/alertas.js'>   
                generalsi(accion,tipo,lugar)
                    </script> ";
        }
        else
        {
            echo " <script>   
            generalno(accion,tipo)
                </script>";
        }



  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/admin.css">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js'></script>
    <script src='../js/alertas.js'></script>
    <title>▷ Engrane Digital: Usuarios</title>
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


        

        <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $fila['nombre']  ?>">
        <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $fila['email']  ?>">
        <input type="password" placeholder="Contraseña" id="pass" name="pass" value="<?php echo $fila['pass']  ?>">
        

        <input type="submit" value="Enviar">


    </form>
    <a href="cliente.php">Atrás</a>
</div>
    
</body>
</html>

