<?php
   //eliminar un registro de la BD
   error_reporting(E_ERROR | E_PARSE);
   include_once('conexion.php');
   include_once('sesiones.php');
   $id=$_REQUEST['id'];

   $sql="delete from usuarios where id = '$id'";

   $ejecutar_sql=$conexion->query($sql);
   echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js'></script>
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