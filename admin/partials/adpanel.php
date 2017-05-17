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
	<div class="container">
			<div class="stf">
				<span class="fa fa-folder-open"></span>&nbsp;&nbsp;VISITOR'S REPORTS.
				<hr>
				<div class="container">
					<div id="chartContainer" style="height: 300px; width: 410px;"></div>
				</div>
				<div class="container">
					<div id="chartContainer2" style="height: 300px; width: 410px;"></div>
				</div>
				<h6><a href="details.php"><span class="fa fa-book"></span>&nbsp;&nbsp;More Detailed Reports.</a></h6>
				<hr>
				<span class="fa fa-male"></span>&nbsp;Staff/Administrator's List
				&nbsp;&nbsp;
				<button class="button" onclick="window.location='addstaff.php';">+ ADD NEW</button><hr>
				<div class="container">
					<div id = "hol">
					<?php
						$query = "select * from tbl_staffs order by fname";
						$result = mysql_query($query);
						if (mysql_num_rows($result) == 0) {
							echo "Not In The Database, Pls Try Inserting Data.";
						}
						else{
							echo "<table class='new'>
								<tr class='na'>
									<th class='le'>#</th>
									<th class='le'>USERNAME</th>
									<th class='le'>EDIT</th>
									<th class='le'>DELETE</th>
								</tr>";

							$count = 0;
							while ($exam= mysql_fetch_assoc($result)) {
								$count++;
								if ($count % 2 == 0) {
									echo "<tr class=\"na\">";
								}
								else{
									echo "<tr class='ne'>";
								}
								echo "<td class='ga'>".$count."</td>"."<td class='ga'>".$exam['uname']."</td>"."<td class='ga'><a href='../oop/control.php?linking_id=".$exam['staffs_id']."'><span class=\"fa fa-edit\"></a></span></td>"."<td class='ga'><a href='../oop/control.php?linking_id=".$exam['staffs_id']."'><span class=\"fa fa-eraser\"></a></span></td>"."</tr>";
							}
							echo "</table";
						}
				
					?>
				</div>
				</div>
			</div>
		</div>
			<div class="container">
				<div class="vst">
					<span class="fa fa-search"></span>&nbsp;&nbsp;VIEW VISITOR'S LIST.<hr>
					
						<?php
							$query = "select * from tbl_visitors order by visitors_fname";
							$result = mysql_query($query);
							if (mysql_num_rows($result) == 0) {
								echo "Not In The Database, Pls Try Inserting Data.";
							}
							else{
								echo "<table class='newa'>
									<tr class='naa'>
										<th class='le'>#</th>
										<th class='le'>FIRSTNAME</th>
										<th class='le'>OTHERNAMES</th>
										<th class='le'>IDENTITY NO:</th>
										<th class='le'>DATE REGISTERED</th>
										<th class='le'>TIME OUT</th>
										<th class='le'>VIEW</th>
									</tr>";

								$count = 0;
								while ($exam= mysql_fetch_assoc($result)) {
									$count++;
									if ($count % 2 == 0) {
										echo "<tr class=\"naa\">";
									}
									else{
										echo "<tr class='nea'>";
									}
									echo "<td class='gaa'>".$count."</td>"."<td class='gaa'>".$exam['visitors_fname']."</td>"."<td class='gaa'>".$exam['visitors_oname']."</td>"."<td class='gaa'>".$exam['visitors_identity']."</td>"."<td class='gaa'>".$exam['visitors_timein']."</td>"."<td class='gaa'>"."fix"."</td>"."<td class='gaa'><a href='panel.php?linking_id=".$exam['visitors_id']."'><span class=\"fa fa-user\"></a></span></td>"."</tr>";
								}
								echo "</table";
								$_SESSION['collect']['count'] = $count;
							}

				
						?>
				</div>
			</div>
	</div>
	
	<?php
		$result = "SELECT *,MONTH(visitors_timein)  from tbl_visitors where MONTH(visitors_timein) = 1";
		
		
		$result3 = "SELECT *,MONTH(visitors_timein)  from tbl_visitors where MONTH(visitors_timein) = 4";
		$query = mysql_query($result);
		
		
		$query3 = mysql_query($result3);
		if ($query) {
			if (mysql_num_rows($query) > 0) {
				$ade = 0;
				while (mysql_fetch_assoc($query)) {
					$ade++;
				}
				$_SESSION['collect']['jan'] = $ade;
			}
			else{
				$_SESSION['collect']['jan'] = 0;
			}
		}
		$result1 = "SELECT *,MONTH(visitors_timein)  from tbl_visitors where MONTH(visitors_timein) = 2";
		$query1 = mysql_query($result1);
		if ($query1) {
			if (mysql_num_rows($query1) > 0) {
				$add = 0;
				while (mysql_fetch_assoc($query1)) {
					$add++;
				}
				$_SESSION['collect']['feb'] = $add;
			}
			else{
				$_SESSION['collect']['feb'] = 0;
			}
			
		}
		$result2 = "SELECT *,MONTH(visitors_timein)  from tbl_visitors where MONTH(visitors_timein) = 3";
		$query2 = mysql_query($result2);
		if ($query2) {
			if (mysql_num_rows($query2) > 0) {
				$add = 0;
				while (mysql_fetch_assoc($query2)) {
					$add++;
				}
				$_SESSION['collect']['mar'] = $add;
			}
			else{
				$_SESSION['collect']['mar'] = 0;
			}
		}
		$result3 = "SELECT *,MONTH(visitors_timein)  from tbl_visitors where MONTH(visitors_timein) = 4";
		$query3 = mysql_query($result3);
		if ($query3) {
			if (mysql_num_rows($query3) > 0) {
				$add = 0;
				while (mysql_fetch_assoc($query3)) {
					$add++;
				}
				$_SESSION['collect']['april'] = $add;
			}
			else{
				$_SESSION['collect']['april'] = 0;
			}
			
		}
		
		
		else{
			echo mysql_error();
		}
		
	?>
	<script type="text/javascript">
			$(function () {
				var a = <?php echo $_SESSION['collect']['jan'] ?>;
				var b = <?php echo $_SESSION['collect']['feb'] ?>;
				var c = <?php echo $_SESSION['collect']['mar'] ?>;
				var d = <?php echo $_SESSION['collect']['april'] ?>;
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
				{  y: 42, name: "Programmering Dept", legendMarkerType: "triangle"},
				{  y: 38, name: "Marketing Dept", legendMarkerType: "square"},
				{  y: 62, name: "DB Administrative Dept", legendMarkerType: "circle"},
				{  y: 22, name: "Webdeveloping Dept", legendMarkerType: "triangle"},
				{  y: 72, name: "Data Analysis Dept", legendMarkerType: "square"},
				{  y: 62, name: "DB Engineering Dept", legendMarkerType: "circle"}
			]
		}
		]
	});
	chart.render();
}
		</script>
</body>
</html>