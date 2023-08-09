<?php
include_once('conexion.php');
include_once("valida_sesion.php");
$busqueda="";
$sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON tickets.id_tecnico = usuarios.id INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario'";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $busqueda=$_POST['busqueda'];
if ($busqueda == "registrados") {
    $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY fecha DESC";
}
if ($busqueda=="nombre") {
    $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY nombre DESC";
}
if ($busqueda == "prioridad") {
    $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY prioridad";
}
if ($busqueda == "finalizados") {
    $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket AND  tickets.estado='finalizado' WHERE tickets.id_tecnico = '$id_usuario'";
}
if ($busqueda == "cancelado") {
    $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket AND  tickets.estado='cancelado' WHERE tickets.id_tecnico = '$id_usuario'";
}
}


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
        <form class="content-box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <img src="../img/registrados.png" alt="Registrados">
                <input type="text" value="registrados" style="display: none;" name="busqueda">

                <input type="submit" value="Fecha" name="registrados" onlyread>
            </div>
        </form>
        <form class="content-box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <img src="../img/asignados.jpg" alt="Registrados">
                <input type="text" value="nombre" style="display: none;" name="busqueda">

                <input type="submit" value="Nombre" name="nombre" onlyread>
            </div>
        </form>
        <form class="content-box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <img src="../img/proceso.jpeg" alt="Registrados">
                <input type="text" value="prioridad" style="display: none;" name="busqueda">

                <input type="submit" value="Prioridad" name="proceso" onlyread>
            </div>
        </form>
        <form class="content-box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <img src="../img/finalizados.jpg" alt="Registrados">
                <input type="text" value="finalizados" style="display: none;" name="busqueda">

                <input type="submit" value="Finalizados" name="finalizados" onlyread>
            </div>
        </form>
        <form class="content-box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
                <img src="../img/cancelados.png" alt="Registrados">
                <input type="text" value="cancelados" style="display: none;" name="busqueda">
                <input type="submit" value="Cancelados" name="registrados">
            </div>
        </form>

          <table id="tickets-table"> 
    <thead>
        <tr>
            <th>Número de Ticket</th>
            <th>Cliente</th>
            <th>Asunto</th>
            <th>Prioridad</th>
            <th>Imagen</th>
            <th>Estatus</th>
            <th>proyecto</th>
        </tr>
    </thead>
    
<?php
    include_once("conexion.php");
    
    $resultado = mysqli_query($conexion, $sql);

    while ($comentario = mysqli_fetch_object($resultado)) {
                ?>
        <tbody>
            <td><?php echo($comentario->folio); ?></td>
            <td><?php echo($comentario->nombre); ?></td>
            <td><?php echo($comentario->des);?></td>
            <td><?php echo($comentario->prioridad);?></td>
            <td name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt=""></td>
            <td><?php echo($comentario->estado);?></td>
            <td name="folio"><?php echo($comentario->proyecto);?></td>
            <td><button id="mas">Mostrar Mas</button></th>


    </tbody>
       
        <?php
    }

    ?>
</table>

    </div>
</body>
</html>