<?php
define('NEW_LINE', '<br />');
define('SESSION_INTERVAL', 20 * 60);

$users = require 'db.php';

if (!empty($_POST)) {
    $err = createUser();
    if (!empty($err)) {
        $errorString = '';
        foreach ($err as $key => $message) {
            $errorString .= "error[$key]=$message&";
        }
        header('Location: /user.php?' . $errorString);
    }
//    header('Location: /stats.php');
//    exit();
}

$ages = array_column($users, 'age');
$maxAge = max($ages);
$maxAgeId = array_search($maxAge, $ages);
$oldestUser = $users[$maxAgeId];
$oldestUsersInfo[0] = "Самый старый пользователь: ";
$oldestUsersInfo[1] = $oldestUser['name'] . " " . $oldestUser['surname'] . ":" . " " . $oldestUser['age'];


function createUser(array $data = [])
{
    opcache_invalidate('db.php');
    $users = require 'db.php';
    $user = empty($data) ? $_POST : $data;
    $error = [];
    $emails = array_column($users, 'email');
    foreach ($emails as $email) {
        if ($email === $user['email']) {
            $error['email'] = 'Пользователь с такой почтой уже зарегистрирован';
            break;
        }
    }
    if (empty($user['name'])) {
        $error['name'] = 'Поле имя не может быть пустым';
    }
    if (empty($user['surname'])) {
        $error['surname'] = 'Поле фамииля не может быть пустой';
    }
    if (empty($user['age']) || $user['age'] < 1) {
        $error['age'] = 'Возраст задан некорректно';
    }
    if (empty($user['email'])) {
        $error['email'] = 'Почта задана некорректно';
    }
    if (empty($user['password'])) {
        $error['password'] = 'Поле пароль не может быть пустым';
    }
    if (empty($user['gender'])) {
        $error['gender'] = 'Поле пол не может быть пустым';
    }
    if(!empty($error)){
        return $error;
    }
    $user['avatar'] = 'https://i.grenka.ua/shop/1/5/641/php-slon-sinij_0cc_300_300.png';
    $user['animals'] = [];
    $users[] = $user;
    $content = "<?php" . PHP_EOL;
    $content = $content . "return " . var_export($users, 1);
    $content .= ";";
    file_put_contents('db.php', $content);
    return 0;
}

function initSession()
{
    session_start();
    $time = $_SESSION['created_at'] ?? 0;
    $currentTime = time() - $time;
    if($currentTime > SESSION_INTERVAL) {
        session_destroy();
        header('Location: /auth.php');
    }
}

function userCookies()
{
    $user = $_SESSION['user']['name'];
    $page = str_replace('.php', '',$_SERVER['PHP_SELF']);
    if(isset($_COOKIE[$user . $page])){
        $cookie = $_COOKIE[$user . $page]+1;
        setcookie($user . $page, $cookie, time() + 3600);
    }
    else {
        setcookie($user . $page, 0, time() + 3600);
    }
}

function showUserCookies($user)
{
    $stats = $_COOKIE[$user . '/stats'] ?? 0;
    $export = $_COOKIE[$user . '/export'] ?? 0;
    $import = $_COOKIE[$user . '/import'] ?? 0;
    return "stats - " . $stats . ", export - " . $export . ", import - " . $import;
}

function logout()
{
    session_destroy();
    header('Location: /auth.php');
}

function sortFields($userA, $userB)
{
    $order = $_GET['order'] ?? 'asc';
    $filterName = $_GET['sort'] ?? 'name';

    if ($order == 'asc') {
        return $userA[$filterName] <=> $userB[$filterName];
    }

    return $userB[$filterName] <=> $userA[$filterName];
}

if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'id':
            if (!empty($_GET['order']) && $_GET['order'] == 'desc') {
                krsort($users);
            } else {
                ksort($users);
            }
            $users = array_values($users);
            break;
        case 'name':
        case 'surname':
        case 'age':
            usort($users, 'sortFields');
            break;
    }
}

$animals = [];
foreach ($users as $user) {
    $animals = array_merge($animals, $user['animals']);
}
$animalsFilter = array_unique($animals);

if (!empty($_GET['filter'])) {
    switch ($_GET['filter']) {
        case  'man':
        case  'woman':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== $_GET['filter']) {
                    unset($users[$key]);

                }
            }
            break;
        case  'covid':
            foreach ($users as $key => $user) {
                if ($user['age'] < 60) {
                    unset($users[$key]);

                }
            }
            break;
        case  'dog':
        case  'cat':
        case  'parrot':
        case  'horse':
            foreach ($users as $key => $user) {
                $index = array_search($_GET['filter'], $user['animals']);
                if (false === $index) {
                    unset($users[$key]);
                }
            }
            break;
    }
}

//    $newUser = $users[count($users) - 1];
//if (!empty($_POST) && $oldestUser['age'] == $newUser['age'] && $maxAgeId != count($users) - 1) {
//    $oldestUsersInfo[0] = "Самые старые пользователи: ";
//    $oldestUsersInfo[1] = $oldestUser['name'] . " " . $oldestUser['surname'] . ":" . " " . $oldestUser['age'] . ", " . $newUser['name'] . " " . $newUser['surname'] . ":" . " " . $newUser['age'];
//}
//else {
//    $oldestUsersInfo[0] = "Самый старый пользователь: ";
//    $oldestUsersInfo[1] = $oldestUser['name'] . " " . $oldestUser['surname'] . ":" . " " . $oldestUser['age'];
//}
//$names = array_column($users, 'name');
//$surnames = array_column($users, 'surname');
//
//
//define('JACK_NAME', 'Jack');
//$jackId = array_search(JACK_NAME, $names);
//$jackImage = $users[$jackId]['avatar'];
//
//define('MERKEL_SURNAME', 'Merkel');
//$merkelId = array_search(MERKEL_SURNAME, $surnames);
//$merkelImage = $users[$merkelId]['avatar'];
//ksort($users[$merkelId]['animals']);
//
//$randomUserId = rand(0, count($users) - 1);
//$randomUser = $users[$randomUserId];
//$randomUserImage = $randomUser['avatar'];
//
//if (!empty($_POST) && $oldestUser['age'] == $newUser['age'] && $maxAgeId != count($users) - 1) {
//    $oldestUsersInfo[0] = "Самые старые пользователи: ";
//    $oldestUsersInfo[1] = $oldestUser['name'] . " " . $oldestUser['surname'] . ":" . " " . $oldestUser['age'] . ", " . $newUser['name'] . " " . $newUser['surname'] . ":" . " " . $newUser['age'];
//}
//else {
//    $oldestUsersInfo[0] = "Самый старый пользователь: ";
//    $oldestUsersInfo[1] = $oldestUser['name'] . " " . $oldestUser['surname'] . ":" . " " . $oldestUser['age'];
//}
//
//foreach ($users as $key => $user){
//    echo "Key is: $key" . " " . strtoupper($user['name']) . '<br />';
////    $user['name'] = strtoupper($users['name']);
//
//}
//
//$animals = [];
//foreach ($users as $user) {
//    $animals = array_merge($animals, $user['animals']);
//}
//$animalsFilter = array_unique($animals);

//function emailValidation($users, $myemaill)
//{
//    $emails = array_column($users, 'email');
//    foreach ($emails as $key => $email1) {
//        if ($email1 == $myemaill) {
//            return $email1 . " - повторяеться !";
//        }
//    }
//}
