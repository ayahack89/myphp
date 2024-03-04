-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 06:40 AM
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
-- Database: `dbsocity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '12345678'),
(2, 'test', 'test@gmail.com', '87654321'),
(3, 'abcd', 'abcd@gmail.com', '789456123');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `anno_id` int(11) NOT NULL,
  `anno_name` varchar(255) NOT NULL,
  `anno_desc` varchar(2555) NOT NULL,
  `anno_date` date NOT NULL DEFAULT current_timestamp(),
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`anno_id`, `anno_name`, `anno_desc`, `anno_date`, `admin_name`) VALUES
(3, 'Good', 'How to be a good boy .', '2024-02-29', 'admin'),
(5, 'Welcome', 'Welcome every one. This is a new announcement.', '2024-03-01', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_threads`
--

CREATE TABLE `announcement_threads` (
  `anno_thread_id` int(11) NOT NULL,
  `anno_thread_name` varchar(255) NOT NULL,
  `anno_thread_desc` varchar(2555) NOT NULL,
  `anno_by` varchar(255) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_threads`
--

INSERT INTO `announcement_threads` (`anno_thread_id`, `anno_thread_name`, `anno_thread_desc`, `anno_by`, `announcement_id`, `last_update`) VALUES
(1, 'Add new topic ', 'The is a new topic. ', 'admin', 3, '2024-02-29'),
(3, 'Welcome', 'This is a welcome.', 'admin', 4, '2024-02-29'),
(4, 'Welcome ', 'Welcome all new faces', 'admin', 5, '2024-03-01'),
(9, '2nd .....', 'This is a second announcement thread.', 'admin', 5, '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `catagory_desc` varchar(2555) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_desc`, `created`, `created_by`, `count`) VALUES
(1, 'PHP', 'PHP stands for Hypertext Preprocessor. It\'s a general-purpose scripting language and interpreter that\'s free and open-source.', '2024-02-11', 'boy001', 0),
(5, 'Python', 'Python is a general-purpose, high-level programming language. It is used for web development, software development, data analysis, machine learning, and artificial intelligence.', '2024-02-11', '', 0),
(9, 'Programming', 'Programming is the process of writing code to tell a computer how to perform a task or solve a problem.', '2024-02-11', '', 0),
(10, 'Gamming', 'Gaming is the activity of playing electronic games, such as video games, board games, or card games, on a computer, console, mobile phone, or other medium. People who play video games often are called gamers', '2024-02-11', '', 0),
(11, 'Sigma -Male', 'A sigma male is a lone wolf who is respected for their abilities and down-to-earth confidence.', '2024-02-11', '', 0),
(12, 'Fubuki fan page', 'Fubuki is a tall, beautiful, and always very elegantly dressed woman. She is also known by her alias \"Blizzard of Hell\" as she is is a B-Class hero and the younger sister of the famed S-Class hero Tatsumaki, making her one-half of what is known as the Psychic Sisters in the world of the anime and manga, One Punch Man.', '2024-02-13', '', 0),
(13, 'Anime Fan Club', 'Anime is a Japanese animation style that is produced or influenced by it. It is the Japanese term for cartoon or animation where the Japanese use the word to describe all cartoons irrespective of the nation. However, outside Japan, anime denotes animation movies that come exclusively from Japan, distinguished by blazing graphics, energetic characters, and attractive themes such as sci-fi, romance, and supernatural forces. Therefore, consider this syllogism: all anime shows are cartoons, but not all cartoons are anime. ', '2024-02-13', '', 0),
(20, 'Big boobs', 'Anime is a Indian animation style that is produced or influenced by it. It is the Japanese term for cartoon or animation where the Japanese use the word to describe all cartoons irrespective of the nation. However, outside Japan, anime denotes animation movies that come exclusively from Japan, distinguished by blazing graphics, energetic characters, and attractive themes such as sci-fi, romance, and supernatural forces. Therefore, consider this syllogism: all anime shows are cartoons, but not all cartoons are anime. ', '2024-02-13', 'mrX', 0),
(30, 'test', 'This is pro test', '2024-03-01', 'mrX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(2555) NOT NULL,
  `thread_id` int(10) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_by` varchar(255) NOT NULL DEFAULT '0',
  `tag_someone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`, `tag_someone`) VALUES
(1, 'This is a comment.', 1, '2024-02-12 13:29:49', '23', ''),
(2, 'This is a second comment.', 1, '2024-02-12 14:24:07', '26', ''),
(3, 'For example, Apple has a volunteer forum that answers questions about its products, and QuickBooks has a forum for business owners and accountants', 1, '2024-02-12 14:30:47', '31', ''),
(4, 'A forum is an online discussion board where people can: \r\nAsk questions, Share experiences, Discuss topics, Create threads, Post messages, Respond to threads, Exchange ideas, Share information. \r\nForums can be used to create social connections, a sense of community, and interest groups. They can also be used to contact people with similar interests from around the world. \r\nForums can be used in a variety of areas, including: Technology, Computing, Programming, Internet, Communications. \r\nFor example, Apple has a volunteer forum that answers questions about its products, and QuickBooks has a forum for business owners and accountants.', 1, '2024-02-12 14:31:11', '23', ''),
(5, 'A forum is an online discussion board where people can: \r\nAsk questions, Share experiences, Discuss topics, Create threads, Post messages, Respond to threads, Exchange ideas, Share information. \r\nForums can be used to create social connections, a sense of community, and interest groups. They can also be used to contact people with similar interests from around the world. \r\nForums can be used in a variety of areas, including: Technology, Computing, Programming, Internet, Communications. \r\nFor example, Apple has a volunteer forum that answers questions about its products, and QuickBooks has a forum for business owners and accountants.', 26, '2024-02-12 14:31:47', '25', ''),
(6, 'This is a new comment', 1, '2024-02-12 18:59:24', '31', ''),
(8, 'I don\'t know body : )', 26, '2024-02-14 22:59:10', '32', ''),
(10, 'This is a comment.', 1, '2024-02-16 23:33:15', '31', ''),
(11, 'It is what it is!', 3, '2024-02-17 22:16:21', '31', ''),
(13, 'hfhf', 1, '2024-02-17 22:47:16', '31', ''),
(14, 'sexy', 1, '2024-02-17 23:12:21', '31', 'Anushree'),
(15, 'Hey, you busted! What is this father less behaviour.  ', 1, '2024-02-17 23:16:35', '32', 'boy001'),
(16, 'lol', 1, '2024-02-17 23:18:46', '32', 'omygod'),
(19, 'dudu', 1, '2024-02-21 20:31:43', '31', 'ed12'),
(21, 'dada', 1, '2024-02-21 20:32:10', '31', 'newuser'),
(36, 'Random comment', 56, '2024-02-27 23:42:34', '33', ''),
(39, 'Really', 35, '2024-03-02 00:29:31', '38', ''),
(40, 'Don\'t do this.', 35, '2024-03-02 00:30:46', '38', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `ip`, `date`) VALUES
(5, 'acstyle', 'hi', '127.0.0.1', '2024-03-03 20:19:21'),
(6, 'mrx', 'Hello', '192.168.1.2', '2024-03-03 20:30:16'),
(7, 'acstyle', 'I need help', '127.0.0.1', '2024-03-03 20:30:50'),
(8, 'acstyle', 'For what?', '127.0.0.1', '2024-03-03 20:31:01'),
(9, 'mrx', 'Are you mad you talk with your own self?', '192.168.1.2', '2024-03-03 20:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `hash` varchar(32) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`hash`, `ip`, `last_update`) VALUES
('f14f3123c7b9688dbf83c1f2d5e4842c', '127.0.0.1', '2024-03-03 22:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `comments` text NOT NULL,
  `ratings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user`, `comments`, `ratings`) VALUES
(6, 'andrew@6', 'This is a great website.', '★★★★★'),
(7, 'andrew@6', 'This is a great website.', '★★★★★'),
(8, 'andrew@6', 'This website is cool. Now I can talk with my crush anonymously! ', '★★★★★');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_name` varchar(255) NOT NULL,
  `thread_desc` varchar(2555) NOT NULL,
  `thread_catagory_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp(),
  `uploaded_image` varchar(255) NOT NULL,
  `thread_created_by` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `url` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_name`, `thread_desc`, `thread_catagory_id`, `thread_user_id`, `thread_time`, `uploaded_image`, `thread_created_by`, `count`, `url`) VALUES
(1, 'How to install the Xampp server in Windows 11?', 'XAMPP is a free, open-source, and cross-platform web server solution package. XAMPP stands for Cross-Platform, Apache, MySQL, PHP, and Perl. It\'s mainly used for testing web applications on a local host webserver.', 1, 31, '2024-02-11 23:50:51', '', 'boy001', 0, ''),
(2, 'What is .jsp?', 'JSP stands for JavaServer Pages. It\'s a server-side programming technology that helps developers create dynamic web applications. JSP is part of Java Enterprise Edition (Java EE).', 1, 23, '2024-02-12 00:13:07', '', '', 0, ''),
(3, 'What is <?php echo htmlentities($_POST[\'PHP_SELF\']); ?> ?', 'Here\'s some information about `echo htmlentities($_SERVER[\'PHP_SELF\']); ?>`:\r\n$_SERVER[\'PHP_SELF\'] is a global variable that returns the filename of the currently executing script.\r\nhtmlentities() encodes HTML entities.\r\nThe htmlentities() function has a constant named ENT_SUBSTITUTE that replaces invalid code unit sequences with a Unicode Replacement Character.\r\nThe echo statement in PHP shows output and does not return any value. It can pass multiple strings split by commas.\r\nIf the user tries to exploit the PHP_SELF variable, the attempt will fail.\r\nThe $_SERVER[\'PHP_SELF\'] sends the submitted form data to the same page, instead of jumping on a different page. This way, the user will get error messages on the same page as the form.\r\nTo want the form to submit to the page that you are currently on, use an empty action attribute.', 1, 29, '2024-02-12 12:32:24', '', '', 0, ''),
(4, 'What is <?php echo htmlentities($_POST[\'PHP_SELF\']); ?> ?', 'This is another test discussion.', 1, 25, '2024-02-12 12:32:56', '', '', 0, ''),
(5, 'What is php ?', 'Here\'s some information about `echo htmlentities($_SERVER[\'PHP_SELF\']); ?>`:\r\n$_SERVER[\'PHP_SELF\'] is a global variable that returns the filename of the currently executing script.\r\nhtmlentities() encodes HTML entities.\r\nThe htmlentities() function has a constant named ENT_SUBSTITUTE that replaces invalid code unit sequences with a Unicode Replacement Character.\r\nThe echo statement in PHP shows output and does not return any value. It can pass multiple strings split by commas.\r\nIf the user tries to exploit the PHP_SELF variable, the attempt will fail.\r\nThe $_SERVER[\'PHP_SELF\'] sends the submitted form data to the same page, instead of jumping on a different page. This way, the user will get error ', 1, 26, '2024-02-12 12:35:52', '', '', 0, ''),
(6, 'How session_start(); work?', 'session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie. When session_start() is called or when a session auto starts, PHP will call the open and read session save handlers.', 1, 25, '2024-02-12 12:37:02', '', '', 0, ''),
(26, 'How to learn Python?', 'A forum is an online discussion board where people can: \r\nAsk questions, Share experiences, Discuss topics, Create threads, Post messages, Respond to threads, Exchange ideas, Share information. \r\nForums can be used to create social connections, a sense of community, and interest groups. They can also be used to contact people with similar interests from around the world. \r\nForums can be used in a variety of areas, including: Technology, Computing, Programming, Internet, Communications. \r\nFor example, Apple has a volunteer forum that answers questions about its products, and QuickBooks has a forum for business owners and accountants.', 5, 31, '2024-02-12 14:31:37', '', 'boy001', 0, ''),
(31, 'How to create a loging from using php?', 'In today\'s digital age, the importance of online security cannot be ignored. As a result, creating a login form is an essential feature for any website that requires user authentication. The following is a guide on creating a login form in PHP. But first, let us discuss the intricacies of creating a login form in PHP, including some of the errors that might occur during the process.\r\n\r\nA login form is an essential website feature requiring user authentication. It allows users to access their accounts by entering their username and password. It is ideal for creating login forms as it provides various security features and is easy to use. While many cyber security threats are posing a danger, it helps a lot to add this feature to your website.\r\n\r\nPHP is a server-side scripting programming language, and MySQL is an open-source relational database management system. These two frameworks, when used together, are capable of providing highly unique solutions, like creating a login form. \r\n\r\n', 1, 31, '2024-02-12 18:30:58', '', 'boy001', 0, ''),
(34, 'Fubuki is very sexy', 'Sexy Fubuki', 1, 31, '2024-02-13 00:11:06', '65ca6642e92086.83315854_fubuki.png', 'boy001', 0, ''),
(35, 'I like FUBUKI!MOMMOY', 'Hot Mommy Fubuki💦ALLL', 5, 31, '2024-02-13 00:20:14', '65cf7f5c63eec4.22405353_GIII.gif', 'boy001', 0, ''),
(36, 'How I look like ', 'My name is mrx I like to hack women', 5, 32, '2024-02-13 00:52:06', '65ca6fdee28729.02688655_IMG-20240210-WA0067.jpg', '', 0, ''),
(48, 'Fubuki Mommy', '💦💦💦💦', 1, 32, '2024-02-13 17:12:28', '65cb55a461cd45.78489833_GIII.gif', '', 0, ''),
(52, 'test', 'This is a test.', 1, 32, '2024-02-13 20:49:30', '', '', 0, ''),
(53, 'test', 'this is a test thread', 1, 32, '2024-02-13 20:50:15', '65cb88af80cc23.82101750_photo-1498050108023-c5249f4df085.jpg', '', 0, ''),
(54, 'Big text test', 'This is a big test text.', 1, 32, '2024-02-13 20:50:59', '', '', 0, ''),
(55, 'test add user name in threadssss', 'lamooooooooooooooooooooo', 1, 32, '2024-02-13 21:48:40', '', 'mrX', 0, ''),
(56, 'Link', 'This is a Link', 1, 33, '2024-03-01 23:01:45', '', 'mrx', 0, 'https://chat.openai.com/c/522415de-36d2-4b42-bf0b-076c5de3bcc9'),
(57, 'Link', 'This is a LINK, We call it url.', 1, 38, '2024-03-01 23:04:56', '', 'mrX', 0, 'https://vflixweb.netlify.app/'),
(58, 'test', 'This is a link and image test.', 1, 38, '2024-03-01 23:05:42', '65e211eef0cf99.48470477_avatars-000157159107-80sner-t500x500.jpg', 'mrX', 0, 'https://aygcoo.github.io/VFLix.web/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `repassword` varchar(225) NOT NULL,
  `datetime` date NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(9999) NOT NULL DEFAULT 'demoprofile.png',
  `about` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `personalcontact` varchar(50) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `cake_day` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `repassword`, `datetime`, `profile_pic`, `about`, `gender`, `country`, `personalcontact`, `verification_code`, `is_verified`, `twitter`, `facebook`, `instagram`, `github`, `cake_day`) VALUES
(25, 'Beauty', '$2y$10$A7Ko5pj4eU4j46Y4.SZRluniVBLm4brhqttc1GutueCLZZf5t0VjS', '$2y$10$R5BwlF1SAR7D9GTmOGcCm.AvpD.gedo1G65kekLVjUE8I0ZBW9Vxu', '2024-01-12', 'Beauty65a1768a72a536.29828247.jpeg', 'My name is Buety.', 'female', 'Bangladesh', '3654789123', '', 0, '', '', '', '', ''),
(26, 'omygod', '$2y$10$HZMxj2L8dEJqvJfJXslPluMzbRGOQ2Zob5IvXwIenH7f.NVIoivSe', '$2y$10$cHsoyrjRq7SgzNXVbc/.6ub29JUrhX1XzCj9Rj5yw9Irp7/M/nLZK', '2024-01-16', 'omygod65a67031821ee6.23484693.png', 'O my God!', 'male', 'Australia', 'abcd@hotmail.com', '', 0, '', '', '', '', ''),
(27, 'Udo', '$2y$10$lsvZ5IVaOckIX7mGRE4Eiey43258rBZQKGTs1R0YNAP.4to4xj1Lq', '$2y$10$3d7A.aDQNVmjX5j6KG9YWOMGP1bIf0a5oKqhJPGsZ5CnOYfGa345y', '2024-02-02', 'Udo65bbe41134d002.52475065.jpg', 'I am a', 'other', 'Austria', '785469231', '', 0, '', '', '', '', ''),
(29, 'andrew@6', '$2y$10$qXVGHFsO9EcHALvCKzheUe8sjoVrEYhG3oYcnmfbilctV/elh.5Ei', '$2y$10$TrtTsMvix8/1ynADEHZQCeMgqTENmQ8aptGWDaTgmqRh3ZPuOjhFy', '2024-02-07', 'profile_image.jpg', 'My name is Andrew Danet and I am a Web developer.', 'male', 'India', 'andrewdanet66@gmail.com', '', 0, '', '', '', '', ''),
(30, 'Anushree', '$2y$10$mlgOcVU.vv7aBslsE1dzVenH6ebpDlaDRFSWOWK1.5zncrTbBpEGm', '$2y$10$PSWcfknVl8gMPQDkhigai.5l8RC/be8TmhX4.TfQaa38nhHEtAmbK', '2024-02-11', 'Anushree65c7c8845ec0b8.36614608.jpg', 'I am a Cut and chappri girl', 'female', 'India', 'randianu@gmail.com', '', 0, '', '', '', '', ''),
(31, 'boy001', '$2y$10$53Tk0KQSLN7LHTcRr8OaUOTDHsplPkFIiQWckszbtL9WlcLtAEBp2', '$2y$10$Jyjkd77w1zduKp7gR4p6xOa2vXqBhK5.gSdw7rovsxdpb9UzRVrhi', '2024-02-12', 'boy00165c9e4137a10e5.04183510.jpg', 'I am a Student and I like to code in PHP.', 'male', 'France', '8556963885', '', 0, '', '', '', '', ''),
(33, 'acstyle', '$2y$10$7giaiEtdDFYI6YnS9mYtK.3mcCFkmCqfeh8I6RDbVGYkKg6bhxJlW', '$2y$10$fK1kUWV4Kd5xfQn6Q51c5e0e3ijfYQv1qq8aljrSy1yJJkT3bmMUa', '2024-02-24', 'acstyle65d8efbf302676.87540012.jpg', 'Hello, I\'m Ayanabha Chatterjee, a passionate web developer with a strong interest in web technologies. ', 'male', 'India', '8556963885', '', 0, 'https://twitter.com/AYANABHACH08', 'https://www.facebook.com/', 'https://www.instagram.com/a_vengeanc.e', 'https://github.com/aYgCOO', ''),
(38, 'mrX', '$2y$10$vJe85ykA7k1Ztq0og36jWu2KJNVF7Dw72C3ISvoMQSCFz.de5QiL2', '$2y$10$nR1HsMeak5wMsKsJeENYc.QpJoyvqkKtGSuzyS2iiJYPqCGQO.SFm', '2024-02-27', 'mrX65de1a57213347.99837106.jpg', 'I am mrx', 'male', 'Brazil', '8556963885', '', 0, 'https://twitter.com/AYANABHACH08', 'https://www.facebook.com/Mrx', 'https://www.instagram.com/a_vengeance', 'https://github.com/aYgCOO', '2001-02-06'),
(41, 'dopboy', '$2y$10$sd178D3okCc9c2MLpQEQA.Hj3X7Y6oO.DXQmvLaRh45LkW4Jnbm0a', '$2y$10$E6JWYrrxTCQjtEhCAveb4uVPeHtF0loatUuapdvqd9AFFgJSpcpES', '2024-03-01', 'dopboy65e1be68326091.29936965.jpg', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://github.com/', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`anno_id`);

--
-- Indexes for table `announcement_threads`
--
ALTER TABLE `announcement_threads`
  ADD PRIMARY KEY (`anno_thread_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`hash`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `anno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcement_threads`
--
ALTER TABLE `announcement_threads`
  MODIFY `anno_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
