<?php
session_start();
require('db/database.php');


if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
?>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="static/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="static/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="static/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="static/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">
	
<?php include'_aside.php' ?>
<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p">
						<h4 class="mb-30 h4">Compliance Trend</h4>
						<div id="compliance-trend" class="compliance-trend"></div>
					</div>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p">
						<h4 class="mb-30 h4">Records</h4>
						<div id="chart" class="chart"></div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
			PRESENCE SOFT - APP By <a href="https://github.com/winner00kambale" target="_blank"> Winner Kambale</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="static/vendors/scripts/core.js"></script>
	<script src="static/vendors/scripts/script.min.js"></script>
	<script src="static/vendors/scripts/process.js"></script>
	<script src="static/vendors/scripts/layout-settings.js"></script>
	<script src="static/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="static/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="static/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="static/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="static/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="static/vendors/scripts/dashboard2.js"></script>
	
