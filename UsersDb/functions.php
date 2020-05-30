<?php
define('SESSION_INTERVAL', 2 * 60);
$users = require 'db.php';

if (!empty($_POST)) {
   $err = createUser();
   if(!empty($err)) {
       $errorString ='';
       foreach ($err as $key => $message) {
           $errorString .= "error[$key]=$message&";
       }
       header('Location: /user.php?' . $errorString);
   }
   header('Location: /stats.php?' . $errorString);
   exit();
}

function sortFields($userA, $userB){
    $order = $_GET['order'] ?? 'asc';
    if(!empty($_GET['order']) && $_GET['order'] == 'asc') {
        return $userA[$_GET['sort']] <=> $userB[$_GET['sort']];
    }
    return $userB[$_GET['sort']] <=> $userA[$_GET['sort']];
}
// Search Max Ages in Users
$ages = array_column($users, 'age');
$maxAge = array_keys($ages, max($ages));
$olderUser = [];
foreach ($maxAge as $index) {
    $olderUser[] = $users[$index];
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
        case 'gender':
            usort($users, 'sortFields');
    }
}
$animals = [];
foreach ($users as $user) {
    $animals = array_merge($animals, $user['animals']);
}

$animalsFilter = array_unique($animals);

function createUser(array $data = []){
    opcache_invalidate('db.php');
    $users = require 'db.php';
    $user = empty($data) ? $_POST : $data;
    $error = [];
    if (empty($user['name'])) {
        $error['name'] = 'Имя не может быть пустым';
    }
    if (empty($user['surname'])) {
        $error['surname'] = 'Фамилия не может быть пустой';
    }
    if (empty($user['age']) || $user['age'] < 1) {
        $error['age'] = 'Возраст задан некорректно';
    }
    if (empty($user['email'])) {
        $error['email'] = 'Почта задана некорректно';
    }
    if (!empty($error)) {
        return $error;
    }

    $user['animals'] = [];
    if($_POST['gender'] === 'Man'){
        $user['avatar'] = 'https://kingsballpen.com.ng/wp-content/uploads/2019/12/img-avatar-blank.jpg';
    }
    if($_POST['gender'] === 'Woman'){
        $user['avatar'] = 'https://cdn2.iconfinder.com/data/icons/circle-avatars-1/128/050_girl_avatar_profile_woman_suit_student_officer-512.png';
    }
    $users[] = $user;
    $content = "<?php" . PHP_EOL;
    $content = $content . "return " . var_export($users,1);
    $content .= ";";
    file_put_contents('db.php', $content);
}

if (!empty($_GET['filter'])) {
    switch ($_GET['filter']) {
        case 'man':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'man') {
                    unset($users[$key]);
                }
            }
            break;
        case 'woman':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'woman') {
                    unset($users[$key]);
                }
            }
            break;
        case 'covid':
            foreach ($users as $key => $user) {
                if ($user['age'] < 60) {
                    unset($users[$key]);
                }
            }
            break;
        case 'dog':
        case 'cat':
        case 'horse':
        case 'parrot':

            foreach ($users as $key => $user) {
                $index = array_search($_GET['filter'], $user['animals']);
                if (false === $index) {
                    unset($users[$key]);
                }
            }
            break;
        default:
            break;
    }
}

function initSession ()
{
session_start();
$time = $_SESSION['created_at'] ?? 0;
$currentTime  = time() - $time;
if ($currentTime > SESSION_INTERVAL) {
    endSession ();
    }
}

function endSession () {
    session_destroy();
    header ('Location: /auth.php');
}

function getAuthUserAvatar ()
//{
//    if (!empty($_SESSION['id']) && is_numeric($_SESSION['id'])) {
//        $currentUser = $_SESSION;
//        echo ($currentUser['name'] . $currentUser['avatar']);
//      }
//}
$user = $_SESSION['user']['name'];
$page = str_replace('.php', '', $_server['PHP_SELF']);
if(isset($_COOKIE[$user . $page]))
{
    setcookie($user . $page ++$_COOKIE[$user . $page], time() + 3600);
}
else {
    setcookie($user . $page , 1 , time() + 3600);
}



?>