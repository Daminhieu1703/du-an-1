<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists('ma_bv',$_REQUEST)) {
    $sql = "DELETE FROM binh_luan_bv WHERE ma_bv = $ma_bv";
    pdo_execute($sql);
    header("location:\du_an_1\admin-template-master\8.cmt_bv\comments.php");
    die;
}elseif (array_key_exists('xoa',$_REQUEST)) {
    foreach ($check as $ma_bv) {
        $sql = "DELETE FROM binh_luan_bv WHERE ma_bv = ?";
        pdo_execute($sql,$ma_bv);
    }
    header("location:\du_an_1\admin-template-master\8.cmt_bv\comments.php");
    die;
}elseif (array_key_exists('ma_bl',$_REQUEST)) {
    $sql = "DELETE FROM binh_luan_bv WHERE ma_bl = $ma_bl";
    pdo_execute($sql);
    header("location:\du_an_1\admin-template-master\8.cmt_bv\detail_comment.php?ma_bv=".$id_bv);
    die;
}elseif (array_key_exists('xoa_all',$_REQUEST)) {
    foreach ($check as $ma_bl) {
        $sql = "DELETE FROM binh_luan_bv WHERE ma_bl = ?";
        pdo_execute($sql,$ma_bl);
    }
    header("location:\du_an_1\admin-template-master\8.cmt_bv\detail_comment.php?ma_bv=".$id_bv);
    die;
}
?>