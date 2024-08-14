<?php

namespace App\Filament\Resources\Sensors;

use App\Filament\Resources\Sensors\HumidityResource\Pages;
use App\Filament\Resources\Sensors\HumidityResource\RelationManagers;
use App\Models\Sensors\Humidity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HumidityResource extends Resource
{
    protected static ?string $label = 'Humidity Sensors';
    protected static ?string $navigationGroup = "Sensors";

    protected static ?string $model = Humidity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('last_read')->dateTime(),
                TextColumn::make('farm.name'),
                TextColumn::make('serial_number'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHumidities::route('/'),
            'create' => Pages\CreateHumidity::route('/create'),
            'view' => Pages\ViewHumidity::route('/{record}'),
            'edit' => Pages\EditHumidity::route('/{record}/edit'),
        ];
    }
}
