<?php

Route::get('/test', function () {
   \App\Models\SubscribeTask::find(5)->delete();
});

Route::prefix('/')->group(function () {

    Route::get('/' , [\App\Http\Controllers\Frontend\FrontendController::class , 'index'])->name('frontend');

    Route::prefix('projects')->group(function () {
        Route::get('/' , [\App\Http\Controllers\Frontend\ProjectController::class , 'projects'])->name('frontend.projects');
        Route::post('/find-category' , [\App\Http\Controllers\Frontend\ProjectController::class , 'projectsSetCategory'])->name('frontend.setFindCategory');
        Route::post('/reset' , [\App\Http\Controllers\Frontend\ProjectController::class , 'resetSetting'])->name('frontend.resetSetting');
        Route::get('/{task}' , [\App\Http\Controllers\Frontend\TaskController::class , 'showTask'])->name('frontend.task.detail');
    });

    Route::get('/pages/{page}' , [\App\Http\Controllers\Frontend\FrontendController::class , 'page'])->name('frontend.page');
});

Route::prefix('cabinet')->middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\Cabinet\CabinetController::class, 'index'])->name('cabinets');
    Route::get('/profile/{user}', [\App\Http\Controllers\Cabinet\CabinetController::class, 'showProfile'])->name('cabinet.show.profile');

    // Управление аккаунтом

    Route::prefix('account')->group(function () {
        Route::get('/profile' , [\App\Http\Controllers\Cabinet\ProfileController::class , 'profile'])->name('profile');
        Route::put('/profile-update' , [\App\Http\Controllers\Cabinet\ProfileController::class , 'profileUpdate'])->name('profile.update');
        Route::post('/change-account', [\App\Http\Controllers\Cabinet\ProfileController::class, 'switchAccount'])->name('cabinet.change');
        Route::get('/logout', [\App\Http\Controllers\Cabinet\ProfileController::class, 'logout'])->name('cabinet.logout');
    });

    // Исполнитель

    Route::middleware(['can:executor'])->group(function () {

        Route::prefix('offers')->group(function () {
            Route::get('/' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'index'])->name('executor.offers');
            Route::post('/subscribe/{task}' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'subscribeTask'])->name('executor.subscribe.task');
            Route::post('/unsubscribe/{subscribe}' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'unSubscribe'])->name('executor.unsubscribe.task');
            Route::get('/show/{task}' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'showTask'])->name('executor.show.task');
            Route::get('/tasks' , [\App\Http\Controllers\Cabinet\Executor\OfferController::class , 'subsTasks'])->name('executor.subs.task');
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

    // Управление тасками

    Route::resource('tasks' , \App\Http\Controllers\Admin\TasksController::class)->names('admin.tasks');

   // Управление пользователями

    Route::resource('users' , \App\Http\Controllers\Admin\UsersController::class)->names('admin.users');

    // Управление пользователями

    Route::resource('pages' , \App\Http\Controllers\Admin\PageController::class)->names('admin.pages');


    // Информация по юзеру

    Route::prefix('detail/{user}')->as('users.')->group(function () {
        Route::get('/sites', [\App\Http\Controllers\Admin\UsersController::class , 'sites'])->name('sites');
    });


});

Auth::routes();

