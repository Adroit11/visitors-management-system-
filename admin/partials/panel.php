<?php
	require('../connections/init.php');
	if(!check_login())
	header('location: ../index.php?msg=You Are Welcome!');
else{
	$username = get_username();
	$enroll = get_enroll();
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
</head>
<body>
	<div class="banner">
		<div class="container">
			<div class="placeholder">
				<div id="himage">
					<img src="../images/logo.png" alt="Upperlink Logo">
				</div>
				<div id="menus">
					<ul>
						<li>USER ID:&nbsp; <?php echo $enroll;?></li>
						<li>ADMINISTRATOR: <?php echo $username;?>&nbsp;&nbsp;<span class="fa fa-unlock"></span>&nbsp;&nbsp;<a href="logout.php">Signout&nbsp;&nbsp;<span class="fa fa-sign-out"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">ADMINISTRATOR's PORTAL</span></h2>
		</div>
	</div>
	<div class="container">
		<div class="wrap">
			<img class="passport" src="">
			<?php
			if (isset($_GET['linking_id'])) {
				$check = $_GET['linking_id'];
				$num = "SELECT * FROM tbl_visitors WHERE visitors_id = $check LIMIT 1";
				$result = mysql_query($num);
				if (mysql_num_rows($result) > 0) {
								while ($exam = mysql_fetch_assoc($result)) {
									echo " <label>FIRST NAME:</label>
					<input type='text' value='".$exam['visitors_fname']."' readonly><br>";
					echo " <label>OTHER NAMES:</label>
					<input type='text' value='".$exam['visitors_oname']."' readonly><br>";
					echo " <label>EMAIL ADRESS:</label>
					<input type='text' value='".$exam['visitors_email']."' readonly><br>";
					echo " <label>RESIDENTIAL ADRESS:</label>
					<input type='text' value='".$exam['visitors_address']."' readonly><br>";
					echo " <label>PHONE NO:</label>
					<input type='text' value='".$exam['visitors_contact']."' readonly><br>";
					echo " <label>STATE:</label>
					<input type='text' value='".$exam['visitors_state']."' readonly><br>";
					echo " <label>PURPOSE of VISIT:</label>
					<input type='text' value='".$exam['visit_purpose']."' readonly><br>";
					echo " <label>IDENTITY:</label>
					<input type='text' value='".$exam['visitors_identity']."' readonly><br>";
					echo " <label>TIME LOGGED IN:</label>
					<input type='text' value='".$exam['visitors_timein']."' readonly><br>";
					echo " <label>TIME LOGGED OUT:</label>
					<input type='text' value='".$exam['visitors_timeout']."' readonly><br>";

				}
				echo "<label>&nbsp;</label><button class='button' onclick="."window.location='adpanel.php';".">* OK</button>";
			}
			else{
				header('location:adpanel.php');
			}
		}
		?>
		</div>
	</div>
</div>
	<?php require"footies.php"; ?>
</body>
</html>