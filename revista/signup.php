<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
  	<br>
    	<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
		<form class="log-in-form" action="db_insertar.php" method="get" enctype="multipart/form-data">
		  <h4 class="text-center">Sign up with you email account</h4>
		  <label for="nombre">Nombre
		    <input type="text" name="nombre" required placeholder="Ingrese nombre">
		  </label>
		  <label for="apellido">Apellido
		    <input type="text" name="apellido" required placeholder="Apellido">
		  </label>
		  <label for="username">Nombre de Usuario
		    <input type="text" name="username" required placeholder="Username">
		  </label>
		  <label for="email">Email
		    <input type="email" name="email" required placeholder="somebody@example.com">
		  </label>
		  <label for="password">Password
		    <input type="password" name="contraseña" required placeholder="Password">
		  </label>
		   <label for="suscripcion">Ingrese numero de suscripcion
		    <input type="text" name="suscripcion" required placeholder="Password">
		  </label>
		  <ol>
		  	<li>Mensual: pago cada mes</li>
		  	<li>Semestral: pago cada seis meses</li>
		  	<li>Anual: pago cada año</li>
		  </ol>	
		  <button type="submit" name="enviar">Enviar</button>
		</form>
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
