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
    <?php
    $postid = $post['id'];
    $sqlwer = "SELECT * FROM mydb.anunciosartc WHERE id_post = '$postid' ORDER BY RAND() LIMIT 1";
       $resultwer = mysqli_query($conexion, $sqlwer);

       if (mysqli_num_rows($resultwer) > 0){ 
       while($rowwer = mysqli_fetch_assoc($resultwer)) 
       {
           ?> 
           <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <div class="callout">
                    <?php  
                    $anuncioid = $rowwer['anuncio_id'];
                    $artcid = $rowwer['id_post'];
                    $union = $rowwer['unionid'];?>
                    <p>Ver anuncio <?php echo $anuncioid ?> desde articulo <?php echo $artcid ?>  </p>
                    <form action="includes/veranuncio.php" method="get">
                    <img src="<?=$rowwer['imagen']?>"> 
                    <input type="hidden" name="anunciorandom" value="<?php echo $anuncioid ?>">
                    <input type="hidden" name="artc" value="<?php echo $artcid ?>">
                    <input type="hidden" name="union" value="<?php echo $union ?>">
                    <input class="button"type="submit" value="Ver anuncio" name="veranuncio">                   
                  </form>
                  </div>
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



<!--Comentarios y respuestas -->
  <?php include( ROOT_PATH . '/comentarios/comentarios.php'); ?>
<!--Comentarios --> 

<!--Comentar articulo general-->
        <?php if (isset($_SESSION['users'])) { ?>
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <div class="callout">
        <q>Comentar articulo <?php echo $post['title'] ?></q>
        <hr>
        <p>Usted está comentado como <?php echo $_SESSION['users']['nombre'] ?></p>
        <form action="comentarios/respuesta.php" method="get">
        <h4 class="text-center">Comentar</h4>

        <label>Comentario</label>
         <?php $postid = $post['id']; 
         $userid = $_SESSION['users']['id'];?>
         <input type="hidden" name="useridcomment" value="<?php echo $userid ?>">
        <input type="hidden" name="postidcomment" value="<?php echo $postid ?>">
        <input type="text" name="comentario" placeholder="Ingrese comentario">

        <input type="submit" value="Comentar" name="comentar">
        </form>
        </div>
        </div>
        </div>
        </div>
      </div>

        <?php }else{

          echo "Inicia sesion para comentar";

          } ?>

<!--comentar -->
<!--veces visto articulo -->
  <?php 
    $postid = $post['id']; 
    if (isset($_GET['leer'])) {
    $sql1 = "UPDATE posts SET views = views+'1' WHERE posts.id = '$postid'";
    $result1 = mysqli_query($conexion, $sql1);
    if($result1){
    echo "Gracias por Visitar articulo";
    ?>
    <a href="articulo.php?post-slug=<?php echo $row['slug'];?>"></a>
    <?php
    }else{
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