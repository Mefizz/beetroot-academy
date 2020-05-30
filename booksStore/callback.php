<?php
require 'functions.php';
//http://localhost:8080/callback.php
if (!empty($_POST['data'])) {
    session_start();
//$data =updateOrder($_POST['data']);
    list($orderId, $status) = updateOrder($_POST['data']);
    if ($status == 'success') {
        setcookie('cart', '', time() - 60);
    }
    $_SESSION['order_id'] = $orderId;
    header('Location: /');
}


//header('Location : /index.php');