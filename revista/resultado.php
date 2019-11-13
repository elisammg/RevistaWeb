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

<?php if (isset($_GET['buscaruno'])) 
{
   $subcat=$_GET['categoria'];
    $autor=$_GET['nombre'];
    $fecha=$_GET['created_at'];  
    $texto=$_GET['body'];
     echo "<table>
                            <tr>
                              <td><center>Categoria</center></td>
                              <td><center>Autor</center></td>
                              <td><center>Fecha</center></td>
                              <td><center>Texto</center></td>
                              <td><center>Leer mas</center></td>
                            </tr>";
    //ordenar por categoria
       
        //query de busqueda
        $sqluno = "SELECT * FROM mydb.busqueda 
        WHERE usernombre = '$autor' or subtopic_nombre = '$subcat' or posts_body = '$texto'";
        $resultuno = mysqli_query($conexion, $sqluno);
            
             while ($consultauno = mysqli_fetch_array($resultuno)) 
             {
              
              echo "      
            <tr>
              <td>".$consultauno['subtopic_nombre']."</td>
              <td>".$consultauno['usernombre']."</td>
              <td>".$consultauno['created_at']."</td>
              <td>".$consultauno['posts_body']."</td>
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


<?php if (isset($_GET['buscardos'])) 
{
   $subcat=$_GET['categoria'];
    $autor=$_GET['nombre'];
    $fecha=$_GET['created_at'];  
    $texto=$_GET['body'];
     echo "<table>
                            <tr>
                              <td><center>Categoria</center></td>
                              <td><center>Autor</center></td>
                              <td><center>Fecha</center></td>
                              <td><center>Texto</center></td>
                              <td><center>Leer mas</center></td>
                            </tr>";
    //ordenar por categoria
    if(in_array('categoriartc', $_GET['search'])){
       
        //query de busqueda
        $sql = "SELECT * FROM mydb.busqueda 
        WHERE usernombre = '$autor' or subtopic_nombre = '$subcat' or posts_body = '$texto' ORDER BY subtopic_nombre ASC";
        $result = mysqli_query($conexion, $sql);
            
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
    
        }

        //ordenar por nombre autor
        elseif (in_array('nombreautor', $_GET['search'])) {
        //query de busqueda
        $sql = "SELECT * FROM mydb.busqueda 
        WHERE usernombre = '$autor' or subtopic_nombre = '$subcat' or posts_body = '$texto' ORDER BY usernombre ASC";
        $result = mysqli_query($conexion, $sql);
            
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
      }
      //ordenar por fecha
      elseif (in_array('fechaartc', $_GET['search'])) {
        //query de busqueda
        $sql = "SELECT * FROM mydb.busqueda 
        WHERE usernombre = '$autor' or subtopic_nombre = '$subcat' or posts_body = '$texto' ORDER BY created_at ASC";
        $result = mysqli_query($conexion, $sql);
            
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

        