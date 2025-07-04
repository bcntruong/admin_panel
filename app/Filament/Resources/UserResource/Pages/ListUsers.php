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
     * Define the header actions for the list page
     *
     * @return array Actions configuration
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New User')
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
                ->label('Export Users')
                ->icon('heroicon-o-arrow-down-tray')
                ->size(ActionSize::Small)
                ->action(function () {
                    // Export functionality can be implemented here
                    // This is a placeholder for future implementation
                }),
        ];
    }
}
