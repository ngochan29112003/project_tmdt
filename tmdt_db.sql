-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2024 lúc 05:15 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tmdt_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhbinhluan`
--

CREATE TABLE `anhbinhluan` (
  `id` int(11) NOT NULL,
  `MaBL` int(11) DEFAULT NULL,
  `TenAnhBL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhbinhluan`
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
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `MaBD` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `AnhBD` text DEFAULT NULL,
  `NoiDungBD` text DEFAULT NULL,
  `NgayTaoBD` text DEFAULT NULL,
  `TenBD` text DEFAULT NULL COMMENT 'TenBD',
  `TrangThaiBD` text DEFAULT NULL COMMENT 'TrangThaiBD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`MaBD`, `MaTK`, `MaSP`, `AnhBD`, `NoiDungBD`, `NgayTaoBD`, `TenBD`, `TrangThaiBD`) VALUES
(1, 4, 11, 'Giá', 'Giảm giá sâu', '2024-10-18', 'Sản phẩm giá rẻ', 'Hiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `MaBC` int(11) NOT NULL,
  `NoiDungBC` text DEFAULT NULL,
  `NgayTaoBC` text DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `LoaiBC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `DanhGia` text DEFAULT NULL,
  `NoiDungDG` text DEFAULT NULL,
  `NgayTaoBL` text DEFAULT NULL,
  `TrangThaiBL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaTK`, `MaSP`, `DanhGia`, `NoiDungDG`, `NgayTaoBL`, `TrangThaiBL`) VALUES
(14, 3, 14, '1', 'hihihi', '2024-11-06 11:17:42', '0'),
(15, 3, 14, '2', 'aaaaa', '2024-11-06 11:17:58', '0'),
(16, 4, 13, '5', 'asdasdd', '2024-11-06 18:51:59', '0'),
(18, 4, 12, '4', 'rat tot toi da su dung duoc', '2024-11-07 02:29:27', '1'),
(19, 5, 12, '3', 'aaaa', '2024-11-07 03:38:56', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` text DEFAULT NULL,
  `GiaBan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
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
(13, 13, 14, '3', '150000000'),
(14, 14, 12, '1', '140000000'),
(15, 14, 13, '1', '93990000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `id` int(11) NOT NULL,
  `MaGH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SLSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaCTSP` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `NhaCungCap` text DEFAULT NULL,
  `MoTaSP` text DEFAULT NULL,
  `XuatXu` text DEFAULT NULL,
  `ThongTinKyThuat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MaCTSP`, `MaSP`, `NhaCungCap`, `MoTaSP`, `XuatXu`, `ThongTinKyThuat`) VALUES
(1, 12, 'r', 'r', NULL, NULL),
(2, 13, 'e', 'e', 'ee', 'ee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuchsx`
--

CREATE TABLE `danhmuchsx` (
  `id` int(11) NOT NULL,
  `danh_muc` int(11) DEFAULT NULL,
  `hang_san_xuat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuchsx`
--

INSERT INTO `danhmuchsx` (`id`, `danh_muc`, `hang_san_xuat`) VALUES
(1, 29, 4),
(3, 30, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `TrangThaiDM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDM`, `TenDM`, `icon`, `TrangThaiDM`) VALUES
(29, 'Laptop', 'bi bi-laptop\n', 0),
(30, 'PC', 'bi bi-pc', 0),
(32, 'CPU', 'bi bi-cpu', 0),
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
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `TenKH` text NOT NULL,
  `SDT` int(11) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `MaTT` int(11) DEFAULT NULL,
  `TongTien` text DEFAULT NULL,
  `DiaChiGiaoHang` text DEFAULT NULL,
  `NgayTaoDH` text DEFAULT NULL,
  `MaPTTT` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaKM` int(11) DEFAULT NULL,
  `MaKMVC` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL,
  `TienHang` text DEFAULT NULL,
  `TienVC` text DEFAULT NULL,
  `GiamTienHang` text DEFAULT NULL,
  `GiamTienVc` text DEFAULT NULL,
  `ThanhToan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TenKH`, `SDT`, `GhiChu`, `MaTT`, `TongTien`, `DiaChiGiaoHang`, `NgayTaoDH`, `MaPTTT`, `MaTK`, `MaKM`, `MaKMVC`, `MaVC`, `TienHang`, `TienVC`, `GiamTienHang`, `GiamTienVc`, `ThanhToan`) VALUES
(1, 'Trần Trinh', 349510378, '', 5, '10000', 'P2, Vĩnh Long', '22/12/2024', 1, 3, 1, 1, 1, NULL, NULL, NULL, NULL, '0'),
(3, 'Nguyễn A', 436829438, '', 4, '200000000', 'Phường 4, Vĩnh Long', '30/6/2024', 1, 4, 1, 1, 1, NULL, NULL, NULL, NULL, '0'),
(8, 'chị Bảy', 123, NULL, 4, '728960000', 'nguyễn huệ, phường 2', '2024-11-07 02:53:44', 1, 4, NULL, NULL, 1, '728960000', '30000', '0', '0', '0'),
(9, 'chị Bảy', 123, NULL, 5, '138030000', 'nguyễn huệ, phường 2', '2024-11-07 03:00:37', 1, 4, 2, NULL, 1, '140000000', '30000', '2000000', '0', '0'),
(10, 'admin', 123123123, NULL, 4, '140000000', '72,nguyễn huệ', '2024-11-07 03:01:50', 1, 3, NULL, NULL, 1, '140000000', '30000', '0', '0', '0'),
(11, 'admin', 123123123, NULL, 1, '140027000', '72,nguyễn huệ', '2024-11-07 03:02:31', 1, 3, 3, NULL, 1, '140000000', '30000', '3000', '0', '0'),
(12, 'admin', 123123123, NULL, 1, '533990000', '72,nguyễn huệ', '2024-11-07 03:16:35', 1, 3, NULL, NULL, 1, '533990000', '30000', '0', '0', '0'),
(13, 'Ngọc Hân', 239582914, NULL, 5, '730500000', 'P2 VL', '2024-11-07 03:40:23', 1, 5, NULL, NULL, 1, '730500000', '30000', '0', '0', '0'),
(14, 'admin', 123123123, NULL, 1, '233990000', '72,nguyễn huệ, Tỉnh Sóc Trăng', '2024-11-27 11:07:13', 1, 3, NULL, NULL, 1, '233990000', '97000', '0', '0', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `MaVC` int(11) NOT NULL,
  `TenDonViVC` text DEFAULT NULL,
  `TienVC` text NOT NULL,
  `TrangThaiVC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvivanchuyen`
--

INSERT INTO `donvivanchuyen` (`MaVC`, `TenDonViVC`, `TienVC`, `TrangThaiVC`) VALUES
(1, 'Giao hàng tiết kiệm', '1000', 'Hiện'),
(2, 'Giao hàng nhanh', '5000', 'Hiện'),
(3, 'Giao hàng hỏa tốc', '10000', 'Hiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaTK`) VALUES
(1, 4),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` text DEFAULT NULL,
  `TrangThaiHSX` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
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
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `TenKM` text DEFAULT NULL,
  `DieuKien` text DEFAULT NULL,
  `PhanTramGiam` text DEFAULT NULL,
  `GiaTriToiDa` text DEFAULT NULL,
  `NgayBD` text DEFAULT NULL,
  `NgayKT` text DEFAULT NULL,
  `SoLuongMa` text DEFAULT NULL,
  `TrangThaiMa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `MaTK`, `TenKM`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `NgayBD`, `NgayKT`, `SoLuongMa`, `TrangThaiMa`) VALUES
(1, 4, 'giảm giá', 'đã đăng ký', '10', '1000', '2024-10-02', '2024-10-11', '5', 'ẩn'),
(2, 4, 'giảm 50%', NULL, '50', '2000000', '20/10/2024', '20/11/2024', '2', 'ẩn'),
(3, 3, 'sfs', NULL, '5', '3000', NULL, NULL, '2', 'ẩn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmaivc`
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
  `NgayKT` text NOT NULL,
  `TrangThaiMa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmaivc`
--

INSERT INTO `khuyenmaivc` (`MaKMVC`, `MaTK`, `TenKMVC`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `SoLuongMa`, `NgayBD`, `NgayKT`, `TrangThaiMa`) VALUES
(1, 4, 'Mã giảm 100%', '', '100', '35000', '4', '20/10/2024', '30/11/2024', 0),
(2, 4, 'Mã giảm 50%', '', '50', '20000', '5', '5/11/2024', '20/12/2024', 0),
(3, 3, 'Mã giảm 50%', '', '50', '20000', '4', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsutrangthaidh`
--

CREATE TABLE `lichsutrangthaidh` (
  `MaLS` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `TrangThaiCu` text DEFAULT NULL,
  `TrangThaiMoi` text DEFAULT NULL,
  `NgayThaiDoi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyenadmin`
--

CREATE TABLE `phanquyenadmin` (
  `id` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyenadmin`
--

INSERT INTO `phanquyenadmin` (`id`, `MaTK`, `MaQuyen`) VALUES
(1, 8, 1),
(2, 8, 2),
(3, 8, 3),
(4, 8, 4),
(5, 8, 5),
(6, 8, 6),
(7, 8, 7),
(8, 7, 1),
(9, 7, 3),
(10, 7, 5),
(11, 7, 7),
(12, 6, 1),
(13, 6, 2),
(14, 6, 3),
(15, 6, 4),
(16, 6, 5),
(17, 6, 6),
(18, 6, 7),
(19, 9, 1),
(20, 9, 2),
(21, 9, 3),
(25, 9, 7),
(26, 10, 3),
(27, 10, 4),
(29, 9, 6),
(30, 9, 5),
(31, 9, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPTTT`, `TenPTTT`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán trực tuyến');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyenadmin`
--

CREATE TABLE `quyenadmin` (
  `id` int(11) NOT NULL,
  `TenQuyen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyenadmin`
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
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` text DEFAULT NULL,
  `AnhSP` text DEFAULT NULL,
  `AnhCT1` text DEFAULT NULL,
  `AnhCT2` text DEFAULT NULL,
  `AnhCT3` text DEFAULT NULL,
  `AnhCT4` text DEFAULT NULL,
  `GiaBan` text DEFAULT NULL,
  `SoLuongTonKho` text DEFAULT NULL,
  `NgayTaoSP` text DEFAULT NULL,
  `TrangThaiSP` text DEFAULT NULL,
  `MoTaChiTiet` text DEFAULT NULL,
  `ThoiGianBaoHanh` text DEFAULT NULL,
  `MaDM` int(11) DEFAULT NULL,
  `MaHSX` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `AnhSP`, `AnhCT1`, `AnhCT2`, `AnhCT3`, `AnhCT4`, `GiaBan`, `SoLuongTonKho`, `NgayTaoSP`, `TrangThaiSP`, `MoTaChiTiet`, `ThoiGianBaoHanh`, `MaDM`, `MaHSX`) VALUES
(8, 'ewqe', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', NULL, NULL, NULL, NULL, '324', '432', '2024-10-18', 'Hiện', '2131', '432', 29, 2),
(12, 'PC GVN x ASUS Advanced Ai (Intel Core Ultra 9 285K/ VGA RTX 4090)', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', 'gr701_-_8_cb365132fb6e4bc8a0e87e8811ef585a_medium.png', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', 'pc_gvn_-_amd_-_a21_-_3_c71ab3cdd9bf45cb947b98f4561300b4_medium.png', 'pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp', '140000000', '100', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(13, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', 'pc_case_xigmatek_-_22_e4c822262b3d4946a6f427d02adebf8b_1024x1024.webp', 'pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', 'pc_gvn_-_amd_-_a21_-_3_c71ab3cdd9bf45cb947b98f4561300b4_medium.png', '93990000', '0', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(14, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', NULL, NULL, NULL, NULL, '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(15, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', NULL, NULL, NULL, NULL, '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(17, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', NULL, NULL, NULL, NULL, '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(18, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', NULL, NULL, NULL, NULL, '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(19, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '1732710522_AnhCT1.png', '1732710522_AnhCT2.png', '1732710522_AnhCT3.png', '1732710522_AnhCT4.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(20, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '1732710654_AnhCT1.png', '1732710654_AnhCT2.png', '1732710654_AnhCT3.png', '1732710654_AnhCT4.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(21, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', NULL, NULL, NULL, NULL, '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(22, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', NULL, NULL, NULL, NULL, '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(23, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', NULL, NULL, NULL, NULL, '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(24, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', NULL, NULL, NULL, NULL, '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(25, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', NULL, NULL, NULL, NULL, '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(26, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', NULL, NULL, NULL, NULL, '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 30, 1),
(33, 'Bàn phím Vortex 8700 MultiX Summer Brown Switch', '1732710935_AnhSP.png', '1732710935_AnhCT1.png', '1732710935_AnhCT2.png', '1732710935_AnhCT3.png', '1732710935_AnhCT4.png', '2000000', '1000', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 20),
(34, 'Bàn phím Logitech G Pro X 60 Light Speed White', '1732711093_AnhSP.png', '1732711093_AnhCT1.png', '1732711093_AnhCT2.png', '1732711093_AnhCT3.png', '1732711093_AnhCT4.png', '3820000', '100', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 1),
(35, 'Bàn phím Leopold FC750R Bluetooth Blue Grey - Brown MX2A Switch', '1732711291_AnhSP.png', '1732711291_AnhCT1.png', '1732711291_AnhCT2.png', '1732711291_AnhCT3.png', '1732711291_AnhCT4.png', '3550000', '100', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 1),
(36, 'Bàn phím Razer Huntsman V3 Pro TKL', '1732711552_AnhSP.png', '1732711552_AnhCT1.png', '1732711552_AnhCT2.png', '1732711552_AnhCT3.png', '1732711552_AnhCT4.png', '5345000', '200', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 15),
(37, 'Bàn phím cơ DareU A98 Pro TM Red Wave Dream switch', '1732711854_AnhSP.png', '1732711854_AnhCT1.png', '1732711854_AnhCT2.png', '1732711854_AnhCT3.png', '1732711854_AnhCT4.png', '2990000', '1', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 7),
(38, 'Chuột Razer Deathadder Essential White', '1732712128_AnhSP.png', '1732712128_AnhCT1.png', '1732712128_AnhCT2.png', '1732712128_AnhCT3.png', '1732712128_AnhCT4.png', '420000', '150', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 41, 9),
(39, 'Chuột AKKO Smart 1 Sailor Moon', '1732712513_AnhSP.png', '1732712513_AnhCT1.png', '1732712513_AnhCT2.png', '1732712513_AnhCT3.png', '1732712513_AnhCT4.png', '290000', '20', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 41, 1),
(40, 'Chuột DareU EM901X RGB Superlight Wireless', '1732712687_AnhSP.png', '1732712687_AnhCT1.png', '1732712687_AnhCT2.png', '1732712687_AnhCT3.png', '1732712687_AnhCT4.png', '790000', '33', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 41, 8),
(41, 'Màn hình AOC Q24G4E 24\" IPS 2K 180Hz G-Sync chuyên game', '1732712990_AnhSP.png', '1732712990_AnhCT1.png', '1732712990_AnhCT2.png', '1732712990_AnhCT3.png', '1732712990_AnhCT4.png', '4790000', '13', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 40, 8),
(42, 'Màn hình Lenovo L24i-4A 24\" IPS 100Hz', '1732713228_AnhSP.png', '1732713228_AnhCT1.png', '1732713228_AnhCT2.png', '1732713228_AnhCT3.png', '1732713228_AnhCT4.png', '2490000', '100', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 39, 20),
(43, 'Màn hình ASUS VY279HGR 27\" IPS 120Hz viền mỏng', '1732713482_AnhSP.png', '1732713482_AnhCT1.png', '1732713482_AnhCT2.png', '1732713482_AnhCT3.png', '1732713482_AnhCT4.png', '2990000', '10', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 39, 6),
(44, 'Màn hình MSI PRO MP252 25\" IPS 100Hz', '1732713775_AnhSP.png', '1732713775_AnhCT1.png', '1732713775_AnhCT2.png', '1732713775_AnhCT3.png', '1732713775_AnhCT4.png', '2190000', '10', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 39, 7),
(45, 'Màn hình Acer EK251Q G 25\" IPS 120Hz', '1732714028_AnhSP.png', '1732714028_AnhCT1.png', '1732714028_AnhCT2.png', '1732714028_AnhCT3.png', '1732714028_AnhCT4.png', '2390000', '12', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 39, 8),
(46, 'Laptop gaming Acer Nitro V ANV16 41 R6ZY', '1732714565_AnhSP.png', '1732714565_AnhCT1.png', '1732714565_AnhCT2.png', '1732714565_AnhCT3.png', '1732714565_AnhCT4.png', '25990000', '30', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 29, 8),
(47, 'Laptop gaming MSI Crosshair 16 HX D14VFKG 860VN', '1732714747_AnhSP.png', '1732714747_AnhCT1.png', '1732714747_AnhCT2.png', '1732714747_AnhCT3.png', '1732714747_AnhCT4.png', '39990000', '24', '2024-11-27', 'Hiện', 'Chính hãng', '1 năm', 29, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `HoTen` text DEFAULT NULL,
  `TenDangNhap` text DEFAULT NULL,
  `MatKhau` text DEFAULT NULL,
  `VaiTro` int(11) DEFAULT NULL,
  `AnhDaiDien` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `NgaySinh` text DEFAULT NULL,
  `GioiTinh` text DEFAULT NULL,
  `SDT` text DEFAULT NULL,
  `DiaChi` text DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `HoTen`, `TenDangNhap`, `MatKhau`, `VaiTro`, `AnhDaiDien`, `Email`, `NgaySinh`, `GioiTinh`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(3, 'admin', 'super', '$2y$12$EkIwMrbinlzNsvTjFoRoYuguGL3r7bVNLa87WbHkULkR1loPf1Dl2', 1, NULL, 'admin@admin', NULL, NULL, '0123123123', '72,nguyễn huệ', 0),
(4, 'chị Bảy', 'test', '$2y$12$GSIvcf3PKK5n/MkPDdP/IeFkQm50xtp7AAD9fj53p1Q.yRLIS.MeS', 3, NULL, '123@123', NULL, NULL, '123', 'nguyễn huệ, phường 2', 0),
(6, 'admin1', 'admin1', '$2y$12$1WO0PSPogNL9ixFbnOo6n.uuMc.7qGFrKgF2SjEulgZqH/dQ4wuDC', 2, NULL, 'admin1@gmail.com', '2003-02-22', 'Nam', '123', '123', 0),
(7, 'admin2', 'admin2', '$2y$12$ppuOZtoW7hqdV9WF2hhB7ewk/AdnrgFt5/j7ZgJq6e4eO/kWtV/Z2', 2, NULL, 'admin2@gmail.com', '2003-02-04', 'Nam', '123', '123', 0),
(8, 'admin3', 'admin3', '$2y$12$avz5MuZ8WHE62ORgnOhJuepWyyleS.2aShV..jJv4BI6iUvJU/D6O', 2, NULL, 'admin3@gmail.com', '2003-02-22', 'Nam', '123', '123', 0),
(9, 'admin4', 'admin4', '$2y$12$MjRe4L5srzcaUVSIbY5vlOXIybzkfjw2aRg9KLMMpchYNbFscfu1W', 2, NULL, 'admin4@gmail.com', '2024-11-07', 'Nam', 'aâ', 'aa', 0),
(10, 'Huyền Trân', 'huyentran', '$2y$12$f1ZBBrH.H7Ds09eGfwAwxOlrLqVUEXqp3nz3vVSDlNx2oWST3bWya', 2, NULL, 'tran@123', '2024-10-30', 'Nữ', '0332423', 'nguyễn huệ, phường 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `NoiDungTB` text DEFAULT NULL,
  `NgayTaoTB` text DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinvanchuyen`
--

CREATE TABLE `thongtinvanchuyen` (
  `MaTTVC` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL,
  `NgayDuKienGiaoHang` text DEFAULT NULL,
  `TrangThaiVC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinvanchuyen`
--

INSERT INTO `thongtinvanchuyen` (`MaTTVC`, `MaDH`, `MaVC`, `NgayDuKienGiaoHang`, `TrangThaiVC`) VALUES
(1, 1, 1, '22/10/2024', 'Đang giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhkc`
--

CREATE TABLE `tinhkc` (
  `IDKC` int(11) NOT NULL,
  `TenVT` text DEFAULT NULL,
  `SoKM` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhkc`
--

INSERT INTO `tinhkc` (`IDKC`, `TenVT`, `SoKM`) VALUES
(1, 'Thành phố Hồ Chí Minh', '140'),
(2, 'Tỉnh Bà Rịa - Vũng Tàu', '180'),
(3, 'Tỉnh Bình Dương', '140'),
(4, 'Tỉnh Bình Phước', '210'),
(5, 'Tỉnh Tây Ninh', '180'),
(6, 'Tỉnh Đồng Nai', '155'),
(7, 'Tỉnh Long An', '102'),
(8, 'Tỉnh Tiền Giang', '69'),
(9, 'Tỉnh Bến Tre', '80'),
(10, 'Tỉnh Trà Vinh', '62'),
(11, 'Thành phố Cần Thơ', '34'),
(12, 'Tỉnh Sóc Trăng', '97'),
(13, 'Tỉnh Bạc Liêu', '174'),
(14, 'Tỉnh Cà Mau', '231'),
(15, 'Tỉnh An Giang', '88'),
(16, 'Tỉnh Kiên Giang', '167'),
(17, 'Tỉnh Hậu Giang', '64'),
(18, 'Tỉnh Đồng Tháp', '75'),
(19, 'Tỉnh Ninh Thuận', '420'),
(20, 'Tỉnh Bình Thuận', '440'),
(21, 'Tỉnh Khánh Hòa', '510'),
(22, 'Thành phố Đà Nẵng', '900'),
(23, 'Tỉnh Thừa Thiên Huế', '1000'),
(24, 'Tỉnh Quảng Nam', '900'),
(25, 'Tỉnh Quãng Ngãi', '1000'),
(26, 'Tỉnh Bình Định', '1100'),
(27, 'Tỉnh Phú Yên', '1150'),
(28, 'Tỉnh Gia Lai', '1300'),
(29, 'Tỉnh Kon Tum', '1350'),
(30, 'Tỉnh Quảng Trị', '1100'),
(31, 'Tỉnh Quảng Bình', '1300'),
(32, 'Tỉnh Hà Tĩnh', '1400'),
(33, 'Tỉnh Nghệ An', '1300'),
(34, 'Tỉnh Thanh Hóa', '1400'),
(35, 'Thành phố Hải Phòng', '1600'),
(36, 'Thành phố Hà Nội', '1880'),
(37, 'Tỉnh Hòa Bình', '1750'),
(38, 'Tỉnh Sơn La', '1800'),
(39, 'Tỉnh Điện Biên', '2000'),
(40, 'Tỉnh Lai Châu', '2000'),
(41, 'Tỉnh Yên Bái', '1800'),
(42, 'Tỉnh Phú Thọ', '1750'),
(43, 'Tỉnh Vĩnh Phúc', '1700'),
(44, 'Tỉnh Tuyên Quang', '1800'),
(45, 'Tỉnh Lạng Sơn', '1900'),
(46, 'Tỉnh Bắc Giang', '1750'),
(47, 'Tỉnh Bắc Kạn', '1800'),
(48, 'Tỉnh Cao Bằng', '1900'),
(49, 'Tỉnh Hà Giang', '1900'),
(50, 'Tỉnh Lào Cai', '1800'),
(51, 'Tỉnh Hà Nam', '1650'),
(52, 'Tỉnh Nam Định', '1600'),
(53, 'Tỉnh Thái Bình', '1550'),
(54, 'Tỉnh Hưng Yên', '1650'),
(55, 'Tỉnh Quảng Ninh', '1700'),
(56, 'Tỉnh Bắc Ninh', '1650'),
(57, 'Tỉnh Vĩnh Phúc', '1700'),
(58, 'Tỉnh Bắc Giang', '1750'),
(59, 'Tỉnh Đắk Lắk', '450'),
(60, 'Tỉnh Đắk Nông', '460'),
(61, 'Tỉnh Lâm Đồng', '450'),
(62, 'Tỉnh Yên Bái', '1800');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traloibl`
--

CREATE TABLE `traloibl` (
  `MaTL` int(11) NOT NULL,
  `MaBL` int(11) DEFAULT NULL,
  `NoiDungTL` text DEFAULT NULL,
  `NgayTL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `traloibl`
--

INSERT INTO `traloibl` (`MaTL`, `MaBL`, `NoiDungTL`, `NgayTL`) VALUES
(1, 1, 'cảm ơn quý khách vì đã mua sp của chúng tôi', '2024-10-11'),
(2, 2, 'vui lòng liên hệ chúng tôi để được hỗ trợ ạ', '2024-10-16'),
(6, 1, 'dfvrgb', '2024-10-11'),
(7, 2, 'chúng tôi xin lỗi vì sự cố', '2024-10-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `MaTT` int(11) NOT NULL,
  `TenTT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`MaTT`, `TenTT`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang soạn hàng'),
(3, 'Đang chờ vận chuyển'),
(4, 'Đang vận chuyển'),
(5, 'Giao hàng thành công'),
(6, 'Huỷ đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id_vai_tro`, `ten_vai_tro`) VALUES
(1, 'Super'),
(2, 'Admin'),
(3, 'Khách Hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhbinhluan`
--
ALTER TABLE `anhbinhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`MaBD`);

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`MaBC`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCTDH`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MaCTSP`);

--
-- Chỉ mục cho bảng `danhmuchsx`
--
ALTER TABLE `danhmuchsx`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Chỉ mục cho bảng `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  ADD PRIMARY KEY (`MaVC`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGH`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHSX`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `khuyenmaivc`
--
ALTER TABLE `khuyenmaivc`
  ADD PRIMARY KEY (`MaKMVC`);

--
-- Chỉ mục cho bảng `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  ADD PRIMARY KEY (`MaLS`);

--
-- Chỉ mục cho bảng `phanquyenadmin`
--
ALTER TABLE `phanquyenadmin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPTTT`);

--
-- Chỉ mục cho bảng `quyenadmin`
--
ALTER TABLE `quyenadmin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`);

--
-- Chỉ mục cho bảng `thongtinvanchuyen`
--
ALTER TABLE `thongtinvanchuyen`
  ADD PRIMARY KEY (`MaTTVC`);

--
-- Chỉ mục cho bảng `traloibl`
--
ALTER TABLE `traloibl`
  ADD PRIMARY KEY (`MaTL`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`MaTT`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vai_tro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhbinhluan`
--
ALTER TABLE `anhbinhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `MaCTSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuchsx`
--
ALTER TABLE `danhmuchsx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  MODIFY `MaVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khuyenmaivc`
--
ALTER TABLE `khuyenmaivc`
  MODIFY `MaKMVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  MODIFY `MaLS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phanquyenadmin`
--
ALTER TABLE `phanquyenadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quyenadmin`
--
ALTER TABLE `quyenadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongtinvanchuyen`
--
ALTER TABLE `thongtinvanchuyen`
  MODIFY `MaTTVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `traloibl`
--
ALTER TABLE `traloibl`
  MODIFY `MaTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `MaTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
