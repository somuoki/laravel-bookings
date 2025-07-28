<?php

declare(strict_types=1);

namespace Somuoki\Bookings\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class RollbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'somuoki:rollback:bookings {--f|force : Force the operation to run when in production.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback Somuoki Bookings Tables.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->alert($this->description);

        $path = Config::get('somuoki.bookings.autoload_migrations') ?
            'vendor/somuoki/laravel-bookings/database/migrations' :
            'database/migrations/somuoki/laravel-bookings';

        if (file_exists($path)) {
            $this->call('migrate:reset', [
                '--path' => $path,
                '--force' => $this->option('force'),
            ]);
        } else {
            $this->warn('No migrations found! Consider publish them first: <fg=green>php artisan somuoki:publish:bookings</>');
        }

        $this->line('');
    }
}
