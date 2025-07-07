<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Components\Buttons\BackButton;
use App\Filament\Components\Buttons\CreateAndCreateMoreButton;
use App\Filament\Components\Buttons\SaveButton;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    
    public function getBreadcrumb(): string
    {
        return __('product.breadcrumbs.create');
    }
    
    protected function getCreateFormAction(): Actions\Action
    {
        return SaveButton::make()->configure(
            parent::getCreateFormAction()
        );
    }
    
    protected function getCreateAnotherFormAction(): Actions\Action
    {
        return CreateAndCreateMoreButton::make()->configure(
            parent::getCreateAnotherFormAction()
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
