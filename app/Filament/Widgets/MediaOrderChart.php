<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\MediaOrder;

class MediaOrderChart extends LineChartWidget
{
    protected static ?string $heading = 'Media Order Made Chart';


    protected function getData(): array
    {
        $data = Trend::model(MediaOrder::class)
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
