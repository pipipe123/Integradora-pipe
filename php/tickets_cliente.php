<?php
include_once('conexion.php');
include_once('valida_sesion.php');
$sql="SELECT * from tickets where id_usuario = $id_usuario";

$busqueda="SELECT * from pruebas where ";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/tecnico.css">
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
            <h1>TICKETS CREADOS</h1>
        </header>
        <div class="usuario">
            <a href="" id="atras"><img src="../img/usuarios.jpeg" alt="" for="atras"></a>
        </div>
        
          <table border="2px" id="tickets-table"> 
    <thead>
        <tr>
            <th>Número de Ticket</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Imagen</th>
            <th>Proyecto</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    
    <?php
    include_once("conexion.php");
    
    $resultado = mysqli_query($conexion, $sql);

    while ($comentario = mysqli_fetch_object($resultado)) {
                ?>
                <form action="actualizarticket.php" method="POST">
        <tbody>
            <td><?php echo($comentario->folio); ?></td>
            <td><?php echo($comentario->des);?></td>
            <td name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt=""></td>
            <td><?php echo($comentario->estado);?></td>
            <td name="folio"><?php echo($comentario->proyecto);?></td>
            <input type="hidden" name="finalizar" value="Finalizado">
            <input type="hidden" name="folio" value="<?php echo($comentario->folio); ?>">
            <td><input type="submit" value="Finalizar" class="enviar"></th>
            

        </tbody>
    </form>
        <?php
    }

    ?>
</table>

  <center><button><a href="cierra_sesion.php">Cerrar sesion</a></button></center>
    </div>
</body>
</html>