<?php
declare(strict_types=1);

/**
 * Class GenreService
 */
class GenreService
{

    /**
     *
     * @return array
     */
    public function getGenreStats() : array
    {
        $sql = 'SELECT g.name, count(b.id) total from book b
            join genre g ON g.id = b.genre_id
            group by g.name order by total';
        $pdo = getPDO();
        $stmt = $pdo->query($sql);
        $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalSum = array_sum(array_column($stats, 'total'));
        foreach ($stats as &$stat) {
            $stat['percent'] = round($stat['total'] / $totalSum * 100, 2);
        }
        return $stats;
    }

    /**
     * @param array $stats
     *
     * @return array
     */
    public function showAsPercents($stats) : array
    {
        $totalSum = array_sum(array_column($stats, 'total'));
        foreach ($stats as &$stat) {
            $stat['percent'] = round($stat['total'] / $totalSum * 100, 2);
        }
        return $stats;
    }

}