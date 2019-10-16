<div class="header">
	<div class="logo">
		<a href="<?php echo '../dashboard.php' ?>">
			<h1>RevistaWeb - Admin area</h1>
		</a>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo '../../signup.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
</div>