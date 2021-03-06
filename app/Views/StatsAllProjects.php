<?php


namespace App\Views;

use App\Models\Site;
use App\Models\Task;
use App\Models\User;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class StatsAllProjects
{
    /**
     * @param View $view
     */

    public function compose(View $view)
    {
        $view->with('customers', User::customerAccounts()->count());
        $view->with('executors', User::executorAccounts()->count());
        $view->with('activeTasks', Task::statusActive()->count());
        $view->with('sumTasks', Task::statusActive()->sum('sum_pay'));
        $view->with('sumTasksAvg', Task::statusActive()->avg('sum_pay'));
        $view->with('sitesWorks', Site::IsActive()->count());
        $view->with('categories' , (new CategoryRepository())->getAll());
    }
}