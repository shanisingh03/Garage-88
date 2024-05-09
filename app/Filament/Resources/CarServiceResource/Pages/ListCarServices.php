<?php

namespace App\Filament\Resources\CarServiceResource\Pages;

use Filament\Actions;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\CarServiceResource;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use Illuminate\Support\Facades\Blade;

class ListCarServices extends ListRecords
{
    protected static string $resource = CarServiceResource::class;

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
