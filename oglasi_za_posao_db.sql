-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 11:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oglasi_za_posao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'it', '2022-02-23 14:55:28', '2022-02-23 14:55:28'),
(11, 'Komercijala - prodaja', 'komercijala - prodaja', '2022-02-27 19:22:21', '2022-02-27 19:22:21'),
(13, 'Bankarstvo', 'bankarstvo', '2022-02-27 20:39:06', '2022-02-27 20:39:06'),
(16, 'Računovodstvo', 'računovodstvo', '2022-02-27 20:39:32', '2022-02-27 20:39:32'),
(17, 'Marketing', 'marketing', '2022-02-27 20:59:49', '2022-02-27 20:59:49'),
(18, 'Pravo', 'pravo', '2022-02-27 21:00:30', '2022-02-27 21:00:30'),
(19, 'Ekonomija', 'ekonomija', '2022-02-24 22:04:13', '2022-02-24 22:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `nickname`, `body`, `created_at`, `updated_at`) VALUES
(5, 15, 3, NULL, 'Nulla vehicula magna nec est rutrum laoreet. Mauris at commodo turpis. Praesent sagittis erat odio, eu euismod nisi rhoncus ac.', '2022-02-27 21:07:50', '2022-02-27 21:07:50'),
(6, 17, 3, NULL, 'Nulla vehicula magna nec est rutrum laoreet. Mauris at commodo turpis.', '2022-02-27 21:08:29', '2022-02-27 21:08:29'),
(7, 20, NULL, 'Dragana', 'Mauris vitae fermentum ante. Vestibulum vel euismod ipsum. Phasellus eget hendrerit ligula. Curabitur sollicitudin rhoncus lacus, in pulvinar tortor luctus id.', '2022-02-27 21:12:01', '2022-02-27 21:12:01'),
(8, 15, NULL, 'Jovana', 'Nunc ut tincidunt lorem. Aenean dictum semper massa id lobortis. Quisque ligula velit, commodo eu mi eu, pretium luctus justo. Quisque semper laoreet mauris, vel scelerisque lacus pellentesque ac.', '2022-02-27 21:12:22', '2022-02-27 21:12:22'),
(9, 18, NULL, 'Ana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut magna eu odio rutrum euismod. Sed metus enim, convallis pulvinar est euismod, facilisis scelerisque turpis. Nam tincidunt tempus mauris quis sagittis. Nunc ut tincidunt lorem.', '2022-02-27 21:13:03', '2022-02-27 21:13:03'),
(10, 18, 2, NULL, 'Quisque ligula velit, commodo eu mi eu, pretium luctus justo. Quisque semper laoreet mauris, vel scelerisque lacus pellentesque ac.', '2022-02-27 21:13:42', '2022-02-27 21:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_02_17_125019_create_roles_table', 1),
(26, '2022_02_17_125441_create_user_role_table', 1),
(27, '2022_02_17_185817_create_categories_table', 1),
(28, '2022_02_17_185921_create_posts_table', 1),
(29, '2022_02_18_224350_create_comments_table', 1),
(30, '2022_02_26_214050_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_notification` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `post_image`, `body`, `location`, `address`, `get_notification`, `created_at`, `updated_at`) VALUES
(15, 2, 11, 'Prodavač/Prodavačica', 'dm.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pharetra turpis a dui maximus, sit amet ultricies lacus efficitur. Sed ullamcorper risus at magna lacinia, sit amet ullamcorper quam aliquam. Fusce pretium diam non mauris porttitor, vitae ultrices neque egestas. Cras tempus diam in sapien condimentum aliquam. Donec in purus tristique, ullamcorper ipsum id, dictum libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi pharetra congue nunc, et vestibulum odio ultricies sit amet. Donec ullamcorper lectus sapien. Sed sed interdum mauris, non lobortis quam. Praesent viverra, tortor id malesuada condimentum, augue dui feugiat lorem, ac facilisis lorem sapien in odio. Mauris felis orci, fermentum vel est at, sodales pulvinar magna.', 'Lukavica', 'Vojvode Radomira Putnika, 355', 1, '2022-02-27 20:58:17', '2022-02-27 20:58:17'),
(16, 2, 17, 'Voditelj sektora oglašavanja', 'Merkator.png', 'Nulla sit amet laoreet purus. In hac habitasse platea dictumst. Phasellus eu diam dapibus est consectetur pharetra. Proin consequat elit eu nunc convallis semper. Donec gravida sem vel purus aliquet porttitor. Sed rutrum lorem quis massa malesuada porttitor. Fusce ut quam molestie, facilisis ipsum eu, pharetra urna. Suspendisse potenti. Curabitur rhoncus eu ex in vulputate. Nulla bibendum tellus ut ullamcorper venenatis. Fusce volutpat nisl elit, id pharetra dui pellentesque sit amet.', 'Novi Sad', 'Dolor site, 15', 0, '2022-02-27 21:01:11', '2022-02-27 21:01:11'),
(17, 2, 11, 'Vođa smjene', 'dm.jpg', 'Phasellus ac lectus nec justo pretium dictum in quis lorem. Nullam accumsan pharetra odio, quis pulvinar neque sagittis at. Nulla vehicula magna nec est rutrum laoreet. Mauris at commodo turpis. Praesent sagittis erat odio, eu euismod nisi rhoncus ac. Etiam a egestas dui. Aliquam vulputate diam et ipsum bibendum, ut sodales nisl tempor. Nunc at hendrerit nunc. Aliquam eu dui id dolor scelerisque mattis.', 'Beograd', 'Lorem ipsum, 25', 1, '2022-02-27 21:02:33', '2022-02-27 21:02:33'),
(18, 3, 13, 'Bankarski službenik na poslovima kreditne/finansijske analize', 'Raiffeisen.jpg', 'Phasellus ac lectus nec justo pretium dictum in quis lorem. Nullam accumsan pharetra odio, quis pulvinar neque sagittis at. Nulla vehicula magna nec est rutrum laoreet. Mauris at commodo turpis. Praesent sagittis erat odio, eu euismod nisi rhoncus ac. Etiam a egestas dui. Aliquam vulputate diam et ipsum bibendum, ut sodales nisl tempor. Nunc at hendrerit nunc. Aliquam eu dui id dolor scelerisque mattis.', 'Bugojno', 'Lorem Ipsum, 555', 1, '2022-02-27 21:05:22', '2022-02-27 21:05:22'),
(19, 3, 13, 'Voditelj poslovnice', 'Raiffeisen.jpg', 'Cras feugiat quis massa vitae gravida. Morbi at orci sit amet lacus sollicitudin faucibus sed sed ipsum. Pellentesque eleifend ex vitae lectus viverra porta. Pellentesque a dictum elit, eget dictum purus. Cras at interdum est. Morbi eleifend dui nulla, blandit blandit ante iaculis sit amet. Etiam ac lacus condimentum turpis suscipit venenatis eu non lorem. Phasellus ut nunc in nunc facilisis iaculis a vitae nibh. Mauris sagittis purus id dignissim gravida. Quisque turpis massa, condimentum ut volutpat ac, laoreet sed dolor. Maecenas et dui nunc.', 'Banja Luka', 'Lorem Ipsum, 55', 1, '2022-02-27 21:06:55', '2022-02-27 21:06:55'),
(20, 4, 1, 'Medior/Senior Software Developer', 'microsoft.jfif', 'Cras feugiat quis massa vitae gravida. Morbi at orci sit amet lacus sollicitudin faucibus sed sed ipsum. Pellentesque eleifend ex vitae lectus viverra porta. Pellentesque a dictum elit, eget dictum purus. Cras at interdum est. Morbi eleifend dui nulla, blandit blandit ante iaculis sit amet. Etiam ac lacus condimentum turpis suscipit venenatis eu non lorem. Phasellus ut nunc in nunc facilisis iaculis a vitae nibh. Mauris sagittis purus id dignissim gravida. Quisque turpis massa, condimentum ut volutpat ac, laoreet sed dolor. Maecenas et dui nunc.', 'Beograd', 'Dolor site, 355', 1, '2022-02-27 21:09:40', '2022-02-27 21:09:40'),
(21, 4, 1, 'IT podrška', 'Deichmann.jpg', 'Cras feugiat quis massa vitae gravida. Morbi at orci sit amet lacus sollicitudin faucibus sed sed ipsum. Pellentesque eleifend ex vitae lectus viverra porta. Pellentesque a dictum elit, eget dictum purus. Cras at interdum est. Morbi eleifend dui nulla, blandit blandit ante iaculis sit amet. Etiam ac lacus condimentum turpis suscipit venenatis eu non lorem..', 'Novi Sad', 'Bulevar Oslobođenja, 552', 0, '2022-02-27 21:10:26', '2022-02-27 21:10:26'),
(22, 4, 1, 'IT podrška', 'lidl.jpg', 'Mauris vitae fermentum ante. Vestibulum vel euismod ipsum. Phasellus eget hendrerit ligula. Curabitur sollicitudin rhoncus lacus, in pulvinar tortor luctus id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut magna eu odio rutrum euismod. Sed metus enim, convallis pulvinar est euismod, facilisis scelerisque turpis. Nam tincidunt tempus mauris quis sagittis. Nunc ut tincidunt lorem. Aenean dictum semper massa id lobortis. Quisque ligula velit, commodo eu mi eu, pretium luctus justo. Quisque semper laoreet mauris, vel scelerisque lacus pellentesque ac.', 'Sarajevo', 'Dolor site, 155', 1, '2022-02-27 21:11:14', '2022-02-27 21:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2022-02-20 14:55:03', '2022-02-20 14:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-02-26 19:20:27', '2022-02-26 19:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ivana', 'female1.jpg', 'ivana.klepic998@gmail.com', NULL, '$2y$10$Ftklve0tMuYH0LPyQpcNH.1.5dWKAyHyIQTJrFVGYqlSINJLKmmfq', '686ec09d103991d898f697d6acefbb04b566b5bc', 1, NULL, '2022-02-27 14:32:55', '2022-02-27 19:25:42'),
(3, 'Milica', 'female2.jpg', 'klepicivana55@gmail.com', NULL, '$2y$10$lkbP/sVbvK2DtiM3VL5h7.12NKPfcHMbcbAX4WWcFki28gbCik8fa', 'e3755c777a5ba8fbf7b47eb7152a3f35a3920c1e', 1, NULL, '2022-02-27 14:59:44', '2022-02-27 15:00:03'),
(4, 'Danilo', 'male1.jpg', 'pronadjiposao.ba@gmail.com', NULL, '$2y$10$A1o0inYJr/WKVnQgIJ0XW.KXVy5YF6b3qJ42EyXk7k9cUlEhaMpZy', 'acb647688c00dc206e98b9f61db49c87c50ac53a', 1, NULL, '2022-02-27 15:13:20', '2022-02-27 15:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
