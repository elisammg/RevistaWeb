<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
    <?php  include('conexion.php') ;
    $nombre = 'Elisa';
    $apellido = 'Monzon';
    $username ='elisammg';
    ?>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <?php if (isset($_SESSION['username'])) { ?>
          <div class="logged_in_info">
          <h1><span>Bienvenido <?php echo $_SESSION['username']['username'] ?></span></h1>
          </div>
        <?php }else{ ?>
          <h1>Bienvenido</h1>
          <?php } ?>
      </div>
      <div class="large-4 cell">
        <div class="callout">
          <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">

          <h3>DATOS USUARIO</h3>
          
          <ul>
            <li>
              <label for="nombre"><?php echo $_SESSION['username']['nombre'] ?></label>
            </li>
            <li>
              <label for="nombre"><?php echo $_SESSION['username']['apellido'] ?></label>
            </li>
          </ul>
          <a href="updatedata.php" class="button">Cambiar datos</a>

      </div>
    </div>
    <div class="large-8 cell">
      <div class="callout">
        <h3>SUSCRIPCION:</h3>
        <p>DATOS SUSCRIPCION</p>
        <a href="suscripcion.php" class="button">Suscripciones</a>
        <p>Datos de cobro</p>
        <a href="updatecobro.php" class="button">Cambiar datos</a>
      </div>
    </div>
    <div class="large-12 cell">
      <div class="callout">
      <h6>¿Quieres ser autor, moderador o administrador?</h6>
      <p>Da click en enviar solicitud para cambio de rol!</p>
      <button type="submit" name="button" class="button">Eviar solicitud</button>
        </div>
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
