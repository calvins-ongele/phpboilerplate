-- --
-- settings table
-- --
create table settings(
  id int auto_increment primary key,
  name varchar(50),
  value varchar(250)
);
--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'My New Company'),
(2, 'tel', '0123456789'),
(3, 'email', 'email@example.com'),
(4, 'enable_maintenance_mode', '0'), 
(5, 'enable_dark_mode', '0'), 
(6, 'admin_email_all_notifications', ''), 
(7, 'enable_recaptcha', '0'),
(8, 'recaptcha_site_key', ''),
(9, 'recaptcha_secret_key', ''), 
(10, 'social_youtube', 'https://youtube.com'),
(11, 'social_telegram', 'https://telegram.com'),
(12, 'social_facebook', 'https://facebook.com'),
(13, 'social_twitter', 'https://twitter.com'),
(14, 'social_reddit', ''),
(15, 'social_instagram', ''),
(16, 'social_medium', ''),
(17, 'social_vk', ''),
(18, 'social_discord', ''), 
(19, 'social_github', ''),
(20, 'social_linkedin', ''),  
(21, 'default_currency', 'USD'),
(22, 'short_desc', 'example description'),
(23, 'icon', ''),
(24, 'logo', ''),
(25, 'send_from', 'info@example.com'),
(26, 'send_from_password', 'x12'),
(27, 'smtp_server', 'mail.example.com'),
(28, 'smtp_port', '25'),
(29, 'user_can_blog', '0'),
(30, 'user_can_signup', '1'),
(31, 'user_can_login', '1'),
(32, 'primary_color', '#d1cf1f'),
(33, 'verify_mail', '0'),
(34, 'verify_phone', '0'),
(35, 'strong_password', '0'),
(36, 'user_loop_sequence', '24'),
(37, 'sessions_last', '1'),
(38, 'company_address', '123 street');

-- -- -- --
-- users
-- -- -- --
create table users(
  id int auto_increment primary key,
  username varchar(50) unique,
  user_full_name varchar(100),
  user_email varchar(100) unique,
  user_pass varchar(255),

  created_at datetime default current_timestamp(),
  updated_at datetime on update current_timestamp()
);

-- -- -- -- --
-- analytics
-- -- -
CREATE TABLE `analytics` (
  `id` int(11) auto_increment primary key,
  `visited_at` datetime DEFAULT NULL,
  `referrer` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `screen_res` varchar(20) DEFAULT NULL,
  `page_url` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `is_bot` varchar(40) DEFAULT NULL
)  ;

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `bc_ID` int(11) primary key auto_increment,
  `bc_name` varchar(100) NOT NULL,
  `bc_url` varchar(40) NOT NULL unique,
  `bc_desc` text DEFAULT NULL,
  `bc_views` int(11) DEFAULT 0,
  `bc_image` varchar(100) DEFAULT NULL
);


--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_ID` int(14) primary key auto_increment,
  `blog_title` varchar(100) NOT NULL,
  `blog_slug` varchar(40) NOT NULL,
  `blog_image` varchar(60) DEFAULT NULL,
  `blog_category_fk` int(11) DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_views` int(11) DEFAULT 0,
  `blog_date` varchar(100) DEFAULT NULL,
  `blog_is_published` enum('Yes','Pending') DEFAULT 'Yes',
  `blog_user_fk` int(11) NOT NULL,
  `blog_created_at` datetime DEFAULT current_timestamp(),
  `blog_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  FOREIGN KEY (`blog_category_fk`) REFERENCES `blog_categories` (`bc_ID`) ON DELETE SET NULL,
  FOREIGN KEY (`blog_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
)  ;


--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) auto_increment primary key,
  `email` varchar(70) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` enum('current','completed') DEFAULT 'current',
  `name` varchar(100) DEFAULT NULL
)  ;


--
-- Table structure for table `contents`
--
CREATE TABLE `contents` (
  `cont_ID` int(11) primary key auto_increment,
  `cont_body` text DEFAULT NULL,
  `cont_given_id` varchar(100) DEFAULT NULL unique,
  `cont_title` varchar(300) DEFAULT NULL,
  `cont_img` varchar(100) DEFAULT NULL,
  `cont_date` varchar(40) DEFAULT NULL
)  ;

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` int(11) primary key auto_increment,
  `recipient` varchar(255) DEFAULT NULL,
  `status` enum('success','fail') DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_at` datetime DEFAULT current_timestamp()
);

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `l_ID` int(20) primary key auto_increment,
  `l_message` text DEFAULT NULL,
  `l_by` int(11) DEFAULT NULL,
  `l_type` varchar(50) DEFAULT NULL,
  `l_date` varchar(50) DEFAULT NULL
) ;

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `reset_ID` int(11) primary key auto_increment,
  `reset_email` varchar(50) DEFAULT NULL,
  `reset_selector` text DEFAULT NULL,
  `reset_token` longtext DEFAULT NULL,
  `reset_expiry` int(11) DEFAULT NULL
);

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `s_ID` int(11) primary key auto_increment,
  `s_email` varchar(100) DEFAULT NULL,
  `s_date` varchar(40) DEFAULT NULL
);
