<?php

namespace App\Filament\Resources\CarModelVariantResource\Pages;

use App\Filament\Resources\CarModelVariantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarModelVariant extends EditRecord
{
    protected static string $resource = CarModelVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
