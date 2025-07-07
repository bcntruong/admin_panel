<?php

namespace App\Filament\Components\Buttons;

use Filament\Actions\Action;

class DeleteButton extends BaseButton
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
     * @param mixed $action
     * @return mixed
     */
    public function configure(mixed $action): mixed
    {
        return parent::configure($action)
            ->requiresConfirmation();
    }
} 