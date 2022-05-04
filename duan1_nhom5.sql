-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2022 lúc 11:41 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_nhom5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

CREATE TABLE `bai_viet` (
  `ma_bv` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ten_bv` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_chinh` varchar(255) NOT NULL,
  `ngay_tao` date NOT NULL,
  `ngay_sua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bai_viet`
--

INSERT INTO `bai_viet` (`ma_bv`, `ma_kh`, `ten_bv`, `noi_dung`, `hinh_chinh`, `ngay_tao`, `ngay_sua`) VALUES
(33, 8, 'Lý do bạn phải có cho mình 1 chiếc đồng hồ', 'Trong một thời đại mà hầu hết tất cả mọi người đều mang theo một chiếc điện  thoại thông minh để giải quyết những nhu cầu thiết yếu như tìm kiếm , xem tin tức dự báo trong ngày và rất rất nhiều thứ khác nữa . Điều đó cũng giải thích lý do vì sao càng ngày bạn càng không cần một chiếc đồng hồ trên tay nữa. Điện thoại của bạn đang kiểm soát thời gian một cách tuyệt vời và nó dễ dàng cập nhật thời gian ngay lập tức dù bạn có vừa sang một múi giờ hoàn toàn khác. Và vì thế mà trong tâm trí bạn, hay nhiều người khác chiếc đồng hồ đã trở thành một phụ kiện lỗi thời với chức năng khiêm tốn.Một trong những điều quan trọng đầu tiên mà người khác khi nhìn thấy bạn, ngay trong tiềm thức của họ là  đánh giá con người và khả năng làm việc của bạn dựa vào ngoại hình. Đó là quan niệm của rất nhiều người, khi bạn khoác lên mình một quần áo đẹp thì tất nhiên mọi thức thuộc về bạn đều tốt đẹp, còn ngược lại với một cách ăn mặc xuề xòa thì bạn đã tự hạ thấp giá trị của bản thân mình đi rất nhiều lần.Chính vì lẽ đó, đeo một chiếc đồng hồ phù hợp không chỉ hoàn thiện bộ trang phục của bạn mà nó còn ngay lập tức ghi điểm với người đối diện rằng bạn là một người vô cùng tinh tế và thể hiện mình là một người chu toàn trong công việc.\r\n\r\nSự phát triển chóng mặt của các thiết bị điện thoại thông minh gần như giết chết đi chức năng xem giờ - một trong những chức năng quan trọng nhất của chiếc đồng hồ. Nhưng thực sự những điều tinh tế và ý nghĩa mà một chiếc đồng hồ đeo tay mang lại cho bạn còn rất rất nhiều.', '/du_an_1/admin-template-master/9.status/img/hp1.jpg', '2021-11-22', '2021-11-22'),
(34, 8, 'HKL mới đây đã tung bộ sản phẩm đồng hồ nữ Rolex mới nhất', 'Đồng hồ Rolex là một thương hiệu đồng hồ cao cấp và sang trọng của Thụy Sĩ, cũng là thương hiệu đồng hồ đeo tay số 1 thế giới với mức độ phổ biến trên toàn cầu, khi nhắc đến Rolex hầu như ai cũng biết nó là thương hiệu đồng hồ có giá trị. Được thành lập vào năm 1908 bởi Hans Wilsdorf, sau này no mang nhãn hiệu với tên gọi Rolex vào năm 1915. Rolex họ đã tạo ra những chiếc đồng hồ sang trọng, thanh lịch và có tuổi thọ rất cao.\r\n\r\nLà thương hiệu đồng hồ đầu tiên có bộ máy vượt qua các cuộc thử nghiệm của viện khiểm tra Chronomerter gọi tắt là COSC của Thụy Sĩ, bên cạnh đó họ cũng đã phát minh ra chiếc đồng hồ có khả năng chống thấm nước đầu tiên, cùng với tính năng múi giờ GMT và tính năng hiển thị ngày tháng.Có nhiều thương hiệu đồng hồ cho rằng phụ nữ họ không quan tâm đến chuyển động, chất lượng, độ chính xác, khà năng giữ giá và tuổi thọ của đồng hồ như nam giới, đó là một suy nghĩ hoàn toàn sai lầm, bởi những chiếc đồng hồ Rolex nữ là bằng chứng cho thấy họ đã sai.\r\n\r\nĐối với nhiều phụ nữ, họ xem Rolex là một trong những chiếc đồng hồ thanh lịch mà họ có thể đeo nó hàng ngày, mọi lúc mọi nơi và coi nó như một người bạn trung thành. Sở gỉ đồng hồ Rolex nữ được yêu thích đó là nhờ sự chuyển động hoàn hảo, được tạo ra bằng những vật liệu tốt nhất bên cạnh thiết kế nữ tính, trẻ trung và sang trọng.Bất cứ ai ở nơi nào trên thế giới khi được hỏi về thương hiệu đồng hồ nào tốt nhất, sang trọng nhất đều có cùng câu trả lời đó là Rolex. Rolex là một trong những thương hiệu đồng hồ tốt nhất của Thụy Sĩ, và có sức ảnh hưởng lớn nhất thế giới mà hầu hết các thương hiệu khác đều phải ghen tỵ. Từ Winston Churchill đến nhà thám hiểm Edmond Hillary, James Cameron cho James Bond đều sử dụng thương hiệu Rolex, đó là một chiến lược quảng bá thương hiệu khôn ngoan mà Rolex đã áp dụng.', '/du_an_1/admin-template-master/9.status/img/sưu tập.png', '2021-11-22', '0000-00-00'),
(35, 8, 'Một thông tin bạn cần biết về đồng hồ Doxa', 'Georges Ducommun (1868-1936) là người sáng lập thương hiệu Doxa, ông sinh ra trong một gia đình nghèo với 13 người con, tại Le Locle, giữa những ngọn đồi Jura của bang Neuchatel ở Thụy Sỹ. Ở tuổi 12, ông trở thành một người học việc trong xưởng sản xuất bộ máy đồng hồ.\r\n\r\n❖ Ông bắt đầu kinh doanh sửa chữa đồng hồ cho riêng mình khi mới 20 tuổi. Ông làm việc chăm chỉ để thiết lập hệ thống kinh doanh, mỗi lần cung cấp sản phẩm ông phải đi bộ hơn 10km đến La Chaux-de Fonds để giao hàng, ngay cả trong mùa đông giá lạnh.\r\n\r\n❖ Sự thành công trong việc kinh doanh đồng hồ, nên ông chuyển đến ở tại Chateau des Monts (hiện nay nơi này là nhà bảo tàng Le Locle horological nổi tiếng thế giới). Từ đó, ông thực hiện cuộc hành trình hàng ngày đến nhà máy của mình bằng xe ngựa.\r\n\r\n❖ Vào đầu thế kỷ 20, sự phát triển nhanh chóng của công nghiệp sản xuất máy bay và ô tô gây áp lực lên ngành công nghiệp làm đồng hồ, đây là một trong những thách thức lớn dành cho các nhà sản xuất đồng hồ, trong đó có thương hiệu Doxa.\r\n\r\n❖ Là một nhà công nghiệp tài năng, Georges Ducommun ngay lập tức phát triển thị trường xe đua và bắt đầu phát triển sản xuất những công cụ đồng hồ cho xe ô tô và máy bay. Vào năm 1908, Georges Ducommun đã sáng chế ra một bộ máy đồng hồ dành cho cho xe ô tô và máy bay có thể tích trữ năng lượng lên đến 8 tiếng.\r\n\r\n❖ Năm 1936, Ông Georges Ducommun qua đời ở tuổi 68. Để lại một di sản vô cùng to lớn cho nền công nghiệp đồng hồ Thụy Sỹ .', '/du_an_1/admin-template-master/9.status/img/hp2doxa.jpg', '2021-12-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan_bv`
--

CREATE TABLE `binh_luan_bv` (
  `ma_bl` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_bv` int(11) NOT NULL,
  `ten_tk` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan_sp`
--

CREATE TABLE `binh_luan_sp` (
  `ma_bl` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ten_tk` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `ma_ct_dh` int(11) NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `gia_sp` double(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_don_hang`
--

INSERT INTO `ct_don_hang` (`ma_ct_dh`, `ma_dh`, `ma_sp`, `gia_sp`, `so_luong`, `ten_sp`) VALUES
(85, 70, 15, 2700000.00, 1, ' Fossil ES4535'),
(86, 70, 16, 22000000.00, 2, 'Tissot T126.010.22.013.01'),
(87, 71, 8, 5600000.00, 1, 'Citizen AW0079-13X');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `tong_so_luong` int(11) NOT NULL,
  `tong_gia` int(11) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `ngay_don_hang` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `ma_kh`, `ten_kh`, `tong_so_luong`, `tong_gia`, `sdt`, `email`, `dia_chi`, `ghi_chu`, `ngay_don_hang`, `trang_thai`) VALUES
(70, 42, 'mai mai', 3, 24708233, 342770723, 'maidt@gmail.com', 'hà nội', '', '2021-12-18', 1),
(71, 42, 'mai mai', 1, 5601867, 342770723, 'maidt@gmail.com', 'hà nội', '', '2021-12-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` double(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_phu_bv`
--

CREATE TABLE `hinh_phu_bv` (
  `ma_hinh_phu_bv` int(11) NOT NULL,
  `ma_bv` int(11) NOT NULL,
  `hinh_phu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_phu_bv`
--

INSERT INTO `hinh_phu_bv` (`ma_hinh_phu_bv`, `ma_bv`, `hinh_phu`) VALUES
(59, 33, '/du_an_1/admin-template-master/9.status/image/hp3.jpg'),
(60, 33, '/du_an_1/admin-template-master/9.status/image/hp2.jpg'),
(61, 33, '/du_an_1/admin-template-master/9.status/image/hc11.jpg'),
(62, 34, '/du_an_1/admin-template-master/9.status/image/hp6.jpg'),
(63, 34, '/du_an_1/admin-template-master/9.status/image/hp5.jpg'),
(64, 34, '/du_an_1/admin-template-master/9.status/image/hp4.jpg'),
(65, 35, '/du_an_1/admin-template-master/9.status/image/hp3doxa.jpg'),
(66, 35, '/du_an_1/admin-template-master/9.status/image/hp1doxa.jpg'),
(67, 35, '/du_an_1/admin-template-master/9.status/image/dong_ho_doxa.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `gioi_tinh` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ten_tk` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `vai_tro` int(1) NOT NULL DEFAULT 0,
  `kich_hoat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `avatar`, `sdt`, `gioi_tinh`, `email`, `dia_chi`, `ten_tk`, `mat_khau`, `vai_tro`, `kich_hoat`) VALUES
(8, 'Đàm Minh Hiếu', '/du_an_1/admin-template-master/2.user/img/210055013_104355045255961_7763846255000485374_n.jpg', '0342770723', 1, 'hieudmph14827@fpt.edu.vn', '12', 'daminhieu1703', '12345678', 1, 0),
(42, 'mai mai', '/du_an_1/template-master/assets/img/profile.png', '0342770723', 2, 'maidt@gmail.com', 'hà nội', 'maidt12345', '12345678', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `ma_lh` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
(14, 'Đồng Hồ Nam'),
(15, 'Đồng Hồ Nữ'),
(16, 'Đồng Hồ Đôi'),
(17, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `hinh_sp` varchar(255) NOT NULL,
  `gia_sp` double(10,2) NOT NULL,
  `gia_km` double(10,2) DEFAULT NULL,
  `mo_ta` text NOT NULL,
  `ngay_nhap` date NOT NULL,
  `ngay_sua` date NOT NULL,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ma_loai`, `ten_sp`, `hinh_sp`, `gia_sp`, `gia_km`, `mo_ta`, `ngay_nhap`, `ngay_sua`, `so_luot_xem`, `so_luong`) VALUES
(5, 14, 'Casio EFV-570D-2AVUDF', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 1.jpg', 3529000.00, 2500000.00, 'Mẫu Casio EFV-570D-2AVUDF nổi bật với kiểu dáng 6 kim kèm tính năng Chronograph đo thời gian vượt trội đặc trưng thuộc dòng Edifice dành cho các tín đồ yêu thích phong cách thể thao nhưng lại khoác trên mình vẻ ngoài lịch lãm.', '2021-11-20', '2021-11-20', 108, 0),
(7, 14, 'G-Shock GA-900-4ADR', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 2.jpg', 4072000.00, 3500000.00, 'Mẫu G-Shock GA-900-4ADR phiên bản dây vỏ nhựa chịu va đập phối tone màu đỏ đen nổi bật, mặt số điện tử đa chức năng kết hợp cùng khả năng chịu nước lên đến 20atm.', '2021-11-20', '0000-00-00', 49, 0),
(8, 14, 'Citizen AW0079-13X', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 3.jpg', 7060000.00, 5600000.00, 'Mẫu Citizen AW0079-13X phiên bản dây da nâu kiểu da trơn phong cách thời trang, nổi bật với thiết kế kiểu máy pin được trang bị công nghệ Eco-Drive (Năng Lượng Ánh Sáng).', '2021-11-20', '0000-00-00', 42, 1),
(9, 14, 'Frederique Constant FC-310MC4S34', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 4.jpg', 42850000.00, 36000000.00, 'Mẫu Frederique Constant FC-310MC4S34 phiên bản máy cơ với kiểu thiết kế Open heart (cơ lộ tim) tạo nên vẻ độc đáo trên nền mặt số với tạo hình họa tiết Guilloche.', '2021-11-20', '0000-00-00', 17, 2),
(10, 14, 'G-Shock GM-S5600-1DR', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 5.jpg', 5687000.00, 4500000.00, 'Mẫu G-Shock GM-S5600-1DR phiên bản mức chống nước nổi bật 20atm, dây vỏ nhựa phong cách năng động, cùng với thiết kế mặt số vuông điện tử hiện thị đa chức năng.', '2021-11-20', '0000-00-00', 10, 3),
(11, 14, ' Doxa nam D173TCM', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam.jpg', 36940000.00, 25000000.00, 'Mẫu Doxa nam D173TCM khoác lên phong cách đẳng cấp khi mặt số với thiết kế tinh xảo đính kèm các viên kim cương nổi bật trên nền kính Sapphire thời trang sang trọng phối cùng mẫu dây đeo demi.', '2021-11-20', '0000-00-00', 15, 2),
(12, 14, 'Frederique Constant FC-303B4NH4', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 6.jpg', 60210000.00, 55000000.00, 'Mẫu Frederique Constant FC-303B4NH4 mặt số đen size 41mm được tạo hình họa tiết độc đáo hình địa cầu, phiên bản thiết kế đơn giản trẻ trung với chức năng 3 kim.', '2021-11-20', '0000-00-00', 41, 2),
(13, 14, 'Orient Star Retrograde SDE00001W0', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 7.jpg', 22030000.00, 18000000.00, 'Đồng hồ Orient Star Retrograde SDE00001W0 được thiết kế sang trọng với dây đeo demi vàng, mặt kính Sapphire chịu lực chống trầy, mặt nền trắng viền vàng, kiểu dáng thể thao 6 kim với 1 bảng đo năng lượng.', '2021-11-20', '0000-00-00', 10, 2),
(14, 14, 'Frederique Constant FC-220SS5B6', '/du_an_1/admin-template-master/1.products/img/đồng hồ nam 8.jpg', 17930000.00, 15000000.00, 'Mẫu Frederique Constant FC-220SS5B6 phiên bản dây da nâu được tạo hình vân phong cách lịch lãm trẻ trung với các chi tiết kim chỉ cùng cọc vạch số được tạo hình mỏng.', '2021-11-20', '0000-00-00', 14, 2),
(15, 15, ' Fossil ES4535', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ.jpg', 3480000.00, 2700000.00, 'Mẫu Fossil ES4535 phiên bản họa tiết hoa lá tăng thêm vẻ nổi bật trên nền mặt số size 36mm tone trắng xà cừ, cùng với nền vạch số vàng hồng tạo hình mỏng thời trang cho phái đẹp.', '2021-11-20', '0000-00-00', 29, 0),
(16, 15, 'Tissot T126.010.22.013.01', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 1.jpg', 12870000.00, 11000000.00, 'Mẫu Tissot T126.010.22.013.01 phiên bản nền cọc số la mã tạo nét thanh mảnh thời trang kết hợp cùng mẫu dây đeo kim loại kiểu dáng dây demi phối tone màu vàng hồng.', '2021-11-20', '0000-00-00', 32, 0),
(17, 15, 'Citizen EX1539-57E', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 2.jpg', 9500000.00, 9000000.00, 'Mẫu Citizen EX1539-57E phiên bản máy pin với thiết kế trang bị công nghệ Eco-Drive (Năng Lượng Ánh Sáng), sang trọng nổi bật với nền mặt số được đính 1 viên pha lê tại vị trí 12 giờ.', '2021-11-20', '0000-00-00', 28, 1),
(18, 15, 'Calvin Klein K7W2M616', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 3.jpg', 8330000.00, 7800000.00, 'Mẫu Calvin Klein K7W2M616 dây đeo phiên bản kiểu lắc tay được phối tone màu vàng hồng thời trang, cùng với thiết kế đơn giản 2 kim trên nền mặt số với kích thước nhỏ nữ tính 28mm.', '2021-11-20', '0000-00-00', 3, 2),
(19, 15, 'Baby-G MSG-S500G-5ADR', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 4.jpg', 6490000.00, 5000000.00, 'Mẫu Baby-G MSG-S500G-5ADR phiên bản trang bị công nghệ Solar (năng lượng ánh sáng), mẫu dây đeo cao su được phối tone màu nâu thời trang.', '2021-11-20', '2021-12-08', 12, 4),
(20, 15, ' Doxa D190RBU', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 5.jpg', 40820000.00, 40000000.00, 'Mẫu Doxa D190RBU với 8 viên kim cương đính trên mặt số xanh tạo nên phiên bản sang trọng trẻ trung với chi tiết kim chỉ tạo hình mỏng và phối tone màu vàng hồng thời trang.', '2021-11-20', '0000-00-00', 15, 2),
(21, 15, 'Doxa nữ D182SWB', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 6.jpg', 18720000.00, 17000000.00, 'Mẫu Doxa nữ D182SWB mặt số tròn truyền thống size 35mm sang trọng nổi bật đính kèm 8 viên kim cương tạo nên vẻ thời trang cho phái đẹp.', '2021-11-20', '0000-00-00', 4, 1),
(22, 15, 'Doxa D151SMB', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 7.jpg', 36480000.00, 35000000.00, 'Mẫu Doxa D151SMB điểm nổi bật với viền ngoài mặt đồng hồ chất liệu bằng đá Ceramic màu xanh trẻ trung đính kèm xung quanh 12 viên ngọc trai bên ngoài và 11 viên kim cương thật giá trị ngay trên mặt số, dây đeo kết hợp giữa kim loại và hàng đá Ceramic ở giữa tạo nên vẻ đẹp kiêu sa.', '2021-11-20', '0000-00-00', 6, 2),
(23, 15, 'Longines L5.255.4.71.5', '/du_an_1/admin-template-master/1.products/img/đồng hồ nữ 8.jpg', 33440000.00, 33000000.00, 'Mẫu Longines L5.255.4.71.5 phiên bản dây da tone màu đỏ được tạo hình vân phong cách thanh lịch hoài cổ khi kết hợp cùng với lối thiết kế mặt số hình chữ nhật.', '2021-11-20', '0000-00-00', 16, 2),
(24, 16, 'Olym Pianus (Olympia Star)', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi.jpg', 5840000.00, 5000000.00, 'Mẫu Olym Pianus (Olympia Star) đôi phiên bản mặt kính Sapphire cùng với thiết kế các chi tiết kim chỉ vạch số mạ vàng nổi bật trên nền mặt số trắng.', '2021-11-20', '0000-00-00', 12, 2),
(25, 16, 'Calvin Klein Vàng', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 1.jpg', 15570000.00, 15000000.00, 'Mẫu Calvin Klein đôi phiên bản dây lưới mạ vàng sang trọng trẻ trung phối cùng lối thiết kế tối giản 2 kim, nổi bật phần vỏ máy pin thiết kế mỏng.', '2021-11-20', '2021-12-08', 49, 9),
(26, 16, ' Calvin Klein Đồng', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 2.jpg', 15080000.00, 14800000.00, 'Mẫu Calvin Klein đôi dây đeo phiên bản dây lưới tone vàng hồng thời trang phối cùng thiết kế tối giản 2 kim trên nền mặt số.', '2021-11-20', '0000-00-00', 21, 2),
(27, 16, 'Calvin Klein Bạc', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 3.jpg', 11980000.00, 11000000.00, 'Mẫu Calvin Klein đôi dây đeo kim loại phiên bản dây lưới thời trang phối cùng thiết kế tối giản 2 kim trên nền mặt số trắng.', '2021-11-20', '2021-11-28', 6, 2),
(28, 16, ' Citizen đôi dây da nâu', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 4.jpg', 6720000.00, 5600000.00, 'Mẫu Citizen đôi dây da tạo hình vân phiên bản lịch lãm, thiết kế đơn giản chức năng 3 kim cùng với cọc vạch số tạo nét mỏng trẻ trung.', '2021-11-20', '2021-12-08', 9, 6),
(29, 16, 'Seiko đôi dây da đen', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 5.jpg', 9540000.00, 9000000.00, 'Mẫu Seiko đôi phiên bản mặt kính Sapphire nổi bật với nền cọc số trò tạo hình cách điệu trẻ trung trên nền mặt số trắng.', '2021-11-20', '2021-11-20', 5, 2),
(30, 16, 'Casio đôi mặt vuông', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 6.jpg', 5084000.00, 5000000.00, 'Đồng hồ đôi Casio mặt đồng hồ với kiểu dáng vuông cùng với chữ số la mã theo phong cách cổ điển phối trên nền mặt số màu đen chấm xanh thời trang, kết hợp dây đeo kim loại màu bạc tạo nên vẻ thời trang cho cặp đôi.', '2021-11-20', '0000-00-00', 1, 2),
(31, 16, 'Casio G-shock đôi', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 7.jpg', 10611000.00, 10000000.00, 'Đồng hồ đôi Casio với kiểu dáng thời trang, mặt đồng hồ điện tử hiện thị với các chức năng tiện ích hiện đại, vỏ máy nhựa kết hợp cùng với dây đeo cao su cùng tông mảu xanh, đem lại cho cặp đôi năng động .', '2021-11-20', '2021-11-28', 18, 2),
(32, 17, 'Dây da Hirsch Voyager', '/du_an_1/admin-template-master/1.products/img/phụ kiện.jpg', 3509000.00, 2400000.00, 'Dây da Hirsch Voyager được làm từ da bê Ý. Mẫu dây da này cũng có khả năng kháng nước cơ bản cho người dùng.', '2021-11-20', '0000-00-00', 13, 2),
(33, 17, 'Dây da Hirsch Speed', '/du_an_1/admin-template-master/1.products/img/phụ kiện 1.jpg', 3509000.00, 3400000.00, 'Dây da Hirsch Speed được làm từ da bò Ý chính hãng. Mẫu dây da này cũng có khả năng kháng nước cơ bản cho người dùng.', '2021-11-20', '0000-00-00', 27, 2),
(34, 17, 'dây da Hirsch STONE', '/du_an_1/admin-template-master/1.products/img/phụ kiện 2.jpg', 4560000.00, 4400000.00, 'Mẫu dây da Hirsch STONE thiết kế kiểu dáng độc đáo, được làm từ cao su thiên nhiên phủ đá phiên hạt mịn, khả năng chịu nước 300m', '2021-11-20', '0000-00-00', 13, 2),
(35, 17, 'dây đeo Masamu Mesh (Gold)', '/du_an_1/admin-template-master/1.products/img/phụ kiện 3.jpg', 2000000.00, 1800000.00, 'Mẫu dây đeo Masamu Mesh (Gold), vẻ đẹp tôn lên sự quý phái, màu vàng thể hiện sự trang nghiêm tạo nên sự thu hút của đồng hồ', '2021-11-20', '0000-00-00', 12, 2),
(36, 17, 'dây đeo Masamu Mesh (Silver)', '/du_an_1/admin-template-master/1.products/img/phụ kiện 4.jpg', 1600000.00, 1300000.00, 'Mẫu dây đeo Masamu Mesh (Silver) thể hiện sự lạnh lùng trong tính cách, tạo nên sức hút không thể cưỡng lại', '2021-11-20', '2021-11-22', 20, 1),
(37, 16, 'DANIEL WELLINGTON ĐÔI', '/du_an_1/admin-template-master/1.products/img/đồng hồ đôi 8.jpg', 9800000.00, 7800000.00, 'Mẫu Daniel Wellington đôi phần vỏ máy mạ bạc kiểu máy pin tạo hình mỏng chỉ 6mm, dây da đen phiên bản da trơn thời trang,', '2021-12-05', '0000-00-00', 7, 3),
(38, 17, 'HỘP ZRC – WATCH WINDER', '/du_an_1/admin-template-master/1.products/img/hộp xoay.jpg', 70000000.00, 65800000.00, 'Hộp đựng đồng hồ cao cấp ZRC WATCH WINDER (EM03201). Dòng hộp chuyên dụng cho dòng đồng hồ tự động. Thiết kế hộp tinh tế, mạnh mẽ và sang trọng.', '2021-12-05', '0000-00-00', 3, 5),
(39, 17, 'HIRSCH ANDY', '/du_an_1/admin-template-master/1.products/img/phụ kiện 9.jpg', 2250000.00, 1670000.00, 'Mẫu dây da Hirsch ANDY thiết kế kiểu dáng thể thao với hơi hướng cổ điển, được làm từ da bê Ý và cao su thiên nhiên, khả năng chịu nước 300m', '2021-12-05', '0000-00-00', 2, 4),
(40, 17, 'MASAMU STEEL PETITE (GOLD)', '/du_an_1/admin-template-master/1.products/img/phụ kiện 10.jpg', 800000.00, 670000.00, 'Mẫu dây đeo Masamu Steel Petite', '2021-12-05', '0000-00-00', 6, 7),
(41, 17, 'MASAMU STEEL FIT (SILVER)', '/du_an_1/admin-template-master/1.products/img/phụ kiện 11.jpg', 700000.00, 500000.00, 'Mẫu dây đeo Masamu Steel Fit', '2021-12-05', '2021-12-07', 5, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `ma_slide` int(11) NOT NULL,
  `ten_slide` varchar(255) NOT NULL,
  `url_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`ma_slide`, `ten_slide`, `url_slide`) VALUES
(9, 'Lê Minh Khang', '/du_an_1/admin-template-master/4.slider/img/slide1.jpg'),
(10, 'Đặng Quang Linh', '/du_an_1/admin-template-master/4.slider/img/slide2.jpg'),
(11, 'Đàm Minh Hiếu', '/du_an_1/admin-template-master/4.slider/img/slide3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`ma_bv`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `binh_luan_bv`
--
ALTER TABLE `binh_luan_bv`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_bv` (`ma_bv`);

--
-- Chỉ mục cho bảng `binh_luan_sp`
--
ALTER TABLE `binh_luan_sp`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD PRIMARY KEY (`ma_ct_dh`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ct_don_hang_ibfk_1` (`ma_dh`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`),
  ADD KEY `gio_hang_ibfk_2` (`ma_sp`),
  ADD KEY `gio_hang_ibfk_1` (`ma_kh`);

--
-- Chỉ mục cho bảng `hinh_phu_bv`
--
ALTER TABLE `hinh_phu_bv`
  ADD PRIMARY KEY (`ma_hinh_phu_bv`),
  ADD KEY `ma_bv` (`ma_bv`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`ma_lh`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ma_slide`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `ma_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `binh_luan_bv`
--
ALTER TABLE `binh_luan_bv`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `binh_luan_sp`
--
ALTER TABLE `binh_luan_sp`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  MODIFY `ma_ct_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `hinh_phu_bv`
--
ALTER TABLE `hinh_phu_bv`
  MODIFY `ma_hinh_phu_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `ma_lh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `ma_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `bai_viet_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `binh_luan_bv`
--
ALTER TABLE `binh_luan_bv`
  ADD CONSTRAINT `binh_luan_bv_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_bv_ibfk_2` FOREIGN KEY (`ma_bv`) REFERENCES `bai_viet` (`ma_bv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `binh_luan_sp`
--
ALTER TABLE `binh_luan_sp`
  ADD CONSTRAINT `binh_luan_sp_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_sp_ibfk_3` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD CONSTRAINT `ct_don_hang_ibfk_1` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hinh_phu_bv`
--
ALTER TABLE `hinh_phu_bv`
  ADD CONSTRAINT `hinh_phu_bv_ibfk_1` FOREIGN KEY (`ma_bv`) REFERENCES `bai_viet` (`ma_bv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
