<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   
</body>
</html>
<?php
   //eliminar un registro de la BD
   error_reporting(E_ERROR | E_PARSE);
   include_once('conexion.php');
   // include_once('sesion_admin.php');
   $id=$_REQUEST['id'];

   $sql="delete from usuarios where id = '$id'";

   $ejecutar_sql=$conexion->query($sql);
   echo "
      <script src='../js/alertas.js'></script>
      <script>
      var accion = 'eliminado';
      var tipo = 'usuario';
      var lugar = 'usuario.php';
   </script>";
   if ($ejecutar_sql)
   {
      echo "<script>   
         generalsi(accion,tipo,lugar)
         </script>";
   }  
   else
   {
    echo "<script>   
      generalno(accion,tipo)
      </script>";
   }





?>