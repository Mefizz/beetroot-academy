<?php

if (!empty($_FILES)) {
    $source = $_FILES['import']['tmp_name'];
    $fileName = $_FILES['import']['name'];
    $dest = './blog/' . $fileName;
    move_uploaded_file($source, $dest);

    // Start writing to database
    $users = require 'db.php';
    require 'functions.php';
    $handle = fopen($dest, 'r');
    $headers = fgetcsv($handle);
    while (!feof($handle)) {
        $row = fgetcsv($handle);
        if (!empty($row)) {
            $user = array_combine($headers, $row);
            createUser($user);
        }
    }
}

require_once './functions.php';
initSession();
userCookies();
