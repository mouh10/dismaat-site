<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/a-propos', AboutController::class)->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/catalogue', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalogue/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/actualites', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/actualites/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/mentions-legales', function () {
    return view('legal.mentions');
})->name('legal.mentions');
