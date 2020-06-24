<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1e2f5f;">
    <!-- Brand Logo -->
    <a href="{{ url('/home')}}" class="brand-link navbar-warning d-flex justify-content-center">
        <img src="{{asset('vendor')}}/dist/img/djp.png" alt="KPP Logo" style="height: 65%;" class="brand-image"
            style="opacity: .8">
        {{-- <h6 class="font-weight-bold" style="color: #1e2f5f;">Dirjen Pajak</h6> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('vendor')}}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{Request::is('home')? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wp.index') }}"
                        class="nav-link {{Request::is('admin/data-wajib-pajak')? 'active' : Request::is('admin/data-wajib-pajak/*')? 'active' : null }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Data Wajib Pajak</p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview {{Request::is('admin/data-wajib-pajak/*')? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{Request::is('admin/data-wajib-pajak/*')? 'active' : null }}">
                        <i class="nav-icon far fa-folder-open"></i>
                        <p>
                            Data Wajib Pajak
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('wp.index') }}"
                                class="nav-link {{Request::is('admin/*/kelola-wajib-pajak')? 'active' : Request::is('admin/*/kelola-wajib-pajak/*')? 'active' : null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kelola Data WP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sudahlapor.index')}}"
                                class="nav-link {{Request::is('admin/*/sudah-lapor-spt')? 'active' : null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Sudah Lapor SPT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('belomlapor.index')}}"
                                class="nav-link {{Request::is('admin/*/belom-lapor-spt')? 'active' : null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Belum Lapor SPT</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
