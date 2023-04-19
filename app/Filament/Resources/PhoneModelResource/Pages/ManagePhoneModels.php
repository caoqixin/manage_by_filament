<?php

namespace App\Filament\Resources\PhoneModelResource\Pages;

use App\Filament\Resources\PhoneModelResource;
use App\Imports\BrandsImport;
use App\Imports\PhoneModelImport;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Filters\Layout;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ManagePhoneModels extends ManageRecords
{
    protected static string $resource = PhoneModelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Import')
                ->label('Import')
                ->form([
                    FileUpload::make('excel')
                        ->label('Select a Excel File')
                        ->required()
                ])->action(function (array $data) {
                    // 获取文件
                    $file_path = storage_path($data['excel']);
                })->after(function (array $data) {
                    Excel::import(new PhoneModelImport(), $data['excel'], 'public');
                    // 删除文件
                    Storage::disk('public')->delete($data['excel']);
                })
        ];
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }
}
