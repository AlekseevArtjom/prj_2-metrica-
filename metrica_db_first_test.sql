-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2023 г., 09:02
-- Версия сервера: 5.6.41-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_metrica_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clicks`
--

CREATE TABLE `clicks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `x_coord` int(11) DEFAULT NULL,
  `y_coord` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clicks`
--

INSERT INTO `clicks` (`id`, `pages_id`, `x_coord`, `y_coord`, `year`, `month`, `day`, `hour`, `minute`, `second`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 354, 55, 2023, 1, 1, 2, 52, 3, NULL, '2023-07-02 02:16:21', '2023-07-02 02:16:21'),
(2, 1, 22, 550, 2023, 2, 15, 23, 32, 24, NULL, '2023-07-02 02:17:11', '2023-07-02 02:17:11'),
(3, 2, 922, 750, 2023, 2, 15, 23, 32, 24, NULL, '2023-07-02 02:18:01', '2023-07-02 02:18:01'),
(4, 3, 276, 5578, 2023, 7, 25, 3, 2, 54, NULL, '2023-07-02 02:19:19', '2023-07-02 02:19:19'),
(5, 4, 0, 0, 2023, 7, 25, 3, 2, 54, NULL, '2023-07-02 02:19:59', '2023-07-02 02:19:59'),
(6, 5, 0, 0, 2023, 8, 5, 6, 2, 54, NULL, '2023-07-02 02:20:29', '2023-07-02 02:20:29'),
(7, 6, 100, 100, 2023, 4, 30, 6, 2, 54, NULL, '2023-07-02 02:21:00', '2023-07-02 02:21:00'),
(8, 7, 1000, 800, 2023, 12, 30, 6, 2, 54, NULL, '2023-07-02 02:21:33', '2023-07-02 02:21:33'),
(9, 7, 2000, 1800, 2023, 12, 30, 6, 3, 5, NULL, '2023-07-02 02:23:38', '2023-07-02 02:23:38'),
(10, 8, 2000, 1800, 2023, 12, 30, 6, 3, 5, NULL, '2023-07-02 02:23:58', '2023-07-02 02:23:58'),
(12, 4, 2000, 1800, 2023, 12, 30, 6, 3, 5, NULL, '2023-07-02 02:24:31', '2023-07-02 02:24:31'),
(21, 13, 72, 68, 2021, 7, 2, 13, 45, 12, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(22, 13, 42, 396, 2023, 3, 2, 13, 45, 14, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(23, 13, 49, 311, 2023, 3, 2, 13, 45, 15, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(24, 14, 96, 356, 2023, 7, 2, 13, 45, 16, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(25, 14, 119, 362, 2023, 8, 2, 13, 45, 16, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(26, 14, 135, 369, 2023, 7, 2, 13, 45, 16, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(27, 14, 163, 298, 2023, 7, 2, 13, 45, 18, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(28, 15, 124, 260, 2023, 7, 2, 13, 45, 19, NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(29, 14, 5, 300, 2023, 7, 2, 12, 11, 8, NULL, NULL, NULL),
(30, 14, 300, 5, 2023, 7, 2, 12, 11, 15, NULL, NULL, NULL),
(31, 14, 300, 300, 2023, 7, 2, 12, 11, 50, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_02_22_051309_create_sessions_table', 1),
(6, '2023_07_02_045757_create_table_sites', 2),
(7, '2023_07_02_051418_create_table_pages', 3),
(8, '2023_07_02_052914_create_table_clicks', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sites_id` bigint(20) UNSIGNED NOT NULL,
  `page_full_url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `sites_id`, `page_full_url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'www.test_site_1.com/login', NULL, '2023-07-02 02:02:03', '2023-07-02 02:02:03'),
(2, 1, 'www.test_site_1.com/uresPage', NULL, '2023-07-02 02:03:49', '2023-07-02 02:03:49'),
(3, 1, 'www.test_site_1.com/market', NULL, '2023-07-02 02:04:56', '2023-07-02 02:04:56'),
(4, 2, 'www.another_site.otg/albums', NULL, '2023-07-02 02:09:35', '2023-07-02 02:09:35'),
(5, 2, 'www.another_site.otg/myProfile', NULL, '2023-07-02 02:10:15', '2023-07-02 02:10:15'),
(6, 3, 'www.fake_site.ua/#contacts', NULL, '2023-07-02 02:11:30', '2023-07-02 02:11:30'),
(7, 3, 'www.fake_site.ua/usaMaster', NULL, '2023-07-02 02:11:48', '2023-07-02 02:11:48'),
(8, 3, 'www.fake_site.ua/fakesCatalog/bucha#img1', NULL, '2023-07-02 02:12:33', '2023-07-02 02:12:33'),
(9, 3, 'www.fake_site.ua/help', NULL, '2023-07-02 04:30:42', '2023-07-02 04:30:42'),
(13, 4, 'https://корпоративная-библиотека.рф', NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(14, 4, 'https://корпоративная-библиотека.рф/#contacts', NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40'),
(15, 4, 'https://корпоративная-библиотека.рф#', NULL, '2023-07-02 04:46:40', '2023-07-02 04:46:40');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_domain` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `site_domain`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'www.test_site_1.com', NULL, '2023-07-02 01:52:13', '2023-07-02 01:52:13'),
(2, 'www.another_site.otg', NULL, '2023-07-02 01:57:52', '2023-07-02 01:57:52'),
(3, 'www.fake_site.ua', NULL, '2023-07-02 01:59:45', '2023-07-02 01:59:45'),
(4, 'https://корпоративная-библиотека.рф', NULL, NULL, NULL),
(5, 'http://test_catalog.ru', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test_user_1 (password: test_user_1)', 'test_user_1@mail.ru', NULL, '$2y$10$eaFbIimSudptcYP6uosUNeBqWaCouksVMgNv8vyDg2MFbEkC3A21S', NULL, '2023-07-01 11:24:51', '2023-07-01 11:24:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clicks_pages_id_foreign` (`pages_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_page_full_url_unique` (`page_full_url`),
  ADD KEY `pages_sites_id_foreign` (`sites_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Индексы таблицы `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_site_domain_unique` (`site_domain`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_sites_id_foreign` FOREIGN KEY (`sites_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
