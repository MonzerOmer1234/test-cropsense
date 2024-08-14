<?php

namespace App\Filament\Resources\Sensors\TemperatureResource\Pages;

use App\Filament\Resources\Sensors\TemperatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTemperature extends ViewRecord
{
    protected static string $resource = TemperatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
