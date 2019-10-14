<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <form class="log-in-form" action="index.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Registrate</h4>
          <?php include('includes/errors.php') ?>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" value="<?php echo $apellido ?>" placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" value="<?php echo $username ?>" placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" value="<?php echo $email ?>" placeholder="Ingrese email">

		  <label for="password">contraseña</label>
		    <input type="password" name="password" placeholder="Ingrese contraseña">

		  <button type="submit" class="btn" name="reg_user">Register</button>
		</form>
		</div>
	</div>
	</div>
