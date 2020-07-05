#!/usr/bin/env php
<?php
// 1. Применить функцию к названиям книги и вывести
// пробел -> -
// ,!. -> пустая строка
// str_replace(); voyna_i_mir
// update book set bla bla bla
require '../functions.php';

$pdo = getPDO();
$sql = 'SELECT * FROM book';
$stmt = $pdo->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'UPDATE book set url = ? WHERE id = ?';
$stmt = $pdo->prepare($sql);
foreach ($books as $book) {
    $url = transliterator_transliterate('Russian-Latin/BGN', $book['title']);
    $url = trim(strtolower($url));
    $url = str_replace(
        [' ', ',', 'ʹ', '—','!', '.'],
        ['-'],
        $url
    );
    $stmt->execute([
        $url,
        $book['id']
    ]);
}