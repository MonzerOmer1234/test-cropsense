<?php

namespace App\Filament\Resources\Sensors\HumidityResource\Pages;

use App\Filament\Resources\Sensors\HumidityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHumidity extends ViewRecord
{
    protected static string $resource = HumidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
