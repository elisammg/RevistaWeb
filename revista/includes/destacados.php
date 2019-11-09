<?php
if(isset($_GET['destacado'])){

  if(!empty($_GET['destacar'])) {


    $checked_count = count($_GET['destacar']);
      echo "You have selected following ".$checked_count." option(s): <br/>";


    foreach($_GET['destacar'] as $selected) {
      echo 
        "<h2>".$selected ."</h2>";

        }
      
        }else{
      echo "<b>Please Select Atleast One Option.</b>";
        }
      }
?>
