<?php
include_once('conexion.php');
include_once("valida_sesion.php");
?>

<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $folio=$_POST['folio'];

    $id_tecnico=$_POST['id_tecnico'];

    $asignarTecnico="UPDATE tickets SET id_tecnico = $id_tecnico where folio = $folio;";

    $asignar=$conexion->query($asignarTecnico);

    if($asignar)  {
        echo " <script>   
                alert('... Empleado Actualizado Correctamente ... ');
                </script>";
    }
    else
    {
        echo " <script>   
                alert('... No fue posible actualizar al empleado, verifique por favor... ');
            </script>";
    }
 }

?>


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
<table border="2px">
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
    
    $resultado = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket;");
    while ($comentario = mysqli_fetch_object($resultado)) {
        $tecnicos =mysqli_query($conexion, "SELECT nombre, id, especialidad FROM usuarios WHERE id_rol = '3';");
                ?>
        <tbody>
            <th><?php echo($comentario->nombre); ?></th>
            <th><?php echo($comentario->email); ?></th>
            <th><?php echo($comentario->folio);?></th>
            <th><?php echo($comentario->fecha);?></th>
            <th><?php echo($comentario->des);?></th>
            <th><?php echo($comentario->estado);?></th>
            <th name="folio"><?php echo($comentario->proyecto);?></th>
            <th>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <?php if($resultado->num_rows > 0){?>
                        <select name="id_tecnico">
                            <?php
                            while ($fila = $tecnicos->fetch_assoc()){ 
                                $id_a= $fila['id'];
                                ?>
                                
                                    <option value="<?php echo $id_a;?>" ><?php echo $fila['nombre']." | "; echo $fila['especialidad']; ?></option>
                                    
                                
                                <?php } ?>
                            <input type="hidden" name="folio" value="<?php echo($comentario->folio);?>">
                            <input type="submit" value="asignar">
                            
                            
                            
                        </select> 
                    <?php } ?>
                </form>
            </th>  
   

            <th name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt="" width="100%"></th>
            <th><input type="button" value="Mostrar mas" ></th>
            <th><a href="eliminar.php?id=<?php echo($comentario->folio); ?>">Eliminar</a></th>


    </tbody>
       
        <?php
    }

    ?>
</table>
    
<button class="ui-btn">
    <span>
    <a href="../php/usuario.php">USUARIOS</a>
    </span>
</button>

</body>
</html>