<?php

namespace App\Providers;

use App\Repositories\ActivityLog\ActivityLogInterface;
use App\Repositories\ActivityLog\ActivityLogRepository;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\NotificationType\NotificationTypeInterface;
use App\Repositories\NotificationType\NotificationTypeRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $bindings = [
            CategoryInterface::class => CategoryRepository::class,
            NotificationTypeInterface::class => NotificationTypeRepository::class,
            ActivityLogInterface::class => ActivityLogRepository::class,
        ];

        foreach ($bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
