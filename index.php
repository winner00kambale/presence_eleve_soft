<?php
session_start();
require('db/database.php');


if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
?>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">
	
<?php include'_aside.php' ?>
	<div class="main-container">
		<div class="pd-ltr-20">

			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
							
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h5 class="h5 mb-20 text-info">Liste des chambres libres</h5>
						<table class="data-table table-hover table-sm">
							<thead>
							<tr class="text-info">
								<th class="table-plus datatable-nosort">#</th>
								<th>chambre</th>
								<th>designation</th>
								<th>prix</th>
								<th>devise</th>
								<th>etat</th>
							</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>

					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<input id="id1" type="hidden" th:value="${countBydate}"/>
						<h6 class="h6 mb-5 text-center text-info">Representation du rapport journalier de reservation</h6>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="static/vendors/scripts/core.js"></script>
	<script src="static/vendors/scripts/script.min.js"></script>
	<script src="static/vendors/scripts/process.js"></script>
	<script src="static/vendors/scripts/layout-settings.js"></script>
	<script src="static/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="static/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="static/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="static/vendors/scripts/dashboard.js"></script>
