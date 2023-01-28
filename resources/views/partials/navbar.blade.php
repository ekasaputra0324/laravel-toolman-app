<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>
<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
        <a href="{{ route('dashboard') }}"><img src="../assets/img/icons/brands/smk.png" width="36px"></a>
            <span style="font-weight:bold ; margin-left: 13px;">SMKS MUHAMMADIYAH 6 ROGOJAMPI</span>
        </div>
    </div>
    <!-- /Search -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3" style="text-transform: capitalize;">
            {{ Auth::user()->name }}
        </li>
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/user.png" alt
                        class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            @if ($title == "Home | TOOLMAN-APP")
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                        @csrf
                        <i class="bx bx-power-off me-2"></i>
                        <button type="submit"
                            style="border:none ; text-decoration: none ; background-color: white; color:rgb(168, 168, 168);">Logout</button>
                    </form>
                </li>
            </ul>
            @endif
        </li>
    </ul>
</div>
</nav>
