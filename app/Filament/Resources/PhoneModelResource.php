<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneModelResource\Pages;
use App\Filament\Resources\PhoneModelResource\RelationManagers;
use App\Models\PhoneModel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhoneModelResource extends Resource
{
    protected static ?string $model = PhoneModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-mobile';
    protected static ?string $navigationGroup = '手机型号';

    protected static ?string $navigationLabel = '型号';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('brand.name'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand')
                    ->multiple()
                    ->relationship('brand', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePhoneModels::route('/'),
        ];
    }
}
