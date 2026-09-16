<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - IT Ticketing System</title>


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f4f5f7;
            color: #1f2937;
        }

        .register-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px 20px;
        }

        .register-wrapper {
            width: 100%;
            max-width: 540px;
        }

        /* =========================
           BRAND
        ========================= */

        .brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-logo {
            width: 72px;
            height: 72px;

            margin: 0 auto 16px;

            border: 4px solid #6d28d9;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;

            color: #6d28d9;

            font-size: 28px;
            font-weight: 800;

            box-shadow:
                0 4px 12px rgba(109, 40, 217, 0.12);
        }

        .brand-title {
            margin: 0;

            font-size: 30px;
            line-height: 1.2;

            font-weight: 800;

            color: #5b21b6;

            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            margin: 9px 0 0;

            font-size: 15px;

            color: #6b7280;
        }

        /* =========================
           CARD
        ========================= */

        .register-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 34px 38px;

            box-shadow:
                0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .card-title {
            margin: 0 0 6px;

            font-size: 21px;
            font-weight: 700;

            color: #111827;
        }

        .card-description {
            margin: 0 0 28px;

            font-size: 14px;

            color: #6b7280;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 19px;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            font-size: 14px;
            font-weight: 600;

            color: #374151;
        }

        .form-input,
        .form-select {
            width: 100%;

            height: 46px;

            padding: 0 14px;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            background: #ffffff;

            color: #111827;

            font-size: 14px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #6d28d9;

            box-shadow:
                0 0 0 3px rgba(109, 40, 217, 0.10);
        }

        .form-select {
            cursor: pointer;
        }

        /* =========================
           PASSWORD
        ========================= */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-input {
            padding-right: 70px;
        }

        .password-toggle {
            position: absolute;

            right: 0;
            top: 0;

            height: 46px;

            padding: 0 14px;

            border: 0;

            background: transparent;

            color: #6d28d9;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
        }

        .password-toggle:hover {
            color: #4c1d95;
        }

        /* =========================
           ERRORS
        ========================= */

        .error-message {
            margin-top: 6px;

            font-size: 12px;

            color: #dc2626;
        }

        /* =========================
           BUTTON
        ========================= */

        .register-button {
            width: 100%;

            height: 46px;

            border: 0;

            border-radius: 7px;

            background: #1f2937;

            color: #ffffff;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background .2s ease,
                transform .1s ease;
        }

        .register-button:hover {
            background: #111827;
        }

        .register-button:active {
            transform: translateY(1px);
        }

        /* =========================
           LOGIN LINK
        ========================= */

        .login-section {
            margin-top: 25px;

            padding-top: 22px;

            border-top: 1px solid #e5e7eb;

            text-align: center;
        }

        .login-text {
            margin: 0;

            font-size: 14px;

            color: #6b7280;
        }

        .login-link {
            color: #6d28d9;

            font-weight: 700;

            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .register-page {
                padding: 25px 15px;
            }

            .brand {
                margin-bottom: 22px;
            }

            .brand-logo {
                width: 64px;
                height: 64px;

                font-size: 25px;
            }

            .brand-title {
                font-size: 25px;
            }

            .brand-subtitle {
                font-size: 14px;
            }

            .register-card {
                padding: 28px 22px;

                border-radius: 12px;
            }

        }
    </style>

</head>


<body>

    <div class="register-page">

        <div class="register-wrapper">


            <!-- =========================
             BRAND
        ========================= -->

            <div class="brand">

                <div class="brand-logo">
                    IT
                </div>

                <h1 class="brand-title">
                    IT Ticketing System
                </h1>

                <p class="brand-subtitle">
                    Create your account to submit and manage tickets
                </p>

            </div>


            <!-- =========================
             REGISTER CARD
        ========================= -->

            <div class="register-card">

                <h2 class="card-title">
                    Create an account
                </h2>

                <p class="card-description">
                    Register your account to access the IT Helpdesk.
                </p>


                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    <!-- =========================
                     NAME
                ========================= -->

                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label">
                            Name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-input"
                            placeholder="Enter your full name"
                            required
                            autofocus
                            autocomplete="name">

                        @error('name')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <!-- =========================
                     COMPANY EMAIL
                ========================= -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label">
                            Company Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-input"
                            placeholder="Enter your company email"
                            required
                            autocomplete="username">

                        @error('email')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <!-- =========================
                     DEPARTMENT
                ========================= -->

                    <div class="form-group">

                        <label
                            for="department_id"
                            class="form-label">
                            Department
                        </label>

                        <select
                            id="department_id"
                            name="department_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
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


                    <!-- =========================
                     PASSWORD
                ========================= -->

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label">
                            Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-input"
                                placeholder="Create a password"
                                required
                                autocomplete="new-password">

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password', this)">
                                Show
                            </button>

                        </div>

                        @error('password')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <!-- =========================
                     CONFIRM PASSWORD
                ========================= -->

                    <div class="form-group">

                        <label
                            for="password_confirmation"
                            class="form-label">
                            Confirm Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-input"
                                placeholder="Confirm your password"
                                required
                                autocomplete="new-password">

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password_confirmation', this)">
                                Show
                            </button>

                        </div>

                    </div>


                    <!-- =========================
                     REGISTER
                ========================= -->

                    <button
                        type="submit"
                        class="register-button">
                        CREATE ACCOUNT
                    </button>


                    <!-- =========================
                     LOGIN
                ========================= -->

                    <div class="login-section">

                        <p class="login-text">

                            Already have an account?

                            <a
                                href="{{ route('login') }}"
                                class="login-link">
                                Log in
                            </a>

                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- =========================
     PASSWORD SCRIPT
========================= -->

    <script>
        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            if (input.type === 'password') {

                input.type = 'text';

                button.textContent = 'Hide';

            } else {

                input.type = 'password';

                button.textContent = 'Show';

            }

        }
    </script>

</body>

</html>