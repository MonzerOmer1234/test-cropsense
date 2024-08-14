<?php

namespace App\Filament\Resources\Sensors\HumidityResource\Pages;

use App\Filament\Resources\Sensors\HumidityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHumidity extends EditRecord
{
    protected static string $resource = HumidityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
