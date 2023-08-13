<?php
include_once("valida_sesion.php");
include_once('sesion_admin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>▷ Engrane Digital: Usuarios</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/admins.css">
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

    <div class="content1">
<table align="center" id="tickets-table1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Proyecto</th>
            <th>Tecnico</th>
            <th></th>
            <th>Acciones</th>

        </tr>
    </thead>
    
<?php
    include_once("conexion.php");
    
    $resultado = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket;");

    while ($comentario = mysqli_fetch_object($resultado)) {
    
        
        // $query="select * from usuarios where id = '$id_user'";
        //         $resultado2=$conexion->query($query);
        //         $row = $resultado2->fetch_assoc();
                ?>
        <tbody>
            <th><?php echo($comentario->nombre); ?></th>
            <th><?php echo($comentario->email); ?></th>
            <th><?php echo($comentario->folio);?></th>
            <th><?php echo($comentario->fecha);?></th>
            <th><?php echo($comentario->des);?></th>
            <th><?php echo($comentario->estado);?></th>
            <th name="folio"><?php echo($comentario->proyecto);?></th>
            <th><?php echo($comentario->des);?></th>
            <th name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt=""></th>
            
            <th><a href="eliminar.php?id=<?php echo($comentario->folio); ?>">Eliminar</a></th>


    </tbody>
       
        <?php
    }

    ?>
</table>
</div>
<div align="center">
<button> <a href="../php/usuario.php">USUARIOS</a></button>

<button><center><a href="cerrar_sesion.php">cerrar sesion</a></center></button>
</div>

</body>
</html>