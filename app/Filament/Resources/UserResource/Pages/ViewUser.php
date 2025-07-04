<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

/**
 * View User page for displaying user details
 */
class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;
    
    /**
     * Get the breadcrumb for the page
     *
     * @return string The breadcrumb label
     */
    public function getBreadcrumb(): string
    {
        return __('common.breadcrumbs.view');
    }

    /**
     * Define the header actions for the view page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label(__('common.actions.edit')),
            Actions\DeleteAction::make()
                ->label(__('common.actions.delete'))
                ->requiresConfirmation(),
        ];
    }
}
