-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 08:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_page`
--

CREATE TABLE `about_us_page` (
  `about_us_id` int(11) NOT NULL,
  `about_us_title` varchar(100) NOT NULL,
  `about_us_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us_page`
--

INSERT INTO `about_us_page` (`about_us_id`, `about_us_title`, `about_us_content`) VALUES
(1, 'About Us', '<div class=\"row align-items-center padding-bottom-3x\">\r\n            <div class=\"col-md-5\">\r\n                <img class=\"d-block w-270 m-auto\" src=\"http://elecom.co/about/received_1319479714889688.png\" width=\"50%\" alt=\"Online Shopping\">\r\n            </div>\r\n            <div class=\"col-md-7 text-md-left text-center\">\r\n                <div class=\"hidden-md-up\"></div>\r\n                <h2>Online Secure Payment</h2>\r\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters ...</p>\r\n            </div>\r\n        </div>\r\n        <hr>\r\n        <div class=\"row align-items-center padding-top-3x padding-bottom-3x\">\r\n            <div class=\"col-md-5 order-md-2\">\r\n                <img class=\"d-block w-270 m-auto\" src=\"http://elecom.co/about/received_2453005351423380.png\" width=\"50%\" alt=\"Delivery\">\r\n            </div>\r\n            <div class=\"col-md-7 order-md-1 text-md-left text-center\">\r\n                <div class=\"hidden-md-up\"></div>\r\n                <h2>Fast & Free Delivery</h2>\r\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters ...</p>\r\n            </div>\r\n        </div>\r\n        <hr>');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_gender` tinyint(1) NOT NULL,
  `admin_country` varchar(255) DEFAULT NULL,
  `admin_region` varchar(255) DEFAULT NULL,
  `admin_profile_picture` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_last_browser` varchar(255) DEFAULT NULL,
  `admin_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_username`, `admin_email`, `admin_firstname`, `admin_lastname`, `admin_gender`, `admin_country`, `admin_region`, `admin_profile_picture`, `admin_password`, `admin_last_browser`, `admin_created_at`) VALUES
(1, 'seunex', 'admin@admin.com', 'Zubayr', 'Ganiyu', 1, 'Nigeria', 'Kogi', 'seunex_elecom.jpeg', '$2y$10$uOhET.z/s7bjQTuTfMpf7OPvJBUag4mR21/qFHXXHePNLH/TVf9bK', NULL, '2019-06-15 05:10:45'),
(5, 'zubdev', 'zubdev@me.com', 'Ayo', 'Adekola', 2, 'Antigua and Barbuda', 'Hells Gate Island', 'zubdev_elecom.png', '$2y$10$yloDaKvGeHR6SlYa.b4Bae1vBIFhxCNcs25oi/cACbptepbOBuzrW', NULL, '2019-06-16 15:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `ca_id` int(10) UNSIGNED NOT NULL,
  `ca_username` varchar(50) NOT NULL,
  `ca_firstname` varchar(100) NOT NULL,
  `ca_lastname` varchar(100) NOT NULL,
  `ca_email` varchar(255) NOT NULL,
  `ca_password` varchar(255) NOT NULL,
  `ca_status` tinyint(1) NOT NULL,
  `is_verify` tinyint(1) NOT NULL,
  `ca_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ca_create_day` varchar(3) DEFAULT NULL,
  `ca_create_month` varchar(3) DEFAULT NULL,
  `ca_create_year` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`ca_id`, `ca_username`, `ca_firstname`, `ca_lastname`, `ca_email`, `ca_password`, `ca_status`, `is_verify`, `ca_created_at`, `ca_create_day`, `ca_create_month`, `ca_create_year`) VALUES
(1, 'seunex', 'Zubayr', 'Ganiyus', 'seunexseun@gmail.com', '$2y$10$u/4uUpeXjPBrjhd5JgkDmuvEk1AXOfl7Z0xGEURj0PrPSUoGJSkMa', 1, 1, '2019-07-13 17:19:54', '14', 'Jul', '2019'),
(3, 'zubdev', 'Zubdev', 'Tester', 'zubdev@me.com', '$2y$10$nuDhCPMr5Ih9r12oxMjzjOMtkgFUCuZkFNt0Ubhx4sCm8PCMlCnl.', 1, 1, '2019-07-15 14:33:26', '15', 'Jul', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `customer_balance`
--

CREATE TABLE `customer_balance` (
  `cus_bal_id` int(10) UNSIGNED NOT NULL,
  `cus_account_id` int(10) UNSIGNED NOT NULL,
  `cus_balance` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_balance`
--

INSERT INTO `customer_balance` (`cus_bal_id`, `cus_account_id`, `cus_balance`) VALUES
(1, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_address`
--

CREATE TABLE `customer_contact_address` (
  `cont_add_id` int(10) UNSIGNED NOT NULL,
  `cont_account_id` int(10) UNSIGNED NOT NULL,
  `cont_company` varchar(255) DEFAULT NULL,
  `cont_country` varchar(255) DEFAULT NULL,
  `cont_city` varchar(255) DEFAULT NULL,
  `cont_zip_code` varchar(50) DEFAULT NULL,
  `cont_address_1` text,
  `cont_address_2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_contact_address`
--

INSERT INTO `customer_contact_address` (`cont_add_id`, `cont_account_id`, `cont_company`, `cont_country`, `cont_city`, `cont_zip_code`, `cont_address_1`, `cont_address_2`) VALUES
(1, 3, 'Yagkbaze', 'Nigeria', 'Abuja Federal Capital Territory', '110066', 'Abuja', 'Abuja');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cu_detail_id` int(10) UNSIGNED NOT NULL,
  `cu_account_id` int(10) UNSIGNED NOT NULL,
  `cu_account_profile_pic` varchar(255) DEFAULT NULL,
  `cu_account_phone` varchar(50) DEFAULT NULL,
  `cu_country` varchar(255) DEFAULT NULL,
  `cu_region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cu_detail_id`, `cu_account_id`, `cu_account_profile_pic`, `cu_account_phone`, `cu_country`, `cu_region`) VALUES
(1, 3, 'customer_zubdev_Elecom.jpg', '345567887', 'Nigeria', 'Kogi');

-- --------------------------------------------------------

--
-- Table structure for table `customer_email_verify`
--

CREATE TABLE `customer_email_verify` (
  `cev_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `customer_username` varchar(255) DEFAULT NULL,
  `verify_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_bundle`
--

CREATE TABLE `customer_order_bundle` (
  `cob_id` int(10) UNSIGNED NOT NULL,
  `cob_account_id` int(10) UNSIGNED NOT NULL,
  `cob_order_number` varchar(15) NOT NULL,
  `cob_product_id` int(10) UNSIGNED NOT NULL,
  `cob_qty` int(11) NOT NULL,
  `cob_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order_bundle`
--

INSERT INTO `customer_order_bundle` (`cob_id`, `cob_account_id`, `cob_order_number`, `cob_product_id`, `cob_qty`, `cob_color`) VALUES
(1, 3, '349CB4CBC7', 5, 1, NULL),
(2, 3, '349CB4CBC7', 2, 1, NULL),
(3, 3, '336BA2EB48', 4, 1, NULL),
(4, 3, '3EC8AEA39C', 4, 1, NULL),
(5, 3, '35EF24FB35', 2, 1, NULL),
(6, 3, '3C1BAA28DE', 5, 1, NULL),
(7, 3, '3C1BAA28DE', 1, 1, NULL),
(8, 3, '376AB4B94C', 4, 1, NULL),
(9, 3, '3290F3DD31', 2, 1, NULL),
(10, 3, '3ED40E3638', 2, 1, NULL),
(11, 3, '3ED40E3638', 4, 1, NULL),
(12, 3, '381452BD23', 5, 1, NULL),
(13, 3, '338E4930BB', 5, 1, NULL),
(14, 3, '338E4930BB', 2, 1, NULL),
(15, 3, '348295D571', 4, 1, NULL),
(16, 3, '3832069A80', 1, 1, NULL),
(17, 3, '3CC3CCF1C0', 4, 2, ' blue');

-- --------------------------------------------------------

--
-- Table structure for table `customer_shipping_address`
--

CREATE TABLE `customer_shipping_address` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_account_id` int(10) UNSIGNED NOT NULL,
  `ship_company` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `ship_zip_code` varchar(50) DEFAULT NULL,
  `ship_address_1` text,
  `ship_address_2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_shipping_address`
--

INSERT INTO `customer_shipping_address` (`ship_id`, `ship_account_id`, `ship_company`, `ship_country`, `ship_state`, `ship_zip_code`, `ship_address_1`, `ship_address_2`) VALUES
(1, 3, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene');

-- --------------------------------------------------------

--
-- Table structure for table `customer_wishlist`
--

CREATE TABLE `customer_wishlist` (
  `cw_id` int(10) UNSIGNED NOT NULL,
  `cw_account_id` int(10) UNSIGNED NOT NULL,
  `cw_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_wishlist`
--

INSERT INTO `customer_wishlist` (`cw_id`, `cw_account_id`, `cw_product_id`) VALUES
(3, 3, 2),
(6, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `em_temp_id` int(10) UNSIGNED NOT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `mail_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`em_temp_id`, `mail_title`, `mail_body`) VALUES
(1, 'welcome_email', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html dir=\"ltr\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n\r\n<head>\r\n    <meta name=\"viewport\" content=\"width=device-width\" />\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n    <title>MatPress - Material Design Demo</title>\r\n</head>\r\n\r\n<body style=\"margin:0px; background: #f8f8f8; \">\r\n    <div width=\"100%\" style=\"background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;\">\r\n        <div style=\"max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px\">\r\n            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; margin-bottom: 20px\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style=\"vertical-align: top; padding-bottom:30px;\" align=\"center\">\r\n                            <img src=\"{site_logo}\"/>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style=\"background:#00a958; padding:20px; color:#fff; text-align:center;\"> <h3>Welcome to Elecom Electronic Ecommerce Store.</h3> </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <div style=\"padding: 40px; background: #fff;\">\r\n                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">\r\n                    <tbody>\r\n                        <tr>\r\n                            <td>\r\n                                <p>Contratulations <b>{user_firstname} {user_lastname} </b></p>\r\n                                <p>Your Account is now fully verify with us and you can now shop freely on our website</p>\r\n                                \r\n                                <b>- Thanks ({site_name} team)</b> </td>\r\n                        </tr>\r\n                    </tbody>\r\n                </table>\r\n            </div>\r\n            <div style=\"text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px\">\r\n                <p> Powered by {sitename}\r\n            </div>\r\n        </div>\r\n    </div>\r\n</body>\r\n\r\n</html>'),
(2, 'acticate_email', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html dir=\"ltr\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n    <meta name=\"viewport\" content=\"width=device-width\" />\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n</head>\r\n\r\n<body style=\"margin:0px; background: #f8f8f8; \">\r\n    <div width=\"100%\" style=\"background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;\">\r\n        <div style=\"max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px\">\r\n            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; margin-bottom: 20px\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style=\"vertical-align: top; padding-bottom:30px;\" align=\"center\"><a href=\"{main_url}\" target=\"_blank\">\r\n                        <img src=\"{site_logo}\" alt=\"logo\"></a> </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <div style=\"padding: 40px; background: #fff;\">\r\n                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">\r\n                    <tbody>\r\n                        <tr>\r\n                            <td style=\"border-bottom:1px solid #f6f6f6;\">\r\n                                <h1 style=\"font-size:14px; font-family:arial; margin:0px; font-weight:bold;\">Welcome {user_firstname} {user_lastname}</h1>\r\n                                <p style=\"margin-top:0px; color:#bbbbbb;\">Verify you own his email account</p>\r\n                            </td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td style=\"padding:10px 0 30px 0;\">\r\n                                <p>We need to very your email address before you account can be activate. Please use the below instructions to activate your account.</p>\r\n                                <p>Use this verification code to activer or account <center><h1>{verify_code}</h1></center>\r\n                                <br>\r\n                                <center><small>or</small></center></p>\r\n                                <center>\r\n                                    <a href=\"{direct_verify}\" style=\"display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00a958; border-radius: 60px; text-decoration:none;\">Click to Verify</a>\r\n                                </center>\r\n                                <b>- Thanks ({site_name} team)</b> </td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td style=\"border-top:1px solid #f6f6f6; padding-top:20px; color:#777\">If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at <a href=\"#\" class=\"__cf_email__\" data-cfemail=\"3c55525a537c485459515958594f555b52594e125552\">[email protected]</a></td>\r\n                        </tr>\r\n                    </tbody>\r\n                </table>\r\n            </div>\r\n            <div style=\"text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px\">\r\n                <p> Powered by {site_name}\r\n            </div>\r\n        </div>\r\n    </div>\r\n</html>'),
(3, 'change_pass', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html dir=\"ltr\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n\r\n<head>\r\n    <meta name=\"viewport\" content=\"width=device-width\" />\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n</head>\r\n\r\n<body style=\"margin:0px; background: #f8f8f8; \">\r\n    <div width=\"100%\" style=\"background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;\">\r\n        <div style=\"max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px\">\r\n            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; margin-bottom: 20px\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style=\"vertical-align: top; padding-bottom:30px;\" align=\"center\">\r\n                            <img src=\"{site_logo}\"/>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td style=\"background:#00a958; padding:20px; color:#fff; text-align:center;\"> <h3>Your password has just been changed</h3> </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            <div style=\"padding: 40px; background: #fff;\">\r\n                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">\r\n                    <tbody>\r\n                        <tr>\r\n                            <td>\r\n                                <p>Hello! <b>{user_firstname} {user_lastname} </b></p>\r\n                                <p>Your password has just been changed on <b>{pass_date}</b> detected device is <b>{pass_device}</b> on <b>{pass_plat}</b> if you did not perform this action please contact us ASAP</p>\r\n                                \r\n                                <b>- Thanks ({site_name} team)</b> </td>\r\n                        </tr>\r\n                    </tbody>\r\n                </table>\r\n            </div>\r\n            <div style=\"text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px\">\r\n                <p> Powered by {sitename}\r\n            </div>\r\n        </div>\r\n    </div>\r\n</body>\r\n\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `featured_product`
--

CREATE TABLE `featured_product` (
  `fp_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_product`
--

INSERT INTO `featured_product` (`fp_id`, `product_id`) VALUES
(6, 2),
(7, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fresh_categories`
--

CREATE TABLE `fresh_categories` (
  `id` int(11) NOT NULL,
  `title_name` varchar(50) NOT NULL,
  `show_limit` int(11) NOT NULL,
  `access_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fresh_categories`
--

INSERT INTO `fresh_categories` (`id`, `title_name`, `show_limit`, `access_id`) VALUES
(1, 'New Categories', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `google_tools`
--

CREATE TABLE `google_tools` (
  `gt_id` int(11) NOT NULL,
  `gt_meta_tags` varchar(255) DEFAULT NULL,
  `gt_analytics` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_tools`
--

INSERT INTO `google_tools` (`gt_id`, `gt_meta_tags`, `gt_analytics`) VALUES
(1, 'google-verification-example', '');

-- --------------------------------------------------------

--
-- Table structure for table `income_payments`
--

CREATE TABLE `income_payments` (
  `inp_id` int(10) UNSIGNED NOT NULL,
  `inp_order_number` varchar(255) NOT NULL,
  `inp_method` varchar(100) NOT NULL,
  `inp_day` varchar(3) NOT NULL,
  `inp_month` varchar(100) NOT NULL,
  `inp_year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_payments`
--

INSERT INTO `income_payments` (`inp_id`, `inp_order_number`, `inp_method`, `inp_day`, `inp_month`, `inp_year`) VALUES
(7, '3EC8AEA39C', 'paypal', '22', 'Jul', '2019'),
(8, '3EC8AEA39C', 'paypal', '22', 'Jul', '2019'),
(9, '3EC8AEA39C', 'paypal', '22', 'Jul', '2019'),
(10, '3EC8AEA39C', 'paypal', '22', 'Jul', '2019'),
(11, '35EF24FB35', 'paypal', '22', 'Jul', '2019'),
(12, '3C1BAA28DE', 'paypal', '23', 'Jul', '2019'),
(13, '376AB4B94C', 'paypal', '23', 'Jul', '2019'),
(14, '3290F3DD31', 'paypal', '23', 'Jul', '2019'),
(15, '3ED40E3638', 'paypal', '23', 'Jul', '2019'),
(16, '381452BD23', 'stripe', '27', 'Jul', '2019'),
(17, '381452BD23', 'stripe', '27', 'Jul', '2019'),
(18, '338E4930BB', 'stripe', '27', 'Jul', '2019'),
(19, '348295D571', 'stripe', '27', 'Jul', '2019'),
(20, '348295D571', 'paypal', '27', 'Jul', '2019'),
(21, '336BA2EB48', 'paystack', '11', 'Aug', '2019'),
(22, '3832069A80', 'paystack', '12', 'Aug', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `live_chat`
--

CREATE TABLE `live_chat` (
  `lc_id` int(11) NOT NULL,
  `lc_code` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_chat`
--

INSERT INTO `live_chat` (`lc_id`, `lc_code`) VALUES
(1, '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5d48a5ba7d27204601c970d7/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `main_cat_name` varchar(50) NOT NULL,
  `main_cat_preview1` varchar(255) DEFAULT NULL,
  `main_cat_preview2` varchar(255) DEFAULT NULL,
  `main_cat_preview3` varchar(255) DEFAULT NULL,
  `main_cat_slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `status`, `main_cat_name`, `main_cat_preview1`, `main_cat_preview2`, `main_cat_preview3`, `main_cat_slug`, `created_at`) VALUES
(4, 1, 'Mobile Phoones', 'Mobile_Phoones_preview.jpg', 'Mobile_Phoones_preview1.jpg', 'Mobile_Phoones_preview2.jpg', 'mobile-phoones', '2019-06-19 16:59:32'),
(5, 1, 'LapTops and PC', 'LapTops_and_Computers_preview.jpg', 'LapTops_and_Computers_preview1.jpg', 'LapTops_and_Computers_preview2.jpg', 'laptops-and-computers', '2019-06-22 16:59:32'),
(6, 1, 'Generators', 'Generators_preview4.png', 'Generators_preview2.png', 'Generators_preview3.png', 'generators', '2019-06-28 22:57:33'),
(7, 1, 'HD Televisions', 'HD_Televisions_preview3.png', 'HD_Televisions_preview1.png', 'HD_Televisions_preview2.png', 'hd-televisions', '2019-06-28 23:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) UNSIGNED NOT NULL,
  `order_account_id` int(11) UNSIGNED NOT NULL,
  `order_number` text NOT NULL,
  `order_description` text NOT NULL,
  `order_total_amount` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_day` varchar(50) DEFAULT NULL,
  `order_month` varchar(50) DEFAULT NULL,
  `order_year` varchar(5) DEFAULT NULL,
  `pay_check` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_account_id`, `order_number`, `order_description`, `order_total_amount`, `order_status`, `order_day`, `order_month`, `order_year`, `pay_check`) VALUES
(2, 3, '336BA2EB48', 'Puchasing Tecno E8', '209', 0, '22', 'July', '2019', NULL),
(3, 3, '3EC8AEA39C', 'Puchasing Tecno E8', '209', 1, '22', 'July', '2019', NULL),
(4, 3, '35EF24FB35', 'Puchasing Hp Notebook Pro', '589', 1, '22', 'July', '2019', NULL),
(5, 3, '3C1BAA28DE', 'Puchasing Panasonic Hd TV, Samsung HD Plasma', '1467', 1, '23', 'July', '2019', NULL),
(6, 3, '376AB4B94C', 'Puchasing Tecno E8', '209', 1, '23', 'July', '2019', NULL),
(7, 3, '3290F3DD31', 'Puchasing Hp Notebook Pro', '589', 4, '23', 'July', '2019', NULL),
(8, 3, '3ED40E3638', 'Puchasing Hp Notebook Pro, Tecno E8', '739', 1, '23', 'July', '2019', NULL),
(9, 3, '381452BD23', 'Puchasing Panasonic Hd TV', '718', 1, '26', 'July', '2019', 'e88049a175b39783df1b7a85a2b45f10'),
(10, 3, '338E4930BB', 'Puchasing Panasonic Hd TV, Hp Notebook Pro', '1248', 1, '27', 'July', '2019', NULL),
(11, 3, '348295D571', 'Puchasing Tecno E8', '210', 1, '27', 'July', '2019', NULL),
(12, 3, '3832069A80', 'Puchasing Samsung HD Plasma', '810', 1, '12', 'August', '2019', NULL),
(13, 3, '3CC3CCF1C0', 'Puchasing Tecno E8', '360', 0, '24', 'August', '2019', 'd99a1c76025f491ed09af1622b9c4604');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE `order_shipping` (
  `order_shipping_id` int(10) UNSIGNED NOT NULL,
  `order_info_id` int(10) UNSIGNED NOT NULL,
  `order_shipping_company` varchar(255) DEFAULT NULL,
  `order_shipping_country` varchar(255) NOT NULL,
  `order_shipping_state` varchar(255) NOT NULL,
  `order_shipping_zip_code` varchar(255) NOT NULL,
  `order_shipping_address_1` text NOT NULL,
  `order_shipping_address_2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`order_shipping_id`, `order_info_id`, `order_shipping_company`, `order_shipping_country`, `order_shipping_state`, `order_shipping_zip_code`, `order_shipping_address_1`, `order_shipping_address_2`) VALUES
(2, 2, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(3, 3, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(4, 4, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(5, 5, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(6, 6, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(7, 7, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(8, 8, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(9, 9, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(10, 10, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(11, 11, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(12, 12, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene'),
(13, 13, 'Funszones', 'Nigeria', 'Kogi', '25634', 'Ibadan', 'Okene');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `page_content` text NOT NULL,
  `page_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_gateway`
--

CREATE TABLE `paypal_gateway` (
  `pg_id` int(11) NOT NULL,
  `pg_bussiness_email` varchar(255) NOT NULL,
  `pg_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_gateway`
--

INSERT INTO `paypal_gateway` (`pg_id`, `pg_bussiness_email`, `pg_is_active`) VALUES
(1, 'seunex@zubdev.net', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paystack_gateway`
--

CREATE TABLE `paystack_gateway` (
  `ps_id` int(11) NOT NULL,
  `ps_secret_key` varchar(255) DEFAULT NULL,
  `ps_public_key` varchar(255) DEFAULT NULL,
  `ps_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paystack_gateway`
--

INSERT INTO `paystack_gateway` (`ps_id`, `ps_secret_key`, `ps_public_key`, `ps_is_active`) VALUES
(1, 'sk_test_93961131bd6b1cf89a189be5bd596d7f38f933de', 'pk_test_93961131bd6b1cf89a189be5bd596d7f38f933de', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plugin_editors`
--

CREATE TABLE `plugin_editors` (
  `editor_id` int(11) NOT NULL,
  `editor_name` varchar(50) NOT NULL,
  `editor_activate` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plugin_editors`
--

INSERT INTO `plugin_editors` (`editor_id`, `editor_name`, `editor_activate`) VALUES
(1, 'summernote', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pref_settings`
--

CREATE TABLE `pref_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `website_title` varchar(100) DEFAULT NULL,
  `website_description` text,
  `website_keyword` text,
  `website_logo` text,
  `website_favicon` text,
  `website_currency` varchar(4) NOT NULL,
  `website_currency_symbol` varchar(1) NOT NULL,
  `website_color` varchar(100) DEFAULT NULL,
  `website_status` int(11) NOT NULL DEFAULT '0',
  `website_number` varchar(50) DEFAULT NULL,
  `website_address` text,
  `website_email` varchar(255) DEFAULT NULL,
  `website_facebook` varchar(255) DEFAULT NULL,
  `website_twitter` varchar(255) DEFAULT NULL,
  `website_instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pref_settings`
--

INSERT INTO `pref_settings` (`id`, `website_name`, `website_title`, `website_description`, `website_keyword`, `website_logo`, `website_favicon`, `website_currency`, `website_currency_symbol`, `website_color`, `website_status`, `website_number`, `website_address`, `website_email`, `website_facebook`, `website_twitter`, `website_instagram`) VALUES
(1, 'Elecom', 'Elecom - Electronic Ecommerce Store', 'Some description', 'Some Keyword', 'logo.png', 'favicon.png', 'USD', '$', '#00ff00', 0, '07068953864', 'Okene Nigeria', 'seunexseun@gmail.com', 'zubdev', 'zubdev', 'zubdev24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `sub_cat_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand_id` int(11) UNSIGNED NOT NULL,
  `product_description` text,
  `product_summary` text NOT NULL,
  `product_show` varchar(255) DEFAULT NULL,
  `product_price` varchar(11) NOT NULL,
  `product_discount` varchar(11) DEFAULT NULL,
  `product_fix_price` varchar(11) DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `product_colors` text NOT NULL,
  `product_meta_title` varchar(255) NOT NULL,
  `product_meta_keyword` text NOT NULL,
  `product_meta_description` text NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_created_at` date NOT NULL,
  `product_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sub_cat_id`, `product_name`, `product_brand_id`, `product_description`, `product_summary`, `product_show`, `product_price`, `product_discount`, `product_fix_price`, `product_status`, `product_colors`, `product_meta_title`, `product_meta_keyword`, `product_meta_description`, `product_slug`, `product_created_at`, `product_updated_at`) VALUES
(1, 10, 'Samsung HD Plasma', 5, '<p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: rgb(96, 105, 117); font-family: &quot;Maven Pro&quot;, Helvetica, Arial, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p class=\"mb-30\" style=\"margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: rgb(96, 105, 117); font-family: &quot;Maven Pro&quot;, Helvetica, Arial, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ...', 'Samsung_HD_Plasma_preview.png', '750', NULL, NULL, 1, 'white, blue', 'Buy iphon xmas', 'example', 'sample', 'samsung-hd-plasma', '0000-00-00', '2019-06-28 23:53:47'),
(2, 6, 'Hp Notebook Pro', 5, '<p xss=removed>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p class=\"mb-30\" xss=removed>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ...', 'Hp_Notebook_Pro_preview4.png', '106', '80', '530', 1, '', 'Buy iphon xmas', 'example', '', 'hp-notebook-pro', '0000-00-00', '2019-06-28 23:58:10'),
(4, 3, 'Tecno E8', 6, '<p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: rgb(96, 105, 117); font-family: &quot;Maven Pro&quot;, Helvetica, Arial, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p class=\"mb-30\" style=\"margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: rgb(96, 105, 117); font-family: &quot;Maven Pro&quot;, Helvetica, Arial, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ...', 'Tecno_E8_preview.png', '150', NULL, NULL, 1, 'red, blue', 'Buy iphon xmas', 'example', 'testing', 'tecno-e8', '0000-00-00', '2019-06-29 00:10:31'),
(5, 9, 'Panasonic Hd TV', 9, '<p xss=removed maven=\"\" helvetica,=\"\" arial,=\"\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged <b>Greate</b>.</p><p class=\"mb-30\" xss=removed maven=\"\" helvetica,=\"\" arial,=\"\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ...', 'Panasonic_Hd_TV_preview.jpg', '658', NULL, NULL, 1, 'white', 'Buy iphon xmas', 'example', '', 'panasonic-hd-tv', '0000-00-00', '2019-06-29 00:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_advert_slider`
--

CREATE TABLE `product_advert_slider` (
  `psa_id` int(10) UNSIGNED NOT NULL,
  `psa_description` varchar(100) NOT NULL,
  `psa_button_text` varchar(50) DEFAULT NULL,
  `psa_link` varchar(255) DEFAULT NULL,
  `psa_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_advert_slider`
--

INSERT INTO `product_advert_slider` (`psa_id`, `psa_description`, `psa_button_text`, `psa_link`, `psa_image`) VALUES
(2, 'Elecom Electronics <br> Ecoomerce Store', 'Buy Now', 'http://codester.com', '23d4c9b85cc23db724d5fd7e7cd8b1e2.png'),
(3, 'Hot Android Mobile Phones <br> From Elecom', 'Shop Now', 'http://elecom.co/shop-category/mobile-phoones', '37cf8fa302ceb6e360102efabaeeeae6.png'),
(4, 'Hd and Plasma Televisons', 'Check In', 'http://elecom.co/shop-category/hd-televisions', '3b347c11bfaf72573e8fa2b255a0269a.png'),
(6, 'Generator', 'But Now', 'http://elecom.co', 'd2c860fbe4ef45dbaf2e915a5c2e95cf.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `brand_status` tinyint(1) NOT NULL,
  `brand_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`brand_id`, `brand_name`, `brand_status`, `brand_slug`) VALUES
(4, 'Iphone', 1, 'iphone'),
(5, 'Samsung', 1, 'samsung'),
(6, 'Techno', 1, 'techno'),
(7, 'Tiger', 1, 'tiger'),
(8, 'Suzuki', 1, 'suzuki'),
(9, 'HD Tv', 1, 'hd-tv'),
(10, 'Sharp', 1, 'sharp');

-- --------------------------------------------------------

--
-- Table structure for table `product_previews`
--

CREATE TABLE `product_previews` (
  `pp_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_preview_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_previews`
--

INSERT INTO `product_previews` (`pp_id`, `product_id`, `product_preview_name`) VALUES
(1, 1, 'Samsung_HD_Plasma_preview1.png'),
(2, 1, 'Samsung_HD_Plasma_preview2.png'),
(3, 1, 'Samsung_HD_Plasma_preview3.png'),
(4, 2, 'Hp_Notebook_Pro_preview1.png'),
(5, 2, 'Hp_Notebook_Pro_preview2.png'),
(6, 2, 'Hp_Notebook_Pro_preview3.png'),
(10, 4, 'Tecno_E8_preview1.png'),
(11, 4, 'Tecno_E8_preview2.png'),
(12, 4, 'Tecno_E8_preview3.png'),
(13, 5, 'Panasonic_Hd_TV_preview1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `pr_id` int(10) UNSIGNED NOT NULL,
  `pr_account_id` int(10) UNSIGNED NOT NULL,
  `pr_product_id` int(10) UNSIGNED NOT NULL,
  `pr_rating` int(11) NOT NULL,
  `pr_rate_title` varchar(100) NOT NULL,
  `pr_tate_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`pr_id`, `pr_account_id`, `pr_product_id`, `pr_rating`, `pr_rate_title`, `pr_tate_text`) VALUES
(2, 3, 2, 3, 'Very Nice Performace', 'It works well mainly need for programming stuff.');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `shop_cart_id` int(10) UNSIGNED NOT NULL,
  `shop_cart_product_id` int(10) UNSIGNED NOT NULL,
  `shop_cart_account_id` int(10) UNSIGNED NOT NULL,
  `shop_cart_quantity` int(11) NOT NULL DEFAULT '1',
  `shop_cart_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_tax`
--

CREATE TABLE `shopping_tax` (
  `shop_tax_id` int(10) UNSIGNED NOT NULL,
  `shop_tax` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_tax`
--

INSERT INTO `shopping_tax` (`shop_tax_id`, `shop_tax`) VALUES
(1, '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `smtp_id` int(10) UNSIGNED NOT NULL,
  `smtp_default_email` varchar(255) NOT NULL,
  `smtp_display_name` varchar(255) NOT NULL,
  `smtp_type` varchar(4) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_host` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`smtp_id`, `smtp_default_email`, `smtp_display_name`, `smtp_type`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_host`) VALUES
(1, 'elecom@zudev.net', 'Elecom by Zubdev', 'tls', '4f82ae0e5904fd', '48c6c898e81743', 25, 'smtp.mailtrap.io');

-- --------------------------------------------------------

--
-- Table structure for table `stipe_gateway`
--

CREATE TABLE `stipe_gateway` (
  `sg_id` int(11) NOT NULL,
  `sg_api_key` varchar(255) NOT NULL,
  `sg_secret_key` varchar(255) NOT NULL,
  `sg_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stipe_gateway`
--

INSERT INTO `stipe_gateway` (`sg_id`, `sg_api_key`, `sg_secret_key`, `sg_is_active`) VALUES
(1, 'pk_test_mwsys03nNL6ujKk535VDAA1H', 'sk_test_wjy11R2FZQZXnZuO73Ta0yHS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sid` int(10) UNSIGNED NOT NULL,
  `sub_cat_status` tinyint(1) NOT NULL,
  `main_cat_id` int(11) UNSIGNED NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `sub_cat_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sid`, `sub_cat_status`, `main_cat_id`, `sub_cat_name`, `sub_cat_slug`) VALUES
(3, 1, 4, 'Android Phones', 'android-phones'),
(4, 1, 4, 'Iphones', 'iphones'),
(5, 1, 5, 'Mac', 'mac'),
(6, 1, 5, 'Lenovo Notebook', 'lenovo-notebook'),
(7, 1, 6, 'Tiger', 'tiger'),
(8, 1, 6, 'Suzuki', 'suzuki'),
(9, 1, 7, 'Panasonic', 'panasonic'),
(10, 1, 7, 'Sony', 'sony'),
(11, 1, 7, 'Sharp', 'sharp');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testi_id` int(11) NOT NULL,
  `testi_account_id` int(10) UNSIGNED NOT NULL,
  `testi_status` int(11) NOT NULL,
  `testi_content` text NOT NULL,
  `testi_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testi_id`, `testi_account_id`, `testi_status`, `testi_content`, `testi_rating`) VALUES
(3, 3, 1, 'Good Project From ZubDevs', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_page`
--
ALTER TABLE `about_us_page`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`ca_id`),
  ADD UNIQUE KEY `ca_email` (`ca_email`),
  ADD UNIQUE KEY `ca_username` (`ca_username`);

--
-- Indexes for table `customer_balance`
--
ALTER TABLE `customer_balance`
  ADD PRIMARY KEY (`cus_bal_id`),
  ADD KEY `balance_to_customer` (`cus_account_id`);

--
-- Indexes for table `customer_contact_address`
--
ALTER TABLE `customer_contact_address`
  ADD PRIMARY KEY (`cont_add_id`),
  ADD KEY `contact_with_custumer` (`cont_account_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cu_detail_id`),
  ADD KEY `link_to_customer_acc` (`cu_account_id`);

--
-- Indexes for table `customer_email_verify`
--
ALTER TABLE `customer_email_verify`
  ADD PRIMARY KEY (`cev_id`),
  ADD KEY `on_remove_user` (`customer_id`);

--
-- Indexes for table `customer_order_bundle`
--
ALTER TABLE `customer_order_bundle`
  ADD PRIMARY KEY (`cob_id`);

--
-- Indexes for table `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `shipping_customer_account` (`ship_account_id`);

--
-- Indexes for table `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  ADD PRIMARY KEY (`cw_id`),
  ADD KEY `wishlist_list_customer_acc` (`cw_account_id`),
  ADD KEY `product_link_wishlist` (`cw_product_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`em_temp_id`);

--
-- Indexes for table `featured_product`
--
ALTER TABLE `featured_product`
  ADD PRIMARY KEY (`fp_id`),
  ADD KEY `product_id_join` (`product_id`);

--
-- Indexes for table `fresh_categories`
--
ALTER TABLE `fresh_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_tools`
--
ALTER TABLE `google_tools`
  ADD PRIMARY KEY (`gt_id`);

--
-- Indexes for table `income_payments`
--
ALTER TABLE `income_payments`
  ADD PRIMARY KEY (`inp_id`);

--
-- Indexes for table `live_chat`
--
ALTER TABLE `live_chat`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_cat_slug` (`main_cat_slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_to_customer_acc` (`order_account_id`);

--
-- Indexes for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD PRIMARY KEY (`order_shipping_id`),
  ADD KEY `link_to_order_info` (`order_info_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `paypal_gateway`
--
ALTER TABLE `paypal_gateway`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `paystack_gateway`
--
ALTER TABLE `paystack_gateway`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `plugin_editors`
--
ALTER TABLE `plugin_editors`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indexes for table `pref_settings`
--
ALTER TABLE `pref_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_slug` (`product_slug`),
  ADD KEY `products_cats` (`sub_cat_id`),
  ADD KEY `product_brands` (`product_brand_id`);

--
-- Indexes for table `product_advert_slider`
--
ALTER TABLE `product_advert_slider`
  ADD PRIMARY KEY (`psa_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_slug` (`brand_slug`);

--
-- Indexes for table `product_previews`
--
ALTER TABLE `product_previews`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `product_cascade` (`product_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `rate_link_customer` (`pr_account_id`),
  ADD KEY `rate_link_to_product` (`pr_product_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`shop_cart_id`),
  ADD KEY `link_shop_cart_to_account` (`shop_cart_account_id`),
  ADD KEY `link_shop_cart_to_product` (`shop_cart_product_id`);

--
-- Indexes for table `shopping_tax`
--
ALTER TABLE `shopping_tax`
  ADD PRIMARY KEY (`shop_tax_id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`smtp_id`);

--
-- Indexes for table `stipe_gateway`
--
ALTER TABLE `stipe_gateway`
  ADD PRIMARY KEY (`sg_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sub_cat_slug` (`sub_cat_slug`),
  ADD KEY `sub_categories` (`main_cat_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testi_id`),
  ADD KEY `test_to_account` (`testi_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_page`
--
ALTER TABLE `about_us_page`
  MODIFY `about_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `ca_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_balance`
--
ALTER TABLE `customer_balance`
  MODIFY `cus_bal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_contact_address`
--
ALTER TABLE `customer_contact_address`
  MODIFY `cont_add_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cu_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_email_verify`
--
ALTER TABLE `customer_email_verify`
  MODIFY `cev_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order_bundle`
--
ALTER TABLE `customer_order_bundle`
  MODIFY `cob_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  MODIFY `cw_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `em_temp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured_product`
--
ALTER TABLE `featured_product`
  MODIFY `fp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fresh_categories`
--
ALTER TABLE `fresh_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_tools`
--
ALTER TABLE `google_tools`
  MODIFY `gt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_payments`
--
ALTER TABLE `income_payments`
  MODIFY `inp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `live_chat`
--
ALTER TABLE `live_chat`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_shipping`
--
ALTER TABLE `order_shipping`
  MODIFY `order_shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_gateway`
--
ALTER TABLE `paypal_gateway`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paystack_gateway`
--
ALTER TABLE `paystack_gateway`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plugin_editors`
--
ALTER TABLE `plugin_editors`
  MODIFY `editor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pref_settings`
--
ALTER TABLE `pref_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_advert_slider`
--
ALTER TABLE `product_advert_slider`
  MODIFY `psa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_previews`
--
ALTER TABLE `product_previews`
  MODIFY `pp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `pr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `shop_cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_tax`
--
ALTER TABLE `shopping_tax`
  MODIFY `shop_tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `smtp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stipe_gateway`
--
ALTER TABLE `stipe_gateway`
  MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_balance`
--
ALTER TABLE `customer_balance`
  ADD CONSTRAINT `balance_to_customer` FOREIGN KEY (`cus_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_contact_address`
--
ALTER TABLE `customer_contact_address`
  ADD CONSTRAINT `contact_with_custumer` FOREIGN KEY (`cont_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `link_to_customer_acc` FOREIGN KEY (`cu_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_email_verify`
--
ALTER TABLE `customer_email_verify`
  ADD CONSTRAINT `on_remove_user` FOREIGN KEY (`customer_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD CONSTRAINT `shipping_customer_account` FOREIGN KEY (`ship_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  ADD CONSTRAINT `product_link_wishlist` FOREIGN KEY (`cw_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_list_customer_acc` FOREIGN KEY (`cw_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `featured_product`
--
ALTER TABLE `featured_product`
  ADD CONSTRAINT `product_id_join` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_to_customer_acc` FOREIGN KEY (`order_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD CONSTRAINT `link_to_order_info` FOREIGN KEY (`order_info_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_brands` FOREIGN KEY (`product_brand_id`) REFERENCES `product_brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_cats` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_previews`
--
ALTER TABLE `product_previews`
  ADD CONSTRAINT `product_cascade` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `rate_link_customer` FOREIGN KEY (`pr_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_link_to_product` FOREIGN KEY (`pr_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `link_shop_cart_to_account` FOREIGN KEY (`shop_cart_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_shop_cart_to_product` FOREIGN KEY (`shop_cart_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories` FOREIGN KEY (`main_cat_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `test_to_account` FOREIGN KEY (`testi_account_id`) REFERENCES `customer_accounts` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
