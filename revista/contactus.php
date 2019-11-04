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
  <?php require_once('includes/header.php') ?>
</header>
  <body>
<br>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="large-8 cell">
    <form class="log-in-form" action="contactus.php" method="get">
    <h4 class="text-center">Contactanos</h4>

    <label>Nombre</label>
    <input type="text" name="categoria" placeholder="Ingrese nombre">

    <label>Apellido</label>
    <input type="text" name="nombre" placeholder="Ingrese apellido">

    <label>Email</label>
    <input type="email" name="created_at" placeholder="Ingrese email">

    <label>Comentario</label>
    <input type="text" name="body" placeholder="Ingrese Comentario">

    <a href="#" class="button">Enviar</a>
    </form>
    </div>
    <div class="large-4 cell">
      <h4>Info.</h4>
      <ul>
        <li>Direccion: Guatemala</li>
        <li>Direccion: Guatemala</li>
        <li>Direccion: Guatemala</li>
        <li>Direccion: Guatemala</li>
        <li>Direccion: Guatemala</li>
        <img src="https://s5.eestatic.com/2018/10/31/actualidad/Actualidad_349729813_130345448_1024x576.jpg">
      </ul>

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
