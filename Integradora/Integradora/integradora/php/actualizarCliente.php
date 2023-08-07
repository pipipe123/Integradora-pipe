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
    <title>Document</title>
</head>
<body>
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

