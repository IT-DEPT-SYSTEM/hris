<x-guest-layout>

    <div style="
        width:100%;
        max-width:440px;
        margin:0 auto;
    ">

        {{-- HEADER --}}

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
                🔐
            </div>

            <h2 style="
                margin:0;
                color:#111827;
                font-size:26px;
                font-weight:700;
            ">
                Forgot Password?
            </h2>

            <p style="
                margin:8px 0 0;
                color:#6b7280;
                font-size:14px;
                line-height:1.6;
            ">
                Enter your email address and we will send you
                a password reset link.
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('status'))

            <div style="
                margin-bottom:20px;
                padding:13px 15px;
                border-radius:8px;
                background:#ecfdf5;
                border:1px solid #a7f3d0;
                color:#047857;
                font-size:14px;
            ">
                {{ session('status') }}
            </div>

        @endif


        {{-- FORM --}}

        <form
            method="POST"
            action="{{ route('password.email') }}"
        >

            @csrf


            {{-- EMAIL --}}

            <div>

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
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="Enter your registered email"
                    style="
                        width:100%;
                        padding:12px 14px;
                        border:1px solid #d1d5db;
                        border-radius:7px;
                        font-size:14px;
                        color:#111827;
                        outline:none;
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


            {{-- BUTTON --}}

            <button
                type="submit"
                style="
                    width:100%;
                    margin-top:22px;
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
                Send Password Reset Link
            </button>


            {{-- BACK TO LOGIN --}}

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

