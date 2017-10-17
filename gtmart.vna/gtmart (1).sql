-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 03:32 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name_brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `name_brand`) VALUES
(1, 'Kinh Đô'),
(2, 'Đồng Khánh'),
(4, 'Nhu Lan'),
(5, 'aaaaaa'),
(6, 'bbb'),
(7, 'cccc'),
(8, 'ddd'),
(9, 'eee'),
(10, 'fff'),
(11, 'ggg'),
(12, 'qqq'),
(13, 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `name`, `phone`, `adress`, `comment`, `date`) VALUES
(1, 'Phuc', 904034946, 'q2', 'duoc', 1502323200),
(2, 'Phuc1', 123, 'aqq2', 'qweq', 1502323200);

-- --------------------------------------------------------

--
-- Table structure for table `comment_customer`
--

DROP TABLE IF EXISTS `comment_customer`;
CREATE TABLE IF NOT EXISTS `comment_customer` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `name_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_customer`
--

INSERT INTO `comment_customer` (`id_comment`, `name_comment`, `content_comment`, `id_product`, `email`, `phone`) VALUES
(2, 'Bánh ngon', 'asdasdasdsadasd', 6, 'Phuc@gmail.com', 904034946),
(4, 'asdsadasd', 'asdasd', 35, 'asdasd', 123);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` text COLLATE utf8_unicode_ci NOT NULL,
  `number_phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_contact` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name_contact`, `name_company`, `adress`, `number_phone`, `email`, `title_contact`, `content_contact`) VALUES
(3, 'asdasd', 'asdsadsad', 'sadasdasdasd', 11111, 'asdsdasdasdasd', 'asdsad', 'asdasdasd'),
(7, 'asdfsadf', 'asdfsdafsdaf', 'sadfsdfsad', 123, 'adsfsdafsad', 'fsadfsdfsdf', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `made`
--

DROP TABLE IF EXISTS `made`;
CREATE TABLE IF NOT EXISTS `made` (
  `id_made` int(11) NOT NULL AUTO_INCREMENT,
  `name_made` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_made`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `made`
--

INSERT INTO `made` (`id_made`, `name_made`) VALUES
(1, 'Việt Nam'),
(2, 'England'),
(3, 'United States'),
(4, 'Malaisia'),
(5, 'Đức'),
(6, 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_unsigned` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` int(11) NOT NULL,
  `hide_show` int(11) NOT NULL,
  `id_father` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `location` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name`, `name_unsigned`, `serial`, `hide_show`, `id_father`, `location`) VALUES
(1, 'GIỚI THIỆU', 'Gioi_Thieu', 1, 0, '0', 1),
(2, 'SẢN PHẨM', 'San_Pham', 2, 0, '0', 0),
(11, 'BÁNH NGỌT', 'Banh_Ngot', 9, 0, '10', 0),
(3, 'TIN TỨC', 'Tin_Tuc', 3, 0, '0', 0),
(4, 'VẬN CHUYỂN THANH TOÁN', 'Van_Chuyen_Thanh_Toan', 4, 0, '0', 0),
(5, 'ĐỐI TÁC', 'Doi_Tac', 5, 0, '0', 1),
(6, 'TUYỂN DỤNG', 'Tuyen_Dung', 6, 0, '0', 0),
(7, 'LIÊN HỆ', 'Lien_He', 7, 0, '0', 1),
(10, 'BÁNH', 'Banh', 10, 0, '2', 0),
(20, 'BÁNH MẶN', 'Banh_Man', 13, 0, '10', 0),
(19, 'TRÀ', 'Tra', 12, 0, '2', 0),
(18, 'KẸO', 'Keo', 11, 0, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content_news` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `unsigned_title`, `image`, `summary`, `content_news`, `date`, `view`) VALUES
(1, 'Giới Thiệu', '', '', '', 'Nội Dung Giới Thiệu', '', 0),
(2, 'Vận Chuyển - Thanh Toán', '', '', '', 'Nội dung vận chuyển và thanh toán', '', 0),
(3, 'Đối Tác', '', '', '', 'Nội Dung Đối Tácaa', '', 0),
(4, 'Tuyển Dụng', '', '', '', 'Nội Dung Tuyển Dụng', '', 0),
(5, 'a', 'a', 'sp.jpg', 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 0),
(6, 'b', 'a', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0),
(7, 'Nước mắm hạnh phúc và mẹo giúp bé ăn ngon nhờ gia vị', 'NUOC-MAM1', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0),
(8, 'Nước mắm hạnh phúc và mẹo giúp bé ăn ngon nhờ gia vị', 'NUOC-MAM2', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0),
(9, 'Nước mắm hạnh phúc và mẹo giúp bé ăn ngon nhờ gia vị', 'NUOC-MAM3', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0),
(10, 'Nước mắm hạnh phúc và mẹo giúp bé ăn ngon nhờ gia vị', 'NUOC-MAM4', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0),
(11, 'Nước mắm hạnh phúc và mẹo giúp bé ăn ngon nhờ gia vị', 'NUOC-MAM5', 'sp.jpg', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', ' Gia vị là thành phần không thể thiếu trong bữa ăn của mỗi gia đình. Trên thị trường hiện nay có vô số loại gia vị dành cho người lớn, nhưng còn gia vị cho trẻ em thì sao? ', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `image_partner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_partner`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id_partner`, `image_partner`, `link`) VALUES
(1, 'kinh do.gif', 'http://www.kinhdo.vn/'),
(2, 'Neptune107200916645.jpg', ''),
(3, 'Neptune107200916645.jpg', ''),
(4, 'Neptune107200916645.jpg', ''),
(5, 'Neptune107200916645.jpg', ''),
(6, 'Neptune107200916645.jpg', 'http://www.calofic.com.vn/');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_product` int(20) NOT NULL,
  `images_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  `Highlights` int(11) NOT NULL,
  `id_made` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `unsigned_name_product`, `price_product`, `images_product`, `id_menu`, `Highlights`, `id_made`, `id_brand`) VALUES
(1, 'Bánh Kem', 'BANH-KEM', 172000, 'sp.jpg', 11, 1, 1, 1),
(7, 'Bánh dừa', 'BANH-DUA', 170000, 'sp.jpg', 11, 1, 2, 2),
(2, 'Bánh chuối', 'BANH-CHUOI', 172000, 'sp.jpg', 11, 0, 2, 1),
(3, 'BÁNH', 'BANH', 172000, 'sp.jpg', 10, 0, 2, 2),
(4, 'BÁnh', 'BAnh', 172000, 'sp.jpg', 10, 0, 2, 1),
(5, 'Bánh', 'Banh', 172000, 'sp.jpg', 10, 1, 1, 1),
(6, 'Bánh mặn vừa', 'BANH-MAN-VUA', 1720000, 'sp.jpg', 20, 1, 2, 1),
(8, 'bánh ngọt lim', 'BANH-NGOT-LIM', 170000, 'sp.jpg', 20, 0, 1, 1),
(9, 'Bánh măn', 'BANH-MAN', 170000, 'sp.jpg', 20, 0, 1, 2),
(10, 'Trà thảo mộc', 'TRA-THAO-MOC', 170000, 'sp.jpg', 19, 1, 4, 3),
(11, 'Trà thơm', 'TRA-THOM', 170000, 'sp.jpg', 19, 1, 1, 1),
(12, 'trà thui', 'TRA-THUI', 170000, 'sp.jpg', 19, 1, 2, 1),
(25, 'Kẹo dừa', 'KEO-DUA', 170000, 'sp.jpg', 18, 0, 3, 3),
(26, 'Kẹo men', 'KEO-MEN', 170000, 'sp.jpg', 18, 0, 4, 2),
(27, 'Kẹo dẻo', 'KEO-DEO', 170000, 'sp.jpg', 18, 0, 1, 1),
(35, 'sssdsdsdsdsds', 'Sssdsdsdsdsds', 123467, '1501385575.png', 19, 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id_shopping_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `number_product` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  PRIMARY KEY (`id_shopping_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id_shopping_cart`, `id_product`, `number_product`, `id_cart`) VALUES
(2, 12, 5, 2),
(3, 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

DROP TABLE IF EXISTS `slide_show`;
CREATE TABLE IF NOT EXISTS `slide_show` (
  `id_slide_show` int(11) NOT NULL AUTO_INCREMENT,
  `images_slide_show` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_slide_show`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`id_slide_show`, `images_slide_show`, `id_menu`) VALUES
(2, 'slide2.jpg', 20),
(3, 'slide2.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

DROP TABLE IF EXISTS `statistic`;
CREATE TABLE IF NOT EXISTS `statistic` (
  `id_statistic` int(11) NOT NULL AUTO_INCREMENT,
  `ip` int(11) NOT NULL,
  PRIMARY KEY (`id_statistic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `password`, `id_role`) VALUES
(6, 'Admin', 'admin', 2),
(7, 'User', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `link_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `link_video`) VALUES
(1, 'https://www.youtube.com/watch?v=cHymml-LDb4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
