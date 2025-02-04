<header class="topbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="d-flex align-items-center gap-2">
                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <button type="button" class="button-toggle-menu topbar-button">
                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- App Search-->

            </div>

            <div class="d-flex align-items-center gap-1">
                <!-- User -->
                <div class="dropdown topbar-item">
                    <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle" width="32" src="assets/images/users/avatar-1.jpg"
                                alt="avatar-3">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>

                        <div class="dropdown-divider my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="bx bx-log-out fs-18 align-middle me-1"></i><span
                                    class="align-middle">Logout</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
