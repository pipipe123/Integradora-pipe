<?php


if ($_SERVER["REQUEST_METHOD"]=="POST"){

     include_once("inserciones.php");
    
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
        
    </ul>
</div>

<h1>Bienvenido al registro</h1>
<div class="content">
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" id="formulario">
        <input type="button" value="Registrese">
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
        <input type="password" placeholder="Contrasena" id="contrasena" name="pass" required>
        <input type="email" placeholder="Email" id="email" name="email" required>
        <input type="password" placeholder="Codigo" id="codigo" style="display: none;" name="codigo">
        <input type="text" placeholder="Especialidad" id="especialidad" style="display: none;" name="especialidad">
        





        <fieldset>

            <legend>Tipo de usuario:</legend>
            <table>
                <tr>
                    <div>
                        <td><input type="radio" id="huey" name="rol" value="cliente" checked></td>
                        <td><label for="huey">Cliente</label></td>
                    </div>
                </tr>
                <tr>
                    <div>
                      <td><input type="radio" id="dewey" name="rol" value="tecnico"></td>
                      <td><label for="dewey">Técnico</label></td>
                    </div>
                </tr>
                <tr>
                    <div>
                      <td><input type="radio" id="louie" name="rol" value="admin"></td>
                      <td><label for="louie">Administrador</label></td>
                    </div>
                </tr>
                
            </table>
        </fieldset>
        <table>
            <tr>
                <td><input type="checkbox" value="Acepto los términos y condiciones" id="terminos" required></td>
                <td><label for="terminos"><a href="">Acepto los términos y condiciones</a></label></td>
            </tr>
        </table>
        <input type="submit" value="Enviar" id="enviar">
       
        

    </form>
    <a href="login.php">Ya eres usuario</a>
</div>

<script>
    var tipoUsuario = document.getElementsByName("rol");
    var campoCodigo = document.getElementById("codigo");
    var campoEspecial = document.getElementById("especialidad");

    // Función para mostrar u ocultar el campo de proyecto
    function mostrarCampoProyecto() {
        if (tipoUsuario[0].checked) {
            campoCodigo.style.display = "none";  // Mostrar el campo codigo
        } else {
            campoCodigo.style.display = "block";   // Ocultar el campo codigo
        }

        if (tipoUsuario[0].checked || tipoUsuario[2].checked){
            campoEspecial.style.display = "none";  // Mostrar el campo proyecto
        } else {
            campoEspecial.style.display = "block";   // Ocultar el campo proyecto
        }
    }

    // Agregar evento change a los radio buttons del tipo de usuario
    for (var i = 0; i < tipoUsuario.length; i++) {
        tipoUsuario[i].addEventListener("change", mostrarCampoProyecto);
    }

    // Llamar a la función inicialmente para mostrar u ocultar el campo de proyecto correctamente

</script>

</body>
</html>

<script src="../js/jquery-3.7.0.js"></script>
