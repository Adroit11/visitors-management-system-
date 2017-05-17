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
						<li><a class="active" href="visitform.php">BOOK A VISIT</a></li>
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
			<div class="log">
				<form method="POST" action="oop/control.php">
					<h3>Visitor's Registration</h3>
					<hr>
					<label>Firstname:</label>
					<input type="text" name="fname" placeholder="Enter Your Firstname">
					<br/>
					<label>Other names:</label>
					<input type="text" name="oname" placeholder="Enter Your Othernames">
					<br/>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Enter Your Email Address">
					<br/>
					<label>Residentail Address:</label>
					<input type="text" name="address" placeholder="Enter Your Address">
					<br/>
					<label>Contact Number:</label>
					<input type="text" name="contact" placeholder="Enter Mobile Number">
					<br/>
					<label>State of Origin:</label>
					<input type="text" name="state" placeholder="Enter Your State">
					<br/>
					<label>Driver's Lisence/National Id No:</label>
					<input type="text" name="idnumb" placeholder="Enter Identity Number">
					<br/>
					<label>Purpose of Visit:</label>
					<input type="text" name="purpose" placeholder="Business Purpose or What?">
					<br/>
					<label>Whom to See:</label>
					<select>
						<?php 
                            while($row = mysql_fetch_assoc($run)){
                            echo "<option name='positions' value='$row[position]'>$row[position]</option>";
                            } 
                            ?>
					</select>
					<br/>
					<input type="file" name="pics" placeholder="Enter Your Username">
					<br/>
					<label>&nbsp;</label><input type="submit" value="Book Visit" name="booking">
				</form>
			</div>
	</div>
	<?php require"partials/footies.php"; ?>
</body>
</html>