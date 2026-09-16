<x-app-layout>

    <x-slot name="header">

        <div class="page-header">

            <div>
                <h2 class="page-title">
                    Create Ticket
                </h2>

                <p class="page-subtitle">
                    Create a new support ticket for a user
                </p>
            </div>

            <a
                href="{{ route('admin.tickets.index') }}"
                class="back-button"
            >
                ← Back to Tickets
            </a>

        </div>

    </x-slot>


    <style>

        /* ========================================
           PAGE
        ======================================== */

        .ticket-page {
            min-height: calc(100vh - 65px);
            background: #f6f7fb;
            padding: 35px 20px 50px;
        }

        .ticket-container {
            width: 100%;
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
            gap: 20px;
        }

        .page-title {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            letter-spacing: -0.3px;
        }

        .page-subtitle {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 9px 14px;

            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 7px;

            color: #374151;
            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition: all .2s ease;
        }

        .back-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }


        /* ========================================
           CARD
        ======================================== */

        .ticket-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;

            box-shadow:
                0 4px 18px rgba(15, 23, 42, .05);

            overflow: hidden;
        }


        /* ========================================
           CARD HEADER
        ======================================== */

        .ticket-card-header {
            display: flex;
            align-items: center;
            gap: 14px;

            padding: 22px 26px;

            border-bottom: 1px solid #e5e7eb;

            background: #ffffff;
        }

        .header-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #ede9fe;
            color: #6d28d9;

            font-size: 20px;
            font-weight: 700;
        }

        .card-heading {
            margin: 0;

            font-size: 16px;
            font-weight: 600;

            color: #111827;
        }

        .card-description {
            margin: 3px 0 0;

            font-size: 13px;

            color: #6b7280;
        }


        /* ========================================
           FORM
        ======================================== */

        .ticket-form {
            padding: 28px 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 24px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;
            font-weight: 650;

            color: #374151;
        }

        .required {
            color: #dc2626;
            margin-left: 2px;
        }


        /* ========================================
           INPUTS
        ======================================== */

        .form-input,
        .form-select,
        .form-textarea {

            width: 100%;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            background: #ffffff;

            color: #111827;

            font-size: 14px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .form-input,
        .form-select {
            height: 46px;
            padding: 0 13px;
        }

        .form-textarea {
            min-height: 150px;
            padding: 13px;

            resize: vertical;

            line-height: 1.5;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #9ca3af;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #6d28d9;

            box-shadow:
                0 0 0 3px rgba(109, 40, 217, .10);
        }

        .form-select {
            cursor: pointer;
        }


        /* ========================================
           DESCRIPTION
        ======================================== */

        .description-info {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-top: 7px;

            font-size: 12px;
            color: #9ca3af;
        }


        /* ========================================
           ERROR
        ======================================== */

        .error-message {
            margin-top: 6px;

            color: #dc2626;

            font-size: 12px;
        }


        /* ========================================
           FOOTER
        ======================================== */

        .ticket-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 18px 30px;

            border-top: 1px solid #e5e7eb;

            background: #fafafa;
        }

        .required-note {
            margin: 0;

            color: #6b7280;

            font-size: 12px;
        }

        .footer-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        /* ========================================
           BUTTONS
        ======================================== */

        .cancel-button,
        .submit-button {

            height: 42px;

            padding: 0 17px;

            border-radius: 7px;

            font-size: 13px;
            font-weight: 650;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            transition: all .2s ease;
        }

        .cancel-button {

            background: #ffffff;

            border: 1px solid #d1d5db;

            color: #374151;
        }

        .cancel-button:hover {
            background: #f3f4f6;
        }

        .submit-button {

            border: 1px solid #5b21b6;

            background: #6d28d9;

            color: #ffffff;
        }

        .submit-button:hover {
            background: #5b21b6;
        }


        /* ========================================
           MOBILE
        ======================================== */

        @media (max-width: 700px) {

            .ticket-page {
                padding: 22px 12px 35px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .back-button {
                width: 100%;
                justify-content: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .form-group.full {
                grid-column: auto;
            }

            .ticket-card-header {
                padding: 19px;
            }

            .ticket-form {
                padding: 22px 19px;
            }

            .ticket-card-footer {
                padding: 17px 19px;

                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .footer-actions {
                width: 100%;
            }

            .cancel-button,
            .submit-button {
                flex: 1;
            }

        }

    </style>


    <div class="ticket-page">

        <div class="ticket-container">

            <div class="ticket-card">


                {{-- =========================================
                     CARD HEADER
                ========================================== --}}

                <div class="ticket-card-header">

                    <div class="header-icon">
                        +
                    </div>

                    <div>

                        <h3 class="card-heading">
                            Admin Create Ticket
                        </h3>

                        <p class="card-description">
                            Submit a support ticket on behalf of a user.
                        </p>

                    </div>

                </div>


                {{-- =========================================
                     FORM
                ========================================== --}}

                <form
                    method="POST"
                    action="{{ route('admin.tickets.store') }}"
                >

                    @csrf

                    <div class="ticket-form">

                        <div class="form-grid">


                            {{-- USER --}}

                            <div class="form-group">

                                <label
                                    for="user_id"
                                    class="form-label"
                                >
                                    User <span class="required">*</span>
                                </label>

                                <select
                                    id="user_id"
                                    name="user_id"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Select User
                                    </option>

                                    @foreach($users as $user)

                                        <option
                                            value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}
                                        >
                                            {{ $user->name }}
                                            — {{ $user->email }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('user_id')

                                    <div class="error-message">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- DEPARTMENT --}}

                            <div class="form-group">

                                <label
                                    for="department_id"
                                    class="form-label"
                                >
                                    Department <span class="required">*</span>
                                </label>

                                <select
                                    id="department_id"
                                    name="department_id"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Select Department
                                    </option>

                                    @foreach($departments as $department)

                                        <option
                                            value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}
                                        >
                                            {{ $department->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('department_id')

                                    <div class="error-message">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- SUBJECT --}}

                            <div class="form-group full">

                                <label
                                    for="subject"
                                    class="form-label"
                                >
                                    Subject <span class="required">*</span>
                                </label>

                                <input
                                    id="subject"
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    class="form-input"
                                    placeholder="Enter a short description of the issue"
                                    maxlength="255"
                                    required
                                >

                                @error('subject')

                                    <div class="error-message">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- DESCRIPTION --}}

                            <div class="form-group full">

                                <label
                                    for="description"
                                    class="form-label"
                                >
                                    Description <span class="required">*</span>
                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    class="form-textarea"
                                    placeholder="Describe the user's issue or request in detail..."
                                    required
                                >{{ old('description') }}</textarea>

                                <div class="description-info">

                                    <span>
                                        Provide as much detail as possible.
                                    </span>

                                    <span>
                                        Required
                                    </span>

                                </div>

                                @error('description')

                                    <div class="error-message">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>


                    {{-- =========================================
                         FOOTER
                    ========================================== --}}

                    <div class="ticket-card-footer">

                        <p class="required-note">
                            <span class="required">*</span>
                            Required fields
                        </p>

                        <div class="footer-actions">

                            <a
                                href="{{ route('admin.tickets.index') }}"
                                class="cancel-button"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="submit-button"
                            >
                                Create Ticket
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>