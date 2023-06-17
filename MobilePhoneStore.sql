-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 06:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web bán điện thoại`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `nickname`, `email`, `phone`, `role`) VALUES
('damtiendat', '$2y$10$90CinF2EZFqW0r50b80FvOeYT8oBohNpm3dfXSioJkjRjgv2wA0FW', 'Đàm Tiến Đạt', 'damtiendat@gmail.com', '0917466844', 'user'),
('dinhlam', '$2y$10$b1kFSogSXdlNzWi89UWin.RyZQDTSxAvtiA.WYrPmdQHQW.k3x7aS', 'Nguyễn Đình Lâm', 'lam@gmail.com', '0918173933', 'user'),
('nguyensontung', '$2y$10$nlOwduFd9Afzv8q/rG1iYudVZXOstBp/mKhashMFuP2qAK6JBxX02', 'Nguyễn Sơn Tùng', 'nguyensontung@gmail.com', '0918173946', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(30) NOT NULL,
  `image` varchar(170) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `image`, `price`, `type`) VALUES
('OPPO A17K', 'https://cdn.tgdd.vn/Products/Images/42/288404/oppo-a17k-vang-thumb-%C4%83-600x600.jpg', 11900000, 'oppo'),
('OPPO A55', 'https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg', 17000000, 'oppo'),
('Realme C1-Y', 'https://cdn.tgdd.vn/Products/Images/42/253402/realme-c21-y-blue-600x600.jpg', 6250000, 'realme'),
('Sạc dự phòng JP192', 'https://cdn.tgdd.vn/Products/Images/57/240696/ava-lj-jp199-thumb-600x600.jpeg', 250000, 'sạc'),
('Samsung Galaxy A33', 'https://cdn.tgdd.vn/Products/Images/42/246199/samsung-galaxy-a33-5g-trang-thumb-600x600.jpg', 5750000, 'samsung'),
('Tai nghe Bluetooth True Wirele', 'https://cdn.tgdd.vn/Products/Images/54/251852/bluetooth-true-wireless-ava-ds201a-wb-021021-090449-600x600.jpg', 840000, 'tai nghe'),
('Tai nghe OPPO Enco Air2', 'https://cdn.tgdd.vn/Products/Images/54/286335/bluetooth-true-wireless-oppo-enco-air-2-pro-ete21-trang-600x600.jpg', 850000, 'tai nghe'),
('VIVO Y22S', 'assets/img/vivo y22s.jpg', 6700000, 'vivo'),
('Điện thoại IPHONE 10', 'https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb-hh-600x600.jpg', 5500000, 'iphone'),
('Điện thoại IPHONE 11', 'assets/img/iphone11.jpg', 6270000, 'iphone'),
('Điện thoại IPHONE 12', 'assets/img/iphone12.png', 6850000, 'iphone'),
('Điện thoại IPHONE 13', 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-starlight-1-200x200.jpg', 16700000, 'iphone'),
('Điện thoại IPHONE 14', './assets/img/iphone14.jpg', 19800000, 'iphone'),
('Điện thoại IPHONE 9', 'https://didongviet.vn/pub/media/catalog/product//i/p/iphone-9-64gb.jpg', 5000000, 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `productsdetail`
--

CREATE TABLE `productsdetail` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `imageDetail` varchar(150) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsdetail`
--

INSERT INTO `productsdetail` (`id`, `name`, `imageDetail`, `description`) VALUES
(2, 'Điện thoại IPHONE 10', 'https://cdn.tgdd.vn/Products/Images/42/210644/Kit/iphone-11-128gb-note.jpg', 'Được xem là một trong những phiên bản iPhone \"giá rẻ\" của bộ 3 iPhone 10 series nhưng iPhone 10 vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.'),
(3, 'Điện thoại IPHONE 11', 'https://cdn.tgdd.vn/Products/Images/42/210644/Kit/iphone-11-128gb-note.jpg', 'Được xem là một trong những phiên bản iPhone \"giá rẻ\" của bộ 3 iPhone 11 series nhưng iPhone 11 128GB vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu. Với màn hình IPS LCD6.1 Liquid Retina, hệ điều hành: iOS 15, camera sau: 2 camera 12 MP.'),
(4, 'Điện thoại IPHONE 13', 'https://cdn.tgdd.vn/Products/Images/42/228736/Kit/iphone-12-128gb-note.jpg', 'Apple đã trình diện đến người dùng mẫu điện thoại iPhone 13 với sự tuyên bố về một kỷ nguyên mới của iPhone 5G, nâng cấp về màn hình và hiệu năng hứa hẹn đây sẽ là smartphone cao cấp đáng để mọi người đầu tư sở hữu. '),
(5, 'Điện thoại IPHONE 14', 'https://cdn.tgdd.vn/Products/Images/42/228736/Kit/iphone-12-128gb-note.jpg', 'Apple đã trình diện đến người dùng mẫu điện thoại iPhone 14 với sự tuyên bố về một kỷ nguyên mới của iPhone 5G, nâng cấp về màn hình và hiệu năng hứa hẹn đây sẽ là smartphone cao cấp đáng để mọi người đầu tư sở hữu. '),
(6, 'Điện thoại IPHONE 9', 'https://cdn.tgdd.vn/Products/Images/42/289696/Kit/iphone-14-pro-note.jpg', 'iPhone 14 Pro 1TB tiếp tục thể hiện sức hot của mình ngay sau khi ra mắt nhờ thiết kế mang những cải tiến tinh tế, hiệu năng bùng nổ cùng bộ vi xử lý A16 Bionic hoàn toàn mới những cải, sẵn sàng cân mọi tác vụ của người dùng.\r\n'),
(8, 'OPPO A55', 'https://cdn.tgdd.vn/Products/Images/42/249944/Kit/oppo-a55-4g-note.jpg', 'OPPO cho ra mắt OPPO A55 4G chiếc smartphone giá rẻ tầm trung có thiết kế đẹp mắt, cấu hình khá ổn, cụm camera chất lượng và dung lượng pin ấn tượng, mang đến một lựa chọn trải nghiệm thú vị vừa túi tiền cho người tiêu dùng'),
(9, 'OPPO A17K', 'https://cdn.tgdd.vn/Products/Images/42/288401/Kit/oppo-a17-note.jpg', 'Dường như OPPO đang ngày càng quan tâm đến trải nghiệm của người dùng, điều này được minh chứng qua nhiều dòng điện thoại của hãng trong đó có OPPO A17, máy sở hữu màn hình kích thước lớn, camera 50 MP đi cùng viên pin 5000 mAh với thời lượng dùng bền bỉ.'),
(11, 'Realme C1-Y', 'https://cdn.tgdd.vn/Products/Images/42/193286/Kit/realme-c1-note.jpg', 'Bên cạnh người đàn anh Realme 2 Pro thì dòng điện thoại Realme còn mang tới cho người dùng một chiếc smartphone có mức giá rẻ nhất trong phân khúc là Realme C1.\r\nMàn hình tai thỏ kích thước lớn.\r\nVới một mức giá rẻ nhưng Realme C1 vẫn được trang bị màn hình có kích thước lên tới 6.2 inch cho không gian thoải mái để chơi game hay xem phim.'),
(12, 'Samsung Galaxy A33', 'https://cdn.tgdd.vn/Products/Images/42/70050/Kit/samsung-galaxy-a3-mo-ta-chuc-nang11.jpg', 'Samsung Galaxy A3 – Smartphone tầm trung với thiết kế cao cấp\r\nLà một trong những sản phẩm hiếm hoi của Samsung có thiết kế bằng kim loại nguyên khối, Samsung Galaxy A3 mang đến cảm giác chắc chắn và sang trọng hơn rất nhiều so với những người anh trước đó của nó. Sản phẩm có màn hình 4.5 inch, hỗ trợ hai SIM, trang bị camera trước đến 5MP và chạy hệ điều hành Android 4.4 KitKat.'),
(14, 'Tai nghe Bluetooth True Wirele', 'https://cdn.tgdd.vn/Products/Images/54/236016/bluetooth-airpods-2-apple-mv7n2-imei-1-org.jpg', 'Tai nghe nhét trong gọn nhẹ, có 2 phiên bản đen và trắng thời thượng\r\nJBL Quantum 50 tiếp xúc tai dễ chịu, không tạo cảm giác cộm, đau khi đeo lâu. Nút tai có 3 cặp khác kích cỡ, bạn có thể tùy chọn theo khổ tai của mình để đeo tai nghe vừa vặn, không bị lỏng hay quá chặt. Tai nghe có sợi dây dài 132 cm, mềm mại, được bọc dù 1 phần cho độ bền cao, hạn chế rối đứt.'),
(15, 'Sạc dự phòng JP192', 'https://cdn.tgdd.vn/Products/Images/57/240696/ava-lj-jp199-11.jpg', 'Tai nghe nhét trong gọn nhẹ, có 2 phiên bản đen và trắng thời thượng\r\nJBL Quantum 50 tiếp xúc tai dễ chịu, không tạo cảm giác cộm, đau khi đeo lâu. Nút tai có 3 cặp khác kích cỡ, bạn có thể tùy chọn theo khổ tai của mình để đeo tai nghe vừa vặn, không bị lỏng hay quá chặt. Tai nghe có sợi dây dài 132 cm, mềm mại, được bọc dù 1 phần cho độ bền cao, hạn chế rối đứt.'),
(17, 'Tai nghe OPPO Enco Air2', 'https://cdn.tgdd.vn/Products/Images/54/251852/bluetooth-true-wireless-ava-ds201a-wb-021021-090449-600x600.jpg', 'Tai nghe nhét trong gọn nhẹ, có 2 phiên bản đen và trắng thời thượng JBL Quantum 50 tiếp xúc tai dễ chịu, không tạo cảm giác cộm, đau khi đeo lâu. Nút tai có 3 cặp khác kích cỡ, bạn có thể tùy chọn theo khổ tai của mình để đeo tai nghe vừa vặn, không bị lỏng hay quá chặt. Tai nghe có sợi dây dài 132 cm, mềm mại, được bọc dù 1 phần cho độ bền cao, hạn chế rối đứt.'),
(18, 'Điện thoại IPHONE 12', 'https://cdn.tgdd.vn/Products/Images/42/228736/Kit/iphone-12-128gb-note.jpg', 'iPhone 12 được trang bị chipset A14 Bionic - bộ xử lý được trang bị lần đầu trên iPad Air 4 vừa cho ra mắt cách đây không lâu, mở đầu xu thế chip 5 nm thương mại trên toàn thế giới.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `productsdetail`
--
ALTER TABLE `productsdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productsdetail_ibfk_1` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productsdetail`
--
ALTER TABLE `productsdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productsdetail`
--
ALTER TABLE `productsdetail`
  ADD CONSTRAINT `productsdetail_ibfk_1` FOREIGN KEY (`name`) REFERENCES `products` (`name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
