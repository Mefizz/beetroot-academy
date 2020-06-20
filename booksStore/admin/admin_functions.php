<?php

require '../functions.php';

function getMonths()
{
    return $months = [
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

function getPendingOrders()
{
    $sql = "SELECT count(*) FROM `order` WHERE status ='pending'";
    $pdo = getPDO();
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function getTotalEarnings()
{
    $sql = "SELECT SUM(`amount`) FROM `order` WHERE status ='success'";
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

/**
 * @param array $product
 * @return string
 */
function getProductEditUrl(array $product)
{
    if(!empty($product['book_id'])) {
        return "/admin/product/edit/{$product['book_id']}";
    }
}

/**
 * @param array $product
 * @return string
 */
function getProductDeleteUrl(array $product)
{
    if(!empty($product['book_id'])) {
        return "/admin/product/delete/{$product['book_id']}";
    }
}