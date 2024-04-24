<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use App\Policies\ActivityPolicy;
use Spatie\Activitylog\Models\Activity;
class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Update `Activity::class` with the one defined in `config/activitylog.php`
        Activity::class => ActivityPolicy::class,
    ];

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
        
        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
        ]);

        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true: null;
        });
    }
}
