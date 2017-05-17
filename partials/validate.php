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
	<link rel="stylesheet" type="text/css" href="../styles/chat.css" />
	<script type="text/javascript" src="../scripts/chat.js"></script>
	<script type="text/javascript" src="../scripts/jquery.js"></script>
	<script type="text/javascript" src="../scripts/validate.js"></script>
	<!-- SecuBSPMX Component -->
<OBJECT classid="CLSID:6283f7ea-608c-11dc-8314-0800200c9a66"
		 codebase="objSecuBSPmx.cab#version=1,0,0,1"
		height=0 width=0
		id="objSecuBSP"
		name="objSecuBSP"
    VIEWASTEXT>
</OBJECT>
	
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
						<li><a href="log.php">Visitor's List Panel</a></li>
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li>USER ID:&nbsp; <?php echo $enroll;?></li>
						<li>UserName: &nbsp; <a href="logout.php"><?php echo $username;?><span class="fa fa-lock"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">VISITOR'S DOCUMENTATION<hr></span></h2>
		</div>
	</div>
	<div class="container">

<div id="formcontainer">
<form class="mainform" name="frmRegister" onsubmit="return validate (this)" action="../oop/validate_process.php" method="post">
         
            
            <label>ID Number </label>
            <input type="text" name="idnumb" size="30"/>
     
       
                     <div id="submit">
                 <label>&nbsp</label>
                <input type="submit" value="Proceed" class="button"/>
             </div>
             </div>
        <input type="hidden" name="firtext" id="firtext" />
    </form>
        
</div>

		
			
	</div>
	<?php require"footies.php"; ?>
	<div class="container">
			<?php
				if(isset($_GET['msg'])){
	        		echo "<div class='message'><img class='notif' src='../images/01.png'>".$_GET['msg']."</div>";
			    }
			    elseif (isset($_GET['success'])=='false') {
			    	echo "<div class='message'><img class='notif' src='../images/01.png'>Visitor Access Not Granted!</div>";
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