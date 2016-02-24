-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2015 um 19:23
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `dishwish`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_ID` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(64) NOT NULL,
  PRIMARY KEY (`c_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`c_ID`, `catname`) VALUES
(1, 'Pasta'),
(2, 'Gemüse'),
(3, 'Fleisch'),
(4, 'Suppe'),
(5, 'Brainfood'),
(6, 'Reis'),
(7, 'Fisch'),
(8, 'Dessert'),
(9, 'Salat'),
(10, 'Vegetarisch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ing_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`ing_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Daten für Tabelle `ingredients`
--

INSERT INTO `ingredients` (`ing_ID`, `name`) VALUES
(1, 'Putenfleisch'),
(2, 'Gorgonzola'),
(3, 'Schlagobers'),
(4, 'Frischkäse'),
(5, 'Speck'),
(6, 'Thymian'),
(7, 'Salz'),
(8, 'Pfeffer'),
(9, 'Knoblauch'),
(10, 'Reis'),
(11, 'Rotwein'),
(12, 'Suppenwürfel'),
(13, 'Couscous'),
(14, 'Zwiebel'),
(15, 'Semmel'),
(16, 'Eier'),
(17, 'Milch'),
(18, 'Petersilie'),
(19, 'Schnittlauch'),
(20, 'Muskat'),
(21, 'Öl'),
(22, 'Butter'),
(23, 'Joghurt'),
(24, 'Käse'),
(25, 'Mozarella'),
(26, 'Hokkaidokürbis'),
(27, 'Haferkekse'),
(28, 'Cornflakes'),
(29, 'Schokolade(weiß)'),
(30, 'Topfen'),
(31, 'Gelatine'),
(32, 'Erdbeeren'),
(33, 'Spaghetti'),
(34, 'Schinken'),
(35, 'Haferflocken'),
(36, 'Roggenweckerl'),
(37, 'Zucchini'),
(38, 'Paprika'),
(39, 'Honig'),
(40, 'Schafkäse'),
(41, 'Senf'),
(42, 'Essig'),
(43, 'Zucker'),
(44, 'Thunfisch'),
(45, 'Tomatenstückchen'),
(46, 'Basilikum'),
(47, 'Hackfleisch'),
(48, 'Tomaten püriert (Tomatensauce)'),
(49, 'Tomatenmark'),
(50, 'Mais'),
(51, 'Kidney-Bohnen'),
(52, 'Spinat'),
(53, 'Parmesan'),
(54, 'Penne, Linguine, Pasta'),
(56, 'Toastbrot'),
(57, 'Butterschmalz'),
(58, 'Mehl'),
(59, 'Hähnchenbrustfilet'),
(61, 'Radieschen'),
(66, 'Apfel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipename` varchar(64) NOT NULL,
  `preparation` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`r_id`, `recipename`, `preparation`, `picture`) VALUES
(1, 'Putenroulade mit Gorgonzola', 'Schnitzel plattklopfen, auf beide s\nSeiten salzen/pfeffern.\nAuf einer Seite mit Frischkäse würzen und gewürfelten Gorgonzola drüber.\nGanz eng einrollen und mit Speck umwickeln.\nRouladen von allen Seiten scharf anbraten.\nKurz warmstellen und im Bratansatz die gewürfelten Zwiebeln und Knoblauch anschwitzen, mit Rotwein ablöschen und mit Rindsuppe aufgießen. \nRouladen hineinlegen und kochen lassen. (ca 20 min.)\nIn der Zwischenzeit den Reis kochen.\nDer Sauce dann Schlagobers und Thymianzweige beimengen.\nANRICHTEN!', '../img/putenroulade.jpg'),
(2, 'Couscouslaibchen mit Joghurt-Dip', 'Für die Weizenlaibchen den Weizen nach Packungsanleitung in Wasser weich kochen und mit Salz würzen. Semmelbrösel in der erwärmten Milch (bei Bedarf ein wenig mehr Milch nehmen) eine Viertelstunde ziehen.\n\nZwiebel feinwürfelig schneiden, Petersilie hacken und Knoblauch pressen.\n\nDie Zwiebeln in Butter andünsten.\n\nDas gegarte Weizen mit den Eiern, Zwiebeln, Knoblauch Semmelbröseln und Petersilie gut mischen. Mit Salz, Pfeffer und Muskatnuss herzhaft nachwürzen.\n\nLaibchen formen. Öl erhitzen und die Weizenlaibchen auf beiden Seiten jeweils fünf min rösten.\n\nFür den Joghurt-Dip das Joghurt mit Salz/Pfeffer und vers. Kräutern würzen.', '../img/couscouslaibchen.jpg'),
(3, 'Spaghetti Gorgonzola', 'Die Nudeln in einem großen Topf in reichlich Salzwasser al dente kochen.\nInzwischen den Gorgonzola in kleine Würfel schneiden. Die Salbeiblätter waschen und trockentupfen.\nIn einer Pfanne, die so groß sein soll, dass später auch die Nudeln darin Platz haben, die Butter, den Salbei und die Käse-und Schinkenwürfel bei schwacher Hitze erwärmen, bis der Käse geschmolzen ist.\nLangsam unter ständigem Rühren zwei Drittel des Obers dazugießen. Mit Salz und reichlich Pfeffer würzen. Die Sauce leicht eindicken lassen.\nDie Nudeln gut abtropfen lassen und in die Pfanne geben. Das restliche Obers darüber gießen und alles gut durchmischen. Vor dem Servieren die Salbeiblätter entfernen.\n', '../img/spaghettigorgo.jpg'),
(4, 'Erdbeer-Schoko-Frischkäsetorte', 'Aus dem Gefrierbeutel die Luft rauslassen, fest verschließen und die Kekse mit einem Nudelholz zerkleinern, bis von der Mischung nur noch große Brösel übrig sind.\n\n50g Schokolade und Butter immer wieder rühren, bis eine homogene Masse entsteht. Die Keksmischung in eine Schüssel geben, die Schoko-Butter-Flüssigkeit dazugeben und alles gut vermengen.\n\nEinen Kuchenrahmen (18x27 cm) auf einen große Kuchenplatte stellen und die Keksmischung darin verteilen. Fest andrücken und dann mindestens eine Stunde in den Kühlschrank stellen, damit der Boden fest wird. Ich denke, ihr müsst nicht unbedingt eine rechteckige Form verwenden. Wenn ihr keine zur Hand habt, dann nehmt einfach eine Springform.\n\nIn der Zwischenzeit die restlichen 200g Schokolade für den Kuchen im heißen Wasserbad schmelzen. Ebenso die Gelatine vorbereiten. \n\nDie drei Becher Philadelphia Frischkäse mit dem Joghurt und Quark mischen, bis eine cremige Masse entsteht. Wenn die weiße Schokolade geschmolzen ist, diese nach und nach unterrühren. Mir war die Frischkäsemasse durch die Schokolade süß genug - je nach Geschmack kann man das Ganze aber nach belieben durch Zucker süßen.\n\nAbschließend die Gelatine unter ständigem Rühren erhitzen, bis sie flüssig ist. Dann einen Teil der Frischkäsemasse zur Gelatine geben (nicht andersrum!!!) und geschmeidig rühren. Nach und nach dann die Creme unter die Gelatine mischen.\n\nWenn der Boden mittlerweile hart ist, die Kuchenplatte aus dem Kühlschrank holen. Die Erdbeeren halbieren und am Rand des Kuchenrahmes platzieren. Mit der Schnittstelle nach außen. Die übrig gebliebenen Erdbeeren fein würfeln.\n\nDie Frischkäse-Schokoladen-Masse halbieren. Unter den einen Teil die Erdberen geben, den anderen Teil so lassen, wie er ist.\n\nDie Hälfte der "leeren" Masse auf dem Kuchenboden verteilen. Anschließend die Erdbeern-Masse draufgeben. Und oben folgt nochmal eine Schicht Philadelphia-Schoko-Creme.\n\nJetzt kommt der Kuchen am besten über Nacht in den Kühlschrank. Und vor dem Servieren kann man dann noch etwas Erdbeer-Rhabarber-Sirup darüber träufeln. Dann schmeckt es noch fruchtiger.\n', '../img/frischkäsetorte.JPG'),
(6, 'Putensandwich', 'Putenstreifen mit Zwiebelwürfel anbraten, Ei kochen, in der Zwischenzeit Roggenweckerl aufschneiden. Zucchini in Scheiben schneiden und im Bratrückstand kurz von beiden Seiten anbraten, aus der Pfanne nehmen und mit Salz und Pfeffer würzen.\nDas Brötchen mit den Ei-Scheiben, Zucchinischeiben und dem angebratenen Fleisch belegen, zum Schluss noch eine Scheibe Käse drüberlegen und 3 min im Ofen überbacken.\nFERTIG!', '../img/putensandwich.jpg'),
(7, 'Schafkäse im Speckmantel auf Salat', 'Den Schafkäse in ca 2cm dicke Stücke schneiden, diese mit Speck umwickeln(am besten mit einem Zahnstocherstückchen befestigen).\nÖl in die Pfanne geben und den umwickelten Schafkäse ca 2 min auf jeder Seite anbraten.\nIn der Zwischenzeit den Salat waschen und zerkleinern, aus Salz, Pfeffer, Essig, Zucker, Öl und Senf ein Dressing bereiten. Dieses über den Salat geben und kurz durchmischen, den heißen Schafkäse drauflegen und sofort verzehren.', '../img/schafkäsespeckmantel.jpg'),
(8, 'Buntes Ofengemüse', 'Zucchini, Kürbis und Paprika in grobe Würfel schneiden. Zwiebel in Ringe schneiden, alles mit einer Marinade aus Honig, Salz, Peffer und Knoblauch marinieren und 10 min rasten lassen.\nDann auf ein geöltes Backblech geben und für ca 40 min im Ofen grillen.', '../img/ofengemüse.jpg'),
(9, 'Thunfisch-Pasta', 'Thunfisch abtropfen lassen. Nudeln in 2–3 l kochendem Salzwasser (ca. 1 TL Salz pro Liter) garen.\r\nZwiebel und Knoblauch schälen und fein hacken. Im heißen Öl andünsten. Tomaten zugeben, aufkochen und ca. 5 Minuten köcheln. Basilikumblätter waschen. Mit Thunfisch zur Soße geben. Mit Salz, Pfeffer und 1 Prise Zucker abschmecken. \r\nNudeln abgießen, mit der Soße mischen und anrichten.', '../img/thunfischpasta.jpg'),
(10, 'Spinatrisotto', 'Zwiebeln und Knoblauch schälen und fein würfeln. Butter und Öl in einem Topf erhitzen, Zwiebel und Knoblauch bei schwacher Hitze glasig dünsten. Reis zufügen, kurz mit anschwitzen. Mit Pfeffer würzen.\r\nNach und nach Brühe zugießen, dabei ab und zu umrühren. Nächste Portion Flüssigkeit immer erst zugießen, wenn der Reis die Flüssigkeit aufgenommen hat. Insgesamt 30–35 Minuten garen.\r\n\r\n100 ml Wasser und Spinat in einen Topf geben. Zugedeckt bei mittlerer Hitze aufkochen. Ca. 2 Minuten köcheln lassen, dabei mehrmals umrühren. Schnittlauch waschen, trocken schütteln und in feine Röllchen schneiden. Parmesan fein reiben. \r\n\r\nSpinat mit Flüssigkeit, Schnittlauch und 50 g Parmesan unter das Risotto mengen. Mit Salz und Pfeffer abschmecken. Risotto in Schälchen mit restlichem Parmesan bestreut anrichten. ', '../img/spinatrisotto.jpg'),
(11, 'Chili con Carne', 'Zwiebel und Knoblauch schälen und fein würfeln. 2 Chilischoten längs aufschneiden, entkernen und in Ringe schneiden.\r\nÖl in einer beschichteten Pfanne erhitzen. Hack darin krümelig braten. Mit Salz und Pfeffer würzen. Zwiebel und Knoblauch darin andünsten. Tomatenmark darin anschwitzen. Mit Tomatensaft und stückigen Tomaten ablöschen. Alles ca. 2 Minuten köcheln. \r\n\r\nKidney-Bohnen abspülen und abtropfen lassen. Mais abtropfen lassen. Kidney-Bohnen und Mais zur Hack-Tomaten-Mischung geben, ca. 2 Minuten köcheln.\r\n\r\nMit Salz, Pfeffer und Zucker abschmecken. Chili con carne in Schälchen anrichten. ', '../img/chiliconcarne.jpg'),
(13, 'Cornflakes- Cordon Bleu ', 'Die Hähnchenbrustfilets der Länge nach aufschneiden, auseinanderklappen, zwischen Frischhaltefolie legen und mit einem Fleischklopfer leicht klopfen. Von beiden Seiten mit Salz und Pfeffer würzen. Mit dem Schinken und dem Käse belegen und zusammenklappen.\r\n\r\nDie Filets in Mehl, den aufgeschlagenen Eiern und den zerkleinerten Cornflakes wenden. Im Butterschmalz ca. 5 Minuten von jeder Seite braten.\r\n\r\nDazu passen Petersilkaartoffeln: Kartoffeln waschen und kochen, nach dem Schälen mit Salz, Pfeffer und Petersilie kurz in Butter schwenken.', '../img/cornflakescordonbleu.jpg'),
(14, 'Spiegelei-Toast', 'In der Pfanne etwas Öl erhitzen und Ei aufschlagen, kurz braten. Speckscheiben ebenfalls kurz mitbraten.\r\nIn der Zwischenzeit das Toastbrot mit Butter bestreichen und toasten.\r\n\r\nSobald das Brot kross ist, dieses aus dem Toaster nehmen und das Spiegelei und den Speck drauflegen und mit Petersilie bestreuen.\r\n', '../img/spiegeleitoast.jpg'),
(32, 'Käsesuppe mit Croutons', 'Zwiebel und Käse würfelig schneiden.Zwiebel dann in Butter anschwitzen und Mehl zugeben, (Weißwein zugeben), mit Rindsuppe aufgießen und nach Belieben würzen.\r\nSuppe 15 min köcheln lassen und Schlagobers und Käse zugeben.\r\nWieder 5 min kochen lassen. Je nach Konsistenz des Käses pürieren und durch ein Sieb streichen.', '../img/kaesesuppe.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes_category`
--

CREATE TABLE IF NOT EXISTS `recipes_category` (
  `r_id` int(3) NOT NULL,
  `c_ID` int(3) NOT NULL,
  PRIMARY KEY (`r_id`,`c_ID`),
  KEY `c_ID` (`c_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `recipes_category`
--

INSERT INTO `recipes_category` (`r_id`, `c_ID`) VALUES
(3, 1),
(9, 1),
(8, 2),
(1, 3),
(11, 3),
(13, 3),
(32, 4),
(6, 5),
(14, 5),
(10, 6),
(4, 8),
(7, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipes_ingredients` (
  `r_id` int(3) NOT NULL,
  `ing_ID` int(3) NOT NULL,
  `amount` int(4) NOT NULL,
  `unit` char(4) NOT NULL,
  PRIMARY KEY (`r_id`,`ing_ID`),
  KEY `ing_ID` (`ing_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `recipes_ingredients`
--

INSERT INTO `recipes_ingredients` (`r_id`, `ing_ID`, `amount`, `unit`) VALUES
(1, 1, 150, 'g'),
(1, 2, 50, 'g'),
(1, 3, 2, 'EL'),
(1, 4, 1, 'EL'),
(1, 5, 50, 'g'),
(1, 6, 10, 'g'),
(1, 7, 1, 'Prs'),
(1, 8, 1, 'Prs'),
(1, 9, 1, 'St'),
(1, 10, 125, 'ml'),
(1, 11, 125, 'ml'),
(1, 12, 1, 'St'),
(1, 14, 1, 'St'),
(2, 7, 1, 'Prs'),
(2, 8, 1, 'Prs'),
(2, 9, 1, 'Zehe'),
(2, 13, 100, 'g'),
(2, 14, 1, 'Stk'),
(2, 15, 1, 'Stk'),
(2, 16, 1, 'Stk'),
(2, 17, 125, 'ml'),
(2, 18, 0, 'Bund'),
(2, 20, 1, 'Prs'),
(3, 2, 50, 'g'),
(3, 3, 100, 'g'),
(3, 8, 0, 'g'),
(3, 9, 0, 'g'),
(3, 22, 1, 'EL'),
(3, 33, 100, 'g'),
(3, 34, 50, 'g'),
(4, 4, 3, 'Pkg'),
(4, 22, 50, 'g'),
(4, 23, 500, 'g'),
(4, 27, 200, 'g'),
(4, 28, 6, 'EL'),
(4, 29, 250, 'g'),
(4, 30, 250, 'g'),
(4, 31, 2, 'Pkg'),
(4, 32, 500, 'g'),
(4, 35, 6, 'EL'),
(4, 43, 50, 'g'),
(6, 1, 100, 'g'),
(6, 7, 1, 'Prs'),
(6, 8, 1, 'Prs'),
(6, 14, 1, 'Stk'),
(6, 16, 1, 'Stk'),
(6, 24, 2, 'Blt'),
(6, 36, 1, 'Stk'),
(6, 37, 150, 'g'),
(7, 5, 20, 'g'),
(7, 7, 1, 'Prs'),
(7, 8, 1, 'Prs'),
(7, 9, 1, 'Zehe'),
(7, 40, 1, 'Pkg'),
(7, 41, 1, 'EL'),
(7, 42, 2, 'EL'),
(7, 43, 1, 'Prs'),
(8, 7, 1, 'Prs'),
(8, 8, 1, 'Prs'),
(8, 9, 1, 'Zehe'),
(8, 26, 100, 'g'),
(8, 37, 150, 'g'),
(8, 38, 100, 'g'),
(8, 39, 1, 'EL'),
(8, 43, 1, 'Prs'),
(9, 7, 1, 'Prs'),
(9, 8, 1, 'Prs'),
(9, 9, 1, 'Zehe'),
(9, 10, 200, 'g'),
(9, 12, 1, 'Stk'),
(9, 14, 1, 'Stk'),
(9, 53, 50, 'g'),
(9, 54, 250, 'g'),
(10, 7, 1, 'Prs'),
(10, 8, 1, 'Prs'),
(10, 9, 1, 'Zehe'),
(10, 10, 200, 'g'),
(10, 44, 1, 'Dose'),
(10, 45, 1, 'Dose'),
(11, 7, 1, 'Prs'),
(11, 8, 1, 'Prs'),
(11, 9, 1, 'Zehe'),
(11, 14, 1, 'Stk'),
(11, 43, 2, 'Prs'),
(11, 45, 1, 'Dose'),
(11, 47, 250, 'g'),
(11, 48, 200, 'ml'),
(11, 49, 2, 'EL'),
(11, 50, 1, 'Dose'),
(11, 51, 1, 'Dose'),
(13, 7, 1, 'Prs'),
(13, 8, 1, 'Prs'),
(13, 16, 1, 'Stk'),
(13, 24, 1, 'Schb'),
(13, 28, 5, 'EL'),
(13, 34, 1, 'Schb'),
(13, 57, 4, 'EL'),
(13, 58, 3, 'EL'),
(13, 59, 1, 'Stk'),
(14, 5, 3, 'Schb'),
(14, 7, 1, 'Prs'),
(14, 8, 1, 'Prs'),
(14, 16, 1, 'Stk'),
(14, 18, 1, 'Prs'),
(14, 56, 1, 'Stk'),
(32, 3, 100, 'ml'),
(32, 7, 1, 'Prs'),
(32, 8, 1, 'Prs'),
(32, 12, 1, 'EL'),
(32, 14, 0, 'Stk'),
(32, 22, 1, 'EL'),
(32, 24, 100, 'g'),
(32, 43, 1, 'Prs');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `recipes_category`
--
ALTER TABLE `recipes_category`
  ADD CONSTRAINT `recipes_category_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `recipes` (`r_id`),
  ADD CONSTRAINT `recipes_category_ibfk_2` FOREIGN KEY (`c_ID`) REFERENCES `category` (`c_ID`);

--
-- Constraints der Tabelle `recipes_ingredients`
--
ALTER TABLE `recipes_ingredients`
  ADD CONSTRAINT `recipes_ingredients_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `recipes` (`r_id`),
  ADD CONSTRAINT `recipes_ingredients_ibfk_2` FOREIGN KEY (`ing_ID`) REFERENCES `ingredients` (`ing_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
