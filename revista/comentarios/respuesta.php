<?php include('../conexion.php'); ?>
<?php include('../includes/registrar_loggear.php'); ?>
<?php include('../includes/public_functions.php'); ?> 

<?php
  //Insertar nuevo comentario desde articulo 
  if (isset($_GET['comentar'])){
    $userommentid = $_GET['useridcomment'];
    $postId = $_GET['postidcomment'];
    $comment = $_GET['comentario'];
    $sql5 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
      VALUES (NULL, '$userommentid', '$postId', '$comment', current_timestamp(), '0', '0', '0')";
    $result5 = mysqli_query($conexion, $sql5);
    if($result5){
      echo "Gracias por comentar";
      header("Location: ../articulo.php?post-slug=$postId");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  //Insertar nuevo comentario desde otro comentario -->
  if (isset($_GET['contestar'])) {
    $useranswer = $_GET['useridanswer'];
    $postId = $_GET['postidanswer'];
    $comment = $_GET['comment'];
    $reply = $_GET['answerId'] != "" ? $_GET['answerId'] : "0";
    $sql9 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
      VALUES (NULL, '$useranswer', '$postId', '$comment', current_timestamp(), '0', '$reply', '0')";
    $result9 = mysqli_query($conexion, $sql9);
    if($result9){
      echo "Gracias por comentar";
      header("Location: ../articulo.php?post-slug=$postId");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  // Reportar articulos -->
  if (isset($_GET['reportar'])) {
    $postId = $_GET['postid'];
    $sql2 = "UPDATE posts SET reportes = reportes+'1' WHERE posts.id = $postId";
    $result2 = mysqli_query($conexion, $sql2);
    if($result2){
      echo "Gracias por reportar articulo";
      header("Location: ../articulo.php?post-slug=$postId");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  // Reportar comentarios -->
  if (isset($_GET['reportarcoment'])) {
    $commentId = $_GET['answerId'];
    $postId = $_GET['postidanswer'];
    $sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id =$commentId";
    $result1 = mysqli_query($conexion, $sql1);
    if($result1){
      echo "Gracias por reportar comentario";
      header("Location: ../articulo.php?post-slug=$postId");
    }else{
      echo "No se ingresaron los datos.";
    }
  }

  // if para las funciones de comentarios
  if (isset($_GET['censurar-comment']) || isset($_GET['no-censurar-comment']) || isset($_GET['ignorar'])){
    if (isset($_GET['censurar-comment'])){
        global $conexion;
        $comment_id = $_GET['answerId'];
        $postId = $_GET['postidanswer'];
        $sql = "UPDATE comentarios SET censurar = 1 WHERE id = $comment_id";
        $result = mysqli_query($conexion, $sql);
        header("Location: ../articulo.php?post-slug=$postId");
    } elseif (isset($_GET['ignorar'])){
        global $conexion;
        $comment_id = $_GET['answerId'];
        $postId = $_GET['postidanswer'];
        $sql = "UPDATE comentarios SET vecesreporte = null WHERE id = $comment_id";
        $result = mysqli_query($conexion, $sql);
        header("Location: ../articulo.php?post-slug=$postId");
    }
}

?>
