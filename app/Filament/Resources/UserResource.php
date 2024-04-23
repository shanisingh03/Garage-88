<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Users';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Users List';

    protected static ?string $recordTitleAttribute = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('email')->email()->required()->autocomplete(false),
                TextInput::make('password')
                ->password()
                ->revealable()
                ->autocomplete(false),
                TextInput::make('mobile_number')->tel(),
                Select::make('user_type')
                ->options([
                    '1' => 'Admin',
                    '2' => 'Customer',
                    '3' => 'Garage',
                    '4' => 'Supplier',
                ]),
                Select::make('role_id')->label('Role')
                ->options([
                    '1' => 'Super Admin',
                    '2' => 'Employee',
                    '3' => 'Customer',
                    '4' => 'Garage',
                    '5' => 'Supplier',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mobile_number')->sortable()->searchable(),
                TextColumn::make('user_type')
                ->badge()
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    '1' => 'Admin',
                    '2' => 'Customer',
                    '3' => 'Garage',
                    '4' => 'Supplier',
                })
                ->color(fn (string $state): string => match ($state) {
                    '1' => 'gray',
                    '2' => 'warning',
                    '3' => 'success',
                    '4' => 'danger',
                })->sortable()->searchable(),
                IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    '0' => 'heroicon-m-exclamation-triangle',
                    '1' => 'heroicon-o-check-badge',
                })->sortable()->searchable(),
                
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                SelectFilter::make('user_type')->options([
                    '1' => 'Admin',
                    '2' => 'Customer',
                    '3' => 'Garage',
                    '4' => 'Supplier',
                ])->label('User Type'),
                SelectFilter::make('status')->options([
                    '0' => 'Inactive',
                    '1' => 'Active',
                ])->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
