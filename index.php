<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style>
		input::-webkit-input-placeholder { /* WebKit, Blink, Edge */
			color:rgba(80,80,80,0.75) !important;
			font-weight: bold !important;
		}
		input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
			 color:rgba(80,80,80,0.75) !important;
			 font-weight: bold !important;
		}
		input::-moz-placeholder { /* Mozilla Firefox 19+ */
			 color:rgba(80,80,80,0.75) !important;
			 font-weight: bold !important;
		}
		input:-ms-input-placeholder { /* Internet Explorer 10-11 */
			color:rgba(80,80,80,0.75) !important;
			font-weight: bold !important;
		}
		input:placeholder-shown { /* Standard (https://drafts.csswg.org/selectors-4/#placeholder) */
			color:rgba(80,80,80,0.75) !important;
			font-weight: bold !important;
		}
		</style>
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
			<?php include("header.php"); ?>

			<!-- Banner -->
			<section id="banner" style="text-align: center;">
		    <h2>Revels 2016</h2>
				<p>Sports Login</p>
					<center>
					<form method="post" action="index.php" style="margin-top: 4em;">
						<table style="border-collapse: unset; width: 50%; background-color: rgba(0,0,0,0); border-radius: 6px;">
							<tr style="background-color: rgba(0,0,0,0);">
								<td><input style="background-color: rgba(200,200,200,0.6);color: rgba(38,38,38,1);font-weight: bold !important; width=50%" type="text" placeholder="Username" name="username" required /></td>
							</tr>
							<tr style="background-color: rgba(0,0,0,0);">
								<td><input style="background-color: rgba(200,200,200,0.6);color: rgba(38,38,38,1);font-weight: bold !important;" type="password" placeholder="Password" name="password" required /></td>
							</tr>
							<tr style="background-color: rgba(0,0,0,0);">					
								<td style="text-align: center;"><input style="relative: absolute; position="centre" width: 10px; height: 50px;" tabindex="-1" type="submit" name="login" /></td>
							</tr>
					</table>
					</form>
					</center>
				<?php
					if(isset($_POST['login'])){
						if($_POST['username']=="admin_user"&&$_POST['password']=="admin_pass"){

							echo '<center><h3 style="background-color: rgba(0,221,0,0.4);color: #fff;">Logged in</h3>';
							session_start();
							$_SESSION['login']="logged_in";
							header('Location:delreg.php');
						}
						else{
							echo '<center><h3 style="background-color: rgba(221,0,0,0.4);color: #fff;">Wrong Username/Password</h3>';
							session_unset();
							session_reset();
							session_destroy();
						}
					}
				?>
		  </section>

			<!--Footer-->
				<?php include("footer.php"); ?>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
