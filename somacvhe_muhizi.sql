-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 08:31 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somacvhe_muhizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `caption`, `image_path`, `uploaded_at`) VALUES
(8, 'we design & build your home dream', 'gallery/677e965dc194b.jpg', '2025-01-08 15:14:37'),
(9, 'we design & build your home dream', 'gallery/677e96bdc31a4.jpg', '2025-01-08 15:16:13'),
(11, 'we design & build your home dream', 'gallery/677e98e3065b7.jpg', '2025-01-08 15:25:23'),
(12, 'we design & build your home dream', 'gallery/677e9938210da.jpg', '2025-01-08 15:26:48'),
(17, 'we design & build your home dream', 'gallery/677ea96fc569e.jpg', '2025-01-08 16:35:59'),
(18, 'we design & build your home dream', 'gallery/677ea9e0626b6.jpg', '2025-01-08 16:37:52'),
(19, 'we design & build your home dream', 'gallery/677eaa74be005.jpg', '2025-01-08 16:40:20'),
(21, 'we design & build your home dream', 'gallery/677eadc0daac5.jpg', '2025-01-08 16:54:24'),
(22, 'we design & build your home dream', 'gallery/677eae2c19a90.jpg', '2025-01-08 16:56:12'),
(23, 'we design & build your home dream', 'gallery/677eaf4b6a24f.jpg', '2025-01-08 17:00:59'),
(24, 'we design & build your home dream', 'gallery/677fdc17b3044.jpg', '2025-01-09 14:24:23'),
(26, 'we design & build your home dream', 'gallery/677fdf5a1ff30.jpg', '2025-01-09 14:38:18'),
(27, 'we design & build your home dream', 'gallery/677fe0adb70a3.jpg', '2025-01-09 14:43:57'),
(28, 'we design & build your home dream', 'gallery/677ffa8eaba7e.jpg', '2025-01-09 16:34:22'),
(29, 'we design & build your home dream', 'gallery/677ffaf7ed9fb.jpg', '2025-01-09 16:36:07'),
(31, 'we design & build your home dream', 'gallery/677ffc0eae16d.jpg', '2025-01-09 16:40:46'),
(32, 'we design & build your home dream', 'gallery/677ffc49ebf72.jpg', '2025-01-09 16:41:45'),
(33, 'we design & build your home dream', 'gallery/677ffc8c2773f.jpg', '2025-01-09 16:42:52'),
(34, 'we design & build your home dream', 'gallery/6780e01dd32d9.jpg', '2025-01-10 08:53:49'),
(35, 'we design & build your home dream', 'gallery/6780e0892ec3b.jpg', '2025-01-10 08:55:37'),
(36, 'we design & build your home dream', 'gallery/6780eb69da383.jpg', '2025-01-10 09:42:01'),
(37, 'we design & build Church', 'gallery/6780edb79e244.jpg', '2025-01-10 09:51:51'),
(38, 'we design & build church', 'gallery/6780ee7f059bd.jpg', '2025-01-10 09:55:11'),
(39, 'we design & build SPORT GROUND ', 'gallery/6780f06b5c211.jpg', '2025-01-10 10:03:23'),
(40, 'we design & build your home dream', 'gallery/67810561033a6.jpg', '2025-01-10 11:32:49'),
(41, 'we design & build your home dream', 'gallery/6781060bd062e.jpg', '2025-01-10 11:35:39'),
(42, 'we design & build your home dream', 'gallery/678106caebc6c.jpg', '2025-01-10 11:38:50'),
(43, 'we design & build your home dream', 'gallery/678107663cfd9.jpg', '2025-01-10 11:41:26'),
(44, 'we design & build Church', 'gallery/678116c9c0bc1.jpg', '2025-01-10 12:47:05'),
(45, 'we design & build Church', 'gallery/678117844a405.jpg', '2025-01-10 12:50:12'),
(46, 'we design & build Church', 'gallery/678117c258284.jpg', '2025-01-10 12:51:14'),
(47, 'we design & build Church', 'gallery/678117f0e062b.jpg', '2025-01-10 12:52:00'),
(48, 'we design & build your home dream', 'gallery/6784e4511e3e0.jpg', '2025-01-13 10:00:49'),
(49, 'we design & build your home dream', 'gallery/6784e4ba05d37.jpg', '2025-01-13 10:02:34'),
(50, 'we design & build your home dream', 'gallery/6784e533c001d.jpg', '2025-01-13 10:04:35'),
(51, 'we design & build your home dream', 'gallery/6784e5e15bcde.jpg', '2025-01-13 10:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `muhizi_form`
--

CREATE TABLE `muhizi_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2a$12$EgZ8/M4uueBlFRek.ePAaeiO16R2vxiYRikfv1P41kjZBebo0Rp9u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muhizi_form`
--
ALTER TABLE `muhizi_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `muhizi_form`
--
ALTER TABLE `muhizi_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
