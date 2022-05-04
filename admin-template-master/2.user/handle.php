<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('them',$_REQUEST)) {
    $sql = "INSERT INTO khach_hang(ten_kh, avatar, sdt, gioi_tinh, email, dia_chi, ten_tk, mat_khau, vai_tro) VALUES(?,?,?,?,?,?,?,?,?)";
    $fileUpload = $_FILES['avatar'];
    if (strpos($fileUpload['type'], 'image') === false) {
        $_SESSION['error_check'] = "Không phải file ảnh";
        header("location: /du_an_1/admin-template-master/2.user\users.php");
        die;
    }else if($fileUpload['size'] > 3000000) {
        $_SESSION['error_check'] = "Ảnh không được vượt quá 30MB";
        header("location: /du_an_1/admin-template-master/2.user\users.php");
        die;
    }
    $storePath = './img/';
    $fileName = $fileUpload['name'];
    $path = $storePath . $fileName;
    move_uploaded_file($fileUpload['tmp_name'], $path);
    $avatar = '/du_an_1/admin-template-master/2.user/img/' . $fileName;
    if (empty($ten_kh) == true || empty($sdt) == true || empty($email) == true || empty($dia_chi) == true || empty($ten_tk) == true || empty($mat_khau) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location: /du_an_1/admin-template-master/2.user\users.php");
        die;
    }
    pdo_execute($sql,$ten_kh, $avatar, $sdt, $gioi_tinh, $email, $dia_chi, $ten_tk, $mat_khau, $vai_tro);
    header("location: /du_an_1/admin-template-master/2.user\users.php");
}else if (array_key_exists('sua',$_REQUEST)) {
    $sql = "UPDATE khach_hang SET ten_kh = ?, avatar = ?, sdt = ?, gioi_tinh = ?, email = ?, dia_chi = ?, ten_tk = ?, mat_khau = ?, vai_tro = ?, kich_hoat = ? WHERE ma_kh = ?";
    $fileUpload = $_FILES['img'];
    if ($fileUpload['size'] > 0) {
        if (strpos($fileUpload['type'], 'image') === false) {
            $_SESSION['error_check'] = "Không phải file ảnh";
            header("location: /du_an_1/admin-template-master/2.user/update_user.php?ma_kh=".$ma_kh);
            die;
        }else if($fileUpload['size'] > 3000000) {
            $_SESSION['error_check'] = "Ảnh không được vượt quá 30MB";
            header("location: /du_an_1/admin-template-master/2.user/update_user.php?ma_kh=".$ma_kh);
            die;
        }
        $storePath = './img/';
        $fileName = $fileUpload['name'];
        $path = $storePath . $fileName;
        move_uploaded_file($fileUpload['tmp_name'], $path);
        $avatar = '/du_an_1/admin-template-master/2.user/img/' . $fileName;
    }
    if (empty($ten_kh) == true || empty($sdt) == true || empty($email) == true || empty($dia_chi) == true || empty($ten_tk) == true || empty($mat_khau) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location: /du_an_1/admin-template-master/2.user/update_user.php?ma_kh=".$ma_kh);
        die;
    }
    pdo_execute($sql,$ten_kh, $avatar, $sdt, $gioi_tinh, $email, $dia_chi, $ten_tk, $mat_khau, $vai_tro, $kich_hoat, $ma_kh);
    header("location: /du_an_1/admin-template-master/2.user\users.php");
}else if (isset($id)){
    // $sql1 = "DELETE FROM gio_hang WHERE ma_kh = $ma_kh";
    // $sql2 = "DELETE FROM binh_luan WHERE ma_kh = $ma_kh";
    $sql3 = "DELETE FROM khach_hang WHERE ma_kh = $id";
    // pdo_execute($sql1);
    // pdo_execute($sql2);
    pdo_execute($sql3);
    header("location: /du_an_1/admin-template-master/2.user\users.php");
}elseif (array_key_exists('xoa',$_REQUEST)) {
    foreach ($check as $ma_kh) {
        $sql = "DELETE FROM khach_hang WHERE ma_kh = ?";
        pdo_execute($sql,$ma_kh);
    }
    header("location: /du_an_1/admin-template-master/2.user\users.php");
    die;
}
?>