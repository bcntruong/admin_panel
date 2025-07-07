<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Components\Buttons\DeleteButton;
use App\Filament\Components\Buttons\EditButton;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    public function getBreadcrumb(): string
    {
        return __('product.breadcrumbs.view');
    }

    protected function getHeaderActions(): array
    {
        return [
            EditButton::make()->configure(
                \Filament\Actions\EditAction::make()
            ),
            DeleteButton::make()->configure(
                \Filament\Actions\DeleteAction::make()
            ),
        ];
    }
} 