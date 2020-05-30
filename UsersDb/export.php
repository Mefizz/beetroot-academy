<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
//if (isset($_SESSION))
//{



$users = require_once 'db.php';
require 'functions.php';
initSession();
$exportFileName = "./tmp/export.csv";
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
//}