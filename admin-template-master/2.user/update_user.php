<?php
session_start();
require_once "./../pdo/pdo.php";
$ma_kh = $_GET['ma_kh'];
$sql = "SELECT * FROM khach_hang WHERE ma_kh = $ma_kh";
$data = pdo_query_one($sql);
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
                <h1 class="page-header">Cập nhật khách hàng</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="col-8 ">
                    <form action="\du_an_1\admin-template-master\2.user\handle.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label>Mã KH</label>
                                    <input type="text" class="form-control" name="ma_kh" value="<?= $ma_kh ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" class="form-control" name="ten_kh" value="<?php echo $data['ten_kh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="ten_tk" value="<?php echo $data['ten_tk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <div style="display:flex;">
                                        <input type="file" class="form-control" name="img">
                                        <input type="hidden" name="avatar" value="<?=$data['avatar']?>">
                                        <img src="<?=$data['avatar']?>" alt="" width="50px" height="45px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Số di động</label>
                                    <input type="number" class="form-control" name="sdt" value="<?php echo $data['sdt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" value="<?php echo $data['dia_chi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gioi_tinh" value="1" <?=($data['gioi_tinh'] == 1) ? "checked" : ""?>>Nam
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gioi_tinh" value="0" <?=($data['gioi_tinh'] == 0) ? "checked" : ""?>>Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" class="form-control" name="mat_khau" value="<?php echo $data['mat_khau'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Vai trò</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="vai_tro" value="0" <?=($data['vai_tro'] == 0) ? "checked" : ""?>>Khách hàng
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="vai_tro" value="1" <?=($data['vai_tro'] == 1) ? "checked" : ""?>>Nhân Viên
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Kích hoạt</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="kich_hoat" value="0" <?=($data['kich_hoat'] == 0) ? "checked" : ""?>>Mở
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="kich_hoat" value="1" <?=($data['kich_hoat'] == 1) ? "checked" : ""?>>Khóa
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION["error_check"])) { ?>
                            <div class="mb-3 fw-bold text-center text-danger">
                                <?=$_SESSION["error_check"]; unset($_SESSION["error_check"]) ?>
                            </div>
                        <?php } ?>
                        <div class="modal-footer">
                            <a href="./users.html" class="btn btn-default">Hủy</a>
                            <button type="submit" class="btn btn-primary" name="sua">Lưu thay đổi</button>
                        </div>
                    </form>
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