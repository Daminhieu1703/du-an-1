<?php
require_once "./../admin-template-master/pdo/pdo.php";
require_once "./handle.php";
$ma_sp = $_GET["ma_sp"];
$san_pham_id = select_sp_where_ma_sp($ma_sp);
$binh_luan = select_cmt_by_sp($ma_sp);
$luot_xem = update_luot_xem_by_masp($ma_sp);
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
        <title>Trang chi tiết sản phẩm</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main" id="main">
        <section class="section product" style="padding-top: 1.5rem;">

            <div class="product__container container product_page">
                <div class="product__content">
                    <div class="product__img">
                        <img src="<?=$san_pham_id['hinh_sp']?>" alt=""
                            class="product__img" width="100%">
                    </div>
                    <div class="product__info">
                        <nav class="breadcrumbs">
                            <a href="./index.php">Trang chủ</a>
                            <span class="divider">/</span>
                            <a href=""><?=$san_pham_id['ten_sp']?> - <?=$san_pham_id['ten_loai']?></a>
                        </nav>
                        <h2 class="product__name"><?=$san_pham_id['ten_sp']?></h2>
                        <div class="is-divider"></div>
                        <h2 class="product__price product__price-page">
                            <del><span class="product-page__price-sale"><?=number_format($san_pham_id['gia_sp'],0,',','.')?>VNĐ</span></del>
                            <?=number_format($san_pham_id['gia_km'],0,',','.')?>VNĐ
                        </h2>
                        <p class="product__description"><?=$san_pham_id['mo_ta']?></p>

                        <div class="add-to-cart__form">
                            <form action="\du_an_1\template-master\cart.php" method="post">
                                <div class="quantity__input">
                                    <label>Số lượng:</label>
                                    <input type="number" name="so_luong_mua" min="1" max="50" value="1">
                                    <input type="hidden" name="ma_sp" value="<?=$san_pham_id['ma_sp']?>">
                                </div>
                                <div class="form__div">
                                    <!-- Hết hàng thêm thuộc tính disabled -->
                                    <button class="btn__add" type="submit" <?=($san_pham_id['so_luong'] < 1) ? "disabled":""?> name="add_cart">THÊM VÀO GIỎ </button>
                                </div>
                            </form>
                        </div>

                        <div class="product__span">
                            <span class=product__ma-sp> Mã sản phẩm: <?=$san_pham_id['ma_sp']?></span> <br>
                            <span class="product__category"> <i class="ri-eye-line" style="vertical-align: middle;"></i> Lượt xem: <?=$san_pham_id['so_luot_xem']?></span> <br>
                            <span class=product__ma-sp> Loại hàng: <?=$san_pham_id['ten_loai']?></span> <br>
                            <span class=product__ma-sp> Số lượng: <?=$san_pham_id['so_luong']?></span>
                        </div><br>
                        <?php if (isset($_SESSION['error_cart'])) { ?>
                            <p class="profile__error"><?=$_SESSION['error_cart']; unset($_SESSION['error_cart']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="included__container" id="binhluan">

            <!-- TAB Comment, thong so, bao hanh -->
            <div class="tab tab__container">
                <button class="tablinks" onclick="openCity(event, 'comment__container')" id="defaultOpen">bình luận</button>
                <button class="tablinks" onclick="openCity(event, 'subinfo__container')">thông tin bổ sung</button>
                <button class="tablinks" onclick="openCity(event, 'policy__container')">chính sách bảo hành</button>
            </div>

            <!-- comment container -->
            <section class="section comment__container tabcontent " id="comment__container">

                <div class="comment__content container">
                    <h3 class="comment__content-title" >Bình luận "<?=$san_pham_id['ten_sp']?>" </h3>
                    <div class="comment__form">

                        <form action="\du_an_1\template-master\handle.php" method="post">
                            <div class="comment__form-comment">
                                <label class="comment__form-label">Bình luận của bạn<span>*</span></label>
                                <textarea class="comment__form-textarea" name="noi_dung" cols="45" rows="8" maxlength="300"></textarea>
                            </div>
                            <input type="hidden" name="ma_sp" value="<?=$san_pham_id['ma_sp'] ?>">
                            <div class="comment__form-submit">
                                <input type="submit" class="comment__form-submit--btn" value="Gửi đi" name="cmt">
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
            </section>

            <!-- thong so Section -->

            <section class="section comment__container tabcontent active" id="subinfo__container"
                style="display: block;">

                <div class="comment__content container more__info-container">
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">bộ máy và năng lượng</h3>
                        <p class="more__info-text">Pin (Quartz)</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">chất liệu dây</h3>
                        <p class="more__info-text">Dây Da</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">chất liệu mặt kính</h3>
                        <p class="more__info-text">kính cứng</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">giới tính</h3>
                        <p class="more__info-text">Nam</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">kích thước mặt số</h3>
                        <p class="more__info-text">> 44mm</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">màu mặt số</h3>
                        <p class="more__info-text">Đen</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">mức chống nước</h3>
                        <p class="more__info-text">Đi Mưa Nhỏ (3 ATM)</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">thương hiệu</h3>
                        <p class="more__info-text">Casio</p>
                    </div>
                    <div class="comment__form more__info-content ">
                        <h3 class="more__info-title">xuất xứ</h3>
                        <p class="more__info-text">nhật bản</p>
                    </div>

                </div>
            </section>
            

            <!-- policy container -->
            <section class="section comment__container tabcontent " id="policy__container">
                <div class="comment__content container more__info-container">
                    <div class="comment__form more__info-content policy-content " style="display:block;">
                        <h3 class="more__info-title">Chính sách bảo hành của riêng mỗi hãng:</h3>
                        <h3 class="more__info-title">CASIO: Bảo hành chính hãng máy 1 năm, pin 1,5 năm</h3>
                        <h3 class="more__info-title">CITIZEN: Bảo hành chính hãng toàn cầu máy 1 năm, pin 1 năm </h3>
                        <h3 class="more__info-title">SEIKO: Bảo hành chính hãng toàn cầu máy 1 năm, pin 1 năm</h3>
                    </div>


                </div>
            </section>
        </div>


        <!--  Relative Products-->
        <section class="section related_product">
            <h2 class="section__title related_title">SẢN PHẨM CÙNG LOẠI</h2>

            <div class="product__container container product__container-related">
                <?php
                $ma_loai = $san_pham_id['ma_loai'];
                $ma_sp = $san_pham_id['ma_sp'];
                $cung_loai = sp_cung_loai( $ma_loai,$ma_sp);
                foreach ($cung_loai as $data) { ?>
                    <div class="product__card product__cart-related">
                    <div class="product__img">
                        <a href="./product_page.php?ma_sp=<?=$data['ma_sp']?>">
                            <img src="<?=$data['hinh_sp']?>" loading="lazy">
                        </a>
                    </div>
                    <div class="product__title product__title-related">
                        <a href="./product_page.php?id=<?php echo $productSame[$i]['id'];?>"><?=$data['ten_sp']?></a>
                    </div>
                    <div class="product__price " style="margin-bottom: .25rem;">Giá: <?=number_format($data['gia_km'],0,',','.')?>VNĐ</div>
                    <?php if ($data['so_luong'] < 1) {?>
                        <div class="sold_out">Hết hàng</div>
                    <?php } ?>
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