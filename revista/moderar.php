<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderador Perfil</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
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
          <img src="<?php echo $_SESSION['users']['foto'] ?>" alt="">
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
      <div class="callout">
      <h3>Modulo de moderación</h3>
      <hr>
      <div class="grid-x grid-padding-x">
         <div class="large-4 medium-4 cell">
        <!--Moderacion de articulos para publicar -->  
          <h4>Publicación de Articulos</h4>
          <?php  
          $sql = "SELECT count(Id) FROM mydb.modenewartc"; 
           $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?>
           <p>La cantidad de articulos por revisar son: <b><?=$row['count(Id)']?></b></p>
           <a href="modarticulo.php" class="button">Revisar</a>            
           <?php 
       }//fin blucle
      } else
      {
        echo "0 resultados";
      }
          ?>
        </div>
        <div class="large-4 medium-4 cell">

      <!--Moderacion de comentarios cuenta cuantos hay -->    
          <h4>Moderación de comentarios</h4>
          <?php  
          $sql = "SELECT count(id) FROM mydb.modcomment"; 
           $result = mysqli_query($conexion, $sql);

           if (mysqli_num_rows($result) > 0){ 
           while($row = mysqli_fetch_assoc($result)) 
           {
               ?>
               <p>La cantidad de comentarios reportados son: <b><?=$row['count(id)']?></b></p>
               <a href="modcomentarios.php" class="button">Revisar</a>            
               <?php 
           }//fin blucle
          } else
          {
            echo "0 resultados";
          }
              ?>
        </div>

       <div class="large-4 medium-4 cell">
      <!--Moderacion de Artículos cuenta cuantos hay -->    
          <h4>Moderación de Artículos</h4>
          <?php  
          $sql = "SELECT count(id) FROM mydb.modartc;"; 
          $result = mysqli_query($conexion, $sql);

           if (mysqli_num_rows($result) > 0){ 
           while($row = mysqli_fetch_assoc($result)) 
           {
               ?>
               <p>La cantidad de comentarios reportados son: <b><?=$row['count(id)']?></b></p>
               <a href="reporteartc.php" class="button">Revisar</a>            
               <?php 
           }//fin blucle
          } else
          {
            echo "0 resultados";
          }
              ?>
        </div>



      </div>
      </div>
      <!--Veces visto articulo-->
      <?php require_once('includes/vvartc.php') ?>
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
