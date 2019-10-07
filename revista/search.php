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
        <form class="log-in-form" action="buscar.php" method="get" enctype="multipart/form-data">	
		  <h4 class="text-center">Buscar</h4>
		  <label for="categoria">Cateogira</label>
		    <input type="text" name="categoria" required placeholder="Ingrese categoria">
		  
		  <label for="autor">Autor</label>
		    <input type="text" name="autor" required placeholder="Ingrese Autor">
		  
		  <label for="fecha">Fecha de Publicacion</label>
		    <input type="text" name="fecha" required placeholder="Ingrese fecha de publicacion">
		  
		  <label for="texto">Texto</label>
		    <input type="text" name="texto" required placeholder="Ingrese texto similar">

		  <a href="resultado.php" class="button">Buscar</a>
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
