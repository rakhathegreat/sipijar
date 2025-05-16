<?php

namespace App\Filament\User\Resources\LaporanResource\Pages;

use App\Filament\User\Resources\LaporanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Laporan;


class ListLaporans extends ListRecords
{
    protected static string $resource = LaporanResource::class;

    protected function getTableQuery(): Builder
    {
        // Mengambil laporan hanya milik user yang sedang login
        return Laporan::where('user_id', auth()->id());
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    
}
