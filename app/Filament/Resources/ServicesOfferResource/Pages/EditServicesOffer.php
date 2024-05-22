<?php

namespace App\Filament\Resources\ServicesOfferResource\Pages;

use App\Filament\Resources\ServicesOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicesOffer extends EditRecord
{
    protected static string $resource = ServicesOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
