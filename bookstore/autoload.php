<?php
define('PROJECT_ROOT', '/var/www/html');

$ext = 'php';

spl_autoload_register(function($className) use ($ext) {
    $file = PROJECT_ROOT . "/classes/$className.$ext";
    if (is_file($file)) {
        require $file;
        return;
    }
    throw new \Exception("File $file not found for class $className");
});