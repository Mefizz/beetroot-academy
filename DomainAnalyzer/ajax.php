<?php
require 'vendor/autoload.php';

$command = new \App\Command\CompositeCommand(
    new \App\Command\Nslookup(),
    new \App\Command\GeoIp(),
    new \App\Command\Whois()
);

echo new \App\View\Template($command->run($_POST['search']),$_POST['type']);

