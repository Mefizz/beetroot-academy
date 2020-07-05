<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once './functions.php';
initSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Статистика просмотра страниц за последний час</h1>
    <table class="table">
        <tr>
            <th>#
            </th>
            <th>Имя
            </th>
            <th>Фамилия
            </th>
            <th>Страницы
            </th>
        </tr>
        <tbody>
        <?php foreach ($users as $key => $user) : ?>
            <?php $id = (!empty($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'desc') ? count($users) - $key : $key + 1; ?>
            <tr style="background-color: <?= ($key % 2 === 0) ? '#aaa' : '#fff' ?>">
                <td><?= $id ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?=showUserCookies($user['name']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="stats.php">Назад</a>
</div>
</body>
</html>
