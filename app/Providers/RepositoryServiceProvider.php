<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\ActivityPCCRepository','App\Repositories\ActivityPCCRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\ActivityRepository','App\Repositories\ActivityRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\AllocationRepository','App\Repositories\AllocationRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\AmbientRepository','App\Repositories\AmbientRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\CoreRepository','App\Repositories\CoreRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\ModalityRepository','App\Repositories\ModalityRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\PPCRepository','App\Repositories\PPCRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\RDCRepository','App\Repositories\RDCRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\TaskRepository','App\Repositories\TaskRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\TypeActivityRepository','App\Repositories\TypeActivityRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\TypeUserRepository','App\Repositories\TypeUserRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\UserRepository','App\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\UserTypeUserRepository','App\Repositories\UserTypeUserRepositoryEloquent'
        );
    }
}
