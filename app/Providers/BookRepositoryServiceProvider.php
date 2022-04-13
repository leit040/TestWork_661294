<?php

namespace App\Providers;

use App\Repository\BookRepository;
use App\Repository\BookRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BookRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BookRepositoryInterface::class,fn()=>new BookRepository() );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
