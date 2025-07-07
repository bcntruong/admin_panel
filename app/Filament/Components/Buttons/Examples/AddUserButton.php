<?php

namespace App\Filament\Components\Buttons\Examples;

use App\Filament\Components\Buttons\AddNewButton;
use Filament\Actions\CreateAction;

/**
 * Example class showing how to use the AddNewButton component
 * with custom icon and label for adding a user.
 */
class AddUserButton
{
    /**
     * Get a configured "Add User" button.
     *
     * @return CreateAction
     */
    public static function make(): CreateAction
    {
        return CreateAction::make()
            ->label(__('common.actions.add_user'))
            ->configure(fn (CreateAction $action) => 
                AddNewButton::make(__('common.actions.add_user'))
                    ->setIcon('heroicon-o-user-plus')
                    ->size('md')
                    ->prominent()
                    ->configure($action));
    }
} 