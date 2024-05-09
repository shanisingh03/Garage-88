<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::all()->count()),
            Stat::make('Garages', User::where('user_type', 3)->count()),
            Stat::make('Customers', User::where('user_type', 2)->count()),
        ];
    }
}
