<?php
include_once('conexion.php');
include_once('valida_sesion.php');
// $sql="SELECT * from tickets where id_usuario = $id_usuario";
if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
$resultado = mysqli_query($conexion, "SELECT tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as descripcion, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket where id_usuario = $id_usuario;");
// $busqueda="SELECT * from pruebas where ";
$num_registros=@mysqli_num_rows($resultado);
$registros= '3';
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio= (($pagina-1)*$registros);
else
$inicio=0;

$busqueda=mysqli_query($conexion, "SELECT tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as descripcion, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket where id_usuario = $id_usuario limit $inicio, $registros;");
$paginas=ceil($num_registros/$registros);
?>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $folio=$_POST['folio'];
    $actualiza=mysqli_query($conexion,"UPDATE tickets SET estado = 'cancelado' where folio = $folio");

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
            <th colspan="2">acciones</th>
        </tr>
    </thead>
    
    <?php
    include_once("conexion.php");
    
    // $resultado = mysqli_query($conexion, $busqueda);
    // print "$busqueda";

    while ($comentario = mysqli_fetch_object($busqueda)) {
                ?>
        <tbody>
            <td><?php echo($comentario->folio); ?></td>
            <td><?php echo($comentario->fecha);?></td>
            <td><?php echo($comentario->descripcion);?></td>
            <td><?php echo($comentario->estado);?></td>
            <td name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt=""></td>
            <td name="folio"><?php echo($comentario->proyecto);?></td>
            <td><a href='actualizar_ticket.php?id=<?php echo($comentario->folio) ?>'> >actualizar</a></td>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="folio" value="<?php echo($comentario->folio);?>">
                <td><input type="submit" value="cancelar"></td>
            </form>

        </tbody>
    </form>
        <?php
    }

    ?>
</table>
<div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='../php/admin.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Anterior</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='../php/admin.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='../php/admin.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='../php/admin.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Siguiente</span></a>
            </li>";
            ?>
        </ul>
    </div>
  <center><button><a href="cliente.php">Atras</a></button></center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>