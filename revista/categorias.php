<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEROGRÍAS</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <head>
    <?php require_once('includes/navbar.php') ?>
    <?php require_once('includes/header.php') ?>
  </head>
  <body>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>CATEGORIAS</h1>
        </div>
      </div>
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
<?php
$sql = "SELECT topics.id, topics.name, topics.slug, subtopic.nombre, subtopic.plantilla\n"

    . "FROM mydb.topics\n"

    . "INNER JOIN mydb.subtopic\n"

    . "ON subtopic.id_topic = topics.id";
$result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result))
    {
     ?>
            <h3><?=$row['name']?></h3>
            <div class="grid-x grid-padding-x">
              <div class="large-6 medium-6 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
              </div>
              <div class="large-6 medium-6 cell">
              <p><?=$row['slug']?></p>
              <hr>
              <p><a href="subcategoria.php?subtopic-plantilla=<?php echo $row['plantilla']; ?>"><?php category_tree($row["id"]);?></a></p>
              </div>
          </div>
          <hr>
          <?php 
       } //end while
     } //end if
       ?>

        </div>
      </div>
    </div>          
  </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>
