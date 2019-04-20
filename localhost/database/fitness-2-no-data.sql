-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2019 at 08:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness2`
--

-- --------------------------------------------------------

--
-- Table structure for table `binaryfiles`
--

CREATE TABLE `binaryfiles` (
                               `id` int(10) UNSIGNED NOT NULL,
                               `title` varchar(255) DEFAULT NULL,
                               `file_src` varchar(255) DEFAULT NULL,
                               `text` varchar(255) DEFAULT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `binaryfile_user`
--

CREATE TABLE `binaryfile_user` (
                                   `id` int(10) UNSIGNED NOT NULL,
                                   `user_id` int(10) UNSIGNED DEFAULT NULL,
                                   `binaryfile_id` int(10) UNSIGNED DEFAULT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `title` varchar(45) DEFAULT NULL,
                         `count_month` int(11) DEFAULT NULL,
                         `count_day` int(11) DEFAULT NULL,
                         `price` decimal(8,0) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `card_user`
--

CREATE TABLE `card_user` (
                             `id` int(10) UNSIGNED NOT NULL,
                             `user_id` int(10) UNSIGNED DEFAULT NULL,
                             `card_id` int(10) UNSIGNED DEFAULT NULL,
                             `first_date_subscription` date DEFAULT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `title` varchar(255) DEFAULT NULL,
                            `slug` varchar(255) DEFAULT NULL,
                            `text` varchar(255) DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content_user`
--

CREATE TABLE `content_user` (
                                `id` int(10) UNSIGNED NOT NULL,
                                `content_id` int(10) UNSIGNED DEFAULT NULL,
                                `user_id` int(10) UNSIGNED DEFAULT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `title` varchar(45) DEFAULT NULL,
                              `count` int(11) DEFAULT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_gym`
--

CREATE TABLE `equipment_gym` (
                                 `id` int(10) UNSIGNED NOT NULL,
                                 `gym_id` int(10) UNSIGNED DEFAULT NULL,
                                 `equipment_id` int(10) UNSIGNED DEFAULT NULL,
                                 `count_equipment` int(11) DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
                        `id` int(10) UNSIGNED NOT NULL,
                        `title` varchar(255) DEFAULT NULL,
                        `slug` varchar(255) DEFAULT NULL,
                        `number` int(11) DEFAULT NULL,
                        `created_at` timestamp NULL DEFAULT NULL,
                        `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `migration` varchar(255) NOT NULL,
                              `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_20_145152_create_binaryfile_user_table', 1),
(2, '2019_04_20_145152_create_binaryfiles_table', 1),
(3, '2019_04_20_145152_create_card_user_table', 1),
(4, '2019_04_20_145152_create_cards_table', 1),
(5, '2019_04_20_145152_create_content_user_table', 1),
(6, '2019_04_20_145152_create_contents_table', 1),
(7, '2019_04_20_145152_create_equipment_gym_table', 1),
(8, '2019_04_20_145152_create_equipments_table', 1),
(9, '2019_04_20_145152_create_gyms_table', 1),
(10, '2019_04_20_145152_create_personalinfos_table', 1),
(11, '2019_04_20_145152_create_roles_table', 1),
(12, '2019_04_20_145152_create_sections_table', 1),
(13, '2019_04_20_145152_create_shedule_user_table', 1),
(14, '2019_04_20_145152_create_shedules_table', 1),
(15, '2019_04_20_145152_create_trainingtimes_table', 1),
(16, '2019_04_20_145152_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 2),
(18, '2019_04_20_145153_add_foreign_keys_to_binaryfile_user_table', 3),
(19, '2019_04_20_145153_add_foreign_keys_to_card_user_table', 3),
(20, '2019_04_20_145153_add_foreign_keys_to_content_user_table', 3),
(21, '2019_04_20_145153_add_foreign_keys_to_equipment_gym_table', 3),
(22, '2019_04_20_145153_add_foreign_keys_to_shedule_user_table', 3),
(23, '2019_04_20_145153_add_foreign_keys_to_shedules_table', 3),
(24, '2019_04_20_145153_add_foreign_keys_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
                                   `email` varchar(255) NOT NULL,
                                   `token` varchar(255) NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personalinfos`
--

CREATE TABLE `personalinfos` (
                                 `id` int(10) UNSIGNED NOT NULL,
                                 `login` varchar(255) DEFAULT NULL,
                                 `name` varchar(255) DEFAULT NULL,
                                 `surname` varchar(255) DEFAULT NULL,
                                 `middle_name` varchar(255) DEFAULT NULL,
                                 `email` varchar(255) DEFAULT NULL,
                                 `telephone` varchar(255) DEFAULT NULL,
                                 `birthdate` date DEFAULT NULL,
                                 `text` varchar(255) DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `title` varchar(255) DEFAULT NULL,
                         `text` varchar(255) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `title` varchar(255) DEFAULT NULL,
                            `slug` varchar(255) DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shedules`
--

CREATE TABLE `shedules` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `date_training` date DEFAULT NULL,
                            `trainingtime_id` int(10) UNSIGNED DEFAULT NULL,
                            `user_id` int(10) UNSIGNED DEFAULT NULL,
                            `section_id` int(10) UNSIGNED DEFAULT NULL,
                            `gym_id` int(10) UNSIGNED DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shedule_user`
--

CREATE TABLE `shedule_user` (
                                `id` int(10) UNSIGNED NOT NULL,
                                `user_id` int(10) UNSIGNED DEFAULT NULL,
                                `shedule_id` int(10) UNSIGNED DEFAULT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainingtimes`
--

CREATE TABLE `trainingtimes` (
                                 `id` int(10) UNSIGNED NOT NULL,
                                 `start_training` time DEFAULT NULL,
                                 `stop_training` time DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `email_verified_at` datetime DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `personalinfo_id` int(10) UNSIGNED DEFAULT NULL,
                         `role_id` int(10) UNSIGNED DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binaryfiles`
--
ALTER TABLE `binaryfiles`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_binaryfile_user_user_id_idx` (`user_id`),
    ADD KEY `fk_binaryfile_user_binaryfile_id_idx` (`binaryfile_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_user`
--
ALTER TABLE `card_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_card_user_user_id_idx` (`user_id`),
    ADD KEY `fk_card_user_card_id_idx` (`card_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_user`
--
ALTER TABLE `content_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_content_user_content_id_idx` (`content_id`),
    ADD KEY `fk_content_user_user_id_idx` (`user_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_equipment_gym_gym_id_idx` (`gym_id`),
    ADD KEY `fk_equipment_gym_equipment_id_idx` (`equipment_id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
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
-- Indexes for table `personalinfos`
--
ALTER TABLE `personalinfos`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedules`
--
ALTER TABLE `shedules`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_shedules_trainingtime_id_idx` (`trainingtime_id`),
    ADD KEY `fk_shedules_user_id_idx` (`user_id`),
    ADD KEY `fk_shedules_section_id_idx` (`section_id`),
    ADD KEY `fk_shedules_gim_id_idx` (`gym_id`);

--
-- Indexes for table `shedule_user`
--
ALTER TABLE `shedule_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_shedule_user_user_id_idx` (`user_id`),
    ADD KEY `fk_shedule_user_shedule_id_idx` (`shedule_id`);

--
-- Indexes for table `trainingtimes`
--
ALTER TABLE `trainingtimes`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `users_name_unique` (`name`),
    ADD UNIQUE KEY `users_email_unique` (`email`),
    ADD KEY `fk_users_personalinfos_idx` (`personalinfo_id`),
    ADD KEY `fk_users_roles_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binaryfiles`
--
ALTER TABLE `binaryfiles`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_user`
--
ALTER TABLE `card_user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_user`
--
ALTER TABLE `content_user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personalinfos`
--
ALTER TABLE `personalinfos`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shedules`
--
ALTER TABLE `shedules`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shedule_user`
--
ALTER TABLE `shedule_user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingtimes`
--
ALTER TABLE `trainingtimes`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
    ADD CONSTRAINT `fk_binaryfile_user_binaryfile_id` FOREIGN KEY (`binaryfile_id`) REFERENCES `binaryfiles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_binaryfile_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `card_user`
--
ALTER TABLE `card_user`
    ADD CONSTRAINT `fk_card_user_card_id` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_card_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `content_user`
--
ALTER TABLE `content_user`
    ADD CONSTRAINT `fk_content_user_content_id` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_content_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
    ADD CONSTRAINT `fk_equipment_gym_equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_equipment_gym_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `shedules`
--
ALTER TABLE `shedules`
    ADD CONSTRAINT `fk_shedules_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_shedules_section_id` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_shedules_trainingtime_id` FOREIGN KEY (`trainingtime_id`) REFERENCES `trainingtimes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_shedules_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `shedule_user`
--
ALTER TABLE `shedule_user`
    ADD CONSTRAINT `fk_shedule_user_shedule_id` FOREIGN KEY (`shedule_id`) REFERENCES `shedules` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_shedule_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `fk_users_personalinfos` FOREIGN KEY (`personalinfo_id`) REFERENCES `personalinfos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
