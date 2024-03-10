<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\Main_newsQueryBuilder;
use App\QueryBuilders\AnotherPostsQueryBuilder;
use Illuminate\Contracts\View\View;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $newsList = $newsQueryBuilder->getAll(); // ->getNewsByStatus('draft');

        $main_news = new Main_newsQueryBuilder();

        $another_posts = new AnotherPostsQueryBuilder();

        return \view('news.index', [

            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
            'main_news' => $main_news->getAll(),
            'another_posts' => $another_posts->getAll()

        ]);
    }

    public function show(int $id, NewsQueryBuilder $newsQueryBuilder)
    {
        $newsList = $newsQueryBuilder->getNewsById($id);

        return \view('news.show', [

            'newsList' => $newsQueryBuilder->getNewsById($id),
        ]);
    }
}
