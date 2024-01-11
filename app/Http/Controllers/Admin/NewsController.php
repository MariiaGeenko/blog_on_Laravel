<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $newsList = $newsQueryBuilder->getAll(); // ->getNewsByStatus('draft');

        return \view('admin.news.index', [

            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
