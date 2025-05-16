<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataJalanResource\Pages;
use App\Filament\Resources\DataJalanResource\RelationManagers;
use App\Models\DataJalan;
use App\Models\KondisiJalan;
use App\Models\Alamat;
use App\Models\Kelurahan;
use App\Models\Gambar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use App\Tables\Columns\KondisiJalanColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\View;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\ButtonAction;
use Filament\Forms\Components\Modal;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Exports\DataJalanExporter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\ExportAction;





class DataJalanResource extends Resource
{
    protected static ?string $model = DataJalan::class;
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationLabel = 'Data Jalan';
    protected static ?string $slug = 'data-jalan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                static::getViewFormSchema()
            );
    }

    public static function getCreateFormSchema(): array
    {
        return [
            Section::make('Data Jalan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    TextInput::make('nama')
                        ->label('Nama Jalan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ])
                        ->required(),
                    TextInput::make('lebar')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ])
                        ->required(),
                    TextInput::make('panjang')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ])
                        ->required(),
                    Select::make('kondisi_jalan_id')
                        ->label('Kondisi Jalan')
                        ->options(KondisiJalan::all()->pluck('kondisi', 'id')->toArray())
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ])
                        ->required(),   
                ]),
            Section::make('Alamat')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    Select::make('kelurahan_id')
                        ->required()
                        ->label('Kelurahan')
                        ->options(Kelurahan::all()->pluck('kelurahan', 'id')->toArray())
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    Select::make('rt')
                        ->required()
                        ->label('RT')
                        ->options([
                            1,2,3,4,5,6,7,8,9,10
                        ])
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 4,
                        ]),
                    Select::make('rw')
                        ->required()
                        ->label('RW')
                        ->options([
                            1,2,3,4,5,6,7,8,9,10
                        ])
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 4,
                        ]),
                    ]),
                Section::make('Gambar')
                    -> columns([
                        'sm' => 3,
                        'xl' => 6,
                        '2xl' => 8,
                    ])
                    ->schema([
                        FileUpload::make('gambar_jalan')
                            ->label('Gambar Jalan')
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 6,
                                '2xl' => 8,
                            ])
                            ->panelLayout('grid')   
                            ->image()
                            ->directory('data-jalan')
                            ->maxSize(1024)
                            ->multiple()
                            ->preserveFilenames(false)
                            ,
                    ]),
            
            Section::make('Maps')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([ 
                    TextInput::make('koordinat')
                        ->dehydrated(false)
                        ->label('Koordinat')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 6,
                        ]),
                    Actions::make([
                        Action::make('Pilih Koordinat')
                            ->label('Pilih Koordinat')
                            ->icon('heroicon-m-map')
                            ->form([
                                Grid::make(4)
                                    ->schema([
                                        View::make('components.contoh')
                                            ->columnSpanFull(),
                                        TextInput::make('longitude')
                                            ->label('Longitude')
                                            ->extraAttributes(['x-model' => 'data.longitude'])
                                            ->columnSpan([
                                                'sm' => 2,
                                                'xl' => 2,
                                                '2xl' => 4,
                                            ]),
                                        TextInput::make('latitude')
                                            ->label('Latitude')
                                            ->extraAttributes(['x-model' => 'data.latitude'])
                                            ->columnSpan([
                                                'sm' => 2,
                                                'xl' => 2,
                                                '2xl' => 4,
                                            ]),
                                    ])
                                
                            ])
                    ->action(function (array $data, \Filament\Forms\Set $set) {
                        // Gabungkan jadi satu string koordinat
                        $koordinat = $data['latitude'] . ',' . $data['longitude'];
                        // Set ke form utama (pastikan ada field bernama `koordinat`)
                        $set('koordinat', $koordinat);
                    })
                    ])
                    ->extraAttributes
                        ([
                            'style' => 'display: flex; flex-direction: column; justify-content: flex-end;',
                            'onclick' => "customFunction();",                       
                        ])
                ])
        ];
    }


    public static function getViewFormSchema(): array
    {
        return [    
            Section::make('Maps')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    View::make('components.maps')
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 6,
                        ]),
                    View::make('components.picture')
                        ->columnSpan([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 6,
                        ]),
                ]),
            Section::make('Data Jalan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    TextInput::make('nama')
                        ->label('Nama Jalan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('lebar')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ]),
                    TextInput::make('panjang')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ]),
                    Select::make('kondisi_jalan_id')
                        ->label('Kondisi Jalan')
                        ->options(KondisiJalan::pluck('kondisi', 'id')->toArray())     
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ]),
                ]),
            Section::make('Alamat Jalan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    Select::make('kelurahan_id')
                        ->label('Kelurahan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options(Kelurahan::all()->pluck('kelurahan', 'id')->toArray())
                        ->disabled(),
                    Select::make('rt')
                        ->label('RT')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                        ->disabled(),
                    Select::make('rw')
                        ->label('RW')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
                        ->disabled(),
                    TextInput::make('koordinat')
                        ->label('Koordinat')
                        ->columnSpan([
                            'sm' => 6,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                ]),
        ];
    }

    public static function getEditFormSchema(): array
    {
        return [
            Section::make('Data Jalan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    TextInput::make('nama')
                        ->label('Nama Jalan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    TextInput::make('lebar')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ]),
                    TextInput::make('panjang')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 4,
                        ]),
                    Select::make('kondisi_jalan_id')
                        ->label('Kondisi Jalan')
                        ->options(KondisiJalan::pluck('kondisi', 'id'))
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ]),
                ]),
            Section::make('Alamat Jalan')
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
                ->schema([
                    Select::make('kelurahan_id')
                        ->label('Kelurahan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options(Kelurahan::all()->pluck('kelurahan', 'id')),
                    Select::make('rt')
                        ->label('RT')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                    Select::make('rw')
                        ->label('RW')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 6,
                        ])
                        ->options([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                    TextInput::make('koordinat')
                        ->label('Koordinat')
                        ->columnSpan([
                            'sm' => 6,
                            'xl' => 6,
                            '2xl' => 6,
                        ])
                        ->disabled(),
                ]),
        ];
    }


    public static function table(Table $table): Table
    {
        return $table  
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Jalan'),
                TextColumn::make('kelurahan.kelurahan')->label('Kelurahan'),
                TextColumn::make('rt')->label('RT'),
                TextColumn::make('rw')->label('RW'),
                TextColumn::make('kondisi_jalan.kondisi')
                    ->label('Kondisi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Rusak' => 'warning',
                        'Baik' => 'success',
                        'Rusak Berat' => 'danger',
                    }),
                TextColumn::make('created_at')->dateTime('d/m/Y H:i')->sortable()->label('Tanggal Dibuat'),
                TextColumn::make('updated_at')->dateTime('d/m/Y H:i')->sortable()->label('Tanggal Diubah'),
            ])
            ->recordUrl(fn ($record) => static::getUrl('view', ['record' => $record]))
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('kondisi_jalan_id')
                    ->label('Kondisi Jalan')
                    ->options([
                        '1' => 'Baik',
                        '2' => 'Rusak',
                        '3' => 'Rusak Parah',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(DataJalanExporter::class)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
                    ->exporter(DataJalanExporter::class)
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
            'index' => Pages\ListDataJalans::route('/'),
            'create' => Pages\CreateDataJalan::route('/create'),
            'edit' => Pages\EditDataJalan::route('/{record}/edit'),
            'view' => Pages\ViewDataJalan::route('/{record}'),
            'koordinat' => Pages\Koordinat::route('/create/koordinat'),
        ];
    }
}
