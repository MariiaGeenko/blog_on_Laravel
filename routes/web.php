<?php

declare(strict_types=1);

use App\Http\Controllers\Account\IndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('account', IndexController::class);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
    Route::get('/', AdminController::class)
    ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('register', function () {
    return view('auth.register');
});
Route::get('login', function () {
    return view('auth.login');
});
Route::get('guest', function () {
    return view('layouts.guest');
});
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('account.logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => ''], static function () {
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
        ->name('news.show');
});

// Route::get('main_news', function() {
//     return view('components.news.main_news');
// });

require __DIR__.'/auth.php';
