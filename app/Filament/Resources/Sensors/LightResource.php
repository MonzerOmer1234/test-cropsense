<?php

namespace App\Filament\Resources\Sensors;

use App\Filament\Resources\Sensors\LightResource\Pages;
use App\Filament\Resources\Sensors\LightResource\RelationManagers;
use App\Models\Sensors\Light;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LightResource extends Resource
{
    protected static ?string $label = 'Light Sensors';
    protected static ?string $navigationGroup = "Sensors";
    protected static ?string $model = Light::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextColumn::make('last_read')->dateTime(),
                TextColumn::make('farm.name'),
                TextColumn::make('serial_number'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListLights::route('/'),
            'create' => Pages\CreateLight::route('/create'),
            'view' => Pages\ViewLight::route('/{record}'),
            'edit' => Pages\EditLight::route('/{record}/edit'),
        ];
    }
}
