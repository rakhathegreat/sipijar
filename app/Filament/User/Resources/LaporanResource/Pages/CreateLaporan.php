<?php

namespace App\Filament\User\Resources\LaporanResource\Pages;

use App\Filament\User\Resources\LaporanResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporan extends CreateRecord
{
    protected static string $resource = LaporanResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return LaporanResource::getCreateFormSchema();
    } 

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected function getListeners()
    {
        return array_merge(parent::getListeners(), [
            'triggerRefresh' => 'handleTriggerRefresh',
        ]);
    }

    public function handleTriggerRefresh()
    {
        // Emit event Livewire untuk refresh komponen
        $this->emit('refreshComponent');
    }
}
