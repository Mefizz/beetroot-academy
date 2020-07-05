<?php
require 'vendor/autoload.php';
define('ITEMS_PER_PAGE', 8);
define('PUB_KEY', 'sandbox_i96445077653');
define('PRIVATE_KEY', 'sandbox_th2Vhc533WCmoAWPnlpcblegCT9JWX9UG3tbFUXe');

/**
 * @return PDO
 */
function getPDO()
{
//    $pdo = new PDO("mysql:dbname=bookstore;host=127.0.0.1;charset=utf8mb4", 'root', '',[
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//    ]);
    $pdo = new PDO("mysql:dbname=bookstore;host=mysql;charset=utf8mb4", 'bookstore', 'secret',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $pdo;
}

/**
 * @param array $ids
 * @return array
 */
function getBooks(array $ids = []) : array
{
    $class = new ProductService();
    return $class->getProductsList($ids);
}

/**
 * @param $bookId
 * @return array
 */
function getBookById($bookId) : array
{
    $class = new ProductService();
    return $class->getBookById($bookId);
}

/**
 * @return array
 */
function getGenres() : array
{
    $query = 'SELECT id, name FROM genre';
    $pdo = getPDO();
    $result = $pdo->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param $bookId
 * @return array
 */
function getComments($bookId) : array
{
    $query = 'SELECT * FROM comment WHERE book_id = ?';
    $pdo = getPDO();
    $result = $pdo->prepare($query);
    $result->execute([$bookId]);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param int $rating
 * @return string
 */
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


/**
 * @param $comment
 * @param $bookId
 */
function addComment($comment, $bookId)
{
    $sql = "INSERT INTO `comment` (message, book_id) VALUES (:comment, :book)";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'comment' => $comment,
        'book'    => $bookId
    ]);
}

/**
 * @param string $date
 * @return string
 */
function formatCommentDate(string $date) : string
{
    $time = strtotime($date);
    return date('n/j/y', $time);
}

/**
 * @return int
 */
function getPageNumber() : int
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

/**
 * @return string
 */
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

/**
 * @return int
 */
function getTotal() : int
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

/**
 * @param $bookId
 * @param int $count
 */
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

/**
 * @return int
 */
function getItemsCount() : int
{
    $total = 0;
    if (!empty($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        foreach ($cart as $count) {
            $total += $count;
        }
    }
    return $total;
}

/**
 * @return array
 */
function getCartItems() : array
{
    $cart = json_decode($_COOKIE['cart'] ?? '', true);
    if (empty($cart)) {
        return [];
    }
    // [book_id => count]
    $ids = array_keys($cart);
    $books = getBooks($ids);
    foreach ($books as &$book) {
        $book['count'] = $cart[  $book['book_id']    ];
    }
    return $books;
}

/**
 * Create order with books
 *
 * @return int
 */
function createOrder() : int
{
    $items = getCartItems();
    $sql = 'INSERT INTO `order` VALUES()';
    $pdo = getPDO();
    $pdo->query($sql);
    $orderId = $pdo->lastInsertId();
    $sql = 'INSERT INTO order_book (order_id, book_id, `count`) VALUES (?, ?, ?)';
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
 * Get total cost of current order
 *
 * @return float
 */
function getOrderTotal() : float
{
    $total = 0.0;
    $items = getCartItems();
    foreach ($items as $item) {
        $total += $item['cost'] * $item['count'];
    }
    return $total;
}

/**
 * @param $orderId
 *
 * @return string
 */
function getData($orderId)
{
    $data = sprintf(
        '{"result_url":"http://localhost:8080/callback.php", "public_key":"%s","version":"3","action":"pay","amount":"%.2f","currency":"UAH","description":"Покупка на сайте книг","order_id":"%s"}',
        PUB_KEY,
        getOrderTotal(),
        $orderId
    );

    return base64_encode($data);
}

/**
 * @param $orderId
 *
 * @return string
 */
function getSignature($orderId)
{
    return base64_encode( sha1(PRIVATE_KEY . getData($orderId) . PRIVATE_KEY, true) );
}

/**
 * @param string $data
 * @return array
 */
function updateOrder(string $data)
{
    $paymentData = json_decode(base64_decode($data), true);
    $orderId = $paymentData['order_id'];
    $amount  = $paymentData['amount'];
    $status = $paymentData['status'];
    if ($status == 'failure') {
        $status = 'failed';
    }
    $sql = 'UPDATE `order` SET `status` = :status, amount = :amount WHERE order_id = :order_id';
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'status' => $status,
        'order_id' => $orderId,
        'amount' => $amount
    ]);
    $mailer = new Mailer();
    $mailer->notifyOrder();
    // Create the Transport
//    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
//        ->setUsername('bookstore.beetroot@gmail.com')
//        ->setPassword('beetroot123')
//    ;
//    // Create the Mailer using your created Transport
//    $mailer = new Swift_Mailer($transport);
//
//    // Create a message
//    ob_start();
//    require 'my-email-template.php';
//    $email = ob_get_clean();
//
//    $message = (new Swift_Message('Заказ на сайте'))
//        ->setFrom(['bookstore.beetroot@gmail.com' => 'Магазин'])
//        ->setTo(['work.zjiodeu@gmail.com'])
//        ->setBody($email, 'text/html')
//    ;
//
//// Send the message
//    $result = $mailer->send($message);
    return [$orderId, $status];
}

/**
 * @return string
 */
function getPaymentStatusMessage()
{
    if (!empty($_SESSION['order_id'])) {
        $sql = 'SELECT * FROM `order` WHERE order_id = ?';
        $pdo = getPDO();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['order_id']]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order['status'] == 'failed') {
            $message = sprintf("При заказе произошла ошибка. Заказ на сумму %s не оплачен", $order['amount']);
        } else {
            $message = sprintf("Заказ на сумму %s успешно оплачен", $order['amount']);
        }
        $message .= "
        <script>
          $('#exampleModalCenter').modal('show')
        </script>
        ";
        unset($_SESSION['order_id']);
        return $message;
    }
}

/**
 * @param array $book
 * @return string
 */
function getBookUrl(array $book)
{
    return "/page/{$book['url']}.html";
}

function getBookByUrl($url)
{
    $class = new ProductService();
    return $class->getBookByUrl($url);
}