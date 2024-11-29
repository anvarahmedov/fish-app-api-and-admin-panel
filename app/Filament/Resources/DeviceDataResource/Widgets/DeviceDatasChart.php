<?php

namespace App\Filament\Resources\DeviceDataResource\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\DeviceData;

class DeviceDatasChart extends ChartWidget
{
    protected static ?string $heading = 'Qurilma ma\'lumotlari kunlar bo\'yicha';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Trend::model(DeviceData::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Qurilma ma\'lumotlari',
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
