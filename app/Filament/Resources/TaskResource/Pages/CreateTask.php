<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;




    public function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('description')->required(),
                DatePicker::make('due_date')->required(),

                Select::make('assigned_to_id')
                    ->name('Worker')
                    ->options(
                        User::where('farm_group_id', auth()->user()->adminFarmGroup->id)
                            ->pluck('name', 'id')
                            ->toArray()
                    )->required(),
            ]);
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['farm_group_id'] = auth()->user()->adminFarmGroup->id;
        $data['status'] =  1;
        return $data;
    }
}
