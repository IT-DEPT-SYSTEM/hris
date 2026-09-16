<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TicketController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ALL TICKETS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request): View
    {
        $query = Ticket::with([
            'user',
            'department',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->input('search'));

            $query->where(function ($q) use ($search) {

                $q->where(
                    'ticket_number',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'subject',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas('user', function ($userQuery) use ($search) {

                    $userQuery
                        ->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                        ->orWhere(
                            'email',
                            'like',
                            "%{$search}%"
                        );

                });

            });
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->input('status')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DEPARTMENT FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('department')) {

            $query->where(
                'department_id',
                $request->input('department')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GET TICKETS
        |--------------------------------------------------------------------------
        */

        $tickets = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | DEPARTMENTS
        |--------------------------------------------------------------------------
        */

        $departments = Department::orderBy('name')
            ->get();


        return view(
            'admin.tickets.index',
            compact(
                'tickets',
                'departments'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE TICKET
    |--------------------------------------------------------------------------
    */

    public function create(): View
    {
        /*
        |--------------------------------------------------------------------------
        | NORMAL USERS ONLY
        |--------------------------------------------------------------------------
        */

        $users = User::where('role', 'user')
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DEPARTMENTS
        |--------------------------------------------------------------------------
        */

        $departments = Department::orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CREATE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.tickets.create',
            compact(
                'users',
                'departments'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE TICKET
    |--------------------------------------------------------------------------
    */

    public function store(Request $request): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATE FORM
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            'department_id' => [
                'required',
                'integer',
                'exists:departments,id',
            ],

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
                'max:10000',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | VERIFY SELECTED USER
        |--------------------------------------------------------------------------
        |
        | Admin can only create tickets for normal users.
        |
        */

        $user = User::where('id', $validated['user_id'])
            ->where('role', 'user')
            ->first();

        if (!$user) {

            return back()
                ->withInput()
                ->withErrors([
                    'user_id' => 'The selected user is not valid.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | GENERATE UNIQUE TICKET NUMBER
        |--------------------------------------------------------------------------
        */

        do {

            $ticketNumber =
                'TKT-' .
                strtoupper(
                    Str::random(8)
                );

        } while (
            Ticket::where(
                'ticket_number',
                $ticketNumber
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | CREATE TICKET
        |--------------------------------------------------------------------------
        */

        Ticket::create([

            'ticket_number' => $ticketNumber,

            'user_id' => $user->id,

            'department_id' =>
                $validated['department_id'],

            'subject' =>
                $validated['subject'],

            'description' =>
                $validated['description'],

            'status' => 'New',

        ]);


        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.tickets.index')
            ->with(
                'success',
                'Ticket ' .
                $ticketNumber .
                ' was created successfully for ' .
                $user->name .
                '.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW TICKET
    |--------------------------------------------------------------------------
    */

    public function show(Ticket $ticket): View
    {
        /*
        |--------------------------------------------------------------------------
        | LOAD RELATIONSHIPS
        |--------------------------------------------------------------------------
        */

        $ticket->load([
            'user',
            'department',
        ]);


        return view(
            'admin.tickets.show',
            compact('ticket')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE TICKET STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
        Request $request,
        Ticket $ticket
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | VALIDATE STATUS
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'status' => [
                'required',
                'string',
                'in:New,Open,Closed',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $ticket->update([

            'status' =>
                $validated['status'],

        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'admin.tickets.show',
                $ticket
            )
            ->with(
                'success',
                'Ticket status updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE TICKET
    |--------------------------------------------------------------------------
    */

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();


        return redirect()
            ->route(
                'admin.tickets.index'
            )
            ->with(
                'success',
                'Ticket deleted successfully.'
            );
    }
}
