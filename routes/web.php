<?php


Route::prefix('admin')->group(function () {

    // Главная панели

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    // Управление разделами

    Route::resources([
        'categories' => \App\Http\Controllers\Admin\CategoryController::class,
        'users' => \App\Http\Controllers\Admin\UsersController::class
    ]);

    Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
        Route::post('/first', [\App\Http\Controllers\Admin\CategoryController::class , 'first'])->name('first');
        Route::post('/up', [\App\Http\Controllers\Admin\CategoryController::class , 'up'])->name('up');
        Route::post('/down', [\App\Http\Controllers\Admin\CategoryController::class , 'down'])->name('down');
        Route::post('/last',[\App\Http\Controllers\Admin\CategoryController::class , 'last'])->name('last');
        Route::resource('attributes', 'AttributeController')->except('index');
    });

});

Auth::routes();

