<?php
require_once "./../pdo/pdo.php";
session_start();
$ma_bv = $_GET["ma_bv"];
$sql = "SELECT * FROM binh_luan_bv WHERE ma_bv = $ma_bv";
$data = pdo_query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comments</title>
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
                <li class="active">Bình luận bài viết</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết bình luận</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-container">

            <div class="col-8 pe-5 ">
                <div class="table-responsive rounded px-2 table-bordered border-radius-3">
                    <form action="\du_an_1\admin-template-master\8.cmt_bv\handle.php" method="post">
                        <input type="hidden" value="<?=$ma_bv?>" name="id_bv">
                        <table class="table table-striped table-hover bg-light shadow-sm table-info border-radius-3  ">
                            <thead class="bg-blue">
                                <tr class=" text-left">
                                    <th><input type="checkbox" id="checkAl"> Select All</th>
                                    <th>Mã BL</th>
                                    <th>Tên tài khoản</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Công cụ</th>
                                </tr>
                            </thead>

                        <?php foreach ($data as $cmt) {?>
                            <tr class="text-left">
                                <td width="15%"><input type="checkbox" id="checkItem" name="check[]"
                                        value="<?=$cmt['ma_bl']?>"></td>
                                <td><?=$cmt['ma_bl']?></td>
                                <td><?=$cmt['ten_tk']?></td>
                                <td><?=$cmt['noi_dung']?></td>
                                <td><?=$cmt['ngay_bl']?></td>
                                <td width="7%">
                                    <a href="#" data-href="\du_an_1\admin-template-master\8.cmt_bv\handle.php?ma_bl=<?=$cmt['ma_bl']?>&id_bv=<?=$ma_bv?>" data-target="#confirm-delete" data-toggle="modal"
                                        class="btn btn-sm w-100 btn-danger text-white">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>  
                        </table>

                        <p align="left" style="padding-left: 1%;"><button type="submit"
                                onclick="return confirm('Xác nhận xóa?')" class="btn btn-success"
                                name="xoa_all">Xóa</button></p>

                    </form>
                    <div class="modal-footer">
                        <a href="\du_an_1\admin-template-master\8.cmt_bv\comments.php" class="btn btn-primary">Quay lại</a>
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