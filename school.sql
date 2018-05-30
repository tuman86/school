-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2017 at 01:04 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `fee_amount`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fees', 120.00, '2017-06-23 03:46:29', '2017-06-23 03:46:29'),
(2, 'A Fees', 500.00, '2017-06-23 03:46:45', '2017-06-23 03:46:45'),
(3, 'B Fees', 50.00, '2017-06-23 03:47:04', '2017-06-23 03:47:04'),
(4, 'C Fees', 40.00, '2017-06-23 03:47:36', '2017-06-23 03:47:36'),
(5, 'D Fee', 60.00, '2017-06-23 03:48:32', '2017-06-23 03:48:32'),
(6, 'test', 1000.00, '2017-06-24 00:43:34', '2017-06-24 00:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `fee_details`
--

CREATE TABLE `fee_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_fee_id` int(10) NOT NULL,
  `fee_id` int(10) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deposited_fee` double(8,2) NOT NULL,
  `balance_fee` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_details`
--

INSERT INTO `fee_details` (`id`, `student_fee_id`, `fee_id`, `amount`, `created_at`, `updated_at`, `deposited_fee`, `balance_fee`) VALUES
(1, 1, 1, 120.00, '2017-07-19 11:42:05', '2017-07-19 11:42:05', 120.00, 0.00),
(2, 1, 2, 500.00, '2017-07-19 11:42:05', '2017-07-19 11:42:05', 500.00, 0.00),
(3, 2, 2, 500.00, '2017-07-19 11:42:55', '2017-07-19 11:42:55', 500.00, 0.00),
(4, 2, 2, 500.00, '2017-07-19 11:42:55', '2017-07-19 11:42:55', 500.00, 0.00),
(5, 3, 1, 120.00, '2017-07-19 11:43:21', '2017-07-19 11:43:21', 120.00, 0.00),
(6, 3, 2, 500.00, '2017-07-19 11:43:21', '2017-07-19 11:43:21', 300.00, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `relation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `student_id`, `first_name`, `last_name`, `contact_number`, `email`, `created_at`, `updated_at`, `relation`) VALUES
(1, 1, 'test2', 'test2', '9876543210', 'test@gmail.com', '2017-06-23 23:58:28', '2017-06-24 00:19:50', 'test2'),
(4, 3, 'testtesttet', 'tetstetststs', '1234567890', 'testetstetst@gmail.com', '2017-06-24 00:43:09', '2017-06-24 00:43:09', 'testetstetst'),
(5, 3, 'gjhghjgj', 'hjgjghghj', 'jhghjgh', 'hgjgj', '2017-06-24 00:43:19', '2017-06-24 00:43:19', 'jhgjhghj');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_20_090523_create_fees_table', 2),
(4, '2017_06_20_094507_create_students_table', 3),
(5, '2017_06_22_025117_create_student_classes_table', 4),
(7, '2017_06_23_115103_create_student_fees_table', 5),
(8, '2017_06_24_044707_create_guardians_table', 6),
(9, '2017_06_24_052133_add_relation_to_guardians_table', 7),
(11, '2017_06_26_150636_add_fee_date_to_student_fees_table', 8),
(13, '2017_06_26_153102_create_fee_details_table', 9),
(14, '2017_07_05_052752_add_deposited_amount_to_fee_details_table', 10),
(16, '2017_07_05_053217_add_adminssion_number_to_students_table', 11),
(17, '2017_07_06_052228_create_reciept_details_table', 12),
(18, '2017_07_18_051346_create_reciepts_table', 13),
(19, '2017_07_30_063937_add_user_detail_to_students_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `student_fee_id` int(10) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reciepts`
--

INSERT INTO `reciepts` (`id`, `student_id`, `user_id`, `student_fee_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 20.00, '2017-07-19 11:42:14', '2017-07-19 11:42:14'),
(2, 4, 1, 3, 22.00, '2017-07-19 11:43:35', '2017-07-19 11:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `reciept_details`
--

CREATE TABLE `reciept_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_fee_id` int(10) NOT NULL,
  `fee_id` int(10) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `admission_date` datetime NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothier_tongue` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rte_act` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_instruction` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_admission_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `gender`, `admission_number`, `date_of_birth`, `admission_date`, `address`, `city`, `state`, `country`, `zip_code`, `aadhar_number`, `bank_account_number`, `ifsc_code`, `comments`, `category`, `religion`, `mothier_tongue`, `rte_act`, `medium_instruction`, `house`, `session`, `class`, `section`, `nationality`, `student_photo`, `created_at`, `updated_at`, `student_admission_id`, `father_name`, `mother_name`, `mobile`) VALUES
(1, 'Test', 'test', 'smdtt86@gmail.com', 'male', '123', '1986-04-22 00:00:00', '2017-06-22 00:00:00', '#10-c street1', 'Lloyds Bank', 'tets', 'test', '12345', '123465798', '123465798', 'avdvdf123', 'testing', 'SC', 'mushlim', 'hindi', 'yes', 'english', 'red', '2017-2018', '11th', 'b', 'Indian', 'test', '2017-06-21 22:31:06', '2017-07-30 01:21:50', '12345', 'test', 'test', '9876543210'),
(3, 'arun', 'kumar', 'arun@gmail.com', 'male', '5768486', '2017-06-22 00:00:00', '2017-06-22 00:00:00', 'abcd', 'fedg', 'ghij', 'klmn', '1234', '123456', '01234567', 'ttrytrytr', 'jytutyutyut', 'general', 'hindu', 'hindi', 'yes', 'hindi', 'red', 'asdf', 'lkg', 'a', 'ghh', 'test', '2017-06-22 10:59:20', '2017-06-22 10:59:20', '', '', '', ''),
(4, '1234', '5678', 'kumar@gmail.com', 'male', 'werty', '2017-06-22 00:00:00', '2017-06-22 00:00:00', 'dsfhg', 'gfb', 'gfgj', 'ytu', 'erettreyr', 'erte', 'sfgfhfgdgf', 'fdgfh', '86786', 'SC', 'mushlim', 'english', 'no', 'english', 'green', 'fhrguj', 'ukg', 'b', 'fdf', 'test', '2017-06-22 11:01:26', '2017-06-22 11:01:26', '', '', '', ''),
(6, 'gjg', 'cvcn', 'naveen@gmail.com', 'male', 'fdg', '2017-06-22 00:00:00', '2017-06-22 00:00:00', '1234', '9087', 'etery', 'treyrt', 'ccvvbb', 'ffgh', 'dfgg', 'dfgg', 'fsgfh', 'ST', 'christan', 'hindi', 'yes', 'hindi', 'yellow', 'addf', '1st', 'c', 'sadsg', 'test', '2017-06-22 11:07:05', '2017-06-22 11:07:05', '', '', '', ''),
(7, 'dsgdf', 'gdgj', 'kamlesh@gmail.com', 'male', 'fsdgf', '2017-06-22 00:00:00', '2017-06-22 00:00:00', 'tj', '43657', '6578', '65476', '2598493086', '657', '5475u', 'reytru', 'tryt', 'general', 'buddhist', 'hindi', 'no', 'hindi', 'red', 'dgfdhfg', '3rd', 'a', 'gfgf', 'test', '2017-06-22 11:12:20', '2017-06-22 11:12:20', '', '', '', ''),
(8, '35465', '5465', 'sandeep@gmail.com', 'male', 'fgdgg', '2017-06-22 00:00:00', '2017-06-22 00:00:00', 'reyrtu', '465467', '6565', 'ftyur', 'ipipoi', 'gjkfh', 'gdfhfgh', 'try', 'yry', 'SC', 'parsi', 'english', 'yes', 'hindi', 'yellow', 'gfdyty', '4th', 'd', 'dgdfyt', 'test', '2017-06-22 11:14:28', '2017-06-22 11:14:28', '', '', '', ''),
(9, 'jhfjgfsdfhghjg', 'kjdhjfds', 'jkhdfhdjkghj@gmail.com', 'male', '987678666', '2017-06-23 00:00:00', '2017-06-23 00:00:00', 'jhgjgjgj', 'jhgjhghjg', 'jhgjhghjg', 'jhgjhghjghj', 'hjghjghjghjg', 'hjghghgjhgghj', 'gjhgjhghg', 'hjgjhgjhghjgj', 'hjgjhghjgjhgjg', 'ST', 'sikh', 'english', 'no', 'english', 'yellow', '2017-2018', '2nd', 'd', 'fdf', 'test', '2017-06-23 02:47:40', '2017-06-23 02:47:40', '', '', '', ''),
(10, 'testttstst', 'testttstst', 'testttstst@gmail.com', 'male', 'testttstst', '2017-06-24 00:00:00', '2017-06-24 00:00:00', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'testttstst', 'SC', 'christan', 'hindi', 'yes', 'hindi', 'yellow', '2017-2018', '10th', 'b', 'Indian', 'test', '2017-06-24 00:41:34', '2017-06-24 00:41:34', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) NOT NULL,
  `fee_id` int(10) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `fee_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `student_id`, `fee_id`, `amount`, `created_at`, `updated_at`, `user_id`, `fee_date`) VALUES
(1, 1, 0, 0.00, '2017-07-19 11:42:05', '2017-07-19 11:42:05', 1, '2017-07-19 00:00:00'),
(2, 3, 0, 0.00, '2017-07-19 11:42:55', '2017-07-19 11:42:55', 1, '2017-07-19 00:00:00'),
(3, 4, 0, 0.00, '2017-07-19 11:43:21', '2017-07-19 11:43:21', 1, '2017-07-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Som Dutt', 'smdtt86@gmail.com', '$2y$10$e/sQJMJ8NSNGMb9D4dApZuH4xsNCdYJHJgBDrhNclBAHs/Jl2B5jC', 'GAdrRFXmcE7j0DtaHwlzmvzu3jEFoMPeHlEVC5c7ARneppLr9bYsaRkt8Uv9', '2017-06-19 01:37:22', '2017-06-19 01:37:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_details`
--
ALTER TABLE `fee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciept_details`
--
ALTER TABLE `reciept_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_classes_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fee_details`
--
ALTER TABLE `fee_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reciept_details`
--
ALTER TABLE `reciept_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
