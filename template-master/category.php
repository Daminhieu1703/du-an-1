<?php
require_once "./handle.php";
$number_product = (!empty($_GET['number_product'])) ? $_GET['number_product'] : 6;
$number_page = (isset($_GET['number_page'])) ? $_GET['number_page'] : 1;
$total_number_page = total_number_page($number_product);
if ($number_page > $total_number_page) {
    $number_page = 1;
    header('Location:category.php?number_page='.$number_page);
    die;
}elseif ($number_page == 0) {
    $number_page = $total_number_page;
    header('Location:category.php?number_page='.$number_page);
    die;
}
$san_pham = select_sp_all($number_page,$number_product);
$count_all_sp = count_all_sp();
$select_all_sp_in_danhmuc=select_all_sp_in_danhmuc();
$gia_sp = select_sp_gia_sp();
$top10 = select_top_10();
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $sp_by_loai = select_sp_by_loai($ma_loai); 
    $count_sp_by_ma_loai = count_sp_by_ma_loai($ma_loai);
}elseif (isset($_GET['gia_thap']) && isset($_GET['gia_thap'])) {
    $gia_thap = $_GET['gia_thap'];
    $gia_cao = $_GET['gia_cao'];
    $loc_gia = loc_sp_by_gia($gia_thap, $gia_cao);
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
            <?php if (empty($sp_by_loai) == false) {?>
                <span class="divider_category">/</span><?=$sp_by_loai[0]['ten_loai']?></nav>
            <?php } else {?>
                <span class="divider_category">/</span>Tất cả sản phẩm</nav>
            <?php }?>
            <?php if (empty($count_sp_by_ma_loai) == false) { ?>
               <span class="total-product">Tất cả <?=$count_sp_by_ma_loai?> kết quả</span>
            <?php } else { ?>
                <span class="total-product">Tất cả <?=$count_all_sp?> kết quả</span>
            <?php }?>
            <div class="btn-filter">
            <a id="btn_filter" style="cursor: pointer;" title="Thêm" class="social__icon"><i
                    class="ri-align-justify"></i> LỌC</a>
            </div>
        <section class="section product_category">
            <!-- Pagination -->
            <div class="pagination__container">
                <ul class="page">
                    <li class="page__btn"><a href="\du_an_1\template-master\category.php?number_page=<?=$number_page-1?>&number_product=<?=$number_product?>"><i class="ri-arrow-left-s-line"></i></a></li>
                    <?php for ($i=1; $i <= $total_number_page; $i++) { ?> 
                        <li class="page__numbers active"><a href="\du_an_1\template-master\category.php?number_page=<?=$i?>&number_product=<?=$total_number_page?>"><?=$i?></a></li>
                    <?php } ?>
                    <li class="page__btn"><a href="\du_an_1\template-master\category.php?number_page=<?=$number_page+1?>&number_product=<?=$number_product?>"><i class="ri-arrow-right-s-line"></i></a></li>
                </ul>
            </div>
            <div class="shop-sidebar-menu">
                <div class="shop-sidebar-container">
                    <span class="sidebar-title">Lọc theo giá</span>
                    <div class="is-divider small"></div>
                    <div class="slider-range-container">
                        <div id="slider-range"></div>
                        <div class="form__ranger-slider">
                            <form action="category.php" method="get">
                                <input type="hidden" id="amount1" name="gia_thap">
                                <input type="hidden" id="amount2" name="gia_cao">
                                <div class="slider__context">
                                    <input type="submit" name="submit_range" value="Lọc">
                                    <label for="amount" class="amount-ranger-label">
                                        <p>Giá:</p><p id="amount" class="amount-ranger"></p>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shop-sidebar-container category-list">
                    <span class="sidebar-title">danh mục sản phẩm</span>
                    <div class="is-divider small"></div>
                    <div class="sidebar-menu__content">
                        <ul>
                            <li><a href="\du_an_1\template-master\category.php">Tất cả sản phẩm</a></li>
                            <?php foreach ($select_all_sp_in_danhmuc as $data) { ?>
                                <li><img src="<?=$data['hinh_sp']?>" width="30px" height="30px" alt="avatar"><a href="\du_an_1\template-master\product_page.php?ma_sp=<?=$data['ma_sp']?>"><?=$data['ten_sp']?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="shop-sidebar-container">
                    <span class="sidebar-title">TOP 10 sản phẩm nhiều lượt xem</span>
                    <div class="is-divider small"></div>
                    <div class="sidebar-menu__content">
                        <ul>
                            <?php foreach ($top10 as $sptop10) { ?>
                                <li><img src="<?=$sptop10['hinh_sp']?>" width="30px" height="30px" alt="avatar"><a href="\du_an_1\template-master\product_page.php?ma_sp=<?=$sptop10['ma_sp']?>"><?=$sptop10['ten_sp']?></a> <span class="count"><?=$sptop10['so_luot_xem']?> VIEW</span></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="products__container">
                <?php if (empty($sp_by_loai) == false) { ?>
                    <?php foreach ($sp_by_loai as $data) { ?>
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
                <?php }elseif(empty($loc_gia) == false) { ?>
                    <?php foreach ($loc_gia as $data) { ?>
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
                <?php }else { ?>
                    <?php foreach ($san_pham as $data) { ?>
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
                <?php foreach ($gia_sp as $value) { ?>
                range: true,
                min: <?= $value['gia_thap']?>,
                max: <?= $value['gia_cao']?>,
                values: [<?=(isset($gia_thap)) ? $gia_thap : $value['gia_thap']?>, <?=(isset($gia_cao)) ? $gia_cao : $value['gia_cao']?>],
                <?php  } ?>
                slide: function (event, ui) {
                    $("#amount").html(ui.values[0].toLocaleString('vi', {style : 'currency', currency : 'VND'}) + "-" + ui.values[1].toLocaleString('vi', {style : 'currency', currency : 'VND'}));
                    $("#amount1").val(ui.values[0]);
                    $("#amount2").val(ui.values[1]);
                }
            });
            $("#amount").html($("#slider-range").slider("values", 0).toLocaleString('vi', {style : 'currency', currency : 'VND'}) +
                " - " + $("#slider-range").slider("values", 1).toLocaleString('vi', {style : 'currency', currency : 'VND'}));
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