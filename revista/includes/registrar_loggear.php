<?php
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

  	$query = "INSERT INTO users (nombre, apellido, username, email, role, password, created_at, updated_at, foto, suscripcion) 
  			  VALUES('$nombre', '$apellido', '$username', '$email', 'Lector', '$password', now(), now(), NULL, 0)";
    mysqli_query($conexion, $query);
    
    // get id of created user
    $reg_user_id = mysqli_insert_id($conexion);
      
    $sql = "SELECT * FROM users WHERE id=$reg_user_id LIMIT 1";
    $results_reg = mysqli_query($conexion, $sql);

    $user = mysqli_fetch_assoc($results_reg);
    $_SESSION['users'] = $user;
    
    if ( in_array($_SESSION['users']['role'], ["Lector"])) {
      $_SESSION['message'] = "You are now logged in";
      // redirect to admin area
      header('location: loggeado.php');
      exit(0);
    } else if (in_array($_SESSION['users']['role'], ["Author"])){
      $_SESSION['message'] = "You are now logged in";
      // redirect to public area
      header('location: autor.php');				
      exit(0);
    } else if (in_array($_SESSION['users']['role'], ["Admin"])){
      $_SESSION['message'] = "You are now logged in";
      // redirect to public area
      header('location: admin.php');				
      exit(0);
    } else if(in_array($_SESSION['users']['role'], ["Moderador"])){
      $_SESSION['message'] = "You are now logged in";
      // redirect to public area
      header('location: moderar.php');				
      exit(0);
    } else {
      array_push($errors, "No se pudo reenviar a la página.");
    }
  }else{
    echo "No se pudo ingresar usuarios.";
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
    $results_log = mysqli_query($conexion, $query);
    
  	if (mysqli_num_rows($results_log) == 1) {
      $user = mysqli_fetch_assoc($results_log);
      $_SESSION['users'] = $user;
      
      if ( in_array($_SESSION['users']['role'], ["Lector"])) {
        //$_SESSION['message'] = "You are now logged in";
        // redirect to admin area
        header('location: loggeado.php');
        exit(0);
      } else if (in_array($_SESSION['users']['role'], ["Author"])){
        //$_SESSION['message'] = "You are now logged in";
        // redirect to public area
        header('location: autor.php');				
        exit(0);
      } else if (in_array($_SESSION['users']['role'], ["Admin"])){
        //$_SESSION['message'] = "You are now logged in";
        // redirect to public area
        header('location: admin.php');				
        exit(0);
      } else if(in_array($_SESSION['users']['role'], ["Moderador"])){
        //$_SESSION['message'] = "You are now logged in";
        // redirect to public area
        header('location: moderar.php');				
        exit(0);
      } else {
        array_push($errors, "No se pudo reenviar a la página.");
      }
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

/*function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
	}*/

?>