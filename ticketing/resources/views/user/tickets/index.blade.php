<x-app-layout>

```
<x-slot name="header">

    <div style="
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:20px;
        width:100%;
    ">

        <div>
            <h2 style="
                margin:0;
                font-size:24px;
                font-weight:700;
                color:#111827;
            ">
                My Tickets
            </h2>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:14px;
            ">
                View and manage your support tickets
            </p>
        </div>

    </div>

</x-slot>


<style>

    * {
        box-sizing:border-box;
    }

    .tickets-page {
        min-height:calc(100vh - 70px);
        background:#f5f7fb;
        padding:35px 20px;
    }

    .tickets-container {
        max-width:1200px;
        margin:0 auto;
    }


    /* SUCCESS */

    .success-alert {
        background:#ecfdf5;
        border:1px solid #a7f3d0;
        color:#047857;
        padding:14px 18px;
        border-radius:8px;
        margin-bottom:20px;
        font-size:14px;
    }


    /* CARD */

    .tickets-card {
        background:#ffffff;
        border-radius:10px;
        border:1px solid #e5e7eb;
        box-shadow:0 3px 12px rgba(0,0,0,.05);
        overflow:hidden;
    }


    /* CARD HEADER */

    .tickets-card-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:20px;
        padding:20px 24px;
        border-bottom:1px solid #e5e7eb;
    }

    .tickets-card-title {
        margin:0;
        font-size:18px;
        font-weight:700;
        color:#111827;
    }

    .tickets-total {
        font-size:13px;
        color:#6b7280;
    }


    /* =========================
       SEARCH AREA
    ========================= */

    .search-area {
        padding:18px 24px;
        background:#ffffff;
        border-bottom:1px solid #e5e7eb;
    }

    .search-form {
        display:flex;
        align-items:center;
        gap:10px;
        width:100%;
    }

    .search-input-wrapper {
        position:relative;
        flex:1;
    }

    .search-icon {
        position:absolute;
        left:14px;
        top:50%;
        transform:translateY(-50%);
        width:18px;
        height:18px;
        color:#9ca3af;
        pointer-events:none;
    }

    .search-input {
        width:100%;
        height:42px;
        padding:0 14px 0 42px;
        border:1px solid #d1d5db;
        border-radius:7px;
        background:#ffffff;
        color:#111827;
        font-size:14px;
        outline:none;
        transition:.2s;
    }

    .search-input::placeholder {
        color:#9ca3af;
    }

    .search-input:focus {
        border-color:#2563eb;
        box-shadow:0 0 0 3px rgba(37,99,235,.10);
    }

    .search-button {
        height:42px;
        padding:0 18px;
        border:none;
        border-radius:7px;
        background:#2563eb;
        color:#ffffff;
        font-size:14px;
        font-weight:600;
        cursor:pointer;
        transition:.2s;
    }

    .search-button:hover {
        background:#1d4ed8;
    }

    .clear-button {
        height:42px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:0 16px;
        border:1px solid #d1d5db;
        border-radius:7px;
        background:#ffffff;
        color:#374151;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
    }

    .clear-button:hover {
        background:#f9fafb;
        color:#111827;
    }


    /* SEARCH RESULT */

    .search-result {
        margin-top:10px;
        font-size:13px;
        color:#6b7280;
    }

    .search-result strong {
        color:#111827;
    }


    /* TABLE */

    .table-container {
        width:100%;
        overflow-x:auto;
    }

    .tickets-table {
        width:100%;
        border-collapse:collapse;
        min-width:900px;
    }

    .tickets-table thead {
        background:#f8fafc;
    }

    .tickets-table th {
        padding:14px 20px;
        text-align:left;
        font-size:12px;
        font-weight:700;
        color:#64748b;
        text-transform:uppercase;
        letter-spacing:.04em;
        border-bottom:1px solid #e5e7eb;
    }

    .tickets-table td {
        padding:16px 20px;
        font-size:14px;
        color:#374151;
        border-bottom:1px solid #f1f5f9;
        vertical-align:middle;
    }

    .tickets-table tbody tr:hover {
        background:#f8fafc;
    }


    /* TICKET NUMBER */

    .ticket-number {
        color:#2563eb;
        font-weight:700;
        white-space:nowrap;
    }


    /* SUBJECT */

    .ticket-subject {
        color:#111827;
        font-weight:600;
    }


    /* STATUS */

    .status-badge {
        display:inline-block;
        padding:5px 11px;
        border-radius:20px;
        font-size:12px;
        font-weight:700;
        white-space:nowrap;
    }

    .status-new {
        background:#dbeafe;
        color:#1d4ed8;
    }

    .status-open {
        background:#fef3c7;
        color:#b45309;
    }

    .status-closed {
        background:#dcfce7;
        color:#15803d;
    }

    .status-default {
        background:#e5e7eb;
        color:#374151;
    }


    /* ACTION BUTTONS */

    .ticket-actions {
        display:flex;
        align-items:center;
        gap:7px;
        white-space:nowrap;
    }

    .ticket-action {
        display:inline-block;
        padding:7px 12px;
        border-radius:5px;
        text-decoration:none;
        border:none;
        font-size:12px;
        font-weight:600;
        line-height:1;
        cursor:pointer;
    }

    .view-button {
        background:#2563eb;
        color:#ffffff;
    }

    .view-button:hover {
        background:#1d4ed8;
        color:#ffffff;
    }

    .edit-button {
        background:#f59e0b;
        color:#ffffff;
    }

    .edit-button:hover {
        background:#d97706;
        color:#ffffff;
    }

    .delete-button {
        background:#dc2626;
        color:#ffffff;
    }

    .delete-button:hover {
        background:#b91c1c;
    }


    /* EMPTY */

    .empty-state {
        text-align:center;
        padding:70px 20px;
    }

    .empty-icon {
        width:70px;
        height:70px;
        margin:0 auto 18px;
        border-radius:50%;
        background:#eff6ff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:30px;
    }

    .empty-title {
        margin:0;
        font-size:20px;
        font-weight:700;
        color:#111827;
    }

    .empty-description {
        margin:8px 0 22px;
        color:#6b7280;
        font-size:14px;
    }

    .empty-create-button {
        display:inline-flex;
        align-items:center;
        gap:8px;
        background:#2563eb;
        color:#ffffff;
        padding:11px 18px;
        border-radius:7px;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
    }

    .empty-create-button:hover {
        background:#1d4ed8;
        color:#ffffff;
    }


    /* PAGINATION */

    .pagination-container {
        padding:18px 24px;
        border-top:1px solid #e5e7eb;
    }


    /* MOBILE */

    @media(max-width:768px) {

        .tickets-page {
            padding:20px 12px;
        }

        .tickets-card-header {
            padding:16px;
        }

        .search-area {
            padding:16px;
        }

        .search-form {
            flex-direction:column;
            align-items:stretch;
        }

        .search-button,
        .clear-button {
            width:100%;
        }

        .tickets-table th,
        .tickets-table td {
            padding:12px;
        }

    }

</style>


<div class="tickets-page">

    <div class="tickets-container">


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-alert">
                {{ session('success') }}
            </div>

        @endif


        {{-- MAIN CARD --}}

        <div class="tickets-card">


            {{-- CARD HEADER --}}

            <div class="tickets-card-header">

                <h3 class="tickets-card-title">
                    All Tickets
                </h3>

                @if($tickets->total() > 0)

                    <span class="tickets-total">

                        {{ $tickets->total() }}

                        {{ $tickets->total() == 1 ? 'ticket' : 'tickets' }}

                    </span>

                @endif

            </div>


            {{-- =========================
                 SEARCH
            ========================= --}}

            <div class="search-area">

                <form
                    method="GET"
                    action="{{ route('user.tickets.index') }}"
                    class="search-form"
                >

                    <div class="search-input-wrapper">

                        <svg
                            class="search-icon"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z"
                            />
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="search-input"
                            placeholder="Search ticket number, subject, or description..."
                            autocomplete="off"
                        >

                    </div>


                    <button
                        type="submit"
                        class="search-button"
                    >
                        Search
                    </button>


                    @if(request('search'))

                        <a
                            href="{{ route('user.tickets.index') }}"
                            class="clear-button"
                        >
                            Clear
                        </a>

                    @endif

                </form>


                @if(request('search'))

                    <div class="search-result">

                        Search results for:
                        <strong>"{{ request('search') }}"</strong>

                        — {{ $tickets->total() }}
                        {{ $tickets->total() == 1 ? 'ticket' : 'tickets' }}
                        found.

                    </div>

                @endif

            </div>


            {{-- HAS TICKETS --}}

            @if($tickets->count() > 0)

                <div class="table-container">

                    <table class="tickets-table">

                        <thead>

                            <tr>

                                <th>
                                    Ticket #
                                </th>

                                <th>
                                    Subject
                                </th>

                                <th>
                                    Department
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($tickets as $ticket)

                                <tr>

                                    {{-- TICKET NUMBER --}}

                                    <td>

                                        <span class="ticket-number">
                                            {{ $ticket->ticket_number }}
                                        </span>

                                    </td>


                                    {{-- SUBJECT --}}

                                    <td>

                                        <span class="ticket-subject">
                                            {{ $ticket->subject }}
                                        </span>

                                    </td>


                                    {{-- DEPARTMENT --}}

                                    <td>

                                        {{ $ticket->department->name }}

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @if($ticket->status === 'New')

                                            <span class="status-badge status-new">
                                                New
                                            </span>

                                        @elseif($ticket->status === 'Open')

                                            <span class="status-badge status-open">
                                                Open
                                            </span>

                                        @elseif($ticket->status === 'Closed')

                                            <span class="status-badge status-closed">
                                                Closed
                                            </span>

                                        @else

                                            <span class="status-badge status-default">
                                                {{ $ticket->status }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE --}}

                                    <td>

                                        {{ $ticket->created_at->format('M d, Y') }}

                                    </td>


                                    {{-- ACTIONS --}}

                                    <td>

                                        <div class="ticket-actions">


                                            {{-- VIEW --}}

                                            <a
                                                href="{{ route('user.tickets.show', $ticket) }}"
                                                class="ticket-action view-button"
                                            >
                                                View
                                            </a>


                                            {{-- EDIT --}}

                                            @if($ticket->status !== 'Closed')

                                                <a
                                                    href="{{ route('user.tickets.edit', $ticket) }}"
                                                    class="ticket-action edit-button"
                                                >
                                                    Edit
                                                </a>

                                            @endif


                                            {{-- DELETE --}}

                                            <form
                                                method="POST"
                                                action="{{ route('user.tickets.destroy', $ticket) }}"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this ticket?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="ticket-action delete-button"
                                                >
                                                    Delete
                                                </button>

                                            </form>


                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}

                @if($tickets->hasPages())

                    <div class="pagination-container">

                        {{ $tickets->links() }}

                    </div>

                @endif


            @else


                {{-- EMPTY STATE --}}

                <div class="empty-state">

                    <div class="empty-icon">
                        🎫
                    </div>

                    @if(request('search'))

                        <h3 class="empty-title">
                            No Tickets Found
                        </h3>

                        <p class="empty-description">
                            No tickets match your search for
                            "<strong>{{ request('search') }}</strong>".
                        </p>

                        <a
                            href="{{ route('user.tickets.index') }}"
                            class="empty-create-button"
                        >
                            Clear Search
                        </a>

                    @else

                        <h3 class="empty-title">
                            No Tickets Yet
                        </h3>

                        <p class="empty-description">
                            You haven't submitted any support tickets yet.
                        </p>

                        <a
                            href="{{ route('user.tickets.create') }}"
                            class="empty-create-button"
                        >
                            <span style="font-size:18px;">+</span>
                            Create Your First Ticket
                        </a>

                    @endif

                </div>

            @endif


        </div>

    </div>

</div>
```

</x-app-layout>
