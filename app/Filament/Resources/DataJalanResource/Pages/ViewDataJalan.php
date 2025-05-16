<?php

namespace App\Filament\Resources\DataJalanResource\Pages;

use App\Filament\Resources\DataJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;

use App\Models\DataJalan;
use App\Models\KondisiJalan;
use App\Models\Alamat;

class ViewDataJalan extends ViewRecord
{


    protected static string $resource = DataJalanResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->label('Ubah Data Jalan')
                ->url(fn () => static::getResource()::getUrl('edit', ['record' => $this->record]))
                ->icon('heroicon-o-map')
                ->color('primary'),
        ];
    }
    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }
    
    protected function getFormSchema(): array
    {
        return DataJalanResource::getViewFormSchema();
    }

}
