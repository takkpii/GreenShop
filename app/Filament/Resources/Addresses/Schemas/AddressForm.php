<?php

namespace App\Filament\Resources\Addresses\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->required()
                    ->label('user')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchingMessage('More Users ...')
                    ->noSearchResultsMessage('No User found!')
                    ->searchable(),
                TextInput::make('full_address')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('postal_code')
                    ->required(),
                TextInput::make('country')
                    ->required(),
            ]);
    }
}
