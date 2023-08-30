<?php
$enviado = "";
?>

<?php

include_once("conexion.php");
include_once("valida_sesion.php");


$proyecto = $_POST['proyecto'];
$des = $_POST['des'];
$img = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

// Se revisa que los datos enviados no sean códigos maliciosos
$_SESSION['id_usuario'];
$proyecto = mysqli_real_escape_string($conexion, $proyecto);
$des = mysqli_real_escape_string($conexion, $des);

// Insertar el ticket en la tabla
$query = "INSERT INTO tickets (descripcion, estado, proyecto, id_usuario) VALUES ('$des', 'activo', '$proyecto', $id_usuario)";
$resultado = mysqli_query($conexion, $query);
$folio=mysqli_insert_id($conexion);
// Insertar la prueba en la tabla
$query_prueba = "INSERT INTO pruebas (id, folio_ticket, imagen) VALUES (NULL,'$folio', '$img')";
$res = mysqli_query($conexion, $query_prueba);

// Verificar si las inserciones fueron exitosas
    if ($resultado && $res) {
        $enviado = "bien";
    } else {
        echo('No se pudo generar el ticket');
    }

 // No cierres la conexión aquí, debes mantenerla abierta hasta completar todas las operaciones.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php include_once("alertaticket.php"); ?>