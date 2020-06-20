create table comment
(
    comment_id int unsigned auto_increment
        primary key,
    message    text                                   null,
    book_id    int unsigned                           not null,
    rating     tinyint(1) default 3                   null,
    added_at   datetime   default current_timestamp() not null
);

INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (1, 'Через все повествование Оруэлла идет идея о сопротивлении личности системе, которая в итоге обречена на подавление. С этим мы сталкиваемся сейчас, сталкивались ранее и будем сталкиваться в будущем, именно поэтому написанное в 1948-м году произведение о годе 1984-м остается и по нынешний день актуальным и пророческим. И не стоит забывать, что «1984» – это не конкретный образ социалистического тоталитаризма советского периода, а отпечаток любого возможного автократического общества.', 2, 4, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (2, 'Когда начинал читать, ожидал, что это больше похоже на описание тоталитарного социалистического общества в духе Советского Союза. А когда добрался до середины, понял, что и современный капитализм на это очень похож. И секс, если уж нельзя запретить, то надо испоганить. И Большой Брат, вещающий из телевизора, и одновременно следящий из него же за тобой. Ну и новостями здесь работают так, что переписыванию истории при Советском Союзе еще расти и расти. Вчера говорили одно, а сегодня, не моргнув глазом, прямо противоположное. А самое интересное заключается в том, что они здесь добились того, чего доблестному партийному аппарату сделать не удалось. Народ сегодня уже не помнит того, что вчера совсем другое рассказывали. А учитывая последние события, так и просятся оруэловские лозунги «Мир – это война», «Правда – это ложь!», «Незнание – это сила!». Так что роман не потерял актуальности и в наше время, причем в любом обществе, пусть и называющем себя самым свободным. А так же книга, распространяемая подпольщиками очень точно описывает общественные процессы. Рекомендую всем, кто еще ее не читал.', 2, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (3, 'Моё знакомство с жанром антиутопии началось с трилогии Патрика Неса, главные герои там всё же подростки. Да и написана она сравнительно недавно. Здесь же, в «1984», всё мрачнее, тяжелее и правдивей. Ты предашь свою настоящую любовь, признаешь, что 2Х2=5, будешь восхвалять своего мучителя. Нельзя допустить лишнего слова, движения, взгляда – Большой Брат следит за тобой. «Прыжок на месте приравнивается к бунту». Читая такие книги становится по-настоящему страшно. Но не читать их нельзя – это наш мир.', 2, 5, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (4, 'Это классика вне времени. Очень понравлось. Слушала с огромным удовольствием!!! Великолепное произведение и чтец очень понравился. Всем рекомендую!', 8, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (5, 'диссею любим как сказку, очень понравился чтец, с хорошим настроением и важно – четкая дикция. Думаю что для лет 10-11 как раз подойдёт по истории Древней Греции проходят в учебнике Гомера, но там вскользь и не понятно почему женихи осаждали дом Одиссея, почему вернувшись на свою родину ему сразу же нельзя было пойти к своей супруге. В книге очень интересные моменты и всё сразу же понятно становится.', 8, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (6, 'Конечно читать! Но только – «Земную жизнь, пройдя до половины', 10, 5, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (7, 'авно мечтала прочитать данное,величайшее произведение,известного и таинственного автора той эпохи, удалось,не жалею,рекомендую не пожалеете', 10, 2, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (8, 'В центре внимания – страдания человека мыслящего, не желающего мириться с навязанными ему стереотипами общества. Каждому из нас полезно было бы остановиться и подумать, куда мы стремимся, как личности, а не безликие кусочки одного большого механизма. К сожалению, многие на это не способны. Мы так погрязли в пучине развлечений и удовольствий, которыми компенсируем свои трудовые издержки, что уже не можем отказаться от благ цивилизации. Точно как в особо запомнившимся мне эпизоде этой книги, где симпатичная, но недалёкая девушка не может выдержать и минуты тишины и пустоты. Но больше всего меня восхищает то, как Хаксли смог точно угадать столько атрибутов жизни людей будущего, например: наркотики и антидепрессанты, поощряемая половая неразборчивость, телевидение, нескончаемые потоки информации, инкубаторы с человеческими эмбрионами, генная инженерия и многое другое… Если что-то из творческого вымысла автора еще не сбылось, то по крайней мере очевидно, что мы стоим в шаге от этого. А значит, эта антиутопия-предостережение очень актуальна для нас сейчас.', 23, 4, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (9, 'отличное полит-экономическое изложение сущности капитализма написано было в далёком XIX веке Но полностью отражается день сегодняшний. читать просто написано очень грамотным языком и грамотно переведена актёр озвучания полностью справляется со своей ролью.', 30, 4, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (10, 'Сильное произведение. Но из за того, что это писалось для пьесы. Не хватает батальных сцен. И все быстро происходит.', 49, 5, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (11, 'Самый любимый герой здесь – шут, безусловно. Красавец! А главная идея, видимо, – не лезь в бутылку! Корделии это тоже касается, причём в первую очередь.', 49, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (12, 'Как можно комментировать Шекспира… Шикарно! Трагично, весьма и весьма трагично… Классика трагедии. Единственное дискомфортное ощущение «Галопа по Европам»… Но с другой стороны никакой «воды», никаких «заполнителей» и «плавных переходов» – самая суть событий. Читайте классику, наслаждайтесь', 49, 2, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (13, 'Из серии «Вечная классика», которую обязательно нужно читать.', 49, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (14, 'Пьеса «Король Лир»– это произведение нравственности,которое должен прочесть каждый. 90 страниц скрывают в себе огромный мир, полного безразличием, бездушьем, не благодарностью, эгоизмом и жестокостью.', 49, 4, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (15, 'Книга, действительно, потрясающая! Смысл очень глубокий. Можно смотреть на события книги с разных сторон: и со стороны рядовых (животных – по книге) исполнителей и со стороны их руководителей, всё-равно задумываешься и сравниваешь, сравниваешь… С историей, с политикой, вообще, с жизнью. Сам профессионально занимаюсь политической деятельностью, по-этому мне книга показалась очень поучительной! Прочитал, уже некоторое время прошло, однако ловлю себя на мысли, что периодически возвращаюсь к ней снова и снова… Короче говоря, вроде бы и книга не очень большая, но смысл такой… Вообщем, я до сих пор под впечатлением.', 60, 4, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (16, 'Ужас, непонимание и ненависть, злость и досада, горечь и печаль. Такие чувства оставила во мне эта книга, эта замечательная книга. Как жаль, что всё описанное в 44 году про СССР, точно также повторилось в 2000 и продолжается до сих пор. Теперь у нас другой Наполеон, вместо Стукача подконтрольные оболванивающие СМИ. А большинство всё также чтит заповеди Бойца и не прислушивается к своим, иногда очень светлым, мыслям. Это горькая Книга с большой буквы.', 60, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (17, 'Отличное произведение, рассказывающее о «революции» на скотном дворе. А ещё о том, как белое становится чёрным, верх низом и свиньи превращаются в людей.', 60, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (18, 'Не смотря на то, что читал в детстве, книга стала любимой, во взрослом возрасте. Читал ее дочери. Ей понравилось больше, чем когда-то мне. Не удивительно – мы выросли на сказках, где добро – понятие четкое, ничем не разбавленое. И оно всегда побеждает зло – такое же четкое понятие.', 95, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (19, 'Обожаю эту книгу, читал ее племяннику, сам перечитываю снова и снова, просто что бы поднять себе настроение, столько всего умиротворяющего в ней, такое тихое счастье размеренной жизни и простых земных радостей.', 95, 1, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (20, 'Одна из лучших детских книг в мировой литературе. А может, и просто – лучшая. Трижды читал ее вслух моему внуку. Удивительно, что книга, не только и не столько увлекающая захватывающим сюжетом, но полная утонченной поэзии и глубокой мудрости, способна так приковывать внимание ребенка и влюблять в себя и своих персонажей.', 95, 2, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (21, 'Данный перевод считаю лучше, чем у Токмаковой. Отличная книга и замечательные иллюстрации. Для детей все же предпочтительнее будет бумажное издание.', 95, 2, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (22, 'Начала читать эту книгу, так как узнала, что это была любимая книга Терри Пратчетта. Очень атмосферная, пропитана духом старой Англии. Правда, я не очень люблю, когда на одно существительное приходится пять прилагательных, но зато это придает сказке какого то душевного тепла и доброты.', 95, 5, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (23, 'Привет мир!', 2, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (24, 'Привет мир!', 2, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (25, 'klhlkjh', 2, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (26, 'klhlkjh', 2, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (27, 'lkjlkj', 95, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (28, 'Actual comment', 95, 3, '2020-05-23 10:11:58');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (29, 'Супер книга!', 79, 3, '2020-05-23 10:55:36');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (30, 'СПАМ СПАМ', 79, 3, '2020-05-23 10:56:21');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (31, 'ПРИВЕТ МИР', 79, 3, '2020-05-23 10:57:36');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (32, 'ТЕСТ', 79, 3, '2020-05-23 10:58:12');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (33, 'ЗДРАСТЕ', 79, 3, '2020-05-23 10:58:27');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (34, 'ЗДРАСТЕ', 79, 3, '2020-05-23 10:58:31');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (35, 'ЗДРАСТЕ', 79, 3, '2020-05-23 10:58:40');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (36, '<script>alert(''a'')</script>', 79, 3, '2020-05-23 11:12:16');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (37, 'HELLO', 79, 3, '2020-05-23 11:16:17');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (38, 'HELLO', 79, 3, '2020-05-23 11:16:33');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (39, 'HELLO', 79, 3, '2020-05-23 11:17:23');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (40, 'awesome', 51, 3, '2020-05-23 13:39:33');
INSERT INTO bookstore.comment (comment_id, message, book_id, rating, added_at) VALUES (41, 'тест коммент ололо', 79, 3, '2020-06-12 18:54:51');