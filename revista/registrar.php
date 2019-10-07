<?php
  include ("conexion.php");
  $Suscripcion_idSuscripcion=$_GET['suscripcion'];
  $Nombre=$_GET['nombre'];
  $Apellido=$_GET['apellido'];
  $Usuario=$_GET['username'];
  $Email=$_GET['email'];
  $Contraseña=$_GET['contraseña'];  
  /*$imagen=addslashes(GET_included_files($_FILES['foto']['tmp_name']));*/

  $query="INSERT INTO perfil (Suscripcion_idSuscripcion, Nombre, Apellido, Usuario, Email, Contraseña)
  VALUES('$Suscripcion_idSuscripcion', '$Nombre','$Apellido', '$Usuario','$Email','$Contraseña')";
  $resultado=$conexion ->query($query);

  if ($resultado)
  {
    echo "Los resultados se ingresaron correctamente";
  }
  else{
    echo "no se ingresaron los datos";
  }

?>
