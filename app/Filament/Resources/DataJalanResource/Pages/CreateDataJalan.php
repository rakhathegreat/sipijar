<?php

namespace App\Filament\Resources\DataJalanResource\Pages;

use App\Models\Gambar;
use App\Filament\Resources\DataJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;

class CreateDataJalan extends CreateRecord
{
    protected static string $resource = DataJalanResource::class;
    protected static ?string $title = 'Tambah Data Jalan';

    public function form(Form $form): Form
    {
        return parent::form($form)->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return DataJalanResource::getCreateFormSchema();
    }    

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->gambarJalanData = $data['gambar_jalan'] ?? [];
        unset($data['gambar_jalan']);

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->gambarJalanData as $gambarPath) {
            $this->record->gambar()->create([
                'id' => fake()->uuid(),
                'nama' => basename($gambarPath),
                'path' => $gambarPath,
            ]);
        }
    }

}
