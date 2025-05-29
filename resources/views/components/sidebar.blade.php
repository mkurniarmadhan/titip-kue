<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">TITTP KUE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">TP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class='{{ Route::is('dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('dashboard') }}"> <i class="fas fa-pencil-ruler">
                    </i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Pages</li>
            <li class="{{ Route::is('product.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Data Produk</span>
                </a>
            </li>
            <li class="{{ Route::is('outlet.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('outlet.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Data Outlet</span>
                </a>
            </li>
            <li class="{{ Route::is('kurir.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kurir.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Data Kurir</span>
                </a>
            </li>
            <li class="{{ Route::is('create-shipment') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-shipment') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Penitipan Baru</span>
                </a>
            </li>



            <li class="menu-header">Laporan</li>
            <li class="{{ Route::is('laporan.index') ? 'active' : '' }}">
                <a class="nav-link" href="#"><i class="fas fa-pencil-ruler">
                    </i> <span>Laporan Penjualan</span>
                </a>
            </li>



        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
