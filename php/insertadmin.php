<?php
$registrado="";
// Toma la informacion del campo codigo
$codigo=$_POST['codigo'];

$sql="INSERT INTO usuarios VALUES (null,'$nombre',md5('$pass'),'$email',1, 'admin')";



//busca que el codigo
$validar="SELECT * FROM codigo WHERE id_codigo = $codigo";
// $validacion=$conexion->query($validar);
$validacion = mysqli_query($conexion, $validar);

if ($validacion->num_rows > 0) {
        $ejecutar_sql=$conexion->query($sql);
        if($ejecutar_sql){
         $registrado = "bien";
            }   else
            {
               $registrado = "mal";
            }
}else
{
   $registrado = "mal";
}


?>