<?php

namespace App\Filament\Resources\Sensors\TdsResource\Pages;

use App\Filament\Resources\Sensors\TdsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTds extends ListRecords
{
    protected static string $resource = TdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
