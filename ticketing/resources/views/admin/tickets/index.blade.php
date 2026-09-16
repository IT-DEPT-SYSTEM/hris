<x-app-layout>

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <x-slot name="header">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="font-semibold text-2xl text-gray-800">
                        All Tickets
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Manage all support tickets
                    </p>

                </div>

                {{-- CREATE TICKET --}}
                <a
                    href="{{ route('admin.tickets.create') }}"
                    style="
                        display:inline-flex;
                        align-items:center;
                        gap:8px;
                        background:#2563eb;
                        color:white;
                        padding:10px 18px;
                        border-radius:7px;
                        font-size:14px;
                        font-weight:600;
                        text-decoration:none;
                    "
                    onmouseover="this.style.background='#1d4ed8'"
                    onmouseout="this.style.background='#2563eb'"
                >
                    <span style="font-size:18px;">+</span>
                    Create Ticket
                </a>

            </div>

        </div>

    </x-slot>


    {{-- =========================================================
         PAGE CONTENT
    ========================================================== --}}
    <div
        style="
            background:#f5f7fb;
            min-height:calc(100vh - 65px);
            padding:30px 0;
        "
    >

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =================================================
                 SUCCESS MESSAGE
            ================================================== --}}
            @if(session('success'))

                <div
                    style="
                        background:#dcfce7;
                        border:1px solid #bbf7d0;
                        color:#166534;
                        padding:14px 16px;
                        border-radius:8px;
                        margin-bottom:20px;
                    "
                >
                    {{ session('success') }}
                </div>

            @endif


            {{-- =================================================
                 ERROR MESSAGE
            ================================================== --}}
            @if(session('error'))

                <div
                    style="
                        background:#fee2e2;
                        border:1px solid #fecaca;
                        color:#991b1b;
                        padding:14px 16px;
                        border-radius:8px;
                        margin-bottom:20px;
                    "
                >
                    {{ session('error') }}
                </div>

            @endif


            {{-- =================================================
                 VALIDATION ERRORS
            ================================================== --}}
            @if($errors->any())

                <div
                    style="
                        background:#fee2e2;
                        border:1px solid #fecaca;
                        color:#991b1b;
                        padding:14px 16px;
                        border-radius:8px;
                        margin-bottom:20px;
                    "
                >

                    <ul style="margin:0; padding-left:20px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =================================================
                 SEARCH / FILTER CARD
            ================================================== --}}
            <div
                style="
                    background:white;
                    border:1px solid #e5e7eb;
                    border-radius:10px;
                    padding:20px;
                    margin-bottom:25px;
                    box-shadow:0 2px 6px rgba(0,0,0,0.04);
                "
            >

                <form
                    method="GET"
                    action="{{ route('admin.tickets.index') }}"
                >

                    <div
                        style="
                            display:grid;
                            grid-template-columns:2fr 1fr 1fr auto auto;
                            gap:12px;
                            align-items:end;
                        "
                    >

                        {{-- SEARCH --}}
                        <div>

                            <label
                                style="
                                    display:block;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#374151;
                                    margin-bottom:7px;
                                "
                            >
                                Search
                            </label>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Ticket #, subject, name, email..."
                                style="
                                    width:100%;
                                    height:42px;
                                    border:1px solid #d1d5db;
                                    border-radius:7px;
                                    padding:0 12px;
                                    font-size:14px;
                                    outline:none;
                                "
                            >

                        </div>


                        {{-- STATUS --}}
                        <div>

                            <label
                                style="
                                    display:block;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#374151;
                                    margin-bottom:7px;
                                "
                            >
                                Status
                            </label>

                            <select
                                name="status"
                                style="
                                    width:100%;
                                    height:42px;
                                    border:1px solid #d1d5db;
                                    border-radius:7px;
                                    padding:0 12px;
                                    font-size:14px;
                                    background:white;
                                "
                            >

                                <option value="">
                                    All Statuses
                                </option>

                                <option
                                    value="New"
                                    {{ request('status') === 'New' ? 'selected' : '' }}
                                >
                                    New
                                </option>

                                <option
                                    value="Open"
                                    {{ request('status') === 'Open' ? 'selected' : '' }}
                                >
                                    Open
                                </option>

                                <option
                                    value="Closed"
                                    {{ request('status') === 'Closed' ? 'selected' : '' }}
                                >
                                    Closed
                                </option>

                            </select>

                        </div>


                        {{-- DEPARTMENT --}}
                        <div>

                            <label
                                style="
                                    display:block;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#374151;
                                    margin-bottom:7px;
                                "
                            >
                                Department
                            </label>

                            <select
                                name="department"
                                style="
                                    width:100%;
                                    height:42px;
                                    border:1px solid #d1d5db;
                                    border-radius:7px;
                                    padding:0 12px;
                                    font-size:14px;
                                    background:white;
                                "
                            >

                                <option value="">
                                    All Departments
                                </option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ request('department') == $department->id ? 'selected' : '' }}
                                    >
                                        {{ $department->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- SEARCH BUTTON --}}
                        <button
                            type="submit"
                            style="
                                height:42px;
                                background:#2563eb;
                                color:white;
                                border:none;
                                border-radius:7px;
                                padding:0 20px;
                                font-size:14px;
                                font-weight:600;
                                cursor:pointer;
                            "
                        >
                            Search
                        </button>


                        {{-- CLEAR BUTTON --}}
                        <a
                            href="{{ route('admin.tickets.index') }}"
                            style="
                                height:42px;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                background:#e5e7eb;
                                color:#374151;
                                border-radius:7px;
                                padding:0 18px;
                                font-size:14px;
                                font-weight:600;
                                text-decoration:none;
                            "
                        >
                            Clear
                        </a>

                    </div>

                </form>

            </div>


            {{-- =================================================
                 TICKET TABLE
            ================================================== --}}
            <div
                style="
                    background:white;
                    border:1px solid #e5e7eb;
                    border-radius:10px;
                    overflow:hidden;
                    box-shadow:0 2px 8px rgba(0,0,0,0.05);
                "
            >

                {{-- TABLE HEADER --}}
                <div
                    style="
                        padding:20px;
                        border-bottom:1px solid #e5e7eb;
                        display:flex;
                        align-items:center;
                        justify-content:space-between;
                    "
                >

                    <div>

                        <h3
                            style="
                                margin:0;
                                font-size:18px;
                                font-weight:700;
                                color:#111827;
                            "
                        >
                            All Tickets
                        </h3>

                    </div>

                    <div
                        style="
                            font-size:13px;
                            color:#6b7280;
                        "
                    >
                        {{ $tickets->total() }}
                        {{ $tickets->total() == 1 ? 'ticket' : 'tickets' }}
                    </div>

                </div>


                {{-- TABLE --}}
                <div style="overflow-x:auto;">

                    <table
                        style="
                            width:100%;
                            border-collapse:collapse;
                            min-width:1000px;
                        "
                    >

                        <thead>

                            <tr
                                style="
                                    background:#f8fafc;
                                    border-bottom:1px solid #e5e7eb;
                                "
                            >

                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Ticket #
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    User
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Subject
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Department
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Status
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Date
                                </th>


                                <th style="
                                    padding:14px 16px;
                                    text-align:left;
                                    font-size:12px;
                                    font-weight:700;
                                    color:#64748b;
                                    text-transform:uppercase;
                                ">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($tickets as $ticket)

                                <tr
                                    style="
                                        border-bottom:1px solid #e5e7eb;
                                    "
                                >

                                    {{-- TICKET NUMBER --}}
                                    <td style="
                                        padding:16px;
                                        font-size:14px;
                                    ">

                                        <a
                                            href="{{ route('admin.tickets.show', $ticket) }}"
                                            style="
                                                color:#2563eb;
                                                font-weight:600;
                                                text-decoration:none;
                                            "
                                        >
                                            {{ $ticket->ticket_number }}
                                        </a>

                                    </td>


                                    {{-- USER --}}
                                    <td style="
                                        padding:16px;
                                        font-size:14px;
                                    ">

                                        @if($ticket->user)

                                            <div
                                                style="
                                                    font-weight:600;
                                                    color:#111827;
                                                "
                                            >
                                                {{ $ticket->user->name }}
                                            </div>

                                            <div
                                                style="
                                                    font-size:12px;
                                                    color:#6b7280;
                                                    margin-top:2px;
                                                "
                                            >
                                                {{ $ticket->user->email }}
                                            </div>

                                        @else

                                            <span style="color:#9ca3af;">
                                                Unknown User
                                            </span>

                                        @endif

                                    </td>


                                    {{-- SUBJECT --}}
                                    <td style="
                                        padding:16px;
                                        font-size:14px;
                                        color:#111827;
                                        font-weight:500;
                                    ">

                                        {{ $ticket->subject }}

                                    </td>


                                    {{-- DEPARTMENT --}}
                                    <td style="
                                        padding:16px;
                                        font-size:14px;
                                        color:#4b5563;
                                    ">

                                        {{ $ticket->department->name ?? 'N/A' }}

                                    </td>


                                    {{-- STATUS --}}
                                    <td style="padding:16px;">

                                        @if($ticket->status === 'New')

                                            <span style="
                                                display:inline-block;
                                                background:#dbeafe;
                                                color:#1d4ed8;
                                                padding:5px 10px;
                                                border-radius:999px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                New
                                            </span>

                                        @elseif($ticket->status === 'Open')

                                            <span style="
                                                display:inline-block;
                                                background:#fef3c7;
                                                color:#b45309;
                                                padding:5px 10px;
                                                border-radius:999px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                Open
                                            </span>

                                        @elseif($ticket->status === 'Closed')

                                            <span style="
                                                display:inline-block;
                                                background:#dcfce7;
                                                color:#15803d;
                                                padding:5px 10px;
                                                border-radius:999px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                Closed
                                            </span>

                                        @else

                                            <span style="
                                                display:inline-block;
                                                background:#f3f4f6;
                                                color:#374151;
                                                padding:5px 10px;
                                                border-radius:999px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                {{ $ticket->status }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE --}}
                                    <td style="
                                        padding:16px;
                                        font-size:14px;
                                        color:#4b5563;
                                        white-space:nowrap;
                                    ">

                                        {{ $ticket->created_at->format('M d, Y') }}

                                    </td>


                                    {{-- ACTIONS --}}
                                    <td style="
                                        padding:16px;
                                        white-space:nowrap;
                                    ">

                                        <div
                                            style="
                                                display:flex;
                                                gap:7px;
                                                align-items:center;
                                            "
                                        >

                                            {{-- VIEW --}}
                                            <a
                                                href="{{ route('admin.tickets.show', $ticket) }}"
                                                style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                    background:#2563eb;
                                                    color:white;
                                                    padding:7px 13px;
                                                    border-radius:6px;
                                                    font-size:12px;
                                                    font-weight:600;
                                                    text-decoration:none;
                                                "
                                            >
                                                View
                                            </a>


                                            {{-- DELETE --}}
                                            <form
                                                method="POST"
                                                action="{{ route('admin.tickets.destroy', $ticket) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this ticket?');"
                                                style="display:inline;"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    style="
                                                        display:inline-flex;
                                                        align-items:center;
                                                        justify-content:center;
                                                        background:#dc2626;
                                                        color:white;
                                                        border:none;
                                                        padding:7px 13px;
                                                        border-radius:6px;
                                                        font-size:12px;
                                                        font-weight:600;
                                                        cursor:pointer;
                                                    "
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        style="
                                            padding:60px 20px;
                                            text-align:center;
                                        "
                                    >

                                        <div
                                            style="
                                                font-size:16px;
                                                font-weight:600;
                                                color:#374151;
                                                margin-bottom:6px;
                                            "
                                        >
                                            No tickets found
                                        </div>

                                        <div
                                            style="
                                                font-size:14px;
                                                color:#9ca3af;
                                            "
                                        >
                                            There are no tickets matching your search or filters.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================== --}}
                @if($tickets->hasPages())

                    <div
                        style="
                            padding:18px 20px;
                            border-top:1px solid #e5e7eb;
                        "
                    >

                        {{ $tickets->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>