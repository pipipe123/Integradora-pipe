<?php
include_once('conexion.php');
$sql = "select * from tickets";

$ejecucion_sql = $conexion->query($sql);

// obtener el numero de registros
$num_filas = $ejecucion_sql->num_rows;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico</title>
    <link rel="icon" href="img/logo.png" type="image/png">
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
            <h1>PANEL DE CONTROL</h1>
        </header>
        <div class="usuario">
            <a href="" id="atras"><img src="../img/usuarios.jpeg" alt="" for="atras"></a>
        </div>
        <form class="content-box">
            <div>
                <img src="../img/registrados.png" alt="Registrados">
                <a href="">Registrados</a>
            </div>
        </form>
        <form class="content-box">
            <div>
                <img src="../img/asignados.jpg" alt="Registrados">
                <a href="">Asignados</a>
            </div>
        </form>
        <form class="content-box">
            <div>
                <img src="../img/proceso.jpeg" alt="Registrados">
                <a href="">En Proceso</a>
            </div>
        </form>
        <form class="content-box">
            <div>
                <img src="../img/finalizados.jpg" alt="Registrados">
                <a href="">Finalizados</a>
            </div>
        </form>
        <form class="content-box">
            <div>
                <img src="../img/cancelados.png" alt="Registrados">
                <a href="">Cancelados</a>
            </div>
        </form>

        <table id="tickets-table">
            <tr>
              <th>Folio</th>
              <th>Fecha</th>
              <th>Asunto</th>
              <th>proyecto</th>
              <th>Prioridad</th>
              <th>Estatus</th>
            </tr>
            <?php while ($fila = $ejecucion_sql->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['folio']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['proyecto']; ?></td>
                <td><?php  ?>-</td>
                <td><?php echo $fila['estado']; ?></td>
            </tr>
        <?php } ?>
          </table>

    </div>
</body>
</html>