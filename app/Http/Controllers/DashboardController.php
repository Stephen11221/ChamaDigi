<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $role = strtolower(Auth::user()->role?->role_name ?? 'member');

        $view = match ($role) {
            'admin' => 'pages.dashboards.admin',
            'treasurer' => 'pages.dashboards.treasurer',
            'secretary' => 'pages.dashboards.secretary',
            default => 'pages.dashboards.member',
        };

        return view($view, [
            'today' => now()->format('l, d F Y'),
            'role' => $role,
        ]);
    }
}
