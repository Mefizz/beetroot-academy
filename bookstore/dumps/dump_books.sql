-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book` varchar(45) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `born` int(11) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('Война и мир','Лев Толстой ',1818,'роман'),('1984','Дж.Оруэлл ',1599,'роман'),('Улисс','Дж.Джойс ',1542,'роман'),('Лолита','Владимир Набоков ',1911,'роман'),('Звук и ярость','Уильям Фолкнер ',1929,'роман'),('Человек-невидимка','Ральф Эллисон ',1915,'роман'),('На маяк','Вирджиниа Вульф ',1785,'фантастика'),('Одиссея','Гомер',1679,'роман'),('Гордость и предубеждение','Джейн Остен ',1543,'роман'),('Божественная комедия','Данте ',1678,'роман'),('Кентерберийские истории','Чосер ',1761,'роман'),('Приключение Гулливера','Дж. Свифт ',1771,'роман'),('Мидлмарч','Джордж Элиот ',1573,'роман'),('Распад','Чинуа Ачебе',1551,'фантастика'),('Над пропастью во ржи','Дж. Селлинджер ',1536,'роман'),('Унесенные ветром','Маргарет Митчелл ',1526,'фантастика'),('Сто лет одиночества','Габриель Гарсиа Маркес ',1523,'роман'),('Великий Гетсби','Скотт Фиттцжеральд ',1538,'фантастика'),('Уловка 22','Джозеф Хеллер ',1618,'роман'),('Возлюбленная','Тони Моррисон ',1978,'фантастика'),('Гроздья гнева','Дж.Стейнбек ',1536,'роман'),('Полночные дети','Салман Рушди ',1747,'роман'),('О дивный новый мир','Олдос Хаксли ',1626,'роман'),('Миссис Дэллоуэй','Вирджиния Вульф ',1890,'роман'),('Родной сын','Ричард Райт ',1572,'фантастика'),('Демократия в Америке','Алексис Де Токвиль ',1688,'роман'),('Происхождение видов','Чарльз Дарвин ',1725,'роман'),('История','Геродот ',1563,'фантастика'),('Социальный контакт','Ж-Ж.Руссо ',1637,'фантастика'),('Капитал','Карл Маркс ',1996,'фантастика'),('Государь','Николо Макиавелли ',1571,'фантастика'),('Признание','Св. Августин ',1867,'фантастика'),('Левиафан','Томас Гоббс ',1623,'фантастика'),('История Пелопонесской войны','Фукидид, ',1515,'роман'),('Властелин колец','Дж.Толкиен ',1703,'фантастика'),('Винни-Пух','Александер Милн ',1971,'фантастика'),('Лев, ведьма и платяной шкаф','Льюис ',1747,'роман'),('Путешествие в Индию','Форстер ',1822,'роман'),('В дороге','Джек Керуак ',1868,'роман'),('Убить пересмешника','Харпер Ли ',1875,'фантастика'),('Заводной Апельсин','Святая Библия',1770,'фантастика'),('Свет в августе','Энтони Берджес ',1725,'фантастика'),('Души черного народа','Уильям Фолкнер ',1816,'фантастика'),('Широкое Саргассово море','Уильям Дюбуа ',1906,'фантастика'),('Госпожа Бовари','Джин Рис ',1582,'роман'),('Потерянный рай','Густав Флобер ',1691,'фантастика'),('Анна Каренина','Джон Мильтон ',1709,'роман'),('Гамлет','Лев Толстой ',1972,'роман'),('Король Лир','Уильям Шекспир ',1734,'роман'),('Отелло','Уильям Шекспир ',1753,'фантастика'),('Сонеты','Уильям Шекспир ',1565,'фантастика'),('Листья травы','Уильям Шекспир ',1564,'роман'),('Приключения Гекльберри Финна','Уолт Уитмен ',1626,'фантастика'),('Ким','Марк Твен ',1938,'роман'),('Франкенштейн','Редьярд Киплинг ',1811,'фантастика'),('Песня Соломона','Мери Шелли ',1742,'роман'),('Пролетая над гнездом кукушки','Тони Моррисон ',1776,'роман'),('По ком звонит колокол','Кен Кизи ',1656,'роман'),('Бойня номер пять','Эрнест Хемингуэй ',1952,'фантастика'),('Скотный двор','Курт Воннегут ',1792,'фантастика'),('Повелитель мух','Оруэлл ',1601,'фантастика'),('Хладнокровное убийство','Уильям Голдинг ',1633,'роман'),('Золотая тетрадь','Трумен Капоте ',1858,'роман'),('В поисках утраченного времени','Дорис Лессинг ',1894,'роман'),('Вечный сон','Марсель Пруст ',1895,'роман'),('Когда я умирала','Реймонд Чандлер ',1792,'фантастика'),('Фиеста','Уильям Фолкнер ',1774,'роман'),('Я, Клавдий','Эрнест Хемингуэй ',1997,'роман'),('Сердце — одинокий охотник','Роберт Грейвс ',1662,'роман'),('Сыновья и любовники','Карсон Маккаллерс ',1820,'фантастика'),('Вся королевская рать','Дэвид Лоуренс ',1614,'роман'),('Иди, вещай с горы','Роберт Пенн Уоррен ',1609,'фантастика'),('Паутина Шарлотты','Дж. Болдуин ',1705,'роман'),('Сердце тьмы','Э. Уайт ',1697,'фантастика'),('Ночь','Джозеф Конрад ',1868,'фантастика'),('Кролик, беги','Эли Визель ',1752,'фантастика'),('Эпоха невинности','Дж.Апдайк ',1657,'фантастика'),('Случай Портного','Эдит Уортон ',1526,'фантастика'),('Американская трагедия','Филипп Рот ',1658,'роман'),('День саранчи','Теодор Драйзер ',1713,'роман'),('Тропик Рака','Натанаэл Уэст ',1591,'роман'),('Мальтийский сокол','Генри Миллер ',1818,'фантастика'),('Темные начала','Дешил Хэммет ',1816,'фантастика'),('Смерть приходит за архиепископом','Филипп Пулман ',1625,'роман'),('Толкование сновидений','Уилла Кэсер ',1677,'роман'),('Воспитание Генри Адамса','Зигмунд Фрейд ',1510,'роман'),('Красная книжечка','Генри Адамс ',1521,'фантастика'),('Многообразие религиозного опыта','Мао Цзэдун ',1572,'роман'),('Пригоршня праха','Уильям Джеймс ',1800,'роман'),('Безмолвная весна','Ивлин Во ',1783,'фантастика'),('Общая теория занятости, процента и денег','Рэйчел Карсон ',1515,'роман'),('Лорд Джим','Джон Мейнард Кейнс ',1728,'роман'),('Со всем этим покончено','Джозеф Конрад ',1593,'роман'),('Общество изобилия','Роберт Грейвс ',1781,'фантастика'),('Ветер в ивах','Джон Кеннет Гелбрейт ',1628,'фантастика'),('Автобиография Малкольма Икс','Кеннет Грэм ',1795,'роман'),('Знаменитые викторианцы','Алекс Хейли и Малкольм Икс',1592,'роман'),('Цвет пурпурный','Литтон Стрейчи',1574,'фантастика'),('Вторая мировая война в 6-ти томах','Элис Уокер',1596,'фантастика');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14 21:38:33