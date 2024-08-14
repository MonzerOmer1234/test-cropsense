<?php

namespace App\Filament\Resources\Sensors;

use App\Filament\Resources\Sensors\TemperatureResource\Pages;
use App\Filament\Resources\Sensors\TemperatureResource\RelationManagers;
use App\Models\Sensors\Temperature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemperatureResource extends Resource
{

    protected static ?string $label = 'Temeprature Sensors';
    protected static ?string $navigationGroup = "Sensors";
    protected static ?string $model = Temperature::class;

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
            'index' => Pages\ListTemperatures::route('/'),
            'create' => Pages\CreateTemperature::route('/create'),
            'view' => Pages\ViewTemperature::route('/{record}'),
            'edit' => Pages\EditTemperature::route('/{record}/edit'),
        ];
    }
}
