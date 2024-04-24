<?php
 
namespace App\Filament\Pages;
 
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults as BaseHealthCheckResults;
 
class HealthCheckResults extends BaseHealthCheckResults
{
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    
    protected static ?int $navigationSort = 15;
 
    public static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }
}