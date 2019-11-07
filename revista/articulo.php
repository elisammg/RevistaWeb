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
    //$sql = "SELECT * FROM anunciopost WHERE id_post = '$postid'";
    $sql = "SELECT * FROM anuncios ORDER BY RAND() LIMIT 1";
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                    <img src="<?=$row['imagen']?>"> 
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
    <!--?php require_once('comentarios/comentarios.php') ?-->
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h5>Comentarios</h5>
            <div class="warning callout">
              <dl>
                <?php
                  $postid = $post['id'];
                  $sql = "SELECT * FROM comentariosartc WHERE id_post = '$postid' AND censurar = 0";
    
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
            <form action="comentarios/respuesta.php" method="get">
             <?php if (isset($_SESSION['users'])) { ?>
            <label>Comentario</label>
            <?php $postid = $post['id']; 
             $userid = $_SESSION['users']['id'];?>
             <input type="hidden" name="useridanswer" value="<?php echo $userid ?>">
              <input type="hidden" name="postidanswer" value="<?php echo $postid ?>">
              <!--falta poner funcion para la variabl $comment[] que trae los datos de la tabla comentarios, podria hacerse un slug tambien para comentarios. los datos que falta traer es respuesta_a y id
              <input type="hidden" name="commentanswer" value="<?php //echo $answer?>">
              <input type="hidden" name="postidanswer" value="<?php //echo $postid ?>"> -->
            <input type="text" name="respuesta" required placeholder="Ingrese respuesta">
            <input type="submit" class="tiny success button" name="contestar" value="Comentar">
            <?php }else{

              echo "Inicia sesion para comentar";

              } ?>
            <input type="submit" class="tiny alert button" name="reportarcoment" value="Reportar comentario">
            </form> 
            </div>            
          </div>
          </dt>
          <hr>
        
           <?php 
       }//fin blucle
      } else
      {
        echo "no hay comentarios";
      }
    ?> 
    </dl>
    </div>
    </div>
    </div>
    </div>
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