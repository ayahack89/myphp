-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agguoradb`
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
(1, 'Agguora', 'alpha001@agguora.site', 'alpha?02');

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
(7, 'Welcome ðŸ˜Š', 'A warm welcome to all new members. Check out a special welcome message by tapping here.', '2024-03-04', 'alpha'),
(8, 'Urgentâ€¼ï¸ ', 'ðŸ”´ URGENT MESSAGE: Please don\'t ignore, tap to view.', '2024-03-04', 'alpha'),
(9, 'Updates ðŸš€', 'Don\'t forget! To check the update thread. Tap to view.', '2024-03-08', 'alpha');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_threads`
--

CREATE TABLE `announcement_threads` (
  `anno_thread_id` int(11) NOT NULL,
  `anno_thread_name` varchar(255) NOT NULL,
  `anno_thread_desc` varchar(2555) NOT NULL,
  `anno_by` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_threads`
--

INSERT INTO `announcement_threads` (`anno_thread_id`, `anno_thread_name`, `anno_thread_desc`, `anno_by`, `announcement_id`, `last_update`) VALUES
(11, 'Welcome Everyone ðŸ˜„', 'Hello everyone,\r\n\r\nMy name is Alpha and I am part of a private community that values privacy and mental health. We welcome you to our community and encourage you to register for an account using our secure login system. To remain anonymous, you may also use VPNs.\r\n\r\nWe value freedom of speech as a basic human right but we do ask that you follow our guidelines, read our terms and conditions, and review our privacy policy for more clarity. We strive to maintain transparency with our users.\r\n\r\nAs an active member of our community, you can earn karma points and explore all that we have to offer. Thank you for joining us and we look forward to seeing you around!\r\n\r\nBest,\r\nAlpha', 1, 7, '2024-03-04'),
(12, 'Urgent message for all new users.', 'Dear new users,\r\n\r\nI just wanted to let you know that Agguora is still under development. If you experience any technical issues or glitches on the platform, please don\'t hesitate to give your honest feedback. If you face any serious issues such as problems resetting your account password, login issues, or if your account has been hacked, please email me immediately at alpha001@agguora.site.\r\n\r\nPlease don\'t panic or feel awkward reaching out to me. As the admin, I am here to support you whenever you need help. Thank you for taking the time to read this message. Your cooperation is greatly appreciated.\r\n\r\nBest regards,\r\n\r\nAlpha', 1, 8, '2024-03-04'),
(13, 'Live Chat is under development ', 'I apologize as an admin that Agguora is currently incomplete. Please encourage us while we work on developing our live chat session, which will be released as soon as possible.', 1, 8, '2024-03-04'),
(14, 'Congratulations ', 'Our top 10 founding members deserve ðŸŽ‰congratulations. As the administrator, I am grateful for their support.', 1, 7, '2024-03-06'),
(15, 'Coming soon ', 'Exciting news! Agguora is continuously evolving with daily updates, paving the way for something truly groundbreaking. Stay tuned for a major update on the horizon â€“ it\'s going to be worth the wait!', 1, 9, '2024-03-08'),
(16, 'Check some new updates', 'Hey everyone! I am thrilled to announce that Agguora is growing day by day. So, don\'t forget to check out our latest updates ðŸ˜Š', 1, 9, '2024-03-08'),
(17, 'Live Chat feature is now postponed!', 'I apologize as an admin that the live chat feature is currently postponed. Due to the current situation, we have a lack of users. It will be difficult to update this without active users. Please be patient. When our community grows, we will definitely launch some big updates', 1, 8, '2024-03-09'),
(18, 'Sorry! for the technical issue.', 'I apologize as an administrator for the recent disturbances related to our website development process. Agguora is a new website and we are constantly updating it. As a responsible admin, I am sorry for any technical issues that occurred during the feature modification period. I promise that we will do our best to prevent such issues in the future.', 1, 8, '2024-03-11'),
(19, 'New updates ', 'New updates on Agguora. Now you can easily view recent threads and announcements. ', 1, 9, '2024-03-14'),
(20, 'Celebrate ðŸŽ‰', 'Congratulations and a huge warm welcome to our top 30 members! We\'re beyond thrilled to have you join us on this incredible journey! Get ready to explore new content!', 1, 7, '2024-06-02'),
(21, 'Agguora is backðŸ”¥', 'As your administrator, I\'m excited to announce that we\'re BACK!  Due to popular demand, we\'re thrilled to announce the excitement! Stay tuned for some amazing posts coming your way.', 1, 9, '2024-06-02'),
(22, 'Sorry for this issue!', 'Currently for some technical issue the drive is unable to create so I request to you all my active and loyal users please wait we will be fixed it as soon possible. ', 1, 8, '2024-06-04'),
(23, 'Drive creation issue has been fixed.', 'Finally, the drive creation issue has been fixed. Now you can easily create your drive. Thank you, our loyal user @nobu for informing me of this issue as soon as possible.', 1, 9, '2024-06-04'),
(24, 'Agguora is now underdevelopment.', 'Agguora v2 (version 2) is coming soon. It is currently under development. I request all members to please contact us if you encounter any problems or security issues. Your feedback would be appreciated. Don\'t worry, Agguora is in our control. If any problems occur, we will fix them soon. But don\'t worry you can continue to use it normally.', 1, 8, '2024-06-12'),
(25, 'Agguora v2 ðŸ”¥ is coming soon !!', 'Agguora v2 (Version 2) is coming soon! Agguora version 1 was a community forum focused on user privacy. We are excited to announce a major update for Agguora. The Agguora community has now evolved into a social media platform, and we will continuously add new features. We are also working to enhance user privacy in Agguora. Agguora v2 will be officially launched next month. We request all members to stay with us during this time. Agguora will soon bring you significant improvements. Your support is highly appreciated. Thank you!', 1, 9, '2024-06-12'),
(26, 'Agguora v2 will release soon', 'As an administrator of Agguora, I apologize for any inconvenience, but we would like to inform you that Agguora is currently undergoing development. We are working on Agguora v2 and for technical reasons, we regret to inform you that Agguora is currently not available for user access. Agguora v2 will be released soon. We appreciate your patience and understanding. Thank you. - Ayanabha Chatterjee (Founder of Agguora).', 1, 8, '2024-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `catagory_desc` varchar(2555) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_desc`, `created`, `created_by`, `genre`) VALUES
(31, 'Pi ( Ï€ )', 'All pi trader come here and join this group.', '2024-03-04', 44, ''),
(34, 'Memories', 'Memories ye jo word hain sunke kitna accha lagta hai sabke hote hai kisike good toh kisike bad memories aur ye life mein reh hi jaate hain aur isse humlog bohot kuch seekhte bhi hai aur message bhi milta hai isse .', '2024-03-06', 49, ''),
(35, 'Pyaar', 'What i think is pyaar ki koi paribhasa nahi hoti . Ye sab hi karte hai after some period of time.Ye sabko koi na koi time pe kisi na kisise ho hi jata hai . Par kabhi bhulaya nahi jata. Kisiko bohot jaldi hota hai toh kisiko bohot late se.', '2024-03-06', 49, ''),
(36, 'Thoughts', 'Thoughts woh hai jo aap sochte ho kisi ke prati jis kisike ke bhi prati accha,bura kuch bhi jo aap thoughts rakhte ho kisi ke prati aur main yun bolun toh jo aap sochte ho kisike prati.', '2024-03-07', 49, ''),
(38, 'Dark Web', 'A community for dark web lovers, and dark web trick and tips education about the Tor network, and encryption. How to access the dark web. The myths of the dark web.', '2024-03-10', 64, ''),
(40, 'OPM Fubuki Fan Club ðŸ¤©', 'If you don\'t know about Fubuki, please ignore this ðŸ”ž. If you\'d like to support it, you are welcome ðŸŽ‰.', '2024-03-12', 69, ''),
(41, 'Cryptocurrency â‚¿', 'Welcome to our cryptocurrency community where you can explore the latest updates and gain knowledge about cryptocurrencies.', '2024-03-13', 44, ''),
(46, 'Waiting', 'Waiting aksar ise sunkar humare dimaag mein ek hi cheez aati hai ki sabar karo wait karo in aspects of love,friendship,relationships and all. Ye woh word hai ya woh cheez hai jisko karne se problems,conditions theek ho sakti hai. What matters a lot is patience.', '2024-04-13', 49, ''),
(47, 'Crypto crafters ', 'Crypto Crafters is a cryptocurrency meme drive with daily memes. Rules: Please don\'t share any offtopic content. This drive is only for crypto memes and discussion. Share your funny memes and enjoy.  ', '2024-06-04', 69, ''),
(51, 'Workouts With Shivam urf ShivaðŸ”¥', 'Shivam showing his Mindblowing and Sexy BodyðŸ’ªðŸ»ðŸ”¥', '2024-06-12', 49, ''),
(52, 'Shivam\'s PostðŸ˜Ž', 'Here\'s a post of Shivam Gupta', '2024-06-12', 49, ''),
(53, 'Daily memes', 'Please post all your crazy memes here, join in on the daily meme fun, and enjoy!', '2024-06-12', 45, ''),
(54, 'Calling All Bengali Beauties â¤ï¸', 'Share your stunning saree photos or nostalgic quotes that capture the essence of being a Bengali girl. Let\'s celebrate our unique aesthetic and timeless elegance. ðŸŒ¸', '2024-06-13', 45, ''),
(56, 'Coding memes', '&quot;Coding memes&quot; This drive is for only coding related memes. Please do not share any off-topic memes here.', '2024-06-14', 69, ''),
(57, 'JEET', 'Be water my friend', '2024-06-19', 57, ''),
(59, 'Test Drive', 'this is a fucking test drive', '2024-11-19', 44, 'fuckkk');

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
  `tag_someone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`, `tag_someone`) VALUES
(42, 'This is a test comment', 61, '2024-03-06 07:08:54', '44', 0),
(43, 'Hii', 61, '2024-03-06 07:09:15', '44', 45),
(44, 'Ae pi cryptocurrency ata aber Kobe release holo? ', 59, '2024-03-06 07:37:08', '45', 0),
(45, 'First comment ðŸ’€ðŸ‘', 59, '2024-03-06 07:37:59', '44', 45),
(46, 'Are ata akhon main net a assani ata akhono test net a ache jhokon main net a asbe thokon tui ata crypto treading platform gulo te dakhte parbi.', 59, '2024-03-06 07:47:18', '44', 45),
(47, 'Thank You BuddyðŸ¤', 62, '2024-03-06 10:15:29', '49', 0),
(48, 'Whaa! Bhi ðŸ˜³ kaya must likha hai tune.', 65, '2024-03-06 13:26:04', '44', 0),
(49, 'Keep it up broo ðŸ‘ we are all support you.', 63, '2024-03-06 13:28:03', '44', 0),
(50, 'Vhi tara link kam nahi kar raha hai, link mai problem hai link edit kar le.', 65, '2024-03-06 14:42:23', '44', 0),
(51, 'Thanks Broâ¤ï¸', 65, '2024-03-10 07:03:37', '49', 44),
(52, 'Thanks Buddyâ¤ï¸', 63, '2024-03-10 07:04:21', '49', 44),
(53, 'Wow! you have a great knowledge about dark web that impressive.ðŸ’€', 69, '2024-03-10 11:41:30', '44', 0),
(54, 'I am glad that you are contributing to this community, but please ensure that you have read and understood the terms and conditions before creating any adult content. Thank you.', 71, '2024-03-12 19:43:17', '44', 0),
(55, 'I have already read the terms and conditions.', 71, '2024-03-13 04:07:34', '69', 44),
(56, 'O! Really new community about fubuki mummy ðŸ˜‚, I am a big fan of her ðŸ™ƒ. Really she is very gorgious âœ¨', 71, '2024-03-13 04:57:52', '45', 0),
(57, 'Really not sure but 2024 is the profitable year for crypto market.', 73, '2024-03-13 19:10:56', '44', 0),
(59, 'Test comment', 75, '2024-03-27 08:25:30', '72', 0),
(64, 'Wow! it\'s great. Keep it up broo. ðŸ˜Š', 85, '2024-04-13 08:09:54', '44', 0),
(65, 'Welcome Ar12agnik. ', 70, '2024-06-02 10:49:22', '44', 0),
(66, 'According to today 04.06.2024 the BTC value is 68,978.10 USD you can google it.', 73, '2024-06-04 08:53:33', '64', 0),
(67, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚', 87, '2024-06-04 09:06:32', '44', 0),
(68, 'Earth is not for beginners. ðŸ¤¡', 87, '2024-06-04 09:20:01', '69', 0),
(69, 'we need homelander. ', 87, '2024-06-04 09:50:52', '64', 69),
(70, 'I think we should make a crypto meme  drive separately! ', 87, '2024-06-04 09:51:50', '64', 44),
(71, 'Who\'s gonna make it?', 87, '2024-06-04 11:22:50', '44', 62),
(72, 'Ok then I will. ', 87, '2024-06-04 17:19:13', '69', 44),
(73, 'This is an insane difference between traders. ðŸ˜‚ðŸ˜‚', 88, '2024-06-04 21:22:21', '44', 0),
(74, 'Really dude same here', 89, '2024-06-05 11:34:55', '69', 0),
(75, 'ðŸ˜‚ðŸ˜‚', 89, '2024-06-05 13:02:02', '44', 69),
(76, 'Just think when you understand that Fubuki is the younger sister of Tatsumaki. ðŸ˜', 74, '2024-06-05 13:05:35', '44', 0),
(77, 'I am good in php #interested', 92, '2024-06-05 19:03:51', '69', 0),
(78, 'Interested. ', 92, '2024-06-05 19:05:52', '64', 0),
(79, 'Really pathetic ðŸ˜‚', 74, '2024-06-05 19:08:22', '45', 44),
(80, 'In your dream.', 95, '2024-06-11 05:37:09', '44', 0),
(81, 'Bro.. .are you drunk? ', 95, '2024-06-11 06:47:30', '45', 0),
(82, 'no', 95, '2024-06-11 07:27:37', '67', 0),
(83, 'ðŸ™‹ðŸ»â€â™€ï¸ same hare. ', 94, '2024-06-12 07:57:22', '45', 0),
(84, 'I\'ve completed all my KYC steps, but I\'m still encountering issues. Is Pi Network a scam?', 94, '2024-06-12 10:39:20', '44', 0),
(85, 'Darun vhi darun ðŸ”¥ðŸ”¥', 96, '2024-06-12 10:50:31', '44', 0),
(86, 'Super bro ðŸ”¥ just keep it up ðŸ’ªðŸ» ', 96, '2024-06-12 10:52:11', '69', 0),
(87, 'Thanks BuddyðŸ™ŒðŸ»ðŸ¤›ðŸ»', 96, '2024-06-12 10:54:43', '49', 0),
(88, 'Thanks broðŸ™ŒðŸ»', 96, '2024-06-12 10:55:30', '49', 69),
(89, 'a new guy cool . ', 96, '2024-06-12 10:58:56', '45', 0),
(90, 'It\'s ok bro thanks to contribute yourself in Agguora. ðŸ˜Š', 96, '2024-06-12 11:00:12', '44', 49),
(91, 'ThanksðŸ‘€ Bol toh aise rahi ho jaise kabhi pehele notice nahi kiyaðŸ‘€ðŸ‘€', 96, '2024-06-12 11:09:29', '49', 45),
(92, 'Ya bro always I\'m always here to contribute to my friends in all aspects specially my buddies', 96, '2024-06-12 11:11:12', '49', 44),
(93, 'Gym jate ho ?', 96, '2024-06-12 11:13:21', '45', 49),
(94, 'No babes without gymðŸ˜Ž', 96, '2024-06-12 11:15:29', '49', 45),
(95, 'Yeah par babes ok hai? ', 96, '2024-06-12 11:16:57', '45', 49),
(96, 'Yaa babes ab number toh nahi hai na aapka mere paas toh ab ye aggoura se hi kaam chalana padhega na aapko babes kehkarðŸ‘€', 96, '2024-06-12 11:21:38', '49', 45),
(97, 'Flirt ðŸ˜ kar raha hai sidha sidha bol na ðŸ˜‚', 96, '2024-06-12 11:31:23', '45', 49),
(98, 'Yes I\'m flirting with you any doubtðŸ‘€', 96, '2024-06-12 11:35:19', '49', 45),
(99, 'Ab main seedha bhi bol diya aur direct bhi ki yes I\'m flirting with you babesðŸ‘€', 96, '2024-06-12 11:57:27', '49', 45),
(100, 'You are so overrated.', 96, '2024-06-12 12:12:22', '45', 49),
(101, 'Bro, you are a genuine user.', 97, '2024-06-12 12:31:02', '44', 0),
(102, 'arre nice bhai ..\r\n', 96, '2024-06-12 12:32:21', '81', 0),
(103, 'Thanks buddy', 97, '2024-06-12 12:36:02', '49', 44),
(104, 'Means you mean to say ahankaar ab flirting mein bhi ahankaariðŸ˜‚ kab se oh i seeðŸ‘€Btw thanks for this', 96, '2024-06-12 12:38:29', '49', 45),
(105, 'Thanks BuddyðŸ™ŒðŸ»', 96, '2024-06-12 12:39:14', '49', 81),
(106, 'Kaya chal raha hai yeha guys ðŸ¤¡', 96, '2024-06-12 12:41:15', '69', 0),
(107, 'Tum bhot jada bolte ho.', 96, '2024-06-12 12:42:25', '45', 49),
(108, 'I don\'t understand where the word ego came from matlab kaha se kaise kyu kaun se conversation se dhurrr babes aapne toh ek flirting ka ek flow bigaad diya', 96, '2024-06-12 12:43:14', '49', 45),
(109, 'Aapne hi toh kaha bolne ke liye toh main bola boliye na aap flirt nahi kar paayengi kyuki ye sab baatein ka koi sense nahi banta literally tum ek flow kharab kar di flirting conversation ka flirt nahi kar paati ho toh bol dena chahiye na', 96, '2024-06-12 12:47:04', '49', 45),
(110, 'yea photo tumne edit kaise kiya hai?', 97, '2024-06-12 12:49:28', '45', 49),
(111, 'Pehele toh flirting chal raha tha abhi toh... baaki aap samajhdaar hoðŸ˜œ', 96, '2024-06-12 12:50:46', '49', 69),
(112, 'Ye edited tha insta pe trend pe tha ye babes stories pe sabka toh main bhi laga liya tha', 97, '2024-06-12 12:51:56', '49', 45),
(113, 'jaao jake apna gf ke sath flirting karo ', 96, '2024-06-12 12:53:19', '45', 49),
(114, 'Usise toh kar raha hoonðŸ‘€', 96, '2024-06-12 12:53:50', '49', 45),
(115, 'Who thik hai par tum babes bolna band karo palhe mujhe, mai koi bachhi nahi hu.', 97, '2024-06-12 12:54:32', '45', 49),
(116, 'Haa theek chhoti bacchi ho tumðŸ˜‚', 97, '2024-06-12 12:55:12', '49', 45),
(117, 'bare chalu larke ho tum', 96, '2024-06-12 12:56:41', '45', 49),
(118, 'ðŸ˜‚', 96, '2024-06-12 12:57:16', '49', 45),
(119, 'Nahi main agar machine hota toh zarur chalu ladka hota but machine toh nahi hoon na chalu kaise kar sakte hai without machine ab ye toh koi switch toh nahi hai na off kiya off on kiya on \r\n', 96, '2024-06-12 12:59:11', '49', 45),
(120, 'I am a girl so I will not do this. But I have an idea. I\'ll ask my husband to help me with this ðŸ˜‰', 99, '2024-06-12 12:59:20', '45', 0),
(121, 'Naam toh batao apne husband kaðŸ˜…', 99, '2024-06-12 13:00:46', '49', 45),
(122, 'Chalo mai vhi dakta hu tum kitne active rahata ho yeha par ab tum samaj lo ', 96, '2024-06-12 13:03:56', '45', 49),
(123, 'GTA \r\n', 100, '2024-06-12 13:04:26', '81', 0),
(124, 'tum kon hote ho nam janne walla', 99, '2024-06-12 13:04:52', '45', 49),
(125, 'Indirectly bolna tu phassss gayiðŸ‘€', 96, '2024-06-12 13:04:56', '49', 45),
(126, 'Hoga tab na batayegiðŸ‘€', 99, '2024-06-12 13:06:12', '49', 45),
(127, 'Android studio ', 100, '2024-06-12 13:06:18', '69', 0),
(128, 'Accha mujhe toh jaise pata hi nahi tha accha hua babes ne bata diyaðŸ˜‚', 100, '2024-06-12 13:06:55', '49', 45),
(129, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚', 99, '2024-06-12 13:07:08', '69', 45),
(130, 'Where are you from?', 99, '2024-06-12 13:07:59', '69', 49),
(131, 'Girish Park bro', 99, '2024-06-12 13:08:52', '49', 69),
(132, 'Tum yeha vhi suru ho gaya', 100, '2024-06-12 13:09:11', '45', 49),
(133, 'And you?', 99, '2024-06-12 13:09:38', '49', 69),
(134, 'Geer gayi tu ðŸ‘€ sahi maeðŸ‘€babes', 100, '2024-06-12 13:10:34', '49', 45),
(135, 'Tum kaha se ho?\r\n', 100, '2024-06-12 13:11:52', '49', 45),
(136, 'Tamis se bat karo', 100, '2024-06-12 13:15:05', '45', 49),
(137, 'Are sab flirting,mazak sab yahi pe karogi ki kuch personal bolkar bhi cheez hota hai personal chats', 100, '2024-06-12 13:16:04', '49', 45),
(138, 'Accha mam where are you from?', 100, '2024-06-12 13:16:56', '49', 45),
(139, 'salt lake ', 99, '2024-06-12 13:17:04', '69', 49),
(140, 'Hm', 99, '2024-06-12 13:17:42', '49', 69),
(141, 'Batamis larke ase to koi ladki nahi pate gi tum se.', 96, '2024-06-12 13:18:25', '45', 49),
(142, 'OkðŸ‘ðŸ»', 96, '2024-06-12 13:19:25', '49', 45),
(143, 'jake profile mai dakhlo. ', 100, '2024-06-12 13:19:27', '45', 49),
(144, 'Tum samaj gaye yehi e kafi hai mai asi wasi ladki nahi hu samje, mai ladkoka patience dakti hu, ab mai vhi daku tum mere post mai kitne active rahate ho.', 96, '2024-06-12 13:24:40', '45', 49),
(145, 'For your kind information main tumse just mazak kar raha tha aur flirt serious hone ka kya tha main bhi aisa waisa ladka nahi hoon puch lena mere doston se mazak aur flirting ko mazak aur flirting ki tarah hi leta hoon aur tumko koi bola nahi hai patience dekhne do as you wish tumhari life tumhari marzi and tumhari decision baat mat karna mujhse simple jo har cheez ko serious way mein le leta ho tum chats dekhna samajh aayega tum kya kya boli ho jiska koi sir pair nahi tha anyway if i hurted you them I\'m sorry but baat mat karna mujhse soma', 96, '2024-06-12 13:42:47', '49', 45),
(146, 'Not interested sorry', 100, '2024-06-12 13:44:49', '49', 45),
(147, 'Aur tum ye baar baar kya ladko ka patience ladko patience dekhti hoon bol rahi ho nahi chahiye rakho apne paas tumhara so called thoughts aur kya active rehte ho laga kar rakhi ho ye kind of social media hi hai sablog active rahenge right na so ye bolne ka kya meaning tum kya jo post karogi sablog hi reaction denge sorry ab main nahi dene wala any reaction on your post ok happy now and sorry agar main tumko hurt kiya tum patience dekhti ho theek hai dekho it\'s good sablog ko dekhna chahiye but ye sab baat ka sense nahi banta tum chats padhkar khud hi dekh lo tum kaha ka baat kaha lekar gayi ho anyway kya pata tum samjhi ki nahi again im sorry genuinely sorry\r\n', 96, '2024-06-12 13:55:47', '49', 45),
(148, 'vhi sabb ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚  ', 96, '2024-06-12 14:54:24', '44', 0),
(149, 'Same here ', 100, '2024-06-12 15:44:40', '45', 49),
(150, 'Pc feels good', 101, '2024-06-12 16:05:21', '67', 0),
(151, 'Gta v on pentium', 100, '2024-06-12 16:05:58', '67', 0),
(152, 'Increse prize money I want 1000', 99, '2024-06-12 16:06:36', '67', 0),
(153, 'But i think Laptop is much better than PC', 101, '2024-06-12 16:19:00', '49', 0),
(154, 'Ig html it\'s sounds wierd. ', 103, '2024-06-12 18:13:06', '44', 0),
(155, 'Op broo ðŸ”¥', 102, '2024-06-12 18:13:38', '44', 0),
(156, 'cool ', 102, '2024-06-12 19:46:08', '69', 0),
(157, 'I have a laptop but I think pc is good for performance. ', 101, '2024-06-13 05:01:13', '69', 0),
(158, 'Thanks BuddyðŸ™ŒðŸ»', 102, '2024-06-13 06:03:46', '49', 44),
(159, 'Banda hi cool hai kya karu btw thanks broðŸ™ŒðŸ»', 102, '2024-06-13 06:04:32', '49', 69),
(160, 'Wow! looking sexy bro.ðŸ”¥', 106, '2024-06-13 07:54:16', '44', 0),
(161, 'Thanks BrotherðŸ™ŒðŸ»â¤ï¸', 106, '2024-06-13 08:45:14', '49', 44),
(162, 'Looking hot brother ðŸ’¥', 106, '2024-06-13 09:35:28', '69', 0),
(163, 'If I hurted you then I\'m sorry', 97, '2024-06-13 09:46:15', '49', 45),
(164, 'Thanks BrotherðŸ™ŒðŸ»ðŸ™ŒðŸ»', 106, '2024-06-13 09:48:39', '49', 69),
(165, 'Accha jo hua chorho hatao enjoy kare ab ye new social media pe i.e. aggoura pe?', 100, '2024-06-13 12:13:33', '49', 45),
(166, 'Ha who to hai he issliya to mi yeha hu dosto ko appreciate kar na chahiye hamesha ', 100, '2024-06-13 16:47:08', '45', 49),
(167, 'Is Agguora ko popular Karna hai ak bar popular ho jai to maza ayega', 100, '2024-06-13 16:49:02', '45', 49),
(168, 'Ekdamm ðŸ¤ŸðŸ»', 100, '2024-06-13 16:56:26', '49', 45),
(169, 'Same soma popular ho jaay bas india mein mere friend ka ye aggoura bas sochunga ki humlog ka project popular ho gayaðŸ˜ƒ', 100, '2024-06-13 16:58:16', '49', 45),
(170, 'Accha are you single?', 100, '2024-06-13 17:00:09', '49', 45),
(171, 'You are toh damnnn ðŸ”¥âœ¨', 115, '2024-06-13 17:02:23', '49', 45),
(172, 'This is not me ðŸ˜…, it\'s just a pic of a girl who ware a beautiful white saree and white colour is my favourite ðŸ¤ðŸ™ƒðŸ˜…', 115, '2024-06-13 17:04:13', '45', 49),
(173, 'Accha accha mujhe laga tum ho itni sundarðŸ‘€', 115, '2024-06-13 17:05:46', '49', 45),
(174, 'ðŸ˜³ wow ', 115, '2024-06-13 17:05:58', '64', 0),
(175, 'It\'s you ?', 115, '2024-06-13 17:06:23', '64', 45),
(176, 'It\'s a hard truth. ', 104, '2024-06-13 17:07:04', '64', 0),
(177, 'Mera posts dekhi ho?ðŸ‘€', 115, '2024-06-13 17:07:51', '49', 45),
(178, 'Who is she?', 115, '2024-06-13 17:08:08', '69', 0),
(179, 'Really it\'s you?', 115, '2024-06-13 17:08:31', '69', 45),
(180, 'Arguing about politics is totally waste of time ðŸ˜‘', 104, '2024-06-13 17:10:24', '69', 62),
(181, 'ðŸ˜…ðŸ˜…', 115, '2024-06-13 17:11:05', '45', 0),
(182, 'No no guy\'s it\'s not me. ðŸ˜…', 115, '2024-06-13 17:11:27', '45', 0),
(183, 'Ha who to Mai hu e Sundar ðŸ˜', 115, '2024-06-13 17:11:56', '45', 49),
(184, 'I am not ready to accept that this is not youðŸ‘€', 115, '2024-06-13 17:12:17', '49', 45),
(185, 'Are you single????', 115, '2024-06-13 17:12:57', '49', 45),
(186, 'Oo', 115, '2024-06-13 17:12:59', '69', 45),
(187, 'Damn TrueðŸ’¯', 104, '2024-06-13 17:14:25', '49', 69),
(188, 'Actually I create a new drive specially for Bengali girls. The Bengal beauties ðŸŒ¸so this is my first post on it. ', 115, '2024-06-13 17:15:44', '45', 0),
(189, 'Mai single hu yea relationship mi hu tume ku bolu?', 115, '2024-06-13 17:16:37', '45', 49),
(190, 'That\'s good though', 115, '2024-06-13 17:17:31', '49', 45),
(191, 'O this drive is only for girls?', 115, '2024-06-13 17:18:02', '69', 45),
(192, 'Just asking say na are you single?', 115, '2024-06-13 17:19:02', '49', 45),
(193, 'No not only for girls Bengali beauties is just a topic if you want to post which is related to this topic you can post it no matter that you are a boy or girl?', 115, '2024-06-13 17:20:04', '45', 69),
(194, 'Don\'t chase me like that. ', 115, '2024-06-13 17:22:58', '45', 49),
(195, 'Ok I see but you mention it on the drive description so that would be more clear for newcomers ', 115, '2024-06-13 17:24:59', '69', 45),
(196, 'Now from where did the word chase comes fromðŸ˜…I\'m just asking are you single just say yes or no i think you are singleðŸ‘€', 115, '2024-06-13 17:25:48', '49', 45),
(197, 'Okk', 115, '2024-06-13 17:25:59', '45', 69),
(198, 'I am not interested. And I also suggest you don\'t waste your time. ', 115, '2024-06-13 17:28:16', '45', 49),
(199, 'Ok your wish phir bolna mat bola kyu nahi tha you are not interested ok accepted phir bolna mat last mein ki main tujhe like karti hoon okðŸ‘€ Ek baar puch toh lete main karti hoon ki nahi ye sab drama last mein nahi hona chahiye and of course everybody knows that who\'s the cool boy hereðŸ‘€', 115, '2024-06-13 17:31:33', '49', 45),
(200, 'Ye options choose karne ka har kisiko nahi deta main mujhe jo pasand aati hai sirf usko hi deta hoon aakhir crush toh main hoon sabka hi 3-4 proposals bhi aa chuka hai but rejected', 115, '2024-06-13 17:33:57', '49', 45),
(201, 'Tum se pucha koi? Itna jada ku bolte ho', 115, '2024-06-13 17:37:25', '45', 49),
(202, 'You only just mentioned me saying that you are not interested it\'s a waste of time main uska hi reply kiya tumko zyada bolne ka kya hai saamne se bol raha hoon jo bhi bol raha hoon like karti ho toh bol do if not then leave phir drama mat karna', 115, '2024-06-13 17:39:52', '49', 45),
(203, 'Drama kon kar raha hai yeha?bola na no interest ', 115, '2024-06-13 17:54:42', '45', 49),
(204, 'Ok phir bolna last mein ki shivam listen i like you ok your wish do as what you like', 115, '2024-06-13 17:55:51', '49', 45),
(205, 'Saree is purely a form of grace and glamourâœ¨', 118, '2024-06-13 18:08:43', '49', 45),
(206, 'This is YouðŸ‘€', 118, '2024-06-13 18:10:11', '49', 45),
(207, 'Tumko jo ye aggoura pe laya hai na puch lena usse main kitna ameer hoon mera koi past tha ya nahi banda kaisa hoon mera close friend hai woh sab bata dega mere baare mein phir decide karna', 115, '2024-06-13 18:12:54', '49', 45),
(208, 'nice buddy ðŸ”¥', 121, '2024-06-13 19:58:31', '44', 0),
(209, 'Bai sabbbbbðŸ˜‚', 119, '2024-06-13 19:59:17', '44', 0),
(210, 'I\'m not sure, but this post is really gaining popularity ðŸ“ˆ', 118, '2024-06-13 20:01:28', '44', 0),
(211, 'ðŸ˜‚ kaya ho raha hai yeaha par!', 115, '2024-06-13 20:03:22', '44', 0),
(212, 'Kichu na ree akhane as o santi nai ar na bole parlam na abr tui akta block korar feature add kor. ', 115, '2024-06-13 20:05:31', '45', 44),
(213, 'OOOps !ðŸ’€', 115, '2024-06-13 20:06:39', '44', 45),
(214, 'Bro look powerful. just keep it up ðŸ”¥', 121, '2024-06-13 20:08:21', '69', 0),
(215, 'no, it\'s not me. ', 118, '2024-06-13 20:15:15', '45', 49),
(216, 'Thanks BuddyðŸ™ŒðŸ»', 121, '2024-06-13 20:16:03', '49', 44),
(217, 'Yaa bro i will btw thanks brotherðŸ™ŒðŸ»', 121, '2024-06-13 20:16:44', '49', 69),
(218, 'ðŸ˜‚', 119, '2024-06-13 20:17:11', '49', 44),
(219, 'I think Shivam likes you!', 118, '2024-06-13 20:17:15', '44', 45),
(220, 'Hai na shivam?\r\n', 118, '2024-06-13 20:17:42', '44', 49),
(221, 'Yes I like her but i don\'t know her aur usko lag raha hai mera chats padhkar ki main rude hoon tu toh sab jaanta hai bhai bata usko', 118, '2024-06-13 20:19:01', '49', 44),
(222, 'No never! I am not interested tui janis ami akhane kano asachi tor bola te ae social media take viral korte hobe tar mane ae noi je sob kichu sojjo korbo ami oi cheleta ke bolchi tao o mante raji noi', 118, '2024-06-13 20:21:16', '45', 44),
(223, 'Or number nibi chat a kothabolbi wp te', 118, '2024-06-13 20:21:57', '44', 45),
(224, 'Chere de vai o jokhon jaante paarbe tokhon late hoy jaabe aamar bepare chere de', 118, '2024-06-13 20:22:41', '49', 44),
(225, 'Pagol naki ami kintu Agguora use korbo na arokom korle, tui akta block feature developed kor block korbo sala birokto kore khai', 118, '2024-06-13 20:23:10', '45', 44),
(226, 'Chere de vai chere de\r\n', 118, '2024-06-13 20:23:50', '49', 44),
(227, 'Or sun Shivam tu achha ladka hai yea achhi bat hai but mujhe tum pe interest nahi hai ok mai wase vhi larko se jada bat nahi karti tui Ayanabha se puch le. ', 118, '2024-06-13 20:24:30', '45', 49),
(228, 'Achha achha rag koris na thikache matha thanda kor.\r\n', 118, '2024-06-13 20:25:29', '44', 45),
(229, 'Nahi karti toh kya hua friendship toh rakh hi sakti ho?Aur theek hai na kya fadak padhta hai chorho na ekdam enjoy karo aur kya', 118, '2024-06-13 20:26:07', '49', 45),
(230, 'Shivam tui o kharap bhavis na ok mon kharap koris na or bhalo lagche na hoi to char tora jhogra kori s na vhi', 118, '2024-06-13 20:26:22', '44', 49),
(231, 'Toder 2jon ke e bolchi jhmela koris na agguora te asachis atake use kore viral korar jonne ta bole arokom jhamela kore viral korbi tora ðŸ˜…ðŸ˜‚', 118, '2024-06-13 20:27:34', '44', 0),
(232, 'Ato introvert hole cholbe or bol tui?', 118, '2024-06-13 20:27:38', '49', 44),
(233, 'Ha friends to wase vhi hu na or kaya yeha par to sub hi friends hai yea community media hai vhi. ', 118, '2024-06-13 20:28:41', '45', 49),
(234, 'Puro aamar ex er motun o', 118, '2024-06-13 20:29:00', '49', 44),
(235, 'Ke introvert tui dak bi amake Dara ami db lagachi ', 118, '2024-06-13 20:29:28', '45', 49),
(236, 'Haa toh community media mein koi kisiko pasand nahi aa sakta kya? Leave agar aapko nahi pasand toh ', 118, '2024-06-13 20:31:15', '49', 45),
(237, 'Mujhe tum pasand nahi ho kitni bar bolu', 118, '2024-06-13 20:32:44', '45', 49),
(238, 'Nanahi dekhna aapko rehene do\r\n', 118, '2024-06-13 20:33:10', '49', 45),
(239, 'Dakh amer exam ache tor bondhu ke chup korte bol ', 118, '2024-06-13 20:33:47', '45', 44),
(240, 'Mat bolo tum bolo hi mat rehene do', 118, '2024-06-13 20:33:54', '49', 45),
(241, 'Tora jhamela koris na ree.', 118, '2024-06-13 20:34:20', '44', 0),
(242, 'Ok ab main ekdamðŸ¤«Padho jaakar tum aur mujhe bhi interest nahi hai ok mazak kar raha tha now go and study', 118, '2024-06-13 20:35:20', '49', 45),
(243, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚', 118, '2024-06-13 20:36:11', '44', 0),
(244, 'Ha abto bolo GE dakh liya mujhe ho gaya mazza dak vhi jassa hai tu mere samjha', 118, '2024-06-13 20:37:04', '45', 49),
(245, 'Jada hai tu mere samjha matlab?ðŸ˜…', 118, '2024-06-13 20:38:13', '49', 45),
(246, 'Haa iska matlab tum like karti ho?', 118, '2024-06-13 20:39:11', '49', 45),
(247, 'First thing main tumko dekh nahi paaya dp theek se ok second itna jhamela karti ho rehene hi do i deserve better', 118, '2024-06-13 20:39:54', '49', 45),
(248, 'ayanabha ake chup korte bol. ', 118, '2024-06-13 20:40:05', '45', 44),
(254, 'Gym guy ðŸ’ªðŸ¼ cool ðŸ”¥', 121, '2024-06-14 12:47:13', '64', 0),
(255, 'Thanks brotherðŸ™ŒðŸ»', 121, '2024-06-14 14:17:34', '49', 62),
(256, 'Those who know. ðŸ˜‚', 122, '2024-06-14 19:18:08', '69', 0),
(257, 'I am not a coder can anyone explain that?', 124, '2024-06-14 19:59:30', '45', 0),
(258, 'Not every girl is a gold digger.', 122, '2024-06-14 20:00:37', '45', 0),
(259, '33', 125, '2024-06-14 20:02:18', '69', 0),
(260, 'The funny thing is not in the caption, it\'s in the image.', 122, '2024-06-14 20:05:01', '69', 45),
(261, 'No explain me', 122, '2024-06-14 20:08:07', '45', 69),
(262, 'nothing! ðŸ’€', 122, '2024-06-14 20:09:06', '69', 45),
(263, '??', 122, '2024-06-14 20:09:38', '45', 69),
(264, 'This is a list of programming tools and technologies, but the icons are mismatched, which is pretty funny.', 124, '2024-06-14 20:11:46', '69', 45),
(265, 'Ohh! No I am not a programmer so that\'s why for me it\'s very hard to understand this coding memes. ðŸ˜…', 124, '2024-06-14 20:13:23', '45', 69),
(266, 'I think we should create a sapate drive only for coding memes. ', 124, '2024-06-14 20:16:30', '45', 0),
(267, 'yeha!!', 124, '2024-06-14 20:16:56', '69', 45),
(268, '33', 125, '2024-06-14 22:20:22', '49', 0),
(269, 'Ya bro us bro us I\'ve got it what you are tying to sayðŸ‘€ðŸ˜‚  But itna bhi sach nahi bolna thaðŸ˜‚ðŸ˜‚', 122, '2024-06-14 22:23:42', '49', 69),
(270, 'ðŸ’€', 122, '2024-06-14 22:25:56', '49', 69),
(271, 'Ohh! broo ðŸ”¥', 128, '2024-06-15 07:29:36', '44', 0),
(272, '33\r\n', 125, '2024-06-15 07:30:01', '44', 0),
(273, 'ðŸ˜‚ðŸ˜‚', 122, '2024-06-15 07:30:39', '44', 0),
(274, 'Bro, what\'s your daily routine?', 128, '2024-06-15 07:41:02', '64', 0),
(275, '33', 125, '2024-06-15 07:45:53', '64', 0),
(276, 'Yaa bro thanksðŸ™ŒðŸ»', 128, '2024-06-15 07:49:01', '49', 44),
(277, 'Nothing specific brother btw why? Dekho simple hai subah uthta hoon abhi exam time hai toh padh raha hoon sara din aaj se workouts karna bhi chorh diya because of pressure nahi toh raat ko main 2-3baje ke aas paas workouts karta hoon samjhe brother?', 128, '2024-06-15 07:55:33', '49', 62),
(278, 'Dp rakh de vhi is photo ko ', 117, '2024-06-15 09:57:33', '44', 0),
(279, 'Cool.', 128, '2024-06-15 12:52:35', '64', 49),
(280, 'ðŸ™ŒðŸ»', 128, '2024-06-15 14:20:12', '49', 64),
(281, 'Ok', 117, '2024-06-15 16:28:51', '49', 44),
(282, 'Programmer âŒ Batman âœ…', 126, '2024-06-16 16:28:04', '44', 0),
(285, 'x bhabi?\r\n', 119, '2024-06-17 22:50:43', '67', 0),
(286, 'HaaðŸ˜¢', 119, '2024-06-18 07:31:36', '49', 67),
(287, 'New post cool.', 133, '2024-06-19 11:12:47', '69', 0),
(288, 'she looks adorable.', 134, '2024-06-19 11:37:18', '64', 0),
(289, 'wifu material ðŸ˜', 134, '2024-06-19 11:41:35', '79', 0),
(290, 'pc ', 101, '2024-06-19 11:45:22', '79', 0),
(291, 'Anime name?', 139, '2024-06-19 11:50:05', '45', 0),
(292, 'Really, she is the most perfect female character in anime.', 134, '2024-06-19 11:51:20', '45', 0),
(293, 'WoW! beautiful â¤ï¸', 134, '2024-06-19 11:52:58', '44', 0),
(294, 'I think sister is the best option ðŸ™‚', 138, '2024-06-19 15:55:19', '45', 0),
(295, 'This is not an anime ðŸ™‚ it\'s different. ', 139, '2024-06-19 15:58:07', '64', 0),
(296, 'If you want to die choose dad. ðŸ’€', 138, '2024-06-19 15:58:45', '64', 0),
(297, 'She has big books.  ðŸ˜‹', 134, '2024-06-19 16:00:30', '69', 0),
(298, 'Definitely! ðŸ˜ I also accept the women with the gift. ', 141, '2024-06-19 16:02:15', '69', 0),
(300, 'So what? It\'s an anime or a manga art I know better than you.', 139, '2024-06-19 16:05:15', '45', 64),
(301, 'What?', 141, '2024-06-19 16:06:02', '45', 69),
(302, 'Leave brother bolkar faayda nahi samjhakar faayda nahi hai kisiko', 139, '2024-06-19 18:01:27', '49', 64),
(303, 'Iss ka matlab kaya hai?', 144, '2024-06-19 19:00:40', '45', 0),
(304, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚', 144, '2024-06-19 19:01:46', '44', 0),
(305, 'Tumne mujhse pucha hai kya?', 144, '2024-06-19 19:02:13', '49', 45),
(306, 'Meme post kisne kiya hai? ', 144, '2024-06-19 19:03:31', '45', 49),
(307, 'It\'s a meme it\'s different meme first isko samajhne ke liye dimaag ka zarurat hota hai so use itðŸ’€', 144, '2024-06-19 19:03:52', '49', 0),
(308, 'Yes obviously main but aapne toh kaha tha ki aapko baat karne mein interest nahi hai jo bhi hai mera paisa waapis de do mujhe interest ki jarurat nahiðŸ’€', 144, '2024-06-19 19:05:26', '49', 45),
(309, 'Khud hi kehti ho ki mann nahi hai aur khud hi comment ye toh woh hua na...ðŸ’€', 144, '2024-06-19 19:06:30', '49', 45),
(310, 'Dimag kiske pass nahi hai saff dikhraha hai', 144, '2024-06-19 19:09:25', '45', 49),
(311, 'Ulta sidha post mat karo delete ho jaiga. ', 144, '2024-06-19 19:09:53', '45', 49),
(312, 'Us bro usðŸ’€Same thoughðŸ˜¶', 141, '2024-06-19 19:10:27', '49', 69),
(313, 'Haha isiliye bol raha hoon thoda le aao jaakar doctor ke paas jaao tumko free mein de dega baccha kehkarðŸ˜‚', 144, '2024-06-19 19:11:38', '49', 45),
(314, 'Kaun delete karega sablog isi post pe marte hai jo aapke samajh ke bahar hai thoda mature bano sab meaning double meaning samajh aayega aapko bhiðŸ’€', 144, '2024-06-19 19:12:42', '49', 45),
(315, 'Ayanabha ae tor bondhu ke bojha kichu sob somoy jhogra korte chole ase. ', 144, '2024-06-19 19:14:11', '45', 44),
(316, 'Ya really big one ðŸ¤©', 134, '2024-06-19 19:14:40', '49', 69),
(317, 'Waah ab aap use bolti hai mujhe samjhaane ulta aap mujhse flirt ki aur aapne hi bola baat nahi karne aapse main jo ki karta bhi nahi tha khud hi aapne mere post pe comment kiya aur kehti hai usko mujhe samjhaane seriouslyðŸ˜…', 144, '2024-06-19 19:16:13', '49', 45),
(318, 'Asi ladki ajj kal sirf 1% kismat wallo ko hi milta hai', 143, '2024-06-19 19:17:20', '69', 0),
(319, 'ðŸ˜‚ vhi memes sa jada comments parkar hasi araha hai.\r\n', 144, '2024-06-19 19:18:52', '69', 0),
(320, 'yaa bro Humare naseeb mein nahi hai jo bhi milti hai chutiya aur nibbi ', 143, '2024-06-19 19:19:00', '49', 69),
(321, 'ðŸ˜‚Maze lo aur kya baaki aapko toh pata hi hai kya ho raha hai\r\n', 144, '2024-06-19 19:19:53', '49', 69),
(322, 'Ha tum jase ladke ko bhot achi tara janti hu ladki bajj khike ', 143, '2024-06-19 19:20:39', '45', 49),
(323, 'Post ta delete kor to ', 144, '2024-06-19 19:21:48', '45', 44),
(324, 'O hello mere baare mein puchna ho toh jaakar usse puch lena phir judge karna aise jaanti nahi ho bina jaane judge mat karo samjhi haddd mein raho apni', 143, '2024-06-19 19:22:06', '49', 49),
(325, 'Be in your limits ok\r\n', 143, '2024-06-19 19:23:19', '49', 45),
(326, 'Amer hate nahi jodi sarokom hoi automatically delete hoye jabe', 144, '2024-06-19 19:24:26', '44', 45),
(327, 'Amer hate nahi jodi sarokom hoi automatically delete hoye jabe', 144, '2024-06-19 19:24:27', '44', 45),
(328, 'Ha bolungi nahi ladki dakta hi chale ate ho bak bak karne anab sanb bakte ho or ager ak ladki galti sa vhi comment karke post par usko samajte ho ki ladki pat gai fir flirting ke nam pe battamizi karte ho ', 143, '2024-06-19 19:33:36', '45', 49),
(329, 'First thing tum khud hi boli thi nahi baat karogi humse ulta mere post pe comment karti ho kyu?????? Main toh nahi kiya tumhare post pe comment agar kiya hoon toh tumko specifically ekdam nahi kiya tag karke kisi aur ko kiya hoon tumko toh nahi kiya na toh tum mere post pe without any kisiko tag kiye kyu comment karogi mere post mein??????Any answer Khud hi bolti toh baat nahi karogi aur comment karti ho?\r\n', 143, '2024-06-19 19:33:48', '49', 45),
(330, 'Iska matlab tum ladka baaj ho right????Kyuki tumne ye khud consider kiya hai', 143, '2024-06-19 19:36:01', '49', 45),
(331, 'Tora jhamela koris na ree ', 143, '2024-06-19 19:38:05', '44', 0),
(332, 'Jhamela ke korche tui bol tui bol. ', 143, '2024-06-19 19:38:45', '45', 44),
(333, 'Amera sobi jhokon tahki thik e asi ae Shivam asar por jhamela suru hoi. ', 143, '2024-06-19 19:39:25', '45', 0),
(334, 'Now just shut up and mind your own business ok koi comments tum nahi karna infact mere posts pe ok just its none of your business ok ', 143, '2024-06-19 19:39:54', '49', 45),
(335, 'Waah matlab tum khud hi boli baat nahi karogi mujhse khud hi mere post pe comment ki aur main bolu bhi nahi puchu bhi nahi ki aapne toh bola tha comment nahi kariyega toh kyu kiya iska jawad do pehele?\r\n', 143, '2024-06-19 19:41:39', '49', 45),
(336, 'Amer tor post a comment korte chara gache ami normally kichu comment korle e tor khara hoi jai bujhli. Jhamela korte chole asis.', 143, '2024-06-19 19:42:43', '45', 49),
(337, 'Tum usi samay clear ki thi ki main tumhare post pe comment nahi karunga but tum ki kyu i want answer kyu aur usko bol rahi ho jhagra kaun start kiya?????? Matlab khud gaddha banakart kehti ho gaddha kaise aaya??? Really?????', 143, '2024-06-19 19:43:22', '49', 0),
(338, 'TumaRaha pardvaris kharap hai chup kar sale. ', 143, '2024-06-19 19:47:05', '45', 49),
(339, 'Enough ja vhag Tora akhan thike ami agguora bondho kore dabo ', 143, '2024-06-19 19:48:34', '44', 0),
(340, 'Ato jhamela ar bhalo lagche na.', 143, '2024-06-19 19:48:59', '44', 0),
(341, 'Ki suru korechis tora akhane ', 143, '2024-06-19 19:49:19', '69', 0),
(342, 'Tora to jhame la kore website ar reputation ar 12ta bajhia dichis.', 143, '2024-06-19 19:50:04', '69', 0),
(343, 'Ha vhi ae karon a e bondho kore dabo then pore officially lunch korbo. ', 143, '2024-06-19 19:51:04', '44', 69),
(344, 'Ha ar officially lunch korle akta block feature rakhis . ', 143, '2024-06-19 19:51:56', '45', 44),
(345, 'ha ha tikache.', 143, '2024-06-19 20:20:04', '44', 45),
(346, 'ðŸ’¯ðŸ’¯ya brother', 146, '2024-06-19 20:35:17', '49', 0),
(347, 'Motivation pro max vhi  ðŸ˜', 146, '2024-06-19 20:36:56', '44', 0),
(348, 'Wow new guy nice motivation. ', 147, '2024-06-19 20:42:49', '45', 0),
(349, 'Bro thinks he is Thomas Shelby.', 147, '2024-06-19 20:46:30', '44', 0),
(350, 'Exactly.ðŸ”¥', 147, '2024-06-19 20:48:47', '64', 0),
(351, 'Woh hai bhai ðŸ’€', 147, '2024-06-19 20:50:34', '49', 44),
(352, 'Peaky Blinders, this series is overrated.', 147, '2024-06-19 20:50:39', '69', 0),
(353, 'Thnx', 147, '2024-06-19 20:50:58', '57', 45),
(354, 'Btw this isðŸ”¥', 147, '2024-06-19 20:51:28', '49', 57),
(355, 'Not at all', 147, '2024-06-19 20:51:28', '57', 44),
(356, 'really nigga?', 147, '2024-06-19 20:51:39', '64', 69),
(357, 'yess! mf.', 147, '2024-06-19 20:52:08', '69', 64),
(358, 'fk u', 147, '2024-06-19 20:54:16', '64', 69),
(359, 'ExactlyðŸ”¥', 147, '2024-06-19 20:55:30', '57', 69),
(360, 'I\'m a big fan of cllian MurphyðŸ”¥', 147, '2024-06-19 20:56:38', '57', 69),
(361, 'u gy', 147, '2024-06-19 20:57:26', '69', 64),
(362, 'me too man ', 147, '2024-06-19 20:57:58', '69', 57),
(363, 'ðŸ˜‚ Same here ', 149, '2024-06-19 21:11:55', '44', 0),
(364, 'Just use it and have funðŸ˜‚', 149, '2024-06-19 21:19:09', '49', 0),
(365, 'Bro are you a philosopher? ', 151, '2024-06-19 21:23:36', '64', 0),
(366, 'ðŸ¤£ðŸ¤£most relatable ', 153, '2024-06-19 21:25:38', '64', 0),
(367, 'No bro', 151, '2024-06-19 21:25:48', '57', 64),
(368, 'pretty huge dark Circle. ', 154, '2024-06-19 21:30:50', '64', 0),
(369, 'ðŸ˜…', 155, '2024-06-19 21:32:03', '45', 0),
(370, 'Sarcastic meaning Sarcasm way', 155, '2024-06-19 21:32:59', '49', 45),
(371, 'ok sorry agar mari koi bat tumhe bura laga to. ', 155, '2024-06-19 21:32:59', '45', 49),
(372, 'Nahi main bura insaan hoon actually bohot bura it\'s not your it\'s my fault', 155, '2024-06-19 21:34:00', '49', 45),
(373, 'pretty huge depression ', 154, '2024-06-19 21:34:12', '45', 0),
(374, 'Same here sorry if I hurted you if     Really Sorry', 155, '2024-06-19 21:34:53', '49', 45),
(375, 'Are gussa mat karo actually thik hai ho jata hai. Agguora ajj rat ke bad band ho jai ga issiliya maine asiya bola', 155, '2024-06-19 21:35:31', '45', 49),
(376, 'Farq sirf itna hai main mazak kar raha tha aur tum seriously le rahi thi yahi nahi karna chahiye tha mujhe woh kya hai main kisiko khush nahi dekh sakta leave if I hurted you ', 155, '2024-06-19 21:36:10', '49', 45),
(377, 'Bro tell me a truth are you really a philosopher?', 156, '2024-06-19 21:36:52', '64', 0),
(378, 'Ya i know if you want to really talk to me then take my number from ayanabha if you want if not then it\'s ok after all we\'re friends that\'s why I\'m saying this', 155, '2024-06-19 21:37:52', '49', 45),
(379, 'h,mmmmm', 155, '2024-06-19 21:39:18', '45', 49),
(380, 'euuuuðŸ¤¢', 149, '2024-06-19 21:40:03', '45', 0),
(381, 'Again Sorry but mera woh intentions nahi tha ekdamm bhi really sorry', 155, '2024-06-19 21:40:27', '49', 45),
(382, 'Right side corner is just âœ¨', 157, '2024-06-19 21:43:12', '49', 45),
(383, 'no.7', 157, '2024-06-19 21:45:13', '44', 0),
(384, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚', 159, '2024-06-19 21:45:57', '44', 0),
(385, 'No3', 157, '2024-06-19 21:47:09', '64', 0),
(386, 'thanks ðŸ˜Š', 157, '2024-06-19 21:50:43', '45', 49),
(387, 'thanks you all', 157, '2024-06-19 21:51:00', '45', 0),
(388, 'no.7 is best', 157, '2024-06-19 21:51:46', '69', 0),
(389, 'hmm', 157, '2024-06-19 21:52:12', '45', 69),
(390, 'ðŸ”¥ðŸ”¥ great ', 158, '2024-06-19 21:53:20', '69', 0),
(391, 'ðŸ”¥â¤', 158, '2024-06-19 21:54:39', '49', 0),
(392, 'Welcome ðŸ™‚', 157, '2024-06-19 21:55:32', '49', 45),
(393, 'Eita number aache 6290892076', 157, '2024-06-19 21:58:18', '49', 45),
(394, 'Me waiting for my future wifu. ', 153, '2024-06-19 21:59:59', '69', 0),
(395, 'I think bro is obsessed with Batman.', 156, '2024-06-20 08:56:12', '69', 0),
(396, 'Life.', 161, '2024-06-20 08:58:38', '45', 0),
(397, 'â¤ï¸ðŸ”¥', 158, '2024-06-20 08:59:11', '45', 0),
(398, 'ðŸ˜‚ðŸ˜‚ same here', 153, '2024-06-20 08:59:50', '45', 0),
(399, 'Beautiful. ðŸ–¤ ', 162, '2024-06-20 09:04:43', '44', 0),
(400, 'no bro is extra motivated. ðŸ˜‚', 156, '2024-06-20 09:05:26', '44', 64),
(401, 'bro I think this might be a sign of an identity disorder.', 152, '2024-06-20 09:07:20', '44', 0),
(402, 'Just think about a time when GitHub did not exist ðŸ’€', 164, '2024-06-20 09:20:54', '44', 0),
(403, 'life.', 161, '2024-06-20 09:21:29', '44', 0),
(404, 'This is literally the good old days when we were very focused on our work. ', 163, '2024-06-20 09:24:15', '64', 0),
(405, 'Did the crypto market crash?', 165, '2024-06-20 09:24:56', '64', 0),
(406, 'nice.âœ¨', 162, '2024-06-20 09:25:32', '64', 0),
(407, 'But this is very dump way to store your code in Google drive. ', 164, '2024-06-20 09:27:26', '69', 0),
(408, 'It\'s php! right', 163, '2024-06-20 09:28:30', '69', 0),
(409, 'Fubuki mommy is always wifu meterial. â¤ï¸', 162, '2024-06-20 09:29:45', '69', 0),
(410, 'Naha! not like that ', 154, '2024-06-20 09:31:08', '69', 45),
(411, 'Same here', 165, '2024-06-20 09:31:52', '69', 0),
(412, 'Don\'t know but I\'ve noticed that the crypto market has been down for the past few days.', 165, '2024-06-20 09:39:15', '44', 64),
(413, 'Same.', 165, '2024-06-20 09:40:09', '64', 44),
(414, 'So what?', 154, '2024-06-20 09:42:10', '45', 69),
(415, 'nothing', 154, '2024-06-20 09:42:44', '69', 45),
(416, 'u bois are very wierd.', 154, '2024-06-20 09:43:06', '45', 69),
(417, 'Thanks.', 154, '2024-06-20 09:43:24', '69', 45),
(418, 'Yess. But old version ', 163, '2024-06-20 09:44:47', '79', 69),
(419, 'Yes, it\'s PHP. PHP is now more updated and better than before.', 163, '2024-06-20 09:47:30', '44', 69),
(420, 'and Agguora is also built in PHP', 163, '2024-06-20 09:48:23', '44', 0),
(421, 'Cool! your website looks really modern and doesn\'t seem like a PHP site at all!', 163, '2024-06-20 09:51:10', '69', 44),
(422, 'thanks.', 163, '2024-06-20 09:51:39', '44', 69),
(423, 'no just see the url it\'s a .php site', 163, '2024-06-20 09:53:05', '79', 69),
(424, 'yeha! I understand.', 163, '2024-06-20 09:53:29', '69', 79),
(425, 'Btc', 161, '2024-06-20 09:54:38', '79', 0),
(426, 'What?', 161, '2024-06-20 09:55:55', '69', 79),
(427, 'ðŸ˜‚ðŸ˜‚', 161, '2024-06-20 09:56:17', '64', 0),
(428, 'Btc and life both. ', 161, '2024-06-20 09:56:38', '79', 69),
(429, 'oxigen?', 161, '2024-06-20 09:57:11', '64', 0),
(430, 'Soul!', 161, '2024-06-20 09:58:02', '69', 0);

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
(14, 'abc', 'hi', '116.193.141.136', '2024-03-04 07:43:40'),
(15, 'Zero', 'Hii', '116.193.141.136', '2024-03-04 07:44:00'),
(16, 'Zero', 'Hellow ðŸ˜…ðŸ‘‹', '116.193.141.136', '2024-03-04 07:55:20'),
(17, 'abc', 'Bitcoin is designed to act as money and a form of payment outside the control of any one person, group, or entity. This means that transactions can be securely conducted between users without the need for third-party involvement in financial transactions.', '116.193.141.136', '2024-03-04 07:56:05'),
(18, 'gigachad', 'hi', '116.193.141.136', '2024-03-04 07:57:37');

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
('11d33fab31098793936612b17e2d435d', '157.40.245.202', '2024-03-04 10:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `ratings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `comments`, `ratings`) VALUES
(9, 74, 'I understand that this website is fairly new on the internet, and there may be some consequences associated with that. However, I would like to leave a message for the website administrator that they need to further develop this website. I recently wrote a thread and submitted it, but suddenly got logged out without any reason and my threads were deleted. As a genuine user, I felt very uncomfortable with this experience. This is my honest review.', 'â˜…â˜…â˜…'),
(10, 67, '', 'â˜…â˜…â˜…â˜…â˜…'),
(11, 49, '', 'â˜…â˜…â˜…â˜…â˜…'),
(12, 49, 'This is a great website.', 'â˜…â˜…â˜…â˜…â˜…'),
(13, 69, 'This website is good for freedom of speech the concept of this website is very unique but the problem is less popularity, but I want to give you some free advice to make it better. Mr alpha, you can add a FAQ section for the new user on how to use it because they are unfamiliar with it. I think the advice helps you to grow and make it better. ', 'â˜…â˜…â˜…â˜…â˜…'),
(14, 69, 'Here is a message for admin. Here is an issue is about creating new drive please fixed it ass soon asa possible. ', ''),
(15, 89, 'This is a test comment.', '★★★★★'),
(16, 44, 'Test review: C# is a general-purpose programming language that&#039;s used to develop applications for Windows, Linux, macOS, iOS, and Android. It&#039;s designed to work with Microsoft&#039;s .NET platform, which is a software ecosystem for developing, compiling, and running application code', '★★★★'),
(17, 44, 'Another test review: C# is a general-purpose programming language that&#039;s used to develop applications for Windows, Linux, macOS, iOS, and Android. It&#039;s designed to work with Microsoft&#039;s .NET platform, which is a software ecosystem for developing, compiling, and running application code', '★ ★ ★ ★ ★');

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
  `url` varchar(2555) NOT NULL,
  `uploaded_video` varchar(255) NOT NULL,
  `tag_post_someone` int(11) NOT NULL,
  `post_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_name`, `thread_desc`, `thread_catagory_id`, `thread_user_id`, `thread_time`, `uploaded_image`, `url`, `uploaded_video`, `tag_post_someone`, `post_genre`) VALUES
(59, 'What is pi cryptocurrency? ðŸ¤”', 'Pi coin is a decentralized cryptocurrency that powers the Pi Network. Its purpose is to encourage decentralized peer-to-peer transacting and enable users to mine crypto from their mobile phones', 31, 44, '2024-03-04 17:37:19', '65e5f8bf24f9b5.79824601_images.jpeg', '', '', 0, ''),
(63, 'Good Memories / Happy Memories', 'Good Memories / Happy Memories - Good / Happy Memories ye woh memories hai jinme koi sadness , tension aur depression aane ki ya hone ki koi sambhavna hi na ho means it\'s impossible bas peace , happy and joy se hi bhara ho jo bhi iske baare mein soche uske chehre pe smile aa jaaye . Bohot log ke bohot saare memories hote hai sabke hote hai kuch ke memories friends,family ke saath toh kuch ke friends,family aur kisika madad karke jo blessing milta hai woh bhi. But what i believe is what my thought is memories friends,family ke saath toh bante hi hai which is really a blessing because they are god-gifted unka jagah koi nahi le sakta i actually agree with this but main ye bhi sochta hoon kisika madad karke jo blessings mile woh hota hai actual memories. What i mean is ki maan lo aapka birthday hai ok aap jo birthday pe cake kaattte ho, celebrations karte ho, restaurants jaate ho. friends ,  family ke saath hangout karte ho aur movies jaate ho etc . etc... ok it\'s also a good memories but aap agar yahi birthday mein hospital gaye patients ke families se mile patients ko kya need hai kya chahiye kya medicines chahiye etc... etc... wahi paison se aap agar inka help karoge unse jo blessings aate hai na woh hote hai actual Good / Happy Memories .  So Guys happy memories na sirf family,friends ke saath hi nahi kisika madad karke bhi memories banti hai', 34, 49, '2024-03-06 10:53:17', '65e83d0d046d42.25296202_9d2234e5bcea38984fec5bf4b7cc79d4.jpeg', ' https://www.psychologs.com/importance-of-good-memories-in-our-life/', '', 0, ''),
(65, 'Shiddat', 'Kya hota hai ye pyaar . Sabki apni ek paribhasha hoti hai pyaar ki. Woh shah rukh khan ka dialogue tha na \"Kehte hain agar kisi cheez ko dil se chaho â€¦ to puri kainaat usse tumse milane ki koshish mein lag jaati haiâ€¦..\" isi ka matlab shiddat hota hai. Jis koshish mein shiddat nahi woh koshish kis kaam ki woh pyaar kis kaam ka. Woh hota hai na kuch log bolte hai yaar maine usse shiddat se pyaar kiya hoon but dusri bandi/banda ke saath touchy ho rahi/raha hai. Woh kya thoda jhagda ho gaya relationship mein banda/bandi bol kya di you leave me it\'s over aur aapne use chorh diya woh gusse mein bol kya diya aur aapne use chorh diya kya yahi tha aapka shiddat wala pyaar. Arey relationships mein jhagre,ladaiyaan,breakups aur chorh jana ye sab chalta rehta hai aur main yun bolun toh ye aapki test li jaati hai kya aap wait kar sakte ho if yes toh aap shiddat se usse pyaar karte ho if no move on kar gaye ye bol ke arey bhai main toh usse shiddat se pyaar kiya tha par woh nahi maani arey nahi maani wait kar jaao bharosa nahi hai kya apne pyaar pe apni shiddat pe woh chhote mote jhagre breakups and all ye toh honge hi banda/bandi gusse mein ye bhi bol dega chorh do mujhe breakup aur aap kya kar loge yahi tha aapka shiddat. Agar aapke pyaar mein shiddat hai believe me use family bhi alag nahi kar sakti bhagwan bhi nahi kyuki bhagwan bhi jaante hai kitni tammanna karke aapne use paaya hai. Apne relationships mein hamesha loyal raho apne partner ke saath misunderstanding, gussa, ye toh hogi but aap ko toh apne pyaar pe bharosa hai na shiddat hai na pyaar mein kaafi hai ye breakups ke baad bhi sab theek ho jata hai . Bohot log kehte hai main kyu sorry bolu meri koi self respect nahi hai toh guys meri baat suno agar yahi sochoge toh tum pyaar nahi karte usse shiddat toh durr ki baat hai tab breakup hi kar lo tumhara kuch nahi hoga. Isliye partner agar ruth jaaye kisi baat ka bura lage aapse baat na kare block kar de aapko har jagah se phir bhi aap agar shiddat se usse hi pyaar karoge na woh definitely waapis aayegi/aayega. Shiddat mein bohot takat hoti hai itna yaad rakhna shiddat nahi toh pyaar nahi. Agar aap usse shiddat se pyaar karte hona believe me aapko koi alag nahi kar sakta even breakup hone ke baad bhi woh aayega/aayegi agar usko bhi apki same tadap hai toh. jab koi insaan ko dil pe chot lagti hai na baaton se aapki banda/bandi nahi sambhal pata khudko khaas kar tab jab woh kaam aapko mana kiya gaya ho karne aapne phir bhi kiya mana ke bawajud bhi aapne kiya toh woh gusse se nikal hi jata hai main nahi rehna chaht', 35, 49, '2024-03-06 13:16:49', '65e85eb1a42102.53627992_Shiddat_poster.jpeg', 'https://en.wikipedia.org/wiki/Shiddat', '', 0, ''),
(67, 'The current value of pi cryptocurrency', 'The price of Pi Network (PI) is $54.05 today with a 24-hour trading volume of $618,223.32. This represents a 45.86% price increase in the last 24 hours and a 55.21% price increase in the past 7 days.', 31, 44, '2024-03-09 20:02:28', '', 'https://www.coingecko.com/en/coins/pi-network#:~:text=The%20price%20of%20Pi%20Network%20(PI)%20is%20%2454.05%20today%20with,in%20the%20past%207%20days.', '', 0, ''),
(68, 'Good Thoughts', 'Good Thoughts means positive thinking/thoughts. Woh kehte hai na woh insaan aapke saath kitna bura karke chala gaya phir bhi aap uske baare mein accha soch rahe ho that\'s called Good thoughts.Ya phir hum kabhi kabhi sochte hai na yaar mera birthday aa raha hai main na ye celebrations,cakes and all mein invest nahi karke kisi madad kar doon unhi paison se jaise hospitals mein jaakar marizon ki saheta karna unke jaruraton ke baare mein jaankar unki madad karna ya phir social work karna.Woh hote hai na kuch log life mein aakar ek toxicity spread karke chale jaate hai kuch log bohot bura bolte hai gusse mein unke saath ye ho jaaye woh jaaye par what my suggestion is phir bhi uske baare mein accha hi soch rakho isse unko sabak milega ki main iske saath itna galat kiya phir bhi ye insaan mere prati acchi soch rakhta hai. Gusse se boli hui baatein aksar utni maayne nahi rakhti maayne aapki soch rakhti hai ki aap uss particular person ke prati aapki soch kya hai.Jitne positive rahoge utne hi kamyab insaan banoge toxicity bankar kuch nahi rakha hai.Balki aap khud apni nazron mein geeroge toxic aur negative bankar kisi ka kuch na kabhi gaya hai aur nahi jaayega aap apna image khud hi kharab karoge aur shayad kismat bhi. Aap acchi soch rakhte ho phir bhi koi insaan aapke baare mein bura sochta hai toh kya hua woh unki soch hai apki nahi balki woh aapse ulta seekhega.Zindagi mein ek baar andhera zarur aata hai phir uske baad ujaala bhi toh hota hai.Zindagi mein kuch rakho ya na rakho good/postive thoughts zarur rakhna. Life mein paisa,daulat aur bank balance agar important hai toh ye bhi important hai egoistic aur attitude person mat bankar rehna warna believe me emergency ke time pe jo log aapke paas hai woh bhi saath nahi denge.', 36, 49, '2024-03-10 07:01:50', '65ed4ccec02a82.63736813_images.jpeg', 'https://en.wikipedia.org/wiki/Positive_thinking', '', 0, ''),
(69, 'Wha is Dark Web ðŸ¤”?', 'As a teenager, I had a random question pop into my mind: what is the dark web and why does it sound so creepy? ................. The dark web is the part of the internet that is not indexed on regular browsers. We need a special browser to access it.  Dark Web it\'s sounds illegal and creepy but it\'s not creepy at all. The dark Web is the hidden part of the internet so it maintains strong user anonymity that is why the dark web is also a better place for illegal activities, now the problem is many people are scared when he/she hear about the dark web. But the fun fact is the dark web is a more peaceful area of the deep internet and also it depends on the use that\'s was his/her purpose to use the internet.  Sometimes the surface web is more dangerous than the dark web, the matter is not about the technology this is about the human mindset. ...... So here is a common question that pops up in my mind,  what is the difference between the surface web and the dark web? ...... There is a three-layer internet. Layer1: Surface Web  5-6% on total internet, which we use in our daily life like Facebook, Instagram, Google...etc. Layer2: Deep web 90-95% of total internet, The Deep web is nothing it\'s an internet area that is not indexed on any search engine and the fun fact is we all use the deep web in our daily lives like Email, WhatsApp chats, personal details, your academic details which is circulating on the internet but not indexed on search engine. Layer 3: Dark Web 4-5% of total Internet The dark web is the hidden area of the Internet but it\'s not indexed on regular browsers, we need a special browser to access it.  Here I share an image so you can imagine how the internet ice bug works.', 38, 64, '2024-03-10 10:57:00', '65ed8ed21ed9f7.57315279_images (4).jpeg', '', '', 0, ''),
(70, 'T20 cricket World Cup ', 'What do you think the squad for the cricket World Cup be for India?', 39, 67, '2024-03-11 16:42:30', '', '', '', 0, ''),
(71, 'Who is Fubuki ? ', 'Fubuki is a tall, beautiful, and always very elegantly dressed woman. She is also known by her alias \"Blizzard of Hell\" as she is is a B-Class hero and the younger sister of the famed S-Class hero Tatsumaki, making her one-half of what is known as the Psychic Sisters in the world of the anime and manga, One Punch Man.', 40, 69, '2024-03-12 19:14:01', '65f09c69e78333.06850140_848825f40c34b113462e0453aae8e73d.jpg', '', '', 0, ''),
(72, 'What is the current value of btc (Bitcoin).inr?', 'According to Forbes Advisor, as of March 13, 2024, 1 Bitcoin (BTC) is worth 5,967,663.600286 Indian Rupees (INR). What you think it will be increase or not? ', 41, 44, '2024-03-13 10:57:43', '', '', '', 0, ''),
(73, 'Current btc value in USD.', 'Will it increase or the market will be crash ðŸ¤”?', 41, 69, '2024-03-13 19:08:23', '665ebfaf0b9a05.33864136_61Iw4aixZ1L.jpg', '', '', 0, ''),
(74, 'Bigger then elder sister ðŸ˜‚ ', 'Do you know that Tatsumaki is the elder sister of Fubuki ðŸ˜…?', 40, 45, '2024-03-15 18:36:14', '666038bb2d3cc5.80155553_fubukixtatsumaki.png', '', '', 0, ''),
(85, 'Waiting in Love', 'Waiting in Love this line means wait karna apna pyaar ke liye right yes there\'s one more meaning to this is wait karo uska jo kadar kare aapka. Look guys what i mean is jhagre har relationships mein hote hai right kisiko privacy maintain nahi kiye bura lag gaya, uski baat nahi sune bura maan gayi ruth gayi etc... etc... Aapne kya kiya chorh diya use uski halat pe arey khud hi call karegi if he/she calls then well and good if he/she don\'t then move on this is not right this is my perspectives look guys sabka apna apna perspectives hota hai right par yaha pe baat perspectives ki nahi waiting ki ho rahi hai. Aapne kya use manane ki chestha ki? Baat karne ki chestha ki haa yaar sorry mujhse galti ho gayi aage se nahi hogi we can\'t live without each other these lines are enough to melt someone\'s heart but aapne aisa nahi kiya aapne toh wait hi nahi karna hai bas ladki/ladka se matlab hai ye nahi hota hai pyaar ye actually chutiyapa hai yaa toh aap kabhi usse pyaar karte nahi they aur agar kiye bhi toh apne faayde ke liye faayda hua chorh diya use. Nahi guys wait karna seekho jhagre har relationships mein hote hai iska matlab ye nahi ki aaj jhagra hua kal move on nahi aise nahi hota hai aapne bas ye sochna hai sab kuch theek hai ek din sab theek hoga aur wait karte raho agar aapne usse sach mae poore dil se pyaar kiya hai toh baat karne ki chestha karo agar woh mana kare toh wait karo time do space do usko khud hi realize hoga usko ki haa uss ladke/ladki ko apne galti ka ehesas hai maaf kar dete hai aur pehele ki tarah ho jaate hai with each other. Wait karna apka sabse bada loyalty hai yaad rakhna just thoda sa patience rakho aur wait karo uska time do usko ab aapne use rulaya hai aur chahte hai ki aaj ke aaj hi theek ho ye kaise hoga kyuki aapki ki hui saari harkatein use bohot chot pohocha deti hai jisko aap kehte ho usko anger,attitude,ego etc... hai kiya aapne blame uske upar? Thoda time do usko wait karo,patience rakho sab theek hoga aur loyal raho aur kisi aur se relationship mein jaane ke baare mein mat socho kyuki iss phase mein hi jo aapko pasand karte hai woh kehte hai arey chorh do usko bohot buri hai main hoon na hamesha saath rahenge etc... etc... Agar aap uske saath relation mein gaye aur woh bandi/banda aapko maaf kar chuka hoon because he/she loves you agar use pata chala usko toh dard hoga hi aapko usse kahi guna zyada hoga yakeen na ho toh aajma ke dekh lena agar aapne kabhi kisise saccha pyaar kiya ho toh.', 46, 49, '2024-04-13 07:06:26', '', '', '', 0, ''),
(86, 'Ethereum Last price: â‚¹3,29,539.8 ETH/INR ðŸ”¼ 1.36%', 'What is the current value of the Ethereum market?\r\nTap the link and see the current value.', 41, 44, '2024-06-01 20:35:18', '665b6b17816742.16970129_ETH-1.jpg', 'https://wazirx.com/exchange/ETH-INR', '', 0, ''),
(87, 'Those who don\'t know about it ðŸ’€', 'ðŸ¤¡', 41, 64, '2024-06-04 08:46:43', '665eb853e95151.11549218_GPG_PwJXAAA3_Ln.png', '', '', 0, ''),
(89, 'How awkward is it? ', 'When I see this meme, it makes me feel awkward. ðŸ¤¡', 47, 44, '2024-06-05 11:27:35', '66602f8752d050.77496192_GPG_PwJXAAA3_Ln.png', '', '', 0, ''),
(90, 'The Doge website link has been officially added to Coin Market Cap.', 'Finally, the Doge website link has been added to Coin Market Cap. You can check it out through the link. ', 41, 69, '2024-06-05 11:33:55', '66603103b55aa0.68186034_GPTCv4LWsAAcAcj.jpeg', 'https://coinmarketcap.com/currencies/dogecoin/', '', 0, ''),
(91, 'Relatable ðŸ’€', 'When I first studied about cryptocurrency, I was very excited. However, after a year, I realized the reality of it.', 47, 69, '2024-06-05 11:40:16', '666032802c7b50.93064144_GPSQuXZbAAE7aMD.jpeg', '', '', 0, ''),
(93, 'The network has reached over 11.1 million KYC\'d Pioneers', '', 31, 44, '2024-06-10 19:31:40', '6667387ccef786.31873822_GO7rWZtXsAAaY3s.jpg', '', '', 0, ''),
(94, 'whoâ€™s here with me?ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚', '', 31, 64, '2024-06-10 19:34:25', '66673921e55db0.74758993_GO71UkCXQAASxVM.jpg', '', '', 0, ''),
(95, 'Will Doge surpass Bitcoin in market valuation? ', 'Just take a look at the meme. What are your thoughts? Do you think Doge will surpass Bitcoin in market valuation? ðŸ™‚', 47, 64, '2024-06-10 19:43:29', '66673b41096e43.29777457_GPFNUKVXgAAyxIE.jpeg', '', '', 0, ''),
(97, 'Comely Na!!!!!! And why not afterall he\'s very popularðŸ˜Ž', '', 52, 49, '2024-06-12 11:38:02', '66696c7a293676.95342385_WhatsApp Image 2024-06-12 at 3.02.10 PM.jpeg', '', '', 0, ''),
(99, 'I will, Until I was arrested. ðŸ˜‚', '', 47, 69, '2024-06-12 12:38:28', '66697aa49a19d3.61053223_GP10GsNasAA7Mo0.png', '', '', 0, ''),
(100, 'Which software is he running? ðŸ¤”', '', 53, 45, '2024-06-12 12:46:25', '66697c81a0fdb8.89863239_GPyD90eXEAATvli.jpg', '', '', 0, ''),
(101, 'Which one ?', '', 53, 64, '2024-06-12 13:21:27', '666984b7a99c16.12657501_GPy-n08WgAAO1Ss.png', '', '', 0, ''),
(106, 'After Workouts that sweatðŸ”¥ Feeling Spexy â¤ï¸ðŸ”¥Though it\'s a cool pic of cool bandaðŸ¤§', '', 51, 49, '2024-06-13 06:57:08', '666a7c248a1320.09990126_WhatsApp Image 2024-06-13 at 10.26.50 AM.jpeg', '', '', 0, ''),
(115, 'My favourite color ðŸ¤ðŸ¤', '', 54, 45, '2024-06-13 17:00:57', '666b09a9dd1c64.79904525_IMG-20240613-WA0007.jpg', '', '', 0, ''),
(117, 'Flashback 2023âœ¨', '', 52, 49, '2024-06-13 17:49:43', '666b15179bbad9.37194366_WhatsApp Image 2024-06-13 at 9.18.58 PM.jpeg', '', '', 0, ''),
(118, 'Caption? ', 'Give me some best caption idea spacially for saree pic. ', 54, 45, '2024-06-13 18:05:23', '666b18c32f79b5.24679069_images (7).jpeg', '', '', 0, ''),
(121, 'After a Painful Workouts MyðŸ’ªðŸ»The cuts showing the improvementðŸ”¥Though this is Shivam soðŸ‘€', '', 51, 49, '2024-06-13 19:13:12', '666b28a8d87ca7.34588032_WhatsApp Image 2024-06-13 at 10.38.48 PM (1).jpeg', '', '', 0, ''),
(122, 'When you show her your crypto wallet balance ', '', 47, 64, '2024-06-14 12:51:27', '666c20af89f375.78911216_images (8).jpeg', '', '', 0, ''),
(124, 'Everything is perfect until a coder sees this post.', '', 53, 69, '2024-06-14 19:16:50', '6673ce36539515.44192236_GP3vDG9WUAACXF0.png', '', '', 0, ''),
(125, 'If you see then write this in the comment section ðŸ˜', '', 53, 45, '2024-06-14 19:58:25', '666c84c13a7ff8.79203371_GPzPlR4aoAEjpkX (1).png', '', '', 0, ''),
(127, 'Once upon a timeeee. ..', '', 56, 69, '2024-06-14 20:21:47', '666c8a3bbdda44.35824490_GP8B8bwWsAAN_Fo.jpeg', '', '', 0, ''),
(130, 'Doge supremacy!!', '', 47, 64, '2024-06-15 07:39:43', '666d291fe8e106.27776976_41a804d22ccbc7643d6063a47010ac1b.jpg', '', '', 0, ''),
(134, 'Cute fubuki ðŸ˜', '', 40, 69, '2024-06-19 11:20:07', '6672a2c7bbe040.49944765_1e4c9c3e600d1692d635e010ac3e400f.jpg', '', '', 0, ''),
(135, 'Really!', '', 47, 64, '2024-06-19 11:33:26', '6672a5e6877e69.88555120_GQXvZfTWAAA890e.jpeg', '', '', 0, ''),
(136, '', '', 53, 64, '2024-06-19 11:36:39', '6672a6a7b61cb0.16381641_72b59b1b8e1e12e3a72515fabde51856.jpg', '', '', 0, ''),
(138, 'Who are you believing?', '', 53, 79, '2024-06-19 11:44:21', '6672a8753ccef7.98833498_GQRxOUKWYAAR5gt.jpeg', '', '', 0, ''),
(139, '', '', 53, 64, '2024-06-19 11:46:30', '6672a8f62adf32.11702088_GP9hATpbAAE3McX.jpeg', '', '', 0, ''),
(140, 'Just look at the view. How beautiful it is. ðŸŒ', '', 53, 45, '2024-06-19 11:49:33', '6672a9adc9bf23.13090965_GP_PXImWQAAsHKN.jpeg', '', '', 0, ''),
(141, 'If she give you a gift like this can you accept it? ðŸ¤§', '', 40, 45, '2024-06-19 15:51:36', '6672e268b11f16.31384031_images (9).jpeg', '', '', 0, ''),
(143, 'Aisi ladki chahiyeðŸ’€', '', 52, 49, '2024-06-19 18:11:34', '667303361522e8.43387482_WhatsApp Image 2024-06-15 at 10.54.09 PM.jpeg', '', '', 0, ''),
(145, 'Those who have no enimes. . .', '', 53, 69, '2024-06-19 19:35:41', '667316ed642258.10442500_0337817217a9e60848b7263b48ed0514.jpg', '', '', 0, ''),
(146, 'Nothing is impossible', '', 57, 57, '2024-06-19 20:24:04', '6673224412e0e2.03145112_Screenshot_20240619-235156_Google.jpg', '', '', 0, ''),
(148, '', '', 53, 45, '2024-06-19 21:03:48', '66732b94f36842.33117948_351fa6e4e86ac09521428658d4afd79b.jpg', '', '', 0, ''),
(150, '', '', 53, 44, '2024-06-19 21:12:42', '66732daa5f25a8.03553033_958ef5d3f6176eb39c1ae89b87eb2a62.jpg', '', '', 0, ''),
(152, 'I save myself at night from my third character', '', 53, 69, '2024-06-19 21:15:32', '66732e54cce0f9.53581042_b8d4dbb51fc78ca723ebbeaabf9167db.jpg', '', '', 0, ''),
(153, '', '', 53, 49, '2024-06-19 21:24:42', '6673307a02e518.15026985_IMG-20240620-WA0005.jpg', '', '', 0, ''),
(154, 'pretty HaRd dick', '', 53, 69, '2024-06-19 21:27:06', '6673310a8aa4c3.38300430_d1bb11182df7e5eaee1a8d4014fe3df8.jpg', '', '', 0, ''),
(155, 'ðŸ¤§', '', 53, 49, '2024-06-19 21:31:01', '667331f5240585.84874918_IMG-20240620-WA0027.jpg', '', '', 0, ''),
(156, 'That\'s why Failure is important in our life', '', 57, 57, '2024-06-19 21:32:35', '66733253ce4cb8.75495302_Screenshot_20240620-005906_Google.jpg', '', '', 0, ''),
(157, 'Which hairstyle is best?', '', 53, 45, '2024-06-19 21:41:10', '6673345669bcf5.48227633_460716809a206cbe475c0e4b7c2bb4c2.jpg', '', '', 0, ''),
(158, '', '', 53, 44, '2024-06-19 21:41:45', '66733479d52d57.22979300_GPpoCayWcAA384w.jpg', '', '', 0, ''),
(161, '', '', 47, 69, '2024-06-20 08:38:30', '6673ce665d4717.48277892_GPhPJUgakAAj1N8.png', '', '', 0, ''),
(162, '', '', 40, 45, '2024-06-20 08:57:51', '6673d2efed35a1.62153826_68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f3669574f386f46536631704270413d3d2d34332e3136653564663632306365396339646432333633313432363839312e6.jpeg', '', '', 0, ''),
(163, 'Do you remember those old days?', '', 56, 44, '2024-06-20 09:03:17', '6673d435c61676.14400437_266377314.jpg', '', '', 0, ''),
(164, 'The worst nightmare for coders.', '', 56, 64, '2024-06-20 09:11:42', '6673d62edf0586.52046847_5e8otrwlfo71smasf6pz.jpeg', '', '', 0, ''),
(165, '', '', 47, 44, '2024-06-20 09:14:23', '6673d6cf06b8c6.78997032_qsec09nc8h7d1.jpeg', '', '', 0, ''),
(166, 'What is happening with it? Why is everyone quiet and not taking any action?', '', 41, 44, '2024-11-13 23:46:57', '6734ed19c46f36.67867554_fuck-wazirx.png', '', '', 0, ''),
(167, 'This is a test heading for development it will be delete soon', '', 59, 44, '2024-11-19 19:50:21', '673c9ea58161e9.78966818_', '', '', 0, ''),
(168, 'If you want to remove all whitespace:  $str = preg_replace(&#039;/\\s+/&#039;, &#039;&#039;, $str);  See the 5th example on the preg_replace documentation. (Note I originally copied that here.)  Edit: commenters pointed out, and are correct, that str_repla', 'If you want to remove all whitespace:\r\n\r\n$str = preg_replace(&#039;/\\s+/&#039;, &#039;&#039;, $str);\r\n\r\nSee the 5th example on the preg_replace documentation. (Note I originally copied that here.)\r\n\r\nEdit: commenters pointed out, and are correct, that str_replace is better than preg_replace if you really just want to remove the space character. The reason to use preg_replace would be to remove all whitespace (including tabs, etc.).', 59, 44, '2024-11-19 19:51:25', '673c9ee5e51dd3.53421306_', '', '', 0, ''),
(169, 'What is php ?', '', 59, 44, '2024-11-19 20:36:44', '673ca98452bdf3.28769033_fucking-problem.png', '', '', 0, ''),
(170, 'WBJEE JECA 2025 syllabus will be released online at wbjeeb.nic.in. Through the WBJEE JECA syllabus 2025', 'candidates will be able to check the list of subjects, units and topics that the candidates will have to prepare for the examination. Before commencing the preparation process, the candidates are advised to check the detailed syllabus of WBJEE JECA 2025 carefully. By being familiar with the WBJEE JECA syllabus, the candidates will be able to understand how to prepare their study strategy. WBJEE JECA 2025 syllabus consists of topics from the Undergraduate Computer Application Course followed by the various universities of India. Along with the syllabus, the candidates are also advised to check the official WBJEE JECA 2025 exam pattern. Read to know more about WBJEE JECA Syllabus 2025.', 59, 44, '2024-11-19 21:31:35', '673cb65fc4d3d0.71591311_', '', '', 0, ''),
(171, 'The papers will be based on Undergraduate Computer Application and equivalent courses followed in various Universities in India and on the following topics.', 'C Programming: Variables and Data types, IO Operations, Operators and Expressions,\r\nControl Flow statements, Functions, Array, Pointers, String Handling, Structures and Unions,\r\nFiles Handling, Pre-Processor Directives, Command Line Arguments.', 59, 44, '2024-11-19 21:56:47', '673cbc47c612d9.28560393_463961729_8168767043235371_201620692862423589_n.jpg', '', '', 0, ''),
(172, 'I think today is fucking day', '', 59, 44, '2024-11-19 22:12:58', '673cc01241b234.19792147_', '', '', 0, ''),
(173, 'I think tommorow will be my fucking day', '9. Software Engineering: Introduction to Software Engineering, A Generic view of process,\r\nProcess models, Software Requirements, Requirements engineering process, System\r\nmodels, Design Engineering, Testing Strategies, Product metrices, Metrices for Process &amp;\r\nProducts, Risk management, Quality Management.\r\n10. Machine Learning: Classification, Decision Tree Learning, Artificial Neural Networks,', 59, 44, '2024-11-19 22:13:38', '673cc03a386034.30642369_', '', '', 0, ''),
(175, 'This is a test video for development it will be delete soon', '', 59, 44, '2024-11-19 22:18:06', '673cc1465ec3e8.44928311_', '', '', 0, 'fuckkk');

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
  `cake_day` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session_token` int(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `clg_university` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `looking_for` varchar(255) NOT NULL,
  `interest_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `repassword`, `datetime`, `profile_pic`, `about`, `gender`, `country`, `cake_day`, `email`, `session_token`, `school`, `clg_university`, `status`, `looking_for`, `interest_in`) VALUES
(44, 'Ayanabha Chatterjee', '$2y$10$5VRRh2YN29tn0OSAPhp3OO3VUecwDo0BHUFZ5NOcDtywZDbkSxkpm', '$2y$10$Ygw/H928wfMGWJU2g0G9I.QNAU0tCH5k6/S5IOPHBqCQtD36RbgsC', '2024-03-04', 'me2.jpg', 'Student, Programmer &amp; Founder of Agguora', 'male', 'India', '2004-03-08', 'ayanabhachatterjee@gmail.com', 0, 'Dum Dum K.K. Hindu Academy', 'Brainware University', 'student', 'girlfriend', 'woman'),
(45, 'Soma Sarker', '$2y$10$5cqQPLjkSI6NOCjq777zLuiKFjmW18sb5.UB5c.MVY.DqypQ5iNuy', '$2y$10$Y8Rj7uxG8csiqnsxfkwWTu5zpjWSMFvmNKLL5R2Xr1VejTZkUYlWu', '2024-03-05', 'momy.jpg', 'Introvert,  Anime lover. ', 'female', 'India', '', 'sahajhuma012@gmail.com', 2147483647, '', '', '', '', ''),
(46, 'Shrabani ', '$2y$10$YEUUOxqLqerV3KfeIS0ydu.UYnEvFQBkgURm7/fE2Pnt1EM1BR.v.', '$2y$10$QDHi5WsmL8aAz8lmAOhNC.JZvysYYrD82Q1Sh8TAbYKeaSPHi25MC', '2024-03-05', '', 'I like to stay very simple.  ', 'female', 'India', '2004-05-01', '', 0, '', '', '', '', ''),
(48, 'Mr.Roy', '$2y$10$Jfzdurj3G75T2fmD9ESfluyQEFLbT85Ad2xvGBDBTF1KykKPrJp4S', '$2y$10$avlS2kkANHYVI5gHVqsKg.s0IBs4ndKVgJG.Yk9GZ1f6j4CqX75CS', '2024-03-06', 'IMG_20240303_234248_145.jpg', 'Stay Foolish like a Fox! ', 'male', 'India', '03/08/2003', '', 0, '', '', '', '', ''),
(49, 'Shivam Gupta', '$2y$10$rn7cUkncNmBn3a8bdTYdxe4ZjsjQlvFwsChRzR2ZwlKOyK6ZWDKpm', '$2y$10$f/T4D/QR2c05gN4v1ITjo.NGWCaxGgYs7W7hW0t3z1bO1zXAtmtI6', '2024-03-06', 'Snapchat-802197207.jpg', 'Just be positive and be loyal in lifeðŸ˜Ž', 'male', 'India', '2003-09-09', '', 0, '', '', '', '', ''),
(50, 'Ahana', '$2y$10$07MwQdKh5Jznk3vu8C1uBu5ElVw0OtYI4jwr4P50dyFrDEfgtuJ/i', '$2y$10$AlR9n7hCsfcIpnHDXAD64uih1lQotsRsoNShNLGmgtEvOMopM/Twy', '2024-03-06', '', 'Nothing here', 'female', 'India', '2002-02-11', '', 0, '', '', '', '', ''),
(51, 'Rahul ', '$2y$10$mRv9sYY/j8/pFJKjtOP6C..wzUUNnRNiA1KUjCSj0vRkV2.lhwshC', '$2y$10$kRsIHmCrxKK2UdOecN.5c.vTOmzLJoWQNLQXQCVLucDK1Oh/barLe', '2024-03-06', 'Rahul 65e849aa22fb74.82124220.jpg', '...', 'male', 'India', '2003-08-15', '', 0, '', '', '', '', ''),
(52, 'Kristwina18', '$2y$10$ppAExpL6VNav0MZZWXDSpu4Yi.W5in3ljZ0FATthgS494QGo37Wza', '$2y$10$6KMNcZ/sEUEDvJ6uYEDhae4doJ0ECakNcjzY9EsmLPfqtK5pSce0y', '2024-03-06', '', 'A introvert\r\nRecitation & quotes loverâœï¸\r\nObsessed with myself â™¥\r\n', 'female', 'India', '2003-04-15', '', 0, '', '', '', '', ''),
(53, 'agnik', '$2y$10$Cdju2fK/j2ufNzfCZ0JI3eouD0aSgYm.TnelSx8w1.ol9Dxj4ON/y', '$2y$10$o/oRYa0CAHkMwYb10aXQ3ef/ti9S5S/FdPrnNGgvhq2VOnUy6kByW', '2024-03-06', '', '', 'male', 'India', '2003-09-05', '', 0, '', '', '', '', ''),
(54, 'Siddharth420', '$2y$10$pU4.p3Z6A1yja9KVyA6Wn.Bg0T4hOKH.x1b/VFYZMsrcwrzDeFJ9K', '$2y$10$rpT1d7C6sSZtkBin/jXCxOkke3bky1ReU.xpjhZM0HdbI1ILe87hK', '2024-03-06', '', '', 'male', 'India', '2003-11-21', '', 0, '', '', '', '', ''),
(55, 'Diya', '$2y$10$dD/4aO4W9ZFDB3nagEvoW.FWR7RAht.wdy7vdoasMXCvG5AerGRTq', '$2y$10$BGYgMr4RqzjZDwyKN8iT3urNHNdW41QN.2Ncp9/8hurxb3xE60B7i', '2024-03-06', '', 'Curious girly', 'female', 'Not mentioned', '2005-01-12', '', 0, '', '', '', '', ''),
(56, 'Piyush Biswas', '$2y$10$gMTQKPKubwbtkON4fOY0f.iH7LjcJGMJdPsu9aqQExfdfi9AyPMyS', '$2y$10$qaTjhPxsZotAUIiCEqooJuzd3c3Fove5Y1lEB0Q9qSkdrUw70gCVq', '2024-03-07', '', '', 'male', 'India', '2003-11-05', '', 0, '', '', '', '', ''),
(57, 'Jeet Sekhar Deo', '$2y$10$SaXVGqpn5uRsqmSG2bW.COUVrbZA1A1AtPq3N6CmjpdxpZbVB26uG', '$2y$10$tZaarviJZxqeOHKB/5IZIOyaAH/C36Q83pqDADWJ6a7XKRi7lq7Ea', '2024-03-07', 'Jeet Sekhar Deo65e9582637ae81.10752186.png', 'Always be water my friend.', 'male', 'India', '2003-11-30', '', 0, '', '', '', '', ''),
(58, 'Vivek08', '$2y$10$aKp/anTwYSk9L4NVdHuP2u9I6ottZOM8jornXqnlIV0RDk9qq4u6O', '$2y$10$wtok2K4HTQMTsS.bMzGa8.IyKOizT4n93eFY.olM/xVKwB0OS1lC.', '2024-03-07', '', '', 'male', 'India', '2003-05-08', '', 0, '', '', '', '', ''),
(59, 'Roy.Biswarup', '$2y$10$0eI2mCBVWXc76Djfu7tCgu7GPys8aDQMx8t6.oZfq8IB8yuR4ip.W', '$2y$10$u6/VbglkBdhE./BRHxJYjeKu1Je8RbcaRXm7oZNQQQVeE4PgybD.i', '2024-03-07', 'download.png', '', 'male', 'India', '2007-08-29', '', 0, '', '', '', '', ''),
(60, 'Neha Chowdhury', '$2y$10$.Ohl/1tMRl1hp9oALUXUJeuPYCVu4y8.MNaDCa4f1FLJEcaYi/ec2', '$2y$10$pBZbhHVsFPtTmmW2Ed9Z7On9xoJ1VqOGHFl7p5Y9gTwwSCV2xpC0W', '2024-03-07', '', 'Hello', 'female', 'India', '2004-07-03', '', 0, '', '', '', '', ''),
(61, 'Sipra', '$2y$10$j1IM7wg0kLZTnocpole..uttV/0Lwt2HmWrliwgu0dShUatKGlVmW', '$2y$10$71HnwT5lEdOEHtbinGUViuE3xjmtRtoe9RShXvA/ogMB1DtxUrq8K', '2024-03-08', 'Sipra65eb1f23368f41.47272351.jpg', 'Hello ðŸ‘‹ everyone ðŸ˜Š', 'female', 'India', '1971-10-31', '', 0, '', '', '', '', ''),
(62, 'RIMI', '$2y$10$TBeou0/6Bi3suhQDz33Y0O.tvFkE8IgqJnrVybCzKhcZAv1ttXTAy', '$2y$10$crlSIKBsa/467D5bJJeznO5MPl77iGcuoenqxxi82LiSjjfNWxdDO', '2024-03-08', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(63, 'Ghosh Babu', '$2y$10$ukQAZzcdRnRTdX7xd5EAqe0hNLlK2ytR7OruLL81m6mEBIMI51tWm', '$2y$10$hns3qN21lhTpbcOu/jxSwu81y6A9sv2OryThLZIhbymKg1EHnX5qi', '2024-03-08', 'Screenshot (79).png', 'Cholo sobai aksathe hasi.', 'Prefer not to answer', 'India', '2003-11-15', '', 0, '', '', '', '', ''),
(64, 'Zero', '$2y$10$uES.p4WN4oDC.J9dCuEleOdW1vLRp9mTNHPrvZ.i10uox68Y/hK3u', '$2y$10$Xm.aMKd07ZOXY2j9pz9CK.EUROAlA7EWcOUGuUDqaeIG7X4b0o89i', '2024-03-10', 'noluck65ed79b3f28609.33949517.jpg', 'I like to do some creepy shit.', 'male', 'Russia', '2000-01-09', '', 0, '', '', '', '', ''),
(65, 'Hkngizmylife@gmail.c', '$2y$10$.iNkTRMscK4hA/aix2RtkeDKaYaUALSyLcc6MRiwbTLrZeJ0.5iMq', '$2y$10$QRn91g1qmo3vOTC01ktsT.UdLYOZAOpcAb8Wd73nXt7lEtaVr9yF2', '2024-03-11', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(66, 'Hkngizmylife@gmail.c', '$2y$10$Nb6NslqZF3uiw/fKz8vnUeytrg7DJoIJo88UtBsgG3L5qku3mSk0S', '$2y$10$GH0xOe1wnnYFlTERPvVQk.Wd.pHFNYrkCXPo2uGN8hyvMCianW5U6', '2024-03-11', '', '', 'male', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(67, 'Ar12agnik ', '$2y$10$KbWHdH2/WU3UY8XFbAun7OD6KfhjUsGPhxl5sxm29lU0FLNveSGmK', '$2y$10$n3qT3O.Fs.zWu7J.T9/SYeGOsDrVKIWi9Ush5vfqcgbnTEEW9y3gu', '2024-03-11', '', 'Nothing but privacy matters', 'male', 'India', '2003-09-05', '', 0, '', '', '', '', ''),
(68, 'Akshay', '$2y$10$iBiupt.gBy1jPdw57gZRcudnVwos1zKkxOuIwkK2p9/4V35zicLGC', '$2y$10$sxQc0EeYZAkiuafWpjD2/e68I4/hnWULK1r/aFAUmGAtAj/UxfWCm', '2024-03-12', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(69, 'nobu', '$2y$10$bN4ifgUVd6UtvaeQ65OdA.5j0Y6J0j4tUxbIDlxJ.2odE4HR9nMVy', '$2y$10$PbSG24paBRMaX1qnPdKi3esNMdE3BMHlCjkiyiXLlI1g6IDU7rziK', '2024-03-12', '00e92b8585ff677f79b0503a0f3f2142.jpg', 'No one perfect like fubuki mommy!', 'male', 'Germany', '2002-12-06', '', 0, '', '', '', '', ''),
(70, 'red', '$2y$10$Gba9c7hMioBuH/iqkmhVm.bR7q112p98rJrlTQgoOLBs9IbA14qT6', '$2y$10$gcsJzfbGni5iN9aVfsJRNeOjdoVfCuJe4sn0fwjotuTeAFLPMNN3q', '2024-03-13', '', '', 'male', 'India', '2024-03-13', '', 0, '', '', '', '', ''),
(74, 'AbedlessGuy ', '$2y$10$onmJ1TF7vQ7Q0B15axo3sO.rj3hp60rSzvq04rM80gfgjqjPD0Zxi', '$2y$10$2eIPbRy.bq3QioafN08AYuKMqV0.KLRnofYzIwHIjH9o3mqF//66u', '2024-03-31', '', 'I Like to give hoyahs', 'male', 'India', '2009-02-11', '', 0, '', '', '', '', ''),
(75, 'fosty2', '$2y$10$WZhx5llxGfl6lpZXWKYCou8A27QOauCHxmxoHkeZYzxZ8ATNeEY56', '$2y$10$IakVbADLzl49fmAlzhDabOxqYYU4MlQI9HOiCEc50AKkUAuX.SCbG', '2024-04-16', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(76, 'belhowa', '$2y$10$CDoO0icVqcALGxfVeRG55Of5JN5A.E8NCqaLv0hr2hiP7DLn8vImG', '$2y$10$4LnIQI0FbKFC4JYvOW6GD.mW5OiGqKjSZn.IP.lapO4P7GfR8rYKG', '2024-04-30', '', '', 'male', 'Algeria', '1977-02-06', '', 0, '', '', '', '', ''),
(77, '_biswarup._', '$2y$10$6YOed75oZ.eVlOXzCFO32OWAGOLm7/zbmNdsXQom9/5o8ErFBwZ1S', '$2y$10$uFe9KwiMeAl59mMpdU8gLeiY/eHXsuq03fFHPppLdhfe72rZkNGeK', '2024-05-16', '', '', 'male', 'India', '2007-08-29', '', 0, '', '', '', '', ''),
(78, 'rounak', '$2y$10$LVxsiotqGbnp.B61/NBbMOEOhE/4X0LJ8O9yuSI6ca6gfdRUTOoOW', '$2y$10$DPfAwN4hQoHwRKqE4fBoC.lujck09gAWxTnoBwxKkJPcDQRd4vE9.', '2024-06-05', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(79, 'Dogo6', '$2y$10$ldxEOYrUlz0veedtCf3yHOnIH13.1xIGfTKUAxp9Gu.LLRn212Guq', '$2y$10$t9WeG2JWDtERnTVdIBGs4OkoFryP.0EtdyCcc46whFWoC0h7jkWee', '2024-06-05', '', 'Freelancing agency ', 'male', 'Australia', '1998-11-06', '', 0, '', '', '', '', ''),
(80, 'Babai das', '$2y$10$F8xarVEQTFUx2CYiIX1Y3.2ygp3P7OBpHzjIQZY4xSgrC0EEt9cu2', '$2y$10$BpQele/eJAplGp3IPJ3KnuRxg.YfOVGn2XoylO4WOVUUocCPgro9W', '2024-06-06', '', '', 'Select your Gender(O', 'Select your country(Optional)', '', '', 0, '', '', '', '', ''),
(81, 'Debdude', '$2y$10$jxP1BCuZ228AOL8/k5hVB.G8eN.DFECmOGHGGfdGR0hFN8n.7Th/i', '$2y$10$qHshxomlMYJkpIWKGBh6IuvBvnHJqlfSroV73lnlMV8SGz2o30Az.', '2024-06-12', '', 'Never give up. Ego is necessary\r\n', 'male', 'India', '2004-07-29', '', 0, '', '', '', '', ''),
(82, 'kazuha', '$2y$10$dzquMq/CsOIkHQsOUut5FOwWUh54na0P06Osm8KIP0kwpndLxr9Ni', '$2y$10$jHYl3Vwr5UNk02IN6viOjeCyAD/qULlcl4hrSv7lNJfR4HpjHsdCm', '2024-06-12', '', '', 'male', 'Bahrain', '1865-02-13', '', 0, '', '', '', '', ''),
(83, 'Bong_hunk', '$2y$10$BHCo/APgZg078A/uyJd6ue7KPcoVCr.0v0dh6CyHmiSp6EEdtAcPW', '$2y$10$2V9tNIXT7R6x1VwfE23h8.czMgM54gK55ZpYIs7eduTc0Oi0BlURu', '2024-06-12', '', 'I am sexy . Any single girl and unty can msg me . only fun no relationship.', 'male', 'India', '2020-11-15', '', 0, '', '', '', '', ''),
(85, 'testfuck', '$2y$10$9PD9BUKAA1Q7Y6j0E2bCMeJ4Oj4gsVWZ4bm0rSSnqbpWpCOzUnxbq', '$2y$10$SSU8H1HnvPkfnQw1z3iaBejwedU8Q8.E01QEP7jgj3DDlGGLkZ2ay', '2024-09-12', '', 'This is a test user.', 'male', 'Afghanistan', '1999-02-16', 'testfuck@gmail.com', 0, '', '', '', '', ''),
(86, 'newtest', '$2y$10$F19R.qiAeH3LTFh0HjRNweyw7JvRiBv4w9HGnvSmPm1JPjmMOhiAu', '$2y$10$Agtq.3vi.aftlT44zDf2POZpmb4/v0JVYwFkaKSRK5oGbrTVaHZqW', '2024-09-13', '', 'Fuck you', 'male', 'Australia', '1991-06-04', 'fucktest@hotmail.com', 0, 'K.k. hundu academy', 'Brainware university', 'employed', 'girlfriend', 'woman'),
(87, 'anonymus', '$2y$10$1/visynoRgzMoPW2Dygae.td8yF5j4CvyaPJMr7d1YnKrwOYrfsCC', '$2y$10$GTuoy65/pzBXjRw.QoIz2ecMt0yqSZ57idpI71WmSxzTlwMDprTcK', '2024-09-27', 'images.jpeg', 'I am a super bitch', 'female', 'Australia', '2005-02-01', 'anonymous@gmail.com', 0, 'Motijheel Girls', 'Techno India', 'housewife', 'boyfriend', 'nobody'),
(88, 'john', '$2y$10$62CJ4He590OrSzMQo8ddTOU6EYQmPARjmvM/fwUyUh2nAmbbfjs86', '$2y$10$rAwYduIvyD7eiGr0QtB5XOkOazbKRQnASjsc.Wa3OLwG.ZM/it5c2', '2024-10-04', '', 'I will kill everyone', 'male', 'Mexico', '1996-06-05', 'john002@gmail.com', 0, 'Criminal jr st.', 'Devil University', 'robot', 'friends', 'man'),
(89, 'kakashi', '$2y$10$ky8FHyhRJplr05HahGx4QODGtVYM21LBh9AKtHSUS72SMwoMeIBGK', '$2y$10$MLZI6.pxJi2NwXO193i1/O/IgdjtZUspbYPmkP4/Ae/3z0M6CNdO2', '2024-10-04', 'kakashi66fef094b65eb3.09964088.jpg', 'I will fuck everyone.', 'male', 'Australia', '2004-02-03', 'kakashi@hotmail.com', 75128, '', 'Techno India', 'student', 'girlfriend', 'woman');

-- --------------------------------------------------------

--
-- Table structure for table `user_react`
--

CREATE TABLE `user_react` (
  `reaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `reaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_react`
--

INSERT INTO `user_react` (`reaction_id`, `user_id`, `thread_id`, `reaction_date`) VALUES
(4, 87, 165, '2024-09-28 20:50:26'),
(5, 87, 164, '2024-09-28 20:58:01'),
(6, 87, 163, '2024-09-28 20:58:36'),
(15, 44, 161, '2024-09-28 21:14:26'),
(25, 44, 158, '2024-09-28 21:33:32'),
(40, 44, 157, '2024-09-29 01:23:25'),
(42, 44, 156, '2024-10-02 23:08:39'),
(47, 89, 115, '2024-10-04 01:06:34'),
(48, 89, 118, '2024-10-04 01:06:37'),
(49, 89, 138, '2024-10-04 01:07:10'),
(53, 44, 100, '2024-10-27 18:51:43'),
(57, 44, 146, '2024-10-27 20:24:05'),
(59, 44, 162, '2024-11-04 23:45:38'),
(87, 44, 163, '2024-11-13 01:18:26'),
(99, 44, 155, '2024-11-13 01:28:45'),
(101, 44, 152, '2024-11-13 01:28:52'),
(107, 44, 150, '2024-11-13 01:30:40'),
(114, 44, 164, '2024-11-13 21:35:34'),
(115, 44, 165, '2024-11-13 21:36:37'),
(116, 44, 115, '2024-11-13 21:38:24'),
(119, 44, 143, '2024-11-13 21:40:00'),
(120, 44, 166, '2024-11-14 00:03:35'),
(122, 44, 118, '2024-11-14 01:13:42');

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
-- Indexes for table `user_react`
--
ALTER TABLE `user_react`
  ADD PRIMARY KEY (`reaction_id`),
  ADD UNIQUE KEY `unique_react` (`user_id`,`thread_id`);

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
  MODIFY `anno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcement_threads`
--
ALTER TABLE `announcement_threads`
  MODIFY `anno_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user_react`
--
ALTER TABLE `user_react`
  MODIFY `reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
