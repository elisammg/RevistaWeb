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

        <!-- Administración de anuncios -->
        <div class="large-6 cell">
          <div class="callout">
            <?php require_once('includes/anuncioadmin.php') ?>
          </div>
        </div>
        <?php 
          if (isset($_GET['este']))
          {
            //se pone anuncio en el post que se seleccione
            $opcion=$_GET['carlist'];
            $nombre=$_GET['anuncio'];
            $sql3 = "UPDATE anuncios SET id_post = '$opcion' WHERE anuncios.titulo = '$nombre'";
            $result3 = mysqli_query($conexion, $sql3);
            if($result3){
              echo "Se ingresaron correctamente los datos";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>
        <!-- //Administración de anuncios -->

        <!-- Administración de suscripciones -->
         <div class="large-6 cell">
          <div class="callout">
            <h1>SUSCRIPCIONES</h1>
            <table>
              <tr>
                <th>Numero</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Costo</th>
              </tr>
              <?php 
              $sql="SELECT * FROM suscripcion";
              $result=mysqli_query($conexion,$sql);
              while ($mostrar=mysqli_fetch_array($result)){
              ?>
              <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['tipo'] ?></td>
                <td><?php echo $mostrar['descripcion'] ?></td>
                <td>Q<?php echo $mostrar['costo'] ?></td>
              </tr>
              <?php 
              }

               ?>    
            </table>
            <h5>Nueva suscripcion</h5>
          <form role="form" method="post" action="admin.php">
            <input type="text" name="tipo" required placeholder="Ingrese tipo de suscripcion">
            <input type="text" name="descripcion" required placeholder="Ingrese descripcion">
            <input type="text" name="costo" required placeholder="Ingrese costo">
            <input type="submit" name="nuevasusc" value="Agregar suscripcion">
          </form>
          </div>
        </div>
        <!-- //Insertar suscripciones -->
        <?php 
          if (isset($_POST['nuevasusc']))
          {
            $tipo=$_POST['tipo'];
            $desc=$_POST['descripcion'];
            $precio=$_POST['costo'];
            $sql = "INSERT INTO `suscripcion` (`id`, `tipo`, `descripcion`, `costo`) VALUES (NULL, '$tipo', '$desc', '$precio')";
            $result = mysqli_query($conexion, $sql);
            if($result){
              echo "Se ingresaron correctamente los datos";
            }else{
              echo "No se ingresaron los datos.";
            }
          }
        ?>

       
        <!-- //Administración de suscripciones -->

        <!-- Administración de categorías y subcategorías -->
        <div class="large-12 cell">
          <div class="callout">
          <h3>ADMINISTRAR CATEGORIAS</h3>
          <hr>
              <h4>CATEGORIAS</h4>
                <?php include('admin/topics.php'); ?>
        </div>
      </div>
        <!-- //Administración de categorías y subcategorías -->

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
