<?php
require_once "./pdo/pdo.php";
session_start();
if (!isset($_SESSION['user'])) {
	header("location:/du_an_1/template-master/index.php");
	die();
}else {
	if ($_SESSION['user']['vai_tro'] != 1) {
		header("location:/du_an_1/template-master/index.php");
		die();
	}
}
$sql_1= "SELECT COUNT(ma_dh) FROM don_hang";
$data_1= pdo_query_value($sql_1);
$sql_2= "SELECT SUM(so_luot_xem) FROM san_pham";
$data_2= pdo_query_value($sql_2);
$sql_3= "SELECT COUNT(ma_bl) FROM binh_luan_sp";
$data_3= pdo_query_value($sql_3);
$sql_4= "SELECT COUNT(ma_bl) FROM binh_luan_bv";
$data_4= pdo_query_value($sql_4);
$sql_6= "SELECT COUNT(ma_kh) FROM khach_hang WHERE vai_tro = 0";
$data_6= pdo_query_value($sql_6);
$sql_7= "SELECT COUNT(ma_kh) FROM khach_hang WHERE vai_tro = 1";
$data_7= pdo_query_value($sql_7);
$sql_8= "SELECT COUNT(ma_slide) FROM slider";
$data_8= pdo_query_value($sql_8);
$sql_9= "SELECT COUNT(ma_loai) FROM loai_hang";
$data_9= pdo_query_value($sql_9);
$sql_10= "SELECT COUNT(ma_lh) FROM lien_he";
$data_10= pdo_query_value($sql_10);
$data_5 = $data_3 + $data_4;
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/datepicker3.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet" />
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<?php require_once "./side_bar/side_bar.php"; ?>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<em class="fa fa-home"></em>
					</a>
				</li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?=$data_1?></div>
							<div class="text-muted">Đơn hàng</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?=$data_5?></div>
							<div class="text-muted">Tất cả bình luận</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding">
							<em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?=$data_6?></div>
							<div class="text-muted">Khách hàng</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget">
						<div class="row no-padding">
							<em class="fa fa-xl fa-search color-red"></em>
							<div class="large"><?=$data_2?></div>
							<div class="text-muted">Lượt xem sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em
								class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Loại hàng</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92">
							<span class="percent"><?=$data_9?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Liên hệ</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65">
							<span class="percent"><?=$data_10?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Admin</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56">
							<span class="percent"><?=$data_7?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Slider</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27">
							<span class="percent"><?=$data_8?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">
					<a href="https://www.medialoot.com">Medialoot</a>
				</p>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	<script src="https://kit.fontawesome.com/0101500cc8.js" crossorigin="anonymous"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		
		$("#confirm-delete").on("show.bs.modal", function (e) {
			$(this).find(".btn-ok").attr("href", $(e.relatedTarget).data("href"));
		});
	</script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc",
			});
		};
	</script>
</body>

</html>