<?php

namespace App\Providers;

use App\Interfaces\MoviesRepositoryInterface;
use App\Repositories\MoviesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(MoviesRepositoryInterface::class, MoviesRepository::class);
 
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
