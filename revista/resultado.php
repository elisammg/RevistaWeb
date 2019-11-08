<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
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
<div class="grid-container">
      <div class="grid-x grid-padding-x">
    <?php 


if (isset($_GET['buscar'])) 
{
  
$texto=$_GET['body'];
//query de busqueda
$sql = "SELECT * FROM mydb.busqueda WHERE usernombre LIKE '%$texto%' or subtopic_nombre LIKE '%$texto%' or posts_body LIKE '%$texto%'";
$result = mysqli_query($conexion, $sql);
     echo "<table>
                    <tr>
                      <td><center>Categoria</center></td>
                      <td><center>Autor</center></td>
                      <td><center>Fecha</center></td>
                      <td><center>Texto</center></td>
                      <td><center>Leer mas</center></td>
                    </tr>";
     while ($consulta = mysqli_fetch_array($result)) 
     {
      
      echo "      
    <tr>
      <td>".$consulta['subtopic_nombre']."</td>
      <td>".$consulta['usernombre']."</td>
      <td>".$consulta['created_at']."</td>
      <td>".$consulta['posts_body']."</td>
      <td>"?>
      <!--conteo de visitas -->
          <form action="articulo.php" method="get">
              <input type="hidden" name="post-slug" value="<?php echo $consulta['slug'];?>">
              <input type="submit" class="button" name="leer" value="Leer mas">
          </form>
    <?php echo "</td>
    </tr>";

      
     }
     echo "</table>";
}



?>
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

        