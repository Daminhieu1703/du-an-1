<?php 
require_once "./../pdo/pdo.php";
session_start();
$ma_dh = $_GET['ma_dh'];
$sql = "SELECT * FROM don_hang WHERE ma_dh = $ma_dh";
$data = pdo_query_one($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiết đơn hàng</title>
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
                <div class="col-8 ">
                    <form action="\du_an_1\admin-template-master\6.order\handle.php">
                        <input type="hidden" name="ma_dh" value="<?=$ma_dh?>">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trang_thai" value="0" <?=($data['trang_thai'] == 0) ? "checked" : "" ?>>Đang giao
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trang_thai" value="2" <?=($data['trang_thai'] == 2) ? "checked" : "" ?>>Đã giao
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trang_thai" value="1" <?=($data['trang_thai'] == 1) ? "checked" : "" ?>>Dừng Giao
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="./orders.html" type="button" class="btn btn-default">Quay lại</a>
                            <button type="submit" class="btn btn-primary" name="sua">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            </div>
        </div>
    </div>
    <!--/.row-->



    <div class="row">
        <div class="col-md-6">

        </div>
        <!--/.col-->


        <div class="col-md-6">

        </div>
        <!--/.col-->

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