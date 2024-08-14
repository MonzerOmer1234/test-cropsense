<?php
 namespace App\Filament\Resources\FarmResource\Pages;


use App\Filament\Resources\FarmResource;
use App\Filament\Resources\FarmResource\Widgets\FarmOverView;
use App\Filament\Resources\FarmResource\Widgets\LightChart;
use Filament\Actions;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewFarm extends ViewRecord
{
    protected static string $resource = FarmResource::class;


    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()->schema([
                    Grid::make()->schema([
                        TextEntry::make('name'),
                        TextEntry::make('description'),
                    ]),
                ])->columnSpan(2),
                Section::make()->schema([
                    Grid::make()->schema([
                        TextEntry::make('location'),
                        TextEntry::make('size'),
                        TextEntry::make('crop_type'),
                    ]),
                ]),
            ]);
    }

    protected function getHeaderWidgets(): array {
        return [
            // LightChart::class,
            FarmOverView::make(),
        ];
    }
}
