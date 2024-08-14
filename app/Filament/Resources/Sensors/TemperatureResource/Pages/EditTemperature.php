<?php

namespace App\Filament\Resources\Sensors\TemperatureResource\Pages;

use App\Filament\Resources\Sensors\TemperatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemperature extends EditRecord
{
    protected static string $resource = TemperatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
