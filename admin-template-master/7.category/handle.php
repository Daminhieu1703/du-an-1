<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('them',$_REQUEST)) {
    $sql = "INSERT INTO loai_hang(ten_loai) VALUES(?)";
    if (empty($ten_loai) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location:/du_an_1/admin-template-master/7.category/category.php");
        die;
    }
    pdo_query($sql,$ten_loai);
    header("location:/du_an_1/admin-template-master/7.category/category.php");
    die;
}elseif (array_key_exists('sua',$_REQUEST)) {
    $sql = "UPDATE loai_hang SET ten_loai = ? WHERE ma_loai = ?";
    if (empty($ten_loai) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("Location:/du_an_1/admin-template-master/7.category/update_category.php?ma_loai=".$ma_loai);
        die;
    }
    pdo_execute($sql,$ten_loai,$ma_loai);
    header("location:/du_an_1/admin-template-master/7.category/category.php");
    die;
}elseif(isset($_GET['id'])){
    $sql = "DELETE FROM loai_hang WHERE ma_loai = ?";
    $ma_loai = $_GET['id'];
    pdo_execute($sql,$ma_loai);
    header("location:/du_an_1/admin-template-master/7.category/category.php");
    die;
}elseif (array_key_exists('xoa',$_REQUEST)) {
    foreach ($check as $ma_loai) {
        $sql = "DELETE FROM loai_hang WHERE ma_loai = ?";
        pdo_execute($sql,$ma_loai);
    }
    header("location:/du_an_1/admin-template-master/7.category/category.php");
    die;
}
?>