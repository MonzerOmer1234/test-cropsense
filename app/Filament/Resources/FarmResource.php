<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmResource\Pages;
use App\Filament\Resources\FarmResource\RelationManagers;
use App\Filament\Resources\FarmResource\RelationManagers\SensorsRelationManager;
use App\Filament\Resources\FarmResource\RelationManagers\TdsSensorsRelationManager;
use App\Filament\Resources\FarmResource\Widgets\FarmOverView;
use App\Filament\Resources\FarmResource\Widgets\LightChart;
use App\Models\Farm;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FarmResource extends Resource
{
    protected static ?string $model = Farm::class;
    // protected static ?string $navigationGroup = 'Workers';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name'),
                TextInput::make('location'),
                TextInput::make('size'),
                TextInput::make('crop_type'),
                TextInput::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name'),
                TextColumn::make('location'),
                TextColumn::make('size'),
                TextColumn::make('crop_type'),
                TextColumn::make('description'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ViewAction::make(),
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
            // SensorsRelationManager::class,
            TdsSensorsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFarms::route('/'),
            'create' => Pages\CreateFarm::route('/create'),
            'edit' => Pages\EditFarm::route('/{record}/edit'),
            'view' => Pages\ViewFarm::route('/{record}'),
        ];
    }


    public static function getWidgets(): array
    {
        return [
            LightChart::class,
            FarmOverView::class,
        ];
    }


    // public function getHeaderWidgets()
    // {
    //     return [
    //         LightChart::class,
    //     ];
    // }
    // getHeaderWidgets


    // FarmResource::getWidgets
}
