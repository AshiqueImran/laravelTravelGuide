-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: এপ্রি 25, 2018 at 09:03 PM
-- সার্ভার সংস্করন: 10.1.13-MariaDB
-- পিএইছপির সংস্করন: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `travelguide`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addedBy` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `admin`
--

INSERT INTO `admin` (`Admin_id`, `name`, `password`, `email`, `addedBy`) VALUES
(1, 'Ashik Imran', '$2y$10$voPemrWBjQDr1wAPvUsbWufwFkLdKXgYVMtr2ZcEpFCTOuR7O.z2q', 'imranashik50@gmail.com', 'imranashik50@gmail.com'),
(2, 'Azizur Rahman Ananda', '$2y$10$ucKGwrw3sRo1DPR.bQfe9O9h.y9b1ySrM7o/lE0QdhAEpx6caA7bK', 'anhonestdevil@gmail.com', 'imranashik50@gmail.com'),
(3, 'Purba Das Gupta', '$2y$10$FhzIPUSdx/qfueRxZRBZBujYhcyu10YLAVh1zqYVIny35kak6BSvm', 'purbadasgupta66@gmail.com', 'anhonestdevil@gmail.com'),
(4, 'Purba Gupta', '$2y$10$m4hOiDxxyx3KPidxXaojM.EVX60NlHvm/Mm4KMQd4silUA0ulRWIS', 'purba@gmail.com', 'imranashik50@gmail.com');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `bookingtable`
--

CREATE TABLE `bookingtable` (
  `id` int(11) NOT NULL,
  `bookingplace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bookedby` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `checkout` date DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `TrxID` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `bookingtable`
--

INSERT INTO `bookingtable` (`id`, `bookingplace`, `hotel`, `bookedby`, `mobile`, `time`, `checkout`, `count`, `TrxID`, `price`, `status`) VALUES
(2, 'sylhet', 'trip hotels', 'tanvir.hasan1984@yahoo.com', '01935197981', '2018-01-23', '2018-04-14', 10, 'gashcdhka12', 5000, 'applied'),
(3, 'kuakata', 'recent motel zone', 'tanvir.hasan1984@yahoo.com', '01935197981', '2018-02-06', '2018-04-14', 4, 'qar234', 10000, 'confirmed'),
(4, 'bandarban', 'ocean blue', 'user@gmail.com', '01717220661', '2018-02-01', '2018-04-14', 5, 'agdsv1232hvdj', 4000, 'confirmed'),
(5, 'sylhet', 'trip hotels', 'pial771@gmail.com', '01935197982', '2018-04-13', '2018-04-16', 1, 'rfg12', 2000, 'applied'),
(6, 'sundarban', 'meghalaya hotel', 'tanvir.hasan1984@yahoo.com', '01717220661', '2018-04-19', '2018-05-10', 3, 'sdf', 1500, 'applied');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `hotelinfo`
--

CREATE TABLE `hotelinfo` (
  `id` int(11) NOT NULL,
  `hotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `hotelinfo`
--

INSERT INTO `hotelinfo` (`id`, `hotel`, `place`, `address`, `price`) VALUES
(1, 'ocean blue', 'bandarban', 'bandarban town', 4000),
(2, 'ovishar', 'bandarban', 'bandarban bus stand road', 2000);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `placetable`
--

CREATE TABLE `placetable` (
  `id` int(11) NOT NULL,
  `plcaeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastEdit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '0',
  `map` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `placetable`
--

INSERT INTO `placetable` (`id`, `plcaeName`, `details`, `hotel`, `category`, `lastEdit`, `capacity`, `map`, `image`) VALUES
(1, 'sundarban', 'The Sundarbans is the world''''s largest coastal mangrove forest in the coastal region of the Bay of Bengal; considered one of the natural wonders of the world, it was recognised in 1997 as a UNESCO World Heritage Site.', 'meghalaya hotel', 'forest', 'imranashik50@gmail.com', 43, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d946898.4175168929!2d88.72647747341428!3d22.018132421110156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a004caac2c7b315%3A0x4716abcfbb16c93c!2sSundarbans!5e0!3m2!1sen!2sbd!4v1513156986695', '/images/sundarban.jpg'),
(2, 'coxs_bazar', 'Cox''s Bazar is a city, a fishing port and district headquarters in Bangladesh. The beach in Cox''s Bazar is an unbroken 120 km sandy sea beach with a gentle slope, making it the second longest sea beach in the world.', 'hotel media', 'beach', 'imranashik50@gmail.com', 50, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118830.37497990689!2d91.93286114679411!3d21.450883578510823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7ea2ab928c3%3A0x3b539e0a68970810!2sCox&#39;s+Bazar!5e0!3m2!1sen!2sbd!4v1513156640876', '/images/sea_beach.jpg'),
(3, 'rangamati', 'Rangamati  is a district in south-eastern Bangladesh. It is a part of the Chittagong Division and the town of Rangamati serves as the headquarters of the district. Area-wise, it is the largest district of the country.', 'sufia hotel', 'hill', 'purbadasgupta66@gmail.com', 50, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1882994.342407633!2d91.15816526525482!3d22.812713643717075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3752ba825b22f935%3A0x16694440255859d5!2sRangamati+Hill+District!5e0!3m2!1sen!2sbd!4v1513156789818', '/images/rangamati.jpg'),
(4, 'bandarban', 'Bandarban is a district in South-Eastern Bangladesh, and a part of the Chittagong Division.Its popular place Nillgiri and Nillachal.It is famous for it''''s tracking,hiking,camping and off road journey.', 'sky hotel', 'hill', 'imranashik50@gmail.com', 40, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d948451.1146573967!2d91.80945713360256!3d21.784627533788427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad8232812958fd%3A0x626d2d94bda10341!2sBandarban+District!5e0!3m2!1sen!2sbd!4v1513156151448', '/images/bandarban.jpg'),
(5, 'sylhet', 'Sylhet is a metropolitan city in northeastern Bangladesh.It is famous for Tea Garden,Jaflong,Waterfall of Madhobkundo,Bichnakandi,Ratargul.It''''s natural beauty is perfect for relaxing from the stress of life.', 'trip hotels', 'fountain', 'imranashik50@gmail.com', 42, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57903.166045745944!2d91.82688409696448!3d24.89975946289852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1513157256936', '/images/sylhet.jpg'),
(6, 'kushtia', 'Kushtia is a district in the Khulna division of Bangladesh.The Shahi Mosque in Kushtia bears the sign of rich cultural heritage of the region from the Mughal period.The great Lalon Shas''''s Tomb is situated here.', 'kushtia city hall', 'cultural', 'imranashik50@gmail.com', 50, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d466727.3004671549!2d88.75214565884201!3d23.949580621792375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39febca82f6a21ed%3A0x4040980d7c6874f8!2sKushtia+District!5e0!3m2!1sen!2sbd!4v1513157502148', 'images/kushtia.jpg'),
(7, 'kuakata', 'Kuakata in Kalapara Upazila, Patuakhali District, known for its panoramic sea beach.One can have a stunning view of both sunrise and sunset over the Bay of Bengal.It is also famous for jhau-bon along side the beach.', 'recent motel zone', 'beach', 'imranashik50@gmail.com', 45, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29632.79578027241!2d90.10029290231522!3d21.815087226957246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30aa7d1b38a082bd%3A0xce33209b2416f816!2sKuakata!5e0!3m2!1sen!2sbd!4v1513157365271', '/images/kuakata.jpg'),
(8, 'rajshahi', 'Rajshahi is famous for Puthia Temple Complex and kantajio as a sacred site,Mohasthangor as ancient ruins and historic site,Tajhat palace as a architectural building and bagha mosque as religious site.', 'hotel rajshahi kings', 'historic', 'imranashik50@gmail.com', 50, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58144.57124323851!2d88.57095049387128!3d24.380061376224162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefa96a38d031%3A0x10f93a950ed6f410!2sRajshahi!5e0!3m2!1sen!2sbd!4v1513157436524', '/images/rajshahi.jpg'),
(9, 'sonargaon', 'Sonargaon was a historic administrative, commercial and maritime centre in Bengal. Situated in the centre of the Ganges delta, it was the seat of the medieval Muslim rulers and governors of eastern Bengal.', 'sonargaon hotel', 'historic', 'imranashik50@gmail.com', 45, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116946.64449740139!2d90.52521692585356!3d23.655113266588625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b4b20ae54b6f%3A0xc98e22c6b234e6d0!2z4Ka44KeL4Kao4Ka-4Kaw4KaX4Ka-4KaB4KaTIOCmieCmquCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1522957780740', '/images/shonargaon.jpg'),
(10, 'tangail', 'Tangail is a district in the central region of Bangladesh known for sweets. It is the largest district of Dhaka division by area and second largest by population. The population of Tangail zilla is about 3.8 million.', 'Tangail  ailla hotel', 'forest', 'imranashik50@gmail.com', 40, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d930339.8946470931!2d89.45017734103642!3d24.376425288023317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdf7e4ba029b4f%3A0x67af88d249b26957!2z4Kaf4Ka-4KaZ4KeN4KaX4Ka-4KaH4KayIOCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1522957987132', '/images/tangail.jpg'),
(11, 'barisal', 'Barisal is a major city that lies on the bank of Kirtankhola river in south-central Bangladesh. It is the largest city and the administrative headquarter of both Barisal district and Barisal Division.', 'lalbagh hotel', 'cultural', 'imranashik50@gmail.com', 40, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117788.14661080492!2d90.2837632683398!3d22.695526237773837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37553407fbece487%3A0x5d069b9599d4414a!2z4Kas4Kaw4Ka_4Ka24Ka-4Kay!5e0!3m2!1sbn!2sbd!4v1522957889856', '/images/barisal.jpg'),
(12, 'narayanganj', 'Narayanganj is a city in central Bangladesh located near the capital city of Dhaka and has a population of about 2 million. The city is on the bank of the Shitalakshya River.It''s Port is an important shipping place.', 'ABC hotels', 'historic', 'imranashik50@gmail.com', 40, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58490.53769812104!2d90.46976668748783!3d23.61657361552586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b10812a520a3%3A0x6d3af4457bec4c90!2z4Kao4Ka-4Kaw4Ka-4Kav4Ka84Kaj4KaX4Kae4KeN4Kac!5e0!3m2!1sbn!2sbd!4v1522958039903', '/images/bandarban.jpg');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `usertable`
--

CREATE TABLE `usertable` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `usertable`
--

INSERT INTO `usertable` (`userId`, `name`, `password`, `email`, `mobile`) VALUES
(1, 'user', '$2y$10$wjNdtAPgvtqtX1wBI6frTuhg232kl/hCAk3BfuUdXzgU9DHK1S6Ia', 'user@gmail.com', '01717220661'),
(2, 'Tanvir Hasan', '$2y$10$8dt1IfXYxe4Datt/0YBiWO3uIyoySeqH5ptiFUEwbYy4aDUnKJ8se', 'tanvir.hasan1984@yahoo.com', '01935197981'),
(3, 'Purba Gupta', '$2y$10$RwnW7s/gTI5b9ZhdccMijuHaUCiFE5BgY8P66kGtQbkbOlVJ7Ste2', 'purba@gmail.com', '01717220662'),
(4, 'Sazzed Rahman', '$2y$10$fBmgiLbhZK078b75qxVTwOIz8E.BJfddidIMpuNP18hTS3Swfztz2', 'mysticyagami7@gmail.com', '01777666666');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- টেবিলের ইনডেক্সসমুহ `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `hotelinfo`
--
ALTER TABLE `hotelinfo`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `placetable`
--
ALTER TABLE `placetable`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `hotelinfo`
--
ALTER TABLE `hotelinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `placetable`
--
ALTER TABLE `placetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
