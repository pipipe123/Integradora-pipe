<?php
    include_once("valida_sesion.php");
    include_once("conexion.php");
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    error_reporting(E_ERROR | E_PARSE);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../css/cliente.css">
    <link rel="icon" href="../img/logo.png" type="image/png">

</head>


<?php
    // include_once('sesiones_cliente.php');
    $_SESSION['id_ticket']=$_REQUEST['id'];
    $id = $_SESSION['id_ticket'];
    $sql="select * from tickets where folio='$id'";
    // print $sql;
    $busqueda=mysqli_query($conexion,$sql);
  
   if ($fila = $busqueda-> fetch_assoc())
    {
      //me guarda el registro en el objeto $fila
    }
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
    //$id = $_SESSION['id_ticket'];
        //echo(' ' .$_POST['id']);
        $proyecto = $_POST['proyecto'];
        $des = $_POST['des'];
        $id = $_POST['id'];
        $img = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        
        // Se revisa que los datos enviados no sean códigos maliciosos
        $_SESSION['id_usuario'];
        $proyecto = mysqli_real_escape_string($conexion, $proyecto);
        $des = mysqli_real_escape_string($conexion, $des);
        
        // Insertar el ticket en la tabla
        $query = "UPDATE tickets SET descripcion = '$des', proyecto = '$proyecto' where folio = $id";
        $resultado = mysqli_query($conexion, $query);
        $folio=$id;
        // Insertar la prueba en la tabla
        $query_prueba = "UPDATE pruebas set  imagen = '$img' where folio_ticket = $id";
        $res = mysqli_query($conexion, $query_prueba);
        
        // Verificar si las inserciones fueron exitosas
        echo      "<script>
        var accion = 'actualizado';
        var tipo = 'ticket';
        var lugar = 'tickets_cliente.php';
    </script>";

    }
?>

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
<!-- Este es planeado para actualizar la informacion del cliente pero todavia no tengo nada -->
<div id="user">
    <a href="actualizarCliente.php">Cuenta</a>
</div>
   
<div id="ticket">
    <h1>¿Algún Problema?</h1>
    <p>No te preocupes, cuéntanos a nosotros con la creación de tu ticket y te brindaremos al mejor equipo de soporte técnico para resolverlo.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="formulario" method="POST" enctype="multipart/form-data">
   
    <br>
    <h3>Proyecto</h3>
    <input name="proyecto" id="proyecto" cols="100" rows="10" maxlength="500" placeholder="Ingrese el proyecto del problema" value=<?php echo $fila['proyecto'] ?>></input>
    <br>
    <h3>Descripcion</h3>
    <textarea name="des" id="des" cols="100" rows="10" maxlength="500" placeholder="Describa su problema"  ><?php echo $fila['descripcion'] ?></textarea>
    <br>
    <label  for="imagen" class="adjuntar-imagen">Adjuntar imagen:</label>
    <input type="file" id="imagen" name="Imagen" class="input-imagen" require><br>
    <input type="button" id="enviar" value="Enviar comentario">
    <input type="hidden" id="id" name="id" value="<?php echo $fila['folio'] ?>">
    <center><button><a href="tickets_cliente.php">atras</a></button></center>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
<script src="../js/alertas.js"></script>
<script >
            // es para verificar que los input no esten vacios
            let enviar = document.getElementById("enviar");
            
            enviar.addEventListener("click", hola);
            function hola(){
                let des = (document.getElementById("des")).value;
                let proyecto = (document.getElementById("proyecto")).value;
                let imagen = (document.getElementById("imagen")).value;
                let quefalta = "";
                
                if(des==""){
                    descnt()
                    
                    return;
                }
                if(proyecto==""){
                    proyectont()
                    
                    return;
                }//para enviar el formulario
                if(imagen==""){
                    imgnt()

                    return;
                }
                (document.getElementById("formulario")).submit()
            }

        </script>

</body>
</html>

<?php
      echo "

      <script src='../js/alertas.js'></script>";
      if ($resultado && $res){
          echo " <script>   
              generalsi(accion,tipo,lugar)
              </script>";
      }
      


?>
