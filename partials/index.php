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
	<script type="text/javascript" src="../scripts/enroll.js"></script>
	<script type="text/javascript" src="../scripts/validate.js"></script>
	OBJECT<!-- SecuBSPMX Component -->
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
		   <?php
    if(isset($_GET['success'])){
        if($_GET['success']=='true') {echo "<div class='message'><img class='notif' src='../images/01.png'>Logged Back In Successfully.</div>";}
        else {echo "<div class='message'><img class='notif' src='../images/01.png'>Login Failed, Pls Try Again.</div>";}
    }
    ?>
		<div class="bio">
			Collect Metric Details
			<h6>*Thumb print if you have been registered as a visitor before.</h6>
			<button onClick="location.href = 'validate.php'">Validate</button>
		</div>
		
		<div class="webc">
		<style>@-webkit-keyframes justified-gallery-show-caption-animation{from{opacity:0}to{opacity:.7}}@-moz-keyframes justified-gallery-show-caption-animation{from{opacity:0}to{opacity:.7}}@-o-keyframes justified-gallery-show-caption-animation{from{opacity:0}to{opacity:.7}}@keyframes justified-gallery-show-caption-animation{from{opacity:0}to{opacity:.7}}@-webkit-keyframes justified-gallery-show-entry-animation{from{opacity:0}to{opacity:1}}@-moz-keyframes justified-gallery-show-entry-animation{from{opacity:0}to{opacity:1}}@-o-keyframes justified-gallery-show-entry-animation{from{opacity:0}to{opacity:1}}@keyframes justified-gallery-show-entry-animation{from{opacity:0}to{opacity:1}}.justified-gallery{width:100%;position:relative;overflow:hidden}.justified-gallery>a,.justified-gallery>div{position:absolute;display:inline-block;overflow:hidden;opacity:0;filter:alpha(opacity=0)}.justified-gallery>a>img,.justified-gallery>div>img,.justified-gallery>a>a>img,.justified-gallery>div>a>img{position:absolute;top:50%;left:50%;margin:0;padding:0;border:0}.justified-gallery>a>.caption,.justified-gallery>div>.caption{display:none;position:absolute;bottom:0;padding:5px;background-color:#000;left:0;right:0;margin:0;color:#fff;font-size:12px;font-weight:300;font-family:sans-serif}.justified-gallery>a>.caption.caption-visible,.justified-gallery>div>.caption.caption-visible{display:initial;opacity:.7;filter:"alpha(opacity=70)";-webkit-animation:justified-gallery-show-caption-animation 500ms 0 ease;-moz-animation:justified-gallery-show-caption-animation 500ms 0 ease;-ms-animation:justified-gallery-show-caption-animation 500ms 0 ease}.justified-gallery>.entry-visible{opacity:1;filter:alpha(opacity=100);-webkit-animation:justified-gallery-show-entry-animation 500ms 0 ease;-moz-animation:justified-gallery-show-entry-animation 500ms 0 ease;-ms-animation:justified-gallery-show-entry-animation 500ms 0 ease}.justified-gallery>.spinner{position:absolute;bottom:0;margin-left:-24px;padding:10px 0;left:50%;opacity:initial;filter:initial;overflow:initial}.justified-gallery>.spinner>span{display:inline-block;opacity:0;filter:alpha(opacity=0);width:8px;height:8px;margin:0 4px;background-color:#000;border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-right-radius:6px;border-bottom-left-radius:6px}</style>
					<div class="row"><center rel="advertisements"></center></div>
					<div class="row">
	 					<div class="col-md-3" rel="advertisements"></div>
	 					<div class="col-md-6">
						<div id="my_camera"></div>
						<!-- A button for taking snaps -->
						<input type=button class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
						<div id="results" class="well">Your captured image will appear here...</div>
	 					</div>
	 					<div class="col-md-3" rel="advertisements"></div>
					</div>
	</div>
			<div class="log">
				<form method="POST" action="../oop/control.php" name="frmRegister" onsubmit="return enrol();">
					<img class="edit" src="../images/doc.jpg">
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
					<select name="positions">
						<?php
							$run = "select * from tbl_staffs";
							$result = mysql_query($run);
							if ($result){
								while($row = mysql_fetch_assoc($result)){
	                            echo "<option value='".$row['staffs_id']."'>".$row['fname']." ".$row['lname']."</option>";
	                            } 
							}
							else{
								
							}
                            ?>
					</select>
					<br/>
					<label>&nbsp;</label><input type="submit" value="REGISTER" name="adminAuth">
					<input type="hidden" name="firtext" id="firtext" />
				</form>
				<!-- First, include the Webcam.js JavaScript Library -->
				<script type="text/javascript" src="../scripts/webcam.min.js"></script>
				<script type="text/javascript" src="../scripts/script.js"></script>
				
				<!-- Configure a few settings and attach camera -->
				<script language="JavaScript">
					Webcam.set({
						width: 150,
						height: 120,
						image_format: 'jpeg',
						jpeg_quality: 90
					});
					Webcam.attach( '#my_camera' );
					function take_snapshot() {
						// take snapshot and get image data
						Webcam.snap( function(data_uri) {
							// display results in page
							document.getElementById('results').innerHTML = 
								'<h6>Visitors image:</h6>' + 
								'<img src="'+data_uri+'"/>';
			                                Webcam.upload( data_uri, 'upload.php', function(code, text) {
			                                            // Upload complete!
			                                            // 'code' will be the HTTP response code from the server, e.g. 200
			                                            // 'text' will be the raw response content
			                                });
						} );
					}
				</script>
			</div>
	</div>
	<?php require"footies.php"; ?>
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