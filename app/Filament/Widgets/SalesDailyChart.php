<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use Illuminate\Support\Carbon;

class SalesDailyChart extends BarChartWidget
{
    protected static ?string $heading = '月销量';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $end_month = Carbon::now()->endOfMonth()->day;
        return [
            'datasets' => [
                [
                    'label' => '每日销量',
                    'data' => [2, 10, 5, 2, 21, 32, 45, 74, 65, 45, 2, 10, 5, 2, 21, 32, 45, 74, 65, 45, 2, 10, 5, 2, 21, 32, 45, 74, 65, 45],
                ],
            ],
            'labels' => range(1, $end_month),
        ];
    }
}
