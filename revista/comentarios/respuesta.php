<?php include('../conexion.php'); ?>
<?php include('../includes/registrar_loggear.php'); ?>
<?php include('../includes/public_functions.php'); ?> 

<?php
  //Insertar nuevo comentario desde articulo 
  if (isset($_GET['comentar'])){
    $userommentid = $_GET['useridcomment'];
    $artcommentid = $_GET['postidcomment'];
    $comment = $_GET['comentario'];
    $postSlug = $_GET['postSlug'];
    $sql5 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
    VALUES (NULL, '$userommentid', '$artcommentid', '$comment', current_timestamp(), '0', '0', '0')";
    $result5 = mysqli_query($conexion, $sql5);
    if($result5){
      echo "Gracias por comentar";
      header("Location: ../articulo.php?post-slug=$postSlug");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  //Insertar nuevo comentario desde otro comentario -->
  if (isset($_GET['contestar'])) {
    $useranswer = $_GET['useridanswer'];
    $artcanswer = $_GET['postidanswer'];
    $comment = $_GET['comment'];
    $reply = $_GET['answerId'] != "" ? $_GET['answerId'] : "0"; 
    $postSlug = $_GET['postSlug'];
    $sql9 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
    VALUES (NULL, '$useranswer', '$artcanswer', '$comment', current_timestamp(), '0', '$reply', '0')";
    $result9 = mysqli_query($conexion, $sql9);
    if($result9){
      echo "Gracias por comentar";
      header("Location: ../articulo.php?post-slug=$postSlug");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  // Reportar articulos -->
  if (isset($_GET['reportar'])) {
    $artcid = $_GET['postid'];
    $postSlug = $_GET['postSlug'];
    $sql2 = "UPDATE posts SET reportes = reportes+'1' WHERE posts.id = $artcid";
    $result2 = mysqli_query($conexion, $sql2);
    if($result2){
      echo "Gracias por reportar articulo";
      header("Location: ../articulo.php?post-slug=$postSlug");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  // Reportar comentarios -->
  if (isset($_GET['reportarcoment'])) {
    $commentId = $_GET['answerId'];
    $postSlug = $_GET['postSlug'];
    $sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id =$commentId";
    $result1 = mysqli_query($conexion, $sql1);
    if($result1){
      echo "Gracias por reportar comentario";
      header("Location: ../articulo.php?post-slug=$postSlug");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

?>
