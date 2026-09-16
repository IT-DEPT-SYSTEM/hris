<nav
    x-data="{ open: false }"
    style="
        position:fixed;
        top:0;
        left:0;
        right:0;
        width:100%;
        height:66px;
        z-index:9999;
        background:#ffffff;
        border-bottom:1px solid #e5e7eb;
        box-shadow:0 1px 4px rgba(0,0,0,0.04);
    "
>

    <!-- =========================================
         DESKTOP NAVIGATION
    ========================================== -->

    <div
        style="
            max-width:1240px;
            height:66px;
            margin:0 auto;
            padding:0 20px;
            display:grid;
            grid-template-columns:1fr auto 1fr;
            align-items:center;
        "
    >

        <!-- =====================================
             LEFT - LOGO
        ====================================== -->

        <div
            style="
                display:flex;
                align-items:center;
            "
        >

            <a
                href="{{ route('dashboard') }}"
                style="
                    display:flex;
                    align-items:center;
                    gap:14px;
                    text-decoration:none;
                "
            >

                <!-- LOGO -->

                <div
                    style="
                        width:25px;
                        height:25px;
                        border:2px solid #7c3aed;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#7c3aed;
                        font-size:12px;
                        font-weight:800;
                        flex-shrink:0;
                    "
                >
                    IT
                </div>


                <!-- SYSTEM NAME -->

                <span
                    style="
                        font-size:19px;
                        font-weight:700;
                        color:#6d28d9;
                        white-space:nowrap;
                        letter-spacing:-0.2px;
                    "
                >
                    IT Ticketing System
                </span>

            </a>

        </div>


        <!-- =====================================
             CENTER - NAVIGATION
        ====================================== -->

        <div
            class="hidden sm:flex"
            style="
                height:66px;
                display:flex;
                align-items:center;
                justify-content:center;
                gap:8px;
            "
        >

            @if(Auth::user()->isAdmin())

                <!-- DASHBOARD -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    style="
                        height:66px;
                        display:flex;
                        align-items:center;
                        padding:0 18px;
                        position:relative;
                        text-decoration:none;
                        font-size:14px;
                        font-weight:600;
                        color:{{ request()->routeIs('admin.dashboard') ? '#4f46e5' : '#374151' }};
                    "
                >

                    Dashboard

                    @if(request()->routeIs('admin.dashboard'))

                        <span
                            style="
                                position:absolute;
                                bottom:0;
                                left:12px;
                                right:12px;
                                height:2px;
                                background:#4f46e5;
                                border-radius:2px 2px 0 0;
                            "
                        ></span>

                    @endif

                </a>


                <!-- ALL TICKETS -->

                <a
                    href="{{ route('admin.tickets.index') }}"
                    style="
                        height:66px;
                        display:flex;
                        align-items:center;
                        padding:0 18px;
                        position:relative;
                        text-decoration:none;
                        font-size:14px;
                        font-weight:600;
                        color:{{ request()->routeIs('admin.tickets.*') ? '#4f46e5' : '#374151' }};
                    "
                >

                    All Tickets

                    @if(request()->routeIs('admin.tickets.*'))

                        <span
                            style="
                                position:absolute;
                                bottom:0;
                                left:12px;
                                right:12px;
                                height:2px;
                                background:#4f46e5;
                                border-radius:2px 2px 0 0;
                            "
                        ></span>

                    @endif

                </a>

            @else

                <!-- USER DASHBOARD -->

                <a
                    href="{{ route('user.dashboard') }}"
                    style="
                        height:66px;
                        display:flex;
                        align-items:center;
                        padding:0 18px;
                        position:relative;
                        text-decoration:none;
                        font-size:14px;
                        font-weight:600;
                        color:{{ request()->routeIs('user.dashboard') ? '#4f46e5' : '#374151' }};
                    "
                >

                    Home

                    @if(request()->routeIs('user.dashboard'))

                        <span
                            style="
                                position:absolute;
                                bottom:0;
                                left:12px;
                                right:12px;
                                height:2px;
                                background:#4f46e5;
                            "
                        ></span>

                    @endif

                </a>


                <!-- MY TICKETS -->

                <a
                    href="{{ route('user.tickets.index') }}"
                    style="
                        height:66px;
                        display:flex;
                        align-items:center;
                        padding:0 18px;
                        position:relative;
                        text-decoration:none;
                        font-size:14px;
                        font-weight:600;
                        color:{{ request()->routeIs('user.tickets.*') ? '#4f46e5' : '#374151' }};
                    "
                >

                    My Tickets

                    @if(request()->routeIs('user.tickets.*'))

                        <span
                            style="
                                position:absolute;
                                bottom:0;
                                left:12px;
                                right:12px;
                                height:2px;
                                background:#4f46e5;
                            "
                        ></span>

                    @endif

                </a>

            @endif

        </div>


        <!-- =====================================
             RIGHT - ACCOUNT
        ====================================== -->

        <div
            class="hidden sm:flex"
            style="
                display:flex;
                align-items:center;
                justify-content:flex-end;
            "
        >

            <x-dropdown align="right" width="48">

                <x-slot name="trigger">

                    <button
                        type="button"
                        style="
                            display:flex;
                            align-items:center;
                            gap:8px;
                            padding:8px 10px;
                            border:0;
                            background:#ffffff;
                            color:#64748b;
                            font-size:13px;
                            font-weight:500;
                            cursor:pointer;
                        "
                    >

                        <span>
                            {{ Auth::user()->name }}
                        </span>


                        <svg
                            style="width:14px;height:14px;"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >

                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />

                        </svg>

                    </button>

                </x-slot>


                <x-slot name="content">

                    <x-dropdown-link :href="route('profile.edit')">

                        {{ __('Profile') }}

                    </x-dropdown-link>


                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <x-dropdown-link
                            :href="route('logout')"
                            onclick="
                                event.preventDefault();
                                this.closest('form').submit();
                            "
                        >

                            {{ __('Log Out') }}

                        </x-dropdown-link>

                    </form>

                </x-slot>

            </x-dropdown>

        </div>

    </div>


    <!-- =========================================
         MOBILE MENU BUTTON
    ========================================== -->

    <div
        class="sm:hidden"
        style="
            position:absolute;
            right:15px;
            top:0;
            height:66px;
            display:flex;
            align-items:center;
        "
    >

        <button
            @click="open = !open"
            type="button"
            style="
                border:0;
                background:none;
                color:#475569;
                cursor:pointer;
                padding:8px;
            "
        >

            <svg
                x-show="!open"
                style="width:24px;height:24px;"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />

            </svg>


            <svg
                x-show="open"
                style="width:24px;height:24px;"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                />

            </svg>

        </button>

    </div>


    <!-- =========================================
         MOBILE MENU
    ========================================== -->

    <div
        x-show="open"
        class="sm:hidden"
        style="
            position:absolute;
            top:66px;
            left:0;
            right:0;
            background:#ffffff;
            border-top:1px solid #e5e7eb;
            border-bottom:1px solid #e5e7eb;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            padding:12px 20px 18px;
        "
    >

        @if(Auth::user()->isAdmin())

            <a
                href="{{ route('admin.dashboard') }}"
                style="
                    display:block;
                    padding:12px 10px;
                    text-decoration:none;
                    color:#374151;
                    font-size:14px;
                    font-weight:600;
                "
            >
                Dashboard
            </a>


            <a
                href="{{ route('admin.tickets.index') }}"
                style="
                    display:block;
                    padding:12px 10px;
                    text-decoration:none;
                    color:#374151;
                    font-size:14px;
                    font-weight:600;
                "
            >
                All Tickets
            </a>

        @else

            <a
                href="{{ route('user.dashboard') }}"
                style="
                    display:block;
                    padding:12px 10px;
                    text-decoration:none;
                    color:#374151;
                    font-size:14px;
                    font-weight:600;
                "
            >
                Home
            </a>


            <a
                href="{{ route('user.tickets.index') }}"
                style="
                    display:block;
                    padding:12px 10px;
                    text-decoration:none;
                    color:#374151;
                    font-size:14px;
                    font-weight:600;
                "
            >
                My Tickets
            </a>

        @endif


        <div
            style="
                margin-top:8px;
                padding-top:12px;
                border-top:1px solid #e5e7eb;
            "
        >

            <div
                style="
                    padding:8px 10px;
                    color:#111827;
                    font-size:14px;
                    font-weight:600;
                "
            >
                {{ Auth::user()->name }}
            </div>


            <a
                href="{{ route('profile.edit') }}"
                style="
                    display:block;
                    padding:10px;
                    text-decoration:none;
                    color:#64748b;
                    font-size:14px;
                "
            >
                Profile
            </a>


            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    style="
                        width:100%;
                        text-align:left;
                        padding:10px;
                        border:0;
                        background:none;
                        color:#64748b;
                        font-size:14px;
                        cursor:pointer;
                    "
                >
                    Log Out
                </button>

            </form>

        </div>

    </div>

</nav>


<!-- =========================================
     FIXED NAVBAR SPACER
     Prevents page content from going
     underneath the fixed navbar.
========================================== -->

<div
    style="
        height:66px;
        width:100%;
    "
></div>