<?php
declare(strict_types=1);


/**
 * Class OrderService
 */
class OrderService
{
    /**
     * @return array
     */
    public function getOrdersList(): array
    {
        $sql = "SELECT ob.order_id, GROUP_CONCAT(b.id SEPARATOR ',') book_ids, GROUP_CONCAT(b.title SEPARATOR ',') book_names, o.added_at, o.`status`, IFNULL(o.amount,0) amount
                FROM bookstore.order_book ob
                JOIN bookstore.`order` o ON ob.order_id = o.order_id
                JOIN bookstore.book b ON ob.book_id = b.id
                GROUP BY ob.order_id
                ORDER BY ob.order_id DESC";
        $pdo = getPDO();
        $stmt = $pdo->query($sql);
        $resultArr = $stmt->fetchAll();
        $colorizeFunc = function ($status, $color) {
            if($status =='failed') {
            return "<span style='color:$color'>$status</span>";
        }
        return $status;
        };
        $result = array_map(function ($order) use ($colorizeFunc) {
        $order['status'] = $colorizeFunc($order['status'], 'green');
        return $order;
    }, $resultArr);
        return $result;
    }

//        foreach ($resultArr as $product) {
//            $product['status'] = $colorizeFunc($product['status'], 'red');
//        }
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    /**
     * @param $bookIds
     * @param $bookNames
     * @return array
     */
    public function getBookIdByName($bookIds, $bookNames)
    {
        $bookIds = explode(',', $bookIds);
        $bookNames = explode(',', $bookNames);
        return array_combine($bookIds, $bookNames);
    }
}