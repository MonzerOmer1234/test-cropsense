<?php

namespace App\Filament\Resources\Sensors\TdsResource\Pages;

use App\Filament\Resources\Sensors\TdsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTds extends EditRecord
{
    protected static string $resource = TdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
