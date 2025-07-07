<?php

namespace App\Filament\Components\Buttons;

use Filament\Actions\Action;

class CreateButton extends BaseButton
{
    protected function getDefaultLabel(): string
    {
        return __('common.actions.add');
    }
    
    /**
     * Get the default icon for the button.
     *
     * @return string
     */
    protected function getDefaultIcon(): string
    {
        return 'heroicon-o-plus';
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

    public function configure(mixed $action): mixed
    {
        return parent::configure($action)
            ->label($this->getDefaultLabel())
            ->icon($this->getDefaultIcon())
            ->color($this->getDefaultColor());
    }
} 