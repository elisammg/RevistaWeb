<?php include('conexion.php'); ?>
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>
<?php include( ROOT_PATH . '/includes/public_functions.php'); ?> 
<?php
    if (isset($_GET['subtopic-plantilla'])) {
        $subtopic = $_GET['subtopic-plantilla'];
    }
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUB</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/artc2.css">
    <link rel="stylesheet" href="css/artc3.css">
  </head>
<header>
  <?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
<body>

    <?php
        if($subtopic == 0){
            require_once('sub1.php');
        }else if($subtopic == 1){
            require_once('sub2.php');
        }else{
            echo "El articulo no tiene plantilla.";
        }
    ?>

    <?php require_once('includes/comentarios.php') ?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>