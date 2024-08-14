<?php

namespace App\Filament\Resources\Sensors\TdsResource\Pages;

use App\Filament\Resources\Sensors\TdsResource;
use Filament\Actions;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewTds extends ViewRecord
{
    protected static string $resource = TdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()->schema([
                    Grid::make()->schema([
                        TextEntry::make('serial_number'),
                        TextEntry::make('farm.name'),
                    ]),
                ])->columnSpan(2),
                Section::make()->schema([
                    Grid::make()->schema([
                        TextEntry::make('lat'),
                        TextEntry::make('lng'),
                        TextEntry::make('crop_type'),
                    ])->columnSpan(3),
                ]),

                Section::make()->schema([
                    Grid::make()->schema([
                        TextEntry::make('notifiable')->badge(),
                        TextEntry::make('readable')->badge(),

                    ])->columnSpan(3),
                ]),
            ]);
    }
}
