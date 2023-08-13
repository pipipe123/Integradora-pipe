
<?php
include_once('conexion.php');
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <th>Pruebas</th>
            <th>Tecnico</th>
            <th>Prioridad</th>
            <th colspan="2">Acciones</th>

        </tr>
    </thead>
    
    <?php
    include_once("conexion.php");
    
    $resultado = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket;");
    while ($comentario = mysqli_fetch_object($resultado)) {
        $tecnicos =mysqli_query($conexion, "SELECT nombre, id, especialidad FROM usuarios WHERE id_rol = '3';");
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <tbody>
            <th><?php echo($comentario->nombre); ?></th>
            <th><?php echo($comentario->email); ?></th>
            <th><?php echo($comentario->folio);?></th>
            <th><?php echo($comentario->fecha);?></th>
            <th><?php echo($comentario->des);?></th>
            
            <th>
                <?php echo($comentario->estado);?>
                <select name="estado">
                    <option value="Activo">Activo</option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Cancelado">Cancelado</option>
                </select> 
                 <input type="hidden" name="folio" value="<?php echo($comentario->folio);?>">
            </th>
            <th name="folio"><?php echo($comentario->proyecto);?></th>
            <th name="folio"> <img src="data:image/jpg;base64,<?php echo base64_encode($comentario->imagen);?>" alt="" width="100%"></th>
            
            <th>
                
                    <?php if($resultado->num_rows > 0){?>
                        <select name="id_tecnico">
                            <?php
                            while ($fila = $tecnicos->fetch_assoc()){ 
                                $id_a= $fila['id'];
                                ?>
                                
                                    <option value="<?php echo $id_a;?>" ><?php echo $fila['nombre']." | "; echo $fila['especialidad']; ?></option>
                                    
                                
                                <?php } ?>
                            <input type="hidden" name="folio" value="<?php echo($comentario->folio);?>">
                            
                            
                            
                        </select> 
                    <?php } ?>
            
            </th>  
            <th>
                        <select name="prioridad">
                            
                            
                            <option value="Alta">Alta</option>
                            <option value="Baja">Baja</option>
                        </select> 
                        <input type="hidden" name="folio" value="<?php echo($comentario->folio);?>">
                            
                
            </th>  
            <th><input type="submit" value="asignar"></th>
            </form>
            <th><a href="eliminar.php?id=<?php echo($comentario->folio); ?>">Eliminar</a></th>


    </tbody>
       
        <?php
    }

    ?>
</table>
</div>
<div align="center">
<button> <a href="usuario.php">USUARIOS</a></button>

<button><center><a href="cierra_sesion.php">Cerrar sesion</a></center></button>
</div>

</body>
</html>
<script src="../js/alertas.js"></script>
<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $folio=$_POST['folio'];
    $prioridad=$_POST['prioridad'];
    $id_tecnico=$_POST['id_tecnico'];
    $estado=$_POST['estado'];
    $asignarTecnico="UPDATE tickets SET id_tecnico = $id_tecnico, prioridad = '$prioridad', estado = '$estado' where folio = $folio;";

    $asignar=$conexion->query($asignarTecnico);

    if ($asignar)
   {
      ?><script>   
         actualizado()
         </script><?php
   }  
   else
   {
    ?><script>   
    actualizadont()
    </script><?php
   }
 }

?>