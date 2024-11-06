-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 06, 2024 lúc 07:42 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 8.1.25

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
  `TenAnhBL` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `anhbinhluan`
--

INSERT INTO `anhbinhluan` (`id`, `MaBL`, `TenAnhBL`) VALUES
(52, 14, 'hq720.jpg'),
(53, 14, 'images.jpg'),
(54, 15, 'Screenshot (2).png'),
(55, 15, 'Screenshot 2024-10-29 165744.png'),
(56, 15, 'Screenshot 2024-11-01 071815.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
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
  `NoiDungBC` text,
  `NgayTaoBC` text,
  `MaTK` int(11) DEFAULT NULL,
  `LoaiBC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
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
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaTK`, `MaSP`, `DanhGia`, `NoiDungDG`, `NgayTaoBL`) VALUES
(14, 3, 14, '1', 'bo con', '2024-11-06 11:17:42'),
(15, 3, 14, '2', 'jac', '2024-11-06 11:17:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
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
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `id` int(11) NOT NULL,
  `MaGH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SLSanPham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`id`, `MaGH`, `MaSP`, `SLSanPham`) VALUES
(1, 1, 12, 3),
(2, 1, 13, 1),
(3, 1, 17, 2),
(4, 1, 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
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
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDM` int(11) NOT NULL,
  `TenDM` text,
  `TrangThaiDM` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDM`, `TenDM`, `TrangThaiDM`) VALUES
(1, 'Laptop', 'Hiện'),
(3, 'RAM', 'Ẩn'),
(4, 'Điện thoại', 'Hiện'),
(5, 'PC', 'Hiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `TenKH` text NOT NULL,
  `SDT` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `GhiChu` text NOT NULL,
  `MaTT` int(11) DEFAULT NULL,
  `TongTien` text,
  `DiaChiGiaoHang` text,
  `NgayTaoDH` text,
  `MaPTTT` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaKM` int(11) DEFAULT NULL,
  `MaKMVC` int(11) NOT NULL,
  `MaVC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TenKH`, `SDT`, `MaSP`, `GhiChu`, `MaTT`, `TongTien`, `DiaChiGiaoHang`, `NgayTaoDH`, `MaPTTT`, `MaTK`, `MaKM`, `MaKMVC`, `MaVC`) VALUES
(1, 'Trần Trinh', 349510378, 13, '', 5, '10000', 'P2, Vĩnh Long', '22/12/2024', 1, 3, 1, 1, 1),
(3, 'Nguyễn A', 436829438, 12, '', 4, '200000000', 'Phường 4, Vĩnh Long', '30/6/2024', 1, 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `MaVC` int(11) NOT NULL,
  `TenDonViVC` text,
  `TienVC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donvivanchuyen`
--

INSERT INTO `donvivanchuyen` (`MaVC`, `TenDonViVC`, `TienVC`) VALUES
(1, 'Giao hàng tiết kiệm', '30000'),
(2, 'Giao hàng nhanh', '50000'),
(3, 'Giao hàng hỏa tốc', '100000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaTK`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` text,
  `TrangThaiHSX` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHSX`, `TenHSX`, `TrangThaiHSX`) VALUES
(1, 'Asus', 'Hien'),
(4, 'Dell', 'Hiện'),
(5, 'HP', 'Hiện'),
(6, 'Apple', 'Hiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
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
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `MaTK`, `TenKM`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `NgayBD`, `NgayKT`, `SoLuongMa`) VALUES
(1, 4, 'giảm giá', 'đã đăng ký', '10', '1000', '2024-10-02', '2024-10-11', '5'),
(2, 4, 'giảm 50%', NULL, '50', '2000000', '20/10/2024', '20/11/2024', '3'),
(3, 3, 'sfs', NULL, '5', '3000', NULL, NULL, '3');

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
  `NgayKT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyenmaivc`
--

INSERT INTO `khuyenmaivc` (`MaKMVC`, `MaTK`, `TenKMVC`, `DieuKien`, `PhanTramGiam`, `GiaTriToiDa`, `SoLuongMa`, `NgayBD`, `NgayKT`) VALUES
(1, 4, 'Mã giảm 100%', '', '100', '35000', '4', '20/10/2024', '30/11/2024'),
(2, 4, 'Mã giảm 50%', '', '50', '20000', '5', '5/11/2024', '20/12/2024'),
(3, 3, 'Mã giảm 50%', '', '50', '20000', '4', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsutrangthaidh`
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
-- Cấu trúc bảng cho bảng `phanquyen`
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
-- Cấu trúc bảng cho bảng `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPTTT`, `TenPTTT`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán trực tuyến');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
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
-- Đang đổ dữ liệu cho bảng `sanpham`
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
-- Cấu trúc bảng cho bảng `taikhoan`
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
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `HoTen`, `TenDangNhap`, `MatKhau`, `VaiTro`, `AnhDaiDien`, `Email`, `NgaySinh`, `GioiTinh`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(3, 'admin', 'super', '$2y$12$EkIwMrbinlzNsvTjFoRoYuguGL3r7bVNLa87WbHkULkR1loPf1Dl2', 1, NULL, 'admin@admin', NULL, NULL, '0123123123', '72,nguyễn huệ', 0),
(4, 'chị Bảy', 'test', '$2y$12$GSIvcf3PKK5n/MkPDdP/IeFkQm50xtp7AAD9fj53p1Q.yRLIS.MeS', 3, NULL, '123@123', NULL, NULL, '123', 'nguyễn huệ, phường 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `NoiDungTB` text,
  `NgayTaoTB` text,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinvanchuyen`
--

CREATE TABLE `thongtinvanchuyen` (
  `MaTTVC` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaVC` int(11) DEFAULT NULL,
  `NgayDuKienGiaoHang` text,
  `TrangThaiVC` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongtinvanchuyen`
--

INSERT INTO `thongtinvanchuyen` (`MaTTVC`, `MaDH`, `MaVC`, `NgayDuKienGiaoHang`, `TrangThaiVC`) VALUES
(1, 1, 1, '22/10/2024', 'Đang giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traloibl`
--

CREATE TABLE `traloibl` (
  `MaTL` int(11) NOT NULL,
  `MaBL` int(11) DEFAULT NULL,
  `NoiDungTL` text,
  `NgayTL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`MaTT`, `TenTT`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang soạn hàng'),
(3, 'Đang chờ vận chuyển'),
(4, 'Đang vận chuyển'),
(5, 'Giao hàng thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhbinhluan`
--
ALTER TABLE `anhbinhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
