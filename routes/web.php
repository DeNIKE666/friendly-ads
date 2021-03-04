<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Cabinet\CabinetController;
use App\Http\Controllers\Cabinet\Customer\TaskController;
use App\Http\Controllers\Cabinet\Executor\OfferController;
use App\Http\Controllers\Cabinet\PaymentController;
use App\Http\Controllers\Cabinet\ProfileController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProjectController;

Route::get('/test', function () {
    return route('customer.tasks.store');
});

Route::prefix('/')->group(function () {

    Route::get('/' , [FrontendController::class , 'index'])->name('frontend');

    Route::prefix('projects')->group(function () {
        Route::get('/' , [ProjectController::class , 'projects'])->name('frontend.projects');
        Route::post('/find-category' , [ProjectController::class , 'projectsSetCategory'])->name('frontend.setFindCategory');
        Route::post('/reset' , [ProjectController::class , 'resetSetting'])->name('frontend.resetSetting');
        Route::get('/{task}' , [\App\Http\Controllers\Frontend\TaskController::class , 'showTask'])->name('frontend.task.detail');
    });

    Route::get('/pages/{page}' , [FrontendController::class , 'page'])->name('frontend.page');
});

Route::prefix('cabinet')->middleware('auth')->group(function () {

    Route::get('/', [CabinetController::class, 'index'])->name('cabinets');
    Route::get('/profile/{user}', [CabinetController::class, 'showProfile'])->name('cabinet.show.profile');

    // Управление аккаунтом

    Route::prefix('account')->group(function () {
        Route::get('/profile' , [ProfileController::class , 'profile'])->name('profile');
        Route::put('/profile-update' , [ProfileController::class , 'profileUpdate'])->name('profile.update');
        Route::post('/change-account', [ProfileController::class, 'switchAccount'])->name('cabinet.change');
        Route::get('/logout', [ProfileController::class, 'logout'])->name('cabinet.logout');
    });

    // Исполнитель

    Route::middleware(['can:executor'])->group(function () {

        Route::prefix('offers')->group(function () {
            Route::get('/' , [OfferController::class , 'index'])->name('executor.offers');
            Route::post('/subscribe/{task}' , [OfferController::class , 'subscribeTask'])->name('executor.subscribe.task');
            Route::post('/unsubscribe/{subscribe}' , [OfferController::class , 'unSubscribe'])->name('executor.unsubscribe.task');
            Route::get('/show/{task}' , [OfferController::class , 'showTask'])->name('executor.show.task');
            Route::get('/tasks' , [OfferController::class , 'subsTasks'])->name('executor.subs.task');
        });

        Route::resource('sites' , \App\Http\Controllers\Cabinet\Executor\SiteController::class)->names('executor.sites');
    });

    // Клиент

    Route::middleware(['can:customer'])->group(function () {

        Route::resource('tasks' , TaskController::class)->names('customer.tasks');

        Route::prefix('manage-task')->group(function () {
            Route::post('/reject/{subscribeTask}', [TaskController::class , 'reject'])->name('reject');
            Route::post('/accept/{subscribeTask}', [TaskController::class , 'accept'])->name('accept');
            Route::post('/work/{task}', [TaskController::class , 'sendWorkTask'])->name('work');
        });

        Route::prefix('/finance')->group(function () {

            Route::prefix('balance')->group(function () {
                Route::get('/', [PaymentController::class , 'formAddBalance'])->name('balance');
                Route::post('/add', [PaymentController::class , 'addBalance'])->name('add-balance');
                Route::post('/pay/{task}', [PaymentController::class , 'payOrder'])->name('pay-order');
            });

            // История пополнений

            Route::get('/history' , [PaymentController::class , 'history'])->name('history');

            // Оплата заказа

            Route::post('/create-order-task/{task}', [PaymentController::class , 'payBalanceFromCreateTask'])->name('pay.create.order.task');
        });

        Route::get('/performers' , [CabinetController::class , 'performers'])->name('customer.performers');
    });

});

Route::prefix('admin')->middleware(['auth','can:admin'])->group(function () {

    // Главная панели

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // Управление категориями

    Route::resource('categories' , CategoryController::class)->names('categories');

    Route::prefix('categories/{category}')->as('categories.')->group(function () {
        Route::post('/first', [CategoryController::class , 'first'])->name('first');
        Route::post('/up', [CategoryController::class , 'up'])->name('up');
        Route::post('/down', [CategoryController::class , 'down'])->name('down');
        Route::post('/last',[CategoryController::class , 'last'])->name('last');
    });

    // Управление сайтами

    Route::resource('sites' , SiteController::class)->names('admin.sites');

    // Управление тасками

    Route::resource('tasks' , TasksController::class)->names('admin.tasks');

   // Управление пользователями

    Route::resource('users' , UsersController::class)->names('admin.users');

    // Управление пользователями

    Route::resource('pages' , PageController::class)->names('admin.pages');


    // Информация по юзеру

    Route::prefix('detail/{user}')->as('users.')->group(function () {
        Route::get('/sites', [UsersController::class , 'sites'])->name('sites');
    });


});

Auth::routes();

