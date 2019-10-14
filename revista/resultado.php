<?php include('conexion.php'); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de busqueda</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <head>
    <?php require_once('includes/navbar.php') ?>
    <?php require_once('includes/header.php') ?>
  </head>
  <body>

    <?php 


if (isset($_GET['buscar'])) 
{
  
$categoria=$_GET['categoria'];
$autor=$_GET['username'];
$creado=$_GET['created_at'];
$texto=$_GET['body'];
  $sql = "SELECT users.username, subtopic.nombre, posts.body, posts.created_at FROM mydb.posts \n"

    . "INNER JOIN mydb.users \n"

    . "ON posts.user_id = users.id\n"

    . "JOIN mydb.subtopic\n"

    . "ON posts.id_subtopic = subtopic.id\n"

    . "WHERE users.username LIKE '$autor' or subtopic.nombre LIKE '$categoria' or posts.body LIKE '$texto' or posts.created_at LIKE '$creado' ";
     $result = mysqli_query($conexion, $sql);
     while ($consulta = mysqli_fetch_array($result)) 
     {
      
      echo "
      <table>
    <tr>
      <td><center>Categoria</center></td>
      <td><center>Autor</center></td>
      <td><center>Fecha</center></td>
      <td><center>Texto</center></td>
    </tr>
    <tr>
      <td>".$consulta['nombre']."</td>
      <td>".$consulta['username']."</td>
      <td>".$consulta['created_at']."</td>
      <td>".$consulta['body']."</td>
    </tr>
  </table>

      ";

      
     }
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

        