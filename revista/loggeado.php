<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
          <h1><span>Bienvenido <?php echo $_SESSION['users']['nombre'] ?></span></h1>
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
            <li>
              <label for="nombre"><?php echo $_SESSION['users']['username'] ?></label>
            </li>
          </ul>
          <a href="updatedata.php?id=<?php echo $_SESSION['users']['id'] ?>" class="button">Cambiar datos</a>
        </form>
      </div>
    </div>
    <div class="large-8 cell">
      <div class="callout">
        <h3>SUSCRIPCION:</h3>
        <p>DATOS SUSCRIPCION</p>
        <a href="suscripcion.php?id=<?php echo $_SESSION['users']['id'] ?>" class="button">Suscripciones</a>
        <h4>Datos de Cobro</h4>
        <?php

  ?>
       <div class="large-12">
       <table align="center" cellpadding="1" cellspacing="1">
           <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Numero de Tarjeta</strong></td>
            <td width="100" align="center"><strong>Fecha de vencimiento</strong></td>
            <td width="100" align="center"><strong>Digitos laterales</strong></td>
       </tr> 
       
    <?php
    $id = $_SESSION['users']['id'];    
    $sql = "SELECT tarjeta, vencimiento, atras FROM cobro WHERE id_users = '$id'";
    
       $result = mysqli_query($conexion, $sql);

       if (mysqli_num_rows($result) > 0){ 
       while($row = mysqli_fetch_assoc($result)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$row['tarjeta']?></td>
               <td class="estilo-tabla" align="center"><?=$row['vencimiento']?></td>
               <td class="estilo-tabla" align="center"><?=$row['atras']?></td>
           </tr> 
           <?php 
       }//fin blucle
      } else
      {
        echo "0 resultados";
      }
    ?>
    </table>
        <a href="updatecobro.php?id=<?php echo $_SESSION['users']['id'] ?>" class="button">Cambiar datos</a>
      </div>
    </div>
    <div class="large-12 cell">
      <div class="callout">
      <h6>¿Quieres ser autor, moderador o administrador?</h6>
      <p>Da click en enviar solicitud para cambio de rol!</p>
      <button type="submit" name="solicitud" class="button">Eviar solicitud</button>
        
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
