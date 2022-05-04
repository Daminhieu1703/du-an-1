<?php
require_once "./handle.php";
$total_sp = 0;
$total_sl = 0;
$uoc_tinh = $_POST['uoc_tinh'];
$tong_tien = $_POST['tong_tien'];
$tien_ship = $_POST['tien_ship'];
$ma_kh = $_POST['ma_kh'];
$cart = select_cart_by_ma_kh($ma_kh);
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
        <title>Thanh toán</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">


        <div class="description__container contact__container">
            <div class="contact__form-container">
                <div class="apply__discount">
                    <div class="apply__discount-text">
                        <p><i class="ri-price-tag-3-fill"></i>Có mã ưu đãi?</p> 
                        <p class="form-discount-toggle"> Ấn vào đây để nhập mã của bạn</p>
                    </div>
                    <div class="form-apply__discount">
                        <form action="">
                            <div class="input-discount">
                                <input type="text" name="" id="" placeholder="Mã ưu đãi">
                            </div>
                            <div class="submit-discount">
                                <button type="submit">ÁP DỤNG MÃ ƯU ĐÃI</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="contact__content payment-content" style="justify-content: center; padding-top: 30px;">
                    <div class="contact__form" style="width:40%;border-top: 2px solid #ddd;">
                        <div class="description__container-title contact__container-title">
                            <small class="sidebar-title" style="margin-bottom: 0;font-size: 20px;">THÔNG TIN THANH TOÁN</small>
                        </div>
                        <form action="\du_an_1\template-master\handle.php" style="gap:.5rem" method="post">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <label for="" style="color: black;">Họ và tên *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$_SESSION['user']['ten_kh'] ?>" name="ten_kh">
                                <input type="hidden" name="ma_kh" value="<?=$_SESSION['user']['ma_kh']?>">
                                <label for="" style="color: black;">Địa chỉ *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$_SESSION['user']['dia_chi'] ?>" name="dia_chi">
                                <label for="" style="color: black;">Số điện thoại *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$_SESSION['user']['sdt'] ?>" name="sdt">
                                <label for="" style="color: black;">Email *</label>
                                <input type="email" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$_SESSION['user']['email'] ?>" name="email">
                            <?php } elseif(isset($_COOKIE['ten_tk']) && isset($_COOKIE['mat_khau'])) { $ten_tk = $_COOKIE['ten_tk']; $mat_khau = $_COOKIE['mat_khau']; $data = select_kh_by_tentk($ten_tk,$mat_khau);?>
                                <label for="" style="color: black;">Họ và tên *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$data['ten_kh'] ?>" name="ten_kh">
                                <input type="hidden" name="ma_kh" value="<?=$data['ma_kh']?>">
                                <label for="" style="color: black;">Địa chỉ *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$data['dia_chi'] ?>" name="dia_chi">
                                <label for="" style="color: black;">Số điện thoại *</label>
                                <input type="text" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$data['sdt'] ?>" name="sdt">
                                <label for="" style="color: black;">Email *</label>
                                <input type="email" required style="padding-top:.5rem; padding-bottom: .5rem" value="<?=$data['email'] ?>" name="email">
                            <?php }?>
                            <input type="hidden" value="<?=$tong_tien?>" name="tong_gia">
                            <label for="" style="color: black;">Ghi chú đơn hàng *</label>
                            <textarea name="ghi_chu" id="" cols="15" rows="7" placeholder="Tin nhắn ..."
                                style="padding-top:.5rem; padding-bottom: .5rem"></textarea>
                            <button class="payment-btn" type="submit" name="dat_hang">Đặt hàng</button>
                    </div>

                        <div class="contact__address payment-details" style="width:40%; flex: none; border: 2px solid #44596F; padding: 0.5rem; padding-bottom: 1rem;">
                            <small class="sidebar-title" style="margin-bottom: 0;font-size: 20px;">ĐƠN HÀNG CỦA BẠN</small>
                            <div class="is-divider small " style="margin: .25rem 0; max-width: 100%;"></div>
                        <div>
                            <table style="text-align:left; width: 100%; color: black;">
                                <thead>
                                    <th width="60%" style="font-size: 18px;">Sản phẩm</th>
                                    <th width="30%" style="font-size: 18px;">Tổng</th>
                                </thead>
                                <?php foreach ($cart as $data) { ?>
                                    <?php $total_sp = $data['gia_sp'] * $data['so_luong'];
                                        $total_sl += $data['so_luong']?>
                                <tr style="font-size: 14px;">
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;"><?=$data['ten_sp']?> x <?=$data['so_luong']?></td>
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;"><?=number_format($total_sp,0,',','.')?> đ</td>
                                </tr>
                                <?php } ?>
                                <input type="hidden" value="<?=$total_sl?>" name="tong_so_luong">
                                <tr style="font-size: 14px;">
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;">Ước tính</td>
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;"><?=number_format($uoc_tinh,0,',','.')?> đ</td>
                                </tr>
                                <tr style="font-size: 14px;">
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;">Tiền ship</td>
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0; color: #666;"><?=number_format($tien_ship,0,',','.')?> đ</td>
                                </tr>
                                <tr style="font-size: 14px;">
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;">Tổng cộng</td>
                                    <td style="border-top: 1px solid #ddd; padding: .5rem 0;"><?=number_format($tong_tien,0,',','.')?> đ</td>
                                </tr>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>



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