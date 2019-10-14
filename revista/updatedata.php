<?php include('conexion.php'); ?>
<?php ßinclude('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de datos</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>
  	<br>

    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        	<?php 
include('conexion.php');
if (isset($_GET['enviar']))
{
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$usuario=$_GET['username'];
$correo=$_GET['email'];
$contraseña=$_GET['contraseña'];
$sql = "UPDATE `users` SET `nombre` = '$nombre', `apellido` = '$apellido', `username` = '$usuario', `email` = '$correo', `password` = '$contraseña' WHERE `users`.`id` = 10";
$result = mysqli_query($conexion, $sql);

 ?>
        <form class="log-in-form" action="loggeado.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Cambio de datos</h4>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" placeholder="Ingrese email">

		  <label for="contraseña">Contrsaeña</label>
		    <input type="password" name="contraseña" placeholder="Ingrese contraseña">
		  <button type="submit" name="enviar">Enviar</button>
		</form>
		<?php 
		}
		 ?>
		</div>
	</div>
	</div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
  <footer>
  	<?php require_once('includes/footer.php') ?>
  </footer>
</html>
