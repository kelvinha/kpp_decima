<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1e2f5f;">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link navbar-warning d-flex justify-content-center">
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
                <a href="{{ route('dashboard') }}" class="d-block">{{ substr(Auth::user()->name,0,20) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{Request::is('home')? 'active' : null }}">
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
                <li class="nav-item has-treeview {{Request::is('admin/waskon-*')? 'menu-open' : Request::is('admin/ekstensifikasi-dan-penyuluhan')? 'menu-open' : Request::is('admin/waskon-*/*')? 'menu-open':Request::is('admin/ekstensifikasi-dan-penyuluhan/*')? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Data per Waskon
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('waskon2.index')}}" class="nav-link {{Request::is('admin/waskon-2')? 'active' :Request::is('admin/waskon-2/*')? 'active' : null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Seksi Pengawasan </p>
                                <br />
                                <i class="far fa-space nav-icon"></i>
                                <p>dan Konsultasi II</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('waskon3.index')}}" class="nav-link {{Request::is('admin/waskon-3')? 'active' :Request::is('admin/waskon-3/*')? 'active': null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Seksi Pengawasan </p>
                                <br />
                                <i class="far fa-space nav-icon"></i>
                                <p>dan Konsultasi III</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('waskon4.index') }}" class="nav-link {{Request::is('admin/waskon-4')? 'active' : Request::is('admin/waskon-4/*')? 'active' : null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Seksi Pengawasan </p>
                                <br />
                                <i class="far fa-space nav-icon"></i>
                                <p>dan Konsultasi IV</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ekspen.index') }}" class="nav-link {{Request::is('admin/ekstensifikasi-dan-penyuluhan')? 'active' :Request::is('admin/ekstensifikasi-dan-penyuluhan/*')? 'active': null }}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Seksi Ekstensifikasi</p>
                                <br />
                                <i class="far fa-space nav-icon"></i>
                                <p>dan Penyuluhan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
