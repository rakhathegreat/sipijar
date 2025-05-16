<?php

namespace App\Filament\Exports;

use App\Models\DataJalan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class DataJalanExporter extends Exporter
{
    protected static ?string $model = DataJalan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('nama')->label('Nama Jalan'),
            ExportColumn::make('kelurahan.kelurahan')->label('Kelurahan'),
            ExportColumn::make('rt')->label('RT'),
            ExportColumn::make('rw')->label('RW'),
            ExportColumn::make('kondisi_jalan.kondisi')->label('Kondisi'),
            ExportColumn::make('koordinat')->label('Koordinat'),
            ExportColumn::make('updated_at')->label('Tanggal Diubah'),
            ExportColumn::make('created_at')->label('Tanggal Dibuat'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your data jalan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
