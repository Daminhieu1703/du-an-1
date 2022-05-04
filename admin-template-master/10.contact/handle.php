<?php
require_once "./../pdo/pdo.php";
session_start();
extract($_REQUEST);
if (array_key_exists("contact",$_REQUEST)) {
    $sql = "INSERT INTO lien_he(email, ho_ten, tieu_de, noi_dung) VALUES(?, ?, ?, ?)";
    if (empty($email) == true || empty($ho_ten) == true || empty($noi_dung) == true || empty($tieu_de) == true) {
        $_SESSION["error_lh"] = "BẠN ĐIỀN THIẾU THÔNG TIN !";
        header("location:/du_an_1/template-master/contact.php");
        die;
    }
    $_SESSION["error_lh"] = "TIN NHẮN ĐÃ ĐƯỢC GỬI ĐI";
    pdo_execute($sql,$email, $ho_ten, $tieu_de, $noi_dung);
    header("location:/du_an_1/template-master/contact.php");
    die;
}elseif (array_key_exists('xoa_all',$_REQUEST)) {
    foreach ($check as $ma_lh) {
        $sql = "DELETE FROM lien_he WHERE ma_lh = ?";
        pdo_execute($sql,$ma_lh);
    }
    header("location:/du_an_1/admin-template-master/10.contact/list_contact.php");
    die;
}elseif (array_key_exists('ma_lh',$_REQUEST)) {
    $sql = "DELETE FROM lien_he WHERE ma_lh = $ma_lh";
    pdo_execute($sql);
    header("location:/du_an_1/admin-template-master/10.contact/list_contact.php");
    die;
}