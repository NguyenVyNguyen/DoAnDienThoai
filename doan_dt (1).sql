-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2025 lúc 10:00 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_dt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`, `brand`) VALUES
(1, 'Điện thoại', 'Apple'),
(2, 'Phụ kiện', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `status`) VALUES
(1, 2, 'Hoàn thành'),
(2, 3, 'Chờ xử lý'),
(3, 4, 'Đang giao'),
(4, 5, 'Hoàn thành'),
(5, 6, 'Đang giao'),
(6, 7, 'Đã hủy'),
(7, 8, 'Hoàn thành'),
(8, 9, 'Chờ xử lý'),
(9, 10, 'Đang giao'),
(10, 2, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantitybuy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id_order`, `id_product`, `date`, `quantitybuy`) VALUES
(1, 1, '2025-11-25', 1),
(1, 7, '2025-11-25', 1),
(2, 5, '2025-11-26', 2),
(3, 2, '2025-11-27', 1),
(4, 4, '2025-11-28', 1),
(5, 9, '2025-11-29', 1),
(7, 6, '2025-11-29', 2),
(8, 3, '2025-11-30', 1),
(9, 10, '2025-11-30', 2),
(10, 8, '2025-11-30', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `warrantyperiod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_user`, `id_category`, `name`, `color`, `price`, `quantity`, `status`, `warrantyperiod`) VALUES
(1, 1, 1, 'iPhone 17 Pro Max', 'Titan Đen', 37990000, 50, 'Còn hàng', 12),
(2, 1, 1, 'Samsung Galaxy S26 Ultra', 'Xanh Lime', 31990000, 45, 'Còn hàng', 12),
(3, 1, 1, 'Xiaomi 16 Pro', 'Trắng Sứ', 19990000, 60, 'Còn hàng', 12),
(4, 1, 2, 'Tai nghe AirPro 4', 'Trắng', 6500000, 75, 'Còn hàng', 12),
(5, 1, 2, 'Củ sạc nhanh 100W PD', 'Đen', 1200000, 200, 'Còn hàng', 6),
(6, 1, 2, 'Pin dự phòng 30000mAh', 'Xám', 1490000, 100, 'Còn hàng', 3),
(7, 1, 2, 'Ốp lưng Silicon iPhone 17', 'Xanh Navy', 350000, 180, 'Còn hàng', 0),
(8, 1, 2, 'Kính cường lực Samsung', 'Trong suốt', 150000, 300, 'Còn hàng', 0),
(9, 1, 1, 'Oppo Find X7 Pro', 'Tím Nebula', 22990000, 40, 'Còn hàng', 12),
(10, 1, 2, 'Dây cáp USB-C bện dù', 'Đỏ', 490000, 120, 'Còn hàng', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `phone`, `fullname`, `role`) VALUES
(1, 'admin_tech', 'hashed_pass1', 'admin@tech.vn', '0901234567', 'Trần Văn Mạnh', b'1'),
(2, 'nguyenthihien', 'hashed_pass2', 'hien.nguyen@gmail.com', '0912345678', 'Nguyễn Thị Hiền', b'0'),
(3, 'phamminh', 'hashed_pass3', 'minh.pham@outlook.com', '0987654321', 'Phạm Văn Minh', b'0'),
(4, 'lelan', 'hashed_pass4', 'lan.le@yahoo.com', '0909998888', 'Lê Thị Lan', b'0'),
(5, 'hoangphuc', 'hashed_pass5', 'phuc.hoang@gmail.com', '0976543210', 'Hoàng Văn Phúc', b'0'),
(6, 'tranthao', 'hashed_pass6', 'thao.tran@vietel.vn', '0918887777', 'Trần Thị Thảo', b'0'),
(7, 'dungkt', 'hashed_pass7', 'dung.kt@gmail.com', '0903456789', 'Kiều Thanh Dũng', b'0'),
(8, 'annguyen', 'hashed_pass8', 'an.nguyen@fpt.vn', '0905678901', 'Nguyễn Đức An', b'0'),
(9, 'buihuong', 'hashed_pass9', 'huong.bui@gmail.com', '0907890123', 'Bùi Thị Hương', b'0'),
(10, 'vietanh', 'hashed_pass10', 'anh.viet@samsung.com', '0908901234', 'Ngô Việt Anh', b'0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_order_user` (`id_user`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `fk_orderdetails_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_users` (`id_user`),
  ADD KEY `fk_product_category` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderdetails_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
