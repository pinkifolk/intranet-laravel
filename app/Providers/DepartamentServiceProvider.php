<?php

namespace App\Providers;

use App\Models\Department;
use Illuminate\Support\ServiceProvider;

class DepartamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public $department;
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $dep = Department::where('id', '>', 1)->whereNotIn('id',[14,15])->get();
        $this->department = $dep;
        view()->composer('layout.layout', function ($view) {
            $view->with(['dep' => $this->department]);
        });
    }
}
