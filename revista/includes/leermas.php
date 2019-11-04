
<?php include('../conexion.php'); ?>

<input type="submit" class="button" name="leer" value="Leer mas">

  <?php  
    if (isset($_GET['leer'])) {
    $sql1 = "UPDATE posts SET views = views+'1' WHERE posts.id = '12'";
    $result1 = mysqli_query($conexion, $sql1);
    if($result1){
    echo "Gracias por reportar";
    ?>
    <a href="articulo.php?post-slug=<?php echo $row['slug'];?>"></a>
    <?php
    }else{
    echo "No se ingresaron los datos.";
    }
    }
  ?>