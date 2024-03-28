<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/resources/{postSlug}', [SiteController::class, 'post'])->name('post.details');
Route::middleware(['throttle:newsletter'])->group(function () {
    Route::post('/newsletter', [SiteController::class, 'newsletterSubmit'])->middleware(Spatie\Honeypot\ProtectAgainstSpam::class)->name('newsletter.submit');
});
Route::get('/newsletter/unsubscribe/{token}', [SiteController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/newsletter/unsubscribe/confirm/{token}', [SiteController::class, 'unsubscribeConfirm'])->name('newsletter.unsubscribe.confirm');
// Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/construction', [SiteController::class, 'construction'])->name('construction');
Route::get('/cabinetry', [SiteController::class, 'cabinetry'])->name('cabinetry');
Route::get('/service', [SiteController::class, 'services'])->name('services');
Route::get('/sitemap.xml', [SitemapController::class, 'sitemap']);

Route::middleware(['throttle:contact'])->group(function () {
    Route::post('/contact', [SiteController::class, 'contact'])->middleware(Spatie\Honeypot\ProtectAgainstSpam::class)->name('contact');
});

Route::get('/page/{slug}', [SiteController::class, 'page'])->name('page.details');

Route::get('/migrate-seed', function () {
    Artisan::call('migrate:fresh --seed');
});
