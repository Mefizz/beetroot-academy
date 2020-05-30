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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Лев Толстой '),(2,'Дж.Оруэлл '),(3,'Дж.Джойс '),(4,'Владимир Набоков '),(5,'Уильям Фолкнер '),(6,'Ральф Эллисон '),(7,'Вирджиниа Вульф '),(8,'Гомер'),(9,'Джейн Остен '),(10,'Данте '),(11,'Чосер '),(12,'Дж. Свифт '),(13,'Джордж Элиот '),(14,'Чинуа Ачебе'),(15,'Дж. Селлинджер '),(16,'Маргарет Митчелл '),(17,'Габриель Гарсиа Маркес '),(18,'Скотт Фиттцжеральд '),(19,'Джозеф Хеллер '),(20,'Тони Моррисон '),(21,'Дж.Стейнбек '),(22,'Салман Рушди '),(23,'Олдос Хаксли '),(24,'Вирджиния Вульф '),(25,'Ричард Райт '),(26,'Алексис Де Токвиль '),(27,'Чарльз Дарвин '),(28,'Геродот '),(29,'Ж-Ж.Руссо '),(30,'Карл Маркс '),(31,'Николо Макиавелли '),(32,'Св. Августин '),(33,'Томас Гоббс '),(34,'Фукидид, '),(35,'Дж.Толкиен '),(36,'Александер Милн '),(37,'Льюис '),(38,'Форстер '),(39,'Джек Керуак '),(40,'Харпер Ли '),(41,'Святая Библия'),(42,'Энтони Берджес '),(43,'Уильям Фолкнер '),(44,'Уильям Дюбуа '),(45,'Джин Рис '),(46,'Густав Флобер '),(47,'Джон Мильтон '),(48,'Лев Толстой '),(49,'Уильям Шекспир '),(50,'Уильям Шекспир '),(51,'Уильям Шекспир '),(52,'Уильям Шекспир '),(53,'Уолт Уитмен '),(54,'Марк Твен '),(55,'Редьярд Киплинг '),(56,'Мери Шелли '),(57,'Тони Моррисон '),(58,'Кен Кизи '),(59,'Эрнест Хемингуэй '),(60,'Курт Воннегут '),(61,'Оруэлл '),(62,'Уильям Голдинг '),(63,'Трумен Капоте '),(64,'Дорис Лессинг '),(65,'Марсель Пруст '),(66,'Реймонд Чандлер '),(67,'Уильям Фолкнер '),(68,'Эрнест Хемингуэй '),(69,'Роберт Грейвс '),(70,'Карсон Маккаллерс '),(71,'Дэвид Лоуренс '),(72,'Роберт Пенн Уоррен '),(73,'Дж. Болдуин '),(74,'Э. Уайт '),(75,'Джозеф Конрад '),(76,'Эли Визель '),(77,'Дж.Апдайк '),(78,'Эдит Уортон '),(79,'Филипп Рот '),(80,'Теодор Драйзер '),(81,'Натанаэл Уэст '),(82,'Генри Миллер '),(83,'Дешил Хэммет '),(84,'Филипп Пулман '),(85,'Уилла Кэсер '),(86,'Зигмунд Фрейд '),(87,'Генри Адамс '),(88,'Мао Цзэдун '),(89,'Уильям Джеймс '),(90,'Ивлин Во '),(91,'Рэйчел Карсон '),(92,'Джон Мейнард Кейнс '),(93,'Джозеф Конрад '),(94,'Роберт Грейвс '),(95,'Джон Кеннет Гелбрейт '),(96,'Кеннет Грэм '),(97,'Алекс Хейли и Малкольм Икс'),(98,'Литтон Стрейчи'),(99,'Элис Уокер'),(100,'Уинстон Черчилль ');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Война и мир',1,3),(2,'1984',2,2),(3,'Улисс',3,4),(4,'Лолита',4,1),(5,'Звук и ярость',5,2),(6,'Человек-невидимка',6,1),(7,'На маяк',7,3),(8,'Одиссея',8,4),(9,'Гордость и предубеждение',9,3),(10,'Божественная комедия',10,4),(11,'Кентерберийские истории',11,3),(12,'Приключение Гулливера',12,1),(13,'Мидлмарч',13,4),(14,'Распад',14,1),(15,'Над пропастью во ржи',15,2),(16,'Унесенные ветром',16,3),(17,'Сто лет одиночества',17,4),(18,'Великий Гетсби',18,5),(19,'Уловка 22',19,3),(20,'Возлюбленная',20,3),(21,'Гроздья гнева',21,4),(22,'Полночные дети',22,5),(23,'О дивный новый мир',23,2),(24,'Миссис Дэллоуэй',24,5),(25,'Родной сын',25,2),(26,'Демократия в Америке',26,4),(27,'Происхождение видов',27,2),(28,'История',28,2),(29,'Социальный контакт',29,4),(30,'Капитал',30,5),(31,'Государь',31,3),(32,'Признание',32,3),(33,'Левиафан',33,1),(34,'История Пелопонесской войны',34,4),(35,'Властелин колец',35,3),(36,'Винни-Пух',36,4),(37,'Лев, ведьма и платяной шкаф',37,3),(38,'Путешествие в Индию',38,3),(39,'В дороге',39,3),(40,'Убить пересмешника',40,5),(41,'Заводной Апельсин',41,5),(42,'Свет в августе',42,4),(43,'Души черного народа',43,3),(44,'Широкое Саргассово море',44,1),(45,'Госпожа Бовари',45,5),(46,'Потерянный рай',46,2),(47,'Анна Каренина',47,2),(48,'Гамлет',48,1),(49,'Король Лир',49,3),(50,'Отелло',50,2),(51,'Сонеты',51,3),(52,'Листья травы',52,2),(53,'Приключения Гекльберри Финна',53,2),(54,'Ким',54,3),(55,'Франкенштейн',55,2),(56,'Песня Соломона',56,4),(57,'Пролетая над гнездом кукушки',57,2),(58,'По ком звонит колокол',58,1),(59,'Бойня номер пять',59,1),(60,'Скотный двор',60,2),(61,'Повелитель мух',61,5),(62,'Хладнокровное убийство',62,1),(63,'Золотая тетрадь',63,4),(64,'В поисках утраченного времени',64,1),(65,'Вечный сон',65,2),(66,'Когда я умирала',66,1),(67,'Фиеста',67,3),(68,'Я, Клавдий',68,2),(69,'Сердце — одинокий охотник',69,2),(70,'Сыновья и любовники',70,2),(71,'Вся королевская рать',71,4),(72,'Иди, вещай с горы',72,2),(73,'Паутина Шарлотты',73,3),(74,'Сердце тьмы',74,2),(75,'Ночь',75,2),(76,'Кролик, беги',76,2),(77,'Эпоха невинности',77,3),(78,'Случай Портного',78,5),(79,'Американская трагедия',79,1),(80,'День саранчи',80,3),(81,'Тропик Рака',81,4),(82,'Мальтийский сокол',82,1),(83,'Темные начала',83,3),(84,'Смерть приходит за архиепископом',84,5),(85,'Толкование сновидений',85,5),(86,'Воспитание Генри Адамса',86,4),(87,'Красная книжечка',87,3),(88,'Многообразие религиозного опыта',88,3),(89,'Пригоршня праха',89,1),(90,'Безмолвная весна',90,4),(91,'Общая теория занятости, процента и денег',91,4),(92,'Лорд Джим',92,3),(93,'Со всем этим покончено',93,5),(94,'Общество изобилия',94,3),(95,'Ветер в ивах',95,5),(96,'Автобиография Малкольма Икс',96,5),(97,'Знаменитые викторианцы',97,4),(98,'Цвет пурпурный',98,3),(99,'Вторая мировая война в 6-ти томах',99,4);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text,
  `book_id` int(10) unsigned NOT NULL,
  `rating` tinyint(1) DEFAULT '3',
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'Через все повествование Оруэлла идет идея о сопротивлении личности системе, которая в итоге обречена на подавление. С этим мы сталкиваемся сейчас, сталкивались ранее и будем сталкиваться в будущем, именно поэтому написанное в 1948-м году произведение о годе 1984-м остается и по нынешний день актуальным и пророческим. И не стоит забывать, что «1984» – это не конкретный образ социалистического тоталитаризма советского периода, а отпечаток любого возможного автократического общества.',2,4,'2020-05-23 10:11:58'),(2,'Когда начинал читать, ожидал, что это больше похоже на описание тоталитарного социалистического общества в духе Советского Союза. А когда добрался до середины, понял, что и современный капитализм на это очень похож. И секс, если уж нельзя запретить, то надо испоганить. И Большой Брат, вещающий из телевизора, и одновременно следящий из него же за тобой. Ну и новостями здесь работают так, что переписыванию истории при Советском Союзе еще расти и расти. Вчера говорили одно, а сегодня, не моргнув глазом, прямо противоположное. А самое интересное заключается в том, что они здесь добились того, чего доблестному партийному аппарату сделать не удалось. Народ сегодня уже не помнит того, что вчера совсем другое рассказывали. А учитывая последние события, так и просятся оруэловские лозунги «Мир – это война», «Правда – это ложь!», «Незнание – это сила!». Так что роман не потерял актуальности и в наше время, причем в любом обществе, пусть и называющем себя самым свободным. А так же книга, распространяемая подпольщиками очень точно описывает общественные процессы. Рекомендую всем, кто еще ее не читал.',2,1,'2020-05-23 10:11:58'),(3,'Моё знакомство с жанром антиутопии началось с трилогии Патрика Неса, главные герои там всё же подростки. Да и написана она сравнительно недавно. Здесь же, в «1984», всё мрачнее, тяжелее и правдивей. Ты предашь свою настоящую любовь, признаешь, что 2Х2=5, будешь восхвалять своего мучителя. Нельзя допустить лишнего слова, движения, взгляда – Большой Брат следит за тобой. «Прыжок на месте приравнивается к бунту». Читая такие книги становится по-настоящему страшно. Но не читать их нельзя – это наш мир.',2,5,'2020-05-23 10:11:58'),(4,'Это классика вне времени. Очень понравлось. Слушала с огромным удовольствием!!! Великолепное произведение и чтец очень понравился. Всем рекомендую!',8,3,'2020-05-23 10:11:58'),(5,'диссею любим как сказку, очень понравился чтец, с хорошим настроением и важно – четкая дикция. Думаю что для лет 10-11 как раз подойдёт по истории Древней Греции проходят в учебнике Гомера, но там вскользь и не понятно почему женихи осаждали дом Одиссея, почему вернувшись на свою родину ему сразу же нельзя было пойти к своей супруге. В книге очень интересные моменты и всё сразу же понятно становится.',8,1,'2020-05-23 10:11:58'),(6,'Конечно читать! Но только – «Земную жизнь, пройдя до половины',10,5,'2020-05-23 10:11:58'),(7,'авно мечтала прочитать данное,величайшее произведение,известного и таинственного автора той эпохи, удалось,не жалею,рекомендую не пожалеете',10,2,'2020-05-23 10:11:58'),(8,'В центре внимания – страдания человека мыслящего, не желающего мириться с навязанными ему стереотипами общества. Каждому из нас полезно было бы остановиться и подумать, куда мы стремимся, как личности, а не безликие кусочки одного большого механизма. К сожалению, многие на это не способны. Мы так погрязли в пучине развлечений и удовольствий, которыми компенсируем свои трудовые издержки, что уже не можем отказаться от благ цивилизации. Точно как в особо запомнившимся мне эпизоде этой книги, где симпатичная, но недалёкая девушка не может выдержать и минуты тишины и пустоты. Но больше всего меня восхищает то, как Хаксли смог точно угадать столько атрибутов жизни людей будущего, например: наркотики и антидепрессанты, поощряемая половая неразборчивость, телевидение, нескончаемые потоки информации, инкубаторы с человеческими эмбрионами, генная инженерия и многое другое… Если что-то из творческого вымысла автора еще не сбылось, то по крайней мере очевидно, что мы стоим в шаге от этого. А значит, эта антиутопия-предостережение очень актуальна для нас сейчас.',23,4,'2020-05-23 10:11:58'),(9,'отличное полит-экономическое изложение сущности капитализма написано было в далёком XIX веке Но полностью отражается день сегодняшний. читать просто написано очень грамотным языком и грамотно переведена актёр озвучания полностью справляется со своей ролью.',30,4,'2020-05-23 10:11:58'),(10,'Сильное произведение. Но из за того, что это писалось для пьесы. Не хватает батальных сцен. И все быстро происходит.',49,5,'2020-05-23 10:11:58'),(11,'Самый любимый герой здесь – шут, безусловно. Красавец! А главная идея, видимо, – не лезь в бутылку! Корделии это тоже касается, причём в первую очередь.',49,1,'2020-05-23 10:11:58'),(12,'Как можно комментировать Шекспира… Шикарно! Трагично, весьма и весьма трагично… Классика трагедии. Единственное дискомфортное ощущение «Галопа по Европам»… Но с другой стороны никакой «воды», никаких «заполнителей» и «плавных переходов» – самая суть событий. Читайте классику, наслаждайтесь',49,2,'2020-05-23 10:11:58'),(13,'Из серии «Вечная классика», которую обязательно нужно читать.',49,1,'2020-05-23 10:11:58'),(14,'Пьеса «Король Лир»– это произведение нравственности,которое должен прочесть каждый. 90 страниц скрывают в себе огромный мир, полного безразличием, бездушьем, не благодарностью, эгоизмом и жестокостью.',49,4,'2020-05-23 10:11:58'),(15,'Книга, действительно, потрясающая! Смысл очень глубокий. Можно смотреть на события книги с разных сторон: и со стороны рядовых (животных – по книге) исполнителей и со стороны их руководителей, всё-равно задумываешься и сравниваешь, сравниваешь… С историей, с политикой, вообще, с жизнью. Сам профессионально занимаюсь политической деятельностью, по-этому мне книга показалась очень поучительной! Прочитал, уже некоторое время прошло, однако ловлю себя на мысли, что периодически возвращаюсь к ней снова и снова… Короче говоря, вроде бы и книга не очень большая, но смысл такой… Вообщем, я до сих пор под впечатлением.',60,4,'2020-05-23 10:11:58'),(16,'Ужас, непонимание и ненависть, злость и досада, горечь и печаль. Такие чувства оставила во мне эта книга, эта замечательная книга. Как жаль, что всё описанное в 44 году про СССР, точно также повторилось в 2000 и продолжается до сих пор. Теперь у нас другой Наполеон, вместо Стукача подконтрольные оболванивающие СМИ. А большинство всё также чтит заповеди Бойца и не прислушивается к своим, иногда очень светлым, мыслям. Это горькая Книга с большой буквы.',60,1,'2020-05-23 10:11:58'),(17,'Отличное произведение, рассказывающее о «революции» на скотном дворе. А ещё о том, как белое становится чёрным, верх низом и свиньи превращаются в людей.',60,1,'2020-05-23 10:11:58'),(18,'Не смотря на то, что читал в детстве, книга стала любимой, во взрослом возрасте. Читал ее дочери. Ей понравилось больше, чем когда-то мне. Не удивительно – мы выросли на сказках, где добро – понятие четкое, ничем не разбавленое. И оно всегда побеждает зло – такое же четкое понятие.',95,3,'2020-05-23 10:11:58'),(19,'Обожаю эту книгу, читал ее племяннику, сам перечитываю снова и снова, просто что бы поднять себе настроение, столько всего умиротворяющего в ней, такое тихое счастье размеренной жизни и простых земных радостей.',95,1,'2020-05-23 10:11:58'),(20,'Одна из лучших детских книг в мировой литературе. А может, и просто – лучшая. Трижды читал ее вслух моему внуку. Удивительно, что книга, не только и не столько увлекающая захватывающим сюжетом, но полная утонченной поэзии и глубокой мудрости, способна так приковывать внимание ребенка и влюблять в себя и своих персонажей.',95,2,'2020-05-23 10:11:58'),(21,'Данный перевод считаю лучше, чем у Токмаковой. Отличная книга и замечательные иллюстрации. Для детей все же предпочтительнее будет бумажное издание.',95,2,'2020-05-23 10:11:58'),(22,'Начала читать эту книгу, так как узнала, что это была любимая книга Терри Пратчетта. Очень атмосферная, пропитана духом старой Англии. Правда, я не очень люблю, когда на одно существительное приходится пять прилагательных, но зато это придает сказке какого то душевного тепла и доброты.',95,5,'2020-05-23 10:11:58'),(23,'Привет мир!',2,3,'2020-05-23 10:11:58'),(24,'Привет мир!',2,3,'2020-05-23 10:11:58'),(25,'klhlkjh',2,3,'2020-05-23 10:11:58'),(26,'klhlkjh',2,3,'2020-05-23 10:11:58'),(27,'lkjlkj',95,3,'2020-05-23 10:11:58'),(28,'Actual comment',95,3,'2020-05-23 10:11:58'),(29,'Супер книга!',79,3,'2020-05-23 10:55:36'),(30,'СПАМ СПАМ',79,3,'2020-05-23 10:56:21'),(31,'ПРИВЕТ МИР',79,3,'2020-05-23 10:57:36'),(32,'ТЕСТ',79,3,'2020-05-23 10:58:12'),(33,'ЗДРАСТЕ',79,3,'2020-05-23 10:58:27'),(34,'ЗДРАСТЕ',79,3,'2020-05-23 10:58:31'),(35,'ЗДРАСТЕ',79,3,'2020-05-23 10:58:40'),(36,'<script>alert(\'a\')</script>',79,3,'2020-05-23 11:12:16'),(37,'HELLO',79,3,'2020-05-23 11:16:17'),(38,'HELLO',79,3,'2020-05-23 11:16:33'),(39,'HELLO',79,3,'2020-05-23 11:17:23'),(40,'awesome',51,3,'2020-05-23 13:39:33');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Фантастика'),(2,'Классика'),(3,'Фентези'),(4,'Пьеса'),(5,'Роман');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-23 10:53:34