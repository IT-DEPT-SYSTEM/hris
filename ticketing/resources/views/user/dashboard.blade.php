<x-app-layout>

    <x-slot name="header">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:15px;
        ">

            <div>

                <h2 style="
                    margin:0;
                    font-size:24px;
                    font-weight:700;
                    color:#111827;
                ">
                    Home
                </h2>

                <p style="
                    margin:5px 0 0;
                    color:#6b7280;
                    font-size:14px;
                ">
                    Welcome back, {{ Auth::user()->name }}
                </p>

            </div>


            <a
                href="{{ route('user.tickets.create') }}"
                style="
                    display:inline-flex;
                    align-items:center;
                    gap:7px;
                    padding:10px 16px;
                    background:#6d28d9;
                    color:#ffffff;
                    border-radius:6px;
                    text-decoration:none;
                    font-size:14px;
                    font-weight:600;
                "
            >
                + Create Ticket
            </a>

        </div>

    </x-slot>


    <style>

        .dashboard-page {
            min-height:calc(100vh - 70px);
            background:#f5f7fb;
            padding:35px 20px;
        }


        .dashboard-container {
            max-width:1200px;
            margin:0 auto;
        }


        .stats-grid {
            display:grid;
            grid-template-columns:
                repeat(4, 1fr);
            gap:20px;
            margin-bottom:25px;
        }


        .stat-card {
            background:#ffffff;
            border:1px solid #e5e7eb;
            border-radius:10px;
            padding:22px;
            box-shadow:
                0 2px 8px rgba(0,0,0,.04);
        }


        .stat-title {
            color:#6b7280;
            font-size:13px;
            font-weight:600;
            margin-bottom:10px;
        }


        .stat-number {
            color:#111827;
            font-size:30px;
            font-weight:700;
        }


        .stat-total {
            border-left:4px solid #6d28d9;
        }


        .stat-new {
            border-left:4px solid #2563eb;
        }


        .stat-open {
            border-left:4px solid #f59e0b;
        }


        .stat-closed {
            border-left:4px solid #16a34a;
        }


        .tickets-card {
            background:#ffffff;
            border:1px solid #e5e7eb;
            border-radius:10px;
            overflow:hidden;
            box-shadow:
                0 2px 8px rgba(0,0,0,.04);
        }


        .tickets-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px 24px;
            border-bottom:1px solid #e5e7eb;
        }


        .tickets-title {
            margin:0;
            font-size:18px;
            font-weight:700;
            color:#111827;
        }


        .view-all {
            color:#6d28d9;
            font-size:14px;
            font-weight:600;
            text-decoration:none;
        }


        .view-all:hover {
            text-decoration:underline;
        }


        .table-wrapper {
            overflow-x:auto;
        }


        .tickets-table {
            width:100%;
            border-collapse:collapse;
        }


        .tickets-table th {
            padding:13px 20px;
            text-align:left;
            background:#f9fafb;
            color:#6b7280;
            font-size:12px;
            font-weight:700;
            text-transform:uppercase;
            white-space:nowrap;
        }


        .tickets-table td {
            padding:15px 20px;
            border-top:1px solid #f1f5f9;
            color:#374151;
            font-size:14px;
        }


        .ticket-number {
            color:#6d28d9;
            font-weight:700;
        }


        .status {
            display:inline-flex;
            padding:5px 10px;
            border-radius:20px;
            font-size:12px;
            font-weight:700;
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


        .status-other {
            background:#f3f4f6;
            color:#4b5563;
        }


        .action-button {
            display:inline-flex;
            padding:6px 11px;
            background:#6d28d9;
            color:#ffffff;
            border-radius:5px;
            text-decoration:none;
            font-size:12px;
            font-weight:600;
        }


        .action-button:hover {
            background:#5b21b6;
        }


        .empty-state {
            padding:50px 20px;
            text-align:center;
        }


        .empty-title {
            color:#374151;
            font-size:16px;
            font-weight:600;
        }


        .empty-text {
            margin-top:6px;
            color:#9ca3af;
            font-size:14px;
        }


        .empty-button {
            display:inline-flex;
            margin-top:18px;
            padding:10px 16px;
            background:#6d28d9;
            color:#ffffff;
            border-radius:6px;
            text-decoration:none;
            font-size:14px;
            font-weight:600;
        }


        @media(max-width:900px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media(max-width:600px) {

            .dashboard-page {
                padding:20px 12px;
            }


            .stats-grid {
                grid-template-columns:1fr;
            }


            .tickets-header {
                padding:18px;
            }


            .tickets-table th,
            .tickets-table td {
                padding:12px;
            }

        }

    </style>


    <div class="dashboard-page">

        <div class="dashboard-container">


            {{-- STATISTICS --}}

            <div class="stats-grid">


                {{-- TOTAL --}}

                <div class="stat-card stat-total">

                    <div class="stat-title">
                        Total Tickets
                    </div>

                    <div class="stat-number">
                        {{ $totalTickets }}
                    </div>

                </div>


                {{-- NEW --}}

                <div class="stat-card stat-new">

                    <div class="stat-title">
                        New Tickets
                    </div>

                    <div class="stat-number">
                        {{ $newTickets }}
                    </div>

                </div>


                {{-- OPEN --}}

                <div class="stat-card stat-open">

                    <div class="stat-title">
                        Open Tickets
                    </div>

                    <div class="stat-number">
                        {{ $openTickets }}
                    </div>

                </div>


                {{-- CLOSED --}}

                <div class="stat-card stat-closed">

                    <div class="stat-title">
                        Closed Tickets
                    </div>

                    <div class="stat-number">
                        {{ $closedTickets }}
                    </div>

                </div>

            </div>


            {{-- RECENT TICKETS --}}

            <div class="tickets-card">


                <div class="tickets-header">

                    <h3 class="tickets-title">
                        Recent Tickets
                    </h3>


                    <a
                        href="{{ route('user.tickets.index') }}"
                        class="view-all"
                    >
                        View All
                    </a>

                </div>


                @if($recentTickets->count() > 0)


                    <div class="table-wrapper">

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
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($recentTickets as $ticket)

                                    <tr>

                                        <td>

                                            <span class="ticket-number">
                                                {{ $ticket->ticket_number }}
                                            </span>

                                        </td>


                                        <td>
                                            {{ $ticket->subject }}
                                        </td>


                                        <td>
                                            {{ $ticket->department->name }}
                                        </td>


                                        <td>

                                            @if($ticket->status === 'New')

                                                <span class="status status-new">
                                                    New
                                                </span>

                                            @elseif($ticket->status === 'Open')

                                                <span class="status status-open">
                                                    Open
                                                </span>

                                            @elseif($ticket->status === 'Closed')

                                                <span class="status status-closed">
                                                    Closed
                                                </span>

                                            @else

                                                <span class="status status-other">
                                                    {{ $ticket->status }}
                                                </span>

                                            @endif

                                        </td>


                                        <td>
                                            {{ $ticket->created_at->format('M d, Y') }}
                                        </td>


                                        <td>

                                            <a
                                                href="{{ route('user.tickets.show', $ticket) }}"
                                                class="action-button"
                                            >
                                                View
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="empty-state">

                        <div class="empty-title">
                            No Tickets Yet
                        </div>

                        <div class="empty-text">
                            You haven't created any tickets.
                        </div>


                        <a
                            href="{{ route('user.tickets.create') }}"
                            class="empty-button"
                        >
                            Create Your First Ticket
                        </a>

                    </div>


                @endif

            </div>

        </div>

    </div>

</x-app-layout>