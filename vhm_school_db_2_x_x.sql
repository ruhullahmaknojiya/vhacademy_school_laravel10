-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 01:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vhm_school_db_2.x.x`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Late','Absent','Holiday','Half Day') NOT NULL,
  `holiday_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2024-07-07 04:39:57', '2024-07-07 04:39:57'),
(2, 'B', '2024-07-07 04:40:03', '2024-07-07 04:40:03'),
(3, 'C', '2024-07-07 04:40:12', '2024-07-07 04:40:12'),
(4, 'D', '2024-07-07 04:40:16', '2024-07-07 04:40:16'),
(5, 'G', '2024-12-19 03:47:09', '2024-12-19 03:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `classes_teacher_assignments`
--

CREATE TABLE `classes_teacher_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `standard_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes_teacher_assignments`
--

INSERT INTO `classes_teacher_assignments` (`id`, `medium_id`, `standard_id`, `class_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 3, 17, 1, 14, '2024-07-27 08:30:19', '2024-07-27 08:30:19'),
(3, 4, 19, 1, 14, '2024-07-27 08:30:59', '2024-07-27 08:30:59'),
(4, 3, 22, 1, 41, '2024-07-27 08:31:37', '2024-07-27 08:31:37'),
(5, 4, 15, 1, 41, '2024-07-27 08:32:00', '2024-07-27 08:32:00'),
(6, 3, 23, 1, 42, '2024-07-27 08:32:32', '2024-07-27 08:32:32'),
(7, 4, 16, 1, 42, '2024-07-27 08:32:48', '2024-07-27 08:32:48'),
(8, 3, 24, 1, 22, '2024-07-27 08:33:42', '2024-07-27 08:33:42'),
(9, 3, 25, 1, 18, '2024-07-27 08:34:06', '2024-07-27 08:34:06'),
(10, 3, 28, 1, 25, '2024-07-27 09:22:34', '2024-07-27 09:22:34'),
(11, 3, 29, 1, 6, '2024-07-27 09:23:24', '2024-07-27 09:23:24'),
(12, 3, 30, 1, 8, '2024-07-27 09:23:39', '2024-07-27 09:23:39'),
(13, 3, 31, 1, 7, '2024-07-27 09:24:03', '2024-07-27 09:24:03'),
(14, 3, 32, 1, 13, '2024-07-27 09:24:26', '2024-07-27 09:24:26'),
(15, 3, 33, 1, 36, '2024-07-27 09:26:15', '2024-07-27 09:26:15'),
(16, 3, 34, 1, 10, '2024-07-27 09:27:27', '2024-07-27 09:27:27'),
(17, 3, 35, 1, 9, '2024-07-27 09:27:58', '2024-07-27 09:27:58'),
(20, 3, 38, 1, 3, '2024-07-27 09:29:53', '2024-07-27 09:29:53'),
(21, 3, 39, 1, 16, '2024-07-27 09:30:21', '2024-07-27 09:30:21'),
(22, 4, 26, 1, 11, '2024-07-27 09:30:48', '2024-07-27 09:30:48'),
(23, 4, 27, 1, 5, '2024-07-27 09:31:08', '2024-07-27 09:31:08'),
(24, 4, 40, 1, 12, '2024-07-27 09:31:30', '2024-07-27 09:31:30'),
(25, 4, 41, 1, 35, '2024-07-27 09:31:58', '2024-07-27 09:31:58'),
(26, 4, 42, 1, 29, '2024-07-27 09:32:37', '2024-07-27 09:32:37'),
(27, 4, 43, 1, 33, '2024-07-27 09:33:05', '2024-07-27 09:33:05'),
(28, 4, 44, 1, 20, '2024-07-27 09:33:41', '2024-07-27 09:33:41'),
(30, 4, 47, 1, 26, '2024-07-27 09:34:50', '2024-07-27 09:34:50'),
(31, 4, 48, 1, 15, '2024-07-27 09:35:15', '2024-07-27 09:35:15'),
(32, 4, 49, 1, 28, '2024-07-27 09:36:21', '2024-07-27 09:36:21'),
(33, 4, 50, 1, 23, '2024-07-27 09:37:49', '2024-07-27 09:37:49'),
(35, 4, 52, 1, 16, '2024-07-27 09:38:33', '2024-07-27 09:38:33'),
(36, 4, 46, 1, 27, '2024-07-27 09:44:57', '2024-07-27 09:44:57'),
(37, 3, 36, 1, 39, '2024-07-27 09:45:59', '2024-07-27 09:45:59'),
(38, 4, 51, 1, 24, '2024-07-27 09:52:14', '2024-07-27 09:52:14'),
(39, 3, 37, 1, 43, '2024-07-28 04:43:19', '2024-07-28 04:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `short_Description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `event_video` varchar(255) DEFAULT NULL,
  `event_pdf` varchar(255) DEFAULT NULL,
  `repeated` varchar(255) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_image`, `start_date`, `end_date`, `short_Description`, `created_at`, `updated_at`, `school_id`, `color`, `event_video`, `event_pdf`, `repeated`) VALUES
(2, 'Telangana Formation Day (તેલંગાણા રચના દિવસ)', 'Sw9eucui1ogZ8bEDgs0vtxIS6NpzJZxcvMjHPgHa.jpg', '2024-06-02 12:00:00', '2024-06-02 12:00:00', 'Telangana Day, commonly known as Telangana Formation  Day, is a state public holiday in the Indian state of Telangana,  commemorating the formation of the state of Telangana. It is  observed annually on 2 June since 2014. Telangana Day is  commonly associated with parades and political speeches and  ceremonies, in addition to various other public and private events  celebrating the history and traditions of Telangana. The state  celebrates the occasion with formal events across the districts. The  formal event of national flag hoisting by the Chief Minister of  Telangana and the ceremonial parade is held at the parade  grounds. Celebrations are held in all 33 districts of the state', '2024-06-07 17:21:27', '2024-07-13 08:15:06', NULL, '#000000', 'https://vimeo.com/959379772', 'GZLg20OL4DAlYvki0vqE5FMOl2XxRVJ8XgTJ2JVZ.pdf', 'true'),
(3, 'World Bicycle Day (વિશ્વ સાયકલ દિવસ )', 'cYOMp935vmjSBBdd8aNoofvnbrzOCVehZFO2Lgpc.png', '2024-06-03 12:59:00', '2024-06-03 12:22:00', 'World Bicycle Day is celebrated on June 3 every year. It aims to make people aware of the benefits of cycling. Let us tell you the health benefits of cycling. Cycling is not only good for the environment, but it is also very beneficial for our health. Cycling is a better way to keep the environment pollution free. Also running it gives the body a lot of exercise. This not only helps in weight loss, but also strengthens the muscles. To illustrate the usefulness of cycling, on June 3, 2018, World Bicycle Day was celebrated for the first time in New York by the United Nations General Assembly. Since then this day is celebrated every year.', '2024-06-07 17:25:10', '2024-07-13 09:59:16', NULL, '#000000', 'https://shorturl.at/pzLR2', 'g1niNIV7hrSxbWryRK2clOErIttQrzdoRUbLZnHv.pdf', 'true'),
(4, 'World Environment Day (વિશ્વ પર્યાવરણ દિવસ)', 'WNHT2FZ6Q9aFvkxGEsXdap5x3hYgwAIxGLKCiozR.jpg', '2024-06-05 12:00:00', '2024-06-05 12:00:00', 'World Environment Day, observed on June 5th annually, serves as a global platform to raise awareness and mobilize action for environmental protection. With a theme that changes each year, it highlights pressing environmental issues and encourages individuals, communities, and governments to take meaningful steps towards sustainability. From tree planting initiatives to clean-up campaigns, educational programs to policy advocacy, World Environment Day sparks a multitude of activities worldwide. It underscores the interconnectedness of humanity and nature, emphasizing the urgent need for collective efforts to preserve our planet for present and future generations. Through collaboration and commitment, we can address environmental challenges and strive for a healthier, more sustainable world.', '2024-06-07 17:27:59', '2024-07-13 16:12:26', NULL, '#000000', 'https://shorturl.at/pzLR2', '6xByNBBTKKjzDbp3rjnY2q4SbO1CsLjwl9cZkvuV.pdf', NULL),
(5, 'WORLD PEST DAY (વિશ્વ જંતુ દિવસ)', 'HILHiA3emj39HXUK9jFUUNuH6Qildvp50keKK4bj.jpg', '2024-06-06 12:00:00', '2024-06-06 12:00:00', 'World Pest Day is observed every June 6 to raise awareness about effective pest management practices and how they benefit the quality of human and plant life. Did you know that humans have been controlling pest infestation since 3000 B.C.? Pests are organisms that spread diseases, cause destruction, or constitute a nuisance. Familiar pests are ants, rodents, termites, cockroaches, mosquitoes, and bed bugs. Different methods are used to control pests, including pesticides, biological control agents, electronic devices, and physical means. World Pest Day, also known as World Pest Awareness Day.', '2024-06-07 17:31:32', '2024-06-07 17:46:55', NULL, '#000000', 'https://shorturl.at/pzLR2', 'REAQ1J6aUH5utgoTLxHBQFuKqgjSjmUXTeJcOwJz.pdf', NULL),
(6, 'World Food Safety Day (વિશ્વ ખાદ્ય સુરક્ષા દિવસ)', 'NiywKimaohiWlD6Z3pjUXzGZX1gRWnUJeIjhLmn8.jpg', '2024-06-07 12:59:00', '2024-06-07 12:00:00', 'Every year on June 7, we celebrate World Food Safety Day to make sure our food is safe to eat. The United Nations created this day to remind us about the importance of being careful with our food from the beginning until it reaches our plates. Many people work together to grow, process, store, distribute, and prepare our food. This celebration is crucial because there are many steps in the proc the chosen theme for World Food Safety Day in 2024 is “Safer food, better health.” Emphasizing the critical role of safe and nutritious food in human health and well-being, this theme underscores its significance.', '2024-06-07 17:34:37', '2024-06-07 17:47:29', NULL, '#000000', 'https://shorturl.at/fkH59', '5FdZy4aujcAAO4MDzUA2P7kiYJb4HlxMiNBipvXf.pdf', NULL),
(7, 'WORLD OCEANS DAY (વિશ્વ મહાસાગરો દિવસ)', 'sidAo6cE82jAHv9HP1T5IB4l7c6UjQcHrArnOwzg.jpg', '2024-06-08 12:00:00', '2024-06-08 12:00:00', 'World Oceans Day is held every year on 8th June to raise awareness of the vital importance of our oceans and the role they play in sustaining a healthy planet. A global celebration, it looks to bring people and organizations together across the globe in a series of events highlighting how we can all help protect and conserve the oceans. On World Oceans Day, people around our blue planet celebrate and honor our ocean, which connects us all. Get together with your family, friends, community, and millions of others around our blue planet to start creating a better future. By working together, we can — and will — protect and restore our shared ocean. Join this growing global celebration on 8 June with continuing engagement year-round!', '2024-06-07 17:38:27', '2024-07-13 16:11:42', NULL, '#000000', 'https://shorturl.at/fkH59', 'sNdhGhPDFnYRtzVdtKhe8EeYxeEYanVdqn5exKNc.pdf', NULL),
(8, 'National Children\'s Day (વિશ્વબાળ દિવસ)', 'B2WNFrktgyBA7DV9N2ijiVCo5jZO8pPXvhFcSzJG.jpg', '2024-06-09 12:00:00', '2024-06-09 12:00:00', 'The concept of National Children’s Day dates back to over a century when the idea was brought forth by a pastor in Chelsea, Massachusetts. In 1856, Reverend Dr.Charles Leonard set up the second Sunday of June as a time for families to bring their children forward to address their needs as well as having them baptized. At the time, this day was called ‘Rose Day’, then ‘Flower Day’ and eventually it came to be known as Children’s Day. While the idea of Children’s Day has often been supported within church establishments, it did not really make its way into the general public until the mid-1990s. This was when a retired school teacher named Lee Rechter began sharing her dream of a day that honored children. Around this time, the idea gained some traction and support, even getting attention from the top when US President Bill Clinton established National Children’s Day in 1995. But the dates have been a bit confusing ever since. Whereas Clinton set the date for October 8, a few years later in 2001 the date was proclaimed by President George W. Bush for the first Sunday in June. Fast forward to another president in 2009, when Barack Obama also declared the day but changed it to November 20 to coincide with what is set aside by the United Nations as World Children’s Day.  So although the date has jumped around, the idea behind a National Children’s Day remains to be that this is a special time that is set aside to be reminded how important children are to the world in the present and in the future. It’s also a day to consider unmet needs of children and aim to solve problems that could help them thrive better in society. This is a great time for communities, governments, non-profit organizations, and families to seek to prioritize the health, welfare and education of children while advocating for their rights and supporting the best environments in which they can grow. For every adult, National Children’s Day provides an ideal space and time to consider the ways that children bring hope and brightness to life, and to take part in plans where they can be honoured and appreciated.', '2024-06-07 17:40:24', '2024-06-07 17:48:45', NULL, '#000000', 'https://shorturl.at/fkH59', 'JaLEZAVIz31MJApRYliV6SqDce80DkK2DLI7o1p7.pdf', NULL),
(9, 'NATIONAL HERBS AND SPICES (રાષ્ટ્રીય જડીબુટ્ટીઓ અને મસાલા)', 'X1DQgkeOBNHXX3dSBKya9lTBeDHGq5XVCk1pvJOm.jpg', '2024-06-10 12:00:00', '2024-06-10 12:00:00', 'Celebrating flavor each year on June 10th, National Herbs and Spices Day recognizes the diversity and quality offered by using both fresh and dried herbs and spices in your cooking. All year long, herbs and spices are essential to cooking. But as the summer heats up, developing a knack for cooking with fresh herbs will bring brightness and flavour to your grilling and your kitchen. They not only add flavour to your meals but herbs and spices also add colour bringing a vibrancy. Raising your own herbs can be a form of relaxing therapy, too. Herbs and spices have been used for many hundreds of years, and besides making our food delicious, each has its specific health benefits. Growing your own herbs and spices is a great way to add fresh variety to your food. Herbs raised in your home add an aromatic and natural fragrance to the air as well. Plant an herb garden and start using those herbs to create your own supply of herbs and spices. Some great plants to start with include dill, fennel, basil, sage, thyme, and cilantro.', '2024-06-07 17:43:24', '2024-06-07 17:43:24', NULL, '#000000', 'https://shorturl.at/fkH59', 'fBfRZHcaXDuCvifcKPPLjZ2WiHgUkyEIY6yXcW1O.pdf', NULL),
(10, 'National Call Your Doctor Day  (રાષ્ટ્રીય તમારા ડોક્ટરને કોલ કરો દિવસ)', 'PAQkoH7oESsGXTwmLBZNTMea1X29jyKeSNBdRv7E.jpg', '2024-06-11 12:00:00', '2024-06-11 12:00:00', '\"National Call Your Doctor Day\" is a day dedicated to encouraging individuals to prioritize their health by reaching out to their healthcare providers for routine check-ups, screenings, and consultations. This observance, typically held on the second Tuesday in June, serves as a reminder for people to take charge of their well-being and address any health concerns they may have. The importance of regular communication with healthcare providers cannot be overstated. Many health issues can be prevented or managed more effectively when detected early.', '2024-06-07 17:51:25', '2024-06-07 17:51:25', NULL, '#000000', 'https://shorturl.at/fkH59', 'oywLCp73jCMi0jEP2ouHlrOA6vlVLdaodV2rZ3In.pdf', NULL),
(11, 'WORLD DAY AGAINST CHILD LABOUR  (બાળ મજૂરી વિરુદ્ધ વિશ્વ દિવસ)', 'cqrMIbOojNwsATb1cJGchmQfkmoYWhq9wzlfBwxs.jpg', '2024-06-12 12:00:00', '2024-06-12 12:00:00', 'World Day Against Child Labour is a global observance that aims to raise awareness about the importance of eradicating child labour, and promote the rights of children to education, health, and a safe, fulfilling childhood. The day provides an opportunity for governments, civil society organizations, businesses, and individuals from around the world to come together and push for effective measures to end the exploitation of children in various work settings. Through conferences, campaigns, and events, stakeholders discuss the issues and challenges, and share experiences and best practices to eliminate this social evil.', '2024-06-07 17:53:48', '2024-06-07 17:53:48', NULL, '#000000', 'https://shorturl.at/fkH59', 'iXHkHnyuCjRImEB116KVgayhVS8HgVf5zAtCAEMd.pdf', NULL),
(12, 'International Albinism Awareness Day  (આંતરરાષ્ટ્રીય આલ્બિનિઝમ અવેરનેસ દિવસ )', 'hChPFb5pJOtJsQDBLYz34JiIEno1jlfuVxpip9wz.png', '2024-06-13 12:00:00', '2024-06-13 12:00:00', 'The story of International Albinism Awareness Day began with a global call to action. Recognizing the urgent need to protect individuals with albinism from discrimination and violence, the United Nations General Assembly took a significant step. On December 18, 2014, they proclaimed June 13 as International Albinism Awareness Day, starting from 2015. This declaration was a response to the hardships faced by people with albinism, including social exclusion and human rights violations. Albinism, a condition marked by a lack of melanin pigment in the skin, hair, and eyes, affects people across all ethnic backgrounds. The establishment of this day aimed to challenge myths, stereotypes, and misconceptions surrounding albinism. It called for increased awareness, understanding, and acceptance of this condition. Governments, organizations, and communities worldwide now come together to promote inclusivity, equality, and support for those with albinism. Each year, the day is guided by a unique theme, highlighting various aspects of the experience of people with albinism and promoting a message of inclusion, hope, and resilience. By participating in activities and events, International Albinism Awareness Day strives to create a more inclusive and accepting world.', '2024-06-07 17:56:10', '2024-06-07 17:56:10', NULL, '#000000', 'https://shorturl.at/fkH59', '6sj3vvMxGmL3NRSCOoTPldYNuvX3pmBb0mHDFuYJ.pdf', NULL),
(14, 'World Blood Donor Day  (વિશ્વ રક્તદાતા દિવસ)', 'frYUdmftU3mGZCFaZdvLWieY5LTOP5tyiMOJ1TV2.jpg', '2024-06-14 12:00:00', '2024-06-14 12:00:00', 'World Blood Donor Day, observed annually on June 14th, is a global celebration honoring voluntary blood donors. It\'s a day to express gratitude for their life-saving gift and raise awareness about the crucial need for safe blood transfusions. Origins and Significance: Established in 2004 by the World Health Organization (WHO) along with other international organizations, World Blood Donor Day specifically recognizes the selfless act of voluntary blood donation. Blood transfusions are essential for a variety of medical procedures, including surgeries, accident victims, and those battling blood disorders. A steady supply of safe blood is critical for healthcare systems worldwide. Theme and Focus: Each year, World Blood Donor Day has a specific theme that guides campaigns and activities. This theme highlights a particular aspect of blood donation and aims to inspire action. For instance, past themes have focused on the importance of young blood donors, building a culture of blood donation, and ensuring equitable access to safe blood.     How You Can Get Involved: There are several ways you can participate in World Blood Donor Day: •	Donate Blood: If you\'re healthy and meet the eligibility criteria, consider donating blood at a local blood bank or donation drive. •	Spread Awareness: Talk to friends and family about the importance of blood donation and encourage them to learn more. Share information and resources on social media using relevant hashtags. •	Organize a Blood Drive: Work with your community center, workplace, or school to organize a blood drive event. This can significantly increase blood collection and benefit local hospitals. •	Volunteer Your Time: Many blood banks rely on volunteers for administrative tasks, assisting with donor registration, or promoting donation events. The Impact of Blood Donation: Voluntary blood donations are a cornerstone of modern healthcare. A single blood donation can help multiple people in need. Blood transfusions are crucial for treating a wide range of medical conditions, including: •	Cancer treatment •	Accidents and trauma •	Childbirth complications •	Blood disorders like thalassemia By promoting a culture of voluntary blood donation, World Blood Donor Day strives to ensure everyone has access to this life-saving gift when needed.', '2024-06-07 18:00:50', '2024-06-07 18:00:50', NULL, '#000000', 'https://shorturl.at/fkH59', 'YgYaqVg7UFCUQMzCpMIZWWFi47DBJBPbcwqMh6OM.pdf', NULL),
(15, 'World Wind Day  (વિશ્વ પવન દિવસ)', 'vJoDGUjJZDOadgrY1D678qvQ5QSoIlDwCRnK71Ch.jpg', '2024-06-15 12:00:00', '2024-06-15 12:00:00', 'Will be happy to provide information about World Air Day. World Wind Day is celebrated every year on 15 June. This is an occasion when we especially focus on air pollution and other environmental issues to promote the importance of the environment. This day provides us an opportunity to understand the importance of our natural resources, especially air. Various programs and awareness campaigns are organized on this day including planting of tree.', '2024-06-07 18:02:40', '2024-06-07 18:02:40', NULL, '#000000', 'https://shorturl.at/pzLR2', 'EUErdInIJq3dxyYQlNciK00GuVfvsHzTXLgDoYX4.pdf', NULL),
(16, 'Fresh Veggies Day  (તાજા શાકભાજીનો દિવસ)', 'aAZDDn6kL13cKgdDr5xNLunkYMrWdTyRGQygd0t3.jpg', '2024-06-16 12:03:00', '2024-06-16 12:00:00', 'Fresh Veggies Day is observed on June 16th to encourage people to increase their daily intake of fresh produce. Nutritionists agree that the average person doesn\'t consume enough fresh vegetables. In fact, just 1 in 10 adults in the United States meets the federal fruit or vegetable recommendations. Adults should eat at least 1½ to 2 cups of fruit and 2 to 3 cups per day of vegetables per day. Fruits and vegetables are packed with minerals, vitamins, and fiber, which reduce the risk of diabetes, cancers, obesity, and heart disease, some of the top 10 leading causes of death in the country.', '2024-06-07 18:05:43', '2024-06-07 18:05:43', NULL, '#000000', 'https://shorturl.at/fkH59', 'DAwXtGkeJslwLP6tofoKQYgTGBOCARO42Ay2ZTqv.pdf', NULL),
(17, 'International Picnic Day  (આંતરરાષ્ટ્રીય પિકનિક દિવસ)', 'tzGT9Os2BS5TR2n7FYJbHJ7qblUaMwdejBMQ2EsD.jpg', '2024-06-18 12:00:00', '2024-06-18 12:00:00', 'International Picnic Day is on June 18, and we’re using our time to celebrate easily with a picnic! Picnics have been a staple of most cultures for years and, believe it or not, their popularity can be traced directly to the French Revolution. Our definitions of a picnic might be different, but it’s a great way to bring people together for an enjoyable day. HISTORY OF INTERNATIONAL PICNIC DAY For many across the world, picnics are a relaxing change of pace from their daily lives. However, the picnic as we know it today didn’t exist until the French Revolution, as public parks finally became available en masse. Although the French are credited with the creation of modern picnics, globalization and individual cultures are responsible for their grand popularity. In 2018, 55% of young Americans said having a picnic was their favourite warm-weather activity.', '2024-06-07 18:08:11', '2024-06-07 18:08:11', NULL, '#000000', 'https://shorturl.at/pzLR2', '1WvTcYAboMSvCQqLvnOe2p0LFUEKu6kPmMcFENt3.pdf', NULL),
(18, 'National Watch Day  (નેશનલ વોચ ડે)', 'bMbTKnZYo58miLkgMxGRYTM0JZi0yl5fPoFAEorT.jpg', '2024-06-19 12:00:00', '2024-06-19 12:00:00', 'Since the 16th century, when the watch was invented in Europe, people have been able to travel, keep appointments and do all sorts of activities all while staying on time. Watches began as a timepiece that a person would keep in their pockets, and men’s vests were even designed with a special pocket just for this purpose. By the mid 19th century, the watch was first attached to a leather strap that would allow it to be worn on the wrist, which was both ornamental as well as functional. From this time, the making of watches would continue to evolve, offering more precision, better time-keeping and a variety of functions. By the early 20th century, water-resistant watches were invented and, within a few decades, the digital and computer watch was revealed. National Watch Day was first established in 2017 by the high end department store mogul, Nordstrom. This American luxury retail chain founded the day with the purpose of showing some attention to the fascinating history and design of the craft of watch making. And, of course, since Nordstrom sells watches, it also makes sense that they would be working toward promoting the usefulness and beauty of watches that they hope their customers will buy. So get on board with learning more about and celebrating this little piece of timeless technology that has been an amazingly useful tool for centuries. Because it’s time for National Watch Day!', '2024-06-07 18:10:50', '2024-06-07 18:10:50', NULL, '#000000', 'https://shorturl.at/fkH59', 'QpUEcvtCwJuuceFdPSDdaHk1lWtKfEVyyVHWwvvT.pdf', NULL),
(19, 'International Tennis Day  (આંતરરાષ્ટ્રીય ટેનિસ દિવસ)', 'd7EHTPNWfJXGcqaev3kg1qDLAQfU9XPnw7qAa0U3.jpg', '2024-06-20 12:00:00', '2024-06-20 12:00:00', 'International Tennis Day is situated on June 20 as it corresponds with the anniversary of the day that the first Tennis Court Oath was taken in 1789. This occurred in France near the Palace of Versailles and acted as a pivotal historical moment for the French Revolution. An inspiration behind the day continues to be the most famous painting of a tennis court, “Le Serment de Jeu de Paume”, which was created by Jacques-Louis David in 1791.', '2024-06-07 18:13:20', '2024-06-07 18:13:20', NULL, '#000000', 'https://shorturl.at/pzLR2', '6yBm2ihGzhl8FDUnG8LTLkvFRvDEaBqHJ5HpsUyw.pdf', NULL),
(20, 'International Yoga Day  (આંતરરાષ્ટ્રીય યોગ દિવસ)', 'ld9Z2qnfKp8f76K3SitckRciDbUCUB3wHs8w02zv.jpg', '2024-06-21 12:00:00', '2024-06-21 12:00:00', 'Yoga is an ancient physical, mental and spiritual practice that originated in India. The word ‘yoga’ derives from Sanskrit and means to join or to unite, symbolizing the union of body and consciousness. Today it is practiced in various forms around the world and continues to grow in popularity. Recognizing its universal appeal, on 11 December 2014, the United Nations proclaimed 21 June as the International Day of Yoga by resolution 69/131. The International Day of Yoga aims to raise awareness worldwide of the many benefits of practicing yoga.  “Yoga is an invaluable gift from our ancient tradition. Yoga embodies unity of mind and body, thought and action ... a holistic approach [that] is valuable to our health and our well-being. Yoga is not just about exercise; it is a way to discover the sense of oneness with yourself, the world and the nature.”', '2024-06-07 18:15:50', '2024-06-07 18:15:50', NULL, '#000000', 'https://shorturl.at/fkH59', 'PyKPDe6tgSP6DmcQVUbJEwJt1XbqrHOK8NXNS4Ib.pdf', NULL),
(22, 'World Rainforest Day  (વિશ્વ વરસાદી વન દિવસ)', 'sSPV4g2E9OxEzDCKqnFgZ4KC65TTtI0Vp8AVIlfo.jpg', '2024-06-22 12:00:00', '2024-06-22 12:22:00', 'World Rainforest Day, observed annually on June 22nd, aims to raise awareness about the crucial role rainforests play in sustaining life on Earth and to promote efforts for their conservation. Rainforests are biodiverse ecosystems that provide habitat for millions of species of plants and animals, many of which are yet to be discovered. They also regulate the global climate by absorbing carbon dioxide and releasing oxygen. However, rainforests are under severe threat from deforestation, primarily driven by human activities such as logging, agriculture, and urbanization. World Rainforest Day encourages individuals, organizations, and governments to take action to protect and restore these vital ecosystems. Activities on this day include educational campaigns, tree planting events, fundraising drives for conservation projects, and advocating for sustainable practices to ensure the preservation of rainforests for future generations.', '2024-06-07 18:23:08', '2024-06-07 18:23:08', NULL, '#000000', 'https://shorturl.at/fkH59', 'FZruIVstUpR4dxhqCP7O0SYi1T0THIKbgdvKyICL.pdf', NULL),
(24, 'Public service day  (જાહેર સેવા દિવસ)', '3bUP2vkO4sAINsxgLomGHzbGvp2q0vTWazR371St.jpg', '2024-06-23 12:00:00', '2024-06-23 12:00:00', 'Public Service Day serves as a vital reminder of the critical role played by public servants in enhancing the well-being of society. It is a day dedicated to recognizing the contributions of those who work tirelessly to serve the public interest. Public servants, ranging from government officials to healthcare workers, educators, and law enforcement personnel, devote themselves to the betterment of their communities, often facing challenges and sacrifices along the way. This day not only celebrates their dedication but also underscores the importance of public service as a cornerstone of democracy and societal progress. It encourages citizens to appreciate and support the efforts of public servants while inspiring others to consider careers in service to their communities.    Moreover, Public Service Day prompts reflection on how governance can be improved to better serve the needs of all citizens, fostering a culture of accountability, transparency, and responsiveness in public institutions.  In essence, it serves as a rallying point for collective action towards building more inclusive, equitable, and resilient societies.', '2024-06-07 18:29:28', '2024-06-07 18:29:28', NULL, '#000000', 'https://shorturl.at/pzLR2', '22c8qZ7KetVxnQVFgjaZLG0Bu00Y4palTQvNMjGh.pdf', NULL),
(25, 'World UFO Day  (વિશ્વ યુએફઓ દિવસ)', 'TFT4iLJvpRTnnIEk64QIN8ey26gumAf53SDH00QS.jpg', '2024-06-24 12:00:00', '2024-06-24 12:59:00', 'All around the world, unusual lights in the sky or strange occurrences keep humans always curious about otherworldly beings. Movies and television series keep our imaginations alive, as well. It\'s no surprise conspiracy theories are also prominent when it comes to UFOs. World UFO Day recognizes our curiosity about life from another dimension. Before 1947, written record of humans sighting unusual, but unexplained objects in the sky existed. However, after the Arnold and Roswell incidents, reports increased dramatically. As a result, the investigations of these unusual sightings drew ratings on a scale. Astronomer Josef Allen Hynick began studying the sightings and eventually wrote several books about his UFO research. In fact, Hynek would create The Hynick Scale, which would rank sightings by proximity, from Nocturnal Lights to Close Encounters of the Third Kind. During the 20th century, the world\'s fascination with objects in the sky definitely increased. Before the 1947 sightings, H.G. Wells published a story that later became a radio play. Its broadcast across the airwaves had some frightening results! The War of the Worlds, published in 1898 and later broadcast by CBS radio in 1938 made many of the radio audience believe they were under attack by Martians. Narrated by Orson Welles, the drama stirred imaginations.', '2024-06-07 18:31:37', '2024-06-07 18:31:37', NULL, '#000000', 'https://shorturl.at/fkH59', 'nTzKt9C7oBJBJtRaCxIa383ZlFplEq8LoKzihhXG.pdf', NULL),
(26, 'NATIONAL EMERGENCY IN INDIA   (ભારતમાં રાષ્ટ્રીય કટોકટી)', 'NwZDlQ265XNmRdmanJZxumPVgnTQHoGBiaftsDK9.jpg', '2024-06-25 12:59:00', '2024-06-25 12:00:00', 'The emergency in india was a 21- month period from 1975 to 1977 when prime mimister indira Gandhi had a state of emergency declared across the country .On the advice of Prime Minister Indira Gandhi, President Fakhruddin Ali Ahmed proclaimed a state of national emergency on 25 June 1975. National emergency declared in June 1975 had a great Impact of National Emergency such as the Fundamental Rights of the citizens were suspended, it led to the censorship of Press, it restricted the freedom of speech & expressions, it led to misuse of Preventive Detention and arrest of leaders of the opposition and.  Three types of emergencies are addressed in the Constitution of India: Nation Emergency, State Emergency, and Financial Emergency. Article 352 of Part XVIII of the Constitution includes the national emergencies, Article 356 enlists the state emergencies, and Article 360 incorporates the financial emergencies.', '2024-06-07 18:34:03', '2024-06-07 18:34:03', NULL, '#000000', 'https://shorturl.at/pzLR2', 'DqDDUKRxXvzLkgeWDOvQUEqmCqs4lXXuk1UsLB5j.pdf', NULL),
(27, 'World Drug Day  (વિશ્વ ડ્રગ્સ ડે)', 'yeEwK20mrFmASJst9jeU3O6Qd9wZbnXIMqE3l0jf.jpg', '2024-06-26 12:00:00', '2024-06-26 12:00:00', 'The World Drug Day or  International Day against Drug Abuse and Illicit Trafficking is observed on June 26 every year to strengthen action and cooperation in achieving a world free of drug abuse. The campaign also aims to combat stigma and discrimination against people who use drugs by promoting language and attitudes that are respectful and non-judgmental, said the UNODC. The UNODC recognizes the importance of taking a people-centred approach to drug policies, with a focus on human rights, compassion, and evidence-based practices. The world drug problem and illicit trafficking are complex issues that affects millions of people worldwide. These issues continue to pose a significant threat to individuals, families and societies worldwide.', '2024-06-07 18:35:39', '2024-06-07 18:35:39', NULL, '#000000', 'https://shorturl.at/pzLR2', 'njpa6BLeq3aygmKIYkBtGTu3PNfpfBkVhgIOdWJR.pdf', NULL),
(28, 'NATIONAL HIV TESTING DAY (રાષ્ટ્રીય HIV પરીક્ષણ દિવસ)', 'lUNSd1WH8694PTLRCJBNbOpHSpExdMIEexfvCAcc.jpg', '2024-06-27 12:00:00', '2024-06-27 12:00:00', 'National HIV Testing Day (NHTD) was first observed on June 27, 1995. This is a day to encourage people to get tested for HIV, know their status, and get linked to care and treatment. The theme for 2023, “Take the Test & Take the Next Step” emphasizes that knowing your HIV status helps you choose options to stay healthy. HIV testing, including self-testing, is the pathway to engaging people in care to keep them healthy, regardless of their test result. People who receive a negative test result can take advantage of HIV prevention tools such as pre-exposure prophylaxis (Prep), condoms, and other sexual health services such as vaccines and testing for sexually transmitted infections. People who receive a positive test result can rapidly start HIV treatment •	Take the Test & Take the Next Step: No matter how you test, no matter your test results, take the next step. •	Take the Test & Take the Next Step:  Check your status and know. Take the steps to be good to go. •	Take the Test & Take the Next Step: Testing – critical to ending the HIV epidemic in the U.S.!', '2024-06-07 18:38:10', '2024-06-07 18:38:10', NULL, '#000000', 'https://shorturl.at/fkH59', '2e7Op5xCpXojA76kYAtGN49QkO6Vj5PdyeETENoF.pdf', NULL),
(29, 'National Insurance Awareness Day  (રાષ્ટ્રીય વીમા જાગૃતિ દિવસ)', 'ID2ZmJYQosgNiOocBMkwoDUwU8RqlmXkX7Kiwfjd.jpg', '2024-06-28 12:00:00', '2024-06-28 12:00:00', 'No matter where we live, replacing everything we own would be difficult if disaster struck. From the first-time apartment to the 30-year mortgage, our possessions, property, loved ones and even those who visit deserve the protection the comes with homeowners or renters policy.', '2024-06-07 18:40:10', '2024-06-07 18:40:10', NULL, '#000000', 'https://shorturl.at/fkH59', NULL, NULL),
(30, 'NATIONAL CAMERA DAY  (રાષ્ટ્રીય કેમેરા દિવસ)', 'gYeisfCy2rHlrCBKRpUFy3dXgdZB9cCBAgSryAfh.jpg', '2024-06-29 12:00:00', '2024-06-29 12:00:00', 'Everything comes into focus on June 29th each year when we recognize National Camera Day. The day commemorates photographs, the camera, and their invention. A camera is an irreplaceable tool used to record and replicate memories, events, and people/places. Before the invention of the camera, the only resource to document a vision was a painting. Capturing an image of a person or place in a drawing took time and skill. Very few people can perfectly draw the likeness of someone, let alone capture the essence of an event.  The power of a camera provided many with a simple, inexpensive, and fast solution. George Eastman, also known as \"The Father of Photography,\" brought the camera to the masses. While he did not invent the camera, he did develop many additions improving the use, ease, and production of the camera. His developments made the camera widely available to homes around the world.', '2024-06-07 18:42:11', '2024-06-07 18:42:11', NULL, '#000000', 'https://shorturl.at/pzLR2', 'yAk7UtqDnJWHTReskRx06MMQLqa8zD4XZzJOJXaL.pdf', NULL),
(31, 'International Asteroid Day  (આંતરરાષ્ટ્રીય એસ્ટરોઇડ દિવસ)', 'Fgh5CaSpZrPlrU1RFknVbwKeE7ntqt4yMPm2pBpv.jpg', '2024-06-30 12:00:00', '2024-06-30 12:00:00', 'On June 30, International Asteroid Day will have everyone looking toward the skies. The holiday was founded after the 2014 release of the film 51 Degrees North, which explores what would happen if an asteroid were to strike London. The film’s creative team (many of whom are scientists) wanted to raise more awareness about the threat of asteroids to earth, and how we can help protect ourselves. To make that happen, they formed a foundation, and in 2015, they celebrated the world’s first International Asteroid Day. There are over one million asteroids in space that could potentially strike the earth, but modern scientists have only discovered about one percent of them. To combat this, Asteroid Day’s founders, as well as a host of accomplished scientists, created the 100X Asteroid Declaration. The declaration aims for scientists to work to increase the rate of asteroid discovery to 100,000 per year within a decade. International Asteroid Day focuses on spreading the word of the declaration and helping fellow Earthlings prepare for a potential asteroid impact.', '2024-06-07 18:44:33', '2024-07-12 12:44:08', NULL, '#000000', 'https://shorturl.at/fkH59', 'Qv3wzVlLJPpCC1cxM5YQrDZwvuxgyUDXj9spKrZe.pdf', 'false'),
(32, 'RAKSHABANDHAN   (રક્ષાબધન)', 'FId00X7qZ1gGnut4sGG8MxyNl5WWOtulrTK2ND8l.jpg', '2024-08-19 12:00:00', '2024-08-19 12:00:00', 'Raksha Bandhan, also Rakshabandhan, or simply Rakhi, is an Indian and Nepalese festival centred around the tying of a thread, bracelet or talisman on the wrist as a form of bond and ritual protection. The festive Hindu and Jain ritual is one principally between brothers and sisters.', '2024-06-07 18:49:06', '2024-07-12 12:56:02', NULL, '#FF0000', 'https://shorturl.at/pzLR2', 't16DLLa8mNPSw4gVWWPVMfVBwGaa1A7OOeBzSEJ9.pdf', 'true'),
(34, 'Annual Function', 'FSOk3MCJtCBhKevohSQhmuQGXY3Z15D9dTSOGBer.png', '2024-06-15 16:17:00', '2024-06-16 16:17:00', 'Annual function in school', '2024-06-12 16:17:40', '2024-06-12 16:17:40', 6, '#000000', 'https://shorturl.at/mwB89', '5miYsmdc4LVRVDrKPVaiI0jRkUhVG8or3ta8L3iD.pdf', NULL),
(36, 'NATIONAL DOCTOR’S DAY(રાષ્ટ્રીય દાક્તર દિવસ)', NULL, '2024-07-01 09:53:00', '2024-07-01 09:53:00', 'National Doctors\' Day is a day celebrated to recognize the contributions of physicians to individual lives and communities.', '2024-07-07 09:54:56', '2024-07-13 11:44:14', NULL, '#000000', 'https://vimeo.com/983530876', 'K2PdlZbxLGlTeQol6pDVC2ZrioGBhRGMoC81K6hf.pdf', 'true'),
(37, 'World Sports Journalist Day(વર્લ્ડ સ્પોર્ટ્સ જર્નાલિસ્ટ ડે)', NULL, '2024-07-02 10:15:00', '2024-07-02 10:15:00', 'Every year, World Sports Journalist Day is observed on July 2nd globally.', '2024-07-07 10:16:04', '2024-07-14 05:47:15', NULL, '#000000', 'https://vimeo.com/983532401', 'Vx383KAgOmqSPwBvgySAwmkOLIlumkMAh3kf3KcI.pdf', 'true'),
(39, 'International Plastic Bag Free Day(આંતરરાષ્ટ્રીય પ્લાસ્ટિક મુક્ત દિવસ)', NULL, '2024-07-03 10:16:00', '2024-07-03 10:17:00', 'July 3, International Plastic Bag Free Day is celebrated to spread awareness regarding how costly plastic bags can be in terms of environmental health.', '2024-07-07 10:17:38', '2024-07-14 05:46:55', NULL, '#000000', 'https://vimeo.com/983532685', 'rlF8CpA981kALoiRSDEnpLQT2h8mtCxLXodhnbd0.pdf', 'true'),
(40, 'World Lung Cancer Day (વિશ્વ ફેફસા કેન્સર દિવસ)', NULL, '2024-08-01 10:17:00', '2024-08-01 10:17:00', 'World Lung Cancer Day is observed on August 1 each year.', '2024-07-07 10:19:03', '2024-07-07 10:19:03', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(41, 'Jackfruit Day (જેકફ્રૂટ ડે)', NULL, '2024-07-04 10:19:00', '2024-07-04 10:19:00', 'Jackfruit Day is a special celebration that takes place on July 4th each year. It’s a day dedicated to the jackfruit, a unique and versatile fruit known for its large size and sweet flavor.', '2024-07-07 10:19:51', '2024-07-14 05:47:42', NULL, '#000000', 'https://vimeo.com/983532935', 'uNtId2178kSfsAHHbwxvpMGSBwB5tJtMpN8FVYIA.pdf', 'true'),
(43, 'World Zoonoses Day  (વિશ્વ ઝૂનોસિસ દિવસ)', NULL, '2024-07-06 10:21:00', '2024-07-06 10:21:00', 'World Zoonoses Day is celebrated every July 6, globally.', '2024-07-07 10:22:09', '2024-07-14 11:43:54', NULL, '#000000', 'https://vimeo.com/983531271', 'iMdqCeRZwvItR8s1zP362v5UjM1Ck7jqwhA4JGTc.pdf', 'true'),
(44, 'WORLD WIDE WEB DAY (વર્લ્ડ વાઈડ વેબ ડે)', NULL, '2024-08-01 10:20:00', '2024-08-01 10:20:00', 'World Wide Web Day is celebrated on August 1 every year', '2024-07-07 10:24:30', '2024-07-07 10:24:30', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(45, 'Global Forgiveness Day (વૈશ્વિક ક્ષમા દિવસ)', NULL, '2024-07-07 10:25:00', '2024-07-07 10:25:00', 'Global Forgiveness Day was established to create goodwill among people and allow them to stop carrying around so much guilt and pain in their lives.', '2024-07-07 10:25:55', '2024-07-13 10:13:43', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'j7UyhlXO68qz8yrSW0OnkJWo1qb7H2rLosDFmxZE.pdf', 'true'),
(46, 'Hiroshima Day (હિરોશિમા દિવસ)', NULL, '2024-08-06 10:24:00', '2024-08-06 10:25:00', 'Hiroshima Day is observed on 6 August every year', '2024-07-07 10:26:03', '2024-07-07 10:26:03', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(47, 'NATIONAL HANDLOOM DAY (રાષ્ટ્રીય હેન્ડલૂમ દિવસ)', NULL, '2024-08-07 10:26:00', '2024-08-07 10:26:00', 'Every year on August 7th, India observes National Handloom Day as a special tribute to the skilled handloom weavers and their vital contribution to both the economy and cultural heritage of the nation.', '2024-07-07 10:27:46', '2024-07-07 10:27:46', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(48, 'WORLD CHOCOLATE DAY (વિશ્વ ચોકલેટ દિવસ)', NULL, '2024-07-07 10:26:00', '2024-07-07 10:27:00', 'Established in 2009, World Chocolate Day marks the supposed anniversary of the day that this iconic dessert made its first entrance into Europe in 1550.', '2024-07-07 10:27:48', '2024-07-13 10:14:08', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'XpBe5aqFJvPXrbFI5HqqdLZGePwCpgvwNl49hP2f.pdf', 'true'),
(49, 'National Javelin Day (રાષ્ટ્રીય જેવલિન દિવસ)', NULL, '2024-08-07 10:28:00', '2024-08-07 10:28:00', 'On August 7th, a significant moment in the history of Indian athletics was celebrated as the Athletics Federation of India officially designated it as National Javelin Day', '2024-07-07 10:29:17', '2024-07-07 10:29:17', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'false'),
(50, 'GLOBAL ENERGY INDEPENDENCE DAY (વૈશ્વિક ઉર્જા સ્વતંત્રતા દિવસ)', NULL, '2024-07-10 10:29:00', '2024-07-10 10:29:00', 'In 2006, Michael D. Antonovich proclaimed July 10th as Global Energy Independence Day.', '2024-07-07 10:29:48', '2024-07-14 05:46:32', NULL, '#000000', 'https://vimeo.com/983533772', 'f12woMahw72CIcM69Qt8IWyFEbXU94OTnSuIymWt.pdf', 'true'),
(51, 'Quit India Movement Day  (ભારત છોડો આંદોલન દિવસ)', NULL, '2024-08-09 10:29:00', '2024-08-09 10:29:00', 'On August 8, 1942, the All-India Congress Committee (AICC) passed the Quit India Resolution at its session in Bombay, demanding an immediate end to British rule in India.', '2024-07-07 10:30:34', '2024-07-07 10:30:34', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'false'),
(52, 'NATIONAL FISH FARMER’S DAY  (રાષ્ટ્રીય માછલી ખેડૂત દિવસ)', NULL, '2024-07-10 10:30:00', '2024-07-10 10:30:00', 'The day is observed in memory of scientists Dr. K. H. Alikunhi and Dr. H. L. Chaudhury who, on July 10, 1957, introduced Hypophysation, a technique for inducing reproduction in Indian Major Carps.', '2024-07-07 10:31:06', '2024-07-14 05:45:30', NULL, '#000000', 'https://vimeo.com/983534184', 'yjAU82XRPetygxQsLBdObu5460abiYU5jDoTLc7f.pdf', 'true'),
(53, 'World Indigenous Peoples Day  વિશ્વના આદિવાસી લોકોનો આંતરરાષ્ટ્રીય દિવસ', NULL, '2024-08-09 10:31:00', '2024-08-09 10:31:00', 'INTERNATIONAL DAY OF THE WORLD’S INDIGENOUS PEOPLES 2023: The International Day of the World’s Indigenous Peoples is celebrated annually on 9 August.', '2024-07-07 10:31:48', '2024-07-07 10:31:48', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(54, 'World Population Day (વિશ્વ વસ્તી દિવસ)', NULL, '2024-07-11 10:31:00', '2024-07-11 10:31:00', 'World Population Day, observed on July 11 each year, seeks to raise awareness about global population issues.', '2024-07-07 10:32:16', '2024-07-23 09:14:50', NULL, '#000000', 'https://vimeo.com/983534605', 'AmAUc9k1sUjgAO69QqFNGZdmg3iI299nCSjwwhcj.pdf', 'true'),
(55, 'WORLD BIOFUEL DAY (વિશ્વ બાયોફ્યુઅલ દિવસ)', NULL, '2024-08-10 10:31:00', '2024-08-10 10:31:00', 'o	World Biofuel Day is celebrated on an annual basis on the 10th of August.', '2024-07-07 10:33:00', '2024-07-07 10:33:00', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'false'),
(56, 'National Youth Skill Day (રાષ્ટ્રીય ભારતીય યુવા કૌશલ્ય દિવસ)', NULL, '2024-07-15 10:32:00', '2024-07-15 10:32:00', 'National Youth Skill Day, also known as World Youth Skills Day, is observed annually on July 15th.', '2024-07-07 10:33:56', '2024-07-14 05:44:57', NULL, '#000000', 'https://vimeo.com/983535154', 'Su6BhEsPci5ZFMrpMGRwZT1bilzVlsE3MiC7XWh3.pdf', 'true'),
(57, 'World Lion Day (વિશ્વ સિંહ દિવસ)', NULL, '2024-08-10 10:33:00', '2024-08-10 10:33:00', 'Each year, on August 10th, people around the world come together to celebrate World Lion Day.', '2024-07-07 10:35:35', '2024-07-07 10:35:35', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(58, 'World Steelpan Day’s (વિશ્વ સ્ટીલપાન દિવસ)', NULL, '2024-08-11 10:36:00', '2024-08-11 10:36:00', 'World Steelpan Day, celebrated annually on August 11th, honors the cultural and historical significance of the steelpan, a musical instrument originating from Trinidad and Tobago.', '2024-07-07 10:37:06', '2024-07-07 10:37:06', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(59, 'World Day for International Justice (આંતરરાષ્ટ્રીય ન્યાયને પ્રોત્સાહન)', NULL, '2024-07-17 10:36:00', '2024-07-17 10:36:00', 'World Day for International Justice, also known as International Justice Day, is observed on July 17 each year.', '2024-07-07 10:37:21', '2024-07-14 05:49:03', NULL, '#000000', 'https://vimeo.com/983531837', 'ancu7vL14udGhZ4rGEIyXzSuO2t5RIakhvQyAvcO.pdf', 'true'),
(60, 'INTERNATIONAL YOUTH DAY  (આંતરરાષ્ટ્રીય યુવા દિવસ)', NULL, '2024-08-12 10:37:00', '2024-08-12 10:37:00', 'International Youth Day on August 12 focuses on the difficulties that some young people are experiencing throughout the world.', '2024-07-07 10:39:58', '2024-07-07 10:39:58', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(61, 'Nelsan Mandela Day  (નેલ્સન મંડેલા દિવસ)', NULL, '2024-07-18 10:37:00', '2024-07-18 10:38:00', 'International Nelson Mandela Day is celebrated annually on July 18th, the birthday of Nelson Mandela.', '2024-07-07 10:40:31', '2024-07-14 05:43:47', NULL, '#000000', 'https://vimeo.com/983535814', '3Sj2jSlipMkyVSCusfAYqFBCgGtkfLUMeK7bU4FS.pdf', 'true'),
(62, 'WORLD ELEPHANT DAY (વિશ્વ હાથી દિવસ)', NULL, '2024-08-12 10:40:00', '2024-08-12 10:40:00', 'The World Elephant Day was co-founded on August 12, 2012, by Patricia Sims from Canada and the Elephant Reintroduction Foundation of Thailand, an initiative of HM Queen Sirikit of Thailand.', '2024-07-07 10:41:27', '2024-07-07 10:41:27', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(63, 'National Football Day   (રાષ્ટ્રીય ફૂટબોલ દિવસ)', NULL, '2024-07-19 10:41:00', '2024-07-19 10:41:00', 'National Football Day   રાષ્ટ્રીય ફૂટબોલ દિવસ', '2024-07-07 10:41:37', '2024-07-14 05:43:17', NULL, '#000000', 'https://vimeo.com/983536071', 'mR9letfaFZnlkm26j0w23Vf08QqLXJU6GkE4TdGw.pdf', 'true'),
(64, 'International Left Handers Day (આંતરરાષ્ટ્રીય લેફ્ટ-હેન્ડર્સ ડે)', NULL, '2024-08-13 10:42:00', '2024-08-13 10:42:00', 'International Left Handers Day is an international day celebrated annually on August 13 to celebrate the uniqueness and differences of left-handed persons.', '2024-07-07 10:42:55', '2024-07-07 10:42:55', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'false'),
(65, 'International Chess Day (આંતરરાષ્ટ્રીય ચેસ દિવસ)', NULL, '2024-07-20 10:43:00', '2024-07-20 10:43:00', 'Teaches discipline and focus. Chess requires you to focus on the game and to stay  disciplined, even when things are not going your way.', '2024-07-07 10:43:51', '2024-07-13 16:35:13', NULL, '#000000', 'https://vimeo.com/983536192', 'AfPRhZxUw8g3H8zIl6Xyn6WMU6BCERDYBfcyBZNk.pdf', 'true'),
(66, 'World Organ Donation Day (વર્લ્ડ ઓર્ગન ડોનેશન ડે)', NULL, '2024-08-13 10:43:00', '2024-08-13 10:43:00', 'World Organ Donation Day is observed on August 13 every year around the world to raise awareness about the importance of organ donation and to make people aware of the misconceptions about organ donation.', '2024-07-07 10:44:26', '2024-07-07 10:44:26', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(67, 'Pakistan Independence Day  (પાકિસ્તાન સ્વતંત્રતા દિવસ )', NULL, '2024-08-14 10:45:00', '2024-08-14 10:45:00', 'After almost 200 years of living under the rule of the British Indian Empire, the years following World War I and then World War II paved the way for the Muslims living in India to separate and become an independent state.', '2024-07-07 10:45:49', '2024-07-07 10:45:49', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', NULL, 'true'),
(68, 'National Junk Food Day (રાષ્ટ્રીય જંક ફૂડ દિવસ)', NULL, '2024-07-21 10:44:00', '2024-07-21 10:44:00', 'Have you ever wished for a day where you can eat absolutely anything you want? Well that day is today.', '2024-07-07 10:46:04', '2024-07-14 05:41:26', NULL, '#000000', 'https://vimeo.com/983536436', 'DUiTQdhSoIHPRTwoa6EFgoUOoqqgo5DnC42aQTf9.pdf', 'true'),
(69, 'INDIAN NATIONAL FLAG ADOPTION DAY (ભારતીય રાષ્ટ્રીય ધ્વજ અપનાવવાનો દિવસ)', NULL, '2024-07-22 10:46:00', '2024-07-22 10:46:00', 'The Indian National Flag, designed by Pingali Venkayya, was first adopted by the Indian Constitution Assembly in a meeting on 22nd of July in the year 1947 that’s why it is being celebrated every year since 1947 all over the India by the title “Indian National Flag Adoption Day” on 22nd of July.', '2024-07-07 10:48:44', '2024-07-13 16:34:28', NULL, '#000000', 'https://vimeo.com/983536606', 'taJTkksTWjshALzbopcDEZXLrss5lf1k6HidPhAj.pdf', 'true'),
(70, 'National Aviation Day (રાષ્ટ્રીય ઉડ્ડયન દિવસ)', NULL, '2024-08-19 10:47:00', '2024-08-19 10:47:00', 'The National Aviation Day is a United Sates national observation that celebrates the development of aviation.', '2024-07-07 10:48:45', '2024-07-07 10:48:45', NULL, '#000000', 'https://shorturl.at/oIc8c', NULL, 'true'),
(71, 'World Sjogren”s Day  (વિશ્વ સેજોગ્રેન દિવસ)', NULL, '2024-07-23 10:49:00', '2024-07-23 10:49:00', 'It is marked every year on july 23rd, the birthday of Dr. Henrik Sjögren, the Swedish ophthalmologist who discovered Sjögren\'s.', '2024-07-07 10:50:46', '2024-07-14 05:42:58', NULL, '#000000', 'https://vimeo.com/983537106', 'n98WUUjM19oILFMFVANSTUtF6KeL4a0JayzL3GOW.pdf', 'true'),
(72, 'World Photography Day (વિશ્વ ફોટોગ્રાફી દિવસ)', NULL, '2024-08-19 10:49:00', '2024-08-19 10:49:00', 'The soft click of the camera, a flash of light and a moment in time is captured forever. Maybe digitally, maybe on film, the medium is never as important as the memory or moment caught', '2024-07-07 10:51:08', '2024-07-07 10:51:08', NULL, '#000000', 'http://tiny.cc/q5zqyz', NULL, 'true'),
(73, 'India’s Income tax day (ભારતનો આવકવેરા દિવસ)', NULL, '2024-07-24 10:51:00', '2024-07-24 10:51:00', 'The Income Tax Department (also referred to as IT Department; abbreviated as ITD) is a government agency undertaking direct tax collection of the government of India.', '2024-07-07 10:52:26', '2024-07-14 05:42:15', NULL, '#000000', 'https://vimeo.com/983537342', 'H0lbitmjf7zti53gifieBmTLeKeYHOrPqlGbFEVK.pdf', 'true'),
(74, 'Sadbhavana Diwas   (સદભાવના દિવસ)', NULL, '2024-08-20 10:51:00', '2024-08-20 10:51:00', 'Former Prime Minister Rajiv Gandhi, whose birth anniversary is celebrated as Sadbhavana Diwas, was not only a prominent political figure but also a champion of unity and communal harmony.', '2024-07-07 10:52:52', '2024-07-07 10:52:52', NULL, '#000000', 'https://shorturl.at/4y3GA', NULL, 'false'),
(75, 'World Senior Citizen\'s Day વિશ્વ વરિષ્ઠ નાગરિક દિવસ', NULL, '2024-08-21 10:53:00', '2024-08-21 10:53:00', 'The World Senior Citizen\'s Day is celebrated on 21 August each year. The celebration took place for the first time in 1991.', '2024-07-07 10:54:18', '2024-07-07 10:54:18', NULL, '#000000', 'https://shorturl.at/W0QA7', NULL, 'false'),
(76, 'NATIONAL TOOTH FAIRY DAY( નેશનલ ટૂથ ફેરી ડે)', NULL, '2024-08-22 10:55:00', '2024-08-22 10:55:00', 'National Tooth Fairy Day is celebrated twice a year, on February 28th and August 22nd. It\'s a fun day that honors the Tooth Fairy, a magical figure who visits children when they lose a tooth.', '2024-07-07 10:56:24', '2024-07-07 10:56:24', NULL, '#000000', 'https://shorturl.at/tzpCT', NULL, 'true'),
(77, 'INDIA GETS ITS FIRST FEMALE PRESIDENT  (ભારતને તેની પ્રથમ મહિલા રાષ્ટ્રપતિ મળી)', NULL, '2024-07-25 10:54:00', '2024-07-25 10:54:00', 'Pratibha Devisingh Patil took oath as India’s first woman President on July 25, 2007. She is the 12th President of India.', '2024-07-07 10:56:33', '2024-07-14 05:41:48', NULL, '#000000', 'https://vimeo.com/983537713', 'L4FyO46TBBq935kWWPiCfh7KJaLcxEXaXZ6yiPsl.pdf', 'true'),
(78, 'International Strange Music Day (આંતરરાષ્ટ્રીય વિચિત્ર સંગીત દિવસ)', NULL, '2024-08-24 10:57:00', '2024-08-24 10:57:00', 'International Strange Music Day was created by Patrick Grant, who was a New York City musician and composer at the time.', '2024-07-07 10:58:03', '2024-07-07 10:58:03', NULL, '#000000', 'https://shorturl.at/fFZkl', NULL, 'true');
INSERT INTO `events` (`id`, `event_title`, `event_image`, `start_date`, `end_date`, `short_Description`, `created_at`, `updated_at`, `school_id`, `color`, `event_video`, `event_pdf`, `repeated`) VALUES
(79, 'Kargil Vijay Diwas  (કારગિલ વિજય દિવસ)', NULL, '2024-07-26 10:57:00', '2024-07-26 10:57:00', 'Kargil Vijay Diwas is commemorated in India to honour the sacrifices made by the soldiers of the Indian Army during the Kargil War in 1999.', '2024-07-07 10:58:32', '2024-07-13 16:34:54', NULL, '#000000', 'https://vimeo.com/983537870', 'oI3M7X18ZOJ8Ovz5Chj1xxyhXDvNfmDyM8PMcpx9.pdf', 'true'),
(80, 'INDIANIZATION OF INDIAN ARMY (ભારતીય સેનાનું ભારતીયકર)', NULL, '2024-08-24 10:58:00', '2024-08-24 10:58:00', 'A significant event took place on August 25, 1917, when seven Indian army personnel were honored with the King’s Commission.', '2024-07-07 10:59:21', '2024-07-07 10:59:21', NULL, '#000000', 'https://shorturl.at/LMUOb', NULL, 'true'),
(81, 'World Nature Conservation Day (વિશ્વ પ્રકૃતિ સંરક્ષણ દિવસ)', NULL, '2024-07-28 10:59:00', '2024-07-28 10:59:00', 'World Nature Conservation Day is recognized annually on 28 July.', '2024-07-07 10:59:56', '2024-07-13 16:33:28', NULL, '#000000', 'https://vimeo.com/983538123', 'zQTZYBTklclBEvUUYvQp7BzZfts02V8l1VO7Kcc8.pdf', 'true'),
(83, 'Women\'s Equality Day  (મહિલા સમાનતા દિવસ)', NULL, '2024-08-26 10:59:00', '2024-08-26 11:00:00', 'Women\'s Equality Day is celebrated in the United States on August 26 to commemorate the 1920 adoption of the Nineteenth Amendment to the United States Constitution, which prohibits the states and the federal government from denying the right to vote to citizens of the United States on the basis of sex.', '2024-07-07 11:00:51', '2024-07-07 11:00:51', NULL, '#000000', 'https://shorturl.at/cSzso', NULL, 'true'),
(84, 'International Tiger Day (આંતરરાષ્ટ્રીય વાઘ દિવસ)', NULL, '2024-07-29 11:01:00', '2024-07-29 11:01:00', 'International Tiger Day has been created so that people around the world can raise awareness for tiger conservation.', '2024-07-07 11:02:03', '2024-07-14 05:49:50', NULL, '#000000', 'https://vimeo.com/983538429', 'azIyDVvPUZ4lfP6Fz5H4ZiE03ZEqlU4zmgte0RjD.pdf', 'true'),
(85, 'International Day against Nuclear Tests (આંતરરાષ્ટ્રીય પરમાણુ પરીક્ષણ દિવસ)', NULL, '2024-08-29 11:01:00', '2024-08-29 11:01:00', 'In December 2009, the United Nations General Assembly unanimously declared 29 August as the International Day against Nuclear Tests.', '2024-07-07 11:02:17', '2024-07-07 11:02:17', NULL, '#000000', 'https://shorturl.at/EooKz', NULL, 'true'),
(86, 'National Sports Day (રાષ્ટ્રીય રમત દિવસ)', NULL, '2024-08-29 11:02:00', '2024-08-29 11:02:00', 'Every year on August 29, India observes National Sports Day, commemorating the birthday of Major Dhyan Chand, an esteemed field hockey player considered one of the finest in history.', '2024-07-07 11:03:28', '2024-07-07 11:03:28', NULL, '#000000', 'https://shorturl.at/zQv0G', NULL, 'true'),
(87, 'International Day of Friendship (આંતરરાષ્ટ્રીય મિત્રતા દિવસ)', NULL, '2024-07-30 11:03:00', '2024-07-30 11:03:00', 'Friendship Day (also known as the International Friendship Day or Friend\'s Day) is a day in several countries for celebrating friendship.', '2024-07-07 11:04:10', '2024-07-13 10:31:38', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'vw6LzrchE6KTrw0ekbaI97wGwcyIuuzJySpAyNhr.pdf', 'true'),
(88, 'JAPAN SURRENDERED HONG KONG TO THE BRITISH (જાપાને હોંગકોંગને બ્રિટિશને સોંપી દીધું)', NULL, '2024-08-30 11:04:00', '2024-08-30 11:04:00', 'The Japanese occupation of Hong Kong ended in 1945, after Japan surrendered on 15 August 1945 At Government house.', '2024-07-07 11:04:50', '2024-07-07 11:04:50', NULL, '#000000', 'https://rb.gy/amhnop', NULL, 'true'),
(89, 'World Ranger Day (વિશ્વ રેન્જર દિવસ)', NULL, '2024-07-31 11:04:00', '2024-07-31 11:05:00', 'World ranger day, celebrated on July 31, serves as a special occasion to pay tribute and show gratitude to the courageous men and women who devote their lives to safeguarding wildlife and preserving our precious natural resources around the globe, park rangers are on the front line in the fight to protect our natural heritage.', '2024-07-07 11:06:05', '2024-07-13 10:32:11', NULL, '#000000', 'https://vhmacademy.com/SuperAdmin/create-Events', '2ivdQFu8ZwG9VZaelHLv9R1cPwqiY5oDco4UCK3I.pdf', 'true'),
(90, 'National Friendship Day (રાષ્ટ્રીય મિત્રતા દિવસ)', NULL, '2024-08-04 11:06:00', '2024-08-04 11:06:00', 'National Friendship Day happens every year on the first Sunday of August, this time on August 4, 2024.', '2024-07-07 11:07:10', '2024-07-07 11:07:10', NULL, '#000000', 'https://shorturl.at/RVHRR', NULL, 'true'),
(91, 'janmashtami   (જન્માષ્ટમી)', NULL, '2024-08-26 11:07:00', '2024-08-26 11:08:00', 'Janmashtami is observed on the eighth day of the Krishna Paksha in the Bhadra pad month of Shraavana and this year, it falls on August 26.', '2024-07-07 11:08:28', '2024-07-12 12:57:02', NULL, '#FF0000', 'https://shorturl.at/89WIA', NULL, 'true'),
(92, 'Kalki Jayanti   (કલ્કી જયંતિ)', NULL, '2024-08-10 11:08:00', '2024-08-10 11:08:00', 'Kalki Purana narrates about the Kalki incarnation of Lord Vishnu. It is said in Bhagavad Purana that he will appear in Sambhala village.', '2024-07-07 11:09:42', '2024-07-12 12:56:34', NULL, '#FF0000', 'https://shorturl.at/sYDSq', NULL, 'true'),
(93, 'GAURI VRAT  (ગૌરીવ્રત)', NULL, '2024-07-17 11:10:00', '2024-07-17 11:10:00', 'Gauri Vrat is also known as Molakat Vrat. This fast is celebrated for more than 5 days in the month of      Ashadha. Gauri Vrat begins on the Ekadashi tithi of Shukla Paksha and ends five days later on the day of Guru Purnima.', '2024-07-07 11:10:36', '2024-07-13 10:20:55', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'H1EWWO4RlOM59KUn9fTSu8E4huV3YTYYeYCfWyzL.pdf', 'true'),
(94, 'NAG PANCHAMI  (નાગ પંચમી)', NULL, '2024-08-23 11:10:00', '2024-08-23 11:10:00', 'Nag Panchami is considered an auspicious day to worship snakes.', '2024-07-07 11:10:59', '2024-07-12 12:57:38', NULL, '#FF0000', 'https://shorturl.at/vKyxM', NULL, 'true'),
(95, 'GURU PURNIMA (ગુરુપૂર્ણિમા)', NULL, '2024-07-21 11:12:00', '2024-07-21 11:12:00', 'The celebration of Guru Purnima is marked by spiritual activities and may include a ritualistic event, Guru puja, in honour of the guru or teacher. Gurus are believed by many to be the most necessary part of life.', '2024-07-07 11:13:16', '2024-07-13 10:25:08', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'dPPPKNDZr4t62oFOk4fxt9Iy2cG6r0uAxEHLIsVi.pdf', 'true'),
(96, 'Islamic New Year  (ઇસ્લામિક નવું વર્ષ)', NULL, '2024-07-07 11:14:00', '2024-07-07 11:14:00', 'The Islamic New Year (Arabic: رأس السنة الهجرية, Raʿs as-Sanah al-Hijrīyah), also called the Hijri New Year, is the day that marks the beginning of a new lunar Hijri year, and is the day on which the year count is incremented.', '2024-07-07 11:14:50', '2024-07-13 10:15:46', NULL, '#008000', 'https://vhmacademy.com/SuperAdmin/create-Events', '54lSfs3QNnqO0ulQoC2r1h5ZMsGlaQkfi6zV5BeZ.pdf', 'true'),
(99, 'JAYA PARVATI VRAT (જયા પાર્વતી વ્રત)', NULL, '2024-07-19 11:15:00', '2024-07-19 11:15:00', 'Jaya Parvati Vrat is considered very auspicious in Sanatan tradition. This fast starts from Shukla Paksha of Ashadh month. Which ends on the day of Tritiya of Krishna Paksha.', '2024-07-07 11:16:19', '2024-07-13 10:23:11', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'PHIhFeGLzNeaEK7wLVvlWrfM239bx1FnYNi6NJX2.pdf', 'true'),
(100, 'SHITALA SATAM (શીતળા સાતમ)', NULL, '2024-08-25 11:16:00', '2024-08-25 11:16:00', 'Shitala Satam is the day dedicated to Goddess Shitala', '2024-07-07 11:16:59', '2024-07-12 12:58:40', NULL, '#FF0000', 'https://shorturl.at/FcG7X', NULL, 'true'),
(101, 'KAMDA EKADSHI (કામદા એકાદશી)', NULL, '2024-07-31 11:17:00', '2024-07-31 11:17:00', 'Kamda Ekadashi is an important fasting day observed by Hindus, dedicated to Lord Vishnu.', '2024-07-07 11:18:06', '2024-07-13 10:33:01', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'uV2d2Ars4q6HxbcZ5yYoKKEIEf8GcxoSHrGkAwCE.pdf', 'true'),
(102, 'Tulsidas Jayanti  (તુલશીદાસ જયંતી)', NULL, '2024-08-11 11:17:00', '2024-08-11 11:17:00', 'Tulsidas Jayanti is an annual Hindu festival commemorating the birth anniversary of the poet-saint Goswami Tulsidas, best known for his epic \"Ramcharitmanas,\" which retells the story of Lord Rama in the Awadhi dialect of Hindi.', '2024-07-07 11:18:21', '2024-07-12 12:58:59', NULL, '#FF0000', 'https://shorturl.at/dd0t8', NULL, 'true'),
(103, 'World Sanskrit Day (વિશ્વ સંસ્કૃત દિવસ)', NULL, '2024-08-19 11:18:00', '2024-08-19 11:18:00', 'World Sanskrit Day, also known as Vishva-Samskrita Dinam is an annual event focused around the ancient Indian language Sanskrit', '2024-07-07 11:19:38', '2024-07-12 12:59:14', NULL, '#FF0000', 'https://shorturl.at/IRIgs', NULL, 'true'),
(104, 'KUTCHI HALARI NEW YEAR (કચ્છી નવું વર્ષ)', NULL, '2024-07-07 11:19:00', '2024-07-07 11:19:00', 'Kutchi New Year is observed on the second day of the shukla paksha or waxing phase of moon in Ashada month – Ashad Beej or Dwitiya.', '2024-07-07 11:20:48', '2024-07-13 10:16:15', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'wETB2meMEtD80AJDzNvWtiI7r14Z7yyO2Z1Uohtm.pdf', 'true'),
(105, 'MUHARRAM (મોહરમ)', NULL, '2024-07-17 11:24:00', '2024-07-17 11:24:00', 'Muharram (Arabic: ٱلْمُحَرَّم, romanized: al-Muḥarram) is the first month of the Islamic calendar, and one of the four sacred months of the year when warfare is banned.', '2024-07-07 11:25:23', '2024-07-13 10:21:21', NULL, '#008000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'EsofCQB1p0zUbHfRqt219hp0gyQj9umX0JGHXD80.pdf', 'true'),
(106, 'NATIONAL PARENTS\' DAY (FOURTH SUNDAY OF JULY ( રાષ્ટ્રીય માતા-પિતા દિવસ (જુલાઈનો ચોથો રવિવાર)', NULL, '2024-07-28 11:27:00', '2024-07-28 11:27:00', 'In May we celebrated mothers, and in June we celebrated fathers.  It follows that in July we can bring all our parents together and show them some appreciation all at once.   Parents play a vital role in the lives of children.', '2024-07-07 11:28:30', '2024-07-14 05:47:58', NULL, '#000000', 'https://vimeo.com/983532226', 'U4HCVl6RCKl5Qa6rBZaCCOr8wYNmFR5otiTSdY5Q.pdf', 'true'),
(107, 'Jagannath Puri Rath Yatra  (જગન્નાથ પુરી રથયાત્રા )', NULL, '2024-07-07 11:29:00', '2024-07-07 11:29:00', 'Jagannath Rath Yatra is one of the most awaited and much-celebrated festivals in Orissa as well as countrywide.', '2024-07-07 11:30:20', '2024-07-14 05:49:20', NULL, '#FF0000', 'https://vimeo.com/983531483', 'a8g0YS258aJE0WERzR1lTWJt5aMRb5sRYm8vFBOx.pdf', 'true'),
(108, 'Yogini Ekadashi(યોગિની એકાદશી)', NULL, '2024-07-02 11:31:00', '2024-07-02 11:31:00', 'Yogini Ekadashi is a significant fasting day observed by Hindus, dedicated to Lord Vishnu.', '2024-07-07 11:31:44', '2024-07-14 11:43:01', NULL, '#FF0000', 'https://vhmacademy.com/SuperAdmin/create-Events', 'sIiviw2Es3StLBadoaq6ss1NDkE6YibDRBXAkawJ.pdf', 'true'),
(109, 'Independence Day  (સ્વાતંત્ર્ય દિવસ)', NULL, '2024-08-15 11:31:00', '2024-08-15 11:31:00', 'Independence Day in India is celebrated on August 15 each year to mark the end of British colonial rule in 1947 and the establishment of a sovereign Indian nation.', '2024-07-07 11:32:17', '2024-07-12 12:59:29', NULL, '#FF0000', 'https://rb.gy/mqebbc', NULL, 'true'),
(121, 'WORLD ENVIRONMENT DAY', NULL, '2024-06-05 12:46:00', '2024-06-05 12:46:00', 'Plantation Celebration', '2024-07-25 07:23:05', '2024-07-25 07:35:29', 1, '#800080', NULL, '1Sa5lLboB92ptuNiwamzmDJLgkhlVIrfLZCZVh4m.pdf', 'true'),
(122, 'WORLD YOGA DAY', NULL, '2024-06-21 12:58:00', '2024-06-21 12:58:00', 'Yoga Special Activity', '2024-07-25 07:31:51', '2024-07-25 07:31:51', 1, '#800080', NULL, '68MWG4n0guzL2Azpg9UTCB6Ft85SI7nmi0nvwytU.pdf', 'true'),
(123, 'GURU PURNIMA CELEBRATION', NULL, '2024-07-20 13:01:00', '2024-07-20 13:01:00', 'Guru Pujan & Special Activities of Guru Purnima', '2024-07-25 07:36:47', '2024-07-31 09:36:32', 1, '#800080', NULL, '3etIqwhyC6jNpEy2sutdBwPNAeoUhrP9rWv5HJ6C.pdf', 'false'),
(124, 'JAYA PARVATI VRAT ZAWERA PLANTATION', NULL, '2024-07-13 13:13:00', '2024-07-13 13:13:00', 'JAYA PARVATI VRAT ZAWERA PLANTATION ( ASHADHA SUD PANCHAMI )', '2024-07-25 07:46:19', '2024-07-31 09:36:49', 1, '#800080', NULL, '0AXwFbI6jSq5VlpTXCxRJ0z2IPRrxgYAzbsUxRjF.pdf', 'false'),
(125, 'BLUE DAY', NULL, '2024-07-13 13:23:00', '2024-07-13 13:23:00', 'Ntural & Artificial Creationa of Blue Colours', '2024-07-25 07:58:14', '2024-07-31 09:37:08', 1, '#800080', NULL, 'THigxVIs0AHBcX5tgn8wOkWrFZUo5DpR9CejTG4c.pdf', 'false'),
(126, 'Annual Function', NULL, '2024-07-26 13:30:00', '2024-07-26 13:30:00', 'Annual function in school', '2024-07-25 08:00:38', '2024-07-25 08:00:38', 2, '#800080', NULL, 'vgqKqzMHaOq0Q6FW8pKk83a8jUI3K1m2iB8akM4X.pdf', 'false'),
(127, 'JAYA PARVATI VRAT & GAURI VRAT CELEBRATION', NULL, '2024-07-20 13:27:00', '2024-07-20 13:27:00', 'JAYA PARVATI VRAT CELEBRATION', '2024-07-25 08:01:23', '2024-07-25 08:01:23', 1, '#800080', NULL, 'CCWoTkasZr8zPMNAx7eKv1jPRQqq3w4xunedtRrv.pdf', 'false'),
(128, '78TH INDEPENDENCE DAY CELEBRATION', NULL, '2024-08-15 13:30:00', '2024-08-15 13:30:00', 'Parents are invited ( 08 - 30 am to 10 - 30 am )', '2024-07-25 08:04:49', '2024-07-26 12:10:19', 1, '#800080', NULL, 'D1FechjBXz8T72bjoniiLI28KFatglfY3ZdwREZU.pdf', 'true'),
(129, 'NAVROZ / PATETI - PARSI NEW YEAR CELEBRATION', NULL, '2024-08-15 13:33:00', '2024-08-15 13:33:00', 'NAVROZ / PATETI - PARSI NEW YEAR CELEBRATION', '2024-07-25 08:08:42', '2024-07-31 09:37:22', 1, '#800080', NULL, 'OOsGNCKOwLA7yqi4HGlv6JCaQGAwDPhinfLlSUez.pdf', 'false'),
(130, 'RAKSHABANDHAN CELEBRATION', NULL, '2024-08-17 13:38:00', '2024-08-17 13:38:00', 'Parents are invited ( 08 - 30 am to 10 - 30 am )', '2024-07-25 08:12:33', '2024-07-31 09:37:34', 1, '#800080', NULL, 'kjNEqwhyRmCwbewwQjzN9TXMT8ApOjTevyve5mxN.pdf', 'false'),
(131, 'Annual Function', NULL, '2024-07-26 13:42:00', '2024-07-27 13:42:00', 'Annual function in school', '2024-07-25 08:13:24', '2024-07-25 08:13:24', 2, '#800080', NULL, 'ThJsgQXpe0hiFAOUJmMoWUueauIFSd8EOaNIZeO1.pdf', 'true'),
(132, 'NAGPANCHAMI & JANMASHTAMI CELEBRATION', NULL, '2024-08-24 13:41:00', '2024-08-24 13:41:00', 'Parents are invited ( 08 - 30 am to 10 - 30 am )', '2024-07-25 08:23:59', '2024-07-31 09:37:53', 1, '#800080', NULL, 'JsuIu8nw3FiJTnHVUTKQmTYbdr4VVob34B1Vv2om.pdf', 'false'),
(133, 'TEACHER S DAY CELEBRATION', NULL, '2024-09-05 08:10:00', '2024-09-05 22:32:00', 'Parents are invited ( 08 - 30 am to 10 - 30 am )', '2024-07-31 10:04:27', '2024-07-31 10:06:17', 1, '#800080', NULL, 'a9HVT47cbx3iOYpgZdYW1zPy3BbeGZsLVszFNpSB.pdf', 'true'),
(135, 'test', NULL, '2024-12-19 16:59:00', '2024-12-20 16:59:00', 'this is demo', '2024-12-19 05:59:35', '2024-12-19 05:59:35', 1, '#800080', NULL, 'iZGbOJTOktC9TenlTUqajyQhA0N9LuNbBEOdALl9.pdf', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_category_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `medium_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `master_category_id`, `class_id`, `medium_id`, `category_name`, `description`, `amount`, `due_date`, `created_at`, `updated_at`) VALUES
(19, 3, 22, 3, 'Tuition Fees', 'Tuition Fees', 1150.00, '2024-10-23 10:27:54', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(20, 3, 22, 3, 'Registration or Enrollment Fees', 'Registration or Enrollment Fees', 250.00, '2024-10-23 10:27:54', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(21, 3, 22, 3, 'Examination Fees', 'Examination Fees', 250.00, '2024-10-23 10:27:54', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(22, 3, 22, 3, 'Transportation Fees', 'Transportation Fees', 900.00, '2024-10-23 10:27:54', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(23, 3, 22, 3, 'Extracurricular Activity Fees', 'Extracurricular Activity Fees', 150.00, '2024-12-25 12:21:25', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(35, 4, 22, 3, 'Registration Fees For School', 'Registration Fees For School', 1500.00, '2024-12-25 12:21:25', '2024-10-23 04:57:54', '2024-10-23 04:57:54'),
(36, 4, 22, 3, 'picnic Fees For School', 'picnic Fees For School', 7500.00, '2024-12-25 12:21:25', '2024-10-23 04:57:54', '2024-10-23 04:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `holiday_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `school_id`, `holiday_name`, `start_date`, `end_date`, `description`, `holiday_pdf`, `created_at`, `updated_at`) VALUES
(1, 2, 'School Funtion Rest', '2024-07-21', '2024-07-21', 'thr', NULL, '2024-07-20 20:05:15', '2024-07-20 20:05:15'),
(2, 1, 'ID UL ZUHA ( BAKARI IDD )', '2024-06-17', '2024-06-17', 'Bakari IDD', NULL, '2024-07-25 04:53:20', '2025-01-06 00:52:45'),
(3, 1, 'MUHARRAM', '2024-07-17', '2024-07-17', 'MUHARRAM - Shahadat Month', NULL, '2024-07-25 04:54:41', '2024-07-25 04:54:41'),
(4, 1, '78TH INDEPENDENCE DAY', '2024-08-15', '2024-08-15', 'National Fastival', NULL, '2024-07-25 05:17:32', '2024-07-25 05:17:32'),
(5, 1, 'PARASI NEW NEW YEAR  / NAVROJ / PATETI', '2024-08-15', '2024-08-15', 'Pateti', NULL, '2024-07-25 05:32:00', '2024-07-25 05:32:00'),
(6, 1, 'RAKSHABANDHAN', '2024-08-19', '2024-08-19', 'NALIERI PURNIMA SHRAVAN SUD PURNIMA', NULL, '2024-07-25 05:33:32', '2024-07-25 05:33:32'),
(7, 1, 'WORLD SANSRUT DAY', '2024-08-19', '2024-08-19', 'SHRAVAN SUD PURNIMA', NULL, '2024-07-25 05:34:12', '2024-07-25 05:34:12'),
(8, 1, 'RANDHAN CHHATTHA', '2024-08-24', '2024-08-24', 'Hindu Fastival', NULL, '2024-07-25 05:46:43', '2024-07-25 05:46:43'),
(10, 1, 'SHITALA SATAM', '2024-08-25', '2024-08-25', 'Hindu Fastival', NULL, '2024-07-25 05:47:55', '2024-07-25 05:47:55'),
(11, 1, 'KRUSHNA JANMASTHAMI ( SHRAVAN VAD ASHTAMI )', '2024-08-26', '2024-08-26', 'Hindu Fastival', NULL, '2024-07-25 05:48:33', '2024-07-25 05:48:33'),
(12, 1, 'GANESH CHATURTHI / DERAVASI SAMVATSARI', '2024-09-07', '2024-09-07', 'Hindu Fastival', NULL, '2024-07-25 05:49:42', '2024-07-25 05:49:42'),
(13, 1, 'EID E MILAD', '2024-09-16', '2024-09-16', 'Muslim Fastival', NULL, '2024-07-25 05:50:22', '2024-07-25 05:50:22'),
(14, 1, 'BHADRPAD PURNIMA - AMBAJJI MELO', '2024-09-18', '2024-09-18', 'Hindu Fastival', NULL, '2024-07-25 05:51:17', '2024-07-25 05:51:17'),
(15, 1, 'GANDHI JAYANTI', '2024-10-02', '2024-10-02', 'National Fastival', NULL, '2024-07-25 05:52:10', '2024-07-25 05:52:10'),
(16, 1, 'DURGASHTMI', '2024-10-11', '2024-10-11', 'Hindu Fastival', NULL, '2024-07-25 05:57:27', '2024-07-25 05:57:27'),
(17, 1, 'VIJAYA DASHAMI', '2024-10-12', '2024-10-12', 'ASO SUD DASHAM', NULL, '2024-07-25 05:58:20', '2024-07-25 05:58:20'),
(18, 1, 'DIWALI VACATION', '2024-10-28', '2024-11-17', 'Diwali Vacation', NULL, '2024-07-25 06:00:07', '2024-07-25 07:16:53'),
(19, 1, 'NATAL - CHRITMAS', '2024-12-25', '2024-12-25', 'Christian Fastival', NULL, '2024-07-25 06:03:46', '2024-07-25 06:03:46'),
(20, 1, 'MAKARSANKRANTI', '2025-01-15', '2025-01-15', 'UTARAYAN', NULL, '2024-07-25 06:04:43', '2024-07-25 06:04:43'),
(21, 1, 'MAHA SHIVRATRI', '2025-02-26', '2025-02-26', 'Hindu Fastival - Maha Vad Teras', NULL, '2024-07-25 06:05:47', '2024-07-25 06:05:47'),
(22, 1, 'HOLI', '2025-03-13', '2025-03-13', 'HINDU FASTIVAL - FALGUN SUD PURNIMA', NULL, '2024-07-25 06:06:49', '2024-07-25 06:06:49'),
(23, 1, 'DHULETI', '2025-03-14', '2025-03-14', 'HNDU FASTIVAL - FALGUN VAD EKAM', NULL, '2024-07-25 06:07:57', '2024-07-25 06:07:57'),
(24, 1, 'RAMJAN EID', '2025-03-31', '2025-03-31', 'Muslim Fastival', NULL, '2024-07-25 06:08:39', '2024-07-25 06:08:39'),
(25, 1, 'SHARAD PURNIMA', '2024-10-17', '2024-10-17', 'Hindu Fastival', NULL, '2024-07-25 06:21:33', '2024-07-25 06:21:33'),
(26, 1, 'NAND UTASAV', '2024-08-27', '2024-08-27', 'Hindu Fastival', NULL, '2024-07-25 06:22:31', '2024-07-25 06:22:31'),
(27, 1, 'RAMNAVAMI', '2025-04-06', '2025-04-06', 'Hindu Fasctival - CHAITRA SUD NAVAMI', NULL, '2024-07-25 06:24:46', '2024-07-25 06:24:46'),
(28, 1, 'KESAR MAHOTSAV', '2025-04-07', '2025-04-07', 'HOLIDAY ON BEHALF OF KESAR MAHOTSAV', NULL, '2024-07-25 06:25:46', '2024-07-25 06:25:46'),
(29, 1, 'GOOD FRIDAY', '2025-04-11', '2025-04-11', 'Christian Fastval', NULL, '2024-07-25 06:27:36', '2024-07-25 06:27:36'),
(30, 1, 'AMBEDKAR JAYANTI', '2025-04-14', '2025-04-14', 'National Fastival', NULL, '2024-07-25 06:28:26', '2024-07-25 06:28:26'),
(31, 1, 'PARSURAM JAYANTI', '2025-04-29', '2025-04-29', 'Hindu Fastival - VAISHAKH SUD TRIJ', NULL, '2024-07-25 06:29:17', '2024-07-25 06:29:17'),
(32, 1, 'SUMMER VACATION', '2025-05-05', '2025-06-08', 'SUMMER VACATION', NULL, '2024-07-25 06:30:44', '2024-07-25 06:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `home_subjects`
--

CREATE TABLE `home_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_title` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sub_image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subject_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_subjects`
--

INSERT INTO `home_subjects` (`id`, `subject_title`, `subject_code`, `description`, `sub_image`, `type`, `subject_banner`, `created_at`, `updated_at`) VALUES
(1, 'Bhagwat Gita', 'B-G-H', 'Gujarati Course', NULL, 'free', NULL, '2024-07-13 10:36:17', '2024-07-13 10:36:17'),
(2, 'General Knowledge', 'GK', 'Free & Paid Courses', NULL, 'free', NULL, '2024-07-29 05:06:54', '2024-07-29 05:06:54'),
(3, 'Motivation', 'MV', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:07:57', '2024-07-29 05:07:57'),
(4, 'Story From DR. Hasmukh Modi', 'SH', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:08:38', '2024-07-29 05:08:38'),
(5, 'Yoga', 'Yoda', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:09:14', '2024-07-29 05:09:14'),
(6, 'Sports', 'Sports', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:09:50', '2024-07-29 05:09:50'),
(7, 'Scout & Guide', 'SC', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:10:18', '2024-07-29 05:10:18'),
(8, 'Club Activity', 'CA', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:10:47', '2024-07-29 05:10:47'),
(9, 'Rasoi', 'Cooking', 'Free & Paid Courses', NULL, 'paid', NULL, '2024-07-29 05:11:15', '2024-07-29 05:11:15'),
(10, 'NEP - 2020', 'NEP', 'Free & Paid Courses', NULL, 'free', NULL, '2024-07-29 05:11:43', '2024-07-29 05:11:43'),
(11, 'Carier Guidence', 'CG', 'Free & Paid Courses', NULL, 'free', NULL, '2024-07-29 05:12:18', '2024-07-29 05:12:18'),
(12, 'English-Grammer1', '5252551', 'this is description1', NULL, 'paid', NULL, '2024-12-19 03:39:01', '2024-12-19 03:39:30'),
(13, 'English-Grammer', 'ssss', 'sssss', NULL, 'free', NULL, '2024-12-20 00:52:44', '2024-12-20 00:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `home_works`
--

CREATE TABLE `home_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `standard_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `submition_date` date DEFAULT NULL,
  `submition_status` varchar(255) NOT NULL DEFAULT 'pending',
  `pdf_file` varchar(255) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `topic_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_works`
--

INSERT INTO `home_works` (`id`, `teacher_id`, `medium_id`, `standard_id`, `class_id`, `subject_id`, `school_id`, `date`, `submition_date`, `submition_status`, `pdf_file`, `topic_title`, `topic_description`, `status`, `created_at`, `updated_at`) VALUES
(17, 3, 3, 31, 1, 292, 1, '2024-08-02', NULL, 'pending', 'https://vhmacademy.com/public/storage/homework_pdfs/tfQFWEX9ZoiXirGwJwviZXgSo5jCeyeet6AjOOmy.pdf', 'Do pg no.178', 'write', 0, '2024-08-02 06:30:45', '2024-08-02 06:30:45'),
(18, 42, 3, 24, 1, 146, 1, '2024-08-02', NULL, 'pending', 'https://vhmacademy.com/public/storage/homework_pdfs/1la8EJjcGMunxgQRaKozTRXuWIQ5ndd4XFj5QkUc.pdf', 'read this page at home', '2/8/24 \nEnglish\n\nWriting H/W\n   do the given homework in textbook page number 10,11.', 0, '2024-08-02 07:18:55', '2024-08-02 07:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `master_fee_categories`
--

CREATE TABLE `master_fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_type` enum('full','emi') NOT NULL DEFAULT 'full',
  `installments` int(10) UNSIGNED DEFAULT NULL,
  `installment_amount` decimal(10,2) DEFAULT NULL,
  `payment_gateway_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_fee_categories`
--

INSERT INTO `master_fee_categories` (`id`, `category_name`, `description`, `payment_type`, `installments`, `installment_amount`, `payment_gateway_id`, `payment_link`, `created_at`, `updated_at`) VALUES
(3, 'School Fee', NULL, 'full', 2, NULL, NULL, NULL, '2024-10-22 03:39:13', '2024-10-22 03:39:13'),
(4, 'Mandal Fee', NULL, 'emi', 2, NULL, NULL, NULL, '2024-10-22 03:58:28', '2024-10-22 03:58:28'),
(6, 'Result Fee', 'Exam Result Fee', 'full', 1, 5000.00, NULL, NULL, '2024-12-31 23:23:32', '2024-12-31 23:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE `mediums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medium_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediums`
--

INSERT INTO `mediums` (`id`, `medium_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'English Medium', 1, '2024-07-08 09:57:53', '2024-07-08 09:57:53'),
(4, 'Gujarati Medium', 1, '2024-07-09 00:36:48', '2024-07-09 00:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_03_022425_create_sessions_table', 1),
(7, '2024_07_03_163051_create_roles_table', 1),
(8, '2024_07_03_163131_add_role_id_to_users_table', 1),
(9, '2024_07_04_034911_create_permissions_table', 1),
(10, '2024_07_04_034917_create_role_user_table', 1),
(11, '2024_07_04_034924_create_permission_role_table', 1),
(12, '2024_07_04_034932_create_schools_table', 1),
(13, '2024_07_05_062419_create_mediums_table', 2),
(14, '2024_07_05_062442_create_standards_table', 3),
(15, '2024_07_05_062504_create_classes_table', 3),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(21, '2016_06_01_000004_create_oauth_clients_table', 4),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(23, '2023_11_22_045538_create_subjects_table', 5),
(24, '2023_11_22_080711_create_topics_table', 5),
(25, '2023_11_22_080908_add_sub_image_to_subjects_table', 5),
(26, '2023_11_22_084446_add_file_to_topics_table', 5),
(27, '2023_11_22_112222_add_std_id_to_subjects_table', 5),
(28, '2023_11_22_112302_add_sub_id_to_topics_table', 5),
(29, '2023_11_22_122327_create_sub_topics_table', 5),
(30, '2023_12_04_053936_add_column_to_subjects_table', 5),
(31, '2023_12_04_054925_add_column_to_topics_table', 5),
(32, '2023_12_29_065702_create_events_table', 5),
(33, '2024_01_24_113612_add_color_to_events_table', 5),
(34, '2024_05_31_160105_add_column_to_events_table', 5),
(35, '2024_06_12_151946_add_color_to_events_table', 5),
(36, '2024_07_06_052623_create_documents_table', 5),
(49, '2024_07_05_133648_create_students_table', 8),
(50, '2024_07_05_071146_create_parents_table', 9),
(51, '2024_07_06_142415_create_teachers_table', 10),
(52, '2024_06_26_161214_create_home_works_table', 11),
(54, '2024_06_25_115234_create_teacher_timetables_table', 12),
(55, '2024_08_18_033132_create_notices_table', 13),
(56, '2024_08_18_033138_create_notification_views_table', 14),
(57, '2024_08_20_040108_create_teacher_leaves_table', 15),
(59, '2024_10_20_084711_create_fee_categories_table', 16),
(60, '2024_12_23_103757_create_payments_table', 17),
(61, '2024_12_28_111233_alter_payments_table', 18),
(62, '2024_12_30_050747_alter_payments_table', 19),
(63, '2025_01_01_085219_alter_sub_topics_table', 20),
(64, '2025_01_01_090644_drop_columns_from_sub_topics_table', 21),
(65, '2025_01_01_090250_alter_sub_topics_table', 22),
(66, '2025_01_06_054452_alter_payments_table', 23),
(67, '2025_01_08_120548_create_standards_wise_live_telecast_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `date`, `roles`, `created_at`, `updated_at`) VALUES
(6, 'Create Notice for School', 'create notice for school', '2024-08-20', '[\"Teacher\",\"Parent\"]', '2024-08-17 22:26:23', '2024-08-17 22:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `notification_views`
--

CREATE TABLE `notification_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02f1b16a8cf96b0c16cb5af358f550867014d8e1d846eaacfffea0aadb1c0a6221ea9048636a2c48', 23, 5, 'MyApp', '[]', 0, '2024-07-31 06:28:55', '2024-07-31 06:28:55', '2025-07-31 06:28:55'),
('05a344021b179c564827da8cd38d3d999ff6253a4f24d6476981d9548af92b0cd76dafb7be2d0781', 75, 5, 'MyApp', '[]', 0, '2024-08-01 15:46:15', '2024-08-01 15:46:15', '2025-08-01 15:46:15'),
('06390e1727e1fd9cb5e3b3d9ec9de37ebf2ce88af20cdb00de4a504a3b1c61b9c3a5a8df29ede07f', 367, 5, 'MyApp', '[]', 0, '2024-07-12 12:08:50', '2024-07-12 12:08:50', '2025-07-12 12:08:50'),
('0676cdea114be4b86b305ce1a182979a32dcdfd64df3b91f118fffe7ecf665d9504cc47b84560123', 31, 5, 'MyApp', '[]', 0, '2024-07-29 10:15:39', '2024-07-29 10:15:39', '2025-07-29 10:15:39'),
('06e09cad346c0fd2c0c7455bdb3877d3842214a7a7080491ec82242d00433e4e8dcb06576269b0a1', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:13', '2024-07-23 10:05:13', '2025-07-23 10:05:13'),
('076f7054450d31a1f3b94c5396186bfbbff8d6a872b5062a49f859fdcc8fb7a1244b1b2a4e98e827', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:55', '2024-07-23 10:01:55', '2025-07-23 10:01:55'),
('0a98a4867c6a17e3af6adeb9b0cf0281eb742b8fe0fdaf76e091bbbc159fabab1828685903bf34c7', 6, 5, 'MyApp', '[]', 0, '2024-07-23 06:07:14', '2024-07-23 06:07:14', '2025-07-23 06:07:14'),
('0c04166a60c25c7842ce6bfd98dc11c88a404ab1e38e6809a2af248909c69fdf7c20c0dc94b3ead3', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:07:00', '2024-07-23 10:07:00', '2025-07-23 10:07:00'),
('0c75beea4521ec897f9b7749fc447d103fd0bd9464271043bf85452528e6bd501ba03a7142ef2d1c', 105, 5, 'MyApp', '[]', 0, '2024-08-01 15:27:52', '2024-08-01 15:27:52', '2025-08-01 15:27:52'),
('10eb80281e3a990a0e9cf573e609a2494c746e879e1815955f30619f1e7dc63038b3e9bbf5120842', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:06:01', '2024-07-23 10:06:01', '2025-07-23 10:06:01'),
('1148b0cc5ed0ef729e33da9ae8db66246bf588c5a2c9512bd7ad44dddece562f2638e25d24317405', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:02:02', '2024-07-23 10:02:02', '2025-07-23 10:02:02'),
('11bd7501d9e315737fdc6f500e849c340b2538140a17b759b17ff9f9972cb38ce784424ab9a83a83', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:24', '2024-07-23 09:05:24', '2025-07-23 09:05:24'),
('1340551afb5471a7dd06f3eaeb0affc4d53005a2725ecd9f6e0a20e45a67607037bb77652a438fa5', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:51:50', '2024-07-23 09:51:50', '2025-07-23 09:51:50'),
('14d6d469666003f1bb8bfec30cfff4c64545f23bf6471f582d9f36de08b78e0b5767f837c6e50ff8', 6, 5, 'MyApp', '[]', 0, '2024-07-26 14:27:42', '2024-07-26 14:27:42', '2025-07-26 14:27:42'),
('179d0a7e6a41fd8c4967c91836faa15275a5609cb2ada61d21567c44b305dceb45c5e015650dc924', 359, 5, 'MyApp', '[]', 0, '2024-07-13 07:29:52', '2024-07-13 07:29:52', '2025-07-13 07:29:52'),
('184e31f7cf5d6a8d6332fd2a50b00e19887648e7a093dd140f1792501aea12d31fb196ab58ae0068', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:02:22', '2024-07-23 10:02:22', '2025-07-23 10:02:22'),
('18fa68ad543ee233b1f4f547cf241e8e95d2f0fbad92526e2d2aa3c32ca2003ad41b824a51256057', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:07', '2024-07-23 09:58:07', '2025-07-23 09:58:07'),
('1e890025b3197c1ac76093c1c246b835e2a6898768f2932de71a0ce29abef9d1aacde8de8caea58e', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:35', '2024-07-23 09:05:35', '2025-07-23 09:05:35'),
('1f246eb74bfda548b3248c42041b38bbfbad16a5b1eb97a5ef73daeadfe63be2ee218d5481fc9c2c', 321, 5, 'MyApp', '[]', 0, '2024-07-20 02:04:17', '2024-07-20 02:04:17', '2025-07-20 02:04:17'),
('2079dfdb5d1466f72ff646731dcdc36df446b0525cc2679c79fcadd455a67d8a50ce9183f94b1eeb', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:23', '2024-07-23 10:05:23', '2025-07-23 10:05:23'),
('20ae85ccc23e2302439c28fab51b0104e8948d8cbda95c16c0df906c7f2addb6d8cce7675c15b2ce', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:26', '2024-07-23 09:58:26', '2025-07-23 09:58:26'),
('24c67ceb08458526e7c06fc291ffa1cd94b3d3b343361752c0cb02784ce2f796b283e88aa4c9d859', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:37', '2024-07-23 09:58:37', '2025-07-23 09:58:37'),
('25ed20c98ae2d9b291a7b0bdbdd2e1217fc57f90a51a13ea12fb8fa83501de9ba66fa7e40d3da3e8', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:05', '2024-07-23 09:58:05', '2025-07-23 09:58:05'),
('271c72084417f2c9e8c66b8fa4a1a3169366b3a54e3451b883c9d597d0770e4ff2f7464327353168', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:47', '2024-07-23 10:01:47', '2025-07-23 10:01:47'),
('27d307e9ab8f4334c5e2225239ad9818bf67498896bcbc332bcbb2c4a978543e5391cb7775b0a3b7', 6, 5, 'MyApp', '[]', 0, '2024-07-23 11:26:17', '2024-07-23 11:26:17', '2025-07-23 11:26:17'),
('27e945e0815ccb4d02c666541ea8890ed2bca9b5d3b42ea094a87f6bde3cd423d76746fa6844bdfa', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:14:40', '2024-07-23 10:14:40', '2025-07-23 10:14:40'),
('292c6bb40a3add5386b6968519c5b7f1673f482edc42e0f024d2e188136099cf8807d1c230d7fac4', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:35', '2024-07-23 09:05:35', '2025-07-23 09:05:35'),
('29628682c9cb10a9413fa8adbbd35f24d6de38d24fc5f9880e6f0902d85207584ff0e092595d7082', 124, 5, 'MyApp', '[]', 0, '2024-08-01 06:30:47', '2024-08-01 06:30:47', '2025-08-01 06:30:47'),
('29c044f45a755ad3c2d8276da628e39ae540f9ef87502fcdb97210e10d653f38877bad856fa27256', 6, 5, 'MyApp', '[]', 0, '2024-07-23 07:23:56', '2024-07-23 07:23:56', '2025-07-23 07:23:56'),
('2b895c9743612887dd95ca6174c54b254cddbab9b957661d2bf72c41501d965c100fe40654327896', 24, 5, 'MyApp', '[]', 0, '2024-07-29 10:19:42', '2024-07-29 10:19:42', '2025-07-29 10:19:42'),
('33b12da548c580b41cf7e436443e6de224d93cf4fa5fd1c5d516f4a992cb8c7d41abd4ae7b77c3b7', 13, 5, 'MyApp', '[]', 0, '2024-07-31 04:54:16', '2024-07-31 04:54:16', '2025-07-31 04:54:16'),
('349f3454944317d1f5505eab0c9494b137050dde669cc013c1f4431362d214b1431367ed88bbcdd3', 6, 5, 'MyApp', '[]', 0, '2024-07-23 14:18:37', '2024-07-23 14:18:37', '2025-07-23 14:18:37'),
('34a1a4b0d4455a4be5502654301032c113260f4650f1829b71ba27816c6686c1d800d50b194f3e0e', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:14:30', '2024-07-23 10:14:30', '2025-07-23 10:14:30'),
('36bd9749d697155cf7995b0435f79699effbced64c251104c9dcceed10c17c1f4a3358707136e528', 8, 5, 'MyApp', '[]', 0, '2024-08-02 06:23:15', '2024-08-02 06:23:15', '2025-08-02 06:23:15'),
('37bbcd6eb73e3f62b667f97f5cc83b172ff5489493b4c598efead5f281a857b4c59bf0b5583d370a', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:47', '2024-07-23 10:01:47', '2025-07-23 10:01:47'),
('37e0a756353160c518b5265959e32bb4c28ac31952eff55f4bbccb0312e18d115e9accefea2d5fb3', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:29', '2024-07-23 09:58:29', '2025-07-23 09:58:29'),
('39bab2113719c3a20a478cabf66ca841ccff1e1fd8cc26f1804b65775e1793f1d27235ad345cc1b4', 6, 5, 'MyApp', '[]', 0, '2024-07-23 14:49:11', '2024-07-23 14:49:11', '2025-07-23 14:49:11'),
('3a6fc960de2ef10808e319a74b6ec037fccb008ff8ed30f2bc073c7282acd49928824b2144cd047c', 30, 5, 'MyApp', '[]', 0, '2024-08-01 07:40:12', '2024-08-01 07:40:12', '2025-08-01 07:40:12'),
('3bf7ab093176ae96588a62646dafb8a08e7fc3e30966ce2007446d9a6857fc489b2d49891171576f', 22, 5, 'MyApp', '[]', 0, '2024-07-30 02:33:39', '2024-07-30 02:33:39', '2025-07-30 02:33:39'),
('3c90bd73c11d1ce95588c171de07466dfe3c826a0fc405348bb32eecdbff60a3309411f6c9f87921', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:11:07', '2024-07-23 10:11:07', '2025-07-23 10:11:07'),
('3ce397a99e1928d4a14cbf3f9f8b08648386f3901e5be244b6443745fec5126aace8487778d79117', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:37', '2024-07-23 09:58:37', '2025-07-23 09:58:37'),
('3db16d7b521bb96fc120e69b156f0cd1cd356d1adde065287c8795f6b72a5d300e5eebd21cec732c', 359, 5, 'MyApp', '[]', 0, '2024-07-13 07:35:19', '2024-07-13 07:35:19', '2025-07-13 07:35:19'),
('3e556f6692b944cbaa6dd774a3b7f051103c9ecfa79c38a7f4aac4a0994b879b1f2844730ae706db', 359, 5, 'MyApp', '[]', 0, '2024-07-13 07:14:04', '2024-07-13 07:14:04', '2025-07-13 07:14:04'),
('3ff749ec915f367b584510acad0c0a4b6d31b9aa1e086bd6a0e76f4dff9ee9315672e2c77c5f513d', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:03', '2024-07-23 10:05:03', '2025-07-23 10:05:03'),
('400afc623fe1399624fcfa6b6450a9a22a741b5e81c96f98a407a7c192f77eec7d46763502e42a90', 124, 5, 'MyApp', '[]', 0, '2024-08-04 15:05:31', '2024-08-04 15:05:31', '2025-08-04 15:05:31'),
('4177777e664b2986f298311da6cb88e9f361d8a5b2fbcb8971e2135337cc2c1c0a33a5048b570b20', 53, 5, 'MyApp', '[]', 0, '2024-07-30 13:44:22', '2024-07-30 13:44:22', '2025-07-30 13:44:22'),
('436e5f189ee69b87cf717b3c3558826be18ec562d4c867013ab6f494d9a9cbebe48d7644fb8efac4', 124, 5, 'MyApp', '[]', 0, '2024-07-31 07:33:45', '2024-07-31 07:33:45', '2025-07-31 07:33:45'),
('4794fe8e4b6bf2adee8c90c1813c91ee7622e069dc7ebe3fb3beedf7f435e41826053bf9c7b11e29', 321, 5, 'MyApp', '[]', 0, '2024-07-20 02:03:29', '2024-07-20 02:03:29', '2025-07-20 02:03:29'),
('49e694a06f5e16b8fc5e651e23719c1b357239f2d011b9a45a1cba14f5c3e21399b29e3f7aa3cc30', 10, 5, 'MyApp', '[]', 0, '2024-07-29 10:06:47', '2024-07-29 10:06:47', '2025-07-29 10:06:47'),
('4a38433915ec0a16ed2d2e878eaacefdce3c4cf84acd92b98066d24780470da3bb57af60dcad79e5', 6, 5, 'MyApp', '[]', 0, '2024-07-29 10:25:02', '2024-07-29 10:25:02', '2025-07-29 10:25:02'),
('4a44fb8a969e35e0b7a1f22f8704ae1225b0c3359c38a1023facca5fe93a3b0a7a7f5b2bc15e674c', 11, 5, 'MyApp', '[]', 0, '2024-07-29 10:23:58', '2024-07-29 10:23:58', '2025-07-29 10:23:58'),
('4dcf9ac3e1aef8d28ac126b9903e3dae8eefc066bc0156ab34711688874d1bfea470d42beb22227b', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:02', '2024-07-23 09:05:02', '2025-07-23 09:05:02'),
('4df1ab842a4d12068e3653d446ac5d4d8d78e4b18ce31bd9755462ac9d759e0123464a8b77445127', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:04:52', '2024-07-23 10:04:52', '2025-07-23 10:04:52'),
('51e5f4e050a53ba2ad9a6011c890e5ae2839a89fdac0876809f1acd4b68581fa1d3689668729c724', 53, 5, 'MyApp', '[]', 0, '2024-07-31 18:40:30', '2024-07-31 18:40:30', '2025-07-31 18:40:30'),
('5230782e4ae307267b3f5754f12d5eb91145be392ef793a81b21c4e11bd2fc9d70f27b84cba530fe', 47, 5, 'MyApp', '[]', 0, '2024-07-31 06:53:35', '2024-07-31 06:53:35', '2025-07-31 06:53:35'),
('52b7937bd8f5558bda66d41ec02850ed1e849e1937112c252b5ac58367d0aae50773ed2d8f7f3445', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:08:59', '2024-07-23 10:08:59', '2025-07-23 10:08:59'),
('52d907482322fb7732ce03551ce7bb5743eba419f047e13cc104ae110b9497dcb9c0c8816874f42e', 321, 5, 'MyApp', '[]', 0, '2024-07-20 14:18:54', '2024-07-20 14:18:54', '2025-07-20 14:18:54'),
('532df4855872b1b80ff3a0463e20de6725c416fb6ca5e747b080517a9a0bf61bb334310af8875b63', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:07:05', '2024-07-23 10:07:05', '2025-07-23 10:07:05'),
('5385fe9cdbb7f936f59a88779520ba505be908b5c30aa8ac7a6f64cc7ee3dfc42f4d779662223b8c', 28, 5, 'MyApp', '[]', 0, '2024-07-29 10:54:18', '2024-07-29 10:54:18', '2025-07-29 10:54:18'),
('591ba3359b2dd38031c8006dea6df3e891f84265dacde60df7c75c946a7eeab6514b94d36b2bccb0', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:22', '2024-07-23 10:05:22', '2025-07-23 10:05:22'),
('5a3b7693f755779edb7b7618df40ec91210d052904c47b74b3a39c86228339dae523bbb5b767edd7', 367, 5, 'MyApp', '[]', 0, '2024-07-12 12:20:14', '2024-07-12 12:20:14', '2025-07-12 12:20:14'),
('5a51892adea5f96ceed41d552390cfb3c94106ba73934c8c93ae36ea46aafed248192743544fae7c', 53, 5, 'MyApp', '[]', 0, '2024-07-30 13:57:00', '2024-07-30 13:57:00', '2025-07-30 13:57:00'),
('5e1decf345b562b6928c6498b0712ff2524722fc44f6acdce91da60a31849f560ed5c2ad2c7911f5', 6, 5, 'MyApp', '[]', 0, '2024-08-01 16:54:34', '2024-08-01 16:54:34', '2025-08-01 16:54:34'),
('5ef50eb8b0f3c4b1e2c7d3269d567de0b472183254e4d1c025c0808b376832575c906fafa89905a3', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:11:19', '2024-07-23 10:11:19', '2025-07-23 10:11:19'),
('61c2452249b39fe94b1fdfbe31852167cf7c750f67c5cbe2d52ed74ac50356701d208e7c01d05eae', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:14:31', '2024-07-23 10:14:31', '2025-07-23 10:14:31'),
('6440ffd92892e6c5ddb90866f74283395a4c8fbfae635d72105d2aa68ee6b4bb557cbdeddf115687', 5, 5, 'MyApp', '[]', 0, '2024-07-24 07:34:35', '2024-07-24 07:34:35', '2025-07-24 07:34:35'),
('64dba7c9dadc12194f7b6cfdd83001d9c97e2adb469d3607d3051d1e2e3ae766295140ac8a9bbecb', 367, 5, 'MyApp', '[]', 0, '2024-07-12 11:46:13', '2024-07-12 11:46:13', '2025-07-12 11:46:13'),
('65039f901541600ef2e1e44adcdad4a9cabcde4a3d757b709150c3f356ba44d00d2333a39ef88b37', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:31', '2024-07-23 10:01:31', '2025-07-23 10:01:31'),
('66961a0c06c1ffe4a08ee80d0823838f73714665385c80ebf9d32eeed531a7747bae503262705567', 49, 5, 'MyApp', '[]', 0, '2024-07-30 08:06:30', '2024-07-30 08:06:30', '2025-07-30 08:06:30'),
('686a1ab0a648e2439433c8ff6c7bbdbfc014417f090e0a0d73e8668eb6f1d2d0e97afe4af4305041', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:32', '2024-07-23 10:01:32', '2025-07-23 10:01:32'),
('6917ed310e624dbc9c43454c6b2b0e8d55aa68d00287e64af61937e7e3866235acca83d69178c535', 29, 5, 'MyApp', '[]', 0, '2024-07-29 10:16:20', '2024-07-29 10:16:20', '2025-07-29 10:16:20'),
('6a8d2dcc2e5f1b7c846075b5ce572b905b05f182c28e9a6d469cc4f38774df08805c346a961b0fe5', 75, 5, 'MyApp', '[]', 0, '2024-08-01 15:29:43', '2024-08-01 15:29:44', '2025-08-01 15:29:43'),
('6d4f4ad698eb54eafd82a7a3d19aa93fed7e553ee3974ec7346d60fbdc0c181e9fbd46c83f70a96c', 47, 5, 'MyApp', '[]', 0, '2024-07-29 14:08:46', '2024-07-29 14:08:46', '2025-07-29 14:08:46'),
('718e45241eb4a60731231925609644ceaa7851458848d98870870e0a539ffeacbd9328775315b180', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:06', '2024-07-23 09:05:06', '2025-07-23 09:05:06'),
('71bcdd2badfd4a9f98308dd31f748c552d5f0ceb90944daa3d12af3fb04eb16b455d085f76260168', 321, 5, 'MyApp', '[]', 0, '2024-07-12 01:55:07', '2024-07-12 01:55:07', '2025-07-12 07:25:07'),
('71d0f2b746c12f6f4a3c3dd1412c9b180b8c72a1cb4dbf1bf6e62c8a64a39439a7181fabe424b703', 18, 5, 'MyApp', '[]', 0, '2024-08-02 10:47:48', '2024-08-02 10:47:48', '2025-08-02 10:47:48'),
('720eed0a54e13ef0af8abc32bba35f395c351de5165e56b303e75613fddb3edefa02e8fc788fcefb', 103, 5, 'MyApp', '[]', 0, '2024-08-03 10:33:26', '2024-08-03 10:33:26', '2025-08-03 10:33:26'),
('722f2289319b9498b884a44494b3fea7bcea7471170e6758d676f85878a8374e96c954ccdbeaa53b', 359, 5, 'MyApp', '[]', 0, '2024-07-13 07:34:20', '2024-07-13 07:34:20', '2025-07-13 07:34:20'),
('72a36cd5f62362a3840dc3ae5bb07391f83355d96f25ced8fdfc5132ca499cc62515d34e1f8e78b1', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:31', '2024-07-23 10:01:31', '2025-07-23 10:01:31'),
('73856100a0eb166b62906d8faeaa8a1cb3c3132466aa128bae2a44524c56274a161f19e325e1d2f6', 22, 5, 'MyApp', '[]', 0, '2024-07-30 05:32:23', '2024-07-30 05:32:23', '2025-07-30 05:32:23'),
('75ec0e66cb2494fa3ab0ad88ef332f13a9098d8bc3cac376305957b37a87f70c5e7e8f514a2a8753', 12, 5, 'MyApp', '[]', 0, '2024-07-29 10:16:55', '2024-07-29 10:16:55', '2025-07-29 10:16:55'),
('780fb2b386e0fab69499e16a24fa810dff199448e1edbb8946e44b184dffce5dbeb15a80b46ca69a', 53, 5, 'MyApp', '[]', 0, '2024-07-26 14:02:43', '2024-07-26 14:02:43', '2025-07-26 14:02:43'),
('78f91f9c9f15fa31618e767f4c3d655c5d653afc0716a6bbe08955467fdfdf215936e9b7192e0cde', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:06:21', '2024-07-23 10:06:21', '2025-07-23 10:06:21'),
('794d4f2d7024390b384a5a3f63d03183e53803ad758660e73c726a8a08dc503a2daefda7a6f9eb81', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:06:03', '2024-07-23 10:06:03', '2025-07-23 10:06:03'),
('79a3e9835075400935f709f9e193d426a11f1402f67c6ce751c13a5d5d2475693a1b4c3b26741bc2', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:29:19', '2024-07-23 10:29:19', '2025-07-23 10:29:19'),
('7a7ecbcc2dd054c7c96332a991095f16d258557ad4a91b808b930bc9f69f8000f6b5262512674cb5', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:00:40', '2024-07-23 10:00:40', '2025-07-23 10:00:40'),
('7cbc241635da24708dec2f3e04a0560551c982676dfc0d19e0a7f661258e8913625114acdaa04212', 6, 5, 'MyApp', '[]', 0, '2024-07-23 07:24:11', '2024-07-23 07:24:11', '2025-07-23 07:24:11'),
('7db308f6cc7caf0bc0d1b2810a77ff09c6d8dd0f9bc200d639c85fbe14b38dd1c5c213844a20631b', 367, 5, 'MyApp', '[]', 0, '2024-07-12 12:03:05', '2024-07-12 12:03:05', '2025-07-12 12:03:05'),
('7f20719b7707e4daa4dfb7edf20e81ce409fb6dce1e0ec6c66a75f7c2c0d144321a40ddb8b6b2b0d', 18, 5, 'MyApp', '[]', 0, '2024-07-30 05:29:28', '2024-07-30 05:29:28', '2025-07-30 05:29:28'),
('808a2c4576bbb31a81c5c60f873ece0649db4c3fc3a400976196e3a3146e9e407cc60c8f403998f6', 14, 5, 'MyApp', '[]', 0, '2024-07-30 14:58:59', '2024-07-30 14:58:59', '2025-07-30 14:58:59'),
('80b099573c74bea731bee8cd5d9899051ad542b5b2f883ec9052b3016f155f9e2a2162cde6919608', 6, 5, 'MyApp', '[]', 0, '2024-07-23 07:23:39', '2024-07-23 07:23:39', '2025-07-23 07:23:39'),
('8174e3f76e7d23a17ff2166e89361cb12c4ed89a3894e93e7616cf26e255c780f753f5763d5b729a', 372, 5, 'MyApp', '[]', 0, '2024-07-14 10:16:07', '2024-07-14 10:16:07', '2025-07-14 10:16:07'),
('820ec78c19299e5c2e0969cfcd059b8b91c1bab77bb451a162b0be0bfaa232f445b829272447864f', 18, 5, 'MyApp', '[]', 0, '2024-08-03 08:04:57', '2024-08-03 08:04:57', '2025-08-03 08:04:57'),
('822078aeaf0baf299161ffce6fbf39b4d69e639dfc36a336c6361b2ed171d72879ab24becc053eda', 33, 5, 'MyApp', '[]', 0, '2024-07-29 10:08:25', '2024-07-29 10:08:25', '2025-07-29 10:08:25'),
('8220b7ae77bd2689b6187a0a4bbd957a4a2d7aa0cbce78a85f42cf8bd4d7228af45a8985f572d9f3', 372, 5, 'MyApp', '[]', 0, '2024-07-14 13:19:14', '2024-07-14 13:19:14', '2025-07-14 13:19:14'),
('85634cb0a0f3e3d6f51a0af90b530ddadf66d05e1bac6e20ff1fc5523560740715604b629d19e94a', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:02', '2024-07-23 09:05:02', '2025-07-23 09:05:02'),
('857ae1360c73c51379683c4a7ab9417f827e78e8fbe2fd96ec7ca9b6b6aa1fae1aafeb24332a84dc', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:10:58', '2024-07-23 10:10:58', '2025-07-23 10:10:58'),
('8991360fe1af32d0a4d14d6b8a37c55ed6ecc50598385f77b45b8742970f48d15e441db2965a877c', 367, 5, 'MyApp', '[]', 0, '2024-07-12 12:10:07', '2024-07-12 12:10:07', '2025-07-12 12:10:07'),
('899e2af54e812b267f719895f8cc685407f701fd5f418052acbd611066c07c88f87dc885c4d8c45e', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:31', '2024-07-23 10:01:31', '2025-07-23 10:01:31'),
('928277d48a2984325cfa5b6ecfe245386db13385543a37d99bc730d612f09f410b19f61507309001', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:09', '2024-07-23 10:05:09', '2025-07-23 10:05:09'),
('945c5dcde9b68a160f3cd8232184d6e1e8bb2e340c0fb84a3e801f79b6632f7837b74a8b142a01ea', 359, 5, 'MyApp', '[]', 0, '2024-07-13 06:19:50', '2024-07-13 06:19:50', '2025-07-13 06:19:50'),
('96ad16aa1cf238ea4af0112bae7c7956ab7c5aaf28d8390b9905c9fa48b30af202b39572d80c37ff', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:32', '2024-07-23 10:01:32', '2025-07-23 10:01:32'),
('976f6f4752e2123dc6b3dab1d978b3ea3319d25c88fead765a68287ff76efbcc0f0ddd3521bc8f9c', 15, 5, 'MyApp', '[]', 0, '2024-07-31 04:54:21', '2024-07-31 04:54:21', '2025-07-31 04:54:21'),
('987c279e9a90dacddea4e793352fb47cef8c1faaad9329ce45b5b01ec9910de45983bc469637fa6d', 20, 5, 'MyApp', '[]', 0, '2024-07-29 12:01:39', '2024-07-29 12:01:39', '2025-07-29 12:01:39'),
('9aecf93909bff6eb14d858e4fc1e69a1fc54994657bf3aff20a10a292890da3dce795ce30773e020', 26, 5, 'MyApp', '[]', 0, '2024-07-29 10:16:39', '2024-07-29 10:16:39', '2025-07-29 10:16:39'),
('a0ba61c7eaff2e4efe7a920a71bf27f4f9e4db85ca0b714170b60a9d2422812c34ade453a5b5b6ea', 367, 5, 'MyApp', '[]', 0, '2024-07-12 11:45:50', '2024-07-12 11:45:50', '2025-07-12 11:45:50'),
('a0e0cf0f118494e589f7fe33d8d81f05611bfe21c5f8af3840e469e3d0ae0e7cda8de627068d7f0e', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:29', '2024-07-23 09:58:29', '2025-07-23 09:58:29'),
('a1886364c9bbdbfd2ea7c969943d6d4764f19d41038ad731aab79ea8c6f2e6f4e904fcd2eb53d417', 17, 5, 'MyApp', '[]', 0, '2024-07-29 10:49:03', '2024-07-29 10:49:03', '2025-07-29 10:49:03'),
('a262de795ab9e670655e884ddf4b0ee16a25b6ae2d58d90508c746ce39aa925c5ca56ca335273fec', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:51:47', '2024-07-23 09:51:47', '2025-07-23 09:51:47'),
('a2e38adfa41a39dd53112a9cc3b865e9b44441ac5e9bde5f0ae2c41001c51615a9fedc93674792dd', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:10:51', '2024-07-23 10:10:51', '2025-07-23 10:10:51'),
('a3f5bdfd4379489c5326a197d4e3df2113e23ceb49c556036e7ecdb6b2f33829022d12a7c244c10d', 53, 5, 'MyApp', '[]', 0, '2024-07-30 14:53:36', '2024-07-30 14:53:36', '2025-07-30 14:53:36'),
('a5517eb607ac87d2b4160e97c5914afa755fa3bc61d7e00c67169c1cfe1a7ff83526d9f4b70950ca', 53, 5, 'MyApp', '[]', 0, '2024-08-01 16:43:32', '2024-08-01 16:43:32', '2025-08-01 16:43:32'),
('a58ffae8a1c6f2f65527ff0df026160f6c70b40a9f4a28113f178b1b2112b894c09084076d495d5a', 53, 5, 'MyApp', '[]', 0, '2024-07-27 06:04:09', '2024-07-27 06:04:09', '2025-07-27 06:04:09'),
('ae66e037fb0afb4e43f253e8cc2ff1ffc535e9806ed676420a43566ea10b0eecd42ede91882aa8e5', 27, 5, 'MyApp', '[]', 0, '2024-07-31 09:00:50', '2024-07-31 09:00:50', '2025-07-31 09:00:50'),
('b2ea41ef448c306239f9aec3f6c2908a34c059f5cee57ba87eac53f16620202aa01bb3530eb6d5ea', 53, 5, 'MyApp', '[]', 0, '2024-07-30 14:53:36', '2024-07-30 14:53:36', '2025-07-30 14:53:36'),
('b2fda3cd7cd105a24fb1a677d79213700c5c809ec9e4b6eabcc244690f0d606c791282c2322bf7b7', 6, 5, 'MyApp', '[]', 0, '2024-07-23 07:24:11', '2024-07-23 07:24:11', '2025-07-23 07:24:11'),
('b36016e7e176e2b118f9972f9b7336cc906b9a2fdd482a50ae16f76db4d2535693751ab6bf399a18', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:06:12', '2024-07-23 10:06:12', '2025-07-23 10:06:12'),
('b586d42092d03c12b920178e424534511cb4d69d20a6df8d66cc16eeee2d02effc838b92b39cc9a4', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:28', '2024-07-23 10:05:28', '2025-07-23 10:05:28'),
('b58af8c4128aa5ffab7ba8289b27283b7e556af1531b41e75755d0c411b6ebc734573f356edd6861', 53, 5, 'MyApp', '[]', 0, '2024-07-30 13:51:22', '2024-07-30 13:51:23', '2025-07-30 13:51:22'),
('b5dfb211ef106adece34b441eb0d7fb62d2fef7967b7df929e13d973d4172bd5712f37c018411f32', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:06', '2024-07-23 10:05:06', '2025-07-23 10:05:06'),
('b6c9c263f67ede51ba1d6afecf3f984d83c32f63e41a71c14f9cdc7fd2ea16583e25473c4fe81826', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:07:05', '2024-07-23 10:07:05', '2025-07-23 10:07:05'),
('b78fe6dbbb096010f583669241570e998f1493634aca345f05d04f474fffe455ab0fbc7497275ab3', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:16', '2024-07-23 10:05:16', '2025-07-23 10:05:16'),
('b88ae3b76cfeb1f63edb439d098ca281993fe78f2a1a261e916fbd2768fbf1aa228f5f9c9b71c22a', 6, 5, 'MyApp', '[]', 0, '2024-07-21 05:59:46', '2024-07-21 05:59:46', '2025-07-21 05:59:46'),
('ba7be306fbdf01f37df4938dfa4f35806a18491acdc36df9694b84f65500ef9ed2ee3a3d25a45e88', 23, 5, 'MyApp', '[]', 0, '2024-07-31 08:39:00', '2024-07-31 08:39:00', '2025-07-31 08:39:00'),
('bbdc936e77f046dc72a650444bf17b97522b79917035988ea514f343709a62bac07d98368890c966', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:09:06', '2024-07-23 10:09:06', '2025-07-23 10:09:06'),
('bc644938318ff2b7c8e759d4d16344aaf59c40687da31d0d10a148e46b96b6598d4a177d0a018366', 47, 5, 'MyApp', '[]', 0, '2024-07-29 14:17:48', '2024-07-29 14:17:48', '2025-07-29 14:17:48'),
('bceeec05421a6daee9f292ca093cf98697ebedabaaebf92620cb0ecf6023901578fb91ff8e98b7bd', 359, 5, 'MyApp', '[]', 0, '2024-07-13 06:17:54', '2024-07-13 06:17:54', '2025-07-13 06:17:54'),
('bd2132cdc7dd0d570f978e6515f68247c2196c0a9a47bb4ad21a9d118dc07713566dcb8bd6753032', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:31:04', '2024-07-23 10:31:04', '2025-07-23 10:31:04'),
('bfca4c3747080d85aef6374cc13d09781c1a2e8edfd255918de2d09715c26f43ac8358233087f83b', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:04:54', '2024-07-23 10:04:54', '2025-07-23 10:04:54'),
('c08dcda945ae4eeffb3f44c07e7d219a56bd600d2d14a41f9cc086883283bc74eafee4caef3261d0', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:13:51', '2024-07-23 10:13:51', '2025-07-23 10:13:51'),
('c120cd58c78571f2bbcc44ebaea2127bce8393db82b544cfbcefc56a42afcc38056ac418713296c2', 6, 5, 'MyApp', '[]', 0, '2024-07-23 11:38:38', '2024-07-23 11:38:38', '2025-07-23 11:38:38'),
('c4fab3a709a8e2eaaaa110f6d5d23d43908dbcb60c31bb4168bffa28d3bc944b35aee95ed5d33a01', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:13:53', '2024-07-23 10:13:53', '2025-07-23 10:13:53'),
('c58da59cf537920fa90d6f08bc3b1f2ba2709ffd684a597cf121f809fbb118cfc018eb40e59dd6e6', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:23:25', '2024-07-23 10:23:25', '2025-07-23 10:23:25'),
('c7faf090abd8002a6d993f826142e37b70ea9cd6de0c5f02d029935df6f5a40a86b43d1059e71e86', 25, 5, 'MyApp', '[]', 0, '2024-07-31 13:43:32', '2024-07-31 13:43:32', '2025-07-31 13:43:32'),
('cbce92baa8c22a1ec69b28ce8037a198c95c53e3fbdcd8af5593db3327372c5397e01ff0dc4e7509', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:19', '2024-07-23 09:05:19', '2025-07-23 09:05:19'),
('cdefef6eea30be0fc60a30eadd01df0f075cc2eee5de03d106f59b3cc98024b4b4c629397f1dab14', 8, 5, 'MyApp', '[]', 0, '2024-08-03 11:23:05', '2024-08-03 11:23:05', '2025-08-03 11:23:05'),
('cfc37213056601520ae3b50baf7ee35ee067664f664a6ff03bb56af0a24a8a6872318d68bac322d1', 124, 5, 'MyApp', '[]', 0, '2024-07-29 11:02:13', '2024-07-29 11:02:13', '2025-07-29 11:02:13'),
('d5bfa06961d3be25430e45dc47148b4f65cbd00e411735daddb198dc04c066c93c7b466682a620d6', 305, 5, 'MyApp', '[]', 0, '2024-07-12 01:40:42', '2024-07-12 01:40:42', '2025-07-12 07:10:42'),
('d6a77c4f7e853aee5664659553526eac732bd1691edc27665d2b8fe51a814e403e8df6f9f3de84de', 32, 5, 'MyApp', '[]', 0, '2024-07-31 17:50:36', '2024-07-31 17:50:36', '2025-07-31 17:50:36'),
('d71b3bdcdefbb68f18001df73bd9db7089bb23610a1132273c6acb14b6301d0e82247a8c7b950b5a', 38, 5, 'MyApp', '[]', 0, '2024-07-29 10:18:05', '2024-07-29 10:18:05', '2025-07-29 10:18:05'),
('d98222f54e6d238be7e9e08b36ccb4d8e454a8a832043b69ac8a8526f1078dd3eabef45778bd6595', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:58:05', '2024-07-23 09:58:05', '2025-07-23 09:58:05'),
('daace62939bfbe7c77c61c85969d587d2ff9748a962bf378f57d32b572d7e2b7922c6838e2c12c2d', 6, 5, 'MyApp', '[]', 0, '2024-07-23 09:05:06', '2024-07-23 09:05:06', '2025-07-23 09:05:06'),
('db3a2a395e975b1f361633885b6346e051bf0bc33b862f334bebbe9b1992a874bca92426af48dc2c', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:02:02', '2024-07-23 10:02:02', '2025-07-23 10:02:02'),
('dc7de685c9bc377a0e6079c0bbf3d91738c461fef3e743d6c633bd2c4f1e2de42a70a6935607d225', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:02:14', '2024-07-23 10:02:14', '2025-07-23 10:02:14'),
('dcb6fcb9a1ebaefc43ffe5d7b345c737413bbfbc090569dd612ed9f932e340d34de1b8f6a3df3d89', 19, 5, 'MyApp', '[]', 0, '2024-07-29 10:22:55', '2024-07-29 10:22:55', '2025-07-29 10:22:55'),
('dd5fbd62f90ea37b3b0d2e6c9891f4530eb9560e5085111dfee37f6b2248073e3a3ee976c134e6a6', 6, 5, 'MyApp', '[]', 0, '2024-07-23 07:23:18', '2024-07-23 07:23:18', '2025-07-23 07:23:18'),
('df9037861fa4bc66e5f158fff0fb8c35562f059f0b1c63e613e02963a012d84f2dbbe4a072c12cfb', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:01:47', '2024-07-23 10:01:47', '2025-07-23 10:01:47'),
('e199740dc99c23651998306680184256456ce1c295cb01ae721daf9f7b8fd58369e2dd30a5c24706', 36, 5, 'MyApp', '[]', 0, '2024-07-29 10:17:50', '2024-07-29 10:17:50', '2025-07-29 10:17:50'),
('e2228c0f60b10f229ba75bb8d41c65938b869463d0c23f4cad1a7cb27e6d416eb221b15db7088d3b', 6, 5, 'MyApp', '[]', 0, '2024-07-23 14:16:33', '2024-07-23 14:16:33', '2025-07-23 14:16:33'),
('e2ddf3902561403d341b68c046aa1a9bcbba87627399f2f2d1cd5072fd55a394e8d7ce20eb05ecad', 7, 5, 'MyApp', '[]', 0, '2024-07-29 10:26:56', '2024-07-29 10:26:56', '2025-07-29 10:26:56'),
('e41310cdb4ceca7a273c6ebd6064fe2e27c0611e2d9d56c8cee54d48ccbc638b551d030241eeebbd', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:09:30', '2024-07-23 10:09:30', '2025-07-23 10:09:30'),
('e47dd7b1b2adf10b93cda9342dde2a9243d81af005fa1ccd8c573e5d94e56e2af84c0d87e72ea20c', 34, 5, 'MyApp', '[]', 0, '2024-07-29 11:36:45', '2024-07-29 11:36:45', '2025-07-29 11:36:45'),
('e5aa2671d1721ab6c474ec854cd376791717f5240d13f465ea61b1612ba1d9201c445dd5b6907bf0', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:23:24', '2024-07-23 10:23:24', '2025-07-23 10:23:24'),
('e6dc4d86c75a1196611af1a2fc9efaa29bf9303232951b68025332105a47588bd750b4001f9eb63a', 21, 5, 'MyApp', '[]', 0, '2024-07-30 05:20:32', '2024-07-30 05:20:32', '2025-07-30 05:20:32'),
('e812513cdfda7d234d2dd9e18ca90f474c6e6daa780bc02bfd5f50a78f723adccc35056aaa7c4828', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:11:07', '2024-07-23 10:11:07', '2025-07-23 10:11:07'),
('ea321d705fc92cec1db075e5e5e44c3e196c68a289483a6ad0df8eac535e97e85a06b9e23282cc38', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:14:30', '2024-07-23 10:14:30', '2025-07-23 10:14:30'),
('eb23a440c7c982e8ee9f76bff5b68d1946f6379078ed48c96a6a47cff92e55217bdbd3a3e6e9447a', 8, 5, 'MyApp', '[]', 0, '2024-07-29 10:15:39', '2024-07-29 10:15:39', '2025-07-29 10:15:39'),
('ecf7034f55f8b88d3c0e908dc0f37dc96cb20b70f3e083ca7101bd7cf5f4bcb2beaabba1967622cb', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:09:03', '2024-07-23 10:09:03', '2025-07-23 10:09:03'),
('ed0b58769af6344a5cfe9dc38bef0f35cae20f90cfd0eca07180f0fe449119edb1e1d67273e1b70a', 103, 5, 'MyApp', '[]', 0, '2024-08-01 15:25:59', '2024-08-01 15:25:59', '2025-08-01 15:25:59'),
('ed150b42a8ce380cda5e6286e69222ecf4d8457d536f357fe8eb5abb61629079d33a50b014e51437', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:13:58', '2024-07-23 10:13:58', '2025-07-23 10:13:58'),
('f281a1f471f26a26a3bec2b3b3d1aa8218739821cc42e28bd84de4d18385ef816b6a6553e0190743', 44, 5, 'MyApp', '[]', 0, '2024-07-29 10:17:43', '2024-07-29 10:17:43', '2025-07-29 10:17:43'),
('f36b6170d05c30e8567b623ffeea4ef944364a63084159f6624183755017ac02a5ab6290adfd7d80', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:11:00', '2024-07-23 10:11:01', '2025-07-23 10:11:00'),
('f8b6a90ee358aed6abaf78c4e6e6a05762855c1ae7d55ffcd5282047f4fc1913f8e18c88f7cee8a4', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:05:28', '2024-07-23 10:05:28', '2025-07-23 10:05:28'),
('fa8b731b815e6645d025c8a96b81f62ded7eaad78c2f8eb0fdd17be5bd19dd82b975781346380de9', 6, 5, 'MyApp', '[]', 0, '2024-07-23 10:14:00', '2024-07-23 10:14:00', '2025-07-23 10:14:00'),
('ffe2e1026a2b78d5c52944af979ac1ce7553db3c347a4b5c45eae6827efe764d48e04f9891998ab4', 6, 5, 'MyApp', '[]', 0, '2024-07-22 15:22:27', '2024-07-22 15:22:27', '2025-07-22 15:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '0izpCZeutm0mx2gRvs6UnBSMBZskPlGZSWod3RZZ', NULL, 'http://localhost', 1, 0, 0, '2024-07-08 01:41:46', '2024-07-08 01:41:46'),
(2, NULL, 'Laravel Password Grant Client', '0qhf2f3f2cJaUwFLNWi9lV8ZemxMkaugfw5a2yJT', 'users', 'http://localhost', 0, 1, 0, '2024-07-08 01:41:46', '2024-07-08 01:41:46'),
(3, NULL, 'Laravel Personal Access Client', 'h5tZyiORRLxshuboN37qle4PIahewWSPeyqkc1UO', NULL, 'http://localhost', 1, 0, 0, '2024-07-08 04:01:12', '2024-07-08 04:01:12'),
(4, NULL, 'Laravel Password Grant Client', 'orYeAJWHDaYIpsgj3khouvwLK0ujyD32cOpqcgFg', 'users', 'http://localhost', 0, 1, 0, '2024-07-08 04:01:12', '2024-07-08 04:01:12'),
(5, NULL, 'Laravel Personal Access Client', 'AypPSli67dPsap9BBJipKXw5yYquCSkezuiHvTb6', NULL, 'http://localhost', 1, 0, 0, '2024-07-12 01:39:33', '2024-07-12 01:39:33'),
(6, NULL, 'Laravel Password Grant Client', 'gv5DICOhKMCynrBGz8poAlXbbwUePagu4sgJfTmr', 'users', 'http://localhost', 0, 1, 0, '2024-07-12 01:39:33', '2024-07-12 01:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-08 01:41:46', '2024-07-08 01:41:46'),
(2, 3, '2024-07-08 04:01:12', '2024-07-08 04:01:12'),
(3, 5, '2024-07-12 01:39:33', '2024-07-12 01:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_phone` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `father_photo` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `mother_photo` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `guardian_phone` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `guardian_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user_id`, `father_name`, `father_phone`, `father_occupation`, `father_photo`, `mother_name`, `mother_phone`, `mother_occupation`, `mother_photo`, `guardian_name`, `guardian_relation`, `guardian_email`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_photo`, `created_at`, `updated_at`) VALUES
(1, 4, 'William Davis', '9876543241', 'Teacher', NULL, 'Patricia Davis', NULL, 'Doctor', NULL, 'Nancy Davis', 'Guardian', 'guardian2@example.com', NULL, 'Nurse', '321 Another St', NULL, '2024-07-20 19:50:34', '2024-07-20 19:50:34'),
(3, 52, 'CHANDRAKANT', '9033907466', 'BUSINESS', NULL, 'HEENA ', '7016568547', 'HOUSEWIFE', NULL, NULL, NULL, 'DIYA123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(4, 54, 'ROBERT ', '7200980238', 'SERVICE', NULL, 'BRILLIYA', '6374707629', 'HOUSEWIFE', NULL, NULL, NULL, 'ROBERT25590@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(5, 56, 'SAJANKUMAR', '9898239056', 'BUSINESS', NULL, 'SANGITA', '9904488267', 'HOUSEWIFE', NULL, NULL, NULL, 'MAAN123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(12, 70, 'MILAN ', '9029747437', 'BUSINESS', NULL, 'SAPNA', '9784549679', 'HOUSEWIFE', NULL, NULL, NULL, 'KOTHARIMILAN335@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44'),
(13, 72, 'MAHESHKUMAR', '9712492540', 'BUSINESS', NULL, 'PAVANBEN', '9712292129', 'HOUSEWIFE', NULL, NULL, NULL, 'SOLANKIMAHESH21@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44'),
(14, 74, 'RAVI', '9825670151', 'BUSINESS', NULL, 'POOJA', '7878174578', 'HOUSEWIFE', NULL, NULL, NULL, 'PADHIYAR906@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39'),
(15, 76, 'DASHRATBHAI', '9574469727', 'BUSINESS', NULL, 'MASUBEN', '9574469727', 'HOUSEWIFE', NULL, NULL, NULL, 'ROMAN123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39'),
(16, 78, 'RAVIKANT', '8735000000', 'BUSINESS', NULL, 'VANDANA', '9925038188', 'HOUSEWIFE', NULL, NULL, NULL, 'RAVIHIMALAY@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19'),
(17, 80, 'SAJANKUMAR', '9898239056', 'BUSINESS', NULL, 'SANGITA', '9904488267', 'HOUSEWIFE', NULL, NULL, NULL, 'SAJANSOLANKI403350@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19'),
(24, 94, 'NARESHBHAI', '8000434449', 'BUSINESS', NULL, 'GEETABEN', '9033327211', 'HOUSEWIFE', NULL, NULL, NULL, 'NARESHCHAUDHARY.VCS@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:36:28', '2024-07-26 13:36:28'),
(25, 96, 'HIRENDRA', '8780004522', 'BUSINESS', NULL, 'NAMRATA', '7623844694', 'TEACHER', NULL, NULL, NULL, 'HINDRA00537@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29'),
(26, 98, 'MEHUL', '9913127383', 'BUSINESS', NULL, 'PINKY', '7600906566', 'HOUSEWIFE', NULL, NULL, NULL, 'MEHULJAIN5593@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29'),
(28, 102, 'BIMAL', '8140205551', 'BUSINESS', NULL, 'MANISHA', '7984708586', 'HOUSEWIFE', NULL, NULL, NULL, 'JIYAN123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:41:48', '2024-07-26 13:41:48'),
(29, 104, 'SACHIN', '7874738809', 'BUSINESS', NULL, 'BHAVIKA', '7874738809', 'HOUSEWIFE', NULL, NULL, NULL, 'SHIVANSH123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49'),
(30, 106, 'RUSHABHKUMAR', '7984133674', 'BUSINESS', NULL, 'NITABEN', '8320992798', 'HOUSEWIFE', NULL, NULL, NULL, 'RIYANKOTHARI2018ICLOUD@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49'),
(32, 110, 'CHANDRAKANT', '9033907466', 'BUSINESS', NULL, 'HEENABEN', '7016568547', 'HOUSEWIFE', NULL, NULL, NULL, 'CHANDRAKANT.SOLANKIOCC325@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40'),
(33, 112, 'ARVINDKUMAR', '1234567890', 'BUSINESS', NULL, 'PARVATIBEN', NULL, 'HOUSEWIFE', NULL, NULL, NULL, 'SHREYAN123@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40'),
(35, 116, 'PRATIK', '9925038188', 'BUSINESS', NULL, 'MEGHA', '9925038188', 'HOUSEWIFE', NULL, NULL, NULL, 'PADHIYARPRATIK906@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40'),
(36, 118, 'RAVI', '9825670151', 'BUSINESS', NULL, 'POOJA', '7878174578', 'HOUSEWIFE', NULL, NULL, NULL, 'RAVIHIMALAYHARSHVARDHAN@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40'),
(37, 120, 'BHAIRAV', '9824245858', 'SERVICE', NULL, 'SAVITA', '8200326004', 'HOUSEWIFE', NULL, NULL, NULL, 'MALIBHAIRAV26@GMAIL.COM', NULL, NULL, NULL, NULL, '2024-07-26 13:54:40', '2024-07-26 13:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$NH7riC2n4odqmpzfOZZDbO3uX5GwA7fowK7ibv/YoYQass6DE274m', '2025-01-01 23:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `roll_number` int(11) NOT NULL,
  `fee_category_id` bigint(20) UNSIGNED NOT NULL,
  `total_fees` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', '2024-07-04 01:57:11', '2024-07-04 01:57:11'),
(2, 'SchoolAdmin', '2024-07-04 01:57:11', '2024-07-04 01:57:11'),
(3, 'Teacher', '2024-07-04 01:57:11', '2024-07-04 01:57:11'),
(4, 'Parent', '2024-07-04 01:57:11', '2024-07-04 01:57:11'),
(5, 'Student', '2024-07-09 12:14:14', '2024-07-09 12:14:14');

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
(2, 2, '2024-07-20 19:27:01', '2024-07-20 19:27:01'),
(3, 2, '2024-07-20 19:41:28', '2024-07-20 19:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kesar School for Children', 'Chamunda Nagar, Sardarpura Kant Road Vaghrol, Road, Deesa, Gujarat 385535', '9510807489', '2024-07-20 19:27:01', '2024-07-20 19:27:01'),
(2, 3, 'VHM SCHOOL', 'Chamunda Nagar, Sardarpura Kant Road Vaghrol, Road, Palanpur, Gujarat 385535', '8849469980', '2024-07-20 19:41:28', '2024-07-20 19:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6kSKskhDZiy01bUBzlQGOmd3dGuUddC5U8Jf3Wm1', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjVhQnlRUGVJVGNxeWwybVdheDVac1R2VGR0SkFnSEF6ZzR6S1p5WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zY2hvb2wvU3RhbmRhcmRfV0lzZV9icm9hZENhc3RpbmctVXJsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1736424388);

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `standard_name` varchar(255) NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `standard_name`, `medium_id`, `status`, `created_at`, `updated_at`) VALUES
(15, 'LKG', 4, 1, '2024-07-14 09:30:45', '2024-07-14 09:30:45'),
(16, 'UKG', 4, 1, '2024-07-14 09:30:58', '2024-07-14 09:30:58'),
(17, 'NURSERY', 3, 1, '2024-07-14 09:31:18', '2024-07-14 09:31:18'),
(19, 'NURSERY', 4, 1, '2024-07-14 09:31:43', '2024-07-14 09:31:43'),
(22, 'LKG', 3, 1, '2024-07-14 09:32:40', '2024-07-14 09:32:40'),
(23, 'UKG', 3, 1, '2024-07-14 09:32:53', '2024-07-14 09:32:53'),
(24, 'Std. 1', 3, 1, '2024-07-15 04:30:10', '2024-07-15 04:30:10'),
(25, 'Std. 2', 3, 1, '2024-07-15 04:30:22', '2024-07-15 04:30:22'),
(26, 'Std. 1', 4, 1, '2024-07-15 04:30:33', '2024-07-15 04:30:33'),
(27, 'Std. 2', 4, 1, '2024-07-15 04:30:47', '2024-07-15 04:30:47'),
(28, 'Std. 3', 3, 1, '2024-07-15 04:31:04', '2024-07-15 04:31:04'),
(29, 'Std. 4', 3, 1, '2024-07-15 04:31:14', '2024-07-15 04:31:14'),
(30, 'Std. 5', 3, 1, '2024-07-15 04:31:22', '2024-07-15 04:31:22'),
(31, 'Std. 6', 3, 1, '2024-07-15 04:31:31', '2024-07-15 04:31:31'),
(32, 'Std. 7', 3, 1, '2024-07-15 04:31:39', '2024-07-15 04:31:39'),
(33, 'Std. 8', 3, 1, '2024-07-15 04:31:47', '2024-07-15 04:31:47'),
(34, 'Std. 9', 3, 1, '2024-07-15 04:31:56', '2024-07-15 04:31:56'),
(35, 'Std. 10', 3, 1, '2024-07-15 04:32:04', '2024-07-15 04:32:04'),
(36, 'Std. 11 Gen.', 3, 1, '2024-07-15 04:32:17', '2024-07-15 04:32:17'),
(37, 'Std. 12 Gen.', 3, 1, '2024-07-15 04:32:30', '2024-07-15 04:32:30'),
(38, 'Std. 11 Sci.', 3, 1, '2024-07-15 04:32:41', '2024-07-15 04:32:41'),
(39, 'Std. 12 Sci.', 3, 1, '2024-07-15 04:33:11', '2024-07-15 04:33:11'),
(40, 'Std. 3', 4, 1, '2024-07-15 04:33:52', '2024-07-15 04:33:52'),
(41, 'Std. 4', 4, 1, '2024-07-15 04:34:01', '2024-07-15 04:34:01'),
(42, 'Std. 5', 4, 1, '2024-07-15 04:34:09', '2024-07-15 04:34:09'),
(43, 'Std. 6', 4, 1, '2024-07-15 04:34:34', '2024-07-15 04:34:34'),
(44, 'Std. 7', 4, 1, '2024-07-15 04:34:49', '2024-07-15 04:34:49'),
(46, 'Std. 8', 4, 1, '2024-07-15 04:35:12', '2024-07-15 04:35:12'),
(47, 'Std. 9', 4, 1, '2024-07-15 04:35:29', '2024-07-15 04:35:29'),
(48, 'Std. 10', 4, 1, '2024-07-15 04:35:39', '2024-07-15 04:35:39'),
(49, 'Std. 11 Gen.', 4, 1, '2024-07-15 04:35:55', '2024-07-15 04:35:55'),
(50, 'Std. 12 Gen.', 4, 1, '2024-07-15 04:36:08', '2024-07-15 04:36:08'),
(51, 'Std. 11 Sci.', 4, 1, '2024-07-15 04:36:20', '2024-07-15 04:36:20'),
(52, 'Std. 12 Sci.', 4, 1, '2024-07-15 04:36:33', '2024-07-15 04:36:33'),
(53, 'B.com', 3, 1, '2024-12-19 03:40:24', '2024-12-19 03:40:24'),
(54, 'BBA', 4, 1, '2024-12-19 03:46:13', '2024-12-19 03:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `standards_wise_live_telecast`
--

CREATE TABLE `standards_wise_live_telecast` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `live_telecast_url` varchar(255) NOT NULL,
  `live_telecast_id` varchar(200) DEFAULT NULL,
  `status` enum('yes','no') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standards_wise_live_telecast`
--

INSERT INTO `standards_wise_live_telecast` (`id`, `medium_id`, `class_id`, `start_date`, `end_date`, `live_telecast_url`, `live_telecast_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 17, '2025-01-09', '2025-01-30', 'https://www.justwatch.com/us/tv-show/live-telecast', 'std - 5', 'yes', '2025-01-09 05:51:48', '2025-01-09 05:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admission_date` date NOT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `student_photo` varchar(255) DEFAULT NULL,
  `aadharcard_number` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `rte` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `parent_id`, `admission_no`, `roll_number`, `medium_id`, `class_id`, `section_id`, `school_id`, `uid`, `first_name`, `last_name`, `gender`, `date_of_birth`, `category`, `religion`, `caste`, `mobile_number`, `email`, `admission_date`, `blood_group`, `house`, `height`, `weight`, `medical_history`, `student_photo`, `aadharcard_number`, `current_address`, `permanent_address`, `bank_account_number`, `bank_name`, `ifsc_code`, `rte`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '1', 101, 3, 15, 1, 2, 'VHM120050430', 'Emily', 'Davis', 'Female', '2005-04-30', 'ST', 'Sikh', 'ST', '1234567893', 'emilydavis@example.com', '2020-06-04', 'AB+', 'Yellow', 160.00, 58.00, 'None', NULL, '123456789015', '321 Main St', '321 Main St', '1234567893', 'GHI Bank', 'GHI1234', NULL, '2024-07-20 19:50:34', '2024-07-20 19:50:34'),
(3, 53, 3, '2', 2, 3, 17, 1, 1, 'KES219700101', 'DIYA', 'SOLANKI', 'FEMALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9033907466', 'DIYA123dm@GMAIL.COM', '1970-01-01', 'C+', NULL, NULL, NULL, 'NA', NULL, '588419725023', '22,FARM HOUSE ,MALI VAS AJAPURA ,KANT BHOYAN DEESA', '22,FARM HOUSE ,MALI VAS AJAPURA ,KANT BHOYAN DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(4, 55, 4, '3', 1, 3, 17, 1, 1, 'KES319700101', 'DARREN', 'MOSES', 'MALE', '1970-01-01', 'GENERAL', 'CHRISTIAN', 'MOSES', '7200980238', 'ROBERT25590dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '706700838941', 'PINK CITY,RANPUR ROAD DEESA', '23-126/79E NEDIYA VILAGAM,KARUNGAL,KANYAKUMARI,TAMIL NADU', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(5, 57, 5, '4', 3, 3, 17, 1, 1, 'KES419700101', 'MAAN', 'SOLANKI', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'SOLANKI', '9898239056', 'MAAN123dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '672685092750', '4 BUNGLOW AJAPURA,KANT ROAD DEESA', '4 BUNGLOW AJAPURA,KANT ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06'),
(12, 71, 12, '5', 4, 3, 17, 1, 1, 'KES519700101', 'KRIYANSH', 'KOTHARI', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'JAIN', '9029747437', 'KOTHARIMILAN335dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '722069806646', 'NEMINATH NAGAR JAIN DERSAN PASE DEESA', 'NEMINATH NAGAR JAIN DERSAN PASE DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44'),
(13, 73, 13, '6', 5, 3, 17, 1, 1, 'KES619700101', 'VANSH', 'SOLANKI', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'SOLANKI', '9712492540', 'SOLANKIMAHESH21dm@GMAIL.COM', '1970-01-01', 'C+', NULL, NULL, NULL, 'NA', NULL, '123456789100', 'RANPUR UGAMNO VAS,DEESA', 'RANPUR UGAMNO VAS,DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44'),
(14, 75, 14, '7', 1, 3, 22, 1, 1, 'KES719700101', 'HRITHIK ', 'PADHIYAR', 'MALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9825670151', 'PADHIYAR906dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '524172032519', 'NEAR RAVI COLD STORAGE BIH SAPTAM BUNGLOWS KANT ROAD DEESA', 'NEAR RAVI COLD STORAGE BIH SAPTAM BUNGLOWS KANT ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39'),
(15, 77, 15, '8', 2, 3, 22, 1, 1, 'KES819700101', 'ROMAN', 'CHAUDHARI', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'CHAUDHARI', '9574469727', 'ROMAN123dm@GMAIL.COM', '1970-01-01', 'C+', NULL, NULL, NULL, 'NA', NULL, '123456789100', '160 PATEL VAS DUGDOL MOTI DEESA', '160 PATEL VAS DUGDOL MOTI DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39'),
(16, 79, 16, '9', 1, 3, 23, 1, 1, 'KES919700101', 'DIVYRAAJ', 'PADHIYAR', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'MALI', '8735000000', 'RAVIHIMALAYdm@GMAIL.COM', '1970-01-01', 'O+', NULL, NULL, NULL, 'NA', NULL, '465931042694', 'KAMLA BHAWAN LACHCHHAJI COLONY LH MALI ROAD DEESA', 'KAMLA BHAWAN LACHCHHAJI COLONY LH MALI ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19'),
(17, 81, 17, '10', 3, 3, 23, 1, 1, 'KES1019700101', 'KANAK', 'SOLANKI', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'SOLANKI', '9898239056', 'SAJANSOLANKI403350dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '123456789100', '4TH BUNGLOW AJAPURA KANT ROAD DEESA', '4TH BUNGLOW AJAPURA KANT ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19'),
(24, 95, 24, '11', 5, 3, 23, 1, 1, 'KES1119700101', 'RIVANS ', 'CHAUDHARY', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'CHAUDHARY', '8000434449', 'NARESHCHAUDHARY.VCSdm@GMAIL.COM', '1970-01-01', 'B-', NULL, NULL, NULL, 'NA', NULL, '123456789100', 'ADITYA PARK HOUSE NO.32 NR VISHWAS HOSPITAL GAYATRI MANDIR DEESA', 'ADITYA PARK HOUSE NO.32 NR VISHWAS HOSPITAL GAYATRI MANDIR DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:36:28', '2024-07-26 13:36:28'),
(25, 97, 25, '12', 2, 3, 23, 1, 1, 'KES1219700101', 'JIYANSHI', 'GADHAVI', 'FEMALE', '1970-01-01', 'ST', 'HINDU', 'CHARAN GADHAVI', '7623844694', 'HINDRA00537dm@GMAIL.COM', '1970-01-01', 'AB-', NULL, NULL, NULL, 'NA', NULL, '217724729198', 'B/37 AMI SOCIETY BEHIND DEEPAK HOTEL KANT ROAD DEESA', 'B/37 AMI SOCIETY BEHIND DEEPAK HOTEL KANT ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29'),
(26, 99, 26, '13', 4, 3, 23, 1, 1, 'KES1319700101', 'PRIYANSHI', 'JAIN', 'FEMALE', '1970-01-01', 'GENERAL', 'HINDU', 'JAIN', '9913127383', 'MEHULJAIN5593dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '815957574968', '37,5TH LANE AMBAR HOUSE MARUTI PARK SOCIETY RANPUR ROAD DEESA', '37,5TH LANE AMBAR HOUSE MARUTI PARK SOCIETY RANPUR ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29'),
(28, 103, 28, '14', 2, 3, 24, 1, 1, 'KES1419700101', 'JIYAN', 'SAVALIYA', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'PATEL', '8140205551', 'JIYAN123dm@GMAIL.COM', '1970-01-01', 'A+', NULL, NULL, NULL, 'NA', NULL, '259133349033', 'SUKHDEV NAGAR 8/1 PART-4 PALANPUR HIGHWAY', 'SUKHDEV NAGAR 8/1 PART-4 PALANPUR HIGHWAY', NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49'),
(29, 105, 29, '15', 7, 3, 24, 1, 1, 'KES1519700101', 'SHIVANSH', 'SAINI', 'MALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '7874738809', 'SHIVANSH123dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '922514582105', 'BORN MIL PANCHAL RAILWAY STATION NI BAJUMA DEESA', 'BORN MIL PANCHAL RAILWAY STATION NI BAJUMA DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49'),
(30, 107, 30, '16', 6, 3, 24, 1, 1, 'KES1619700101', 'RIAANKUMAR', 'SHAH', 'MALE', '1970-01-01', 'GENERAL', 'HINDU', 'JAIN', '7984133674', 'RIYANKOTHARI2018ICLOUDdm@GMAIL.COM', '1970-01-01', 'A+', NULL, NULL, NULL, 'NA', NULL, '268548909986', 'NEMINATH NAGAR PARASH 22 BUNGLOW DEESA', 'NEMINATH NAGAR PARASH 22 BUNGLOW DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49'),
(32, 111, 32, '17', 5, 3, 24, 1, 1, 'KES1719700101', 'RAJVI', 'SOLANKI', 'FEMALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9033907466', 'CHANDRAKANT.SOLANKIOCC325dm@GMAIL.COM', '1970-01-01', 'A+', NULL, NULL, NULL, 'NA', NULL, '696376263630', '22-1 SOLANKI VAS AJAPURA KANT BOYAN DEESA', '22-1 SOLANKI VAS AJAPURA KANT BOYAN DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40'),
(33, 113, 33, '18', 8, 3, 24, 1, 1, 'KES1819700101', 'SHREYAN', 'MALI', 'MALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9895625456', 'SHREYAN123dm@GMAIL.COM', '1970-01-01', 'C+', NULL, NULL, NULL, 'NA', NULL, '478232205250', 'BAJRAN NAGAR DEESA', 'B-602 COOPER STONE HEIGHTS NARODA AHMEDABAD', NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40'),
(35, 117, 35, '19', 4, 3, 24, 1, 1, 'KES1919700101', 'HARSHVARDHAN', 'PADHIYAR', 'MALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9925038188', 'PADHIYARPRATIK906dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '771396438402', 'NR RAVI COLD STORAGE B/H SAPTAM BUNGLOWS KANT ROAD DEESA', 'NR RAVI COLD STORAGE B/H SAPTAM BUNGLOWS KANT ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40'),
(36, 119, 36, '20', 1, 3, 24, 1, 1, 'KES2019700101', 'EVA', 'PADHIYAR', 'FEMALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9825670151', 'RAVIHIMALAYHARSHVARDHANdm@GMAIL.COM', '1970-01-01', 'O+', NULL, NULL, NULL, 'NA', NULL, '820597174555', 'KAMLA BHAWAN LACHCHHAJI COLONY LH MALI ROAD DEESA', 'KAMLA BHAWAN LACHCHHAJI COLONY LH MALI ROAD DEESA', NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40'),
(37, 121, 37, '21', 3, 3, 24, 1, 1, 'KES2119700101', 'HARSH', 'MALI', 'MALE', '1970-01-01', 'OBC', 'HINDU', 'MALI', '9824245858', 'MALIBHAIRAV26dm@GMAIL.COM', '1970-01-01', 'B+', NULL, NULL, NULL, 'NA', NULL, '452939015853', '94 MALI VAS AJAPURA,KANT BHOYAN', '94 MALI VAS AJAPURA,KANT BHOYAN', NULL, NULL, NULL, NULL, '2024-07-26 13:54:40', '2024-07-26 13:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `master_category_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `late_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','partial','paid') NOT NULL DEFAULT 'pending',
  `payment_type` enum('full','emi') NOT NULL DEFAULT 'full',
  `is_custom` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sub_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `std_id`, `subject`, `subject_code`, `description`, `sub_pdf`, `created_at`, `updated_at`) VALUES
(70, 15, 'ENGLISH', 'GU-LK-ENG', 'Gujarati Medium English', 'fwvpdVJxDRJrRYED35QG6MQ507UOEcFsGL8NJCrT.pdf', '2024-07-14 09:37:50', '2024-07-14 09:37:50'),
(71, 15, 'HINDI', 'GU-LK-HIN', 'Gujarati medium HINDI', 'VtJkp3cUI31r6pK4XiMgR2SBFSE5Qvz0wYKPeE0k.pdf', '2024-07-14 09:38:19', '2024-07-14 09:38:19'),
(72, 15, 'GUJARATI', 'GU-LK-GUJ', 'Gujarati Medium GUJARATI', 'iv5cYO0YGAQfB02hRYUxUW2aURHCTxC0LIHsoWDb.pdf', '2024-07-14 09:38:47', '2024-07-14 09:38:47'),
(73, 15, 'MATHS', 'GU-LK-MAT', 'Gujarati Medium MATHS', 'UGwuGDyJC4bdkmFmkVXj324xkrghHLTH0DEBUFnp.pdf', '2024-07-14 09:39:20', '2024-07-14 09:39:20'),
(74, 15, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-LK-ENV', 'Gujarati Medium ENVIRONMENT+SCIENCE EXPERIMENT', 'hrjcrfNQP5WqZ1lNt9DqmTnSXulPNHC9nzrYxutv.pdf', '2024-07-14 09:39:50', '2024-07-14 09:39:50'),
(75, 15, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-LK-IDP', 'Gujarati Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'FeZil8BZw0B3uokySTcSH1dM6hEeRJqWxvfIQa36.pdf', '2024-07-14 09:40:18', '2024-07-14 09:40:18'),
(76, 15, 'PANCHAMRUT SUBJECT DOLL HOUSE + ACTIVITY+ SENSORY DEVELOPMENT +  WATER PLAY & SAND PLAY + GAME & YOGA', 'GU-LK-PAN', 'Gujarati Medium PANCHAMRUT SUBJECT DOLL HOUSE + ACTIVITY+ SENSORY DEVELOPMENT +  WATER PLAY & SAND PLAY + GAME & YOGA', 'pgGYpytS2txbTkgk2U1D9DsrKfoX7neKkvNNfbGO.pdf', '2024-07-14 09:40:48', '2024-07-14 09:40:48'),
(77, 15, 'ART & CRAFT', 'GU-LK-ART', 'Gujarati Medium ART & CRAFT', 'T2oi8XF46WF3uuGT2axHmuAiqhbz6AZg6sXOhP6O.pdf', '2024-07-14 09:41:13', '2024-07-14 09:41:13'),
(78, 15, 'MUSIC', 'GU-LK-MUS', 'Gujarati Medium MUSIC', 'MWvIfSh8AvRJVqeFhSUaMnru7rYnz5UajIuKRgn8.pdf', '2024-07-14 09:41:38', '2024-07-14 09:41:38'),
(79, 15, 'BREAK FAST', 'GU-LK-BRE', 'Gujarati Medium BREAK FAST', '1TXNk244s5ZbZqs4I8cy6O1lc8OlXzQwN1rmSBDA.pdf', '2024-07-14 09:42:10', '2024-07-14 09:42:10'),
(80, 22, 'ENGLISH', 'EN-LK-ENG', 'English Medium ENGLISH', 'j56ocoOz9ALTPG2zIrz0nmTeFB5rRtuycR50rDQ0.pdf', '2024-07-14 09:44:21', '2024-07-14 09:44:21'),
(81, 22, 'HINDI', 'EN-LK-HIN', 'English Medium HINDI', 'Dvz1AnEhob8GlxxY7ZOeFuhAai4aC2rjtDrbirwW.pdf', '2024-07-14 09:44:50', '2024-07-15 07:21:30'),
(82, 22, 'GUJARATI', 'EN-LK-GUJ', 'English Medium GUJARATI', '8Z189Pq3hSXM5e2p2S7KNAGY9RVrukfLEmQ4rauz.pdf', '2024-07-14 09:45:13', '2024-07-15 07:22:31'),
(83, 22, 'MATHS', 'EN-LK-MAT', 'English Medium MATHS', 'OPegNTqGxMGlaZVF4daoja6HuSMa3i1JqzXMDS0z.pdf', '2024-07-14 09:45:35', '2024-07-15 07:23:06'),
(84, 22, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-LK-ENV', 'English Medium ENVIRONMENT+SCIENCE EXPERIMENT', 'zhaEPlXvsoT4nU05COR8vWCzTiuqHPsw5vobJaDn.pdf', '2024-07-14 09:46:04', '2024-07-15 07:23:34'),
(85, 22, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-LK-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'ZHCPLFPG6qeR3S8GsEyTz2t9NuuntDNR3b7MAtcE.pdf', '2024-07-14 09:46:32', '2024-07-15 07:24:34'),
(86, 22, 'PANCHAMRUT SUBJECT DOLL HOUSE + ACTIVITY+ SENSORY DEVELOPMENT +  WATER PLAY & SAND PLAY + GAME & YOGA', 'EN-LK-PAN', 'English Medium PANCHAMRUT SUBJECT DOLL HOUSE + ACTIVITY+ SENSORY DEVELOPMENT +  WATER PLAY & SAND PLAY + GAME & YOGA', 'Ua55eubQfsA8LCQtnWgSnwEswj0FYlJAe07yshP1.pdf', '2024-07-14 09:46:54', '2024-07-15 07:24:55'),
(87, 22, 'ART & CRAFT', 'EN-LK-ART', 'English Medium ART & CRAFT', 'NeTZemdowQAk9iYJ2NaiCmyN5daWXiwURvYDNE1g.pdf', '2024-07-14 09:47:17', '2024-07-15 07:25:19'),
(88, 22, 'MUSIC', 'EN-LK-MUS', 'English Medium MUSIC', 'woBkEGSUhqvoSlZQojD6MOh0Vwrr2ay1orZVdfso.pdf', '2024-07-14 09:47:42', '2024-07-15 07:25:59'),
(89, 22, 'BREAK FAST', 'EN-LK-BRE', 'English Medium BREAK FAST', 'zjJtIlLWN54JvDwUN9EuxdD6NcblhY8HzJCvNkcX.pdf', '2024-07-14 09:48:15', '2024-07-15 07:25:38'),
(90, 19, 'ENGLISH', 'GU-NU-ENG', 'Gujarati Medium English', NULL, '2024-07-15 07:31:23', '2024-07-15 07:42:53'),
(91, 19, 'HINDI', 'GU-NU-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-15 07:31:57', '2024-07-15 07:43:22'),
(93, 19, 'GUJARATI', 'GU-NU-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-15 07:33:11', '2024-07-15 07:43:41'),
(94, 19, 'MATHS', 'GU-NU-MAT', 'Gujarati Medium Maths', NULL, '2024-07-15 07:34:27', '2024-07-15 07:43:58'),
(95, 19, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-NU-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 07:35:25', '2024-07-15 07:44:26'),
(96, 19, 'IDP / CIVIC SENSE', 'GU-NU-IDP', 'Gujarati Medium IDP & Civic Sense', NULL, '2024-07-15 07:36:40', '2024-07-15 07:45:01'),
(97, 19, 'PANCHAMRUT SUBJECT - DOLL HOUSE/ACTIVITY/  SENSORY DEVELOPMENT/ WATER PLAY & SAND PLAY / GAME', 'GU-NU-PAN', 'Gujarati Medium PANCHAMRUT SUBJECT - DOLL HOUSE/ACTIVITY/  SENSORY DEVELOPMENT/ WATER PLAY & SAND PLAY / GAME', NULL, '2024-07-15 07:39:20', '2024-07-15 07:55:45'),
(98, 19, 'ART & CRAFT', 'GU-NU-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-15 07:40:08', '2024-07-15 07:45:53'),
(99, 19, 'MUSIC', 'GU-NU-MUS', 'Gujarati Medium Music', NULL, '2024-07-15 07:40:39', '2024-07-15 07:46:19'),
(100, 19, 'BREAK FAST', 'GU-NU-BRE', 'Gujarati Medium Breack Fast', NULL, '2024-07-15 07:41:44', '2024-07-15 07:46:41'),
(101, 17, 'ENGLISH', 'EN-NU-ENG', 'English Medium English', NULL, '2024-07-15 07:47:40', '2024-07-15 07:47:40'),
(102, 17, 'HINDI', 'EN-NU-HIN', 'English Medium Hindi', NULL, '2024-07-15 07:48:27', '2024-07-15 07:48:27'),
(103, 17, 'GUJARATI', 'EN-NU-GUJ', 'English Medium Gujarati', NULL, '2024-07-15 07:48:59', '2024-07-15 07:48:59'),
(104, 17, 'MATHS', 'EN-NU-MAT', 'English Medium Maths', NULL, '2024-07-15 07:49:25', '2024-07-15 07:49:25'),
(105, 17, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-NU-ENV', 'English Medium Environment & Science Experiment', NULL, '2024-07-15 07:50:32', '2024-07-15 07:50:32'),
(106, 17, 'IDP / CIVIC SENSE', 'EN-NU-IDP', 'English Medium IDP & Civic Sense', NULL, '2024-07-15 07:52:07', '2024-07-15 07:52:07'),
(107, 17, 'PANCHAMRUT SUBJECT - DOLL HOUSE/ACTIVITY/  SENSORY DEVELOPMENT/ WATER PLAY & SAND PLAY / GAME', 'EN-NU-PAN', 'English Medium Panchamrut Subjects-Doll House+Activity+Sensory+Water Play & Sand Play+ Development+Game', NULL, '2024-07-15 07:54:55', '2024-07-15 07:54:55'),
(108, 17, 'ART & CRAFT', 'EN-NU-ART', 'English Medium Art & Craft', NULL, '2024-07-15 07:57:33', '2024-07-15 07:57:33'),
(109, 17, 'MUSIC', 'EN-NU-MUS', 'English Medium Music', NULL, '2024-07-15 07:58:08', '2024-07-15 07:58:08'),
(110, 17, 'BREAK FAST', 'EN-NU-BRE', 'English Medium Break Fast', NULL, '2024-07-15 07:58:42', '2024-07-15 07:58:42'),
(111, 16, 'ENGLISH', 'GU-UK-ENG', 'Gujarati Medium English', NULL, '2024-07-15 07:59:27', '2024-07-15 07:59:27'),
(112, 16, 'HINDI', 'GU-UK-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-15 08:00:18', '2024-07-15 08:00:18'),
(113, 16, 'GUJARATI', 'GU-UK-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-15 08:00:45', '2024-07-15 08:00:45'),
(114, 16, 'MATHS', 'GU-UK-MAT', 'English Medium Maths', NULL, '2024-07-15 08:01:52', '2024-07-15 08:01:52'),
(115, 16, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-UK-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 08:02:16', '2024-07-15 08:02:16'),
(116, 16, 'IDP / CIVIC SENSE', 'GU-UK-IDP', 'Gujarati Medium IDP & Civic Sense', NULL, '2024-07-15 08:02:48', '2024-07-15 08:02:48'),
(117, 16, 'PANCHAMRUT SUBJECT - DOLL HOUSE/ACTIVITY/  SENSORY DEVELOPMENT/ WATER PLAY & SAND PLAY / GAME', 'GU-UK-PAN', 'Gujarati Medium Panchamrut Subject-Doll House+Activity+Sensory+Water Play & Sand Play+Game Development+', NULL, '2024-07-15 08:04:21', '2024-07-15 08:04:21'),
(118, 16, 'ART & CRAFT', 'GU-UK-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-15 08:05:13', '2024-07-15 08:05:13'),
(119, 16, 'MUSIC', 'GU-UK-MUS', 'Gujarati Medium Music', NULL, '2024-07-15 08:05:40', '2024-07-15 08:05:40'),
(120, 16, 'BREAK FAST', 'GU-UK-BRE', 'Gujarati Medium Breack Fast', NULL, '2024-07-15 08:06:03', '2024-07-15 08:06:03'),
(121, 23, 'ENGLISH', 'EN-UK-ENG', 'English Medium English', NULL, '2024-07-15 08:07:09', '2024-07-15 08:07:09'),
(122, 23, 'HINDI', 'EN-UK-HIN', 'English Medium Hindi', NULL, '2024-07-15 08:08:01', '2024-07-15 08:08:01'),
(123, 23, 'GUJARATI', 'EN-UK-GUJ', 'English Medium Gujarati', NULL, '2024-07-15 08:08:29', '2024-07-15 08:08:29'),
(124, 23, 'MATHS', 'EN-UK-MAT', 'English Medium Maths', NULL, '2024-07-15 08:08:51', '2024-07-15 08:08:51'),
(125, 23, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-UK-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 08:09:10', '2024-07-15 08:09:10'),
(126, 23, 'IDP / CIVIC SENSE', 'EN-UK-IDP', 'English Medium IDP & Civic Sense', NULL, '2024-07-15 08:09:52', '2024-07-15 08:09:52'),
(127, 23, 'PANCHAMRUT SUBJECT - DOLL HOUSE/ACTIVITY/  SENSORY DEVELOPMENT/ WATER PLAY & SAND PLAY / GAME', 'EN-UK-PAN', 'English Medium Panchamrut Subjects-Doll House+Activity+Sensory+Water Play & Sand Play+ Development+Game', NULL, '2024-07-15 08:10:33', '2024-07-15 08:10:33'),
(128, 23, 'ART & CRAFT', 'EN-UK-ART', 'English Medium Art & Craft', NULL, '2024-07-15 08:11:03', '2024-07-15 08:11:03'),
(129, 23, 'MUSIC', 'EN-UK-MUS', 'English Medium Music', NULL, '2024-07-15 08:11:31', '2024-07-15 08:11:31'),
(130, 23, 'BREAK FAST', 'EN-UK-BRE', 'English Medium Break Fast', NULL, '2024-07-15 08:11:59', '2024-07-15 08:11:59'),
(131, 26, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-15 08:13:09', '2024-07-15 08:13:09'),
(132, 26, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-15 08:13:34', '2024-07-15 08:13:34'),
(133, 26, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-15 08:14:19', '2024-07-15 08:14:19'),
(134, 26, 'MATHS', 'GU-ST-MAT', 'English Medium Maths', NULL, '2024-07-15 08:14:39', '2024-07-15 08:14:39'),
(135, 26, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 08:14:58', '2024-07-15 08:14:58'),
(136, 26, 'IDP / CIVIC SENSE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense', NULL, '2024-07-15 08:18:22', '2024-07-15 08:18:22'),
(137, 26, 'ART & CRAFT', 'GU-ST-YOG', 'Gujarati Medium Art & Craft', NULL, '2024-07-15 08:19:37', '2024-07-15 08:21:43'),
(138, 26, 'HAND WRITING IMPROVEMENT', 'GU-ST-HAN', 'Gujarati Medium Hand Writing Improvement', NULL, '2024-07-15 08:23:36', '2024-07-15 08:23:36'),
(139, 26, 'MUSIC', 'GU-ST-MUS', 'English Medium Music', NULL, '2024-07-15 08:24:05', '2024-07-15 08:24:05'),
(140, 26, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-15 08:24:46', '2024-07-15 08:24:46'),
(141, 26, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 08:25:54', '2024-07-15 11:25:43'),
(142, 26, 'SPORTS & TOURNAMENT', 'GU-ST-SPO', 'Gujarati Medium Sports & Tournment', NULL, '2024-07-15 08:27:01', '2024-07-15 08:27:01'),
(143, 26, 'DANCE & TALENT SEARCH', 'GU-ST-DAN', 'Gujarati Medium Dance & Talent Search', NULL, '2024-07-15 08:28:08', '2024-07-15 08:28:08'),
(144, 26, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-15 08:29:19', '2024-07-15 08:29:19'),
(145, 26, 'BREAK FAST', 'GU-ST-BRE', 'Gujarati Medium Breack Fast', NULL, '2024-07-15 08:29:56', '2024-07-15 08:29:56'),
(146, 24, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-15 08:31:19', '2024-07-15 08:31:19'),
(147, 24, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-15 08:31:48', '2024-07-15 08:31:48'),
(148, 24, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-15 08:32:12', '2024-07-15 08:32:12'),
(149, 24, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-15 08:32:31', '2024-07-15 08:32:31'),
(150, 24, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-ST-ENV', 'English Medium Environment & Science Experiment', NULL, '2024-07-15 08:33:06', '2024-07-15 08:33:06'),
(151, 24, 'IDP / CIVIC SENSE', 'EN-ST-IDP', 'English Medium IDP & Civic Sense', NULL, '2024-07-15 08:33:32', '2024-07-15 08:33:32'),
(152, 24, 'ART & CRAFT', 'EN-ST-ART', 'English Medium Art & Craft', NULL, '2024-07-15 08:37:58', '2024-07-15 08:37:58'),
(153, 24, 'HAND WRITING IMPROVEMENT', 'EN-ST-HAN', 'English Medium Hand Writing Improvement', NULL, '2024-07-15 08:38:49', '2024-07-15 08:38:49'),
(154, 24, 'MUSIC', 'EN-ST-MUS', 'English Medium Music', NULL, '2024-07-15 08:39:32', '2024-07-15 08:39:32'),
(155, 24, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-15 08:40:25', '2024-07-15 08:40:25'),
(156, 24, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 08:43:38', '2024-07-15 11:25:07'),
(157, 24, 'SPORTS & TOURNAMENT', 'EN-ST-SPO', 'English Medium Sports & Tournament', NULL, '2024-07-15 08:44:17', '2024-07-15 08:44:17'),
(158, 24, 'DANCE & TALENT SEARCH', 'EN-ST-DAN', 'English Medium Dance & Talent Search', NULL, '2024-07-15 08:45:24', '2024-07-15 08:45:24'),
(159, 24, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-15 08:46:01', '2024-07-15 08:46:01'),
(160, 24, 'BREAK FAST', 'EN-ST-BRE', 'English Medium Break Fast', NULL, '2024-07-15 08:46:32', '2024-07-15 08:46:32'),
(161, 27, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-15 08:47:11', '2024-07-15 08:47:11'),
(162, 27, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-15 08:47:45', '2024-07-15 08:47:45'),
(163, 27, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-15 08:48:27', '2024-07-15 08:48:27'),
(164, 27, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-15 08:49:08', '2024-07-15 08:49:08'),
(165, 27, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 08:49:26', '2024-07-15 08:49:26'),
(166, 27, 'IDP / CIVIC SENSE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense', NULL, '2024-07-15 08:50:01', '2024-07-15 08:50:01'),
(167, 27, 'ART & CRAFT', 'GU-ST-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-15 08:50:34', '2024-07-15 08:50:34'),
(168, 27, 'HAND WRITING IMPROVEMENT', 'GU-ST-HAN', 'Gujarati Medium Hand Writing Improvement', NULL, '2024-07-15 08:50:55', '2024-07-15 08:50:55'),
(169, 27, 'MUSIC', 'GU-ST-MUS', 'Gujarati Medium Music', NULL, '2024-07-15 08:51:21', '2024-07-15 08:51:21'),
(170, 27, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-15 08:51:52', '2024-07-15 08:51:52'),
(171, 27, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 08:52:33', '2024-07-15 11:24:23'),
(172, 27, 'SPORTS & TOURNAMENT', 'GU-ST-SPO', 'Gujarati Medium Sports & Tournment', NULL, '2024-07-15 08:53:02', '2024-07-15 08:53:02'),
(173, 27, 'DANCE & TALENT SEARCH', 'GU-ST-DAN', 'Gujarati Medium Dance & Talent Search', NULL, '2024-07-15 08:53:32', '2024-07-15 08:53:32'),
(174, 27, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-15 08:54:01', '2024-07-15 08:54:01'),
(175, 27, 'BREAK FAST', 'GU-ST-BRE', 'Gujarati Medium Breack Fast', NULL, '2024-07-15 08:54:26', '2024-07-15 08:54:26'),
(176, 25, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-15 08:54:51', '2024-07-15 08:54:51'),
(177, 25, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-15 08:55:45', '2024-07-15 08:55:45'),
(178, 25, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-15 08:56:19', '2024-07-15 08:56:19'),
(179, 25, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-15 08:56:42', '2024-07-15 08:56:42'),
(180, 25, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-ST-ENV', 'English Medium Environment & Science Experiment', NULL, '2024-07-15 08:57:09', '2024-07-15 08:57:09'),
(181, 25, 'IDP / CIVIC SENSE', 'EN-ST-IDP', 'English Medium IDP & Civic Sense', NULL, '2024-07-15 08:57:39', '2024-07-15 08:57:39'),
(182, 25, 'ART & CRAFT', 'EN-ST-ART', 'English Medium Art & Craft', NULL, '2024-07-15 08:58:16', '2024-07-15 08:58:16'),
(183, 25, 'HAND WRITING IMPROVEMENT', 'EN-ST-HAN', 'English Medium Hand Writing Improvement', NULL, '2024-07-15 08:58:38', '2024-07-15 08:58:38'),
(184, 25, 'MUSIC', 'EN-ST-MUS', 'English Medium Music', NULL, '2024-07-15 08:59:07', '2024-07-15 08:59:07'),
(185, 25, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-15 08:59:28', '2024-07-15 08:59:28'),
(186, 25, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 08:59:59', '2024-07-15 11:23:50'),
(187, 25, 'SPORTS & TOURNAMENT', 'EN-ST-SPO', 'English Medium Sports & Tournament', NULL, '2024-07-15 09:00:22', '2024-07-15 09:00:22'),
(188, 25, 'DANCE & TALENT SEARCH', 'EN-ST-DAN', 'English Medium Dance & Talent Search', NULL, '2024-07-15 09:00:49', '2024-07-15 09:00:49'),
(189, 25, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-15 09:01:17', '2024-07-15 09:01:17'),
(190, 25, 'BREAK FAST', 'EN-ST-BRE', 'English Medium Break Fast', NULL, '2024-07-15 09:01:41', '2024-07-15 09:01:41'),
(191, 40, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-15 11:01:31', '2024-07-15 11:01:31'),
(192, 40, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-15 11:02:05', '2024-07-15 11:02:05'),
(193, 40, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-15 11:02:39', '2024-07-15 11:02:39'),
(194, 40, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-15 11:03:10', '2024-07-15 11:03:10'),
(195, 40, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-15 11:03:44', '2024-07-15 11:03:44'),
(196, 40, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 11:04:11', '2024-07-15 11:04:11'),
(197, 40, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-15 11:05:18', '2024-07-15 11:05:18'),
(198, 40, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-15 11:05:59', '2024-07-15 11:05:59'),
(199, 40, 'ART & CRAFT', 'GU-ST-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-15 11:06:28', '2024-07-15 11:06:28'),
(200, 40, 'MUSIC', 'GU-ST-MUS', 'Gujarati Medium Music', NULL, '2024-07-15 11:06:52', '2024-07-15 11:06:52'),
(201, 40, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-15 11:07:19', '2024-07-15 11:07:19'),
(202, 40, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 11:08:18', '2024-07-15 11:08:18'),
(203, 40, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-15 11:11:46', '2024-07-15 11:11:46'),
(204, 40, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-15 11:12:37', '2024-07-15 11:12:37'),
(205, 28, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-15 11:13:14', '2024-07-15 11:15:38'),
(206, 28, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-15 11:13:39', '2024-07-15 11:15:57'),
(207, 28, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-15 11:14:05', '2024-07-15 11:16:45'),
(208, 28, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-15 11:14:31', '2024-07-15 11:16:18'),
(209, 28, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-15 11:14:53', '2024-07-15 11:17:04'),
(210, 28, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-15 11:17:49', '2024-07-15 11:17:49'),
(211, 28, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-15 11:18:22', '2024-07-15 11:18:22'),
(212, 28, 'COMPUTER', 'EN-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-15 11:19:03', '2024-07-15 11:19:03'),
(213, 28, 'ART & CRAFT', 'EN-ST-ART', 'English Medium Art & Craft', NULL, '2024-07-15 11:19:47', '2024-07-15 11:19:47'),
(214, 28, 'MUSIC', 'EN-ST-MUS', 'English Medium Music', NULL, '2024-07-15 11:20:17', '2024-07-15 11:20:17'),
(215, 28, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-15 11:20:40', '2024-07-15 11:20:40'),
(216, 28, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-15 11:21:12', '2024-07-15 11:21:12'),
(217, 28, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-15 11:22:14', '2024-07-15 11:22:14'),
(218, 28, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-15 11:22:37', '2024-07-15 11:22:37'),
(219, 41, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 03:16:39', '2024-07-16 03:16:39'),
(220, 41, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 03:18:13', '2024-07-16 03:18:13'),
(221, 41, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 03:18:33', '2024-07-16 03:18:33'),
(222, 41, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 03:19:16', '2024-07-16 03:19:16'),
(223, 41, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 03:19:41', '2024-07-16 03:19:41'),
(224, 41, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-16 03:20:02', '2024-07-16 03:20:02'),
(225, 41, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 03:20:40', '2024-07-16 03:20:40'),
(226, 41, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 03:21:18', '2024-07-16 03:21:18'),
(227, 41, 'ART & CRAFT', 'GU-ST-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-16 03:21:46', '2024-07-16 03:21:46'),
(228, 41, 'MUSIC', 'GU-ST-MUS', 'Gujarati Medium Music', NULL, '2024-07-16 03:22:16', '2024-07-16 03:22:16'),
(229, 41, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-16 03:22:56', '2024-07-16 03:22:56'),
(230, 41, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga + Physical Education + Scout & Guide', NULL, '2024-07-16 03:23:56', '2024-07-16 03:23:56'),
(231, 41, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 03:24:28', '2024-07-16 03:24:28'),
(232, 41, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 03:24:58', '2024-07-16 03:24:58'),
(233, 29, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 03:25:20', '2024-07-16 03:25:20'),
(234, 29, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 03:25:44', '2024-07-16 03:25:44'),
(235, 29, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 03:26:20', '2024-07-16 03:26:20'),
(236, 29, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 03:26:48', '2024-07-16 03:26:48'),
(237, 29, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 03:27:25', '2024-07-16 03:27:25'),
(238, 29, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-ST-ENV', 'English Medium Environment & Science Experiment', NULL, '2024-07-16 03:27:50', '2024-07-16 03:27:50'),
(239, 29, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 03:28:22', '2024-07-16 03:28:22'),
(240, 29, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 03:29:26', '2024-07-16 03:29:26'),
(241, 29, 'ART & CRAFT', 'EN-ST-ART', 'English Medium Art & Craft', NULL, '2024-07-16 03:29:53', '2024-07-16 03:29:53'),
(242, 29, 'MUSIC', 'EN-ST-MUS', 'English Medium Music', NULL, '2024-07-16 03:30:17', '2024-07-16 03:30:17'),
(243, 29, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-16 03:30:46', '2024-07-16 03:30:46'),
(244, 29, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 03:31:13', '2024-07-16 03:31:13'),
(245, 29, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 03:31:42', '2024-07-16 03:31:42'),
(246, 29, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 03:32:13', '2024-07-16 03:32:13'),
(247, 42, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 06:18:46', '2024-07-16 06:18:46'),
(248, 42, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 06:19:13', '2024-07-16 06:19:13'),
(249, 42, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 06:19:40', '2024-07-16 06:19:40'),
(250, 42, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 06:20:53', '2024-07-16 06:20:53'),
(251, 42, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 06:21:24', '2024-07-16 06:21:24'),
(252, 42, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'GU-ST-ENV', 'Gujarati Medium Environment & Science Experiments', NULL, '2024-07-16 06:21:59', '2024-07-16 06:21:59'),
(253, 42, 'IDP / CIVIC SENSE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 06:22:47', '2024-07-16 06:22:47'),
(254, 42, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 06:23:30', '2024-07-16 06:23:30'),
(255, 42, 'ART & CRAFT', 'GU-ST-ART', 'Gujarati Medium Art & Craft', NULL, '2024-07-16 06:23:57', '2024-07-16 06:23:57'),
(256, 42, 'MUSIC', 'GU-ST-MUS', 'Gujarati Medium Music', NULL, '2024-07-16 06:24:20', '2024-07-16 06:24:20'),
(257, 42, 'CLUB', 'GU-ST-CLU', 'English Medium Club', NULL, '2024-07-16 06:24:50', '2024-07-16 06:24:50'),
(258, 42, 'YOGA+PE+SCOUT & GUIDEv', 'GU-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 06:25:39', '2024-07-16 06:25:39'),
(259, 42, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 06:26:10', '2024-07-16 06:26:10'),
(260, 42, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 06:26:39', '2024-07-16 06:26:39'),
(261, 30, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 06:27:19', '2024-07-16 06:27:19'),
(262, 30, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 06:27:48', '2024-07-16 06:27:48'),
(263, 30, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 06:28:27', '2024-07-16 06:28:27'),
(264, 30, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 06:28:49', '2024-07-16 06:28:49'),
(265, 30, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 06:29:45', '2024-07-16 06:29:45'),
(266, 30, 'ENVIRONMENT+SCIENCE EXPERIMENT', 'EN-ST-ENV', 'English Medium Environment & Science Experiment', NULL, '2024-07-16 06:30:16', '2024-07-16 06:30:16'),
(267, 30, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 06:30:54', '2024-07-16 06:30:54'),
(268, 30, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 06:31:26', '2024-07-16 06:31:26'),
(269, 30, 'ART & CRAFT', 'EN-ST-ART', 'English Medium Art & Craft', NULL, '2024-07-16 06:32:29', '2024-07-16 06:32:29'),
(270, 30, 'MUSIC', 'EN-ST-MUS', 'English Medium Music', NULL, '2024-07-16 06:34:19', '2024-07-16 06:34:19'),
(271, 30, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-16 06:35:21', '2024-07-16 06:35:21'),
(272, 30, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 06:36:40', '2024-07-28 09:40:40'),
(273, 30, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 06:39:40', '2024-07-16 06:39:40'),
(274, 30, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 06:40:10', '2024-07-16 06:40:10'),
(275, 43, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 07:27:41', '2024-07-16 07:27:41'),
(276, 43, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 07:28:23', '2024-07-16 07:28:23'),
(277, 43, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 07:29:01', '2024-07-16 07:29:01'),
(278, 43, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 07:29:39', '2024-07-16 07:29:39'),
(279, 43, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 07:45:16', '2024-07-16 07:45:16'),
(280, 43, 'PHYSICS', 'GU-ST-PHY', 'Gujarati Medium Physics', NULL, '2024-07-16 07:45:50', '2024-07-16 07:45:50'),
(281, 43, 'CHEMISTRY', 'GU-ST-CHE', 'Gujarati Medium Chemistry', NULL, '2024-07-16 07:46:36', '2024-07-16 07:46:36'),
(282, 43, 'BIOLOGY', 'GU-ST-BIO', 'Gujarati Medium Biology', NULL, '2024-07-16 07:47:05', '2024-07-16 07:47:05'),
(283, 43, 'SOCIAL SCIENCE', 'GU-ST-SOC', 'Gujarati Medium Social Science', NULL, '2024-07-16 07:47:55', '2024-07-16 07:47:55'),
(284, 43, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 07:48:34', '2024-07-16 07:48:34'),
(285, 43, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 07:50:17', '2024-07-16 07:50:17'),
(286, 43, 'YOGA+PE+SCOUT & GUIDEv', 'GU-ST-YOG', 'Gujarati Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 07:50:53', '2024-07-16 07:50:53'),
(287, 43, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 07:51:17', '2024-07-16 07:51:17'),
(288, 43, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 07:51:51', '2024-07-16 07:51:51'),
(289, 43, 'CLUB', 'GU-ST-ART', 'Gujarati Medium Club', NULL, '2024-07-16 07:52:20', '2024-07-16 08:07:12'),
(290, 43, 'OPTIONAL SUB. - ART & CRAFT', 'GU-ST-MUS', 'Gujarati Medium optional sub. - Art & Craft', NULL, '2024-07-16 07:53:12', '2024-07-16 08:08:30'),
(291, 43, 'OPTIONAL SUB. - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Music', NULL, '2024-07-16 08:09:51', '2024-07-16 08:09:51'),
(292, 31, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 08:10:50', '2024-07-16 08:10:50'),
(293, 31, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 08:11:19', '2024-07-16 08:11:19'),
(294, 31, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 08:11:48', '2024-07-16 08:11:48'),
(295, 31, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 08:12:15', '2024-07-16 08:12:15'),
(296, 31, 'MATHS', 'EN-ST-MAT', 'English Medium MATHS', NULL, '2024-07-16 08:12:52', '2024-07-16 08:12:52'),
(297, 31, 'PHYSICS', 'EN-ST-PHY', 'English Medium Physics', NULL, '2024-07-16 08:13:37', '2024-07-16 08:13:37'),
(298, 31, 'CHEMISTRY', 'EN-ST-CHE', 'English Medium Chemistry', NULL, '2024-07-16 08:14:05', '2024-07-16 08:14:05'),
(299, 31, 'BIOLOGY', 'EN-ST-BIO', 'English Medium Biology', NULL, '2024-07-16 08:14:40', '2024-07-16 08:14:40'),
(300, 31, 'SOCIAL SCIENCE', 'EN-ST-SOC', 'English Medium Social SCi.', NULL, '2024-07-16 08:15:22', '2024-07-16 08:15:22'),
(301, 31, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 08:15:56', '2024-07-16 08:15:56'),
(302, 31, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 08:16:40', '2024-07-16 08:16:40'),
(303, 31, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 08:17:21', '2024-07-16 08:17:21'),
(304, 31, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 08:17:49', '2024-07-16 08:17:49'),
(305, 31, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 08:18:19', '2024-07-16 08:18:19'),
(306, 31, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-16 08:18:51', '2024-07-16 08:18:51'),
(307, 31, 'OPTIONAL SUB. - ART & CRAFT', 'EN-ST-OPT', 'English Medium Optional Sub. Art & Craft', NULL, '2024-07-16 08:19:42', '2024-07-16 08:19:42'),
(308, 31, 'OPTIONAL SUB. - MUSIC', 'EN-ST-OPT', 'English Medium Optional Sub. Music', NULL, '2024-07-16 08:20:18', '2024-07-16 08:20:18'),
(309, 44, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 08:21:25', '2024-07-16 08:21:25'),
(310, 44, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 08:21:54', '2024-07-16 08:21:54'),
(311, 44, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 08:22:20', '2024-07-16 08:22:20'),
(312, 44, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 08:22:45', '2024-07-16 08:22:45'),
(313, 44, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 08:23:12', '2024-07-16 08:23:12'),
(314, 44, 'PHYSICS', 'GU-ST-PHY', 'Gujarati Medium Physics', NULL, '2024-07-16 08:23:36', '2024-07-16 08:23:36'),
(315, 44, 'CHEMISTRY', 'GU-ST-CHE', 'Gujarati Medium Chemistry', NULL, '2024-07-16 08:24:02', '2024-07-16 08:24:02'),
(316, 44, 'SOCIAL SCIENCE', 'GU-ST-SOC', 'Gujarati Medium Social Science', NULL, '2024-07-16 08:24:38', '2024-07-16 08:24:38'),
(317, 44, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 08:25:20', '2024-07-16 08:25:20'),
(318, 44, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 08:25:53', '2024-07-16 08:25:53'),
(319, 44, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga + Physical Education + Scout & Guide', NULL, '2024-07-16 08:26:33', '2024-07-16 08:26:33'),
(320, 44, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 08:27:17', '2024-07-16 08:27:17'),
(321, 44, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 08:27:41', '2024-07-16 08:27:41'),
(322, 44, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-16 08:29:26', '2024-07-16 08:29:26'),
(323, 44, 'OPTIONAL SUB. - ART & CRAFT', 'GU-ST-OPT', 'Gujarati Medium optional sub. - Art & Craft', NULL, '2024-07-16 08:29:54', '2024-07-16 08:29:54'),
(324, 44, 'OPTIONAL SUB. - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Music', NULL, '2024-07-16 08:30:18', '2024-07-16 08:30:18'),
(325, 32, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 08:31:28', '2024-08-04 05:38:49'),
(326, 32, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 08:31:50', '2024-07-16 08:31:50'),
(327, 32, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 08:32:09', '2024-07-16 08:32:09'),
(328, 32, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 08:32:33', '2024-07-16 08:32:33'),
(329, 32, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 08:33:05', '2024-07-16 08:33:05'),
(330, 32, 'PHYSICS', 'EN-ST-PHY', 'English Medium Physics', NULL, '2024-07-16 08:33:27', '2024-07-16 08:33:27'),
(331, 32, 'CHEMISTRY', 'EN-ST-CHE', 'English Medium Chemistry', NULL, '2024-07-16 08:33:52', '2024-07-16 08:33:52'),
(332, 32, 'BIOLOGY', 'EN-ST-BIO', 'English Medium Biology', NULL, '2024-07-16 08:34:17', '2024-07-16 08:34:17'),
(333, 32, 'SOCIAL SCIENCE', 'EN-ST-SOC', 'English Medium Social SCi.', NULL, '2024-07-16 08:34:46', '2024-07-16 08:34:46'),
(334, 32, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 08:35:10', '2024-07-16 08:35:10'),
(335, 32, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 08:35:47', '2024-07-16 08:35:47'),
(336, 32, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 08:36:17', '2024-07-16 08:36:17'),
(337, 32, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 08:36:45', '2024-07-16 08:36:45'),
(338, 32, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 08:37:06', '2024-07-16 08:37:06'),
(339, 32, 'CLUB', 'EN-ST-OPT', 'English Medium Club', NULL, '2024-07-16 08:37:29', '2024-07-16 08:39:23'),
(340, 32, 'OPTIONAL SUB. - ART & CRAFT', 'EN-ST-OPT', 'English Medium Optional Sub. Art & Craft', NULL, '2024-07-16 08:37:54', '2024-07-16 08:39:50'),
(341, 32, 'OPTIONAL SUB. - MUSIC', 'EN-ST-OPT', 'English Medium Optional Sub. Music', NULL, '2024-07-16 08:40:15', '2024-07-16 08:40:15'),
(342, 44, 'BIOLOGY', 'GU-ST-BIO', 'Gujarati Medium Biology', NULL, '2024-07-16 09:03:25', '2024-07-16 09:03:25'),
(343, 46, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 09:03:56', '2024-07-16 09:03:56'),
(344, 46, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 09:04:23', '2024-07-16 09:04:23'),
(345, 46, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 09:04:57', '2024-07-16 09:04:57'),
(346, 46, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 09:05:22', '2024-07-16 09:05:22'),
(347, 46, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 09:14:30', '2024-07-16 09:14:30'),
(348, 46, 'PHYSICS', 'GU-ST-PHY', 'Gujarati Medium Physics', NULL, '2024-07-16 09:14:53', '2024-07-16 09:14:53'),
(349, 46, 'BIOLOGY', 'GU-ST-BIO', 'Gujarati Medium Biology', NULL, '2024-07-16 09:15:16', '2024-07-16 09:15:16'),
(350, 46, 'SOCIAL SCIENCE', 'GU-ST-SOC', 'Gujarati Medium Social Science', NULL, '2024-07-16 09:15:48', '2024-07-16 09:15:48'),
(351, 46, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 09:16:14', '2024-07-16 09:16:14'),
(352, 46, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 09:16:56', '2024-07-16 09:16:56'),
(353, 46, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-YOG', 'Gujarati Medium Yoga + Physical Education + Scout & Guide', NULL, '2024-07-16 09:17:31', '2024-07-16 09:17:31'),
(354, 46, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 09:18:07', '2024-07-16 09:18:07'),
(355, 46, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 09:18:30', '2024-07-16 09:18:30'),
(356, 46, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-16 09:18:59', '2024-07-16 09:18:59'),
(357, 46, 'OPTIONAL SUB. - ART & CRAFT', 'GU-ST-OPT', 'Gujarati Medium Art & Craft', NULL, '2024-07-16 09:19:40', '2024-07-16 09:19:40'),
(358, 46, 'OPTIONAL SUB. - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Music', NULL, '2024-07-16 09:20:15', '2024-07-16 09:20:15'),
(359, 33, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 09:29:37', '2024-07-16 09:29:37'),
(360, 33, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 09:30:06', '2024-07-16 09:30:06'),
(361, 33, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 09:31:19', '2024-07-16 09:31:19'),
(362, 33, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 09:32:46', '2024-07-16 09:32:46'),
(363, 33, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 09:33:29', '2024-07-16 09:33:29'),
(364, 33, 'PHYSICS', 'EN-ST-PHY', 'English Medium Physics', NULL, '2024-07-16 09:33:56', '2024-07-16 09:33:56'),
(365, 33, 'CHEMISTRY', 'EN-ST-CHE', 'English Medium Chemistry', NULL, '2024-07-16 09:34:19', '2024-07-16 09:34:19'),
(366, 33, 'BIOLOGY', 'EN-ST-BIO', 'English Medium Biology', NULL, '2024-07-16 09:34:41', '2024-07-16 09:34:41'),
(367, 33, 'SOCIAL SCIENCE', 'EN-ST-SOC', 'English Medium Social SCi.', NULL, '2024-07-16 09:35:14', '2024-07-16 09:35:14'),
(368, 33, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 09:35:38', '2024-07-16 09:35:38'),
(369, 33, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 09:35:57', '2024-07-16 09:35:57'),
(370, 33, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 09:37:40', '2024-07-16 09:37:40'),
(371, 33, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-M.D', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 09:38:09', '2024-07-16 09:38:40'),
(372, 33, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 09:39:00', '2024-07-16 09:39:00'),
(373, 46, 'CHEMISTRY', 'GU-ST-CHE', 'Gujarati Medium Chemistry', NULL, '2024-07-16 09:42:11', '2024-07-16 09:42:11'),
(374, 33, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-16 09:42:58', '2024-07-16 09:42:58'),
(375, 33, 'OPTIONAL SUB. - ART & CRAFT', 'EN-ST-OPT', 'English Medium Optional Sub. Art & Craft', NULL, '2024-07-16 09:43:27', '2024-07-16 09:43:27'),
(376, 33, 'OPTIONAL SUB. - MUSIC', 'EN-ST-OPT', 'English Medium Optional Sub. Music', NULL, '2024-07-16 09:43:46', '2024-07-16 09:43:46'),
(377, 47, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 09:44:37', '2024-07-16 09:44:37'),
(378, 47, 'HINDI', 'GU-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 09:44:58', '2024-07-16 09:44:58'),
(379, 47, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 09:45:29', '2024-07-16 09:45:29'),
(380, 47, 'SANSKRUT', 'GU-ST-SAN', 'Gujarati Medium Sanskrut', NULL, '2024-07-16 09:45:51', '2024-07-16 09:45:51'),
(381, 47, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 09:46:19', '2024-07-16 09:46:19'),
(382, 47, 'PHYSICS', 'GU-ST-PHY', 'Gujarati Medium Physics', NULL, '2024-07-16 09:46:42', '2024-07-16 09:46:42'),
(383, 47, 'CHEMISTRY', 'GU-ST-CHE', 'Gujarati Medium Chemistry', NULL, '2024-07-16 09:47:03', '2024-07-16 09:47:03'),
(384, 47, 'BIOLOGY', 'GU-ST-BIO', 'Gujarati Medium Biology', NULL, '2024-07-16 09:47:21', '2024-07-16 09:47:21'),
(385, 47, 'SOCIAL SCIENCE', 'GU-ST-SOC', 'Gujarati Medium Social Science', NULL, '2024-07-16 09:47:50', '2024-07-16 09:47:50'),
(386, 47, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 09:48:15', '2024-07-16 09:48:15'),
(387, 47, 'COMPUTER', 'GU-ST-COM', 'Gujarati Medium Computer', NULL, '2024-07-16 09:48:38', '2024-07-16 09:48:38'),
(388, 47, 'YOGA+PE+SCOUT & GUIDE', 'GU-ST-COM', 'Gujarati Medium Yoga + Physical Education + Scout & Guide', NULL, '2024-07-16 09:48:43', '2024-07-16 10:04:51'),
(389, 47, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 10:05:17', '2024-07-16 10:05:17'),
(390, 47, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 10:05:42', '2024-07-16 10:05:42'),
(391, 47, 'CLUB', 'GU-ST-CLU', 'Gujarati Medium Club', NULL, '2024-07-16 10:06:06', '2024-07-16 10:06:06'),
(392, 47, 'OPTIONAL SUB. - ART & CRAFT', 'GU-ST-OPT', 'Gujarati Medium optional sub. - Art & Craft', NULL, '2024-07-16 10:06:27', '2024-07-16 10:06:27'),
(393, 47, 'OPTIONAL SUB. - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Music', NULL, '2024-07-16 10:06:51', '2024-07-16 10:06:51'),
(394, 34, 'ENGLISH', 'EN-ST-ENG', 'English Medium English', NULL, '2024-07-16 10:10:28', '2024-07-16 10:10:28'),
(395, 34, 'HINDI', 'EN-ST-HIN', 'Gujarati Medium Hindi', NULL, '2024-07-16 10:10:49', '2024-07-16 10:10:49'),
(396, 34, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 10:11:51', '2024-07-16 10:11:51'),
(397, 34, 'SANSKRUT', 'EN-ST-SAN', 'English Medium Sanskrut', NULL, '2024-07-16 10:12:16', '2024-07-16 10:12:16'),
(398, 34, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 10:13:12', '2024-07-16 10:13:12'),
(399, 34, 'PHYSICS', 'EN-ST-PHY', 'English Medium Physics', NULL, '2024-07-16 10:13:32', '2024-07-16 10:13:32'),
(400, 34, 'CHEMISTRY', 'EN-ST-CHE', 'English Medium Chemistry', NULL, '2024-07-16 10:13:52', '2024-07-16 10:13:52'),
(401, 34, 'BIOLOGY', 'EN-ST-BIO', 'English Medium Biology', NULL, '2024-07-16 10:14:13', '2024-07-16 10:14:13'),
(402, 34, 'SOCIAL SCIENCE', 'EN-ST-SOC', 'English Medium Social SCi.', NULL, '2024-07-16 10:14:35', '2024-07-16 10:14:35'),
(403, 34, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 10:14:55', '2024-07-16 10:14:55'),
(404, 34, 'COMPUTER', 'EN-ST-COM', 'English Medium Computer', NULL, '2024-07-16 10:15:15', '2024-07-16 10:15:15'),
(405, 34, 'YOGA+PE+SCOUT & GUIDE', 'EN-ST-YOG', 'English Medium Yoga+Physical Education+Scout & Guide', NULL, '2024-07-16 10:15:43', '2024-07-16 10:15:43'),
(406, 34, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 10:16:08', '2024-07-16 10:16:08'),
(407, 34, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 10:16:26', '2024-07-16 10:16:26'),
(408, 34, 'CLUB', 'EN-ST-CLU', 'English Medium Club', NULL, '2024-07-16 10:16:52', '2024-07-16 10:16:52'),
(409, 34, 'OPTIONAL SUB. - ART & CRAFT', 'EN-ST-OPT', 'English Medium Optional Sub. Art & Craft', NULL, '2024-07-16 10:17:16', '2024-07-16 10:17:16'),
(410, 34, 'OPTIONAL SUB. - MUSIC', 'EN-ST-OPT', 'English Medium Optional Sub. Music', NULL, '2024-07-16 10:17:39', '2024-07-16 10:17:39'),
(411, 48, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 10:19:25', '2024-07-16 10:19:25'),
(412, 48, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 10:20:06', '2024-07-16 10:20:06'),
(413, 48, 'HINDI', 'GU-ST-MAT', 'Gujarati Medium Hindi', NULL, '2024-07-16 10:23:38', '2024-07-16 10:24:15'),
(414, 48, 'MATHS', 'GU-ST-MAT', 'Gujarati Medium Maths', NULL, '2024-07-16 10:24:47', '2024-07-16 10:24:47'),
(415, 48, 'PHYSICS', 'GU-ST-PHY', 'Gujarati Medium Physics', NULL, '2024-07-16 10:25:52', '2024-07-16 10:25:52'),
(416, 48, 'CHEMISTRY', 'GU-ST-CHE', 'Gujarati Medium Chemistry', NULL, '2024-07-16 10:28:13', '2024-07-16 10:28:13'),
(417, 48, 'BIOLOGY', 'GU-ST-BIO', 'Gujarati Medium Biology', NULL, '2024-07-16 10:28:38', '2024-07-16 10:28:38'),
(418, 48, 'SOCIAL SCIENCE', 'GU-ST-SOC', 'Gujarati Medium Social Science', NULL, '2024-07-16 10:29:10', '2024-07-16 10:29:10'),
(419, 48, 'OPTIONAL SUB. - COMPUTER', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Computer', NULL, '2024-07-16 10:30:24', '2024-07-16 10:30:24'),
(420, 48, 'OPTIONAL SUB. - SANSKRUT', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Sanskrut', NULL, '2024-07-16 10:31:27', '2024-07-16 10:31:27'),
(421, 48, 'OPTIONAL SUB. - HINDI', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Hindi', NULL, '2024-07-16 10:32:17', '2024-07-16 10:32:17'),
(422, 48, 'OPTIONAL SUB. - ART & CRAFT', 'GU-ST-OPT', 'Gujarati Medium optional sub. - Art & Craft', NULL, '2024-07-16 10:32:47', '2024-07-16 10:32:47'),
(423, 48, 'OPTIONAL SUB. - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Music', NULL, '2024-07-16 10:33:09', '2024-07-16 10:33:09'),
(424, 48, 'OPTIONAL SUB. - PHYSICAL EDUCATION', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - Physical Education', NULL, '2024-07-16 10:34:23', '2024-07-16 10:34:23'),
(425, 48, 'SPORTS+DANCE+TALENT SEARCH', 'GU-ST-SPO', 'Gujarati Medium Sports+Dance+Talent Search', NULL, '2024-07-16 10:35:10', '2024-07-16 10:35:10'),
(426, 48, 'M.D. & ASSEMBLY', 'GU-ST-M.D', 'Gujarati Medium M.D. & Assembly', NULL, '2024-07-16 10:35:40', '2024-07-16 10:35:40'),
(427, 48, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujarati Medium IDP & Civic Sense / General knowledge', NULL, '2024-07-16 10:36:02', '2024-07-16 10:36:02'),
(428, 35, 'ENGLISH', 'EN-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 10:42:23', '2024-07-16 10:42:23'),
(429, 35, 'HINDI', 'EN-ST-HIN', 'English Medium Hindi', NULL, '2024-07-16 10:42:53', '2024-07-16 10:42:53'),
(430, 35, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Gujarati', NULL, '2024-07-16 10:43:14', '2024-07-16 10:43:14'),
(431, 35, 'MATHS', 'EN-ST-MAT', 'English Medium Maths', NULL, '2024-07-16 10:43:48', '2024-07-16 10:43:48'),
(432, 35, 'PHYSICS', 'EN-ST-PHY', 'English Medium Physics', NULL, '2024-07-16 10:44:11', '2024-07-16 10:44:11'),
(433, 35, 'CHEMISTRY', 'EN-ST-CHE', 'English Medium Chemistry', NULL, '2024-07-16 10:44:36', '2024-07-16 10:44:36'),
(434, 35, 'BIOLOGY', 'EN-ST-BIO', 'English Medium Biology', NULL, '2024-07-16 10:45:03', '2024-07-16 10:45:03'),
(435, 35, 'SOCIAL SCIENCE', 'EN-ST-SOC', 'English Medium Social SCi.', NULL, '2024-07-16 10:45:33', '2024-07-16 10:45:33'),
(436, 35, 'OPTIONAL SUB. - COMPUTER', 'EN-ST-OPT', 'English Medium Optional Sub. - Computer', NULL, '2024-07-16 10:46:24', '2024-07-16 10:46:24'),
(437, 35, 'OPTIONAL SUB. - SANSKRUT', 'EN-ST-OPT', 'English Medium Optional Sub. - Sanskrut', NULL, '2024-07-16 10:47:10', '2024-07-16 10:47:10'),
(438, 35, 'OPTIONAL SUB. - HINDI', 'EN-ST-OPT', 'English Medium Optional Sub. - Hindi', NULL, '2024-07-16 10:49:16', '2024-07-16 10:49:16'),
(439, 35, 'OPTIONAL SUB. - ART & CRAFT', 'EN-ST-OPT', 'English Medium Optional Sub. Art & Craft', NULL, '2024-07-16 10:50:10', '2024-07-16 10:50:10'),
(440, 35, 'OPTIONAL SUB. - MUSIC', 'EN-ST-OPT', 'English Medium Optional Sub. Music', NULL, '2024-07-16 10:51:09', '2024-07-16 10:51:09'),
(441, 35, 'OPTIONAL SUB. - PHYSICAL EDUCATION', 'EN-ST-OPT', 'English Medium Optional Sub. - Physical Education', NULL, '2024-07-16 10:51:56', '2024-07-16 10:51:56'),
(442, 35, 'SPORTS+DANCE+TALENT SEARCH', 'EN-ST-SPO', 'English Medium Sprts + Dance + Talent Search', NULL, '2024-07-16 10:52:23', '2024-07-16 10:52:23'),
(443, 35, 'M.D. & ASSEMBLY', 'EN-ST-M.D', 'English Medium M.D. & Assembly', NULL, '2024-07-16 10:52:46', '2024-07-16 10:52:46'),
(444, 35, 'IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-16 10:53:11', '2024-07-16 10:53:11'),
(445, 49, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium English', NULL, '2024-07-16 10:54:34', '2024-07-16 10:54:34'),
(446, 49, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Gujarati', NULL, '2024-07-16 10:55:36', '2024-07-16 10:55:36'),
(447, 49, 'Optional Sub. - 1 - ACCOUNT', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 1 - Account', NULL, '2024-07-16 10:57:16', '2024-07-16 10:59:27'),
(448, 49, 'OPTIONAL SUB. - 1 - SANSKRUT', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 1 - Sanskrut', NULL, '2024-07-16 10:57:53', '2024-07-16 10:59:49'),
(449, 49, 'OPTIONAL SUB. - 1 - PSYCHOLOGY', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 1 - Psychology', NULL, '2024-07-16 10:59:00', '2024-07-16 11:00:48'),
(450, 49, 'OPTIONAL SUB. - 1 BUSINESS ADMINISTRATION', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 1 - Business Administration', NULL, '2024-07-16 11:02:02', '2024-07-16 11:02:02'),
(451, 49, 'OPTIONAL SUB. - 1 - HINDI', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 1 - Hindi', NULL, '2024-07-16 11:02:57', '2024-07-16 11:02:57'),
(452, 49, 'OPTIONAL SUB. - 2 - COMPUTER', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 2 - Computer', NULL, '2024-07-16 11:03:51', '2024-07-16 11:03:51');
INSERT INTO `subjects` (`id`, `std_id`, `subject`, `subject_code`, `description`, `sub_pdf`, `created_at`, `updated_at`) VALUES
(453, 49, 'OPTIONAL SUB. - 2 - SECRETARIAL PRACTICE & COMMERCIAL COMMUNICATION', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. 2 - Secretarial Practice & Commercial Communication', NULL, '2024-07-16 11:05:30', '2024-07-16 11:05:30'),
(454, 49, 'OPTIONAL SUB. - 2 - STATISTICS', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 2 - Statistics', NULL, '2024-07-16 11:10:45', '2024-07-16 11:10:45'),
(455, 49, 'OPTIONAL SUB. - 2 - ECONOMICS', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. 2 - Economics', NULL, '2024-07-16 11:12:00', '2024-07-16 11:12:00'),
(456, 49, 'OPTIONAL SUB. - 2 - PHILOSOPHY', 'GU-ST-OPT', 'Gujarati Medium Optional Sub - 2 - Philosophy', NULL, '2024-07-16 11:17:43', '2024-07-16 11:17:43'),
(457, 49, 'OPTIONAL SUB. - 2 - POLITICS', 'GU-ST-OPT', 'Gujarati medium Optional Sub. - 2 - Politics', NULL, '2024-07-24 11:10:12', '2024-07-24 11:12:07'),
(458, 49, 'OPTIONAL SUB. - 2 - SOCIOLOGY', 'GU-ST-OPT', 'Gujarati Medium Sub. - 2 Sociology', NULL, '2024-07-24 11:11:22', '2024-07-24 11:11:22'),
(459, 49, 'OPTIONAL SUB. - 2 - HISTORY', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 2 History', NULL, '2024-07-24 11:13:15', '2024-07-24 11:13:15'),
(460, 49, 'OPTIONAL SUB. - 2 - GEOGRAPHY', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. 2 - Geography', NULL, '2024-07-24 11:14:43', '2024-07-24 11:14:43'),
(461, 49, 'OPTIONAL SUB. - 2 - DRAWING', 'GU-ST-OPT', 'Gujarati Medium Optional sub. - 2 Drawing', NULL, '2024-07-24 11:15:39', '2024-07-24 11:15:39'),
(462, 49, 'OPTIONAL SUB. - 2 - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 2 - Music', NULL, '2024-07-24 11:16:27', '2024-07-24 11:16:27'),
(463, 49, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-IDP', 'Gujrati Medium HSC GEN. Foundation - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 11:18:43', '2024-07-24 11:59:18'),
(464, 49, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'GU-ST-PHY', 'Gujarati Medium HSC GEN. - PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 11:20:21', '2024-07-24 11:20:21'),
(465, 36, 'ENGLISH', 'EN-ST-ENG', 'English Medium Std. 11 Gen. English', NULL, '2024-07-24 11:23:27', '2024-07-24 11:23:27'),
(466, 36, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Std. 11 Gen. Gujarati', NULL, '2024-07-24 11:24:12', '2024-07-24 11:24:12'),
(467, 36, 'OPTIONAL SUB. - 1 - ACCOUNT', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 1 Account', NULL, '2024-07-24 11:25:12', '2024-07-24 11:25:12'),
(468, 36, 'OPTIONAL SUB. - 1 - SANSKRUT', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 1 Sanskrut', NULL, '2024-07-24 11:26:07', '2024-07-24 11:26:07'),
(469, 36, 'OPTIONAL SUB. - 1 - PSYCHOLOGY', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 1 Psychology', NULL, '2024-07-24 11:27:08', '2024-07-24 11:27:08'),
(470, 36, 'OPTIONAL SUB. - 1 - BUSINESS ADMINISTRATION', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 1 Business Administration', NULL, '2024-07-24 11:28:15', '2024-07-24 11:28:15'),
(471, 36, 'OPTIONAL SUB. - 1 - HINDI', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 1 Hindi', NULL, '2024-07-24 11:29:07', '2024-07-24 11:29:07'),
(472, 36, 'OPTIONAL SUB. - 2 - COMPUTER', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Computer', NULL, '2024-07-24 11:30:00', '2024-07-24 11:30:00'),
(473, 36, 'OPTIONAL SUB. - 2 - SECRETARIAL PRACTICE & COMMERCIAL COMMUNICATION', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Secretarial Practice & Commerce Communication', NULL, '2024-07-24 11:31:28', '2024-07-24 11:31:28'),
(474, 36, 'OPTIONAL SUB. - 2 - STATISTICS', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Statistics', NULL, '2024-07-24 11:32:27', '2024-07-24 11:32:27'),
(475, 36, 'OPTIONAL SUB. - 2 - ECONOMICS', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Economics', NULL, '2024-07-24 11:33:28', '2024-07-24 11:33:28'),
(476, 36, 'OPTIONAL SUB. - 2 - PHILOSOPHY', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Philosophy', NULL, '2024-07-24 11:34:27', '2024-08-04 06:52:22'),
(477, 36, 'OPTIONAL SUB. - 2 - POLITICS', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Politics', NULL, '2024-07-24 11:35:17', '2024-07-24 11:35:17'),
(478, 36, 'OPTIONAL SUB. - 2 - SOCIOLOGY', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Sociology', NULL, '2024-07-24 11:36:12', '2024-07-24 11:36:12'),
(479, 36, 'OPTIONAL SUB. - 2 - HISTORY', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 History', NULL, '2024-07-24 11:37:07', '2024-07-24 11:37:07'),
(480, 36, 'OPTIONAL SUB. - 2 - GEOGRAPHY', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Geography', NULL, '2024-07-24 11:38:10', '2024-07-24 11:38:10'),
(481, 36, 'OPTIONAL SUB. - 2 - DRAWING', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Drawing', NULL, '2024-07-24 11:38:57', '2024-07-24 11:38:57'),
(482, 36, 'OPTIONAL SUB. - 2 - MUSIC', 'EN-ST-OPT', 'English Medium Std. 11 Gen. Optional Sub. - 2 Music', NULL, '2024-07-24 11:39:50', '2024-07-24 11:39:50'),
(483, 36, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-IDP', 'English Medium Std. 11 Gen. Foundation - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 11:40:47', '2024-07-24 11:58:24'),
(484, 36, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'EN-ST-PHY', 'English Medium Std. 11 Gen. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 11:41:30', '2024-07-24 11:41:30'),
(485, 49, 'FOUNDATION  LAW', 'GU-ST-FOU', 'Gujarati Medium Std. 11 Gen. Foundation Law', NULL, '2024-07-24 11:49:56', '2024-07-24 11:49:56'),
(486, 49, 'FOUNDATION - CURRENT AFFAIRS', 'GU-ST-FOU', 'Gujarati Medium Std. 11 Gen. Foundation Current Affairs', NULL, '2024-07-24 11:50:48', '2024-07-24 11:50:48'),
(487, 49, 'FOUNDATION  QA', 'GU-ST-FOU', 'Gujarati Medium Std. 11 Gen. Foundation QA', NULL, '2024-07-24 11:51:33', '2024-07-24 11:51:33'),
(488, 36, 'FOUNDATION  LAW', 'EN-ST-FOU', 'English Medium Std. 11 Gen. Foundation Law', NULL, '2024-07-24 11:52:16', '2024-07-24 11:52:16'),
(489, 36, 'FOUNDATION - CURRENT AFFAIRS', 'EN-ST-FOU', 'English Medium Std. 11 Gen. Foundation Current Affairs', NULL, '2024-07-24 11:53:53', '2024-07-24 11:53:53'),
(490, 36, 'FOUNDATION  QA', 'EN-ST-FOU', 'English Medium Std. 11 Gen. Foundation QA', NULL, '2024-07-24 11:54:41', '2024-07-24 11:54:41'),
(491, 50, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium Std. 12 Gen. English', NULL, '2024-07-24 12:03:39', '2024-07-24 12:03:39'),
(492, 50, 'GUJARATI', 'GU-ST-GUJ', 'Gujarati Medium Std. 12 Gen. Gujarati', NULL, '2024-07-24 12:04:16', '2024-07-24 12:04:16'),
(493, 50, 'OPTIONAL SUB. - 1 - ACCOUNT', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 1 Account', NULL, '2024-07-24 12:05:12', '2024-07-24 12:05:12'),
(494, 50, 'OPTIONAL SUB. - 1 - SANSKRUT', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 1 Sanskrut', NULL, '2024-07-24 12:06:38', '2024-07-24 12:06:38'),
(495, 50, 'OPTIONAL SUB. - 1 - PSYCHOLOGY', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 1 Psychology', NULL, '2024-07-24 12:07:29', '2024-07-24 12:07:29'),
(496, 50, 'OPTIONAL SUB. - 1 - BUSINESS ADMINISTRATION', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 1 Business Administration', NULL, '2024-07-24 12:08:45', '2024-07-24 12:08:45'),
(497, 50, 'OPTIONAL SUB. - 1 - HINDI', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 1 Hindi', NULL, '2024-07-24 12:09:36', '2024-07-24 12:09:36'),
(498, 50, 'OPTIONAL SUB. - 2 - COMPUTER', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 Computer', NULL, '2024-07-24 12:10:35', '2024-07-24 12:10:35'),
(499, 50, 'OPTIONAL SUB. - 2 - SECRETARIAL PRACTICE & COMMERCIAL COMMUNICATION', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 Secretarial Practice & Commercial Communication', NULL, '2024-07-24 12:11:37', '2024-07-24 12:11:37'),
(500, 50, 'OPTIONAL SUB. - 2 - STATISTICS', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 Statictics', NULL, '2024-07-24 12:12:33', '2024-07-24 12:12:33'),
(501, 50, 'OPTIONAL SUB. - 2 - ECONOMICS', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 Economics', NULL, '2024-07-24 12:13:47', '2024-07-24 12:13:47'),
(502, 50, 'OPTIONAL SUB. - 2 - PHILOSOPHY', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 Philosophy', NULL, '2024-07-24 12:14:32', '2024-08-04 06:53:44'),
(503, 50, 'OPTIONAL SUB. - 2 - POLITICS', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 - Politics', NULL, '2024-07-24 12:15:22', '2024-07-24 12:15:22'),
(504, 50, 'OPTIONAL SUB. - 2 - SOCIOLOGY', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 - Sociology', NULL, '2024-07-24 12:16:22', '2024-07-24 12:16:22'),
(505, 50, 'OPTIONAL SUB. - 2 - HISTORY', 'GU-ST-OPT', 'Gujarati Medium Optional Sub. - 2 - History', NULL, '2024-07-24 12:17:07', '2024-07-24 12:17:07'),
(506, 50, 'OPTIONAL SUB. - 2 - GEOGRAPHY', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 - Geography', NULL, '2024-07-24 12:19:02', '2024-07-24 12:19:02'),
(507, 50, 'OPTIONAL SUB. - 2 - DRAWING', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 - Drawing', NULL, '2024-07-24 12:19:57', '2024-07-24 12:19:57'),
(508, 50, 'OPTIONAL SUB. - 2 - MUSIC', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Gen. Optional Sub. - 2 - Music', NULL, '2024-07-24 12:20:52', '2024-07-24 12:20:52'),
(509, 50, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'GU-ST-PHY', 'Gujarati Medium Std. 12 Gen. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 12:21:35', '2024-07-24 12:21:35'),
(510, 50, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-FOU', 'Gujarati Medium Std. 12 FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 12:22:23', '2024-07-24 12:23:38'),
(511, 50, 'FOUNDATION  LAW', 'GU-ST-FOU', 'Gujarati Medium Std. 12 Gen. Foundation Law', NULL, '2024-07-24 12:24:33', '2024-07-24 12:24:33'),
(512, 50, 'FOUNDATION - CURRENT AFFAIRS', 'GU-ST-FOU', 'Gujarati Medium Std. 12 Gen. Foundation Current Affairs', NULL, '2024-07-24 12:25:36', '2024-07-24 12:25:36'),
(513, 50, 'FOUNDATION  QA', 'GU-ST-FOU', 'Gujarati Medium Std. 12 Gen. Foundation QA', NULL, '2024-07-24 12:26:27', '2024-07-24 12:26:27'),
(514, 37, 'ENGLISH', 'EN-ST-ENG', 'English Medium Std. 12 Gen. Englsih', NULL, '2024-07-24 12:33:59', '2024-07-24 12:33:59'),
(515, 37, 'GUJARATI', 'EN-ST-GUJ', 'English Medium Std. 12 Gen. Gujarati', NULL, '2024-07-24 12:34:36', '2024-07-24 12:34:36'),
(516, 37, 'OPTIONAL SUB. - 1 - ACCOUNT', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 1 Account', NULL, '2024-07-24 12:35:22', '2024-07-24 12:36:58'),
(517, 37, 'OPTIONAL SUB. - 1 - SANSKRUT', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. 1 - Sanskrut', NULL, '2024-07-24 12:36:40', '2024-07-24 12:36:40'),
(518, 37, 'OPTIONAL SUB. - 1 - PSYCHOLOGY', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 1 Psychology', NULL, '2024-07-24 12:37:49', '2024-07-24 12:37:49'),
(519, 37, 'OPTIONAL SUB. - 1 - BUSINESS ADMINISTRATION', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 1 Business Administration', NULL, '2024-07-24 12:38:47', '2024-07-24 12:38:47'),
(520, 37, 'OPTIONAL SUB. - 1 - HINDI', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 1 Hindi', NULL, '2024-07-24 12:39:37', '2024-07-24 12:39:37'),
(521, 37, 'OPTIONAL SUB. - 2 - COMPUTER', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Computer', NULL, '2024-07-24 12:40:29', '2024-07-24 12:40:29'),
(522, 37, 'OPTIONAL SUB. - 2 - SECRETARIAL PRACTICE & COMMERCIAL COMMUNICATION', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Secretarial Practice & Commerce Communication', NULL, '2024-07-24 12:41:17', '2024-07-24 12:41:17'),
(523, 37, 'OPTIONAL SUB. - 2 - STATISTICS', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Statistics', NULL, '2024-07-24 12:42:24', '2024-07-24 12:42:24'),
(524, 37, 'OPTIONAL SUB. - 2 - ECONOMICS', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Economics', NULL, '2024-07-24 12:48:27', '2024-07-24 12:48:27'),
(525, 37, 'OPTIONAL SUB. - 2 - PHILOSOPHY', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Philosophy', NULL, '2024-07-24 12:49:19', '2024-08-04 06:52:54'),
(526, 37, 'OPTIONAL SUB. - 2 - POLITICS', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Politics', NULL, '2024-07-24 12:50:16', '2024-07-24 12:50:16'),
(527, 37, 'OPTIONAL SUB. - 2 - SOCIOLOGY', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Sociology', NULL, '2024-07-24 12:51:19', '2024-07-24 12:51:19'),
(528, 37, 'OPTIONAL SUB. - 2 - HISTORY', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 History', NULL, '2024-07-24 12:52:02', '2024-07-24 12:52:02'),
(529, 37, 'OPTIONAL SUB. - 2 - GEOGRAPHY', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Geography', NULL, '2024-07-24 12:52:47', '2024-07-24 12:52:47'),
(530, 37, 'OPTIONAL SUB. - 2 - DRAWING', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Drawing', NULL, '2024-07-24 12:53:39', '2024-07-24 12:53:56'),
(531, 37, 'OPTIONAL SUB. - 2 - MUSIC', 'EN-ST-OPT', 'English Medium Std. 12 Gen. Optional Sub. - 2 Music', NULL, '2024-07-24 12:54:45', '2024-07-24 12:54:45'),
(532, 37, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'EN-ST-PHY', 'English Medium Std. 12 Gen. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 12:55:52', '2024-07-24 12:55:52'),
(533, 37, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-FOU', 'English Medium Std. 12 Gen. Foundation - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 12:57:19', '2024-07-24 12:57:19'),
(534, 37, 'FOUNDATION  LAW', 'EN-ST-FOU', 'English Medium Std. 12 Gen. Foundation Law', NULL, '2024-07-24 12:58:05', '2024-07-24 12:58:05'),
(535, 37, 'FOUNDATION - CURRENT AFFAIRS', 'EN-ST-FOU', 'English Medium Std. 12 Gen. Foundation Current Affairs', NULL, '2024-07-24 12:58:49', '2024-07-24 12:58:49'),
(536, 37, 'FOUNDATION  QA', 'EN-ST-FOU', 'English Medium Std. 12 Gen. Foundation QA', NULL, '2024-07-24 12:59:34', '2024-07-24 12:59:34'),
(537, 51, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium Std. 11 Sci. English', NULL, '2024-07-24 13:01:04', '2024-07-24 13:01:04'),
(538, 51, 'OPTIONAL SUB. - 1 - COMPUTER', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 1 - Computer', NULL, '2024-07-24 13:02:04', '2024-07-24 13:02:04'),
(539, 51, 'OPTIONAL SUB. - 1 - SANKRUT', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 1 - Sanskrut', NULL, '2024-07-24 13:03:01', '2024-07-24 13:03:01'),
(540, 51, 'PHYSICS - BOARD', 'GU-ST-PHY', 'Gujarati Medium Std. 11 Sci. Physics Board', NULL, '2024-07-24 13:04:03', '2024-07-24 13:04:03'),
(541, 51, 'CHEMISTRY - BOARD', 'GU-ST-CHE', 'Gujarati Medium Std. 11 Sci. Chemistry Board', NULL, '2024-07-24 13:05:05', '2024-07-24 13:05:05'),
(542, 51, 'OPTIONAL SUB. - 2 - MATHS - BOARD', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 2 - Maths Board', NULL, '2024-07-24 13:06:04', '2024-07-24 13:06:04'),
(543, 51, 'OPTIONAL SUB. - 2 - BIOLOGY - BOARD', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 2 - Biology Board', NULL, '2024-07-24 13:06:53', '2024-07-24 13:06:53'),
(544, 51, 'PHYSICS - JEE / NEET', 'GU-ST-PHY', 'Gujarati Medium Std. 11 Sci. Physics JEE / NEET', NULL, '2024-07-24 13:07:59', '2024-07-24 13:07:59'),
(545, 51, 'CHEMISTRY - JEE / NEET', 'GU-ST-CHE', 'Gujarati Medium Std. 11 Sci. Chemistry JEE / NEET', NULL, '2024-07-24 13:09:00', '2024-07-24 13:09:00'),
(546, 51, 'OPTIONAL SUB. - 2 - MATHS - JEE', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 2 - Maths JEE', NULL, '2024-07-24 13:09:58', '2024-07-24 13:09:58'),
(547, 51, 'OPTIONAL SUB. - 2 - BIOLOGY - NEET', 'GU-ST-OPT', 'Gujarati Medium Std. 11 Sci. Optional Sub. 2 - Biology - NEET', NULL, '2024-07-24 13:11:17', '2024-07-24 13:11:17'),
(548, 51, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-FOU', 'English Medium Std. 11 Sci. FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 13:13:15', '2024-07-24 13:13:15'),
(549, 51, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'GU-ST-PHY', 'Gujarati Medium Std. 11 Sci. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 13:14:39', '2024-07-24 13:14:39'),
(550, 38, 'ENGLISH', 'EN-ST-ENG', 'English Medium Std. Sci. English', NULL, '2024-07-24 13:15:31', '2024-07-24 13:15:31'),
(551, 38, 'OPTIONAL SUB. - 1 - COMPUTER', 'EN-ST-OPT', 'Englilsh Medium Std. 11 Sci. Optional Sub. 1 - Computer', NULL, '2024-07-24 13:17:54', '2024-07-24 13:17:54'),
(552, 38, 'OPTIONAL SUB. - 1 - SANKRUT', 'EN-ST-OPT', 'English Medium Std. 11 Sci. Optional Sub. 1 - Sanskrut', NULL, '2024-07-24 13:18:48', '2024-07-24 13:18:48'),
(553, 38, 'PHYSICS - BOARD', 'EN-ST-PHY', 'English Medium Std. 11 Sci. Physics Board', NULL, '2024-07-24 13:19:53', '2024-07-24 13:19:53'),
(554, 38, 'CHEMISTRY - BOARD', 'EN-ST-CHE', 'English Medium Std. 11 Sci. Chemistry Board', NULL, '2024-07-24 13:20:48', '2024-07-24 13:20:48'),
(555, 38, 'OPTIONAL SUB. - 2 - MATHS - BOARD', 'EN-ST-OPT', 'English Medium Std. 11 Sci. Optional Sub. 2 - Maths Board', NULL, '2024-07-24 13:21:52', '2024-07-24 13:21:52'),
(556, 38, 'OPTIONAL SUB. - 2 - BIOLOGY - BOARD', 'EN-ST-OPT', 'English Medium Std. 11 Sci. Optional Sub. 2 - Biology Board', NULL, '2024-07-24 13:23:05', '2024-07-24 13:23:05'),
(557, 38, 'PHYSICS - JEE / NEET', 'EN-ST-PHY', 'Gujarati Medium Std. 11 Sci. Physics JEE / NEET', NULL, '2024-07-24 13:24:39', '2024-07-24 13:24:39'),
(558, 38, 'CHEMISTRY - JEE / NEET', 'EN-ST-CHE', 'English Medium Std. 11 Sci. Chemistry JEE / NEET', NULL, '2024-07-24 13:25:37', '2024-07-24 13:25:37'),
(559, 38, 'OPTIONAL SUB. - 2 - MATHS - JEE', 'EN-ST-OPT', 'English Medium Std. 11 Sci. Optional Sub. 2 - Maths JEE', NULL, '2024-07-24 13:26:35', '2024-07-24 13:26:35'),
(560, 38, 'OPTIONAL SUB. - 2 - BIOLOGY - NEET', 'EN-ST-OPT', 'English Medium Std. 11 Sci. Optional Sub. 2 - Biology - NEET', NULL, '2024-07-24 13:27:23', '2024-07-24 13:27:23'),
(561, 38, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-FOU', 'English Medium Std. 11 Sci. FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 13:28:46', '2024-07-24 13:28:46'),
(562, 38, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'EN-ST-PHY', 'English Medium Std. 11 Sci. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 13:29:38', '2024-07-24 13:29:38'),
(563, 52, 'ENGLISH', 'GU-ST-ENG', 'Gujarati Medium Std. 12 Sci. English', NULL, '2024-07-24 13:32:00', '2024-07-24 13:32:00'),
(564, 52, 'OPTIONAL SUB. - 1 - COMPUTER', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 1 - Computer', NULL, '2024-07-24 13:32:57', '2024-07-24 13:32:57'),
(565, 52, 'OPTIONAL SUB. - 1 - SANKRUT', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 1 - Sanskrut', NULL, '2024-07-24 13:33:48', '2024-07-24 13:33:48'),
(566, 52, 'PHYSICS - BOARD', 'GU-ST-PHY', 'Gujarati Medium Std. 12 Sci. Physics Board', NULL, '2024-07-24 13:34:43', '2024-07-24 13:34:43'),
(567, 52, 'CHEMISTRY - BOARD', 'GU-ST-CHE', 'Gujarati Medium Std. 12 Sci. Chemistry Board', NULL, '2024-07-24 13:35:19', '2024-07-24 13:35:19'),
(568, 52, 'OPTIONAL SUB. - 2 - MATHS - BOARD', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 2 - Maths Board', NULL, '2024-07-24 13:36:15', '2024-07-24 13:36:15'),
(569, 52, 'OPTIONAL SUB. - 2 - BIOLOGY - BOARD', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 2 - Biology Board', NULL, '2024-07-24 13:37:00', '2024-07-24 13:37:00'),
(570, 52, 'PHYSICS - JEE / NEET', 'GU-ST-PHY', 'Gujarati Medium Std. 12 Sci. Physics JEE / NEET', NULL, '2024-07-24 13:37:42', '2024-07-24 13:37:42'),
(571, 52, 'CHEMISTRY - JEE / NEET', 'GU-ST-CHE', 'Gujarati Medium Std. 12 Sci. Chemistry JEE / NEET', NULL, '2024-07-24 13:38:24', '2024-07-24 13:38:24'),
(572, 52, 'OPTIONAL SUB. - 2 - MATHS - JEE', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 2 - Maths JEE', NULL, '2024-07-24 13:39:15', '2024-07-24 13:39:15'),
(573, 52, 'OPTIONAL SUB. - 2 - BIOLOGY - NEET', 'GU-ST-OPT', 'Gujarati Medium Std. 12 Sci. Optional Sub. 2 - Biology - NEET', NULL, '2024-07-24 13:39:56', '2024-07-24 13:39:56'),
(574, 52, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'GU-ST-FOU', 'Gujarati Medium Std. 12 Sci. FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-24 13:40:43', '2024-07-24 13:41:58'),
(575, 52, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'GU-ST-PHY', 'Gujarati Medium Std. 12 Sci. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-24 13:41:32', '2024-07-24 13:41:32'),
(576, 39, 'ENGLISH', 'EN-ST-ENG', 'English Medium Std. 12 Sci. English', NULL, '2024-07-25 04:11:53', '2024-07-25 04:15:16'),
(577, 39, 'OPTIONAL SUB. - 1 - COMPUTER', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. 1 - Computer', NULL, '2024-07-25 04:13:24', '2024-07-25 04:14:56'),
(578, 39, 'OPTIONAL SUB. - 1 - SANSKRUT', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. 1 - Sanskrut', NULL, '2024-07-25 04:14:20', '2024-07-25 04:14:38'),
(579, 39, 'PHYSICS - BOARD', 'EN-ST-PHY', 'English Medium Std. 12 Sci. Physics Board', NULL, '2024-07-25 04:28:10', '2024-07-25 04:30:48'),
(580, 39, 'CHEMISTRY - BOARD', 'EN-ST-CHE', 'English Medium Std. 12 Sci. Chemistry Board', NULL, '2024-07-25 04:30:26', '2024-07-25 04:30:26'),
(581, 39, 'OPTIONAL SUB. - 2 - MATHS - BOARD', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. 2 - Maths Board', NULL, '2024-07-25 04:32:19', '2024-07-25 04:32:19'),
(582, 39, 'OPTIONAL SUB. - 2 - BIOLOGY - BOARD', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. 2 - Biology Board', NULL, '2024-07-25 04:33:21', '2024-07-25 04:33:21'),
(583, 39, 'PHYSICS - JEE / NEET', 'EN-ST-PHY', 'English Medium Std. 12 Sci. Physics JEE / NEET', NULL, '2024-07-25 04:34:40', '2024-07-25 04:34:40'),
(584, 39, 'CHEMISTRY - JEE / NEET', 'EN-ST-CHE', 'English Medium Std. 12 Sci. Chemistry JEE / NEET', NULL, '2024-07-25 04:37:14', '2024-07-25 04:39:28'),
(585, 39, 'OPTIONAL SUB. - 2 - MATHS - JEE', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. - 2 - Maths - JEE', NULL, '2024-07-25 04:39:10', '2024-07-25 04:39:10'),
(586, 39, 'OPTIONAL SUB. - 2 - BIOLOGY - NEET', 'EN-ST-OPT', 'English Medium Std. 12 Sci. Optional Sub. 2 - Biology - NEET', NULL, '2024-07-25 04:41:05', '2024-07-25 04:41:05'),
(587, 39, 'FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', 'EN-ST-FOU', 'English Medium Std. 12 Sci. FOUNDATION - IDP / CIVIC SENSE / GENERAL KNOWLEDGE', NULL, '2024-07-25 04:42:01', '2024-07-25 04:42:01'),
(588, 39, 'PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', 'EN-ST-PHY', 'English Medium Std. 12 Sci. PHYSICAL EDUCATION / YOGA / SCOUT & GUIDE', NULL, '2024-07-25 04:42:41', '2024-07-25 04:42:41'),
(589, 31, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:35:41', '2024-07-28 10:35:41'),
(590, 32, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:36:18', '2024-07-28 10:42:34'),
(591, 33, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:37:15', '2024-07-28 10:37:15'),
(592, 34, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:37:55', '2024-07-28 10:37:55'),
(593, 35, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:38:12', '2024-07-28 10:38:12'),
(594, 36, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:38:27', '2024-07-28 10:38:27'),
(595, 37, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:38:48', '2024-07-28 10:38:48'),
(596, 38, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:39:17', '2024-07-28 10:39:17'),
(597, 39, 'WEEKLY TEST', 'EN-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:39:30', '2024-07-28 10:39:30'),
(598, 43, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:39:44', '2024-07-28 10:39:44'),
(599, 44, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:39:58', '2024-07-28 10:39:58'),
(600, 46, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:40:12', '2024-07-28 10:40:12'),
(601, 47, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:40:24', '2024-07-28 10:40:24'),
(602, 48, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:40:37', '2024-07-28 10:40:37'),
(603, 49, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:40:49', '2024-07-28 10:40:49'),
(604, 50, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:41:11', '2024-07-28 10:41:11'),
(605, 51, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:41:24', '2024-07-28 10:41:24'),
(606, 52, 'WEEKLY TEST', 'GU-ST-WEE', 'EVERY MONDAY', NULL, '2024-07-28 10:41:38', '2024-07-28 10:41:38'),
(607, 36, 'OPTIONAL SUB. - 2 - LOGIC', 'EN-ST-OPT', 'English Medium Optional Sub. 2 - Logic', NULL, '2024-07-29 04:32:39', '2024-07-29 04:32:39'),
(608, 37, 'OPTIONAL SUB. - 2 - LOGIC', 'EN-ST-OPT', 'English Midium Optional Sub. - 2 Logic', NULL, '2024-07-29 04:34:05', '2024-07-29 04:38:30'),
(609, 50, 'OPTIONAL SUB. - 2 - LOGIC', 'GU-ST-OPT', 'English Medium Optional Sub. - 2 Loggic', NULL, '2024-07-29 04:35:36', '2024-07-29 04:35:36'),
(610, 49, 'OPTIONAL SUB. - 2 - LOGIC', 'GU-ST-OPT', 'Gujarati Midium Optional Sub. 2 Logic', NULL, '2024-07-29 04:37:18', '2024-07-29 04:37:18'),
(611, 42, 'P.Ee', 'EN-ST-P.E', 'ssssssddddd', NULL, '2024-12-19 03:48:12', '2024-12-19 03:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topics`
--

CREATE TABLE `sub_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED DEFAULT NULL,
  `standard_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `sub_topic` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `stopic_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `vhm_start_title` varchar(255) DEFAULT NULL,
  `vhm_end_title` varchar(255) DEFAULT NULL,
  `vhm_start_url` varchar(255) DEFAULT NULL,
  `vhm_end_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_topics`
--

INSERT INTO `sub_topics` (`id`, `medium_id`, `standard_id`, `subject_id`, `topic_id`, `sub_topic`, `type`, `stopic_image`, `description`, `file_path`, `video_link`, `vhm_start_title`, `vhm_end_title`, `vhm_start_url`, `vhm_end_url`, `created_at`, `updated_at`) VALUES
(4, 3, 17, 101, 2, 'testing1', 'free', NULL, 'games', NULL, 'http://commondatastorage.googleapis.com', 'demo', 'demo', 'http://commondatastorage.googleapis.com', 'http://commondatastorage.googleapis.com', '2025-01-01 05:07:01', '2025-01-01 07:29:38'),
(5, 3, 17, 101, 2, 'introduction to computer1', 'free', NULL, 'introduction to computer description', 'ytkAqM1QN9EcEXvCKGYfCuv0uZrhSiAgc5VT2eg4.pdf', 'http://commondatastorage.googleapis.com', 'introduction to computer', 'introduction to computer', 'http://commondatastorage.googleapis.com', 'http://commondatastorage.googleapis.com', '2025-01-01 23:32:45', '2025-01-01 23:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `emergency_contact_number` varchar(255) NOT NULL,
  `marital_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `current_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `qualification` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`qualification`)),
  `work_experience` text NOT NULL,
  `note` text DEFAULT NULL,
  `pan_number` varchar(255) NOT NULL,
  `epf_no` varchar(255) DEFAULT NULL,
  `contract_type` varchar(255) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `work_shift` varchar(255) NOT NULL,
  `work_location` varchar(255) NOT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `account_title` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `bank_branch_name` varchar(255) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `staff_id`, `school_id`, `designation`, `department`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `gender`, `date_of_birth`, `date_of_joining`, `phone`, `emergency_contact_number`, `marital_status`, `photo`, `current_address`, `permanent_address`, `qualification`, `work_experience`, `note`, `pan_number`, `epf_no`, `contract_type`, `basic_salary`, `work_shift`, `work_location`, `date_of_leaving`, `account_title`, `bank_account_number`, `bank_name`, `ifsc_code`, `bank_branch_name`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `created_at`, `updated_at`) VALUES
(1, 6, 'KES1001', 1, ' PRINCIPAL', 'GUJARATI', 'KHUSHBOO', 'JOSHI ', 'KISHOR', 'HEENABEN', 'khushijoshi1712@gmail.com', 'Female', '1996-03-16', '2023-06-01', '9327097905', '7777932367', 'Married', NULL, 'A2 30 RAJ RESIDENCY HANUMAN TEKRI PALANPUR', 'A2 30 RAJ RESIDENCY HANUMAN TEKRI PALANPUR', '\"\\\"B.ED\\\"\"', '2 YEARS ', NULL, 'BLFPJ4374P', NULL, 'REGULAR', 25000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING', '3449067078', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'ikhushboojoshii', '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(2, 7, 'KES1002', 1, 'TEACHER', 'GUJARATI', 'NILESHKUMAR', 'VAGHELA', 'JAYANTIJI', 'SHOBHANABEN', 'nileshvaghela94292@gmail.com', 'Male', '2000-05-18', '2023-06-23', '9574205466', '9724494521', 'Married', NULL, 'PO.RANPUR VACHALOVAS, TA.DEESA,DIST.(B.K)', 'PO.RANPUR VACHALOVAS, TA.DEESA,DIST.(B.K)', '\"\\\"PGDCP\\\"\"', '1 YEAR', NULL, 'CMGPV1210D', NULL, 'REGULAR', 15000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '8947031767', 'KOTAK MAHINDRA', 'KKBK0000811', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'nileshvaghela792', '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(3, 8, 'KES1003', 1, 'TEACHER', 'ENGLISH', 'SATISH KUMAR', 'SURYAVANSHI', 'CHIRANJI LAL', 'INDRA DEVI', 'SKSURYAVANSHI78@GMAIL.COM', 'Male', '1978-02-10', '2023-06-01', '9660456326', '9782778986', 'Married', NULL, 'H.NO. 59 DEVYANI SOCIETY, NEAR AKESAN FATAK, PALANPUR', 'NEAR NARI JAGRATI KENDRA, POST OFFICE ROAD , GANDHINAGAR, ABUROAD 307026', '\"\\\"B.ED\\\"\"', '18 YEARS', NULL, 'BWXPS8851B', NULL, 'REGULAR', 28000.00, '7:30 TO 4:40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118959', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'SATISH_00278', '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(5, 10, 'KES1005', 1, 'TEACHER', 'BOTH', 'FALGUNI', 'SUTHAR', 'PRAHLADBHAI', 'SAROJBEN', 'falumistry86@gmail.com', 'Female', '1986-07-20', '2023-06-01', '9909942753', '9909942752', 'Married', NULL, 'B/38, AMRUTSAGAR SOCIETY, DEESA', 'C/12, SAKAR DREAM CITY, MEHSANA', '\"\\\"LLB\\\"\"', '4 YEARS', NULL, 'DJAPS8281P', NULL, 'REGULAR', 16000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118089', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(6, 11, 'KES1006', 1, 'TEACHER', 'ENGLISH', 'ANUPRIYA', 'SHARMA', 'V.D SHARMA', 'NEERAJ SHARMA', 'anutappupihu@gmail.com', 'Female', '1981-10-08', '2023-07-10', '9664265706', '9873677870', 'Married', NULL, 'AMEE SOCIETY,DEESA', 'D-239,MAHESH MARG,MALVIYA NAGAR,JAIPUR', '\"\\\"M.BA\\\"\"', '6 YEARS', NULL, 'BFTPS6918E', NULL, 'REGULAR', 18000.00, '8.40 TO 3.40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118072', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(7, 12, 'KES1007', 1, 'TEACHER', 'ENGLISH', 'SHAILESH ', 'KUMAR ', 'PARASHURAM SINGH', 'SHYAM SUNDARI DEVI', 'shailesh94bits2k7@gmail.com', 'Male', '1987-01-08', '2023-06-01', '9999753701', '9076411038', 'Single', NULL, 'BAJRANG NAGAR ,DEESA', 'DZ VII-653 INDIRANAGAR, TURBHE,SANPADA, THANE NAVI MUMBAI 400705', '\"\\\"B.ED\\\"\"', '13 YEARS', NULL, 'BGSPK7548C', NULL, 'REGULAR', 28000.00, '7:30 TO 2:30', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116177', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(8, 13, 'KES1008', 1, 'TEACHER', 'ENGLISH', 'CHHAGAN', 'LAL', 'DILIP KUMAR', 'BHANWARI DEVI', 'chhaganlalkumawat123@gmail.com', 'Male', '1990-07-02', '2023-06-13', '9079828221', '9571947191', 'Married', NULL, 'GOVARDAN PARK DEESA ', 'SANTPUR ABUROAD', '\"\\\"B.ED\\\"\"', '1 YEAR', NULL, 'AOLPL1200N', NULL, 'REGULAR', 20000.00, '7.30 TO 2.30', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116153', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(9, 14, 'KES1009', 1, 'TEACHER', 'ENGLISH', 'YASHKUMAR', 'VAISHNAV', 'MAHESHBHAI', 'HEENABEN', 'yashvaishnav512@gmail.com', 'Male', '1999-06-01', '2023-06-01', '9016054468', '9725080646', 'Married', NULL, 'SUKHDEV NAGAR SOCIETY,NEAR RAJMANDIR,DEESA', 'SUKHDEV NAGAR SOCIETY,NEAR RAJMANDIR,DEESA', '\"\\\"B.ED\\\"\"', '5 YEARS', NULL, 'BOTPV2141F', NULL, 'REGULAR', 28000.00, '7.30 TO 2.30', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118935', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'YASH VAISHNAV', 'YashVaishn42917', NULL, 'yashu__1908', '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(10, 15, 'KES1010', 1, 'TEACHER', 'ENGLISH', 'ANANDKUMAR', 'VAGHELA', 'RAYCHANDBHAI', 'KANKUBNEN', 'anilvina91@gmail.com', 'Male', '1988-04-20', '2023-06-01', '9979285813', '9426485131', 'Married', NULL, 'NAVARANG SOCIETY,MANASAROVAR FATAK, PALANPUR', 'NAVARANG SOCIETY,MANASAROVAR FATAK, PALANPUR', '\"\\\"B.ED\\\"\"', '13 YEARS', NULL, 'BHGPV0636P', NULL, 'REGULAR', 22000.00, '7.30 TO 2.30', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118942', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'A R VAGHELA', NULL, NULL, 'anadvaghela88', '2024-07-21 04:12:48', '2024-07-21 04:12:48'),
(11, 16, 'KES1011', 1, 'TEACHER', 'GUJARATI', 'KINJAL', 'SHAH', 'RAJESHBHAI', 'DHARMISTHABEN', 'skinjal99097@gmail.com', 'Female', '1992-04-10', '2023-11-01', '9909724451', '9979369238', 'Married', NULL, 'DEVDARSHAN FLAT, KISHOR PARK, NEAR DIPAK HOTEL ,DEESA', 'DEVDARSHAN FLAT, KISHOR PARK, NEAR DIPAK HOTEL ,DEESA', '\"\\\"-\\\"\"', '1 YEARS', NULL, '12345678', NULL, 'REGULAR', 12000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '20142648188', 'SBI ', 'SBIN0010972', 'HIGHWAY ,DEESA', NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(12, 17, 'KES1012', 1, 'TEACHER', 'GUJARATI', 'NAMRATA', 'GADHAVI', 'ARVINDSINH', 'ARVINDSINH', 'namratagadhavi93@gmail.com', 'Female', '1993-04-09', '2023-06-06', '7623844694', '878004522', 'Married', NULL, 'B/37,AMI SOCIETY,BEHIND DIPAK HOTAL,KANT ROAD,DEESA.', 'B/37,AMI SOCIETY,BEHIND DIPAK HOTAL,KANT ROAD,DEESA.', '\"\\\"B.ED,M.ED\\\"\"', '3 YEAR', NULL, 'DYPPG1264Q', NULL, 'REGULAR', 16000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118065', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'nishugadhvi', NULL, NULL, 'nishugadhvi', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(13, 18, 'KES1013', 1, 'TEACHER', 'GUJARATI', 'JAYESH', 'LIMBACHIYA', 'VIJAYBHAI', 'NAYANABEN', 'limbachiyajayesh051@gmail.com', 'Male', '2001-01-01', '2023-06-01', '7096808840', '9925812043', 'Single', NULL, 'AT&POST:SAGROSANA,TA:PALANPUR,DI:BANASKANTHA', 'AT&POST:SAGROSANA,TA:PALANPUR,DI:BANASKANTHA', '\"\\\"B.ED\\\"\"', '1 YEAR', NULL, 'BEZPL7157M', NULL, 'REGULAR', 28000.00, 'MID SCHOOL', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116382', 'KOTAK MAHINDRA', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'JAYESH_LIMBACHIYA', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(14, 19, 'KES1014', 1, 'TEACHER', 'BOTH', 'SONY', 'PRAJAPATI', 'RAMESH', 'ANITA', 'sonyprajapati141@gmail.com', 'Female', '1998-11-10', '2023-11-28', '8652722095', '9909292143', 'Married', NULL, 'AT.UTTAMPURA (DANGIYA),TA.DANTIWADA,DIST.BANASKANTHA', 'AT.UTTAMPURA (DANGIYA),TA.DANTIWADA,DIST.BANASKANTHA', '\"\\\"B.E.D\\\"\"', '1 YEAR', NULL, 'DMUPP9215D', NULL, 'REGULAR', 16000.00, 'MID SCHOOL', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '70870100058260', 'BANK OF BARODA', 'BARB0DBPALN', 'AMIR ROAD BRANCH,PALANPUR', NULL, NULL, NULL, 'sony_prajapati1998', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(15, 20, 'KES1015', 1, 'TEACHER', 'BOTH', 'RAMKRUSHNA', 'RAVAL', 'JASAVANTBHAI', 'GITABEN', 'ramkrishna.raval29@gmail.com', 'Male', '1994-03-03', '2024-06-03', '9601661924', '8849394610', 'Married', NULL, 'OMKAR BHAG -2,NEAR MODHESHVARI SOCIETY,DEESA', '157,NADODAVAS,DAUDPUR,TA-SAMI,DIST-PATAN', '\"\\\"NET GSET \\\"\"', '1 YEAR', NULL, 'CTZPR8815G', NULL, 'REGULAR', 20000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '261001005213', 'THE MEHSANA URBAN BANK', 'MSNU0000026', 'KHERVA,MEHSANA', 'RAMKRISHNA RAVAL ', 'RAMKRISHNARAVAL', NULL, '2rd_musafir', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(16, 21, 'KES1016', 1, 'TEACHER', 'GUJARATI', 'JYOTI', 'MAMTORA', 'SANDIPBHAI', 'PUJABEN', 'jyotimamtora7@gmail.com', 'Female', '1998-01-28', '2023-12-04', '7874680637', '9979990738', 'Married', NULL, 'VADI ROAD, DEESA', 'VADI ROAD, DEESA', '\"\\\"B.ED\\\"\"', '5 YEARS', NULL, 'DRYPM9510F', NULL, 'REGULAR', 28000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1080110000526', 'UCO BANK', 'UCBA0000108', 'DEESA', NULL, NULL, NULL, 'jyoti_mamtora', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(17, 22, 'KES1017', 1, 'TEACHER', 'BOTH', 'JAYSHRI ', 'PRAJAPATI', 'HARI BHYAI ', 'SHANTA BEN ', 'jayshree8404@gmail.com', 'Female', '1991-04-08', '2023-06-01', '6354928762', '9924312813', 'Married', NULL, 'At Kant PARJAPATI FARM HOUSE ,Post Bhoyan Deesa ', 'At Kant PARJAPATI FARM HOUSE ,Post Bhoyan Deesa ', '\"\\\"PTC & B.ed\\\"\"', '7 years ', NULL, 'ERRPP5384L', NULL, 'REGULAR', 15000.00, 'MORNING ', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '73190100035484', 'BANK OF BARODA ', 'BARB0DBDBSA ', 'JAGRUTI COMPLEX DEESA ', NULL, NULL, NULL, 'ja.yshree1671', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(18, 23, 'KES1018', 1, 'TEACHER', 'ENGLISH', 'MANISHA ', 'BHATT', 'PRAKASH KUMAR ', 'SHILPA BHATT', 'manishabhatt821@gmail.com', 'Female', '1999-09-10', '2023-12-23', '7829144482', '7406133002', 'Single', NULL, 'Amrutnagar society near Rajmandir Cinema Deesa', 'Amrutnagar society near Rajmandir Cinema \nDeesa', '\"\\\"-\\\"\"', '0 YEARS', NULL, 'EQHPB7917Q', NULL, 'REGULAR', 12000.00, 'MORNING ', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '89480100017390', 'BANK OF BARODA ', 'BARB0VJCMBA', 'CITY MARKET BANGALORE', NULL, NULL, NULL, '_chikkiiiii', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(19, 24, 'KES1019', 1, 'TEACHER', 'GUJARATI', 'ROSHANI ', 'PARMAR ', 'BABU BHAI ', 'GAJRA BEN ', 'parmarroshani371@gmail.com', 'Female', '2000-05-23', '2023-06-01', '9974915085', '9879029906', 'Single', NULL, 'Rajpur Chaar rasta behind  Post Office ', 'Rajpur Chaar rasta behind  Post Office ', '\"\\\"MA\\\"\"', '1 year', NULL, 'HZJPP2315C', NULL, 'REGULAR', 15000.00, 'EVENING ', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116481', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(20, 25, 'KES1020', 1, 'TEACHER', 'GUJARATI', 'RAKESH', 'PUROHIT', 'SOMCHAND', 'NARMDA', 'rakesrajpurohit2012@gmail.com', 'Male', '1986-11-01', '2023-12-01', '9828656813', '8094602083', 'Married', NULL, 'KANT ROAD GOVARDHAN PARK DEESA', 'VILLAGE PO.ORE T.ABUROAD D. SIROHI PIN. 307026 ', '\"\\\"B.ED\\\"\"', '3 YEARS', NULL, 'BCKPP9947C', NULL, 'REGULAR', 20000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '32186300469', 'SBI', 'SBIN0000601', 'ABUROAD', 'RAKESH PUROHIT', NULL, NULL, 'Rakeshrajpurohit2012', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(21, 26, 'KES1021', 1, 'ADMIN', 'BOTH', 'SHAHNAWAZ', 'RAJPUT', 'ZUBER', 'AARFA', 'shanurajput23691@gmail.com', 'Male', '1991-06-23', '2023-06-01', '8849149228', '9824668186', 'Married', NULL, 'MOHAMMADI SOCIETY SUKH BAGH ROAD ,PALANPUR', 'MOHAMMADI SOCIETY SUKH BAGH ROAD ,PALANPUR', '\"\\\"-\\\"\"', '5YEARS', NULL, 'BEAPR2904H', NULL, 'REGULAR', 20000.00, '7:30 TO 4:40', 'KESAR SCHOOL,KANT(DEESA)', NULL, 'SAVING', '82240100031053', 'BANK OF BARODA', 'BARB0DBGADH', 'GADH', NULL, NULL, NULL, 'MANKIND _23', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(22, 27, 'KES1022', 1, 'TEACHER', 'ENGLISH', 'DEEPALI', 'SINGH', 'PUSHPRAJ', 'PREMLATA', 'deepali.singh52@gmail.com', 'Female', '1990-10-15', '2023-07-24', '8200125051', '8374209893', 'Married', NULL, 'kishore park, devdarshan flat, Deesa', 'kishore park, devdarshan flat, Deesa', '\"\\\"BBA\\\"\"', '1 YEAR', NULL, 'CPEPS4610F', NULL, 'REGULAR', 16000.00, 'MORNING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116191', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(23, 28, 'KES1023', 1, 'TEACHER', 'BOTH', 'RAJA', 'RABARI', 'ACHALAJI', 'MATHARABEN', 'rabarairajabhai104@gmail.com', 'Male', '2000-03-05', '2023-06-03', '8511793939', '9737364899', 'Married', NULL, 'AT-RABARI GOLIYA ,POST- BHADATH,DEESA, BANASKANTHA', 'AT-RABARI GOLIYA ,POST- BHADATH,DEESA, BANASKANTHA', '\"\\\"DIPLOMA IN YOGA\\\"\"', '1 YEAR', NULL, 'EWHPR5363A', NULL, 'REGULAR', 20000.00, '7:30 TO 4:40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '73190100042039', 'BANK OF BARODA', 'BARB0DBDESA ', 'DEESA', 'YOGARAJA333', NULL, NULL, 'YOGARAJA333', '2024-07-21 04:12:49', '2024-07-21 04:12:49'),
(24, 29, 'KES1024', 1, 'TEACHER', 'BOTH', 'HETAL', 'JOSHI ', 'JAGADISHBHAI', 'SAROJBEN', 'hetjoshi881@gmail.com', 'Female', '1987-09-18', '2023-07-01', '7016304197', '9624752288', 'Married', NULL, 'LD HIGHTSHOME NO:-117,KANTROAD,DESSA', 'LD HIGHTSHOME NO:-117,KANTROAD,DESSA', '\"\\\"DIT\\\\\\/CTCT\\\"\"', '4YEARS', NULL, 'BGTPJ1126J', NULL, 'REGULAR', 20000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '2245888023', 'KOTAK MAHINDRA BANK ', 'KKBK0000872', 'NAVSARI,GUJARAT', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(25, 30, 'KES1025', 1, 'TEACHER', 'ENGLISH', 'RINKU', 'KHATRI', 'ISHWARDAS', 'KAMLA KHATRI', 'rinkukhatri2014@gmail.com', 'Female', '1991-11-11', '2023-06-01', '9265596508', '9558016369', 'Single', NULL, 'NR PARK,NEAR BEEP SALES,AMBIKA CHAWK,DEESA', 'NR PARK,NEAR BEEP SALES,AMBIKA CHAWK,DEESA', '\"\\\"LLB\\\"\"', '9YEARS', NULL, 'BOLPR3090B', NULL, 'REGULAR', 22000.00, '7.30 TO 2.30', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '3.6110400025222E+14', 'IDBI', 'IBKL0000361', 'DEESA', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(26, 31, 'KES1026', 1, 'TEACHER', 'GUJARATI', 'NITESH', 'PANCHAL ', 'KALPESHBHAI ', 'KANCHANBEN ', 'nitesheducation0780@gmail.com', 'Male', '1999-06-08', '2023-06-01', '9662551537', '9601523248', 'Married', NULL, '153,V.N MANDORA PARK PART 3,SANKALP BUNGLOWSPATAN HIGHWAY, DEESA', 'AT- VACHHOL , TA - DHANERA , DI - BANASKANTHA,GUJARAT ', '\"\\\"B.ED,NET(AIR-129),GSET\\\"\"', '2 YEARS ', NULL, 'GMAPP4221C', NULL, 'REGULAR', 28000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116160', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'nitesh_812', '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(27, 32, 'KES1027', 1, 'TEACHER', 'GUJARATI', 'BHAVIKA', 'PANCHAL ', 'BHARATBHAI ', 'KANCHANBEN ', 'pbhavika937@gmail.com', 'Female', '2002-04-04', '2024-06-01', '9727703697', '9662551537', 'Married', NULL, '153,V.N MANDORA PARK PART 3,SANKALP BUNGLOWSPATAN HIGHWAY, DEESA', 'AT- VACHHOL , TA - DHANERA , DI - BANASKANTHA,GUJARAT ', '\"\\\"B.ED\\\"\"', '0 YEARS', NULL, 'HARPB8703F', NULL, 'REGULAR', 12000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '73310100000442', 'BARODA GUJARAT GRAMIN BANK', 'BARB0BGGBXX', 'KUCHAWADA', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(28, 33, 'KES1028', 1, 'TEACHER', 'GUJARATI', 'KAUSHIK', 'PATEL', 'NARENDRABHAI', 'JASHODABEN', 'kpvadnagar@gmail.com', 'Male', '1978-08-01', '2023-06-01', '9824834997', '9723322093', 'Married', NULL, 'C/32,SARJAN HOMES,MOTIPURA ROAD,DHANIYALA CHOKADI,PALANPUR', 'PEDHIWALO MAHAD, ARJUNBARI DARWAJO,VADNAGAR  DIST.-MEHSANA', '\"\\\"M.ED.\\\"\"', '17 YEARS', NULL, 'AMVPP4088N', NULL, 'REGULAR', 27000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116283', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'KAUSHIK PATEL', NULL, NULL, 'KAUSHIKPATEL6177', '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(29, 34, 'KES1029', 1, 'TEACHER', 'ENGLISH', 'SUNIL', 'NAI', 'GAMANBHAI', 'SARDABEN', 'sunillimbachiyaofficial@gmaile.com', 'Male', '2002-01-06', '2023-06-06', '9664886006', '9979057818', 'Single', NULL, 'GOGAPURA MUDETHA MUDETHA', 'GOGAPURA MUDETHA MUDETHA', '\"\\\"-\\\"\"', '2 YEARS', NULL, 'CFIPN7330F', NULL, 'REGULAR', 24000.00, 'MORNING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116306', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'SUNILLIMBACHIYASINGER', NULL, NULL, 'SUNILLIMBACHIYA', '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(31, 36, 'KES1030', 1, 'EDITOR', 'GUJARATI', 'HITESH', 'MAKWANA', 'HARGOVANBHAI', 'MANJULABEN', 'hitumakwana7@gmail.com', 'Male', '1990-06-25', '2023-06-01', '9586005932', '7984265856', 'Married', NULL, 'RUDRA GELEXY AJAPURA', '18 ,SHIV DARSHAN SOCIETY ,OPP.SK COLLEGE,VISNAGAR', '\"\\\"ENG.IN MULTIMEDIA\\\"\"', '15 YEARS', NULL, 'DBXPM1103D', NULL, 'REGULAR', 20000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116320', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'HITUMAKWANA', NULL, NULL, 'HITUMAKWANA7', '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(33, 38, 'KES1032', 1, 'TEACHER', 'BOTH', 'BHAVANA', 'THAKOR', 'HIRAJI', 'VINABEN', 'thakorbhavna04@gmail.com', 'Female', '1992-06-01', '2023-06-01', '9016466032', '9727097385', 'Married', NULL, '38,shivsagar socitey ranpur road deesa', '38,shivsagar socitey ranpur road deesa', '\"\\\" -\\\"\"', '3 YEAR', NULL, 'CECPC4271F', NULL, 'REGULAR', 18000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116467', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(34, 39, 'KES1034', 1, 'TEACHER', 'BOTH', 'PRATHAM', 'PARMAR ', 'JAGDISHBHAI', 'HANSABEN', 'prmrpratham001@gmail.com', 'Male', '2000-09-29', '2024-06-07', '8238945760', '8866234761', 'Single', NULL, 'PARMAR VAS ,KANTHARIYA HANUMAN ROAD,RAMNIVAS,PALANPUR', 'PARMAR VAS ,KANTHARIYA HANUMAN ROAD,RAMNIVAS,PALANPUR', '\"\\\"B.Ed.\\\"\"', '1 year', NULL, 'HSQPP4121Q', NULL, 'REGULAR', 18000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1.3931004000001E+15', 'PUNJAB NATIONAL BANK', 'PUNB0139310', 'PALANPUR', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(35, 40, 'KES1035', 1, 'TEACHER', 'BOTH', 'SALONI', 'SUTHAR', 'MADHAVLAL', 'GEETABEN', 'salonisuthar5206@gmail.com', 'Female', '1994-06-01', '2023-06-01', '9016005933', '9426237254', 'Married', NULL, 'B/4,SUNDARAM BUNGLOWS,DEESA', 'B/4,SUNDARAM BUNGLOWS,DEESA', '\"\\\"D.EL.ED(PTC)\\\"\"', '2 YEAR', NULL, 'ILKPS5849J', NULL, 'REGULAR', 22000.00, '7:30 TO 4:40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '4449587368', 'KOTAK MAHINDRA BANK ', 'KKBK0000824', 'DEESA', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(36, 41, 'KES1036', 1, 'TEACHER', 'BOTH', 'DINESH', 'BAIVADIYA', 'ISHWARBHAI', 'RATANBEN', 'baivadiyadinesh@gmail.com', 'Male', '1990-01-05', '2023-06-01', '9106106124', '9724738594', 'Married', NULL, 'AT& POST GADH ,PALANPUR', 'AT& POST GADH ,PALANPUR', '\"\\\"D.EL.ED(PTC)\\\"\"', '11 YEARS', NULL, 'CHNPB7402D', NULL, 'REGULAR', 22000.00, '7:30 TO 4:40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116290', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', 'DINESHBAIVADIYA', NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(37, 42, 'KES1037', 1, 'TEACHER', 'GUJARATI', 'ASHISH', 'PATEL', 'HARIBHAI', 'KHUSHIBEN', 'gothiashish02@gmail.com', 'Male', '1991-05-09', '2023-06-01', '8128171105', '9825281830', 'Married', NULL, 'AT& POST GADH ,PALANPUR', 'AT& POST GADH ,PALANPUR', '\"\\\"B.ED\\\"\"', '9 YEARS', NULL, 'AXJPG4320R', NULL, 'REGULAR', 20000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '4145042314', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50'),
(38, 43, 'KES1038', 1, 'TEACHER', 'GUJARATI', 'SATYAM', 'GOSWAMI', 'PRAVINPURI', 'SHILPABEN', 'goswamisatyam120@gmail.com', 'Male', '2002-03-07', '2023-06-01', '7990163391', '9727286877', 'Single', NULL, 'PINK CITY PART-3 RANPUR ROAD DEESA', 'PINK CITY PART-3 RANPUR ROAD DEESA', '\"\\\"Same\\\"\"', '2 YEARS', NULL, '89101112', NULL, 'REGULAR', 24000.00, 'EVENING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815118751', 'KOTAK MAHINDRA BANK ', 'KKBK0000826', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, 'SATYAM_GOSWAMI_OFFICIAL07', '2024-07-21 04:16:54', '2024-07-21 04:16:54'),
(39, 44, 'KES1039', 1, 'TEACHER', 'BOTH', 'HIMAY', 'PARMAR ', 'MANOJKUMAR', 'PAYALBEN', 'himaymali404@gmail.com', 'Male', '2002-04-20', '2024-06-24', '8511617366', '9328795827', 'Single', NULL, 'VASHUNDHRA SOCIETY, KACHHI COLONY, DEESA', 'VASHUNDHRA SOCIETY, KACHHI COLONY, DEESA', '\"\\\"Same\\\"\"', '0 YEARS', NULL, '13141516', NULL, 'REGULAR', 39000.00, '8:00 TO 4:40', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '35168779552', 'SBI BANK', 'SBIN0010972', 'HIGHWAY ,DEESA', NULL, NULL, NULL, NULL, '2024-07-21 04:16:54', '2024-07-21 04:16:54'),
(41, 47, 'KES1041', 1, 'TEACHER', 'BOTH ', 'RITA ', 'PRAJAPATI', 'BABU BHAI ', 'SHARDA  BEN ', 'ritapraja99@gmail.com', 'Female', '1990-01-01', '2023-06-01', '7046973948', '9427469231', 'Married', NULL, '40 - ShivSagar Society Ranpur Road Deesa', 'Moto Goti Vaas Jepur Vijapur ', '\"\\\"B.ed\\\"\"', '5 Years', NULL, 'BJJP7464E', NULL, 'REGULAR', 14000.00, 'MORNING ', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '1815116207', 'KOTAK MAHINDRA BANK ', 'KKBK0000825', 'NAVRANGPURA, AHEMDABAD', NULL, NULL, NULL, NULL, '2024-07-21 04:43:08', '2024-07-21 04:43:08'),
(42, 49, 'KES1042', 1, 'TEACHER', 'BOTH ', 'NIDHI ', 'JOSHI ', 'PRAKASH ', 'KUNJALBEN ', 'nidhijoshi99@gmail.com', 'Female', '2004-04-08', '2024-06-26', '9313911553', '7990112595', 'Single', NULL, 'Neminath Society Deesa ', 'Neminath Society Deesa ', '\"\\\"MA running \\\"\"', '0 year', NULL, 'DAJPJ2100L', NULL, 'REGULAR', 12000.00, 'MORNING ', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING ', '44810201001446', 'UNION BANK ', 'UBIN0544817', 'NYAYMANDIR DEESA ', NULL, NULL, NULL, 'nidhyy.8', '2024-07-21 04:51:09', '2024-07-21 04:51:09'),
(43, 124, 'KES1043', 1, 'TEACHER', 'ENGLISH', 'HITESH', 'PRAJAPATI', 'JAYMALBHAI', 'LILIBEN', 'prajapatihitesh9909@gmail.com', 'Male', '2000-05-11', '2024-07-18', '9909823917', '9825558601', 'Single', NULL, 'KACHCHHI COLONY MAIN ROAD DEESA', 'KACHCHHI COLONY MAIN ROAD DEESA', '\"\\\"B.ED\\\"\"', '0', NULL, 'GXYPP7188H', '50002', 'REGULAR', 15000.00, 'MORNING', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING', '10041001006982', 'THE BANASKANTHA MERCANTILE CO-OP BANK LTD', 'TBMC0001004', 'PALANPUR', NULL, NULL, NULL, NULL, '2024-07-27 10:12:02', '2024-07-27 10:12:02'),
(44, 125, 'KES1044', 1, 'DIRECTOR', 'BOTH', 'HASMUKH', 'MODI', 'AMBALAL', 'MANJUBEN', 'hasmukhmodiNew1959@gmail.com', 'Male', '1959-08-01', '2023-06-01', '9824058966', '9328163554', 'Married', NULL, ' H-95 BHAVYA RESIDENCY ,PARPARA ROAD,PALANPUR', ' H-95 BHAVYA RESIDENCY ,PARPARA ROAD,PALANPUR', '\"\\\"MED PHD\\\"\"', '44 YEARS', NULL, 'ABSPM2961B', '50001', 'REGULAR', 50000.00, 'WHOLE DAY', 'KESAR SCHOOL, KANT(DEESA)', NULL, 'SAVING', '2.5601010004673E+14', 'AXIS BANK', 'UTIB0000256', 'PALANPUR', NULL, NULL, NULL, NULL, '2024-07-27 11:12:58', '2024-07-27 11:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_leaves`
--

CREATE TABLE `teacher_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `reason` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_assigns`
--

CREATE TABLE `teacher_subject_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `standard_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_subject_assigns`
--

INSERT INTO `teacher_subject_assigns` (`id`, `teacher_id`, `subject_id`, `school_id`, `medium_id`, `standard_id`, `created_at`, `updated_at`) VALUES
(6, 14, 102, 1, 3, 17, '2024-07-28 04:47:21', '2024-07-28 04:47:21'),
(7, 42, 101, 1, 3, 17, '2024-07-28 04:49:08', '2024-07-28 04:49:08'),
(8, 18, 106, 1, 3, 17, '2024-07-28 04:49:54', '2024-07-28 04:49:54'),
(9, 18, 105, 1, 3, 17, '2024-07-28 04:51:07', '2024-07-28 04:51:07'),
(10, 41, 103, 1, 3, 17, '2024-07-28 04:51:57', '2024-07-28 04:51:57'),
(11, 22, 104, 1, 3, 17, '2024-07-28 04:53:14', '2024-07-28 04:53:14'),
(12, 17, 107, 1, 3, 17, '2024-07-28 04:53:55', '2024-07-28 04:53:55'),
(13, 35, 108, 1, 3, 17, '2024-07-28 04:54:56', '2024-07-28 04:54:56'),
(14, 29, 109, 1, 3, 17, '2024-07-28 04:55:56', '2024-07-28 04:55:56'),
(15, 1, 110, 1, 3, 17, '2024-07-28 04:56:15', '2024-07-28 04:56:15'),
(16, 42, 80, 1, 3, 22, '2024-07-28 05:05:36', '2024-07-28 05:05:36'),
(17, 18, 85, 1, 3, 22, '2024-07-28 05:06:01', '2024-07-28 05:06:01'),
(18, 18, 84, 1, 3, 22, '2024-07-28 05:06:23', '2024-07-28 05:06:23'),
(19, 14, 81, 1, 3, 22, '2024-07-28 05:06:51', '2024-07-28 05:06:51'),
(20, 41, 82, 1, 3, 22, '2024-07-28 05:08:04', '2024-07-28 05:08:04'),
(21, 22, 83, 1, 3, 22, '2024-07-28 05:08:38', '2024-07-28 05:08:38'),
(22, 17, 86, 1, 3, 22, '2024-07-28 05:09:41', '2024-07-28 05:09:41'),
(23, 35, 87, 1, 3, 22, '2024-07-28 05:10:20', '2024-07-28 05:10:20'),
(24, 29, 88, 1, 3, 22, '2024-07-28 05:10:45', '2024-07-28 05:10:45'),
(25, 1, 89, 1, 3, 22, '2024-07-28 05:11:01', '2024-07-28 05:11:01'),
(26, 42, 121, 1, 3, 23, '2024-07-28 05:11:41', '2024-07-28 05:11:41'),
(27, 18, 126, 1, 3, 23, '2024-07-28 05:12:04', '2024-07-28 05:12:04'),
(28, 18, 125, 1, 3, 23, '2024-07-28 05:12:25', '2024-07-28 05:12:25'),
(29, 14, 122, 1, 3, 23, '2024-07-28 05:12:47', '2024-07-28 05:12:47'),
(30, 5, 123, 1, 3, 23, '2024-07-28 05:13:09', '2024-07-28 05:13:09'),
(31, 22, 124, 1, 3, 23, '2024-07-28 05:13:30', '2024-07-28 05:13:30'),
(32, 17, 127, 1, 3, 23, '2024-07-28 05:13:59', '2024-07-28 05:13:59'),
(33, 35, 128, 1, 3, 23, '2024-07-28 05:14:28', '2024-07-28 05:14:28'),
(34, 29, 129, 1, 3, 23, '2024-07-28 05:15:04', '2024-07-28 05:15:04'),
(35, 1, 130, 1, 3, 23, '2024-07-28 05:15:28', '2024-07-28 05:15:28'),
(36, 42, 146, 1, 3, 24, '2024-07-28 05:17:54', '2024-07-28 05:17:54'),
(37, 18, 151, 1, 3, 24, '2024-07-28 05:18:24', '2024-07-28 05:18:24'),
(38, 18, 150, 1, 3, 24, '2024-07-28 05:18:44', '2024-07-28 05:18:44'),
(39, 14, 147, 1, 3, 24, '2024-07-28 05:19:08', '2024-07-28 05:19:08'),
(41, 22, 149, 1, 3, 24, '2024-07-28 05:20:43', '2024-07-28 05:20:43'),
(42, 17, 156, 1, 3, 24, '2024-07-28 05:24:55', '2024-07-28 05:24:55'),
(43, 35, 152, 1, 3, 24, '2024-07-28 05:25:28', '2024-07-28 05:25:28'),
(44, 29, 154, 1, 3, 24, '2024-07-28 05:25:52', '2024-07-28 05:25:52'),
(45, 17, 157, 1, 3, 24, '2024-07-28 05:26:37', '2024-07-28 05:26:37'),
(46, 17, 158, 1, 3, 24, '2024-07-28 05:27:04', '2024-07-28 05:27:04'),
(47, 1, 159, 1, 3, 24, '2024-07-28 05:27:50', '2024-07-28 05:27:50'),
(48, 35, 155, 1, 3, 24, '2024-07-28 05:28:17', '2024-07-28 05:28:17'),
(49, 35, 153, 1, 3, 24, '2024-07-28 05:28:51', '2024-07-28 05:28:51'),
(50, 1, 160, 1, 3, 24, '2024-07-28 05:29:32', '2024-07-28 05:29:32'),
(51, 42, 176, 1, 3, 25, '2024-07-28 05:30:07', '2024-07-28 05:30:07'),
(52, 18, 181, 1, 3, 25, '2024-07-28 05:30:41', '2024-07-28 05:30:41'),
(53, 18, 180, 1, 3, 25, '2024-07-28 05:30:58', '2024-07-28 05:30:58'),
(54, 14, 177, 1, 3, 25, '2024-07-28 05:31:44', '2024-07-28 05:31:44'),
(55, 41, 178, 1, 3, 25, '2024-07-28 05:32:29', '2024-07-28 05:32:29'),
(56, 22, 179, 1, 3, 25, '2024-07-28 05:32:58', '2024-07-28 05:32:58'),
(57, 17, 186, 1, 3, 25, '2024-07-28 05:33:59', '2024-07-28 05:33:59'),
(58, 35, 182, 1, 3, 25, '2024-07-28 05:34:37', '2024-07-28 05:34:37'),
(59, 35, 183, 1, 3, 25, '2024-07-28 05:35:09', '2024-07-28 05:35:09'),
(60, 29, 184, 1, 3, 25, '2024-07-28 05:35:45', '2024-07-28 05:35:45'),
(61, 35, 185, 1, 3, 25, '2024-07-28 05:36:19', '2024-07-28 05:36:19'),
(62, 17, 187, 1, 3, 25, '2024-07-28 05:36:56', '2024-07-28 05:36:56'),
(63, 17, 188, 1, 3, 25, '2024-07-28 05:37:18', '2024-07-28 05:37:18'),
(64, 1, 189, 1, 3, 25, '2024-07-28 05:37:32', '2024-07-28 05:37:32'),
(65, 1, 190, 1, 3, 25, '2024-07-28 05:37:45', '2024-07-28 05:37:45'),
(66, 42, 90, 1, 4, 19, '2024-07-28 05:38:52', '2024-07-28 05:38:52'),
(68, 19, 96, 1, 4, 19, '2024-07-28 05:42:59', '2024-07-28 05:42:59'),
(69, 19, 95, 1, 4, 19, '2024-07-28 05:43:24', '2024-07-28 05:43:24'),
(70, 14, 91, 1, 4, 19, '2024-07-28 05:43:58', '2024-07-28 05:43:58'),
(71, 11, 93, 1, 4, 19, '2024-07-28 05:44:51', '2024-07-28 05:44:51'),
(72, 5, 94, 1, 4, 19, '2024-07-28 05:45:38', '2024-07-28 05:45:38'),
(73, 17, 97, 1, 4, 19, '2024-07-28 05:46:06', '2024-07-28 05:46:06'),
(74, 35, 98, 1, 4, 19, '2024-07-28 05:46:32', '2024-07-28 05:46:32'),
(75, 29, 99, 1, 4, 19, '2024-07-28 05:46:52', '2024-07-28 05:46:52'),
(76, 1, 100, 1, 4, 19, '2024-07-28 05:47:32', '2024-07-28 05:47:32'),
(77, 42, 70, 1, 4, 15, '2024-07-28 05:48:12', '2024-07-28 05:48:12'),
(78, 19, 75, 1, 4, 15, '2024-07-28 05:48:40', '2024-07-28 05:48:40'),
(79, 19, 74, 1, 4, 15, '2024-07-28 05:49:11', '2024-07-28 05:49:11'),
(80, 14, 71, 1, 4, 15, '2024-07-28 05:49:44', '2024-07-28 05:49:44'),
(81, 11, 72, 1, 4, 15, '2024-07-28 05:50:05', '2024-07-28 05:50:05'),
(82, 5, 73, 1, 4, 15, '2024-07-28 05:50:19', '2024-07-28 05:50:19'),
(83, 17, 76, 1, 4, 15, '2024-07-28 05:50:58', '2024-07-28 05:50:58'),
(84, 35, 77, 1, 4, 15, '2024-07-28 05:51:33', '2024-07-28 05:51:33'),
(85, 29, 78, 1, 4, 15, '2024-07-28 05:51:52', '2024-07-28 05:51:52'),
(86, 1, 79, 1, 4, 15, '2024-07-28 05:52:21', '2024-07-28 05:52:21'),
(87, 42, 111, 1, 4, 16, '2024-07-28 05:53:03', '2024-07-28 05:53:03'),
(88, 19, 116, 1, 4, 16, '2024-07-28 05:53:57', '2024-07-28 05:53:57'),
(89, 19, 115, 1, 4, 16, '2024-07-28 05:54:28', '2024-07-28 05:54:28'),
(90, 14, 112, 1, 4, 16, '2024-07-28 05:54:59', '2024-07-28 05:54:59'),
(91, 11, 113, 1, 4, 16, '2024-07-28 05:55:20', '2024-07-28 05:55:20'),
(92, 5, 114, 1, 4, 16, '2024-07-28 05:55:35', '2024-07-28 05:55:35'),
(93, 17, 117, 1, 4, 16, '2024-07-28 05:55:59', '2024-07-28 05:55:59'),
(94, 35, 118, 1, 4, 16, '2024-07-28 05:56:32', '2024-07-28 05:56:32'),
(95, 29, 119, 1, 4, 16, '2024-07-28 05:56:49', '2024-07-28 05:56:49'),
(96, 1, 120, 1, 4, 16, '2024-07-28 05:57:19', '2024-07-28 05:57:19'),
(97, 42, 131, 1, 4, 26, '2024-07-28 05:57:51', '2024-07-28 05:57:51'),
(98, 19, 136, 1, 4, 26, '2024-07-28 05:58:16', '2024-07-28 05:58:16'),
(99, 19, 135, 1, 4, 26, '2024-07-28 05:58:40', '2024-07-28 05:58:40'),
(100, 14, 132, 1, 4, 26, '2024-07-28 05:59:06', '2024-07-28 05:59:06'),
(101, 11, 133, 1, 4, 26, '2024-07-28 05:59:24', '2024-07-28 05:59:24'),
(102, 5, 134, 1, 4, 26, '2024-07-28 05:59:40', '2024-07-28 05:59:40'),
(103, 17, 141, 1, 4, 26, '2024-07-28 06:00:20', '2024-07-28 06:00:20'),
(104, 36, 137, 1, 4, 26, '2024-07-28 06:01:16', '2024-07-28 06:01:16'),
(105, 36, 138, 1, 4, 26, '2024-07-28 06:02:03', '2024-07-28 06:02:03'),
(106, 36, 140, 1, 4, 26, '2024-07-28 06:02:33', '2024-07-28 06:02:33'),
(107, 38, 139, 1, 4, 26, '2024-07-28 06:03:01', '2024-07-28 06:03:01'),
(108, 17, 142, 1, 4, 26, '2024-07-28 06:03:32', '2024-07-28 06:03:32'),
(109, 17, 143, 1, 4, 26, '2024-07-28 06:03:51', '2024-07-28 06:03:51'),
(110, 1, 144, 1, 4, 26, '2024-07-28 06:04:12', '2024-07-28 06:04:12'),
(111, 1, 145, 1, 4, 26, '2024-07-28 06:04:27', '2024-07-28 06:04:27'),
(112, 42, 161, 1, 4, 27, '2024-07-28 06:04:58', '2024-07-28 06:04:58'),
(113, 19, 166, 1, 4, 27, '2024-07-28 06:05:17', '2024-07-28 06:05:17'),
(114, 19, 165, 1, 4, 27, '2024-07-28 06:05:32', '2024-07-28 06:05:32'),
(115, 14, 162, 1, 4, 27, '2024-07-28 06:05:44', '2024-07-28 06:05:44'),
(116, 11, 163, 1, 4, 27, '2024-07-28 06:06:04', '2024-07-28 06:06:04'),
(117, 5, 164, 1, 4, 27, '2024-07-28 06:06:22', '2024-07-28 06:06:22'),
(118, 17, 171, 1, 4, 27, '2024-07-28 06:06:50', '2024-07-28 06:06:50'),
(119, 36, 167, 1, 4, 27, '2024-07-28 06:07:24', '2024-07-28 06:07:24'),
(120, 36, 168, 1, 4, 27, '2024-07-28 06:07:44', '2024-07-28 06:07:44'),
(121, 36, 170, 1, 4, 27, '2024-07-28 06:08:07', '2024-07-28 06:08:07'),
(122, 38, 169, 1, 4, 27, '2024-07-28 06:08:36', '2024-07-28 06:08:36'),
(123, 17, 172, 1, 4, 27, '2024-07-28 06:09:08', '2024-07-28 06:09:08'),
(124, 17, 173, 1, 4, 27, '2024-07-28 06:09:48', '2024-07-28 06:09:48'),
(125, 1, 174, 1, 4, 27, '2024-07-28 06:10:10', '2024-07-28 06:10:10'),
(126, 1, 175, 1, 4, 27, '2024-07-28 06:10:25', '2024-07-28 06:10:25'),
(127, 6, 205, 1, 3, 28, '2024-07-28 09:00:55', '2024-07-28 09:00:55'),
(128, 25, 211, 1, 3, 28, '2024-07-28 09:01:43', '2024-07-28 09:01:43'),
(129, 25, 210, 1, 3, 28, '2024-07-28 09:04:06', '2024-07-28 09:04:06'),
(130, 34, 209, 1, 3, 28, '2024-07-28 09:14:41', '2024-07-28 09:14:41'),
(131, 8, 206, 1, 3, 28, '2024-07-28 09:15:06', '2024-07-28 09:15:06'),
(132, 12, 207, 1, 3, 28, '2024-07-28 09:15:29', '2024-07-28 09:15:29'),
(133, 15, 208, 1, 3, 28, '2024-07-28 09:15:50', '2024-07-28 09:15:50'),
(134, 24, 212, 1, 3, 28, '2024-07-28 09:16:22', '2024-07-28 09:16:22'),
(135, 35, 213, 1, 3, 28, '2024-07-28 09:16:50', '2024-07-28 09:16:50'),
(136, 35, 215, 1, 3, 28, '2024-07-28 09:17:16', '2024-07-28 09:17:16'),
(137, 29, 214, 1, 3, 28, '2024-07-28 09:17:41', '2024-07-28 09:17:41'),
(138, 23, 216, 1, 3, 28, '2024-07-28 09:18:18', '2024-07-28 09:18:18'),
(139, 23, 217, 1, 3, 28, '2024-07-28 09:19:05', '2024-07-28 09:19:05'),
(140, 1, 218, 1, 3, 28, '2024-07-28 09:19:26', '2024-07-28 09:19:26'),
(141, 6, 233, 1, 3, 29, '2024-07-28 09:20:04', '2024-07-28 09:20:04'),
(142, 25, 239, 1, 3, 29, '2024-07-28 09:20:32', '2024-07-28 09:20:32'),
(143, 25, 238, 1, 3, 29, '2024-07-28 09:21:04', '2024-07-28 09:21:04'),
(144, 34, 237, 1, 3, 29, '2024-07-28 09:21:55', '2024-07-28 09:21:55'),
(145, 8, 234, 1, 3, 29, '2024-07-28 09:22:14', '2024-07-28 09:22:14'),
(146, 12, 235, 1, 3, 29, '2024-07-28 09:22:32', '2024-07-28 09:22:32'),
(147, 15, 236, 1, 3, 29, '2024-07-28 09:22:53', '2024-07-28 09:22:53'),
(148, 24, 240, 1, 3, 29, '2024-07-28 09:23:24', '2024-07-28 09:23:24'),
(149, 35, 241, 1, 3, 29, '2024-07-28 09:23:48', '2024-07-28 09:23:48'),
(150, 35, 243, 1, 3, 29, '2024-07-28 09:24:11', '2024-07-28 09:24:11'),
(151, 29, 242, 1, 3, 29, '2024-07-28 09:24:36', '2024-07-28 09:24:36'),
(152, 23, 244, 1, 3, 29, '2024-07-28 09:25:14', '2024-07-28 09:25:14'),
(153, 23, 245, 1, 3, 29, '2024-07-28 09:25:35', '2024-07-28 09:25:35'),
(154, 1, 246, 1, 3, 29, '2024-07-28 09:25:51', '2024-07-28 09:25:51'),
(155, 6, 261, 1, 3, 30, '2024-07-28 09:26:11', '2024-07-28 09:26:11'),
(156, 25, 267, 1, 3, 30, '2024-07-28 09:26:36', '2024-07-28 09:26:36'),
(157, 25, 266, 1, 3, 30, '2024-07-28 09:27:02', '2024-07-28 09:27:02'),
(158, 34, 265, 1, 3, 30, '2024-07-28 09:27:33', '2024-07-28 09:27:33'),
(160, 8, 262, 1, 3, 30, '2024-07-28 09:31:28', '2024-07-28 09:31:28'),
(161, 12, 263, 1, 3, 30, '2024-07-28 09:31:44', '2024-07-28 09:31:44'),
(162, 15, 264, 1, 3, 30, '2024-07-28 09:35:09', '2024-07-28 09:35:09'),
(163, 24, 268, 1, 3, 30, '2024-07-28 09:35:35', '2024-07-28 09:35:35'),
(164, 35, 269, 1, 3, 30, '2024-07-28 09:35:58', '2024-07-28 09:35:58'),
(165, 35, 271, 1, 3, 30, '2024-07-28 09:36:18', '2024-07-28 09:36:18'),
(166, 29, 270, 1, 3, 30, '2024-07-28 09:36:51', '2024-07-28 09:36:51'),
(167, 23, 272, 1, 3, 30, '2024-07-28 09:37:18', '2024-07-28 09:37:18'),
(168, 23, 273, 1, 3, 30, '2024-07-28 09:37:43', '2024-07-28 09:37:43'),
(169, 6, 191, 1, 4, 40, '2024-07-28 09:41:34', '2024-07-28 09:41:34'),
(170, 27, 197, 1, 4, 40, '2024-07-28 09:43:29', '2024-07-28 09:43:29'),
(171, 27, 196, 1, 4, 40, '2024-07-28 09:43:56', '2024-07-28 09:43:56'),
(172, 34, 195, 1, 4, 40, '2024-07-28 09:44:38', '2024-07-28 09:44:38'),
(174, 12, 193, 1, 4, 40, '2024-07-28 09:45:21', '2024-07-28 09:45:21'),
(175, 15, 194, 1, 4, 40, '2024-07-28 09:45:39', '2024-07-28 09:45:39'),
(176, 24, 198, 1, 4, 40, '2024-07-28 09:46:06', '2024-07-28 09:46:06'),
(177, 36, 199, 1, 4, 40, '2024-07-28 09:46:38', '2024-07-28 09:46:38'),
(178, 36, 201, 1, 4, 40, '2024-07-28 09:46:58', '2024-07-28 09:46:58'),
(179, 38, 200, 1, 4, 40, '2024-07-28 09:47:21', '2024-07-28 09:47:21'),
(180, 23, 202, 1, 4, 40, '2024-07-28 09:47:49', '2024-07-28 09:47:49'),
(181, 23, 203, 1, 4, 40, '2024-07-28 09:48:10', '2024-07-28 09:48:10'),
(182, 1, 204, 1, 4, 40, '2024-07-28 09:48:25', '2024-07-28 09:48:25'),
(183, 6, 219, 1, 4, 41, '2024-07-28 09:48:49', '2024-07-28 09:48:49'),
(184, 27, 225, 1, 4, 41, '2024-07-28 09:49:23', '2024-07-28 09:49:23'),
(185, 27, 224, 1, 4, 41, '2024-07-28 09:49:46', '2024-07-28 09:49:46'),
(186, 8, 223, 1, 4, 41, '2024-07-28 09:50:08', '2024-07-28 09:50:08'),
(187, 12, 221, 1, 4, 41, '2024-07-28 09:50:29', '2024-07-28 09:50:29'),
(188, 15, 222, 1, 4, 41, '2024-07-28 09:50:49', '2024-07-28 09:50:49'),
(189, 24, 226, 1, 4, 41, '2024-07-28 09:51:20', '2024-07-28 09:51:20'),
(190, 36, 227, 1, 4, 41, '2024-07-28 09:51:47', '2024-07-28 09:51:47'),
(191, 36, 229, 1, 4, 41, '2024-07-28 09:52:11', '2024-07-28 09:52:11'),
(192, 38, 228, 1, 4, 41, '2024-07-28 09:52:40', '2024-07-28 09:52:40'),
(193, 23, 230, 1, 4, 41, '2024-07-28 09:53:12', '2024-07-28 09:53:12'),
(194, 23, 231, 1, 4, 41, '2024-07-28 09:53:41', '2024-07-28 09:53:41'),
(195, 1, 232, 1, 4, 41, '2024-07-28 09:53:56', '2024-07-28 09:53:56'),
(196, 6, 247, 1, 4, 42, '2024-07-28 09:54:17', '2024-07-28 09:54:17'),
(197, 27, 253, 1, 4, 42, '2024-07-28 09:54:52', '2024-07-28 09:54:52'),
(198, 27, 252, 1, 4, 42, '2024-07-28 09:55:23', '2024-07-28 09:55:23'),
(199, 34, 251, 1, 4, 42, '2024-07-28 09:56:03', '2024-07-28 09:56:03'),
(200, 20, 248, 1, 4, 42, '2024-07-28 09:56:34', '2024-07-28 09:56:34'),
(201, 20, 220, 1, 4, 41, '2024-07-28 09:59:31', '2024-07-28 09:59:31'),
(202, 20, 192, 1, 4, 40, '2024-07-28 10:01:07', '2024-07-28 10:01:07'),
(203, 15, 250, 1, 4, 42, '2024-07-28 10:02:16', '2024-07-28 10:02:16'),
(204, 24, 254, 1, 4, 42, '2024-07-28 10:03:05', '2024-07-28 10:03:05'),
(205, 36, 255, 1, 4, 42, '2024-07-28 10:03:36', '2024-07-28 10:03:36'),
(206, 36, 257, 1, 4, 42, '2024-07-28 10:03:55', '2024-07-28 10:03:55'),
(207, 38, 256, 1, 4, 42, '2024-07-28 10:04:23', '2024-07-28 10:04:23'),
(208, 23, 258, 1, 4, 42, '2024-07-28 10:05:48', '2024-07-28 10:05:48'),
(209, 23, 259, 1, 4, 42, '2024-07-28 10:06:10', '2024-07-28 10:06:10'),
(210, 1, 260, 1, 4, 42, '2024-07-28 10:06:25', '2024-07-28 10:06:25'),
(212, 12, 249, 1, 4, 42, '2024-07-28 10:18:02', '2024-07-28 10:18:02'),
(213, 1, 274, 1, 3, 30, '2024-07-28 10:21:04', '2024-07-28 10:21:04'),
(214, 3, 292, 1, 3, 31, '2024-07-28 10:22:12', '2024-07-28 10:22:12'),
(216, 10, 301, 1, 3, 31, '2024-07-28 10:24:10', '2024-07-28 10:24:10'),
(217, 10, 300, 1, 3, 31, '2024-07-28 10:25:55', '2024-07-28 10:25:55'),
(218, 24, 302, 1, 3, 31, '2024-07-28 10:26:35', '2024-07-28 10:26:35'),
(219, 9, 296, 1, 3, 31, '2024-07-28 10:27:15', '2024-07-28 10:27:15'),
(220, 43, 294, 1, 3, 31, '2024-07-28 10:27:38', '2024-07-28 10:27:38'),
(221, 8, 293, 1, 3, 31, '2024-07-28 10:28:15', '2024-07-28 10:28:15'),
(222, 15, 295, 1, 3, 31, '2024-07-28 10:28:33', '2024-07-28 10:28:33'),
(223, 35, 307, 1, 3, 31, '2024-07-28 10:29:41', '2024-07-28 10:29:41'),
(224, 29, 308, 1, 3, 31, '2024-07-28 10:30:04', '2024-07-28 10:30:04'),
(225, 35, 306, 1, 3, 31, '2024-07-28 10:30:19', '2024-07-28 10:30:19'),
(226, 7, 297, 1, 3, 31, '2024-07-28 10:31:17', '2024-07-28 10:31:17'),
(227, 13, 298, 1, 3, 31, '2024-07-28 10:31:35', '2024-07-28 10:31:35'),
(228, 16, 299, 1, 3, 31, '2024-07-28 10:32:10', '2024-07-28 10:32:10'),
(229, 23, 303, 1, 3, 31, '2024-07-28 10:32:55', '2024-07-28 10:32:55'),
(230, 23, 304, 1, 3, 31, '2024-07-28 10:33:15', '2024-07-28 10:33:15'),
(231, 1, 305, 1, 3, 31, '2024-07-28 10:33:46', '2024-07-28 10:33:46'),
(232, 1, 589, 1, 3, 31, '2024-07-28 10:43:29', '2024-07-28 10:43:29'),
(233, 3, 325, 1, 3, 32, '2024-07-28 10:44:23', '2024-07-28 10:44:23'),
(234, 10, 333, 1, 3, 32, '2024-07-28 11:05:55', '2024-07-28 11:05:55'),
(235, 10, 334, 1, 3, 32, '2024-07-28 11:06:13', '2024-07-28 11:06:13'),
(236, 24, 335, 1, 3, 32, '2024-07-28 11:06:50', '2024-07-28 11:06:50'),
(237, 9, 329, 1, 3, 32, '2024-07-28 11:07:21', '2024-07-28 11:07:21'),
(238, 43, 327, 1, 3, 32, '2024-07-28 11:07:37', '2024-07-28 11:07:37'),
(239, 8, 326, 1, 3, 32, '2024-07-28 11:08:01', '2024-07-28 11:08:01'),
(240, 15, 328, 1, 3, 32, '2024-07-28 11:08:20', '2024-07-28 11:08:20'),
(241, 35, 340, 1, 3, 32, '2024-07-28 11:08:52', '2024-07-28 11:08:52'),
(242, 35, 339, 1, 3, 32, '2024-07-28 11:09:09', '2024-07-28 11:09:09'),
(243, 29, 341, 1, 3, 32, '2024-07-28 11:09:29', '2024-07-28 11:09:29'),
(244, 7, 330, 1, 3, 32, '2024-07-28 11:09:55', '2024-07-28 11:09:55'),
(245, 13, 331, 1, 3, 32, '2024-07-28 11:10:11', '2024-07-28 11:10:11'),
(246, 16, 332, 1, 3, 32, '2024-07-28 11:10:30', '2024-07-28 11:10:30'),
(247, 23, 336, 1, 3, 32, '2024-07-28 11:10:50', '2024-07-28 11:10:50'),
(248, 23, 337, 1, 3, 32, '2024-07-28 11:11:07', '2024-07-28 11:11:07'),
(249, 1, 338, 1, 3, 32, '2024-07-28 11:11:24', '2024-07-28 11:11:24'),
(250, 1, 590, 1, 3, 32, '2024-07-28 11:11:42', '2024-07-28 11:11:42'),
(251, 3, 359, 1, 3, 33, '2024-07-28 12:04:13', '2024-07-28 12:04:13'),
(252, 10, 367, 1, 3, 33, '2024-07-28 12:04:34', '2024-07-28 12:04:34'),
(253, 10, 368, 1, 3, 33, '2024-07-28 12:04:54', '2024-07-28 12:04:54'),
(254, 24, 369, 1, 3, 33, '2024-07-28 12:06:40', '2024-07-28 12:06:40'),
(255, 9, 363, 1, 3, 33, '2024-07-28 12:07:14', '2024-07-28 12:07:14'),
(256, 43, 361, 1, 3, 33, '2024-07-28 12:07:37', '2024-07-28 12:07:37'),
(257, 8, 360, 1, 3, 33, '2024-07-28 12:07:50', '2024-07-28 12:07:50'),
(258, 15, 362, 1, 3, 33, '2024-07-28 12:08:18', '2024-07-28 12:08:18'),
(259, 35, 375, 1, 3, 33, '2024-07-28 12:08:53', '2024-07-28 12:08:53'),
(260, 35, 374, 1, 3, 33, '2024-07-28 12:09:11', '2024-07-28 12:09:11'),
(261, 29, 376, 1, 3, 33, '2024-07-28 12:09:27', '2024-07-28 12:09:27'),
(262, 7, 364, 1, 3, 33, '2024-07-28 12:09:54', '2024-07-28 12:09:54'),
(263, 13, 365, 1, 3, 33, '2024-07-28 12:10:09', '2024-07-28 12:10:09'),
(264, 16, 366, 1, 3, 33, '2024-07-28 12:10:25', '2024-07-28 12:10:25'),
(265, 23, 370, 1, 3, 33, '2024-07-28 12:10:47', '2024-07-28 12:10:47'),
(266, 23, 371, 1, 3, 33, '2024-07-28 12:11:08', '2024-07-28 12:11:08'),
(267, 1, 372, 1, 3, 33, '2024-07-28 12:11:36', '2024-07-28 12:11:36'),
(268, 1, 591, 1, 3, 33, '2024-07-28 12:11:51', '2024-07-28 12:11:51'),
(269, 3, 275, 1, 4, 43, '2024-07-28 12:12:21', '2024-07-28 12:12:21'),
(270, 37, 283, 1, 4, 43, '2024-07-28 12:12:54', '2024-07-28 12:12:54'),
(271, 10, 284, 1, 4, 43, '2024-07-28 12:13:13', '2024-07-28 12:13:13'),
(272, 24, 285, 1, 4, 43, '2024-07-28 12:14:09', '2024-07-28 12:14:09'),
(273, 26, 279, 1, 4, 43, '2024-07-28 12:15:07', '2024-07-28 12:15:07'),
(274, 33, 277, 1, 4, 43, '2024-07-28 12:15:32', '2024-07-28 12:15:32'),
(275, 20, 276, 1, 4, 43, '2024-07-28 12:15:53', '2024-07-28 12:15:53'),
(276, 15, 278, 1, 4, 43, '2024-07-28 12:16:13', '2024-07-28 12:16:13'),
(277, 36, 290, 1, 4, 43, '2024-07-28 12:16:43', '2024-07-28 12:16:43'),
(278, 36, 289, 1, 4, 43, '2024-07-28 12:17:03', '2024-07-28 12:17:03'),
(279, 38, 291, 1, 4, 43, '2024-07-28 12:17:21', '2024-07-28 12:17:21'),
(280, 7, 280, 1, 4, 43, '2024-07-28 12:17:49', '2024-07-28 12:17:49'),
(281, 13, 281, 1, 4, 43, '2024-07-28 12:18:04', '2024-07-28 12:18:04'),
(282, 16, 282, 1, 4, 43, '2024-07-28 12:18:26', '2024-07-28 12:18:26'),
(283, 23, 286, 1, 4, 43, '2024-07-28 12:18:44', '2024-07-28 12:18:44'),
(284, 23, 287, 1, 4, 43, '2024-07-28 12:19:10', '2024-07-28 12:19:10'),
(285, 1, 288, 1, 4, 43, '2024-07-28 12:19:27', '2024-07-28 12:19:27'),
(286, 1, 598, 1, 4, 43, '2024-07-28 12:19:42', '2024-07-28 12:19:42'),
(287, 3, 309, 1, 4, 44, '2024-07-28 12:20:01', '2024-07-28 12:20:01'),
(288, 37, 316, 1, 4, 44, '2024-07-28 12:20:23', '2024-07-28 12:20:23'),
(289, 10, 317, 1, 4, 44, '2024-07-28 12:20:40', '2024-07-28 12:20:40'),
(290, 24, 318, 1, 4, 44, '2024-07-28 12:21:14', '2024-07-28 12:21:14'),
(291, 26, 313, 1, 4, 44, '2024-07-28 12:21:40', '2024-07-28 12:21:40'),
(292, 33, 311, 1, 4, 44, '2024-07-28 12:22:10', '2024-07-28 12:22:10'),
(293, 20, 310, 1, 4, 44, '2024-07-28 12:22:37', '2024-07-28 12:22:37'),
(294, 15, 312, 1, 4, 44, '2024-07-28 12:22:52', '2024-07-28 12:22:52'),
(295, 36, 323, 1, 4, 44, '2024-07-28 12:23:38', '2024-07-28 12:23:38'),
(296, 36, 322, 1, 4, 44, '2024-07-28 12:24:03', '2024-07-28 12:24:03'),
(297, 38, 324, 1, 4, 44, '2024-07-28 12:24:20', '2024-07-28 12:24:20'),
(298, 7, 314, 1, 4, 44, '2024-07-28 12:24:48', '2024-07-28 12:24:48'),
(299, 13, 315, 1, 4, 44, '2024-07-28 12:25:05', '2024-07-28 12:25:05'),
(300, 16, 342, 1, 4, 44, '2024-07-28 12:25:24', '2024-07-28 12:25:24'),
(301, 23, 319, 1, 4, 44, '2024-07-28 12:25:52', '2024-07-28 12:25:52'),
(302, 23, 320, 1, 4, 44, '2024-07-28 12:26:10', '2024-07-28 12:26:10'),
(303, 1, 321, 1, 4, 44, '2024-07-28 12:26:24', '2024-07-28 12:26:24'),
(304, 1, 599, 1, 4, 44, '2024-07-28 12:26:50', '2024-07-28 12:26:50'),
(305, 3, 343, 1, 4, 46, '2024-07-28 12:27:17', '2024-07-28 12:27:17'),
(306, 37, 350, 1, 4, 46, '2024-07-28 12:27:49', '2024-07-28 12:27:49'),
(307, 10, 351, 1, 4, 46, '2024-07-28 12:28:11', '2024-07-28 12:28:11'),
(308, 24, 352, 1, 4, 46, '2024-07-28 12:28:33', '2024-07-28 12:28:33'),
(309, 26, 347, 1, 4, 46, '2024-07-28 12:29:21', '2024-07-28 12:29:21'),
(310, 33, 345, 1, 4, 46, '2024-07-28 12:29:42', '2024-07-28 12:29:42'),
(311, 20, 344, 1, 4, 46, '2024-07-28 12:29:58', '2024-07-28 12:29:58'),
(312, 15, 346, 1, 4, 46, '2024-07-28 12:30:16', '2024-07-28 12:30:16'),
(313, 36, 357, 1, 4, 46, '2024-07-28 12:30:52', '2024-07-28 12:30:52'),
(314, 36, 356, 1, 4, 46, '2024-07-28 12:31:14', '2024-07-28 12:31:14'),
(315, 38, 358, 1, 4, 46, '2024-07-28 12:31:38', '2024-07-28 12:31:38'),
(316, 7, 348, 1, 4, 46, '2024-07-28 12:32:37', '2024-07-28 12:32:37'),
(317, 13, 373, 1, 4, 46, '2024-07-28 12:33:00', '2024-07-28 12:33:00'),
(318, 16, 349, 1, 4, 46, '2024-07-28 12:33:25', '2024-07-28 12:33:25'),
(319, 23, 353, 1, 4, 46, '2024-07-28 12:33:49', '2024-07-28 12:33:49'),
(320, 23, 354, 1, 4, 46, '2024-07-28 12:34:04', '2024-07-28 12:34:04'),
(321, 1, 355, 1, 4, 46, '2024-07-28 12:34:20', '2024-07-28 12:34:20'),
(322, 1, 600, 1, 4, 46, '2024-07-28 12:34:36', '2024-07-28 12:34:36'),
(323, 3, 394, 1, 3, 34, '2024-07-28 12:38:53', '2024-07-28 12:38:53'),
(324, 10, 402, 1, 3, 34, '2024-07-28 12:39:10', '2024-07-28 12:39:10'),
(325, 10, 403, 1, 3, 34, '2024-07-28 12:39:26', '2024-07-28 12:39:26'),
(326, 24, 404, 1, 3, 34, '2024-07-28 12:40:43', '2024-07-28 12:40:43'),
(327, 9, 398, 1, 3, 34, '2024-07-28 12:41:10', '2024-07-28 12:41:10'),
(328, 43, 396, 1, 3, 34, '2024-07-28 12:41:32', '2024-07-28 12:41:32'),
(329, 8, 395, 1, 3, 34, '2024-07-28 12:41:57', '2024-07-28 12:41:57'),
(330, 15, 397, 1, 3, 34, '2024-07-28 12:42:13', '2024-07-28 12:42:13'),
(331, 35, 409, 1, 3, 34, '2024-07-28 12:42:48', '2024-07-28 12:42:48'),
(332, 35, 408, 1, 3, 34, '2024-07-28 12:43:08', '2024-07-28 12:43:08'),
(333, 29, 410, 1, 3, 34, '2024-07-28 12:43:30', '2024-07-28 12:43:30'),
(334, 7, 399, 1, 3, 34, '2024-07-28 12:44:08', '2024-07-28 12:44:08'),
(335, 13, 400, 1, 3, 34, '2024-07-28 12:44:25', '2024-07-28 12:44:25'),
(336, 16, 401, 1, 3, 34, '2024-07-28 12:44:54', '2024-07-28 12:44:54'),
(337, 23, 405, 1, 3, 34, '2024-07-28 12:45:34', '2024-07-28 12:45:34'),
(338, 23, 406, 1, 3, 34, '2024-07-28 12:45:55', '2024-07-28 12:45:55'),
(339, 1, 407, 1, 3, 34, '2024-07-28 12:46:12', '2024-07-28 12:46:12'),
(340, 1, 592, 1, 3, 34, '2024-07-28 12:46:29', '2024-07-28 12:46:29'),
(341, 3, 428, 1, 3, 35, '2024-07-28 12:46:46', '2024-07-28 12:46:46'),
(342, 10, 435, 1, 3, 35, '2024-07-28 12:47:04', '2024-07-28 12:47:04'),
(343, 10, 444, 1, 3, 35, '2024-07-28 12:47:42', '2024-07-28 12:47:42'),
(344, 24, 436, 1, 3, 35, '2024-07-28 12:48:24', '2024-07-28 12:48:24'),
(345, 15, 437, 1, 3, 35, '2024-07-28 12:48:42', '2024-07-28 12:48:42'),
(346, 8, 438, 1, 3, 35, '2024-07-28 12:49:01', '2024-07-28 12:49:01'),
(347, 35, 439, 1, 3, 35, '2024-07-28 12:49:41', '2024-07-28 12:49:41'),
(348, 29, 440, 1, 3, 35, '2024-07-28 12:50:10', '2024-07-28 12:50:10'),
(349, 23, 441, 1, 3, 35, '2024-07-28 12:50:32', '2024-07-28 12:50:32'),
(350, 43, 430, 1, 3, 35, '2024-07-28 12:51:20', '2024-07-28 12:51:20'),
(351, 9, 431, 1, 3, 35, '2024-07-28 12:51:44', '2024-07-28 12:51:44'),
(352, 8, 429, 1, 3, 35, '2024-07-28 12:52:28', '2024-07-28 12:52:28'),
(353, 7, 432, 1, 3, 35, '2024-07-28 12:52:46', '2024-07-28 12:52:46'),
(354, 13, 433, 1, 3, 35, '2024-07-28 12:53:09', '2024-07-28 12:53:09'),
(355, 16, 434, 1, 3, 35, '2024-07-28 12:53:43', '2024-07-28 12:53:43'),
(356, 23, 442, 1, 3, 35, '2024-07-28 12:54:34', '2024-07-28 12:54:34'),
(357, 1, 443, 1, 3, 35, '2024-07-28 12:54:54', '2024-07-28 12:54:54'),
(358, 1, 593, 1, 3, 35, '2024-07-28 12:56:36', '2024-07-28 12:56:36'),
(359, 3, 411, 1, 4, 48, '2024-07-28 12:58:57', '2024-07-28 12:58:57'),
(360, 10, 427, 1, 4, 48, '2024-07-28 12:59:16', '2024-07-28 12:59:16'),
(361, 37, 418, 1, 4, 48, '2024-07-28 12:59:38', '2024-07-28 12:59:38'),
(362, 24, 419, 1, 4, 48, '2024-07-28 13:00:19', '2024-07-28 13:00:19'),
(363, 15, 420, 1, 4, 48, '2024-07-28 13:00:48', '2024-07-28 13:00:48'),
(364, 20, 421, 1, 4, 48, '2024-07-28 13:01:18', '2024-07-28 13:01:18'),
(365, 36, 422, 1, 4, 48, '2024-07-28 13:01:40', '2024-07-28 13:01:40'),
(366, 38, 423, 1, 4, 48, '2024-07-28 13:02:06', '2024-07-28 13:02:06'),
(367, 23, 424, 1, 4, 48, '2024-07-28 13:02:30', '2024-07-28 13:02:30'),
(368, 33, 412, 1, 4, 48, '2024-07-28 13:03:02', '2024-07-28 13:03:02'),
(369, 20, 413, 1, 4, 48, '2024-07-28 13:03:18', '2024-07-28 13:03:18'),
(370, 26, 414, 1, 4, 48, '2024-07-28 13:03:52', '2024-07-28 13:03:52'),
(371, 7, 415, 1, 4, 48, '2024-07-28 13:10:11', '2024-07-28 13:10:11'),
(372, 13, 416, 1, 4, 48, '2024-07-28 13:10:27', '2024-07-28 13:10:27'),
(373, 16, 417, 1, 4, 48, '2024-07-28 13:10:43', '2024-07-28 13:10:43'),
(374, 23, 425, 1, 4, 48, '2024-07-28 13:11:07', '2024-07-28 13:11:07'),
(375, 1, 426, 1, 4, 48, '2024-07-28 13:11:27', '2024-07-28 13:11:27'),
(376, 1, 602, 1, 4, 48, '2024-07-28 13:11:42', '2024-07-28 13:11:42'),
(377, 3, 465, 1, 3, 36, '2024-07-28 16:41:34', '2024-07-28 16:41:34'),
(378, 43, 466, 1, 3, 36, '2024-07-28 16:44:09', '2024-07-28 16:44:09'),
(379, 28, 467, 1, 3, 36, '2024-07-28 16:44:44', '2024-07-28 16:44:44'),
(380, 15, 468, 1, 3, 36, '2024-07-28 16:45:09', '2024-07-28 16:45:09'),
(381, 2, 469, 1, 3, 36, '2024-07-28 16:45:58', '2024-07-28 16:45:58'),
(382, 39, 470, 1, 3, 36, '2024-07-28 16:46:37', '2024-07-28 16:46:37'),
(383, 8, 471, 1, 3, 36, '2024-07-28 16:47:03', '2024-07-28 16:47:03'),
(384, 24, 472, 1, 3, 36, '2024-07-28 16:47:22', '2024-07-28 16:47:22'),
(385, 39, 473, 1, 3, 36, '2024-07-28 16:47:42', '2024-07-28 16:47:42'),
(386, 28, 474, 1, 3, 36, '2024-07-28 16:48:22', '2024-07-28 16:48:22'),
(387, 39, 475, 1, 3, 36, '2024-07-28 16:48:43', '2024-07-28 16:48:43'),
(388, 10, 476, 1, 3, 36, '2024-07-28 16:49:18', '2024-07-28 16:49:18'),
(389, 10, 477, 1, 3, 36, '2024-07-28 16:49:39', '2024-07-28 16:49:39'),
(390, 10, 478, 1, 3, 36, '2024-07-28 16:49:59', '2024-07-28 16:49:59'),
(391, 39, 479, 1, 3, 36, '2024-07-28 16:50:25', '2024-07-28 16:50:25'),
(392, 39, 480, 1, 3, 36, '2024-07-28 16:50:51', '2024-07-28 16:50:51'),
(393, 36, 481, 1, 3, 36, '2024-07-28 16:51:15', '2024-07-28 16:51:15'),
(394, 38, 482, 1, 3, 36, '2024-07-28 16:51:41', '2024-07-28 16:51:41'),
(395, 10, 483, 1, 3, 36, '2024-07-28 16:52:08', '2024-07-28 16:52:08'),
(396, 23, 484, 1, 3, 36, '2024-07-28 16:52:28', '2024-07-28 16:52:28'),
(397, 10, 488, 1, 3, 36, '2024-07-28 16:52:49', '2024-07-28 16:52:49'),
(398, 39, 489, 1, 3, 36, '2024-07-28 16:53:10', '2024-07-28 16:53:10'),
(399, 26, 490, 1, 3, 36, '2024-07-28 16:53:59', '2024-07-28 16:53:59'),
(400, 1, 594, 1, 3, 36, '2024-07-28 16:54:13', '2024-07-28 16:54:13'),
(401, 3, 514, 1, 3, 37, '2024-07-28 16:54:26', '2024-07-28 16:54:26'),
(402, 43, 515, 1, 3, 37, '2024-07-28 16:54:45', '2024-07-28 16:54:45'),
(403, 28, 516, 1, 3, 37, '2024-07-28 16:55:19', '2024-07-28 16:55:19'),
(404, 15, 517, 1, 3, 37, '2024-07-28 16:55:36', '2024-07-28 16:55:36'),
(405, 2, 518, 1, 3, 37, '2024-07-28 16:56:09', '2024-07-28 16:56:09'),
(406, 39, 519, 1, 3, 37, '2024-07-28 16:56:28', '2024-07-28 16:56:28'),
(407, 20, 520, 1, 3, 37, '2024-07-28 16:56:59', '2024-07-28 16:56:59'),
(408, 24, 521, 1, 3, 37, '2024-07-28 16:57:24', '2024-07-28 16:57:24'),
(409, 39, 522, 1, 3, 37, '2024-07-28 16:57:43', '2024-07-28 16:57:43'),
(410, 28, 523, 1, 3, 37, '2024-07-28 16:58:07', '2024-07-28 16:58:07'),
(411, 39, 524, 1, 3, 37, '2024-07-28 16:58:24', '2024-07-28 16:58:24'),
(412, 10, 525, 1, 3, 37, '2024-07-28 16:58:42', '2024-07-28 16:58:42'),
(413, 10, 526, 1, 3, 37, '2024-07-28 16:59:03', '2024-07-28 16:59:03'),
(414, 10, 527, 1, 3, 37, '2024-07-28 16:59:26', '2024-07-28 16:59:26'),
(415, 39, 528, 1, 3, 37, '2024-07-28 17:02:26', '2024-07-28 17:02:26'),
(416, 39, 529, 1, 3, 37, '2024-07-28 17:02:45', '2024-07-28 17:02:45'),
(417, 36, 530, 1, 3, 37, '2024-07-28 17:03:06', '2024-07-28 17:03:06'),
(418, 38, 531, 1, 3, 37, '2024-07-28 17:03:26', '2024-07-28 17:03:26'),
(419, 23, 532, 1, 3, 37, '2024-07-28 17:03:48', '2024-07-28 17:03:48'),
(420, 10, 533, 1, 3, 37, '2024-07-28 17:04:09', '2024-07-28 17:04:09'),
(421, 10, 534, 1, 3, 37, '2024-07-28 17:04:33', '2024-07-28 17:04:33'),
(422, 39, 535, 1, 3, 37, '2024-07-28 17:04:51', '2024-07-28 17:04:51'),
(423, 26, 536, 1, 3, 37, '2024-07-28 17:05:16', '2024-07-28 17:05:16'),
(424, 1, 595, 1, 3, 37, '2024-07-28 17:05:31', '2024-07-28 17:05:31'),
(425, 3, 445, 1, 4, 49, '2024-07-28 17:05:46', '2024-07-28 17:05:46'),
(426, 33, 446, 1, 4, 49, '2024-07-28 17:06:06', '2024-07-28 17:06:06'),
(427, 28, 447, 1, 4, 49, '2024-07-28 17:06:27', '2024-07-28 17:06:27'),
(428, 15, 448, 1, 4, 49, '2024-07-28 17:06:51', '2024-07-28 17:06:51'),
(429, 2, 449, 1, 4, 49, '2024-07-28 17:07:27', '2024-07-28 17:07:27'),
(430, 39, 450, 1, 4, 49, '2024-07-28 17:07:47', '2024-07-28 17:07:47'),
(431, 20, 451, 1, 4, 49, '2024-07-28 17:08:10', '2024-07-28 17:08:10'),
(432, 24, 452, 1, 4, 49, '2024-07-28 17:08:30', '2024-07-28 17:08:30'),
(433, 39, 453, 1, 4, 49, '2024-07-28 17:08:46', '2024-07-28 17:08:46'),
(434, 28, 454, 1, 4, 49, '2024-07-28 17:09:10', '2024-07-28 17:09:10'),
(435, 39, 455, 1, 4, 49, '2024-07-28 17:09:29', '2024-07-28 17:09:29'),
(436, 10, 456, 1, 4, 49, '2024-07-28 17:09:48', '2024-07-28 17:09:48'),
(437, 10, 457, 1, 4, 49, '2024-07-28 17:10:09', '2024-07-28 17:10:09'),
(438, 10, 458, 1, 4, 49, '2024-07-28 17:10:30', '2024-07-28 17:10:30'),
(439, 39, 459, 1, 4, 49, '2024-07-28 17:10:51', '2024-07-28 17:10:51'),
(440, 39, 460, 1, 4, 49, '2024-07-28 17:11:09', '2024-07-28 17:11:09'),
(441, 36, 461, 1, 4, 49, '2024-07-28 17:11:33', '2024-07-28 17:11:33'),
(442, 38, 462, 1, 4, 49, '2024-07-28 17:11:49', '2024-07-28 17:11:49'),
(443, 10, 463, 1, 4, 49, '2024-07-28 17:12:10', '2024-07-28 17:12:10'),
(444, 23, 464, 1, 4, 49, '2024-07-28 17:12:28', '2024-07-28 17:12:28'),
(445, 10, 485, 1, 4, 49, '2024-07-28 17:12:47', '2024-07-28 17:12:47'),
(446, 39, 486, 1, 4, 49, '2024-07-28 17:13:06', '2024-07-28 17:13:06'),
(447, 26, 487, 1, 4, 49, '2024-07-28 17:13:26', '2024-07-28 17:13:26'),
(448, 1, 603, 1, 4, 49, '2024-07-28 17:13:41', '2024-07-28 17:13:41'),
(449, 3, 491, 1, 4, 50, '2024-07-28 17:13:53', '2024-07-28 17:13:53'),
(450, 33, 492, 1, 4, 50, '2024-07-28 17:14:12', '2024-07-28 17:14:12'),
(451, 28, 493, 1, 4, 50, '2024-07-28 17:14:50', '2024-07-28 17:14:50'),
(452, 15, 494, 1, 4, 50, '2024-07-28 17:15:05', '2024-07-28 17:15:05'),
(453, 2, 495, 1, 4, 50, '2024-07-28 17:15:20', '2024-07-28 17:15:20'),
(454, 39, 496, 1, 4, 50, '2024-07-28 17:15:36', '2024-07-28 17:15:36'),
(455, 39, 496, 1, 4, 50, '2024-07-28 17:15:57', '2024-07-28 17:15:57'),
(456, 20, 497, 1, 4, 50, '2024-07-28 17:16:24', '2024-07-28 17:16:24'),
(457, 24, 498, 1, 4, 50, '2024-07-28 17:16:45', '2024-07-28 17:16:45'),
(458, 39, 499, 1, 4, 50, '2024-07-28 17:17:00', '2024-07-28 17:17:00'),
(459, 39, 499, 1, 4, 50, '2024-07-28 17:17:17', '2024-07-28 17:17:17'),
(460, 28, 500, 1, 4, 50, '2024-07-28 17:17:35', '2024-07-28 17:17:35'),
(461, 39, 501, 1, 4, 50, '2024-07-28 17:17:52', '2024-07-28 17:17:52'),
(462, 10, 502, 1, 4, 50, '2024-07-28 17:18:13', '2024-07-28 17:18:13'),
(463, 10, 503, 1, 4, 50, '2024-07-28 17:18:30', '2024-07-28 17:18:30'),
(464, 10, 504, 1, 4, 50, '2024-07-28 17:19:01', '2024-07-28 17:19:01'),
(465, 39, 505, 1, 4, 50, '2024-07-28 17:19:20', '2024-07-28 17:19:20'),
(466, 39, 506, 1, 4, 50, '2024-07-28 17:19:39', '2024-07-28 17:19:39'),
(467, 36, 507, 1, 4, 50, '2024-07-28 17:19:55', '2024-07-28 17:19:55'),
(468, 38, 508, 1, 4, 50, '2024-07-28 17:20:13', '2024-07-28 17:20:13'),
(469, 23, 509, 1, 4, 50, '2024-07-28 17:20:31', '2024-07-28 17:20:31'),
(470, 10, 510, 1, 4, 50, '2024-07-28 17:20:49', '2024-07-28 17:20:49'),
(471, 10, 511, 1, 4, 50, '2024-07-28 17:21:08', '2024-07-28 17:21:08'),
(472, 39, 512, 1, 4, 50, '2024-07-28 17:21:26', '2024-07-28 17:21:26'),
(473, 26, 513, 1, 4, 50, '2024-07-28 17:21:48', '2024-07-28 17:21:48'),
(474, 1, 604, 1, 4, 50, '2024-07-28 17:22:02', '2024-07-28 17:22:02'),
(475, 3, 550, 1, 3, 38, '2024-07-29 03:43:26', '2024-07-29 03:43:26'),
(476, 24, 551, 1, 3, 38, '2024-07-29 03:43:45', '2024-07-29 03:43:45'),
(477, 15, 552, 1, 3, 38, '2024-07-29 03:43:59', '2024-07-29 03:43:59'),
(478, 7, 553, 1, 3, 38, '2024-07-29 03:44:17', '2024-07-29 03:44:17'),
(479, 13, 554, 1, 3, 38, '2024-07-29 03:44:38', '2024-07-29 03:44:38'),
(480, 26, 555, 1, 3, 38, '2024-07-29 03:45:08', '2024-07-29 03:45:08'),
(481, 16, 556, 1, 3, 38, '2024-07-29 03:45:28', '2024-07-29 03:45:28'),
(482, 7, 557, 1, 3, 38, '2024-07-29 03:45:46', '2024-07-29 03:45:46'),
(483, 13, 558, 1, 3, 38, '2024-07-29 03:46:09', '2024-07-29 03:46:09'),
(484, 26, 559, 1, 3, 38, '2024-07-29 03:46:44', '2024-07-29 03:46:44'),
(485, 16, 560, 1, 3, 38, '2024-07-29 03:47:00', '2024-07-29 03:47:00'),
(486, 10, 561, 1, 3, 38, '2024-07-29 03:47:20', '2024-07-29 03:47:20'),
(487, 23, 562, 1, 3, 38, '2024-07-29 03:47:50', '2024-07-29 03:47:50'),
(488, 1, 596, 1, 3, 38, '2024-07-29 03:48:04', '2024-07-29 03:48:04'),
(489, 3, 576, 1, 3, 39, '2024-07-29 03:48:21', '2024-07-29 03:48:21'),
(490, 24, 577, 1, 3, 39, '2024-07-29 03:48:40', '2024-07-29 03:48:40'),
(491, 15, 578, 1, 3, 39, '2024-07-29 03:48:55', '2024-07-29 03:48:55'),
(492, 7, 579, 1, 3, 39, '2024-07-29 03:49:10', '2024-07-29 03:49:10'),
(493, 13, 580, 1, 3, 39, '2024-07-29 03:49:42', '2024-07-29 03:49:42'),
(494, 26, 581, 1, 3, 39, '2024-07-29 03:50:04', '2024-07-29 03:50:04'),
(495, 16, 582, 1, 3, 39, '2024-07-29 03:50:22', '2024-07-29 03:50:22'),
(496, 7, 583, 1, 3, 39, '2024-07-29 03:50:37', '2024-07-29 03:50:37'),
(497, 13, 584, 1, 3, 39, '2024-07-29 03:50:54', '2024-07-29 03:50:54'),
(498, 26, 585, 1, 3, 39, '2024-07-29 03:51:17', '2024-07-29 03:51:17'),
(499, 16, 586, 1, 3, 39, '2024-07-29 03:51:36', '2024-07-29 03:51:36'),
(500, 10, 587, 1, 3, 39, '2024-07-29 03:51:57', '2024-07-29 03:51:57'),
(501, 23, 588, 1, 3, 39, '2024-07-29 03:52:14', '2024-07-29 03:52:14'),
(502, 1, 597, 1, 3, 39, '2024-07-29 03:52:31', '2024-07-29 03:52:31'),
(503, 3, 537, 1, 4, 51, '2024-07-29 03:52:48', '2024-07-29 03:52:48'),
(504, 24, 538, 1, 4, 51, '2024-07-29 03:53:04', '2024-07-29 03:53:04'),
(505, 15, 539, 1, 4, 51, '2024-07-29 03:53:17', '2024-07-29 03:53:17'),
(506, 7, 540, 1, 4, 51, '2024-07-29 03:53:35', '2024-07-29 03:53:35'),
(507, 13, 541, 1, 4, 51, '2024-07-29 03:53:55', '2024-07-29 03:53:55'),
(508, 26, 542, 1, 4, 51, '2024-07-29 03:54:12', '2024-07-29 03:54:12'),
(509, 16, 543, 1, 4, 51, '2024-07-29 03:54:29', '2024-07-29 03:54:29'),
(510, 7, 544, 1, 4, 51, '2024-07-29 03:54:48', '2024-07-29 03:54:48'),
(511, 13, 545, 1, 4, 51, '2024-07-29 03:55:07', '2024-07-29 03:55:07'),
(512, 26, 546, 1, 4, 51, '2024-07-29 03:55:24', '2024-07-29 03:55:24'),
(513, 16, 543, 1, 4, 51, '2024-07-29 03:55:48', '2024-07-29 03:55:48'),
(514, 10, 548, 1, 4, 51, '2024-07-29 03:56:13', '2024-07-29 03:56:13'),
(515, 23, 549, 1, 4, 51, '2024-07-29 03:56:28', '2024-07-29 03:56:28'),
(516, 1, 605, 1, 4, 51, '2024-07-29 03:56:42', '2024-07-29 03:56:42'),
(517, 16, 547, 1, 4, 51, '2024-07-29 03:58:31', '2024-07-29 03:58:31'),
(518, 3, 563, 1, 4, 52, '2024-07-29 03:58:54', '2024-07-29 03:58:54'),
(519, 24, 564, 1, 4, 52, '2024-07-29 03:59:08', '2024-07-29 03:59:08'),
(520, 15, 565, 1, 4, 52, '2024-07-29 03:59:21', '2024-07-29 03:59:21'),
(521, 7, 566, 1, 4, 52, '2024-07-29 03:59:44', '2024-07-29 03:59:44'),
(522, 13, 567, 1, 4, 52, '2024-07-29 03:59:59', '2024-07-29 03:59:59'),
(523, 26, 568, 1, 4, 52, '2024-07-29 04:00:18', '2024-07-29 04:00:18'),
(524, 16, 569, 1, 4, 52, '2024-07-29 04:00:43', '2024-07-29 04:00:43'),
(525, 7, 570, 1, 4, 52, '2024-07-29 04:00:59', '2024-07-29 04:00:59'),
(526, 13, 571, 1, 4, 52, '2024-07-29 04:01:24', '2024-07-29 04:01:24'),
(527, 26, 572, 1, 4, 52, '2024-07-29 04:01:43', '2024-07-29 04:01:43'),
(528, 16, 573, 1, 4, 52, '2024-07-29 04:01:58', '2024-07-29 04:01:58'),
(529, 10, 574, 1, 4, 52, '2024-07-29 04:02:13', '2024-07-29 04:02:13'),
(530, 23, 575, 1, 4, 52, '2024-07-29 04:02:28', '2024-07-29 04:02:28'),
(531, 1, 606, 1, 4, 52, '2024-07-29 04:02:42', '2024-07-29 04:02:42'),
(532, 10, 607, 1, 3, 36, '2024-07-29 04:39:18', '2024-07-29 04:39:18'),
(533, 10, 608, 1, 3, 37, '2024-07-29 04:39:41', '2024-07-29 04:39:41'),
(534, 10, 610, 1, 4, 49, '2024-07-29 04:39:59', '2024-07-29 04:39:59'),
(535, 10, 609, 1, 4, 50, '2024-07-29 04:40:16', '2024-07-29 04:40:16'),
(536, 41, 148, 1, 3, 24, '2024-07-31 08:30:39', '2024-07-31 08:30:39'),
(537, 41, 123, 1, 3, 23, '2024-07-31 08:42:59', '2024-07-31 08:42:59'),
(538, 41, 93, 1, 4, 19, '2024-07-31 08:44:19', '2024-07-31 08:44:19'),
(539, 41, 72, 1, 4, 15, '2024-07-31 08:44:34', '2024-07-31 08:44:34'),
(540, 41, 113, 1, 4, 16, '2024-07-31 08:44:50', '2024-07-31 08:44:50'),
(541, 24, 387, 1, 4, 47, '2024-08-01 06:23:53', '2024-08-01 06:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_timetables`
--

CREATE TABLE `teacher_timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `medium_id` bigint(20) UNSIGNED NOT NULL,
  `standard_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `break` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_timetables`
--

INSERT INTO `teacher_timetables` (`id`, `teacher_id`, `medium_id`, `standard_id`, `class_id`, `subject_id`, `school_id`, `day`, `break`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(3, 22, 3, 25, 1, 179, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-29 14:29:44', '2024-07-29 14:29:44'),
(5, 14, 4, 19, 1, 91, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:33:18', '2024-07-29 14:33:18'),
(6, 14, 3, 17, 1, 102, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:35:47', '2024-07-29 14:35:47'),
(7, 42, 3, 22, 1, 80, 1, 'Monday', 0, '09:10:00', '09:10:00', '2024-07-29 14:36:55', '2024-07-29 14:36:55'),
(8, 42, 4, 15, 1, 70, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:37:49', '2024-07-29 14:37:49'),
(9, 41, 3, 23, 1, 123, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:39:33', '2024-07-29 14:39:33'),
(10, 41, 4, 16, 1, 113, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:40:12', '2024-07-29 14:40:12'),
(11, 35, 3, 24, 1, 153, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:41:37', '2024-07-29 14:41:37'),
(12, 35, 3, 25, 1, 183, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-29 14:42:46', '2024-07-29 14:42:46'),
(15, 42, 3, 17, 1, 101, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:51:27', '2024-07-29 14:51:27'),
(16, 42, 4, 19, 1, 90, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:52:14', '2024-07-29 14:52:14'),
(17, 22, 3, 22, 1, 83, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:53:28', '2024-07-29 14:53:28'),
(18, 19, 4, 15, 1, 74, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:54:10', '2024-07-29 14:54:10'),
(19, 14, 3, 23, 1, 122, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:55:56', '2024-07-29 14:55:56'),
(20, 14, 4, 16, 1, 112, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:55:56', '2024-07-29 14:55:56'),
(21, 35, 3, 24, 1, 154, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:57:05', '2024-07-29 14:57:05'),
(22, 41, 3, 25, 1, 178, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-29 14:57:56', '2024-07-29 14:57:56'),
(23, 41, 3, 17, 1, 103, 1, 'Monday', 0, '11:50:00', '00:50:00', '2024-07-29 14:59:38', '2024-07-29 14:59:38'),
(24, 41, 4, 19, 1, 93, 1, 'Monday', 0, '11:50:00', '00:50:00', '2024-07-29 14:59:38', '2024-07-29 14:59:38'),
(25, 18, 3, 22, 1, 84, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:01:50', '2024-07-29 15:01:50'),
(27, 5, 4, 15, 1, 73, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:03:07', '2024-07-29 15:03:07'),
(28, 22, 3, 23, 1, 124, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:04:00', '2024-07-29 15:04:00'),
(29, 19, 4, 16, 1, 115, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:04:38', '2024-07-29 15:04:38'),
(30, 42, 3, 24, 1, 146, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:05:29', '2024-07-29 15:05:29'),
(31, 14, 3, 25, 1, 177, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:06:41', '2024-07-29 15:06:41'),
(32, 42, 4, 26, 1, 131, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:07:47', '2024-07-29 15:07:47'),
(33, 14, 4, 27, 1, 162, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-29 15:08:47', '2024-07-29 15:08:47'),
(34, 11, 4, 26, 1, 133, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-29 15:10:46', '2024-07-29 15:10:46'),
(35, 5, 4, 27, 1, 164, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-29 15:11:29', '2024-07-29 15:11:29'),
(36, 5, 4, 26, 1, 134, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-29 15:12:31', '2024-07-29 15:12:31'),
(37, 19, 4, 27, 1, 165, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-29 15:13:48', '2024-07-29 15:13:48'),
(38, 36, 4, 26, 1, 138, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-29 15:16:31', '2024-07-29 15:16:31'),
(39, 36, 4, 27, 1, 168, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-29 15:16:31', '2024-07-29 15:16:31'),
(40, 18, 3, 24, 1, 151, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-07-30 07:04:11', '2024-07-30 07:04:11'),
(41, 18, 3, 25, 1, 181, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-07-30 07:05:10', '2024-07-30 07:05:10'),
(42, 14, 3, 17, 1, 102, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:06:58', '2024-07-30 07:06:58'),
(43, 14, 4, 19, 1, 91, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:06:58', '2024-07-30 07:06:58'),
(44, 41, 3, 22, 1, 82, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:09:09', '2024-07-30 07:09:09'),
(45, 41, 4, 15, 1, 72, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:09:09', '2024-07-30 07:09:09'),
(46, 42, 3, 23, 1, 121, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:10:47', '2024-07-30 07:10:47'),
(47, 42, 4, 16, 1, 111, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:10:47', '2024-07-30 07:10:47'),
(48, 18, 3, 24, 1, 150, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:11:44', '2024-07-30 07:11:44'),
(49, 22, 3, 25, 1, 179, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:12:37', '2024-07-30 07:12:37'),
(50, 18, 3, 17, 1, 105, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:13:44', '2024-07-30 07:13:44'),
(51, 5, 4, 19, 1, 94, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:15:20', '2024-07-30 07:15:20'),
(52, 42, 3, 22, 1, 80, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:16:44', '2024-07-30 07:16:44'),
(53, 42, 4, 15, 1, 70, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:16:44', '2024-07-30 07:16:44'),
(54, 22, 3, 23, 1, 124, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:17:39', '2024-07-30 07:17:39'),
(55, 19, 4, 16, 1, 115, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:18:21', '2024-07-30 07:18:21'),
(58, 17, 3, 17, 1, 107, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(59, 17, 4, 19, 1, 97, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(60, 17, 3, 22, 1, 86, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(61, 17, 4, 15, 1, 76, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(62, 17, 3, 23, 1, 127, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(63, 17, 4, 16, 1, 117, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:25:18', '2024-07-30 07:25:18'),
(64, 14, 3, 24, 1, 147, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:26:11', '2024-07-30 07:26:11'),
(65, 42, 3, 25, 1, 176, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:26:49', '2024-07-30 07:26:49'),
(66, 41, 3, 24, 1, 148, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-07-30 07:27:55', '2024-07-30 07:27:55'),
(67, 22, 3, 25, 1, 179, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-07-30 07:28:53', '2024-07-30 07:28:53'),
(68, 14, 4, 26, 1, 132, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:30:10', '2024-07-30 07:30:10'),
(69, 42, 4, 27, 1, 161, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:31:01', '2024-07-30 07:31:01'),
(70, 11, 4, 26, 1, 133, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-07-30 07:32:06', '2024-07-30 07:32:06'),
(71, 38, 4, 27, 1, 169, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-07-30 07:33:03', '2024-07-30 07:33:03'),
(72, 19, 4, 26, 1, 135, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-07-30 07:34:00', '2024-07-30 07:34:00'),
(73, 5, 4, 27, 1, 164, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-07-30 07:34:36', '2024-07-30 07:34:36'),
(74, 19, 4, 27, 1, 165, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-07-30 07:35:45', '2024-07-30 07:35:45'),
(75, 5, 4, 26, 1, 134, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-07-30 07:36:20', '2024-07-30 07:36:20'),
(76, 41, 3, 17, 1, 103, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:38:22', '2024-07-30 07:38:22'),
(77, 41, 4, 19, 1, 93, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:38:22', '2024-07-30 07:38:22'),
(78, 42, 3, 22, 1, 80, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:39:17', '2024-07-30 07:39:17'),
(79, 42, 4, 15, 1, 70, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:39:17', '2024-07-30 07:39:17'),
(80, 14, 3, 23, 1, 122, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:42:24', '2024-07-30 07:42:24'),
(81, 14, 4, 16, 1, 112, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:42:24', '2024-07-30 07:42:24'),
(82, 14, 3, 25, 1, 177, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:42:24', '2024-07-30 07:42:24'),
(83, 14, 4, 27, 1, 162, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:42:24', '2024-07-30 07:42:24'),
(84, 22, 3, 24, 1, 149, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:43:18', '2024-07-30 07:43:18'),
(85, 18, 3, 25, 1, 180, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-30 07:44:00', '2024-07-30 07:44:00'),
(86, 22, 3, 17, 1, 104, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:47:15', '2024-07-30 07:47:15'),
(87, 22, 4, 19, 1, 94, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:47:15', '2024-07-30 07:47:15'),
(88, 22, 3, 22, 1, 83, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:47:15', '2024-07-30 07:47:15'),
(89, 22, 4, 15, 1, 73, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:47:15', '2024-07-30 07:47:15'),
(94, 19, 4, 19, 1, 95, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:52:40', '2024-07-30 07:52:40'),
(95, 19, 4, 15, 1, 74, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:52:40', '2024-07-30 07:52:40'),
(96, 5, 4, 15, 1, 73, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 07:54:38', '2024-07-30 07:54:38'),
(97, 5, 4, 16, 1, 114, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 07:54:38', '2024-07-30 07:54:38'),
(98, 18, 3, 22, 1, 84, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 08:04:41', '2024-07-30 08:04:41'),
(99, 18, 4, 15, 1, 74, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 08:04:41', '2024-07-30 08:04:41'),
(100, 18, 3, 23, 1, 125, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:04:41', '2024-07-30 08:04:41'),
(101, 18, 4, 16, 1, 115, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:04:41', '2024-07-30 08:04:41'),
(102, 35, 3, 24, 1, 152, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 08:07:23', '2024-07-30 08:07:23'),
(103, 41, 3, 25, 1, 178, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-30 08:07:58', '2024-07-30 08:07:58'),
(104, 38, 4, 26, 1, 139, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-07-30 08:09:02', '2024-07-30 08:09:02'),
(105, 36, 4, 27, 1, 167, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-07-30 08:09:34', '2024-07-30 08:09:34'),
(106, 19, 4, 26, 1, 135, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-07-30 08:10:17', '2024-07-30 08:10:17'),
(107, 11, 4, 27, 1, 163, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-07-30 08:10:52', '2024-07-30 08:10:52'),
(108, 36, 4, 26, 1, 137, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-07-30 08:11:47', '2024-07-30 08:11:47'),
(109, 19, 4, 27, 1, 165, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-07-30 08:12:17', '2024-07-30 08:12:17'),
(111, 18, 3, 25, 1, 180, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-07-30 08:13:59', '2024-07-30 08:13:59'),
(112, 42, 3, 17, 1, 101, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:17:04', '2024-07-30 08:17:04'),
(113, 42, 4, 19, 1, 90, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:17:04', '2024-07-30 08:17:04'),
(114, 42, 3, 25, 1, 176, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:17:04', '2024-07-30 08:17:04'),
(115, 42, 4, 27, 1, 161, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:17:04', '2024-07-30 08:17:04'),
(116, 14, 3, 22, 1, 81, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(117, 14, 4, 15, 1, 71, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(118, 14, 3, 17, 1, 102, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(119, 14, 4, 19, 1, 91, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(120, 14, 3, 24, 1, 147, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(121, 14, 4, 26, 1, 132, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:21:38', '2024-07-30 08:21:38'),
(122, 35, 3, 23, 1, 128, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:23:42', '2024-07-30 08:23:42'),
(123, 35, 4, 16, 1, 118, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:23:42', '2024-07-30 08:23:42'),
(125, 29, 3, 25, 1, 184, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-30 08:25:48', '2024-07-30 08:25:48'),
(126, 18, 3, 22, 1, 84, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:28:21', '2024-07-30 08:28:21'),
(128, 18, 3, 17, 1, 105, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:28:21', '2024-07-30 08:28:21'),
(129, 18, 4, 19, 1, 95, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:28:21', '2024-07-30 08:28:21'),
(130, 5, 4, 15, 1, 73, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:30:35', '2024-07-30 08:30:35'),
(131, 5, 4, 19, 1, 94, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:30:35', '2024-07-30 08:30:35'),
(132, 41, 3, 23, 1, 123, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:33:26', '2024-07-30 08:33:26'),
(133, 41, 4, 16, 1, 113, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-30 08:33:26', '2024-07-30 08:33:26'),
(134, 41, 3, 22, 1, 82, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:33:26', '2024-07-30 08:33:26'),
(135, 41, 4, 15, 1, 72, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:33:26', '2024-07-30 08:33:26'),
(140, 11, 3, 17, 1, 107, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(141, 11, 4, 19, 1, 97, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(142, 11, 3, 22, 1, 86, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(143, 11, 4, 15, 1, 76, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(144, 11, 3, 23, 1, 127, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(145, 11, 4, 16, 1, 117, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-07-30 08:41:46', '2024-07-30 08:41:46'),
(146, 22, 3, 23, 1, 124, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:43:39', '2024-07-30 08:43:39'),
(147, 19, 4, 16, 1, 115, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-30 08:44:20', '2024-07-30 08:44:20'),
(148, 19, 4, 26, 1, 136, 1, 'Thursday', 0, '14:30:00', '14:30:00', '2024-07-30 08:46:16', '2024-07-30 08:46:16'),
(149, 19, 4, 27, 1, 166, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-07-30 08:46:16', '2024-07-30 08:46:16'),
(150, 11, 4, 26, 1, 133, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-07-30 08:47:12', '2024-07-30 08:47:12'),
(151, 5, 4, 27, 1, 164, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-07-30 08:47:47', '2024-07-30 08:47:47'),
(152, 22, 3, 24, 1, 149, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-07-30 08:49:02', '2024-07-30 08:49:02'),
(153, 18, 3, 25, 1, 180, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-07-30 08:50:39', '2024-07-30 08:50:39'),
(154, 18, 3, 17, 1, 105, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-30 08:50:39', '2024-07-30 08:50:39'),
(155, 42, 3, 17, 1, 101, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 08:52:58', '2024-07-30 08:52:58'),
(156, 42, 3, 24, 1, 146, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 08:52:58', '2024-07-30 08:52:58'),
(157, 42, 4, 26, 1, 131, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 08:52:58', '2024-07-30 08:52:58'),
(158, 14, 3, 22, 1, 81, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(159, 14, 4, 15, 1, 71, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(160, 14, 3, 23, 1, 122, 1, 'Friday', 0, '10:40:00', '10:40:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(161, 14, 4, 16, 1, 112, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(162, 14, 3, 25, 1, 177, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(163, 14, 4, 27, 1, 162, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 08:57:40', '2024-07-30 08:57:40'),
(164, 41, 3, 23, 1, 123, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 08:59:16', '2024-07-30 08:59:16'),
(165, 41, 4, 16, 1, 113, 1, 'Friday', 0, '09:10:00', '10:09:00', '2024-07-30 08:59:16', '2024-07-30 08:59:16'),
(166, 35, 3, 24, 1, 155, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 09:00:52', '2024-07-30 09:00:52'),
(167, 35, 3, 25, 1, 185, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-30 09:00:52', '2024-07-30 09:00:52'),
(168, 5, 4, 19, 1, 94, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-30 09:37:06', '2024-07-30 09:37:06'),
(169, 35, 3, 22, 1, 87, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-30 09:39:16', '2024-07-30 09:39:16'),
(170, 35, 4, 15, 1, 77, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-30 09:39:16', '2024-07-30 09:39:16'),
(171, 29, 3, 17, 1, 109, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(172, 29, 4, 19, 1, 99, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(173, 29, 3, 22, 1, 88, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(174, 29, 4, 15, 1, 78, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(175, 29, 3, 23, 1, 129, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(176, 29, 4, 16, 1, 119, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-30 09:43:16', '2024-07-30 09:43:16'),
(177, 36, 4, 26, 1, 140, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-07-30 09:45:35', '2024-07-30 09:45:35'),
(178, 36, 4, 27, 1, 170, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-07-30 09:45:35', '2024-07-30 09:45:35'),
(179, 19, 4, 26, 1, 135, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-07-30 09:46:31', '2024-07-30 09:46:31'),
(180, 11, 4, 27, 1, 163, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-07-30 09:47:06', '2024-07-30 09:47:06'),
(181, 1, 3, 24, 1, 159, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-30 09:50:50', '2024-07-30 09:50:50'),
(182, 1, 4, 26, 1, 144, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-30 09:50:50', '2024-07-30 09:50:50'),
(183, 1, 3, 25, 1, 189, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-30 09:50:50', '2024-07-30 09:50:50'),
(184, 1, 4, 27, 1, 174, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-30 09:50:50', '2024-07-30 09:50:50'),
(185, 17, 3, 24, 1, 158, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 09:53:31', '2024-07-30 09:53:31'),
(186, 17, 4, 26, 1, 143, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 09:53:31', '2024-07-30 09:53:31'),
(187, 17, 3, 25, 1, 188, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 09:53:31', '2024-07-30 09:53:31'),
(188, 17, 4, 27, 1, 173, 1, 'Saturday', 0, '09:10:00', '22:10:00', '2024-07-30 09:53:31', '2024-07-30 09:53:31'),
(189, 22, 3, 17, 1, 104, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 09:55:59', '2024-07-30 09:55:59'),
(190, 22, 3, 22, 1, 83, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 09:55:59', '2024-07-30 09:55:59'),
(191, 22, 3, 17, 1, 104, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 09:55:59', '2024-07-30 09:55:59'),
(195, 14, 3, 22, 1, 81, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 10:01:51', '2024-07-30 10:01:51'),
(196, 14, 4, 15, 1, 71, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 10:01:51', '2024-07-30 10:01:51'),
(199, 18, 3, 23, 1, 125, 1, 'Saturday', 0, '09:10:00', '22:10:00', '2024-07-30 10:05:38', '2024-07-30 10:05:38'),
(202, 5, 4, 16, 1, 114, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 10:07:58', '2024-07-30 10:07:58'),
(205, 41, 3, 25, 1, 178, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:09:31', '2024-07-30 10:09:31'),
(206, 11, 4, 27, 1, 163, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:10:02', '2024-07-30 10:10:02'),
(207, 19, 4, 19, 1, 95, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-30 10:21:48', '2024-07-30 10:21:48'),
(208, 19, 4, 15, 1, 75, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:23:32', '2024-07-30 10:23:32'),
(209, 19, 4, 19, 1, 96, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:23:32', '2024-07-30 10:23:32'),
(210, 42, 3, 23, 1, 121, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:26:59', '2024-07-30 10:26:59'),
(211, 42, 4, 16, 1, 111, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:26:59', '2024-07-30 10:26:59'),
(212, 42, 3, 25, 1, 176, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:26:59', '2024-07-30 10:26:59'),
(213, 42, 4, 27, 1, 161, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:26:59', '2024-07-30 10:26:59'),
(214, 18, 3, 23, 1, 126, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:30:11', '2024-07-30 10:30:11'),
(215, 41, 3, 22, 1, 82, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:33:32', '2024-07-30 10:33:32'),
(216, 41, 4, 15, 1, 72, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-30 10:33:32', '2024-07-30 10:33:32'),
(217, 35, 3, 17, 1, 108, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:35:38', '2024-07-30 10:35:38'),
(218, 35, 4, 19, 1, 98, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-30 10:35:38', '2024-07-30 10:35:38'),
(219, 8, 3, 28, 1, 206, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-30 16:57:45', '2024-07-30 16:57:45'),
(220, 8, 3, 29, 1, 234, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 16:57:45', '2024-07-30 16:57:45'),
(221, 35, 3, 29, 1, 241, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-30 16:58:59', '2024-07-30 16:58:59'),
(222, 25, 3, 30, 1, 266, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-30 17:01:17', '2024-07-30 17:01:17'),
(223, 25, 3, 28, 1, 210, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-30 17:01:17', '2024-07-30 17:01:17'),
(224, 29, 3, 29, 1, 242, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-30 17:02:53', '2024-07-30 17:02:53'),
(225, 6, 3, 30, 1, 261, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-07-30 17:06:41', '2024-07-30 17:06:41'),
(226, 6, 4, 42, 1, 247, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:06:41', '2024-07-30 17:06:41'),
(227, 6, 4, 40, 1, 191, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:06:41', '2024-07-30 17:06:41'),
(228, 6, 4, 42, 1, 247, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-30 17:06:41', '2024-07-30 17:06:41'),
(229, 34, 3, 28, 1, 209, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-30 17:09:40', '2024-07-30 17:09:40'),
(230, 34, 3, 30, 1, 265, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:09:40', '2024-07-30 17:09:40'),
(231, 34, 4, 40, 1, 195, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-30 17:09:40', '2024-07-30 17:09:40'),
(232, 34, 4, 42, 1, 251, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:10:21', '2024-07-30 17:10:21'),
(233, 12, 3, 29, 1, 235, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-30 17:15:13', '2024-07-30 17:15:13'),
(234, 12, 3, 28, 1, 207, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:15:13', '2024-07-30 17:15:13'),
(235, 12, 4, 40, 1, 193, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:15:13', '2024-07-30 17:15:13'),
(236, 12, 4, 41, 1, 221, 1, 'Monday', 0, '15:30:00', '16:30:00', '2024-07-30 17:15:13', '2024-07-30 17:15:13'),
(237, 24, 3, 30, 1, 268, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-30 17:16:25', '2024-07-30 17:16:25'),
(238, 20, 4, 41, 1, 220, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:19:14', '2024-07-30 17:19:14'),
(239, 20, 4, 42, 1, 248, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:19:14', '2024-07-30 17:19:14'),
(240, 20, 4, 40, 1, 192, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:19:14', '2024-07-30 17:19:14'),
(241, 38, 4, 41, 1, 228, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:20:16', '2024-07-30 17:20:16'),
(242, 27, 4, 41, 1, 224, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:21:21', '2024-07-30 17:21:21'),
(243, 35, 3, 28, 1, 213, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-30 17:23:39', '2024-07-30 17:23:39'),
(244, 35, 3, 28, 1, 215, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:23:39', '2024-07-30 17:23:39'),
(247, 8, 3, 30, 1, 262, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-07-30 17:27:47', '2024-07-30 17:27:47'),
(248, 8, 3, 28, 1, 206, 1, 'Monday', 0, '09:10:00', '09:10:00', '2024-07-30 17:27:47', '2024-07-30 17:27:47'),
(256, 36, 4, 40, 1, 199, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-30 17:36:23', '2024-07-30 17:36:23'),
(257, 27, 4, 40, 1, 196, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:39:20', '2024-07-30 17:39:20'),
(258, 27, 4, 41, 1, 224, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-30 17:39:20', '2024-07-30 17:39:20'),
(259, 27, 4, 42, 1, 252, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:39:20', '2024-07-30 17:39:20'),
(260, 36, 4, 41, 1, 227, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:40:14', '2024-07-30 17:40:14'),
(261, 20, 4, 42, 1, 248, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-07-30 17:42:10', '2024-07-30 17:42:10'),
(262, 20, 4, 40, 1, 192, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-30 17:42:10', '2024-07-30 17:42:10'),
(263, 20, 4, 41, 1, 220, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:42:10', '2024-07-30 17:42:10'),
(264, 34, 3, 30, 1, 265, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-07-30 17:47:01', '2024-07-30 17:47:01'),
(265, 34, 4, 42, 1, 251, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-07-30 17:47:01', '2024-07-30 17:47:01'),
(266, 34, 4, 40, 1, 195, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-07-30 17:47:01', '2024-07-30 17:47:01'),
(267, 23, 3, 28, 1, 217, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-07-31 01:42:58', '2024-07-31 01:42:58'),
(268, 23, 3, 29, 1, 245, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-07-31 01:42:58', '2024-07-31 01:42:58'),
(269, 23, 3, 30, 1, 273, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-07-31 01:42:58', '2024-07-31 01:42:58'),
(270, 23, 3, 29, 1, 244, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-31 01:43:56', '2024-07-31 01:43:56'),
(271, 25, 3, 28, 1, 210, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-31 01:46:40', '2024-07-31 01:46:40'),
(273, 6, 3, 30, 1, 261, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-07-31 01:54:20', '2024-07-31 01:54:20'),
(274, 6, 3, 28, 1, 205, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-31 01:54:20', '2024-07-31 01:54:20'),
(276, 12, 3, 30, 1, 263, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-31 01:57:50', '2024-07-31 01:57:50'),
(277, 12, 3, 28, 1, 207, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 01:57:50', '2024-07-31 01:57:50'),
(278, 12, 4, 40, 1, 193, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 01:57:50', '2024-07-31 01:57:50'),
(279, 34, 3, 29, 1, 237, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 02:01:32', '2024-07-31 02:01:32'),
(280, 34, 4, 41, 1, 223, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-07-31 02:01:32', '2024-07-31 02:01:32'),
(281, 34, 4, 42, 1, 251, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-07-31 02:01:32', '2024-07-31 02:01:32'),
(282, 15, 3, 30, 1, 264, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 02:03:07', '2024-07-31 02:03:07'),
(283, 15, 4, 42, 1, 250, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 02:03:07', '2024-07-31 02:03:07'),
(284, 27, 4, 41, 1, 224, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-07-31 02:04:01', '2024-07-31 02:04:01'),
(285, 23, 4, 40, 1, 202, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-07-31 02:07:32', '2024-07-31 02:07:32'),
(287, 23, 4, 40, 1, 203, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-07-31 02:07:32', '2024-07-31 02:07:32'),
(288, 23, 4, 41, 1, 231, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-07-31 02:07:32', '2024-07-31 02:07:32'),
(289, 23, 4, 42, 1, 259, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-07-31 02:07:32', '2024-07-31 02:07:32'),
(290, 24, 4, 42, 1, 254, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-07-31 02:08:38', '2024-07-31 02:08:38'),
(291, 29, 3, 28, 1, 214, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-07-31 05:27:56', '2024-07-31 05:27:56'),
(292, 25, 3, 29, 1, 238, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-07-31 05:40:20', '2024-07-31 05:40:20'),
(293, 25, 3, 30, 1, 267, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-31 05:40:20', '2024-07-31 05:40:20'),
(294, 25, 3, 30, 1, 266, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-31 05:40:20', '2024-07-31 05:40:20'),
(295, 8, 3, 30, 1, 262, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-07-31 05:42:00', '2024-07-31 05:42:00'),
(296, 23, 3, 28, 1, 216, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-31 05:43:29', '2024-07-31 05:43:29'),
(297, 23, 4, 42, 1, 258, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-07-31 05:43:29', '2024-07-31 05:43:29'),
(298, 6, 3, 29, 1, 233, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-07-31 05:44:57', '2024-07-31 05:44:57'),
(299, 6, 4, 41, 1, 219, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-07-31 05:44:57', '2024-07-31 05:44:57'),
(300, 34, 3, 28, 1, 209, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-31 06:04:07', '2024-07-31 06:04:07'),
(301, 34, 3, 29, 1, 237, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-31 06:04:07', '2024-07-31 06:04:07'),
(302, 34, 4, 41, 1, 223, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-31 06:04:07', '2024-07-31 06:04:07'),
(303, 34, 4, 40, 1, 195, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-07-31 06:04:07', '2024-07-31 06:04:07'),
(304, 35, 3, 30, 1, 269, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-07-31 06:08:45', '2024-07-31 06:08:45'),
(305, 27, 4, 42, 1, 252, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-07-31 06:14:36', '2024-07-31 06:14:36'),
(306, 27, 4, 40, 1, 196, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-07-31 06:14:36', '2024-07-31 06:14:36'),
(307, 36, 4, 40, 1, 199, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-07-31 06:16:29', '2024-07-31 06:16:29'),
(308, 24, 4, 41, 1, 226, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-07-31 06:17:17', '2024-07-31 06:17:17'),
(309, 20, 4, 42, 1, 248, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-07-31 06:18:02', '2024-07-31 06:18:02'),
(310, 1, 3, 28, 1, 218, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-07-31 06:21:13', '2024-07-31 06:21:13'),
(311, 1, 3, 29, 1, 246, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-07-31 06:21:13', '2024-07-31 06:21:13'),
(312, 1, 3, 30, 1, 274, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-07-31 06:21:13', '2024-07-31 06:21:13'),
(313, 25, 3, 28, 1, 211, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-07-31 06:23:27', '2024-07-31 06:23:27'),
(315, 24, 3, 29, 1, 240, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-31 06:29:02', '2024-07-31 06:29:02'),
(316, 24, 3, 28, 1, 212, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-31 06:29:02', '2024-07-31 06:29:02'),
(318, 34, 3, 30, 1, 265, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-07-31 06:30:44', '2024-07-31 06:30:44'),
(319, 34, 4, 41, 1, 223, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-07-31 06:30:44', '2024-07-31 06:30:44'),
(320, 15, 3, 29, 1, 236, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-31 06:32:10', '2024-07-31 06:32:10'),
(321, 15, 4, 41, 1, 222, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-07-31 06:32:10', '2024-07-31 06:32:10'),
(322, 12, 3, 30, 1, 263, 1, 'Friday', 0, '23:50:00', '12:50:00', '2024-07-31 06:34:22', '2024-07-31 06:34:22'),
(323, 12, 4, 42, 1, 249, 1, 'Friday', 0, '23:50:00', '12:50:00', '2024-07-31 06:34:22', '2024-07-31 06:34:22'),
(324, 12, 4, 41, 1, 221, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-07-31 06:34:22', '2024-07-31 06:34:22'),
(325, 27, 4, 41, 1, 224, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-07-31 06:37:02', '2024-07-31 06:37:02'),
(327, 27, 4, 40, 1, 196, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-07-31 06:37:02', '2024-07-31 06:37:02'),
(328, 38, 4, 42, 1, 256, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-07-31 06:38:20', '2024-07-31 06:38:20'),
(329, 36, 4, 42, 1, 255, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-07-31 06:39:27', '2024-07-31 06:39:27'),
(330, 1, 4, 40, 1, 204, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-31 06:41:33', '2024-07-31 06:41:33'),
(331, 1, 4, 41, 1, 232, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-31 06:41:33', '2024-07-31 06:41:33'),
(332, 1, 4, 42, 1, 260, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-07-31 06:41:33', '2024-07-31 06:41:33'),
(333, 20, 4, 40, 1, 192, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-31 06:43:54', '2024-07-31 06:43:54'),
(334, 20, 4, 41, 1, 220, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-31 06:43:54', '2024-07-31 06:43:54'),
(335, 6, 4, 41, 1, 219, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-31 06:46:43', '2024-07-31 06:46:43'),
(336, 6, 3, 29, 1, 233, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-07-31 06:46:43', '2024-07-31 06:46:43'),
(337, 27, 4, 42, 1, 252, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-07-31 06:48:38', '2024-07-31 06:48:38'),
(338, 27, 4, 42, 1, 253, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-31 06:48:38', '2024-07-31 06:48:38'),
(339, 29, 4, 40, 1, 200, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-07-31 06:50:14', '2024-07-31 06:50:14'),
(340, 15, 4, 40, 1, 194, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:52:08', '2024-07-31 06:52:08'),
(341, 15, 3, 28, 1, 208, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:52:08', '2024-07-31 06:52:08'),
(342, 35, 3, 29, 1, 243, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:54:23', '2024-07-31 06:54:23'),
(343, 35, 3, 30, 1, 271, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:54:23', '2024-07-31 06:54:23'),
(344, 36, 4, 41, 1, 229, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:55:36', '2024-07-31 06:55:36'),
(345, 36, 4, 42, 1, 257, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-07-31 06:55:36', '2024-07-31 06:55:36'),
(346, 25, 3, 28, 1, 210, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-07-31 06:58:05', '2024-07-31 06:58:05'),
(347, 25, 3, 29, 1, 238, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-07-31 06:58:05', '2024-07-31 06:58:05'),
(348, 8, 3, 30, 1, 262, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-07-31 06:59:32', '2024-07-31 06:59:32'),
(349, 8, 3, 28, 1, 206, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-07-31 06:59:32', '2024-07-31 06:59:32'),
(350, 34, 3, 28, 1, 209, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-07-31 07:01:04', '2024-07-31 07:01:04'),
(351, 34, 3, 29, 1, 237, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-07-31 07:01:04', '2024-07-31 07:01:04'),
(352, 38, 3, 30, 1, 269, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-07-31 07:02:05', '2024-07-31 07:02:05'),
(353, 23, 3, 30, 1, 272, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-07-31 07:03:04', '2024-07-31 07:03:04'),
(354, 42, 3, 23, 1, 121, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-31 09:04:36', '2024-07-31 09:04:36'),
(355, 42, 4, 16, 1, 111, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-07-31 09:04:36', '2024-07-31 09:04:36'),
(356, 42, 3, 24, 1, 146, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 09:04:36', '2024-07-31 09:04:36'),
(357, 42, 4, 26, 1, 131, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 09:04:36', '2024-07-31 09:04:36'),
(358, 41, 3, 17, 1, 103, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 09:07:18', '2024-07-31 09:07:18'),
(359, 41, 4, 19, 1, 93, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-07-31 09:07:18', '2024-07-31 09:07:18'),
(360, 1, 3, 31, 1, 589, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(361, 1, 3, 32, 1, 590, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(362, 1, 3, 33, 1, 591, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(363, 1, 3, 34, 1, 592, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(364, 1, 3, 35, 1, 593, 1, 'Monday', 0, '08:00:00', '09:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(365, 1, 4, 43, 1, 598, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(366, 1, 4, 44, 1, 599, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(367, 1, 4, 46, 1, 600, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(368, 1, 4, 47, 1, 601, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(369, 1, 4, 48, 1, 602, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-01 04:02:40', '2024-08-01 04:02:40'),
(370, 7, 3, 31, 1, 297, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(373, 7, 3, 34, 1, 399, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(375, 7, 4, 48, 1, 415, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(377, 7, 4, 46, 1, 348, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(378, 7, 3, 33, 1, 364, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(379, 7, 4, 44, 1, 314, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-01 04:17:16', '2024-08-01 04:17:16'),
(381, 43, 3, 34, 1, 396, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(382, 43, 3, 35, 1, 430, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(383, 43, 3, 31, 1, 294, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(384, 43, 3, 33, 1, 361, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(385, 43, 3, 31, 1, 294, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(387, 43, 3, 32, 1, 327, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(388, 43, 3, 35, 1, 430, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(389, 43, 3, 35, 1, 430, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(390, 43, 3, 34, 1, 396, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-08-01 04:31:08', '2024-08-01 04:31:08'),
(391, 9, 3, 33, 1, 363, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(392, 9, 3, 34, 1, 398, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(393, 9, 3, 35, 1, 431, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(394, 9, 3, 35, 1, 431, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(395, 9, 3, 34, 1, 398, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(396, 9, 3, 33, 1, 363, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(397, 9, 3, 32, 1, 329, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(398, 9, 3, 32, 1, 329, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(400, 9, 3, 34, 1, 398, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 04:41:47', '2024-08-01 04:41:47'),
(401, 9, 3, 35, 1, 431, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(402, 9, 3, 32, 1, 329, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(403, 9, 3, 31, 1, 296, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(404, 9, 3, 33, 1, 363, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(405, 9, 3, 31, 1, 296, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(406, 9, 3, 35, 1, 431, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-08-01 06:00:24', '2024-08-01 06:00:24'),
(407, 10, 3, 34, 1, 402, 1, 'Monday', 0, '09:09:00', '10:10:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(408, 10, 3, 32, 1, 333, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(409, 10, 3, 32, 1, 333, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(410, 10, 3, 32, 1, 333, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(411, 10, 3, 33, 1, 367, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(412, 10, 3, 35, 1, 435, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(413, 10, 3, 35, 1, 435, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(414, 10, 3, 34, 1, 402, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(415, 10, 3, 33, 1, 367, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(416, 10, 3, 35, 1, 435, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(417, 10, 3, 31, 1, 300, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-01 06:23:02', '2024-08-01 06:23:02'),
(418, 3, 3, 35, 1, 428, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(419, 3, 3, 33, 1, 359, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(420, 3, 3, 31, 1, 292, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(421, 3, 4, 43, 1, 275, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(422, 3, 3, 35, 1, 428, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(423, 3, 3, 32, 1, 325, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(424, 3, 3, 34, 1, 394, 1, 'Tuesday', 0, '11:50:00', '00:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(425, 3, 4, 47, 1, 377, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(426, 3, 4, 44, 1, 309, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(427, 3, 4, 47, 1, 377, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(428, 3, 4, 48, 1, 411, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(429, 3, 3, 31, 1, 292, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(430, 3, 4, 43, 1, 275, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(431, 3, 3, 32, 1, 325, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(432, 3, 4, 44, 1, 309, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(433, 3, 3, 34, 1, 394, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(434, 3, 3, 33, 1, 359, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(435, 3, 4, 46, 1, 343, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(437, 3, 4, 48, 1, 411, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(438, 3, 4, 43, 1, 275, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(439, 3, 4, 44, 1, 309, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(440, 3, 4, 46, 1, 343, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(441, 3, 4, 47, 1, 377, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(442, 3, 4, 48, 1, 411, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(443, 3, 3, 31, 1, 292, 1, 'Saturday', 0, '11:50:00', '12:16:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(444, 3, 3, 32, 1, 325, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(445, 3, 3, 33, 1, 359, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(446, 3, 3, 34, 1, 394, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(447, 3, 3, 35, 1, 428, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(448, 3, 3, 35, 1, 428, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-08-01 06:50:28', '2024-08-01 06:50:28'),
(449, 16, 3, 31, 1, 299, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(450, 16, 3, 32, 1, 332, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(451, 16, 4, 44, 1, 342, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(452, 16, 3, 33, 1, 366, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(453, 16, 4, 46, 1, 349, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(454, 16, 4, 43, 1, 282, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(455, 16, 3, 35, 1, 434, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(456, 16, 3, 34, 1, 401, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(457, 16, 4, 47, 1, 384, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(458, 16, 4, 48, 1, 417, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-01 07:28:01', '2024-08-01 07:28:01'),
(459, 8, 3, 34, 1, 395, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(460, 8, 3, 33, 1, 360, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(461, 8, 3, 32, 1, 326, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(462, 8, 3, 31, 1, 293, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(463, 8, 3, 33, 1, 360, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(465, 8, 3, 34, 1, 395, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(466, 8, 3, 32, 1, 326, 1, 'Saturday', 0, '14:30:00', '15:30:00', '2024-08-01 07:39:33', '2024-08-01 07:39:33'),
(471, 13, 3, 35, 1, 433, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(472, 13, 3, 34, 1, 400, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(473, 13, 4, 47, 1, 383, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(475, 13, 3, 31, 1, 298, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(476, 13, 3, 33, 1, 365, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(479, 13, 3, 32, 1, 331, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(480, 13, 4, 44, 1, 315, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-01 07:58:53', '2024-08-01 07:58:53'),
(481, 24, 3, 35, 1, 436, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(482, 24, 3, 35, 1, 436, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(483, 24, 3, 35, 1, 436, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(484, 24, 3, 35, 1, 436, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(485, 24, 4, 48, 1, 419, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(486, 24, 4, 48, 1, 419, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(487, 24, 4, 48, 1, 419, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(488, 24, 4, 48, 1, 419, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:05:35', '2024-08-01 08:05:35'),
(489, 15, 3, 35, 1, 437, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(490, 15, 3, 35, 1, 437, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(491, 15, 3, 35, 1, 437, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(492, 15, 3, 35, 1, 437, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(493, 15, 4, 48, 1, 420, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(494, 15, 4, 48, 1, 420, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(495, 15, 4, 48, 1, 420, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(496, 15, 4, 48, 1, 420, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(497, 15, 4, 44, 1, 312, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(498, 15, 3, 32, 1, 328, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(500, 15, 3, 34, 1, 397, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(501, 15, 4, 47, 1, 380, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(502, 15, 3, 31, 1, 295, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(503, 15, 3, 33, 1, 362, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(504, 15, 4, 43, 1, 278, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-01 08:28:49', '2024-08-01 08:28:49'),
(505, 35, 3, 35, 1, 439, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:32:14', '2024-08-01 08:32:14'),
(506, 35, 3, 35, 1, 439, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:32:14', '2024-08-01 08:32:14'),
(507, 35, 3, 35, 1, 439, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:32:14', '2024-08-01 08:32:14'),
(508, 35, 3, 35, 1, 439, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:32:14', '2024-08-01 08:32:14'),
(509, 36, 4, 48, 1, 422, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:36:54', '2024-08-01 08:36:54');
INSERT INTO `teacher_timetables` (`id`, `teacher_id`, `medium_id`, `standard_id`, `class_id`, `subject_id`, `school_id`, `day`, `break`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(510, 36, 4, 48, 1, 422, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:36:54', '2024-08-01 08:36:54'),
(511, 36, 4, 48, 1, 422, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:36:54', '2024-08-01 08:36:54'),
(512, 36, 4, 48, 1, 422, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:36:54', '2024-08-01 08:36:54'),
(513, 38, 4, 48, 1, 423, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 08:46:10', '2024-08-01 08:46:10'),
(514, 38, 4, 48, 1, 423, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:46:10', '2024-08-01 08:46:10'),
(515, 38, 4, 48, 1, 423, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 08:46:10', '2024-08-01 08:46:10'),
(516, 38, 4, 48, 1, 423, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 08:46:10', '2024-08-01 08:46:10'),
(517, 29, 3, 35, 1, 440, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 09:16:34', '2024-08-01 09:16:34'),
(518, 29, 3, 35, 1, 440, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:16:34', '2024-08-01 09:16:34'),
(519, 29, 3, 35, 1, 440, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:16:34', '2024-08-01 09:16:34'),
(520, 29, 3, 35, 1, 440, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 09:16:34', '2024-08-01 09:16:34'),
(521, 8, 3, 35, 1, 438, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 09:21:36', '2024-08-01 09:21:36'),
(522, 8, 3, 35, 1, 438, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:21:36', '2024-08-01 09:21:36'),
(523, 8, 3, 35, 1, 438, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:21:36', '2024-08-01 09:21:36'),
(524, 8, 3, 35, 1, 438, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 09:21:36', '2024-08-01 09:21:36'),
(525, 23, 3, 35, 1, 441, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(526, 23, 3, 35, 1, 441, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(527, 23, 3, 35, 1, 441, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(528, 23, 3, 35, 1, 441, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(529, 23, 4, 48, 1, 424, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(530, 23, 4, 48, 1, 424, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(531, 23, 4, 48, 1, 424, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(532, 23, 4, 48, 1, 424, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-01 09:26:34', '2024-08-01 09:26:34'),
(533, 7, 4, 47, 1, 382, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-01 09:30:03', '2024-08-01 09:30:03'),
(534, 23, 3, 31, 1, 303, 1, 'Tuesday', 0, '08:00:00', '09:00:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(535, 23, 3, 33, 1, 370, 1, 'Tuesday', 0, '08:00:00', '08:00:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(536, 23, 3, 34, 1, 405, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(537, 23, 3, 32, 1, 336, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(542, 23, 4, 46, 1, 353, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(543, 23, 4, 47, 1, 388, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(544, 23, 4, 44, 1, 319, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(545, 23, 4, 43, 1, 286, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(546, 23, 4, 43, 1, 287, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(547, 23, 4, 44, 1, 320, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(548, 23, 4, 46, 1, 354, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(549, 23, 4, 47, 1, 389, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(550, 23, 4, 48, 1, 425, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-01 09:45:52', '2024-08-01 09:45:52'),
(551, 23, 3, 31, 1, 304, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-01 09:51:11', '2024-08-01 09:51:11'),
(552, 23, 3, 32, 1, 337, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-01 09:51:11', '2024-08-01 09:51:11'),
(553, 23, 3, 33, 1, 371, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-01 09:51:11', '2024-08-01 09:51:11'),
(554, 23, 3, 34, 1, 406, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-01 09:51:11', '2024-08-01 09:51:11'),
(555, 23, 3, 35, 1, 442, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-01 09:51:11', '2024-08-01 09:51:11'),
(564, 35, 3, 33, 1, 375, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(565, 35, 3, 34, 1, 409, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(566, 35, 3, 31, 1, 307, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(567, 35, 4, 43, 1, 290, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(568, 35, 3, 32, 1, 340, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(569, 35, 3, 31, 1, 306, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(570, 35, 3, 32, 1, 339, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(571, 35, 3, 33, 1, 374, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(572, 35, 3, 34, 1, 408, 1, 'Saturday', 0, '15:40:00', '16:40:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(573, 35, 4, 43, 1, 289, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(574, 35, 4, 44, 1, 322, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(575, 35, 4, 46, 1, 356, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(576, 35, 4, 47, 1, 391, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(577, 35, 4, 44, 1, 323, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(578, 35, 4, 46, 1, 357, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(579, 35, 4, 47, 1, 392, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 05:30:12', '2024-08-02 05:30:12'),
(580, 29, 3, 33, 1, 376, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-02 05:37:04', '2024-08-02 05:37:04'),
(581, 29, 3, 34, 1, 410, 1, 'Wednesday', 0, '08:00:00', '09:00:00', '2024-08-02 05:37:04', '2024-08-02 05:37:04'),
(582, 29, 3, 31, 1, 308, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 05:37:04', '2024-08-02 05:37:04'),
(583, 29, 3, 32, 1, 341, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-02 05:37:04', '2024-08-02 05:37:04'),
(584, 24, 3, 31, 1, 302, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(585, 24, 3, 32, 1, 335, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(586, 24, 3, 33, 1, 369, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(587, 24, 3, 34, 1, 404, 1, 'Saturday', 0, '13:00:00', '14:00:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(588, 24, 4, 47, 1, 387, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(589, 24, 4, 43, 1, 285, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(590, 24, 4, 44, 1, 318, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(591, 24, 4, 46, 1, 352, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 05:46:06', '2024-08-02 05:46:06'),
(592, 15, 3, 32, 1, 328, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(593, 15, 3, 34, 1, 397, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(594, 15, 3, 31, 1, 295, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(596, 15, 4, 44, 1, 312, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(598, 15, 4, 47, 1, 380, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(599, 15, 4, 43, 1, 278, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-02 05:53:52', '2024-08-02 05:53:52'),
(600, 2, 3, 31, 1, 301, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(601, 2, 3, 32, 1, 334, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(602, 2, 3, 33, 1, 368, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(603, 2, 4, 43, 1, 284, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(604, 2, 4, 44, 1, 317, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(605, 2, 4, 46, 1, 351, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(606, 2, 4, 47, 1, 386, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(607, 2, 4, 48, 1, 427, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(608, 2, 3, 34, 1, 403, 1, 'Thursday', 0, '22:40:00', '11:40:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(609, 2, 3, 35, 1, 444, 1, 'Thursday', 0, '22:40:00', '11:40:00', '2024-08-02 06:02:06', '2024-08-02 06:02:06'),
(610, 1, 3, 31, 1, 305, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(611, 1, 3, 32, 1, 338, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(612, 1, 3, 33, 1, 372, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(613, 1, 3, 34, 1, 407, 1, 'Friday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(614, 1, 4, 43, 1, 288, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(615, 1, 4, 44, 1, 321, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(616, 1, 4, 46, 1, 355, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(617, 1, 4, 47, 1, 390, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 06:13:46', '2024-08-02 06:13:46'),
(618, 26, 4, 48, 1, 414, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(619, 26, 4, 44, 1, 313, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(620, 26, 4, 46, 1, 347, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(623, 26, 4, 47, 1, 381, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(624, 26, 4, 44, 1, 313, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(625, 26, 4, 46, 1, 347, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(626, 26, 4, 48, 1, 414, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(627, 26, 4, 47, 1, 381, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(628, 26, 4, 43, 1, 279, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(629, 26, 4, 44, 1, 313, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(630, 26, 4, 48, 1, 414, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(633, 26, 4, 47, 1, 381, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 06:29:10', '2024-08-02 06:29:10'),
(636, 37, 4, 46, 1, 350, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(637, 37, 4, 44, 1, 316, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(638, 37, 4, 47, 1, 385, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(639, 37, 4, 48, 1, 418, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(640, 37, 4, 43, 1, 283, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(641, 37, 4, 48, 1, 418, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(644, 37, 4, 46, 1, 350, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 06:42:40', '2024-08-02 06:42:40'),
(645, 20, 4, 47, 1, 378, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(646, 20, 4, 48, 1, 421, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(647, 20, 4, 48, 1, 421, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(648, 20, 4, 48, 1, 421, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(649, 20, 4, 48, 1, 421, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(651, 20, 4, 44, 1, 310, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(652, 20, 4, 43, 1, 276, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(653, 20, 4, 46, 1, 344, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(656, 20, 4, 43, 1, 276, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 06:59:40', '2024-08-02 06:59:40'),
(657, 12, 3, 29, 1, 235, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(658, 12, 3, 30, 1, 263, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(659, 12, 4, 42, 1, 249, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(660, 12, 3, 29, 1, 235, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(661, 12, 3, 28, 1, 207, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(662, 12, 4, 40, 1, 193, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(663, 12, 4, 42, 1, 249, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(664, 12, 4, 41, 1, 221, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 07:08:01', '2024-08-02 07:08:01'),
(665, 33, 4, 44, 1, 311, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(666, 33, 4, 48, 1, 412, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(667, 33, 4, 43, 1, 277, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(668, 33, 4, 46, 1, 345, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(669, 33, 4, 44, 1, 311, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(671, 33, 4, 46, 1, 345, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(672, 33, 4, 43, 1, 277, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 07:15:50', '2024-08-02 07:15:50'),
(676, 36, 4, 44, 1, 323, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(677, 36, 4, 46, 1, 357, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(678, 36, 4, 43, 1, 290, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(679, 36, 4, 47, 1, 392, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(680, 36, 4, 48, 1, 422, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(681, 36, 4, 48, 1, 422, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(682, 36, 4, 48, 1, 422, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(683, 36, 4, 48, 1, 422, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(684, 36, 4, 43, 1, 289, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(685, 36, 4, 44, 1, 322, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(686, 36, 4, 46, 1, 356, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(687, 36, 4, 47, 1, 391, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:27:17', '2024-08-02 07:27:17'),
(688, 38, 4, 44, 1, 324, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(689, 38, 4, 46, 1, 358, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(690, 38, 4, 43, 1, 291, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(691, 38, 4, 47, 1, 393, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(692, 38, 4, 43, 1, 289, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(693, 38, 4, 44, 1, 322, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(694, 38, 4, 46, 1, 356, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(695, 38, 4, 47, 1, 391, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(696, 38, 4, 48, 1, 423, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(697, 38, 4, 48, 1, 423, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(698, 38, 4, 48, 1, 423, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(699, 38, 4, 48, 1, 423, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 07:36:57', '2024-08-02 07:36:57'),
(700, 39, 3, 36, 1, 475, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(701, 39, 4, 49, 1, 455, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(702, 39, 3, 36, 1, 470, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(703, 39, 4, 49, 1, 450, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(704, 39, 3, 36, 1, 475, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(705, 39, 4, 49, 1, 455, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(706, 39, 3, 37, 1, 522, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(707, 39, 4, 50, 1, 499, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(710, 39, 3, 36, 1, 470, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(711, 39, 4, 49, 1, 450, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(712, 39, 3, 37, 1, 524, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(713, 39, 4, 50, 1, 501, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(714, 39, 3, 37, 1, 524, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(716, 39, 3, 37, 1, 519, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(717, 39, 4, 50, 1, 496, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(718, 39, 3, 37, 1, 522, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(719, 39, 4, 50, 1, 499, 1, 'Thursday', 0, '10:40:00', '23:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(720, 39, 3, 37, 1, 519, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(721, 39, 4, 50, 1, 496, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(722, 39, 3, 36, 1, 470, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(723, 39, 4, 49, 1, 450, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(724, 39, 3, 36, 1, 475, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(725, 39, 4, 49, 1, 455, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(726, 39, 3, 37, 1, 519, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(727, 39, 4, 50, 1, 496, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(728, 39, 3, 37, 1, 522, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(729, 39, 4, 50, 1, 499, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(732, 39, 3, 37, 1, 524, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(733, 39, 4, 50, 1, 501, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(734, 39, 3, 37, 1, 524, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(735, 39, 4, 50, 1, 501, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 08:08:30', '2024-08-02 08:08:30'),
(736, 2, 3, 37, 1, 518, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(737, 2, 4, 50, 1, 495, 1, 'Monday', 0, '10:40:00', '10:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(738, 2, 3, 37, 1, 518, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(739, 2, 4, 50, 1, 495, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(740, 2, 3, 37, 1, 518, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(741, 2, 4, 50, 1, 495, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(742, 2, 3, 36, 1, 469, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(743, 2, 4, 49, 1, 449, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(744, 2, 3, 36, 1, 469, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(745, 2, 4, 49, 1, 449, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(746, 2, 3, 36, 1, 469, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(747, 2, 4, 49, 1, 449, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(748, 2, 3, 37, 1, 518, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(749, 2, 4, 50, 1, 495, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(750, 2, 3, 36, 1, 483, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(751, 2, 3, 37, 1, 533, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(752, 2, 4, 49, 1, 463, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(753, 2, 4, 50, 1, 509, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(754, 2, 3, 38, 1, 561, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(755, 2, 3, 39, 1, 587, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(756, 2, 4, 51, 1, 548, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(757, 2, 4, 52, 1, 574, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 08:27:02', '2024-08-02 08:27:02'),
(758, 1, 3, 36, 1, 594, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(759, 1, 3, 37, 1, 595, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(760, 1, 3, 38, 1, 596, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(761, 1, 3, 39, 1, 597, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(762, 1, 4, 49, 1, 603, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(763, 1, 4, 50, 1, 604, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(764, 1, 4, 51, 1, 605, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(765, 1, 4, 52, 1, 606, 1, 'Monday', 0, '11:50:00', '12:50:00', '2024-08-02 08:32:54', '2024-08-02 08:32:54'),
(766, 8, 3, 36, 1, 471, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(767, 8, 4, 49, 1, 451, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(768, 8, 3, 36, 1, 471, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(769, 8, 4, 49, 1, 451, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(770, 8, 3, 36, 1, 471, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(771, 8, 4, 49, 1, 451, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 08:37:50', '2024-08-02 08:37:50'),
(772, 20, 3, 37, 1, 520, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(773, 20, 4, 50, 1, 497, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(774, 20, 3, 37, 1, 520, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(775, 20, 4, 50, 1, 497, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(776, 20, 3, 37, 1, 520, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(777, 20, 4, 50, 1, 497, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(778, 20, 3, 37, 1, 520, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(779, 20, 4, 50, 1, 497, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 08:43:46', '2024-08-02 08:43:46'),
(780, 43, 3, 36, 1, 466, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(781, 43, 3, 37, 1, 515, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(782, 43, 4, 49, 1, 446, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(783, 43, 4, 49, 1, 446, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(784, 43, 3, 36, 1, 466, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(785, 43, 3, 36, 1, 466, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(786, 43, 4, 49, 1, 446, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(787, 43, 3, 37, 1, 515, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 09:21:16', '2024-08-02 09:21:16'),
(789, 39, 3, 37, 1, 519, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 09:24:51', '2024-08-02 09:24:51'),
(790, 39, 4, 50, 1, 496, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 09:24:51', '2024-08-02 09:24:51'),
(791, 3, 4, 50, 1, 491, 1, 'Monday', 0, '13:00:00', '13:00:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(792, 3, 4, 52, 1, 563, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(793, 3, 3, 37, 1, 514, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(794, 3, 3, 39, 1, 576, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(795, 3, 4, 49, 1, 445, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(796, 3, 4, 51, 1, 537, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 09:46:59', '2024-08-02 09:46:59'),
(799, 3, 3, 36, 1, 465, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 09:55:11', '2024-08-02 09:55:11'),
(800, 3, 3, 38, 1, 550, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 09:55:11', '2024-08-02 09:55:11'),
(801, 3, 4, 50, 1, 491, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(802, 3, 4, 52, 1, 563, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(803, 3, 4, 49, 1, 445, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(804, 3, 4, 51, 1, 537, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(805, 3, 3, 36, 1, 465, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(806, 3, 3, 38, 1, 550, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(807, 3, 3, 37, 1, 514, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(808, 3, 3, 39, 1, 576, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-02 10:23:14', '2024-08-02 10:23:14'),
(809, 3, 4, 49, 1, 445, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(810, 3, 4, 51, 1, 537, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(811, 3, 4, 50, 1, 491, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(812, 3, 4, 52, 1, 563, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(813, 3, 3, 37, 1, 514, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(814, 3, 3, 39, 1, 576, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:27:38', '2024-08-02 10:27:38'),
(815, 3, 3, 36, 1, 465, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 10:29:48', '2024-08-02 10:29:48'),
(816, 3, 3, 38, 1, 550, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-02 10:29:48', '2024-08-02 10:29:48'),
(817, 3, 3, 36, 1, 465, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(818, 3, 3, 37, 1, 514, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(819, 3, 3, 38, 1, 550, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(820, 3, 3, 39, 1, 576, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(821, 3, 4, 49, 1, 445, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(822, 3, 4, 50, 1, 491, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(823, 3, 4, 51, 1, 537, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(824, 3, 4, 52, 1, 563, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-02 10:33:49', '2024-08-02 10:33:49'),
(825, 24, 3, 39, 1, 577, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(826, 24, 4, 52, 1, 564, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(827, 24, 3, 37, 1, 521, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(828, 24, 4, 50, 1, 498, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(829, 24, 3, 38, 1, 551, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(830, 24, 4, 51, 1, 538, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(831, 24, 3, 36, 1, 472, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(832, 24, 4, 49, 1, 452, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 10:47:55', '2024-08-02 10:47:55'),
(833, 24, 3, 37, 1, 521, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(834, 24, 4, 50, 1, 498, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(835, 24, 3, 39, 1, 577, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(836, 24, 4, 52, 1, 564, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(837, 24, 3, 36, 1, 472, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(838, 24, 4, 49, 1, 452, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(839, 24, 3, 38, 1, 551, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(840, 24, 4, 51, 1, 538, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 10:52:58', '2024-08-02 10:52:58'),
(841, 24, 3, 37, 1, 521, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(842, 24, 4, 50, 1, 498, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(843, 24, 3, 39, 1, 577, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(844, 24, 4, 52, 1, 564, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(845, 24, 3, 36, 1, 472, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(846, 24, 4, 49, 1, 452, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(847, 24, 3, 38, 1, 551, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(848, 24, 4, 51, 1, 538, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 10:58:31', '2024-08-02 10:58:31'),
(849, 24, 3, 36, 1, 472, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:02:20', '2024-08-02 11:02:20'),
(850, 24, 4, 49, 1, 452, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:02:20', '2024-08-02 11:02:20'),
(851, 24, 3, 38, 1, 551, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:02:20', '2024-08-02 11:02:20'),
(852, 24, 4, 51, 1, 538, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:02:20', '2024-08-02 11:02:20'),
(853, 39, 3, 36, 1, 473, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(854, 39, 4, 49, 1, 453, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(855, 39, 3, 36, 1, 473, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(856, 39, 4, 49, 1, 453, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(857, 39, 3, 36, 1, 473, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(858, 39, 4, 49, 1, 453, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(859, 39, 3, 36, 1, 473, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(860, 39, 4, 49, 1, 453, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 11:11:08', '2024-08-02 11:11:08'),
(861, 15, 3, 39, 1, 578, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(862, 15, 4, 52, 1, 565, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(863, 15, 3, 37, 1, 517, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(864, 15, 4, 50, 1, 494, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(865, 15, 3, 38, 1, 552, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(866, 15, 4, 51, 1, 539, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(867, 15, 3, 36, 1, 468, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(868, 15, 4, 49, 1, 448, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(869, 15, 3, 37, 1, 517, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(870, 15, 4, 50, 1, 494, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(871, 15, 3, 39, 1, 578, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(872, 15, 4, 52, 1, 565, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(873, 15, 3, 36, 1, 468, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(874, 15, 4, 49, 1, 448, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(875, 15, 3, 38, 1, 552, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(876, 15, 4, 51, 1, 539, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(877, 15, 3, 37, 1, 517, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(878, 15, 4, 50, 1, 494, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(879, 15, 3, 39, 1, 578, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(880, 15, 4, 52, 1, 565, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(881, 15, 3, 36, 1, 468, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(882, 15, 4, 49, 1, 448, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(883, 15, 3, 38, 1, 552, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(884, 15, 4, 51, 1, 539, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(885, 15, 3, 36, 1, 468, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(886, 15, 4, 49, 1, 448, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(887, 15, 3, 38, 1, 552, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(888, 15, 4, 51, 1, 539, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 13:42:16', '2024-08-02 13:42:16'),
(889, 28, 3, 37, 1, 516, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(890, 28, 4, 50, 1, 493, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(891, 28, 3, 37, 1, 516, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(892, 28, 4, 50, 1, 493, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(893, 28, 3, 37, 1, 523, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(894, 28, 4, 50, 1, 500, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(895, 28, 3, 37, 1, 516, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(896, 28, 4, 49, 1, 447, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(897, 28, 3, 36, 1, 467, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(898, 28, 3, 36, 1, 467, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(899, 28, 4, 49, 1, 447, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(900, 28, 3, 37, 1, 523, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(901, 28, 4, 50, 1, 500, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(902, 28, 3, 37, 1, 523, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(903, 28, 4, 50, 1, 500, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(908, 28, 3, 36, 1, 467, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(911, 28, 4, 50, 1, 493, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(912, 28, 3, 36, 1, 474, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(913, 28, 4, 49, 1, 454, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 14:07:21', '2024-08-02 14:07:21'),
(914, 10, 4, 49, 1, 456, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 14:24:44', '2024-08-02 14:24:44'),
(915, 10, 3, 36, 1, 476, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 14:24:44', '2024-08-02 14:24:44'),
(916, 10, 3, 37, 1, 525, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:44', '2024-08-02 14:24:44'),
(917, 10, 4, 50, 1, 502, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(918, 10, 3, 37, 1, 525, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(919, 10, 4, 50, 1, 502, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(920, 10, 3, 37, 1, 525, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(921, 10, 4, 50, 1, 502, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(926, 10, 3, 36, 1, 476, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(927, 10, 4, 49, 1, 456, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-02 14:24:45', '2024-08-02 14:24:45'),
(928, 5, 4, 26, 1, 134, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 16:14:04', '2024-08-02 16:14:04'),
(929, 5, 4, 16, 1, 114, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 16:16:17', '2024-08-02 16:16:17'),
(930, 18, 3, 23, 1, 126, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-02 16:28:07', '2024-08-02 16:28:07'),
(931, 41, 3, 24, 1, 148, 1, 'Thursday', 0, '08:00:00', '09:00:00', '2024-08-02 16:36:48', '2024-08-02 16:36:48'),
(932, 18, 3, 24, 1, 150, 1, 'Saturday', 0, '11:50:00', '12:50:00', '2024-08-02 16:41:27', '2024-08-02 16:41:27'),
(933, 18, 3, 24, 1, 150, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-02 16:46:15', '2024-08-02 16:46:15'),
(934, 17, 3, 24, 1, 156, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 16:51:58', '2024-08-02 16:51:58'),
(935, 17, 3, 25, 1, 186, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 16:51:58', '2024-08-02 16:51:58'),
(936, 17, 4, 26, 1, 141, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 16:51:58', '2024-08-02 16:51:58'),
(937, 17, 4, 27, 1, 171, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-02 16:51:58', '2024-08-02 16:51:58'),
(938, 22, 3, 24, 1, 149, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 16:55:17', '2024-08-02 16:55:17'),
(939, 35, 3, 25, 1, 182, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-02 16:57:21', '2024-08-02 16:57:21'),
(940, 14, 3, 24, 1, 147, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 17:01:36', '2024-08-02 17:01:36'),
(941, 14, 4, 26, 1, 132, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-02 17:01:36', '2024-08-02 17:01:36'),
(942, 25, 3, 29, 1, 239, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-02 17:05:28', '2024-08-02 17:05:28'),
(943, 8, 3, 29, 1, 234, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-02 17:11:29', '2024-08-02 17:11:29'),
(944, 8, 3, 29, 1, 234, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-02 17:11:29', '2024-08-02 17:11:29'),
(945, 27, 4, 40, 1, 196, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-02 17:13:27', '2024-08-02 17:13:27'),
(946, 24, 4, 40, 1, 198, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-02 17:14:38', '2024-08-02 17:14:38'),
(947, 8, 3, 36, 1, 471, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-03 05:04:28', '2024-08-03 05:04:28'),
(948, 39, 3, 36, 1, 470, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-03 05:05:16', '2024-08-03 05:05:16'),
(949, 28, 3, 36, 1, 474, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 05:08:19', '2024-08-03 05:08:19'),
(950, 28, 4, 49, 1, 454, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 05:08:19', '2024-08-03 05:08:19'),
(951, 28, 4, 49, 1, 447, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 05:14:52', '2024-08-03 05:14:52'),
(952, 2, 4, 49, 1, 449, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 05:15:47', '2024-08-03 05:15:47'),
(953, 7, 4, 43, 1, 280, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 06:18:15', '2024-08-03 06:18:15'),
(954, 7, 3, 32, 1, 330, 1, 'Wednesday', 0, '09:10:00', '10:10:00', '2024-08-03 06:21:04', '2024-08-03 06:21:04'),
(955, 7, 3, 35, 1, 432, 1, 'Thursday', 0, '09:10:00', '10:10:00', '2024-08-03 06:24:28', '2024-08-03 06:24:28'),
(956, 7, 3, 38, 1, 553, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(957, 7, 4, 51, 1, 540, 1, 'Monday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(958, 7, 3, 39, 1, 579, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(959, 7, 4, 52, 1, 566, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(960, 7, 3, 39, 1, 579, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(961, 7, 4, 52, 1, 566, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(962, 7, 3, 38, 1, 553, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(963, 7, 4, 51, 1, 540, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(964, 7, 3, 39, 1, 583, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(965, 7, 3, 38, 1, 557, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(966, 7, 3, 38, 1, 553, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(967, 7, 4, 51, 1, 540, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(968, 7, 3, 39, 1, 579, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(969, 7, 4, 52, 1, 566, 1, 'Thursday', 0, '13:00:00', '13:00:00', '2024-08-03 06:37:09', '2024-08-03 06:37:09'),
(970, 7, 4, 51, 1, 544, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(971, 7, 3, 38, 1, 557, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(972, 7, 4, 51, 1, 544, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(973, 7, 3, 38, 1, 557, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(974, 7, 4, 51, 1, 544, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(975, 7, 3, 39, 1, 583, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(976, 7, 4, 52, 1, 570, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(977, 7, 3, 39, 1, 583, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(978, 7, 4, 52, 1, 570, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(979, 7, 4, 52, 1, 570, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(980, 7, 3, 39, 1, 579, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(981, 7, 4, 52, 1, 566, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-03 06:45:02', '2024-08-03 06:45:02'),
(982, 16, 3, 38, 1, 556, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(983, 16, 4, 51, 1, 543, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(984, 16, 3, 38, 1, 556, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(985, 16, 4, 51, 1, 543, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(986, 16, 3, 39, 1, 582, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(987, 16, 4, 52, 1, 569, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(988, 16, 3, 39, 1, 582, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(989, 16, 4, 52, 1, 569, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(990, 16, 3, 38, 1, 556, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(991, 16, 4, 51, 1, 543, 1, 'Wednesday', 0, '10:40:00', '11:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(992, 16, 3, 39, 1, 582, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(993, 16, 4, 52, 1, 569, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(994, 16, 3, 38, 1, 560, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(995, 16, 3, 39, 1, 586, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(996, 16, 4, 52, 1, 573, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(997, 16, 3, 38, 1, 560, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(998, 16, 4, 51, 1, 547, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(999, 16, 3, 39, 1, 586, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(1000, 16, 4, 52, 1, 573, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-03 07:02:57', '2024-08-03 07:02:57'),
(1001, 16, 3, 39, 1, 586, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-03 07:05:45', '2024-08-03 07:05:45'),
(1002, 16, 4, 52, 1, 573, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-03 07:05:45', '2024-08-03 07:05:45'),
(1003, 16, 3, 38, 1, 560, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 07:05:45', '2024-08-03 07:05:45'),
(1004, 16, 4, 51, 1, 547, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 07:05:45', '2024-08-03 07:05:45');
INSERT INTO `teacher_timetables` (`id`, `teacher_id`, `medium_id`, `standard_id`, `class_id`, `subject_id`, `school_id`, `day`, `break`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1005, 26, 4, 43, 1, 279, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-03 07:10:43', '2024-08-03 07:10:43'),
(1007, 13, 4, 48, 1, 416, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-03 07:32:24', '2024-08-03 07:32:24'),
(1008, 37, 4, 43, 1, 283, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-03 07:34:34', '2024-08-03 07:34:34'),
(1009, 37, 4, 48, 1, 418, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 07:34:34', '2024-08-03 07:34:34'),
(1010, 13, 3, 39, 1, 584, 1, 'Monday', 0, '13:00:00', '14:00:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1011, 13, 4, 52, 1, 571, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1012, 13, 3, 38, 1, 558, 1, 'Monday', 0, '15:40:00', '16:40:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1013, 13, 4, 51, 1, 545, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1014, 13, 3, 39, 1, 580, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1015, 13, 4, 52, 1, 567, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1016, 13, 3, 38, 1, 554, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1018, 13, 3, 38, 1, 554, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1019, 13, 4, 51, 1, 541, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1020, 13, 3, 39, 1, 580, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1021, 13, 4, 52, 1, 567, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1022, 13, 4, 52, 1, 571, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 07:47:39', '2024-08-03 07:47:39'),
(1023, 13, 3, 39, 1, 580, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1024, 13, 4, 52, 1, 567, 1, 'Thursday', 0, '11:50:00', '12:50:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1025, 13, 3, 38, 1, 554, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1026, 13, 4, 51, 1, 541, 1, 'Thursday', 0, '13:00:00', '14:00:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1027, 13, 3, 38, 1, 558, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1028, 13, 4, 51, 1, 545, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1029, 13, 3, 39, 1, 584, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1030, 13, 4, 52, 1, 571, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1031, 13, 3, 39, 1, 584, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1032, 13, 3, 38, 1, 558, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1033, 13, 4, 51, 1, 545, 1, 'Saturday', 0, '09:10:00', '10:10:00', '2024-08-03 08:13:22', '2024-08-03 08:13:22'),
(1034, 23, 3, 39, 1, 588, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1035, 23, 4, 52, 1, 575, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1036, 23, 3, 36, 1, 484, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1037, 23, 4, 49, 1, 464, 1, 'Tuesday', 0, '14:30:00', '15:30:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1038, 23, 3, 37, 1, 532, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1039, 23, 4, 50, 1, 509, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1040, 23, 3, 38, 1, 562, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1041, 23, 4, 51, 1, 549, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-03 08:21:14', '2024-08-03 08:21:14'),
(1042, 33, 4, 50, 1, 492, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 08:29:41', '2024-08-03 08:29:41'),
(1044, 33, 3, 37, 1, 515, 1, 'Thursday', 0, '14:30:00', '15:30:00', '2024-08-03 08:29:41', '2024-08-03 08:29:41'),
(1045, 33, 4, 50, 1, 492, 1, 'Thursday', 0, '15:40:00', '16:40:00', '2024-08-03 08:29:41', '2024-08-03 08:29:41'),
(1046, 8, 3, 31, 1, 293, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-03 08:50:31', '2024-08-03 08:50:31'),
(1047, 9, 3, 31, 1, 296, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-03 08:51:17', '2024-08-03 08:51:17'),
(1048, 28, 4, 49, 1, 454, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-03 09:17:43', '2024-08-03 09:17:43'),
(1049, 28, 4, 50, 1, 493, 1, 'Monday', 0, '14:30:00', '15:30:00', '2024-08-03 09:20:53', '2024-08-03 09:20:53'),
(1050, 6, 3, 29, 1, 233, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1051, 6, 3, 28, 1, 205, 1, 'Tuesday', 0, '10:40:00', '11:40:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1052, 6, 4, 41, 1, 219, 1, 'Tuesday', 0, '11:50:00', '12:50:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1053, 6, 4, 40, 1, 191, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1054, 6, 3, 30, 1, 261, 1, 'Friday', 0, '09:10:00', '10:10:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1055, 6, 3, 28, 1, 205, 1, 'Friday', 0, '10:40:00', '11:40:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1056, 6, 4, 40, 1, 191, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1057, 6, 4, 42, 1, 247, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 09:34:28', '2024-08-03 09:34:28'),
(1058, 26, 4, 43, 1, 279, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 09:50:48', '2024-08-03 09:50:48'),
(1059, 26, 4, 48, 1, 414, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 09:50:48', '2024-08-03 09:50:48'),
(1060, 20, 4, 44, 1, 310, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 09:53:58', '2024-08-03 09:53:58'),
(1061, 20, 4, 46, 1, 344, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 09:53:58', '2024-08-03 09:53:58'),
(1062, 37, 4, 44, 1, 316, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 09:57:14', '2024-08-03 09:57:14'),
(1063, 37, 4, 47, 1, 385, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 09:57:14', '2024-08-03 09:57:14'),
(1064, 3, 4, 46, 1, 343, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 09:59:31', '2024-08-03 09:59:31'),
(1065, 33, 4, 47, 1, 379, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 10:02:18', '2024-08-03 10:02:18'),
(1066, 33, 4, 48, 1, 412, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-03 10:02:18', '2024-08-03 10:02:18'),
(1067, 13, 4, 43, 1, 281, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-03 10:04:27', '2024-08-03 10:04:27'),
(1068, 33, 4, 47, 1, 379, 1, 'Wednesday', 0, '11:50:00', '12:50:00', '2024-08-03 10:06:33', '2024-08-03 10:06:33'),
(1069, 20, 4, 47, 1, 378, 1, 'Wednesday', 0, '15:40:00', '16:40:00', '2024-08-03 10:07:56', '2024-08-03 10:07:56'),
(1070, 16, 4, 51, 1, 547, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-03 10:17:01', '2024-08-03 10:17:01'),
(1071, 13, 4, 51, 1, 541, 1, 'Wednesday', 0, '14:30:00', '15:30:00', '2024-08-03 10:17:56', '2024-08-03 10:17:56'),
(1072, 25, 3, 29, 1, 238, 1, 'Tuesday', 0, '20:07:00', '09:00:00', '2024-08-03 10:38:10', '2024-08-03 10:38:10'),
(1073, 25, 3, 30, 1, 266, 1, 'Tuesday', 0, '09:10:00', '10:10:00', '2024-08-03 10:38:10', '2024-08-03 10:38:10'),
(1074, 33, 4, 48, 1, 412, 1, 'Saturday', 0, '10:40:00', '11:40:00', '2024-08-03 10:52:21', '2024-08-03 10:52:21'),
(1075, 43, 3, 32, 1, 327, 1, 'Monday', 0, '09:10:00', '10:10:00', '2024-08-03 11:01:46', '2024-08-03 11:01:46'),
(1076, 43, 3, 33, 1, 361, 1, 'Thursday', 0, '10:40:00', '11:40:00', '2024-08-03 11:05:17', '2024-08-03 11:05:17'),
(1077, 3, 4, 15, 1, 70, 1, 'Saturday', 0, '17:05:00', '17:31:00', '2024-08-03 11:30:02', '2024-08-03 11:30:02'),
(1078, 3, 3, 17, 1, 102, 1, 'Saturday', 0, '18:05:00', '18:30:00', '2024-08-03 11:35:51', '2024-08-03 11:35:51'),
(1080, 3, 3, 17, 1, 101, 1, 'Saturday', 0, '17:43:00', '17:59:00', '2024-08-03 11:48:17', '2024-08-03 11:48:17'),
(1081, 15, 4, 46, 1, 346, 1, 'Tuesday', 0, '13:00:00', '14:00:00', '2024-08-04 05:53:36', '2024-08-04 05:53:36'),
(1082, 13, 4, 46, 1, 373, 1, 'Tuesday', 0, '15:40:00', '16:40:00', '2024-08-04 05:55:38', '2024-08-04 05:55:38'),
(1083, 26, 4, 46, 1, 347, 1, 'Wednesday', 0, '13:00:00', '14:00:00', '2024-08-04 05:59:48', '2024-08-04 05:59:48'),
(1084, 39, 4, 50, 1, 501, 1, 'Saturday', 0, '08:00:00', '09:00:00', '2024-08-04 06:13:56', '2024-08-04 06:13:56'),
(1085, 39, 3, 36, 1, 475, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:30:12', '2024-08-04 06:30:12'),
(1086, 39, 4, 49, 1, 455, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:30:12', '2024-08-04 06:30:12'),
(1087, 10, 3, 36, 1, 476, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-04 06:36:50', '2024-08-04 06:36:50'),
(1088, 10, 4, 49, 1, 456, 1, 'Friday', 0, '13:00:00', '13:00:00', '2024-08-04 06:36:50', '2024-08-04 06:36:50'),
(1089, 10, 3, 37, 1, 525, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:36:50', '2024-08-04 06:36:50'),
(1090, 10, 4, 50, 1, 502, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:36:50', '2024-08-04 06:36:50'),
(1091, 28, 3, 37, 1, 516, 1, 'Friday', 0, '15:40:00', '16:40:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38'),
(1092, 28, 4, 49, 1, 447, 1, 'Friday', 0, '14:30:00', '15:30:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38'),
(1093, 28, 3, 37, 1, 516, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38'),
(1094, 28, 4, 50, 1, 493, 1, 'Friday', 0, '11:50:00', '12:50:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38'),
(1095, 28, 3, 36, 1, 467, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38'),
(1096, 28, 4, 49, 1, 447, 1, 'Friday', 0, '13:00:00', '14:00:00', '2024-08-04 06:47:38', '2024-08-04 06:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `topic_image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `topic_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `sub_id`, `topic`, `topic_image`, `type`, `description`, `file_path`, `video_link`, `topic_banner`, `created_at`, `updated_at`) VALUES
(1, 498, '2', NULL, 'free', 'games', NULL, NULL, NULL, '2024-12-19 03:52:34', '2024-12-19 03:52:34'),
(2, 101, '1', NULL, 'free', 'games', NULL, NULL, NULL, '2025-01-01 00:41:34', '2025-01-01 00:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role_id`, `fcm_token`) VALUES
(1, 'VHM SUPPER ADMIN', 'admin@gmail.com', NULL, '$2y$10$0XCpXccyG8YbkIk9mLrgl.hZAiA4B2p7cjFEla/pWxFTtCe608plO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 00:51:21', '2024-07-21 00:51:21', 1, NULL),
(2, 'KESAR SCHOOL', 'hasmukhmodi1959@gmail.com', NULL, '$2y$10$bQi.BoNf36pjrd1i/yP0Qe.zutNSn5.8ZlKu3U2KCMfrVWdKR07uC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-20 19:27:01', '2024-07-20 19:27:01', 2, NULL),
(3, 'VHM SCHOOL', 'dipakdarji8347@gmail.com', NULL, '$2y$10$cqdq/74UduA7bJoDnBQ56.1ASKVHGNhzsGlsp9ZQpHgzaJrKfDJ0S', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-20 19:41:28', '2024-07-20 19:41:28', 2, NULL),
(4, 'VHM987654324120050430', 'guardian2@example.com', NULL, '$2y$10$0XCpXccyG8YbkIk9mLrgl.hZAiA4B2p7cjFEla/pWxFTtCe608plO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-20 19:50:34', '2024-07-20 19:50:34', 4, NULL),
(5, 'VHM120050430', 'emilydavis@example.com', NULL, '$2y$10$cfvvldqIGFuqv8CcQskW3e7EHOTnKFsTwKNh0AnWRed41ouMF4M5m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-20 19:50:34', '2024-07-20 19:50:34', 5, NULL),
(6, 'KES100119960316', 'khushijoshi1712@gmail.com', NULL, '$2y$10$fHhusKmRosTAGszf1FnrBecD/XtBpsDkQTg4Qa907WbcYrB33qsDm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(7, 'KES100220000518', 'nileshvaghela94292@gmail.com', NULL, '$2y$10$3OxBYwlgjaVR5XBrZJfsquVUshS6h3OT7xwzBjf.2klV5esS.d.kO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(8, 'KES100319780210', 'SKSURYAVANSHI78@GMAIL.COM', NULL, '$2y$10$StndEYTbW4pD2GpnfsazCeMhVG0C.mHJ6OMI8pUmO.qQ8iDJLuqQO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(10, 'KES100519860720', 'falumistry86@gmail.com', NULL, '$2y$10$fjmNLZUVb3QE8Azr3pWKFeRBXZFWEQtoosgHNgID/D4DS8OVz6PN2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(11, 'KES100619811008', 'anutappupihu@gmail.com', NULL, '$2y$10$.zZhnNkJgNfxb9xu7kYILuRv0WKy0JLyJc1bgt8F7WXCP5zXwX1b6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(12, 'KES100719870108', 'shailesh94bits2k7@gmail.com', NULL, '$2y$10$YADtwnyq8Da.9VrCand.OeI0Ja8DOwQHKx2ps/2wmh2B1yORPfDNq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(13, 'KES100819900702', 'chhaganlalkumawat123@gmail.com', NULL, '$2y$10$AhTqQG2G6i1nwgoRxuyf.ucXXyXMJ8dKHzK3O5pah4/q1ONTSPKLe', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(14, 'KES100919990601', 'yashvaishnav512@gmail.com', NULL, '$2y$10$kS4eODuaDVJ7FQjr2Z9HnO/JnTyVoEWOyZ6S3Zz1Fe2kEFrhEjw1e', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(15, 'KES101019880420', 'anilvina91@gmail.com', NULL, '$2y$10$WH/EzYTG9G/Con6nzeQrVOvhIW4Hx3gxtDyXVJkU/UCP0DDfLQLEC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:48', '2024-07-21 04:12:48', 3, NULL),
(16, 'KES101119920410', 'skinjal99097@gmail.com', NULL, '$2y$10$gkTrcEHKGQ7rzYtN9q3WOOhVl/FVaBM6sS.jVXmswKLrGHVE9wHYW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(17, 'KES101219930409', 'namratagadhavi93@gmail.com', NULL, '$2y$10$V1iE6vybLtQUK9uPDOc7K.xc9.4HEt4ZlT2Xp7H0J6HutoiTNCvvS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(18, 'KES101320010101', 'limbachiyajayesh051@gmail.com', NULL, '$2y$10$N99.1DBdgBakUV36rvGOC.plYESMKs08GJNYMwF8U903v17ShtgXm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(19, 'KES101419981110', 'sonyprajapati141@gmail.com', NULL, '$2y$10$YLhMO0b/VTp3JRed/US.e.uOnsMw2vDMlcqqZJChHG8jfpvpUoGMK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(20, 'KES101519940303', 'ramkrishna.raval29@gmail.com', NULL, '$2y$10$yQLkTUfPVOvyyq2v4qYYS.0uc0GEMFdiS62h0Okvop.w1LaPd9Bru', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(21, 'KES101619980128', 'jyotimamtora7@gmail.com', NULL, '$2y$10$yazhsk27yELLJRg/O6OSJO4UrYYMDXP8bY/x/YqETVucAIP6f.4Ae', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(22, 'KES101719910408', 'jayshree8404@gmail.com', NULL, '$2y$10$Sd07Y2AR41H2kkHfn1aTdOByUTX1v/SyPj4qeR5sKmZxSxTa8xMo.', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(23, 'KES101819990910', 'manishabhatt821@gmail.com', NULL, '$2y$10$dMr66K21NzK.nbOSCEoZ8.uCsR0qDCzS00BC6DAs4WCW1j0QYwFTq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(24, 'KES101920000523', 'parmarroshani371@gmail.com', NULL, '$2y$10$5zys7.OlGd4qkzqWTRuUyeX45mw.y9XkDy8T7GaXoPo8hu4Wc3emG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(25, 'KES102019861101', 'rakesrajpurohit2012@gmail.com', NULL, '$2y$10$s5Qs2g5mBSMqRgziyAMKeuCndOB41VK8n/czbfrzNACEKu08WDtI6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(26, 'KES102119910623', 'shanurajput23691@gmail.com', NULL, '$2y$10$rjB6yVT2J7Nak20TTqOXruOW4J/VIo8SmGjzYj0/h.f64kN3BZ5d6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(27, 'KES102219901015', 'deepali.singh52@gmail.com', NULL, '$2y$10$hiFFUMuUQ5So8pz.qm41y.aMjGAIrTqCX0PcJ91CtkqZfGd2R4ILa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(28, 'KES102320000305', 'rabarairajabhai104@gmail.com', NULL, '$2y$10$eFxKiup5vzKFdcU6t6bjD.qmytG3qBcLlklM8Fdcgx9zVo6jszl06', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:49', '2024-07-21 04:12:49', 3, NULL),
(29, 'KES102419870918', 'hetjoshi881@gmail.com', NULL, '$2y$10$fPRhz0VNukKZw.21KeviOew4M8N2AseSCnwUwbblkFQaTa1ScCm/u', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(30, 'KES102519911111', 'rinkukhatri2014@gmail.com', NULL, '$2y$10$hQ6Ol1lR111k.jVG45LzZ.RoJAwONxCJEbdNjVkofnOIO4fIRvlPK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(31, 'KES102619990608', 'nitesheducation0780@gmail.com', NULL, '$2y$10$Hd2/.rHeXkZtINeyRSMqI.u7FbSasfQ3L.2BKSj9FltwYzyqdpaY6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(32, 'KES102720020404', 'pbhavika937@gmail.com', NULL, '$2y$10$.UjnMJKd9NWkd4fgMKyavuZvlVX2Jq6hLG65Ow12H6cjwwzx8Qz2C', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(33, 'KES102819780801', 'kpvadnagar@gmail.com', NULL, '$2y$10$VSOJ.64F4T1jfjlujVOhX.MiVVlHG6d2ETvhinPGytPjNiz6/PqXy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(34, 'KES102920020106', 'sunillimbachiyaofficial@gmaile.com', NULL, '$2y$10$j3klZJ2DSiQDrCPE4EeT4uXhmgUSiiV6cBGk.QcDQb4mY5I9izu6K', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(36, 'KES103019900625', 'hitumakwana7@gmail.com', NULL, '$2y$10$Rx5DaZpXirZf.Td2xl2Wiewhmk5D7BEO.UQThh.uNtzPU0D7234si', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(38, 'KES103219920601', 'thakorbhavna04@gmail.com', NULL, '$2y$10$jBKfCSZNmVoqP/9K6XUYyuk2d.wL4Ow0r0aAzfHCRz9m45E7bJ1JC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(39, 'KES103420000929', 'prmrpratham001@gmail.com', NULL, '$2y$10$1hec4sBC3GCepuV6hiWUXOrYC/QrSVCI.q0yKKCRruutotw/V8YVa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(40, 'KES103519940601', 'salonisuthar5206@gmail.com', NULL, '$2y$10$y.Fl86hB18uSIhwiadqBIeA.q6acHf0FQmjuVnDALupbB3ODT1isy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(41, 'KES103619900105', 'baivadiyadinesh@gmail.com', NULL, '$2y$10$qiIN8INgty/bXgXMN/7apevfnmz6Eq/D7gE5j5yC4CFkkMBDYqEt2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(42, 'KES103719910509', 'gothiashish02@gmail.com', NULL, '$2y$10$RzBscK4.vGjr.8.SGRKsaeU6dp7wf.G.o0VvlOajaV6WEKiXpGw4u', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:12:50', '2024-07-21 04:12:50', 3, NULL),
(43, 'KES103820020307', 'goswamisatyam120@gmail.com', NULL, '$2y$10$KRv/Bza7O92Lm5fyjqjmZOJ5Z7zk1z161tmI.Z6OH9mRdlzFskze6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:16:54', '2024-07-21 04:16:54', 3, NULL),
(44, 'KES103920020420', 'himaymali404@gmail.com', NULL, '$2y$10$5StZ.dcW8tLAXf5/G23w8eFHThRf4PCVz5875itRLpRhH4oHsDORG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:16:54', '2024-07-21 04:16:54', 3, NULL),
(47, 'KES104119900101', 'ritapraja99@gmail.com', NULL, '$2y$10$SYyOK3H7bL5fa.qK8SB/..dRVsKbTmt.0NWiq4YT3RlaClw7ucB2m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:43:08', '2024-07-21 04:43:08', 3, NULL),
(49, 'KES104220040408', 'nidhijoshi99@gmail.com', NULL, '$2y$10$ORwMjIETdIjP2Pcnu99lRO56086PLWidQpJyQ3.jJY/is1Z5euYbq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-21 04:51:09', '2024-07-21 04:51:09', 3, NULL),
(52, 'KES903390746619700101', 'DIYA123@GMAIL.COM', NULL, '$2y$10$6Cp7aybzmXnntlxNMgu2HuBDEnZ8rmLClxys5eXe2MHyvNsq1yOI6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 4, NULL),
(53, 'KES219700101', 'DIYA123dm@GMAIL.COM', NULL, '$2y$10$QHSxvzZStwukH1gDLmeJfuZszQmjbrFIzxSqJ994Cq4tgME/92iwC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 5, NULL),
(54, 'KES720098023819700101', 'ROBERT25590@GMAIL.COM', NULL, '$2y$10$qrBOw7PB2ij98wJRh9O3/.HrhjM7Nm6stbx78.nHRhZOlPXXON7xa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 4, NULL),
(55, 'KES319700101', 'ROBERT25590dm@GMAIL.COM', NULL, '$2y$10$3iCEXPRzsJ7bniQHImUg3ufxMkQRAd7mGmNd9Itb//S8hVzoqEsje', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 5, NULL),
(56, 'KES989823905619700101', 'MAAN123@GMAIL.COM', NULL, '$2y$10$49LCAOmfILjSzKaOAZpk1uD3bG/H9LI9PoryXpPjvswyKo.kunzCW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 4, NULL),
(57, 'KES419700101', 'MAAN123dm@GMAIL.COM', NULL, '$2y$10$aux3cMT9p5vCtYEKIGjHI.uxvaK9CZGXJx6QfjnPGnu23sgXqt6qy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:11:06', '2024-07-26 13:11:06', 5, NULL),
(70, 'KES902974743719700101', 'KOTHARIMILAN335@GMAIL.COM', NULL, '$2y$10$pB9MvaZ/YuQ07Rpgya2iEeqfkCpGiU2dHk2ZPtEsN4LvCZoI5WL2i', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44', 4, NULL),
(71, 'KES519700101', 'KOTHARIMILAN335dm@GMAIL.COM', NULL, '$2y$10$85j6ZZprtBTz5xnewgMgv.v9cNEObT1dVWx7nGhyeXfnkJhMJoYFG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44', 5, NULL),
(72, 'KES971249254019700101', 'SOLANKIMAHESH21@GMAIL.COM', NULL, '$2y$10$xl1hbLp4qltiQuL418b4CubRvhFGBux1o5VVQ.Bbll8Us1M.73xoi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44', 4, NULL),
(73, 'KES619700101', 'SOLANKIMAHESH21dm@GMAIL.COM', NULL, '$2y$10$pbzNzx.qh/0jtxTs3Rtp6OPRt3ZdXF5KcJ0gpPqHw53l7yECuzv1q', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:17:44', '2024-07-26 13:17:44', 5, NULL),
(74, 'KES982567015119700101', 'PADHIYAR906@GMAIL.COM', NULL, '$2y$10$BysnmfSnvW62cSRjbkaRNu7v9xkXF9lYYY9/PLQ5UAtpYEEFSJGZq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39', 4, NULL),
(75, 'KES719700101', 'PADHIYAR906dm@GMAIL.COM', NULL, '$2y$10$B6.7qPBwE8GjGvqPYQP0KewN/aMvqq6.o.znRyR9mHmerOKZOh6bi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39', 5, NULL),
(76, 'KES957446972719700101', 'ROMAN123@GMAIL.COM', NULL, '$2y$10$yaSw0E06icmk1lWVH87u.uqK7DJVdApT1gKK7d6sVRdXy9zxYI0ku', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39', 4, NULL),
(77, 'KES819700101', 'ROMAN123dm@GMAIL.COM', NULL, '$2y$10$2YPgzJkLhOL6UQuEC05T2On2pMhrWSnNIu1F6YJE2kDC4A4hqoOKO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:24:39', '2024-07-26 13:24:39', 5, NULL),
(78, 'KES873500000019700101', 'RAVIHIMALAY@GMAIL.COM', NULL, '$2y$10$XttEJPvL.dHW6owLb2i1euFstUU1KZusepca2pC3nx9/.alfCcCLW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19', 4, NULL),
(79, 'KES919700101', 'RAVIHIMALAYdm@GMAIL.COM', NULL, '$2y$10$PaocG0RBnlMp4BbGTFNzgOKcIdquJvV6z9pMu5Yj3h865w7GkAGbG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19', 5, NULL),
(80, 'KES989823905619700101', 'SAJANSOLANKI403350@GMAIL.COM', NULL, '$2y$10$K/KRJsIs3mk4SWx/Xr1HbucS4/R9l1C9DAd0ndAab7qIkPBV.1JL6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19', 4, NULL),
(81, 'KES1019700101', 'SAJANSOLANKI403350dm@GMAIL.COM', NULL, '$2y$10$5DVY706vtvfkJvJD7s7LLuNncja1NnFjPW7tC7YfVvRB1RjqQBY7K', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:29:19', '2024-07-26 13:29:19', 5, NULL),
(94, 'KES800043444919700101', 'NARESHCHAUDHARY.VCS@GMAIL.COM', NULL, '$2y$10$Ux2fFo.IkJgjtS0IhSAIluM7.oTmvfE6dBICNQkMBuFfhMu4xwKAS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:28', '2024-07-26 13:36:28', 4, NULL),
(95, 'KES1119700101', 'NARESHCHAUDHARY.VCSdm@GMAIL.COM', NULL, '$2y$10$jn9C/Mc5jORfmPr4j1BMx.iXDZ2/N7/oYX3N5IS8eHtV5I8GcorDW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:28', '2024-07-26 13:36:28', 5, NULL),
(96, 'KES878000452219700101', 'HINDRA00537@GMAIL.COM', NULL, '$2y$10$lD/pw29gH0fSXpXmpcdg/OR9Pu5dtUc3k.BIzZXotLMYtV288p4tm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29', 4, NULL),
(97, 'KES1219700101', 'HINDRA00537dm@GMAIL.COM', NULL, '$2y$10$PoReqUM5Z4VIdSMoPvdJkuVUo9ui0zvpIz24Sg22pcrqVKDHwQ4aa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29', 5, NULL),
(98, 'KES991312738319700101', 'MEHULJAIN5593@GMAIL.COM', NULL, '$2y$10$.x4APLXB6cSyqFHQSWpNpe.1W98j3Qh4bjSvpH/pfze3biDJ3/5gm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29', 4, NULL),
(99, 'KES1319700101', 'MEHULJAIN5593dm@GMAIL.COM', NULL, '$2y$10$85QVj9ewvkBgcJcOKGcGl.LC9pXWP34M9rhM0rLAOGlwVnFpsVR8S', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:36:29', '2024-07-26 13:36:29', 5, NULL),
(102, 'KES814020555119700101', 'JIYAN123@GMAIL.COM', NULL, '$2y$10$YgG4rhtW6KstfXrpLNQMvOfI.hSRZBlX/FxVTWZ1nvAYaGxT3perG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:48', '2024-07-26 13:41:48', 4, NULL),
(103, 'KES1419700101', 'JIYAN123dm@GMAIL.COM', NULL, '$2y$10$OD8LfhZ2I948ioHrx4icjuecgax7jLfxnb4bG0kaPNrJ34037lF8a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49', 5, NULL),
(104, 'KES787473880919700101', 'SHIVANSH123@GMAIL.COM', NULL, '$2y$10$oJv8e9nVbAaoeYByCorp1ebcUKSoil5IkdbQIjxgFWPkLagDTkC/a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49', 4, NULL),
(105, 'KES1519700101', 'SHIVANSH123dm@GMAIL.COM', NULL, '$2y$10$/qvLubKhktPcZ1bUx7XV/e536a0H8h5jpi4SE/aAVGyAxcWO0TIQC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49', 5, NULL),
(106, 'KES798413367419700101', 'RIYANKOTHARI2018ICLOUD@GMAIL.COM', NULL, '$2y$10$wwQCFYRRjStG5OlnwnnDYuu5S.I4WnQoy48fBth5fWQjQDn0npb/K', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49', 4, NULL),
(107, 'KES1619700101', 'RIYANKOTHARI2018ICLOUDdm@GMAIL.COM', NULL, '$2y$10$XlBJWKlqlHKzFCSwtxkKxuxspNtGErrsooH8ODi9Mf734L77Wcfza', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:41:49', '2024-07-26 13:41:49', 5, NULL),
(110, 'KES903390746619700101', 'CHANDRAKANT.SOLANKIOCC325@GMAIL.COM', NULL, '$2y$10$sjN0g0F8Z8VTja358iN11O4tPoJqnhSptrd.Gck2MQog5XEAF5BpO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40', 4, NULL),
(111, 'KES1719700101', 'CHANDRAKANT.SOLANKIOCC325dm@GMAIL.COM', NULL, '$2y$10$XDm0Cxn4LgBsdRIAAL4Yg.zLHi2k6tS0XK/8rENn2edXT9Jz138cu', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40', 5, NULL),
(112, 'KES123456789019700101', 'SHREYAN123@GMAIL.COM', NULL, '$2y$10$nRkLCg2lia35OQq9h0OVb.QwMqsSktQM1KEDSWaMVcxg6pc27EwqO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40', 4, NULL),
(113, 'KES1819700101', 'SHREYAN123dm@GMAIL.COM', NULL, '$2y$10$kEA4tMz/3EKTNYRcAArfS.O8HyHuqoLFZ6EAaUjW57c2RtYCczSoS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:45:40', '2024-07-26 13:45:40', 5, NULL),
(116, 'KES992503818819700101', 'PADHIYARPRATIK906@GMAIL.COM', NULL, '$2y$10$MWENHLnkVeGTpYHcTBsIxeQNPrO5F8r4iXOv/gH.BhT3C5sOK/nv6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40', 4, NULL),
(117, 'KES1919700101', 'PADHIYARPRATIK906dm@GMAIL.COM', NULL, '$2y$10$Wn63qta.UCgXpyBCrUZZBue.0elBsVC/RLpRBN/Q.P6i5BW5P0eRy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40', 5, NULL),
(118, 'KES982567015119700101', 'RAVIHIMALAYHARSHVARDHAN@GMAIL.COM', NULL, '$2y$10$tQSTpUE9qZUHFTcQfHBojuXV918cOqm9pLAd578EQhHYPzgVIlbA2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40', 4, NULL),
(119, 'KES2019700101', 'RAVIHIMALAYHARSHVARDHANdm@GMAIL.COM', NULL, '$2y$10$bpi1d3Mkd/Jc4G.nje2JEuPzFOMgw.PyL1V/IES5dRpgL6DYNs/Ti', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:51:40', '2024-07-26 13:51:40', 5, NULL),
(120, 'KES982424585819700101', 'MALIBHAIRAV26@GMAIL.COM', NULL, '$2y$10$X1ZMHRFzm2XasInS.vXbpeDZgknEpxsLMhOtwhgqFEp0PK2uMTmx6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:54:40', '2024-07-26 13:54:40', 4, NULL),
(121, 'KES2119700101', 'MALIBHAIRAV26dm@GMAIL.COM', NULL, '$2y$10$.pRICxweFoPNE/sUJQVfeurt8PUX6rBIe5ogWjENXhHDh68jrLzyK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 13:54:40', '2024-07-26 13:54:40', 5, NULL),
(124, 'KES104320000511', 'prajapatihitesh9909@gmail.com', NULL, '$2y$10$k314S3cXV7GVaj3MlLnKXuRBpa/g2SDkXLCdOkYEUb8KZBt8US8t.', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27 10:12:02', '2024-07-27 10:12:02', 3, NULL),
(125, 'KES104419590801', 'hasmukhmodiNew1959@gmail.com', NULL, '$2y$10$Am2LZXTOnfALc0i0ZM3r/OH1LVH8GInBaMJyGDc2FZq5f6LQerpD6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27 11:12:58', '2024-07-27 11:12:58', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendances_student_id_attendance_date_unique` (`student_id`,`attendance_date`),
  ADD KEY `attendances_school_id_foreign` (`school_id`),
  ADD KEY `attendances_holiday_id_foreign` (`holiday_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_teacher_assignments`
--
ALTER TABLE `classes_teacher_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_teacher_assignments_medium_id_foreign` (`medium_id`),
  ADD KEY `classes_teacher_assignments_standard_id_foreign` (`standard_id`),
  ADD KEY `classes_teacher_assignments_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_student_id_foreign` (`student_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_categories_master_category_id_foreign` (`master_category_id`),
  ADD KEY `fee_categories_class_id_foreign` (`class_id`),
  ADD KEY `fee_categories_medium_id_foreign` (`medium_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_school_id_foreign` (`school_id`);

--
-- Indexes for table `home_subjects`
--
ALTER TABLE `home_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_works`
--
ALTER TABLE `home_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_works_teacher_id_foreign` (`teacher_id`),
  ADD KEY `home_works_medium_id_foreign` (`medium_id`),
  ADD KEY `home_works_standard_id_foreign` (`standard_id`),
  ADD KEY `home_works_class_id_foreign` (`class_id`),
  ADD KEY `home_works_subject_id_foreign` (`subject_id`),
  ADD KEY `home_works_school_id_foreign` (`school_id`);

--
-- Indexes for table `master_fee_categories`
--
ALTER TABLE `master_fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediums`
--
ALTER TABLE `mediums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_views`
--
ALTER TABLE `notification_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_views_notice_id_foreign` (`notice_id`),
  ADD KEY `notification_views_user_id_foreign` (`user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parents_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_class_id_foreign` (`class_id`),
  ADD KEY `payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standards_wise_live_telecast`
--
ALTER TABLE `standards_wise_live_telecast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_admission_no_unique` (`admission_no`),
  ADD UNIQUE KEY `students_uid_unique` (`uid`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_parent_id_foreign` (`parent_id`),
  ADD KEY `students_medium_id_foreign` (`medium_id`),
  ADD KEY `students_class_id_foreign` (`class_id`),
  ADD KEY `students_section_id_foreign` (`section_id`),
  ADD KEY `students_school_id_foreign` (`school_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fees_student_id_foreign` (`student_id`),
  ADD KEY `student_fees_master_category_id_foreign` (`master_category_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `sub_topics`
--
ALTER TABLE `sub_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_topics_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_pan_number_unique` (`pan_number`),
  ADD UNIQUE KEY `teachers_bank_account_number_unique` (`bank_account_number`),
  ADD UNIQUE KEY `teachers_epf_no_unique` (`epf_no`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_school_id_foreign` (`school_id`);

--
-- Indexes for table `teacher_leaves`
--
ALTER TABLE `teacher_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_leaves_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_leaves_school_id_foreign` (`school_id`);

--
-- Indexes for table `teacher_subject_assigns`
--
ALTER TABLE `teacher_subject_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subject_assigns_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_subject_assigns_subject_id_foreign` (`subject_id`),
  ADD KEY `teacher_subject_assigns_school_id_foreign` (`school_id`),
  ADD KEY `teacher_subject_assigns_medium_id_foreign` (`medium_id`),
  ADD KEY `teacher_subject_assigns_standard_id_foreign` (`standard_id`);

--
-- Indexes for table `teacher_timetables`
--
ALTER TABLE `teacher_timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_timetables_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_timetables_medium_id_foreign` (`medium_id`),
  ADD KEY `teacher_timetables_standard_id_foreign` (`standard_id`),
  ADD KEY `teacher_timetables_class_id_foreign` (`class_id`),
  ADD KEY `teacher_timetables_subject_id_foreign` (`subject_id`),
  ADD KEY `teacher_timetables_school_id_foreign` (`school_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes_teacher_assignments`
--
ALTER TABLE `classes_teacher_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `home_subjects`
--
ALTER TABLE `home_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `home_works`
--
ALTER TABLE `home_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_fee_categories`
--
ALTER TABLE `master_fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mediums`
--
ALTER TABLE `mediums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification_views`
--
ALTER TABLE `notification_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `standards_wise_live_telecast`
--
ALTER TABLE `standards_wise_live_telecast`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `sub_topics`
--
ALTER TABLE `sub_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `teacher_leaves`
--
ALTER TABLE `teacher_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_subject_assigns`
--
ALTER TABLE `teacher_subject_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `teacher_timetables`
--
ALTER TABLE `teacher_timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_teacher_assignments`
--
ALTER TABLE `classes_teacher_assignments`
  ADD CONSTRAINT `classes_teacher_assignments_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_teacher_assignments_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_teacher_assignments_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD CONSTRAINT `fee_categories_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fee_categories_master_category_id_foreign` FOREIGN KEY (`master_category_id`) REFERENCES `master_fee_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fee_categories_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_works`
--
ALTER TABLE `home_works`
  ADD CONSTRAINT `home_works_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_works_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_works_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_works_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_works_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_works_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_views`
--
ALTER TABLE `notification_views`
  ADD CONSTRAINT `notification_views_notice_id_foreign` FOREIGN KEY (`notice_id`) REFERENCES `notices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_master_category_id_foreign` FOREIGN KEY (`master_category_id`) REFERENCES `master_fee_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_leaves`
--
ALTER TABLE `teacher_leaves`
  ADD CONSTRAINT `teacher_leaves_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_leaves_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_subject_assigns`
--
ALTER TABLE `teacher_subject_assigns`
  ADD CONSTRAINT `teacher_subject_assigns_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subject_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subject_assigns_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subject_assigns_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subject_assigns_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_timetables`
--
ALTER TABLE `teacher_timetables`
  ADD CONSTRAINT `teacher_timetables_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_timetables_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_timetables_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_timetables_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_timetables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_timetables_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
