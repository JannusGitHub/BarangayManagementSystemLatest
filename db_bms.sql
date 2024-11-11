-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 12:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `details`, `date`, `image`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Types of Sisig', 'Kisig Sisig', '2024-01-10 07:54:00', '317937530_1211166109608505_2895943724164801544_n.jpg', '1', 0, 7, 83, '2023-01-09 23:54:34', '2024-06-03 23:12:35'),
(2, 'Food Menu', 'Kisig sisig', '2024-01-10 11:50:00', 'sisigmenuuuuu.jpg', '1', 0, 7, 83, '2023-01-10 03:50:36', '2024-05-27 16:15:49'),
(3, 'Sports', 'Basketball League', '2024-02-28 13:56:00', 'LIGA.jpg', '1', 0, 7, 83, '2023-01-10 03:51:01', '2024-05-27 21:12:33'),
(4, 'May Flowers', 'Flores de Mayo', '2024-05-27 11:51:00', 'MAY FLOWERS.jpg', '1', 0, 7, 83, '2023-01-10 03:52:40', '2024-05-27 16:00:59'),
(5, 'General Assembly of Senior Citizens', 'Releasing of relief goods', '2024-02-25 13:37:00', 'RELIEF GOODS.jpg', '1', 0, 7, 83, '2023-01-10 03:53:07', '2024-05-27 16:06:58'),
(6, 'Visita Iglesia of United Senior Citizen', 'The senior citizen paid a visit to the church', '2024-05-28 13:15:00', 'Visita Iglesia.jpg', '1', 0, 83, NULL, '2024-05-27 16:13:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barangay_activities`
--

CREATE TABLE `barangay_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_activities`
--

INSERT INTO `barangay_activities` (`id`, `title`, `details`, `date`, `image`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Kisig Sisig', 'Sisig Menu', '2024-01-10 07:51:00', 'sisigmenuuuuu.jpg', '1', 0, 7, 83, '2023-01-09 23:51:53', '2024-06-03 23:11:20'),
(2, 'Cleaning River', 'United in the cleansing of the river', '2024-01-26 11:53:00', 'linis ilog.jfif', '1', 0, 7, 83, '2023-01-10 03:53:56', '2024-05-27 15:46:32'),
(3, 'Hatiran', 'Street Mass for Barangay IV', '2024-06-01 17:35:00', 'STREET MASS.jpg', '1', 0, 7, 83, '2023-01-10 03:54:37', '2024-06-03 09:24:27'),
(4, 'Clean-up Drive', 'This event aims to bring our community together to improve to improve the cleanliness and beauty of our neighborhood.', '2024-03-16 11:54:00', 'Clean-up.jpg', '1', 0, 7, 83, '2023-01-10 03:55:06', '2024-05-27 15:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_clearance_certificates`
--

CREATE TABLE `barangay_clearance_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Resident',
  `purpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_collection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_on` datetime DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-Approved, 2-Processing, 3-Pending, 4-Disapproved',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_clearance_certificates`
--

INSERT INTO `barangay_clearance_certificates` (`id`, `barangay_resident_id`, `purpose`, `or_number`, `amount_collection`, `issued_on`, `issued_at`, `remarks`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`, `total_amount_paid`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`) VALUES
(1, 7, 'loan', NULL, NULL, NULL, NULL, 'remarks', 3, 0, 12, NULL, '2023-01-10 00:21:51', '2023-01-10 00:21:51', 'Free', '2023-01-10', 'TN-20230110-1', 1),
(2, 50, 'purpose', '123456', 'free', '2023-01-10 00:00:00', NULL, 'remarks', 1, 0, 53, 7, '2023-01-10 02:43:06', '2023-01-10 02:47:52', 'Free', '2023-01-10', 'TN-20230110-2', 1),
(3, 8, 'School and Work', NULL, NULL, NULL, NULL, 'Thankyou', 3, 0, 13, NULL, '2023-01-10 03:59:32', '2023-01-10 03:59:33', 'Free', '2023-01-10', 'TN-20230110-3', 1),
(4, 9, 'Work', NULL, NULL, NULL, NULL, 'Remarks', 3, 0, 14, NULL, '2023-01-10 04:03:03', '2023-01-10 04:03:03', 'Free', '2023-01-10', 'TN-20230110-4', 1),
(5, 10, 'For money purposes', NULL, NULL, NULL, NULL, 'Remarks', 3, 0, 15, NULL, '2023-01-10 04:08:20', '2023-01-10 04:08:20', 'Free', '2023-01-10', 'TN-20230110-5', 1),
(6, 12, 'Apply', NULL, NULL, NULL, NULL, 'Works', 3, 0, 17, NULL, '2023-01-10 04:11:28', '2023-01-10 04:11:28', 'Free', '2023-01-10', 'TN-20230110-6', 1),
(7, 15, 'Anything', NULL, NULL, NULL, NULL, 'purposes', 3, 0, 20, NULL, '2023-01-10 04:14:36', '2023-01-10 04:14:36', 'Free', '2023-01-10', 'TN-20230110-7', 1),
(8, 14, 'Free', NULL, NULL, NULL, NULL, 'thanks', 3, 0, 19, NULL, '2023-01-10 04:17:45', '2023-01-10 04:17:46', 'Free', '2023-01-10', 'TN-20230110-8', 1),
(9, 17, 'Harigato', NULL, NULL, NULL, NULL, 'harigato', 3, 0, 22, NULL, '2023-01-10 04:20:31', '2023-01-10 04:20:31', 'Free', '2023-01-10', 'TN-20230110-9', 1),
(10, 61, 'money', NULL, NULL, NULL, NULL, 'thanks', 3, 0, 64, NULL, '2023-01-10 04:52:44', '2023-01-10 04:52:44', 'Free', '2023-01-10', 'TN-20230110-10', 1),
(11, 30, 'School', NULL, NULL, NULL, NULL, 'Remarks', 3, 0, 33, NULL, '2023-01-10 06:53:45', '2023-01-10 06:53:45', 'Free', '2023-01-10', 'TN-20230110-11', 1),
(12, 30, 'Purpose', NULL, NULL, NULL, NULL, 'remarks', 3, 0, 33, NULL, '2023-01-10 07:10:32', '2023-01-10 07:10:32', '50', '2023-01-10', 'TN-20230110-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangay_demographies`
--

CREATE TABLE `barangay_demographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_population` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_household` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_demographies`
--

INSERT INTO `barangay_demographies` (`id`, `year`, `total_population`, `number_of_household`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Year 2015', '3,511', '951', '1', 0, 5, 83, '2022-09-26 08:38:01', '2024-05-23 03:32:21'),
(2, 'Year 2015', '3,238', '877', '1', 0, 5, 83, '2022-09-29 05:56:40', '2024-05-23 03:32:43'),
(3, 'Year 2010', '3,237', '896', '1', 0, 5, 83, '2022-09-29 05:56:50', '2024-05-23 03:33:09'),
(4, 'Year 2007', '2,989', '643', '1', 0, 5, 83, '2022-09-29 05:57:01', '2024-05-23 03:33:29'),
(5, 'Year 2000', '2,890', '578', '1', 0, 5, 83, '2022-09-29 05:57:13', '2024-05-23 03:33:51'),
(6, 'Year 1995', '2,830', 'Unknown', '1', 0, 5, 83, '2022-09-29 05:57:25', '2024-05-23 03:34:06'),
(7, 'Year 1990', '2,659', 'Unknown', '1', 0, 5, 83, '2022-09-29 05:57:36', '2024-05-23 03:34:17'),
(8, 'Year 1980', '2,213', 'Unknown', '1', 0, 5, 83, '2022-09-29 05:57:56', '2024-05-23 03:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_geographies`
--

CREATE TABLE `barangay_geographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundaries` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_geographies`
--

INSERT INTO `barangay_geographies` (`id`, `land_area`, `boundaries`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, '6.6 hectares', 'Bañadero, Barangay II, Barangay VI, Bañadero', '1', 0, 5, 83, '2022-09-26 08:37:16', '2024-05-23 03:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_histories`
--

CREATE TABLE `barangay_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_histories`
--

INSERT INTO `barangay_histories` (`id`, `title`, `details`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Brief History', 'The Barangay IV has called LOOK of fishermen because it is the inner part of the shore of Laguna Lake. A LOOK Kay was formerly called Notes. According to the first ever lived here, every fall the New Year, there appears to be brilliant record in the rivers. The river has been called to record. Seven families from the town of Cabuyao, Santa Rosa and even in Calamba, the first founder of this area. These are the farmers took a heavy storm on the lake that can not be returned if they are stopped seepage called to IV. They went together and agreed to include their vocational pangigisda and planting vegetables.\r\nDuring the Spanish era, the Barangay IV has a forested area, large trees and tall grass the largest part of the land of IV. As such, it has become place of robbers and Roger Filipinos fought against the Spaniards, but the Spaniards burned the forest and some households to not hide from the enemies of the Spaniards. The arson has been called to the HISTORY of IV La Samiento. Again became the refuge during barangya IV American soldiers under General Doc Pacoa. Several men in the organization IV Saksdalista overlap. This group is against the Americans because they want the Japanese to occupy the Philippines. During this time also established the first school in 1933 in this village. The Barangay IV was also nicknamed \"Little Tokyo during the Japanese occupation because of the many men who lived here and come join ABSOLUTELY also the national organization or movement Plilipino able to choose.\r\nThe Barangay IV is one of the Barangay Calamba on the shore of Laguna Lake. It is a peninsula surrounded by five villages and lakes. Its southern Barangay Sampiruhan: South West Banlic, and the west is Banadero. The Barangay IV has over fifteen kilometers (15) kilimetro away in town. It has a total size of 600 hectares. The Barangay IV has fully become a barangay on the 22nd of June 1963 by virtue of RA 3390. The Barangay IV has called Vegetable Bowl or the Gulayang of Calamba Calamba Bowl. This is due to numerous and unrelenting here yield of vegetables like eggplant, okra, bean, loofah, bitter gourd, seating and other vegetables. Also known as the only place in IV Calamba harvesting watermelons and turnip. The other inhabitants are living by fishing and selling of room to store vegetables, while others were feeding ducks and embracing.\r\nThe Barangay IV is more known in the celebration of Nautilus, in conjunction with the dancing procession. This is a pamamanata or gratitude to their patron recognized, Santa Maria Magdalena. The participants here are kababailang wear suit or shirt and skirt. Also includes the tradition known pananapatan Barangay IV. It is held every fall the new year. The youth home tumatapat house where they kinakalampag tin, tub, buckets or anything that may create noise and at the same time cry: Long live the wife! This followed the din of the tin and pampaingay, and as a thanksgiving to the house with nananapatan he will give money.\r\nAccording to information obtained in the former Captain of Barangay IV named Captain Eduardo Popular. According to its description in the form of former villages, the old road of the buffalo wallow and hence, they are forced to go on the side of the house when rain. The village, the only vehicle ago only road is the carts. So small roads through tinente are asking them to either side lot for the kalsada.Ang loosen its reached that number of houses is 30 only includes the Barangay and Barangay Sampiruhan Uwisan those times are still only Sitio IV Barangay that isolated only in the year 1969 when the population began to multiply. To present a modern and innovative building the naipagawa Barangay Government in the office of Punong Barangay - Hon. Christopher \"Boyet\" Natividad grandson of the late Hon. Ambrose became the first Prime Geca Barangay IV and he also he makes the first Barangay Hall.\r\nThe new building of the Government System of IV that naipatayo leadership and management of Punong Barangay - Hon. Christopher G. Natividad in the past who have 2009 with complete equipment and extensive conference Hall located on the second floor of the building The past studies can help to be the basis of these changes occurred and in presenting information or data previously obtained in the barangay.\r\nThe new form of IV Elementary School In 1980, the class of DECS has conducted the first study on Barangay IV. In 1980 estimated the village consists of 3, 248 residents. In that time the people of IV is mostly Tagalog, followed by the Ilocano, Cebuano and Batangueño. We have also Health Center, Catholic Church, Basketball Court and elementary and high school. High literacy rate in the village of that time, 92% have attended.\r\nThe River pass Barangay San Juan, San Cristobal River, and River Notes, due to the river, there are two bridges the village. First is the linking bridge in Barangay IV and Barangay San Juan and the second is located in the central part of the neighborhood. And livelihood, many farmers, fishermen and those who take care of ducks. One Barangay IV, which supplies fish tilapia and vegetables such as bean and tomato.', '1', 0, 5, 83, '2022-09-30 07:32:26', '2024-05-27 18:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_mission_visions`
--

CREATE TABLE `barangay_mission_visions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_mission_visions`
--

INSERT INTO `barangay_mission_visions` (`id`, `mission`, `vision`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Become a leading Barangay Calamba City in the field of Public Service, Program on Environment and Protecting it, Pangpalakasan Games Culture and Education, Infrastructure and Kaularan, public peace, love for God and Country To be the leading Barangay in the Municipality of Calamba in terms of Public Service, Environment Protection and Programs, Education, Culture and Sports, Infrastructures and Development, Public Peace and Order, Love of God and Country.', 'To achieve the magi to, We the Officers and Barangay IV Staff should: Provide a quality and friendly service with no humane approaches favored and paguuri. Charge an environmental intervention gaming enforcement of existing law, Resolution. Ordinance and Program. Raise the level of awareness of our citizens in the Games, Education, Ability and being matangkilik and nationalist. Make estratihiyang planning through effective and efficient decision-making. Maintain peace and order in accordance with the Law and respect for human rights. Isauna God in our consciousness and the Acts and fight corruption and remove according to our abilities. To achieve this, We Barangay Officials and Employees of Barangay Looc Shall: Provide services in Quality and Friendly compassionate impartiality and nice with no discrimination. \r\nSomeone that protect environment through implementation of existing laws, resolutions, ordinances and programs, Increase our level of competency someone that citizens in sports, education, skills, patriotism and Nationalism. Make strategic planning through effective and efficient decision making for the set development program. Maintain Public Peace and Order in accordance with law and respect in human rights. Put God first in someone that Deeds and actions and fight graft and corruptions and eliminated in someone that own capacity.', '1', 0, 5, 83, '2022-10-03 07:53:39', '2024-06-04 03:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_officials`
--

CREATE TABLE `barangay_officials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_term` datetime DEFAULT NULL,
  `end_term` datetime DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0-Inactive, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_officials`
--

INSERT INTO `barangay_officials` (`id`, `name`, `position`, `start_term`, `end_term`, `photo`, `signature`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', '2', '2023-01-10 07:55:00', '2023-01-10 07:55:00', 'Kisig Logo.png', NULL, 0, 0, 7, 7, '2023-01-09 23:55:48', '2023-01-10 01:41:23'),
(2, 'Joseph L. Emergo', '1', '2023-10-30 08:50:00', '2025-10-30 08:51:00', 'Chairman.png', 'E-signatures-removebg-preview.png', 1, 0, 7, 83, '2023-01-10 00:52:16', '2024-05-23 03:38:05'),
(3, 'Ana Lovella Sigalat', '6', '2023-10-30 09:44:00', '2023-10-30 09:44:00', 'Secretary.png', NULL, 1, 0, 7, 83, '2023-01-10 01:44:57', '2024-05-23 03:41:21'),
(4, 'Kristian P. Delas Llagas', '2', '2023-10-30 09:45:00', '2025-10-30 09:45:00', 'ALS.png', NULL, 1, 0, 7, 83, '2023-01-10 01:45:33', '2024-05-23 03:44:05'),
(5, 'Luisito Colat', '2', '2023-10-30 09:45:00', '2023-10-30 09:46:00', 'EP.png', NULL, 1, 0, 7, 83, '2023-01-10 01:46:21', '2024-05-23 03:45:05'),
(6, 'Berandi Carreon', '2', '2023-10-30 09:46:00', '2025-10-30 09:46:00', 'HS.png', NULL, 1, 0, 7, 83, '2023-01-10 01:47:08', '2024-05-23 03:46:02'),
(7, 'Isagani Alviar', '2', '2023-10-30 09:47:00', '2025-10-30 09:47:00', 'PW.png', NULL, 1, 0, 7, 83, '2023-01-10 01:48:03', '2024-05-23 03:46:40'),
(8, 'Arnel Millario', '2', '2023-10-30 09:48:00', '2025-10-30 09:48:00', 'AB.png', NULL, 1, 0, 7, 83, '2023-01-10 01:48:57', '2024-05-23 03:47:15'),
(9, 'Ronaldo Lopez', '2', '2023-10-30 09:49:00', '2025-10-30 09:49:00', 'PO&PS.png', NULL, 1, 0, 7, 83, '2023-01-10 01:50:15', '2024-05-23 03:47:57'),
(10, 'Ricardo Belarmino', '5', '2023-10-30 09:50:00', '2025-10-30 09:50:00', 'Treasurer.png', NULL, 1, 0, 7, 83, '2023-01-10 01:51:08', '2024-05-23 03:48:49'),
(11, 'Anabelle Lozano', '2', '2023-10-30 09:52:00', '2025-10-30 09:52:00', 'WFASW.png', NULL, 1, 0, 7, 83, '2023-01-10 01:52:26', '2024-05-23 03:50:08'),
(12, 'Vernadeth V. Bernas', '3', '2021-11-17 10:00:00', '2023-01-04 10:00:00', '320948346_5839291942825531_9217837109801612131_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:01:06', NULL),
(13, 'Vincent Cadagat', '4', '2023-01-03 10:01:00', '2023-01-11 10:01:00', '324914539_1420978638434910_7066166333841786405_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:01:55', NULL),
(14, 'Christian Caparas', '4', '2023-01-03 10:02:00', '2023-01-10 10:02:00', '323010964_763429368557292_5090796383941892174_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:02:34', NULL),
(15, 'Jayvee Ryan Banal', '4', '2023-01-12 10:02:00', '2023-01-10 10:02:00', '322008276_740794967062791_6565604246527378547_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:03:12', NULL),
(16, 'Meinard Alamazan', '4', '2023-01-10 10:03:00', '2023-01-24 10:03:00', '322832384_746879143522908_8620045275860079167_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:03:43', NULL),
(17, 'Vince Rosalos', '4', '2023-01-10 10:04:00', '2023-01-26 10:04:00', '321927052_727781991901140_25897264234576386_n.png', NULL, 1, 0, 7, NULL, '2023-01-10 02:04:20', NULL),
(18, 'MODESTO GECA JR', '7', '2023-01-10 10:08:00', '2023-01-19 10:08:00', '322830986_1636619556794799_2177857560349470101_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:08:10', '2023-01-10 05:58:08'),
(19, 'ERWIN TANYAG', '8', '2023-01-10 10:08:00', '2023-01-13 10:08:00', '321276835_578539320410657_8501476471862223574_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:08:31', '2023-01-10 05:56:27'),
(20, 'DANILO ODON', '9', '2023-01-11 10:08:00', '2023-01-14 10:08:00', '323526897_844484380115162_6049146374914556478_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:08:51', '2023-01-10 05:56:57'),
(21, 'WENCESLAO FRANCIACO', '10', '2023-01-10 10:09:00', '2023-01-28 10:09:00', '320923989_1819256135117547_3795755891437428828_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:09:09', '2023-01-10 05:58:45'),
(22, 'ANIANO REALON', '10', '2023-01-11 10:09:00', '2023-01-19 10:09:00', '322940278_1580985395750065_5486793377772954177_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:09:25', '2023-01-10 05:59:32'),
(23, 'RONDEL LEUTERIO', '10', '2023-01-01 10:09:00', '2023-01-08 10:09:00', '321107451_699583135035290_3242731504902915658_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:09:47', '2023-01-10 06:00:02'),
(24, 'EDWIN PELAGIO', '10', '2023-01-09 10:09:00', '2023-05-10 10:10:00', '320727299_694011928853037_2520359400409540281_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:10:05', '2023-01-10 06:00:31'),
(25, 'JONATHAN OJEÑAR', '10', '2022-07-02 10:10:00', '2023-06-10 10:10:00', '323745467_1504135630098948_6103744669067927907_n.png', NULL, 1, 0, 7, 7, '2023-01-10 02:10:29', '2023-01-10 06:03:46'),
(26, 'AXIE', '1', '2024-05-21 20:59:00', '2032-02-21 20:59:00', '2600mmr.png', '2ks20.png', 0, 0, 82, 82, '2024-05-21 13:00:25', '2024-05-23 03:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_others`
--

CREATE TABLE `barangay_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoning_classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiesta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance_to_poblacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel_time_to_poblacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_others`
--

INSERT INTO `barangay_others` (`id`, `classification`, `zoning_classification`, `fiesta`, `distance_to_poblacion`, `travel_time_to_poblacion`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Urban', 'Urban Redevelopment', 'June 24', '0.3 kms. (+-)', '5mins', '1', 0, 5, 83, '2022-09-26 09:54:41', '2024-05-23 03:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_profiles`
--

CREATE TABLE `barangay_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_profiles`
--

INSERT INTO `barangay_profiles` (`id`, `title`, `details`, `image`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Barangay Profile', 'Barangay IV in the city of Calamba, in the province of Laguna. Its population as determined by the 2023 Census was 3,453. This represented 4.97% of the total population of Calamba.', NULL, '1', 0, 5, 82, '2022-09-26 08:35:47', '2024-05-22 21:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_residents`
--

CREATE TABLE `barangay_residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` tinyint(4) DEFAULT NULL COMMENT '1-Single, 2-Married, 3-Widow/er, 4-Annulled, 5-Legally Separated, 6-Others',
  `length_of_stay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phil_health_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_attainment` tinyint(4) DEFAULT NULL COMMENT '1-Elementary Graduate, 2-Elementary Undergraduate, 3-High School Graduate, 4-High School Undergraduate, 5-College Graduate, 6-College Undergraduate, 7-Masters Graduate, 8-Some/Completed Masters Degree, 9-Vocational, 10-Others',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on users table',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_residents`
--

INSERT INTO `barangay_residents` (`id`, `barangay_id_number`, `age`, `gender`, `civil_status`, `length_of_stay`, `birthdate`, `birth_place`, `purok`, `block`, `lot`, `street`, `phase`, `nationality`, `religion`, `occupation`, `monthly_income`, `phil_health_number`, `educational_attainment`, `photo`, `remarks`, `status`, `user_id`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'BRGY-IV-2022-1', 25, '1', 1, '1', '1997-10-19', 'JP Rizal Hospital', 'Purok 1', 'Block 1', 'Lot 1', 'Street 1', 'Phase 1', 'Filipino', 'Catholic', 'None', '1,111', '1111-11111-11111-111111', 1, NULL, 'Remarks 1', '1', 5, 0, 5, 5, '2022-12-05 09:24:52', '2022-12-05 10:47:19'),
(2, 'BRGY-IV-2022-2', 24, '1', 5, '10', '1998-07-06', 'Birth Place 2', 'Purok 2', 'Block 2', 'Lot 2', 'Street 2', 'Phase 2', 'Filipino', 'Catholic', 'Special hotdog', '200,000', '22222-22222-22222-2222', 7, '16305272_dsgn_23.jpg', 'Remarks 2', '1', 7, 0, 5, 5, '2022-12-05 09:26:24', '2023-01-09 22:45:46'),
(6, 'BRGY-IV-2023-6', 27, '1', 3, '11', '1995-07-12', '11', '1', '11', '1', '1', '1', 'Fil', 'Catholic', 'none', '111111', '11', 4, 'niklas-ohlrogge-cLpBQqSMEWI-unsplash.jpg', '111', '1', 11, 0, 5, 5, '2023-01-09 22:02:28', '2023-01-09 22:42:53'),
(7, 'BRGY-IV-2023-7', 22, '1', 1, NULL, '2000-03-08', 'calamba', '1', '10', '12', NULL, NULL, 'Filipino', 'Catholic', NULL, NULL, NULL, 6, NULL, NULL, '1', 12, 0, 7, NULL, '2023-01-10 00:09:18', '2023-01-10 00:09:18'),
(8, 'BRGY-IV-2023-8', 32, '1', 1, '12', '1990-01-30', 'calamba', '1', '12', '21', '24', '5', 'Filipino', 'Catholic', 'student', '5000', '1234576', 5, 'picturetest.png', 'remarks', '1', 13, 0, 7, NULL, '2023-01-10 01:25:28', '2023-01-10 01:25:28'),
(9, 'BRGY-IV-2023-9', 32, '1', 1, NULL, '1990-02-07', 'Calamba', '5', '12', '21', 'looc', '7', 'Filipino', 'Catholic', 'student', '12000', '123456', 4, 'picturetest.png', 'Remarks', '1', 14, 0, 7, NULL, '2023-01-10 01:26:24', '2023-01-10 01:26:24'),
(10, 'BRGY-IV-2023-10', 32, '1', 1, '5', '1990-03-07', 'Calamba', '6', '12', '12', '24', '7', 'Filipino', 'Catholic', 'Student', '5000', '3456789', 3, 'picturetest.png', 'Remarks', '1', 15, 0, 7, NULL, '2023-01-10 01:27:23', '2023-01-10 01:27:23'),
(11, 'BRGY-IV-2023-11', 32, '2', 1, '46', '1990-11-22', 'Calamba', '7', '12', '24', '35', '56', 'Filipino', 'Catholic', 'Student', '12478', '12345765', 6, 'picturetest.png', 'remarks', '1', 16, 0, 7, NULL, '2023-01-10 01:28:17', '2023-01-10 01:28:17'),
(12, 'BRGY-IV-2023-12', 31, '2', 1, '12', '1991-03-13', 'Calamba', '5', '12', '22', '4', '12', 'Filipino', 'Catholic', 'Student', NULL, NULL, 6, 'picturetest.png', 'remarks', '1', 17, 0, 7, NULL, '2023-01-10 01:29:06', '2023-01-10 01:29:06'),
(13, 'BRGY-IV-2023-13', 27, '1', 1, '12', '1995-11-30', 'Calamba', '3', '12', '12', '24', '5', 'Filipino', 'Catholic', NULL, NULL, NULL, 4, 'picturetest.png', 'remarks', '1', 18, 0, 7, NULL, '2023-01-10 01:29:46', '2023-01-10 01:29:46'),
(14, 'BRGY-IV-2023-14', 23, '2', 1, '12', '1999-07-07', 'Calamba', '1', '1', '1', '1', '1', 'filipino', 'catholic', 'ofw', '12455', NULL, 3, 'picturetest.png', NULL, '1', 19, 0, 7, NULL, '2023-01-10 01:30:31', '2023-01-10 01:30:31'),
(15, 'BRGY-IV-2023-15', 23, '1', 1, '12', '1999-07-16', 'calamba', '3', '12', '2', '2', '2', 'filipino', 'catholic', 'remarks', '12356', NULL, 6, 'picturetest.png', NULL, '1', 20, 0, 7, NULL, '2023-01-10 01:31:10', '2023-01-10 01:31:10'),
(16, 'BRGY-IV-2023-16', 23, '1', 1, '12', '1999-07-14', 'calamba', '6', '2', '2', '2', '2', 'Filipino', 'Catholic', 'Student', '10000', '213456789', 5, 'picturetest.png', NULL, '1', 21, 0, 7, NULL, '2023-01-10 01:31:48', '2023-01-10 01:31:49'),
(17, 'BRGY-IV-2023-17', 22, '1', 1, '12', '2000-03-10', 'calamva', '7', '56', '6', '6', '6', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 22, 0, 7, NULL, '2023-01-10 01:32:29', '2023-01-10 01:32:30'),
(18, 'BRGY-IV-2023-18', 37, '2', 1, '12', '1985-08-22', 'looc', '5', '5', '6', '6', '6', 'filipino', 'catholic', 'student', '123134', '12125125', 5, 'picturetest.png', NULL, '1', 23, 0, 7, NULL, '2023-01-10 01:33:24', '2023-01-10 01:33:24'),
(19, 'BRGY-IV-2023-19', 37, '1', 1, '12', '1985-08-22', 'calamba', '4', '42', '21', '12', '12', 'filipino', 'catholic', NULL, NULL, NULL, 1, 'picturetest.png', NULL, '1', 24, 0, 7, NULL, '2023-01-10 01:33:57', '2023-01-10 01:33:57'),
(20, 'BRGY-IV-2023-20', 42, '2', 1, '12', '1980-07-18', 'calamba', '7', '87', '8', '88', '8', 'filipoino', 'catholic', 'student', NULL, NULL, 8, 'picturetest.png', NULL, '1', 25, 0, 7, NULL, '2023-01-10 01:34:44', '2023-01-10 01:34:44'),
(21, 'BRGY-IV-2023-21', 42, '2', 1, '12', '1980-07-18', 'calamba', '7', '87', '8', '88', '8', 'filipoino', 'catholic', 'student', NULL, NULL, 8, 'picturetest.png', NULL, '1', 25, 0, 7, NULL, '2023-01-10 01:34:45', '2023-01-10 01:34:45'),
(22, 'BRGY-IV-2023-22', 42, '2', 2, '12', '1980-07-02', 'calamba', '7', '123', '123', '123', '123', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 26, 0, 7, NULL, '2023-01-10 01:35:26', '2023-01-10 01:35:26'),
(23, 'BRGY-IV-2023-23', 36, '1', 1, NULL, '1986-11-27', 'calamba', '5', '12', '12', '121', '21', 'filipino', 'catholic', 'studnet', NULL, NULL, 5, 'picturetest.png', NULL, '1', 27, 0, 7, NULL, '2023-01-10 01:36:01', '2023-01-10 01:36:01'),
(24, 'BRGY-IV-2023-24', 35, '1', 1, '12', '1987-06-18', 'cabuyai', '3', '12', '12', '12', '12', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 28, 0, 7, NULL, '2023-01-10 01:37:06', '2023-01-10 01:37:06'),
(25, 'BRGY-IV-2023-25', 35, '2', 3, '12', '1987-06-11', 'calamba', '1', '12', '12', '21', '21', 'filipino', 'catholic', 'student', NULL, NULL, 4, 'picturetest.png', NULL, '1', 29, 0, 7, NULL, '2023-01-10 01:37:44', '2023-01-10 01:37:44'),
(26, 'BRGY-IV-2023-26', 34, '2', 4, NULL, '1988-08-17', 'calamba', '4', '54', '5', '5', '5', 'filipino', 'catholic', NULL, NULL, NULL, 5, 'picturetest.png', NULL, '1', 30, 0, 7, NULL, '2023-01-10 01:38:37', '2023-01-10 01:38:37'),
(27, 'BRGY-IV-2023-27', 34, '2', 4, NULL, '1988-08-17', 'calamba', '4', '54', '5', '5', '5', 'filipino', 'catholic', NULL, NULL, NULL, 5, 'picturetest.png', NULL, '1', 30, 0, 7, NULL, '2023-01-10 01:38:38', '2023-01-10 01:38:38'),
(28, 'BRGY-IV-2023-28', 32, '2', 2, NULL, '1990-05-22', 'calamba', '5', '87', '87', '87', NULL, 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', NULL, '1', 31, 0, 7, NULL, '2023-01-10 01:39:27', '2023-01-10 01:39:27'),
(29, 'BRGY-IV-2023-29', 32, '2', 3, NULL, '1990-05-07', 'calamba', '4', '12', '12', '12', '12', 'filipino', 'catholic', 'work', NULL, NULL, 4, 'picturetest.png', NULL, '1', 32, 0, 7, NULL, '2023-01-10 01:40:03', '2023-01-10 01:40:03'),
(30, 'BRGY-IV-2023-30', 32, '2', 1, '9', '1990-05-09', 'calamba', '7', '9', '9', '9', '9', 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', NULL, '1', 33, 0, 7, NULL, '2023-01-10 01:41:10', '2023-01-10 01:41:10'),
(31, 'BRGY-IV-2023-31', 32, '1', 1, '12', '1990-02-07', 'calamba', '5', '12', '12', '12', '12', 'filipino', 'catholic', 'student', NULL, NULL, 4, 'picturetest.png', 'remarks', '1', 34, 0, 7, NULL, '2023-01-10 02:12:37', '2023-01-10 02:12:37'),
(32, 'BRGY-IV-2023-32', 13, '1', 1, '12', '2009-03-11', 'calamba', '5', '12', '12', '12', '12', 'fillipino', 'catholic', NULL, NULL, NULL, 1, 'picturetest.png', NULL, '1', 35, 0, 7, NULL, '2023-01-10 02:16:05', '2023-01-10 02:16:05'),
(33, 'BRGY-IV-2023-33', 22, '1', 4, '7', '2000-02-01', 'calamba', '5', '12', '8', '8', '8', 'filipino', 'catholic', 'student', '78990', '123456789', 5, 'picturetest.png', 'reamarks', '1', 36, 0, 7, NULL, '2023-01-10 02:17:02', '2023-01-10 02:17:02'),
(34, 'BRGY-IV-2023-34', 22, '1', 5, '12', '2000-02-17', 'parian', '7', '12', '12', '12', '2', 'filipino', 'catholic', 'student', NULL, NULL, 4, 'picturetest.png', NULL, '1', 37, 0, 7, NULL, '2023-01-10 02:17:40', '2023-01-10 02:17:40'),
(35, 'BRGY-IV-2023-35', 22, '1', 1, '8', '2000-02-26', '10', '4', '12', '1', '1', '1', 'filipino', 'catholic', 'student', '1', '1235689', 4, 'picturetest.png', NULL, '1', 38, 0, 7, NULL, '2023-01-10 02:18:27', '2023-01-10 02:18:27'),
(36, 'BRGY-IV-2023-36', 28, '1', 3, '12', '1994-02-16', 'cabuyao', '5', '7', '7', '7', '7', 'filipino', 'catholic', 'student', '13556', '123567', 4, 'picturetest.png', NULL, '1', 39, 0, 7, NULL, '2023-01-10 02:19:33', '2023-01-10 02:19:33'),
(37, 'BRGY-IV-2023-37', 28, '1', 4, '12', '1994-02-21', 'CALAMBA', '7', '5', '4', '3', '2', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 40, 0, 7, NULL, '2023-01-10 02:20:17', '2023-01-10 02:20:17'),
(38, 'BRGY-IV-2023-38', 31, '1', 1, '10', '1991-07-24', 'cabuyao', '5', '4', '3', '5', '4', 'filipino', 'catholic', 'professor', '50000', NULL, 5, 'picturetest.png', NULL, '1', 41, 0, 7, NULL, '2023-01-10 02:21:24', '2023-01-10 02:21:24'),
(39, 'BRGY-IV-2023-39', 31, '2', 2, '5 years', '1991-07-17', 'calamba', '5', '1', '1', '1', '1', 'filipino', 'catholic', 'professor', '50000', NULL, 7, 'picturetest.png', NULL, '1', 42, 0, 7, NULL, '2023-01-10 02:22:16', '2023-01-10 02:22:17'),
(40, 'BRGY-IV-2023-40', 31, '1', 1, '6 years', '1991-09-05', 'calamba', '5', '2', '2', '22', '2', 'filipino', 'catholic', 'professor', '50000', NULL, 7, 'picturetest.png', NULL, '1', 43, 0, 7, NULL, '2023-01-10 02:22:59', '2023-01-10 02:22:59'),
(41, 'BRGY-IV-2023-41', 31, '1', 1, '1', '1991-09-28', 'calamba', '2', '4', '4', '3', '3', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 44, 0, 7, NULL, '2023-01-10 02:23:36', '2023-01-10 02:23:36'),
(42, 'BRGY-IV-2023-42', 23, '1', 1, '10', '1999-12-01', 'calamba', '4', '6', '6', '6', '6', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 45, 0, 7, NULL, '2023-01-10 02:24:19', '2023-01-10 02:24:19'),
(43, 'BRGY-IV-2023-43', 28, '2', 2, '5 years', '1994-06-14', 'calamba', '5', '4', '3', '3', '3', 'filipino', 'catholic', 'call center', '20000', NULL, 6, 'picturetest.png', NULL, '1', 46, 0, 7, NULL, '2023-01-10 02:25:05', '2023-01-10 02:25:05'),
(44, 'BRGY-IV-2023-44', 28, '1', 5, '10', '1994-03-08', 'calamba', '3', '3', '3', '3', '3', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 47, 0, 7, NULL, '2023-01-10 02:25:44', '2023-01-10 02:25:44'),
(45, 'BRGY-IV-2023-45', 23, '2', 1, '10', '1999-07-23', 'calamba', '7', '7', '7', '7', '7', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 48, 0, 7, NULL, '2023-01-10 02:26:18', '2023-01-10 02:26:18'),
(46, 'BRGY-IV-2023-46', 23, '2', 1, '1', '1999-07-23', 'calamba', '1', '1', '11', '1', '1', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 49, 0, 7, NULL, '2023-01-10 02:26:55', '2023-01-10 02:26:55'),
(47, 'BRGY-IV-2023-47', 23, '2', 1, '10', '1999-09-23', 'calamba', '6', '6', '6', '6', '6', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 50, 0, 7, NULL, '2023-01-10 02:27:34', '2023-01-10 02:27:34'),
(48, 'BRGY-IV-2023-48', 22, '1', 1, '6', '2000-02-08', 'calamba', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 51, 0, 7, NULL, '2023-01-10 02:28:45', '2023-01-10 02:28:45'),
(49, 'BRGY-IV-2023-49', 22, '1', 4, NULL, '2000-02-24', 'calamba', '7', '7', '7', '7', '7', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 52, 0, 7, NULL, '2023-01-10 02:29:20', '2023-01-10 02:29:20'),
(50, 'BRGY-IV-2023-50', 22, '2', 1, '10', '2000-02-01', 'calamba', '7', '6', '6', '5', '4', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 53, 0, 7, NULL, '2023-01-10 02:37:36', '2023-01-10 02:37:36'),
(51, 'BRGY-IV-2023-51', 22, '1', 2, '1', '2000-02-01', 'calamba', '1', '212', '21', '24', '24', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', 'remarks', '1', 54, 0, 7, NULL, '2023-01-10 04:38:49', '2023-01-10 04:38:49'),
(52, 'BRGY-IV-2023-52', 22, '1', 3, '1', '2000-02-15', 'calamba', '2', '22', '2', '23', '23', 'filipino', 'catholic', 'student', '50000', NULL, 6, 'picturetest.png', 'remarks', '1', 55, 0, 7, NULL, '2023-01-10 04:39:56', '2023-01-10 04:39:56'),
(53, 'BRGY-IV-2023-53', 24, '1', 4, '1', '1998-10-08', 'calamba', '7', '12', '21', '21', '21', 'filipino', 'iglesia', 'student', NULL, NULL, 4, 'picturetest.png', NULL, '1', 56, 0, 7, NULL, '2023-01-10 04:41:21', '2023-01-10 04:41:21'),
(54, 'BRGY-IV-2023-54', 23, '1', 5, '1', '1999-12-02', 'parian', '5', '5', '5', '5', '5', 'filipino', 'buddism', 'student', NULL, NULL, 6, 'picturetest.png', 'remarks', '1', 57, 0, 7, NULL, '2023-01-10 04:42:18', '2023-01-10 04:42:18'),
(55, 'BRGY-IV-2023-55', 23, '1', 4, '1', '1999-12-16', 'calamba', '6', '6', '6', '6', '6', 'indian', 'muslim', 'student', NULL, '4567890', 2, 'picturetest.png', NULL, '1', 58, 0, 7, NULL, '2023-01-10 04:43:07', '2023-01-10 04:43:07'),
(56, 'BRGY-IV-2023-56', 17, '1', 3, '5', '2005-03-23', 'bonggo', '5', '5', '5', '5', '5', 'filipino', 'roman', 'company worker', NULL, NULL, 6, 'picturetest.png', NULL, '1', 62, 0, 7, NULL, '2023-01-10 04:44:07', '2023-01-10 04:44:07'),
(57, 'BRGY-IV-2023-57', 17, '1', 4, '1', '2005-03-30', 'calamba', '6', '6', '6', '66', '6', 'fil-am', 'hinduism', 'worker', NULL, NULL, 4, 'picturetest.png', NULL, '1', 59, 0, 7, NULL, '2023-01-10 04:44:52', '2023-01-10 04:44:52'),
(58, 'BRGY-IV-2023-58', 17, '1', 5, '1', '2005-03-23', 'palace', '2', '2', '22', '2', '2', 'filipino', 'roman catholic', 'students', NULL, NULL, 6, 'picturetest.png', NULL, '1', 60, 0, 7, NULL, '2023-01-10 04:45:39', '2023-01-10 04:45:39'),
(59, 'BRGY-IV-2023-59', 16, '1', 6, '23', '2006-05-24', 'calamba', '5', 'sais', 'siete', '21', '23', 'filipino', 'islam', NULL, NULL, NULL, 5, 'picturetest.png', NULL, '1', 61, 0, 7, NULL, '2023-01-10 04:46:35', '2023-01-10 04:46:35'),
(60, 'BRGY-IV-2023-60', 15, '1', 5, '21', '2007-03-22', 'calamba', '6', '7', '6', '7', '9', 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', NULL, '1', 63, 0, 7, NULL, '2023-01-10 04:47:14', '2023-01-10 04:47:14'),
(61, 'BRGY-IV-2023-61', 15, '1', 2, '21', '2007-03-20', 'calamba', '5', 'singko', 'singko tres', 'dos', 'sinko', 'fil', 'catholic', 'company', NULL, NULL, 5, 'picturetest.png', NULL, '1', 64, 0, 7, NULL, '2023-01-10 04:48:04', '2023-01-10 04:48:04'),
(62, 'BRGY-IV-2023-62', 15, '1', 6, '1', '2007-03-30', 'calamba', '7', '7', '7', '7', '7', 'filipino', 'roman', 'student', NULL, NULL, 4, 'picturetest.png', NULL, '1', 65, 0, 7, NULL, '2023-01-10 04:48:48', '2023-01-10 04:48:48'),
(63, 'BRGY-IV-2023-63', 27, '1', 3, '21', '1995-11-23', 'parkon', '7', '7', '7', '7', '7', 'filipino', 'islam', 'bpo', NULL, NULL, 6, 'picturetest.png', NULL, '1', 66, 0, 7, NULL, '2023-01-10 04:49:43', '2023-01-10 04:49:43'),
(64, 'BRGY-IV-2023-64', 27, '1', 5, '3', '1995-11-16', 'parian', '4', '4', '4', '4', '4', 'Filipino', 'islam', 'call center agent', NULL, NULL, 5, 'picturetest.png', 'remarks', '1', 67, 0, 7, NULL, '2023-01-10 04:50:29', '2023-01-10 04:50:29'),
(65, 'BRGY-IV-2023-65', 22, '1', 4, '1', '2000-02-25', 'mayapa', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', NULL, '1', 68, 0, 7, NULL, '2023-01-10 04:51:06', '2023-01-10 04:51:06'),
(66, 'BRGY-IV-2023-66', 23, '1', 1, '23years', '1999-01-20', 'calamba city laguna', '2', '16', '23', '21', '12', 'Filipino', 'catholic', 'HR', '100000', '09887665443411', 5, 'picturetest.png', NULL, '1', 69, 0, 7, NULL, '2023-01-10 05:41:21', '2023-01-10 05:41:21'),
(67, 'BRGY-IV-2023-67', 22, '1', 1, '2', '2000-02-09', 'calamba', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'student', NULL, NULL, 6, 'picturetest.png', NULL, '1', 70, 0, 7, NULL, '2023-01-10 06:13:01', '2023-01-10 06:13:01'),
(68, 'BRGY-IV-2023-68', 22, '1', 3, '2', '2000-02-16', 'calamba', '6', '6', '6', '6', '6', 'filipino', 'catholic', NULL, NULL, NULL, 5, 'picturetest.png', NULL, '1', 71, 0, 7, NULL, '2023-01-10 06:14:32', '2023-01-10 06:14:32'),
(69, 'BRGY-IV-2023-69', 27, '1', 2, '21 years', '1995-07-12', 'calamba', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'student', '50000', '5456789', 5, 'picturetest.png', 'no file in any order', '1', 72, 0, 7, NULL, '2023-01-10 06:27:26', '2023-01-10 06:27:26'),
(70, 'BRGY-IV-2023-70', 27, '1', 3, '1', '1995-07-12', 'cabuyao', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'ofw', '122222', '1231242345', 8, 'picturetest.png', 'no file', '1', 73, 0, 7, NULL, '2023-01-10 06:28:12', '2023-01-10 06:28:12'),
(71, 'BRGY-IV-2023-71', 27, '1', 4, '24 years', '1995-08-17', 'calamba', '5', '5', '5', '5', '5', 'filipino', 'catholic', 'company worker', NULL, NULL, 5, 'picturetest.png', 'remarks', '1', 74, 0, 7, NULL, '2023-01-10 06:28:55', '2023-01-10 06:28:55'),
(72, 'BRGY-IV-2023-72', 27, '1', 1, '21 months', '1995-12-13', 'calamba', '7', '7', '7', '77', '7', 'fil', 'catholic', 'ofw', '567890', '3456789', 9, 'picturetest.png', 'no cases', '1', 75, 0, 7, NULL, '2023-01-10 06:29:36', '2023-01-10 06:29:36'),
(73, 'BRGY-IV-2023-73', 26, '1', 1, '21 years', '1996-04-17', 'calamba', '1', '1', '1', '1', '1', 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', 'remarks', '1', 76, 0, 7, NULL, '2023-01-10 06:30:33', '2023-01-10 06:30:33'),
(74, 'BRGY-IV-2023-74', 26, '1', 1, '21 years', '1996-04-17', 'calamba', '1', '1', '1', '1', '1', 'filipino', 'catholic', 'student', NULL, NULL, 5, 'picturetest.png', 'remarks', '1', 76, 0, 7, NULL, '2023-01-10 06:30:34', '2023-01-10 06:30:35'),
(75, 'BRGY-IV-2023-75', 26, '1', 2, '1 year', '1996-05-23', 'calamba', '6', '6', '6', '6', '6', 'filipino', 'catholic', 'student', '10000', '23456789', 4, 'picturetest.png', 'remarks', '1', 78, 0, 7, NULL, '2023-01-10 06:31:23', '2023-01-10 06:31:23'),
(76, 'BRGY-IV-2023-76', 26, '1', 1, '27 months', '1996-05-18', 'calamba', '7', '7', '7', '7', '7', 'fil', 'roman catholic', 'student', '100000', '567890', 7, 'picturetest.png', 'remarks', '1', 77, 0, 7, NULL, '2023-01-10 06:32:18', '2023-01-10 06:32:18'),
(77, 'BRGY-IV-2023-77', 25, '1', 3, '20 months', '1997-05-15', 'calamba', '3', '3', '3', '3', '3', 'filipino', 'catholic', 'student', '10000', '456789', 8, 'picturetest.png', 'remarks', '1', 79, 0, 7, NULL, '2023-01-10 06:33:08', '2023-01-10 06:33:08'),
(78, 'BRGY-IV-2024-78', 24, '1', 1, '1 year', '2000-06-03', 'calamba', '10', '16', '16', 'del pilar street', '16', 'filipino', 'catholic', 'student', '10000', '42000', 6, NULL, NULL, '1', 86, 0, 83, NULL, '2024-06-03 01:08:02', '2024-06-03 01:08:02'),
(79, 'BRGY-IV-2024-79', 24, '1', 1, '5', '1999-11-21', 'Rizal', '1', '2', '3', '4 street', '5', 'filipino', 'catholic', 'Entrepreneur', '50000', '95959-595959-5959', 5, NULL, 'Testing remarks', '1', 83, 0, 5, NULL, '2024-08-05 04:40:25', '2024-08-05 04:40:25'),
(80, 'BRGY-IV-2024-80', 24, '1', 1, '11', '1999-11-23', 'rizal', '1', '2', '3', '4', '5', 'filipino', 'catholic', NULL, NULL, NULL, 5, NULL, 'test', '1', 82, 0, 5, NULL, '2024-08-06 04:24:48', '2024-08-06 04:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_resident_blotters`
--

CREATE TABLE `barangay_resident_blotters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Complainant',
  `case_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_statement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respondent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respondent_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respondent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respondent_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_involved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incident_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incident_date` datetime DEFAULT NULL,
  `reported_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1-New, 2-Ongoing, 3-Report, 4-Solved, 5-Not Solved',
  `action_taken` tinyint(4) DEFAULT NULL COMMENT '1-Negotiating, 2-Both Signed, 3-Others',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_resident_blotters`
--

INSERT INTO `barangay_resident_blotters` (`id`, `barangay_resident_id`, `case_number`, `complainant_statement`, `respondent`, `respondent_age`, `respondent_address`, `respondent_contact_number`, `person_involved`, `incident_location`, `incident_date`, `reported_date`, `status`, `action_taken`, `remarks`, `photo`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '22-2321', 'Robbery', 'Respondent 1', '11', 'Brgy. 4', '09123456789', 'Person Involved 1', 'NOVO', '2024-04-17 17:28:00', NULL, 1, 1, 'Remarks 1', NULL, 0, 5, 83, '2022-12-05 09:28:50', '2024-05-27 16:24:06'),
(2, 6, '1', 'Robbery', 'Robert Cunanan', '28', 'Brgy. 4', '09175674143', 'James Bert', 'Brgy. 4', '2024-01-11 14:34:00', NULL, 1, 1, 'remarks', NULL, 0, 7, 83, '2023-01-10 06:34:41', '2024-05-27 16:24:26'),
(3, 13, '22-02', 'Liable', 'Neigborhood', '27', 'Brgy. 4', '097665656', 'Kanor Dela Cruz', '7/11 Tibag', '2023-01-25 14:36:00', NULL, 1, 1, 'remarks', NULL, 0, 7, 83, '2023-01-10 06:36:22', '2024-05-27 16:25:31'),
(4, 18, '02-01', 'Money Involved', 'Rose Marie De Ocampo', '44', 'Brgy. 4', '09685553232', 'Driver', 'Bahay ni Dr. Jose P. Rizal', '2024-01-10 14:38:00', NULL, 2, 1, 'remarks', NULL, 0, 7, 83, '2023-01-10 06:38:33', '2024-05-27 16:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_resident_databases`
--

CREATE TABLE `barangay_resident_databases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-Male, 2-Female, 3-Others',
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_resident_databases`
--

INSERT INTO `barangay_resident_databases` (`id`, `firstname`, `lastname`, `middle_initial`, `address`, `gender`, `age`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'jannus', 'domingo', 'hernandez', 'Other', '1', '23', '1', 0, 5, 5, '2022-10-26 07:10:43', '2022-10-27 00:06:25'),
(2, 'julius', 'caber', '', 'Looc', '1', '27', '1', 0, 5, 5, '2022-10-26 07:31:23', '2022-10-27 00:27:33'),
(3, 'aldrin', 'almeda', '', 'Looc', '1', '26', '1', 0, 5, 5, '2022-11-05 10:57:47', '2022-11-05 11:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_schools`
--

CREATE TABLE `barangay_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pre_elementary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_elementary_and_elementary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_schools`
--

INSERT INTO `barangay_schools` (`id`, `pre_elementary`, `pre_elementary_and_elementary`, `secondary`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Brgy. IV Day Care Center', 'Morning Star Montessori', 'Unknown', '1', 0, 5, 83, '2022-09-26 08:39:45', '2024-05-23 03:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `cedulas`
--

CREATE TABLE `cedulas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Complainant',
  `cedula_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_issued` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxable_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_tax_due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-To Received, 2-Processing, 3-Pending, 4-Disapproved',
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cedulas`
--

INSERT INTO `cedulas` (`id`, `barangay_resident_id`, `cedula_number`, `or_number`, `height`, `weight`, `tin_number`, `date_issued`, `issued_at`, `taxable_amount`, `community_tax_due`, `total_amount`, `total_amount_paid`, `status`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, '123456', '12345678', '123', '14', '1235', '2023-01-10', 'Looc', NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-1', 2, 0, 12, 7, '2023-01-10 00:41:16', '2023-01-10 00:46:44'),
(2, 50, NULL, NULL, '157', '155', '1235', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-2', 2, 0, 53, NULL, '2023-01-10 02:42:03', '2023-01-10 02:42:03'),
(3, 8, NULL, NULL, '`57', '56', '09678123', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-3', 2, 0, 13, NULL, '2023-01-10 04:01:51', '2023-01-10 04:01:51'),
(4, 9, NULL, NULL, '167', '68', '12345678', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-4', 2, 0, 14, NULL, '2023-01-10 04:05:12', '2023-01-10 04:05:12'),
(5, 10, NULL, NULL, '167', '76', '58678678', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-5', 2, 0, 15, NULL, '2023-01-10 04:10:12', '2023-01-10 04:10:12'),
(6, 12, NULL, NULL, '150', '56', '987654', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-6', 2, 0, 17, NULL, '2023-01-10 04:12:58', '2023-01-10 04:12:58'),
(7, 15, NULL, NULL, '167', '67', '09876543', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-7', 2, 0, 20, NULL, '2023-01-10 04:16:51', '2023-01-10 04:16:51'),
(8, 14, NULL, NULL, '167', '54', '12312234', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-8', 2, 0, 19, NULL, '2023-01-10 04:19:29', '2023-01-10 04:19:29'),
(9, 17, '098765', '098765', '106', '45', '0987654', '2023-01-10', 'looc', NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-9', 2, 0, 22, 7, '2023-01-10 04:21:50', '2023-01-10 04:22:44'),
(10, 61, NULL, NULL, '167', '67', '567890-', NULL, NULL, NULL, NULL, 'free', NULL, 3, '2023-01-10', 'TN-20230110-10', 2, 0, 64, NULL, '2023-01-10 04:53:55', '2023-01-10 04:53:55'),
(11, 30, NULL, NULL, '156', '65', '12345678', NULL, NULL, NULL, NULL, '50', NULL, 3, '2023-01-10', 'TN-20230110-11', 2, 0, 33, NULL, '2023-01-10 06:57:30', '2023-01-10 06:57:30');

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
-- Table structure for table `indigency_certificates`
--

CREATE TABLE `indigency_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Resident',
  `purpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_on` datetime DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-Approved, 2-Processing, 3-Pending, 4-Disapproved',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indigency_certificates`
--

INSERT INTO `indigency_certificates` (`id`, `barangay_resident_id`, `purpose`, `or_number`, `issued_on`, `issued_at`, `remarks`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`, `total_amount_paid`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`) VALUES
(7, 7, 'AS', NULL, NULL, NULL, NULL, 3, 0, 12, NULL, '2023-01-10 00:32:49', '2023-01-10 00:32:49', 'free', '2023-01-10', 'TN-20230110-7', 2),
(8, 7, 'School', NULL, NULL, NULL, 'Rermaks', 3, 0, 12, NULL, '2023-01-10 00:33:11', '2023-01-10 00:33:11', 'free', '2023-01-10', 'TN-20230110-8', 2),
(9, 50, 'purpose', NULL, NULL, NULL, 'remarks', 3, 0, 53, NULL, '2023-01-10 02:43:24', '2023-01-10 02:43:24', 'free', '2023-01-10', 'TN-20230110-9', 2),
(10, 8, 'for school', NULL, NULL, NULL, 'ty', 3, 0, 13, NULL, '2023-01-10 04:00:00', '2023-01-10 04:00:00', 'free', '2023-01-10', 'TN-20230110-10', 2),
(11, 9, 'Educational Assistance', NULL, NULL, NULL, 'Remarks', 3, 0, 14, NULL, '2023-01-10 04:03:36', '2023-01-10 04:03:36', 'free', '2023-01-10', 'TN-20230110-11', 2),
(12, 10, 'for money', NULL, NULL, NULL, 'involved', 3, 0, 15, NULL, '2023-01-10 04:09:07', '2023-01-10 04:09:07', 'free', '2023-01-10', 'TN-20230110-12', 2),
(13, 12, 'Money', NULL, NULL, NULL, 'Involve', 3, 0, 17, NULL, '2023-01-10 04:11:42', '2023-01-10 04:11:42', 'free', '2023-01-10', 'TN-20230110-13', 2),
(14, 15, 'for new scholar', NULL, NULL, NULL, 'scholar', 3, 0, 20, NULL, '2023-01-10 04:15:00', '2023-01-10 04:15:00', 'free', '2023-01-10', 'TN-20230110-14', 2),
(15, 14, 'New purposes', NULL, NULL, NULL, 'thanks', 3, 0, 19, NULL, '2023-01-10 04:17:59', '2023-01-10 04:17:59', 'free', '2023-01-10', 'TN-20230110-15', 2),
(16, 17, 'News', NULL, NULL, NULL, 'Thanks', 3, 0, 22, NULL, '2023-01-10 04:20:45', '2023-01-10 04:20:45', 'free', '2023-01-10', 'TN-20230110-16', 2),
(17, 61, 'new project', NULL, NULL, NULL, 'remarks', 3, 0, 64, NULL, '2023-01-10 04:53:11', '2023-01-10 04:53:11', 'free', '2023-01-10', 'TN-20230110-17', 2),
(18, 30, 'purpose', NULL, NULL, NULL, 'remarks', 3, 0, 33, NULL, '2023-01-10 07:11:11', '2023-01-10 07:11:11', '50', '2023-01-10', 'TN-20230110-18', 2),
(19, 30, 'purpose', '2345678', '2023-01-10 00:00:00', NULL, 'remarks', 1, 0, 33, 7, '2023-01-10 07:13:58', '2023-01-10 07:16:53', '50', '2023-01-10', 'TN-20230110-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `issuance_configurations`
--

CREATE TABLE `issuance_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` tinyint(4) DEFAULT NULL COMMENT '1-Brgy Clearance, 2-Indigency, 3-Residency, 4-Registration, 5-License & Permit, 6-Cedula',
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula_taxable_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula_community_due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issuance_configurations`
--

INSERT INTO `issuance_configurations` (`id`, `name`, `amount`, `cedula_taxable_amount`, `cedula_community_due`, `processing_time`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '50', NULL, NULL, '1', '1', 0, 7, 5, '2023-01-09 23:48:38', '2024-10-13 02:14:45'),
(2, 2, '50', NULL, NULL, '2', '1', 0, 7, 7, '2023-01-10 00:22:29', '2023-01-10 06:56:18'),
(3, 3, 'free', NULL, NULL, '3', '1', 0, 7, NULL, '2023-01-10 00:22:35', NULL),
(4, 4, '50', NULL, NULL, '2', '1', 0, 7, 7, '2023-01-10 00:29:32', '2023-01-10 06:56:01'),
(5, 5, '300', NULL, NULL, '4', '1', 0, 7, NULL, '2023-01-10 00:29:44', NULL),
(6, 6, '50', NULL, NULL, '4', '1', 0, 7, 7, '2023-01-10 00:29:55', '2023-01-10 06:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `license_permit_certificates`
--

CREATE TABLE `license_permit_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Resident',
  `purpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature_of_business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_tax_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_sales_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_collected` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_on` datetime DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-Approved, 2-Processing, 3-Pending, 4-Disapproved',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `license_permit_certificates`
--

INSERT INTO `license_permit_certificates` (`id`, `barangay_resident_id`, `purpose`, `or_number`, `business_name`, `location`, `nature_of_business`, `community_tax_cert`, `gross_sales_income`, `amount_collected`, `issued_on`, `issued_at`, `registration_number`, `remarks`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`, `total_amount_paid`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`) VALUES
(1, 7, 'Business', '1234567', 'Juls', 'brgy. 4', 'business', '123456', '5000', '300', '2024-06-03 00:00:00', 'aaaaaaa', '123', 'Remarks', 3, 0, 12, 83, '2023-01-10 00:37:49', '2024-06-03 08:09:40', '300', '2023-01-10', 'TN-20230110-1', 5),
(2, 50, 'Purpose', 'aaaaaa', 'business calamba', 'calamba', 'aaaaa', 'aaaa', 'aaaa', 'aaaaaa', '2024-06-03 00:00:00', 'aaaa', 'aaaaaa', 'remarks', 2, 0, 53, 5, '2023-01-10 02:41:02', '2024-10-13 02:15:35', '300', '2023-01-10', 'TN-20230110-2', 5),
(3, 15, 'For small business', '1231231', 'takoyaki', 'calamba', 'aaaaaa', '123123', '123123', '123123', '2024-06-03 00:00:00', NULL, '123123', 'remakrs', 3, 0, 20, 83, '2023-01-10 04:16:31', '2024-06-03 08:08:19', '300', '2023-01-10', 'TN-20230110-3', 5),
(4, 61, 'trycicle', '1234567', 'Vicente', 'calamba', 'aaaaaa', '456789', '456789', '300', '2024-06-03 00:00:00', 'calamba', '456789', 'Remarks', 1, 0, 64, 83, '2023-01-10 04:52:24', '2024-06-03 08:10:43', '300', '2023-01-10', 'TN-20230110-4', 5);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_03_28_075425_create_user_levels_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(24, '2022_09_01_032036_create_announcements_table', 3),
(25, '2022_09_21_032958_create_barangay_profiles_table', 4),
(26, '2022_09_21_033122_create_barangay_geographies_table', 5),
(27, '2022_09_21_043509_create_barangay_demographies_table', 6),
(29, '2022_09_21_044002_create_barangay_schools_table', 7),
(30, '2022_09_21_044248_create_barangay_others_table', 8),
(31, '2022_09_27_064538_create_barangay_activities_table', 9),
(32, '2022_09_30_071758_create_barangay_histories_table', 10),
(33, '2022_10_03_073520_create_barangay_mission_visions_table', 11),
(34, '2022_10_24_092616_create_contact_number_column', 12),
(37, '2022_10_26_051734_create_barangay_resident_databases_table', 13),
(57, '2022_10_27_090810_create_barangay_residents_table', 14),
(58, '2022_11_08_100257_create_barangay_resident_blotters_table', 15),
(59, '2022_12_05_043045_create_barangay_clearance_certificates_table', 16),
(62, '2022_12_05_103416_create_indigency_certificates_table', 17),
(63, '2022_12_05_112128_create_residency_certificates_table', 18),
(64, '2022_12_05_120206_create_registration_certificates_table', 19),
(66, '2022_12_05_122251_create_license_permit_certificates_table', 20),
(72, '2022_12_27_093522_create_barangay_officials_table', 21),
(73, '2023_01_07_184410_create_suffix_voters_id_column', 22),
(80, '2023_01_09_142532_create_issuance_configurations_table', 23),
(81, '2023_01_08_111148_create_cedulas_table', 24),
(82, '2023_01_09_163218_create_ticketing_barangay_clearance_columns', 25),
(83, '2023_01_09_163734_create_ticketing_indigency_columns', 26),
(84, '2023_01_09_163849_create_ticketing_residency_columns', 27),
(85, '2023_01_09_164052_create_ticketing_registration_columns', 28),
(86, '2023_01_09_164219_create_ticketing_license_permit_columns', 29),
(87, '2024_10_13_092043_create_water_levels_table', 30);

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
-- Table structure for table `registration_certificates`
--

CREATE TABLE `registration_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Resident',
  `purpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_plate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_on` datetime DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-Approved, 2-Processing, 3-Pending, 4-Disapproved',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_certificates`
--

INSERT INTO `registration_certificates` (`id`, `barangay_resident_id`, `purpose`, `or_number`, `name_of_driver`, `license_number`, `registered_plate_number`, `issued_on`, `issued_at`, `remarks`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`, `total_amount_paid`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`) VALUES
(1, 7, 'School', NULL, 'Julius', '09-08-74', '12345678', NULL, NULL, 'Remarks', 3, 0, 12, NULL, '2023-01-10 00:33:52', '2023-01-10 00:33:52', 'free', '2023-01-10', 'TN-20230110-1', 4),
(2, 50, 'purpose', NULL, 'julius', '123567', '123567', NULL, NULL, 'remarks', 3, 0, 53, NULL, '2023-01-10 02:42:32', '2023-01-10 02:42:33', 'free', '2023-01-10', 'TN-20230110-2', 4),
(3, 8, 'For toda', NULL, 'Vic', '097-08-12', '8889-098', NULL, NULL, 'Remarks', 3, 0, 13, NULL, '2023-01-10 04:00:50', '2023-01-10 04:00:50', 'free', '2023-01-10', 'TN-20230110-3', 4),
(4, 9, 'Tricycle', NULL, 'Joey', '098-6789-556', '097-577', NULL, NULL, 'Remarks', 3, 0, 14, NULL, '2023-01-10 04:04:54', '2023-01-10 04:04:54', 'free', '2023-01-10', 'TN-20230110-4', 4),
(5, 10, 'money', NULL, 'driver', '0971231239', '09-9876-ld', NULL, NULL, 'remarks', 3, 0, 15, NULL, '2023-01-10 04:09:50', '2023-01-10 04:09:50', 'free', '2023-01-10', 'TN-20230110-5', 4),
(6, 12, 'Name of driver', NULL, 'Juanito', '3456789', '567890', NULL, NULL, 'remarks', 3, 0, 17, NULL, '2023-01-10 04:12:35', '2023-01-10 04:12:35', 'free', '2023-01-10', 'TN-20230110-6', 4),
(7, 15, 'for my driver', NULL, 'angela', '098765', '3456789', NULL, NULL, 'thansks', 3, 0, 20, NULL, '2023-01-10 04:15:58', '2023-01-10 04:15:58', 'free', '2023-01-10', 'TN-20230110-7', 4),
(8, 14, 'jeep', NULL, 'robert', '4567', '45678', NULL, NULL, '5678', 3, 0, 19, NULL, '2023-01-10 04:18:55', '2023-01-10 04:18:55', 'free', '2023-01-10', 'TN-20230110-8', 4),
(9, 17, 'every jeep', NULL, 'Manuel', '45678', '45678', NULL, NULL, '567890', 3, 0, 22, NULL, '2023-01-10 04:21:26', '2023-01-10 04:21:27', 'free', '2023-01-10', 'TN-20230110-9', 4);

-- --------------------------------------------------------

--
-- Table structure for table `residency_certificates`
--

CREATE TABLE `residency_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_resident_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Reference on barangay_residents table as Resident',
  `purpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_on` datetime DEFAULT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 3 COMMENT '1-Approved, 2-Processing, 3-Pending, 4-Disapproved',
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuance_configuration_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residency_certificates`
--

INSERT INTO `residency_certificates` (`id`, `barangay_resident_id`, `purpose`, `or_number`, `issued_on`, `issued_at`, `remarks`, `status`, `is_deleted`, `created_by`, `last_updated_by`, `created_at`, `updated_at`, `total_amount_paid`, `ticket_datetime`, `ticket_number`, `issuance_configuration_id`) VALUES
(1, 7, 'School', NULL, NULL, NULL, 'Remarks', 3, 0, 12, NULL, '2023-01-10 00:33:24', '2023-01-10 00:33:24', 'free', '2023-01-10', 'TN-20230110-1', 3),
(2, 50, 'purpose', '1234567', '2023-01-09 00:00:00', NULL, 'remarks', 3, 0, 53, 7, '2023-01-10 02:39:46', '2023-01-10 03:45:03', 'free', '2023-01-10', 'TN-20230110-2', 3),
(3, 8, 'For ID', NULL, NULL, NULL, 'Validation', 3, 0, 13, NULL, '2023-01-10 04:01:13', '2023-01-10 04:01:13', 'free', '2023-01-10', 'TN-20230110-3', 3),
(4, 9, 'Process of ID\'s', NULL, NULL, NULL, 'Remarks', 3, 0, 14, NULL, '2023-01-10 04:03:57', '2023-01-10 04:03:58', 'free', '2023-01-10', 'TN-20230110-4', 3),
(5, 10, 'money', NULL, NULL, NULL, 'money', 3, 0, 15, NULL, '2023-01-10 04:09:22', '2023-01-10 04:09:22', 'free', '2023-01-10', 'TN-20230110-5', 3),
(6, 12, 'New Year', NULL, NULL, NULL, 'Eves', 3, 0, 17, NULL, '2023-01-10 04:12:04', '2023-01-10 04:12:04', 'free', '2023-01-10', 'TN-20230110-6', 3),
(7, 15, 'for new place', NULL, NULL, NULL, 'thanks', 3, 0, 20, NULL, '2023-01-10 04:15:24', '2023-01-10 04:15:24', 'free', '2023-01-10', 'TN-20230110-7', 3),
(8, 14, 'my permit', NULL, NULL, NULL, 'remarks', 3, 0, 19, NULL, '2023-01-10 04:18:18', '2023-01-10 04:18:18', 'free', '2023-01-10', 'TN-20230110-8', 3),
(9, 17, 'School', NULL, NULL, NULL, 'remarks', 3, 0, 22, NULL, '2023-01-10 04:21:00', '2023-01-10 04:21:00', 'free', '2023-01-10', 'TN-20230110-9', 3),
(10, 61, 'New house', NULL, NULL, NULL, 'permit', 3, 0, 64, NULL, '2023-01-10 04:53:29', '2023-01-10 04:53:29', 'free', '2023-01-10', 'TN-20230110-10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0-Not Active, 1-Active',
  `is_password_changed` tinyint(4) DEFAULT 0 COMMENT '0-No, 1-Yes',
  `is_authenticated` tinyint(4) DEFAULT 0 COMMENT '0-No, 1-Yes',
  `user_level_id` bigint(20) UNSIGNED NOT NULL COMMENT '1-Admin, 2-Staff, 3-User, 4-Others',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-Active, 1-Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voters_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `middle_initial`, `email`, `username`, `password`, `status`, `is_password_changed`, `is_authenticated`, `user_level_id`, `created_by`, `last_updated_by`, `is_deleted`, `created_at`, `updated_at`, `contact_number`, `suffix`, `voters_id`) VALUES
(5, 'jannus', 'domingo', '', 'jannusdomingo@gmail.com', 'jdomingo', '$2y$10$di.egubXAKsrAMUvvqLkYOH56v3RERuWahbODL9XxbTQN3KOxB1kC', '1', 0, 1, 1, NULL, 5, 0, '2022-09-20 07:36:34', '2022-12-04 11:48:40', '09281236234', NULL, NULL),
(7, 'julius', 'caber', '', 'juliuscaber@monggi.com', 'juliuscaber', 'Julius123', '1', 0, 1, 1, NULL, 82, 0, '2022-11-03 07:22:39', '2024-05-12 12:15:32', '09123456789', NULL, NULL),
(11, 'roxley', 'alcasabas', '', 'roxalcasabas@gmail.com', 'roxalcasabas', '$2y$10$lATRKrfXtHqG9rnUZT4Z0uR4Og..oqqYBuXrq1IRFPUspYxwQ/yNy', '1', 0, 1, 3, NULL, 5, 0, '2023-01-07 20:17:20', '2024-10-13 02:19:51', '0928383727283', NULL, NULL),
(12, 'adrian', 'moratalla', 'c', 'adrianmoratalla@gmail.com', 'adrianmoratalla', '$2y$10$CahLHMicsDIVLInvn4HgueS2rmOVj2noVpoVvX8FefmCPmjHJ.Hbq', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:07:24', '2023-01-10 02:30:07', '09972907371', NULL, NULL),
(13, 'albert', 'sotto', '', 'Albertsotto@gmail.com', 'albertsotto', '$2y$10$CSL.Ar.Ay8dkmO12oDB2le/wSRwORUXUlu9tgOcTXtsV57gjiw19W', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:10:13', '2023-01-10 01:21:05', '09972917175', NULL, NULL),
(14, 'aljon paul', 'pangan', 'a', 'aljonpangan@gmail.com', 'aljonpangan', '$2y$10$B02b2x8DMn7yrcYf2ej48.bwqtGsA9kfMAmZu1CFV/58D9C.YJ2uy', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:15:03', '2023-01-10 01:21:09', '09912917574', NULL, NULL),
(15, 'angelica', 'bautro', 'a', 'angelicabautro@gmail.com', 'angelicabautro', '$2y$10$NgrlnTbyqR7ZbchvJKe0eeiYumU0q/aSZfLNW7fEwN5wN/87lpPce', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:16:03', '2023-01-10 01:21:13', '09902198176', NULL, NULL),
(16, 'ariane', 'pasuquin', 'b', 'arianepasuqui@gmail.com', 'arianepasuqui', '$2y$10$wOS1VdS/1oVxfFgof5y6aue3Vd.XRmWavhj5sUPMafLnyGnjKQsle', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:17:00', '2023-01-10 01:21:16', '09782786564', NULL, NULL),
(17, 'aubrey patricia', 'ramos', 's', 'aubrepatricia@gmail.com', 'aubreypatricia', '$2y$10$W/GZmUsFe/tmP6j7wImaa.nSvF2ThToiXYooLKPZGuS/XiaXVRpCm', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:18:43', '2023-01-10 01:21:20', '09677246765', NULL, NULL),
(18, 'christian', 'beltran', 't', 'christianbeltran@gmail.com', 'christianbeltran', '$2y$10$c2YQGe.S8Jzd2oNJmp9whOeYG4/f7D6PLFGGpSxD9/4bN/hiyuWWa', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:19:32', '2023-01-10 01:21:24', '09875674543', NULL, NULL),
(19, 'crisalyn', 'gabieta', 'c', 'crisalyngabieta@gmail.com', 'crisalyngabieta', '$2y$10$M/hMPy9Xy.nF7G9DaWflYu73AGxTGvvY8nBTrg41fVK8CBnbwBdum', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:20:43', '2023-01-10 01:21:26', '09786543232', NULL, NULL),
(20, 'emmanuel', 'casabuena', 'c', 'emmanuelcasabuena@gmail.com', 'emmanuelcasabuena', '$2y$10$xYfFtUxEwbcl4LgBTODmeuEvoYlblehlCvtNjteXk/3c94HNY1/FC', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:54:18', '2023-01-10 01:21:31', '09785432121', 'Jr', NULL),
(21, 'emmanuel', 'von hart', 'a', 'emmanuelvonhart@gmail.com', 'emmanuelvonhart', '$2y$10$zovzywwF1DTvhQ.9pCLyu.kKsDoCBKIYoctw11wma5l8ldqZfWtKm', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:56:40', '2023-01-10 01:21:35', '09876541212', NULL, NULL),
(22, 'erwin', 'mondoy', 'd', 'erwinmondoy@gmail.com', 'erwinmondoy', '$2y$10$02.dV.AaKaDdwVJkIaD3gep0iqyqoEUeK8SE9jd6lWi5FXVzx9dNa', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:57:38', '2023-01-10 01:21:39', '09786541231', 'Jr', NULL),
(23, 'eunice', 'gentollanes', 'g', 'eunicegentollanes@gmail.com', 'eunicegentollanes', '$2y$10$74Q5Bb5qfkxXS3EoPVO04u9QtMb8D.R8pJIgE.q97zxqykrdXw0v6', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:58:25', '2023-01-10 01:21:43', '09564562424', NULL, NULL),
(24, 'glenn', 'paunlanag', '', 'glennpaunlanag@gmail.com', 'glennpaunlanag', '$2y$10$yabYWToAjapvhnwHanUE8eTj5M2JqEEcPvzU5juCi.mAfANWljmaK', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:59:01', '2023-01-10 01:21:46', '09876541213', NULL, NULL),
(25, 'janella', 'nemeno', 'c', 'janellanemeno@gmail.com', 'janellanemeno', '$2y$10$YRRI/pWwYGi/MFxObkRZEO9o7fh0PBbmMPeIzaPpFyOiJr5F4hWPC', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 00:59:52', '2023-01-10 01:21:51', '09654351345', NULL, NULL),
(26, 'jasmine', 'mabuyo', 'g', 'jasminemabuyo@gmail.com', 'jasminemabuyo', '$2y$10$7pWedXJip.g7FVn5isyo5eYsjQoCcLU2fHmeeLrr7QIJ2TvEhAAwq', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:00:28', '2023-01-10 01:21:55', '09786351212', NULL, NULL),
(27, 'jayvee', 'dalino', 'e', 'jayveedalino@gmail.com', 'jayveedalino', '$2y$10$DzA63kyNsFp6SU9WC1zireggaUYxJsFwf2nUMdUkGtePH0jzcXl1O', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:01:07', '2023-01-10 01:21:59', '09654351221', NULL, NULL),
(28, 'jb', 'moreno', '', 'jbmoreno@gmail.com', 'jbmoreno', '$2y$10$j92nhjyH1I3Ltm8OKKJwS.gjcMkpK0kyKtVoWA.h/EZEcZVDdQaAm', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:01:44', '2023-01-10 01:22:03', '09567482312', NULL, NULL),
(29, 'jean', 'ann', 'b', 'jeanann@gmail.com', 'jeanann123', '$2y$10$FJAUDTPUC62/OSY6tgROz.t9iciwMTACLwFN9jwVF6qkr6iG1ZtSy', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:02:53', '2023-01-10 01:22:07', '09745674343', NULL, NULL),
(30, 'jessa', 'belen', 'f', 'jessabelen@gmail.com', 'jessabelen', '$2y$10$pt3MNfnFX9LlbRKDE.Cy1OPzK53jxEeWiQ0nAysTNdQGR3Xhy6IVm', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:03:27', '2023-01-10 01:22:11', '09876431231', NULL, NULL),
(31, 'jessa mae', 'licuanan', 'a', 'jessalicuanan@gmail.com', 'jessalicuanan', '$2y$10$SgL7h6pCKi.PuhPlN6Bl5e2mA2of9gsGG/MI4.9IEw.EeWvpseoLy', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:04:01', '2023-01-10 01:22:15', '09653451212', NULL, NULL),
(32, 'jhea', 'flores', 'c', 'jheaflores@gmail.com', 'jheaflores', '$2y$10$gJN2vZHis9LwZO2AB3mvIOFB901SMXx2XuZ9ZE.MnyeLtJXGDdKgO', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:04:43', '2023-01-10 01:22:19', '09876542312', NULL, NULL),
(33, 'jheanica', 'agustin', 'c', 'jheanicaagustin@gmail.com', 'jheanicaagustin', '$2y$10$.H35e16.3qvF.yY8uwIOuuNGELH0gJX4Oxjh3N7h2RPb1pPF2K1rG', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:05:30', '2023-01-10 01:22:23', '09654563221', NULL, NULL),
(34, 'joseph', 'enriquez', 'b', 'josephenriquez@gmail.com', 'josephenriquez', '$2y$10$A70xa1ftpxCUJwbPQFG0qeRcs/C0bQogIYPXYjnYyIB6sgMBh82aO', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:06:04', '2023-01-10 01:22:27', '09876542389', NULL, NULL),
(35, 'juan carlos', 'rocha', 'b', 'juancarlos@gmail.com', 'juancarlos', '$2y$10$Bc13VQ3sKVHVE0iK7ZRLbeAVr6nH1S7qFE5JAALPkk8tW7AUvY2Gy', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:06:43', '2023-01-10 01:22:31', '09786542312', 'III', NULL),
(36, 'justin', 'escultor', 'a', 'justinescultor@gmail.com', 'justinescultor', '$2y$10$aEvYbDwlC8qGTtJXTBY4YOaYO5AX2FZ0gQbK4YEDPND1o.Betk8V.', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:07:28', '2023-01-10 01:22:37', '09653452121', NULL, NULL),
(37, 'justine', 'umandap', 'f', 'justineumandap@gmail.com', 'justineumandap', '$2y$10$rPuyExh8m43OzkYq0HV7dOFILc8I4Q5670ykZkb.QuXBtDkFqXkii', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:07:59', '2023-01-10 01:22:41', '09978654321', NULL, NULL),
(38, 'kyle', 'alvarado', 'a', 'kylealvarado@gmail.com', 'kylealvarado', '$2y$10$dLUoiedzzTrEwdmUo4l7MehLR.y/9EptE3p37pA1895hnSrusr7jq', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:08:32', '2023-01-10 01:22:45', '09765432313', NULL, NULL),
(39, 'luiz', 'morota', 'j', 'luismorota@gmail.com', 'luismorota', '$2y$10$kUdhzdIdkQkPYlS1mdgMyuaJ6pakA2K5IX0xBdHVhU6YE0.Ky376G', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:09:06', '2023-01-10 01:22:49', '09654352435', NULL, NULL),
(40, 'michael', 'atienza', 'b', 'michaelatienza@gmail.com', 'michaelatienza', '$2y$10$okYstbKkAzoSSpRMk9BTEOU0s5v6WD2WaRr9GX6G40u76bwnNkmU2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:09:47', '2023-01-10 01:22:53', '09786543232', NULL, NULL),
(41, 'norman joseph', 'tulauan', '', 'normanjoseph@gmail.com', 'normanjoseph@gmail.com', '$2y$10$PWqyJTd1eEgqSJyP58oLvucipyCmxrD28KUpaCVG5yIlGYaehtcRi', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:11:30', '2023-01-10 01:22:57', '09672131323', NULL, NULL),
(42, 'rach', 'knappet', '', 'rachknappet@gmail.com', 'rachknappet', '$2y$10$2hPoaUuxgZcp097yFzrBrOV46Yf/P68l10fpD4PQsg1Wm2WeTqoc2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:12:25', '2023-01-10 01:23:01', '09395779887', NULL, NULL),
(43, 'borgy', 'alarva', 'a', 'borgyalarva@gmail.com', 'borgyalarva', '$2y$10$D/pFK//Wmf4Zo.5Rpt8LWOs2XjcANPk0Ewhc28Y5REr1C8SCLhqP.', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:12:58', '2023-01-10 01:23:05', '09189481147', NULL, NULL),
(44, 'pau', 'geremillo', '', 'paugeremillo@gmail.com', 'paugeremillo', '$2y$10$Up7xI4LP5jdZhuiquEDjL.Lqw1cwyI6F3BWV27t3WdfmTwIpT.5Se', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:14:19', '2023-01-10 01:23:09', '09876541313', NULL, NULL),
(45, 'reiniel', 'gubaton', '', 'reinielgubaton@gmail.com', 'reinielgubaton', '$2y$10$S88W7PAvX899CxHW7pLLHOESE8ow7oQg5yPUAWziyK9kSQDVYBXUS', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:14:48', '2023-01-10 01:23:11', '09785643231', NULL, NULL),
(46, 'rhen', 'sapin', 'a', 'rhensapin@gmail.com', 'rhensapin', '$2y$10$6qn3jWFYsRB/hqKoIN5aeubAOerw6j3wvIEz.pN6KHc30GzWbtJK.', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:15:18', '2023-01-10 01:23:15', '09865431313', NULL, NULL),
(47, 'rhowin', 'funtanilla', 't', 'rhowinfuntanilla@gmail.com', 'rhowinfuntanilla', '$2y$10$etD.P6QePHaXC9rLek18eeEMsMbCgLjcK.i.1wfOez9LCn7MIDPFu', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:15:56', '2023-01-10 01:23:19', '09454343211', NULL, NULL),
(48, 'rolaisa', 'banana', '', 'rolaisabanana@gmail.com', 'rolaisabanana', '$2y$10$Hx.bOceCxC8BT8s7o.xS9uWOsgQkVHn3sAwG5X//Zyw1OS6kUXo/y', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:16:25', '2023-01-10 01:23:23', '09865421212', NULL, NULL),
(49, 'sophia', 'paulino', 'dc', 'sophiapaulino@gmail.com', 'sophiapaulino', '$2y$10$Wf67oIajCg9RQ8KOXFCqN.mKG9nNof2Gi5/xAq3fgucelFnIyDjNe', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:17:04', '2023-01-10 01:23:27', '09564325675', NULL, NULL),
(50, 'tracy', 'llanto', 'a', 'tracyllanto@gmail.com', 'tracyllanto', '$2y$10$teAGdX5tTSrzn2ztk2hpROHivxFtj.Ig82vmSrkri9DRkHYhWY5Xi', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:17:47', '2023-01-10 01:23:31', '095643232', NULL, NULL),
(51, 'xyzo', 'dimapilis', 'a', 'xyzodimapilis@gmail.com', 'xyzodimapilis', '$2y$10$8/Waj3wRclqQNldAHAksf.JZqfU4TLMOTmQC2OPUxmpmot6O1CsV2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:18:20', '2023-01-10 01:23:33', '09652342121', NULL, NULL),
(52, 'zyra mae', 'perez', 'b', 'zyraperez@gmail.com', 'zyraperez', '$2y$10$SkgmNOSgYz2JCgNDwvXOSOOGcXCcKX4RKV4yPRno8DAyizXG0qnmG', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 01:18:55', '2023-01-10 01:23:36', '096543212314', NULL, NULL),
(53, 'lourdes', 'liquido', 'G', 'liquidolourdes@gmail.com', 'lourdesliquido', '$2y$10$TGE3/WX77pLVK1a8YsbnRuIIi7y27GgeV7vVp0uOBijHebdWDCa7m', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 02:30:55', '2023-01-10 02:33:07', '09972907379', NULL, 'picturetest.png'),
(54, 'albert', 'ocampo', 'b', 'albertocampo@gmail.com', 'albertocampo', '$2y$10$KXwnLGi0kKC6BYrA/0jUVe3pzcHVk6UcCY1bjvbvUINEBeCgQY3RG', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:25:37', '2023-01-10 04:34:40', '09764562323', 'Jr', NULL),
(55, 'christian', 'silva', 'd', 'christiansilva@gmail.com', 'christiansilva', '$2y$10$6GHvcVrcHMZim3YouHwBSObsjKRGmURYN/vX/G0dlfQysIr3/aC/i', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:26:15', '2023-01-10 04:34:44', '09765431231', NULL, NULL),
(56, 'christian', 'fereti', '', 'christianfereti@gmail.com', 'christianferet', '$2y$10$HfG9YZOtv1Ay/n.C7JNiTuMrwaTjwnIglnk28HxikD/uqf217L4B2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:27:47', '2023-01-10 04:34:48', '09764532323', NULL, NULL),
(57, 'dan', 'villarino', '', 'danvillarino@gmail.com', 'danvillarino', '$2y$10$XwXW4jY0Ij/JJUAXbp7ziO5fTHPiD2VFzBs2Bs1l9iq4fMBCCcV3K', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:28:15', '2023-01-10 04:34:52', '09765642323', NULL, NULL),
(58, 'dodi', 'republo', '', 'dodirepublo@gmail.com', 'dodirepublo', '$2y$10$ezajEnUQVOO9dN/oeWLMfOa1LyqcKYYoOPpOptHXz0rPFA5f8tI0a', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:28:45', '2023-01-10 04:34:56', '09786542323', NULL, NULL),
(59, 'jericho', 'gabriel', '', 'jerichogabriel@gmail.com', 'jerichogabriel', '$2y$10$g6tso.tFkL5TTUHPr5D34ebQszdVqNPywRw.TO9BgUc0QCT4LDMK.', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:29:19', '2023-01-10 04:34:58', '09764563423', NULL, NULL),
(60, 'john lennard', 'alicbusan', 'c', 'lennardalicbusan@gmail.com', 'lennardalicbusan', '$2y$10$UuDYNl6UwrDRyc8ca3PwFuXzYOsy2UuwenrhU/nfb2mq2id6xrHuC', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:29:59', '2023-01-10 04:35:01', '09974564545', 'jr', NULL),
(61, 'justine', 'quinones', '', 'justinequinones@gmail.com', 'justinequinones', '$2y$10$l0PJ/zjMe9.bDkGXkRRyG..Gh6fR2XoJ8CileRHKtU6OnxF55JQQW', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:30:27', '2023-01-10 04:35:04', '09765462323', NULL, NULL),
(62, 'justine', 'saysay', 'r', 'justinerome@gmail.com', 'justinerome', '$2y$10$x0RgPnA0ff8ClvEp0O.VeOIDoRG6xhiQc150gw0WKChdLnZuGs/4e', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:31:23', '2023-01-10 04:35:07', '09976547878', NULL, NULL),
(63, 'karl', 'pacardo', 'c', 'karlpacardo@gmail.com', 'karlpacardo', '$2y$10$gHyfizfF1VkiK4Apo8Meh.SyKe177NMMElFmNhfIvR54jtLAK2kym', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:31:54', '2023-01-10 04:35:12', '09765424261', NULL, NULL),
(64, 'khalvin', 'villadores', 'a', 'khalvinvilladores@gmail.com', 'khalvinvilladores', '$2y$10$h5SGVBz.HK/K4Hh/1yEEXeQd96AOfVNW9qYFP3.G3eNys0jYGCMju', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:32:23', '2023-01-10 04:35:15', '09675432323', NULL, NULL),
(65, 'noah', 'agustine', 'l', 'noahagustine@gmail.com', 'noahagustine', '$2y$10$mVI4RvrISnI.ypKTI8ORperuk5oqTvNOkaIsa1RsVm.DqH/LWW7YC', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:32:52', '2023-01-10 04:35:21', '09765432678', NULL, NULL),
(66, 'pau', 'guevarra', '', 'pauguevarra@gmail.com', 'pauguevarra', '$2y$10$JlfdTaanchmZeX8MxeOvtuhYesR.GjZC2NlkjGCN22IHbgtcWSLlC', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:33:26', '2023-01-10 04:35:18', '09897654343', NULL, NULL),
(67, 'rafael', 'logronio', 'c', 'rafaellogronio@gmail.com', 'rafaellogronio', '$2y$10$cB9e4jwT6vbMwubaYMdzA.PvCKNQUmLtlh6TNcCXO1SDXrkT76SlK', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:34:02', '2023-01-10 04:35:24', '097654343', NULL, NULL),
(68, 'vince', 'batiles', '', 'vincebatiles@gmail.com', 'vincebatiles', '$2y$10$0SC7zchkqLK2Q5oU1aPMx.WYMMZvGyG/6.SRdV5m3T7sN03YsdbYa', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 04:34:31', '2023-01-10 04:35:27', '09765432121', NULL, NULL),
(69, 'mark', 'tan', 'p', 'marktan@123gmail.com', 'marktan1234', '$2y$10$ejTQceYFKWs.8nvmL6DzcuZzzw53vPE3xOJR/cgyL5PzVh/FmWfDO', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 05:35:25', '2023-01-10 05:35:38', '09876543211', NULL, NULL),
(70, 'aldrin', 'almeda', '', 'aldrinalmeda@gmail.com', 'aldrinalmeda', '$2y$10$I1npbGZRVab8CB68n.zfx.VH0by1Xnu5WYxBHXQiUb7WQg0UDakK2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:05:16', '2023-01-10 06:11:44', '09786542323', NULL, NULL),
(71, 'ato', 'gonzales', 'n', 'atogonzales@gmail.com', 'atogonzales', '$2y$10$dipGtEMLqJH4X5TmPm59su4SqvnZLTDIAn3zzgxMNKUFPcUsP5zfG', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:05:49', '2023-01-10 06:11:46', '097653434', NULL, NULL),
(72, 'chan', 'olaez', 'lat', 'chanolaez@gmail.com', 'chanolaez', '$2y$10$4Agxw7k/VZoEsp5OmClIzOkUSxAbdxJWVTktSQ7OX.e7ZRET.cDwe', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:06:19', '2023-01-10 06:11:54', '097684545', NULL, NULL),
(73, 'christopher', 'lat', '', 'christopherlat@gmail.com', 'christopherlat', '$2y$10$iruExbt6dR8VdXMqGq8EQuYMnDfPkxgCh0OUwtoxpH1e4Lb8Z0fbu', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:06:57', '2023-01-10 06:11:56', '09764562323', NULL, NULL),
(74, 'emmanuel', 'domingo', 'h', 'emmanueldomingo@gmail.com', 'emmanueldomingo', '$2y$10$czceh5PAjB1KHkJwSyftS.d6UFf9o90Dq/8BXWWPowIqsj7H438ue', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:07:49', '2023-01-10 06:11:59', '09765436767', NULL, NULL),
(75, 'james', 'delgado', '', 'jamesdelgado@gmail.com', 'jamesdelgado', '$2y$10$5M50kMlaugvIFEn/7f7U2.6szM127NDQQMNfYYSGxvV5OAbXudUoq', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:08:23', '2023-01-10 06:12:02', '09786544231', NULL, NULL),
(76, 'jerrlet', 'olaez', '', 'jerrletolaez@gmail.com', 'jerrletolaez', '$2y$10$711hBHY1o1U1CGypzzX2SexBVypTz9qiDXeju1DZkVi0LYIbwwWni', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:08:59', '2023-01-10 06:12:05', '09764563431', NULL, NULL),
(77, 'jm', 'cacao', '', 'jmcacao@gmail.com', 'jmcacao21', '$2y$10$jUvXtkoq31kPbpqti63bFe3duu4aEcAiPFZlx02KUEZ7gad1TPku2', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:09:37', '2023-01-10 06:12:08', '09786543532', NULL, NULL),
(78, 'jon', 'alcasabas', '', 'jonalcasabas@gmail.com', 'jonalcasabas', '$2y$10$gA0WJw3A28SYuHaljhq2CexjP60Mh2koYM9YyQ6lfKzGbFlKbwQ0m', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:10:12', '2023-01-10 06:12:11', '09786543434', NULL, NULL),
(79, 'kim nikko', 'pagkaliwanagan', '', 'nikkopagkaliwanagan@gmail.com', 'nikkopagkaliwanagan', '$2y$10$wA1MrI9d0rb7p.rJVJSBq.5axpY/1H1PbGpAsz0.1an4iqqQX6Utu', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:11:28', '2023-01-10 06:12:15', '09784232424', NULL, NULL),
(80, 'Vincent', 'Villadores', 'C', 'vincentvilladores@gmail.com', 'vincentvilladores', '$2y$10$QC1WL3vcz6St.LsOfOaQguEZe1Z.LwdktRqcnPIhDI0pSNDRXHaP.', '1', 0, 1, 3, NULL, 7, 0, '2023-01-10 06:59:17', '2023-01-10 07:00:14', '09972907379', NULL, 'license.jfif'),
(81, 'Joshua', 'Alberto', 'C', 'joshuaalberto@gmail.com', 'joshuaalberto', '$2y$10$Bw/.cg/8omK70cM4FkypA.ZlStDfRerGzny2GcRu.0W4bS7UGSKBe', '1', 0, 1, 3, NULL, 82, 0, '2023-01-21 18:56:56', '2024-05-21 13:02:46', '09785463532', 'Jr', 'Vintage Cake and Bakery Badge Logo.png'),
(82, 'JR', 'Didasa', NULL, 'jrdidasa@gmail.com', 'JR', '$2y$10$M9PHmfWkJwUL.h7BwbnPM.2WFLIBbmfGhRzBLZr2g3leDzp/scy7m', '1', 0, 1, 1, NULL, NULL, 0, '2024-05-12 12:09:24', NULL, '09972919292', NULL, '321499694_749911329349458_7842456147359109256_n.png'),
(83, 'calvin', 'gaspar', 'n/a', 'calvingaspar50@gmail.com', 'calvin.gaspar', '$2y$10$aWxmj56s5Q/EtdmPdUYlD.cJc5Lm9nXAqwwrPGqPFfHUd8hKAJsy2', '1', 0, 1, 1, NULL, 82, 0, '2024-05-22 21:29:03', '2024-05-22 21:34:30', '09922691559', 'n/a', 'NATIONAL ID.jpg'),
(84, 'erald', 'manlapaz', 'a.', 'eamanlapaz@ccc.edu.ph', 'erald.man', '$2y$10$70vSrDUr9n1AXP049kxSoeTObKxRIP./j03fltzaMOUA/GE0Km4Pe', '1', 0, 1, 1, NULL, 83, 0, '2024-05-23 03:53:58', '2024-05-23 03:57:12', '09551434473', 'N/a', 'NATIONAL ID.jpg'),
(85, 'nathaniel', 'cruz', 'c.', 'jccruz@ccc.edu.ph', 'nath.cruz', '$2y$10$1RwuwUFw4Vv0Mb2oW0l4e.zej2fBMjOkcZnBGY8bRLLfmPVFg2k9i', '1', 0, 1, 1, NULL, 83, 0, '2024-05-23 03:56:04', '2024-05-23 03:57:24', '09683793734', 'N/a', 'NATIONAL ID.jpg'),
(86, 'John', 'Doe', 'Medel', 'johndoe@gmail.com', 'j.doe', '$2y$10$D.TqCEwvM3.P7K3H0x7DAeztxf.OmYlnLKO1JJ/czbJdyZyiCrKta', '1', 0, 1, 3, NULL, 83, 0, '2024-05-23 07:16:04', '2024-05-23 07:24:01', '09097564454', 'n/a', 'NATIONAL ID.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0 COMMENT '0-active, 1-deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Administrator', '2022-03-29 04:22:42', NULL, 0),
(2, 'Staff', '2022-03-29 04:22:42', NULL, 1),
(3, 'User', '2022-03-29 04:23:19', NULL, 0),
(4, 'Others', '2022-03-29 04:23:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `water_levels`
--

CREATE TABLE `water_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `water_level_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '0-Inactive, 1-Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_levels`
--

INSERT INTO `water_levels` (`id`, `water_level_value`, `status`, `created_at`, `updated_at`) VALUES
(1, '69', 1, '2024-10-13 10:00:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_created_by_foreign` (`created_by`),
  ADD KEY `announcements_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_activities`
--
ALTER TABLE `barangay_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_activities_created_by_foreign` (`created_by`),
  ADD KEY `barangay_activities_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_clearance_certificates`
--
ALTER TABLE `barangay_clearance_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_clearance_certificates_created_by_foreign` (`created_by`),
  ADD KEY `barangay_clearance_certificates_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `barangay_clearance_certificates_barangay_resident_id_foreign` (`barangay_resident_id`);

--
-- Indexes for table `barangay_demographies`
--
ALTER TABLE `barangay_demographies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_demographies_created_by_foreign` (`created_by`),
  ADD KEY `barangay_demographies_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_geographies`
--
ALTER TABLE `barangay_geographies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_geographies_created_by_foreign` (`created_by`),
  ADD KEY `barangay_geographies_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_histories`
--
ALTER TABLE `barangay_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_histories_created_by_foreign` (`created_by`),
  ADD KEY `barangay_histories_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_mission_visions`
--
ALTER TABLE `barangay_mission_visions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_mission_visions_created_by_foreign` (`created_by`),
  ADD KEY `barangay_mission_visions_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_officials`
--
ALTER TABLE `barangay_officials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_officials_created_by_foreign` (`created_by`),
  ADD KEY `barangay_officials_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_others`
--
ALTER TABLE `barangay_others`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_others_created_by_foreign` (`created_by`),
  ADD KEY `barangay_others_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_profiles`
--
ALTER TABLE `barangay_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_profiles_created_by_foreign` (`created_by`),
  ADD KEY `barangay_profiles_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_residents`
--
ALTER TABLE `barangay_residents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_residents_created_by_foreign` (`created_by`),
  ADD KEY `barangay_residents_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `barangay_residents_user_id_foreign` (`user_id`);

--
-- Indexes for table `barangay_resident_blotters`
--
ALTER TABLE `barangay_resident_blotters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_resident_blotters_created_by_foreign` (`created_by`),
  ADD KEY `barangay_resident_blotters_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `barangay_resident_blotters_barangay_resident_id_foreign` (`barangay_resident_id`);

--
-- Indexes for table `barangay_resident_databases`
--
ALTER TABLE `barangay_resident_databases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_resident_databases_created_by_foreign` (`created_by`),
  ADD KEY `barangay_resident_databases_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `barangay_schools`
--
ALTER TABLE `barangay_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_schools_created_by_foreign` (`created_by`),
  ADD KEY `barangay_schools_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `cedulas`
--
ALTER TABLE `cedulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedulas_created_by_foreign` (`created_by`),
  ADD KEY `cedulas_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `cedulas_barangay_resident_id_foreign` (`barangay_resident_id`),
  ADD KEY `cedulas_issuance_configuration_id_foreign` (`issuance_configuration_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `indigency_certificates`
--
ALTER TABLE `indigency_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indigency_certificates_created_by_foreign` (`created_by`),
  ADD KEY `indigency_certificates_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `indigency_certificates_barangay_resident_id_foreign` (`barangay_resident_id`);

--
-- Indexes for table `issuance_configurations`
--
ALTER TABLE `issuance_configurations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuance_configurations_created_by_foreign` (`created_by`),
  ADD KEY `issuance_configurations_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `license_permit_certificates`
--
ALTER TABLE `license_permit_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_permit_certificates_created_by_foreign` (`created_by`),
  ADD KEY `license_permit_certificates_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `license_permit_certificates_barangay_resident_id_foreign` (`barangay_resident_id`);

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
-- Indexes for table `registration_certificates`
--
ALTER TABLE `registration_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_certificates_created_by_foreign` (`created_by`),
  ADD KEY `registration_certificates_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `registration_certificates_barangay_resident_id_foreign` (`barangay_resident_id`);

--
-- Indexes for table `residency_certificates`
--
ALTER TABLE `residency_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residency_certificates_created_by_foreign` (`created_by`),
  ADD KEY `residency_certificates_last_updated_by_foreign` (`last_updated_by`),
  ADD KEY `residency_certificates_barangay_resident_id_foreign` (`barangay_resident_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_level_id_foreign` (`user_level_id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_levels`
--
ALTER TABLE `water_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barangay_activities`
--
ALTER TABLE `barangay_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barangay_clearance_certificates`
--
ALTER TABLE `barangay_clearance_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `barangay_demographies`
--
ALTER TABLE `barangay_demographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barangay_geographies`
--
ALTER TABLE `barangay_geographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barangay_histories`
--
ALTER TABLE `barangay_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barangay_mission_visions`
--
ALTER TABLE `barangay_mission_visions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangay_officials`
--
ALTER TABLE `barangay_officials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `barangay_others`
--
ALTER TABLE `barangay_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barangay_profiles`
--
ALTER TABLE `barangay_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barangay_residents`
--
ALTER TABLE `barangay_residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `barangay_resident_blotters`
--
ALTER TABLE `barangay_resident_blotters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barangay_resident_databases`
--
ALTER TABLE `barangay_resident_databases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barangay_schools`
--
ALTER TABLE `barangay_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cedulas`
--
ALTER TABLE `cedulas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indigency_certificates`
--
ALTER TABLE `indigency_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `issuance_configurations`
--
ALTER TABLE `issuance_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `license_permit_certificates`
--
ALTER TABLE `license_permit_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_certificates`
--
ALTER TABLE `registration_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `residency_certificates`
--
ALTER TABLE `residency_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `water_levels`
--
ALTER TABLE `water_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `announcements_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_activities`
--
ALTER TABLE `barangay_activities`
  ADD CONSTRAINT `barangay_activities_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_activities_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_clearance_certificates`
--
ALTER TABLE `barangay_clearance_certificates`
  ADD CONSTRAINT `barangay_clearance_certificates_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `barangay_clearance_certificates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_clearance_certificates_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_demographies`
--
ALTER TABLE `barangay_demographies`
  ADD CONSTRAINT `barangay_demographies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_demographies_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_geographies`
--
ALTER TABLE `barangay_geographies`
  ADD CONSTRAINT `barangay_geographies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_geographies_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_histories`
--
ALTER TABLE `barangay_histories`
  ADD CONSTRAINT `barangay_histories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_histories_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_mission_visions`
--
ALTER TABLE `barangay_mission_visions`
  ADD CONSTRAINT `barangay_mission_visions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_mission_visions_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_officials`
--
ALTER TABLE `barangay_officials`
  ADD CONSTRAINT `barangay_officials_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_officials_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_others`
--
ALTER TABLE `barangay_others`
  ADD CONSTRAINT `barangay_others_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_others_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_profiles`
--
ALTER TABLE `barangay_profiles`
  ADD CONSTRAINT `barangay_profiles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_profiles_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_residents`
--
ALTER TABLE `barangay_residents`
  ADD CONSTRAINT `barangay_residents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_residents_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_residents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_resident_blotters`
--
ALTER TABLE `barangay_resident_blotters`
  ADD CONSTRAINT `barangay_resident_blotters_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `barangay_resident_blotters_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_resident_blotters_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_resident_databases`
--
ALTER TABLE `barangay_resident_databases`
  ADD CONSTRAINT `barangay_resident_databases_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_resident_databases_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `barangay_schools`
--
ALTER TABLE `barangay_schools`
  ADD CONSTRAINT `barangay_schools_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangay_schools_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `cedulas`
--
ALTER TABLE `cedulas`
  ADD CONSTRAINT `cedulas_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `cedulas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cedulas_issuance_configuration_id_foreign` FOREIGN KEY (`issuance_configuration_id`) REFERENCES `issuance_configurations` (`id`),
  ADD CONSTRAINT `cedulas_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `indigency_certificates`
--
ALTER TABLE `indigency_certificates`
  ADD CONSTRAINT `indigency_certificates_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `indigency_certificates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `indigency_certificates_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `issuance_configurations`
--
ALTER TABLE `issuance_configurations`
  ADD CONSTRAINT `issuance_configurations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `issuance_configurations_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `license_permit_certificates`
--
ALTER TABLE `license_permit_certificates`
  ADD CONSTRAINT `license_permit_certificates_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `license_permit_certificates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `license_permit_certificates_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `registration_certificates`
--
ALTER TABLE `registration_certificates`
  ADD CONSTRAINT `registration_certificates_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `registration_certificates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registration_certificates_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `residency_certificates`
--
ALTER TABLE `residency_certificates`
  ADD CONSTRAINT `residency_certificates_barangay_resident_id_foreign` FOREIGN KEY (`barangay_resident_id`) REFERENCES `barangay_residents` (`id`),
  ADD CONSTRAINT `residency_certificates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `residency_certificates_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
