<?php include('../conexion.php'); ?>
<?php
if(isset($_GET['destacado'])){

  if(!empty($_GET['destacar'])) {


   $checked_count = count($_GET['destacar']);
      echo "You have selected following ".$checked_count." option(s): <br/>";*/


    foreach($_GET['destacar'] as $selected) {
      $sqldestacado = "UPDATE `posts` SET `destacado` = 1 WHERE `posts`.`id` = '$selected'";
       $resultado0 = mysqli_query($conexion, $sqldestacado);
       echo "<p>" . $selected . "</p>";
        }
      
        }else{
      echo "<b>Please Select Atleast One Option.</b>";
        }
      }
?>
