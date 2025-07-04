<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

/**
 * Create User page for adding new users
 */
class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    
    /**
     * Get the breadcrumb for the page
     *
     * @return string The breadcrumb label
     */
    public function getBreadcrumb(): string
    {
        return __('common.breadcrumbs.create');
    }
    
    /**
     * Get the redirect URL after successful creation
     *
     * @return string The URL to redirect to
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    /**
     * Get the creation notification title
     *
     * @return string The notification title
     */
    protected function getCreatedNotificationTitle(): string
    {
        return __('user.notifications.created');
    }
}
