<?php
declare(strict_types=1);

class ProductService

{
    private $isPaginationEnabled;

    /**
     * ProductService constructor.
     * @param bool $isPaginationEnabled
     */

    public function  __construct(bool $isPaginationEnabled = true)
    {
        $this->isPaginationEnabled = $isPaginationEnabled;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getProductList(array $ids =[]) : array
    {
$page = getPageNumber();
$offset = ($page - 1) * ITEMS_PER_PAGE;
$query = "SELECT b.id book_id, b.title, b.cost, a.name author, g.name genre FROM book b
    left join genre g ON g.id = b.genre_id
    left join author a ON a.id = b.author_id
    %s
    ORDER BY b.id 
    ";
        if($this->isPaginationEnabled) {
            $query .= " LIMIT $offset, 8";
        }
$where = '';
if (!empty($ids)) {
$where = sprintf('WHERE b.id IN (%s)', implode(',', $ids));
}
$query = sprintf($query, $where);
$pdo = getPDO();
$result = $pdo->query($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
return $result->fetchAll();
    }
    public function getBookById($bookId)
    {
        $query = "SELECT b.id book_id, b.title, a.name author, g.name genre, g.id genre_id, b.cost FROM book b
    left join author a ON a.id = b.author_id
    left join genre g ON g.id = b.genre_id
    where b.id = ?
    ";
        $pdo = getPDO();
        $result = $pdo->prepare($query);
        $result->execute([$bookId]);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    public function update($bookId, array $data)
    {
        try {
            $pdo = getPDO();
            $pdo->beginTransaction();
            $authorId = $this->upsertAuthor($data['author']);
            $genreId = $this->getGenre($data['genre']);
            //TODO : update book
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBacl();
        }
    }

    private function upsertAuthor($name) : int
    {

    }

    private function getGenre($name) : int

    {

    }


}