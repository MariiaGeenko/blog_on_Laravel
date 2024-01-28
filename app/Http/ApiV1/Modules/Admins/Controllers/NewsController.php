<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\News;

use App\Enums\NewsStatus;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\EditRequest;
use App\QueryBuilders\NewsQueryBuilder;
use App\Http\Requests\News\CreateRequest;
use App\QueryBuilders\CategoriesQueryBuilder;
use \Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $newsList = $newsQueryBuilder->getAll(); // ->getNewsByStatus('draft');

        return \view('admin.news.index', [

            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('success', 'added news');
        }

        return \back()->with('error', "don't added news");
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
    public function edit(News $news,
    CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());

        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('success', 'edited news');
        }

        return \back()->with('error', "don't edited news");
    }

    /**
     * Remove the specified resource from storage.
     */
    public
        function destroy(News $news): JsonResponse
        {
            try {
                $news->delete();

                return \response()->json('ok');
            } catch (\Exception $exception) {
                Log::error($exception->getMessage(), [$exception]);

                return \response()->json('error', 400);
            }
        }
}
