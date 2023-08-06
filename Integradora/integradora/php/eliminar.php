<?php
    include_once('conexion.php');
    $id=$_REQUEST['id'];
    $sql="delete from tickets where folio = $id";

    $ejecutar_sql=$conexion->query($sql);
?>