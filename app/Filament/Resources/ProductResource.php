<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = '商店管理';
    protected static ?string $navigationLabel = '商品';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->columnSpan(4)
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->required()
                            ->label('配图'),
                    ]),
                Forms\Components\Card::make()
                    ->columnSpan(8)
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ns')
                                    ->required()
                                    ->autofocus()
                                    ->unique()
                                    ->afterStateUpdated(function (\Closure $set, $state) {
                                        if ($product = Product::where('ns', $state)->first()) {
                                            return redirect()->route('filament.resources.products.edit', [
                                                'record' => $product->id
                                            ]);
                                        }
                                    })
                                    ->label('商品编码')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('title')
                                    ->label('商品名称')
                                    ->required()
                                    ->maxLength(2048),
                                Forms\Components\TextInput::make('stock')
                                    ->numeric()
                                    ->label('库存数量')
                                    ->required(),
                                Forms\Components\TextInput::make('purchase_price')
                                    ->label('进价')
                                    ->postfix('€'),
                                Forms\Components\TextInput::make('retail_price')
                                    ->label('零售价')
                                    ->postfix('€')
                                    ->required(),
                                Forms\Components\Select::make('category_id')
                                    ->label('分类')
                                    ->preload()
                                    ->searchable()
                                    ->relationship('category', 'name')
                                    ->required(),
                                Forms\Components\Select::make('model_id')
                                    ->label('所属型号')
                                    ->multiple()
                                    ->relationship('models', 'name'),
                                Forms\Components\Select::make('supplier_id')
                                    ->label('供应商')
                                    ->relationship('supplier', 'name')
                                    ->required(),
                            ]),
                    ])
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->label('图片'),
                Tables\Columns\TextColumn::make('ns')->label('商品编号')->searchable(),
                Tables\Columns\TextColumn::make('title')->label('商品名称')->searchable(),
                Tables\Columns\TextColumn::make('stock')->label('库存'),
                Tables\Columns\TextColumn::make('retail_price')->label('零售价'),
                Tables\Columns\TextColumn::make('category.name')->label('商品分类'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->multiple()
                    ->relationship('category', 'name')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
