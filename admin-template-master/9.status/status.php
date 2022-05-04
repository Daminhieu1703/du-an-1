<?php
session_start();
require_once "./../pdo/pdo.php";
$sql_1 = "SELECT * FROM khach_hang WHERE vai_tro = 1";
$data_1 = pdo_query($sql_1);
$sql_2 = "SELECT * FROM bai_viet INNER JOIN khach_hang ON bai_viet . ma_kh = khach_hang. ma_kh";
$data_2 = pdo_query($sql_2);
$sql_3 = "SELECT * FROM hinh_phu_bv";
$data_3 = pdo_query($sql_3);
$sql_4 = "SELECT COUNT(ma_bv) FROM bai_viet";
$data_4 = pdo_query_value($sql_4);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
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



    <!-- Main -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="./index.html">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Bài viết</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-3 p-0">
                    <div class="list-group  shadow-sm">
                        <div class="list-group-item active fw-bold   ">
                            Dữ liệu bài viết
                        </div>
                        <a href="#" class="list-group-item primary text-primary fw-semi-bold" data-target="#addModal"
                            data-toggle="modal">Thêm bài viết</a>
                        <a href="#" class="list-group-item "><span class="text-danger ">Số bài viết: <?=$data_4?></span> </a>
                    </div>

                    <?php if (isset($_SESSION["error_check"])) { ?>
                    <div class="mb-3 fw-bold text-center text-danger">
                        <?=$_SESSION["error_check"]; unset($_SESSION["error_check"]) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-8 ">
                    <div class="table-responsive rounded px-2 table-bordered">
                        <form action="\du_an_1\admin-template-master\9.status\handle.php" method="post">
                            <table class="table table-striped table-hover bg-light  shadow-sm table-info  ">
                            <caption class="text-center fw-bold">BẢNG BÀI VIẾT</caption>
                                <thead class="bg-blue">
                                    <tr class=" text-left  ">
                                        <th><input type="checkbox" id="checkAl"> Select All</th>
                                        <th>Mã BV</th>
                                        <th>Mã TG</th>
                                        <th>Tên TG</th>
                                        <th>Tên BV</th>
                                        <th>Nội dung</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Hình chính</th>
                                        <th colspan="2">Công cụ</th>
                                    </tr>
                                </thead>
                                <?php foreach ($data_2 as $bv) { ?>
                                <tr class="text-left">
                                    <td width="10%"><input type="checkbox" id="checkItem" name="check[]"
                                            value="<?= $bv['ma_bv'] ?>"></td>
                                    <td><?= $bv['ma_bv'] ?></td>        
                                    <td><?= $bv['ma_kh'] ?></td>
                                    <td><?= $bv['ten_kh'] ?></td>
                                    <td><?= $bv['ten_bv'] ?></td>
                                    <td><?= $bv['noi_dung'] ?></td>
                                    <td><?= $bv['ngay_tao'] ?></td>
                                    <td><?= $bv['ngay_sua'] ?></td>
                                    <td><img src="<?= $bv['hinh_chinh'] ?>" alt="" width="50px" height="50px"></td>
                                    <td width="2%">
                                        <a href="\du_an_1\admin-template-master\9.status\update_status.php?ma_bv=<?= $bv['ma_bv'] ?>"
                                            class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a>
                                    </td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\9.status\handle.php?ma_bv=<?= $bv['ma_bv'] ?>" data-target="#confirm-delete" data-toggle="modal"
                                            class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <table class="table table-striped table-hover bg-light  shadow-sm table-info  ">
                                <caption class="text-center fw-bold">BẢNG HÌNH PHỤ CỦA BÀI VIẾT</caption>
                                    <thead class="bg-blue">
                                        <tr class=" text-left  ">
                                            <th><input type="checkbox" id="checkAl"> Select All</th>
                                            <th>Mã BV</th>
                                            <th>Mã hình phụ</th>
                                            <th>Hình phụ</th>
                                            <th colspan="2">Công cụ</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($data_3 as $bv) { ?>
                                    <tr class="text-left">
                                        <td width="10%"><input type="checkbox" id="checkItem" name="check_hinh_anh[]"
                                                value="<?= $bv['ma_hinh_phu_bv'] ?>"></td>
                                        <td><?= $bv['ma_bv'] ?></td>        
                                        <td><?= $bv['ma_hinh_phu_bv'] ?></td>
                                        <td><img src="<?= $bv['hinh_phu'] ?>" alt="" width="50px" height="50px"></td>
                                        <td width="2%">
                                            <a href="\du_an_1\admin-template-master\9.status\update_hp.php?ma_hp=<?= $bv['ma_hinh_phu_bv'] ?>"
                                                class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a>
                                        </td>
                                        <td width="2%">
                                            <a href="#" data-href="\du_an_1\admin-template-master\9.status\handle.php?ma_hp=<?= $bv['ma_hinh_phu_bv'] ?>" data-target="#confirm-delete" data-toggle="modal"
                                                class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <p align="left" style="padding-left: 1%;"><button type="submit"
                                    onclick="return confirm('Xác nhận xóa?')" class="btn btn-success"
                                    name="xoa">Xóa</button></p>
                        </form>
                    </div>

                    <!-- Modal thêm -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Thêm bài viết</h4>
                                </div>
                                <form action="\du_an_1\admin-template-master\9.status\handle.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Mã bài viết</label>
                                            <input type="text" class="form-control" placeholder="Autonumber" readonly name="ma_bv">
                                        </div>
                                        <div class="form-group">
                                            <label>Tác giả</label>
                                            <select class="form-control" name="ma_kh">
                                                <?php foreach ($data_1 as $tg) { ?>
                                                    <option value="<?=$tg['ma_kh']?>"><?=$tg['ten_tk']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên bài viết</label>
                                            <input type="text" class="form-control" placeholder="Tên..." name="ten_bv">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh chính</label>
                                            <input type="file" class="form-control" name="hinh_chinh">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh phụ</label>
                                            <input type="file" class="form-control" name="hinh_phu[]" multiple="multiple">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" rows="4" name="noi_dung"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary" name="them">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE Modal -->
                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
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

            </div>

        </div>

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
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
    <script>
        $("#checkAl").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        uncheckAll = document.getElementById('remove-checkAll');
        uncheckAll.addEventListener('click', function () {
            document.getElementById('form_product').reset();
        })

    </script>

</body>

</html>