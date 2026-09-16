<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MY TICKETS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request): View
    {
        $userId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | ONLY SHOW LOGGED-IN USER'S TICKETS
        |--------------------------------------------------------------------------
        */

        $query = Ticket::with('department')
            ->where('user_id', $userId);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        | Search by:
        | - Ticket number
        | - Subject
        | - Description
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

                ->orWhere(
                    'description',
                    'like',
                    "%{$search}%"
                );
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
        | 7 TICKETS PER PAGE
        |--------------------------------------------------------------------------
        */

        $tickets = $query
            ->latest()
            ->paginate(7)
            ->withQueryString();

        return view(
            'user.tickets.index',
            compact('tickets')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE TICKET FORM
    |--------------------------------------------------------------------------
    |
    | The department is NOT selected here.
    | It will automatically come from the user's registered department.
    |
    */

    public function create(): View
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | GET USER'S REGISTERED DEPARTMENT
        |--------------------------------------------------------------------------
        */

        $department = $user->department;

        return view(
            'user.tickets.create',
            compact('department')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE TICKET
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | The department_id comes directly from the logged-in user's account.
    | The user cannot submit another department_id manually.
    |
    */

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | MAKE SURE USER HAS A DEPARTMENT
        |--------------------------------------------------------------------------
        */

        if (!$user->department_id) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Your account does not have a department assigned. Please contact the administrator.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDATE ONLY SUBJECT AND DESCRIPTION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

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
        |
        | department_id is automatically taken from the user's account.
        |
        */

        Ticket::create([

            'ticket_number' =>
                $ticketNumber,

            'user_id' =>
                $user->id,

            'department_id' =>
                $user->department_id,

            'subject' =>
                $validated['subject'],

            'description' =>
                $validated['description'],

            'status' =>
                'New',

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('user.tickets.index')
            ->with(
                'success',
                'Your ticket was created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW TICKET
    |--------------------------------------------------------------------------
    |
    | A user can ONLY view their own ticket.
    |
    */

    public function show(Ticket $ticket): View
    {
        abort_unless(
            $ticket->user_id === Auth::id(),
            403
        );

        $ticket->load('department');

        return view(
            'user.tickets.show',
            compact('ticket')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT TICKET
    |--------------------------------------------------------------------------
    |
    | Department cannot be changed.
    |
    */

    public function edit(Ticket $ticket): View
    {
        abort_unless(
            $ticket->user_id === Auth::id(),
            403
        );

        $ticket->load('department');

        return view(
            'user.tickets.edit',
            compact('ticket')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE TICKET
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | department_id is NOT accepted from the form.
    |
    | Even if someone manually sends a department_id in the browser,
    | it will be ignored.
    |
    */

    public function update(
        Request $request,
        Ticket $ticket
    ): RedirectResponse {

        abort_unless(
            $ticket->user_id === Auth::id(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | VALIDATE SUBJECT AND DESCRIPTION ONLY
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

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
        | UPDATE TICKET
        |--------------------------------------------------------------------------
        |
        | Department is intentionally NOT updated.
        |
        */

        $ticket->update([

            'subject' =>
                $validated['subject'],

            'description' =>
                $validated['description'],

        ]);

        return redirect()
            ->route(
                'user.tickets.index'
            )
            ->with(
                'success',
                'Ticket updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE TICKET
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Ticket $ticket
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | USER CAN ONLY DELETE THEIR OWN TICKET
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $ticket->user_id === Auth::id(),
            403
        );

        $ticket->delete();

        return redirect()
            ->route(
                'user.tickets.index'
            )
            ->with(
                'success',
                'Ticket deleted successfully.'
            );
    }
}

