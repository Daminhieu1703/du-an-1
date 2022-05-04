<?php session_start(); 
require_once "./handle.php"; 
$loai_hang = select_lh_all();
$slider = select_slide();
$bv = select_all_bv();
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

    <title>Trang chủ</title>
</head>

<body>
    <header class="header " id="header">
        <nav class="nav container">
            <a href="./index.php" class="nav__logo"><img class="nav__logo-img" src="./assets/img/logo_hkl.png" alt="logo"></a>

            <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                    <li class="nav__item"><a href="\du_an_1\template-master\about.php" class="nav__link">giới thiệu</a></li>
                    <?php foreach ($loai_hang as $data) { ?>
                        <li class="nav__item"><a href="\du_an_1\template-master\category.php?ma_loai=<?=$data['ma_loai']?>" class="nav__link"><?=$data['ten_loai']?></a></li>
                    <?php } ?>
                    <li class="nav__item"><a href="\du_an_1\template-master\news.php" class="nav__link">tin tức</a></li>
                    <li class="nav__item"><a href="\du_an_1\template-master\contact.php" class="nav__link">liên hệ</a></li>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 0) { ?>
                       <li class="nav__item"><a href="\du_an_1\template-master\order_list.php?ma_kh=<?=$_SESSION['user']['ma_kh']?>" class="nav__link">Đơn hàng</a></li>
                    <?php }elseif (isset($_COOKIE['ten_tk']) && isset($_COOKIE['mat_khau'])) { $ten_tk = $_COOKIE['ten_tk']; $mat_khau = $_COOKIE['mat_khau']; $data = select_kh_by_tentk($ten_tk,$mat_khau);?>
                        <?php if ($data['vai_tro'] == 0){ ?>
                            <li class="nav__item"><a href="\du_an_1\template-master\order_list.php?ma_kh=<?=$data['ma_kh']?>" class="nav__link">Đơn hàng</a></li>
                        <?php }?>
                    <?php } ?>
                    <li class="social__item" id="menu-hidden-btn"><a style="cursor: pointer;" title="Thêm"
                            class="social__icon"><i class="ri-align-justify"></i></a></li>
                </ul>
            </div>

            <div class="nav__social">
                <ul class="nav__social-icon">
                    <li class="social__item search__container">
                        <span type="button" class="nav__link nav__service-link" title="Search">
                            <i class="ri-search-line"></i>
                        </span>
                        <div class="search__form" id="search">
                            <form class="search-fr" action="\du_an_1\template-master\search.php" method="GET">
                                <div class="form-input">
                                    <input name="keyword" id="search" placeholder="Tìm kiếm..." value="" type="text"
                                        required="required" />
                                    <button type="submit">
                                        <i class="ri-search-eye-line"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <?php if ($_SESSION['user']['vai_tro'] == 0) { ?>
                            <li class="social__item"><a href="\du_an_1\template-master\cart.php" class="social__icon"><i class="ri-shopping-bag-line"
                                title="Giỏ hàng"></i></a></li>
                        <?php } ?>
                        <!-- Nếu đăng nhập thành công hiện ảnh ng dùng  -->
                        <li class="social__item">
                            <a style="text-transform: none" href="\du_an_1\template-master\profile.php?ma_kh=<?=$_SESSION['user']['ma_kh']?>" class="social__icon " id="Tài khoản" title="Tài khoản"><img src="<?=$_SESSION['user']['avatar']?>" class=user-profile-image alt="avatar"></a>
                        </li>
                        <!-- Đăng nhập thành công mới hiện thẻ đăng xuất -->
                        <li class="social__item">
                            <a style="text-transform: none" href="\du_an_1\template-master\handle.php?logout=dangxuat" class="social__icon"><i class="ri-logout-box-line" title="Đăng xuất"></i>Đăng xuất</a>
                        </li>
                        <?php if ($_SESSION['user']['vai_tro'] == 1) { ?>
                            <li class="social__item" id="dash">
                                <a href="\du_an_1\admin-template-master\index.php" title="Quản trị" class="social__icon"><i class="ri-settings-2-line"></i></a>
                            </li>
                        <?php } ?>
                    <?php }else if(isset($_COOKIE['ten_tk']) && isset($_COOKIE['mat_khau'])){ ?>
                        <?php
                            $ten_tk = $_COOKIE['ten_tk']; 
                            $mat_khau = $_COOKIE['mat_khau']; 
                            $data = select_kh_by_tentk($ten_tk,$mat_khau);
                        if ($data['vai_tro'] == 0) { ?>
                            <li class="social__item"><a href="\du_an_1\template-master\cart.php" class="social__icon"><i class="ri-shopping-bag-line"title="Giỏ hàng"></i></a></li>
                        <?php }?>
                            <!-- Nếu đăng nhập thành công hiện ảnh ng dùng  -->
                            <li class="social__item">
                                <a style="text-transform: none" href="\du_an_1\template-master\profile.php?ma_kh=<?=$data['ma_kh']?>" class="social__icon " id="Tài khoản" title="Tài khoản"><img src="<?=$data['avatar']?>" class=user-profile-image alt="avatar"></a>
                            </li>
                            <!-- Đăng nhập thành công mới hiện thẻ đăng xuất -->
                            <li class="social__item">
                                <a style="text-transform: none" href="\du_an_1\template-master\handle.php?logout=dangxuat" class="social__icon"><i class="ri-logout-box-line" title="Đăng xuất"></i>Đăng xuất</a>
                            </li>
                        <?php if($data['vai_tro'] == 1){ ?>
                            <li class="social__item" id="dash">
                                <a href="\du_an_1\admin-template-master\index.php" title="Quản trị" class="social__icon"><i class="ri-settings-2-line"></i></a>
                            </li>
                        <?php } ?>
                    <?php }else { ?>
                        <!-- Nếu đăng nhập thành công ko hiện thẻ đăng nhập -->
                        <li class="social__item">
                            <a style="text-transform: none" href="\du_an_1\template-master\login.php" class="social__icon " id="admin" title="Tài khoản"><i class="ri-user-line"></i>Đăng nhập</a>
                        </li>
                        <li class="social__item">
                            <a style="text-transform: none" href="\du_an_1\template-master\login.php" class="social__icon"><i class="ri-user-add-line" title="Đăng ký"></i>Đăng ký</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="main">
        <section class="header__banner">
            <div class="swiper-container mySwiper" id="slider">
                <div class="swiper-wrapper">
                    <?php foreach ($slider as $data) { ?>
                        <div class="swiper-slide"><img src="<?=$data['url_slide']?>" alt="" class="banner__img"></div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <?php foreach ($loai_hang as $data) {?>
        <section class="section products">
            <h2 class="section__title"><?=$data['ten_loai']?></h2>

            <section class="product__container container" data-aos="fade-up" data-aos-duration="2000">
            <?php
            $ma_loai = $data['ma_loai'];
            $select_sp_by_loai= select_sp_by_loai($ma_loai);
            foreach ($select_sp_by_loai as $data) {?>
                <div class="product__card">
                    <div class="product__img">
                        <a href="\du_an_1\template-master\product_page.php?ma_sp=<?= $data['ma_sp']?>">
                            <img src="<?=$data['hinh_sp']?>">
                        </a>
                    </div>
                    <div class="product__title" title="tên sản phẩm">
                        <a href="\du_an_1\template-master\product_page.php?ma_sp=<?= $data['ma_sp']?>"><?=$data['ten_sp']?></a>
                    </div>
                    <div class="product__price ">
                        <del>
                            <span class="product__price-sale">
                            <?= number_format($data['gia_sp'],0,',','.') ?>VNĐ
                            </span>
                        </del>
                        <?= number_format($data['gia_km'],0,',','.') ?>VNĐ
                    </div>
                    <div class="product__view">
                        <i class="ri-eye-fill"></i> <p><?=$data['so_luot_xem']?> lượt xem</p>    
                    </div>
                    <?php if ($data['so_luong']<1){?>
                        <div class="sold_out">Hết hàng</div>
                    <?php }?>
                </div>
            <?php } ?>        
            </section>
        </section>
    <?php } ?>
        <section class="section news">
            <h2 class="section__title">THÔNG TIN HỮU ÍCH</h2>

            <div class="news__container container" data-aos="fade-up-left" data-aos-duration="1000">
                <?php foreach ($bv as $value) {?>
                <div class="news__content">
                    <div class="news__content-img">
                        <img src="<?=$value['hinh_chinh']?>" class="news__img" alt="">
                    </div>
                    <a href="\du_an_1\template-master\news-item.php?ma_bv=<?=$value['ma_bv']?>" class="news__title"><?=$value['ten_bv']?></a>
                    <div class="item__text-description"><?= $value["noi_dung"] ?></div>
                </div>
                <?php }?>
            </div>
        </section>
        <footer class="footer section">

            <div class="footer__container container">

                <div class="footer__social footer__item">
                    <h3 class="footer__title ">ĐIỀU HƯỚNG</h3>

                    <div class="social__list">
                        <ul>
                            <li><a href=""><i class="ri-facebook-circle-line social__link"></i></a></li>
                            <li><a href=""><i class="ri-instagram-line social__link"></i></a></li>
                            <li><a href=""><i class="ri-youtube-line social__link"></i></a></li>
                            <li><a href=""><i class="ri-twitter-line social__link"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer__subscribe footer__item">
                    <div class="footer__subscribe-content">
                        <a href="#" class="nav__logo footer__logo"><img class="nav__logo-img" src="./assets/img/logo_hkl.png" alt="logo"></a>
                        <span class="footer__description">HKL Mang lại gía trị đích thực cũng những chiếc đồng hồ sang
                        trọng, đa dạng trong mẫu mã sản phẩn, chính sách bảo hành, vận chuyển và thanh toán tốt
                        nhất.</span>

                        <div class="subscribe__form">
                            <input type="email" name="" id="" placeholder="Email...">
                            <button class="subscribe__button"><i
                                    class="ri-arrow-right-circle-line button__icon"></i></button>
                        </div>
                    </div>
                </div>

                <div class="footer__info footer__item">
                    <h3 class="footer__title">THÔNG TIN LIÊN HỆ</h3>

                    <div class="info__detail">
                        <p>Cao Đẳng FPT Polytechnic Lớp WE16305-PRO1014
                            <br>Hotline: 0342770723 <br> linhdqph14703@fpt.edu.vn<br> khanglmph14697@fpt.edu.vn<br> hieudmph14827@fpt.edu.vn
                        </p>
                    </div>
                </div>

            </div>

            <div class="footer__rights">
                <span class="copy__right">
                    © All rights reserved 14703.
                </span>
            </div>
        </footer>
        <!-- Back to top -->
        <button class="back-to-top" id="back-to-top" title="Back to top"><i class="ri-arrow-up-s-fill"></i></button>




        <script src="./assets/js/main.js"></script>
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
        <script src="./assets/js/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
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
                    min: 0,
                    max: 500,
                    values: [100, 300],
                    slide: function (event, ui) {
                        $("#amount").html("$" + ui.values[0] + " - $" + ui.values[1]);
                        $("#amount1").val(ui.values[0]);
                        $("#amount2").val(ui.values[1]);
                    }
                });
                $("#amount").html("$" + $("#slider-range").slider("values", 0) +
                    " - $" + $("#slider-range").slider("values", 1));
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