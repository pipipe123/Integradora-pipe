<?php
include_once('conexion.php');
$id=$_REQUEST['id'];
$sql="select * from usuarios where id='$id'";
// print($sql);
$ejecutar_sql=$conexion->query($sql);
if ($fila = $ejecutar_sql->fetch_assoc())
{
    //me guarda el registro en el objeto $fila
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>registro</title>
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


        <input type="button" value="Actualizar">

        <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $fila['nombre']  ?>">
        <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $fila['email']  ?>">
    
        <input type="hidden" name="id" value="<?php echo $fila['id']?>">

        <script>
            function validarEmail() {
                var email = document.getElementById("email").value;
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regex.test(email)) {
                    alert("El correo electrónico no es válido.");
                }
            }
        </script>





        <input type="submit" value="Enviar" onclick="">


    </form>
    <a href="usuario.php">Atrás</a>
</div>

<script>

</script>

</body>
</html>
<?php




if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // error_reporting(E_ALL ^ E_NOTICE);

    include_once('conexion.php');

    $nombre=$_POST['nombre'];
    $email=$_POST['email'];
    // $tipo=$_POST['id_rol'];
    // $proyecto=$_POST['proyecto'];

    $sql="update usuarios set nombre='$nombre', email='$email' where id=$id ";
    // print($sql);
    $ejecutar_sql=$conexion->query($sql);
    echo "   
    
    <script src='../js/alertas.js'></script>
    <script>
    var accion = 'actualizado';
    var tipo = 'usuario';
    var lugar = 'usuario.php';
</script>";
    if ($ejecutar_sql)
    {
        echo " <script>   
            generalsi(accion,tipo,lugar)
            </script>";
    }
    else
    {
        echo " <script>   
            generalno(accion,tipo)
            </script>";
    }
}
?>