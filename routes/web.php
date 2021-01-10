<?php


Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class , 'index'])->name('admin');
});

Auth::routes();

