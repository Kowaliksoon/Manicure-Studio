-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 16, 2025 at 12:44 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maniurastudio`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Manicure'),
(2, 'Pedicure'),
(3, 'Henna'),
(4, 'Komplet'),
(5, 'Żele'),
(6, 'Depilacja woskiem'),
(7, 'Depilacja pastą cukrową'),
(8, 'Lifting rzęs');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_service`
--

CREATE TABLE `category_service` (
  `category_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_service`
--

INSERT INTO `category_service` (`category_id`, `service_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43),
(4, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(6, 57),
(6, 58),
(6, 59),
(6, 60),
(6, 61),
(6, 62),
(6, 63),
(6, 64),
(6, 65),
(6, 66),
(6, 67),
(7, 68),
(7, 69),
(7, 70),
(7, 71),
(7, 72),
(7, 73),
(7, 74),
(7, 75),
(7, 76),
(8, 77),
(8, 78),
(8, 79);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `image_source`) VALUES
(1, 'Natalia', 'uploads/profile-images/Natalia.png'),
(2, 'Angelika', 'uploads/profile-images/Angelika.png'),
(3, 'Awelina', 'uploads/profile-images/Awelina.png'),
(4, 'Marta', 'uploads/profile-images/Marta.png'),
(5, 'Daria', 'uploads/profile-images/Daria.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee_service_category`
--

CREATE TABLE `employee_service_category` (
  `employee_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_service_category`
--

INSERT INTO `employee_service_category` (`employee_id`, `category_id`, `service_id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 6),
(1, 1, 7),
(1, 1, 8),
(1, 1, 9),
(1, 1, 10),
(1, 1, 11),
(1, 1, 12),
(1, 1, 13),
(1, 1, 14),
(1, 1, 15),
(1, 1, 16),
(1, 1, 17),
(1, 1, 18),
(1, 2, 19),
(1, 2, 20),
(1, 2, 21),
(1, 2, 22),
(1, 2, 23),
(1, 2, 24),
(1, 2, 25),
(1, 2, 26),
(1, 2, 27),
(1, 2, 28),
(1, 3, 30),
(1, 3, 31),
(1, 3, 32),
(1, 3, 33),
(1, 3, 34),
(1, 3, 58),
(1, 4, 35),
(1, 4, 36),
(1, 4, 37),
(1, 4, 38),
(1, 4, 39),
(1, 4, 40),
(1, 4, 41),
(1, 4, 42),
(1, 4, 43),
(1, 4, 44),
(1, 5, 45),
(1, 5, 46),
(1, 5, 47),
(1, 5, 48),
(1, 5, 49),
(1, 5, 50),
(1, 5, 51),
(1, 5, 52),
(1, 5, 53),
(1, 5, 54),
(1, 5, 55),
(1, 5, 56),
(1, 6, 58),
(1, 6, 67),
(1, 7, 68),
(1, 7, 76),
(2, 1, 1),
(2, 1, 2),
(2, 1, 3),
(2, 1, 4),
(2, 1, 5),
(2, 1, 6),
(2, 1, 7),
(2, 1, 8),
(2, 1, 9),
(2, 1, 10),
(2, 1, 11),
(2, 1, 12),
(2, 1, 13),
(2, 1, 14),
(2, 1, 15),
(2, 1, 16),
(2, 1, 17),
(2, 1, 18),
(2, 2, 19),
(2, 2, 20),
(2, 2, 21),
(2, 2, 22),
(2, 2, 23),
(2, 2, 24),
(2, 2, 25),
(2, 2, 26),
(2, 2, 27),
(2, 2, 28),
(2, 3, 29),
(2, 3, 30),
(2, 3, 31),
(2, 3, 32),
(2, 3, 33),
(2, 3, 34),
(2, 4, 35),
(2, 4, 36),
(2, 4, 37),
(2, 4, 38),
(2, 4, 39),
(2, 4, 40),
(2, 4, 41),
(2, 4, 42),
(2, 4, 43),
(2, 4, 44),
(2, 5, 45),
(2, 5, 46),
(2, 5, 47),
(2, 5, 48),
(2, 5, 49),
(2, 5, 50),
(2, 5, 51),
(2, 5, 52),
(2, 5, 53),
(2, 5, 54),
(2, 5, 55),
(2, 5, 56),
(2, 6, 58),
(2, 6, 67),
(2, 7, 68),
(2, 7, 76),
(2, 8, 77),
(2, 8, 78),
(2, 8, 79),
(3, 1, 1),
(3, 1, 2),
(3, 1, 3),
(3, 1, 4),
(3, 1, 5),
(3, 1, 6),
(3, 1, 7),
(3, 1, 8),
(3, 1, 9),
(3, 1, 10),
(3, 1, 11),
(3, 1, 12),
(3, 1, 13),
(3, 1, 14),
(3, 1, 15),
(3, 1, 16),
(3, 1, 17),
(3, 1, 18),
(3, 2, 19),
(3, 2, 20),
(3, 2, 21),
(3, 2, 22),
(3, 2, 23),
(3, 2, 24),
(3, 2, 25),
(3, 2, 26),
(3, 2, 27),
(3, 2, 28),
(3, 3, 29),
(3, 3, 30),
(3, 3, 31),
(3, 3, 32),
(3, 3, 33),
(3, 3, 34),
(3, 4, 35),
(3, 4, 36),
(3, 4, 37),
(3, 4, 38),
(3, 4, 39),
(3, 4, 40),
(3, 4, 41),
(3, 4, 42),
(3, 4, 43),
(3, 4, 44),
(3, 5, 45),
(3, 5, 46),
(3, 5, 47),
(3, 5, 48),
(3, 5, 49),
(3, 5, 50),
(3, 5, 51),
(3, 5, 52),
(3, 5, 53),
(3, 5, 54),
(3, 5, 55),
(3, 5, 56),
(3, 6, 58),
(3, 6, 67),
(3, 7, 68),
(3, 7, 76),
(4, 1, 1),
(4, 1, 2),
(4, 1, 3),
(4, 1, 4),
(4, 1, 5),
(4, 1, 6),
(4, 1, 7),
(4, 1, 8),
(4, 1, 9),
(4, 1, 10),
(4, 1, 11),
(4, 1, 12),
(4, 1, 13),
(4, 1, 14),
(4, 1, 15),
(4, 1, 16),
(4, 1, 17),
(4, 1, 18),
(4, 2, 19),
(4, 2, 20),
(4, 2, 21),
(4, 2, 22),
(4, 2, 23),
(4, 2, 24),
(4, 2, 25),
(4, 2, 26),
(4, 2, 27),
(4, 2, 28),
(4, 3, 29),
(4, 3, 30),
(4, 3, 31),
(4, 3, 32),
(4, 3, 33),
(4, 3, 34),
(4, 4, 35),
(4, 4, 36),
(4, 4, 37),
(4, 4, 38),
(4, 4, 39),
(4, 4, 40),
(4, 4, 41),
(4, 4, 42),
(4, 4, 43),
(4, 4, 44),
(4, 5, 45),
(4, 5, 46),
(4, 5, 47),
(4, 5, 48),
(4, 5, 49),
(4, 5, 50),
(4, 5, 51),
(4, 5, 52),
(4, 5, 53),
(4, 5, 54),
(4, 5, 55),
(4, 5, 56),
(4, 6, 58),
(4, 7, 68),
(4, 7, 76),
(5, 1, 1),
(5, 1, 2),
(5, 1, 3),
(5, 1, 4),
(5, 1, 5),
(5, 1, 6),
(5, 1, 7),
(5, 1, 8),
(5, 1, 9),
(5, 1, 10),
(5, 1, 11),
(5, 1, 12),
(5, 1, 13),
(5, 1, 14),
(5, 1, 15),
(5, 1, 16),
(5, 1, 17),
(5, 1, 18),
(5, 2, 19),
(5, 2, 20),
(5, 2, 21),
(5, 2, 22),
(5, 2, 23),
(5, 2, 24),
(5, 2, 25),
(5, 2, 26),
(5, 2, 27),
(5, 2, 28),
(5, 3, 29),
(5, 3, 30),
(5, 3, 31),
(5, 3, 32),
(5, 3, 33),
(5, 3, 34),
(5, 4, 35),
(5, 4, 36),
(5, 4, 37),
(5, 4, 38),
(5, 4, 39),
(5, 4, 40),
(5, 4, 41),
(5, 4, 42),
(5, 4, 43),
(5, 4, 44),
(5, 5, 45),
(5, 5, 46),
(5, 5, 47),
(5, 5, 48),
(5, 5, 49),
(5, 5, 50),
(5, 5, 51),
(5, 5, 52),
(5, 5, 53),
(5, 5, 54),
(5, 5, 56),
(5, 6, 67);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `reservation_end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `service_id`, `employee_id`, `reservation_date`, `reservation_time`, `reservation_end_time`, `created_at`) VALUES
(106, 2, 35, 1, '2025-06-15', '12:00:00', '15:00:00', '2025-06-15 17:08:09'),
(107, 2, 30, 5, '2025-06-15', '15:00:00', '15:15:00', '2025-06-15 17:08:09'),
(108, 2, 35, 1, '2025-06-15', '15:15:00', '18:15:00', '2025-06-15 17:08:09'),
(109, 2, 19, 2, '2025-06-15', '18:15:00', '19:45:00', '2025-06-15 17:08:09'),
(110, 2, 28, 3, '2025-06-15', '19:45:00', '20:00:00', '2025-06-15 17:08:09'),
(111, 2, 1, 3, '2025-06-21', '13:15:00', '14:45:00', '2025-06-15 18:48:26'),
(112, 2, 16, 3, '2025-06-21', '14:45:00', '15:00:00', '2025-06-15 18:48:26'),
(113, 2, 1, 3, '2025-06-17', '08:45:00', '10:15:00', '2025-06-15 21:07:33'),
(114, 2, 45, 4, '2025-06-17', '10:15:00', '10:30:00', '2025-06-15 21:07:33'),
(115, 2, 1, 2, '2025-06-17', '09:00:00', '10:30:00', '2025-06-15 21:09:49'),
(116, 2, 29, 3, '2025-06-18', '12:45:00', '12:50:00', '2025-06-15 21:10:16'),
(117, 2, 19, 5, '2025-06-18', '12:50:00', '14:20:00', '2025-06-15 21:10:16'),
(118, 2, 19, 2, '2025-06-21', '13:00:00', '14:30:00', '2025-06-15 21:30:40'),
(119, 2, 29, 2, '2025-06-18', '17:45:00', '17:50:00', '2025-06-15 22:36:39'),
(120, 2, 19, 5, '2025-06-18', '17:50:00', '19:20:00', '2025-06-15 22:36:39'),
(121, 2, 28, 2, '2025-06-18', '19:20:00', '19:35:00', '2025-06-15 22:36:39'),
(122, 2, 45, 3, '2025-06-18', '09:15:00', '09:30:00', '2025-06-15 22:41:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `amount_of_stars` int(11) DEFAULT NULL CHECK (`amount_of_stars` between 1 and 5),
  `comment_text` text DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `amount_of_likes` int(11) DEFAULT 0,
  `amount_of_dislikes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `service_id`, `employee_id`, `amount_of_stars`, `comment_text`, `image_path`, `amount_of_likes`, `amount_of_dislikes`, `created_at`) VALUES
(13, 2, 5, 4, 5, 'Super , Pani Marta bardzo dokładna i sympatyczna 😊', 'uploads/reviews/img_684ef99ec95c76.86704041.jpeg', 1, 1, '2025-06-15 16:49:34'),
(14, 2, 18, 2, 5, 'Super wykonana robota!', NULL, 1, 1, '2025-06-15 16:55:04'),
(15, 2, 11, 1, 1, 'Wizyta była opóźniona', NULL, 4, 1, '2025-06-15 17:02:06'),
(16, 2, 58, 5, 5, 'nwm', 'uploads/reviews/img_684f14c777d4f2.02503880.jpeg', 6, 1, '2025-06-15 18:45:27'),
(17, 2, 14, 1, 5, 'Super!', 'uploads/reviews/img_684f4a7bd41734.28978638.jpeg', 0, 0, '2025-06-15 22:34:35'),
(18, 2, 14, 4, 5, 'Niesamowita Obsługa', NULL, 0, 0, '2025-06-15 22:35:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `description`, `price`, `time`) VALUES
(1, 'Manicure hybrydowy + baza proteinowa', 'Manicure hybrydowy z bazą proteinową to usługa, która łączy trwałość klasycznego manicure hybrydowego z dodatkowymi właściwościami wzmacniającymi paznokcie. Baza proteinowa, bogata w składniki odżywcze, wspomaga regenerację i utwardzenie paznokci, zapewniając im większą odporność na uszkodzenia. Efekt to piękne, lśniące paznokcie, które utrzymują się przez długi czas, a jednocześnie są zdrowsze i mniej podatne na łamanie. Idealna opcja dla osób, które chcą połączyć estetykę z troską o kondycję swoich paznokci.', 130.00, '1h 30min'),
(2, 'Manicure hybrydowy wegański', 'Manicure hybrydowy wegański to styl pielęgnacji paznokci, który uwzględnia produkty pozbawione składników pochodzenia zwierzęcego. W tym przypadku używa się lakierów hybrydowych, które nie zawierają składników odzwierzęcych ani nie są testowane na zwierzętach. Proces ten obejmuje przygotowanie paznokci, nałożenie specjalnej bazy, utwardzenie pod lampą UV lub LED, a następnie nałożenie lakieru hybrydowego wegańskiego. Ten rodzaj manicure charakteryzuje się trwałością i efektami przypominającymi lakier żelowy, a jednocześnie respektuje zasady weganizmu.\r\n                ', 130.00, '1h 30 min'),
(3, 'Manicure hybrydowy - krótkie paznokcie,  jeden kolor + baza proteinowa', 'Manicure hybrydowy- krótkie paznokcie, jeden kolor+baza proteinowa. Wyk. 1 h.\r\nNoszenie krótkich paznokci może być wygodne z kilku powodów. Po pierwsze, krótkie paznokcie są mniej podatne na uszkodzenia i łamliwość, co sprawia, że są bardziej praktyczne w codziennym życiu. Nie ma również obawy o to, że paznokcie łatwo zaczepią się i złamią.\r\n\r\nDodatkowo, krótkie paznokcie są często bardziej komfortowe przy codziennych zadaniach, takich jak pisanie, korzystanie z klawiatury czy wykonywanie innych manualnych czynności.\r\n\r\nWreszcie, krótkie paznokcie są zazwyczaj bardziej uniwersalne estetycznie i pasują do różnych stylizacji, co może być korzystne dla osób preferujących prostotę i minimalizm w pielęgnacji paznokci.\r\n                ', 130.00, '1h'),
(4, 'Manicure hybrydowy french', '', 150.00, '1h 45min'),
(5, 'Manicure Hybrydowy', 'Manicure hybrydowy to innowacyjna technika zdobienia paznokci, łącząca trwałość żelu i intensywność kolorów lakieru. Dzięki aplikacji pod lampą UV uzyskujesz lśniące, odporne na uszkodzenia paznokcie. Trwały efekt i szeroka paleta kolorów to ideał stylizacji paznokci.\r\n                ', 120.00, '1h 30min'),
(6, 'Manicure klasyczny z malowaniem', '', 90.00, '1h'),
(7, 'Manicure klasyczny bez koloru', '', 80.00, '45min'),
(8, 'Manicure japoński', 'W manicure japońskim, technika wcierania past odgrywa istotną rolę w pielęgnacji paznokci. Pastę wciera się delikatnie w płytkę paznokcia, używając specjalnych preparatów zawierających naturalne składniki, takie jak ekstrakty roślinne czy minerały. Proces ten ma na celu poprawę elastyczności paznokcia, nawilżenie i nadanie mu zdrowego wyglądu. Wcieranie past może być także stosowane w celu wzmocnienia płytki paznokcia i zapobiegania jej łamliwości. To subtelne podejście do pielęgnacji paznokci podkreśla dbałość o zdrowie i naturalny wygląd.\r\n                ', 95.00, '1h'),
(9, 'Zdjęcie hybrydy + opiłowanie + odżywka', '', 50.00, '30min'),
(10, 'Zdobienie paznokci lub french', 'Zdobienie paznokci to usługa kosmetyczna, która obejmuje różnorodne techniki upiększające paznokcie. W ramach zdobienia paznokci można stosować malowanie tradycyjne, manicure hybrydowy, żelowy, akrylowy, a także nakładanie ozdób, takich jak kryształki, naklejki czy kolorowe zdobienia. Zdobienie paznokci pozwala na tworzenie unikatowych wzorów, kolorów i efektów artystycznych, dostosowanych do indywidualnych preferencji klienta.\r\n                ', 20.00, '15min'),
(11, 'Baza proteinowa pod hybrydę', 'W manicure hybrydowym, baza proteinowa jest używana jako pierwszy krok przed nałożeniem lakieru hybrydowego. Jej główne zastosowanie to wzmacnianie i ochrona naturalnych paznokci. Baza proteinowa może zawierać składniki, takie jak keratyna lub inne proteiny, które mają na celu zwiększenie wytrzymałości paznokci, zapobieganie łamliwości i nadawanie im elastyczności.\r\n\r\nStosowanie bazy proteinowej w manicure hybrydowym może również poprawić przyczepność lakieru hybrydowego do płytki paznokcia, co wpływa na trwałość stylizacji. Ponadto, baza proteinowa może pomóc w zniwelowaniu nierówności na powierzchni paznokcia, tworząc gładką bazę dla kolejnych warstw lakieru hybrydowego. To ważny krok, który przyczynia się do estetyki i trwałości manicure hybrydowego.\r\n                ', 10.00, '10min'),
(12, 'Malowanie lakierem klasycznym', 'Manicure klasyczny to zazwyczaj subtelny i elegancki styl, który obejmuje podstawowe zabiegi pielęgnacyjne paznokci. Proces ten zwykle zaczyna się od odsunięcia skórek, nadanie odpowiedniego kształtu paznokciom, a następnie nałożenie bazowego lakieru. Klasyczny manicure często kończy się aplikacją klasycznego lakieru do paznokci w jednolitym kolorze lub delikatnym wzorze. To bardzo popularny wybór dla osób ceniących prostotę i subtelność.\r\n                ', 30.00, '15min'),
(13, 'Manicure Men', '', 80.00, '45min'),
(14, ' Naprawa paznokcia', '', 20.00, '15min'),
(15, 'Zabieg parafinowy - dłonie', '', 40.00, '30min'),
(16, 'Zdjęcie hybrydy', '', 20.00, '15min'),
(17, 'Zdjęcie żelu frezarką', '', 40.00, '30min'),
(18, 'Malowanie lakierem klasycznym + opiłowanie', '', 50.00, '30min'),
(19, 'Pedicure hybrydowy', '', 150.00, '1h 30min'),
(20, 'Pedicure hybrydowy - same paznokcie', '', 120.00, '1h'),
(21, 'Pedicure hybrydowy wegański', '', 160.00, '1h 30min'),
(22, 'Pedicure japoński', 'W pedicure japońskim, technika wcierania past odgrywa istotną rolę w pielęgnacji paznokci. Pastę wciera się delikatnie w płytkę paznokcia, używając specjalnych preparatów zawierających naturalne składniki, takie jak ekstrakty roślinne czy minerały. Proces ten ma na celu poprawę elastyczności paznokcia, nawilżenie i nadanie mu zdrowego wyglądu. Wcieranie past może być także stosowane w celu wzmocnienia płytki paznokcia i zapobiegania jej łamliwości. To subtelne podejście do pielęgnacji paznokci podkreśla dbałość o zdrowie i naturalny wygląd.\r\n                ', 110.00, '1h 15min'),
(23, 'Pedicure klasyczny bez koloru', '', 110.00, '1h'),
(24, 'Pedicure klasyczny z malowaniem', '', 130.00, '1h 15min'),
(25, 'Pedicure kwasowy + 20 zł do wybranej usługi pedicure', 'Pedicure kwasowy + 20 zł do wybranej usługi pedicure', 20.00, '15min'),
(26, 'Pedicure Men', '', 120.00, '1h'),
(27, 'Zabieg parafinowy - stopy', '', 50.00, '45min'),
(28, 'Zdjęcie hybrydt', '', 20.00, '15min'),
(29, 'Broda', '', 25.00, '5min'),
(30, 'Henna brwi', '', 35.00, '15min'),
(31, 'Henna rzęsy', '', 30.00, '15min'),
(32, 'Regulacja brwi', '', 30.00, '15min'),
(33, 'Regulacja brwi + henna brwi + rzęsy', '', 80.00, '30min'),
(34, 'Wąsik', '', 25.00, '5min'),
(35, 'Manicure hybrydowy + Pedicure hybrydowy + baza p.', '', 265.00, '3h'),
(36, 'Manicure hybrydowy + Pedicure klasyczny + baza p.', '', 245.00, '2h 30min'),
(37, 'Manicure hybrydowy wegański + Pedicure hybrydowy', '', 260.00, '3h'),
(38, 'Manicure hybrydowy wegański + Pedicure hybrydowy wegański', 'Manicure hybrydowy wegański + Pedicure hybrydowy wegański', 270.00, '2h 40min'),
(39, 'Manicure hybrydowy wegański + Pedicure klasyczny', '', 240.00, '2h 30min'),
(40, 'Manicure japoński + Pedicure japoński', '', 200.00, '2h 30min'),
(41, 'Manicure klasyczny + Pedicure hybrydowy', '', 230.00, '2h 30min'),
(42, 'Manicure klasyczny + Pedicure hybrydowy wegański', '', 240.00, '2h 30min'),
(43, 'Manicure klasyczny + Pedicure klasyczny', '', 210.00, '2h 15min'),
(44, 'Manicure Men + Pedicure Men', '', 190.00, '2h'),
(45, 'Naprawa paznokcia', '', 25.00, '15min'),
(46, 'Uzupełnianie żelem + hybryda', '', 155.00, '2h'),
(47, 'Uzupełnianie żelem + hybryda wegańska', '', 165.00, '2h'),
(48, 'Uzupełnianie żelem + kolor', '', 145.00, '2h'),
(49, 'Uzupełnienie żelem + hybryda pow. 4 tygodnia', '', 175.00, '2h'),
(50, 'Uzupełnienie żelem + hybryda wegańska pow. 4 tygodnia', 'Uzupełnienie żelem + hybryda wegańska pow. 4 tygodnia', 185.00, '2h'),
(51, 'Żel bez koloru', '', 170.00, '2h'),
(52, 'Żel + hybryda', '', 190.00, '2h 30min'),
(53, 'Żel + hybryda od 4 kreski', '', 200.00, '2h 30min'),
(54, 'Żel + hybryda wegańska', '', 190.00, '2h 30min'),
(55, 'Żel + hybryda wegańska od 4 kreski', '', 200.00, '2h 30min'),
(56, 'Żel z malowaniem', '', 180.00, '2h 30min'),
(57, 'Bikini', '', 30.00, '20min'),
(58, 'Broda', '', 25.00, '10min'),
(59, 'Brwi', '', 15.00, '10min'),
(60, 'Całe nogi', '', 70.00, '30min'),
(61, 'Całe ręce', '', 45.00, '30min'),
(62, 'Łydki', '', 35.00, '20min'),
(63, 'Pachy', '', 30.00, '20min'),
(64, 'Policzki', '', 15.00, '10min'),
(65, 'Przedramiona', '', 35.00, '20min'),
(66, 'Uda', '', 45.00, '20min'),
(67, 'Wąsik', '', 25.00, '10min'),
(68, 'Depilacja brody p.c', '', 20.00, '15min'),
(69, 'Depilacja brzucha p.c', '', 50.00, '30min'),
(70, 'Depilacja łydek p.c', '', 65.00, '40min'),
(71, 'Depilacja nóg p.c', '', 120.00, '1h 15min'),
(72, 'Depilacja pach p.c', '', 50.00, '20min'),
(73, 'Depilacja pleców p.c', '', 80.00, '45min'),
(74, 'Depilacja rąk p.c', '', 70.00, '50min'),
(75, 'Depilacja ud p.c', '', 60.00, '40min'),
(76, 'Depilacja wąsika p.c', '', 20.00, '15min'),
(77, 'Lifting rzęs + laminacja + keratyna + koloryzacja', '', 140.00, '1h 15min'),
(78, 'Lifting rzęs + laminacja + keratyna + koloryzacja + botoks', '', 160.00, '1h 15min'),
(79, 'Lifting rzęs + laminacja + keratyna + koloryzacja + botoks + henna i regulacja brwi', 'Lifting rzęs + laminacja + keratyna + koloryzacja + botoks + henna i regulacja brwi', 175.00, '1h 30min');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `service_gallery`
--

CREATE TABLE `service_gallery` (
  `gallery_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_gallery`
--

INSERT INTO `service_gallery` (`gallery_id`, `service_id`, `image_url`, `description`, `uploaded_at`) VALUES
(2, 5, 'uploads/gallery/1.jpeg', NULL, '2025-06-13 21:28:00'),
(3, 5, 'uploads/gallery/2.jpeg', NULL, '2025-06-13 21:39:53'),
(4, 5, 'uploads/gallery/3.jpeg', NULL, '2025-06-13 21:39:53'),
(5, 5, 'uploads/gallery/4.jpeg', NULL, '2025-06-13 21:39:53'),
(6, 5, 'uploads/gallery/5.jpeg', NULL, '2025-06-13 21:39:53'),
(7, 5, 'uploads/gallery/6.jpeg', NULL, '2025-06-13 21:39:53'),
(8, 5, 'uploads/gallery/7.jpeg', NULL, '2025-06-13 21:39:53'),
(9, 5, 'uploads/gallery/8.jpeg', NULL, '2025-06-13 21:39:53'),
(10, 5, 'uploads/gallery/9.jpeg', NULL, '2025-06-13 21:39:53'),
(11, 5, 'uploads/gallery/10.jpeg', NULL, '2025-06-13 21:39:53'),
(12, 1, 'uploads/gallery/11.jpeg', NULL, '2025-06-13 21:55:21'),
(13, 1, 'uploads/gallery/12.jpeg', NULL, '2025-06-13 21:55:21'),
(14, 1, 'uploads/gallery/13.jpeg', NULL, '2025-06-13 21:55:21'),
(15, 1, 'uploads/gallery/14.jpeg', NULL, '2025-06-13 21:55:21'),
(16, 1, 'uploads/gallery/15.jpeg', NULL, '2025-06-13 21:55:21'),
(17, 1, 'uploads/gallery/16.jpeg', NULL, '2025-06-13 21:55:21'),
(18, 1, 'uploads/gallery/17.jpeg', NULL, '2025-06-13 21:55:21'),
(19, 1, 'uploads/gallery/18.jpeg', NULL, '2025-06-13 21:55:21'),
(20, 1, 'uploads/gallery/19.jpeg', NULL, '2025-06-13 21:55:21'),
(21, 1, 'uploads/gallery/20.jpeg', NULL, '2025-06-13 21:55:21'),
(22, 2, 'uploads/gallery/21.jpeg', NULL, '2025-06-13 21:56:38'),
(23, 3, 'uploads/gallery/22.jpeg', NULL, '2025-06-13 21:58:57'),
(24, 3, 'uploads/gallery/23.jpeg', NULL, '2025-06-13 21:58:57'),
(25, 3, 'uploads/gallery/24.jpeg', NULL, '2025-06-13 21:58:57'),
(26, 3, 'uploads/gallery/25.jpeg', NULL, '2025-06-13 21:58:57'),
(27, 3, 'uploads/gallery/26.jpeg', NULL, '2025-06-13 21:58:57'),
(28, 3, 'uploads/gallery/27.jpeg', NULL, '2025-06-13 21:58:57'),
(29, 4, 'uploads/gallery/28.jpeg', NULL, '2025-06-13 22:01:03'),
(30, 4, 'uploads/gallery/29.jpeg', NULL, '2025-06-13 22:01:03'),
(31, 4, 'uploads/gallery/29.jpeg', NULL, '2025-06-13 22:01:03'),
(32, 4, 'uploads/gallery/31.jpeg', NULL, '2025-06-13 22:01:03'),
(33, 8, 'uploads/gallery/32.jpeg', NULL, '2025-06-13 22:02:26'),
(34, 10, 'uploads/gallery/33.jpeg', NULL, '2025-06-13 22:05:58'),
(35, 10, 'uploads/gallery/34.jpeg', NULL, '2025-06-13 22:05:58'),
(36, 10, 'uploads/gallery/35.jpeg', NULL, '2025-06-13 22:05:58'),
(37, 10, 'uploads/gallery/36.jpeg', NULL, '2025-06-13 22:05:58'),
(38, 10, 'uploads/gallery/37.jpeg', NULL, '2025-06-13 22:05:58'),
(39, 10, 'uploads/gallery/38.jpeg', NULL, '2025-06-13 22:05:58'),
(40, 10, 'uploads/gallery/39.jpeg', NULL, '2025-06-13 22:05:58'),
(41, 11, 'uploads/gallery/40.jpeg', NULL, '2025-06-13 22:08:20'),
(42, 11, 'uploads/gallery/41.jpeg', NULL, '2025-06-13 22:08:20'),
(43, 11, 'uploads/gallery/42.jpeg', '', '2025-06-13 22:08:20'),
(44, 12, 'uploads/gallery/43.jpeg', NULL, '2025-06-13 22:09:59'),
(45, 22, 'uploads/gallery/44.jpeg', NULL, '2025-06-13 22:10:42');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` enum('Mężczyzna','Kobieta') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`, `birth_date`, `sex`, `created_at`) VALUES
(2, 'Bartłomiej', 'Kowalik', 'barti.kowalik@interia.pl', '123asdASD', '2009-02-13', 'Mężczyzna', '2025-06-13 17:12:32'),
(3, 'Anna', 'Rączka', 'anna123@gmail.com', '123asdASD', '2008-08-22', 'Mężczyzna', '2025-06-13 17:22:30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `category_service`
--
ALTER TABLE `category_service`
  ADD PRIMARY KEY (`category_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indeksy dla tabeli `employee_service_category`
--
ALTER TABLE `employee_service_category`
  ADD PRIMARY KEY (`employee_id`,`category_id`,`service_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `fk_employee_id` (`employee_id`);

--
-- Indeksy dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `fk_reviews_employee` (`employee_id`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indeksy dla tabeli `service_gallery`
--
ALTER TABLE `service_gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `fk_service_gallery_service` (`service_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `service_gallery`
--
ALTER TABLE `service_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_service`
--
ALTER TABLE `category_service`
  ADD CONSTRAINT `category_service_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_service_category`
--
ALTER TABLE `employee_service_category`
  ADD CONSTRAINT `employee_service_category_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_service_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_service_category_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `service_gallery`
--
ALTER TABLE `service_gallery`
  ADD CONSTRAINT `fk_service_gallery_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
