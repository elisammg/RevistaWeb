<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículo3</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/artc3.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>

  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-9 cell">
      <h1>TITULO ARTÍCULO</h1>
      </div>
      <div class="large-3 cell">
        <h3>Datos de Autor</h3>
        <p>Fecha publicacion</p>
      </div>
    </div>
  </div>
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <div class="callout">
      <p>Resumen</p>
      </div>
      </div>
    </div>
  </div>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <div class="news-image-gallery-container">
  <div class="row">
    <div class="small-12 medium-12 large-8 columns">
      <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
        <ul class="orbit-container">
          <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
          <li class="is-active orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/4K3hXoZ.jpg" alt="Space">
            <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/V7zk0Y3.jpg" alt="Space">
            <figcaption class="orbit-caption">Lets Rocket!</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/vivEvd0.jpg" alt="Space">
            <figcaption class="orbit-caption">Encapsulating</figcaption>
          </li>
          <li class="orbit-slide">
            <img class="orbit-image" src="//i.imgur.com/VKdPzTp.jpg" alt="Space">
            <figcaption class="orbit-caption">Outta This World</figcaption>
          </li>
        </ul>
        <nav class="orbit-bullets">
          <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
          <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
          <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
          <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
        </nav>
      </div>
    </div>    
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
