<nav class="main-header navbar navbar-expand" style="background-color: #1e2f5f;">
    <!-- Left navbar links -->
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: yellow;"></i></a>
    <div class="mr-auto">
        <h5 style="color: #fcd511;">Kantor Pelayanan Pajak Depok Cimanggis</h5>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-warning" href="javascript:void()"
                style="color: #1e2f5f; text-transform: uppercase" role="button" data-toggle="dropdown">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <!-- SEARCH FORM -->

    <!-- Right navbar links -->

</nav>
