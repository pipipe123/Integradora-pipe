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

// Toma la informacion del campo codigo
$codigo=$_POST['codigo'];

$sql="INSERT INTO usuarios VALUES (null,'$nombre',md5('$pass'),'$email',1, 'admin')";
include_once('sesion_admin.php');
include_once('conexion.php');


//busca que el codigo
$validar="SELECT * FROM codigo WHERE id_codigo = $codigo";
// $validacion=$conexion->query($validar);
$validacion = mysqli_query($conexion, $validar);

if ($validacion->num_rows > 0) {
        $ejecutar_sql=$conexion->query($sql);
        if($ejecutar_sql){
         echo "   
    
         <script src='../js/alertas.js'></script>
         <script>
         var accion = 'actualizar';
         var tipo = 'usuario';
         var lugar = 'usuario.php';
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
   } 

}


?>