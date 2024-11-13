-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2024 at 09:04 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anhbinhluan`
--

CREATE TABLE `anhbinhluan` (
  `id` int(11) NOT NULL,
  `MaBL` int(11) DEFAULT NULL,
  `TenAnhBL` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anhbinhluan`
--

INSERT INTO `anhbinhluan` (`id`, `MaBL`, `TenAnhBL`) VALUES
(52, 14, 'hq720.jpg'),
(53, 14, 'images.jpg'),
(54, 15, 'Screenshot (2).png'),
(55, 15, 'Screenshot 2024-10-29 165744.png'),
(56, 15, 'Screenshot 2024-11-01 071815.png'),
(57, 16, 'Screenshot 2024-11-06 173713.png'),
(58, 16, 'Screenshot 2024-11-06 173803.png'),
(59, 17, 'Screenshot 2024-11-06 173704.png'),
(60, 17, 'Screenshot 2024-11-06 173713.png'),
(61, 17, 'Screenshot 2024-11-06 173803.png'),
(62, 18, 'Screenshot 2024-11-06 173704.png'),
(63, 18, 'Screenshot 2024-11-06 173713.png'),
(64, 18, 'Screenshot 2024-11-06 173803.png'),
(65, 19, 'Screenshot (2).png'),
(66, 19, 'Screenshot 2024-10-29 165744.png'),
(67, 19, 'Screenshot 2024-11-01 071815.png');

-- --------------------------------------------------------

--
-- Table structure for table `baidang`
--

CREATE TABLE `baidang` (
  `MaBD` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `AnhBD` text,
  `NoiDungBD` text,
  `NgayTaoBD` text,
  `TenBD` text COMMENT 'TenBD',
  `TrangThaiBD` text COMMENT 'TrangThaiBD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baidang`
--

INSERT INTO `baidang` (`MaBD`, `MaTK`, `MaSP`, `AnhBD`, `NoiDungBD`, `NgayTaoBD`, `TenBD`, `TrangThaiBD`) VALUES
(1, 4, 11, 'Giá', 'Giảm giá sâu', '2024-10-18', 'Sản phẩm giá rẻ', 'Hiện');

-- --------------------------------------------------------

--
-- Table structure for table `baocao`
--

CREATE TABLE `baocao` (
  `MaBC` int(11) NOT NULL,
  `NoiDungBC` text,
  `NgayTaoBC` text,
  `MaTK` int(11) DEFAULT NULL,
  `LoaiBC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `DanhGia` text,
  `NoiDungDG` text,
  `NgayTaoBL` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaTK`, `MaSP`, `DanhGia`, `NoiDungDG`, `NgayTaoBL`) VALUES
(14, 3, 14, '1', 'hihihi', '2024-11-06 11:17:42'),
(15, 3, 14, '2', 'aaaaa', '2024-11-06 11:17:58'),
(16, 4, 13, '5', 'asdasdd', '2024-11-06 18:51:59'),
(18, 4, 12, '4', 'rat tot toi da su dung duoc', '2024-11-07 02:29:27'),
(19, 5, 12, '3', 'aaaa', '2024-11-07 03:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` text,
  `GiaBan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCTDH`, `MaDH`, `MaSP`, `SoLuong`, `GiaBan`) VALUES
(1, 8, 12, '4', '140000000'),
(2, 8, 13, '1', '93990000'),
(3, 8, 17, '2', '24990000'),
(4, 8, 18, '1', '24990000'),
(5, 9, 12, '1', '140000000'),
(6, 10, 12, '1', '140000000'),
(7, 11, 12, '1', '140000000'),
(8, 12, 12, '1', '140000000'),
(9, 12, 13, '1', '93990000'),
(10, 12, 14, '2', '150000000'),
(11, 13, 13, '1', '500000'),
(12, 13, 12, '2', '140000000'),
(13, 13, 14, '3', '150000000');

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `id` int(11) NOT NULL,
  `MaGH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SLSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaCTSP` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `NhaCungCap` text,
  `BaoHanh` text,
  `XuatXu` text,
  `CPU` text,
  `Ram` text,
  `Storage` text,
  `Graphics` text,
  `MoTaSP` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MaCTSP`, `MaSP`, `NhaCungCap`, `BaoHanh`, `XuatXu`, `CPU`, `Ram`, `Storage`, `Graphics`, `MoTaSP`) VALUES
(1, 12, 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` text,
  `icon` text,
  `TrangThaiDM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDM`, `TenDM`, `icon`, `TrangThaiDM`) VALUES
(29, 'Laptop', 'bi bi-laptop\n', 0),
(30, 'PC', 'bi bi-pc', 0),
(31, 'Mainboard', 'bi bi-motherboard', 0),
(32, 'CPU', 'bi bi-cpu', 0),
(33, 'GPU', 'bi bi-gpu-card', 0),
(34, 'CASE', 'bi bi-pc', 0),
(35, 'PSU', 'bi bi-power', 0),
(36, 'Tản nhiệt', 'bi bi-fan', 0),
(37, 'RAM', 'bi bi-memory', 0),
(38, 'Lưu trữ', 'bi bi-hdd-stack', 0),
(39, 'Màn hình', 'bi bi-display', 0),
(40, 'Bàn phím', 'bi bi-keyboard', 0),
(41, 'Chuột', 'bi bi-mouse', 0),
(42, 'Tai nghe', 'bi bi-headphones', 0),
(43, 'Phụ kiện', 'bi bi-controller', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `TenKH` text NOT NULL,
  `SDT` int(11) NOT NULL,
  `GhiChu` text,
  `MaTT` int(11) DEFAULT NULL,
  `TongTien` text,
  `DiaChiGiaoHang` text,
  `NgayTaoDH` text,
  `MaPTTT` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaKM` int(11) DEFAULT NULL,
  `MaKMVC` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL,
  `TienHang` text,
  `TienVC` text,
  `GiamTienHang` text,
  `GiamTienVc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TenKH`, `SDT`, `GhiChu`, `MaTT`, `TongTien`, `DiaChiGiaoHang`, `NgayTaoDH`, `MaPTTT`, `MaTK`, `MaKM`, `MaKMVC`, `MaVC`, `TienHang`, `TienVC`, `GiamTienHang`, `GiamTienVc`) VALUES
(1, 'Trần Trinh', 349510378, '', 5, '10000', 'P2, Vĩnh Long', '22/12/2024', 1, 3, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Nguyễn A', 436829438, '', 4, '200000000', 'Phường 4, Vĩnh Long', '30/6/2024', 1, 4, 1, 1, 1, NULL, NULL, NULL, NULL),
(8, 'chị Bảy', 123, NULL, 1, '728960000', 'nguyễn huệ, phường 2', '2024-11-07 02:53:44', 1, 4, NULL, NULL, 1, '728960000', '30000', '0', '0'),
(9, 'chị Bảy', 123, NULL, 5, '138030000', 'nguyễn huệ, phường 2', '2024-11-07 03:00:37', 1, 4, 2, NULL, 1, '140000000', '30000', '2000000', '0'),
(10, 'admin', 123123123, NULL, 2, '140000000', '72,nguyễn huệ', '2024-11-07 03:01:50', 1, 3, NULL, NULL, 1, '140000000', '30000', '0', '0'),
(11, 'admin', 123123123, NULL, 1, '140027000', '72,nguyễn huệ', '2024-11-07 03:02:31', 1, 3, 3, NULL, 1, '140000000', '30000', '3000', '0'),
(12, 'admin', 123123123, NULL, 1, '533990000', '72,nguyễn huệ', '2024-11-07 03:16:35', 1, 3, NULL, NULL, 1, '533990000', '30000', '0', '0'),
(13, 'Ngọc Hân', 239582914, NULL, 5, '730500000', 'P2 VL', '2024-11-07 03:40:23', 1, 5, NULL, NULL, 1, '730500000', '30000', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `MaVC` int(11) NOT NULL,
  `TenDonViVC` text,
  `TienVC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvivanchuyen`
--

INSERT INTO `donvivanchuyen` (`MaVC`, `TenDonViVC`, `TienVC`) VALUES
(1, 'Giao hàng tiết kiệm', '30000'),
(2, 'Giao hàng nhanh', '50000'),
(3, 'Giao hàng hỏa tốc', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaTK`) VALUES
(1, 4),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` text,
  `TrangThaiHSX` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHSX`, `TenHSX`, `TrangThaiHSX`) VALUES
(1, 'Asus', 'Hiện'),
(4, 'Dell', 'Hiện'),
(5, 'HP', 'Hiện'),
(6, 'Apple', 'Hiện'),
(7, 'LG', 'Hiện'),
(8, 'Acer', 'Hiện'),
(9, 'MSI', 'Hiện'),
(10, 'Lenovo', 'Hiện'),
(11, 'Kingston', 'Hiện'),
(12, 'Cosair', 'Hiện'),
(13, 'G.Skill', 'Hiện'),
(14, 'PNY', 'Hiện'),
(15, 'GIGABYTE', 'Hiện'),
(16, 'Patriot', 'Hiện'),
(17, 'Adata', 'Hiện'),
(18, 'Logitech', 'Hiện'),
(19, 'Razer', 'Hiện'),
(20, 'Pulsar', 'Hiện'),
(21, 'Microsoft', 'Hiện'),
(22, 'Steelseries', 'Hiện'),
(23, 'Glorious', 'Hiện'),
(24, 'Rapoo', 'Hiện');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `TenKM` text,
  `DieuKien` text,
  `PhanTramGiam` text,
  `GiaTriToiDa` text,
  `NgayBD` text,
  `NgayKT` text,
  `SoLuongMa` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `MaTK`, `TenKM`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `NgayBD`, `NgayKT`, `SoLuongMa`) VALUES
(1, 4, 'giảm giá', 'đã đăng ký', '10', '1000', '2024-10-02', '2024-10-11', '5'),
(2, 4, 'giảm 50%', NULL, '50', '2000000', '20/10/2024', '20/11/2024', '2'),
(3, 3, 'sfs', NULL, '5', '3000', NULL, NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmaivc`
--

CREATE TABLE `khuyenmaivc` (
  `MaKMVC` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `TenKMVC` text NOT NULL,
  `DieuKien` text NOT NULL,
  `PhanTramGiam` text NOT NULL,
  `GiaTriToiDa` text NOT NULL,
  `SoLuongMa` text NOT NULL,
  `NgayBD` text NOT NULL,
  `NgayKT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmaivc`
--

INSERT INTO `khuyenmaivc` (`MaKMVC`, `MaTK`, `TenKMVC`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `SoLuongMa`, `NgayBD`, `NgayKT`) VALUES
(1, 4, 'Mã giảm 100%', '', '100', '35000', '4', '20/10/2024', '30/11/2024'),
(2, 4, 'Mã giảm 50%', '', '50', '20000', '5', '5/11/2024', '20/12/2024'),
(3, 3, 'Mã giảm 50%', '', '50', '20000', '4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lichsutrangthaidh`
--

CREATE TABLE `lichsutrangthaidh` (
  `MaLS` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `TrangThaiCu` text,
  `TrangThaiMoi` text,
  `NgayThaiDoi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phanquyenadmin`
--

CREATE TABLE `phanquyenadmin` (
  `id` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phanquyenadmin`
--

INSERT INTO `phanquyenadmin` (`id`, `MaTK`, `MaQuyen`) VALUES
(30, 8, 1),
(31, 8, 2),
(32, 8, 3),
(33, 8, 4),
(34, 8, 5),
(35, 8, 6),
(36, 8, 7),
(44, 7, 1),
(45, 7, 3),
(46, 7, 5),
(47, 7, 7),
(55, 6, 1),
(56, 6, 2),
(57, 6, 3),
(58, 6, 4),
(59, 6, 5),
(60, 6, 6),
(61, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPTTT`, `TenPTTT`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán trực tuyến');

-- --------------------------------------------------------

--
-- Table structure for table `quyenadmin`
--

CREATE TABLE `quyenadmin` (
  `id` int(11) NOT NULL,
  `TenQuyen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyenadmin`
--

INSERT INTO `quyenadmin` (`id`, `TenQuyen`) VALUES
(1, 'Quản lý danh mục'),
(2, 'Quản lý hãng sản xuất'),
(3, 'Quản lý sản phẩm'),
(4, 'Quản lý đơn hàng'),
(5, 'Quản lý vận chuyển'),
(6, 'Quản lý bài đăng '),
(7, 'Quản lý bình luận ');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` text,
  `AnhSP` text,
  `GiaBan` text,
  `SoLuongTonKho` text,
  `NgayTaoSP` text,
  `TrangThaiSP` text,
  `MoTaChiTiet` text,
  `ThoiGianBaoHanh` text,
  `MaDM` int(11) DEFAULT NULL,
  `MaHSX` int(11) DEFAULT NULL,
  `AnhCT1` text,
  `AnhCT2` text,
  `AnhCT3` text,
  `AnhCT4` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `AnhSP`, `GiaBan`, `SoLuongTonKho`, `NgayTaoSP`, `TrangThaiSP`, `MoTaChiTiet`, `ThoiGianBaoHanh`, `MaDM`, `MaHSX`, `AnhCT1`, `AnhCT2`, `AnhCT3`, `AnhCT4`) VALUES
(8, 'ewqe', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '324', '432', '2024-10-18', 'Hiện', '2131', '432', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'hihihi', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '10000000', '3', '2024-10-01', 'Ẩn', 'hihi', '1 tháng', 1, 1, NULL, NULL, NULL, NULL),
(11, 'Iphone 16 Pro Max', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '36500000', '100', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 4, 6, NULL, NULL, NULL, NULL),
(12, 'PC GVN x ASUS Advanced Ai (Intel Core Ultra 9 285K/ VGA RTX 4090)', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '140000000', '-5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, 'gr701_-_8_cb365132fb6e4bc8a0e87e8811ef585a_medium.png', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', 'pc_gvn_-_amd_-_a21_-_3_c71ab3cdd9bf45cb947b98f4561300b4_medium.png', 'pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp'),
(13, 'Chuột logitech', 'images.jpg', '500000', '2', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(14, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '0', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(15, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(17, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '3', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(18, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '4', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(19, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(20, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(21, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(22, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(23, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(24, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(25, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(26, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1, NULL, NULL, NULL, NULL),
(28, 'chuot', 'images.jpg', '213122', '5', '2024-11-01', 'Ẩn', '3dsfafs', '1 tháng', 3, 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `HoTen` text,
  `TenDangNhap` text,
  `MatKhau` text,
  `VaiTro` int(11) DEFAULT NULL,
  `AnhDaiDien` text,
  `Email` text,
  `NgaySinh` text,
  `GioiTinh` text,
  `SDT` text,
  `DiaChi` text,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `HoTen`, `TenDangNhap`, `MatKhau`, `VaiTro`, `AnhDaiDien`, `Email`, `NgaySinh`, `GioiTinh`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(3, 'admin', 'super', '$2y$12$EkIwMrbinlzNsvTjFoRoYuguGL3r7bVNLa87WbHkULkR1loPf1Dl2', 1, NULL, 'admin@admin', NULL, NULL, '0123123123', '72,nguyễn huệ', 0),
(4, 'chị Bảy', 'test', '$2y$12$GSIvcf3PKK5n/MkPDdP/IeFkQm50xtp7AAD9fj53p1Q.yRLIS.MeS', 3, NULL, '123@123', NULL, NULL, '123', 'nguyễn huệ, phường 2', 0),
(5, 'Ngọc Hân', 'danhtran', '$2y$12$1wUEU/EdLsA9vJvU94khV.Y79/e4rxB0qAcFmYwtw89mqxr3Kr3tG', 3, NULL, 'danh@123', NULL, NULL, '0123456789', NULL, 0),
(6, 'admin1', 'admin1', '$2y$12$1WO0PSPogNL9ixFbnOo6n.uuMc.7qGFrKgF2SjEulgZqH/dQ4wuDC', 2, NULL, 'admin1@gmail.com', '2003-02-22', 'Nam', '123', '123', 0),
(7, 'admin2', 'admin2', '$2y$12$ppuOZtoW7hqdV9WF2hhB7ewk/AdnrgFt5/j7ZgJq6e4eO/kWtV/Z2', 2, NULL, 'admin2@gmail.com', '2003-02-04', 'Nam', '123', '123', 0),
(8, 'admin3', 'admin3', '$2y$12$avz5MuZ8WHE62ORgnOhJuepWyyleS.2aShV..jJv4BI6iUvJU/D6O', 2, NULL, 'admin3@gmail.com', '2003-02-22', 'Nam', '123', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `NoiDungTB` text,
  `NgayTaoTB` text,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thongtinvanchuyen`
--

CREATE TABLE `thongtinvanchuyen` (
  `MaTTVC` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL,
  `NgayDuKienGiaoHang` text,
  `TrangThaiVC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thongtinvanchuyen`
--

INSERT INTO `thongtinvanchuyen` (`MaTTVC`, `MaDH`, `MaVC`, `NgayDuKienGiaoHang`, `TrangThaiVC`) VALUES
(1, 1, 1, '22/10/2024', 'Đang giao');

-- --------------------------------------------------------

--
-- Table structure for table `traloibl`
--

CREATE TABLE `traloibl` (
  `MaTL` int(11) NOT NULL,
  `MaBL` int(11) DEFAULT NULL,
  `NoiDungTL` text,
  `NgayTL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traloibl`
--

INSERT INTO `traloibl` (`MaTL`, `MaBL`, `NoiDungTL`, `NgayTL`) VALUES
(1, 1, 'cảm ơn quý khách vì đã mua sp của chúng tôi', '2024-10-11'),
(2, 2, 'vui lòng liên hệ chúng tôi để được hỗ trợ ạ', '2024-10-16'),
(6, 1, 'dfvrgb', '2024-10-11'),
(7, 2, 'chúng tôi xin lỗi vì sự cố', '2024-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `MaTT` int(11) NOT NULL,
  `TenTT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`MaTT`, `TenTT`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang soạn hàng'),
(3, 'Đang chờ vận chuyển'),
(4, 'Đang vận chuyển'),
(5, 'Giao hàng thành công');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id_vai_tro`, `ten_vai_tro`) VALUES
(1, 'Super'),
(2, 'Admin'),
(3, 'Khách Hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anhbinhluan`
--
ALTER TABLE `anhbinhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`MaBD`);

--
-- Indexes for table `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`MaBC`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCTDH`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MaCTSP`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Indexes for table `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  ADD PRIMARY KEY (`MaVC`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGH`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHSX`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Indexes for table `khuyenmaivc`
--
ALTER TABLE `khuyenmaivc`
  ADD PRIMARY KEY (`MaKMVC`);

--
-- Indexes for table `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  ADD PRIMARY KEY (`MaLS`);

--
-- Indexes for table `phanquyenadmin`
--
ALTER TABLE `phanquyenadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPTTT`);

--
-- Indexes for table `quyenadmin`
--
ALTER TABLE `quyenadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`);

--
-- Indexes for table `thongtinvanchuyen`
--
ALTER TABLE `thongtinvanchuyen`
  ADD PRIMARY KEY (`MaTTVC`);

--
-- Indexes for table `traloibl`
--
ALTER TABLE `traloibl`
  ADD PRIMARY KEY (`MaTL`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`MaTT`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vai_tro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anhbinhluan`
--
ALTER TABLE `anhbinhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `MaCTSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  MODIFY `MaVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khuyenmaivc`
--
ALTER TABLE `khuyenmaivc`
  MODIFY `MaKMVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  MODIFY `MaLS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phanquyenadmin`
--
ALTER TABLE `phanquyenadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quyenadmin`
--
ALTER TABLE `quyenadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thongtinvanchuyen`
--
ALTER TABLE `thongtinvanchuyen`
  MODIFY `MaTTVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traloibl`
--
ALTER TABLE `traloibl`
  MODIFY `MaTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `MaTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
