<!DOCTYPE HTML>
<html>
	<head>
		<title>Teams</title>
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
							<div class="box">
							  <!--<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>-->
							  <h3>Check your team details</h3>
							  <center>
							    <form method="post" action="teamreg.php">
							      <table>
							        <tr style="background-color: rgba(0,0,0,0);">
							          <td><input type="text" name="team_id" placeholder="Team ID" /></td>
							          <td><input type="submit" value="Submit" /></td>
							        </tr>
							      </table>
							    </form>
							  </center>
							  <?php
							    include_once("config.php");
							    if(!empty($_POST['team_id']))
							    {
							   ?>
								    <table>
								      <tr style="text-align: center; font-weight: bold;">
							          <td>Delegate Number</d>
							          <td>Name</td>
							          <td>Phone Number</th>
							          <td>Event</td>
							        </tr>
							        <?php
										$getdel_no=mysqli_query($link,"SELECT `delegate_number` FROM `sp_team_member` WHERE `team_id`='".$_POST['team_id']."'");
							      while($del_no=mysqli_fetch_array($getdel_no)){
							        $getmem_gendetails=mysqli_query($link,"SELECT * FROM `sp_students` WHERE `delegate_number`='".$del_no['delegate_number']."'");
							        while($mem_gendetails=mysqli_fetch_array($getmem_gendetails))
							        {
							         ?>
							          <tr>
							           <td><?php echo $del_no['delegate_number'];?></td>
							            <td><?php echo $mem_gendetails['name']; ?></td>
							            <td><?php echo $mem_gendetails['phone_number']; ?></td>';
							         <?php 
							            $getmem_eventdetails=mysqli_query($link,"SELECT `event` FROM `sp_team` WHERE `team_id`='".$_POST['team_id']."'");
							          	while($mem_eventdetails=mysqli_fetch_array($getmem_eventdetails))
							          	{
							            	echo
								            '<td>'.$mem_eventdetails['event'].'</td>
								        </tr>';
								          }
								      }
								    }
								    echo
							    	'</table>';
							    }
							  ?>
							  </div>
							</div>
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
