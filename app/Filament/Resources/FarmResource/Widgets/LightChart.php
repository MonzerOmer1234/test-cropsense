<?php

namespace App\Filament\Resources\FarmResource\Widgets;

use App\Models\Sensors\Light;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Model;

class LightChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?Model  $record = null;



    protected static ?int $sort = 1;

    // protected $model;
    // protected $relationship;

    // public function __construct($heading,)
    // {
    //     // $this->model = $model;
    //     // $this->relationship = $relationship;
    //     $this->heading= $heading;
    // }

    protected function getData(): array
    {
        $data = Trend::model(Light::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Light Sensor Data',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];

    }


    protected function getType(): string
    {
        return 'line';
    }

}
