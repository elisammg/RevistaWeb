<?php
  include ("conexion.php");
//  $Suscripcion_idSuscripcion=$_POST['suscripcion'];
  $Nombre=$_POST['nombre'];
  $Apellido=$_POST['apellido'];
  $Usuario=$_POST['username'];
  $Email=$_POST['email'];
  $Contraseña=$_POST['contraseña'];
/*$imagen=addslashes(POST_included_files($_FILES['foto']['tmp_name']));*/

  $query="INSERT INTO usuario (nombre, apellido, username, email, role, password)
  VALUES('$Nombre','$Apellido','$Usuario','$Email', NULL, '$Contraseña')";
  $resultado=$conexion ->query($query);

  if ($resultado)
  {
     ('perfil.php');
    //echo "Los resultados se ingresaron correctamente";
  }
  else{
    echo "no se ingresaron los datos";
  }
  //$sql = "INSERT INTO `perfil` (`idPerfil`, `Suscripcion_idSuscripcion`, `Nombre`, `Apellido`, `Usuario`, `Email`, `Contraseña`)
  //VALUES (NULL, \'1\', \'Kevin\', \'Champney\', \'kevinc\', \'kevinc@gmail.com\', \'contraseña123\')";
?>
