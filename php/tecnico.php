<?php
include_once('conexion.php');
include_once('sesion_tecnico.php');
include_once('valida_sesion.php');


if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
$registros= '2';
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio= (($pagina-1)*$registros);
else
$inicio=0;
$sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario'";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $busqueda=$_POST['busqueda'];// aqui hay algo

    if ($busqueda == "registrados") {
        $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY fecha";
    }
    if ($busqueda=="nombre") {
        $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY nombre";
    }
    if ($busqueda == "prioridad") {
        $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket WHERE tickets.id_tecnico = '$id_usuario' ORDER BY prioridad ";
    }
    if ($busqueda == "finalizados") {
        $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket AND  tickets.estado='finalizado' WHERE tickets.id_tecnico = '$id_usuario' ";
    }
    if ($busqueda == "Cancelados") {
        $sql="SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket AND  tickets.estado='cancelado' WHERE tickets.id_tecnico = '$id_usuario' ";
    }
}

$resultado_total = mysqli_query($conexion, $sql);
$resultado = mysqli_query($conexion, $sql." limit $inicio, $registros;");
$num_registros=@mysqli_num_rows($resultado_total);
$paginas=ceil($num_registros/$registros);



print $busqueda."<br>";
print $registros."<br>";
print $num_registros."<br>";


// aqui voy a meter el paginado




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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    /* Cambiar el color del texto de la página activa */
    .custom-pagination .page-item.active .page-link {
        color: black; 
    }

    /* Cambiar el fondo del botón de página activa */
    .custom-pagination .page-item.active .page-link {
        background-color: rgb(231, 206, 255); 
    }

    /* Cambiar el color del texto de los botones de página no activos */
    .custom-pagination .page-item:not(.active) .page-link {
        color: white; 
    }

    /* Cambiar el fondo de los botones de página no activos */
    .custom-pagination .page-item:not(.active) .page-link {
        background-color: rgb(100, 61, 136); 
    }
</style>

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
                <input type="text" value="Cancelados" style="display: none;" name="busqueda">
                <input type="submit" value="Cancelados" name="registrados">
            </div>
        </form>

          <table border="2px" id="tickets-table"> 
    <thead>
        <tr>
            <th>Número de Ticket</th>
            <th>Cliente</th>
            <th>Asunto</th>
            <th>Prioridad</th>
            <th>Imagen</th>
            <th>Estatus</th>
            <th>proyecto</th>
            <th>acciones</th>
        </tr>
    </thead>
    
    <?php
    include_once("conexion.php");
    

    while ($comentario = mysqli_fetch_object($resultado)) {
                ?>
                <form action="actualizarticket.php" method="POST">
        <tbody>
            <td><?php echo($comentario->folio); ?></td>
            <td><?php echo($comentario->nombre); ?></td>
            <td><?php echo($comentario->des);?></td>
            <td><?php echo($comentario->prioridad);?></td>
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
<div class="container-fluid col-12">
    <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0 custom-pagination" style="float: none;">
    <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='../php/tecnico.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Anterior</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='../php/tecnico.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='../php/tecnico.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='../php/tecnico.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Siguiente</span></a>
            </li>";
            ?>
    </ul>
</div>

  <center><button><a href="cierra_sesion.php">Cerrar sesion</a></button></center>
    </div>
</body>
</html>