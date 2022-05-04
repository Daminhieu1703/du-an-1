<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if(array_key_exists('them',$_REQUEST)){
    $sql = "INSERT INTO bai_viet(ma_kh,ten_bv,noi_dung,hinh_chinh,ngay_tao) VALUES(?,?,?,?,?)";
    $File_upload = $_FILES['hinh_chinh'];
    $ngay_tao = date("Y-m-d");

    if (empty($ten_bv) == true || empty($noi_dung) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("Location:\du_an_1\admin-template-master\9.status\status.php");
        die;
    }

    if (strpos($File_upload['type'], 'image') === false) {
        $_SESSION['error_check'] = "Ảnh chính không phải file ảnh";
        header("Location:\du_an_1\admin-template-master\9.status\status.php");
        die;
    }else if($File_upload['size'] > 3000000) {
        $_SESSION['error_check'] = "Ảnh chính không được vượt quá 30MB";
        header("Location:\du_an_1\admin-template-master\9.status\status.php");
        die;
    }
    $Store_path = "./img/";
    $File_name = $File_upload['name'];
    $path = $Store_path . $File_name;
    move_uploaded_file($File_upload['tmp_name'],$path);
    $hinh_chinh = "/du_an_1/admin-template-master/9.status/img/" . $File_name;
    pdo_execute($sql,$ma_kh,$ten_bv,$noi_dung,$hinh_chinh,$ngay_tao);
    $sql3 = "SELECT MAX(ma_bv) as ma_bv FROM bai_viet";
    $data = pdo_query_one($sql3);
    $sql2 = "INSERT INTO hinh_phu_bv(ma_bv,hinh_phu) VALUES(?,?)";
    $File_upload_2 = $_FILES['hinh_phu'];
    // foreach ($File_upload_2 as $key => $value) {
    //     if (strpos($value['type'][$key], 'image') === false) {
    //         $_SESSION['error_check'] = "Ảnh phụ không phải file ảnh";
    //         header("Location:\du_an_1\admin-template-master\9.status\status.php");
    //         die;
    //     }
    // }
    // if($File_upload_2['size'] > 3000000) {
    //     $_SESSION['error_check'] = "Ảnh phụ không được vượt quá 30MB";
    //     header("Location:\du_an_1\admin-template-master\9.status\status.php");
    //     die;
    // }
    $Store_path_2 = "./image/";
    $File_name_2 = $File_upload_2['name'];
    foreach ($File_name_2 as $key => $value) {
        move_uploaded_file($File_upload_2['tmp_name'][$key],$Store_path_2 . $value);
        $path = "/du_an_1/admin-template-master/9.status/image/" . $value;
        pdo_execute($sql2,$data['ma_bv'],$path);
    } 
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
}elseif (array_key_exists('xoa',$_REQUEST)) {
    if (isset($check)) {
        foreach ($check as $ma_bv) {
            $sql = "DELETE FROM bai_viet WHERE ma_bv = ?";
            pdo_execute($sql,$ma_bv);
        }
    }
    if (isset($check_hinh_anh)) {
        foreach ($check_hinh_anh as $ma_hinh_phu) {
            $sql = "DELETE FROM hinh_phu_bv WHERE ma_hinh_phu_bv = ?";
            pdo_execute($sql,$ma_hinh_phu);
        }
    }
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
}elseif (array_key_exists('sua_bv',$_REQUEST)) {
    $sql = "UPDATE bai_viet SET ma_kh = ?,ten_bv = ?,noi_dung = ?,hinh_chinh = ?,ngay_sua = ? WHERE ma_bv = ?";
    $File_upload = $_FILES['img'];
    $ngay_sua = date("Y-m-d");

    if (empty($ten_bv) == true || empty($noi_dung) == true) {
        $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("Location:\du_an_1\admin-template-master\9.status\update_status.php");
        die;
    }
    if ($File_upload['size'] > 0) {
        if (strpos($File_upload['type'], 'image') === false) {
            $_SESSION['error_check'] = "Ảnh chính không phải file ảnh";
            header("Location:\du_an_1\admin-template-master\9.status\update_status.php");
            die;
        }else if($File_upload['size'] > 3000000) {
            $_SESSION['error_check'] = "Ảnh chính không được vượt quá 30MB";
            header("Location:\du_an_1\admin-template-master\9.status\update_status.php");
            die;
        }
        $Store_path = "./img/";
        $File_name = $File_upload['name'];
        $path = $Store_path . $File_name;
        move_uploaded_file($File_upload['tmp_name'],$path);
        $hinh_chinh = "/du_an_1/admin-template-master/9.status/img/" . $File_name;
    }
    pdo_execute($sql,$ma_kh,$ten_bv,$noi_dung,$hinh_chinh,$ngay_sua,$ma_bv);
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
    die;
}elseif (array_key_exists('sua_hp',$_REQUEST)) {
    $sql = "UPDATE hinh_phu_bv SET ma_bv = ?, hinh_phu = ? WHERE ma_hinh_phu_bv = ?";
    $File_upload = $_FILES['img'];
    if ($File_upload['size'] > 0) {
        if (strpos($File_upload['type'], 'image') === false) {
            $_SESSION['error_check'] = "Ảnh chính không phải file ảnh";
            header("Location:\du_an_1\admin-template-master\9.status\update_hp.php");
            die;
        }else if($File_upload['size'] > 3000000) {
            $_SESSION['error_check'] = "Ảnh chính không được vượt quá 30MB";
            header("Location:\du_an_1\admin-template-master\9.status\update_hp.php");
            die;
        }
        $Store_path = "./img/";
        $File_name = $File_upload['name'];
        $path = $Store_path . $File_name;
        move_uploaded_file($File_upload['tmp_name'],$path);
        $hinh_phu = "/du_an_1/admin-template-master/9.status/image/" . $File_name;
    }
    pdo_execute($sql,$ma_bv,$hinh_phu,$ma_hinh_phu_bv);
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
    die;
}elseif (array_key_exists('ma_bv',$_REQUEST)) {
    $sql = "DELETE FROM bai_viet WHERE ma_bv = ?";
    pdo_execute($sql,$ma_bv);
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
}elseif (array_key_exists('ma_hp',$_REQUEST)) {
    $sql = "DELETE FROM hinh_phu_bv WHERE ma_hinh_phu_bv = ?";
    pdo_execute($sql,$ma_hp);
    header("Location:\du_an_1\admin-template-master\9.status\status.php");
}
?>