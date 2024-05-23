<?php

namespace App\Providers;

use App\Models\User;
use Filament\Facades\Filament;
use App\Policies\ActivityPolicy;
use Spatie\Health\Facades\Health;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Filament\Navigation\NavigationGroup;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;

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

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Users')
                    ->icon('heroicon-o-users')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Car Make & Model')
                    ->icon('heroicon-o-lifebuoy')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Garage')
                    ->icon('heroicon-o-building-storefront')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Service Master')
                    ->icon('heroicon-o-tag')
                    ->collapsed(),
            ]);
        });
    }
}
