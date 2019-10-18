<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cobro</title>
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
         
      <form class="log-in-form" action="updatecobro.php" method="post" enctype="multipart/form-data">

		  <h4 class="text-center">Actualizar datos de cobro</h4>
		  <label for="notarjeta">No. de Tarjeta</label>
		    <input type="numero" name="notarjeta" required placeholder="Ingrese No. de Tarjeta">

		  <label for="fecha">Fecha de vencimiento</label>
		    <input type="numero" name="fecha" required placeholder="Ingrese Fecha de Vencimiento">

		  <label for="atras">Digitos lateral</label>
		    <input type="numero" name="atras" required placeholder="Ingrese los tres digitos de la parte lateral">

		  <label for="submit">Cambiar datos</label>
		  <input type="submit" value="Enviar" name="enviar">		  
		</form>

		</div>
	</div>
	</div>
  <?php 
    if (isset($_GET['id_users']))
     {
      $id = ($_GET['id_users']);
      $infocobro = mysqli_query("SELECT * FROM cobro WHERE id_users = '$id'");
      $use = mysqli_fetch_array($infocobro);
    } 
    ?>

    <?php 
      if (isset($_POST['enviar']))
      {
        $id = $_SESSION['users']['id'];
        $numero=$_POST['notarjeta'];
        $date=$_POST['fecha'];
        $seguridad=$_POST['atras'];
        $sql = "UPDATE `cobro` SET `tarjeta` = '$numero', `vencimiento` = '$date', `atras` = '$seguridad' WHERE `id_users = '$id'";
        $result = mysqli_query($conexion, $sql);
        echo ("Se ingresaron correctamente los datos");
      }
    ?>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
  <footer>
  	<?php require_once('includes/footer.php') ?>
  </footer>
</html>
