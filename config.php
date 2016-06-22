<?php
	error_reporting(E_ERROR);
	session_start();
	if($_SESSION['login']=="logged_in"){
		define('DB_HOSTNAME','localhost');
		define('DB_USER','root');
		define('DB_PASS','');
		define('DB_NAME','sports');
		$link=mysqli_connect(DB_HOSTNAME,DB_USER,DB_PASS,DB_NAME)
		  or die("Error connecting to the database");
	}
	else{
		session_unset();
		session_destroy();
		header("Location:index.php");
	}
?>
