-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 08:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `AnhBD` text DEFAULT NULL,
  `NoiDungBD` text DEFAULT NULL,
  `NgayTaoBD` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baocao`
--

CREATE TABLE `baocao` (
  `MaBC` int(11) NOT NULL,
  `NoiDungBC` text DEFAULT NULL,
  `TongDoanhThu` text DEFAULT NULL,
  `NgayTaoBC` text DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `DanhGia` text DEFAULT NULL,
  `AnhBL` text DEFAULT NULL,
  `NoiDungDG` text DEFAULT NULL,
  `NgayTaoBL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `SoLuong` text DEFAULT NULL,
  `Gia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaCTSP` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `ThongSoKyThuat` text DEFAULT NULL,
  `NhaCungCap` text DEFAULT NULL,
  `BaoHanh` text DEFAULT NULL,
  `XuatXu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` text DEFAULT NULL,
  `AnhDM` text DEFAULT NULL,
  `TrangThaiDM` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `TrangThaiDH` text DEFAULT NULL,
  `TongTien` text DEFAULT NULL,
  `DiaChiGiaoHang` text DEFAULT NULL,
  `NgayTaoDH` text DEFAULT NULL,
  `PhuongThucThanhToan` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` text DEFAULT NULL,
  `AnhHSX` text DEFAULT NULL,
  `TrangThaiHSX` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
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
  `SoLuongMa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lichsutrangthaidh`
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
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaPQ` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `QLDonHang` text DEFAULT NULL,
  `QLSanPham` text DEFAULT NULL,
  `QLTaiKhoan` text DEFAULT NULL,
  `QLBinhLuan` text DEFAULT NULL,
  `QLBaoCao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `ten_quyen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` text DEFAULT NULL,
  `AnhSP` text DEFAULT NULL,
  `GiaBan` text DEFAULT NULL,
  `SoLuongTonKho` text DEFAULT NULL,
  `NgayTaoSP` text DEFAULT NULL,
  `TrangThaiSP` text DEFAULT NULL,
  `MoTaChiTiet` text DEFAULT NULL,
  `ThoiGianBaoHanh` text DEFAULT NULL,
  `HangSanXuat` int(11) DEFAULT NULL,
  `DanhMucSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
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
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `HoTen`, `TenDangNhap`, `MatKhau`, `VaiTro`, `AnhDaiDien`, `Email`, `NgaySinh`, `GioiTinh`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(3, 'admin', 'super', '$2y$12$EkIwMrbinlzNsvTjFoRoYuguGL3r7bVNLa87WbHkULkR1loPf1Dl2', 1, NULL, 'admin@admin', NULL, NULL, '0123123123', NULL, 0),
(4, 'asdsasad', 'test', '$2y$12$GSIvcf3PKK5n/MkPDdP/IeFkQm50xtp7AAD9fj53p1Q.yRLIS.MeS', 3, NULL, '123@123', NULL, NULL, '123', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `NoiDungTB` text DEFAULT NULL,
  `NgayTaoTB` text DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thongtinvanchuyen`
--

CREATE TABLE `thongtinvanchuyen` (
  `MaVC` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `DonViVC` text DEFAULT NULL,
  `MaTheoDoi` text DEFAULT NULL,
  `NgayDuKienGiaoHang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  ADD PRIMARY KEY (`MaVC`);

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
  MODIFY `MaBD` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `MaCTSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `MaPTTT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `MaVC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
