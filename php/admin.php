
<?php

include_once('conexion.php');
// include_once("valida_sesion.php");
include_once('sesion_admin.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>▷ Engrane Digital: Usuarios</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/admins.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .container_card{
    margin: 0 auto;
    padding:  0px 20px 20px 20px;
    display: grid;
    /* width: 800px; */
    grid-template-columns: 1fr 1fr ;
    grid-gap:1em;
        /* grid-row-gap: 60px; */
}

.blog-post{
    position: relative;
    margin-bottom: 15px;
    margin: 30px;
}

.blog-post img{
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 10px;
    }

.blog-post .category{
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 10px 15px;
  font-size: 14px;    text-decoration: none;
    background-color: #e67e22;
    color: #fff;
    border-radius: 5px;
    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);
    text-transform: uppercase;
}
.text-content{
    position: absolute;
    bottom: -30px;
    padding: 20px;
    background-color: #fff;
    width: calc(100% - 20px);
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);
    padding-top: 50px;
}

.text-content h2{
    font-size: 20px;
    font-weight: 400;
    /* margin-bottom: 30px; */
}

.text-content img{
    height: 70px;
    width: 70px;
    border: 5px solid rgba(0,0,0,0.1);
    border-radius: 50%;
    position: absolute;
    top: -35px;
    left: 35px;
}

.tags a{
    color: #888;
    font-weight: 700;
    text-decoration: none;
    margin-right: 15px;
    transition: 0.3s ease;
}

.tags a:hover{
    color: #000;
}
@media screen and (max-width: 1100px) {
    .container_card{
        grid-template-columns: 1fr 1fr;
        grid-row-gap: 60px;
    }
}

@media screen and (max-width: 600px) {
    .container_card{
        grid-template-columns: 1fr;
        grid-row-gap: 60px;
    }
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

    <div class="content1">
<table align="center" id="tickets-table1">
<thead>
        <tr>
            <th colspan="1.5">Email</th>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Proyecto</th>
            <th>Imagen</th>
            <th>Tecnico</th>
            <th>Prioridad</th>
            <th colspan="2">Acciones</th>

        </tr>
    </thead>
    
    <?php
    include_once("conexion.php");
    


    ?>
    <!-- //paginacion -->
    <div class="center mt-5">
    <div class="card pt-3" >

        <div class="container-fluid p-2">
            <?php 
  if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $resultado = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket;");
            $num_registros=@mysqli_num_rows($resultado);
            $registros= '1';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
    $busqueda = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket limit $inicio, $registros;");

            $paginas=ceil($num_registros/$registros);
            
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)</h5>
    <!-- // if(!empty($_REQUEST["nume"])){
    //     $_REQUEST["nume"] = $_REQUEST["nume"];
    // }else{
    //     $_REQUEST["nume"]= "1";
    // }
    // //valida que la paginacion tenga algo, si no tiene algo la deja en 1 para evitar errores :D
    // $num_tickets=@mysqli_num_rows($resultado);
    // $registros= '8';//es la cantidad de registros que se mostrara por pagina
    // $pagina=$_REQUEST["nume"];
    // //esto evitara problemas pero no entendi como
    // if (is_numeric($pagina)){
    //     $inicio=(($pagina-1)*$registros);
    // }else{
    //     $inicio=0;
    // }

    // $busqueda = mysqli_query($conexion, "SELECT usuarios.nombre as nombre, usuarios.email as email, tickets.folio as folio, tickets.fecha as fecha, tickets.descripcion as des, tickets.estado as estado, tickets.proyecto as proyecto, pruebas.imagen as imagen, tickets.prioridad as prioridad from usuarios INNER JOIN tickets ON usuarios.id = tickets.id_usuario INNER JOIN pruebas ON tickets.folio = pruebas.folio_ticket limit $inicio, $registros;");
    // $paginas=ceil($num_tickets/$registros); -->
<?php
    while ($comentario = mysqli_fetch_object($busqueda)) {
        $tecnicos =mysqli_query($conexion, "SELECT nombre, id, especialidad FROM usuarios WHERE id_rol = '3';");
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <tbody>
            
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
                </div>
        </div>
</table>
<!-- aqui va la paginacion como tal -->
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
            echo "<a class='page-link' aria-label='Previous' href='../php/admin.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
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
            <li class='page-item'><a class='page-link' aria-label='Next' href='../php/admin.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>






<!-- tambien paginacion -->
<h1 align="center"> resultados ( <?php echo $num_registros?> )</h1>
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