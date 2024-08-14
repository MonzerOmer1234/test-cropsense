<?php

namespace App\Filament\Resources\Sensors\SoilMoistureResource\Pages;

use App\Filament\Resources\Sensors\SoilMoistureResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSoilMoisture extends ViewRecord
{
    protected static string $resource = SoilMoistureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
