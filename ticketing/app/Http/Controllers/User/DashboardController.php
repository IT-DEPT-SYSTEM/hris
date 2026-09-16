<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the User Dashboard.
     */
    public function index()
    {
        // Get currently logged-in user
        $userId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | Total Tickets
        |--------------------------------------------------------------------------
        */

        $totalTickets = Ticket::where(
            'user_id',
            $userId
        )->count();


        /*
        |--------------------------------------------------------------------------
        | New Tickets
        |--------------------------------------------------------------------------
        */

        $newTickets = Ticket::where(
            'user_id',
            $userId
        )
        ->where(
            'status',
            'New'
        )
        ->count();


        /*
        |--------------------------------------------------------------------------
        | Open Tickets
        |--------------------------------------------------------------------------
        */

        $openTickets = Ticket::where(
            'user_id',
            $userId
        )
        ->where(
            'status',
            'Open'
        )
        ->count();


        /*
        |--------------------------------------------------------------------------
        | Closed Tickets
        |--------------------------------------------------------------------------
        */

        $closedTickets = Ticket::where(
            'user_id',
            $userId
        )
        ->where(
            'status',
            'Closed'
        )
        ->count();


        /*
        |--------------------------------------------------------------------------
        | Recent Tickets
        |--------------------------------------------------------------------------
        |
        | Only the logged-in user's tickets are displayed.
        |
        */

        $recentTickets = Ticket::with('department')
            ->where(
                'user_id',
                $userId
            )
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Send Data To Dashboard View
        |--------------------------------------------------------------------------
        */

        return view(
            'user.dashboard',
            [
                'totalTickets'  => $totalTickets,
                'newTickets'    => $newTickets,
                'openTickets'   => $openTickets,
                'closedTickets' => $closedTickets,
                'recentTickets' => $recentTickets,
            ]
        );
    }
}