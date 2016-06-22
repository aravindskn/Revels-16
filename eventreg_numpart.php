<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body style="background-color: rgba(0,0,0,0);">
		<?php
			include_once("config.php");
			if(isset($_POST['event']))
				$event=$_POST['event'];
			else
			 echo '<h3 style="color: #d00">Couldn\'t get Event Name</h3>';
 			$getmaxteam=mysqli_fetch_array(mysqli_query($link,"SELECT `max_team` FROM `sp_event` WHERE `event_name`='".$event."'"));
			$maxteam=$getmaxteam['max_team'];
			session_start();
			$_SESSION['maxteam']=$maxteam;
			$_SESSION['event']=$event;
 			if((isset($event))&&(!empty($event)))
 			{
 				echo 'Maximum number of participants for '.$event.' is: '.$maxteam; 
 		?>
 				<table>
 				<tr>
 					<form method="post" action="eventreg.php" target="_parent">
						<td style="width: 75%;"><input type="number" name="no_of_participants" placeholder="Number of Participants" min="1" max=<?php echo $maxteam; ?> required /></td>
 						<td style="width: 20%;"><input type="submit" name="submit2" value="Continue" style="float: right;" /></td>
 					</form>
 				</tr>
 				</table>
			<?php } ?>
	</body>
</html>
