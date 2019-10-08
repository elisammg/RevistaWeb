<?php include('config.php'); ?>
<?php include('registrar.php'); ?>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <form class="log-in-form" action="loggeado.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Registrate</h4>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" value="<?php echo $nombre; ?>" required placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" value="<?php echo $apellido; ?>" required placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" value="<?php echo $username; ?>" required placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" value="<?php echo $email; ?>" required placeholder="Ingrese email">

		  <label for="password">contraseña</label>
		    <input type="password" name="password" value="<?php echo $password; ?>" required placeholder="Ingrese contraseña">

		  <button type="submit" class="button">Register</button>
		</form>
		</div>
	</div>
	</div>
