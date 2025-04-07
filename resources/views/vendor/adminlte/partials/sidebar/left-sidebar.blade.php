<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>

                {{-- Menu Khusus Berdasarkan Role --}}
                @if(Auth::check() && Auth::user()->role == 'dokter')
                    <li class="nav-item">
                        <a href="/dokter" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dokter/periksa" class="nav-link {{ request()->is('dokter/periksa') ? 'active' : '' }}">
                            <i class="nav-icon {{ request()->is('dokter/periksa') ? 'far fa-dot-circle' : 'far fa-circle' }}"></i>
                            <p>Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dokter/obat" class="nav-link {{ request()->is('dokter/obat') ? 'active' : '' }}">
                            <i class="nav-icon {{ request()->is('dokter/obat') ? 'far fa-dot-circle' : 'far fa-circle' }}"></i>
                            <p>Obat</p>
                        </a>
                    </li>
                @elseif(Auth::check() && Auth::user()->role == 'pasien')
                    <li class="nav-item">
                        <a href="/pasien" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pasien/periksa" class="nav-link {{ request()->is('pasien/periksa') ? 'active' : '' }}">
                            <i class="nav-icon {{ request()->is('pasien/periksa') ? 'far fa-dot-circle' : 'far fa-circle' }}"></i>
                            <p>Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pasien/riwayat" class="nav-link {{ request()->is('pasien/riwayat') ? 'active' : '' }}">
                            <i class="nav-icon {{ request()->is('pasien/riwayat') ? 'far fa-dot-circle' : 'far fa-circle' }}"></i>
                            <p>Riwayat Periksa</p>
                        </a>
                    </li>
                @endif

                {{-- Tambahkan menu tambahan default jika diperlukan --}}
                {{-- @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') --}}

            </ul>
        </nav>
    </div>

</aside>
