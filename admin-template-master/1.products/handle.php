<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);

if(array_key_exists('them',$_REQUEST)){
    $sql = "INSERT INTO san_pham(ten_sp,so_luong,gia_sp,gia_km,hinh_sp,mo_ta,ma_loai,ngay_nhap) VALUES(?,?,?,?,?,?,?,?)";
    $File_upload = $_FILES['hinh_sp'];
    $ngay_nhap = date("Y-m-d");

    if (empty($ten_sp) == true || empty($so_luong) == true || empty($gia_sp) == true || empty($gia_km) == true || empty($mo_ta) == true || empty($ma_loai) == true || empty($ngay_nhap) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location: /du_an_1/admin-template-master/1.products/products.php");
        die;
    }

    if (strpos($File_upload['type'], 'image') === false) {
        $_SESSION['error_check'] = "Không phải file ảnh";
        header("Location:/du_an_1/admin-template-master/1.products/products.php");
        die;
    }else if($File_upload['size'] > 3000000) {
        $_SESSION['error_check'] = "Ảnh không được vượt quá 30MB";
        header("location: /du_an_1/admin-template-master/1.products/products.php");
        die;
    }

    $Store_path = "./img/";
    $File_name = $File_upload['name'];
    $path = $Store_path . $File_name;
    move_uploaded_file($File_upload['tmp_name'],$path);
    $hinh_sp = "/du_an_1/admin-template-master/1.products/img/" . $File_name;
    pdo_query($sql,$ten_sp,$so_luong,$gia_sp,$gia_km,$hinh_sp,$mo_ta,$ma_loai,$ngay_nhap);
    header("Location:/du_an_1/admin-template-master/1.products/products.php");
    die;
}
elseif(array_key_exists('sua',$_REQUEST)){
    $sql = "UPDATE san_pham SET ten_sp = ?,so_luong = ?,gia_sp = ?,gia_km = ?,hinh_sp = ?,mo_ta = ?,ma_loai = ?,ngay_sua = ? WHERE ma_sp = ?";
    $File_upload = $_FILES['img'];
    $ngay_sua = date("Y-m-d");

    if (empty($ten_sp) == true || empty($so_luong) == true || empty($gia_sp) == true || empty($gia_km) == true || empty($mo_ta) == true || empty($ma_loai) == true || empty($ngay_sua) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location: /du_an_1/admin-template-master/1.products/update_product.php?ma_sp=".$ma_sp);
        die;
    }

    if($File_upload['size'] > 0){
        
        if (strpos($File_upload['type'], 'image') === false) {
            $_SESSION['error_check'] = "Không phải file ảnh";
            header("Location:/du_an_1/admin-template-master/1.products/update_product.php");
            die;
        }else if($File_upload['size'] > 3000000) {
            $_SESSION['error_check'] = "Ảnh không được vượt quá 30MB";
            header("location: /du_an_1/admin-template-master/1.products/update_product.php");
            die;
        }

        $Store_path = "./img/";
        $File_name = $File_upload['name'];
        $path = $Store_path . $File_name;
        move_uploaded_file($File_upload['tmp_name'],$path);
        $hinh_sp = "/du_an_1/admin-template-master/1.products/img/" . $File_name;
    }
    pdo_execute($sql,$ten_sp,$so_luong,$gia_sp,$gia_km,$hinh_sp,$mo_ta,$ma_loai,$ngay_sua,$ma_sp);
    header("Location:/du_an_1/admin-template-master/1.products/products.php");
    die;
}
elseif(isset($id)){
    $sql = "DELETE FROM san_pham WHERE ma_sp = $id";
    pdo_execute($sql);
    header("Location:/du_an_1/admin-template-master/1.products/products.php");
    die;
}
elseif(array_key_exists('xoa',$_REQUEST)){
    foreach ($check as $ma_sp) {
        $sql = "DELETE FROM san_pham WHERE ma_sp = ?";
        pdo_execute($sql,$ma_sp);
    }
    header("Location:/du_an_1/admin-template-master/1.products/products.php");
    die;
}