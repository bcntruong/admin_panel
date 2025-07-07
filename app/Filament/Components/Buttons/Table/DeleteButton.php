<?php

namespace App\Filament\Components\Buttons\Table;

use App\Filament\Components\Buttons\TableActionButton;
use Filament\Tables\Actions\Action;

class DeleteButton extends TableActionButton
{
    /**
     * Get the default label for the button.
     *
     * @return string
     */
    protected function getDefaultLabel(): string
    {
        return __('common.actions.delete');
    }
    
    /**
     * Get the default icon for the button.
     *
     * @return string
     */
    protected function getDefaultIcon(): string
    {
        return 'heroicon-o-trash';
    }
    
    /**
     * Get the default color for the button.
     *
     * @return string
     */
    protected function getDefaultColor(): string
    {
        return 'danger';
    }
    
    /**
     * Configure the action with the button's properties.
     *
     * @param Action $action
     * @return Action
     */
    public function configure(Action $action): Action
    {
        return parent::configure($action)
            ->requiresConfirmation();
    }
} 