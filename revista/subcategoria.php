<?php include('conexion.php'); ?>
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>
<?php include( ROOT_PATH . '/includes/public_functions.php'); ?> 
<?php

    if (isset($_GET['subtopic-slug'])) {
        $subtopic = getSubTopic($_GET['subtopic-slug']);
    }
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $subtopic['nombre'] ?> | SUB</title>
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
        if($subtopic['plantilla'] == 0){
            require_once('sub1.php');
        }else if($subtopic['plantilla'] == 1){
            require_once('sub2.php');
        }else{
            echo "Sub categoria sin plantilla";
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