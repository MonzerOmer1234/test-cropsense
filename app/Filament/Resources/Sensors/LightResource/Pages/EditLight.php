<?php

namespace App\Filament\Resources\Sensors\LightResource\Pages;

use App\Filament\Resources\Sensors\LightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLight extends EditRecord
{
    protected static string $resource = LightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
