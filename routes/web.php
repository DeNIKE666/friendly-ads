<?php


Route::prefix('cabinet')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Cabinet\CabinetController::class, 'index'])->name('cabinets');

    // Executor

    Route::resource('sites' , \App\Http\Controllers\Cabinet\Executor\SiteController::class)->names('executor.sites');

    // Customer

    Route::get('/performers' , [\App\Http\Controllers\Cabinet\CabinetController::class , 'performers'])->name('performers');
});

Route::prefix('admin')->middleware('auth')->group(function () {

    // Главная панели

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    // Управление категориями

    Route::resource('categories' , \App\Http\Controllers\Admin\CategoryController::class)->names('categories');

    Route::prefix('categories/{category}')->as('categories.')->group(function () {
        Route::post('/first', [\App\Http\Controllers\Admin\CategoryController::class , 'first'])->name('first');
        Route::post('/up', [\App\Http\Controllers\Admin\CategoryController::class , 'up'])->name('up');
        Route::post('/down', [\App\Http\Controllers\Admin\CategoryController::class , 'down'])->name('down');
        Route::post('/last',[\App\Http\Controllers\Admin\CategoryController::class , 'last'])->name('last');
    });

    // Управление сайтами

    Route::resource('sites' , \App\Http\Controllers\Admin\SiteController::class)->names('admin.sites');

   // Управление пользователями

    Route::resource('users' , \App\Http\Controllers\Admin\UsersController::class)->names('users');

    // Информация по юзеру

    Route::prefix('detail/{user}')->as('users.')->group(function () {
        Route::get('/sites', [\App\Http\Controllers\Admin\UsersController::class , 'sites'])->name('sites');
    });


});

Auth::routes();

