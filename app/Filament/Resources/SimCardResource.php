<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimCardResource\Pages;
use App\Filament\Resources\SimCardResource\RelationManagers;
use App\Models\SimCard;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SimCardResource extends Resource
{
    protected static ?string $model = SimCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = '运营商';
    protected static ?string $navigationLabel = 'SIM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('iccid')
                    ->autofocus()
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('telephone')
                    ->tel()
                    ->required()
                    ->maxLength(10),
                Forms\Components\Select::make('operator_id')
                    ->relationship('operator', 'name')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('iccid'),
                Tables\Columns\TextColumn::make('telephone'),
                Tables\Columns\TextColumn::make('operator.name'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ManageSimCards::route('/'),
        ];
    }
}
