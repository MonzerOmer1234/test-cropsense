<?php

namespace App\Filament\Resources\Sensors\TemperatureResource\Pages;

use App\Filament\Resources\Sensors\TemperatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemperatures extends ListRecords
{
    protected static string $resource = TemperatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
