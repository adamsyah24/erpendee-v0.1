<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
// use Order;

class EndeeChart extends BarChartWidget
{
    protected static ?string $heading = 'Order Made Chart';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Order Made',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
