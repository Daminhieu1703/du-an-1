<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('them',$_REQUEST)) {
    $sql = "INSERT INTO slider(ten_slide,url_slide) VALUES(?,?)";
    $File_upload = $_FILES['url_slide'];
    //check thong tin
    if (empty($ten_slide) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location:/du_an_1/admin-template-master/4.slider/slider.php");
        die;
    }

    //check kieu du lieu
    if (strpos($File_upload['type'], 'image') === false) {
        $_SESSION['error_check'] = "Không phải file ảnh";
        header("Location:/du_an_1/admin-template-master/4.slider/slider.php");
        die;
    }else if($File_upload['size'] > 3000000) {
        $_SESSION['error_check'] = "Ảnh không được vượt quá 30MB";
        header("location: /du_an_1/admin-template-master/4.slider/slider.php");
        die;
    }

    $Store_path = "./img/";
    $File_name = $File_upload['name'];
    $path = $Store_path . $File_name;
    move_uploaded_file($File_upload['tmp_name'],$path);
    $url_slide = "/du_an_1/admin-template-master/4.slider/img/" . $File_name;

    pdo_query($sql,$ten_slide,$url_slide);
    header("location:/du_an_1/admin-template-master/4.slider/slider.php");
    die;
}if (array_key_exists('xoa',$_REQUEST)) {
    foreach ($check as $ma_slide) {
        $sql = "DELETE FROM slider WHERE ma_slide = ?";
        pdo_execute($sql,$ma_slide);
    }
    header("location:/du_an_1/admin-template-master/4.slider/slider.php");
    die;
} else if (isset($id)) {
    $sql = "DELETE FROM slider WHERE ma_slide = $id";
    pdo_execute($sql);
    header("location:/du_an_1/admin-template-master/4.slider/slider.php");
    die;
}

