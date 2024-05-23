<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Containers\Members\Repositories\MemberRepository;
use App\Containers\Members\Repositories\MemberRepositoryInterface; // Add this line
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            MemberRepositoryInterface::class,
            MemberRepository::class
        );
          
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //kvuli migracim
        Schema::defaultStringLength(191);
    }
    
}
