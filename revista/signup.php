<?php include('config.php'); ?>
<?php include('registrar_loggear.php'); ?>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <form class="log-in-form" action="index.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Registrate</h4>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" placeholder="Ingrese email">

		  <label for="password">contraseña</label>
		    <input type="password" name="password" placeholder="Ingrese contraseña">

		  <button type="submit" class="btn" name="reg_user">Register</button>
		</form>
		</div>
	</div>
	</div>
