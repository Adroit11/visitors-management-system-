<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
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
					<img src="images/logo.png" alt="Upperlink Logo">
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2 class="lead2"><span class="txt">ADMINISTRATOR PORTAL<hr></span></h2>
		</div>
	</div>
	<div class="container">
			<div class="log">
				<form method="POST" action="oop/control.php">
					<h3 class="lead"><span class="fa fa-sign-in">&nbsp;&nbsp;Administrator's Login</h3>
					<hr>
					<label>Email:</label>
					<input type="text" name="username" placeholder="Enter Your Username">
					<br/>
					<label>Password:</label>
					<input type="password" name="passwrd" placeholder="password">
					<br/>
					<label>&nbsp;</label><input type="submit" value="LOGIN" name="userAuth">
				</form>
			</div>
	</div>
	<?php require"../partials/footies.php";?>
</body>
</html>