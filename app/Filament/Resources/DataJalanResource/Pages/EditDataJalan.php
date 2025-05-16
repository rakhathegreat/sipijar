<?php

namespace App\Filament\Resources\DataJalanResource\Pages;

use App\Filament\Resources\DataJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class EditDataJalan extends EditRecord
{
    protected static string $resource = DataJalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman view setelah edit
        return static::getResource()::getUrl('view', ['record' => $this->record->getKey()]);
    }

    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }
    
    protected function getFormSchema(): array
    {
        return DataJalanResource::getEditFormSchema();
    }
}
