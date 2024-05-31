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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use App\Filament\Resources\GarageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
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

            Section::make('Business Information')
            ->description("Business Name, Email, Mobile,  GST Charges")
            ->columns(2)
            ->collapsible()
            ->schema([
                Select::make('uuid')
                ->label('Select Garage User')
                ->relationship(name: 'user', titleAttribute: 'business_name')
                ->searchable()
                ->preload()
                ->required()
                ->reactive() // Make it reactive to handle change events
                ->afterStateUpdated(function (callable $set, $state) {
                    if ($state) {
                        $user = User::where('uuid', $state)->first();
                        if ($user) {
                            $set('display_name', $user->business_name);
                            $set('registered_name', $user->business_name);
                            $set('contact_number', $user->mobile_number);
                            $set('contact_email', $user->email);
                        }
                    }
                }),
                TextInput::make('display_name')->required(),
                TextInput::make('registered_name')->required(),
                TextInput::make('contact_number')->required(),
                TextInput::make('contact_email')->required(),
                TextInput::make('cgst')->numeric()->nullable()->suffix('%'),
                TextInput::make('sgst')->numeric()->nullable()->suffix('%'),
            ]),

            Section::make('Address Information')
            ->description("Address, City, State etc.")
            ->columns(2)
            ->collapsible()
            ->schema([
                Geocomplete::make('location')
                ->isLocation()
                ->reverseGeocode([
                    'city'   => '%L',
                    'pin_code'    => '%z',
                    'state'  => '%A1',
                    'country'  => '%C',
                    'address_line_2' => '%n',
                    'address_line_1' => '%S'
                ])
                ->countries(['IN']) // restrict autocomplete results to these countries
                ->debug() // output the results of reverse geocoding in the browser console, useful for figuring out symbol formats
                ->updateLatLng()
                ->maxLength(2048)
                ->placeholder('Start typing an address ...')
                ->geolocate() // add a suffix button which requests and reverse geocodes the device location
                ->geolocateIcon('heroicon-o-map')
                ->afterStateHydrated(function (callable $set, $state, $get) {
                    $location = $get('location');
                    if ($location) {
                        $set('location', [
                            'lat' => $location['lat'],
                            'lng' => $location['lng'],
                            'formatted_address' => $location['formatted_address'] ?? '',
                        ]);
                    }
                }),

                TextInput::make('address_line_1')->nullable(),
                TextInput::make('address_line_2')->nullable(),
                TextInput::make('city')->required(),
                TextInput::make('state')->required(),
                TextInput::make('country')->required(),
                TextInput::make('pin_code')->required(),
                TextInput::make('latitude')->numeric()->readOnly(),
                TextInput::make('longitude')->numeric()->readOnly(),
            ]),
                // Select::make('address_line_1')
                // ->label('Address Line 1')
                // ->searchable()
                // ->reactive()
                // ->getSearchResultsUsing(function ($query) {
                //     return app('geocoder')->geocode($query)->get()
                //         ->mapWithKeys(fn ($result) => [
                //             $result->getFormattedAddress() => $result->getFormattedAddress()
                //         ])
                //         ->toArray();
                // })
                // ->afterStateUpdated(function ($state, $set) {
                //     /** @var \Geocoder\Provider\GoogleMapsPlaces\Model\GooglePlace $result */
                //     $result = '';
                //     if ($state) {
                //         $result = app('geocoder')->geocode($state)->get()->first();
                //         $coords = $result->getCoordinates();

                //         $set('address_line_2', $result->getStreetNumber());
                //         $set('city', $result->getLocality());
                //         $set('pin_code', $result->getPostalCode());
                //         $set('latitude', $coords->getLatitude());
                //         $set('longitude', $coords->getLongitude());
                //     }
                // }),
                
                Section::make('Service Days')
                ->description("Each Day Information")
                ->collapsible()
                ->schema([
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
                    ->collapsible()
                    ->minItems(1)
                    ->addActionLabel('Add More')
                    ->label('Service Days and Time'),
                ]),
                
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
