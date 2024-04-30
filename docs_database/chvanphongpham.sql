-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 30, 2024 lúc 09:24 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chvanphongpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `ten_slider` varchar(255) NOT NULL,
  `anh_slider` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id_slider`, `ten_slider`, `anh_slider`, `type`) VALUES
(7, 'slide image123', 'slide2.jpg', '0'),
(8, 'slide gg', 'slide3.jpg', '0'),
(9, 'slide image', 'slide3.jpg', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbinhluan`
--

CREATE TABLE `tblbinhluan` (
  `id_binhluan` int(11) NOT NULL,
  `binhluan_ten` varchar(30) NOT NULL,
  `binhluan` varchar(50) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `blog_id` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbinhluan`
--

INSERT INTO `tblbinhluan` (`id_binhluan`, `binhluan_ten`, `binhluan`, `id_sanpham`, `blog_id`, `date`) VALUES
(1, 'Trần Ngọc', '', 1, 1, '2023-10-17'),
(2, 'NT', '', 1, 0, '2023-10-17'),
(3, 'TT23', 'Xin chào', 27, 0, '2023-10-18'),
(4, '', '', 25, 0, '2023-10-30'),
(5, 'An', 'uuuu', 25, 0, '2023-10-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblkhachhang`
--

CREATE TABLE `tblkhachhang` (
  `id_khachhang` int(11) NOT NULL,
  `id_taikhoan` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`id_khachhang`, `id_taikhoan`, `ten`, `diachi`, `sdt`, `email`) VALUES
(46, '35', 'Ngọc23', 'VinhPhuc', '22222', 't@gmai.com'),
(49, '32', 'Đại', 'VP', '0927253633', 'dai@gmail.com'),
(50, '33', 'Hoàn', 'TT', '029293773', 'q@mail.com'),
(52, '36', 'Dai', 'i', '9', 'ty@gmail.com'),
(89, '73', 'Hoan', 'i', '9', 'issoffical@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnhanvien`
--

CREATE TABLE `tblnhanvien` (
  `id_nhanvien` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `CMND` int(11) NOT NULL,
  `trangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblnhanvien`
--

INSERT INTO `tblnhanvien` (`id_nhanvien`, `id_taikhoan`, `ten`, `email`, `pass`, `sdt`, `diachi`, `CMND`, `trangThai`) VALUES
(1, 2, 'dgfhgjh2222', 'uuu@gmail.com', '852', '98764532122', 'sdffghgjghkjljhgf', 2147483647, ''),
(2, 5, 'qưẻtyui', 'abc12345678@gmail.com', '9999', '852963741', 'sdfghjkljhgfdf', 0, '0'),
(3, 6, 'ádfghjkl', 'addddd@gmail.com', '963', '852963741', 'gdhfjghkhljkgdgf', 0, '0'),
(4, 7, 'qưẻtyui', 'qqqqqqqqaaa@gmail.com', '852741', '7986319985', 'ádfj,mngscsdvfgbngb', 0, '0'),
(7, 12, 'cô giáo', 'cogiao@gmail.com', '852', '85296', 'cóadasd', 0, '0'),
(9, 34, 'cô giáo Ánh', 'anh@gmail.com', '1', '09293772723', 'HN', 2147483647, 'Làm việc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblquestion`
--

CREATE TABLE `tblquestion` (
  `id` int(11) NOT NULL,
  `cauhoi` varchar(255) NOT NULL,
  `traloi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblquestion`
--

INSERT INTO `tblquestion` (`id`, `cauhoi`, `traloi`) VALUES
(5, 'Bút khi nào hàng về ?', ''),
(6, 'Bạn đang ở đâu ?', 'Tôi đây'),
(10, 'Quỳnh đang làm gì ?', ''),
(11, 'Bạn đang ở đâu ?', 'Tôi đây'),
(12, 'Kẹo còn không ?', 'Tôi đây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsanpham`
--

CREATE TABLE `tblsanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `loaisp_id` int(11) NOT NULL,
  `giasp` float NOT NULL,
  `khuyenmai` float NOT NULL,
  `anhsp` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `chitiet_sp` text NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsanpham`
--

INSERT INTO `tblsanpham` (`id_sanpham`, `tensp`, `loaisp_id`, `giasp`, `khuyenmai`, `anhsp`, `soluong`, `chitiet_sp`, `tinhtrang`) VALUES
(21, 'Bút Chì', 96, 400000, 12, 'butchi.png', 100, '<p>Rẻ bất ngờ</p>\r\n', 1),
(23, 'Gấu bông mèo ', 31, 1000000, 15, 'butchi.png', 30, '<p>Ngon thơm</p>', 1),
(24, 'Giấu note', 94, 400000, 15, 'giấy note.jpeg', 30, '<p>Ngon bổ rẻ</p>\r\n', 1),
(28, 'Hình dán  ', 75, 400000, 12, 'gấu2.jpeg', 30, '<p>Giá rẻ</p>', 1),
(29, 'Thước kẻ', 96, 400000, 15, 'thước kẻ.jpeg', 30, '<p>Gi&ograve;n</p>\r\n', 1),
(30, 'Vở kẻ ngang', 95, 1000000, 20, 'vở.jpeg', 30, '<p>Dai dẻo ngọt</p>\r\n', 1),
(34, 'Vở ô li  ', 28, 24000, 2, 'vở.jpeg', 34, '<p>tttt</p>', 1),
(38, 'Gấu xinh', 101, 23888, 5, 'xinh.jpeg', 32, '', 1),
(41, 'but chi 88 ', 75, 90000, 88, 'butchi.png', 9999998, 'đẹp_ok', 1),
(42, 'but chi cuba', 24, 111, 11, 'butchi.png', 1, 'đẹp_ok', 1),
(47, 'but chi cuba', 78, 10000000, 88, 'butchi.png', 9999999, 'đẹp_ok', 1),
(49, 'but chi 2', 79, 500000, 88, 'butchi.png', 300, 'đẹp_ok', 1),
(51, 'Thước kẻ', 28, 7000, 10, 'thước kẻ.jpeg', 98, 'bền và đẹp', 1),
(65, 'Bút chì kim', 28, 2000, 0.2, 'sticker.jpeg', 6, '222', 1),
(67, 'Vở ô ly   ', 28, 222, 222, 'sticker.jpeg', 212, '222', 1),
(68, '222', 28, 2222, 2222, 'giấy note.jpeg', 2222, '2222', 1),
(69, 'Chuột', 31, 62272, 0.2, 'vở.jpeg', 20, 'sjsjs', 1),
(70, 'Máy tính', 31, 22222, 2222, 'xinh.jpeg', 212, 'Quỳnh', 1),
(71, 'Băng dinh', 31, 22, 22, 'vở2.jpeg', 10, '2222', 1),
(72, 'Bút', 24, 20000, 0.5, 'butchi.png', 20, 'uuuu', 1),
(73, 'Gấu', 75, 20000, 0.3, 'xinh.jpeg', 10, 'Quỳnh', 1),
(74, 'Gấu 2', 75, 20000, 0.4, 'gấu.jpeg', 20, 'Quỳnh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltintuc`
--

CREATE TABLE `tbltintuc` (
  `id_tintuc` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbltintuc`
--

INSERT INTO `tbltintuc` (`id_tintuc`, `tieude`, `noidung`) VALUES
(1, 'Quỳnh ', 'top102');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltk`
--

CREATE TABLE `tbltk` (
  `id_taikhoan` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `quyen` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbltk`
--

INSERT INTO `tbltk` (`id_taikhoan`, `ten`, `email`, `pass`, `sdt`, `quyen`, `diachi`) VALUES
(4, 'ádfg', 'abcd@gmail.com', '852', '852637496', 0, 'sdsfgbhngbdfvdcs'),
(12, 'cô giáo', 'cogiao@gmail.com', '852', '85296', 0, 'cóadasd'),
(13, 'SI', 'trngoc003@gmail.com', '1', '02837373733', 0, 'Vĩnh Phúc'),
(25, 'iii', 'ol@gmail.com', '1', '99', 0, 'iu'),
(26, '', 't@gmai.com', '1', '', 0, ''),
(32, 'Đại', 'dai@gmail.com', '1', '0927253633', 0, 'VP'),
(33, 'Hoàn', 'q@mail.com', '1', '029293773', 1, 'TT'),
(34, 'cô giáo Ánh', 'anh@gmail.com', '1', '09293772723', 0, 'HN'),
(35, 'Ngọc', 'ngoc@gmail.com', '1', '22222', 1, 'VinhPhuc'),
(36, '7iii', 'ty@gmail.com', '9', '9', 0, 'i'),
(37, '7iii', 'daiii@gmail.com', '9', '9', 0, 'i'),
(38, 'Hoan', '2222', '1', '222', 1, '2222'),
(39, '', '', '1', '', 1, ''),
(40, '88', '6@gmail.com', '1', '8', 1, '8'),
(41, '', '', '1', '', 1, ''),
(42, '', '', '1', '', 1, ''),
(43, '', '', '1', '', 1, ''),
(44, '', '', '1', '', 1, ''),
(45, '', '', '1', '', 1, ''),
(46, '', '', '1', '', 1, ''),
(47, '', '', '1', '', 1, ''),
(48, '', '', '1', '', 1, ''),
(49, '', '', '1', '', 1, ''),
(50, '', '', '1', '', 1, ''),
(51, '', '', '1', '', 1, ''),
(52, '', '', '1', '', 1, ''),
(53, '', '', '1', '', 1, ''),
(54, '', '', '1', '', 1, ''),
(55, '', '', '1', '', 1, ''),
(56, '', '', '1', '', 1, ''),
(57, '', '', '1', '', 1, ''),
(58, '', '', '1', '', 1, ''),
(59, '', '', '1', '', 1, ''),
(60, '', '', '1', '', 1, ''),
(61, '', '', '1', '', 1, ''),
(62, '', '', '1', '', 1, ''),
(63, '', '', '1', '', 1, ''),
(64, '', '', '1', '', 1, ''),
(65, '', '', '1', '', 1, ''),
(66, '', '', '1', '', 1, ''),
(67, '', '', '1', '', 1, ''),
(68, '', '', '1', '', 1, ''),
(69, '', 'tavanmanh1111@gmail.com', '1', '', 1, ''),
(70, '', '', '1', '', 1, ''),
(71, '', 'u@gmail.com', '1', '', 1, ''),
(72, '', 'tavanmanh1111@gmail.com', '1', '', 1, ''),
(73, 'Hoan', 'issoffical@gmail.com', '1', '9', 1, 'i');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `sanpham_anh` varchar(255) NOT NULL,
  `session_idA` varchar(255) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sanpham_tieude` varchar(255) NOT NULL,
  `sanpham_gia` float NOT NULL,
  `quantitys` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(16, 'Văn phòng phẩm'),
(18, 'Gấu bông'),
(24, 'Gia dụng'),
(25, 'Balo & Túi ví'),
(35, 'Đồ chơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `cartA_id` int(11) NOT NULL,
  `sanpham_anh` varchar(255) NOT NULL,
  `session_idA` varchar(255) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sanpham_tieude` varchar(255) NOT NULL,
  `sanpham_gia` float NOT NULL,
  `quantitys` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`cartA_id`, `sanpham_anh`, `session_idA`, `sanpham_id`, `sanpham_tieude`, `sanpham_gia`, `quantitys`) VALUES
(27, 'thước kẻ.jpeg', 'ggm4kcia5lo6u2bb6sq31k2ria', 51, 'Thước kẻ', 7000, 1),
(28, 'butchi.png', 'ggm4kcia5lo6u2bb6sq31k2ria', 41, 'but chi 88', 9898990000, 1),
(29, 'sticker.jpeg', 'ggm4kcia5lo6u2bb6sq31k2ria', 65, 'Bút chì kim', 2000, 1),
(30, 'sticker.jpeg', 'ggm4kcia5lo6u2bb6sq31k2ria', 65, 'Bút chì kim', 2000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `session_idA` varchar(50) NOT NULL,
  `tongtien` float NOT NULL,
  `date_thongke` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id_hoadon`, `session_idA`, `tongtien`, `date_thongke`) VALUES
(11, 'ggm4kcia5lo6u2bb6sq31k2ria', 9899000000, '2024-04-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loai_sp`
--

CREATE TABLE `tbl_loai_sp` (
  `id_loaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loai_sp`
--

INSERT INTO `tbl_loai_sp` (`id_loaisp`, `tenloaisp`) VALUES
(28, 'Đồ gia dụng'),
(31, 'Dụng cụ nhà'),
(75, 'Gối bông Idol'),
(79, 'Túi đeo chéo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `code_oder` varchar(255) NOT NULL,
  `session_idA` varchar(255) DEFAULT NULL,
  `register_id` int(11) NOT NULL,
  `giaohang` varchar(255) NOT NULL,
  `thanhtoan` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `code_oder`, `session_idA`, `register_id`, `giaohang`, `thanhtoan`, `order_date`, `status`) VALUES
(27, 'ggm4kcia', 'ggm4kcia5lo6u2bb6sq31k2ria', 21, 'Giao hàng chuyển phát nhanh', 'tienmat', '2024-04-19', '1'),
(28, 'ggm4kcia', 'ggm4kcia5lo6u2bb6sq31k2ria', 21, 'Giao hàng chuyển phát nhanh', 'tienmat', '2024-04-19', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` float NOT NULL,
  `vnp_bankCode` varchar(255) NOT NULL,
  `vnp_banktranno` varchar(255) NOT NULL,
  `vnp_cardtype` varchar(255) NOT NULL,
  `vnp_orderinfo` varchar(255) NOT NULL,
  `vnp_paydate` date NOT NULL,
  `vnp_tmncode` varchar(255) NOT NULL,
  `vnp_transactionno` varchar(255) NOT NULL,
  `code_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `tblbinhluan`
--
ALTER TABLE `tblbinhluan`
  ADD PRIMARY KEY (`id_binhluan`);

--
-- Chỉ mục cho bảng `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tblnhanvien`
--
ALTER TABLE `tblnhanvien`
  ADD PRIMARY KEY (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbltintuc`
--
ALTER TABLE `tbltintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- Chỉ mục cho bảng `tbltk`
--
ALTER TABLE `tbltk`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`cartA_id`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Chỉ mục cho bảng `tbl_loai_sp`
--
ALTER TABLE `tbl_loai_sp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblbinhluan`
--
ALTER TABLE `tblbinhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tblnhanvien`
--
ALTER TABLE `tblnhanvien`
  MODIFY `id_nhanvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tbltintuc`
--
ALTER TABLE `tbltintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbltk`
--
ALTER TABLE `tbltk`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `cartA_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_loai_sp`
--
ALTER TABLE `tbl_loai_sp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
