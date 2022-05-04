<?php
session_start();
require_once "./../pdo/pdo.php";
$ma_bv = $_GET['ma_bv'];
$sql = "SELECT * FROM bai_viet WHERE ma_bv = $ma_bv";
$data = pdo_query_one($sql);
$sql1 = "SELECT * FROM khach_hang";
$data1 = pdo_query($sql1);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product</title>
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
                <li class="active">bài viết</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cập nhật bài viết</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="col-8 ">
                    <form action="\du_an_1\admin-template-master\9.status\handle.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Mã bài viết</label>
                                <input type="text" class="form-control" value="<?=$ma_bv?>" readonly name="ma_bv">
                            </div>
                            <div class="form-group">
                                <label>Tên bài viết</label>
                                <input type="text" class="form-control" value="<?=$data['ten_bv']?>"placeholder="Tên..." name="ten_bv">
                            </div>
                            <div class="form-group">
                                <label>Hình chính</label>
                                <div style="display: flex;">
                                    <input type="file" class="form-control" name="img">
                                    <input type="hidden" name="hinh_chinh" value="<?=$data['hinh_chinh']?>">
                                    <img src="<?=$data['hinh_chinh']?>" alt="" width="50px" height="45px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="4" name="noi_dung"><?=$data['noi_dung']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tác giả</label>
                                <select class="form-control" name="ma_kh">
                                    <?php foreach($data1 as $kh) : ?>
                                    <option value="<?=$kh['ma_kh']?>" <?=($kh['ma_kh'] == $data['ma_kh']) ? "selected" : "" ?> ><?=$kh['ten_tk']?></option>
                                    <?php endforeach ; ?>
                                </select>
                            </div>
                        </div>
                        
                        <?php if (isset($_SESSION["error_check"])) { ?>
                            <div class="mb-3 fw-bold text-center text-danger">
                                <?=$_SESSION["error_check"]; unset($_SESSION["error_check"]) ?>
                            </div>
                        <?php } ?>
                        
                        <div class="modal-footer">
                            <a href="./status.php" class="btn btn-default">Hủy</a>
                            <button type="submit" class="btn btn-primary" name="sua_bv">Lưu thay đổi</button>
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