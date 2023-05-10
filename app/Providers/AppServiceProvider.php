<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
    }
}
