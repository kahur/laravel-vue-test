<?php

namespace Domain\Battery\Infrastructure\Providers;

use Domain\Battery\Domain\Repository\BatteryRepositoryInterface;
use Domain\Battery\Infrastructure\Persistence\Repository\BatteryRepository;

use Illuminate\Support\ServiceProvider;

class BatteryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            BatteryRepositoryInterface::class,
            BatteryRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(realpath(__DIR__.'/../Routes/routes.php'));
        $this->loadMigrationsFrom(realpath(__DIR__.'/../Persistence/Database/Migrations'));
    }
}