
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentar</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">
  </head>
<header>
</header>
  <body>
    <br>
    <?php if (isset($_SESSION['users'])) { ?>
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <div class="callout">
          <q>Comentario referenciado</q>
        <form action="respuesta.php" method="get">
        <h4 class="text-center">Comentar</h4>

        <label>Comentario</label>
        <input type="text" name="comentario" placeholder="Ingrese comentario">

        <a href="respuesta.php?respuesta=<?php echo $row['Id'] ?>">No Censurar</a>


        <input type="submit" value="Comentar" name="comentar">
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }else{

          echo "Inicia sesion para comentar";

          } ?>
  

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>

</html>
