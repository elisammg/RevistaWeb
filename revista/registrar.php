<?php
include('conexion.php');
//declaracion de variables
  $nombre="";
  $apellido="";
  $username ="";
  $email="";
  $errors = array();
//registrar usuarios
if (isset($_POST['reg_user']))
{
  //recibe inputs values de form
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //validacion
  if (empty($nombre)) { array_push($errors, "Oops.. Name is missing"); }
  if (empty($apellido)) { array_push($errors, "Oops.. Lastname is missing"); }
  if (empty($username)) {  array_push($errors, "Uhmm...We gonna need your username"); }
  if (empty($email)) { array_push($errors, "Oops.. Email is missing"); }
  if (empty($password)) { array_push($errors, "uh-oh you forgot the password"); }

  // Ensure that no user is registered twice.
  // the email and usernames should be unique
  $user_check_query = "SELECT * FROM usuario WHERE username='$username'
  OR email='$email' LIMIT 1";
  $result = mysqli_query($conexion, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database
    $query = "INSERT INTO usuario (nombre, apellido, username, email, role, password)
          VALUES('$nombre','$apellido','$username','$email',NULL,'$password')";
    mysqli_query($conexion, $query);
    // get id of created user
    $reg_user_id = mysqli_insert_id($conexion);

    // put logged in user into session array
    $_SESSION['user'] = getUserById($reg_user_id);

    // if user is admin, redirect to admin area
    if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
      $_SESSION['message'] = "You are now logged in";
      // redirect to admin area
      header('location: ' . BASE_URL . 'admin/dashboard.php');
      exit(0);
    } else {
      $_SESSION['message'] = "You are now logged in";
      // redirect to public area
      header('location: loggeado.php');
      exit(0);
    }
  }
}














 ?>
