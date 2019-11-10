<?php include('../conexion.php'); ?>
<?php
if(isset($_GET['destacado'])){

  if(!empty($_GET['destacar'])) {


   $checked_count = count($_GET['destacar']);
      echo "You have selected following ".$checked_count." option(s): <br/>";


    foreach($_GET['destacar'] as $selected) {
      if ($selected == true) {
      $sqldestacado = "UPDATE `posts` SET `destacado` = 1 WHERE `posts`.`id` = '$selected'";
       $resultado0 = mysqli_query($conexion, $sqldestacado);
       echo "<p>" . $selected . "</p>";
    }elseif ($selected == false) {
       $sqlnodestacado = "UPDATE `posts` SET `destacado` = 0 WHERE `posts`.`id` = '$selected'";
       $resultadono0 = mysqli_query($conexion, $sqlnodestacado);
    }
        }
      }else{
      echo "<b>Please Select Atleast One Option.</b>";
        }
      }
    

?>
