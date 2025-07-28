<?php

declare(strict_types=1);

namespace Somuoki\Bookings\Providers;

use Illuminate\Support\ServiceProvider;
use Somuoki\Support\Traits\ConsoleTools;
use Somuoki\Bookings\Console\Commands\MigrateCommand;
use Somuoki\Bookings\Console\Commands\PublishCommand;
use Somuoki\Bookings\Console\Commands\RollbackCommand;

class BookingsServiceProvider extends ServiceProvider
{
    use ConsoleTools;

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        MigrateCommand::class => 'command.somuoki.bookings.migrate',
        PublishCommand::class => 'command.somuoki.bookings.publish',
        RollbackCommand::class => 'command.somuoki.bookings.rollback',
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/config.php'), 'somuoki.bookings');

        // Register console commands
        $this->registerCommands($this->commands);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publish Resources
        $this->publishesConfig('somuoki/laravel-bookings');
        $this->publishesMigrations('somuoki/laravel-bookings');
        ! $this->autoloadMigrations('somuoki/laravel-bookings') || $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
