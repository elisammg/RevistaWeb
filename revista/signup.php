<?php include('conexion.php'); ?>
<?php include('includes/registrar_loggear.php'); ?>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <form class="log-in-form" action="index.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Registrate</h4>
          <?php include('includes/errors.php') ?>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" value="<?php echo $nombre ?>" required placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" value="<?php echo $apellido ?>" required placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" value="<?php echo $username ?>" required placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" value="<?php echo $email ?>" required placeholder="Ingrese email">

		  <label for="password">Contraseña</label>
		    <input type="password" name="password" required placeholder="Ingrese contraseña">

		  <button type="submit" class="btn" name="reg_user">Register</button>
		</form>
		</div>
	</div>
	</div>
