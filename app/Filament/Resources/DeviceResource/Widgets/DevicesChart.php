<?php

namespace App\Filament\Resources\DeviceResource\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Device;

class DevicesChart extends ChartWidget
{
    protected static ?string $heading = 'Qurilmalar kunlar bo\'yicha';

    protected int | string | array $columnSpan = 'half';

    protected function getData(): array
    {
        $data = Trend::model(Device::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Qurilmalar',
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
