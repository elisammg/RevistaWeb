<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>

<?php 
	// Get all admin users from DB
	//$admins = getAdminUsers();
  $roles = ['Admin', 'Author', 'Lector', 'Moderador'];
  $isEditingUser = false;		
?>
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

        <!-- Mensaje de bienvenida -->
        <div class="large-12 cell">
          <?php if (isset($_SESSION['users'])) { ?>
            <div class="logged_in_info">
              <h1><span>Bienvenido <?php echo $_SESSION['users']['username'] ?></span></h1>
            </div>
          <?php }else{ ?>
            <h1>Bienvenido</h1>
          <?php } ?>
        </div>
        <!-- //Mensaje de bienvenida -->

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

        <!-- Administración de usuarios -->
        <div class="large-8 cell">
          <div class="callout">
            <h3>ADMINISTRAR USUARIOS</h3>
            <div class="action">

              <?php include('admin/users.php'); ?>

            </div>
          </div>
        </div>
        <!-- //Administración de usuarios -->

        <!-- Administración de categorías y subcategorías -->
        <div class="large-12 cell">
          <div class="callout">
          <h3>ADMINISTRAR CATEGORIAS</h3>
          <hr>
          <div class="grid-x grid-padding-x">
            <div class="large-6 medium-6 cell">
              <h4>CATEGORIAS</h4>

                <?php include('admin/topics.php'); ?>

            </div>
          </div>
        </div>
        <!-- //Administración de categorías y subcategorías -->

        <!-- Administración de anuncios -->
        <div class="large-12 cell">
          <div class="callout">
            <h3>ANUNCIOS</h3>
            <hr>
            <div class="grid-x grid-padding-x">
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
                <h4>TITULO ANUNCIO</h4>
                <p>Veces visto</p>
                <a href="#" class="button">Seleccionar</a>
              </div>
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
                <h4>TITULO ANUNCIO</h4>
                <p>Veces visto</p>
                <a href="#" class="button">Seleccionar</a>
              </div>
              <div class="large-4 medium-4 cell">
                <img src="https://ipaderos.com/wp-content/uploads/2018/07/macbookpro2018.jpg" alt="">
                <h4>TITULO ANUNCIO</h4>
                <p>Veces visto</p>
                <a href="#" class="button">Seleccionar</a>
              </div>
            </div>
          </div>
        </div>
        <!-- //Administración de anuncios -->

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
