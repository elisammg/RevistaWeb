<?php include('../conexion.php'); ?>
 		<?php 
          if (isset($_GET['contestar']))
          {
            require_once('../comentarios/respuesta.php'); 
          }else
          {
          	echo "ayuda";
          }
          if (isset($_GET['reportar'])) {
          	$sql1 = "UPDATE comentarios SET vecesreporte = vecesreporte+'1' WHERE comentarios.id = '12'";
            $result1 = mysqli_query($conexion, $sql1);
            if($result1){
              echo "Se ingresaron correctamente los datos";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

