<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Components\Buttons\AddNewButton;
use App\Filament\Components\Buttons\CreateButton;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
    
    public function getBreadcrumb(): string
    {
        return __('product.breadcrumbs.list');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateButton::make()->configure(
                \Filament\Actions\CreateAction::make()
            )
        ];
    }
}
