<?php
	require('../connections/init.php');
	if(!check_login())
	header('location: ../index.php?msg=pls Surf The Page Properly!');
else{
	$username = get_username();
	$enroll = get_enroll();
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/chat.css" />
	<script type="text/javascript" src="../scripts/chat.js"></script>
	<script type="text/javascript" src="../scripts/jquery.js"></script>
<body>
	<div class="banner">
		<div class="container">
			<div class="placeholder">
				<div id="himage">
					<img src="../images/logo.png" alt="Upperlink Logo">
				</div>
				<div id="menus">
					<ul>
						<li><a href="">HOME</a></li>
						<li><a href="">ABOUT</a></li>
						<li><a href="">PRODUCTS</a></li>
						<li><a href="#">OUR CLIENTS</a></li>
						<li><a href="">STUDENT ASSISTANCE</a></li>
						<li>&nbsp;</li>
						<li>USER ID:&nbsp; <?php echo $enroll;?></li>
						<li>UserName: &nbsp; <a href="logout.php"><?php echo $username;?> </a></li>
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
		<div class="lil">
			<h1>YOU ARE NOW LOGGED INTO THE STAFF's PORTAL.</h1>
		</div>
	</div>
	<?php require"footies.php";?>
	<div class="container">
		<?php
			if(isset($_GET['msg'])){
        		echo "<div class='message'><img class='notif' src='../images/01.png'>".$_GET['msg']."</div>";
		    }
		    else {
		        
		    }
		?>
	</div>
	<div class="container">
			<div id="online_box" class="online">
				<audio controls="controls" style="display:none;" id="soundHandle"></audio>  <!--this tag is for chat sound	-->
				<div id="online_title_box" class="online" >
					<div id="online_title" onClick="goOnline()">Who's Online</div>
					<div id="min" class="opt" onClick="goOffline()" title="Go offline">-</div>
				</div>
				
				<div id="online_users_box" class="online">
				</div>
		 			
				<div id="online_search_box" class="online" >
					<input class="chat" type="text" name="user_search" placeholder="Search" onKeyDown="searchUsersOnline()"/>
				</div>
			</div>
	
		<div id='chatbox'>

		</div>
	</div>
	<script src="../scripts/adroit.js"></script>
</body>
</html>