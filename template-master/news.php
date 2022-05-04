<?php
require_once "./handle.php";
$all_bv = select_all_bv();
if (isset($_GET['ten_bai_viet'])) {
    $ten_bv = $_GET['ten_bai_viet'];
    $bai_viet = search_name_bv($ten_bv);
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
        <title>Tin tức</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <nav class="breadcrumbs_category">
            <a href="index.php">Trang chủ</a>
            <span class="divider_category">/</span>
            Tin tức
        </nav>

        <div class="description__container news__container">

            <div class="news__main">
                <?php if (empty($bai_viet) == false) { ?>
                    <?php foreach ($bai_viet as $bv) {?>
                        <div class="news__main-item">
                            <div class="item__header">
                                <img src="<?= $bv["hinh_chinh"] ?>" alt="image">
                            </div>
                            <div class="item__text">
                                <div class="item__text-date">
                                    <p class="item__text-date_day"><?= $bv["ngay"] ?></p>
                                    <p class="item__text-date_month">Th<?= $bv["thang"] ?></p>
                                </div>
                                <div class="item__text-title">
                                    <a href="\du_an_1\template-master\news-item.php?ma_bv=<?= $bv["ma_bv"] ?>"><?= $bv["ten_bv"] ?></a>
                                </div>
                                <div class="is-divider small is-divider-news"></div>
                                <div class="item__text-description"><?= $bv["noi_dung"] ?></div>
                            </div>
                            
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php foreach ($all_bv as $bv) {?>
                        <div class="news__main-item">
                            <div class="item__header">
                                <img src="<?= $bv["hinh_chinh"] ?>" alt="image">
                            </div>
                            <div class="item__text">
                                <div class="item__text-date">
                                    <p class="item__text-date_day"><?= $bv["ngay"] ?></p>
                                    <p class="item__text-date_month">Th<?= $bv["thang"] ?></p>
                                </div>
                                <div class="item__text-title">
                                    <a href="\du_an_1\template-master\news-item.php?ma_bv=<?= $bv["ma_bv"] ?>"><?= $bv["ten_bv"] ?></a>
                                </div>
                                <div class="is-divider small is-divider-news"></div>
                                <div class="item__text-description"><?= $bv["noi_dung"] ?></div>
                            </div>
                            
                        </div>
                    <?php } ?>
                <?php }?>
            </div>

            <div class="news__sidebar">
                <div class="news-search">
                    <form action="news.php" method="GET">
                        <input type="text" placeholder="Tìm kiếm..." name="ten_bai_viet">
                        <button type="submit"><i class="ri-search-line"></i></button>
                    </form>
                </div>

                <div class="new-lasted-news-list">
                    <h3>BÀI VIẾT MỚI</h3>
                <?php foreach ($all_bv as $bv) {?>
                    <div class="new-lasted-news-content">
                        <div class="new-lasted-item">
                            <div class="item__text-date new-lasted-item-image" style="background-image: url(<?= $bv["hinh_chinh"] ?>);">
                                <p class="item__text-date_day"><?= $bv["ngay"] ?></p>
                                <p class="item__text-date_month">TH<?=$bv["thang"] ?></p>
                            </div>
                            <a href="./news-item.html" class="new-lasted-title"><?= $bv["ten_bv"] ?></a>
                        </div>
                    </div>
                <?php } ?>
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