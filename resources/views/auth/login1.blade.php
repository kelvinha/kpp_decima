@include('partisi.header')

<body class="hold-transition login-page bg-new">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="d-flex justify-content-center mb-2 mt-2">
                    <img src="{{ asset('vendor') }}/dist/img/djp-logo.jpg" style="width: 45%;" class="img-fluid"
                        alt="logo">
                </div>
                <p class="login-box-msg">Monitoring Kepatuhan Wajib Pajak <br> KPP Pratama Depok Cimanggis</p>
                <h3 class="font-weight-bold text-primary mb-4" align="center">Login</h3>

                <form action="{{ route('login') }}" method="POST" class="mb-5">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" name="nip" class="form-control" required autocomplete="off"
                            placeholder="NIP">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope" style="color: #1e2f5f"></span>
                            </div>
                        </div>
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" required placeholder="Password" minlength="8">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock" style="color: #1e2f5f"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="background-color: #1e2f5f; color: #fcd511">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                {{-- <p class="mb-1 mt-3">
                    <a href="" class="text-link">I forgot my password</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    @include('partisi.js')

</body>

</html>
