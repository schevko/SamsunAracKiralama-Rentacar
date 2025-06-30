<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontCarController;
use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\FrontHomeController;



Route::get('/' , [FrontHomeController::class, 'index'])->name('home');
Route::get('/blog' , [FrontBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}' , [FrontBlogController::class, 'show'])->name('blog.show');
Route::get('/araclar' , [FrontCarController::class, 'index'])->name('car.index');
Route::get('/araclar/{car}' , [FrontCarController::class, 'show'])->name('car.show');
Route::get('/iletisim' , [FrontContactController::class, 'index'])->name('contact.index');
Route::post('/iletisim', [FrontContactController::class, 'store'])->name('contact.store');
Route::get('/hakkimizda' , [FrontPageController::class, 'showAbout'])->name('page.about');
Route::get('/cerez-politikasi' , [FrontPageController::class, 'cookiepolicy'])->name('page.cookiepolicy');





require __DIR__.'/admin.php';
