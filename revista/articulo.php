<?php include('conexion.php'); ?>
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>
<?php include( ROOT_PATH . '/includes/public_functions.php'); ?> 

<?php
    if (isset($_GET['post-slug'])) {
        $post = getPost($_GET['post-slug']);
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title'] ?> | RevistaWeb</title>
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
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <?php if($_SESSION['users']['role'] != 'Moderador'){ ?>
        <?php if($post['published'] == false): ?>
          <h2 class="post-title">Sorry... This post has not been published</h2>
        <?php 
          else: 
            if($post['plantilla'] == 0){
                require('artc1.php');
            }else if($post['plantilla'] == 1){
                require('artc2.php');
            }else if($post['plantilla'] == 2){
                require('artc3.php');
            }else{
                echo "El articulo no tiene plantilla.";
            }
          endif;

        } else { 
          if($post['plantilla'] == 0){
            require('artc1.php');
          }else if($post['plantilla'] == 1){
              require('artc2.php');
          }else if($post['plantilla'] == 2){
              require('artc3.php');
          }else{
              echo "El articulo no tiene plantilla.";
          }
        } ?>
    </div>
  </div>
<!--Anuncios -->
    <?php require_once('includes/veranuncio.php') ?>
<!--Anuncios -->  

<!--Reportar -->     
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <div class="alert callout">
        <?php $titulopost = $post['title'];
          $postid = $post['id']; ?>
          <q>Reportar articulo <?php echo $titulopost ?></q>
          <form action="comentarios/respuesta.php" method="get">
            <input type="hidden" name="postid" value="<?php echo $postid ?>">
            <input class="alert button"type="submit" value="Reportar articulo" name="reportar">
          </form>
        </div>
      </div>
    </div>
  </div>
<!--Reportar -->



<!-- Comentarios y respuestas -->
  <?php include( ROOT_PATH . '/comentarios/comentarios.php'); ?>
<!------------------------------------------------------------------------------------------------>

<!--veces visto articulo -->
  <?php 
    $postid = $post['id']; 
    if (isset($_GET['leer'])) {
      $sql1 = "UPDATE posts SET views = views+'1' WHERE posts.id = '$postid'";
      $result1 = mysqli_query($conexion, $sql1);
      if($result1){
        echo "Gracias por Visitar articulo"; ?>
        <a href="articulo.php?post-slug=<?php echo $row['slug'];?>"></a>
      <?php }else{
        echo "No se ingresaron los datos.";
      }
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