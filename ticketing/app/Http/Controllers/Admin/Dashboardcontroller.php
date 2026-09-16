<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TICKET COUNTS
        |--------------------------------------------------------------------------
        */

        $totalTickets = Ticket::count();

        $newTickets = Ticket::where('status', 'New')->count();

        $openTickets = Ticket::where('status', 'Open')->count();

        $closedTickets = Ticket::where('status', 'Closed')->count();


        /*
        |--------------------------------------------------------------------------
        | RECENT TICKETS
        |--------------------------------------------------------------------------
        |
        | Load the user and department relationships so the dashboard
        | can display their information without additional queries.
        |
        */

        $recentTickets = Ticket::with([
            'user',
            'department'
        ])
        ->latest()
        ->take(5)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', [
            'totalTickets'  => $totalTickets,
            'newTickets'    => $newTickets,
            'openTickets'   => $openTickets,
            'closedTickets' => $closedTickets,
            'recentTickets' => $recentTickets,
        ]);
    }
}