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

<div id="user">
    <a href="actualizarCliente.php">Cuenta</a>
</div>
   
<div id="ticket">
    <h1>¿Algún Problema?</h1>
    <p>No te preocupes, cuéntanos a nosotros con la creación de tu ticket y te brindaremos al mejor equipo de soporte técnico para resolverlo.</p>

    <form action="enviarticket.php" id="formulario" method="POST">
    <h3>Nombre</h3>
    <input type="text" name="name" placeholder="Ingrese su nombre" id="nombre">
    <br>
    <h3>Proyecto</h3>
    <input name="proyecto" id="proyecto" cols="100" rows="10" maxlength="500" placeholder="Ingrese el proyecto del problema"></input>
    <br>
    <h3>Descripcion</h3>
    <textarea name="des" id="des" cols="100" rows="10" maxlength="500" placeholder="Describa su problema"></textarea>
    <br>
    <label  for="imagen" class="adjuntar-imagen">Adjuntar imagen:</label>
        <input type="file" id="imagen" name="imagen" class="input-imagen"><br>
    <input type="button" id="enviar" value="Enviar comentario">
</form>
</div>
    
<script>
            
            let enviar = document.getElementById("enviar");
            
            enviar.addEventListener("click", hola);
            function hola(){
                let nombre = (document.getElementById("nombre")).value;
                let des = (document.getElementById("des")).value;
                let proyecto = (document.getElementById("proyecto")).value;
                if(nombre == ""){
                    alert("Por favor ingresa un nombre")
                    return;
                }
                if(des==""){
                    alert("Ingrese una descripcion")
                    return;
                }
                if(proyecto==""){
                    alert("Defina el proyecto")
                    return;
                }
                (document.getElementById("formulario")).submit()
                
            }
        </script>
</body>
</html>
