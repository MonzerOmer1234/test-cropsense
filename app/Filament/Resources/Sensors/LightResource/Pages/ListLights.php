<?php

namespace App\Filament\Resources\Sensors\LightResource\Pages;

use App\Filament\Resources\Sensors\LightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLights extends ListRecords
{
    protected static string $resource = LightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
