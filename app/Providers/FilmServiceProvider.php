<?php

namespace App\Providers;

use App\Services\ActorsService;
use App\Services\FilmService;
use App\Services\FilmServiceImpl;
use Illuminate\Support\ServiceProvider;


class FilmServiceProvider extends ServiceProvider
{

    private $actorsService;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FilmService::class,function ($app){
            return new FilmServiceImpl($this->actorsService);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ActorsService $actorsService)
    {
        $this->actorsService = $actorsService;
    }
}
