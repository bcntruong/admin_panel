<?php

namespace App\Filament\Components\Buttons\Examples;

use App\Filament\Components\Buttons\AddNewButton;
use Filament\Actions\CreateAction;

/**
 * Examples of using the AddNewButton component in different contexts.
 */
class ButtonUsageExamples
{
    /**
     * Example 1: Basic usage with default icon and label.
     */
    public static function basicExample(): CreateAction
    {
        return CreateAction::make()
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make()
                    ->configure($action));
    }
    
    /**
     * Example 2: Custom label and icon.
     */
    public static function customLabelAndIcon(): CreateAction
    {
        return CreateAction::make()
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make('Create Category')
                    ->setIcon('heroicon-o-folder-plus')
                    ->configure($action));
    }
    
    /**
     * Example 3: Large button with no icon.
     */
    public static function largeButtonNoIcon(): CreateAction
    {
        return CreateAction::make()
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make('Add New Item')
                    ->size('lg')
                    ->showIcon(false)
                    ->configure($action));
    }
    
    /**
     * Example 4: Prominent button with custom color.
     */
    public static function prominentWithCustomColor(): CreateAction
    {
        return CreateAction::make()
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make('Add Event')
                    ->setIcon('heroicon-o-calendar-plus')
                    ->color('success')
                    ->prominent()
                    ->configure($action));
    }
    
    /**
     * Example 5: Product button as shown in the UI.
     */
    public static function productButton(): CreateAction
    {
        return CreateAction::make()
            ->label(__('common.actions.new_product'))
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make(__('common.actions.new_product'))
                    ->size('lg')
                    ->showIcon(false)
                    ->prominent()
                    ->configure($action));
    }
} 