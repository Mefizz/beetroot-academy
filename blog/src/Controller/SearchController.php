<?php
declare(strict_types=1);


namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use App\Service\Search\DatabaseSearcher;
use App\Service\Search\SearcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SearchController
 * @package App\Controller
 */
class SearchController extends AbstractController
{
    private $searcher;

    public function __construct(SearcherInterface $searcher)
    {
        $this->searcher = $searcher;
    }

    /**
     * @Route("/search", name="search_articles", methods={"GET"})
     */
    public function search(Request $request)
    {
//        die($request->query->get('query'));
        $query = $request->query->get('query');
        $articles = $this->searcher->searchByQuery($query);
        return $this->render('search/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}