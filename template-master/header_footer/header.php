<?php session_start();
require_once "./handle.php"; 
require_once "./../admin-template-master/pdo/pdo.php";
$loai_hang = select_lh_all();
?>
<header class="header header__product" id="header">
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
                        <!-- Form tìm kiếm -->
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