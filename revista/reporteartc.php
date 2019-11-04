<?php include('conexion.php'); ?>
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVISTA WEB</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
  	<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
  	<h1>Listado de articulos para moderar</h1>
  </div>
</div>
</div>
  <?php require_once('includes/modreporteartc.php') ?>
  


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
  <footer>
    <?php require_once('includes/footer.php') ?>
  </footer>

</html>
