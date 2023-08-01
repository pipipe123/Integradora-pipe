<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>▷ Engrane Digital: Usuarios</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/admin.css">
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
<table>
<?php
    include_once("conexion.php");

    $resultado = mysqli_query($conexion, "SELECT * FROM tickets");

    while ($comentario = mysqli_fetch_object($resultado)) {
        ?>
        <div class="content">
          <tr>
            <td><b><?php echo($comentario->nombre);?></b> <?php echo($comentario->fecha);?></td>
            <td></td>
          </tr>
        
        <br /><p><?php echo($comentario->descripcion);?></p>
        
        </div>
        
        <?php
    }

    ?>
</table>
    
<button class="ui-btn">
    <span>
    <a href="../php/usuarioQA.php">USUARIOS</a>
    </span>
</button>

</body>
</html>