<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use App\Repositories\CategoryRepository;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            // helper
            $this->app->register(IdeHelperServiceProvider::class);
            // telescope
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.*', function ($view) {
            $view->with('customers', User::customerAccounts()->count());
            $view->with('executors', User::executorAccounts()->count());
            $view->with('activeTasks', Task::statusActive()->count());
            $view->with('sumTasks', Task::statusActive()->sum('sum_pay'));
            $view->with('categories' , (new CategoryRepository())->getAll());
        });

        Paginator::useBootstrap();
    }
}
