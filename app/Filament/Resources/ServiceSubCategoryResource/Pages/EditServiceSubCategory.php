<?php

namespace App\Filament\Resources\ServiceSubCategoryResource\Pages;

use App\Filament\Resources\ServiceSubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceSubCategory extends EditRecord
{
    protected static string $resource = ServiceSubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
