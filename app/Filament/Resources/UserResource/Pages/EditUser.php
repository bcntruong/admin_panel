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
     * Get the breadcrumb for the page
     *
     * @return string The breadcrumb label
     */
    public function getBreadcrumb(): string
    {
        return __('common.breadcrumbs.edit');
    }
    
    /**
     * Define the header actions for the edit page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->label(__('common.actions.view')),
            Actions\DeleteAction::make()
                ->label(__('common.actions.delete'))
                ->requiresConfirmation(),
            Actions\Action::make('resetPassword')
                ->label(__('user.actions.reset_password'))
                ->icon('heroicon-o-key')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading(__('user.actions.reset_password_heading'))
                ->modalDescription(__('user.actions.reset_password_description'))
                ->modalSubmitActionLabel(__('user.actions.reset_password_confirm'))
                ->action(function () {
                    // Password reset functionality can be implemented here
                    // This is a placeholder for future implementation
                    $this->notify('success', __('user.actions.password_reset_success'));
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
        return __('user.notifications.updated');
    }
}
