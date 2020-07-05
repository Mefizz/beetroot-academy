<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once './functions.php';
initSession();
userCookies();

opcache_reset();
$users = require 'db.php';

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
    <h5>Добро пожаловать, <img src="<?=$_SESSION['user']['avatar'] ?>" style="width:60px" alt="avatar"/> <?=" " .$_SESSION['user']['name'] . " " . $_SESSION['user']['surname'] . "!"?></h5>
    <h5>В течении часа вы посещали страницы: <?=showUserCookies($_SESSION['user']['name'])?> раз.</h5>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="export.php">Экспорт</a>
        <a class="navbar-brand" href="visits.php">Статистика просмотра страниц</a>
        <a class="navbar-brand" href="logout.php">Выйти</a>
        <form class="form-inline" method="post" action="import.php" enctype="multipart/form-data">
            <input class="form-control mr-sm-2" type="file" name="import" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Загрузить</button>
        </form>
    </nav>
    <h1>Статистика</h1>
    <ul>
        <li><?= "$oldestUsersInfo[0] $oldestUsersInfo[1]" ?></li>
        <li>Общее количество пользователей: <?= count($users) ?></li>
    </ul>
    <table class="table">
        <tr>
            <th><a href="?sort=id&order=<?= !empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc' : 'desc' ?>">#
            </th>
            <th><a href="?sort=name&order=<?= !empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc' : 'desc' ?>">Name
            </th>
            <th><a href="?sort=surname&order=<?= !empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc' : 'desc' ?>">Surname
            </th>
            <th><a href="?sort=age&order=<?= !empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc' : 'desc' ?>">Age
            </th>
            <th><a href="?sort=avatar">Avatar</th>
        </tr>
        <tbody>
        <?php foreach ($users as $key => $user) : ?>
            <?php $id = (!empty($_GET['sort']) && $_GET['sort'] == 'id' && $_GET['order'] == 'desc') ? count($users) - $key : $key + 1; ?>
            <tr style="background-color: <?= ($key % 2 === 0) ? '#aaa' : '#fff' ?>">
                <td><?= $id ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?= $user['age'] ?></td>
                <td><img src="<?= $user['avatar'] ?>" style="width:60px" alt="avatar"/></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form method="get">
        <label>
            <select name="filter">
                <option value="man">Man</option>
                <option value="woman">Woman</option>
                <option value="covid">Age > 60</option>
                <?php foreach ($animalsFilter as $animal): ?>
                    <option value="<?= $animal ?>"><?= $animal ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <input type="submit">
    </form>
    <a href="user.php">На страницу регистрации</a>
</div>
</body>
</html>