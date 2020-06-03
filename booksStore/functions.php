<?php

define('ITEMS_PER_PAGE', 8);

define('PUB_KEY', 'sandbox_i7619656936');
define('PRIVATE_KEY', 'sandbox_dgNRfsjIrPIBdaZKar7PwBf24qOf3y4MvAL386o8');

function getPDO()
{
    $pdo = new PDO("mysql:dbname=bookstore;host=127.0.0.1;charset=utf8mb4", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $pdo;
}

function getBooks(array $ids = []): array
{
    require "classes/ProductService.php";
    $class = new ProductService();
    return $class->getProductList($ids);
}

function getBookById($bookId): array
{
    require "classes/ProductService.php";
    $class = new ProductService();
    return $class->getBookById($bookId);
}

function getGenres(): array
{
    $query = 'SELECT id, name FROM genre';
    $pdo = getPDO();
    $result = $pdo->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getComments($bookId): array
{
    $query = 'SELECT * FROM comment WHERE book_id = ?';
    $pdo = getPDO();
    $result = $pdo->prepare($query);
    $result->execute([$bookId]);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getStars(int $rating = 3)
{
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        $stars .= ($i <= $rating) ? '&#9733;' : '&#9734;';
    }
    $html = "<span class=\"text-warning\">$stars</span> $rating.0 star";
    if ($rating > 1) {
        $html .= 's';
    }
    return $html;
}


function addComment($comment, $bookId)
{
    $sql = "INSERT INTO `comment` (message, book_id) VALUES (:comment, :book)";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'comment' => $comment,
        'book' => $bookId
    ]);
}

function formatCommentDate(string $date): string
{
    $time = strtotime($date);
    return date('n/j/y', $time);
}

function getPageNumber(): int
{
    $page = $_GET['page'] ?? 1;
    $total = getTotal();
    if ($page < 1) {
        $page = 1;
    } elseif ($page > $total) {
        $page = $total;
    }

    return $page;
}

function paginate()
{
    $page = getPageNumber();
    $pageCount = getTotal();
    $buttons = "";
    $startPos = getPageNumber();
    for ($i = 0; $i < 2; $i++) {
        if ($startPos === 1) {
            break;
        }
        $startPos--;
    }
    $endPos = $page;
    for ($i = 0; $i < 2; $i++) {
        if ($endPos === $pageCount) {
            break;
        }
        $endPos++;
    }
    for ($i = $startPos; $i <= $endPos; $i++) {
        $active = $page === $i ? 'active' : '';
        $buttons .= "<li class=\"page-item $active \"><a class=\"page-link\" href=\"?page=$i\">$i</a></li>";
    }
    return <<<PAGE
<nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            $buttons
            <li class="page-item">
                <a class="page-link" href="?page=$pageCount" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
PAGE;
}

function getTotal(): int
{
    static $count;
    if ($count === null) {
        $sql = 'SELECT COUNT(1) FROM book';
        $pdo = getPDO();
        $stmt = $pdo->query($sql);
        $total = $stmt->fetch(PDO::FETCH_COLUMN);
        $count = ceil($total / ITEMS_PER_PAGE);
        return $count;
    }
    return $count;
}

function addToCart($bookId, int $count = 1)
{
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    }
    if (!isset($cart[$bookId])) {
        $cart[$bookId] = 0;
    }
    //$cart[$bookId] = $cart[$bookId] + $count;
    $cart[$bookId] += $count;
    setcookie('cart', json_encode($cart), time() + 60 * 60 * 24 * 365);
}

function getItemsCount(): int
{
    $total = 0;
    if (!empty($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        foreach ($cart as $count) {
            $total += $count;
        }
        //$total = array_sum($cart);
    }
    return $total;
}

function getCartItems(): array
{
    $cart = json_decode($_COOKIE['cart'] ?? '', true);
    if (empty($cart)) {
        return [];
    }
    // [book_id => count]
    $ids = array_keys($cart);
    $books = getBooks($ids);
    foreach ($books as &$book) {
        $book['count'] = $cart[$book['book_id']];
    }
    return $books;
}

function deleteFromCart($deleteId)
{
    $cart = json_decode($_COOKIE['cart'], true);
    unset($cart[$deleteId]);
    if (!empty($cart)) {
        setcookie('cart', json_encode($cart));

    } else {
        setcookie('cart', '', time() - 1);
    }
}

function getOrderTotal()
{
    $cost = 0;
    if (!empty($_COOKIE['cart'])) {
        $books = getCartItems();
        foreach ($books as $book) {
            $cost += $book['cost'] * $book['count'];
        }
    }
    return $cost;
}

/**
 * Create order with books
 *
 * @return int
 */
function createOrder(): int
{
    $items = getCartItems();
    $sql = 'INSERT INTO `order` VALUES()';
    $pdo = getPDO();
    $pdo->query($sql);
    $orderId = $pdo->lastinsertId();
    $sql = "INSERT INTO order_book (order_id, book_id, `count`) VALUES (?, ?,? )";
    $stmt = $pdo->prepare($sql);
    foreach ($items as $item) {
        $stmt->execute([
            $orderId,
            $item['book_id'],
            $item['count']
        ]);
    }
    return $orderId;

}

/**
 * summ total cost from $count of $books
 * @return float
 */
//function countMoneys() : float
//{
//    $total = 0.0;
//    $items = getCartItems();
//
//}

function getData($orderId)
{
    $data = sprintf(
        '{"result_url":"http://localhost:8080/callback.php", "public_key":"%s","version":"3","action":"pay","amount":"%.2f","currency":"UAH","description":"Покупка книг на сайте","order_id":"%s"}',
        PUB_KEY,
        getOrderTotal(),
        $orderId
    );
    return base64_encode($data);
}

function getSignature($orderId)
{
    return base64_encode(sha1(PRIVATE_KEY . getData($orderId) . PRIVATE_KEY, true));
}

function updateOrder(string $data)
{
    $paymentData = json_decode(base64_decode($data), true);
    $orderId = $paymentData['order_id'];
    $amount = $paymentData['amount'];
    $status = $paymentData['status'];
    if ($status == 'failure') {
        $status = 'failed';
    }
    $sql = 'UPDATE `order` SET `status` = :status, amount = :amount WHERE order_id =:order_id';
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'status' => $status,
        'order_id' => $orderId,
        'amount' => $amount
    ]);
    return [$orderId, $status];
}

function getPaymentStatusMessage()
{
    if (!empty($_SESSION['order_id'])) {
        $sql = 'SELECT * FROM `order` WHERE order_id= ?';
        $pdo = getPDO();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['order_id']]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order['status'] == 'failed') {
            $message = sprintf("При заказе произошла ошибка. Заказ на сумму %s не оплачен", $order['amount']);

            $message .= "    
        <script>
            $('#exampleModalCenter').modal('show')
        </script>
            ";

        } else {
            $message = sprintf("Все норм, заказ оплачен");

            $message .= "
        <script>
            $('#exampleModalCenter').modal('show')
        </script>
            ";
            unset($_SESSION['order_id']);
            return $message;
        }
    }
}

