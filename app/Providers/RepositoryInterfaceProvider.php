<?php

namespace App\Providers;

use App\Http\Controllers\Todo\Contract\TodoInterface;
use App\Http\Controllers\Todo\Repository\TodoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TodoInterface::class,
            TodoRepository::class
        );
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
