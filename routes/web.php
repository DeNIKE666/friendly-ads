<?php

Route::prefix('cabinet')->middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\Cabinet\CabinetController::class, 'index'])->name('cabinets');

    // Управление аккаунтом

    Route::prefix('account')->group(function () {
        Route::post('/change-account', [\App\Http\Controllers\Cabinet\CabinetController::class, 'changeAccount'])->name('cabinet.change');
    });

    // Исполнитель

    Route::middleware(['can:executor'])->group(function () {

        Route::prefix('offers')->group(function () {
            Route::get('/' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'index'])->name('executor.offers');
            Route::post('/subscribe' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'subscribeTask'])->name('executor.subscribe.task');
            Route::post('/unsubscribe/{task}' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'unSubscribe'])->name('executor.unsubscribe.task');
            Route::get('/show/{task}' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'showTask'])->name('executor.show.task');
        });

        Route::resource('sites' , \App\Http\Controllers\Cabinet\Executor\SiteController::class)->names('executor.sites');
    });

    // Клиент

    Route::middleware(['can:customer'])->group(function () {
        Route::resource('tasks' , \App\Http\Controllers\Cabinet\Customer\TaskController::class)->names('customer.tasks');
        Route::get('/performers' , [\App\Http\Controllers\Cabinet\CabinetController::class , 'performers'])->name('customer.performers');
    });

});

Route::prefix('admin')->middleware(['auth','can:admin'])->group(function () {

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

