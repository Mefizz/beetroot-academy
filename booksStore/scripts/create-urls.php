<?php
require '../functions.php';



$pdo = getPDO();
$sql = 'SELECT * FROM book';
$stmt = $pdo->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'UPDATE book SET url = ? WHERE id = ?';
$stmt = $pdo->prepare($sql);

foreach ($books as $book) {

    $url = transliterator_transliterate('Russian-Latin/BGN', $book['title']);
    $url = strtolower($url);
    $url = str_replace(
        [' ', ',', '`', '!', '.', '’', 'ʹ', '—', '–', '·' ],
        ['-'],
        $url
    );
    $stmt->execute([
        $url,
        $book['id']
    ]);
}