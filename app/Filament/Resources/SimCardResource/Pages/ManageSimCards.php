<?php

namespace App\Filament\Resources\SimCardResource\Pages;

use App\Filament\Resources\SimCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSimCards extends ManageRecords
{
    protected static string $resource = SimCardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
