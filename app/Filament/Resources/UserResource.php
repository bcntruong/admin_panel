<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * User Resource for managing users in the admin panel
 */
class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    /**
     * Get the model label
     *
     * @return string The model label
     */
    public static function getModelLabel(): string
    {
        return __('user.resource.label');
    }
    
    /**
     * Get the plural model label
     *
     * @return string The plural model label
     */
    public static function getPluralModelLabel(): string
    {
        return __('user.resource.plural_label');
    }
    
    /**
     * Get the navigation group label
     *
     * @return string|null The navigation group label
     */
    public static function getNavigationGroup(): ?string
    {
        return __('user.navigation_group');
    }
    
    /**
     * Get the navigation label
     *
     * @return string The navigation label
     */
    public static function getNavigationLabel(): string
    {
        return __('user.navigation_label');
    }
    
    protected static ?int $navigationSort = 1;

    /**
     * Define the form schema for creating and editing users
     *
     * @param Form $form The form instance
     * @return Form The configured form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('user.form.user_information'))
                    ->description(__('user.form.user_information_description'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('common.form.name'))
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter user full name'),
                            
                        Forms\Components\TextInput::make('email')
                            ->label(__('common.form.email'))
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('user@example.com'),
                            
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label(__('user.form.email_verified_at'))
                            ->placeholder(__('user.form.not_verified'))
                            ->nullable(),
                    ])->columns(2),
                    
                Section::make(__('user.form.authentication'))
                    ->description(__('user.form.authentication_description'))
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label(__('common.form.password'))
                            ->password()
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->rule(Password::default())
                            ->autocomplete('new-password')
                            ->placeholder(fn (string $operation): string => $operation === 'edit' ? '••••••••' : __('common.form.password')),
                            
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label(__('common.form.confirm_password'))
                            ->password()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->dehydrated(false)
                            ->placeholder(__('common.form.confirm_password'))
                            ->same('password'),
                    ])->columns(2),
            ]);
    }

    /**
     * Define the table configuration for displaying users
     *
     * @param Table $table The table instance
     * @return Table The configured table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('common.table.id'))
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label(__('common.table.name'))
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('email')
                    ->label(__('common.table.email'))
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label(__('user.table.verified'))
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('common.table.created_at'))
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('common.table.updated_at'))
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('email_verified_at')
                    ->label(__('user.filters.email_verification'))
                    ->placeholder(__('user.filters.all_users'))
                    ->trueLabel(__('user.filters.verified_users'))
                    ->falseLabel(__('user.filters.unverified_users'))
                    ->queries(
                        true: fn (Builder $query) => $query->whereNotNull('email_verified_at'),
                        false: fn (Builder $query) => $query->whereNull('email_verified_at'),
                        blank: fn (Builder $query) => $query,
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Define the relations available for the User resource
     *
     * @return array Relations configuration
     */
    public static function getRelations(): array
    {
        return [
            // Relations can be added here as needed
        ];
    }

    /**
     * Define the pages available for the User resource
     *
     * @return array Pages configuration
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
