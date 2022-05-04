<?php
session_start();
require_once "./../pdo/pdo.php";
$sql_1= "SELECT * FROM loai_hang";
$data_1= pdo_query($sql_1);

$sql_2= "SELECT * FROM san_pham ORDER BY ma_sp DESC";
$data_2 = pdo_query($sql_2);

$sql_3 = "SELECT COUNT(ma_sp) FROM san_pham";
$data_3 = pdo_query_value($sql_3);
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
                <li class="active">Hàng hóa</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hàng hóa</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-3 p-0">
                    <div class="list-group  shadow-sm">
                        <div class="list-group-item active fw-bold   ">
                            Dữ liệu hàng hóa
                        </div>
                        <a href="#" class="list-group-item primary text-primary fw-semi-bold" data-target="#addModal"
                            data-toggle="modal">Thêm sản phẩm</a>
                        <a href="#" class="list-group-item "><span class="text-danger ">Số sản phẩm: <?=$data_3?></span> </a>
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
                        <form action="\du_an_1\admin-template-master\1.products\handle.php" method="post">

                            <table class="table table-striped table-hover bg-light  shadow-sm table-info  ">

                                <thead class="bg-blue">
                                    <tr class=" text-left  ">
                                        <th><input type="checkbox" id="checkAl"> Select All</th>
                                        <th>Mã Loại</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên hàng</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Giá khuyễn mãi</th>
                                        <th>Số lượng</th>
                                        <th>Mô tả</th>
                                        <th>Ngày nhập</th>
                                        <th>Ngày sửa</th>
                                        <th>Số Lượt xem </th>
                                        <th colspan="2">Công cụ</th>
                                    </tr>
                                </thead>

                                <?php foreach($data_2 as $sp) : ?>
                                <tr class="text-left">
                                    <td width="10%"><input type="checkbox" id="checkItem" name="check[]"
                                            value="<?php echo $sp['ma_sp']; ?>"></td>
                                    <td><?=$sp['ma_loai']?></td>        
                                    <td><?=$sp['ma_sp']?></td>
                                    <td><?=$sp['ten_sp']?></td>
                                    <td><img src="<?=$sp['hinh_sp']?>" alt="" width="50px" height="50px"></td>
                                    <td><?=number_format($sp['gia_sp'],0,',','.')?></td>
                                    <td><?=number_format($sp['gia_km'],0,',','.')?></td>
                                    <td><?=$sp['so_luong']?></td>
                                    <td><?=$sp['mo_ta']?></td>
                                    <td><?=$sp['ngay_nhap']?></td>
                                    <td><?=$sp['ngay_sua']?></td>
                                    <td><?=$sp['so_luot_xem']?></td>
                                    <td width="2%">
                                        <a href="\du_an_1\admin-template-master\1.products\update_product.php?ma_sp=<?=$sp['ma_sp']?>"
                                            class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a>
                                    </td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\1.products\handle.php?id=<?=$sp['ma_sp']?>" data-target="#confirm-delete" data-toggle="modal"
                                            class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
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
                                    <h4 class="modal-title" id="myModalLabel">Thêm sản phẩm</h4>
                                </div>
                                <form action="\du_an_1\admin-template-master\1.products\handle.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" class="form-control" placeholder="Autonumber" readonly name="ma_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" placeholder="Tên..." name="ten_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="number" class="form-control" placeholder="Số lượng..." name="so_luong">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="number" class="form-control" placeholder="Giá..." name="gia_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi</label>
                                            <input type="number" class="form-control" placeholder="Giá km..." name="gia_km">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Đặc biệt</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="dac_biet" value="1">Không
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="dac_biet" value="2">Có
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="hinh_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea class="form-control" rows="4" name="mo_ta"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Loại hàng</label>
                                            <select class="form-control" name="ma_loai">
                                                <?php foreach($data_1 as $loai) :?>
                                                <option value="<?=$loai['ma_loai']?>"><?=$loai['ten_loai']?></option>
                                                <?php endforeach ;?>
                                            </select>
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