<?php

namespace App\Filament\User\Resources\LaporanResource\Pages;

use App\Filament\User\Resources\LaporanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Filament\Pages\Actions\Action;

class ViewLaporan extends ViewRecord
{
    protected static string $resource = LaporanResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return LaporanResource::getEditFormSchema();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->url(static::getResource()::getUrl('index'))
        ];
    }
}
