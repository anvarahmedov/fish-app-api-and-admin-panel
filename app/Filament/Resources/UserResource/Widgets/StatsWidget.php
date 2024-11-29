<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Device;
use App\Models\DeviceData;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Foydalanuvchilar soni', User::count()),
            Stat::make('Qurilmalar soni', Device::count()),
            Stat::make('Qurilma ma\'lumotlari soni soni', Device::count())
        ];
    }
}
