<?php
// Toma la informacion del campo de especialidad y el codigo
$especialidad=$_POST['especialidad'];
$codigo=$_POST['codigo'];
//busca que el codigo
$validar="SELECT * FROM codigo WHERE id_codigo = $codigo";
// $validacion=$conexion->query($validar);
$validacion = mysqli_query($conexion, $validar);

$sql="INSERT INTO usuarios VALUES (null,'$nombre',md5('$pass'),'$email',3,'$especialidad')";
if ($validacion->num_rows > 0) {
        $ejecutar_sql=$conexion->query($sql);
        if($ejecutar_sql){
            $registrado = "bien";
            }else
            {
               $registrado = "mal";
}
}else
{
   $registrado = "mal";
}

?>