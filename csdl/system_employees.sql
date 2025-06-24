-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2025 lúc 02:11 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `system_employees`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `des`) VALUES
(1, 'Phòng Kỹ thuật ', 'Chịu trách nhiệm phát triển và vận hành hệ thống phần mềm '),
(2, 'Phòng Marketing', 'Phụ trách quảng bá thương hiệu và thu hút khách hàng'),
(3, 'Phòng Kinh doanh', 'Phụ trách bán hàng và chăm sóc khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `FullName`, `thumbnail`, `gender`, `dob`, `address`, `email`, `phone`, `HireDate`, `position`, `salary`, `status`, `team_id`) VALUES
(1, 'Nguyễn Thị Ánh Viên', 'assets/img/profiles/avatar-03.jpg', 'Nữ', '1990-05-10', 'Hà Nội', 'anh.nguyen@company.com', '0912345678', '2020-01-15', 'Nhân viên Tester cao cấp', 9000000, 'Đang làm', 3),
(2, 'Trần Văn Bảo', 'assets/img/profiles/6839d28a9b868.jpg', 'Nam', '1988-08-22', 'Hà Nội', 'bao.tran@company.com', '0912345679', '2019-03-10', 'Nhân viên Backend', 11000000, 'Đang làm', 1),
(3, 'Phạm Quốc Cường', 'assets/img/profiles/avatar-05.jpg', 'Nam', '1995-12-02', 'Hà Nội', 'cuong.pham@company.com', '0912345680', '2021-07-01', 'Nhân viên chăm sóc khách hàng', 9000000, 'Đang làm', 9),
(4, 'Lê Thị Dung', 'assets/img/profiles/avatar-04.jpg', 'Nữ', '1992-04-18', 'Hà Nội', 'dung.le@company.com', '0912345681', '2018-11-20', 'Nhân viên chăm sóc khách hàng', 9000000, 'Đang làm', 9),
(5, 'Nguyễn Văn Hùng', 'assets/img/profiles/avatar-07.jpg', 'Nam', '1991-03-22', 'Hà Nội', 'hung.nguyen@company.com', '0912345682', '2021-05-01', 'Nhân viên Frontend', 10500000, 'Đang làm', 2),
(6, 'Phạm Thị Lan', 'assets/img/profiles/avatar-06.jpg', 'Nữ', '1993-07-15', 'Hà Nội', 'lan.pham@company.com', '0912345683', '2020-07-12', 'Nhân viên Social Media', 9500000, 'Đang làm', 7),
(7, 'Trần Đức Minh', 'assets/img/profiles/avatar-08.jpg', 'Nam', '1990-11-30', 'Hà Nội', 'minh.tran@company.com', '0912345684', '2018-08-01', 'Nhân viên DevOps', 11500000, 'Đang làm', 4),
(8, 'Lê Thị Hằng', 'assets/img/profiles/avatar-09.jpg', 'Nữ', '1992-05-19', 'Hà Nội', 'hang.le@company.com', '0912345685', '2019-01-20', 'Nhân viên Frontend', 10500000, 'Đang làm', 2),
(9, 'Đỗ Mạnh Cường', 'assets/img/profiles/avatar-10.jpg', 'Nam', '1989-09-09', 'Hà Nội', 'cuong.do@company.com', '0912345686', '2020-02-25', 'Nhân viên Tester', 12000000, 'Đang làm', 3),
(10, 'Vũ Thị Ngọc', 'assets/img/profiles/avatar-11.jpg', 'Nữ', '1994-12-01', 'Hà Nội', 'ngoc.vu@company.com', '0912345687', '2021-06-15', 'Nhân viên Content', 10000000, 'Đang làm', 5),
(11, 'Hoàng Văn Tiến', 'assets/img/profiles/avatar-12.jpg', 'Nam', '1991-04-17', 'Hà Nội', 'tien.hoang@company.com', '0912345688', '2019-09-01', 'Nhân viên chăm sóc khách hàng', 9000000, 'Đang làm', 9),
(12, 'Nguyễn Thị Mai', 'assets/img/profiles/avatar-14.jpg', 'Nữ', '1990-08-08', 'Hà Nội', 'mai.nguyen@company.com', '0912345689', '2018-05-10', 'Nhân viên bán hàng trực tiếp', 10000000, 'Đang làm', 8),
(13, 'Lê Quốc Bảo', 'assets/img/profiles/avatar-13.jpg', 'Nam', '1992-01-22', 'Hà Nội', 'bao.le@company.com', '0912345690', '2021-03-11', 'Nhân viên Social Media', 9500000, 'Đang làm', 5),
(14, 'Trần Thị Hương', 'assets/img/profiles/avatar-16.jpg', 'Nữ', '1995-07-07', 'Hà Nội', 'huong.tran@company.com', '0912345691', '2020-10-18', 'Nhân viên SEO', 9500000, 'Đang làm', 6),
(15, 'Phạm Văn Đức', 'assets/img/profiles/avatar-15.jpg', 'Nam', '1988-06-06', 'Hà Nội', 'duc.pham@company.com', '0912345692', '2017-12-01', 'Nhân viên Backend', 11000000, 'Đang làm', 1),
(16, 'Đỗ Thị Lý', 'assets/img/profiles/avatar-17.jpg', 'Nữ', '1993-03-03', 'Hà Nội', 'ly.do@company.com', '0912345693', '2022-01-01', 'Nhân viên Frontend', 10500000, 'Đang làm', 2),
(17, 'Nguyễn Văn Hảo', 'assets/img/profiles/avatar-18.jpg', 'Nam', '1990-10-10', 'Hà Nội', 'hao.nguyen@company.com', '0912345694', '2019-07-22', 'Nhân viên Social Media', 9500000, 'Đang làm', 7),
(18, 'Lê Thị Yến', 'assets/img/profiles/avatar-19.jpg', 'Nữ', '1991-02-02', 'Hà Nội', 'yen.le@company.com', '0912345695', '2020-04-05', 'Nhân viên Tester', 12000000, 'Đang làm', 3),
(19, 'Vũ Mạnh Hùng', 'assets/img/profiles/avatar-20.jpg', 'Nam', '1992-09-09', 'Hà Nội', 'hung.vu@company.com', '0912345696', '2018-09-09', 'Nhân viên DevOps', 11500000, 'Đang làm', 4),
(20, 'Hoàng Thị Thảo', 'assets/img/profiles/avatar-21.jpg', 'Nữ', '1994-11-11', 'Hà Nội', 'thao.hoang@company.com', '0912345697', '2021-11-11', 'Nhân viên Frontend', 10500000, 'Đang làm', 2),
(29, 'Lê Đình Phát ', 'assets/img/profiles/683a5729ce280.jpg', 'Nam', '2004-01-17', 'Hà Nội', 'ledinhphat62@gmail.com', '09876554325', '2025-06-08', 'Nhân viên SEO', 9000000, 'Đang làm', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `remaining_days` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `approver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `leave`
--

INSERT INTO `leave` (`leave_id`, `emp_id`, `leave_type`, `start_date`, `end_date`, `days`, `remaining_days`, `reason`, `status`, `created_at`, `updated_at`, `approver_id`) VALUES
(1, 1, 'Nghỉ phép năm', '2025-06-01', '2025-06-03', 3, 9, 'Đi du lịch', 'Đã duyệt', '2025-05-28 14:03:54', '2025-05-31 02:37:22', 1),
(2, 6, 'Nghỉ ốm', '2025-05-20', '2025-05-21', 2, 10, 'Sốt cao, có giấy bác sĩ', 'Chờ duyệt', '2025-05-28 14:03:54', '2025-05-30 16:37:41', NULL),
(3, 10, 'Nghỉ thai sản', '2025-07-01', '2025-12-31', 184, 12, 'Sinh con', 'Chờ duyệt', '2025-05-28 14:03:54', '2025-05-30 16:37:41', 1),
(4, 12, 'Nghỉ việc riêng', '2025-06-10', '2025-06-12', 3, 9, 'Đám cưới người thân', 'Chờ duyệt', '2025-05-28 14:03:54', '2025-05-30 16:37:41', 1),
(5, 15, 'Nghỉ không lương', '2025-06-15', '2025-06-17', 3, 9, 'Giải quyết việc gia đình', 'Chờ duyệt', '2025-05-28 14:03:54', '2025-05-30 16:37:41', 1),
(6, 2, 'Nghỉ việc riêng', '2025-05-10', '2025-05-12', 3, 9, 'Nghỉ phép du lịch', 'Đã duyệt', '2025-05-30 08:12:36', '2025-05-30 16:38:09', 1),
(7, 3, 'Nghỉ việc riêng', '2025-05-15', '2025-05-17', 3, 9, 'Nghỉ phép gia đình', 'Từ chối', '2025-05-30 08:12:36', '2025-05-30 16:38:16', 1),
(8, 4, 'Nghỉ việc riêng', '2025-05-20', '2025-05-22', 3, 9, 'Nghỉ phép nghỉ dưỡng', 'Đã duyệt', '2025-05-30 08:12:36', '2025-05-30 23:22:19', 1),
(9, 5, 'Nghỉ việc riêng', '2025-05-25', '2025-05-27', 3, 9, 'Nghỉ phép kết hợp', 'Đã duyệt', '2025-05-30 08:12:36', '2025-05-31 00:33:30', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `dept_id`) VALUES
(1, 'Backend', 1),
(2, 'Frontend', 1),
(3, 'Tester', 1),
(4, 'DevOps', 1),
(5, 'Content', 2),
(6, 'SEO', 2),
(7, 'Social Media', 2),
(8, 'Bán hàng trực tiếp', 3),
(9, 'Chăm sóc khách hàng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `username`, `password`, `email`, `role`) VALUES
(1, 20, 'Lê Đình Phát', '1234abcd', 'admin@gmail.com', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_ibfk_1` (`team_id`);

--
-- Chỉ mục cho bảng `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `fk_leave_approver` (`approver_id`);

--
-- Chỉ mục cho bảng `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `team_ibfk_1` (`dept_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `fk_leave_approver` FOREIGN KEY (`approver_id`) REFERENCES `employee` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
