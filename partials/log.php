<html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
</head>
<body>
	<div class="banner">
		<div class="container">
			<div class="placeholder">
				<div id="himage">
					<img src="../images/logo.png" alt="Upperlink Logo">
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">VISITOR'S DOCUMENTATION LOGBOOK<hr></span></h2>
		</div>
	</div>
	<div class="container">
			<div class="log">
				<form method="POST" action="../oop/control.php">
					<h3>Receptionist's Login</h3>
					<hr>
					<label>Email:</label>
					<input type="email" name="Email" placeholder="Your E-Mail Address">
					<br/>
					<label>Password:</label>
					<input type="password" name="passwrd" placeholder="password">
					<br/>
					<label>&nbsp;</label><input type="submit" value="LOGIN" name="resptauthen">
				</form>
			</div>
	</div>
	<?php require"footies.php";?>
</body>
</html>