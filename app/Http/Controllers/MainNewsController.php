<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Main_news;
use App\QueryBuilders\Main_newsQueryBuilder;
use Illuminate\View\View;

class MainNewsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(): View
    {
        $query = new Main_newsQueryBuilder();

        $main_news = $query->getAll();
      

        return \view('components.news.main_news', [

            'main_news' =>  $main_news,
        ]);
    }
}
