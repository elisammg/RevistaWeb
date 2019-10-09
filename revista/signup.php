<?php include('config.php'); ?>
<?php include('registrar_loggear.php'); ?>
  <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        <form class="log-in-form" action="index.php" method="post" enctype="multipart/form-data">
		  <h4 class="text-center">Registrate</h4>
		  <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" required placeholder="Ingrese nombre">

		  <label for="apellido">Apellido</label>
		    <input type="text" name="apellido" required placeholder="Ingrese Apellido">

		  <label for="username">Nombre de Usuario</label>
		    <input type="text" name="username" required placeholder="Ingrese Username">

		  <label for="email">Email</label>
		    <input type="email" name="email" required placeholder="Ingrese email">

		  <label for="password">Contraseña</label>
		    <input type="password" name="password" required placeholder="Ingrese contraseña">

		  <input type="submit" value="Enviar" name="enviar">
		</form>
		</div>
	</div>
	</div>
