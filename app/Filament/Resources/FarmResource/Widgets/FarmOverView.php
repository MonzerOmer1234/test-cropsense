<?php

namespace App\Filament\Resources\FarmResource\Widgets;

use Filament\Widgets\Widget;

class FarmOverView extends Widget
{
    protected static string $view = 'filament.resources.farm-resource.widgets.farm-over-view';


    ///
    // protected static string $view = 'filament.widgets.my-custom-widget';

    public ?string $text = null;

    // public function mount(string $text): void
    // {
    //     $this->text = $text;
    // }
}
