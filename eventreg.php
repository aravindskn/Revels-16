<!DOCTYPE HTML>
<html>
	<head>
		<title>Event Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
							<h3>Event Registration Form</h3>
							<?php
								include_once("config.php");
								if(isset($_POST['submit2'])){
									session_start();
									$maxteam=$_SESSION['maxteam'];
									if(!empty($_POST['no_of_participants'])){
										if(($_POST['no_of_participants']>$maxteam)||(!preg_match("/^[0-9]{1,2}$/",$_POST['no_of_participants'])))
											echo '<center><h3 style="color: #d00">Kyun code ched raha hai bhai?</h3></center>';
										else{ ?>
											
											<center>
												<form method="post" action="eventreg.php">
													<?php
														$i=0;
														while($i<>$_POST['no_of_participants'])
														{	
													?>													
														<input type="text" name="delegate_no. <?php echo $i;?> " placeholder="Delegate No" style="margin: 7px; width: 50%;" pattern="^[0-9]*$" required />
														<?php													
														$i++;
													}
													?>
													<input type="submit" value="Submit" style="margin: 10px;" />
												</form>
											</center>
											<hr><h4>Or Skip to Next Registration</h4><hr>
											<?php
										}
									}
									else echo '<center><h3 style="color: #d00">Number of players toh daal do.</h3></center>';
								}
								else
									$event=$_SESSION['event'];
								if(isset($_POST['delegate_no0'])){
									$i=0;
									$err=0;
									while($i<>count($_POST)){
										if(!isset($_POST['delegate_no'.$i]))
											$err++;
										if(empty($_POST['delegate_no'.$i]))
											$err++;
										if(!preg_match("/^[0-9]*$/",$_POST['delegate_no'.$i]))
											$err++;
										$i++;
									}
									$i=0;
									$del404=0;
									if($err==0){
										$totalprice=0;
										while($i<>count($_POST)){
											$delnum=mysqli_real_escape_string($link,$_POST['delegate_no'.$i]);
											$getgender=mysqli_fetch_array(mysqli_query($link,"SELECT `gender` FROM `sp_students` WHERE `delegate_number`='".$delnum."'"));
											if(isset($getgender[0]))
												$getprice=mysqli_fetch_array(mysqli_query($link,"SELECT `".$getgender[0]."_price` FROM `sp_event` WHERE `event_name`='".$event."'"));
											else{
												$del404=1;
												break;
											}
											if($event=="Athletics")
												$totalprice=$getprice[0];
											else
												$totalprice=$totalprice+$getprice[0];
											$i++;
										}
										if($del404==0){
											$insertteam=mysqli_query($link,"INSERT INTO `sp_team`(`no_of_part`,`event`,`price`) VALUES ('".count($_POST)."','".$event."','".$totalprice."')");
											$teamidquery=mysqli_query($link,"SELECT `team_id` FROM `sp_team` WHERE 1");
											while($getid=mysqli_fetch_array($teamidquery))
												$teamid=mysqli_real_escape_string($link,$getid[0]);
											$i=0;
											while($i<>count($_POST)){
												$delnum=mysqli_real_escape_string($link,$_POST['delegate_no'.$i]);
												$insertmember=mysqli_query($link,"INSERT INTO `sp_team_member`(`team_id`,`delegate_number`) VALUES ('".$teamid."','".$delnum."')");
												$i++;
											}
											?>
											<table>
												<tr>
													<td>Delegate Numbers:</td>
											<?php
											$i=0;
											while($i<>count($_POST)){
												$delnum=mysqli_real_escape_string($link,$_POST['delegate_no'.$i]);
												echo '<td>'.$delnum.'</td>';
												$i++;
											}											
											?>
												</tr>
												<tr>
													<td>Event:</td>
													<td><?php echo $event; ?></td>
												</tr>
												<tr>
													<td>Team ID:</td>
													<td style="color: #d00"><?php echo $teamid; ?></td>
												</tr>
												<tr style="background-color: rgba(0,0,0,0);">
													<td>Total Price to Pay:</td>
													<td style="color: #d00"><?php echo $totalprice; ?></td>
												</tr>
											</table>
											<?php
										}
										else echo '<h4 style="color: #d00">Delegate number '.$delnum.' does not exist.</h4>';
									}
									else echo '<h4 style="color: #d00">Parameter Breached. Error.</h4>';
								}
							?>
									<iframe style="background-color: rgba(0,0,0,0); height: 100%;width: 100%;"name="frame" src="eventreg_event.php" />
							</iframe>
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
