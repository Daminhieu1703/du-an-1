<?php session_start();?>
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
    <title>Quên mật khẩu</title>
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
      .right-log {
        right: 50px !important;
      }

      .login-show {
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
        border-radius: 2px;
        float: right;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
      }
      .login-show a {
        display: inline-block;
        padding: 10px 0;
      }

      a {
        text-decoration: none;
        color: #2c7715;
      }

      

    </style>
  </head>
  <body>
    <div class="login-reg-panel">

      <div class="white-panel">
        <div class="login-show">
            <form action="\du_an_1\template-master\handle.php" method="post">
                <h2>QUÊN MẬT KHẨU</h2>
                <label for="">Nhập email để lấy lại mật khẩu</label>
                <input type="text" placeholder="Email" name="email"/>
                <!-- <p>Vui lòng kiểm tra email!</p>
                <p>Email không tồn tại</p> -->
                <?php if (isset($_SESSION['error_pass'])) { ?>
                  <p><?=$_SESSION['error_pass']; unset($_SESSION['error_pass']);?></p>
                <?php } ?>
                <input type="submit" value="GỬI" name="send_mail"/>
                <a href="./login.php">Đăng nhập</a> <br>
                <a href="./index.php">Trang chủ</a>

            </form>
        </div>
        
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function () {
      $(".login-info-box").fadeOut();
      $(".login-show").addClass("show-log-panel");
    });

    $('.login-reg-panel input[type="radio"]').on("change", function () {
      if ($("#log-login-show").is(":checked")) {
        $(".register-info-box").fadeOut();
        $(".login-info-box").fadeIn();

        $(".white-panel").addClass("right-log");
        $(".register-show").addClass("show-log-panel");
        $(".login-show").removeClass("show-log-panel");
      } else if ($("#log-reg-show").is(":checked")) {
        $(".register-info-box").fadeIn();
        $(".login-info-box").fadeOut();

        $(".white-panel").removeClass("right-log");

        $(".login-show").addClass("show-log-panel");
        $(".register-show").removeClass("show-log-panel");
      } else if ($("#forget-password").is(":checked")) {
        $(".register-info-box").fadeIn();
        $(".login-info-box").fadeOut();

        $(".white-panel").removeClass("right-log");

        $(".login-show").addClass("show-log-panel");
        $(".register-show").removeClass("show-log-panel");
      }
    });
  </script>
</html>
