<?php
require '../functions.php';

function getMonths()
{
    return $monthes = [
        'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Отктябрь',
        'Ноябрь',
        'Декабрь'
    ];
}
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

function getEarningLastMonth()
{
    $sql = "SELECT month(added_at) mnth, sum(`amount`) total FROM `order` where status='success' group by mnth
            order by mnth desc limit 1
            ";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $months = getMonths();
    return [$months[$row['mnth'] - 1], $row['total']];
}

function getBestMonthEarnings()
{
    $sql = "SELECT month(added_at) mnth, sum(`amount`) total FROM `order` where status='success' group by mnth
            order by total desc limit 1
            ";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $months = getMonths();
    return [$months[$row['mnth'] - 1], $row['total']];
}
