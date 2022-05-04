<?php
require_once "./../pdo/pdo.php";
session_start();
$sql = "SELECT * FROM don_hang ORDER BY ma_dh DESC";
$data = pdo_query($sql);
$sql1 = "SELECT COUNT(ma_dh) FROM don_hang";
$data1 = pdo_query_value($sql1);
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
                <h1 class="page-header">Đơn hàng</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-3 p-0">
                    <div class="list-group shadow-sm">
                        <div class="list-group-item active fw-bold">Dữ liệu đơn hàng</div>
                        <a href="#" class="list-group-item"><span class="text-danger">Số đơn : <?=$data1?> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-8">
                    <div class="table-responsive rounded px-2 table-bordered">
                        <form action="\du_an_1\admin-template-master\6.order\handle.php" method="post">
                            <table class="
                    table table-striped table-hover
                    bg-light
                    shadow-sm
                    table-info
                  ">
                                <thead class="bg-blue">
                                    <tr class="text-left">
                                        <th><input type="checkbox" id="checkAl" /> Select All</th>
                                        <th>Mã đơn</th>
                                        <th>Mã KH</th>
                                        <th>Tên KH</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày đơn hàng</th>
                                        <th>Trạng thái</th>
                                        <th colspan="3">Công cụ</th>
                                    </tr>
                                </thead>
                            <?php foreach ($data as $value) {?>
                                <tr class="text-left">
                                    <td width="9%">
                                        <input type="checkbox" id="checkItem" name="check[]"
                                            value="<?= $value['ma_dh']?>" />
                                    </td>
                                    <td><?= $value['ma_dh']?></td>
                                    <td><?= $value['ma_kh']?></td>
                                    <td><?= $value['ten_kh']?></td>
                                    <td><?= $value['tong_so_luong']?></td>
                                    <td><?= number_format($value['tong_gia'],0,',','.')?></td>
                                    <td><?= $value['sdt']?></td>
                                    <td><?= $value['email']?></td>
                                    <td><?= $value['dia_chi']?></td>
                                    <td><?= $value['ghi_chu']?></td>
                                    <td><?= $value['ngay_don_hang']?></td>
                                    <td><?php if($value['trang_thai'] == 0){ echo "Đang giao"; }elseif ($value['trang_thai'] == 2) {echo "Đã giao";}else { echo "Dừng giao"; }?></td>
                                    <td width="2%">
                                        <a href="\du_an_1\admin-template-master\6.order\update_order.php?ma_dh=<?= $value['ma_dh']?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a></td>
                                    <td width="2%">
                                        <a href="\du_an_1\admin-template-master\6.order\ct_order.php?ma_dh=<?= $value['ma_dh']?>" class="btn btn-sm w-100 btn-warning text-white">Chi tiết</a></td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\6.order\handle.php?ma_dh=<?= $value['ma_dh']?>" data-target="#confirm-delete" data-toggle="modal"
                                            class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </table>
                            <p align="left" style="padding-left: 1%">
                                <button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success" name="xoa_het_dh">Xóa</button>
                            </p>
                        </form>

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