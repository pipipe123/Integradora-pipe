<?php

  // 1.- Conectarme a la BD 
  $servidor="127.0.0.1";
  $usuario="root";
  $password="";
  $bd="tickets";
    // $servidor="integradora.engranedigital.com";
    // $usuario="integradora";
    // $password="pX6iZKNecMygZI1g";
    // $bd="integradora";
  //Metodo de conexion Orientado a Objetos
  //$conexion=new mysqli($servidor,$usuario,$password,$bd);

  //Metodo de conexion procedural
   $conexion=mysqli_connect($servidor,$usuario,$password,$bd);


?>