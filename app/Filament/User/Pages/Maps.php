<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Maps extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static string $view = 'filament.pages.maps';

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}
