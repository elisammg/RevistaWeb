<?php 
	
	
	//Cantidad de resultados por página (debe ser INT, no string/varchar)
	$limit = 4;

	//Comprueba si está seteado el GET de HTTP
	if (isset($_GET["pagina"])) {

			//Si la string es numérica, define la variable 'pagina'
			if (is_numeric($_GET["pagina"])) {

				//Si la petición desde la paginación es la página uno
				//en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
				if ($_GET["pagina"] === 1) {
					header("Location: admin.php");
				} else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
					$pagina = $_GET["pagina"];
				};

			} else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
				header("Location: admin.php");
				die();
			};

	} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
		$pagina = 1;
	}

	//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
	$offset = ($pagina-1) * $limit;
	
	// Get all admin users from DB
	$admins = getAdminUsers($limit, $offset);
	$roles = ['Admin', 'Author', 'Lector', 'Moderador'];
?>

<body>
	<div class="container content">
		<!-- Middle form - to create and edit  -->
		<div class="action">

			<form method="post" action="<?php echo 'admin.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include('includes/errors.php') ?>

				<!-- if editing user, the id is required to identify that user -->
				<?php if ($isEditingUser === true): ?>
					<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
					<label>Username</label>
					<label type="text" name="username"><?php echo $username; ?></label>
					<label>Email</label>
					<label type="email" name="email"><?php echo $email; ?></label>
					<label>Suscripcion tipo:</label>
					<label type="text" name="tipo"><?php echo $tipo; ?></label>
					<!--Selección de rol -->
					<select name="role">
						<option value="" selected disabled>Assign role</option>
						<?php foreach ($roles as $key => $role): ?>
							<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
						<?php endforeach ?>
					</select>
	        		<input type="radio" name="pokemonsusc" value="<?php echo $yes; ?>" id="pokemon"><label>Suscripcion activa</label>
	        		<input type="radio" name="pokemonsusc" value="<?php echo $nop; ?>" id="pokemon"><label>Eliminar suscripcion</label>
	        		<br>    
					<button type="submit" class="button" name="update_admin">Actualizar</button>
					<a href="admin.php" type="submit" class="button">Atras</a>
				<?php endif ?>
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			<?php include('includes/messages.php') ?>

			<?php if (empty($admins)): ?>
				<h1>No admins in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nombre de usuario, Email</th>
						<th>Suscripcion</th>
						<th>Rol</th>
						<th colspan="2">Acciones</th>
					</thead>
					<tbody>
					<?php foreach ($admins as $key => $admin): ?>
						<tr>
							<td><?php echo $admin['id']; ?></td>
							<td>
								<?php echo $admin['username']; ?>, &nbsp;
								<?php echo $admin['email']; ?>	
							</td>
							<td><?php echo $admin['tipo']; ?> , &nbsp;
								<?php echo $admin['iniciosusc']; ?>, &nbsp;
								<?php echo $admin['suscripcion']; ?>
								</td>
							<td><?php echo $admin['role']; ?></td>
							<td>
								<a href="admin.php?edit-admin=<?php echo $admin['id'] ?>">Editar usuario</a>
							</td>
							<td>
								<a href="admin.php?delete-admin=<?php echo $admin['id'] ?>">Eliminar Usuario</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
			<?php
				//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
				//Nota: X = $total_paginas
				for ($i=1; $i<=$total_paginas; $i++) {
					//En el bucle, muestra la paginación
					echo "<a href='?pagina=".$i."'>".$i."</a> | ";
				}
			?>
		</div>
		<!-- // Display records from DB -->
		
	</div>
</body>
</html>