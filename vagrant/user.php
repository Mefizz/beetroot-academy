<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$error = $_GET['error'] ?? [];

$lang = (!empty($_GET['lang'])) ? $_GET['lang'] : 'ru';
$labels = [
    'ru' => ['name' => 'Имя', 'surname' => 'Фамилия', 'email' => 'Почта', 'age' => 'Возраст', 'password' => 'Пароль', 'gender' => 'Пол', 'title' => 'Регистрация', 'button' => 'Зарегистрироваться'],
    'ua' => ['name' => "Им'я", 'surname' => 'Прізвище', 'email' => 'Пошта', 'age' => 'Вік', 'password' => 'Пароль', 'gender' => 'Стать', 'title' => 'Реєстрація', 'button' => 'Зареєструватися'],
    'en' => ['name' => 'Name', 'surname' => 'Surname', 'email' => 'Email', 'age' => 'Age', 'password' => 'Password', 'gender' => 'Gender', 'title' => 'Registration', 'button' => 'Register']
];

switch ($lang) {
    case 'ru':
        $translation = $labels['ru'];
        break;
    case 'ua':
        $translation = $labels['ua'];
        break;
    case 'en':
        $translation = $labels['en'];
        break;
}
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
<br/>
<div class="container">
    <h1><?= $translation['title'] ?></h1>
    <div class="float-right">
        <a href="?lang=ru" class="badge badge-primary">Русский</a>
        <a href="?lang=ua" class="badge badge-secondary">Украинский</a>
        <a href="?lang=en" class="badge badge-success">English</a>
    </div>
    <form method="post" action="stats.php">
        <div class="form-group">
            <label for="formGroupExampleInput"><?= $translation['name'] ?></label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input"
                   value="<?= $_POST['name'] ?? 'Ivan' ?>">
            <?php if (!empty($error['name'])) : ?>
                <small style="color:red" id="passwordHelpBlock" class="from-text">
                    <?= $error['name'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?= $translation['surname'] ?></label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="surname"
                   placeholder="Example input"
                   value="<?= $_POST['surname'] ?? 'Myasoyedov' ?>">
            <?php if (!empty($error['surname'])) : ?>
                <small style="color:red" id="passwordHelpBlock" class="from-text">
                    <?= $error['surname'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?= $translation['age'] ?></label>
            <input type="number" class="form-control" id="formGroupExampleInput" name="age"
                   placeholder="Example input"
                   value="<?= $_POST['age'] ?? '20' ?>">
            <?php if (!empty($error['age'])) : ?>
                <small style="color:red" id="passwordHelpBlock" class="from-text">
                    <?= $error['age'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?= $translation['email'] ?></label>
            <input type="email" class="form-control" id="formGroupExampleInput" name="email"
                   placeholder="Example input"
                   value="<?= $_POST['email'] ?? 'example@gmail.com' ?>">
            <?php if (!empty($error['email'])) : ?>
                <small style="color:red" id="passwordHelpBlock" class="from-text">
                    <?= $error['email'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><?= $translation['password'] ?></label>
            <input type="password" class="form-control" id="formGroupExampleInput" name="password"
                   placeholder="Example input"
                   value="<?= $_POST['password'] ?? '' ?>">
            <?php if (!empty($error['password'])) : ?>
                <small style="color:red" id="passwordHelpBlock" class="from-text">
                    <?= $error['password'] ?>
                </small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <?php $gender = empty($_POST['gender']) ? 'Others' : $_POST['gender']; ?>
            <label for="exampleFormControlSelect1"><?= $translation['gender'] ?></label>
            <select class="form-control" id="exampleFormControlSelect1" name="gender">
                <option></option>
                <option <?= $gender == 'Man' ? 'selected' : '' ?>>Man</option>
                <option <?= $gender == 'Woman' ? 'selected' : '' ?>>Woman</option>
                <option <?= $gender == 'Others' ? 'selected' : '' ?>>Others</option>
            </select>
        </div>
        <?php if (!empty($error['gender'])) : ?>
            <small style="color:red" id="passwordHelpBlock" class="from-text">
                <?= $error['gender'] ?>
            </small>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary"><?= $translation['button'] ?></button>
    </form>
</div>
</body>
</html>
