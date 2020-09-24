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
                @php
                    $target_capaian = App\Models\TargetCapaian::first();
                @endphp
                @if (Auth::user()->role == 'admin')
                    @if ($target_capaian == null)
                    <button class="dropdown-item" data-target="#msk-capaian-target" data-toggle="modal"><i class="fas fa-chart-line"></i> Masukan Target Capaian</button>
                    @else
                    <button class="dropdown-item" data-target="#ubah-capaian-target" data-toggle="modal" data-myid="{{ $target_capaian->id }}" data-mytarget="{{ $target_capaian->target}}"><i class="fas fa-chart-line"></i> Ubah Target Capaian</button>
                    @endif
                    <hr>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
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
<div class="modal fade" id="msk-capaian-target">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Masukan Target Capaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create.target')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Masukan Target Baru</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control col-2" name="target" autocomplete="off" placeholder="Masukan Target Baru" required onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="3">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ubah-capaian-target">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Ubah Target Capaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update.target') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Ubah Target Capaian</p>
                    <div class="input-group mb-3">
                        <input type="hidden" id="idtarget" name="idtarget">
                        <input type="text" class="form-control col-2" id="target" name="target" required onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="3">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>