<?php include('../conexion.php'); ?>
<?php include( '../includes/registrar_loggear.php'); ?>
<?php include( '../includes/public_functions.php'); ?> 


<!-- Insertar nuevo comentario desde articulo -->
        <?php 
          if (isset($_GET['comentar']))
          {
            $comment = $_GET['comentario'];
            $sql5 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
            VALUES (NULL, '11', '9', '$comment', current_timestamp(), '0', '0', '0')";
            $result5 = mysqli_query($conexion, $sql5);
            if($result5){
              echo "Gracias por comentar";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>
<!-- Insertar nuevo comentario desde otro comentario -->
        <?php 
          if (isset($_GET['contestar']))
          {
            
            $respuesta = $_GET['respuesta'];
            $sql9 = "INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`, `respuesta_a`, `censurar`) 
            VALUES (NULL, '11', '9', '$respuesta', current_timestamp(), '0', '0', '0')";
            $result9 = mysqli_query($conexion, $sql9);
            if($result9){
              echo "Gracias por comentar";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

<!-- Reportar articulos -->
        <?php
           if (isset($_GET['reportar'])) {
            $sql2 = "UPDATE posts SET reportes = reportes+'1' WHERE posts.id = 11";
            $result2 = mysqli_query($conexion, $sql2);
            if($result2){
              echo "Gracias por reportar articulo";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

<!-- Reportar comentarios -->
          <?php
          if (isset($_GET['reportarcoment'])) {
            $sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id = 11";
            $result1 = mysqli_query($conexion, $sql1);
            if($result1){
              echo "Gracias por reportar comentario";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
          ?>
