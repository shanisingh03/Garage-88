<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Garage;
use Filament\Forms\Form;
use App\Models\CarService;
use Filament\Tables\Table;
use App\Models\ServicesOffer;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Forms\Components\BelongsToSelect;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServicesOfferResource\Pages;
use App\Filament\Resources\ServicesOfferResource\RelationManagers;

class ServicesOfferResource extends Resource
{
    protected static ?string $model = ServicesOffer::class;

    protected static ?string $navigationGroup = 'Garage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([       
                Select::make('garage_uuid')
                    ->label('Garage')
                    ->placeholder('Select The Garage')
                    ->options(Garage::pluck('display_name', 'uuid'))
                    ->searchable()
                    ->preload()
                    ->required(),        
                Select::make('service_id')
                    ->label('Service')
                    ->placeholder('Select The Service')
                    ->options(CarService::pluck('name', 'id'))
                    ->required(),
                TextInput::make('starting_price')
                    ->type('number')
                    ->prefix('₹')
                    ->required(),
                TextInput::make('estimated_time')
                    ->type('number')
                    ->suffix('Hrs.')
                    ->required(),
                
                Toggle::make('status')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('garage.display_name')->sortable()->searchable(),
            TextColumn::make('carService.name')->sortable()->searchable(),
            TextColumn::make('starting_price')->prefix('₹ ')->sortable()->searchable(),
            TextColumn::make('estimated_time')->suffix(' Hrs.')->sortable()->searchable(),
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
            SelectFilter::make('garage')->relationship('garage', 'display_name')->label('Garage')->searchable()->preload(),
            SelectFilter::make('carService')->relationship('carService', 'name')->label('Service')->searchable()->preload(),
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
