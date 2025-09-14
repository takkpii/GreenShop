<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('category_id')
                    ->required()
                    ->label('category')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchingMessage('More categories ...')
                    ->noSearchResultsMessage('No categories found!')
                    ->searchable(),
                TextInput::make('SKU')
                    ->default(null),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('products')
                    ->image(),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
            ]);
    }
}
