<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOR</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
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
        <div class="grid-x grid-padding-x">
          <div class="large-4 medium-4 cell">
            <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            <h4>ARTICULO</h4>
            <p>Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.
            Short ribs sirloin beef ribs, flank capicola ribeye turducken.
            Sirloin boudin andouille tail. Ham flank tail sausage t-bone, jerky landjaeger kevin porchetta ground round pork belly.
            Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.</p>
          </div>
          <div class="large-4 medium-4 cell">
            <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            <h4>ARTICULO</h4>
            <p>Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.
            Short ribs sirloin beef ribs, flank capicola ribeye turducken.
            Sirloin boudin andouille tail. Ham flank tail sausage t-bone, jerky landjaeger kevin porchetta ground round pork belly.
            Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.</p>
          </div>
          <div class="large-4 medium-4 cell">
            <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
            <h4>ARTICULO</h4>
            <p>Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.
            Short ribs sirloin beef ribs, flank capicola ribeye turducken.
            Sirloin boudin andouille tail. Ham flank tail sausage t-bone, jerky landjaeger kevin porchetta ground round pork belly.
            Flank spare ribs capicola, strip steak biltong pancetta bresaola tri-tip cow landjaeger.</p>
        </div>
        </div>
      </div>
      <a href="newartc.php" class="button">Nuevo Articulo</a>
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
