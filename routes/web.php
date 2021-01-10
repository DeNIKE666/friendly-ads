<?php


Route::prefix('admin')->group(function () {

    // Главная панели

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    // Управление разделами

    Route::resources([
        'categories' => \App\Http\Controllers\Admin\CategoryController::class,
        'users' => \App\Http\Controllers\Admin\UsersController::class
    ]);

});

Auth::routes();

