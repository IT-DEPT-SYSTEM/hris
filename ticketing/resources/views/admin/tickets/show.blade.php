<x-app-layout>

    <x-slot name="header">

        <div class="page-header">

            <div>
                <h2 class="page-title">
                    Ticket Details
                </h2>

                <p class="page-subtitle">
                    Admin Ticket Management
                </p>
            </div>

            <a
                href="{{ route('admin.tickets.index') }}"
                class="header-back"
            >
                ← All Tickets
            </a>

        </div>

    </x-slot>


    <style>

        /* ========================================
           PAGE
        ======================================== */

        .ticket-page {
            min-height: calc(100vh - 65px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .ticket-container {
            max-width: 1000px;
            margin: 0 auto;
        }


        /* ========================================
           HEADER
        ======================================== */

        .page-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .page-title {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #111827;
        }

        .page-subtitle {
            margin: 5px 0 0;
            font-size: 14px;
            color: #6b7280;
        }

        .header-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 14px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all .2s ease;
        }

        .header-back:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }


        /* ========================================
           MAIN CARD
        ======================================== */

        .ticket-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .05);
        }


        /* ========================================
           TICKET TOP
        ======================================== */

        .ticket-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 28px;
            border-bottom: 1px solid #e5e7eb;
        }

        .ticket-label {
            margin: 0 0 7px;
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .ticket-number {
            margin: 0;
            font-size: 23px;
            font-weight: 700;
            color: #4f46e5;
        }


        /* ========================================
           STATUS BADGES
        ======================================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 13px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-new {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-new .status-dot {
            background: #2563eb;
        }

        .status-open {
            background: #fef3c7;
            color: #b45309;
        }

        .status-open .status-dot {
            background: #d97706;
        }

        .status-closed {
            background: #dcfce7;
            color: #15803d;
        }

        .status-closed .status-dot {
            background: #16a34a;
        }

        .status-default {
            background: #e5e7eb;
            color: #374151;
        }

        .status-default .status-dot {
            background: #6b7280;
        }


        /* ========================================
           INFORMATION
        ======================================== */

        .ticket-content {
            padding: 28px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px 40px;
        }

        .info-item {
            min-width: 0;
        }

        .info-item.full {
            grid-column: 1 / -1;
        }

        .info-label {
            margin: 0 0 8px;
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .info-value {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        .info-secondary {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            font-weight: 400;
            color: #6b7280;
        }


        /* ========================================
           SUBJECT
        ======================================== */

        .subject-value {
            font-size: 17px;
            font-weight: 700;
            color: #111827;
        }


        /* ========================================
           DESCRIPTION
        ======================================== */

        .description-box {
            margin-top: 2px;
            padding: 18px;
            min-height: 120px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #f8fafc;
            color: #374151;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-wrap;
        }


        /* ========================================
           STATUS UPDATE
        ======================================== */

        .status-section {
            padding: 24px 28px;
            background: #f8fafc;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-title {
            margin: 0 0 14px;
            font-size: 14px;
            font-weight: 700;
            color: #111827;
        }

        .status-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-select {
            height: 40px;
            min-width: 170px;
            padding: 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: #ffffff;
            color: #374151;
            font-size: 13px;
            outline: none;
        }

        .status-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
        }

        .update-button {
            height: 40px;
            padding: 0 17px;
            border: 0;
            border-radius: 7px;
            background: #4f46e5;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s ease;
        }

        .update-button:hover {
            background: #4338ca;
        }


        /* ========================================
           FOOTER ACTIONS
        ======================================== */

        .ticket-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 28px;
            background: #ffffff;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 14px;
            border-radius: 7px;
            background: #f3f4f6;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all .2s ease;
        }

        .back-button:hover {
            background: #e5e7eb;
        }

        .delete-button {
            padding: 9px 16px;
            border: 0;
            border-radius: 7px;
            background: #dc2626;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s ease;
        }

        .delete-button:hover {
            background: #b91c1c;
        }


        /* ========================================
           SUCCESS MESSAGE
        ======================================== */

        .success-message {
            margin-bottom: 18px;
            padding: 12px 15px;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
            font-weight: 500;
        }


        /* ========================================
           ERROR MESSAGE
        ======================================== */

        .error-message {
            margin-bottom: 18px;
            padding: 12px 15px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 13px;
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 700px) {

            .ticket-page {
                padding: 25px 14px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

            .page-title {
                font-size: 20px;
            }

            .header-back {
                display: none;
            }

            .ticket-top {
                padding: 20px;
                align-items: flex-start;
                gap: 15px;
            }

            .ticket-number {
                font-size: 19px;
            }

            .ticket-content {
                padding: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .info-item.full {
                grid-column: auto;
            }

            .status-section {
                padding: 20px;
            }

            .status-form {
                flex-direction: column;
                align-items: stretch;
            }

            .status-select {
                width: 100%;
            }

            .update-button {
                width: 100%;
            }

            .ticket-actions {
                padding: 18px 20px;
                gap: 10px;
            }

            .back-button,
            .delete-button {
                flex: 1;
                justify-content: center;
                text-align: center;
            }

        }

    </style>


    <div class="ticket-page">

        <div class="ticket-container">


            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>

            @endif


            {{-- ERROR MESSAGE --}}

            @if(session('error'))

                <div class="error-message">
                    {{ session('error') }}
                </div>

            @endif


            {{-- VALIDATION ERRORS --}}

            @if($errors->any())

                <div class="error-message">

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif


            <!-- ========================================
                 TICKET CARD
            ========================================= -->

            <div class="ticket-card">


                <!-- TOP -->

                <div class="ticket-top">

                    <div>

                        <p class="ticket-label">
                            Ticket Number
                        </p>

                        <h1 class="ticket-number">
                            {{ $ticket->ticket_number }}
                        </h1>

                    </div>


                    {{-- STATUS --}}

                    @if($ticket->status === 'New')

                        <span class="status-badge status-new">
                            <span class="status-dot"></span>
                            New
                        </span>

                    @elseif($ticket->status === 'Open')

                        <span class="status-badge status-open">
                            <span class="status-dot"></span>
                            Open
                        </span>

                    @elseif($ticket->status === 'Closed')

                        <span class="status-badge status-closed">
                            <span class="status-dot"></span>
                            Closed
                        </span>

                    @else

                        <span class="status-badge status-default">
                            <span class="status-dot"></span>
                            {{ $ticket->status }}
                        </span>

                    @endif

                </div>


                <!-- INFORMATION -->

                <div class="ticket-content">

                    <div class="info-grid">


                        <!-- SUBMITTED BY -->

                        <div class="info-item">

                            <p class="info-label">
                                Submitted By
                            </p>

                            <p class="info-value">

                                {{ $ticket->user->name }}

                                <span class="info-secondary">
                                    {{ $ticket->user->email }}
                                </span>

                            </p>

                        </div>


                        <!-- DEPARTMENT -->

                        <div class="info-item">

                            <p class="info-label">
                                Department
                            </p>

                            <p class="info-value">

                                {{ $ticket->department->name }}

                            </p>

                        </div>


                        <!-- SUBJECT -->

                        <div class="info-item full">

                            <p class="info-label">
                                Subject
                            </p>

                            <p class="info-value subject-value">
                                {{ $ticket->subject }}
                            </p>

                        </div>


                        <!-- DESCRIPTION -->

                        <div class="info-item full">

                            <p class="info-label">
                                Description
                            </p>

                            <div class="description-box">
                                {{ $ticket->description }}
                            </div>

                        </div>


                        <!-- CREATED DATE -->

                        <div class="info-item">

                            <p class="info-label">
                                Submitted Date
                            </p>

                            <p class="info-value">

                                {{ $ticket->created_at->format('F d, Y h:i A') }}

                            </p>

                        </div>


                        <!-- UPDATED DATE -->

                        <div class="info-item">

                            <p class="info-label">
                                Last Updated
                            </p>

                            <p class="info-value">

                                {{ $ticket->updated_at->format('F d, Y h:i A') }}

                            </p>

                        </div>


                    </div>

                </div>


                <!-- STATUS UPDATE -->

                <div class="status-section">

                    <h3 class="section-title">
                        Update Ticket Status
                    </h3>


                    <form
                        method="POST"
                        action="{{ route('admin.tickets.updateStatus', $ticket) }}"
                        class="status-form"
                    >

                        @csrf
                        @method('PATCH')


                        <select
                            name="status"
                            class="status-select"
                            required
                        >

                            <option
                                value="New"
                                {{ $ticket->status === 'New' ? 'selected' : '' }}
                            >
                                New
                            </option>

                            <option
                                value="Open"
                                {{ $ticket->status === 'Open' ? 'selected' : '' }}
                            >
                                Open
                            </option>

                            <option
                                value="Closed"
                                {{ $ticket->status === 'Closed' ? 'selected' : '' }}
                            >
                                Closed
                            </option>

                        </select>


                        <button
                            type="submit"
                            class="update-button"
                        >
                            Update Status
                        </button>

                    </form>

                </div>


                <!-- ACTIONS -->

                <div class="ticket-actions">


                    <a
                        href="{{ route('admin.tickets.index') }}"
                        class="back-button"
                    >
                        ← Back to All Tickets
                    </a>


                    <form
                        method="POST"
                        action="{{ route('admin.tickets.destroy', $ticket) }}"
                        onsubmit="return confirm('Are you sure you want to delete this ticket? This action cannot be undone.');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                        >
                            Delete Ticket
                        </button>

                    </form>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>