<nav class="main-header navbar navbar-expand" style="background-color: #1e2f5f;">
    <!-- Left navbar links -->
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: yellow;"></i></a>
    <div class="mr-auto">
        <h5 style="color: #fcd511;">Kantor Pelayanan Pajak Depok Cimanggis</h5>
    </div>
    <ul class="navbar-nav ml-auto">
        <div class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-warning" href="javascript:void()"
                style="color: #1e2f5f; text-transform: uppercase" role="button" data-toggle="dropdown">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu pad0B float-right">
                <div class="box-sm">
                    <div class="image">
                        <center>
                        <img src="{{ asset('vendor') }}/dist/img/avatar5.png"
                            class="img-circle elevation-2"
                            alt="User Image"
                            style="width:100px; height=100px;">
                        </center>
                    </div>
                    <div class="user-info">
                        <span>
                            Nama  : {{ Auth::user()->name }}<br>
                            NIP   : {{ Auth::user()->nip }}<br>
                            Seksi : {{ Auth::user()->seksi }}<br><br>
                        </span>
                        {{-- <a href="{{ route('foto.ubah') }}" title><center>[Change Photo]</center></a> --}}
                        <a href="{{ route('password.ubah') }}" title><center>[Change Password]</center></a><br>
                    </div>
                </div>
                <div class="pad5A button-pane button-pane-alt text-center">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn display-block font-normal btn-danger">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>
            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div> --}}
        </div>
    </ul>
    <!-- SEARCH FORM -->

    <!-- Right navbar links -->

</nav>
