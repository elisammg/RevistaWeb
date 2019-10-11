<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículo 1</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>
    <br>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>TÍTULO ARTÍCULO</h1>
          <div class="callout">
            <p>NOMBRE Y APELLIDO AUTOR</p>
            <p>FECHA DE PUBLICACION</p>
            <p>SUBCATEGORÍA</p>
            <p>RESUMEN</p>
            <span class="primary label">FREE</span>
          </div>
          <p>
            <hr>
            <h2>IMÁGENES DESTACADAS</h2>
            <div class="grid-x grid-padding-x">
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 1">
                <p> DESCRIPCION IMG 1</p>
              </div>
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 2">
                <p> DESCRIPCION IMG 1</p>
              </div>
              <div class="large-4 medium-4 cell">
                  <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="Imagen 3">
                  <p> DESCRIPCION IMG 1</p>
              </div>
            </div>
            <hr>
            
          </p>
          <hr>

        </div>
      </div>
      <p>¿Consideras que este articulo puede dañar la sensibilidad del lector?</p>
      <p>Puedes dar click al boton "revisión" y será evaluado por un moderador</p>
      <a href="#" class="button">Revision</a>
        </div>
       
          <?php require_once('includes/comentarios.php') ?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
<footer>
  <?php require_once('includes/footer.php') ?>
</footer>
</html>
