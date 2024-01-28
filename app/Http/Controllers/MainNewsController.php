<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Main_news;
use Illuminate\View\View;

class MainNewsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(): View
    {
        $model = new Main_news();
        $main_news = $model->getMainNews();
        dd($model);
        return \view('components.news.main_news', [
            'main_news' => $main_news,
        ]);
    }
}
