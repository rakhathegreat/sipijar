<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Filament\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use App\Models\Kerusakan;
use App\Models\Kelurahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Laporan';

    protected static ?string $slug = 'laporan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getViewFormSchema(): array
    {
        return [
            Section::make('Gambar')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([                  
                    Forms\Components\FileUpload::make('gambar_laporan')
                        ->image()
                        ->directory('laporan')
                        ->disk('public')
                        ->panelLayout('grid')
                        ->maxSize(1024)
                        ->preserveFilenames(false)
                        ->columnSpanFull()
                        ->required()
                        ->afterStateUpdated(function ($state, callable $set) {
                            if (!$state) return;

                            $path = $state->getRealPath();

                            if (!file_exists($path)) {
                                Notification::make()
                                    ->title('Gagal membaca gambar.')
                                    ->danger()
                                    ->send();
                                return;
                            }   

                            $exif = @exif_read_data($path);
                            
                            if (!isset($exif['GPSLatitude']) || !isset($exif['GPSLongitude'])) {
                                Notification::make()
                                    ->title('Gambar tidak memiliki data koordinat GPS.')
                                    ->danger()
                                    ->send();

                                // Hapus file dari livewire-tmp
                                $filename = $state->getFilename();
                                $tempPath = storage_path('app/livewire-tmp/' . $filename);

                                if (file_exists($tempPath)) {
                                    unlink($tempPath);
                                }

                                $set('gambar_laporan', null);
                                return;
                            }

                            // Fungsi konversi ke desimal
                            $convertToDecimal = function ($coord, $ref) {
                                [$degNum, $degDen] = explode('/', $coord[0]);
                                [$minNum, $minDen] = explode('/', $coord[1]);
                                [$secNum, $secDen] = explode('/', $coord[2]);

                                $degrees = $degNum / $degDen;
                                $minutes = $minNum / $minDen;
                                $seconds = $secNum / $secDen;

                                $decimal = $degrees + ($minutes / 60) + ($seconds / 3600);
                                return ($ref === 'S' || $ref === 'W') ? -$decimal : $decimal;
                            };

                            $latitude = $convertToDecimal($exif['GPSLatitude'], $exif['GPSLatitudeRef']);
                            $longitude = $convertToDecimal($exif['GPSLongitude'], $exif['GPSLongitudeRef']);

                            // Simpan ke input text
                            $set('latitude', $latitude);
                            $set('longitude', $longitude);
                        })
                        ,
                        TextInput::make('latitude')
                            ->label('Latitude')
                            ->required()
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 3,
                                '2xl' => 4,
                            ])
                            ->readOnly(),
                        TextInput::make('longitude')
                            ->label('Longitude')
                            ->required()
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 3,
                                '2xl' => 4, 
                            ])
                            ->readOnly(),
                    ]),
            Section::make('Data Laporan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    TextInput::make('title')
                        ->label('Judul Laporan')
                        ->required()
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                        ])
                    ,
                    Select::make('kelurahan_id')
                        ->label('Kelurahan')
                        ->relationship('kelurahan', 'kelurahan')
                        ->options(Kelurahan::all()->pluck('kelurahan', 'id'))
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 4,
                        ])
                        ,
                    Select::make('rt')
                        ->label('RT')
                        ->required()
                        ->options([
                            1,2,3,4,5,6,7,8,9,10
                        ])
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 4,
                        ])
                        ,
                    Select::make('rw')
                        ->label('RW')
                        ->required()
                        ->options([
                            1,2,3,4,5,6,7,8,9,10
                        ])                     
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 4,
                        ]),
                    Select::make('kerusakan_id')
                        ->label('Jenis Kerusakan')
                        ->relationship('kerusakan', 'nama')
                        ->options(Kerusakan::all()->pluck('nama', 'id'))
                        ->columnSpanFull()
                        ,
                    Textarea::make('keterangan')
                        ->columnSpanFull()
                        ->rows(10)
                    ,
                    
                ])
                ,
        ];
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Nomor Laporan')
                    ->sortable(),
                TextColumn::make('kelurahan.kelurahan'),
                TextColumn::make('rt'),
                TextColumn::make('rw'),
                TextColumn::make('kerusakan.nama'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime('d/m/Y')
                    ->label('Tanggal Laporan'),
                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'verified' => 'Verified',
                        'in_progress' => 'Progress',
                        'done' => 'Done',
                        'rejected' => 'Rejected'    
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'view' => Pages\ViewLaporan::route('/{record}'),
        ];
    }

    
}
