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
     * Define the header actions for the view page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit User'),
            Actions\DeleteAction::make()
                ->label('Delete User')
                ->requiresConfirmation(),
        ];
    }
}
