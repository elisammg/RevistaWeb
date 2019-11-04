<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>

<?php 
  $roles = ['Admin', 'Author', 'Lector', 'Moderador'];
  $isEditingPost = false;		
?>

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
  <?php //$posts = getAllPosts(); ?>
</header>
  <body>
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <?php if (isset($_SESSION['users'])) { ?>
          <div class="logged_in_info">
            <h1><span>Bienvenido <?php echo $_SESSION['users']['username'] ?></span></h1>
          </div>
        <?php }else{ ?>
          <h1>Bienvenido</h1>
        <?php } ?>
      </div>
      <div class="large-4 cell">
        <div class="callout">
          <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
          <h3>DATOS USUARIO</h3>
          <form class="" action="index.html" method="post">
          <ul>
            <li>
              <label for="nombre"><?php echo $_SESSION['users']['nombre'] ?></label>
            </li>
            <li>
              <label for="nombre"><?php echo $_SESSION['users']['apellido'] ?></label>
            </li>
          </ul>
          <a href="updatedata.php" class="button">Cambiar datos</a>
        </form>
      </div>
    </div>

    <div class="large-8 cell">
      <?php require_once('includes/vvartc.php') ?>
    </div>

    <!-- Posts area -->
    <div class="large-12 cell">
      <div class="callout">
          <?php include('admin/posts.php'); ?>
        </div>
      </div>
    </div>
    
    <!--crear articulo -->
    <div class="large-12 cell">
      <div class="callout">
        <?php //include('admin/create_post.php'); ?>
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
