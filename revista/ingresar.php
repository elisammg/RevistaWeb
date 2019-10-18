
	<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
			<?php if (isset($_SESSION['users'])) { ?>
					<h4>Ya estás loggeado</h4>
			<?php } else { ?>

				<form class="log-in-form" method="post" action=index.php>
				<h4 class="text-center">Log in with you email account</h4>
					<?php include('includes/errors.php'); ?>
				<label>Nombre de usuario
					<input type="text" name="username" placeholder="Ingrese username">
				</label>
				<label>Password
					<input type="password" name="password" placeholder="Password">
				</label>
				<p><input type="submit" class="button expanded" name="login_user"></p>
				</form>

			<?php } ?>
		</div>
	</div>
	</div>