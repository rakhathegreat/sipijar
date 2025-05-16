<?php

namespace App\Filament\Widgets;

use App\Models\Laporan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Laporan', Laporan::count())
                ->chart([
                    2,6,4,7,8,3,9
                ])
                ->color('danger')
                ->description('Per bulan')
                ->descriptionIcon('heroicon-s-arrow-trending-up'),
            Stat::make('Laporan Pending', Laporan::where('status', 'pending')->count()),
            Stat::make('Laporan Selesai', Laporan::where('status', 'selesai')->count()),

        ];
    }
}
