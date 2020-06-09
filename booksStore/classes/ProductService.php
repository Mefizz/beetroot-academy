<?php
declare(strict_types=1);

class ProductService

{
    private $isPaginationEnabled;

    /**
     * ProductService constructor.
     * @param bool $isPaginationEnabled
     */

    public function __construct(bool $isPaginationEnabled = true)
    {
        $this->isPaginationEnabled = $isPaginationEnabled;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getProductsList(array $ids = []): array
    {
        $page = getPageNumber();
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        $query = "SELECT b.id book_id, b.title, b.cost, a.name author, g.name genre FROM book b
    left join genre g ON g.id = b.genre_id
    left join author a ON a.id = b.author_id
    %s
    ORDER BY b.id 
    ";
        if ($this->isPaginationEnabled) {
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


}
//        $books = [];
//        foreach ($result as $row) {
//            $books[] = $row;
//        }
//        return $books;
//    }

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
            $sql = "UPDATE book SEt author_id = :author, genre_id = :genre, cost = :cost, title = :title
                    WHERE id = :book_id
                    ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'author'=> $authorId,
                'genre' => $genreId,
                'cost' => $data['cost'],
                'title' => $data['title'],
                'book_id' => $bookId
        ]);
            $pdo->commit();
        } catch (Exception $e) {
            echo  "<h1>{$e->getMessage()}</h1>";
            $pdo->rollBack();
        }
    }

    /**
     * @param $name
     * @return int
     */
    private function upsertAuthor($name): int
    {
        $authorSql = 'SELECT id FROM author WHERE name like ?';
        $pdo = getPDO();
        $stmt = $pdo->prepare($authorSql);
        $stmt->execute([$name]);
        $authorId = (int)$stmt->fetchColumn();
        if ($authorId) {
            return $authorId;
        }
        $pdo = getPDO();
        $sql = 'INSERT INTO author (name) VALUES (?)';
        $stmt = $pdo -> prepare($sql);
        $stmt->execute([$name]);
        return (int)$pdo->lastInsertId();
    }

    /**
     * @param $name
     * @return int
     */
    private function getGenre($name): int

    {
        $genre = 'SELECT id FROM genre WHERE name like ?';
        $pdo = getPDO();
        $stmt = $pdo->prepare($genre);
        $stmt->execute([$name]);
        $genreId = (int)$stmt->fetchColumn();
        if (!empty($genreId)) {
            return $genreId;
        }
        throw new Exception('Something wrong with product edit');
    }
}



