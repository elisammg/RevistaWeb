  <?php include('../conexion.php'); ?>
    <!-- Ver anuncios -->
          <?php
          $random = $_GET['anunciorandom'];
          $arti = $_GET['artc'];
          $join = $_GET['union'];
          if (isset($_GET['veranuncio'])) {
            $sql1rty = "UPDATE postanuncio SET click = click + '1' WHERE id_anuncio = $random AND id_post = $arti AND id = $join";
            $result1rty = mysqli_query($conexion, $sql1rty);
            if($result1rty){
              echo "Gracias por ver anuncio";
            }else{
              echo "No se ingresaron los datos para ver anuncio";
            }
          }
          ?>

