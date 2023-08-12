<?php
    include_once('conexion.php');
    $id=$_REQUEST['id'];
    $sql="delete from tickets where folio = $id";

    $ejecutar_sql=$conexion->query($sql);
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js'></script>
    <script src='../js/alertas.js'></script>
    
    <script>
    var accion = 'eliminado';
    var tipo = 'ticket';
    var lugar = 'admin.php';
</script>";
    if ($ejecutar_sql)
    {
        echo " <script>   
            generalsi(accion,tipo,lugar)
            </script>";
    }
    else
    {
        echo " <script>   
            generalno(accion,tipo)
            </script>";
    }

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