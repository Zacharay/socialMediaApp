-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Wrz 2023, 21:51
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `socialmediaapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `following_id`) VALUES
(1, 1, 3),
(2, 3, 1),
(4, 2, 3),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `upload_date` datetime NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_date` date NOT NULL,
  `photos_count` int(11) NOT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `upload_date`, `photos_count`, `likes`) VALUES
(1, 3, 'Just landed in paradise! 🌴☀️ After a long flight, I\'m finally in Bali, and I can\'t wait to explore the beautiful beaches, lush jungles, and vibrant culture of this amazing island. Stay tuned for more travel adventures! #TravelGoals #BaliAdventures', '2023-09-16', 2, 0),
(2, 3, 'Waking up to this breathtaking view of the Grand Canyon is a dream come true. The sheer size and natural beauty of this place are beyond words. Can\'t wait to hike down into the canyon today! #GrandCanyon #NatureLover #BucketListDestination', '2023-09-16', 2, 0),
(3, 3, 'Checked off a major item from my bucket list today! Climbing to the top of Machu Picchu was a challenging but incredibly rewarding experience. The history and mystique of this ancient Incan city are mind-blowing. Feeling grateful! #MachuPicchu #BucketList #IncaTrail', '2023-09-16', 2, 0),
(4, 3, ' Lost in the streets of Tokyo, and I couldn\'t be happier! From the bustling markets to the serene temples, every corner of this city is a new adventure. And don\'t get me started on the food—it\'s a culinary paradise! 🇯🇵🏮 #TokyoDiaries #JapaneseCulture', '2023-09-16', 2, 0),
(5, 3, 'Chasing waterfalls in Iceland! Nature\'s beauty at its finest. The raw power and tranquility of these waterfalls are awe-inspiring. Can\'t wait to explore more of this stunning country. #IcelandAdventures #Waterfalls #NordicEscape', '2023-09-16', 4, 0),
(6, 2, 'Exploring the historic streets of Rome is like stepping back in time. Every cobblestone street and ancient ruin has a story to tell. And the food? Pasta, pizza, gelato—it\'s a food lover\'s paradise. 🇮🇹🏛️ #Rome #HistoryLover', '2023-09-16', 3, 0),
(7, 2, ' Sipping cocktails on a tropical island with the sound of the ocean in the background. Living the dream! This is the kind of relaxation I\'ve been craving. 🍹🌴 #IslandLife #ParadiseFound', '2023-09-16', 3, 0),
(8, 2, 'Yesterday\'s sunrise hike to the summit of Mount Kilimanjaro was the most physically demanding thing I\'ve ever done. But as the sun painted the sky with colors, I felt on top of the world, both figuratively and literally! 🌄🏔️ #Kilimanjaro #HikingAdventures', '2023-09-16', 3, 0),
(9, 2, ' Our road trip through the scenic landscapes of New Zealand has been nothing short of magical. From snow-capped mountains to serene lakes, this country is a photographer\'s dream. Can\'t wait for more epic views! 🚗📸 #NewZealand #RoadTripDiaries', '2023-09-16', 3, 0),
(10, 2, ' In awe of the stunning architecture in Barcelona. Antoni Gaudi\'s creations, like the Sagrada Familia and Park Güell, are truly one-of-a-kind. Exploring the art and culture of this city is an experience I\'ll never forget. 🇪🇸✨ #Barcelona #GaudiArt #SpanishCulture', '2023-09-16', 4, 0),
(11, 1, 'Just pushed my latest code update! 💻 It feels amazing to see months of hard work finally come together. Can\'t wait for the testing phase and to release this project to the world! 🌐 #CodingLife #SoftwareEngineer #NewRelease', '2023-09-16', 2, 0),
(12, 1, 'Attended a fantastic tech meetup last night! 🌟 It\'s always inspiring to connect with fellow software engineers and learn about the latest industry trends. Plus, the pizza was pretty great too! 🍕😄 #TechMeetup #Networking #SoftwareDevelopment', '2023-09-16', 0, 0),
(13, 1, 'Just landed my dream job as a software engineer at [Company Name]! 🚀 I couldn\'t be more excited to work with such an innovative team and contribute to some exciting projects. Here\'s to new beginnings! 🥂 #DreamJob #SoftwareEngineering #CareerGoals', '2023-09-16', 3, 0),
(14, 1, 'Debugging days are like solving puzzles, and I absolutely love it! Today, I conquered a tricky bug that had been bugging me for hours. 🐛💪 #DebuggingAdventures #SoftwareEngineering #Coding', '2023-09-16', 1, 0),
(15, 1, 'Code review time! 🔍 As a software engineer, this is where the magic happens. Collaborating with my team to ensure our code is top-notch and free of errors. Let\'s make our app shine! ✨ #CodeReview #Teamwork #QualityCode', '2023-09-16', 3, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sociallinks`
--

CREATE TABLE `sociallinks` (
  `user_id` int(11) NOT NULL,
  `twitterLink` text NOT NULL,
  `instagramLink` text NOT NULL,
  `facebookLink` text NOT NULL,
  `linkedinLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sociallinks`
--

INSERT INTO `sociallinks` (`user_id`, `twitterLink`, `instagramLink`, `facebookLink`, `linkedinLink`) VALUES
(2, '', '', 'https://www.facebook.com/BillGates/?locale=pl_PL', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `job`, `bio`, `password`) VALUES
(1, 'John', 'Doe', 'john_doe', 'john.doe@example.com', 'Software Engineer', '', '$2y$10$oON2w1J3Y2VmG0R3CFPzWe4jfXex/hxVJO1PQckvoWUSz3yIRgpkq'),
(2, 'Alice', 'Smith', 'alice_smith', 'alice.smith@example.com', 'Graphic Designer', '', '$2y$10$05eBGQK/PbhlI2C4aXCuVegJzpEEIXxuS9H9J39BsaVuYuvTLYtwi'),
(3, 'Michael', 'Lee', 'michael_lee', 'michael.lee@example.com', 'Data Analyst', '', '$2y$10$NAUG1thO3DVxNFCWcwwQe.SMwpiWECs3.tBh8NBnu9YHZuehcRGIq');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_conversations`
--

CREATE TABLE `user_conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `conversation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeksy dla tabeli `user_conversations`
--
ALTER TABLE `user_conversations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `user_conversations`
--
ALTER TABLE `user_conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
