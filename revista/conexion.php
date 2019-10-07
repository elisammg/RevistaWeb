<?php

  $servername= "localhost";
  $user="root";
  $pass="";
  $dbname="mydb";

  $conexion = new mysqli ($servername, $user, $pass, $dbname);

  if ($conexion->connect_error)
  {
    die ("Conexion fallida: " . $conexion->connect_error);
  }


 ?>
