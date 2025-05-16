<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DataJalanChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;


    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Laporan Bulanan',
                    'data' => [20, 30, 45],
                ]
            ],
            'labels' => ['Baik', 'Rusak', 'Rusak Berat'],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
