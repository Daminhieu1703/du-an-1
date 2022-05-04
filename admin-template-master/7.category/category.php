<?php require_once "./../pdo/pdo.php";
$sql = "SELECT * FROM loai_hang";
$data = pdo_query($sql);
session_start();
$sql_3 = "SELECT COUNT(ma_loai) FROM loai_hang";
$data_3 = pdo_query_value($sql_3);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>category</title>
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
                <li class="active">Loại hàng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại hàng</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-container">
            <div class="col-lg-3 col-sm col-md-3">
                <div class="list-group shadow-sm">
                    <div class="list-group-item active fw-bold ">
                        Dữ liệu loại hàng
                    </div>
                    <a href="#" class="list-group-item link-primary text-primary fw-semi-bold " data-target="#addModal"
                        data-toggle="modal">Thêm loại hàng</a>
                    <a href="#" class="list-group-item link-danger"><span class="text-danger ">Số loại hàng : <?php echo $data_3 ?> </span> </a>
                </div>

                <?php if (isset($_SESSION["error_check"])) { ?>
                    <div class="mb-3 fw-bold text-center text-danger">
                        <?=$_SESSION["error_check"]; unset($_SESSION["error_check"]) ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-8 pe-5 ">
                <div class="table-responsive rounded px-2 table-bordered border-radius-3">
                    <form action="\du_an_1\admin-template-master\7.category\handle.php" method="post">

                        <table class="table table-striped table-hover bg-light shadow-sm table-info border-radius-3  ">
                            <thead class="bg-blue">
                                <tr class=" text-left">
                                    <th><input type="checkbox" id="checkAl"> Select All</th>
                                    <th>Mã loại</th>
                                    <th>Tên loại </th>
                                    <th colspan="3">Công cụ</th>
                                </tr>
                            </thead>

                        <?php foreach ($data as $key) { ?>
                            <tr class="text-left">
                                   <td width="15%"><input type="checkbox" id="checkItem" name="check[]"
                                   value="<?php echo $key['ma_loai']; ?>"></td>
                                    <td> <?php echo $key['ma_loai']; ?> </td>
                                    <td><?php echo $key['ten_loai']; ?></td>
                                    <td width="2%">
                                        <a href="./update_category.php?ma_loai=<?php echo $key['ma_loai']; ?>" class="btn btn-sm w-100 btn-warning text-white">Cập nhật</a>
                                    </td>
                                    <td width="2%">
                                        <a href="#" data-href="\du_an_1\admin-template-master\7.category\handle.php?id=<?php echo $key['ma_loai']; ?>" data-target="#confirm-delete" data-toggle="modal" class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                    </td>
                            </tr>
                        <?php } ?>

                        </table>
                        <p align="left" style="padding-left: 1%;"><button type="submit" onclick="return confirm('Xác nhận xóa?')" class="btn btn-success" name="xoa">Xóa</button></p>
                    </form>
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
                            <form action="\du_an_1\admin-template-master\7.category\handle.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Mã loại hàng</label>
                                        <input class="form-control" placeholder="Autonumber" readonly name="ma_loai">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên loại hàng</label>
                                        <input class="form-control" placeholder="Tên loại..." name="ten_loai">
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
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
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