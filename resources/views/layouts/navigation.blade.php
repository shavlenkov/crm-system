<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i style="margin-right: 10px; margin-left: 5px" class="fa-solid fa-table-columns"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('companies.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                        {{ __('Companies') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('clients.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-handshake"></i>
                    <p>
                        {{ __('Clients') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
