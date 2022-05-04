<?php
require_once "./../admin-template-master/pdo/pdo.php";
function select_kh_by_tentk($ten_tk,$mat_khau){
    $sql = "SELECT * FROM khach_hang WHERE ten_tk = ? AND mat_khau = ?";
    $data = pdo_query_one($sql, $ten_tk,$mat_khau);
    return $data;
}
function select_kh_by_id($ma_kh)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = $ma_kh";
    $data = pdo_query_one($sql);
    return $data;
}
function select_lh_all(){
    $sql = "SELECT * FROM loai_hang";
    $data = pdo_query($sql);
    return $data;
}
function select_top_10(){
    $sql = "SELECT * FROM san_pham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
    $data = pdo_query($sql);
    return $data;
}
function select_all_sp_in_danhmuc(){
    $sql = "SELECT * FROM san_pham";
    $data = pdo_query($sql);
    return $data;
}
function total_number_page($number_product){
    $sql = "SELECT COUNT(ma_sp) FROM san_pham";
    $data = pdo_query_value($sql);
    $total_number_page = ceil($data / $number_product);
    return $total_number_page;
}
function select_sp_all($number_page,$number_product){
    $offset = ($number_page - 1) * $number_product;
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC LIMIT $number_product OFFSET $offset";
    $data = pdo_query($sql);
    return $data;
}
function count_all_sp(){
    $sql = "SELECT COUNT(ma_sp) FROM san_pham";
    $data = pdo_query_value($sql);
    return $data;
}
function count_sp_by_ma_loai($ma_loai){
    $sql = "SELECT COUNT(ma_sp) FROM san_pham WHERE ma_loai = $ma_loai";
    $data = pdo_query_value($sql);
    return $data;
}
function select_sp_where_ma_sp($ma_sp){
    $sql = "SELECT * FROM san_pham JOIN loai_hang ON san_pham . ma_loai = loai_hang . ma_loai WHERE ma_sp = $ma_sp";
    $data = pdo_query_one($sql);
    return $data;
}
function sp_cung_loai( $ma_loai,$ma_sp){
    $sql = "SELECT * FROM san_pham WHERE ma_loai = $ma_loai AND ma_sp <> $ma_sp";
    $data = pdo_query($sql);
    return $data;
}
function select_cmt_by_sp($ma_sp){
    $sql = "SELECT * FROM binh_luan_sp JOIN khach_hang ON khach_hang . ma_kh = binh_luan_sp . ma_kh WHERE ma_sp = $ma_sp ORDER BY ma_bl DESC";
    $data = pdo_query($sql);
    return $data;
}
function select_sp_by_loai($ma_loai){
   $sql = "SELECT * FROM san_pham JOIN loai_hang ON san_pham . ma_loai = loai_hang . ma_loai WHERE san_pham . ma_loai = $ma_loai";
   $data = pdo_query($sql);
   return $data;
}
function update_luot_xem_by_masp($ma_sp){
    $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE ma_sp = $ma_sp";
    $data = pdo_query_one($sql);
   return $data;
}
function search_name($keyword){
    $sql = "SELECT * FROM san_pham INNER JOIN loai_hang ON loai_hang . ma_loai = san_pham . ma_loai WHERE ten_sp LIKE '%".$keyword."%'" . " OR ten_loai LIKE '%".$keyword."%'";
    $data = pdo_query($sql);
    return $data;
}
function search_name_bv($ten_bv){
    $sql = "SELECT DAY(ngay_tao) AS ngay, MONTH(ngay_tao) AS thang, hinh_chinh, ten_bv, noi_dung, ma_bv FROM bai_viet WHERE ten_bv LIKE '%".$ten_bv."%'";
    $data = pdo_query($sql);
    return $data;
}
function select_cart_by_ma_kh($ma_kh){
    $sql = "SELECT * FROM gio_hang WHERE ma_kh = $ma_kh";
    $data = pdo_query($sql);
    return $data;
}
function select_slide(){
    $sql = "SELECT * FROM slider";
    $data = pdo_query($sql);
    return $data;
}
function select_all_bv(){
    $sql = "SELECT DAY(ngay_tao) AS ngay, MONTH(ngay_tao) AS thang, hinh_chinh, ten_bv, noi_dung, ma_bv FROM bai_viet ORDER BY ma_bv DESC";
    $data = pdo_query($sql);
    return $data;
}
function select_bv_by_mabv($ma_bv){
    $sql = "SELECT DAY(bai_viet.ngay_tao) AS ngay, MONTH(bai_viet.ngay_tao) AS thang, bai_viet.ten_bv, khach_hang.ten_tk, bai_viet.noi_dung, khach_hang.avatar FROM bai_viet INNER JOIN khach_hang ON bai_viet.ma_kh = khach_hang.ma_kh WHERE ma_bv = $ma_bv";
    $data = pdo_query_one($sql);
    return $data;
}
function select_hp_by_mabv($ma_bv){
    $sql = "SELECT * FROM hinh_phu_bv WHERE ma_bv = $ma_bv";
    $data = pdo_query($sql);
    return $data;
}
function select_cmt_by_bv($ma_bv){
    $sql = "SELECT * FROM binh_luan_bv JOIN khach_hang ON khach_hang . ma_kh = binh_luan_bv . ma_kh WHERE ma_bv = $ma_bv ORDER BY ma_bl DESC";
    $data = pdo_query($sql);
    return $data;
}
function select_dh_by_ma_kh($ma_kh){
    $sql = "SELECT * FROM don_hang WHERE ma_kh = $ma_kh ORDER BY ma_dh DESC";
    $data = pdo_query_one($sql);
    return $data;
}
function select_dh_by_ma_kh_all($ma_kh){
    $sql = "SELECT * FROM don_hang WHERE ma_kh = $ma_kh ORDER BY ma_dh DESC";
    $data = pdo_query($sql);
    return $data;
}
function select_ct_dh_by_ma_kh($ma_dh){
    $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $ma_dh ORDER BY ma_ct_dh DESC";
    $data = pdo_query($sql);
    return $data;
}
function select_sp_gia_sp(){
    $sql = "SELECT MIN(gia_sp) AS gia_thap, MAX(gia_sp) AS gia_cao FROM san_pham";
    $data = pdo_query($sql);
    return $data;
}
function loc_sp_by_gia($gia_thap, $gia_cao){
    $sql = "SELECT * FROM san_pham WHERE gia_sp BETWEEN $gia_thap AND $gia_cao";
    $data = pdo_query($sql);
    return $data;
}
extract($_REQUEST);
if (array_key_exists('register',$_REQUEST)) {
    session_start();
    $fileUpload = $_FILES['img'];
    $sql = "INSERT INTO khach_hang(ten_tk, ten_kh, email, dia_chi, mat_khau, gioi_tinh, sdt, avatar) VALUES(?,?,?,?,?,?,?,?)";
    $sql1 = "SELECT * FROM khach_hang WHERE ten_tk = ?";
    $sql2 = "SELECT * FROM khach_hang WHERE email = ?";
    $getdata1 = pdo_query_one($sql1,$ten_tk);
    $getdata2 = pdo_query_one($sql2,$email);
    if (empty($getdata1) == false || empty($getdata2) == false) {
        if ($getdata1['ten_tk'] === $ten_tk) {
            $_SESSION['error_register'] = "TÊN TÀI KHOẢN CỦA BẠN ĐÃ CÓ NGƯỜI ĐĂNG KÝ";
            header("Location:/du_an_1/template-master/login.php");
            die;
        }else if ($getdata2['email'] === $email) {
        $_SESSION['error_register'] = "EMAIL CỦA BẠN ĐÃ CÓ NGƯỜI ĐĂNG KÝ";
        header("Location:/du_an_1/template-master/login.php");
        die;
        }
    } else {
        if( empty($ten_tk) == true || empty($ten_kh) == true || empty($email) == true || empty($dia_chi) == true || empty($mat_khau) == true || empty($again_mk) == true || empty($gioi_tinh) == true || empty($sdt) == true){
            $_SESSION['error_register'] = 'BẠN ĐIỀN THIẾU THÔNG TIN !';
            header("Location:/du_an_1/template-master/login.php");
            die;
        }elseif (strlen($ten_tk) < 8) {
            $_SESSION['error_register'] = 'TÊN TÀI KHOẢN PHẢI TRÊN 8 KÝ TỰ';
            header("Location:/du_an_1/template-master/login.php");
            die;
        }elseif (strlen($mat_khau) < 6 || strlen($again_mk) < 6) {
            $_SESSION['error_register'] = 'MẬT KHẨU CỦA BẠN PHẢI TRÊN 6 KÝ TỰ';
            header("Location:/du_an_1/template-master/login.php");
            die;
        }elseif (strlen($mat_khau) != strlen($again_mk)) {
            $_SESSION['error_register'] = 'XÁC NHẬN MẬT KHẨU KHÔNG GIỐNG MẬT KHẨU';
            header("Location:/du_an_1/template-master/login.php");
            die;
        }elseif ($fileUpload['size'] > 0) {
            if (strpos($fileUpload['type'], 'image') === false) {
                $_SESSION['error_register'] = "KHÔNG PHẢI FILE ẢNH";
                header("Location:/du_an_1/template-master/login.php");
                die;
            }else if($fileUpload['size'] > 3000000) {
                $_SESSION['error_register'] = "ẢNH KHÔNG ĐƯỢC VƯỢT QUÁ 30MB";
                header("Location:/du_an_1/template-master/login.php");
                die;
            }
            $storePath = './../admin-template-master/2.user/img/';
            $fileName = $fileUpload['name'];
            $path = $storePath . $fileName;
            move_uploaded_file($fileUpload['tmp_name'], $path);
            $avatar = '/du_an_1/admin-template-master/2.user/img/' . $fileName;
        }
        $_SESSION['error_register'] = 'ĐĂNG KÝ THÀNH CÔNG !';
        pdo_execute($sql,$ten_tk, $ten_kh, $email, $dia_chi, $mat_khau, $gioi_tinh, $sdt, $avatar);
        header("Location:/du_an_1/template-master/login.php");
        die;
    }
}elseif (array_key_exists('edit',$_REQUEST)) {
    session_start();
    $sql = "UPDATE khach_hang SET ten_kh = ?, avatar = ?, sdt = ?, gioi_tinh = ?, email = ?, dia_chi = ?, mat_khau = ?, vai_tro = ? WHERE ma_kh = ?";
    $fileUpload = $_FILES['img'];
    if ($fileUpload['size'] > 0) {
        if (strpos($fileUpload['type'], 'image') === false) {
            $_SESSION['error_edit'] = "KHÔNG PHẢI FILE ẢNH";
            header("location: /du_an_1/template-master/profile.php?ma_kh=".$ma_kh);
            die;
        }else if($fileUpload['size'] > 3000000) {
            $_SESSION['error_edit'] = "ẢNH KHÔNG ĐƯỢC VƯỢT QUÁ 30MB";
            header("location: /du_an_1/template-master/profile.php?ma_kh=".$ma_kh);
            die;
        }
        $storePath = './../admin-template-master/2.user/img/';
        $fileName = $fileUpload['name'];
        $path = $storePath . $fileName;
        move_uploaded_file($fileUpload['tmp_name'], $path);
        $avatar = '/du_an_1/admin-template-master/2.user/img/' . $fileName;
    }
    if (empty($ten_kh) == true || empty($sdt) == true || empty($email) == true || empty($dia_chi) == true || empty($mat_khau) == true) {
        $_SESSION['error_edit'] = 'ĐIỀN THIẾU THÔNG TIN !';
        header("location: /du_an_1/template-master/profile.php?ma_kh=".$ma_kh);
        die;
    }elseif (strlen($mat_khau) < 6) {
        $_SESSION['error_edit'] = 'MẬT KHẨU CỦA BẠN PHẢI TRÊN 6 KÝ TỰ';
        header("location: /du_an_1/template-master/profile.php?ma_kh=".$ma_kh);
        die;
    }
    $data = pdo_execute($sql,$ten_kh, $avatar, $sdt, $gioi_tinh, $email, $dia_chi, $mat_khau, $vai_tro, $ma_kh);
    header("location: /du_an_1/template-master/profile.php?ma_kh=".$ma_kh);
    die;
}elseif (array_key_exists('login',$_REQUEST)) {
    session_start();
    $sql = "SELECT * FROM khach_hang WHERE ten_tk = ? AND mat_khau = ?";
    $nv =pdo_query_one($sql,$ten_tk,$mat_khau);
    if (empty($nv) == true) {
        $_SESSION['error'] = "SAI TÀI KHOẢN HOẶC MẬT KHẨU";
        header("Location:/du_an_1/template-master/login.php");
        die;
    }if (intval($nv['kich_hoat']) == 1) {
        $_SESSION['error'] = "TÀI KHOẢN CỦA BẠN BỊ KHÓA";
        header("Location:/du_an_1/template-master/login.php");
        die;
    }
    if (isset($ghi_nho)) {
        setcookie("ten_tk",$ten_tk,time()+(86400*7));
        setcookie("mat_khau",$mat_khau,time()+(86400*7));
        header("Location: /du_an_1/template-master/index.php");
        die;
    }
    $_SESSION['user'] = $nv;
    header("Location: /du_an_1/template-master/index.php");
}else if (array_key_exists('logout',$_REQUEST)) {
    session_start();
    if ($logout == 'dangxuat') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('Location:\du_an_1\template-master\index.php');
        }else{
            setcookie("ten_tk","",time()-(86400*7));
            setcookie("mat_khau","",time()-(86400*7));
            header('Location:\du_an_1\template-master\index.php');
        }
    }
}else if (array_key_exists('cmt',$_REQUEST)) {
    session_start();
    $sql = "INSERT INTO binh_luan_sp(ma_sp, ma_kh, ten_tk, noi_dung, ngay_bl) VALUES(?,?,?,?,?)";
    $ngay_bl = date("Y-m-d");
    if (empty($noi_dung) == true) {
        $_SESSION['error_cmt'] = 'Bạn chưa điền nội dung !';
        header("location: /du_an_1/template-master/product_page.php?ma_sp=".$ma_sp."#binhluan");
        die;
    }else if (!isset($_SESSION['user']) && !isset($_COOKIE['ten_tk']) && !isset($_COOKIE['mat_khau'])) {
        $_SESSION['error_cmt'] = 'Bạn chưa đăng nhập !';
        header("location: /du_an_1/template-master/product_page.php?ma_sp=".$ma_sp."#binhluan");
        die;
    }
    pdo_execute($sql,$ma_sp, $ma_kh, $ten_tk, $noi_dung, $ngay_bl);
    header("location: /du_an_1/template-master/product_page.php?ma_sp=".$ma_sp."#binhluan");
}else if (array_key_exists('cmt_bv',$_REQUEST)) {
    session_start();
    $sql = "INSERT INTO binh_luan_bv(ma_bv, ma_kh, ten_tk, noi_dung, ngay_bl) VALUES(?,?,?,?,?)";
    $ngay_bl = date("Y-m-d");
    if (empty($noi_dung) == true) {
        $_SESSION['error_cmt'] = 'Bạn chưa điền nội dung !';
        header("location: /du_an_1/template-master/news-item.php?ma_bv=".$ma_bv."#binhluan");
        die;
    }else if (!isset($_SESSION['user']) && !isset($_COOKIE['ten_tk']) && !isset($_COOKIE['mat_khau'])) {
        $_SESSION['error_cmt'] = 'Bạn chưa đăng nhập !';
        header("location: /du_an_1/template-master/news-item.php?ma_bv=".$ma_bv."#binhluan");
        die;
    }
    pdo_execute($sql,$ma_bv, $ma_kh, $ten_tk, $noi_dung, $ngay_bl);
    header("location: /du_an_1/template-master/news-item.php?ma_bv=".$ma_bv."#binhluan");
}else if(array_key_exists('add_cart',$_REQUEST)){
    session_start();
    if (!isset($_SESSION['user']) && !isset($_COOKIE['ten_tk']) && !isset($_COOKIE['mat_khau'])) {
       header("location:/du_an_1/template-master/login.php");
       die; 
    }else {
        $sql = "SELECT * FROM gio_hang WHERE ma_sp = ?";
        $getdata = pdo_query_one($sql,$ma_sp);
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['vai_tro'] == 1) {
                $_SESSION['error_cart'] = "ADMIN KHÔNG THỂ ĐẶT HÀNG !";
                header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
                die;
            }
            $ma_kh = $_SESSION['user']['ma_kh'];
        } else {
            $ten_tk = $_COOKIE['ten_tk'];
            $mat_khau = $_COOKIE['mat_khau'];
            $khach_hang = select_kh_by_tentk($ten_tk,$mat_khau);
            if ($khach_hang['vai_tro'] == 1) {
                $_SESSION['error_cart'] = "ADMIN KHÔNG THỂ ĐẶT HÀNG !";
                header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
                die;
            }
            $ma_kh = $khach_hang['ma_kh'];
        }
        if ($getdata['ma_sp'] == $ma_sp) {
            $sql = "SELECT * FROM gio_hang WHERE ma_kh = ? AND ma_sp = ?";
            $sp = pdo_query_one($sql,$ma_kh,$ma_sp);
            $tong_sl = $sp['so_luong'] + $so_luong_mua;
            $sql = "SELECT * FROM san_pham WHERE ma_sp = ?";
            $data = pdo_query_one($sql,$ma_sp);
            if ($tong_sl > $data['so_luong']) {
                $_SESSION['error_cart'] = "SỐ LƯỢNG TRONG GIỎ HÀNG CỦA BẠN CỘNG SỐ LƯỢNG BẠN THÊM VÀO GIỎ HÀNG NHIỀU HƠN SỐ LƯỢNG SẢN PHẨM SHOP CÓ !";
                header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
                die;
            }
            $sql = "UPDATE gio_hang SET so_luong = so_luong + $so_luong_mua WHERE ma_kh = ? AND ma_sp = ?";
            pdo_execute($sql,$ma_kh,$ma_sp);
            header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
            die;
        }else {
            $sql = "SELECT * FROM san_pham WHERE ma_sp = ?";
            $data = pdo_query_one($sql,$ma_sp);
            if ($data['so_luong'] < $so_luong_mua) {
                $_SESSION['error_cart'] = "SỐ LƯỢNG BẠN THÊM VÀO GIỎ HÀNG NHIỀU HƠN SO VỚI SỐ LƯỢNG SẢN PHẨM SHOP CÓ !";
                header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
                die;
            }
            $sql = "INSERT INTO gio_hang(ma_sp,ma_kh,ten_sp,hinh_sp,so_luong,gia_sp) VALUES(?,?,?,?,?,?)";
            pdo_execute($sql,$data['ma_sp'],$ma_kh,$data['ten_sp'],$data['hinh_sp'],$so_luong_mua,$data['gia_km']);
            header("location:/du_an_1/template-master/product_page.php?ma_sp=".$ma_sp);
            die;
        }
    }
}elseif (array_key_exists('delete_only',$_REQUEST)) {
    $sql = "DELETE FROM gio_hang WHERE ma_sp = $delete_only";
    pdo_execute($sql);
    header("location:/du_an_1/template-master/cart.php");
    die;
}elseif (array_key_exists('delete_all',$_REQUEST)) {
    $sql = "DELETE FROM gio_hang";
    pdo_execute($sql);
    header("location:/du_an_1/template-master/cart.php");
    die;
}elseif (array_key_exists('dat_hang',$_REQUEST)) {
    $sql = "INSERT INTO don_hang(ma_kh, ten_kh, tong_so_luong, tong_gia, sdt, email, dia_chi, ghi_chu,ngay_don_hang) VALUES(?,?,?,?,?,?,?,?,?)";
    $ngay_don_hang = date("Y-m-d");
    pdo_execute($sql,$ma_kh, $ten_kh, $tong_so_luong, $tong_gia, $sdt, $email, $dia_chi, $ghi_chu, $ngay_don_hang);
    $sql2 = "SELECT * FROM gio_hang WHERE ma_kh = $ma_kh";
    $gio_hang = pdo_query($sql2);
    $sql3 = "SELECT * FROM don_hang ORDER BY ma_dh DESC";
    $don_hang = pdo_query_one($sql3);
    foreach ($gio_hang as $value) {
        $gia_sp = $value['gia_sp'] * $value['so_luong'];
        $sql = "INSERT INTO ct_don_hang(ma_dh, ma_sp, gia_sp, so_luong, ten_sp) VALUES(?,?,?,?,?)";
        pdo_execute($sql,$don_hang['ma_dh'], $value['ma_sp'], $gia_sp, $value['so_luong'], $value['ten_sp']);
        $sql_sp = "UPDATE san_pham SET so_luong = so_luong - ? WHERE ma_sp = ?";
        pdo_execute($sql_sp,$value['so_luong'], $value['ma_sp']);
    }
    $sql4 = "DELETE FROM gio_hang WHERE ma_kh = $ma_kh";
    pdo_query($sql4);
    header("location:/du_an_1/template-master/order-received.php?ma_kh=".$ma_kh);
    die; 
}elseif (array_key_exists('ma_don_hang',$_REQUEST) && array_key_exists('ma_khach_hang',$_REQUEST)) {
    $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $ma_don_hang";
    $ct_don_hang = pdo_query($sql);
    foreach ($ct_don_hang as $value) {
        $sql_sp = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
        pdo_execute($sql_sp,$value['so_luong'], $value['ma_sp']);
    }
    $sql1 = "DELETE FROM don_hang WHERE ma_dh = $ma_don_hang";
    pdo_execute($sql1);
    header("location:/du_an_1/template-master/order_list.php?ma_kh=".$ma_khach_hang);
}elseif (array_key_exists('ma_dhang',$_REQUEST) && array_key_exists('ma_khang',$_REQUEST) && array_key_exists('trang_thai',$_REQUEST)) {
    $sql1 = "UPDATE don_hang SET trang_thai = $trang_thai WHERE ma_dh = $ma_dhang AND ma_kh = $ma_khang";
    pdo_execute($sql1);
    header("location:/du_an_1/template-master/order_list.php?ma_kh=".$ma_khang);
}elseif (array_key_exists('send_mail',$_REQUEST)) {
    session_start();
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $data = pdo_query_one($sql);
    if (empty($data) == true) {
        $_SESSION['error_pass'] = "TÀI KHOẢN NÀY KHÔNG TỒN TẠI !";
        header("location:/du_an_1/template-master/forgot-password-form.php");
        die;
    } else {
        $_SESSION['error_pass'] = "MẬT KHẨU CỦA BẠN LÀ: " . $data['mat_khau'];
        header("location:/du_an_1/template-master/forgot-password-form.php");
        die;
    }
}
?>