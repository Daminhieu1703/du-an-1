<?php
require_once "./handle.php";
$ma_kh = $_GET['ma_kh'];
$don_hang = select_dh_by_ma_kh_all($ma_kh);
// foreach ($don_hang as $value) {
//     $ma_dh = $value['ma_dh'];
//      $ct_dh = select_ct_dh_by_ma_kh($ma_dh);
//      var_dump($ct_dh);die;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
        <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico">
        <link rel="manifest" href="./assets/favicon/site.webmanifest">
        <!-- RECAPCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- css -->
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
        <!-- aos js -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
        <!-- ranger slider -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <title>Chi tiết thanh toán</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <?php if (empty($don_hang) == true) { ?>
           <div class="empty" style="text-align: center; padding-top: 1.5rem;">
                <p style="font-size: 30px; color: red;">Danh sách đơn hàng của bạn đang trống :((</p>
                <img src="./assets/img/box_empty.png" alt="" width="50%">
           </div>
        <?php } else { ?>
            <div class="description__container contact__container">
            <div class="contact__form-container">
                <div class="contact__content payment-content order-content" style="justify-content: center; padding-top: 50px; ">
                <div  class="contact-height" style="width:70%; margin-bottom: auto;">
                    <?php foreach ($don_hang as $value) { $ma_dh = $value['ma_dh']; $ct_dh = select_ct_dh_by_ma_kh($ma_dh);?>
                        <div class="contact__address payment-details order-details" 
                            style="width:100%; margin-bottom: auto; min-height: 350px;">
                            <small class="sidebar-title" style="margin-bottom: 0;font-size: 20px;">CHI TIẾT ĐƠN HÀNG MÃ <?=$ma_dh?> </small>
                            <div class="is-divider small " style="margin: .25rem 0; max-width: 100%;"></div>
                            <div>
                                    <table style="text-align:left; width: 100%; color: black;">
                                        <thead>
                                            <th  style="font-size: 18px;">Sản phẩm</th>
                                            <th  style="font-size: 18px; text-align: center;">Số lượng</th>
                                            <th  style="font-size: 18px; text-align: right;">Tổng tiền sản phẩm</th>
    
                                        </thead>
                                        <?php foreach ($ct_dh as $value_ct) { ?>
                                        <tr style="font-size: 13px;">
                                            <td style="border-top: 1px solid #ddd; padding: .5rem 0;"><strong><?=$value_ct['ten_sp']?></strong> </td>
                                            
                                            <td style="border-top: 1px solid #ddd; padding: .5rem 0; text-align: center; font-size: 16px;"><strong><?=$value_ct['so_luong']?></strong></td>
                                            <td style="border-top: 1px solid #ddd; padding: .5rem 0; text-align: right; font-size: 16px;"><strong><?=number_format($value_ct['gia_sp'],0,',','.')?> đ</strong></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                            </div>
                        </div>
                    <?php }?>
                </div>
                    <div class="contact-height"  style="width: 40%;">
                        <?php foreach ($don_hang as $value) { ?>
                        <div class="completed-order" style="width: 100%;">
                            <?php if ($value['trang_thai'] == 0) {?>
                                <p>Đơn hàng của bạn đang được xử lý</p>
                            <?php } elseif ($value['trang_thai'] == 1) {?>
                                <p style="color: crimson;">Đơn hàng của bạn bị khóa !</p>
                            <?php } else {?>
                                <p>Đơn hàng giao thành công</p>
                            <?php }?>
                            <ul>
                                <li>Mã đơn hàng : <strong><?= $value['ma_dh']?></strong> </li>
                                <li>Ngày : <strong><?= $value['ngay_don_hang']?></strong></li>
                                <li>Tên khách hàng : <strong><?= $value['ten_kh']?></strong></li>
                                <li>Email : <strong><?= $value['email']?></strong></li>
                                <li>Địa chỉ giao hàng : <strong><?= $value['dia_chi']?></strong></li>
                                <li>Tổng tiền đơn hàng : <strong><?=number_format($value['tong_gia'],0,',','.')?> đ</strong></li>
                                <li>Số lượng : <strong><?= $value['tong_so_luong']?></strong> sản phẩm</li>
                                <li>Ghi chú : <strong><?= $value['ghi_chu']?></strong></li>
                            </ul>
                            <?php if ($value['trang_thai'] == 0) { ?>
                                <div class="form__div" style="margin-top: 5px;">
                                    <a href="\du_an_1\template-master\handle.php?ma_dhang=<?= $value['ma_dh']?>&ma_khang=<?=$ma_kh?>&trang_thai=<?=2?>" class="btn__add" style="background-color: green;height: 40px;" >Đã nhận đơn hàng</a>
                                    <br>
                                    <a href="\du_an_1\template-master\handle.php?ma_don_hang=<?= $value['ma_dh']?>&ma_khach_hang=<?=$ma_kh?>" class="btn__add" style="background-color: crimson;height: 40px;" >Huỷ đơn hàng</a>
                                </div>
                            <?php } elseif($value['trang_thai'] == 1) { ?>
                                <div class="form__div" style="margin-top: 5px;">
                                    <a href="\du_an_1\template-master\contact.php"class="btn__add" style="background-color: crimson;height: 40px;" >Liên hệ</a>
                                </div>
                            <?php }?>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <?php require "./header_footer/footer.php"; ?>
    <!-- Back to top -->
    <button class="back-to-top" id="back-to-top" title="Back to top"><i class="ri-arrow-up-s-fill"></i></button>
    <!-- JS -->
    <script src="./assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        function showPassw() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
        // SCROLL REVEAL
        ScrollReveal().reveal('.product');
        ScrollReveal().reveal('.cart');
        ScrollReveal().reveal('.main_category');
        // aos js
        AOS.init();
    </script>
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 1677000,
                max: 21940000,
                values: [1677000, 21940000],
                slide: function (event, ui) {
                    $("#amount").html(ui.values[0] + "đ  -" + ui.values[1] + "đ");
                    $("#amount1").val(ui.values[0]);
                    $("#amount2").val(ui.values[1]);
                }
            });
            $("#amount").html($("#slider-range").slider("values", 0) +
                "đ  - " + $("#slider-range").slider("values", 1) + "đ");
        });
    </script>
    <!-- Back to top JavaScript-->
    <script>
        var btn = $("#back-to-top");

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass("show-back-to-top");
            } else {
                btn.removeClass("show-back-to-top");
            }
        });

        btn.on("click", function (e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "300");
        });
    </script>
</body>

</html>