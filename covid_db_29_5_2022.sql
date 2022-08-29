-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 07:14 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `htdieuphoibncovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `MaBenhNhan` int(11) NOT NULL auto_increment,
  `TenBenhNhan` varchar(60) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(40) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `QueQuan` varchar(50) collate utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(100) collate utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) default NULL,
  `NoiDieuTri` varchar(100) collate utf8_unicode_ci default NULL,
  `GioiTinh` tinyint(4) NOT NULL,
  `CMND` varchar(30) collate utf8_unicode_ci NOT NULL,
  `QuocTich` varchar(30) collate utf8_unicode_ci default NULL,
  `MaBV` varchar(20) collate utf8_unicode_ci default NULL,
  `MaPhuong` varchar(35) collate utf8_unicode_ci default NULL,
  `SoDienThoai_TK` varchar(15) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MaBenhNhan`),
  KEY `SoDienThoai_TK` (`SoDienThoai_TK`),
  KEY `MaPhuong` (`MaPhuong`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`MaBenhNhan`, `TenBenhNhan`, `Email`, `SoDienThoai`, `QueQuan`, `NgaySinh`, `DiaChi`, `TrangThai`, `NoiDieuTri`, `GioiTinh`, `CMND`, `QuocTich`, `MaBV`, `MaPhuong`, `SoDienThoai_TK`) VALUES
(1, 'Dương Mộng Khánh', 'mongkhanh@gmail.com', '0988154619', 'An Giang', '2001-02-19', '29 Lê Đức Thọ', 1, 'TP HCM', 1, '089201012234', 'Việt Nam', 'BVDCNO6', 'P7GV', '0988154619'),
(2, 'Trương Thành Đạt', 'dat09@gmail.com', '0913474835', 'Tiền Giang', '2001-04-10', '60 Nguyễn Huệ', 1, 'TP HCM', 1, '012201012234', 'Việt Nam', 'CSCLQUANGV7', 'P7GV', '0913474835'),
(3, 'Nguyễn Trương Thiên Long', 'thienlong@gmail.com', '0955564789', 'TP HCM', '2001-04-23', '956 Quang Trung', 1, 'TP HCM', 1, '087201012236', 'Việt Nam', 'CSCLQUANGV7', 'P9GV', '0955564789'),
(4, 'Nguyễn Công Phượng', 'congphuong@gmail.com', '0977676818', 'Nghệ An', '1995-04-19', '20 Võ Văn Ngân', 1, 'TP HCM', 1, '079202412233', 'Việt Nam', 'CSCLQUANGV7', 'P7GV', '0977676818'),
(5, 'Nhậm Ngã Hành', 'hanhnham@gmail.com', '0146372343', 'An Giang', '1999-05-13', '45 Hà Tôn Quyền', 2, 'TP HCM', 1, '083234012233', 'Việt Nam', 'CSCLQUANGV7', 'P7GV', NULL),
(6, 'Hứa Văn Cường', 'vancuong@gmail.com', '09312313131', 'Tiền Giang', '2006-01-17', '58 Đinh Tiên Hoàng', NULL, 'TP HCM', 1, '0891231313', NULL, NULL, NULL, '09312313131'),
(7, 'Đỗ Hùng Dũng', 'hungdung@gmail.com', '02334343434', 'Hà Nội', '2022-05-26', '26 Lê Đức Thọ', 1, 'TP HCM', 1, '02139392392', 'Việt Nam', 'BVDCNO6', 'P7GV', '02334343434');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan_benhvien`
--

CREATE TABLE `benhnhan_benhvien` (
  `MaBenhNhan` int(10) NOT NULL,
  `MaBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaBenhNhan`,`MaBV`),
  KEY `MaBenhNhan` (`MaBenhNhan`),
  KEY `MaBV` (`MaBV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benhnhan_benhvien`
--

INSERT INTO `benhnhan_benhvien` (`MaBenhNhan`, `MaBV`) VALUES
(1, 'CSCLQUANGV7'),
(2, 'BVDCNO6'),
(2, 'CSCLQUANGV7'),
(3, 'CSCLQUANGV9'),
(4, 'CSCLQUANGV7');

-- --------------------------------------------------------

--
-- Table structure for table `benhvien`
--

CREATE TABLE `benhvien` (
  `MaBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TenBV` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(12) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoLuongBenhNhan` int(11) NOT NULL,
  `SoGiuongToiDa` int(11) NOT NULL,
  `DieuTri` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoTang` int(11) NOT NULL,
  `maPhuong` varchar(35) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaBV`),
  KEY `SoTang` (`SoTang`),
  KEY `maPhuong` (`maPhuong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benhvien`
--

INSERT INTO `benhvien` (`MaBV`, `TenBV`, `SoDienThoai`, `Email`, `SoLuongBenhNhan`, `SoGiuongToiDa`, `DieuTri`, `SoTang`, `maPhuong`) VALUES
('BV175', 'Bệnh viện Quân y 175', '09233232339', 'quany175@gmail.com', 0, 5000, 'Hồi sức bệnh nhân nặng và nguy kịch', 5, 'P3GV'),
('BVANBINH', 'Bệnh viện An Bình', '0333377341', 'bvanbinh@gmail.com', 3000, 3000, 'Mắc do bệnh lý nền hoặc bệnh lý đi kèm', 4, 'P19BTH'),
('BVCHORAY', 'Bệnh viện Chợ Rẫy', '01336462219', 'bvchoray@gmail.com', 0, 5000, 'Hồi sức bệnh nhân nặng và nguy kịch', 5, 'PBN'),
('BVCV19GOVAP', 'Bệnh viện điều trị Covid Gò Vấp', '0993477174', 'benhviengovap@gmail.com', 0, 4000, 'Điều trị bệnh nhân ở múc trung bình và nặng', 3, 'P7GV'),
('BVDCNO6', 'Bệnh viện dã chiến Số 6', '0293477172', 'bvdachien6@gmail.com', 12, 4000, 'Trường hợp COVID nhẹ', 2, 'P4GV'),
('BVNDGD', 'Bệnh viện nhân dân Gia Định', '09384373478', 'bvgiadinh@gmail.com', 0, 5000, 'Hồi sức bệnh nhân nặng và nguy kịch', 5, 'PCOL'),
('BVPNT', 'Bệnh viện đa khoa Phạm Ngọc Thạch', '0186666171', 'bvphamngocthach@gmail.com', 0, 4000, 'Mắc do bệnh lý nền hoặc bệnh lý đi kèm', 4, 'PBN'),
('CSCLQUAN1BN', 'Cơ sở cách lý quận 1 Bến Nghé', '0186865377', 'cscl_quan1bn@gmail.com', 0, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'PBN'),
('CSCLQUAN1CG', 'Cơ sở cách lý quận 1 Cô Giang', '0985893331', 'cscl_quan1cg@gmail.com', 0, 4000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'PCG'),
('CSCLQUAN1TD', 'Cơ sở cách lý quận 1 Tân Định', '0195898687', 'cscl_quan1td@gmail.com', 0, 5000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'PTD'),
('CSCLQUANBTH26', 'Cơ sở cách lý quận Bình Thạnh 26', '0186865366', 'cscl_quanbth26@gmail.com', 0, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P26BTH'),
('CSCLQUANBTH27', 'Cơ sở cách lý quận Bình Thạnh 27', '0186865361', 'cscl_quanbth27@gmail.com', 0, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P27BTH'),
('CSCLQUANBTH28', 'Cơ sở cách lý quận Bình Thạnh 28', '0186865362', 'cscl_quanbth28@gmail.com', 0, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P28BTH'),
('CSCLQUANGV7', 'Cơ sở cách lý quận Gò Vấp 7', '0186865666', 'cscl_quangovap7@gmail.com', 8, 6000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P7GV'),
('CSCLQUANGV8', 'Cơ sở cách lý quận Gò Vấp 8', '0186865466', 'cscl_quangovap8@gmail.com', 0, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P8GV'),
('CSCLQUANGV9', 'Cơ sở cách lý quận Gò Vấp 9', '0176865566', 'cscl_quangovap9@gmail.com', 1, 3000, 'Cách ly, chăm sóc sức khỏe bệnh nhân', 1, 'P9GV');

-- --------------------------------------------------------

--
-- Table structure for table `canboytephuong`
--

CREATE TABLE `canboytephuong` (
  `MaCBYTP` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TenCBYTP` varchar(30) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DonViCongTac` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `MaTTYTP` varchar(20) collate utf8_unicode_ci default NULL,
  `MaTK` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MaCBYTP`),
  KEY `MaTTYTP` (`MaTTYTP`),
  KEY `MaTK` (`MaTK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `canboytephuong`
--

INSERT INTO `canboytephuong` (`MaCBYTP`, `TenCBYTP`, `SoDienThoai`, `DiaChi`, `DonViCongTac`, `Email`, `MaTTYTP`, `MaTK`) VALUES
('DC97', 'Nguyễn Văn Lai', '0123232423', '98 Phạm Văn Đồng', 'Phường 7', 'vanlai@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MaCauHoi` int(11) NOT NULL auto_increment,
  `MaBenhNhan` int(11) NOT NULL,
  `TieuDe` varchar(200) collate utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaCauHoi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`MaCauHoi`, `MaBenhNhan`, `TieuDe`, `NoiDung`) VALUES
(1, 1, 'Hỏi về tình trạng bệnh', 'Hôm nay là ngày thứ 7 mắc covid-19 và đang điều trị tại nhà tuy nhiên sau 1 tuần tôi thấy sức khỏe không khá hơn mong bác sĩ hãy cho tôi lời khuyên'),
(2, 2, 'mn', 'nghubajjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjaaaaaaaaaaaaaaaaa'),
(3, 0, 'dsd23232', 'dswdsdsd222'),
(4, 1, 'dsdsd3434', 'dsdsdssd'),
(26, 1, 'cachdieutri11', 'Khanh Duong 123 Khanh Duong 123 Khanh Duong 123 Khanh Duong 123'),
(27, 1, 'dsdsd', 'Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 Khanh11 '),
(28, 1, 'Hoi ve tinh trang benh', 'Hom nay la ngay thu 7 mac covid-19 va dang dieu tri tai nha tuy nhien sau 1 tuan toi thay suc khoe khong kha hon mong bac si hay cho toi loi khuyen'),
(30, 1, 'dddd', 'dsadsd'),
(31, 1, 'Hỏi về tình trạng bệnh', 'Hôm nay là ngày thứ 7 mắc covid-19 và đang điều trị tại nhà, tuy nhiên sau 1 tuần tôi thấy sức khỏe không khá hơn, mong bác sĩ hãy cho tôi lời khuyên');

-- --------------------------------------------------------

--
-- Table structure for table `khaibaoyte`
--

CREATE TABLE `khaibaoyte` (
  `maphieukhaibao` int(30) unsigned NOT NULL auto_increment,
  `mabenhnhan` int(10) NOT NULL,
  `trieuchung` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ngayphathien` datetime NOT NULL,
  `lichsubenhnen` varchar(100) collate utf8_unicode_ci NOT NULL,
  `thoigianlap` datetime NOT NULL,
  PRIMARY KEY  (`maphieukhaibao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `khaibaoyte`
--

INSERT INTO `khaibaoyte` (`maphieukhaibao`, `mabenhnhan`, `trieuchung`, `ngayphathien`, `lichsubenhnen`, `thoigianlap`) VALUES
(67, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(68, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(69, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(70, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(71, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(72, 1234865, 'Ã¡dsadas', '2022-05-11 09:40:00', 'Ã¡dasdasd', '2022-05-13 09:40:00'),
(73, 1, 'ho', '2022-05-19 18:32:00', 'lao phá»•i', '2022-05-20 18:33:00'),
(74, 1, 'ho', '2022-05-19 18:32:00', 'lao phá»•i', '2022-05-20 18:33:00'),
(75, 1, 'ho', '2022-05-19 18:32:00', 'lao phá»•i', '2022-05-20 18:33:00'),
(76, 1, 'ho', '2022-05-19 18:32:00', 'lao phá»•i', '2022-05-20 18:33:00'),
(77, 1, 'ho', '2022-05-19 18:32:00', 'lao phá»•i', '2022-05-20 18:33:00'),
(78, 1, 'ho', '2022-05-19 18:32:00', 'lao phổi', '2022-05-20 18:33:00'),
(79, 2, 'ho', '2022-05-18 18:46:00', 'ssssssss', '2022-05-20 18:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `nguoiquantri`
--

CREATE TABLE `nguoiquantri` (
  `MaNQT` int(11) NOT NULL auto_increment,
  `TenNQT` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `MaTK` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaNQT`),
  KEY `MaTK` (`MaTK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nguoiquantri`
--

INSERT INTO `nguoiquantri` (`MaNQT`, `TenNQT`, `SoDienThoai`, `DiaChi`, `Email`, `MaTK`) VALUES
(1, 'Lý Chính Thắng', '0284913432', '39 Quang Trung', 'admin001@gmail.com', 'admin001');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvienbenhvien`
--

CREATE TABLE `nhanvienbenhvien` (
  `MaNVBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TenNVBV` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DonViCongTac` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(30) collate utf8_unicode_ci NOT NULL,
  `MaBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MaTK` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaNVBV`),
  KEY `MaBV` (`MaBV`),
  KEY `MaTK` (`MaTK`),
  KEY `MaTK_2` (`MaTK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvienbenhvien`
--

INSERT INTO `nhanvienbenhvien` (`MaNVBV`, `TenNVBV`, `SoDienThoai`, `DiaChi`, `DonViCongTac`, `Email`, `MaBV`, `MaTK`) VALUES
('NV001_CSYTGV7', 'Phạm Văn Khánh', '0193377172', '25 Quang Trung', 'Cơ sở y tế quận Gò Vấp 7', 'khanh_govap@gmail.com', 'CSCLQUANGV7', 'nhanvienkhanh'),
('NV002_BVDCNO6', 'Trần Thị Xuân Đào', '0943461936', '45 Phan Văn Trị', 'Bệnh viện dã chiến số 6 - Phường 4 Gò Vấp', 'xuandao@gmail.com', 'BVDCNO6', 'nhanviendao');

-- --------------------------------------------------------

--
-- Table structure for table `phieudexuatchuyenvien`
--

CREATE TABLE `phieudexuatchuyenvien` (
  `MaPhieuDeXuat` int(11) NOT NULL auto_increment,
  `ThoiGianLapPhieu` datetime NOT NULL,
  `TangHienTai` int(11) NOT NULL,
  `TangDeXuat` int(11) NOT NULL,
  `TenBV` varchar(40) collate utf8_unicode_ci NOT NULL,
  `LyDo` varchar(100) collate utf8_unicode_ci NOT NULL,
  `TrangThaiDuyet` tinyint(4) NOT NULL,
  `MaNVBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MaBenhNhan` int(11) NOT NULL,
  `MaBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaPhieuDeXuat`),
  KEY `MaNVBV` (`MaNVBV`),
  KEY `MaBenhNhan` (`MaBenhNhan`),
  KEY `MaBV` (`MaBV`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Triggers `phieudexuatchuyenvien`
--
DROP TRIGGER IF EXISTS `htdieuphoibncovid`.`updatetrangthaibn`;
DELIMITER //
CREATE TRIGGER `htdieuphoibncovid`.`updatetrangthaibn` AFTER INSERT ON `htdieuphoibncovid`.`phieudexuatchuyenvien`
 FOR EACH ROW UPDATE benhnhan SET TrangThai = 2 WHERE MaBenhNhan = (SELECT MaBenhNhan FROM phieudexuatchuyenvien ORDER BY MaPhieuDeXuat DESC LIMIT 1)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `htdieuphoibncovid`.`duyetphieudx`;
DELIMITER //
CREATE TRIGGER `htdieuphoibncovid`.`duyetphieudx` AFTER UPDATE ON `htdieuphoibncovid`.`phieudexuatchuyenvien`
 FOR EACH ROW IF (NEW.TrangThaiDuyet = 2) 
THEN 
UPDATE benhnhan 
SET MaBV = NEW.MaBV, TrangThai = 1
WHERE MaBenhNhan = NEW.MaBenhNhan;
END IF
//
DELIMITER ;
DROP TRIGGER IF EXISTS `htdieuphoibncovid`.`updatetrangthai_after_xoadx`;
DELIMITER //
CREATE TRIGGER `htdieuphoibncovid`.`updatetrangthai_after_xoadx` BEFORE DELETE ON `htdieuphoibncovid`.`phieudexuatchuyenvien`
 FOR EACH ROW UPDATE benhnhan SET TrangThai = 1 WHERE MaBenhNhan = (SELECT MaBenhNhan FROM phieudexuatchuyenvien ORDER BY MaPhieuDeXuat DESC LIMIT 1)
//
DELIMITER ;

--
-- Dumping data for table `phieudexuatchuyenvien`
--

INSERT INTO `phieudexuatchuyenvien` (`MaPhieuDeXuat`, `ThoiGianLapPhieu`, `TangHienTai`, `TangDeXuat`, `TenBV`, `LyDo`, `TrangThaiDuyet`, `MaNVBV`, `MaBenhNhan`, `MaBV`) VALUES
(7, '2022-04-26 15:23:45', 1, 2, 'Cơ sở cách lý quận Gò Vấp 7', 'Đang chuyển nặng', 2, 'NV001_CSYTGV7', 2, 'BVDCNO6'),
(12, '2022-05-12 16:10:07', 1, 2, 'Cơ sở cách lý quận Gò Vấp 7', 'Đang chuyển nặng', 2, 'NV001_CSYTGV7', 1, 'BVDCNO6'),
(17, '2022-05-24 13:57:23', 1, 2, 'Cơ sở cách lý quận Gò Vấp 7', 'Đang chuyển nặng', 2, 'NV001_CSYTGV7', 7, 'BVDCNO6');

-- --------------------------------------------------------

--
-- Table structure for table `phieukhaibaoyte`
--

CREATE TABLE `phieukhaibaoyte` (
  `MaPhieuKBYT` int(11) NOT NULL auto_increment,
  `TinhTrangHienTai` varchar(100) collate utf8_unicode_ci default NULL,
  `LichSuBenhNen` varchar(100) collate utf8_unicode_ci default NULL,
  `NgayPhatHienTrieuChung` datetime NOT NULL,
  `NoiDungKhaiBao` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `MaBenhNhan` int(11) NOT NULL,
  PRIMARY KEY  (`MaPhieuKBYT`),
  KEY `MaBenhNhan` (`MaBenhNhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phieukhaibaoyte`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieuxntinhtrangbenhnhan`
--

CREATE TABLE `phieuxntinhtrangbenhnhan` (
  `MaPhieuXN` int(11) NOT NULL auto_increment,
  `NgayLapPhieu` datetime NOT NULL,
  `TinhTrang` tinyint(4) NOT NULL,
  `GiaiPhap` varchar(200) collate utf8_unicode_ci NOT NULL,
  `MaBenhNhan` int(11) NOT NULL,
  `MaCBYTP` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MaBV` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaPhieuXN`),
  KEY `MaBenhNhan` (`MaBenhNhan`),
  KEY `MaCBYTP` (`MaCBYTP`),
  KEY `MaBV` (`MaBV`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phieuxntinhtrangbenhnhan`
--

INSERT INTO `phieuxntinhtrangbenhnhan` (`MaPhieuXN`, `NgayLapPhieu`, `TinhTrang`, `GiaiPhap`, `MaBenhNhan`, `MaCBYTP`, `MaBV`) VALUES
(1, '2022-05-21 15:08:00', 0, 'đsdsd', 1, 'DC97', 'BVDCNO6');

-- --------------------------------------------------------

--
-- Table structure for table `phieuyeucaudieutri`
--

CREATE TABLE `phieuyeucaudieutri` (
  `MaPhieuYC` int(11) NOT NULL auto_increment,
  `MaBenhNhan` int(11) NOT NULL,
  `MaBV` varchar(30) collate utf8_unicode_ci NOT NULL,
  `NgayLap` datetime NOT NULL,
  PRIMARY KEY  (`MaPhieuYC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phieuyeucaudieutri`
--

INSERT INTO `phieuyeucaudieutri` (`MaPhieuYC`, `MaBenhNhan`, `MaBV`, `NgayLap`) VALUES
(1, 3, 'CSCLQUAN1BN', '2022-05-17 10:15:42'),
(2, 3, 'CSCLQUAN1BN', '2022-05-17 10:28:18'),
(3, 6, 'CSCLQUANGV7', '2022-05-21 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

CREATE TABLE `phuong` (
  `MaPhuong` varchar(35) collate utf8_unicode_ci NOT NULL,
  `TenPhuong` varchar(50) collate utf8_unicode_ci NOT NULL,
  `MaQuan` varchar(35) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaPhuong`),
  KEY `MaQuan` (`MaQuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phuong`
--

INSERT INTO `phuong` (`MaPhuong`, `TenPhuong`, `MaQuan`) VALUES
('P10GV', 'Phường 10', 'QGV'),
('P11BTH', 'Phường 11', 'QBinhThanh'),
('P11GV', 'Phường 11', 'QGV'),
('P12BTH', 'Phường 12', 'QBinhThanh'),
('P12GV', 'Phường 12', 'QGV'),
('P13BTH', 'Phường 13', 'QBinhThanh'),
('P13GV', 'Phường 13', 'QGV'),
('P14BTH', 'Phường 14', 'QBinhThanh'),
('P14GV', 'Phường 14', 'QGV'),
('P15BTH', 'Phường 15', 'QBinhThanh'),
('P15GV', 'Phường 15', 'QGV'),
('P16GV', 'Phường 16', 'QGV'),
('P17BTH', 'Phường 17', 'QBinhThanh'),
('P17GV', 'Phường 17', 'QGV'),
('P19BTH', 'Phường 19', 'QBinhThanh'),
('P1BTH', 'Phường 1', 'QBinhThanh'),
('P1GV', 'Phường 1', 'QGV'),
('P21BTH', 'Phường 21', 'QBinhThanh'),
('P22BTH', 'Phường 22', 'QBinhThanh'),
('P24BTH', 'Phường 24', 'QBinhThanh'),
('P25BTH', 'Phường 25', 'QBinhThanh'),
('P26BTH', 'Phường 26', 'QBinhThanh'),
('P27BTH', 'Phường 27', 'QBinhThanh'),
('P28BTH', 'Phường 28', 'QBinhThanh'),
('P2BTH', 'Phường 2', 'QBinhThanh'),
('P3BTH', 'Phường 3', 'QBinhThanh'),
('P3GV', 'Phường 3', 'QGV'),
('P4GV', 'Phường 4', 'QGV'),
('P5BTH', 'Phường 5', 'QBinhThanh'),
('P5GV', 'Phường 5', 'QGV'),
('P6BTH', 'Phường 6', 'QBinhThanh'),
('P6GV', 'Phường 6', 'QGV'),
('P7BTH', 'Phường 7', 'QBinhThanh'),
('P7GV', 'Phường 7', 'QGV'),
('P8GV', 'Phường 8', 'QGV'),
('P9GV', 'Phường 9', 'QGV'),
('PBN', 'Bến Nghé', 'Q1'),
('PBT', 'Bến Thành', 'Q1'),
('PCG', 'Cô Giang', 'Q1'),
('PCK', 'Cầu Kho', 'Q1'),
('PCOL', 'Cầu Ông Lãnh', 'Q1'),
('PDK', 'Đa Kao', 'Q1'),
('PNCT', 'Nguyễn Cư Trinh', 'Q1'),
('PNTB', 'Nguyễn Thái Bình', 'Q1'),
('PPNL', 'Phạm Ngũ Lão', 'Q1'),
('PTD', 'Tân Định', 'Q1');

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

CREATE TABLE `quan` (
  `MaQuan` varchar(35) collate utf8_unicode_ci NOT NULL,
  `TenQuan` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaQuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`MaQuan`, `TenQuan`) VALUES
('HBC', 'Huyện Bình Chánh'),
('HCC', 'Huyện Củ Chi'),
('HCG', 'Huyện Cần Giờ'),
('HHM', 'Huyện Hóc Môn'),
('HNB', 'Huyện Nhà Bè'),
('Q1', 'Quận 1'),
('Q10', 'Quận 10'),
('Q11', 'Quận 11'),
('Q12', 'Quận 12'),
('Q2', 'Quận 2'),
('Q3', 'Quận 3'),
('Q4', 'Quận 4'),
('Q5', 'Quận 5'),
('Q6', 'Quận 6'),
('Q7', 'Quận 7'),
('Q8', 'Quận 8'),
('Q9', 'Quận 9'),
('QBinhThanh', 'Quận Bình Thạnh'),
('QBT', 'Quận Bình Tân'),
('QGV', 'Quận Gò Vấp'),
('QPN', 'Quận Phú Nhuận'),
('QTB', 'Quận Tân Bình'),
('QTD', 'Quận Thủ Đức'),
('QTP', 'Quận Tân Phú');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanbn`
--

CREATE TABLE `taikhoanbn` (
  `SoDienThoai` varchar(12) collate utf8_unicode_ci NOT NULL,
  `password` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`SoDienThoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoanbn`
--

INSERT INTO `taikhoanbn` (`SoDienThoai`, `password`) VALUES
('0123456789', '25f9e794323b453885f5181f1b624d0b'),
('02334343434', '25f9e794323b453885f5181f1b624d0b'),
('0911784919', '25f9e794323b453885f5181f1b624d0b'),
('0913474835', '25f9e794323b453885f5181f1b624d0b'),
('09312313131', '25f9e794323b453885f5181f1b624d0b'),
('0955564789', '25f9e794323b453885f5181f1b624d0b'),
('0977676818', '25f9e794323b453885f5181f1b624d0b'),
('0988154619', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoancv`
--

CREATE TABLE `taikhoancv` (
  `MaTK` varchar(20) collate utf8_unicode_ci NOT NULL,
  `password` varchar(50) collate utf8_unicode_ci NOT NULL,
  `phanquyen` tinyint(4) NOT NULL,
  PRIMARY KEY  (`MaTK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoancv`
--

INSERT INTO `taikhoancv` (`MaTK`, `password`, `phanquyen`) VALUES
('admin001', '25f9e794323b453885f5181f1b624d0b', 3),
('nhanviendao', '25f9e794323b453885f5181f1b624d0b', 1),
('nhanvienkhanh', '25f9e794323b453885f5181f1b624d0b', 1),
('nhanvienlinh', '25f9e794323b453885f5181f1b624d0b', 1),
('Tinh', '25f9e794323b453885f5181f1b624d0b', 2),
('triting', '25f9e794323b453885f5181f1b624d0b', 2),
('TriTinh', '25f9e794323b453885f5181f1b624d0b', 3),
('tritinss', '25f9e794323b453885f5181f1b624d0b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoannqt`
--

CREATE TABLE `taikhoannqt` (
  `MaNQT` varchar(50) collate utf8_unicode_ci NOT NULL,
  `password` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaNQT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoannqt`
--

INSERT INTO `taikhoannqt` (`MaNQT`, `password`) VALUES
('TriTinh', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `tang`
--

CREATE TABLE `tang` (
  `SoTang` int(11) NOT NULL,
  `MoTaTinhTrang` varchar(300) collate utf8_unicode_ci NOT NULL,
  `SoLuong` float NOT NULL,
  `MoTaBenhVien` varchar(300) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`SoTang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tang`
--

INSERT INTO `tang` (`SoTang`, `MoTaTinhTrang`, `SoLuong`, `MoTaBenhVien`) VALUES
(1, 'Các trường hợp F0 không triệu chứng, không bệnh nền hoặc có bệnh nền đã được điều trị ổn định, không béo phì. Dự kiến thu dung khoảng 50% trường hợp F0', 50, 'Cơ sở chăm sóc và và theo dõi sức khỏe các trường hợp F0 tại địa bàn quận, huyện và thành phố Thủ Đức'),
(2, 'Các trường hợp F0 mới được phát hiện trong cộng đồng, được khám sàng lọc và chuyển đến từ tầng 1. Dự kiến thu dung khoảng 27% trường hợp F0', 27, 'Bệnh viện dã chiến thu dung điều trị COVID-19'),
(3, 'Các trường hợp F0 có triệu chứng ở mức độ trung bình và nặng. Dự kiến thu dung khoảng 10% trường hợp F0', 10, 'Bệnh viện điều trị COVID-19 các trường hợp có triệu chứng'),
(4, 'Mắc COVID-19 nặng do bệnh lý nền hoặc bệnh lý đi kèm Dự kiến thu dung khoảng 8% F0', 8, 'Bv điều trị COVID-19 có bệnh lý đi kèm nặng cần can thiệp điều trị chuyên khoa'),
(5, 'Mắc COVID-19 có triệu chứng nặng và nguy kịch. Dự kiến thu dung khoảng 5% F0', 5, 'Bv Hồi sức COVID-19');

-- --------------------------------------------------------

--
-- Table structure for table `trungtamytephuong`
--

CREATE TABLE `trungtamytephuong` (
  `MaTTYTP` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TenTTYTP` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(12) collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) collate utf8_unicode_ci NOT NULL,
  `MaPhuong` varchar(35) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`MaTTYTP`),
  KEY `MaPhuong` (`MaPhuong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trungtamytephuong`
--


-- --------------------------------------------------------

--
-- Table structure for table `tuvanbenhnhan`
--

CREATE TABLE `tuvanbenhnhan` (
  `MaCauHoi` int(11) NOT NULL,
  `TieuDe` varchar(30) collate utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(500) collate utf8_unicode_ci NOT NULL,
  `MaCBYTP` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MaBenhNhan` int(11) NOT NULL,
  PRIMARY KEY  (`MaCauHoi`),
  KEY `MaCBYTP` (`MaCBYTP`),
  KEY `MaBenhNhan` (`MaBenhNhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuvanbenhnhan`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_3` FOREIGN KEY (`SoDienThoai_TK`) REFERENCES `taikhoanbn` (`SoDienThoai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `benhnhan_ibfk_4` FOREIGN KEY (`MaPhuong`) REFERENCES `phuong` (`MaPhuong`);

--
-- Constraints for table `benhnhan_benhvien`
--
ALTER TABLE `benhnhan_benhvien`
  ADD CONSTRAINT `benhnhan_benhvien_ibfk_1` FOREIGN KEY (`MaBV`) REFERENCES `benhvien` (`MaBV`);

--
-- Constraints for table `benhvien`
--
ALTER TABLE `benhvien`
  ADD CONSTRAINT `benhvien_ibfk_1` FOREIGN KEY (`SoTang`) REFERENCES `tang` (`SoTang`),
  ADD CONSTRAINT `benhvien_ibfk_2` FOREIGN KEY (`maPhuong`) REFERENCES `phuong` (`MaPhuong`);

--
-- Constraints for table `canboytephuong`
--
ALTER TABLE `canboytephuong`
  ADD CONSTRAINT `canboytephuong_ibfk_1` FOREIGN KEY (`MaTTYTP`) REFERENCES `trungtamytephuong` (`MaTTYTP`),
  ADD CONSTRAINT `canboytephuong_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `taikhoancv` (`MaTK`);

--
-- Constraints for table `nguoiquantri`
--
ALTER TABLE `nguoiquantri`
  ADD CONSTRAINT `nguoiquantri_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoancv` (`MaTK`);

--
-- Constraints for table `nhanvienbenhvien`
--
ALTER TABLE `nhanvienbenhvien`
  ADD CONSTRAINT `nhanvienbenhvien_ibfk_1` FOREIGN KEY (`MaBV`) REFERENCES `benhvien` (`MaBV`),
  ADD CONSTRAINT `nhanvienbenhvien_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `taikhoancv` (`MaTK`);

--
-- Constraints for table `phieudexuatchuyenvien`
--
ALTER TABLE `phieudexuatchuyenvien`
  ADD CONSTRAINT `phieudexuatchuyenvien_ibfk_1` FOREIGN KEY (`MaNVBV`) REFERENCES `nhanvienbenhvien` (`MaNVBV`),
  ADD CONSTRAINT `phieudexuatchuyenvien_ibfk_2` FOREIGN KEY (`MaBenhNhan`) REFERENCES `benhnhan` (`MaBenhNhan`),
  ADD CONSTRAINT `phieudexuatchuyenvien_ibfk_3` FOREIGN KEY (`MaBV`) REFERENCES `benhvien` (`MaBV`);

--
-- Constraints for table `phieukhaibaoyte`
--
ALTER TABLE `phieukhaibaoyte`
  ADD CONSTRAINT `phieukhaibaoyte_ibfk_1` FOREIGN KEY (`MaBenhNhan`) REFERENCES `benhnhan` (`MaBenhNhan`);

--
-- Constraints for table `phieuxntinhtrangbenhnhan`
--
ALTER TABLE `phieuxntinhtrangbenhnhan`
  ADD CONSTRAINT `phieuxntinhtrangbenhnhan_ibfk_1` FOREIGN KEY (`MaCBYTP`) REFERENCES `canboytephuong` (`MaCBYTP`),
  ADD CONSTRAINT `phieuxntinhtrangbenhnhan_ibfk_2` FOREIGN KEY (`MaBV`) REFERENCES `benhvien` (`MaBV`);

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `phuong_ibfk_1` FOREIGN KEY (`MaQuan`) REFERENCES `quan` (`MaQuan`);

--
-- Constraints for table `trungtamytephuong`
--
ALTER TABLE `trungtamytephuong`
  ADD CONSTRAINT `trungtamytephuong_ibfk_1` FOREIGN KEY (`MaPhuong`) REFERENCES `phuong` (`MaPhuong`);

--
-- Constraints for table `tuvanbenhnhan`
--
ALTER TABLE `tuvanbenhnhan`
  ADD CONSTRAINT `tuvanbenhnhan_ibfk_1` FOREIGN KEY (`MaCBYTP`) REFERENCES `canboytephuong` (`MaCBYTP`),
  ADD CONSTRAINT `tuvanbenhnhan_ibfk_2` FOREIGN KEY (`MaBenhNhan`) REFERENCES `benhnhan` (`MaBenhNhan`);
