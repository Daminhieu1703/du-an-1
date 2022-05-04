<?php
require_once "./../admin-template-master/pdo/pdo.php";
require_once "./handle.php";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $search_name = search_name($keyword);
}
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
        <link rel="stylesheet" href="./assets/css/cart.css">
        <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
        <!-- aos js -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
        <!-- ranger slider -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <title>Danh mục sản phẩm</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <nav class="breadcrumbs_category">
            <a href="index.php">Trang chủ</a>
            <span class="divider_category">/</span><?=(empty($search_name['0']['ten_loai']) == false) ? $search_name['0']['ten_loai'] : "không có sản phẩm bạn tìm kiếm" ?></nav>
               <span class="total-product">Kết quả tìm được của từ khóa -> "<?=$keyword?>"</span>
        <section class="section product_category" style="justify-content: space-around; padding: 0;margin-top: -30px;">
            <div class="products__container" style="width: 80%;column-gap: 3rem; justify-content: center;">
                <?php if (empty($search_name) == false) { ?>
                    <?php foreach ($search_name as $data) { ?>
                     <div class="product__card products__container-content">
                     <div class="product__img">
                         <a href="\du_an_1\template-master\product_page.php?ma_sp=<?= $data['ma_sp']?>">
                             <img src="<?= $data['hinh_sp']?>">
                         </a>
                     </div>
                     <div class="product__category">Mã loai: <?= $data['ma_loai']?></div>
                     <div class="product__title" title="tên sản phẩm">
                         <a href="\du_an_1\template-master\product_page.php?ma_sp=<?= $data['ma_sp']?>"><?= $data['ten_sp']?></a>
                     </div>
                     <del><span class="product-page__price-sale">Giá cũ: <?= number_format($data['gia_sp'],0,',','.') ?>VNĐ</span></del>
                     <div class="product__price ">Giá hiện tại: <?= number_format($data['gia_km'],0,',','.') ?>VNĐ</div>
                     <div class="product__view">
                         <i class="ri-eye-fill"></i><p><?= $data['so_luot_xem']?> lượt xem</p>    
                     </div>
                     <?php if ($data['so_luong'] < 1) { ?>
                        <!-- if sold out -->
                        <div class="sold_out">Hết hàng</div>
                     <?php } ?>
                    </div>
                <?php } ?>
                <?php }else {?>
                    <div class="empty-search">
                        <img src="\du_an_1\template-master\assets\img\empty_search.png" alt="">
                    </div>
                <?php } ?>
            </div>
        </section>
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