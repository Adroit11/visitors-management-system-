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
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />

			<link rel="stylesheet" type="text/css" href="rate/rate.min.css">
    <script type="text/javascript" src="rate/jquery.rate.min.js"></script>
		</noscript>
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
						<li>USER ID:&nbsp; <?php echo $enroll;?></li>
						<li>ADMINISTRATOR: <?php echo $username;?>&nbsp;&nbsp;<span class="fa fa-unlock"></span>&nbsp;&nbsp;<a href="logout.php">Signout&nbsp;&nbsp;<span class="fa fa-sign-out"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="advert">
		<div class="container">
			<h2><span class="txt">ADMINISTRATOR's PORTAL</span></h2>
		</div>
	</div>
	<?php
		$a = $_SESSION['collect']['jan'];
		$b = $_SESSION['collect']['feb'];
		$c = $_SESSION['collect']['mar'];
		$d = $_SESSION['collect']['april'];
		//pie chart
		$aa = 42;
		$bb = 22;
		$cc = 48;
		$dd = 15;
		$ee = 22;
		$ff = 14;

		$ans = $_SESSION['collect']['count'];
	?>
	<div class="container">
		<div class="msg">
			<a href="adpanel.php"><span class="fa fa-folder-open"></span>&nbsp;&nbsp;VISITOR'S REPORTS.</a>
				<hr>
		</div>
		<div class="fer">
			<div id="jquery-script-menu">
<div class="jquery-script-center">
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
    <div class="container">
    	<div class="display"><h1>Daily Report.</h1>
    		<?php 
    			$date = date("d");
    			$result = "SELECT * FROM class_attendance";
    			$query = mysql_query($result);
    			if ($query) {
			if (mysql_num_rows($query) > 0) {
				$tr = '';
				while ($list = mysql_fetch_assoc($query)) {
					// var_dump($list);
					$sap = $list['idnumb'];
					$que2 = "SELECT * FROM tbl_visitors WHERE verification_no = '$sap'";
					$result2 = mysql_query($que2);
					if (mysql_num_rows($result2) > 0) {
						$att = '';
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
								<th>Attendance Time LoggedIn<th>
								<th>Attendance Time LoggedOut</th>
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
      <div class="row">
            <div class="col-lg-2">
                <div class="rate-circle-static-small" data-value="100"></div>
            </div>
        </div>
        
    </div>
		</div>
		<div class="stf2">
			<div class="container">
				<div id="chartContainer2" style="height: 350px; width: 500px;"></div>
			</div>
		</div>
			<div class="droit">
				<div class="container">
					<?php echo "Total Visitors : " .$ans. "<br> January = ".$a."; Febuary = ".$b."; March = ".$c."; April = ".$d;?>
					<div id="chartContainer" style="height: 350px; width: 580px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
	<?php require"footies.php"; ?>
	<script type="text/javascript">
			$(function () {
				var a = <?php echo $a ?>;
				var b = <?php echo $b ?>;
				var c = <?php echo $c ?>;
				var d = <?php echo $d ?>;
				//Better to construct options first and then pass it as a parameter
				var options = {
					title: {
						text: "Visitor's Montly Report"
					},
			                animationEnabled: true,
					data: [
					{
						type: "spline", //change it to line, area, column, pie, etc
						dataPoints: [
							{ label: "January", y: a },
							{ label: "Febuary", y: b },
							{ label: "March", y: c },
							{ label: "April", y: d },
						]
					}
					]
				};

				$("#chartContainer").CanvasJSChart(options);

			});
			window.onload = function () {
				var aa = <?php echo $aa ?>;
				var bb = <?php echo $bb ?>;
				var cc = <?php echo $cc ?>;
				var dd = <?php echo $dd ?>;
				var ee = <?php echo $ee ?>;
				var ff = <?php echo $ff ?>;
	var chart = new CanvasJS.Chart("chartContainer2",
	{
		title:{
			text: "Total Visitors For Each Department.",
			fontFamily: "arial black"
		},
                animationEnabled: true,
		legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center"
		},
		theme: "theme1",
		data: [
		{        
			type: "pie",
			indexLabelFontFamily: "Garamond",       
			indexLabelFontSize: 20,
			indexLabelFontWeight: "bold",
			startAngle:0,
			indexLabelFontColor: "MistyRose",       
			indexLabelLineColor: "darkgrey", 
			indexLabelPlacement: "inside", 
			toolTipContent: "{name}: {y}visitors",
			showInLegend: true,
			indexLabel: "#percent%", 
			dataPoints: [
				{  y: aa, name: "Programmering Dept", legendMarkerType: "triangle"},
				{  y: bb, name: "Marketing Dept", legendMarkerType: "square"},
				{  y: cc, name: "DB Administrative Dept", legendMarkerType: "circle"},
				{  y: dd, name: "Webdeveloping Dept", legendMarkerType: "triangle"},
				{  y: ee, name: "Data Analysis Dept", legendMarkerType: "square"},
				{  y: ff, name: "DB Engineering Dept", legendMarkerType: "circle"}
			]
		}
		]
	});
	chart.render();
}
		</script>
</body>
</html>