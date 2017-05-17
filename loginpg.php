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
						<li><a href="visitform.php">VISIT US</a></li>
						<li><a class="active" href="#">STAFF LOGIN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">STAFFS PORTAL<hr></span></h2>
		</div>
	</div>
	<div class="container">
			<div class="log">
				<form method="POST" action="oop/control.php">
					<h3>Staff's Login</h3>
					<hr>
					<label>Email:</label>
					<input type="email" name="Email" placeholder="Your E-Mail Address">
					<br/>
					<label>Password:</label>
					<input type="password" name="passwrd" placeholder="password">
					<br/>
					<label>&nbsp;</label><input type="submit" value="LOGIN" name="userAuth">
					<br/>
					<h6><a href="resetpass.php">Forgotten Password</h6></a>
				</form>
			</div>
	</div>
	<?php require "partials/footies.php";?>
	<div class="container">
			<?php
				if(isset($_GET['msg'])){
	        		echo "<div class='message'>".$_GET['msg']."</div>";
			    }
			    else {
			        
			    }
			?>
		</div>
		<script type= "text/javascript" src="scripts/adroit.js"></script>
</body>
</html>