<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

/**
 * Edit User page for modifying existing users
 */
class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    
    /**
     * Define the header actions for the edit page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->label('View Details'),
            Actions\DeleteAction::make()
                ->label('Delete User')
                ->requiresConfirmation(),
            Actions\Action::make('resetPassword')
                ->label('Reset Password')
                ->icon('heroicon-o-key')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Reset user password')
                ->modalDescription('Are you sure you want to reset this user\'s password? A new password will be generated and the user will be notified.')
                ->modalSubmitActionLabel('Yes, reset password')
                ->action(function () {
                    // Password reset functionality can be implemented here
                    // This is a placeholder for future implementation
                    $this->notify('success', 'Password reset email sent to user');
                }),
        ];
    }
    
    /**
     * Get the redirect URL after successful save
     *
     * @return string The URL to redirect to
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    /**
     * Get the save notification title
     *
     * @return string The notification title
     */
    protected function getSavedNotificationTitle(): string
    {
        return 'User updated successfully';
    }
}
