<?php
require_once "./handle.php";
$ma_kh = $_GET["ma_kh"];
$profile = select_kh_by_id($ma_kh);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
        <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico" />
        <link rel="manifest" href="./assets/favicon/site.webmanifest" />
        <!-- RECAPCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- css -->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
        <!-- aos js -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <!-- icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet" />
        <!-- ranger slider -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
        <title>Profile</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <nav class="breadcrumbs_category">
            <a href="index.html">Trang chủ</a>
            <span class="divider_category">/</span>Hồ sơ</nav>

        <section class="">
            <form method="post" action="\du_an_1\template-master\handle.php" enctype="multipart/form-data">
            <h1>Hồ sơ của <?= $profile['ten_tk']?> <?=($profile['vai_tro'] == 1) ? "(Admin)":""?></h1>
                <div class="profile__container">
                    <div class="profile__avatar">
                        <span class="small">Ảnh đại diện</span>
                        <input type="hidden" name="avatar"  value="<?= $profile['avatar']?>">
                        <img src="<?= $profile['avatar']?>" alt="avatar" />
                        <div class="upload-img-profile">
                            <input type="file" name="img"  class="inputfile" id="img-profile" style="display: none;">
                            <label for="img-profile"><i class="ri-edit-box-line" title="Thay đổi ảnh"></i><span></span></label>
                        </div>
                    </div>
                    <div class="profile__form">
                            <input type="hidden" autocomplete="off" name="vai_tro" value="<?=$profile['vai_tro']?>" />
                            <input type="hidden" autocomplete="off" name="ma_kh" value="<?= $profile['ma_kh']?>" />
                            <div class="profile__group">
                                <label class="profile__group-label">Họ tên</label>
                                <input type="text" name="ten_kh" autocomplete="off" value="<?= $profile['ten_kh']?>" />
                            </div>
                            <div class="profile__group">
                                <label class="profile__group-label">Số di động</label>
                                <input type="text" name="sdt" value="<?= $profile['sdt']?>" autocomplete="off" />
                            </div>
                            <div class="profile__group">
                                <label class="profile__group-label">Địa chỉ</label>
                                <input type="text" name="dia_chi" value="<?= $profile['dia_chi']?>" autocomplete="off" />
                            </div>
                            <div class="profile__group">
                                <label class="profile__group-label">Email</label>
                                <input type="email" name="email" value="<?= $profile['email']?>" autocomplete="off" />
                            </div>
                            <div class="profile__group" style="display: flex">
                                <p>Giới tính</p>
                                <div class="profile__radio">
                                    <label class="profile__group-label">
                                        <input type="radio" name="gioi_tinh" value="1" <?=($profile['gioi_tinh'] == 1) ? "checked" : ""?>/>Nam</label>
                                </div>
                                <div class="profile__radio">
                                    <label class="profile__group-label">
                                        <input type="radio" name="gioi_tinh" value="0" <?=($profile['gioi_tinh'] == 0) ? "checked" : ""?>/>Nữ</label>
                                </div>
                            </div>
                            <div class="profile__group">
                                <label class="profile__group-label">Mật khẩu</label>
                                <input type="password" name="mat_khau" id="password" value="<?=$profile['mat_khau']?>"
                                    autocomplete="off" />
                            </div>
                            <div style="padding-left: 17%"><input type="checkbox" class="me-1" onclick="showPassw()" />Hiển thị mật khẩu</div>
                            <br>
                            <div class="profile__group profile__btn">
                                <button type="submit" class="profile__update-btn" name="edit" onclick="return confirm('Cập nhật tài khoản?')">Cập nhật</button>
                            </div>
                            <?php if (isset($_SESSION['error_edit'])) { ?>
                                <div class="profile__error form__error"><?=$_SESSION['error_edit']; unset($_SESSION['error_edit']); ?></div>
                            <?php } ?>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <?php require "./header_footer/footer.php"; ?>
    <!-- Back to top -->
    <button class="back-to-top" id="back-to-top" title="Back to top">
        <i class="ri-arrow-up-s-fill"></i>
    </button>
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
        ScrollReveal().reveal(".product");
        ScrollReveal().reveal(".cart");
        ScrollReveal().reveal(".main_category");
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
                },
            });
            $("#amount").html(
                $("#slider-range").slider("values", 0) +
                "đ  - " +
                $("#slider-range").slider("values", 1) +
                "đ"
            );
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