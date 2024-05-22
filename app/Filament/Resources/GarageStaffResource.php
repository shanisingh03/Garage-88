<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GarageStaffResource\Pages;
use App\Filament\Resources\GarageStaffResource\RelationManagers;
use App\Models\GarageStaff;
use App\Models\Garage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\IconColumn;


class GarageStaffResource extends Resource
{
    protected static ?string $model = GarageStaff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('garage_uuid')
                    ->label('Garage')
                    ->options(Garage::pluck('display_name', 'uuid'))
                    ->required(),
                Forms\Components\TextInput::make('staff_uuid')
                    ->label('Staff UUID')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('garage.display_name')->label('Garage'),
                TextColumn::make('staff_uuid')->label('Staff UUID'),
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
            'index' => Pages\ListGarageStaff::route('/'),
            'create' => Pages\CreateGarageStaff::route('/create'),
            'edit' => Pages\EditGarageStaff::route('/{record}/edit'),
        ];
    }
}
