<?php
require_once "./../pdo/pdo.php";
session_start();
$ma_dh = $_GET["ma_dh"];
$sql = "SELECT * FROM ct_don_hang WHERE ma_dh = ?";
$data = pdo_query($sql,$ma_dh);
$sql1 = "SELECT COUNT(ma_ct_dh) FROM ct_don_hang WHERE ma_dh = ?";
$data1 = pdo_query_value($sql1,$ma_dh);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Orders</title>
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
	<link href="./../css/font-awesome.min.css" rel="stylesheet">
	<link href="./../css/datepicker3.css" rel="stylesheet">
	<link href="./../css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
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
                <li>
                    <a href="#">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
                <li class="active">Đơn hàng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-3 p-0">
                    <div class="list-group shadow-sm">
                        <div class="list-group-item active fw-bold">Dữ liệu chi tiết đơn hàng</div>
                        <a href="#" class="list-group-item"><span class="text-danger">Số sản phẩm trong đơn : <?=$data1?> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-8">
                    <div class="table-responsive rounded px-2 table-bordered">
                        <form action="\du_an_1\admin-template-master\6.order\handle.php" method="post">
                            <input type="hidden" name="ma_dh_only" value="<?=$ma_dh?>">
                            <table class="table table-striped table-hover bg-light shadow-sm table-info">
                                <thead class="bg-blue">
                                    <tr class="text-left">
                                        <th><input type="checkbox" id="checkAl" /> Select All</th>
                                        <th>Mã chi tiết đơn hàng</th>
                                        <th>Mã đơn</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Giá tổng sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Công cụ</th>
                                    </tr>
                                </thead>
                            <?php foreach ($data as $value) {?>
                                <tr class="text-left">
                                    <td width="9%">
                                        <input type="checkbox" id="checkItem" name="check_ct[]"
                                            value="<?= $value['ma_ct_dh']?>" />
                                    </td>
                                    <td><?= $value['ma_ct_dh']?></td>
                                    <td><?= $value['ma_dh']?></td>
                                    <td><?= $value['ma_sp']?></td>
                                    <td><?= number_format($value['gia_sp'],0,',','.')?></td>
                                    <td><?= $value['so_luong']?></td>
                                    <td><?= $value['ten_sp']?></td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\6.order\handle.php?ma_ct_dh=<?= $value['ma_ct_dh']?>&ma_dh_only=<?= $value['ma_dh']?>" data-target="#confirm-delete" data-toggle="modal"
                                            class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </table>
                            <p align="left" style="padding-left: 1%">
                                <button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success"
                                    name="xoa_het_ct_dh">
                                    Xóa
                                </button>
                            </p>
                        </form>
                        <div class="modal-footer">
                            <a href="\du_an_1\admin-template-master\6.order\orders.php" class="btn btn-primary">Quay lại</a>
                        </div>

                        <!-- DELETE Modal -->
                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">Xác nhận xóa?</div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Hủy
                                        </button>
                                        <a class="btn btn-danger btn-ok">Xóa</a>
                                    </div>
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
        $("#checkAl").click(function () {
            $("input:checkbox").not(this).prop("checked", this.checked);
        });

        uncheckAll = document.getElementById("remove-checkAll");
        uncheckAll.addEventListener("click", function () {
            document.getElementById("form_product").reset();
        });
    </script>
</body>

</html>