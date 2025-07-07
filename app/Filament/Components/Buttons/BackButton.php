<?php

namespace App\Filament\Components\Buttons;

class BackButton extends BaseButton
{
    /**
     * Get the default label for the button.
     *
     * @return string
     */
    protected function getDefaultLabel(): string
    {
        return __('common.actions.back');
    }
    
    /**
     * Get the default icon for the button.
     *
     * @return string
     */
    protected function getDefaultIcon(): string
    {
        return 'heroicon-o-arrow-left';
    }
    
    /**
     * Get the default color for the button.
     *
     * @return string
     */
    protected function getDefaultColor(): string
    {
        return 'gray';
    }
} 