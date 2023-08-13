
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body backgroun="blue">
    
</body>
</html>

<script src="../js/alertas.js"></script>
<?php
include_once('conexion.php');

$finalizado=$_POST['finalizar'];
$folio=$_POST['folio'];

$sql="UPDATE tickets SET estado = '$finalizado' where folio = $folio;";

$resultado=mysqli_query($conexion, $sql);
if ($resultado)
   {
      ?><script>   
         ticket()
         </script><?php
   }  
   else
   {
    ?><script>   
    ticketn()
    </script><?php
   }


?>