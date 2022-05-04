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
        <title>Liên hệ</title>
    </head>
</head>

<body>
    <?php require "./header_footer/header.php"; ?>
    <div class="main main_category">
        <nav class="breadcrumbs_category">
            <a href="index.php">Trang chủ</a>
            <span class="divider_category">/</span>
            Liên hệ
        </nav>

        <div class="description__container contact__container">
            <div class="contact__form-container">
                <div class="description__container-title contact__container-title">
                    <span class="sidebar-title" style="margin-bottom: 0;">Liên hệ với chúng tôi</span>
                    <small class="sidebar-small">Để liên hệ với SHOP, vui lòng điền vào mẫu dưới đây</small>
                            <div class="is-divider small "></div>
                </div>

                <div class="contact__content">
                    <div class="contact__form">
                        <form action="\du_an_1\admin-template-master\10.contact\handle.php" method="post">
                            <input type="text" placeholder="Họ tên ... " required name="ho_ten">
                            <input type="email" placeholder="Email ..." required name="email">
                            <input type="text" placeholder="Tiêu đề ..." required name="tieu_de">
                            <textarea id="" cols="15" rows="7" placeholder="Tin nhắn ..." name="noi_dung" required></textarea>
                            <div class="g-recaptcha brochure__form__captcha mb-3" data-sitekey="6LeHGo0cAAAAAGxI8kZ4X7f-WFCS18jpn9Zepxjt"></div>
                            <button type="submit" name="contact">gửi tin nhắn</button>
                        </form>
                        <?php if (isset($_SESSION['error_lh'])) { ?>
                                <div class="profile__error form__error" style="color:green;"><?=$_SESSION['error_lh']; unset($_SESSION['error_lh']); ?></div>
                            <?php } ?>
                    </div>

                    <div class="contact__address">
                        <div>
                            <h4>Địa chỉ</h4>
                            <p>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
                            <h4>Hotline</h4>
                            <p>+0342770723</p>
                        </div>
                        <div>
                            <h4>Maps</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863981044334!2d105.74459841476343!3d21.03812778599329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1636441001741!5m2!1svi!2s" width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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