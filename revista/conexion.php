<?php
  $status = session_status();
  if($status == PHP_SESSION_NONE){
      //There is no active session
      session_start();
  }else
  if($status == PHP_SESSION_DISABLED){
      //Sessions are not available
  }else
  if($status == PHP_SESSION_ACTIVE){
      //Destroy current and start new one
      session_destroy();
      session_start();
  }

  $servername= "localhost";
  $user="root";
  $pass="";
  $dbname="myblog";

  // connect to database
	$conexion = mysqli_connect($servername, $user, $pass, $dbname);

	if (!$conexion) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	//define ('ROOT_PATH', realpath(dirname(__FILE__)));
  //define('BASE_URL', 'http://localhost/myBlog/');
?>