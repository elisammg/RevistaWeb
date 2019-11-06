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

    <?php
        if($post['plantilla'] == 0){
            require_once('artc1.php');
        }else if($post['plantilla'] == 1){
            require_once('artc2.php');
        }else if($post['plantilla'] == 2){
            require_once('artc3.php');
        }else{
            echo "El articulo no tiene plantilla.";
        }
    ?>
<!--Anuncios -->
    <?php
    $postid = $post['id'];
    $sql = "SELECT * FROM mydb.anunciopost WHERE id_post = '$postid'";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                    <img src="<?=$row['anuncios_imagen']?>"> 
                </div>
              </div>
            </div>
        
           <?php 
       }//fin blucle
      } else
      {
        echo "no hay anuncios";
      }
    ?> 
<!--Anuncios -->  

 
    <!--Revision y comentarios -->
    <?php require_once('includes/revision.php') ?>



    <!--Comentarios y respuestas -->
    <!--?php require_once('comentarios/comentarios.php') ?-->
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="large-12 cell">
    <h5>Comentarios</h5>
    <div class="warning callout">
    <dl>
  <?php
    $postid = $post['id'];
    $sql = "SELECT * FROM mydb.comentariosartc WHERE id_post = '$postid' AND censurar = 0";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
          
          <!-- respuesta padre 1 -->
          <dt>
            <div class="grid-x grid-padding-x">
            <div class="large-6 medium-6 cell">
            <p><img src="<?=$row['user_foto']?>"> </p>
          </div>
          <div class="large-6 medium-6 cell">
            <p><?=$row['comentarios_contenido']?></p>
            </div>
            <form action="comentarios/answer.php" method="get">
            <input type="submit" class="tiny success button" name="contestar" value="Comentar">
            <input type="submit" class="tiny alert button" name="reportar" value="Reportar">
            </form> 
          </div>
          </dt>
          <hr>
        
           <?php 
       }//fin blucle
      } else
      {
        echo "no hay anuncios";
      }
    ?> 
    </dl>
    </div>
    </div>
    </div>
    </div>
<!--Comentarios --> 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>