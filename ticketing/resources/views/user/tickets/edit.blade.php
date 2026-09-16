```blade
<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 style="
                margin:0;
                font-size:24px;
                font-weight:700;
                color:#111827;
            ">
                Edit Ticket
            </h2>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:14px;
            ">
                Update your ticket information
            </p>
        </div>

    </x-slot>


    <style>

        * {
            box-sizing:border-box;
        }

        .ticket-page {
            min-height:calc(100vh - 70px);
            background:#f5f7fb;
            padding:35px 20px;
        }

        .ticket-container {
            max-width:800px;
            margin:0 auto;
        }

        .ticket-card {
            background:#ffffff;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:30px;
            box-shadow:0 4px 15px rgba(0,0,0,.05);
        }

        /* TICKET INFO */

        .ticket-info {
            margin-bottom:25px;
            padding:16px 18px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            border-radius:8px;
        }

        .ticket-info-label {
            display:block;
            margin-bottom:5px;
            color:#6b7280;
            font-size:12px;
            font-weight:600;
            text-transform:uppercase;
            letter-spacing:.04em;
        }

        .ticket-number {
            color:#2563eb;
            font-size:15px;
            font-weight:700;
        }

        /* FORM */

        .form-group {
            margin-bottom:22px;
        }

        .form-label {
            display:block;
            margin-bottom:7px;
            color:#374151;
            font-size:13px;
            font-weight:700;
        }

        .required {
            color:#dc2626;
        }

        .form-input,
        .form-textarea {
            width:100%;
            padding:12px 14px;
            border:1px solid #d1d5db;
            border-radius:7px;
            background:#ffffff;
            color:#111827;
            font-size:14px;
            transition:.2s;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline:none;
            border-color:#2563eb;
            box-shadow:0 0 0 3px rgba(37,99,235,.10);
        }

        .form-textarea {
            min-height:190px;
            resize:vertical;
            line-height:1.6;
        }

        /* FIXED DEPARTMENT */

        .department-box {
            width:100%;
            padding:12px 14px;
            background:#f8fafc;
            border:1px solid #d1d5db;
            border-radius:7px;
            color:#374151;
            font-size:14px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .department-name {
            font-weight:600;
            color:#111827;
        }

        .department-note {
            margin-top:6px;
            color:#6b7280;
            font-size:12px;
        }

        .locked-badge {
            display:inline-flex;
            align-items:center;
            padding:4px 8px;
            border-radius:20px;
            background:#e5e7eb;
            color:#6b7280;
            font-size:11px;
            font-weight:600;
        }

        /* ERRORS */

        .error {
            margin-top:6px;
            color:#dc2626;
            font-size:13px;
        }

        /* BUTTONS */

        .buttons {
            display:flex;
            gap:10px;
            margin-top:28px;
            padding-top:22px;
            border-top:1px solid #e5e7eb;
        }

        .button {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:11px 20px;
            border-radius:7px;
            font-size:14px;
            font-weight:600;
            text-decoration:none;
            border:none;
            cursor:pointer;
            transition:.2s;
        }

        .update-button {
            background:#2563eb;
            color:#ffffff;
        }

        .update-button:hover {
            background:#1d4ed8;
        }

        .cancel-button {
            background:#e5e7eb;
            color:#374151;
        }

        .cancel-button:hover {
            background:#d1d5db;
            color:#111827;
        }

        /* MOBILE */

        @media(max-width:600px) {

            .ticket-page {
                padding:20px 12px;
            }

            .ticket-card {
                padding:20px;
            }

            .department-box {
                align-items:flex-start;
                gap:10px;
                flex-direction:column;
            }

            .buttons {
                flex-direction:column;
            }

            .button {
                width:100%;
            }

        }

    </style>


    <div class="ticket-page">

        <div class="ticket-container">

            <div class="ticket-card">


                {{-- TICKET INFORMATION --}}

                <div class="ticket-info">

                    <span class="ticket-info-label">
                        Ticket Number
                    </span>

                    <span class="ticket-number">
                        {{ $ticket->ticket_number }}
                    </span>

                </div>


                <form
                    method="POST"
                    action="{{ route('user.tickets.update', $ticket) }}"
                >

                    @csrf

                    @method('PUT')


                    {{-- DEPARTMENT --}}

                    <div class="form-group">

                        <label class="form-label">
                            Department
                        </label>

                        <div class="department-box">

                            <span class="department-name">
                                {{ $ticket->department->name ?? 'Not Assigned' }}
                            </span>

                            <span class="locked-badge">
                                🔒 Fixed
                            </span>

                        </div>

                        <div class="department-note">
                            Your department is assigned from your registered account and cannot be changed.
                        </div>

                    </div>


                    {{-- SUBJECT --}}

                    <div class="form-group">

                        <label class="form-label">

                            Subject

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="subject"
                            value="{{ old('subject', $ticket->subject) }}"
                            class="form-input"
                            placeholder="Enter a clear subject for your ticket"
                            maxlength="255"
                            required
                        >

                        @error('subject')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="form-group">

                        <label class="form-label">

                            Description

                            <span class="required">
                                *
                            </span>

                        </label>

                        <textarea
                            name="description"
                            class="form-textarea"
                            placeholder="Describe your issue, request, or concern in detail..."
                            maxlength="10000"
                            required
                        >{{ old('description', $ticket->description) }}</textarea>

                        @error('description')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- BUTTONS --}}

                    <div class="buttons">

                        <button
                            type="submit"
                            class="button update-button"
                        >
                            Update Ticket
                        </button>


                        <a
                            href="{{ route('user.tickets.index') }}"
                            class="button cancel-button"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
```
