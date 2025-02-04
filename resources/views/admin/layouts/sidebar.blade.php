<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="index.html" class="logo-dark">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
        </a>

        <a href="index.html" class="logo-light">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <iconify-icon icon="solar:hamburger-menu-broken" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>

        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title">Apps</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('restoran.index') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:chef-hat-bold"></iconify-icon>
                    </span>
                    <span class="nav-text"> Pajak Restoran </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('hotel.index') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:buildings-2-broken"></iconify-icon>
                    </span>
                    <span class="nav-text"> Pajak Hotel </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('hiburan.index') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:ticket-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Pajak Hiburan </span>
                </a>
            </li>
        </ul>
    </div>
</div>
