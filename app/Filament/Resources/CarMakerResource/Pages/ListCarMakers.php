<?php

namespace App\Filament\Resources\CarMakerResource\Pages;

use App\Filament\Resources\CarMakerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Columns\Column;

class ListCarMakers extends ListRecords
{
    protected static string $resource = CarMakerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
            ->label('Export CSV') 
            ->exports([
                ExcelExport::make()
                    ->fromTable()
                    ->withFilename(fn ($resource) => $resource::getModelLabel() . '-' . date('Y-m-d'))
                    ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)                    
            ])
        ];
    }
}
