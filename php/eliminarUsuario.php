<?php
   //eliminar un registro de la BD

   include_once('conexion.php');
   include_once('sesiones.php');
   $id=$_REQUEST['id'];

   $sql="delete from usuarios where id = '$id'";

   $ejecutar_sql=$conexion->query($sql);

   if ($ejecutar_sql)
   {
      echo " <script>   
              alert('... Usuario Eliminado Correctamente ... ');
            </script>";
   }
   else
   {
    echo " <script>   
             alert('... No fue posible eliminar al Usuario, verifique por favor... ');
          </script>";
   }

   echo "<script>
            location.href='usuario.php';
        </script>";





?>