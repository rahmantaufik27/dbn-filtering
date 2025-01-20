/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : ml

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 30/05/2019 12:19:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (4, 4, 'Superuser', NULL, NULL);

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `id_rule_of_bug` int(11) NOT NULL,
  `id_rule_of_procedure` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for exercise_commits
-- ----------------------------
DROP TABLE IF EXISTS `exercise_commits`;
CREATE TABLE `exercise_commits`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_exercise` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for exercise_results
-- ----------------------------
DROP TABLE IF EXISTS `exercise_results`;
CREATE TABLE `exercise_results`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_exercise_commit` int(11) NOT NULL,
  `id_knowledge_level` int(11) NOT NULL,
  `id_rule_of_bug` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for exercises
-- ----------------------------
DROP TABLE IF EXISTS `exercises`;
CREATE TABLE `exercises`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `schedule` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for knowledge_levels
-- ----------------------------
DROP TABLE IF EXISTS `knowledge_levels`;
CREATE TABLE `knowledge_levels`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `competency` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `source` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_05_13_084327_create-student-table', 1);
INSERT INTO `migrations` VALUES (4, '2019_05_27_135928_create-table-role', 2);
INSERT INTO `migrations` VALUES (5, '2019_05_27_140127_create-table-topic', 3);
INSERT INTO `migrations` VALUES (6, '2019_05_27_140233_create-table-question-types', 3);
INSERT INTO `migrations` VALUES (7, '2019_05_27_140315_create-table-materials', 3);
INSERT INTO `migrations` VALUES (8, '2019_05_27_140342_create-table-exercises', 3);
INSERT INTO `migrations` VALUES (9, '2019_05_27_140642_create-table-exercise-commits', 3);
INSERT INTO `migrations` VALUES (10, '2019_05_27_140825_create-table-knowledge-levels', 3);
INSERT INTO `migrations` VALUES (11, '2019_05_27_144458_create-table-questions', 4);
INSERT INTO `migrations` VALUES (12, '2019_05_27_144922_create-table-operations', 4);
INSERT INTO `migrations` VALUES (13, '2019_05_27_145218_create-table-ruleofprocedures', 4);
INSERT INTO `migrations` VALUES (14, '2019_05_27_145432_create-table-ruleofbugs', 4);
INSERT INTO `migrations` VALUES (15, '2019_05_27_145606_create-table-answers', 4);
INSERT INTO `migrations` VALUES (16, '2019_05_27_145904_create-table-exercise-results', 4);
INSERT INTO `migrations` VALUES (17, '2019_05_27_152922_create-table-teachers', 5);
INSERT INTO `migrations` VALUES (18, '2019_05_27_153400_create-table-admins', 6);

-- ----------------------------
-- Table structure for operations
-- ----------------------------
DROP TABLE IF EXISTS `operations`;
CREATE TABLE `operations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_question_type` int(11) NOT NULL,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for question_types
-- ----------------------------
DROP TABLE IF EXISTS `question_types`;
CREATE TABLE `question_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_question_type` int(11) NOT NULL,
  `id_exercise` int(11) NOT NULL,
  `id_knowledge_level` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `question` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (2, 'student', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (3, 'teacher', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for rule_of_bugs
-- ----------------------------
DROP TABLE IF EXISTS `rule_of_bugs`;
CREATE TABLE `rule_of_bugs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_operation` int(11) NOT NULL,
  `bug_rule` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rule_of_procedures
-- ----------------------------
DROP TABLE IF EXISTS `rule_of_procedures`;
CREATE TABLE `rule_of_procedures`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_operation` int(11) NOT NULL,
  `procedure_rule` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nis` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_knowledge_level` int(11) NOT NULL,
  `id_rule_of_bug` int(11) NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 1, '1415000999', 'Mail Supriyadi', 'A', 'student', 1, 1, NULL, NULL, NULL);
INSERT INTO `students` VALUES (2, 2, '1415000000', 'Jajang Sukma', 'A', 'student', 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (3, 3, 'Tatang Rahmat', 'Math', NULL, NULL);

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 2, 'student1', 'student1@mail.com', '$2y$10$sQ8pmxswzD73888avqIY5OhCcLMjLyQ3Lun/8v2gPeqAsI2MamKg6', 'AqOTkNNWEwXSlvFUh7BSKw1TfplZ3VbrnWWwBGqXtHM4f85jojzOQEkkAOwc', NULL, NULL);
INSERT INTO `users` VALUES (2, 2, 'student2', 'student2@mail.com', '$2y$10$DSYyzSLgYgt4APt7Cq4mjutuLHTfcDHuE1FJaE1Ib65i86wBIAtAW', NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 3, 'teacher1', 'teacher1@mail.com', '$2y$10$VYxXbd8Ib5KjafyFyiInBud6tfQ2IWXjQSuKEO1zaf/i9uTiNj8r2', 'GSokYhfu4ktB7VArVKvQQAmGICNOO3njmM3s9Jb16VEGsJih2drUKcMOxSGG', NULL, NULL);
INSERT INTO `users` VALUES (4, 1, 'admin', 'admin@mail.com', '$2y$10$2bTeLkBK90dIJpGmGQYjbOUvTjnTa3QhXft4xZDMvOblXjmECAame', '2Q5NHJInuVv4ErpYByjsf0g3AtBNTEpf5nJenBNjrF1hqDyZ3kZRn6s20tLu', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
