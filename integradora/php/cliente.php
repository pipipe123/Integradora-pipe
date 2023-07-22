<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include_once('conexion.php');

     $fecha=$_POST['Fecha'];
     $hora=$_POST['Hora'];
     $des=$_POST['Descripcion'];
    //  $img=$_POST['imagen']; <--aqui van a ir las imagenes
            $sql="insert into ticket (id,fecha,hora,des,estado,fk_tecnico,fk_cliente,fk_admin) values (null,'$fecha','$hora','$des','registrado',null,null,null)";
            $ejecutar_sql=$conexion->query($sql);
            if($ejecutar_sql){
                echo "<script>
                    alert('ticket creado exitosamente');
                </script>";
            }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../css/cliente.css">
    <script>
        function toggleMenu() {
            var menuToggle = document.getElementById("menu-toggle");
            var menu = document.getElementById("menu");

            menuToggle.classList.toggle("active");
            menu.classList.toggle("active");
        }
    </script>
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


   
<div id="ticket">
    <h1>¿Algún Problema?</h1>
    <p>No te preocupes, cuéntanos a nosotros con la creación de tu ticket y te brindaremos al mejor equipo de soporte técnico para resolverlo.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label  for="Fecha">Fecha de creacion:</label>
        <input type="date" id="Fecha" name="Fecha" required>
    
        <label for="Hora">Hora de creacion:</label>
        <input type="time" id="Hora" name="Hora" required>
    
        <label for="Titulo">Titulo del problema:</label>
        <input type="text" id="Titulo" name="Titulo" required>
    
        <label for="descripcion">Descripción del problema:</label>
        <textarea id="descripcion" name="Descripcion" rows="4" required></textarea>
        
            <label  for="imagen" class="adjuntar-imagen">Adjuntar imagen:</label>
        <input type="file" id="imagen" name="imagen" class="input-imagen"><br><br><br>
   
       
        <input type="submit" value="Crear Ticket">
</div>
    
       
</body>
</html>
