<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
<header>
  <?php require_once('includes/navbar.php') ?>
</header>
  <body>
  	<br>
    	<div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
		<form class="log-in-form">
		  <h4 class="text-center">Log in with you email account</h4>
		  <label>Email
		    <input type="email" placeholder="somebody@example.com">
		  </label>
		  <label>Password
		    <input type="password" placeholder="Password">
		  </label>
		  <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
		  <p><input type="submit" class="button expanded" value="Log in"></input></p>
		</form>
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
