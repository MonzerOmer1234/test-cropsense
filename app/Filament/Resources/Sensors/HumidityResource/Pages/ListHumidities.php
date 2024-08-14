<?php

namespace App\Filament\Resources\Sensors\HumidityResource\Pages;

use App\Filament\Resources\Sensors\HumidityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHumidities extends ListRecords
{
    protected static string $resource = HumidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
