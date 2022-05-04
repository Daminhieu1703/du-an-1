<?php
require_once "./handle.php";
$ma_bv = $_GET["ma_bv"];
$bv_by_mabv = select_bv_by_mabv($ma_bv);
$hp_by_mabv = select_hp_by_mabv($ma_bv);
$all_bv = select_all_bv();
$binh_luan = select_cmt_by_bv($ma_bv)

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
        <title>Tin Tức</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <nav class="breadcrumbs_category">
            <a href="index.html">Trang chủ</a>
            <span class="divider_category">/</span>
            Tin tức
        </nav>

        <div class="description__container news__container" style="padding: 0;">

            <div class="news__main" style="-webkit-box-shadow: 0px 0px 7px 0px rgba(221,221,221,1);
            -moz-box-shadow: 0px 0px 7px 0px rgba(221,221,221,1);
            box-shadow: 0px 0px 7px 0px rgba(221,221,221,1);">
                <div class="news__main-content">
                    <div class="news__main-content--head">
                        <h2><?=$bv_by_mabv["ten_bv"]?></h2>
                        <div class="is-divider small is-divider-news"></div>
                        <small>đăng lúc <?=$bv_by_mabv['ngay']?> tháng <?=$bv_by_mabv['thang']?>, 2021 bởi <?=$bv_by_mabv['ten_tk']?></small>
                        <img src="<?=$hp_by_mabv[0]['hinh_phu']?>" alt="">

                    </div>
                    <div class="news__main-content--body">
                        <p><?=$bv_by_mabv['noi_dung']?></p><br>
                        <div style="display:flex;column-gap: 60px;">
                        <img src="<?=$hp_by_mabv[1]['hinh_phu']?>" alt="" width="475px">
                        <img src="<?=$hp_by_mabv[2]['hinh_phu']?>" alt="" width="475px">
                        </div>
                    </div>
                    
                    <div class="news__main-content--footer">
                        
                            <div class=" news-content-writer">
                                <img src="<?=$bv_by_mabv["avatar"]?>" alt="avatar">
                            </div>
                            <div class=" news-content-writer--name">
                                <h3>NGƯỜI VIẾT</h3>
                            </div>
                    </div>
                    <div class="comment__content container" id="binhluan">
                        <h3 class="comment__content-title">Bình luận </h3>
                        <div class="comment__form">
    
                        <form action="\du_an_1\template-master\handle.php" method="post">
                            <div class="comment__form-comment">
                                <label class="comment__form-label">Bình luận của bạn<span>*</span></label>
                                <textarea class="comment__form-textarea" name="noi_dung" cols="45" rows="8" maxlength="300"></textarea>
                            </div>
                            <input type="hidden" name="ma_bv" value="<?=$ma_bv?>">
                            <div class="comment__form-submit">
                                <input type="submit" class="comment__form-submit--btn" value="Gửi đi" name="cmt_bv">
                            </div>
                            <?php if (isset($_COOKIE['ten_tk']) && isset($_COOKIE['mat_khau'])) {?>
                                <input type="hidden" name="ma_kh" value="<?=$data['ma_kh'] ?>"/>
                                <input type="hidden" name="ten_tk" value="<?=$data['ten_tk'] ?>"/>
                            <?php }elseif(isset($_SESSION['user'])) { ?>
                                <input type="hidden" name="ma_kh" value="<?=$_SESSION['user']['ma_kh']; ?>">
                                <input type="hidden" name="ten_tk" value="<?=$_SESSION['user']['ten_tk'];?>"/>
                            <?php } ?>
                            <?php if(isset($_SESSION['error_cmt'])){ ?>
                                <p class="profile__error"><?=$_SESSION['error_cmt']; unset($_SESSION['error_cmt']); ?></p>
                            <?php  }?>
                        </form>
                            <!-- Chưa đăng nhập hiện thông báo đăng nhập -->
                            <!-- <p class="profile__error">Bạn cần đăng nhập mới có thể bình luận.</p> -->
                        </div>
    
                        <div class="comment__users">
                            <?php foreach ($binh_luan as $cmt) {?>
                                <div class="comment__user">
                                <div class="comment__user-name">
                                    <div class="comment__user-avatar"><img src="<?=$cmt['avatar']?>" alt="avatar"></div>
                                    <?=$cmt['ten_kh']?><?=($cmt['vai_tro'] == 1) ? "(Admin)":""?>
                                    <span class="comment__user-date"><?=$cmt['ngay_bl'] ?></span>
                                </div>
                                <div class="comment__user-content"><?=$cmt['noi_dung'] ?></div>
                                </div>
                            <?php } ?>
                            <?php if (empty($cmt['noi_dung']) == true) { ?>
                                <div class="comment__user">
                                <div class="comment__user-content">
                                    nếu chưa có bình luận nào hiện ra đây.
                                    Hãy là người đầu tiên bình luận!
                                </div>
                            </div>
                            <?php } ?>
    
    
                        </div>
                    </div>
                </div>
               
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

                    <div class="new-lasted-news-content">
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