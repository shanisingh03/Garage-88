<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Garage;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GarageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GarageResource\RelationManagers;
use Webbingbrasil\FilamentCopyActions\Forms\Actions\CopyAction;

class GarageResource extends Resource
{
    protected static ?string $model = Garage::class;

    protected static ?string $navigationGroup = 'Garage';
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Select::make('uuid')
                ->label('Select Garage User')
                ->relationship(name: 'user', titleAttribute: 'business_name')
                ->required(),
                Forms\Components\TextInput::make('display_name')->required(),
                Forms\Components\TextInput::make('registered_name')->required(),
                Forms\Components\TextInput::make('contact_number')->required(),
                Forms\Components\TextInput::make('contact_email')->required(),
                Forms\Components\TextInput::make('address_line_1')->required(),
                Forms\Components\TextInput::make('address_line_2')->nullable(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\TextInput::make('state')->required(),
                Forms\Components\TextInput::make('country')->required(),
                Forms\Components\TextInput::make('pin_code')->required(),
                Forms\Components\TextInput::make('latitude')->numeric()->nullable(),
                Forms\Components\TextInput::make('longitude')->numeric()->nullable(),
                Forms\Components\TextInput::make('service_days_time')->nullable(),
                Forms\Components\TextInput::make('cgst')->numeric()->nullable(),
                Forms\Components\TextInput::make('sgst')->numeric()->nullable(),
                Forms\Components\Toggle::make('status')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('display_name')->sortable()->searchable(),
                TextColumn::make('registered_name')->sortable()->searchable(),
                TextColumn::make('contact_number')->sortable()->searchable(),
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
            'index' => Pages\ListGarages::route('/'),
            'create' => Pages\CreateGarage::route('/create'),
            'edit' => Pages\EditGarage::route('/{record}/edit'),
        ];
    }
}
