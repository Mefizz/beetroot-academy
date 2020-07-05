<?php

// http://localhost:8080/callback.php
//
require 'functions.php';

if (!empty($_POST['data'])) {
    session_start();
    list($orderId, $status) = updateOrder($_POST['data']);
    if ($status == 'success') {
        setcookie('cart', '', time() - 60);
    }
    $_SESSION['order_id'] = $orderId;
    header('Location: /');
}