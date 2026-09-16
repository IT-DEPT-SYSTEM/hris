<x-app-layout>

    <x-slot name="header">

        <h2 style="
            margin:0;
            font-size:24px;
            font-weight:700;
            color:#111827;
        ">
            Ticket Details
        </h2>

    </x-slot>


    <div style="
        min-height:calc(100vh - 70px);
        background:#f5f7fb;
        padding:35px 20px;
    ">

        <div style="
            max-width:850px;
            margin:0 auto;
        ">


            @if(session('success'))

                <div style="
                    margin-bottom:20px;
                    padding:14px;
                    background:#ecfdf5;
                    border:1px solid #a7f3d0;
                    color:#047857;
                    border-radius:7px;
                ">
                    {{ session('success') }}
                </div>

            @endif


            <div style="
                background:#ffffff;
                border:1px solid #e5e7eb;
                border-radius:10px;
                overflow:hidden;
            ">


                {{-- HEADER --}}

                <div style="
                    padding:25px;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    border-bottom:1px solid #e5e7eb;
                ">

                    <div>

                        <div style="
                            color:#6b7280;
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                        ">
                            Ticket Number
                        </div>

                        <div style="
                            margin-top:4px;
                            color:#2563eb;
                            font-size:23px;
                            font-weight:700;
                        ">
                            {{ $ticket->ticket_number }}
                        </div>

                    </div>


                    @if($ticket->status === 'New')

                        <span style="
                            padding:7px 14px;
                            border-radius:20px;
                            background:#dbeafe;
                            color:#1d4ed8;
                            font-size:12px;
                            font-weight:700;
                        ">
                            New
                        </span>

                    @elseif($ticket->status === 'Open')

                        <span style="
                            padding:7px 14px;
                            border-radius:20px;
                            background:#fef3c7;
                            color:#b45309;
                            font-size:12px;
                            font-weight:700;
                        ">
                            Open
                        </span>

                    @elseif($ticket->status === 'Closed')

                        <span style="
                            padding:7px 14px;
                            border-radius:20px;
                            background:#dcfce7;
                            color:#15803d;
                            font-size:12px;
                            font-weight:700;
                        ">
                            Closed
                        </span>

                    @endif

                </div>


                {{-- BODY --}}

                <div style="padding:28px;">


                    <div style="margin-bottom:25px;">

                        <div style="
                            color:#6b7280;
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                            margin-bottom:6px;
                        ">
                            Department
                        </div>

                        <div style="
                            color:#111827;
                            font-size:15px;
                        ">
                            {{ $ticket->department->name }}
                        </div>

                    </div>


                    <div style="margin-bottom:25px;">

                        <div style="
                            color:#6b7280;
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                            margin-bottom:6px;
                        ">
                            Subject
                        </div>

                        <div style="
                            color:#111827;
                            font-size:19px;
                            font-weight:700;
                        ">
                            {{ $ticket->subject }}
                        </div>

                    </div>


                    <div style="margin-bottom:25px;">

                        <div style="
                            color:#6b7280;
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                            margin-bottom:6px;
                        ">
                            Description
                        </div>

                        <div style="
                            padding:18px;
                            background:#f8fafc;
                            border:1px solid #e5e7eb;
                            border-radius:8px;
                            color:#374151;
                            line-height:1.7;
                            white-space:pre-line;
                        ">
                            {{ $ticket->description }}
                        </div>

                    </div>


                    <div>

                        <div style="
                            color:#6b7280;
                            font-size:12px;
                            font-weight:700;
                            text-transform:uppercase;
                            margin-bottom:6px;
                        ">
                            Created
                        </div>

                        <div style="
                            color:#374151;
                            font-size:14px;
                        ">
                            {{ $ticket->created_at->format('F d, Y h:i A') }}
                        </div>

                    </div>

                </div>


                {{-- ACTIONS --}}

                <div style="
                    padding:20px 25px;
                    border-top:1px solid #e5e7eb;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    gap:10px;
                ">


                    <a
                        href="{{ route('user.tickets.index') }}"
                        style="
                            display:inline-flex;
                            padding:10px 16px;
                            background:#e5e7eb;
                            color:#374151;
                            border-radius:6px;
                            text-decoration:none;
                            font-size:14px;
                            font-weight:600;
                        "
                    >
                        ← Back
                    </a>


                    @if($ticket->status !== 'Closed')

                        <div style="
                            display:flex;
                            gap:8px;
                        ">


                            <a
                                href="{{ route('user.tickets.edit', $ticket) }}"
                                style="
                                    display:inline-flex;
                                    padding:10px 16px;
                                    background:#2563eb;
                                    color:#ffffff;
                                    border-radius:6px;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:600;
                                "
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route('user.tickets.destroy', $ticket) }}"
                                onsubmit="return confirm('Delete this ticket?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    style="
                                        padding:10px 16px;
                                        background:#dc2626;
                                        color:#ffffff;
                                        border:none;
                                        border-radius:6px;
                                        font-size:14px;
                                        font-weight:600;
                                        cursor:pointer;
                                    "
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>