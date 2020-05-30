<?php
require '../functions.php';
function getTotalPayments()
{
    $sql = "SELECT SUM(amount) from `order` WHERE status = 'success'";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function getTotalRequests()
{
    $sql = "SELECT COUNT(1) from `order` WHERE status = 'pending'";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function getTotalMonthlyPayments()
{
    $sql = "SELECT month(added_at) mnth, SUM(amount) as total FROM `order` GROUP BY mnth
           order by mnth desc limit 1";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    return $arr['total'];

}

function getMVMonth()
{
    $sql = "SELECT month(added_at)  mnth, SUM(amount) as total FROM `order` WHERE status ='success' GROUP BY mnth
order by total desc limit 1;";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $monthes = [
        'january',
        'february',
        'march',
        'april',
        'may'
    ];
    return [$monthes[$row['mnth'] - 1], $row['total']];
}