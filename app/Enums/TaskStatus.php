<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TaskStatus: int implements HasColor, HasIcon, HasLabel
{
        // 1=> idle , 2=> proccessing , 3=> complete , 4=> revise

    case IDLE = 1;

    case PROCESSING = 2;
    case COMPLETE = 3;
    case REVISE = 4;

    // case Complete = 'complete';

    public function getLabel(): string
    {
        return match ($this) {
            self::IDLE => 'IDLE',
            self::PROCESSING => 'PROCESSING',
            self::COMPLETE => 'COMPLETE',
            self::REVISE => 'REVISE',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::IDLE => 'info',
            self::PROCESSING => 'warning',
            self::COMPLETE => 'success',
            self::REVISE => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::IDLE => 'heroicon-o-x-circle',
            self::PROCESSING => 'heroicon-o-check-circle',
            self::COMPLETE => 'heroicon-o-check-circle',
            self::REVISE => 'heroicon-o-x-circle',
        };
    }
}
