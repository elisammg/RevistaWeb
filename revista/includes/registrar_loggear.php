<?php
//session_start();

// initializing variables
$nombre = "";
$apellido = "";
$username = "";
$email    = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
  $username = mysqli_real_escape_string($conexion, $_POST['username']);
  $email = mysqli_real_escape_string($conexion, $_POST['email']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nombre)) { array_push($errors, "Nombre requerido."); }
  if (empty($apellido)) { array_push($errors, "apellido requerido."); }
  if (empty($username)) { array_push($errors, "Nombre de usuario requerido."); }
  if (empty($email)) { array_push($errors, "Correo requerido."); }
  if (empty($password)) { array_push($errors, "Contraseña requerida."); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conexion, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      echo "Nombre de usuario ya existe";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      echo "Correo ya existe";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (nombre, apellido, username, email, role, password, created_at, updated_at) 
  			  VALUES('$nombre', '$apellido', '$username', '$email', 'Lector', '$password', now(), now())";
  	mysqli_query($conexion, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }else{
      echo "No se pudo ingresar usuarios.";
      echo count($errors);
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conexion, $_POST['username']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conexion, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: loggeado.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>