<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Components\Buttons\BackButton;
use App\Filament\Components\Buttons\DeleteButton;
use App\Filament\Components\Buttons\SaveButton;
use App\Filament\Components\Buttons\ViewButton;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    public function getBreadcrumb(): string
    {
        return __('product.breadcrumbs.edit');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteButton::make()->configure(
                \Filament\Actions\DeleteAction::make()
            ),
            ViewButton::make()->configure(
                \Filament\Actions\ViewAction::make()
            ),
        ];
    }
    
    protected function getSaveFormAction(): Actions\Action
    {
        return SaveButton::make()->configure(
            parent::getSaveFormAction()
        );
    }
    
    protected function getCancelFormAction(): Actions\Action
    {
        return BackButton::make()->configure(
            parent::getCancelFormAction()
        );
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
