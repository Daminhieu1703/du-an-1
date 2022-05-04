<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Đăng nhập</title>
    <style>
      @import url("https://fonts.googleapis.com/css?family=Mukta");
      body {
        font-family: "Mukta", sans-serif;
        height: 110vh;
        min-height: 550px;
        /* background-image: url(https://images.unsplash.com/photo-1518131672697-613becd4fab5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80); */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
      }
      a {
        text-decoration: none;
        color: #444444;
      }
      .login-reg-panel {
        position: relative;
        top: 40%;
        transform: translateY(-50%);
        text-align: center;
        width: 70%;
        right: 0;
        left: 0;
        margin: auto auto;
        height: 400px;
        background-color: rgba(221, 95, 22, 0.986);
        background-image: url(https://images.unsplash.com/photo-1518131672697-613becd4fab5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80);
        background-position: center center;
      }
      .white-panel {
        background-color: rgba(255, 255, 255, 1);
        min-height: 500px;
        position: absolute;
        top: -50px;
        width: 50%;
        right: calc(50% - 50px);
        transition: 0.3s ease-in-out;
        z-index: 0;
        box-shadow: 0 0 15px 9px #00000096;
      }
      .login-reg-panel input[type="radio"] {
        position: relative;
        display: none;
      }
      .login-reg-panel {
        color: #b8b8b8;
      }
      .login-reg-panel #label-login,
      .login-reg-panel #label-register {
        border: 1px solid #9e9e9e;
        padding: 5px 5px;
        width: 150px;
        display: block;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
      }
      .login-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        left: 0;
        position: absolute;
        text-align: left;
        color: #000;
      }
      .register-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        right: 0;
        position: absolute;
        text-align: left;
        color: #000;
      }
      .right-log {
        right: 50px !important;
      }

      .login-show,
      .register-show {
        z-index: 1;
        display: none;
        opacity: 0;
        transition: 0.3s ease-in-out;
        color: #242424;
        text-align: left;
        padding: 50px;
      }

      .show-log-panel {
        display: block;
        opacity: 0.9;
      }
      .login-show input[type="text"],
      .login-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
      }
      .login-show input[type="submit"] {
        max-width: 150px;
        width: 100%;
        background: #444444;
        color: #f9f9f9;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
      }
      .login-show a {
        display: inline-block;
        padding: 10px 0;
      }

      .register-show input[type="text"],
      .register-show input[type="email"],
      .register-show input[type="number"],
      .register-show input[type="password"],
      .register-show select {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
      }
      .register-show input[type="submit"] {
        max-width: 150px;
        width: 100%;
        background: #444444;
        color: #f9f9f9;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
      }

      .credit {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: #3b3b25;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        z-index: 99;
      }
      a {
        text-decoration: none;
        color: #2c7715;
      }

      .register-item {
        display: inline-flex;
        column-gap: 1rem;
        width: 100%;
      }

      .mt-4 {
        padding-top: 5rem;
        width: 100%;
        height: 100px;
        background: none;
      }

      .error-register {
        color: crimson;
      }
    </style>
  </head>
  <body>
    <div class="login-reg-panel">
      <div class="login-info-box">
        <h2>Đã có tài khoản?</h2>
        <p>Nếu bạn có tài khoản rồi thì nhấn vào đây để đăng nhập</p>
        <label id="label-register" for="log-reg-show">Đăng nhập</label>
        <input type="radio"  name="active-log-panel" id="log-reg-show" checked="checked"/>
      </div>

      <div class="register-info-box">
        <h2>Chưa có tài khoản?</h2>
        <p>Nếu bạn chưa có tài khoản thì nhấn vào đây để đăng ký</p>
        <label id="label-login" for="log-login-show">Đăng ký</label>
        <input type="radio" name="active-log-panel" id="log-login-show" />
      </div>

      <div class="white-panel">
        <div class="login-show">
            <form action="\du_an_1\template-master\handle.php">
                <h2>ĐĂNG NHẬP</h2>
                <input type="text" placeholder="Tài khoản" name="ten_tk"/>
                <input type="password" placeholder="Mật khẩu" name="mat_khau"/>
                <input type="submit" value="Đăng nhập" name="login"/>
                <div>
                  <input type="checkbox" id="vehicle1" name="ghi_nho" value="Bike">
                  <label for="vehicle1">Bạn có muốn lưu tài khoản ?</label><br>
                </div>
                <a href="./forgot-password-form.php">Quên mật khẩu</a> <br>
                <a href="./index.php">Trang chủ</a>
                <?php if (isset($_SESSION["error"])) { ?>
                  <div class="mb-3 fw-bold text-center text-danger">
                    <?=$_SESSION["error"]; unset($_SESSION["error"]) ?>
                  </div>
            <?php } ?>
            </form>
        </div>
        <div class="register-show" id="register-show">
            <form action="\du_an_1\template-master\handle.php" method="post" enctype="multipart/form-data">
                <h2>ĐĂNG KÝ</h2>
                <input type="text" placeholder="Họ và tên" name="ten_kh"/>
                <input type="file" name="img"/>
                <input type="hidden" name="avatar" value="/du_an_1/template-master/assets/img/profile.png">
                <div class="register-item">
                  <input type="text" placeholder="Tên đăng nhập" name="ten_tk"/>
                  <input type="email" placeholder="Email" name="email"/>
                </div>
                <div class="register-item">
                  <input type="number" placeholder="Di động" name="sdt"/>
                  <input type="text" placeholder="Địa chỉ" name="dia_chi"/>
                </div>
                <div>
                  <select name="gioi_tinh" id="">
                    <option value="" selected disabled>Giới tính</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                  </select>
                </div>
                <div class="register-item">
                  <input type="password" placeholder="Mật khẩu" name="mat_khau"/>
                  <input type="password" placeholder="Xác nhận mật khẩu" name="again_mk"/>
                </div>
                <div>
                <?php if (isset($_SESSION["error_register"])) { ?>
                  <p class="error-register" id="error"><?=$_SESSION["error_register"]; unset($_SESSION["error_register"]) ?></p>
                <?php } ?>
                </div>
                <input type="submit" value="Đăng ký" name="register"/>
            </form>
        </div>
      </div>
    </div>
  </body>
  <script>
   $(document).ready(function () {
      if ($('#error').hasClass("error-register")) {
        $(".register-info-box").fadeOut();
        $(".login-info-box").fadeIn();

        $(".white-panel").addClass("right-log");
        $(".register-show").addClass("show-log-panel");
        $(".login-show").removeClass("show-log-panel");
      }
      else {
        $(".login-info-box").fadeOut();
        $(".login-show").addClass("show-log-panel");

      }
    });

    $( "#log-reg-show" ).click(function() {
      $(".register-info-box").fadeIn();
        $(".login-info-box").fadeOut();

        $(".white-panel").removeClass("right-log");

        $(".login-show").addClass("show-log-panel");
        $(".register-show").removeClass("show-log-panel");
    });

    $( "#log-login-show" ).click(function() {
      $(".register-info-box").fadeOut();
        $(".login-info-box").fadeIn();

        $(".white-panel").addClass("right-log");
        $(".register-show").addClass("show-log-panel");
        $(".login-show").removeClass("show-log-panel");
    });

  </script>
  </script>
</html>
