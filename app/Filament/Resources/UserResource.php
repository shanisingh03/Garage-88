<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\UserType;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Webbingbrasil\FilamentCopyActions\Forms\Actions\CopyAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Users';

    protected static ?string $navigationLabel = 'Users List';

    protected static ?string $recordTitleAttribute = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                ->description("Name, Email, Mobile, Business Name, GST, User Type & Role.")
                ->columns(2)
                ->collapsible()
                ->schema([
                    TextInput::make('uuid')
                    ->label('User UUID')
                    ->suffixAction(CopyAction::make())
                    ->readOnly()
                    ->hiddenOn('create'),

                    TextInput::make('first_name')->required(),
                    TextInput::make('last_name')->required(),
                    
                    TextInput::make('business_name')->hidden(function (callable $get) {
                        if (($get('user_type') == 3) || ($get('user_type') == 4)) {
                            return false;
                        } else {
                            return true;
                        }
                    }),

                    TextInput::make('email')->email()->required()->autocomplete(false),

                    TextInput::make('password')
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->password()
                    ->revealable()
                    ->autocomplete(false)
                    ->hiddenOn(['edit', 'view']),

                    TextInput::make('mobile_number')->tel()
                    ->required(),

                    TextInput::make('gst_number'),
                    
                    Select::make('user_type')
                    ->label('User Type')
                    ->options(UserType::all()->pluck('name', 'id'))
                    ->required(),

                    Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->required()
                ]),

                // Section For Garage Information
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                ->label('Name')
                ->formatStateUsing(function ($state, User $user) {
                    return $user->first_name . ' ' . $user->last_name;
                })->sortable()->searchable(),
                TextColumn::make('business_name')->sortable()->searchable()->default('N/A'),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('mobile_number')->sortable()->searchable(),
                TextColumn::make('userType.name')
                ->label('User Type')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Admin' => 'gray',
                    'Customer' => 'warning',
                    'Garage' => 'success',
                    'Supplier' => 'danger',
                })
                ->sortable()->searchable(),
                TextColumn::make('roles.name')
                ->label('Role')
                ->badge()
                ->searchable()
                ->sortable(),
                IconColumn::make('status')
                ->boolean()
                ->trueIcon('heroicon-o-check-badge')
                ->falseIcon('heroicon-o-x-mark')
                
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                SelectFilter::make('userType')->relationship('userType', 'name')->label('User Type'),
                SelectFilter::make('roles')->relationship('roles', 'name')->label('Role'),
                SelectFilter::make('status')->options([
                    '0' => 'Inactive',
                    '1' => 'Active',
                ])->label('Status'),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('updateStatus')
                    ->icon('heroicon-m-exclamation-circle')
                    ->form([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                0 => "Inactive",
                                1 => "Active",

                            ])
                            ->required(),
                    ])
                    ->action(function (array $data, User $record): void {
                        $record->status = $data['status'];
                        $record->save();
                    }),
                    Tables\Actions\EditAction::make()
                    ->visible(function (User $user) {
                        if (auth()->user()->user_type == 1) {
                            return true;
                        }else {
                            if ($user->user_type == 1) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }),
                    Tables\Actions\DeleteAction::make()
                    ->visible(function (User $user) {
                        if (auth()->user()->user_type == 1) {
                            return true;
                        }else {
                            if ($user->user_type == 1) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc')
            ->searchPlaceholder('Search (Name, Email)');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
