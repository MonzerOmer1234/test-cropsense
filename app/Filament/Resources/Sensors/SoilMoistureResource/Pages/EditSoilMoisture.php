<?php

namespace App\Filament\Resources\Sensors\SoilMoistureResource\Pages;

use App\Filament\Resources\Sensors\SoilMoistureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoilMoisture extends EditRecord
{
    protected static string $resource = SoilMoistureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
