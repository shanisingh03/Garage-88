<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\CarService;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Filament\Resources\Resource;
use App\Models\ServiceSubCategory;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarServiceResource\Pages;
use App\Filament\Resources\CarServiceResource\RelationManagers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;

class CarServiceResource extends Resource
{
    protected static ?string $model = CarService::class;
    
    protected static ?string $navigationLabel = 'Car Services';

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('service_category_id')
                ->label('Category')
                ->options(ServiceCategory::all()->pluck('name', 'id'))
                ->required()
                ->live()
                ->afterStateUpdated(function (Set $set, $state) {
                    $set('service_sub_category_id', '');
                }),

                Select::make('service_sub_category_id')
                ->label('Sub Category')
                ->options(function (Get $get) {
                    return ServiceSubCategory::where('service_category_id', $get('service_category_id'))->pluck('name', 'id');
                })
                ->disabled(fn(Get $get) : bool => !filled($get('service_category_id')))
                ->placeholder("Select Sub Category")
                ->required(),


                TextInput::make('name')
                ->live()
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->required(),

                TextInput::make('slug')->required(),
                
                TextInput::make('description')->required()->columnSpanFull(),
                TextInput::make('interval')->required(),
                TextInput::make('time_taken')->required(),
                TextInput::make('warranty')->required(),
                TextInput::make('match')->required(),
                TagsInput::make('inclusion')->columnSpanFull()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->label('Category')->searchable()->sortable(),
                TextColumn::make('subCategory.name')->label('Sub Category')->searchable()->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
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
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),                   
                ]),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success') 
                    ->action(function (Model $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf', ['record' => $record])
                            )->stream();
                        }, $record->number . '.pdf', ['Content-Type' => 'application/pdf']);
                }),
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
            'index' => Pages\ListCarServices::route('/'),
            'create' => Pages\CreateCarService::route('/create'),
            'edit' => Pages\EditCarService::route('/{record}/edit'),
        ];
    }
}
