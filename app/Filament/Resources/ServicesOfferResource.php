<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesOfferResource\Pages;
use App\Filament\Resources\ServicesOfferResource\RelationManagers;
use App\Models\ServicesOffer;
use App\Models\CarService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Forms\Components\BelongsToSelect;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\IconColumn;

class ServicesOfferResource extends Resource
{
    protected static ?string $model = ServicesOffer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $carServiceIds = CarService::pluck('id')->toArray();
        return $form
            ->schema([               
                Forms\Components\Select::make('service_id')
                    ->label('Service ID')
                    ->options(array_combine($carServiceIds, $carServiceIds)) // Use the IDs as both option values and labels
                    ->required(),
                TextInput::make('starting_price')
                    ->type('number')
                    ->required(),
                TextInput::make('estimated_time')
                    ->type('number')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('carService')->sortable()->searchable(),
            TextColumn::make('starting_price')->sortable()->searchable(),
            TextColumn::make('estimated_time')->sortable()->searchable(),
            IconColumn::make('status')
                ->boolean()
                ->trueIcon('heroicon-o-check-badge')
                ->falseIcon('heroicon-o-x-mark')
        ])
        ->filters([
            SelectFilter::make('status')->options([
                '0' => 'Inactive',
                '1' => 'Active',
            ])->label('Status'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicesOffers::route('/'),
            'create' => Pages\CreateServicesOffer::route('/create'),
            'edit' => Pages\EditServicesOffer::route('/{record}/edit'),
        ];
    }
}
