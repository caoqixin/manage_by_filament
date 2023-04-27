<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\Action::make('首页')->action('backHome')
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function backHome()
    {
        return redirect($this->getRedirectUrl());
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('Cancel')
            ->url(static::getResource()::getUrl())
            ->color('secondary');
    }
}
