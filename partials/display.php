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
						<li><a class="active" href="display.php">Visitor's List Panel</a></li>
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
			$date = date("d");
    			$result = "SELECT * FROM class_attendance WHERE status_id =0";
    			$query = mysql_query($result);
    			if ($query) {
			if (mysql_num_rows($query) > 0) {
				$tr = '';
				$count = 0;
				while ($list = mysql_fetch_assoc($query)) {
					// var_dump($list);
					$sap = $list['idnumb'];
					$que2 = "SELECT * FROM tbl_visitors WHERE verification_no = '$sap' Limit 1";
					$result2 = mysql_query($que2);
					if (mysql_num_rows($result2) > 0) {
						$att = '';
						$count++;
						while ($list2 = mysql_fetch_assoc($result2)) {
							
							$atts = '
								<div>'.$list['visitors_timein'].'</div>';
							$attp = '
								<div>'.$list['visitors_timeout'].'</div>';
							$tr .= '
						<tr>
							<td>'.$list2['visitors_fname'].' '.$list2['visitors_oname'].'</td>
							<td></td>
							<td>'.$list2['visitors_email'].'</td>
							<td></td>
							<td>'.$atts.'</td>
							<td></td>
							<td>'.$attp.'</td>
							<td></td>
							<td><form method="POST" action="../oop/logout_process.php?ident='.$list2['visitors_id'].'"><input type="submit" value="LOGOUT"></form></td>
						</tr>
					';
						}
					}
					
				}
				$ret ='
					<table class="table table-stripe">
						<tbody>
							<tr>
								<th>Full name<th>
								<th>Email<th>
								<th>Time LoggedIn<th>
								<th>Time LoggedOut</th>
								<th>Logout</th>
							</tr>
						</tbody>
						<tbody>'.$tr.'</tbody>
					</table>
				';
				echo $ret;
			}
			else{
				echo "Error".mysql_error();
			}
		}
		?>
	</div>
	<?php require"footies.php"; ?>
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