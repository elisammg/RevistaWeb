<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/admin.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <h1>BIENVENIDO</h1>
      </div>
      <div class="large-4 cell">
        <div class="callout">
          <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
          <h3>DATOS USUARIO</h3>
          <form class="" action="index.html" method="post">
          <ul>
            <li>
              <label for="nombre">NOMBRE</label>
            </li>
            <li>
              <label for="nombre">APELLIDO</label>
            </li>
          </ul>
          <a href="updatedata.php" class="button">Cambiar datos</a>
        </form>
      </div>
    </div>
    <div class="large-8 cell">
      <div class="callout">
      <h3>ADMINISTRAR USUARIOS</h3>
      <div class="grid-x grid-padding-x">
        <div class="large-6 medium-6 cell">
          <p><a href="http:0//github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</p>
        </div>
        <div class="large-6 medium-6 cell">
          <p><a href="https://twitter.com/ZURBfoundation">@zurbfoundation</a><br />Ping us on Twitter if you have questions. When you build something with this we'd love to see it (and send you a totally boss sticker).</p>
        </div>
      </div>
      </div>
    </div>
    <div class="large-12 cell">
      <div class="callout">
      <h3>ADMINISTRAR CATEGORIAS</h3>
      <hr>
      <div class="grid-x grid-padding-x">
        <div class="large-6 medium-6 cell">
          <h4>CATEGORIAS</h4>
          <ul>
            <li>CATEGORIA 1
              <br>
              <a href="#" class="button">CONFIGURAR CATEGORIA</a>
            </li>
            <li>CATEGORIA 2
              <br>
              <a href="#" class="button">CONFIGURAR CATEGORIA</a>
            </li>
            <li>CATEGORIA 3
              <br>
              <a href="#" class="button">CONFIGURAR CATEGORIA</a>
            </li>
          </ul>
          <a href="newcat.php" class="button">NUEVA CATEGORIA</a>
        </div>
        <div class="large-6 medium-6 cell">
          <h4>SUBCATEGORIAS</h4>
          <ul>
            <li>SUBCATEGORIA 1
              <br>
              <a href="#" class="button">CONFIGURAR SUBCATEGORIA</a>
            </li>
            <li>SUBCATEGORIA 2
              <br>
              <a href="#" class="button">CONFIGURAR SUBCATEGORIA</a>
            </li>
            <li>SUBCATEGORIA 3
              <br>
              <a href="#" class="button">CONFIGURAR SUBCATEGORIA</a>
            </li>
          </ul>
          <a href="newsub.php" class="button">NUEVA SUBCATEGORIA</a></div>
      </div>
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
