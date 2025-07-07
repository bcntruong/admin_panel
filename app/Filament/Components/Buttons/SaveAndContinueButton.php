<?php

namespace App\Filament\Components\Buttons;

use Filament\Actions\Action;

class SaveAndContinueButton extends BaseButton
{
    /**
     * Get the default label for the button.
     *
     * @return string
     */
    protected function getDefaultLabel(): string
    {
        return __('common.actions.save_and_continue');
    }
    
    /**
     * Get the default icon for the button.
     *
     * @return string
     */
    protected function getDefaultIcon(): string
    {
        return 'heroicon-o-arrow-path';
    }
    
    /**
     * Get the default color for the button.
     *
     * @return string
     */
    protected function getDefaultColor(): string
    {
        return 'success';
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
            ->keyBindings(['mod+shift+s']);
    }
}