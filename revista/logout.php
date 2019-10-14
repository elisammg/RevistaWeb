<?php 
	$status = session_status();
	if($status == PHP_SESSION_NONE){
		//There is no active session
		//session_set_cookie_params('3600');
		session_start();
	}else
	if($status == PHP_SESSION_DISABLED){
		//Sessions are not available
	}else
	if($status == PHP_SESSION_ACTIVE){
		//Destroy current and start new one
		session_destroy();
		//session_set_cookie_params('3600');
		session_start();
	}
	session_unset($_SESSION['users']);
	session_destroy();
	header('location: index.php');
?>