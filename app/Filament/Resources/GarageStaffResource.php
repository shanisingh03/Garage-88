<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Garage;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\UserType;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GarageStaff;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GarageStaffResource\Pages;
use App\Filament\Resources\GarageStaffResource\RelationManagers;
use Spatie\Permission\Models\Role;

class GarageStaffResource extends Resource
{
    protected static ?string $model = GarageStaff::class;

    protected static ?string $navigationGroup = 'Garage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('garage_uuid')
                    ->label('Garage')
                    ->options(Garage::pluck('display_name', 'uuid'))
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Forms\Components\Select::make('staff_uuid')
                    ->label('Select Staff')
                    ->options(User::where('user_type', 3)->where('role_id', 6)->get()->pluck('full_name', 'id'))
                    ->placeholder("Select Staff")
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('first_name')->required(),
                        TextInput::make('last_name')->required(),
                        
                        TextInput::make('email')->email()->required()->autocomplete(false),

                        TextInput::make('password')
                        ->required(fn (string $operation): bool => $operation === 'create')
                        ->password()
                        ->revealable()
                        ->autocomplete(false)
                        ->hiddenOn(['edit', 'view']),

                        TextInput::make('mobile_number')
                        ->tel()
                        ->prefix('+91')
                        ->required(),
                        
                        Select::make('user_type')
                        ->label('User Type')
                        ->options(UserType::all()->pluck('name', 'id'))
                        ->required()
                        ->default(3)
                        ->disabled(),

                        Select::make('role_id')
                        ->label('Role')
                        ->options(Role::all()->pluck('name', 'id'))
                        ->default(6)
                        ->saveRelationshipsUsing(function (User $record, $state) {
                            $record->roles()->syncWithPivotValues($state, [config('permission.column_names.team_foreign_key') => getPermissionsTeamId()]);
                        })
                        ->preload()
                        ->disabled(),
                    ])
                    ->createOptionUsing(function (array $data): int {
                        $data['user_type'] = 3;
                        $data['role_id'] = 6;
                        $user = User::create($data);
                        $user->assignRole('Garage Supervisior');
                        return $user->id;
                    }),

                Forms\Components\Toggle::make('status')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('garage.display_name')->label('Garage'),
                TextColumn::make('user.full_name')->label('Staff'),
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
