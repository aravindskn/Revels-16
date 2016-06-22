<!DOCTYPE HTML>
<html>
	<head>
		<title>Delegate Card Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="landing">
		<div id="page-wrapper" class="bgtest" style="padding: 18em 0em 0em 0em;">

			<!-- Header -->
			<?php include("header.php"); ?>

			<!-- Banner -->

			<!-- Main -->
				<section id="main" class="container">
					<section class="box special">
  					<header class="major">
  						<h2 style="margin-bottom: 30px;">Delegate Card Registration</h2>
  						<form method="post" action="delreg.php">
  								<table>
  								  <tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td><input type="text" placeholder="Name" name="name" patterm="{0,30}" pattern="^[A-Za-z ]*$" required /></td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td colspan="1"><input type="text" placeholder="Registration Number" name="reg_no" pattern="^[0-9]*$" required /></td>
  									</tr>
  									<tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td><input type="text" placeholder="College" name="college" pattern="^[A-Za-z ]*$" required/></td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td colspan="1"><input type="email" placeholder="E-mail" name="email" pattern="^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" required /></td>
  									</tr>
  									<tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td><input type="text" placeholder="Phone Number" name="ph_no" pattern="^[0-9]{10}$" required/></td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,0); border: 0px;">
  										<td colspan="1">
  										  <select id="category" name="gender" style="float: left;">
  												<option>Gender</option>
  												<option value="male">Male</option>
  												<option value="female">Female</option>
  											</select>
  										</td>
                    </tr>
										<!--<tr style="text-align: center; width: 100%;"><td colspan="2"><center><div class="g-recaptcha" data-sitekey="6Lf9hRgTAAAAAD_Xk75NE8XQxoRx5Q84UUFR0O5f"></div></center></td></tr>
  									<tr style="background-color: rgba(0,0,0,0); border-bottom: 0px;">
  										<td style="text-align: right;"><input style="width: 50%;" type="submit" value="Submit" name="submit" /></td>
  										<td style="text-align: left;"><input style="width: 50%;"  type="reset" value="Reset" /></td>
  									</tr>-->
										<tr style="background-color: rgba(0,0,0,0); border: 0px;">
											<td><center><div class="g-recaptcha" data-sitekey="6Lf9hRgTAAAAAD_Xk75NE8XQxoRx5Q84UUFR0O5f"></div></td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,0); border: 0px;">
											<td style="vertical-align: middle;"><input style="width: 50%;" type="submit" value="Submit" name="submit" /></td>
                    </tr>
                    <tr style="background-color: rgba(0,0,0,0); border: 0px;">
											<td style="vertical-align: middle;"><input style="width: 50%;"  type="reset" value="Reset" /></td></center>
										</tr>
  								</table>
  								<?php
                    include_once("config.php");
                    if(isset($_POST['submit'])){
                      $err=0;
                      if(!preg_match("/^[A-Za-z ]*$/",$_POST['name'])){
                        //echo '<h4 style="color: #d00;" >Naam</h4>';
                        $err=1;
                      }
                      else $name=$_POST['name'];
                      if(!preg_match("/^[0-9]*$/",$_POST['reg_no'])){
                        //echo '<h4 style="color: #d00;" >reg no</h4>';
                        $err=1;
                      }
                      else $reg_no=$_POST['reg_no'];
                      if(!preg_match("/^[A-Za-z ]*$/",$_POST['college'])){
                        //echo '<h4 style="color: #d00;" >college</h4>';
                        $err=1;
                      }
                      else $college=$_POST['college'];
                      if(!preg_match("/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/",$_POST['email'])){
                        //echo '<h4 style="color: #d00;" >email</h4>';
                        $err=1;
                      }
                      else $email=$_POST['email'];
                      if(!preg_match("/^[0-9]{10}$/", $_POST['ph_no']))
                      {
                        //echo '<h4 style="color: #d00;" >phoone</h4>';
                        $err=1;
                      }
                      else $ph_no=$_POST['ph_no'];
    									$gender=$_POST['gender'];
											if(isset($_POST['g-recaptcha-response']))
                      {
												$captcha=$_POST['g-recaptcha-response'];
												$secretKey="6Lf9hRgTAAAAALI3dwEuRursFqdwMMvDSEvbJ_MN";
        								$ip=$_SERVER['REMOTE_ADDR'];
								        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
								        $responseKeys=json_decode($response,true);
								        if(intval($responseKeys["success"])!==1)
                        {
								          echo '<h4 style="color: #d00;">Check your captcha response</h2>';
													exit;
								        }
											}
											else
												$err=2;
                      if($err==0)
                      {
                        $name=mysqli_real_escape_string($link,$name);
      									$reg_no=mysqli_real_escape_string($link,$reg_no);
      									$college=mysqli_real_escape_string($link,$college);
      									$email=mysqli_real_escape_string($link,$email);
      									$ph_no=mysqli_real_escape_string($link,$ph_no);
      									$gender=mysqli_real_escape_string($link,$gender);
                      	if(!empty($name)&&!empty($reg_no)&&!empty($college)&&!empty($email)&&!empty($ph_no)&&!empty($gender))
                        {
        									$unicheck=mysqli_query($link,"SELECT `registration_number`,`college` FROM `sp_students` WHERE `registration_number`='{$reg_no}' AND `college`='{$college}'");
        									$unicheckarr=mysqli_fetch_array($unicheck);
        									if(!empty($unicheckarr)) echo 'You have already registered';
        									else
                          {
        										$insertquery=mysqli_query($link,"INSERT INTO `sp_students`(`name`,`registration_number`,`college`,`email`,`phone_number`,`gender`) VALUES ('{$name}','{$reg_no}','{$college}','{$email}','{$ph_no}','{$gender}')");
                            echo '<h4>Thank You for Registering. Your Delegate Number is: <font style="color: #d00;">';
        										$query="SELECT `delegate_number` FROM sp_students";
        										$result=mysqli_query($link,$query);
        										if($result)
        											while($row=mysqli_fetch_assoc($result))
        												$maxid=$row["delegate_number"];
        										echo $maxid.'</font></h4>';
        									}
        								}
        								else echo '<h4 style="color: #d00;" >Please fill all the details</h4>';
                      }
											elseif($err==2) echo '<h4 style="color: #d00;">Please check your captcha response.</h4>';
											else echo '<h4 style="color: #d00;">Itna asaan toh nahi hai bhai</h4>';
                      echo $err;
                    }
  								?>
  					</header>
				</section>
			</section>
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