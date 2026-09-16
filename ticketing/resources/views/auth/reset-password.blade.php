<x-guest-layout>

    <div style="
        width:100%;
        max-width:440px;
        margin:0 auto;
    ">

        <div style="
            text-align:center;
            margin-bottom:30px;
        ">

            <div style="
                width:72px;
                height:72px;
                margin:0 auto 18px;
                border-radius:16px;
                background:#eef2ff;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:32px;
            ">
                🔑
            </div>

            <h2 style="
                margin:0;
                color:#111827;
                font-size:26px;
                font-weight:700;
            ">
                Reset Password
            </h2>

            <p style="
                margin:8px 0 0;
                color:#6b7280;
                font-size:14px;
            ">
                Create a new password for your account.
            </p>

        </div>


        <form
            method="POST"
            action="{{ route('password.store') }}"
        >

            @csrf


            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >


            {{-- EMAIL --}}

            <div style="margin-bottom:18px;">

                <label
                    for="email"
                    style="
                        display:block;
                        margin-bottom:7px;
                        color:#374151;
                        font-size:13px;
                        font-weight:700;
                    "
                >
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="email"
                    style="
                        width:100%;
                        padding:12px 14px;
                        border:1px solid #d1d5db;
                        border-radius:7px;
                        font-size:14px;
                    "
                >

                @error('email')

                    <div style="
                        margin-top:6px;
                        color:#dc2626;
                        font-size:13px;
                    ">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- PASSWORD --}}

            <div style="margin-bottom:18px;">

                <label
                    for="password"
                    style="
                        display:block;
                        margin-bottom:7px;
                        color:#374151;
                        font-size:13px;
                        font-weight:700;
                    "
                >
                    New Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Enter new password"
                    style="
                        width:100%;
                        padding:12px 14px;
                        border:1px solid #d1d5db;
                        border-radius:7px;
                        font-size:14px;
                    "
                >

                @error('password')

                    <div style="
                        margin-top:6px;
                        color:#dc2626;
                        font-size:13px;
                    ">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- CONFIRM PASSWORD --}}

            <div>

                <label
                    for="password_confirmation"
                    style="
                        display:block;
                        margin-bottom:7px;
                        color:#374151;
                        font-size:13px;
                        font-weight:700;
                    "
                >
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm new password"
                    style="
                        width:100%;
                        padding:12px 14px;
                        border:1px solid #d1d5db;
                        border-radius:7px;
                        font-size:14px;
                    "
                >

            </div>


            <button
                type="submit"
                style="
                    width:100%;
                    margin-top:24px;
                    padding:12px 18px;
                    border:0;
                    border-radius:7px;
                    background:#2563eb;
                    color:#ffffff;
                    font-size:14px;
                    font-weight:600;
                    cursor:pointer;
                "
            >
                Reset Password
            </button>


            <div style="
                text-align:center;
                margin-top:20px;
            ">

                <a
                    href="{{ route('login') }}"
                    style="
                        color:#2563eb;
                        font-size:14px;
                        font-weight:600;
                        text-decoration:none;
                    "
                >
                    ← Back to Login
                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
