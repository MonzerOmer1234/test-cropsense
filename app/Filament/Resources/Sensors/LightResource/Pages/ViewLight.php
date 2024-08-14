<?php

namespace App\Filament\Resources\Sensors\LightResource\Pages;

use App\Filament\Resources\Sensors\LightResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLight extends ViewRecord
{
    protected static string $resource = LightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
