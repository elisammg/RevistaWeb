<?php
  if(!isset($_SESSION)) 
  { 
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