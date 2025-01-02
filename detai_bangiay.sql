-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 03:11 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `detai_bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_table`
--

CREATE TABLE `review_table` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `review_table`
--

INSERT INTO `review_table` (`id`, `review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 52, 'a', 4, 'aa', 1698721330),
(2, 52, 'a', 0, '333', 1699002980),
(3, 52, 'a', 3, '2222', 1699252318),
(4, 52, 'a', 5, '44', 1699252479),
(5, 52, 'a', 5, '44', 2023),
(6, 52, 'a', 1, 'nice products', 2023);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(4, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `code_cart` int(10) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(30) NOT NULL,
  `cart_payment` varchar(50) NOT NULL,
  `cart_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`code_cart`, `id_khachhang`, `cart_status`, `cart_date`, `cart_payment`, `cart_shipping`) VALUES
(3791, 59, 0, '2023-11-07 09:03:05', 'Tiền mặt', 8),
(3832, 52, 0, '2023-11-04 11:42:43', 'Tiền mặt', 7),
(4094, 52, 0, '2023-11-04 11:42:19', 'Tiền mặt', 7),
(4105, 52, 0, '2023-11-06 13:23:53', 'Tiền mặt', 7),
(5005, 59, 0, '2023-11-07 09:03:19', 'Ngân hàng', 8),
(5161, 52, 0, '2023-11-06 13:24:28', 'Tiền mặt', 7),
(7887, 59, 0, '2023-11-07 09:08:00', 'Tiền mặt', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(10) NOT NULL,
  `code_cart` int(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(241, 4094, 52, 1),
(242, 3832, 52, 2),
(243, 4105, 50, 2),
(244, 5161, 52, 1),
(245, 3791, 53, 1),
(246, 3791, 55, 2),
(247, 5005, 50, 2),
(248, 7887, 54, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhach` varchar(50) NOT NULL,
  `matkhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhach`, `matkhau`) VALUES
(51, 'vonhathuy', '123456'),
(52, 'a', '123456'),
(53, 'huyyyy', '123123'),
(54, 'adsa', '123123'),
(55, 'ew', '123123'),
(56, 'eqeq', '123123'),
(57, 'vonhathuyy', '123456'),
(58, 'huyyyyyyy', '123456'),
(59, 'nhathuyy', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) DEFAULT NULL,
  `thutu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(38, 'giày nam', 2),
(39, 'giày nữ', 1),
(40, 'giày suit', 1),
(41, 'giày thể thao', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `masp` int(20) NOT NULL,
  `giasp` int(15) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `soluongdaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`, `soluongdaban`) VALUES
(50, 'giày sneaker nữ', 3, 500000, 139, '1694855531_giaynu.jpg', 'dada', 'dadada', 1, 39, 13),
(51, 'giày suit', 4, 600000, 116, '1694855568_giaynam2.jpg', 'dada', 'dada', 1, 40, 9),
(52, 'Giày thể thao nam', 14, 320000, 146, '1695012547_thethaonam.jpg', 'dadada', '   dsadsadsa   ', 0, 41, 4),
(53, 'Sneaker  nam', 5, 650000, 39, '1695091523_sneaker2.jpg', 'dadsadas', 'dadsdsa', 1, 38, 6),
(54, 'Giày tây', 6, 800000, 47, '1695091599_giaytay.jpg', 'dadsadas', ' dsadsa ', 0, 40, 3),
(55, 'giày nữ', 7, 325000, 18, '1695091650_giaynutrang.png', 'dasdsa', 'dasdsa', 1, 39, 2),
(56, 'giày cao gót', 8, 1000000, 10, '1695091708_giaycaogot.jpg', 'dadsa', 'dadsa', 1, 39, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` varchar(250) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `ten`, `email`, `sdt`, `diachi`, `ghichu`, `id_dangky`) VALUES
(6, 'Võ nhật huy', 'vonhathuy1306@gmail.com', '0824446119', '11 tran khanh du TP RACH GIA', 'giao som nha', 51),
(7, 'Minh Hoàng Nguyễn', 'vnhathuy1306@gmail.com', '0123456789', 'TP RAC', 'Giao vào buổi chiều nhé', 52),
(8, 'Võ Nhật Huy', 'vonhathuy1306@gmail.com', '08244461119', 'tran khanh du kien giang', 'giao hang nhanh nhe', 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `ngaydat` varchar(30) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
('2023-11-04', 2, '960000', 3),
('2023-11-06', 2, '1320000', 3),
('2023-11-07', 3, '3900000', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankCode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `code_cart` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankCode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `code_cart`) VALUES
(0, '100000000', 'NCB', 'VNP14169313', 'ATM', 'Thanh toan GD:5005', '20231107090349', 'TF3HX0DW', '14169313', 5005);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_id` (`review_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`code_cart`),
  ADD KEY `cart_date` (`cart_date`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `code_cart` (`code_cart`),
  ADD KEY `code_cart_2` (`code_cart`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`ngaydat`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD KEY `code_cart` (`code_cart`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `review_table`
--
ALTER TABLE `review_table`
  ADD CONSTRAINT `review_table_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `tbl_dangky` (`id_dangky`);

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `tbl_dangky` (`id_dangky`);

--
-- Các ràng buộc cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD CONSTRAINT `tbl_cart_details_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`),
  ADD CONSTRAINT `tbl_cart_details_ibfk_2` FOREIGN KEY (`code_cart`) REFERENCES `tbl_cart` (`code_cart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `tbl_danhmuc` (`id_danhmuc`);

--
-- Các ràng buộc cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD CONSTRAINT `tbl_shipping_ibfk_1` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_dangky` (`id_dangky`);

--
-- Các ràng buộc cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD CONSTRAINT `tbl_vnpay_ibfk_1` FOREIGN KEY (`code_cart`) REFERENCES `tbl_cart` (`code_cart`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
