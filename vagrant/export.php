<?php

$users = require_once 'db.php';
require_once './functions.php';
initSession();
userCookies();

$exportFileName = "./blog/export.csv";

$file = fopen($exportFileName, 'w');

$headers = array_keys(current($users));
fputcsv($file, $headers);
foreach ($users as $user) {
    $user['animals'] = implode(',', $user['animals']);
    fputcsv($file, $user);
}

fclose($file);


$baseName = basename($exportFileName);
header("Content-Disposition: attachment; filename=$baseName");
echo file_get_contents($exportFileName);