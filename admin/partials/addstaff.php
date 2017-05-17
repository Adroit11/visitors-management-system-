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
			<form method="POST" action="../oop/control.php">
					<h3>Administrator's Registration</h3>
					<hr>
					<label>Firstname:</label>
					<input type="text" name="fname" placeholder="Enter Your Firstname">
					<br/><hr>
					<label>Middlename:</label>
					<input type="text" name="midname" placeholder="Enter Your Middlenames">
					<br/><hr>
					<label>Lastname:</label>
					<input type="text" name="lname" placeholder="Enter Your Lastnames">
					<br/><hr>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Enter Your Email Address">
					<br/><hr>
					<label>Password:</label>
					<input type="password" name="pwd" placeholder="Password">
					<br/><hr>
					<label>Username:</label>
					<input type="text" name="user" placeholder="Enter Username">
					<br/><hr>
					<label>Phone No:</label>
					<input type="text" name="phn" placeholder="Enter Your Contact No.">
					<br/><hr>
					<label>Address:</label>
					<input type="text" name="addr" placeholder="Enter Your Address">
					<br/><hr>
					<label>State of Origin:</label>
					<input type="text" name="state" placeholder="Enter Your State">
					<br/><hr>
					<label>Local Gov Area:</label>
					<input type="text" name="lga" placeholder="Enter LGA">
					<br/><hr>
					<label>Post Held:</label>
					<select name="post">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					<br/><hr>
					<label>Admin Status:</label>
					Admin <input class="sml" type="radio" name="status" value="0" checked="checked">
					Super Admin<input class="sml" type="radio" name="status" value="1">
					<br/><hr>
					<label>&nbsp;</label><input type="submit" value="Register" name="reg">
				</form>
		</div>
	</div>
</div>
	<?php require"footies.php"; ?>
</body>
</html>