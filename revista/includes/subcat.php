<!--<?php include('conexion.php'); ?>
<?php  $sql = "SELECT subtopic.nombre \n"

    . "FROM mydb.topics\n"

    . "INNER JOIN mydb.subtopic\n"

    . "ON subtopic.id_topic = topics.id";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_row($result) > 0) 
    {
      while ($row = mysqli_fetch_assoc($result)) 
      {
    ?>
    <li><a href="sub1.php"><?=$row['nombre']?></a></li>
    <?php 
       } //end while
     } //end if
       ?> -->
       