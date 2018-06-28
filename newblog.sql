-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 12:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `discription`, `created_at`, `updated_at`) VALUES
(4, 'Egyptian', 'Egyptian writers', NULL, NULL),
(5, 'Arabian', 'Arabian writers', NULL, NULL),
(6, 'Foreign', 'Foreign writers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `body`, `created_at`, `updated_at`, `user_id`) VALUES
(11, 9, 'He is my lovely writer :))', '2018-05-30 04:12:37', '2018-05-30 04:12:37', 0),
(12, 10, 'May Allah please here soul..', '2018-05-30 06:03:40', '2018-05-30 06:03:40', 0),
(13, 11, 'May Allah please here soul :))', '2018-06-01 15:16:15', '2018-06-01 15:16:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_05_23_140208_create_posts_table', 1),
(10, '2018_05_24_233625_add_url_to_posts', 2),
(11, '2018_05_25_134457_create_comments_table', 3),
(12, '2018_05_26_155420_create_categories_table', 4),
(13, '2018_05_27_125918_add_category_id_to_posts', 5),
(14, '2018_05_29_222159_create_roles_table', 6),
(15, '2018_05_29_225808_create_user_role_table', 7),
(16, '2018_06_03_141334_add_user_id_to_comments_table', 8),
(17, '2018_06_03_150941_create_settings_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `url`, `category_id`) VALUES
(9, 'Abdel Rahman Munif', 'Abdel Rahman Munif  was a Saudi novelist. His novels include strong political elements...', '2018-05-26 22:36:39', '2018-05-26 22:36:39', '1527348999.jpg', 5),
(10, 'mai zeyada', 'was a Lebanese-Palestinian poet, essayist and translator\r\nKnown as a prolific writer, she wrote for Arabic newspapers and periodicals, Ziade also wrote a number of poems and books.', '2018-05-27 14:40:29', '2018-05-27 14:40:29', '1527406829.jpg', 5),
(11, 'Radwa Ashour', 'Radwa Ashour is an Egyptian novelist', '2018-06-01 15:14:46', '2018-06-01 15:14:46', '1527840886.jpg', 4),
(12, 'Naguib Mahfouz', 'Naguib Mahfouz was an Egyptian writer who won the 1988 Nobel Prize for Literature', '2018-06-01 15:18:38', '2018-06-01 15:18:38', '1527841118.jpg', 4),
(13, 'Dostoevsky', 'My favourite Russian author is Dostoevsky', '2018-06-01 15:19:31', '2018-06-01 15:19:31', '1527841171.jpg', 6),
(14, 'Agatha Christie', 'Agatha Christie is best known for her detective novels, short story collections, plays and famous detective sleuths Hercule Poirot and Miss Marple', '2018-06-01 16:06:52', '2018-06-01 16:06:52', '1527844012.jpg', 6),
(16, 'Amélie Nothomb', 'Amélie Nothomb (French: [a.me.li nɔ.tɔ̃b]), pen name of Fabienne-Claire Nothomb born on 9 July 1966 in Etterbeek, Belgium', '2018-06-02 20:37:58', '2018-06-02 20:37:58', '1527946678.jpg', 6),
(18, 'anton', 'anton', '2018-06-02 20:56:56', '2018-06-02 20:56:56', '1527947816.jpg', NULL),
(19, 'Ahmed Khaled Tawfik', 'Ahmed Khaled Tawfik or Ahmed Khaled Towfik who wrote more than 200 paperbacks', '2018-06-04 20:39:53', '2018-06-04 20:39:53', '1528119593.jpg', NULL),
(20, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:00:26', '2018-06-21 03:00:26', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(21, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:00:55', '2018-06-21 03:00:55', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(22, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:03:21', '2018-06-21 03:03:21', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(23, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:04:03', '2018-06-21 03:04:03', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(24, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:06:14', '2018-06-21 03:06:14', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(25, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:08:18', '2018-06-21 03:08:18', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(26, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:10:26', '2018-06-21 03:10:26', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(27, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:33:29', '2018-06-21 03:33:29', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(28, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:33:47', '2018-06-21 03:33:47', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(29, 'ahmed khaled', 'he was agood writer', '2018-06-21 03:33:50', '2018-06-21 03:33:50', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(30, 'ahmed khaled', 'he was agood writer', '2018-06-21 10:49:49', '2018-06-21 10:49:49', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL),
(31, 'ahmed khaled', 'he was agood writer', '2018-06-21 10:53:52', '2018-06-21 10:53:52', '/Users/rowad/Desktop/ahmed khaled tawfik.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'this is admin', NULL, NULL),
(2, 'editor', 'this is editor', NULL, NULL),
(3, 'user', 'this is user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describtion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `describtion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'stop_comment', '0', '', 14, NULL, NULL),
(2, 'stop_register', '0', '', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'noha', 'noha@yahoo.com', '$2y$10$x3nFCjwv/3T2VW5OPJswI.9CovL4YTt4uUs5jyuIdj3oUpa/eh8Qy', '', 'U6WkBKw9owb8c0qsmnf40vsX6ij1FMa6VRcS3wlYcAtog4FLIQ2pQ8wXvPjZ', '2018-05-30 04:17:57', '2018-05-30 04:17:57'),
(6, 'soha', 'soha@yahoo.com', '$2y$10$Oi0iJo0mlhRRHGomO2oVgOSTg2elLRDPHAuc.q/nN3faHQ3G8D7Tu', '', NULL, '2018-06-01 19:58:40', '2018-06-01 19:58:40'),
(14, 'Fatma Abdelrahman', 'fatmaAbdelrahman@test.com', '$2y$10$rFs.ZQnR12Nv9molHF9Voeoj5D5DSNshsakZGMtKqewPs.FnsbNYq', 'THKMdx7rNEJKfKHSXZl0JYEFIzSP005DAyWULCKufP6sUA0UF7', 'W9zRUkkWIIHBIrtZQEGYGL3w5L9XKvGXG1oUNc6C0GaCEMQyQeQnXpXi1Nzw', '2018-06-02 19:59:25', '2018-06-12 21:04:58'),
(15, 'Alaa', 'Alaa@lolo.com', '$2y$10$pWDvDmUFXrVE2FnbP9ABAOnDH7X2NPtampR65az/YsHmZ5gsteyqW', '', NULL, '2018-06-02 21:54:14', '2018-06-02 21:54:14'),
(16, 'hoda', 'hoda@mail.com', '$2y$10$t3lF3i/X0R4CG.nHfCy2QuuC37KTScUBiZqNmj/E3I4C99oqHz6s6', 'fafafafafafafaf', NULL, '2018-06-12 21:24:29', '2018-06-12 21:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 5, 3, NULL, NULL),
(10, 15, 3, NULL, NULL),
(11, 16, 3, NULL, NULL),
(12, 14, 3, NULL, NULL),
(13, 14, 1, NULL, NULL),
(14, 6, 3, NULL, NULL),
(15, 6, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
