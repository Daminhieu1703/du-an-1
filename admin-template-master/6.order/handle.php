<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('sua',$_REQUEST)) {
    $sql = "UPDATE don_hang SET trang_thai = $trang_thai";
    pdo_execute($sql);
    header("Location:/du_an_1/admin-template-master/6.order/orders.php");
    die;
}elseif (array_key_exists('ma_dh',$_REQUEST)) {
   $sql = "DELETE FROM don_hang WHERE ma_dh = $ma_dh";
   $sql1 = "SELECT * FROM ct_don_hang WHERE ma_dh = $ma_dh";
    $ct_don_hang = pdo_query($sql1);
    foreach ($ct_don_hang as $value) {
        $sql_sp = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
        pdo_execute($sql_sp,$value['so_luong'], $value['ma_sp']);
    }
   pdo_execute($sql);
   header("Location:/du_an_1/admin-template-master/6.order/orders.php");
   die;
}elseif (array_key_exists('xoa_het_dh',$_REQUEST)) {
    foreach ($check as $ma_dh) {
        $sql1 = "SELECT * FROM ct_don_hang WHERE ma_dh = ?";
        $ct_don_hang = pdo_query($sql1,$ma_dh);
        foreach ($ct_don_hang as $value) {
            $sql_sp = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
            pdo_execute($sql_sp,$value['so_luong'], $value['ma_sp']);
        }
        $sql = "DELETE FROM don_hang WHERE ma_dh = ?";
        pdo_execute($sql,$ma_dh);
    }
    header("Location:/du_an_1/admin-template-master/6.order/orders.php");
    die;
}elseif (array_key_exists('ma_ct_dh',$_REQUEST)) {
    $sql1 = "SELECT * FROM ct_don_hang WHERE ma_ct_dh = ?";
    $ct_don_hang = pdo_query_one($sql1,$ma_ct_dh);
    $sql_sp = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
    pdo_execute($sql_sp,$ct_don_hang['so_luong'], $ct_don_hang['ma_sp']);
    $sql = "DELETE FROM ct_don_hang WHERE ma_ct_dh = $ma_ct_dh";
    pdo_execute($sql);
    header("Location:/du_an_1/admin-template-master/6.order/ct_order.php?ma_dh=".$ma_dh_only);
    die;
}elseif (array_key_exists('xoa_het_ct_dh',$_REQUEST)) {
    foreach ($check_ct as $ma_ct_dh) {
        $sql1 = "SELECT * FROM ct_don_hang WHERE ma_ct_dh = ?";
        $ct_don_hang = pdo_query_one($sql1,$ma_ct_dh);
        $sql_sp = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
        pdo_execute($sql_sp,$ct_don_hang['so_luong'], $ct_don_hang['ma_sp']);
        $sql = "DELETE FROM ct_don_hang WHERE ma_ct_dh = ?";
        pdo_execute($sql,$ma_ct_dh);
    }
    header("Location:/du_an_1/admin-template-master/6.order/ct_order.php?ma_dh=".$ma_dh_only);
    die;
}

?>