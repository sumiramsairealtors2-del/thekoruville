<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use RuntimeException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->enforceReadOnlyMode();
    }

    /**
     * When APP_READ_ONLY=true, refuse any statement that could modify the
     * database. This is what makes it safe to point a local copy of the app
     * at the live database: reads work, writes fail loudly before touching it.
     */
    private function enforceReadOnlyMode(): void
    {
        if (! config('app.read_only')) {
            return;
        }

        DB::connection()->beforeExecuting(function (string $query): void {
            if (preg_match(
                '/^\s*(insert|update|delete|replace|alter|drop|truncate|create|rename|grant|revoke|lock|unlock)\b/i',
                $query,
            )) {
                throw new RuntimeException(
                    'Read-only mode (APP_READ_ONLY=true) blocked a write query: '
                    . $query,
                );
            }
        });
    }
}
