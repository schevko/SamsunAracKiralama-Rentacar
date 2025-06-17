<?php

use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/slider')->name('admin.')->group(function(){
    Route::get('/',  [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store' , [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{slider}' , [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/update/{slider}' ,[SliderController::class, 'update'])->name('slider.update');
    Route::delete('/destroy/{slider}'  , [SliderController::class, 'destroy'])->name('slider.destroy');
});



