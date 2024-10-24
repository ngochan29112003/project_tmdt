-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2024 at 09:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt_db`
--

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
  `AnhBL` text,
  `NoiDungDG` text,
  `NgayTaoBL` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaTK`, `MaSP`, `DanhGia`, `AnhBL`, `NoiDungDG`, `NgayTaoBL`) VALUES
(1, 4, 2, '5 sao', NULL, 'san pham dep, tot', '30/06/2024');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` text,
  `Gia` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`id`, `MaGH`, `MaSP`, `SLSanPham`) VALUES
(1, 1, 12, 1),
(2, 1, 13, 1),
(3, 1, 17, 2),
(4, 1, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaCTSP` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `ThongSoKyThuat` text,
  `NhaCungCap` text,
  `BaoHanh` text,
  `XuatXu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` text,
  `TrangThaiDM` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDM`, `TenDM`, `TrangThaiDM`) VALUES
(1, 'Laptop', 'Hiện'),
(3, 'RAM', 'Ẩn'),
(4, 'Điện thoại', 'Hiện'),
(5, 'PC', 'Hiện');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `TrangThaiDH` text,
  `TongTien` text,
  `DiaChiGiaoHang` text,
  `NgayTaoDH` text,
  `MaPTTT` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaKM` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaSP`, `TrangThaiDH`, `TongTien`, `DiaChiGiaoHang`, `NgayTaoDH`, `MaPTTT`, `MaTK`, `MaKM`, `MaVC`) VALUES
(1, 8, 'Hiện', '10000', 'P2, Vĩnh Long', '22/12/2024', 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `MaVC` int(11) NOT NULL,
  `TenDonViVC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvivanchuyen`
--

INSERT INTO `donvivanchuyen` (`MaVC`, `TenDonViVC`) VALUES
(1, 'Công ty giao hàng tiết kiệm');

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
(1, 4);

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
(1, 'Asus', 'Hien'),
(4, 'Dell', 'Hiện'),
(5, 'HP', 'Hiện'),
(6, 'Apple', 'Hiện');

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
(1, 3, 'giảm giá', 'đã đăng ký', '10', '1000', '12/02/2024', '12/03/2024', '5');

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
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaPQ` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `QLDonHang` text,
  `QLSanPham` text,
  `QLTaiKhoan` text,
  `QLBinhLuan` text,
  `QLBaoCao` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `ten_quyen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `MaHSX` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `AnhSP`, `GiaBan`, `SoLuongTonKho`, `NgayTaoSP`, `TrangThaiSP`, `MoTaChiTiet`, `ThoiGianBaoHanh`, `MaDM`, `MaHSX`) VALUES
(8, 'ewqe', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '324', '432', '2024-10-18', 'Hiện', '2131', '432', NULL, NULL),
(10, 'hihihi', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '10000000', '3', '2024-10-01', 'Ẩn', 'hihi', '3 tháng', 1, 1),
(11, 'Iphone 16 Pro Max', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '36500000', '100', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 4, 6),
(12, 'PC GVN x ASUS Advanced Ai (Intel Core Ultra 9 285K/ VGA RTX 4090)', 'pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png', '140000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(13, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(14, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(15, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(17, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(18, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(19, 'PC GVN x MSI PROJECT ZERO WHITE (Intel i5-14400F/ VGA RTX 4060)', 'thumb_project_zero_c58860d9fa3a409294c17ab45f46f612_medium.png', '24990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(20, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(21, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(22, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(23, 'PC GVN x AORUS XTREME ICE (Intel i9-14900K/ VGA RTX 4080 Super)', 'pc_gvn_x_gigabyte__ice__-_32_e797aed458a94914b78e491d8c7a5ccb_medium.png', '150000000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(24, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(25, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1),
(26, 'PC GVN x MSI Dragon ACE (Intel i9-14900K/ VGA RTX 4080 Super)', 'artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png', '93990000', '5', '2024-10-03', 'Hiện', 'chính hãng', '1 năm', 5, 1);

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
(3, 'admin', 'super', '$2y$12$EkIwMrbinlzNsvTjFoRoYuguGL3r7bVNLa87WbHkULkR1loPf1Dl2', 1, NULL, 'admin@admin', NULL, NULL, '0123123123', NULL, 0),
(4, 'chị Bảy', 'test', '$2y$12$GSIvcf3PKK5n/MkPDdP/IeFkQm50xtp7AAD9fj53p1Q.yRLIS.MeS', 3, NULL, '123@123', NULL, NULL, '123', NULL, 0);

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
  `TieuDe` text,
  `NoiDungTL` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  ADD PRIMARY KEY (`MaLS`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaPQ`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPTTT`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
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
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vai_tro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baidang`
--
ALTER TABLE `baidang`
  MODIFY `MaBD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baocao`
--
ALTER TABLE `baocao`
  MODIFY `MaBC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `MaCTSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  MODIFY `MaVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lichsutrangthaidh`
--
ALTER TABLE `lichsutrangthaidh`
  MODIFY `MaLS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaPQ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `MaTL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
