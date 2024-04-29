<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Filament\Resources\Resource;
use App\Models\ServiceSubCategory;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceSubCategoryResource\Pages;
use App\Filament\Resources\ServiceSubCategoryResource\RelationManagers;

class ServiceSubCategoryResource extends Resource
{
    protected static ?string $model = ServiceSubCategory::class;

    protected static ?string $navigationGroup = 'Category';
    
    protected static ?string $navigationLabel = 'Service Sub Categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('service_category_id')
                ->label('Service Category')
                ->options(ServiceCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                TextInput::make('name')
                ->live()
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->required(),
                TextInput::make('slug')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->label('Service Category')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
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
                SelectFilter::make('service_category_id')->label('Service Category')->options(ServiceCategory::all()->pluck('name', 'id'))->searchable(),
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
            'index' => Pages\ListServiceSubCategories::route('/'),
            'create' => Pages\CreateServiceSubCategory::route('/create'),
            'edit' => Pages\EditServiceSubCategory::route('/{record}/edit'),
        ];
    }
}
