<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use App\Filament\Resources\FarmResource\Widgets\LightChart;
use App\Models\Farm;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\ChartWidget;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array {
        return [
            // LightChart::class,
            LightChart::class,
        ];
    }
}
