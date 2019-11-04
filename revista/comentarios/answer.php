<?php include('../conexion.php'); ?>
 		<?php 
    //boton para contestar
          if (isset($_GET['contestar']))
          {
            require_once('../comentarios/respuesta.php'); 
          }else
          {
          	echo "ayuda";
          }
    //boton para reportar comentarios
          if (isset($_GET['reportar'])) {
          	$sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id = '12'";
            $result1 = mysqli_query($conexion, $sql1);
            if($result1){
              echo "Gracias por reportar";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
    //boton para reportar articulos
           if (isset($_GET['reportarartc'])) {
            $sql1 = "UPDATE posts SET reportes = reportes+'1' WHERE posts.id = '9'";
            $result1 = mysqli_query($conexion, $sql1);
            if($result1){
              echo "Gracias por reportar";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

