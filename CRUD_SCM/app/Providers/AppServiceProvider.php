<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //ArticleController
        $this->app->bind('App\Contracts\Dao\CrudDaoInterface', 'App\Dao\CrudDao');
        $this->app->bind('App\Contracts\Services\CrudServiceInterface', 'App\Services\CrudService');

        //CommentController
        $this->app->bind('App\Contracts\Dao\CommentDaoInterface', 'App\Dao\CommentDao');
        $this->app->bind('App\Contracts\Services\CommentServiceInterface', 'App\Services\CommentService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
