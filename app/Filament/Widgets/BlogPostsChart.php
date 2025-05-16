<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'half'; 

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Laporan Bulanan',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ]
                ],
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], 

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
