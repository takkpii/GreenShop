<?php

namespace App\Filament\Resources\Shipments\Schemas;

use App\Models\Order;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShipmentForm
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
                TextInput::make('tracking_number')
                    ->default(null),
                TextInput::make('carrier')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                DateTimePicker::make('shipped_at'),
                DateTimePicker::make('delivered_at'),
            ]);
    }
}
