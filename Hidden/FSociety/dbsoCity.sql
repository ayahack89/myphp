-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2024 at 08:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsoCity`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtopics`
--

CREATE TABLE `addtopics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(50) NOT NULL,
  `topic_create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `topic_desc` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `catagories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addtopics`
--

INSERT INTO `addtopics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_desc`, `username`, `catagories`) VALUES
(1, 'Hacking', '2023-12-04 13:56:17', 'I am a hacker.', 'mrobot', ''),
(20, 'Java', '2023-12-04 20:58:47', 'Java is a programming language.', 'mrx001', ''),
(21, 'Python', '2023-12-04 21:06:43', 'Python is a programming language.', 'sabu', ''),
(22, 'PHP', '2023-12-04 22:11:30', 'PHP is a server site scripting language', 'anonymus', ''),
(23, 'Bitches', '2023-12-20 10:05:23', 'Girls are bitches\r\n', 'xyz', ''),
(25, 'Dogs', '2023-12-20 10:11:16', 'Dogs are cute.', 'xyz', ''),
(28, 'Baby', '2023-12-20 10:18:52', 'Crying babyes', 'xyz', ''),
(29, 'Crazy', '2023-12-20 14:18:14', 'I am crazy.', 'xyz', ''),
(30, 'This is a Guint text', '2023-12-25 23:04:48', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem Assumenda tenetur saepe molestias, iure, corporis facilis blanditiis repudiandae nostrum, sint reprehenderit dolorum veniam non tempora dicta suscipit ad ullam excepturi doloribus?', 'homelander', ''),
(31, 'This is a Guint text', '2023-12-25 23:10:14', 'Rolem ipsum dolor sit amet consectetur adipisicing elit.Lorem Assumenda tenetur saepe molestias, iure, corporis facilis blanditiis repudiandae nostrum, sint reprehenderit dolorum veniam non tempora dicta suscipit ad ullam excepturi doloribus?', 'homelander', ''),
(32, 'sort ', '2023-12-25 23:27:25', 'This is sort message for everyone.', 'homelander', ''),
(33, 'This is another sort message', '2023-12-25 23:29:33', 'Anonymity is human rights.', 'homelander', ''),
(34, 'new', '2023-12-25 23:35:42', 'Happy new year', 'homelander', ''),
(35, 'Java Script', '2024-01-11 16:34:46', 'I like java script.', 'edge', 'Programming'),
(36, 'PHP for backend', '2024-01-11 17:46:58', 'PHP is a serverside scripting language.', 'edge', 'Programming'),
(37, 'C#', '2024-01-11 17:50:51', 'C# is also used in backend.', 'edge', 'Programming'),
(38, 'C++', '2024-01-11 17:52:33', 'C++ is a Object Oriended programming language.', 'edge', 'Programming'),
(39, 'C++', '2024-01-11 17:53:56', 'C++ is a Object Oriended programming language.', 'edge', 'Programming'),
(40, 'C++', '2024-01-11 17:56:19', 'C++ is a Object Oriended programming language.', 'edge', 'Programming'),
(41, 'hjsdhhjdhjdhjsdass', '2024-01-11 17:56:34', 'dsdnskcnknxjkcnljiosjdjd', 'edge', 'Crazy'),
(42, 'hjsdhhjdhjdhjsdass', '2024-01-11 17:58:07', 'dsdnskcnknxjkcnljiosjdjd', 'edge', 'Crazy'),
(43, 'hjsdhhjdhjdhjsdass', '2024-01-11 17:58:09', 'dsdnskcnknxjkcnljiosjdjd', 'edge', 'Crazy'),
(44, 'hjsdhhjdhjdhjsdass', '2024-01-11 17:58:11', 'dsdnskcnknxjkcnljiosjdjd', 'edge', 'Crazy'),
(45, 'jshdsknscdbjhajdpifj;shfksdj', '2024-01-11 17:58:23', 'ncbdcbkjdshcjkhcjkncdbsdsbdm', 'edge', 'Crazy'),
(46, 'jshdsknscdbjhajdpifj;shfksdj', '2024-01-11 17:59:09', 'ncbdcbkjdshcjkhcjkncdbsdsbdm', 'edge', 'Crazy'),
(47, '4654649879165', '2024-01-11 18:01:27', '546464545644489kdsjdsj', 'edge', 'Others'),
(48, 'Java', '2024-01-11 18:08:43', 'Java is a powerfull language.', 'edge', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `repassword`) VALUES
(1, 'admin', 'admin@gmail.com', '12345678', '12345678'),
(2, 'test', 'test@gmail.com', '87654321', '87654321'),
(3, 'abcd', 'abcd@gmail.com', '789456123', '789456123');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `roomname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `time`, `roomname`) VALUES
(1, 'Hello Guys!', '2023-11-12 09:55:17', ''),
(2, 'OMG!', '2023-11-12 10:03:58', ''),
(8, 'bitch!', '2023-11-12 10:09:33', ''),
(15, 'This is our anonymus chat room.', '2023-11-12 10:18:45', ''),
(25, 'This is our anonymus chat room.', '2023-11-12 13:05:05', ''),
(26, 'ono babay.', '2023-11-12 13:05:26', ''),
(27, 'ono babay.', '2023-11-12 13:05:40', ''),
(28, 'Silk Road', '2023-11-12 13:13:27', ''),
(29, 'I like Silk Road.', '2023-11-12 14:37:08', ''),
(30, 'Ok! now buy somthing on Silk Road.', '2023-11-12 14:39:22', ''),
(31, 'This is a new message.', '2023-11-12 16:10:01', 'luci'),
(32, 'ono babay.there is a glitch', '2023-11-12 18:18:06', ''),
(33, 'This is our anonymus chat room. Let buy some drugs.', '2023-11-12 19:02:58', ''),
(34, 'Silk Road', '2023-11-12 19:03:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `onionsites`
--

CREATE TABLE `onionsites` (
  `id` int(11) NOT NULL,
  `onionsitename` varchar(225) NOT NULL,
  `onionsitelink` text NOT NULL,
  `uploadetime` datetime NOT NULL DEFAULT current_timestamp(),
  `catagory` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onionsites`
--

INSERT INTO `onionsites` (`id`, `onionsitename`, `onionsitelink`, `uploadetime`, `catagory`) VALUES
(1, 'test', 'hdjksahdhluihffbcbheihohdhsicnnuiuefckjjsdjkldsldjjfj.onion', '2023-12-25 16:44:45', 'hacking'),
(3, 'Guns', 'hshdjhdfhfjhdkvbbdkhdhfhdkfhhfhhjshfdjhsgfghevvh.onion', '2023-12-25 16:57:22', 'Guns'),
(4, 'Banned Books', 'djklsjdjsdljsldjlsjcncnkncjfiouriourioueojjkkjdhfdkfhldjsljdlmnmccxncmncv.onion', '2023-12-25 17:04:20', 'Banned_Books'),
(5, 'abcd', 'djkdhksahdhdhjbcmbcbxmzbxcbdhsjdhkhdjshdhskhcbcbc.onion', '2023-12-25 18:17:41', 'Drugs'),
(6, 'books', 'ldjkshdjcbxmbcbmxbcyieuiwyiueiujdhkjhjcbnbcfjhjkdfhjkdhf.onion', '2023-12-25 18:18:25', 'Banned_Books'),
(7, 'Silk Road', 'silkdhshdsdbcuiudadhd.onion', '2023-12-25 18:20:39', 'Drugs'),
(8, 'Silk Road 4', 'http://silkroad22gtemddxbbfxe57xmb4mxgcwnbwbvarpbghsseluxwdnvyd.onion/', '2023-12-26 13:37:11', 'Drugs'),
(9, 'Drugs Ban', 'http://dbayuapytcowfz2nnfik3jayno4njibl45t77r3eartihtq6igtaqtqd.onion/', '2023-12-26 13:37:54', 'Drugs'),
(10, 'E-Shopper', 'http://uvrovegrobfnf24qep37pcqoj6hfeggc7n3k5nqeu4ti55gefhy6wtqd.onion/', '2023-12-26 13:38:36', 'Drugs'),
(11, 'Tom & Jerry 2021', 'http://trnxl6nlv2dqgn4vtkc6hikxig3odi7gisl3d5mj4fws7i6i35ykt4id.onion/', '2023-12-26 13:39:13', 'Drugs'),
(12, 'Vanilla Smart Shop', 'http://ats7wkrceeblaihmqwtiry46zsp4gqxx6b6oi35dqulz4wzr4cjpu6id.onion/product-category/drugs/', '2023-12-26 13:39:51', 'Drugs'),
(13, 'fake_test', 'hshdjhdfhfjhdkvbbdkhdhfhdkfhhfhhjshfdjhsgfghevvh.onion', '2023-12-27 00:27:54', 'Guns');

-- --------------------------------------------------------

--
-- Table structure for table `replytopost`
--

CREATE TABLE `replytopost` (
  `id` int(11) NOT NULL,
  `post_create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `post_comment` text NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replytopost`
--

INSERT INTO `replytopost` (`id`, `post_create_time`, `post_comment`, `username`) VALUES
(1, '2023-12-20 00:00:00', 'Hi ! this is a test reply', 'xyz'),
(2, '2023-12-20 00:00:00', 'Hi this is the second test comment.', 'xyz'),
(3, '2023-12-20 00:00:00', 'Hi baby', 'xyz'),
(4, '2023-12-20 00:00:00', 'Once again hi baby', 'xyz'),
(5, '2023-12-20 00:00:00', 'Loli baby', 'xyz'),
(7, '2023-12-22 00:00:00', 'No luck to fuck.', 'fuckboy'),
(8, '2023-12-22 00:00:00', 'jckdckkkdvbbv', 'dopboy19'),
(9, '2023-12-22 00:00:00', 'hfkhbvmbvjDFOPUWEJVKL;SNFKSKVKJHE', 'dopboy19'),
(10, '2023-12-22 00:00:00', 'hcsdjbfFIGHFJAJCBJSCJGSC', 'dopboy19'),
(11, '2023-12-22 00:00:00', 'DHGKHKVjkkjkk554545V', 'dopboy19'),
(12, '2023-12-22 00:00:00', 'O tai', 'noOne'),
(13, '2023-12-22 00:00:00', 'I like PHP', 'noOne'),
(14, '2023-12-22 00:00:00', 'I want to hack sonthing', 'noOne'),
(15, '2023-12-22 00:00:00', 'I likehacking', 'noOne'),
(16, '2023-12-22 23:53:51', 'I like to write code in Python, Python is my favorite language, I build many projects using python. ', 'dopboy19'),
(17, '2024-01-09 00:27:51', 'Java is a object oriented programming language.', 'homelander'),
(18, '2024-01-11 18:04:31', 'are you fucking crazy?', 'edge'),
(19, '2024-01-11 18:05:37', 'hdkhskjhfkdhfkjdsfshfjhjhjdfjhfdjjdfsjhdf,vc,v.c,v.c,v.mc,.mv,.mcmvjljfjfjsfioeuriourououufhfkjhfkjhfhhkj', 'edge'),
(20, '2024-01-12 01:45:01', 'hjhjhdjhj', 'edge'),
(21, '2024-01-12 01:45:21', 'hjhjhdjhj', 'edge'),
(22, '2024-01-12 01:45:27', 'hjhjhdjhj', 'edge'),
(23, '2024-01-12 01:45:32', 'hjhjhdjhj', 'edge'),
(24, '2024-01-12 01:46:00', 'hjhjhdjhj', 'edge'),
(25, '2024-01-12 01:46:05', 'bcnxmcbxbcmnz', 'edge'),
(26, '2024-01-12 01:46:16', 'bcnxmcbxbcmnz', 'edge'),
(27, '2024-01-12 01:46:43', 'bcnxmcbxbcmnz', 'edge'),
(28, '2024-01-12 01:48:43', 'bcnxmcbxbcmnz', 'edge'),
(29, '2024-01-12 01:48:47', 'bcnxmcbxbcmnz', 'edge'),
(30, '2024-01-12 01:49:05', 'bcnxmcbxbcmnz', 'edge'),
(31, '2024-01-12 01:50:46', 'bcnxmcbxbcmnz', 'edge'),
(32, '2024-01-12 01:55:58', 'abcdefg', 'edge'),
(33, '2024-01-12 02:02:40', 'fucku', 'edge'),
(34, '2024-01-12 02:11:19', 'ksdhjk', 'edge');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user`, `comments`) VALUES
(4, 'anonymus2', 'test comment: Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti doloribus atque, nam repudiandae deserunt officiis velit voluptatem expedita! At minus commodi, quos voluptatum dolor esse rerum quis tempora repudiandae laborum!'),
(5, '@12gh', 'test comment for your create and read function.');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `roomname`, `time`) VALUES
(1, 'test', '2023-11-12 07:34:37'),
(2, 'test', '2023-11-12 07:38:42'),
(10, 'test', '2023-11-12 09:12:41'),
(11, 'test', '2023-11-12 09:21:18'),
(12, 'test', '2023-11-12 09:33:33'),
(13, 'test', '2023-11-12 10:09:20'),
(14, 'test', '2023-11-12 13:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `repassword` varchar(225) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `points` int(11) NOT NULL DEFAULT 0,
  `posts` int(11) NOT NULL DEFAULT 0,
  `topics` int(11) NOT NULL DEFAULT 0,
  `profile_pic` varchar(9999) NOT NULL DEFAULT 'demoprofile.png',
  `about` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `personalcontact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `repassword`, `datetime`, `points`, `posts`, `topics`, `profile_pic`, `about`, `gender`, `country`, `personalcontact`) VALUES
(1, 'abcd', '12345678', '', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(2, 'anonymus', '1234554321', '1234554321', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(4, 'mrX', 'mrx9898', 'mrx9898', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(10, 'abcd', '$2y$10$s3LG1OoxrPaHJC2CTGd4lugqa2E08SoldYPs/AzgtZ8uCYlw9vm1y', '$2y$10$00G.HyJmFsTFCbcRuv60Du2YI1HG9zVZDjAbSOR9gyCc.uVJzyfoO', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(11, 'xyz', '$2y$10$tzSjt8JnaV9UaML/ye2FuurWI.Ajo3VNaKq6y7lqguCM6rriqicPC', '$2y$10$rNu2fwbQNN0VKxjO8YXtceWqq6UjHjgtl0AG5BpydRhDTfmViRIke', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(12, 'dopboy19', '$2y$10$rasE.LUq4cEOSzB.76lv1e1IV1oWFZEDHflUV.n/dSKu7QxXXVi5i', '$2y$10$1FILg9GmP8HKqqvQoSJe/u2gWJW6cG4yKjF0GIi9RF3P9I3f/0TDO', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(13, 'noOne', '$2y$10$tV9.N3a4toW2vb5d5n/cLe3711NA0z0YSL2HI95DYVnzuw0M0cu2C', '$2y$10$LUig0tjzwl08u7wk8vGxm.JyopqsTpXGw1xuw/cP.XdwAZQ2tQFUe', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(14, 'Batman', '$2y$10$ovK2plTlKYQPvxMdyaSn0Ol70tG7vAQ4Qx2SxFCsuLxBw6ewPU7Yq', '$2y$10$ZF7gTEZeH49lsduwL1QifOlUrvd6ix61sZMovIGIBSnpFlNIDs0ai', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(15, 'homelander', '$2y$10$jal88L0ejeW7ZOzpTUcgte/.Hxb27kClR.9kCU2EYIT/RH00UQpcy', '$2y$10$qRTCLY/rAw7.NqOPNKfTYucuoeh/UVMVFBcytR5MnjK1SxyiZ3Vae', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(16, 'edge', '$2y$10$Sb/UC/JZao.K6Iesl7GpluO3D0pv9LmO.zlrC.w3FyVwrR43cnMai', '$2y$10$RNKLVeIzOztKTrsT2l03A.IU.KwkxJPNwx5GVQD8CtnWFQwzwaTOW', '2024-01-12 10:49:53', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(17, 'edge2', '$2y$10$rHB1pet3hW8Ibp2.1Akm0OAfUqW7nypdcxEHS043gVJAg0kRPgMd.', '$2y$10$ZM.f5p8Rv3Kj2gZsSZgsZOpElUj3hYGgZoiOCTrs0I5bsiSbUjT5.', '2024-01-12 19:29:49', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(18, 'testuser2', '$2y$10$K8QzP2xJ1Zzod1Ekb61q/ukgRZf6aEApMPftPkJWMXt8w5vopmmwa', '$2y$10$kSdDx5744GL1kXSD/yu3DO6de2Nfzbcy5NFV66D5idrQk.RBz9JPm', '2024-01-12 19:31:10', 0, 0, 0, 'img/demoprofile.png', '', '', '', ''),
(19, 'testuser33', '$2y$10$bNBIosMyrbftKItj1fFGmec9/KzEiB5DnLuTDOWG3MWWXJVMdSs.e', '$2y$10$x/ieT1tkYYL8KzcOgoqT7eUf/IriomHOc63gJ9cFwRkGSB8q9iM7C', '2024-01-12 20:35:50', 0, 0, 0, 'images.jpeg', 'I am a hacker : )', 'male', 'Australia', '9876543 call me daddy'),
(20, 'hacker1', '$2y$10$vyOXsgWRn3HCPB.DSOHVuu9wP02q5Ud9KMLF8a8He.05xgZyHWLey', '$2y$10$EquGDRWHzddYmA9anEIHN.V.9rLgIGstk7WkeTRcftNuKIY04v1TK', '2024-01-12 20:41:20', 0, 0, 0, 'images.jpeg', 'I am a notorious hacker. ', 'male', 'Aruba', 'no luck '),
(21, 'hacker2', '$2y$10$PsxfRXpD2ZQv544l8OOD3.dLXcnto7kv0pVweHHQJ92E1JsEDkPgi', '$2y$10$hCfOTCIZT7ol/zDJIdNAVutjysAdi9GhRGyJmddZABARrOhnJpGL6', '2024-01-12 20:43:19', 0, 0, 0, 'logo.jpg', 'I am a gay but I can hack your dick!', 'non-binary', 'Austria', '9876543 call me baby'),
(22, 'pedo2', '$2y$10$7tdHBRfJwvvxPRRKggwX5ugYEqbTF1HSvkbqT0qni5pZzsJKHNiKa', '$2y$10$023iUfLVNZsT.aN8iMEHJuJZxXHgkFes8CoWnpMSRU0UMHmMbGaOe', '2024-01-12 21:12:57', 0, 0, 0, 'logo.jpg', 'I am a pedofelar.', 'Prefer not to answer', 'Afghanistan', 'abcd@abcd,com'),
(23, 'ed12', '$2y$10$ug13VOBkfrhMBVhqx3oh3u.7WPBLsIoTYvkZTpvd.eXZl4ctMNJz2', '$2y$10$t8DgDlVScGfj0FLQlMH/ZOZNSAVVSVpYUca/hIijiyCisOpOtR3Cm', '2024-01-12 22:46:27', 0, 0, 0, 'ed1265a173eb25bd77.31998029.jpeg', '', 'non-binary', '#', ''),
(24, 'newuser', '$2y$10$aAwSpHQPuzWacp8RctBSVer3EdpUHya/tkEYXthsIJjsaq/XFDEPW', '$2y$10$WssPKOVNRpjqeEYQkixWYeWgUk4RbQ2qOMjONgXWfHCx.IoI9UNF2', '2024-01-12 22:54:43', 0, 0, 0, 'newuser65a175db67d5b7.05589329.jpeg', 'I am a Korean girl.', 'female', 'Korea', 'no contact'),
(25, 'Beauty', '$2y$10$A7Ko5pj4eU4j46Y4.SZRluniVBLm4brhqttc1GutueCLZZf5t0VjS', '$2y$10$R5BwlF1SAR7D9GTmOGcCm.AvpD.gedo1G65kekLVjUE8I0ZBW9Vxu', '2024-01-12 22:57:38', 0, 0, 0, 'Beauty65a1768a72a536.29828247.jpeg', 'My name is Buety.', 'female', 'Bangladesh', '3654789123'),
(26, 'omygod', '$2y$10$HZMxj2L8dEJqvJfJXslPluMzbRGOQ2Zob5IvXwIenH7f.NVIoivSe', '$2y$10$cHsoyrjRq7SgzNXVbc/.6ub29JUrhX1XzCj9Rj5yw9Irp7/M/nLZK', '2024-01-16 17:31:53', 0, 0, 0, 'omygod65a67031821ee6.23484693.png', 'O my God!', 'male', 'Australia', 'abcd@hotmail.com'),
(27, 'Udo', '$2y$10$lsvZ5IVaOckIX7mGRE4Eiey43258rBZQKGTs1R0YNAP.4to4xj1Lq', '$2y$10$3d7A.aDQNVmjX5j6KG9YWOMGP1bIf0a5oKqhJPGsZ5CnOYfGa345y', '2024-02-02 00:03:53', 0, 0, 0, 'Udo65bbe41134d002.52475065.jpg', 'I am a', 'other', 'Austria', '785469231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtopics`
--
ALTER TABLE `addtopics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onionsites`
--
ALTER TABLE `onionsites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replytopost`
--
ALTER TABLE `replytopost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtopics`
--
ALTER TABLE `addtopics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `onionsites`
--
ALTER TABLE `onionsites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replytopost`
--
ALTER TABLE `replytopost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
