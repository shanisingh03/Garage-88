<?php

namespace App\Filament\Resources\GarageStaffResource\Pages;

use App\Filament\Resources\GarageStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGarageStaff extends EditRecord
{
    protected static string $resource = GarageStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
