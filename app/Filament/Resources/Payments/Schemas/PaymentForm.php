<?php

namespace App\Filament\Resources\Payments\Schemas;

use App\Models\Order;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->required()
                    ->label('order')
                    ->options(Order::all()->pluck('id'))
                    ->searchingMessage('More Orders ...')
                    ->noSearchResultsMessage('No order found!')
                    ->searchable(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('method')
                    ->required()
                    ->default('credit'),
                DateTimePicker::make('date_time')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('paid_at'),
            ]);
    }
}
