-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 03:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '1A', 6, NULL, NULL),
(2, '1B', 2, NULL, NULL),
(3, '1C', 5, NULL, NULL),
(4, '1D', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extracurriculars`
--

CREATE TABLE `extracurriculars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extracurriculars`
--

INSERT INTO `extracurriculars` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'basket', '2022-09-03 15:34:16', '2022-09-03 15:34:16'),
(2, 'takraw', '2022-09-03 15:34:16', '2022-09-03 15:34:16'),
(3, 'pramuka', '2022-09-03 15:34:16', '2022-09-03 15:34:16'),
(4, 'futsal', '2022-09-03 15:34:16', '2022-09-03 15:34:16'),
(5, 'voli', '2022-09-03 15:34:16', '2022-09-03 15:34:16');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2022_08_31_142957_create_students_table', 2),
(15, '2022_08_31_143217_add_gender_column_to_students_table', 3),
(20, '2022_08_31_143611_change_gender_attr_in_students_table', 4),
(21, '2022_08_31_144046_create_class_table', 4),
(23, '2022_08_31_144426_add_class_id_columt_to_students_table', 5),
(25, '2022_09_03_081225_extracurriculars_table', 6),
(26, '2022_09_03_090448_make_students_extracurriculars_table', 7),
(27, '2022_09_03_142247_create_teachers_table', 8),
(28, '2022_09_03_144733_add_teachers_id_column_to_class_table', 9),
(29, '2022_09_04_154658_add_image_column_to_students_table', 10),
(30, '2022_09_06_025631_create_roles_table', 11),
(31, '2022_09_06_031003_add_role_id_colum_to_users_table', 12);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-09-06 10:29:39', '2022-09-06 10:29:39'),
(2, 'Teacher', '2022-09-06 10:29:39', '2022-09-06 10:29:39'),
(3, 'Student', '2022-09-06 10:29:39', '2022-09-06 10:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `nis`, `class_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Lou Wolff', 'P', '4704261', 4, NULL, '2022-09-01 16:24:11', '2022-09-07 13:21:04'),
(6, 'Mustafa Hill', 'P', '2309231', 2, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(7, 'Mr. Frederick VonRueden', 'P', '1386358', 2, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(8, 'Kyler Keeling', 'P', '8170795', 1, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(9, 'Bruce Hintz', 'L', '2155760', 4, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(10, 'Dr. Denis Simonis', 'P', '586803', 2, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(11, 'Junius Braun', 'L', '6149688', 2, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(12, 'Francisca McClure', 'P', '9063239', 3, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(13, 'Kane Lubowitz', 'L', '1317772', 4, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(14, 'Miss Icie Kuhn', 'L', '6088913', 1, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(15, 'Makenzie Gerhold V', 'L', '1146254', 4, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(16, 'Alexandre Gutmann', 'L', '3884718', 1, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(17, 'Ms. Joanie Murray II', 'L', '2646176', 4, NULL, '2022-09-01 16:24:11', '2022-09-01 16:24:11'),
(18, 'Clare Crist', 'L', '1776643', 4, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(19, 'Prof. Rosamond Stiedemann DVM', 'P', '273544', 3, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(20, 'Ruby Reynolds', 'L', '5356160', 4, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(21, 'Elva Langosh', 'P', '3171109', 4, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(22, 'Emmie Cremin', 'L', '7097680', 2, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(23, 'Prof. Cruz Oberbrunner I', 'P', '2921948', 2, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(24, 'Americo Feil', 'L', '7418608', 2, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(25, 'Dr. Roslyn Daniel', 'P', '8835018', 2, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(26, 'Prof. Ahmed Medhurst DVM', 'L', '9296840', 3, NULL, '2022-09-01 16:24:12', '2022-09-01 16:24:12'),
(34, 'Mr. Brannon Schmeler', 'P', '2428581', 1, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(35, 'Miss Rebeka Dooley III', 'P', '9142458', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(36, 'Colton Gislason', 'L', '1032152', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(37, 'Margot Grimes', 'L', '8475276', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(38, 'Angela Walker', 'L', '1546680', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(39, 'Hildegard Stark', 'L', '7357973', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(40, 'Tierra Wolff', 'L', '4379991', 3, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(41, 'Celestino Crona', 'L', '6713975', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(42, 'Ms. Creola Champlin PhD', 'L', '3774998', 1, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(43, 'Harley Sauer', 'L', '2729626', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(44, 'Addie Gutkowski', 'L', '7392289', 2, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(45, 'Dr. Isabella Torp', 'L', '8004091', 1, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(46, 'Vena Larson', 'L', '255429', 1, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(47, 'Coty Botsford', 'L', '5171203', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(48, 'Miss Delilah Oberbrunner', 'P', '8738460', 1, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(49, 'Prof. Kyleigh Borer', 'P', '4878187', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(50, 'Brigitte Corwin', 'L', '4691497', 3, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(51, 'Ms. Camilla Mayer', 'L', '8501342', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(52, 'Moshe Stehr IV', 'P', '7445164', 4, NULL, '2022-09-04 22:01:03', '2022-09-04 22:01:03'),
(53, 'Prof. Timmothy Gorczany', 'P', '1741644', 3, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(54, 'Ervin Volkman V', 'L', '1816775', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(55, 'Kevon Boehm', 'L', '1045318', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(56, 'Sadye Hartmann IV', 'L', '857428', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(57, 'Jessie Greenfelder', 'P', '6089904', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(58, 'Roberta Ondricka', 'P', '4346512', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(59, 'Samara Nitzsche', 'L', '5855695', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(60, 'Sammy Bradtke', 'L', '7060427', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(61, 'Ernestine Murazik III', 'P', '796636', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(62, 'Janessa Larson', 'L', '8217841', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(63, 'Lane Ankunding', 'P', '6836209', 4, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(64, 'Roberta Cartwright', 'L', '2180189', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(65, 'Mae Welch', 'P', '1597587', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(66, 'Raymundo Reinger', 'L', '7476200', 3, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(67, 'Dr. Toni Mayer DVM', 'P', '3660246', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(68, 'Mr. Shad Wisoky', 'L', '9362128', 3, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(69, 'Burnice Heidenreich MD', 'L', '8131400', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(70, 'Dr. Liliane Green', 'L', '8070502', 2, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(71, 'Mallie Renner', 'L', '9210112', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(72, 'Willie Schamberger Jr.', 'P', '6455154', 3, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(73, 'Ms. Josefa Aufderhar', 'P', '6094321', 2, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(74, 'Jacky Klein', 'L', '6103974', 1, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(75, 'Selena Erdman', 'L', '7966119', 2, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(76, 'Ruth Predovic', 'P', '8496108', 2, NULL, '2022-09-04 22:01:04', '2022-09-04 22:01:04'),
(77, 'Elnora Donnelly', 'P', '3994522', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(78, 'Dr. Kristian Von', 'P', '4287056', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(79, 'Lee Waelchi', 'L', '308677', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(80, 'Alford Upton', 'P', '5439854', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(81, 'Mr. Bell O\'Reilly II', 'P', '1972831', 2, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(82, 'Dr. Lenore Corwin DDS', 'L', '9017626', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(83, 'Timothy Wisoky', 'P', '28191', 2, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(84, 'Maybelle Botsford', 'L', '9268027', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(85, 'Prof. Tod Turcotte', 'P', '3133446', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(86, 'Chasity Kohler', 'L', '7895834', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(87, 'Prof. Keshawn Johns III', 'P', '2684200', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(88, 'Anjali Rohan', 'P', '3353228', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(89, 'Noemy Kuhic III', 'L', '9258929', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(90, 'Napoleon Rohan', 'P', '6405306', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(91, 'Sidney Mayer', 'L', '5419844', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(92, 'Ivy Grant', 'L', '4643718', 2, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(93, 'Iliana Moen', 'L', '3060034', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(94, 'Vickie Bauch', 'L', '2090188', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(95, 'Loyce Mueller V', 'P', '1939220', 3, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(96, 'Prof. Pat Heller PhD', 'P', '8467175', 2, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(97, 'Patsy Bashirian', 'P', '6523360', 4, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(98, 'Mikayla Trantow', 'P', '6625102', 2, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(99, 'Rhoda Kirlin', 'L', '1247989', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(100, 'Maude Bogisich', 'L', '3535084', 1, NULL, '2022-09-04 22:01:05', '2022-09-04 22:01:05'),
(101, 'Hyman Wunsch', 'L', '6791436', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(102, 'Cecilia O\'Connell III', 'P', '5257662', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(103, 'Prof. Ned Parisian DDS', 'L', '959208', 4, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(104, 'Hershel Altenwerth III', 'L', '4897920', 1, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(105, 'Tristian Lang', 'L', '7959495', 3, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(106, 'Maurine Conn', 'L', '8040225', 1, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(107, 'Dr. Nolan Mraz', 'P', '9964481', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(108, 'Myles Anderson', 'L', '8708017', 4, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(109, 'Lillian Olson', 'L', '6730837', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(110, 'Mr. Dylan Erdman III', 'L', '7573224', 4, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(111, 'Prof. Misty Marks Jr.', 'P', '1064768', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(112, 'Ms. Naomi Dare', 'P', '6290854', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(113, 'Mr. Chris Rogahn', 'P', '1180813', 1, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(114, 'Davon Morissette', 'L', '1595149', 4, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(115, 'Prof. Aliza Lind DDS', 'P', '7691383', 1, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(116, 'Mr. Josue Schulist DDS', 'P', '67035', 1, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(117, 'Ms. Ozella Carroll I', 'L', '6462434', 3, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(118, 'Cora Dicki', 'L', '940070', 3, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(119, 'Addie Schiller', 'P', '2723523', 2, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(120, 'Dorian Bruen II', 'P', '4550012', 4, NULL, '2022-09-04 22:01:06', '2022-09-04 22:01:06'),
(121, 'Dr. Loma Labadie II', 'L', '5163143', 4, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(122, 'Luella Shanahan', 'P', '1810911', 3, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(123, 'Skylar Bergstrom', 'P', '8748239', 3, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(124, 'Lewis Rippin', 'L', '3967215', 2, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(125, 'Deja Schimmel', 'P', '4232922', 3, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(126, 'Mrs. Alverta Wolff', 'P', '3141862', 4, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(127, 'Nakia Lehner', 'P', '8119661', 4, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(128, 'Haleigh Howell', 'L', '9842416', 2, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(129, 'Fae Schinner', 'P', '8650863', 1, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(130, 'Mr. Hershel Powlowski', 'L', '5795769', 1, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(131, 'Ramiro Graham', 'L', '783866', 3, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(132, 'Dr. Garnet Rau I', 'L', '612872', 2, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(133, 'Trent Breitenberg II', 'L', '5476823', 1, NULL, '2022-09-04 22:01:07', '2022-09-04 22:01:07'),
(147, 'awdwadaw', 'L', '556775', 3, 'awdwadaw-1662395393.jpg', '2022-09-05 23:29:53', '2022-09-05 23:29:53'),
(149, 'awdahyjilih', 'L', '776890', 3, 'awdahyjilih-1662395465.jpg', '2022-09-05 23:31:05', '2022-09-05 23:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `students_extracurriculars`
--

CREATE TABLE `students_extracurriculars` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `extracurricular_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_extracurriculars`
--

INSERT INTO `students_extracurriculars` (`student_id`, `extracurricular_id`) VALUES
(16, 1),
(24, 1),
(16, 2),
(24, 2),
(18, 3),
(9, 2),
(10, 2),
(9, 5),
(9, 2),
(24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ludwig Gislason', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(2, 'Jovanny Waelchi', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(3, 'Modesto Blanda', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(4, 'Orie Zulauf', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(5, 'Kira Weber', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(6, 'Harry VonRueden', '2022-09-03 21:29:53', '2022-09-03 21:29:53'),
(7, 'Shannon Roob DVM', '2022-09-03 21:29:53', '2022-09-03 21:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', 1, NULL, '$2y$10$JbyUFMvoTqZnGLI1YM2uBu1O7DkbsbNxpan5ITLatpIK8JAuNRGka', NULL, NULL, NULL),
(2, 'teacher', 'teacher@email.com', 2, NULL, '$2y$10$vgGBBmMdGTB3Yu5FdpD/gejR0zWSlEIeixwCvKy2Ul42B0xjz3lGG', NULL, NULL, NULL),
(3, 'student', 'student@email.com', 3, NULL, '$2y$10$HN5HGJND9crSJwLwADgwUutJqg/uWG6pkukwnp3HQhnKIBh4g5O.q', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `students_extracurriculars`
--
ALTER TABLE `students_extracurriculars`
  ADD KEY `students_extracurriculars_extracurricular_id_foreign` (`extracurricular_id`),
  ADD KEY `students_extracurriculars_student_id_foreign` (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `students_extracurriculars`
--
ALTER TABLE `students_extracurriculars`
  ADD CONSTRAINT `students_extracurriculars_extracurricular_id_foreign` FOREIGN KEY (`extracurricular_id`) REFERENCES `extracurriculars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_extracurriculars_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
