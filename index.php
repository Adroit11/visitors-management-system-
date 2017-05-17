<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<script type="text/javascript">
		$(document).ready(function(){
		setTimeout(function(){
		$("div.message").fadeOut(10000, function () {
		$("div.message").remove();
		});

		}, 3000);
		});
	</script>
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
						<li><a class="active" href="">HOME</a></li>
						<li><a href="">ABOUT</a></li>
						<li><a href="">PRODUCTS</a></li>
						<li><a href="#">OUR CLIENTS</a></li>
						<li><a href="">STUDENT ASSISTANCE</a></li>
						<li><a href="visitform.php">BOOK A VISIT</a></li>
						<li><a href="loginpg.php">STAFF LOGIN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">Let's Help You Find Your Domain?<hr></span></h2>
				<div class="txt2">
					<form>
						<input type="text" placeholder="Your Domain Name">
						<select>
							<option>Domains</option>
							<option>.NG</option>
							<option>.COM.NG</option>
							<option>.EDU</option>
						</select>
						<input class="subm" type="submit" name="domain" value="SEARCH">
					</form>
				</div>
			</div>
	</div>
	<div class="container">
			<div class="hfirst">
				<div class="wiping">
					<h5>Building a website</h5>
					<img src="images/3.jpg" alt="Building a website image">
				</div>
				<div class="wiping">
					<h5>Google Apps</h5>
					<img src="images/1.jpg" alt="Google Apps Image">
				</div>
				<div class="adv">
					<img src="images/5.jpg" alt="advert image">
				</div>
			</div>
			<div class="hfirst">
				<div class="wiping">
					<h5>Customs Applications</h5>
					<img src="images/2.jpg" alt="customs Application">
				</div>
				<div class="wiping">
					<h5>Payment Solution</h5>
					<img src="images/4.jpg" alt="Payment Solution image">
				</div>
				<div class="adv">
					<img src="images/6.jpg" alt="advert image">
				</div>
			</div>
			<div class="disply">
				<h5>
					RECENT WORKS
				</h5>
				<hr>
				<div class="sap">
					<img class="ca" src="images/7.jpg">
				</div>
				<div class="sap">
					<img class="ca" src="images/8.jpg">
				</div>
				<div class="sap">
					<img class="ca" src="images/9.jpg">
				</div>
				<div class="sap">
					<img class="ca" src="images/10.jpg">
				</div>
			</div>
			<div class="disply">
				<h5>
					Upperlink Corner
				</h5>
				<hr>
				<div class="holdn">
					UPPERLINK is an Incorporated Company whose core areas of specialization are in Internet and Mobile Applications, Database Management, Software Development and Deployment, Systems Integration and Cloud Solutions.
					Our goal is to ensure that business processes run seamlessly, improving efficiency and ROI by integrating accessible and affordablde ......
				</div>
				<div class="newsflash">
					<h5>
						Recent News
					</h5>

				</div>
			</div>
			<div class="disply">
				<h5>
					Our Clients
				</h5>
				<hr>
				<div class="sap">
					<img src="images/20.png">
				</div>
				<div class="sap">
					<img src="images/11.png">
				</div>
				<div class="sap">
					<img src="images/15.png">
				</div>
				<div class="sap">
					<img src="images/13.png">
				</div>
				<div class="sap">
					<img src="images/16.png">
				</div>
				<div class="sap">
					<img src="images/21.png">
				</div>
				<div class="sap">
					<img src="images/14.png">
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				if(isset($_GET['msg'])){
	        		echo "<div class='message'><img class='notif' src='images/04.png'>".$_GET['msg']."</div>";
			    }
			    else {
			        
			    }
			?>
		</div>
		<?php require "partials/footies.php"; ?>
</body>
</html>