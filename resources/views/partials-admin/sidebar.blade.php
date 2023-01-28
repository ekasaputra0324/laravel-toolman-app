<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="{{ route('admin') }}" aria-expanded="false"><i class="icon icon-single-04"></i>
                <span class="nav-text">Dashboard</span></a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Master Data</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users') }}">Users</a></li>
                    <li><a href="{{ route('barang') }}">Barang</a></li>
                    <li><a href="{{ route('peminjaman-admin') }}">Peminjaman</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
