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
  <?php require_once('includes/header.php') ?>
</header>
  <body>
  	<br>
  	
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">	
        <form class="log-in-form" action="registrar.php" method="get" enctype="multipart/form-data">	
		  <h4 class="text-center">Registrate</h4>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" required placeholder="Ingrese nombre">
		  
		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" required placeholder="Ingrese Apellido">
		  
		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" required placeholder="Ingrese Username">
		  
		  <label for="email">Email</label>
		    <input type="email" name="email" required placeholder="Ingrese email">
		  
		  <label for="contraseña">Contrsaeña</label>
		    <input type="password" name="contraseña" required placeholder="Ingrese contraseña">
		  
		   <label for="suscripcion">Ingrese numero de suscripcion</label>
		    <input type="numero" name="suscripcion" required placeholder="Ingrese suscripcion">
		  
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
