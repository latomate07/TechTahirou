<?php

use App\Models\Test;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(HomeController::class)->middleware('web')->group(function() {
    Route::get('/', 'index')->name('home');
    Route::post('/contact', 'contact')->name('contact');
});

Route::controller(BlogController::class)->prefix('blog')->middleware('web')->group(function() {
    Route::get('/', 'index')->name('blog.home');
    Route::get('/article/{post:slug}', 'show')->name('blog.show');
    Route::get('/ajout', 'create')->name('blog.article.create');
});

Route::controller(PortfolioController::class)->prefix('portfolios')->middleware('web')->group(function() {
    Route::get('/', 'index')->name('portfolios.home');
    Route::get('/{portfolio:slug}', 'show')->name('portfolios.show');
});

Route::controller(AdminController::class)->prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard');

    // Articles
    Route::get('/dashboard/articles', 'showArticles')->name('dashboard.articles');
    Route::get('/dashboard/articles/ajout', 'createArticle')->name('dashboard.articles.create');
    Route::post('/dashboard/articles/ajout', 'storeArticle')->name('dashboard.articles.store');
    Route::delete('/dashboard/delete-article/{article_id}', 'deleteArticle')->name('dashboard.articles.delete');

    // Users
    Route::get('/dashboard/utilisateurs', 'showUsers')->name('dashboard.users');
    Route::delete('/dashboard/delete-user/{user_id}', 'deleteUser')->name('dashboard.users.delete');

    // Portfolios
    Route::get('/dashboard/portfolios', 'showPortfolios')->name('dashboard.portfolios');
    Route::get('/dashboard/portfolios/ajout', 'createPortfolio')->name('dashboard.portfolios.create');
    Route::post('/dashboard/portfolios/ajout', 'storePortfolio')->name('dashboard.portfolios.store');
    Route::delete('/dashboard/delete-portfolio/{portfolio_id}', 'deletePortfolio')->name('dashboard.portfolios.delete');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function() {
        Route::post('/store-new-category', 'saveCategory')->name('dashboard.store-category');
    });
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');    
    });
});

// Others Pages
Route::get('/politique-de-confidentialite', function() {
    return Inertia::render('Infos/Politiques');
})->name('pages.politiques');


require __DIR__.'/auth.php';
