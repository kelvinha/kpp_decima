@include('partisi.header')

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="d-flex justify-content-center mb-2 mt-2">
                    <img src="{{ asset('vendor') }}/dist/img/logo-kpp.jpg" style="width: 45%;" class="img-fluid" alt="logo">
                </div>
                <p class="login-box-msg">Monitoring Kepatuhan Wajib Pajak <br> KPP Pratama Depok Cimanggis</p>
                <h3 class="font-weight-bold text-primary mb-4" align="center">Reset Password</h3>

                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" required autocomplete="off"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope" style="color: #1e2f5f"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" required placeholder="Password">
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
                    </div> --}}
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="background-color: #1e2f5f; color: #fcd511">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1 mt-3">
                <a href="{{ route('login') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back To Login</a> 
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    @include('partisi.js')

</body>

</html>