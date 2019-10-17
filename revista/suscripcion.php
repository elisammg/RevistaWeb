<?php include('conexion.php'); ?>
<?php //include('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripciones</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>
   <?php 
    if (isset($_GET['id_users']))
     {
      $id = ($_GET['id_users']);
      $infosusc = mysqli_query("SELECT * FROM cobro WHERE id_users = '$id'");
      $use = mysqli_fetch_array($infosusc);
    } 
    ?>

    <?php 
      if (isset($_POST['enviar']))
      {
        $id = $_SESSION['users']['id'];
        $suscripcion=$_POST['pokemon'];
        $numero=$_POST['notarjeta'];
        $date=$_POST['fecha'];
        $seguridad=$_POST['tres'];
        $sql = "INSERT INTO cobro (id_users, id_sus, tarjeta, vencimiento, atras) VALUES ('$id', '$suscripcion', '$numero', '$date', '$seguridad')";
        $result = mysqli_query($conexion, $sql);
        echo ("Se ingresaron correctamente los datos");
      }
    ?>
  <?php require_once('includes/susc.php') ?>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
  <footer>
  	<?php require_once('includes/footer.php') ?>
  </footer>
</html>
