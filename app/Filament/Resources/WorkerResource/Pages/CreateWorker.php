<?php

namespace App\Filament\Resources\WorkerResource\Pages;

use App\Filament\Resources\WorkerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorker extends CreateRecord
{
    protected static string $resource = WorkerResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        logger(auth()->user()->adminFarmGroup->id);
        $data['farm_group_id'] = auth()->user()->adminFarmGroup->id;
        $data['type'] = 2;

        return $data;
    }
}
