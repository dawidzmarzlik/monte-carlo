-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 05 Cze 2023, 08:26
-- Wersja serwera: 8.0.31
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$VDUXNi0m.Jbd3g4xj5Sgme/BnQLUz.wXlmm2F5CjiLXVA99iCJpPi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `assignedmaterials`
--

DROP TABLE IF EXISTS `assignedmaterials`;
CREATE TABLE IF NOT EXISTS `assignedmaterials` (
  `idTeachingMaterials` int NOT NULL,
  `idCourseRecords` int NOT NULL,
  PRIMARY KEY (`idTeachingMaterials`,`idCourseRecords`),
  KEY `fk_MaterialyDydaktyczne_has_EwidencjaKursow_EwidencjaKursow_idx` (`idCourseRecords`),
  KEY `fk_MaterialyDydaktyczne_has_EwidencjaKursow_MaterialyDydakt_idx` (`idTeachingMaterials`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courserecords`
--

DROP TABLE IF EXISTS `courserecords`;
CREATE TABLE IF NOT EXISTS `courserecords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(3) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idEwidencjaKursow_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `courserecords`
--

INSERT INTO `courserecords` (`id`, `category`, `price`) VALUES
(1, 'A', 1400),
(2, 'B', 2400),
(3, 'C', 2500),
(4, 'D', 3000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drive`
--

DROP TABLE IF EXISTS `drive`;
CREATE TABLE IF NOT EXISTS `drive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateTime` datetime DEFAULT NULL,
  `idTeacher` int NOT NULL,
  `idStudent` int DEFAULT NULL,
  PRIMARY KEY (`id`,`idTeacher`),
  UNIQUE KEY `idJazdy_UNIQUE` (`id`),
  KEY `fk_Jazdy_Instruktor1_idx` (`idTeacher`),
  KEY `fk_Jazdy_Kursant1_idx` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `drive`
--

INSERT INTO `drive` (`id`, `dateTime`, `idTeacher`, `idStudent`) VALUES
(1, '2023-06-13 13:00:00', 1, NULL),
(2, '2023-06-13 15:00:00', 1, 3),
(3, '2023-06-13 17:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `enrolledstudent`
--

DROP TABLE IF EXISTS `enrolledstudent`;
CREATE TABLE IF NOT EXISTS `enrolledstudent` (
  `idCourseRecords` int NOT NULL,
  `idStudent` int NOT NULL,
  PRIMARY KEY (`idCourseRecords`,`idStudent`),
  KEY `fk_EwidencjaKursow_has_Kursant_Kursant1_idx` (`idStudent`),
  KEY `fk_EwidencjaKursow_has_Kursant_EwidencjaKursow1_idx` (`idCourseRecords`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `enrolledstudent`
--

INSERT INTO `enrolledstudent` (`idCourseRecords`, `idStudent`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

DROP TABLE IF EXISTS `opinions`;
CREATE TABLE IF NOT EXISTS `opinions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int NOT NULL,
  `opinionText` varchar(1000) DEFAULT NULL,
  `idStudent` int NOT NULL,
  PRIMARY KEY (`id`,`idStudent`),
  UNIQUE KEY `idOpinie_UNIQUE` (`id`),
  KEY `fk_Opinie_Kursant1_idx` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questionsdatabase`
--

DROP TABLE IF EXISTS `questionsdatabase`;
CREATE TABLE IF NOT EXISTS `questionsdatabase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `questionText` varchar(256) NOT NULL,
  `answer1` varchar(256) NOT NULL,
  `answer2` varchar(256) NOT NULL,
  `answer3` varchar(256) DEFAULT NULL,
  `correctAnswer` varchar(256) NOT NULL,
  `questionScore` int NOT NULL,
  `questionFile` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idPytania_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `questionsdatabase`
--

INSERT INTO `questionsdatabase` (`id`, `questionText`, `answer1`, `answer2`, `answer3`, `correctAnswer`, `questionScore`, `questionFile`) VALUES
(1, 'Czy po zatrzymaniu pojazdu do kontroli, kierujący pojazdem powinien trzymać ręce na kierownicy?', 'TAK', 'NIE', NULL, 'TAK', 3, NULL),
(2, 'Czy w przedstawionej sytuacji jesteś ostrzegany o zbliżaniu się do przejazdu kolejowego wyposażonego w zapory, lub w półzapory?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685898971_pytanie2.png'),
(3, 'Czy w przedstawionej sytuacji jesteś ostrzegany o miejscu, w którym rowerzyści wjeżdżają na jezdnię lub przez nią przejeżdżają?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899035_pytanie3.png'),
(4, 'Czy w tej sytuacji wolno ci skręcić w lewo na najbliższym skrzyżowaniu?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899725_pytanie4.png'),
(5, 'Czy umieszczona pod znakiem zakazu tabliczka wskazuje długość odcinka jezdni, na którym zakaz obowiązuje?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899743_pytanie5.png'),
(6, 'Czy w przedstawionej sytuacji masz obowiązek zachować szczególną ostrożność?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899780_pytanie6.png'),
(7, 'Czy wyjeżdżając za te znaki informacyjne włączasz się do ruchu?', 'TAK', 'NIE', NULL, 'TAK', 3, NULL),
(8, 'Czy w widocznej sytuacji dopuszczalne jest zawracanie?', 'TAK', 'TAK', NULL, 'NIE', 3, 'storage/files/1685899822_pytanie8.png'),
(9, 'Czy w tej sytuacji wolno Ci wjechać na zwężony kawałek jezdni, jeżeli nie wymusza to na nadjeżdżającym z przeciwka konieczności zatrzymania się?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899838_pytanie9.png'),
(10, 'Czy w przedstawionej sytuacji jesteś ostrzegany o zwężeniu jezdni, które może powodować utrudnienia w ruchu?', 'TAK', 'NIE', NULL, 'TAK', 3, 'storage/files/1685899855_pytanie10.png'),
(11, 'Czy widoczny znak ostrzega o zbliżaniu się do skrzyżowania, na którym pierwszeństwo nie jest określone znakami drogowymi?', 'TAK', 'NIE', NULL, 'TAK', 2, 'storage/files/1685899916_pytanie11.png'),
(12, 'Czy tabliczka umieszczona pod znakiem wskazuje rzeczywisty przebieg drogi z pierwszeństwem przejazdu?', 'TAK', 'NIE', NULL, 'TAK', 2, 'storage/files/1685899931_pytanie12.png'),
(13, 'Czy w widocznej sytuacji masz prawo zawrócić na najbliższym skrzyżowaniu?', 'TAK', 'NIE', NULL, 'NIE', 2, 'storage/files/1685899948_pytanie13.png'),
(14, 'Czy za tym znakiem, w razie zatrzymania pojazdu wskutek zatoru drogowego, masz obowiązek zachować odstęp od poprzedzającego pojazdu nie mniejszy niż 5m?', 'TAK', 'NIE', NULL, 'TAK', 2, 'storage/files/1685899964_pytanie14..png'),
(15, 'Czy na jezdni oznaczonej tym znakiem wolno Ci zawrócić?', 'TAK', 'NIE', NULL, 'NIE', 2, 'storage/files/1685899993_pytanie27.PNG'),
(16, 'Czy w przedstawionej sytuacji jesteś ostrzegany o skrzyżowaniu, na którym ruch jest kierowany za pomocą sygnalizacji świetlnej?', 'TAK', 'NIE', NULL, 'TAK', 2, 'storage/files/1685900022_pytanie29.PNG'),
(17, 'Czy w widocznej sytuacji masz obowiązek jak najszybciej powrócić na prawą część jezdni?', 'TAK', 'NIE', NULL, 'TAK', 1, 'storage/files/1685900067_pytanie31.PNG'),
(18, 'Czy w przedstawionej sytuacji odległość znaku ostrzegawczego od miejsca niebezpiecznego wynosi od 150 do 300 metrów?', 'TAK', 'NIE', NULL, 'NIE', 1, 'storage/files/1685900095_pytanie32.PNG'),
(19, 'Czy w widocznej sytuacji znajdujesz się na drodze z pierwszeństwem?', 'TAK', 'NIE', NULL, 'TAK', 1, 'storage/files/1685900117_pytanie33.PNG'),
(20, 'Czy w odległości 1000 metrów od tego znaku rozpocznie się droga ekspresowa?', 'TAK', 'NIE', NULL, 'TAK', 1, 'storage/files/1685900139_pytanie34.PNG'),
(21, 'Jaki czynnik powoduje zmniejszenie pola widzenia kierującego pojazdem?', 'Duża prędkość jazdy', 'Dobra przejrzystość powietrza', 'Zbyt mała prędkość', 'Duża prędkość jazdy', 3, 'storage/files/1685900215_pytanie15.png'),
(22, 'Które z wymienionych elementów drogi powinieneś obserwować podczas jazdy autostradą?', 'Tylko swój pas ruchu przed pojazdem', 'Całą jednię i pobocze przed pojazdem i za pojazdem', 'Tylko swój pas ruchu i prawe pobocze przed pojazdem', 'Całą jednię i pobocze przed pojazdem i za pojazdem', 3, 'storage/files/1685900246_pytanie16.png'),
(23, 'Jakie czynniki mają wpływ na łączny czas postrzegania i reakcji kierującego pojazdem?', 'Stan opon', 'Widoczność na drodze, złożoność sytuacji drogowej', 'Dodatkowa masa pojazdu', 'Widoczność na drodze, złożoność sytuacji drogowej', 3, 'storage/files/1685900300_pytanie17.png'),
(24, 'Czy leżące na jezdni liście mogą mieć wpływ na długość drogi zatrzymania pojazdu?', 'Tak, bo mogą skrócić długość drogi hamowania', 'Tak, bo mogą wydłużyć drogę hamowania.', 'Nie wpływają na długość drogi hamowania', 'Tak, bo mogą wydłużyć drogę hamowania.', 3, 'storage/files/1685900333_pytanie18.png'),
(25, 'Jakiej metody hamowania użyjesz, w przypadku awarii ABS-u na śliskiej nawierzchni?', 'Hamowania pulsacyjnego', 'Wciśnięcia pedału hamulca do oporu', 'Zaciągnięcia hamulca ręcznego', 'Hamowania pulsacyjnego', 3, 'storage/files/1685900367_pytanie19.png'),
(26, 'Jakie czynniki wpływają na poprawę pola widzenia?', 'Zwiększenie prędkości pojazdu', 'Zmniejszenie prędkości pojazdu', 'Stres kierowcy', 'Zmniejszenie prędkości pojazdu', 3, 'storage/files/1685900398_pytanie20.png'),
(27, 'Jak zmienia się droga hamowania pojazdu zależnie od wzrostu prędkości?', 'Droga hamowania wydłuża się wraz ze wzrostem prędkości.', 'Droga hamowania ulega skróceniu wraz ze wzrostem prędkości.', 'Prędkość jazdy nie ma wpływu na drogę hamowania.', 'Droga hamowania wydłuża się wraz ze wzrostem prędkości.', 2, 'storage/files/1685900444_pytanie21.png'),
(28, 'Jaką awarię sygnalizuje szybko migający kierunkowskaz?', 'Słaby akumulator.', 'Zwarcie w przewodach wysokiego napięcia', 'Przepaloną żarówkę kierunkowskazu.', 'Przepaloną żarówkę kierunkowskazu.', 2, 'storage/files/1685900475_pytanie22.png'),
(29, 'Która z widocznych na ilustracji lampek kontrolnych informuje o włączonych tylnych światłach przeciwmgłowych?', 'A', 'B', 'C', 'A', 2, 'storage/files/1685900501_pytanie23.png'),
(30, 'Czy prędkość jazdy i odstęp od innych uczestników ruchu drogowego należy dostosować do stanu nawierzchni?', 'Tak, ale tylko w obszarze zabudowanym', 'Tak, ponieważ stan nawierzchni ma istotny wpływ na drogę hamowania.', 'Tak, ale tylko podczas opadów śniegu', 'Tak, ponieważ stan nawierzchni ma istotny wpływ na drogę hamowania.', 2, 'storage/files/1685900530_pytanie24.png'),
(31, 'Który z wymienionych czynników ma decydujący wpływ na określenie odległości od pojazdu jadącego przed nami?', 'Długość pojazdu.', 'Szerokość pojazdu.', 'Prędkość Pojazdu.', 'Prędkość Pojazdu.', 1, 'storage/files/1685900574_pytanie25.png'),
(32, 'Czy przejrzystość szyb ma wpływ na pole widzenia kierowcy?', 'Ma wpływ na ograniczenie pola widzenia.', 'Tylko w warunkach zmniejszonej przejrzystości powietrza.', 'Nie ma żadnego wpływu na pole widzenia kierowcy.', 'Ma wpływ na ograniczenie pola widzenia.', 1, 'storage/files/1685900602_pytanie26.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(64) NOT NULL,
  `birthDate` date NOT NULL,
  `pkk` varchar(20) NOT NULL,
  `phoneNumber` varchar(9) NOT NULL,
  `password` varchar(64) NOT NULL,
  `Teacher_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idKursant_UNIQUE` (`id`),
  UNIQUE KEY `pkk_UNIQUE` (`pkk`),
  KEY `fk_Student_Teacher1_idx` (`Teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `email`, `birthDate`, `pkk`, `phoneNumber`, `password`, `Teacher_id`) VALUES
(3, 'Dawid', 'Zmarzlik', 'dawid.zmarzlik@gmail.com', '2000-03-18', '42380942394802384092', 828373728, '$2y$10$BHhsqeLhjHUJREitLMVDL.4zn/Ids4BpBmaP6xopBgUChJ9jwyS26', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birthDate` date NOT NULL,
  `phoneNumber` varchar(9) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idInstruktor_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `surname`, `birthDate`, `phoneNumber`, `email`, `password`) VALUES
(1, 'Mateusz', 'Nowak', '1983-02-08', 427398472, 'mateusz.nowak@gmail.com', '$2y$10$DKw8UWu3ns0Me82kJQ99hOCLBqGW/qgzm/KK1u3x.aAPvwYfkgKim'),
(2, 'Bartosz', 'Kowalski', '1990-02-28', 738912731, 'b.kowalski@gmail.com', '$2y$10$pUsiqN6GjCe/JNlMtfr2mON7Vpc.6gb5l78/z66R2Wp0CLSjlLJY.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacheropinions`
--

DROP TABLE IF EXISTS `teacheropinions`;
CREATE TABLE IF NOT EXISTS `teacheropinions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int NOT NULL,
  `opinionText` varchar(1000) DEFAULT NULL,
  `idStudent` int NOT NULL,
  `idTeacher` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_TeacherOpinions_Student1_idx` (`idStudent`),
  KEY `fk_TeacherOpinions_Teacher1_idx` (`idTeacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacherpermissons`
--

DROP TABLE IF EXISTS `teacherpermissons`;
CREATE TABLE IF NOT EXISTS `teacherpermissons` (
  `idCourseRecords` int NOT NULL,
  `idTeacher` int NOT NULL,
  PRIMARY KEY (`idCourseRecords`,`idTeacher`),
  KEY `fk_EwidencjaKursow_has_Instruktor_Instruktor1_idx` (`idTeacher`),
  KEY `fk_EwidencjaKursow_has_Instruktor_EwidencjaKursow1_idx` (`idCourseRecords`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `teacherpermissons`
--

INSERT INTO `teacherpermissons` (`idCourseRecords`, `idTeacher`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachingmaterials`
--

DROP TABLE IF EXISTS `teachingmaterials`;
CREATE TABLE IF NOT EXISTS `teachingmaterials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idMaterialyDydaktyczne_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testscore`
--

DROP TABLE IF EXISTS `testscore`;
CREATE TABLE IF NOT EXISTS `testscore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idStudent` int NOT NULL,
  PRIMARY KEY (`id`,`idStudent`),
  UNIQUE KEY `idWynikiTest_UNIQUE` (`id`),
  KEY `fk_WynikiTest_Kursant1_idx` (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `testscore`
--

INSERT INTO `testscore` (`id`, `score`, `date`, `idStudent`) VALUES
(1, 27, '2023-06-05 10:22:13', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `numberplate` varchar(8) NOT NULL,
  `type` varchar(45) NOT NULL,
  `Teacher_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idPojazd_UNIQUE` (`id`),
  UNIQUE KEY `nrRejestracyjny_UNIQUE` (`numberplate`),
  KEY `fk_Vehicle_Teacher1_idx` (`Teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `vehicle`
--

INSERT INTO `vehicle` (`id`, `brand`, `model`, `numberplate`, `type`, `Teacher_id`) VALUES
(2, 'Ford', 'Focus', 'OPO42000', 'Osobowy', 1),
(3, 'Ford', 'F-MAX', 'OPO82312', 'Ciężarowy', NULL),
(4, 'Ford', 'Fiesta', 'OPO83712', 'Osobowy', 2);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `assignedmaterials`
--
ALTER TABLE `assignedmaterials`
  ADD CONSTRAINT `fk_MaterialyDydaktyczne_has_EwidencjaKursow_EwidencjaKursow1` FOREIGN KEY (`idCourseRecords`) REFERENCES `courserecords` (`id`),
  ADD CONSTRAINT `fk_MaterialyDydaktyczne_has_EwidencjaKursow_MaterialyDydaktyc1` FOREIGN KEY (`idTeachingMaterials`) REFERENCES `teachingmaterials` (`id`);

--
-- Ograniczenia dla tabeli `drive`
--
ALTER TABLE `drive`
  ADD CONSTRAINT `fk_Jazdy_Instruktor1` FOREIGN KEY (`idTeacher`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `fk_Jazdy_Kursant1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`);

--
-- Ograniczenia dla tabeli `enrolledstudent`
--
ALTER TABLE `enrolledstudent`
  ADD CONSTRAINT `fk_EwidencjaKursow_has_Kursant_EwidencjaKursow1` FOREIGN KEY (`idCourseRecords`) REFERENCES `courserecords` (`id`),
  ADD CONSTRAINT `fk_EwidencjaKursow_has_Kursant_Kursant1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`);

--
-- Ograniczenia dla tabeli `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `fk_Opinie_Kursant1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`);

--
-- Ograniczenia dla tabeli `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_Teacher1` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`id`);

--
-- Ograniczenia dla tabeli `teacheropinions`
--
ALTER TABLE `teacheropinions`
  ADD CONSTRAINT `fk_TeacherOpinions_Student1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `fk_TeacherOpinions_Teacher1` FOREIGN KEY (`idTeacher`) REFERENCES `teacher` (`id`);

--
-- Ograniczenia dla tabeli `teacherpermissons`
--
ALTER TABLE `teacherpermissons`
  ADD CONSTRAINT `fk_EwidencjaKursow_has_Instruktor_EwidencjaKursow1` FOREIGN KEY (`idCourseRecords`) REFERENCES `courserecords` (`id`),
  ADD CONSTRAINT `fk_EwidencjaKursow_has_Instruktor_Instruktor1` FOREIGN KEY (`idTeacher`) REFERENCES `teacher` (`id`);

--
-- Ograniczenia dla tabeli `testscore`
--
ALTER TABLE `testscore`
  ADD CONSTRAINT `fk_WynikiTest_Kursant1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`);

--
-- Ograniczenia dla tabeli `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_Vehicle_Teacher1` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
