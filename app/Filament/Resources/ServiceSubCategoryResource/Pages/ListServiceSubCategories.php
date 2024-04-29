<?php

namespace App\Filament\Resources\ServiceSubCategoryResource\Pages;

use App\Filament\Resources\ServiceSubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceSubCategories extends ListRecords
{
    protected static string $resource = ServiceSubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
