<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\CarImageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;


Route::prefix('/admin/slider')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/',  [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store' , [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{slider}' , [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/update/{slider}' ,[SliderController::class, 'update'])->name('slider.update');
    Route::delete('/destroy/{slider}'  , [SliderController::class, 'destroy'])->name('slider.destroy');
});

Route::prefix('/admin/car')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/'  ,[CarController::class, 'index'])->name('car.index');
    Route::get('/create' , [CarController::class, 'create'])->name('car.create');
    Route::post('/store' , [CarController::class, 'store'])->name('car.store');
    Route::get('/edit/{car}', [CarController::class, 'edit'])->name('car.edit');
    Route::put('/update/{car}' ,[CarController::class, 'update'])->name('car.update');
    Route::delete('/destroy/{car}' , [CarController::class, 'destroy'])->name('car.destroy');
});

Route::prefix('/admin/page')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/' , [PageController::class, 'index' ])->name('page.index');
    Route::get('/create' , [PageController::class, 'create'])->name('page.create');
    Route::post('/store' , [PageController::class, 'store'])->name('page.store');
    Route::get('/edit/{page}' ,[PageController::class, 'edit'])->name('page.edit');
    Route::put('/update/{page}', [PageController::class, 'update'])->name('page.update');
    Route::delete('/destroy/{page}' ,[PageController::class, 'destroy'])->name('page.destroy');
});

Route::prefix('/admin/post')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/' , [PostController::class, 'index'])->name('post.index');
    Route::get('/create' ,[PostController::class, 'create'])->name('post.create');
    Route::post('/store' , [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/{post}' , [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update/{post}' , [PostController::class, 'update'])->name('post.update');
    Route::delete('/destroy/{post}' , [PostController::class, 'destroy'])->name('post.destroy');
});

Route::prefix('/admin/contactmessage')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/' , [ContactMessageController::class, 'index'])->name('contactmessage.index');
    Route::get('/show/{message}' ,[ContactMessageController::class, 'show'])->name('contactmessage.show');
    Route::put('/markAsunread/{message}' , [ContactMessageController::class, 'markAsunread'])->name('contactmessage.markAsunread');
    Route::delete('/destroy/{message}' , [ContactMessageController::class, 'destroy'])->name('contactmessage.destroy');
});

Route::prefix('/admin/carimage')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::post('/store/{car}' ,[CarImageController::class, 'store'])->name('carimage.store');
    Route::delete('/destroy/{image}' , [CarImageController::class, 'destroy'])->name('carimage.destroy');
    Route::put('/setthumbnail/{image}' , [CarImageController::class, 'setThumbnail'])->name('carimage.setThumbnail');
});

Route::prefix('/admin/setting')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/edit' , [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/update',  [SettingController::class, 'update'])->name('setting.update');
});

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('/admin/auth')->name('admin.')->middleware(['is_admin'])->group(function(){
    Route::get('/login' , [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login' , [LoginController::class , 'login'])->name('login.post');
    Route::get('/logout' , [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/admin/user')->middleware(['is_admin'])->name('admin.')->group(function(){
    Route::get('/' , [UserController::class, 'index'])->name('user.index');
    Route::get('/create',  [UserController::class, 'create'])->name('user.create');
    Route::post('/store',  [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{user}' , [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{user}' , [UserController::class, 'update'])->name('user.update');
    Route::delete('/destroy/{user}' , [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/admin/dashboard' , [DashboardController::class, 'index'])->name('admin.dashboard');



