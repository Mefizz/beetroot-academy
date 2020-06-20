create table genre
(
    id   int unsigned auto_increment
        primary key,
    name varchar(45) not null
);

INSERT INTO bookstore.genre (id, name) VALUES (1, 'Фантастика');
INSERT INTO bookstore.genre (id, name) VALUES (2, 'Классика');
INSERT INTO bookstore.genre (id, name) VALUES (3, 'Фентези');
INSERT INTO bookstore.genre (id, name) VALUES (4, 'Пьеса');
INSERT INTO bookstore.genre (id, name) VALUES (5, 'Роман');