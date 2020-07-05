<?php

require '../functions.php';

function getPendingOrders()
{
    $sql = "SELECT COUNT(1) from `order` where status = 'pending'";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function getTotalEarnings()
{
    $sql = "SELECT SUM(amount) from `order` where status = 'success'";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function getBestMonthEarnings()
{
    $sql = "SELECT month(added_at) mnth, sum(amount) total FROM `order` where status='success' group by mnth
order by total desc limit 1";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $monthes = [
        'Январь',
        "Февраль",
        "Март",
        "Апрель",
        "Май"
    ];
    return [
        $monthes[$row['mnth'] - 1],
        $row['total']
    ];
}