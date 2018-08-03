-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 08:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `created_at`, `updated_at`) VALUES
(1, 'J. R. R. Tolkien', '2018-08-02 21:55:03', '2018-08-02 21:55:03'),
(2, 'Veronica Roth', '2018-08-02 21:55:07', '2018-08-02 21:55:07'),
(3, 'John Green', '2018-08-02 21:55:11', '2018-08-02 21:55:11'),
(4, 'Stephen King', '2018-08-02 21:55:18', '2018-08-02 21:55:18'),
(5, 'Stephenie Meyer', '2018-08-02 21:56:02', '2018-08-02 21:56:02'),
(6, 'Zadie Smith', '2018-08-02 21:56:38', '2018-08-02 21:56:38'),
(7, 'James Patterson', '2018-08-02 21:56:45', '2018-08-02 21:56:45'),
(8, 'James Dashner', '2018-08-02 21:57:27', '2018-08-02 21:57:27'),
(9, 'Pittacus Lore', '2018-08-02 21:59:25', '2018-08-02 21:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `issued` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `copies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author_id`, `genre_id`, `section_id`, `issued`, `created_at`, `updated_at`, `copies`) VALUES
(1, 'Lord of the Rings', 1, 27, 5, 0, '2018-08-02 22:03:27', '2018-08-02 22:03:27', 3),
(2, 'The Two Towers', 1, 27, 5, 0, '2018-08-02 22:03:40', '2018-08-02 22:03:40', 4),
(3, 'The Return of the King', 1, 27, 5, 0, '2018-08-02 22:04:07', '2018-08-02 22:04:07', 4),
(4, 'Divergent', 2, 3, 5, 0, '2018-08-02 22:04:55', '2018-08-02 22:04:55', 5),
(5, 'Insurgent', 2, 3, 5, 0, '2018-08-02 22:05:08', '2018-08-02 22:05:08', 5),
(6, 'Allegiant', 2, 3, 5, 0, '2018-08-02 22:05:18', '2018-08-02 22:05:18', 5),
(7, 'The Fault in Our Start', 3, 1, 5, 0, '2018-08-02 22:06:11', '2018-08-02 22:06:11', 5),
(8, 'It', 4, 20, 5, 0, '2018-08-02 22:06:48', '2018-08-02 22:06:48', 5),
(9, 'Twilight', 5, 1, 5, 0, '2018-08-02 22:07:15', '2018-08-02 22:07:15', 5),
(10, 'Breaking Dawn', 5, 1, 5, 0, '2018-08-02 22:07:29', '2018-08-02 22:07:29', 5),
(11, 'New Moon', 5, 1, 5, 0, '2018-08-02 22:07:49', '2018-08-02 22:07:49', 5),
(12, 'Eclipse', 5, 1, 5, 0, '2018-08-02 22:08:01', '2018-08-02 22:08:01', 5),
(13, 'The Host', 5, 1, 5, 0, '2018-08-02 22:08:32', '2018-08-02 22:08:32', 5),
(14, 'Cross', 7, 2, 5, 0, '2018-08-02 22:10:23', '2018-08-02 22:10:23', 5),
(15, 'I Am Number Four', 9, 27, 5, 0, '2018-08-02 22:11:00', '2018-08-02 22:11:00', 5),
(16, 'The Power of Six', 9, 27, 5, 0, '2018-08-02 22:11:38', '2018-08-02 22:11:38', 5),
(17, 'The Rise of Nine', 9, 27, 5, 0, '2018-08-02 22:11:58', '2018-08-02 22:11:58', 5),
(18, 'The Fall of Five', 9, 27, 5, 0, '2018-08-02 22:12:14', '2018-08-02 22:12:14', 5),
(19, 'The Revenge of Seven', 9, 27, 5, 0, '2018-08-02 22:12:36', '2018-08-02 22:12:36', 5),
(20, 'The Fate of Ten', 9, 27, 5, 0, '2018-08-02 22:12:54', '2018-08-02 22:12:54', 5),
(21, 'United as One', 9, 27, 5, 0, '2018-08-02 22:13:11', '2018-08-02 22:13:11', 5);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(1, 'Romance', '2018-08-02 21:51:01', '2018-08-02 21:51:01'),
(2, 'Mystery', '2018-08-02 21:51:07', '2018-08-02 21:51:07'),
(3, 'Science Fiction', '2018-08-02 21:51:13', '2018-08-02 21:51:13'),
(4, 'Horror', '2018-08-02 21:51:19', '2018-08-02 21:51:19'),
(5, 'Encyclopedia', '2018-08-02 21:51:24', '2018-08-02 21:51:24'),
(6, 'Directories', '2018-08-02 21:51:32', '2018-08-02 21:51:32'),
(7, 'Adventure', '2018-08-02 21:51:35', '2018-08-02 21:51:35'),
(8, 'Almanacs', '2018-08-02 21:51:42', '2018-08-02 21:51:42'),
(9, 'Maps', '2018-08-02 21:51:45', '2018-08-02 21:51:45'),
(10, 'Pictures', '2018-08-02 21:51:51', '2018-08-02 21:51:51'),
(11, 'Folklore', '2018-08-02 21:52:02', '2018-08-02 21:52:02'),
(12, 'Short Stories', '2018-08-02 21:52:10', '2018-08-02 21:52:10'),
(13, 'Magazines', '2018-08-02 21:52:14', '2018-08-02 21:52:14'),
(14, 'Newspaper', '2018-08-02 21:52:29', '2018-08-02 21:52:29'),
(15, 'Journal', '2018-08-02 21:52:33', '2018-08-02 21:52:33'),
(16, 'Spirituality', '2018-08-02 21:52:45', '2018-08-02 21:52:45'),
(17, 'Art', '2018-08-02 21:52:48', '2018-08-02 21:52:48'),
(18, 'Cooking', '2018-08-02 21:52:54', '2018-08-02 21:52:54'),
(19, 'Comics', '2018-08-02 21:52:58', '2018-08-02 21:52:58'),
(20, 'History', '2018-08-02 21:53:02', '2018-08-02 21:53:02'),
(21, 'Mythology', '2018-08-02 21:53:43', '2018-08-02 21:53:43'),
(22, 'Biographies', '2018-08-02 21:53:57', '2018-08-02 21:53:57'),
(23, 'Autobiographies', '2018-08-02 21:54:04', '2018-08-02 21:54:04'),
(24, 'Series', '2018-08-02 21:54:07', '2018-08-02 21:54:07'),
(25, 'Diaries', '2018-08-02 21:54:18', '2018-08-02 21:54:18'),
(26, 'Poetry', '2018-08-02 21:54:22', '2018-08-02 21:54:42'),
(27, 'Fantasy Fiction', '2018-08-02 22:02:57', '2018-08-02 22:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('issued','returned') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`id`, `book_id`, `member_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 4, '2018-08-02 22:25:41', '2018-08-02 22:25:41', 'issued'),
(2, 1, 1, '2018-08-02 22:25:50', '2018-08-02 22:25:50', 'issued'),
(3, 1, 3, '2018-08-02 22:25:54', '2018-08-02 22:26:10', 'returned'),
(4, 1, 2, '2018-08-02 22:26:01', '2018-08-02 22:26:08', 'returned'),
(5, 2, 2, '2018-08-02 22:26:17', '2018-08-02 22:26:17', 'issued'),
(6, 2, 3, '2018-08-02 22:26:27', '2018-08-02 22:26:36', 'returned'),
(7, 3, 3, '2018-08-02 22:26:41', '2018-08-02 22:26:41', 'issued');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `sex`, `house_number`, `street`, `barangay`, `city`, `province`, `contact`, `email`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Hakeem', 'Polistico', 'male', '226-B', 'Evangelista St', 'Talaba I', 'Bacoor', 'Cavite', '09558874822', 'hakeem.polistico@tup.edu.ph', 'President of the Library Club.', '2018-08-02 22:14:27', '2018-08-02 22:14:27'),
(2, 'Kim Arvin', 'Toledo', 'male', '212', 'Magsaysay St.', 'Panapaan 2', 'Bacoor', 'Cavite', '095588748222', 'kimarvin.toledo@cvsu.edu.ph', 'Vice President of the Library Club.', '2018-08-02 22:16:04', '2018-08-02 22:16:04'),
(3, 'Patrick', 'Guzman', 'male', '169', 'Ramos St.', 'Malate', 'Manila', 'Metro Manila', '09558874822', 'patrick.guzman@tup.edu.ph', 'Officer title: Darkside.', NULL, '2018-08-02 22:25:27'),
(4, 'Marc', 'Terrobias', 'male', '69-Z', 'Aguinaldo', 'Bago Bantay', 'Quezon City', 'Metro Manila', '09172714146', 'marc.terrobias@tup.edu.ph', 'Officer of the Library Club. Bouncer.', '2018-08-02 22:22:28', '2018-08-02 22:22:28');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_26_083049_create_authors_table', 1),
(4, '2018_07_26_085702_create_books_table', 1),
(5, '2018_07_26_090105_create_sections_table', 1),
(6, '2018_07_26_090147_create_genres_table', 1),
(7, '2018_07_26_091456_create_members_table', 2),
(8, '2018_07_26_093857_create_issued_books_table', 3),
(9, '2018_07_30_105209_rename_stnk_column', 4),
(10, '2018_07_31_085500_add_member_columns', 5),
(11, '2018_08_01_092049_add_col_copies', 6),
(12, '2018_08_02_062822_add_status_to_issuedbooks', 7);

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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `created_at`, `updated_at`) VALUES
(1, 'Circulation', '2018-08-02 22:00:37', '2018-08-02 22:00:37'),
(2, 'Periodical', '2018-08-02 22:00:50', '2018-08-02 22:00:50'),
(3, 'General Reference', '2018-08-02 22:00:56', '2018-08-02 22:00:56'),
(4, 'Children\'s Section', '2018-08-02 22:01:03', '2018-08-02 22:01:03'),
(5, 'Fiction', '2018-08-02 22:01:08', '2018-08-02 22:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$0.YgreInSHu6UYiPxcDLKeF3fDiDklgyQ2yDMWjWdYJQOz5UyFZK2', 'rjY62A1ZVI6m2lRWD7BtLSub9eRF54eIih3ML1soInHCz0ZiB78eO636iqPl', '2018-08-02 20:03:43', '2018-08-02 20:03:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
