<?php

namespace App\Filament\Resources\Sensors\SoilMoistureResource\Pages;

use App\Filament\Resources\Sensors\SoilMoistureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoilMoistures extends ListRecords
{
    protected static string $resource = SoilMoistureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
