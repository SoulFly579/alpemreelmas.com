<?php

namespace App\Providers;

use App\Http\Repositories\Classes\ArticleRepository;
use App\Http\Repositories\Classes\CategoryRepository;
use App\Http\Repositories\Interfaces\ArticleInterfaces;
use App\Http\Repositories\Interfaces\CategoryInterfaces;
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
        $this->app->bind(CategoryInterfaces::class,CategoryRepository::class);
        $this->app->bind(ArticleInterfaces::class,ArticleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
