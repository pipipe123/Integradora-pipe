<?php
include("sesion_admin.php");
include_once("conexion.php");
$sql = "select * from usuarios";

$ejecucion_sql = $conexion->query($sql);
$rol=0;
if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
$sql = "select * from usuarios";
$num_registros=@mysqli_num_rows($ejecucion_sql);
$registros= '50';
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio= (($pagina-1)*$registros);
else
$inicio=0;
$busqueda = mysqli_query($conexion, "select * from usuarios limit $inicio, $registros;");

$paginas=ceil($num_registros/$registros);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>▷ Engrane Digital: Usuarios</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/admins.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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
  <h5>USUARIOS</h5>
  <table id="usuarios">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Tipo</th>
      
      <th colspan="2">Acciones</th>
    </tr>
        <?php while ($fila = $busqueda->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>

                <td><?php echo $fila['email']; ?></td>
                <td><?php switch( $fila['id_rol']){
                    case 1:
                        echo "Admin";
                        break;
                        case 2:
                            echo "Cliente";
                            break;
                            case 3:
                                echo "Tecnico";
                                break;
                } ?></td>

                <td><a href='actualizar.php?id=<?php echo $fila['id']; ?>'>ACTUALIZAR</a></td>
                <td><a href='eliminarUsuario.php?id=<?php echo $fila['id']; ?>'>ELIMINAR</a></td>

            </tr>
        <?php } ?>
  </table>
  <center><button><a href="admin.php">atrás</a></button></center>
  
  <br>
</div>
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
            echo "<a class='page-link' aria-label='Previous' href='../php/usuario.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Anterior</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='../php/usuario.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='../php/usuario.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='../php/usuario.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Siguiente</span></a>
            </li>";
            ?>
        </ul>
    </div>
</body>
</html>