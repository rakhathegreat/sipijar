<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Welcome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.user.pages.welcome';

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

}
