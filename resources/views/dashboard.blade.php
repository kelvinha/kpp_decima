@extends('layouts.backend')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark justify-content-center">Selamat Datang di Aplikasi Monitoring Kepatuhan Wajib
                    Pajak </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<section class="content px-4 py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-3">
                <div class="card bg-kpp elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-md-4">
                                    <i class="fas fa-id-card fa-4x"></i>
                            </div>
                            <div class="col-sm-10 col-md-8">
                                <h4 class="font-weight-light">Total Admin</h4>
                                <span class="h4">10 Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-kpp elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-md-4">
                                <i class="fa fa-eye fa-4x"></i>
                            </div>
                            <div class="col-sm-10 col-md-8">
                                <h4 class="font-weight-light">Total Sudah Lapor SPT</h4>
                                <span class="h4">760 Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-3">
                <div class="card bg-kpp elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-md-4">
                                <i class="fas fa-user-friends fa-4x"></i>
                            </div>
                            <div class="col-sm-10 col-md-8">
                                <h4 class="font-weight-light">Total Warga / WP</h4>
                                <span class="h4">41,410 Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-kpp elevation-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-md-4">
                                <i class="fa fa-eye fa-4x"></i>
                            </div>
                            <div class="col-sm-10 col-md-8">
                                <h4 class="font-weight-light">Total Belum Lapor SPT</h4>
                                <span class="h4">2,000 Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
