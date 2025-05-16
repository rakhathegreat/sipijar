<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Filament\Pages\Dashboard;
class RedirectToProperPanelMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role === 'admin') {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        if ($request->user()->role === 'client') {
            return redirect()->route('filament.user.pages.welcome');
        }

        return $next($request);
    }
}