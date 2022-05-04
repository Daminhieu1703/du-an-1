<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('ma_sp',$_REQUEST)) {
    $sql = "DELETE FROM binh_luan_sp WHERE ma_sp = $ma_sp";
    pdo_execute($sql);
    header("location:/du_an_1/admin-template-master/3.cmt_sp/comments.php");
    die;
}elseif (array_key_exists('xoa',$_REQUEST)) {
    foreach ($check as $ma_sp) {
        $sql = "DELETE FROM binh_luan_sp WHERE ma_sp = ?";
        pdo_execute($sql,$ma_sp);
    }
    header("location:/du_an_1/admin-template-master/3.cmt_sp/comments.php");
    die;
}elseif (array_key_exists('ma_bl',$_REQUEST)) {
    $sql = "DELETE FROM binh_luan_sp WHERE ma_bl = $ma_bl";
    pdo_execute($sql);
    header("location:/du_an_1/admin-template-master/3.cmt_sp/detail_comment.php?ma_sp=".$id_sp);
    die;
}elseif (array_key_exists('xoa_all',$_REQUEST)) {
    foreach ($check as $ma_bl) {
        $sql = "DELETE FROM binh_luan_sp WHERE ma_bl = ?";
        pdo_execute($sql,$ma_bl);
    }
    header("location:/du_an_1/admin-template-master/3.cmt_sp/detail_comment.php?ma_sp=".$id_sp);
    die;
}
?>