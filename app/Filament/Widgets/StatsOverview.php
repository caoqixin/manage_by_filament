<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 1;
    protected function getCards(): array
    {
        return [
            Card::make('库存数量', '192.1k'),
            Card::make('今日销量', '60€')
                ->description('相比昨天 32k 提升')
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('', '3:12'),
        ];
    }
}
