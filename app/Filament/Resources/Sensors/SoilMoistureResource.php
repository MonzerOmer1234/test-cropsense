<?php

namespace App\Filament\Resources\Sensors;

use App\Filament\Resources\Sensors\SoilMoistureResource\Pages;
use App\Filament\Resources\Sensors\SoilMoistureResource\RelationManagers;
use App\Models\Sensors\SoilMoisture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SoilMoistureResource extends Resource
{
    protected static ?string $navigationGroup = "Sensors";
    protected static ?string $label = "Moisture Sensors";

    protected static ?string $model = SoilMoisture::class;

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
            'index' => Pages\ListSoilMoistures::route('/'),
            'create' => Pages\CreateSoilMoisture::route('/create'),
            'view' => Pages\ViewSoilMoisture::route('/{record}'),
            'edit' => Pages\EditSoilMoisture::route('/{record}/edit'),
        ];
    }
}
