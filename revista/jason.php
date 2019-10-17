<?php include('conexion.php'); ?>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>
  	<?php
  	$data = file_get_contents("archivo.json");
  	$data = json_decode($data, true);
  	foreach ($data as $row) {
  		echo '<tr><td>'.$row["id"].'<tr><td>';
  		echo '<tr><td>'.$row["title"].'<tr><td>';
  		echo '<tr><td>'.$row["body"].'<tr><td>';
  		echo '<tr><td>'.$row["created_at"].'<tr><td>';
  		echo '<tr><td>'.$row["premium"].'<tr><td>';
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
