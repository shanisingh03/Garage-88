<?php

namespace App\Filament\Resources\CarModelVariantResource\Pages;

use App\Filament\Resources\CarModelVariantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarModelVariants extends ListRecords
{
    protected static string $resource = CarModelVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
