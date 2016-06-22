<?php
	error_reporting(E_ERROR);
	session_start();
	echo '
	  <header id="header">
	    <h1><a href="index.php">Revels|16</h1>
	    <nav id="nav">
	      <ul>';
	        if($_SESSION['login']=="logged_in")
	          echo '
	            <li><a href="reset.php">Logout</a></li>';
	        else echo'
	            <li><a href="index.php">Login</a></li>';
	        echo '
	        <li><a href="delreg.php">Delegate Registration</a></li>
	        <li><a href="eventreg.php">Event Registration</a></li>
	      <li><a href="teamreg.php">Teams</a></li>
	      </ul>
	    </nav>
	  </header>';
?>
