<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\CarMaker;
use App\Models\CarModel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\CarModelVariant;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarModelVariantResource\Pages;
use App\Filament\Resources\CarModelVariantResource\RelationManagers;


class CarModelVariantResource extends Resource
{
    protected static ?string $model = CarModelVariant::class;

    // protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';

    protected static ?string $navigationGroup = 'Car Make & Model';
    
    protected static ?string $navigationLabel = 'Car Model Variants';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Select::make('car_model_id')
                ->label('Car Model')
                ->options(
                    CarModel::leftJoin('car_makers', function($join) {
                        $join->on('car_models.car_maker_id', '=', 'car_makers.id');
                    })
                    ->select(
                        DB::raw("CONCAT(car_makers.name,' - ',car_models.name) AS name"), 'car_models.id AS id')
                        ->pluck('name', 'id')
                    )
                ->searchable()
                ->required(),

                TextInput::make('name')
                    ->live()
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),

                TextInput::make('slug')->required(),

                DatePicker::make('start_date')->label('Mfg. Start Year')->required(),
                DatePicker::make('end_date')->label('Mfg. End Year'),
                
                Select::make('engine_type')
                ->label('Engine Type')
                ->options(
                    CarModelVariant::groupBy('engine_type')->pluck('engine_type', 'engine_type')
                )->required(),
                
                TextInput::make('engine_liters')->required(),
                TextInput::make('engine_power')->required(),
                TextInput::make('motor_power'),
                TextInput::make('engine_codes'),
                
                Select::make('body_type')
                ->label('Body Type')
                ->options(
                    CarModelVariant::groupBy('body_type')->pluck('body_type', 'body_type')
                )->required(),
                
                Select::make('status')
                ->options([
                    0 => 'Draft',
                    1 => 'Active'
                ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('carModel.maker.name')->label('Car Maker')->searchable()->sortable(),
                TextColumn::make('carModel.name')->label('Car Model')->searchable()->sortable(),
                TextColumn::make('name')->label('Variant')->searchable()->sortable(),
                TextColumn::make('engine_liters')->searchable()->sortable(),
                TextColumn::make('engine_type')->searchable()->sortable(),
                TextColumn::make('start_date')->label('Start Year')->date('Y')->searchable()->sortable(),
                TextColumn::make('end_date')->label('End Year')->date('Y')->default(date('Y'))->searchable()->sortable(),
                TextColumn::make('motor_power')->searchable()->sortable(),
                TextColumn::make('engine_codes')->searchable()->sortable(),
                // TextColumn::make('body_type')->searchable()->sortable(),
            ])
            ->filters([
                SelectFilter::make('car_model_id')->label('Car Model')->options(CarModel::all()->pluck('name', 'id'))->searchable(),
                Filter::make('created_at')
                ->form([
                    DatePicker::make('start_date'),
                    DatePicker::make('end_date'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['start_date'],
                            fn (Builder $query, $date): Builder => $query->whereDate('start_date', '>=', $date),
                        )
                        ->when(
                            $data['end_date'],
                            fn (Builder $query, $date): Builder => $query->whereDate('end_date', '<=', $date),
                        );
                }),
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarModelVariants::route('/'),
            'create' => Pages\CreateCarModelVariant::route('/create'),
            'edit' => Pages\EditCarModelVariant::route('/{record}/edit'),
        ];
    }
}
