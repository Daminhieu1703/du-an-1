<?php
require_once "./../pdo/pdo.php";
$sql = "SELECT * FROM khach_hang";
$data = pdo_query($sql);
session_start();
$sql_3 = "SELECT COUNT(ma_kh) FROM khach_hang";
$data_3 = pdo_query_value($sql_3);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
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
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Khách hàng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-3 p-0">
                    <div class="list-group  shadow-sm">
                        <div class="list-group-item active fw-bold   ">
                            Dữ liệu người dùng
                        </div>
                        <a href="#" class="list-group-item primary text-primary fw-semi-bold" data-target="#addModal"
                            data-toggle="modal">Thêm khách hàng</a>
                        <a href="#" class="list-group-item "><span class="text-danger ">Số tài khoản : <?php echo $data_3?> </span> </a>
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
                        <form action="\du_an_1\admin-template-master\2.user\handle.php" method="post">

                            <table class="table table-striped table-hover bg-light  shadow-sm table-info  ">

                                <thead class="bg-blue">
                                    <tr class=" text-left  ">
                                        <th><input type="checkbox" id="checkAl"> Select All</th>
                                        <th>Mã KH</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Avatar</th>
                                        <th>Tên KH </th>
                                        <th>Di động </th>
                                        <th>Giới tính </th>
                                        <th>Email </th>
                                        <th>Địa chỉ</th>
                                        <th>Mật khẩu </th>
                                        <th>Vai trò </th>
                                        <th>Kích hoạt </th>
                                        <th colspan="2">Công cụ</th>
                                    </tr>
                                </thead>

                            <?php foreach ($data as $kh) { ?>
                                <tr class="text-left">
                                    <td width="10%"><input type="checkbox" id="checkItem" name="check[]"
                                            value="<?= $kh['ma_kh'] ?>"></td>
                                    <td><?= $kh['ma_kh'] ?></td>
                                    <td><?= $kh['ten_tk'] ?></td>
                                    <td><img src="<?= $kh['avatar'] ?>" alt="noimg" width="50px" height="50px"></td>
                                    <td> <?= $kh['ten_kh'] ?></td>
                                    <td><?= $kh['sdt'] ?></td>
                                    <td><?= ($kh['gioi_tinh'] == 0) ? "Nữ" : "Nam" ?></td>
                                    <td> <?= $kh['email'] ?></td>
                                    <td> <?= $kh['dia_chi'] ?></td>
                                    <td><?= $kh['mat_khau'] ?></td>
                                    <td><?= ($kh['vai_tro'] == 0) ? "Khách hàng" : "Nhân Viên" ?></td>
                                    <td><?= ($kh['kich_hoat'] == 0) ? "Mở" : "Khóa" ?></td>
                                    <td width="2%">
                                        <a href="\du_an_1\admin-template-master\2.user\update_user.php?ma_kh=<?= $kh['ma_kh'] ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a>
                                    </td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\2.user\handle.php?id=<?= $kh['ma_kh'] ?>" data-target="#confirm-delete" data-toggle="modal"
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
                                    <h4 class="modal-title" id="myModalLabel">Thêm khách hàng</h4>
                                </div>
                                <form action="\du_an_1\admin-template-master\2.user\handle.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Mã khách hàng</label>
                                            <input type="text" class="form-control" placeholder="Autonumber" readonly name="ma_kh">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên khách hàng</label>
                                            <input type="text" class="form-control" placeholder="Họ tên..." name="ten_kh">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên đăng nhập</label>
                                            <input type="text" class="form-control" placeholder="Họ tên..." name="ten_tk">
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input type="file" name="avatar">
                                        </div>
                                        <div class="form-group">
                                            <label>Số di động</label>
                                            <input type="number" class="form-control" placeholder="Di động..." name="sdt">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control" placeholder="Địa chỉ..." name="dia_chi">
                                        </div>
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gioi_tinh" value="1" checked="">Nam
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gioi_tinh" value="0">Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password" class="form-control" placeholder="Password..." name="mat_khau">
                                        </div>
                                        <div class="form-group">
                                            <label>Vai trò</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="vai_tro" value="0" checked="">Khách hàng
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="vai_tro" value="1">Nhân viên
                                                </label>
                                            </div>

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