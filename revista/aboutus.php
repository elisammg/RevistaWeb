<?php include('conexion.php'); ?>
<?php include( ROOT_PATH . '/includes/registrar_loggear.php'); ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVISTA WEB</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/artc2.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
  <?php require_once('includes/header.php') ?>
</header>
  <body>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>Sobre nosotros</h1>          
        </div>
        <div class="large-4 medium-4 cell">
            <img src="https://s5.eestatic.com/2018/10/31/actualidad/Actualidad_349729813_130345448_1024x576.jpg">
          </div>
          <div class="large-8 medium-8 cell">
            <div class="callout">
              <h2>Los creadores</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
        <div class="large-12 cell">
          <div class="callout"> 
          <h3>Roles</h3>
          <div class="grid-x grid-padding-x">
            <div class="large-3 medium-3 small-3 cell">
              <img src="https://img.icons8.com/wired/2x/admin-settings-male.png">
              <p>Administrador</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="large-3 medium-3 small-3 cell">
              <img src="https://cdn4.iconfinder.com/data/icons/creative-17/512/writer-fountain-pen-columnist-128.png">
              <p>Escritor</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="large-3 medium-3 small-3 cell">
              <img src="https://www.venafi.com/themes/venafi/images/warning_icon.png">
              <p>Moderador</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="large-3 medium-3 small-3 cell">
              <img src="https://www.shareicon.net/data/128x128/2016/06/30/788695_business_512x512.png">
              <p>Lector</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
          </div>
          </div>        
        </div>
         <div class="large-12 cell">
           <div class="full-width-testimonial">
  <div class="full-width-testimonial-section">
    <div class="full-width-testimonial-icon text-center">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="41px" height="34px" viewBox="-235 240 41 34" style="enable-background:new -235 240 41 34;" xml:space="preserve">
          <path class="quote-path" d="M-231.3,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4
            h8.1v12.8h-14.4V260.4z"/>
          <path class="quote-path" d="M-212,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4h8.1
            v12.8H-212V260.4z"/>
      </svg>
    </div>
    <div class="full-width-testimonial-content">
      <h5 class="full-width-testimonial-text">RESUMEN ARTÍCULO</h5>
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
