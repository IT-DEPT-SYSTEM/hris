<x-app-layout>

    <x-slot name="header">

        <div style="
            display:flex;
            align-items:center;
            justify-content:space-between;
            width:100%;
        ">

            <div>

                <h2 style="
                    margin:0;
                    font-size:16px;
                    font-weight:600;
                    color:#111827;
                ">
                    Admin Dashboard
                </h2>

                <p style="
                    margin:5px 0 0;
                    color:#6b7280;
                    font-size:14px;
                ">
                    Ticketing System Overview
                </p>

            </div>

        </div>

    </x-slot>


    <style>

        .admin-page {
            min-height:calc(100vh - 70px);
            background:#f5f7fb;
            padding:35px 20px;
        }

        .admin-container {
            max-width:1200px;
            margin:0 auto;
        }


        /* =========================
           SUMMARY CARDS
        ========================= */

        .summary-grid {
            display:grid;
            grid-template-columns:repeat(4, 1fr);
            gap:20px;
            margin-bottom:30px;
        }

        .summary-card {
            background:#ffffff;
            border:1px solid #e5e7eb;
            border-radius:10px;
            padding:22px;
            box-shadow:0 3px 12px rgba(0,0,0,.04);
        }

        .summary-top {
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .summary-label {
            margin:0;
            color:#6b7280;
            font-size:13px;
            font-weight:600;
        }

        .summary-number {
            margin:8px 0 0;
            font-size:30px;
            font-weight:700;
            color:#111827;
        }

        .summary-icon {
            width:45px;
            height:45px;
            border-radius:8px;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:21px;
        }

        .icon-total {
            background:#dbeafe;
            color:#2563eb;
        }

        .icon-new {
            background:#e0e7ff;
            color:#4f46e5;
        }

        .icon-open {
            background:#fef3c7;
            color:#d97706;
        }

        .icon-closed {
            background:#dcfce7;
            color:#16a34a;
        }


        /* =========================
           TABLE CARD
        ========================= */

        .tickets-card {
            background:#ffffff;
            border:1px solid #e5e7eb;
            border-radius:10px;
            box-shadow:0 3px 12px rgba(0,0,0,.04);
            overflow:hidden;
        }

        .tickets-card-header {
            display:flex;
            justify-content:space-between;
            align-items:center;

            padding:20px 24px;

            border-bottom:1px solid #e5e7eb;
        }

        .tickets-card-title {
            margin:0;
            font-size:18px;
            font-weight:700;
            color:#111827;
        }

        .tickets-card-subtitle {
            margin:4px 0 0;
            color:#6b7280;
            font-size:13px;
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width:100%;
            overflow-x:auto;
        }

        .tickets-table {
            width:100%;
            min-width:950px;
            border-collapse:collapse;
        }

        .tickets-table thead {
            background:#f8fafc;
        }

        .tickets-table th {
            padding:14px 18px;

            text-align:left;

            color:#64748b;

            font-size:12px;
            font-weight:700;

            text-transform:uppercase;

            border-bottom:1px solid #e5e7eb;
        }

        .tickets-table td {
            padding:15px 18px;

            color:#374151;

            font-size:14px;

            border-bottom:1px solid #f1f5f9;
        }

        .tickets-table tbody tr:hover {
            background:#f8fafc;
        }


        /* =========================
           TICKET NUMBER
        ========================= */

        .ticket-number {
            color:#2563eb;
            font-weight:700;
        }


        /* =========================
           SUBJECT
        ========================= */

        .ticket-subject {
            color:#111827;
            font-weight:600;
        }


        /* =========================
           USER
        ========================= */

        .user-name {
            color:#374151;
            font-weight:600;
        }

        .user-email {
            display:block;
            margin-top:3px;
            color:#9ca3af;
            font-size:12px;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display:inline-block;

            padding:5px 11px;

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

        .status-default {
            background:#e5e7eb;
            color:#374151;
        }


        /* =========================
           VIEW BUTTON
        ========================= */

        .view-button {
            display:inline-block;

            background:#2563eb;
            color:#ffffff;

            padding:7px 12px;

            border-radius:5px;

            text-decoration:none;

            font-size:12px;
            font-weight:600;
        }

        .view-button:hover {
            background:#1d4ed8;
            color:#ffffff;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty-state {
            text-align:center;
            padding:60px 20px;
        }

        .empty-state-title {
            margin:0;

            font-size:18px;
            font-weight:700;

            color:#111827;
        }

        .empty-state-text {
            margin:7px 0 0;

            color:#6b7280;

            font-size:14px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media(max-width:900px) {

            .summary-grid {
                grid-template-columns:repeat(2, 1fr);
            }

        }

        @media(max-width:600px) {

            .admin-page {
                padding:20px 12px;
            }

            .summary-grid {
                grid-template-columns:1fr;
            }

            .tickets-card-header {
                padding:16px;
            }

        }

    </style>


    <div class="admin-page">

        <div class="admin-container">


            {{-- =========================
                 SUMMARY CARDS
            ========================= --}}

            <div class="summary-grid">


                {{-- TOTAL --}}

                <div class="summary-card">

                    <div class="summary-top">

                        <div>

                            <p class="summary-label">
                                Total Tickets
                            </p>

                            <p class="summary-number">
                                {{ $totalTickets }}
                            </p>

                        </div>

                        <div class="summary-icon icon-total">
                            🎫
                        </div>

                    </div>

                </div>


                {{-- NEW --}}

                <div class="summary-card">

                    <div class="summary-top">

                        <div>

                            <p class="summary-label">
                                New Tickets
                            </p>

                            <p class="summary-number">
                                {{ $newTickets }}
                            </p>

                        </div>

                        <div class="summary-icon icon-new">
                            🆕
                        </div>

                    </div>

                </div>


                {{-- OPEN --}}

                <div class="summary-card">

                    <div class="summary-top">

                        <div>

                            <p class="summary-label">
                                Open Tickets
                            </p>

                            <p class="summary-number">
                                {{ $openTickets }}
                            </p>

                        </div>

                        <div class="summary-icon icon-open">
                            🔓
                        </div>

                    </div>

                </div>


                {{-- CLOSED --}}

                <div class="summary-card">

                    <div class="summary-top">

                        <div>

                            <p class="summary-label">
                                Closed Tickets
                            </p>

                            <p class="summary-number">
                                {{ $closedTickets }}
                            </p>

                        </div>

                        <div class="summary-icon icon-closed">
                            ✓
                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                 RECENT TICKETS
            ========================= --}}

            <div class="tickets-card">


                <div class="tickets-card-header">

                    <div>

                        <h3 class="tickets-card-title">
                            Recent Tickets
                        </h3>

                        <p class="tickets-card-subtitle">
                            Latest tickets submitted by users
                        </p>

                    </div>


                    <a
                        href="{{ route('admin.tickets.index') }}"
                        class="view-button"
                    >
                        View All Tickets
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
                                        User
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


                                        {{-- NUMBER --}}

                                        <td>

                                            <span class="ticket-number">

                                                {{ $ticket->ticket_number }}

                                            </span>

                                        </td>


                                        {{-- USER --}}

                                        <td>

                                            <span class="user-name">

                                                {{ $ticket->user->name }}

                                            </span>

                                            <span class="user-email">

                                                {{ $ticket->user->email }}

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

                                                <span class="status status-default">

                                                    {{ $ticket->status }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- DATE --}}

                                        <td>

                                            {{ $ticket->created_at->format('M d, Y') }}

                                        </td>


                                        {{-- ACTION --}}

                                        <td>

                                            <a
                                                href="{{ route('admin.tickets.show', $ticket) }}"
                                                class="view-button"
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

                        <h3 class="empty-state-title">
                            No Tickets Found
                        </h3>

                        <p class="empty-state-text">
                            There are currently no tickets in the system.
                        </p>

                    </div>

                @endif


            </div>

        </div>

    </div>

</x-app-layout>