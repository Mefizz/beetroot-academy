<?php

define('RSS_URLS', [
    'https://dumskaya.net/rssnews/' => 'getDumskayaDescription',
    'https://www.obozrevatel.com/rss.xml' => 'getDescription',
]);

define('KURS', 'https://minfin.com.ua/data/currency/ib/usd.ib.today.json');

function loadRss($url)
{
    $rssFile = 'blog/' . parse_url($url, PHP_URL_HOST) . '.xml';
    $rssFile = sprintf(
        'blog/%s.%s',
        parse_url($url, PHP_URL_HOST),
        'xml'
    );
    if (!file_exists($rssFile)) {
        $page = file_get_contents($url);
        file_put_contents($rssFile, $page);
    }
    return simplexml_load_file($rssFile);
}

function loadAll()
{
    $result = [];
    $total = 0;
//    foreach (RSS_URLS as $url => $function) {
//
//    }
    $limit = INF;
    if (!empty($_GET['limit'])) {
        $limit = floor($_GET['limit'] / count(RSS_URLS));
    }
    foreach (RSS_URLS as $url => $function) {
        $xml = loadRss($url);
        $items = $xml->channel->item;
        $key = 0;
        foreach ($items as $item) {
            if (++$key > $limit) {
                break;
            }
            $item->description = colorize($function($item));
            $item->image = empty($item->image) ?
                'https://image.shutterstock.com/image-vector/no-image-available-sign-internet-260nw-261719003.jpg' :
                $item->image;
            $result[] = $item;
        }
    }
    shuffle($result);
    return $result;
}

function getDumskayaDescription(object $item, $limit = 2000) : string
{
    $url = $item->link;
    $content = file_get_contents($url);
    // конвертируем из windows-1251 to UTF-8
    $content =  mb_convert_encoding($content, "UTF-8", "Windows-1251");
    // получаем позицию тега в тексте страницы
    $pos = mb_strpos($content, '<td class=newscol');
    // обрезаем полученный контент с позиции тега <td class=newscol
    $description = mb_substr($content, $pos);
    // получаем картинку
    $item->image = getLogo($content);
    // удаляем strip_tags
    $description = strip_tags($description);
    // remove html entities
    $description = html_entity_decode($description);
    // preg_match
    $description = preg_replace('/\s{2,}/', ' ', $description);
    // Clean description
    $description = preg_replace('/Адрес картинки в интернете:/', '', $description);
    $description = preg_replace('/function[^а-яё]+/s', '', $description);

    return mb_substr($description, 0, $limit);
}

function getDescription(object $item)
{
    return $item->description;
}

function getLogo(string $content) : string
{
    preg_match('#https?://.+?\.jpg#', $content, $matches);
    return $matches[0] ?? '';
}

function colorize(string $content) : string
{
    $result = $content;
    if (!empty($_GET['search'])) {
        $search = $_GET['search'];
        $result = preg_replace("/($search)/iu", "<span style='background-color: red'>$1</span>", $content);

    }
    return $result;
}

function getExchanges()
{
    $ch = curl_init(KURS);
    curl_setopt_array($ch, [
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36'
    ]);
    $json = curl_exec($ch);
    // json_encode
    // json_decode
    $result = json_decode($json, true);
    $lastExchange = end($result);
    return sprintf("Покупка %.2f Продажа %.2f", $lastExchange['bid'], $lastExchange['ask']);
    return "Покупка {$lastExchange['bid']} Продажа  {$lastExchange['ask']}";
}