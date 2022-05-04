<?php
require_once "./../pdo/pdo.php";
session_start();
$sql = "SELECT loai_hang. ma_loai, loai_hang . ten_loai, COUNT(san_pham . so_luong) AS sl, MAX(gia_sp) AS gia_cao, MIN(gia_sp) AS gia_thap, AVG(gia_sp) AS gia_tb 
FROM san_pham INNER JOIN loai_hang ON loai_hang . ma_loai = san_pham . ma_loai GROUP BY loai_hang. ma_loai, loai_hang . ten_loai";
$data = pdo_query($sql);
$sql_1= "SELECT COUNT(ma_sp) FROM san_pham";
$data_1= pdo_query_value($sql_1);
$sql_2= "SELECT COUNT(ma_bv) FROM bai_viet";
$data_2= pdo_query_value($sql_2);
$sql_3= "SELECT COUNT(ma_bl) FROM binh_luan_sp";
$data_3= pdo_query_value($sql_3);
$sql_4= "SELECT COUNT(ma_bl) FROM binh_luan_bv";
$data_4= pdo_query_value($sql_4);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thống kê</title>
	<link href="./../css/bootstrap.min.css" rel="stylesheet">
	<link href="./../css/font-awesome.min.css" rel="stylesheet">
	<link href="./../css/datepicker3.css" rel="stylesheet">
	<link href="./../css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php require_once "./../side_bar/side_bar.php"; ?>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Thống kê</li>
			</ol>
		</div>
		<!--/.row-->



		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thống kê</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="panel panel-container">

			<div class="col-8  ">
				<div class="table-responsive rounded px-2 border-radius-3">

					<table
						class="table table-striped table-bordered table-hover bg-light shadow-sm table-info border-radius-3  ">
						<caption class="text-center fw-bold">BẢNG THỐNG KÊ LOẠI HÀNG</caption>
						<thead class="bg-blue">
							<tr class=" text-left">
								<th>Mã loại</th>
								<th>Tên loại</th>
								<th>Số lượng</th>
								<th>Giá cao</th>
								<th>Giá trung bình</th>
								<th>Giá thấp</th>
							</tr>
						</thead>
						<?php foreach ($data as $thong_ke) { ?>
							<tr class="text-left">
								<td><?=$thong_ke['ma_loai']?></td>
								<td><?=$thong_ke['ten_loai']?></td>
								<td> <?=$thong_ke['sl']?></td>
								<td><?=number_format($thong_ke['gia_cao'],0,',','.')?></td>
								<td><?=number_format($thong_ke['gia_tb'],0,',','.')?></td>
								<td><?=number_format($thong_ke['gia_thap'],0,',','.')?></td>
							</tr>
						<?php } ?>
					</table>
				</div>

				<!-- Modal thêm -->
				<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Thêm loại hàng</h4>
							</div>
							<form action="ok">
								<div class="modal-body">
									<div class="form-group">
										<label>Mã loại hàng</label>
										<input class="form-control" placeholder="Autonumber" readonly>
									</div>
									<div class="form-group">
										<label>Tên loại hàng</label>
										<input class="form-control" placeholder="Tên loại...">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
									<button type="submit" class="btn btn-primary">Thêm</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- DELETE Modal -->
				<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								Xác nhận xóa?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
								<a class="btn btn-danger btn-ok">Xóa</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<div class="easypiechart" id="easypiechart-teal" data-percent="56"><span
									class="percent"><?=$data_1?>%</span></div>
							<div class="large">Sản Phẩm</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<div class="easypiechart" id="easypiechart-blue" data-percent="92"><span
									class="percent"><?=$data_2?>%</span></div>
							<div class="large">Bài Viết</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<div class="easypiechart" id="easypiechart-orange" data-percent="65"><span
									class="percent"><?=$data_3?>%</span></div>
							<div class="large">Bình luận sản phẩm</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<div class="easypiechart" id="easypiechart-red" data-percent="27"><span
									class="percent"><?=$data_4?>%</span></div>
							<div class="large">Bình Luận Bài Viết</div>
						</div>
					</div>
				</div>


			</div>
			<!--/.row-->

		</div>





		<div class="row">
			<div class="col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						Biểu đồ
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em
								class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas id="myChart" width="400" height="400"></canvas>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--/.row-->

	</div>
	<!--/.main-->


	<script src="https://kit.fontawesome.com/0101500cc8.js" crossorigin="anonymous"></script>
    <script src="./../js/jquery-1.11.1.min.js"></script>
    <script src="./../js/bootstrap.min.js"></script>
    <script src="./../js/chart.min.js"></script>
    <script src="./../js/chart-data.js"></script>
    <script src="./../js/easypiechart.js"></script>
    <script src="./../js/easypiechart-data.js"></script>
    <script src="./../js/bootstrap-datepicker.js"></script>
    <script src="./../js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"
		integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		$("#confirm-delete").on("show.bs.modal", function (e) {
			$(this).find(".btn-ok").attr("href", $(e.relatedTarget).data("href"));
		});
	</script>
	<script>
		window.onload = function () {
			const ctx = document.getElementById('myChart');
			const myChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: ['Bình Luận Bài Viết', 'Bài Viết', 'Bình Luận Sản Phẩm', 'Sản Phẩm'],
					datasets: [{
						label: '# of Votes',
						data: [<?=$data_4?>, <?=$data_2?>, <?=$data_3?>, <?=$data_1?>],
						backgroundColor: [
							'rgba(255, 99, 132, 0.8)',
							'rgba(54, 162, 235, 0.8)',
							'rgba(255, 206, 86, 0.8)',
							'rgba(75, 192, 192, 0.8)',
							'rgba(153, 102, 255, 0.8)',
							'rgba(255, 159, 64, 0.8)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		};


	</script>
</body>

</html>