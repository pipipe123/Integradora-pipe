<?php

include_once("conexion.php");
$sql = "select * from usuarios";

$ejecucion_sql = $conexion->query($sql);
$rol=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>▷ Engrane Digital: Usuarios</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
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
        <?php while ($fila = $ejecucion_sql->fetch_assoc()) { ?>
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

</body>
</html>