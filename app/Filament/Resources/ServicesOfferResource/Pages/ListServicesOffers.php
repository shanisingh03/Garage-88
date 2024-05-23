<?php

namespace App\Filament\Resources\ServicesOfferResource\Pages;

use App\Filament\Resources\ServicesOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicesOffers extends ListRecords
{
    protected static string $resource = ServicesOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
