<?php include('../conexion.php'); ?>
 		<?php 
    //$postid = $post['id'];
    //boton para contestar
          if (isset($_GET['contestar']))
          {
            require_once('../comentarios/respuesta.php'); 
          }else
          {
          	echo "ayuda";
          } ?>

          <?php
    //boton para reportar comentarios
          if (isset($_GET['reportar'])) {
          	$sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id = 11";
            $result1 = mysqli_query($conexion, $sql1);
            if($result1){
              echo "Gracias por reportar comentario";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
          ?>

          <?php
    //boton para reportar articulos
           if (isset($_GET['reportarartc'])) {
            $sql2 = "UPDATE posts SET reportes = reportes+'1' WHERE posts.id = 11";
            $result2 = mysqli_query($conexion, $sql2);
            if($result2){
              echo "Gracias por reportar articulo";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

