<x-guest-layout>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6fa;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 460px;
        }

        /* =========================
           BRAND
        ========================= */

        .brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-logo {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 4px solid #6d28d9;
            border-radius: 50%;

            background: #ffffff;

            color: #6d28d9;

            font-size: 27px;
            font-weight: 800;

            box-shadow:
                0 5px 15px rgba(109, 40, 217, 0.15);
        }

        .brand-title {
            margin: 0;

            color: #5b21b6;

            font-size: 32px;
            font-weight: 800;

            letter-spacing: -0.7px;
        }

        .brand-subtitle {
            margin: 8px 0 0;

            color: #6b7280;

            font-size: 15px;
        }

        /* =========================
           LOGIN CARD
        ========================= */

        .login-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 34px 38px;

            box-shadow:
                0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .login-heading {
            margin: 0 0 25px;

            color: #111827;

            font-size: 20px;
            font-weight: 700;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #374151;

            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;

            height: 48px;

            padding: 0 14px;

            border: 1px solid #d1d5db;

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

        .form-input:focus {
            border-color: #7c3aed;

            box-shadow:
                0 0 0 3px rgba(124, 58, 237, 0.12);
        }

        /* =========================
           PASSWORD
        ========================= */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-input {
            padding-right: 65px;
        }

        .password-toggle {
            position: absolute;

            right: 10px;
            top: 50%;

            transform: translateY(-50%);

            border: 0;

            background: transparent;

            color: #6d28d9;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            padding: 6px;
        }

        .password-toggle:hover {
            color: #4c1d95;
        }

        /* =========================
           REMEMBER
        ========================= */

        .remember-row {
            display: flex;
            align-items: center;

            margin-top: 4px;
            margin-bottom: 25px;
        }

        .remember-checkbox {
            width: 17px;
            height: 17px;

            margin: 0 9px 0 0;

            accent-color: #6d28d9;

            cursor: pointer;
        }

        .remember-label {
            color: #4b5563;

            font-size: 14px;

            cursor: pointer;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }

        .forgot-link {
            color: #4b5563;

            font-size: 13px;

            text-decoration: underline;

            transition: color .2s ease;
        }

        .forgot-link:hover {
            color: #6d28d9;
        }

        .login-button {
            min-width: 105px;

            height: 44px;

            padding: 0 22px;

            border: 0;

            border-radius: 7px;

            background: #1f2937;

            color: #ffffff;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background .2s ease,
                transform .1s ease;
        }

        .login-button:hover {
            background: #111827;
        }

        .login-button:active {
            transform: translateY(1px);
        }

        /* =========================
           REGISTER
        ========================= */

        .register-section {
            margin-top: 25px;
            padding-top: 22px;

            border-top: 1px solid #e5e7eb;

            text-align: center;
        }

        .register-text {
            margin: 0;

            color: #6b7280;

            font-size: 14px;
        }

        .register-link {
            margin-left: 4px;

            color: #6d28d9;

            font-weight: 700;

            text-decoration: none;
        }

        .register-link:hover {
            color: #4c1d95;

            text-decoration: underline;
        }

        /* =========================
           ERROR
        ========================= */

        .error-message {
            margin-top: 7px;

            color: #dc2626;

            font-size: 13px;
        }

        /* =========================
           SESSION STATUS
        ========================= */

        .status-message {
            margin-bottom: 20px;

            padding: 10px 12px;

            border-radius: 7px;

            background: #ecfdf5;

            color: #047857;

            font-size: 13px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 520px) {

            .login-wrapper {
                padding: 25px 15px;
            }

            .brand {
                margin-bottom: 22px;
            }

            .brand-logo {
                width: 68px;
                height: 68px;

                font-size: 24px;
            }

            .brand-title {
                font-size: 26px;
            }

            .brand-subtitle {
                font-size: 14px;
            }

            .login-card {
                padding: 28px 22px;
                border-radius: 12px;
            }

            .actions {
                align-items: flex-end;
            }

            .forgot-link {
                font-size: 12px;
            }

            .login-button {
                min-width: 95px;
                padding: 0 18px;
            }
        }
    </style>


    <div class="login-wrapper">

        <div class="login-container">


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
                    Sign in to manage and track your IT support requests
                </p>

            </div>


            <!-- =========================
                 LOGIN CARD
            ========================= -->

            <div class="login-card">

                <h2 class="login-heading">
                    Welcome Back
                </h2>


                <!-- SESSION STATUS -->

                <x-auth-session-status
                    class="status-message"
                    :status="session('status')"
                />


                <!-- LOGIN FORM -->

                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email Address
                        </label>

                        <input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email"
                        >

                        @if ($errors->has('email'))

                            <div class="error-message">
                                {{ $errors->first('email') }}
                            </div>

                        @endif

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                id="password"
                                class="form-input"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                            >

                            <button
                                type="button"
                                id="passwordToggle"
                                class="password-toggle"
                                onclick="togglePassword()"
                            >
                                Show
                            </button>

                        </div>

                        @if ($errors->has('password'))

                            <div class="error-message">
                                {{ $errors->first('password') }}
                            </div>

                        @endif

                    </div>


                    <!-- REMEMBER ME -->

                    <div class="remember-row">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="remember-checkbox"
                            name="remember"
                        >

                        <label
                            for="remember_me"
                            class="remember-label"
                        >
                            Remember me
                        </label>

                    </div>


                    <!-- ACTIONS -->

                    <div class="actions">

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="forgot-link"
                            >
                                Forgot your password?
                            </a>

                        @endif


                        <button
                            type="submit"
                            class="login-button"
                        >
                            LOG IN
                        </button>

                    </div>

                </form>


                <!-- REGISTER -->

                @if (Route::has('register'))

                    <div class="register-section">

                        <p class="register-text">

                            Create an account?

                            <a
                                href="{{ route('register') }}"
                                class="register-link"
                            >
                                Register
                            </a>

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    <!-- =========================
         PASSWORD SCRIPT
    ========================= -->

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const toggle =
                document.getElementById('passwordToggle');


            if (password.type === 'password') {

                password.type = 'text';

                toggle.textContent = 'Hide';

            } else {

                password.type = 'password';

                toggle.textContent = 'Show';

            }

        }

    </script>

</x-guest-layout>

