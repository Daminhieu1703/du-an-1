<?php
require_once "./handle.php";
$total_all = 0;
$price_ship = 0;
$total_price_all = 0;
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
        <link rel="stylesheet" href="./assets/css/cart.css">
        <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
        <!-- aos js -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
        <!-- ranger slider -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <title>Giỏ hàng</title>
</head>
<body>
    <?php require "./header_footer/header.php"; ?>
    <main class="main">
        <?php if (isset($_SESSION['user']) || isset($_COOKIE['ten_tk']) && isset($_COOKIE['mat_khau'])) {
            if (isset($_SESSION['user'])) {
                $ma_kh = $_SESSION['user']['ma_kh'];
            }else {
                $ma_kh = $data['ma_kh'];
            }
            $cart = select_cart_by_ma_kh($ma_kh);?>
            <?php if (empty($cart) == false) {?>
                <section class="section cart">
                    <h1 style="margin-bottom: 1rem;">Giỏ hàng</h1>
            
                    <div class="shopping-cart">
                        <button class="remove-product remove-all">
                            <a style="color: white;" href="\du_an_1\template-master\handle.php?delete_all">Xóa giỏ hàng</a>
                        </button>
                        <div class="column-labels">
                            <label class="product-image">Image</label>
                            <label class="product-details">Product</label>
                            <label class="product-price">Giá</label>
                            <label class="product-quantity">Số lượng</label>
                            <label class="product-removal">Remove</label>
                            <label class="product-line-price">Tổng</label>
                        </div>
    
                        <form action="\du_an_1\template-master\payment.php" method="post">
                            <?php foreach ($cart as $data){ ?>
                                <input type="hidden" name="ma_kh" value="<?=$data['ma_kh']?>">
                                <?php $total_sp = $data['gia_sp'] * $data['so_luong']; $total_all += $total_sp;  ?>
                                    <div class="product">
                                        <div class="product-image">
                                            <img src="<?=$data['hinh_sp']?>">
                                        </div>
                                        <div class="product-details">
                                            <div class="product-title"><?=$data['ten_sp']?></div>
                                        </div>
                                        <div class="product-price"><?=number_format($data['gia_sp'],0,',','.')?></div>
                                        <div class="product-quantity"><?=$data['so_luong']?></div>
                                        <div class="product-removal">
                                            <button class="remove-product">
                                                <a style="color: white;" href="\du_an_1\template-master\handle.php?delete_only=<?=$data['ma_sp']?>">Xoá</a>
                                            </button>
                                        </div>
                                        <div class="product-line-price"><?= number_format($total_sp,0,',','.')?></div>
                                    </div>
                            <?php } ?>
                            <div class="totals">
                                <div class="totals-item">
                                    <label>Ước tính</label>
                                    <div class="totals-value" id="cart-subtotal"><?=number_format($total_all,0,',','.')?></div>
                                    <input type="hidden" name="uoc_tinh" value="<?=$total_all?>">
                                </div>
                                <div class="totals-item">
                                    <label>Shipping</label>
                                    <?php $price_ship = $total_all / 3000 ?>
                                    <div style="text-align: right;" id="cart-shipping"><?=number_format($price_ship,0,',','.')?>đ</div>
                                    <input type="hidden" name="tien_ship" value="<?=$price_ship?>">
                                </div>
                                <div class="totals-item totals-item-total">
                                    <label>Tổng cộng</label>
                                    <?php $total_price_all = $total_all + $price_ship ?>
                                    <div class="totals-value" id="cart-total"><?=number_format($total_price_all,0,',','.')?></div>
                                    <input type="hidden" name="tong_tien" value="<?=$total_price_all?>">
                                </div>
                                <button class="checkout" type="submit" name="thanh_toan">Thanh toán</button>
                                <a  href="./index.php" class="back-checkout checkout">Quay lại</a>    
                            </div>
                        </form>
                    </div> 
                </section>
            <?php } else { ?>
                <div class="empty-cart">
                    <img src="\du_an_1\template-master\assets\img\117-1170538_404-your-cart-is-empty.png" alt="">
                </div>
            <?php }?>
        <?php } elseif(!isset($_SESSION['user']) || !isset($_COOKIE['ten_tk']) && !isset($_COOKIE['mat_khau'])) {?>
            <div class="empty-cart">
                <img src="\du_an_1\template-master\assets\img\117-1170538_404-your-cart-is-empty.png" alt="">
            </div>
        <?php }?>
    </main>
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
                    $("#amount").html(ui.values[0] + "VNĐ  -" + ui.values[1] + "VNĐ");
                    $("#amount1").val(ui.values[0]);
                    $("#amount2").val(ui.values[1]);
                }
            });
            $("#amount").html($("#slider-range").slider("values", 0) +
                "VNĐ  - " + $("#slider-range").slider("values", 1) + "VNĐ");
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