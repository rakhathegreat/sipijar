<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use App\Filament\Resources\LaporanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Form;

class ViewLaporan extends ViewRecord
{
    protected static string $resource = LaporanResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }
    
    protected function getFormSchema(): array
    {
        return LaporanResource::getViewFormSchema();
    }
}
