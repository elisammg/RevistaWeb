<?php include ("conexion.php"); ?>
<?php
  $query="SELECT * FROM posts";
  $resultado = mysqli_query($conexion, $query);
  if (!$resultado){
    die("Error");
  }else{
    while ($data = mysqli_fetch_assoc($resultado)){
      $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
  }
  mysqli_free_result($resultado);

  ?>

  <br>

  <?php
    $query1="SELECT * FROM topics";
    $resultado1 = mysqli_query($conexion, $query1);
    if (!$resultado1){
      die("Error");
    }else{
      while ($data1 = mysqli_fetch_assoc($resultado1)){
        $arreglo1["data"][] = $data1;
      }
      echo json_encode($arreglo1);
    }
    mysqli_free_result($resultado1);

    ?>
<br>

<?php
  $query2="SELECT * FROM subtopic";
  $resultado2 = mysqli_query($conexion, $query2);
  if (!$resultado2){
    die("Error");
  }else{
    while ($data2 = mysqli_fetch_assoc($resultado2)){
      $arreglo2["data"][] = $data2;
    }
    echo json_encode($arreglo2);
  }
  mysqli_free_result($resultado2);

  ?>
