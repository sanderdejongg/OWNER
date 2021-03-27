<?php

namespace App\Providers;

use App\Service\TagsService;
use App\Service\TagsServiceInterface;
use Illuminate\Support\ServiceProvider;

class TagsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagsServiceInterface::class, TagsService::class);

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
