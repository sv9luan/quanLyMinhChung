-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_qlhd`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

CREATE TABLE `hoatdong` (
  `hoatDongID` int(11) NOT NULL,
  `tenHoatDong` varchar(100) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `moTa` text NOT NULL,
  `soLuong` int(11) NOT NULL,
  `diaDiem` varchar(100) NOT NULL,
  `trangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`hoatDongID`, `tenHoatDong`, `thoiGian`, `moTa`, `soLuong`, `diaDiem`, `trangThai`) VALUES
(1, 'Hội thảo sinh viên', '2024-01-02', 'Cộng 2 điểm', 9, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(2, 'Hỗ trợ tình nguyện hồ sơ nhập học sinh viên', '2024-01-03', 'Cộng 1 điểm', 99, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(3, 'Hội thao sinh viên cấp khoa ', '2024-01-03', 'Cộng 3 điểm', 12, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(4, 'Sinh viên tình nguyện ', '2024-01-03', 'Cộng 1 điểm', 10, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(5, 'Hội thảo khởi nghiệp', '2024-01-03', 'Cộng 5 điểm', 90, 'Khách sạn Mường Thanh', 1),
(6, 'Vòng chung kết khởi nghiệp 2023', '2024-01-05', 'Cộng 0 điểm', 20, 'Khách sạn TTC hotel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoaID` int(11) NOT NULL,
  `tenKhoa` varchar(50) NOT NULL,
  `khoaHocID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`khoaID`, `tenKhoa`, `khoaHocID`) VALUES
(1, 'Công Nghệ Thông Tin', 1),
(2, 'Công Nghệ Thông Tin', 2),
(3, 'Công Nghệ Thông Tin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `khoaHocID` int(11) NOT NULL,
  `khoaHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`khoaHocID`, `khoaHoc`) VALUES
(1, 2020),
(2, 2021),
(3, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lopID` int(11) NOT NULL,
  `tenLop` varchar(100) NOT NULL,
  `khoaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lopID`, `tenLop`, `khoaID`) VALUES
(1, 'Công nghệ thông tin 0120', 1),
(2, 'Kỹ thuật phầm mềm 0120\r\n', 1),
(3, 'Công Nghệ Thông Tin 0121', 2),
(4, 'Kỹ Thuật Phần Mềm 0121', 2),
(5, 'Công Nghệ Thông Tin 0122', 3),
(6, 'Kỹ Thuật Phần Mềm 0122', 3);

-- --------------------------------------------------------

--
-- Table structure for table `minhchung`
--

CREATE TABLE `minhchung` (
  `minhChungID` int(11) NOT NULL,
  `hinhAnh` varchar(200) NOT NULL,
  `thoiGian` date DEFAULT current_timestamp(),
  `thamGiaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `minhchung`
--

INSERT INTO `minhchung` (`minhChungID`, `hinhAnh`, `thoiGian`, `thamGiaID`) VALUES
(1, '1704875528_2183784.jpg', '2024-01-05', 2),
(2, '1704961177_computer.png', '2024-01-14', 1),
(3, '1704961629_neon-art-rainbow-5120x2880-12378.jpg', '2024-01-09', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` varchar(20) NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `lopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `hoTen`, `email`, `soDienThoai`, `lopID`) VALUES
('2100111', 'Nguyễn Văn An', 'nvan@gmail.com', '0368392055', 1),
('2100112', 'Lê Thị Như', 'ltnhu@gmail.com', '0368387367', 2),
('2100113', 'Trần Anh Tuấn', 'tatuan@gmail.com', '0367842312', 1),
('2100114', 'Trần Minh Anh', 'tmanh@gmail.com', '0367842457', 2),
('2100115', 'Lê Thị Diễm', 'ltdiem@gmail.com', '0368892457', 2),
('2100116', 'Nguyễn Lê Hải Âu', 'nlhau2100116@student.ctuet.edu.vn', '0123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taiKhoanID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `vaiTro` varchar(20) NOT NULL,
  `MSSV` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taiKhoanID`, `tenDangNhap`, `matKhau`, `vaiTro`, `MSSV`) VALUES
(1, '2100111', '2100111', 'sinhvien', '2100111'),
(2, 'admin', 'admin', 'admin', NULL),
(3, '2100112', 'fe0b1f43941ba17065eb0ae7bd564c96', 'sinhvien', '2100112');

-- --------------------------------------------------------

--
-- Table structure for table `thamgia`
--

CREATE TABLE `thamgia` (
  `thamGiaID` int(11) NOT NULL,
  `MSSV` varchar(20) NOT NULL,
  `hoatDongID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thamgia`
--

INSERT INTO `thamgia` (`thamGiaID`, `MSSV`, `hoatDongID`) VALUES
(1, '2100111', 1),
(2, '2100111', 2),
(4, '2100111', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`hoatDongID`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`khoaID`),
  ADD KEY `khoaHocID` (`khoaHocID`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`khoaHocID`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lopID`),
  ADD KEY `khoaID` (`khoaID`);

--
-- Indexes for table `minhchung`
--
ALTER TABLE `minhchung`
  ADD PRIMARY KEY (`minhChungID`),
  ADD KEY `thamGiaID` (`thamGiaID`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`),
  ADD KEY `lopID` (`lopID`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taiKhoanID`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Indexes for table `thamgia`
--
ALTER TABLE `thamgia`
  ADD PRIMARY KEY (`thamGiaID`),
  ADD KEY `MSSV` (`MSSV`),
  ADD KEY `hoatDongID` (`hoatDongID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `hoatDongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `khoaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `khoaHocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `minhchung`
--
ALTER TABLE `minhchung`
  MODIFY `minhChungID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `taiKhoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thamgia`
--
ALTER TABLE `thamgia`
  MODIFY `thamGiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `khoa_ibfk_1` FOREIGN KEY (`khoaHocID`) REFERENCES `khoahoc` (`khoaHocID`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`khoaID`) REFERENCES `khoa` (`khoaID`);

--
-- Constraints for table `minhchung`
--
ALTER TABLE `minhchung`
  ADD CONSTRAINT `minhchung_ibfk_1` FOREIGN KEY (`thamGiaID`) REFERENCES `thamgia` (`thamGiaID`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`lopID`) REFERENCES `lop` (`lopID`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Constraints for table `thamgia`
--
ALTER TABLE `thamgia`
  ADD CONSTRAINT `thamgia_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `thamgia_ibfk_2` FOREIGN KEY (`hoatDongID`) REFERENCES `hoatdong` (`hoatDongID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
