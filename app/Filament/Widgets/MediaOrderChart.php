<?php

namespace App\Filament\Widgets;

use App\Models\Media;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\MediaOrder;
use App\Models\Order;

class MediaOrderChart extends BarChartWidget
{
    protected static ?string $heading = 'Approved Quotations Chart';


    protected function getData(): array
    {
        $data = Trend::query(Order::query()->where('status_id', '1'))
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Approved Quotations',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
