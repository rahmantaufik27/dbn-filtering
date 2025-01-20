-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 11:23 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsaesw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `name`, `created_at`, `updated_at`) VALUES
(4, 4, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_question_type` int(11) NOT NULL,
  `schedule` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `exercise_commits`
--

CREATE TABLE `exercise_commits` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_question_type` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `exercise_results`
--

CREATE TABLE `exercise_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_exercise_commit` int(11) NOT NULL,
  `score` float NOT NULL,
  `id_knowledge_level` int(11) NOT NULL,
  `id_rule_of_bug` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_levels`
--

CREATE TABLE `knowledge_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `competency` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `knowledge_levels`
--

INSERT INTO `knowledge_levels` (`id`, `competency`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Remember', NULL, NULL, NULL),
(2, 'C2', 'Understand', NULL, NULL, NULL),
(3, 'C3', 'Apply', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topic` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_13_084327_create-student-table', 1),
(4, '2019_05_27_135928_create-table-role', 2),
(5, '2019_05_27_140127_create-table-topic', 3),
(6, '2019_05_27_140233_create-table-question-types', 3),
(7, '2019_05_27_140315_create-table-materials', 3),
(8, '2019_05_27_140342_create-table-exercises', 3),
(9, '2019_05_27_140642_create-table-exercise-commits', 3),
(10, '2019_05_27_140825_create-table-knowledge-levels', 3),
(11, '2019_05_27_144458_create-table-questions', 4),
(12, '2019_05_27_144922_create-table-operations', 4),
(13, '2019_05_27_145218_create-table-ruleofprocedures', 4),
(14, '2019_05_27_145432_create-table-ruleofbugs', 4),
(15, '2019_05_27_145606_create-table-answers', 4),
(16, '2019_05_27_145904_create-table-exercise-results', 4),
(17, '2019_05_27_152922_create-table-teachers', 5),
(18, '2019_05_27_153400_create-table-admins', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topic` int(11) NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `id_topic`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Identification Power', NULL, NULL),
(2, 1, 'Product Rule', NULL, NULL),
(3, 1, 'Quotient Rule', NULL, NULL),
(4, 1, 'Power Rule', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL),
(2, 'teacher', NULL, NULL, NULL),
(3, 'student_control', NULL, NULL, NULL),
(4, 'student_experiment', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rule_of_bugs`
--

CREATE TABLE `rule_of_bugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_question_type` int(11) NOT NULL,
  `bug_rule` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `rule_of_procedures`
--

CREATE TABLE `rule_of_procedures` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_question_type` int(11) NOT NULL,
  `procedure_rule` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nis` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_knowledge_level` int(11) NOT NULL,
  `id_rule_of_bug` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_user`, `nis`, `name`, `class`, `id_knowledge_level`, `id_rule_of_bug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1415000999', 'Mail Supriyadi', 'X-TKJ', 1, 1, NULL, NULL, NULL),
(2, 2, '1415000000', 'Jajang Sukma', 'X-RPL', 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `id_user`, `name`, `subject`, `created_at`, `updated_at`) VALUES
(3, 3, 'Resti', 'Matematika', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Eksponen Dasar', NULL, NULL, NULL),
(2, 'Eksponen pangkat pecahan', NULL, NULL, NULL),
(3, 'Eksponen Akar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'student1', 'student1@mail.com', '$2y$10$sQ8pmxswzD73888avqIY5OhCcLMjLyQ3Lun/8v2gPeqAsI2MamKg6', 'AqOTkNNWEwXSlvFUh7BSKw1TfplZ3VbrnWWwBGqXtHM4f85jojzOQEkkAOwc', NULL, NULL),
(2, 3, 'student2', 'student2@mail.com', '$2y$10$DSYyzSLgYgt4APt7Cq4mjutuLHTfcDHuE1FJaE1Ib65i86wBIAtAW', NULL, NULL, NULL),
(3, 2, 'teacher1', 'teacher1@mail.com', '$2y$10$VYxXbd8Ib5KjafyFyiInBud6tfQ2IWXjQSuKEO1zaf/i9uTiNj8r2', 'GSokYhfu4ktB7VArVKvQQAmGICNOO3njmM3s9Jb16VEGsJih2drUKcMOxSGG', NULL, NULL),
(4, 1, 'admin', 'admin@mail.com', '$2y$10$2bTeLkBK90dIJpGmGQYjbOUvTjnTa3QhXft4xZDMvOblXjmECAame', '2Q5NHJInuVv4ErpYByjsf0g3AtBNTEpf5nJenBNjrF1hqDyZ3kZRn6s20tLu', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `exercise_commits`
--
ALTER TABLE `exercise_commits`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `exercise_results`
--
ALTER TABLE `exercise_results`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `knowledge_levels`
--
ALTER TABLE `knowledge_levels`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rule_of_bugs`
--
ALTER TABLE `rule_of_bugs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rule_of_procedures`
--
ALTER TABLE `rule_of_procedures`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise_commits`
--
ALTER TABLE `exercise_commits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise_results`
--
ALTER TABLE `exercise_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledge_levels`
--
ALTER TABLE `knowledge_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rule_of_bugs`
--
ALTER TABLE `rule_of_bugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule_of_procedures`
--
ALTER TABLE `rule_of_procedures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
