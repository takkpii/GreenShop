<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->required()
                    ->label('user')
                    ->options(User::all()->pluck('id'))
                    ->searchingMessage('More User ...')
                    ->noSearchResultsMessage('No User found!')
                    ->searchable(),
                DateTimePicker::make('date_time')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
            ]);
    }
}
