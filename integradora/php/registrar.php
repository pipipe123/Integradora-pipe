<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"]=="POST"){
     //Desactivar las noticias y mostrar los errores

     //1.- Conectarse a la BD
     include_once("inserciones.php");
     //2.- Traer los datos del formulario
    // $nombre=$_POST['nombre'];
    // $pass=$_POST['pass'];
    // $email=$_POST['email'];
    // $proyecto=$_POST['proyecto'];
    // $tipo=$_POST['tipo-usuario'];

    
        // echo "nombre: ".$nombre."<br>";
        // echo "pass: ".$pass."<br>";
        // echo "email: ".$email."<br>";
        // echo "tipo: ".$tipo."<br>";
        // echo "proyecto: ".$proyecto."<br>";



}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">
    <title>registro</title>

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

<h1>Bienvenido al registro</h1>
<div class="content">
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
        <input type="button" value="Registrese" id="usuario">
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
        <input type="password" placeholder="Contraseña" id="contraseña" name="pass" required>
        <input type="email" placeholder="Email" id="email" name="email" required>
        <input type="text" placeholder="Proyecto" id="proyecto" style="display: none;" name="proyecto"  >
        

        <script>
            function validarEmail() {
              var email = document.getElementById("email").value;
              var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!regex.test(email)) {
             
                alert("El correo electrónico no es válido.");
              }
            }
        </script>



        <fieldset>

            <legend>Tipo de usuario:</legend>
            <table>
                <tr>
                    <div>
                        <td><input type="radio" id="huey" name="tipo" value="cliente" checked></td>
                        <td><label for="huey">Cliente</label></td>
                    </div>
                </tr>
                <tr>
                    <div>
                      <td><input type="radio" id="dewey" name="tipo" value="tecnico"></td>
                      <td><label for="dewey">Técnico</label></td>
                    </div>
                </tr>
                <tr>
                    <div>
                      <td><input type="radio" id="louie" name="tipo" value="administrador"></td>
                      <td><label for="louie">Administrador</label></td>
                    </div>
                </tr>
                
            </table>
        </fieldset>

        <input type="submit" value="Enviar" onclick="validarEmail()">
        <table>
            <tr>
                <td><input type="checkbox" value="Acepto los términos y condiciones" id="terminos"></td>
                <td><label for="terminos">Acepto los términos y condiciones</label></td>
            </tr>
        </table>
        

    </form>
    <a href="login.php">Ya eres usuario</a>
</div>

<script>
    var tipoUsuario = document.getElementsByName("tipo");
    var campoProyecto = document.getElementById("proyecto");

    // Función para mostrar u ocultar el campo de proyecto
    function mostrarCampoProyecto() {
        if (tipoUsuario[0].checked) {
            campoProyecto.style.display = "block";  // Mostrar el campo proyecto
        } else {
            campoProyecto.style.display = "none";   // Ocultar el campo proyecto
        }
    }

    // Agregar evento change a los radio buttons del tipo de usuario
    for (var i = 0; i < tipoUsuario.length; i++) {
        tipoUsuario[i].addEventListener("change", mostrarCampoProyecto);
    }

    // Llamar a la función inicialmente para mostrar u ocultar el campo de proyecto correctamente
    mostrarCampoProyecto();
</script>

</body>
</html>
