<?php


Route::prefix('admin')->group(function () {

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

    Route::resource('tasks' , \App\Http\Controllers\Admin\TasksController::class)->names('tasks');

   // Управление пользователями

    Route::resource('users' , \App\Http\Controllers\Admin\UsersController::class)->names('users');

    Route::prefix('detail/{user}')->as('users.')->group(function () {
        Route::get('/sites', [\App\Http\Controllers\Admin\UsersController::class , 'sites'])->name('sites');
    });


});

Auth::routes();

