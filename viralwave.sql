-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308:3308
-- Generation Time: Jul 12, 2024 at 07:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viralwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `message`) VALUES
(1, 'Su', 'Hyunn', 'suhyunn@gmail.com', 'The contents are amazing! Keep Going! Supporting you guys.'),
(4, 'Stevin', 'Chou', 'stevinc@gmail.com', 'Hello Love the service!'),
(5, 'Su', 'Hyunn', 'suhyunn@gmail.com', 'Thank you for your effort. The contents are all helpful for me.'),
(7, 'Mike', 'Zhang', 'mike12@gmail.com', 'Stay awesome! Your hard work is full of surprise!');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image1` varchar(200) DEFAULT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `description`, `image1`, `publishdate`) VALUES
(2, ' How to Recognize and Report Cyberbullying', 'Cyberbullying is a serious issue that can affect anyone. Learn how to recognize the signs of cyberbullying and what steps you can take to report and stop it.', 'NewsImage2.jfif', '2024-07-09 02:01:03'),
(3, 'Staying Safe During Live Streams', 'Live streaming can be fun, but it\'s important to stay safe. Check out our tips on how to protect your privacy and interact safely during live streams.', 'StaysafeOnline.png', '2024-07-09 12:22:28'),
(4, 'Understanding Privacy Settings on Popular Social Media Platforms', 'Privacy settings can be tricky, but they\'re crucial for maintaining your safety online. This week, we\'ve released a new guide that walks you through the privacy settings of popular social media platforms like Instagram, Facebook, and TikTok.', 'NewsImage1.jpg', '2024-07-09 12:36:02'),
(5, 'Use Two-Factor Authentication (2FA)', 'Enhance your account security by enabling 2FA. This adds an extra layer of protection to your accounts, making it harder for unauthorized users to gain access.', 'NewsImage3.jfif', '2024-07-09 12:38:14'),
(6, 'Be Cautious of Phishing Scams', 'Phishing scams are attempts to trick you into providing personal information. Always verify the source of emails and messages before clicking on links or sharing information.', NULL, '2024-07-09 12:39:21'),
(7, 'Jane\'s Journey to a Safer Online Presence', 'Jane, a high school student, shares her experience of how she used our resources to secure her social media accounts and create a safer online environment for herself. \r\n[Read Jane\'s Story]', 'Jane1.jpg', '2024-07-09 12:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `parenthub`
--

CREATE TABLE `parenthub` (
  `ph_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parenthub`
--

INSERT INTO `parenthub` (`ph_id`, `title`, `description`, `image1`, `image2`, `user_id`, `created_date`) VALUES
(1, 'Open Communication', 'We should have ongoing conversations with our teens about their online activities and experiences.\r\n Be an active listener and encourage your teen to share their thoughts and concerns.', 'Opening_Communication1.jfif', 'Opening_Communication2.png', 8, '2024-07-08'),
(2, 'Set Boundaries and Rules', 'Develop a set of rules regarding social media use, including screen time limits and acceptable behaviour in your family.\r\nUse parental control tools to monitor your teen’s online activities, but balance this with respect for their privacy.', 'content1.jpg', 'SetBoundaries2.jfif', 5, '2024-07-08'),
(3, 'Build Critical Thinking Skills', 'Encourage your teen to think critically about the content they encounter online. Ask them questions like, “Do you think this information is true?” or “Who created this post and why?”.', 'CThinking1.jpg', 'CThinking2.png', 5, '2024-07-08'),
(4, 'Provide Resources', 'Share educational materials by providing your teen with resources like Common Sense Media, which offers reviews and advice on apps, games, and websites.', 'resource1.png', 'resource2.png', 5, '2024-07-08'),
(5, 'Identify Red Flags', 'Look out for signs of cyber-bullying, such as your teen becoming withdrawn, or upset after using their devices, or changes in their mood and behaviour. If you suspect your children are being bullied or harassed online, talk to them about it, report the behavior to the platform, and consider seeking help from school counselors or other professionals.', 'cyber-bullying1.jpeg', 'cyber-bullying2.png', 8, '2024-07-08'),
(7, 'Encourage Positive Use', ' Encourage your teen to follow accounts that promote positivity, such as educational pages, inspirational quotes, or interest-based communities (e.g., art, science, sports).\r\nShow your teen how to use social media responsibly. Avoid oversharing, be mindful of your own screen time, and treat others with kindness and respect online.', 'helathyOH1.jpg', 'BeRm1.png', 8, '2024-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `description`, `information`, `price`, `image`) VALUES
(1, 'Interactive Safety Workshops', 'Interactive Safety Workshops are live or recorded sessions where teenagers can learn about various aspects of online safety through engaging and interactive content.', 200, 'Service1.jpg'),
(2, 'Digital Safety Mentor Program', 'The Digital Safety Mentor Program pairs teenagers with trained mentors who provide personalized guidance on online safety. This program offers one-on-one mentoring sessions.', 320, 'Service2.jpeg'),
(3, 'Safe Social Media Challenge Platform', 'The Safe Social Media Challenge Platform is an engaging and interactive service where teenagers can participate in various challenges designed to promote online safety and digital literacy.', 400, 'Service3.png');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `loginlink` varchar(500) NOT NULL,
  `privacylink` varchar(500) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `loginlink`, `privacylink`, `logo`) VALUES
(2, 'Facebook', 'https://www.facebook.com/', 'https://www.facebook.com/privacy/center/?entry_point=facebook_bookmarks', 'FB_Logo.png'),
(3, 'Instagram', 'https://www.instagram.com/accounts/login/', 'https://privacycenter.instagram.com/?entry_point=instagram_settings_page', 'Inta_Logo.png'),
(4, 'Snap Chat', 'https://accounts.snapchat.com/accounts/v2/login', 'https://values.snap.com/', 'Snapchat_Logo.png'),
(5, 'Tik Tok', 'https://www.tiktok.com/login/phone-or-email', 'https://www.tiktok.com/safety/en/well-being-guide', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(8) NOT NULL,
  `city` varchar(500) NOT NULL,
  `subscription` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `profile`, `name`, `email`, `password`, `city`, `subscription`, `user_type`) VALUES
(5, 'Naythan.jpg', 'Administrator', 'admin@gmail.com', 'admin123', 'Yangon', 0, 0),
(6, 'JohnDoe.jpg', 'John Doe', 'jdoe@gmail.com', 'Jd123123', 'London', 1, 2),
(7, 'SuSuProfile.png', 'Su Hyunn', 'suhyunn@gmail.com', 'sh1234', 'Naypyidaw', 1, 3),
(8, 'Jimm.jpg', 'Jimm Hella', 'jimhella@gmail.com', 'JH123456', 'Mandalay', 1, 0),
(11, '', 'Stevin Chou', 'stevinc@gmail.com', 'sc123123', 'Kalaw', 1, 2),
(12, 'dawei.png', '达味', 'dawei@gmail.com', 'dw123123', 'Hong Kong', 1, 3),
(13, 'Selina.jpg', 'Selina', 'selina123@icloud.com', 's123123', 'Yangon', 1, 2),
(14, 'Mike.jpg', 'Mike 张', 'mike12@gmail.com', 'm123123', 'Beijing', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parenthub`
--
ALTER TABLE `parenthub`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `Foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parenthub`
--
ALTER TABLE `parenthub`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
