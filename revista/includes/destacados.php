<?php include('../conexion.php'); ?>
<?php
if(isset($_GET['destacado'])){
  if(!empty($_GET['destacar'])) {
    $checked_count = count($_GET['destacar']);
    echo "You have selected following ".$checked_count." option(s): <br/>";

    if($checked_count = 4){
      $updateAll = "UPDATE posts SET destacado = 0";
      mysqli_query($conexion, $updateAll);
      foreach($_GET['destacar'] as $selected) {
        $sqldestacado = "UPDATE `posts` SET `destacado` = 1 WHERE `posts`.`id` = '$selected'";
        $resultado0 = mysqli_query($conexion, $sqldestacado);
        echo "<p>" . $selected . "</p>";
      }
      header("Location: ../admin.php");
    } else {
      echo "<b>Por favor, selecciona exactamente 4 artículos</b>";
    }
  } else {
      echo "<b>Please Select Atleast One Option.</b>";
  }
}
?>
