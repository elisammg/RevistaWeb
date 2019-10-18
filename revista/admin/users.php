<?php  //include('../conexion.php'); ?>
<?php  include('includes/user_functions.php'); ?>
<?php 
	// Get all admin users from DB
	$admins = getAdminUsers();
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
					<label type="text" name="username"><?php echo $username; ?></label>
					<label type="email" name="email"><?php echo $email ?></label>
					<!--Selección de rol -->
					<select name="role">
						<option value="" selected disabled>Assign role</option>
						<?php foreach ($roles as $key => $role): ?>
							<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
						<?php endforeach ?>
					</select>
				<?php endif ?>
				<!-- if editing user, display the update button instead of create button -->
				<?php if ($isEditingUser === true): ?> 
					<button type="submit" class="btn" name="update_admin">UPDATE</button>
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
						<th>ID</th>
						<th>Nombre de usuario, Email</th>
						<th>Rol</th>
						<th colspan="2">Acciones</th>
					</thead>
					<tbody>
					<?php foreach ($admins as $key => $admin): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td>
								<?php echo $admin['username']; ?>, &nbsp;
								<?php echo $admin['email']; ?>	
							</td>
							<td><?php echo $admin['role']; ?></td>
							<td>
								<a href="admin.php?edit-admin=<?php echo $admin['id'] ?>">Cambiar Rol</a>
							</td>
							<td>
								<a href="admin.php?delete-admin=<?php echo $admin['id'] ?>">Eliminar Usuario</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>