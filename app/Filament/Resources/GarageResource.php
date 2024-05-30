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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
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
                    ->required()
                    ->reactive() // Make it reactive to handle change events
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $user = User::where('uuid', $state)->first();
                            if ($user) {
                                $set('display_name', $user->business_name);
                                $set('registered_name', $user->first_name);
                                $set('contact_number', $user->mobile_number);
                                $set('contact_email', $user->email);
                            }
                        }
                    }),
                TextInput::make('display_name')->required(),
                TextInput::make('registered_name')->required(),
                TextInput::make('contact_number')->required(),
                TextInput::make('contact_email')->required(),
                Select::make('address_line_1')
                    ->label('Address Line 1')
                    ->searchable()
                    ->reactive()
                    ->dehydrated(false)
                    ->getSearchResultsUsing(function ($query) {
                        return app('geocoder')->geocode($query)->get()
                            ->mapWithKeys(fn ($result) => [
                                $result->getFormattedAddress() => $result->getFormattedAddress()
                            ])
                            ->toArray();
                    })
                    ->afterStateUpdated(function ($state, $set) {
                        /** @var \Geocoder\Provider\GoogleMapsPlaces\Model\GooglePlace $result */
                        $result = '';
                        if ($state) {
                            $result = app('geocoder')->geocode($state)->get()->first();
                            $coords = $result->getCoordinates();
                            $set('pin_code', $result->getPostalCode());
                            $set('latitude', $coords->getLatitude());
                            $set('longitude', $coords->getLongitude());
                        }
                    }),
                TextInput::make('address_line_2')->nullable(),
                TextInput::make('city')->required(),
                TextInput::make('state')->required(),
                TextInput::make('country')->required(),
                TextInput::make('pin_code')->required(),
                TextInput::make('latitude')->numeric()->nullable(),
                TextInput::make('longitude')->numeric()->nullable(),
                Repeater::make('service_days_time')
                    ->schema([
                        Select::make('day')
                            ->options([
                                'monday' => 'Monday',
                                'tuesday' => 'Tuesday',
                                'wednesday' => 'Wednesday',
                                'thursday' => 'Thursday',
                                'friday' => 'Friday',
                                'saturday' => 'Saturday',
                                'sunday' => 'Sunday',
                            ])
                            ->required()
                            ->label('Day of the Week'),
                        TextInput::make('from')
                            ->label('From')
                            ->type('time')
                            ->required(),
                        TextInput::make('to')
                            ->label('To')
                            ->type('time')
                            ->required(),
                    ])
                    ->minItems(1)
                    ->label('Service Days and Time'),
                TextInput::make('cgst')->numeric()->nullable(),
                TextInput::make('sgst')->numeric()->nullable(),
                Toggle::make('status')->default(true),
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
