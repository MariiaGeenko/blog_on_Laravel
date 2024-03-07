<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\QueryBuilders\Main_newsQueryBuilder;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $main_news = new Main_newsQueryBuilder();

        return \view('account.index', [

            'main_news' => $main_news->getAll()
        ]);
    }
}
