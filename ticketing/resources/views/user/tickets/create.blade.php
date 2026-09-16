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
                Create Ticket
            </h2>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:14px;
            ">
                Submit a support request to your department
            </p>
        </div>

    </x-slot>


    <style>

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
            box-shadow:0 4px 16px rgba(0,0,0,.05);
        }

        .form-group {
            margin-bottom:22px;
        }

        .form-label {
            display:block;
            margin-bottom:8px;
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
            box-sizing:border-box;

            padding:12px 14px;

            border:1px solid #d1d5db;
            border-radius:7px;

            background:#ffffff;
            color:#111827;

            font-size:14px;

            transition:
                border-color .2s,
                box-shadow .2s;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color:#9ca3af;
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


        /* =========================
           DEPARTMENT DISPLAY
        ========================= */

        .department-box {
            display:flex;
            align-items:center;
            gap:13px;

            width:100%;
            box-sizing:border-box;

            padding:13px 15px;

            background:#f8fafc;
            border:1px solid #d1d5db;
            border-radius:7px;
        }

        .department-icon {
            width:40px;
            height:40px;

            flex-shrink:0;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:8px;

            background:#eef2ff;
            color:#4f46e5;

            font-size:18px;
        }

        .department-info {
            min-width:0;
        }

        .department-name {
            color:#111827;
            font-size:14px;
            font-weight:700;
        }

        .department-note {
            margin-top:3px;
            color:#6b7280;
            font-size:12px;
        }

        .no-department {
            padding:13px 15px;

            background:#fef2f2;
            border:1px solid #fecaca;
            border-radius:7px;

            color:#b91c1c;
            font-size:14px;
            line-height:1.5;
        }


        /* =========================
           ERRORS
        ========================= */

        .error {
            margin-top:6px;
            color:#dc2626;
            font-size:13px;
        }


        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display:flex;
            justify-content:flex-end;
            align-items:center;

            gap:10px;

            margin-top:28px;
            padding-top:22px;

            border-top:1px solid #e5e7eb;
        }

        .button {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:7px;

            min-height:42px;

            padding:10px 18px;

            border-radius:7px;

            font-size:14px;
            font-weight:600;

            text-decoration:none;

            border:none;

            cursor:pointer;

            transition:
                background .2s,
                transform .1s;
        }

        .button:active {
            transform:translateY(1px);
        }

        .submit-button {
            background:#2563eb;
            color:#ffffff;
        }

        .submit-button:hover {
            background:#1d4ed8;
            color:#ffffff;
        }

        .submit-button:disabled {
            background:#9ca3af;
            cursor:not-allowed;
        }

        .cancel-button {
            background:#ffffff;
            color:#374151;

            border:1px solid #d1d5db;
        }

        .cancel-button:hover {
            background:#f9fafb;
            color:#111827;
        }


        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            display:flex;
            align-items:flex-start;
            gap:10px;

            margin-bottom:24px;

            padding:13px 15px;

            background:#eff6ff;
            border:1px solid #bfdbfe;
            border-radius:7px;

            color:#1e40af;

            font-size:13px;
            line-height:1.5;
        }

        .info-icon {
            flex-shrink:0;
            font-size:16px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media(max-width:600px) {

            .ticket-page {
                padding:20px 12px;
            }

            .ticket-card {
                padding:20px;
            }

            .buttons {
                flex-direction:column-reverse;
                align-items:stretch;
            }

            .button {
                width:100%;
            }

        }

    </style>


    <div class="ticket-page">

        <div class="ticket-container">

            <div class="ticket-card">


                {{-- INFORMATION --}}

                <div class="info-box">

                    <div class="info-icon">
                        ℹ️
                    </div>

                    <div>
                        Your ticket will automatically be assigned to the
                        department registered on your account.
                        You cannot change the department when submitting a ticket.
                    </div>

                </div>


                <form
                    method="POST"
                    action="{{ route('user.tickets.store') }}"
                >

                    @csrf


                    {{-- =========================
                         DEPARTMENT
                    ========================== --}}

                    <div class="form-group">

                        <label class="form-label">
                            Department
                        </label>


                        @if($department)

                            <div class="department-box">

                                <div class="department-icon">
                                    🏢
                                </div>

                                <div class="department-info">

                                    <div class="department-name">
                                        {{ $department->name }}
                                    </div>

                                    <div class="department-note">
                                        Automatically assigned from your account
                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="no-department">

                                Your account does not have a department
                                assigned.

                                Please contact the administrator before
                                creating a ticket.

                            </div>

                        @endif


                        @error('department_id')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =========================
                         SUBJECT
                    ========================== --}}

                    <div class="form-group">

                        <label
                            for="subject"
                            class="form-label"
                        >

                            Subject

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            class="form-input"
                            placeholder="Example: Computer is not connecting to the internet"
                            maxlength="255"
                            required
                        >


                        @error('subject')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =========================
                         DESCRIPTION
                    ========================== --}}

                    <div class="form-group">

                        <label
                            for="description"
                            class="form-label"
                        >

                            Description

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            id="description"
                            name="description"
                            class="form-textarea"
                            placeholder="Please describe your problem or request in detail. Include error messages, what you were doing when the issue occurred, and any other information that may help the support team."
                            maxlength="10000"
                            required
                        >{{ old('description') }}</textarea>


                        @error('description')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =========================
                         BUTTONS
                    ========================== --}}

                    <div class="buttons">

                        <a
                            href="{{ route('user.tickets.index') }}"
                            class="button cancel-button"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="button submit-button"
                            @if(!$department) disabled @endif
                        >
                            🎫
                            Submit Ticket
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
```
