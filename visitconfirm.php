<?php
session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
</head>
<body>
	<div class="banner">
		<div class="container">
			<div class="placeholder">
				<div id="himage">
					<img src="images/logo.png" alt="Upperlink Logo">
				</div>
				<div id="menus">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="">ABOUT</a></li>
						<li><a href="">PRODUCTS</a></li>
						<li><a href="#">OUR CLIENTS</a></li>
						<li><a href="">STUDENT ASSISTANCE</a></li>
						<li><a class="active" href="visitform.php">VISIT US</a></li>
						<li><a href="loginpg.php">STAFF LOGIN<span class="fa fa-lock"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">BOOK A VISIT WITH US<hr></span></h2>
			<h6><span class="txt"><strong>Register a Visit With Us To Avoid Any Delay. Just Print or Copy Your Visiting Code, Then Give It To The Receptionist For Validation.</strong></span></h6>
		</div>
	</div>
	<div class="container">
			<div class="loge">
				<?php
				echo "Welcome <h3>".$_SESSION['verify'][0]." ".$_SESSION['verify'][1]."</h3>"."<p>Your Visiting Id Number Is:<h1>".$_SESSION['verify'][2]."</h1></p>";
				echo "<h6>*Your Visiting Id save you the registration time at the receptionist desk.</h6>";
				?>
			</div>
	</div>
	<?php require"partials/footies.php"; ?>
</body>
</html>