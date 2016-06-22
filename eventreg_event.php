<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body style="background-color: rgba(0,0,0,0);">
		<?php
			include_once("config.php");
		?>
			<table style="margin-top: 2em">
				<tr>
					<form method="post" action="eventreg_numpart.php">
						<td style="width: 80%;">
							<select id="category" name="event">
								<?php 
								$eventselect=mysqli_query($link,'SELECT DISTINCT `event_name` FROM `sp_event`');
								while($selection=mysqli_fetch_array($eventselect))
								{									
								?>
									<option value="<?php echo $selection['event_name']; ?>"><?php echo $selection['event_name'];?></option>
								<?php } ?>
							</select>
						</td>
						<td style="text-align: right;"><input type="submit" value="Continue" name="submit1" /></td>
					</form>
				</tr>
			</table>
	</body>
</html>
