<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function afterCreate(): void
    {
        parent::afterCreate();
        $permissions = $this->data['permissions'] ?? [];
        if (!empty($permissions)) {
            $this->record->syncPermissions($permissions);
        }
    }
}
