<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Collection;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    
    protected static ?string $navigationGroup = null;
    
    protected static ?int $navigationSort = 1;
    
    public static function getNavigationGroup(): string
    {
        return __('product.navigation.group');
    }
    
    public static function getModelLabel(): string
    {
        return __('product.resource.label');
    }
    
    public static function getPluralModelLabel(): string
    {
        return __('product.resource.plural_label');
    }
    
    public static function getNavigationLabel(): string
    {
        return __('product.navigation.label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('product.form.basic_info'))
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('product.form.name'))
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                                
                                Forms\Components\TextInput::make('slug')
                                    ->label(__('product.form.slug'))
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                                
                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('product.form.description'))
                                    ->columnSpan('full'),
                                
                                Forms\Components\Textarea::make('short_description')
                                    ->label(__('product.form.short_description'))
                                    ->rows(3)
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Section::make(__('product.form.pricing'))
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->label(__('product.form.price'))
                                    ->required()
                                    ->numeric()
                                    ->prefix('VNĐ'),
                                
                                Forms\Components\TextInput::make('original_price')
                                    ->label(__('product.form.original_price'))
                                    ->numeric()
                                    ->prefix('VNĐ'),
                                
                                Forms\Components\TextInput::make('stock_quantity')
                                    ->label(__('product.form.stock_quantity'))
                                    ->required()
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(3),
                            
                        Forms\Components\Section::make(__('product.form.images_section'))
                            ->schema([
                                Forms\Components\FileUpload::make('images')
                                    ->label(__('product.form.images'))
                                    ->multiple()
                                    ->image()
                                    ->imageEditor()
                                    ->directory('products')
                                    ->maxFiles(5)
                                    ->columnSpan('full'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('product.form.status_section'))
                            ->schema([
                                Forms\Components\Toggle::make('is_featured')
                                    ->label(__('product.form.is_featured'))
                                    ->helperText(__('product.form.is_featured_help'))
                                    ->default(false),
                                
                                Forms\Components\Select::make('status')
                                    ->label(__('product.form.status'))
                                    ->options([
                                        'active' => __('product.form.status_active'),
                                        'inactive' => __('product.form.status_inactive'),
                                    ])
                                    ->default('active')
                                    ->required(),
                            ]),
                        
                        Forms\Components\Section::make(__('product.form.timestamps'))
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label(__('product.form.created_at'))
                                    ->content(fn (Product $record): string => $record->created_at?->diffForHumans() ?? __('product.form.never')),
                                
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label(__('product.form.updated_at'))
                                    ->content(fn (Product $record): string => $record->updated_at?->diffForHumans() ?? __('product.form.never')),
                            ])
                            ->hidden(fn (?Product $record) => $record === null),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->label(__('product.table.image'))
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->state(fn ($record): ?string => $record->images ? $record->images[0] : null),
                
                Tables\Columns\TextColumn::make('name')
                    ->label(__('product.table.name'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('price')
                    ->label(__('product.table.price'))
                    ->money('VND')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label(__('product.table.stock'))
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match(true) {
                        $state <= 0 => 'danger',
                        $state <= 10 => 'warning',
                        default => 'success',
                    }),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label(__('product.table.featured'))
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('status')
                    ->label(__('product.table.status'))
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'active' => __('product.form.status_active'),
                        'inactive' => __('product.form.status_inactive'),
                        default => $state,
                    })
                    ->color(fn (string $state): string => match($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('product.table.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('product.table.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('product.filters.status'))
                    ->options([
                        'active' => __('product.form.status_active'),
                        'inactive' => __('product.form.status_inactive'),
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label(__('product.filters.featured'))
                    ->boolean(),
                
                Tables\Filters\Filter::make('low_stock')
                    ->label(__('product.filters.low_stock'))
                    ->query(fn (Builder $query): Builder => $query->where('stock_quantity', '<=', 10)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->configure(fn (Tables\Actions\ViewAction $action) => 
                        \App\Filament\Components\Buttons\Table\ViewButton::make()->configure($action)),
                Tables\Actions\EditAction::make()
                    ->configure(fn (Tables\Actions\EditAction $action) => 
                        \App\Filament\Components\Buttons\Table\EditButton::make()->configure($action)),
                Tables\Actions\DeleteAction::make()
                    ->configure(fn (Tables\Actions\DeleteAction $action) => 
                        \App\Filament\Components\Buttons\Table\DeleteButton::make()->configure($action)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->configure(fn (Tables\Actions\DeleteBulkAction $action) => 
                            \App\Filament\Components\Buttons\Table\DeleteBulkButton::make()->configure($action)),
                    Tables\Actions\BulkAction::make('toggleFeatured')
                        ->label(__('product.actions.toggle_featured'))
                        ->icon('heroicon-o-star')
                        ->action(function (Collection $records): void {
                            foreach ($records as $record) {
                                $record->update(['is_featured' => !$record->is_featured]);
                            }
                        }),
                    Tables\Actions\BulkAction::make('changeStatus')
                        ->label(__('product.actions.change_status'))
                        ->icon('heroicon-o-check-circle')
                        ->action(function (Collection $records, array $data): void {
                            foreach ($records as $record) {
                                $record->update(['status' => $data['status']]);
                            }
                        })
                        ->form([
                            Forms\Components\Select::make('status')
                                ->label(__('product.form.status'))
                                ->options([
                                    'active' => __('product.form.status_active'),
                                    'inactive' => __('product.form.status_inactive'),
                                ])
                                ->required(),
                        ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
