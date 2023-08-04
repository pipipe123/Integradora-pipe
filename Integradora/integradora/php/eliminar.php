<?php
    include_once('conexion.php');
    $id=$_REQUEST['id'];
    echo $id;
    // $sql="delete from usuarios where id = '$id'";

    // $ejecutar_sql=$conexion->query($sql);
    // if ($ejecutar_sql)
    // {
      //  echo " <script>   
              //  alert('... Usuario Eliminado Correctamente ... ');
//              </script>";
//     }
//     else
//     {
//      echo " <script>   
//               alert('... No fue posible eliminar al usuario, verifique por favor... ');
//            </script>";
//     }
//     echo "<script>
//     location.href='usuarioQA.php';
// </script>";
// ?>