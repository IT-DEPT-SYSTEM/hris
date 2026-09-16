<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Redirect the authenticated user
     * to the correct dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Admin
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        // Normal User
        return redirect()->route('user.dashboard');
    }
}