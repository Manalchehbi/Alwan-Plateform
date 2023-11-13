<?php

namespace App\Providers;

use App\Repositories\ExerciseRepository;
use App\Repositories\ExerciseRepositoryInterface;
use App\Repositories\ScoreRepository;
use App\Repositories\ScoreRepositoryInterface;
use App\Repositories\StoryReadRepository;
use App\Repositories\StoryReadRepositoryInterface;
use App\Repositories\StoryRepository;
use App\Repositories\StoryRepositoryInterface;
use App\Services\ExerciseService;
use App\Services\ExerciseServiceInterface;
use App\Services\FileUploadService;
use App\Services\FileUploadServiceInterface;
use App\Services\StoryService;
use App\Services\StoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(StoryRepositoryInterface::class,StoryRepository::class);
        $this->app->bind(StoryServiceInterface::class,StoryService::class);
        $this->app->bind(StoryReadRepositoryInterface::class,StoryReadRepository::class);
        $this->app->bind(ExerciseRepositoryInterface::class,ExerciseRepository::class);
        $this->app->bind(ScoreRepositoryInterface::class,ScoreRepository::class);
        $this->app->bind(ExerciseServiceInterface::class,ExerciseService::class);
        $this->app->bind(FileUploadServiceInterface::class,FileUploadService::class);
    }
}
