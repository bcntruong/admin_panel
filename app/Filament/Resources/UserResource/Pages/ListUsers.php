<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\ActionSize;
use Illuminate\Database\Eloquent\Builder;

/**
 * List Users page for displaying and managing users
 */
class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    
    /**
     * Get the breadcrumb for the page
     *
     * @return string The breadcrumb label
     */
    public function getBreadcrumb(): string
    {
        return __('common.breadcrumbs.list');
    }
    
    /**
     * Define the header actions for the list page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('common.actions.add'))
                ->icon('heroicon-o-user-plus'),
        ];
    }
    
    /**
     * Define the table actions for the list page
     *
     * @return array Actions configuration
     */
    protected function getActions(): array
    {
        return [
            Actions\Action::make('export')
                ->label(__('common.actions.export'))
                ->icon('heroicon-o-arrow-down-tray')
                ->size(ActionSize::Small)
                ->action(function () {
                    // Export functionality can be implemented here
                    // This is a placeholder for future implementation
                }),
        ];
    }
}
