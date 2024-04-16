-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 08:19 AM
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
-- Database: `tests_prog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pyt_otp`
--

CREATE TABLE `pyt_otp` (
  `pytania` text NOT NULL,
  `odpowiedz` text NOT NULL,
  `var1` text NOT NULL,
  `var2` text NOT NULL,
  `var3` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pyt_otp`
--

INSERT INTO `pyt_otp` (`pytania`, `odpowiedz`, `var1`, `var2`, `var3`, `id`) VALUES
('Co to jest zmienna w programowaniu?', 'b', 'a) Komentarz', 'b) Wartość, która może się zmieniać', 'c) Funkcja', 1),
('Jaki typ danych jest używany do przechowywania liczb całkowitych w języku programowania?', 'b', 'a) float', 'b) int', 'c) char', 2),
('Co robi operator \"if\" w kodzie programu?', 'b', 'a) Kończy program', 'b) Wykonuje blok kodu, jeśli warunek jest prawdziwy', 'c) Deklaruje zmienną', 3),
('Które z wymienionych języków programowania są obiektowo zorientowane?', 'a', 'a) Python, Java, C++', 'b) HTML, CSS, JavaScript', 'c) SQL, Ruby, PHP', 4),
('Co to jest tablica w programowaniu?', 'b', 'a) Posortowana kolekcja danych', 'b) Struktura danych zawierająca elementy tego samego typu', 'c) Funkcja do ponownego użycia kodu', 5),
('Jaki operator jest używany do cyklicznego wykonania bloku kodu w języku programowania?', 'a', 'a) for', 'b) switch', 'c) if-else', 6),
('Co to jest API (Interfejs programowania aplikacji)?', 'a', 'a) Abstrakcyjny interfejs programowy', 'b) Asynchroniczny protokół internetowy', 'c) Adapter do podłączania urządzeń', 7),
('Co to jest Git w kontekście tworzenia oprogramowania?\r\n', 'b', 'a) Przeglądarka internetowa', 'b) System kontroli wersji', 'c) Program do rysowania wykresów', 8),
('Co to jest pojęcie \"rekurencja\" w programowaniu?', 'b', 'a) Język programowania', 'b) Funkcja, która wywołuje samą siebie', 'c) Typ danych do przechowywania informacji tekstowej', 9),
('Który język programowania jest używany do tworzenia interaktywnych stron internetowych?', 'c', 'a) SQL', 'b) Java', 'c) JavaScript', 10),
('Co to jest atak DDoS?', 'b', 'a. Oprogramowanie do tworzenia baz danych', 'b. Atak na usługi internetowe', 'c. Przetwarzanie danych graficznych', 11),
('Co to jest phishing?', 'b', 'a. Oprogramowanie do tworzenia baz danych', 'b. Wyłudzanie informacji, często poprzez podszywanie się pod zaufane źródło', 'c. System operacyjny', 12),
('Co to jest system backdoor?', 'b', 'a. System operacyjny z otwartym kodem źródłowym', 'b. Ukryte wejście do systemu, które pozwala na późniejszy dostęp', 'c. System komunikacji między komputerami', 13),
('Co to jest malware?', 'a', 'a. Złośliwe oprogramowanie', 'b. Krótki film animowany', 'c. Szybki internetowy router', 14),
('Co to jest cracking?', 'a', 'a. Przejęcie kontroli nad danym użytkownikiem lub systemem komputerowym', 'b. Legalne łamanie zabezpieczeń systemu', 'c. Kraken - gigantyczne morskie stworzenie', 15),
('Co to jest cyber hijacking?', 'b', 'a. Przejście na emeryturę', 'b. Przejęcie kontroli nad danym użytkownikiem lub systemem komputerowym', 'c. Inwazja kosmitów', 16),
('Co to jest sim swapping?', 'a', 'a. Przejęcie numeru telefonu ofiary w celu przejęcia konta', 'b. Wymiana kart SIM między użytkownikami', 'c. Symulowanie ślubu', 17),
('Co to jest doxing?', 'a', 'a. Publiczne ujawnianie prywatnych informacji o danej osobie', 'b. Nowoczesny sposób gotowania', 'c. Technika rzeźbienia w drewnie', 18),
('Co to jest cyber spying?', 'b', 'a. Wyzywanie ludzi w grach', 'b. Nielegalne pozyskiwanie poufnych informacji', 'c. Automatyczne strzelanie w grach', 19),
('Co to jest Wi-Fi eavesdropping?', 'b', 'a. Robienie zakłóceń na kanałach radiowych', 'b. Przechwytywanie nieautoryzowanego dostępu do sieci Wi-Fi', 'c. Masowe wysyłanie zdjęć airdroppem', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `resultat`
--

CREATE TABLE `resultat` (
  `Name` text NOT NULL,
  `Lastname` text NOT NULL,
  `resultat` int(11) NOT NULL,
  `klass` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pyt_otp`
--
ALTER TABLE `pyt_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pyt_otp`
--
ALTER TABLE `pyt_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
