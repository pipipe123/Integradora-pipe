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
    // if ($resultado && $res) {
    //     header("location:../html/index.html");
    // } else {
    //     echo('No se pudo generar el ticket');
    // }

        echo $id_usuario;

    if ($resultado){
                 echo('se pudo generar el ticket');
    }else{
                echo('No se pudo generar el ticket');
    }
    echo "<br>";

    if($res){
        echo('se pudo generar la prueba');
    }else{
        echo('no se pudo generar la prueba');
    }
    // No cierres la conexión aquí, debes mantenerla abierta hasta completar todas las operaciones.

?>
