@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Data Wajib Pajak</li>
                </ol>
            </div>
        </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-12">
                <div class="card elevation-2">
                    <div class="card-header bg-kpp">
                        <p>Detail Data Wajib Pajak</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-2" align="center">
                                <img src="{{ asset('vendor')}}/dist/img/undraw1.png" width="100%" class="img-fluid" alt="undraw">
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">NPWP</h6>
                                        <p>{{ $wp->npwp }}</p>
                                        <h6 class="font-weight-bold text-gray">KELURAHAN</h6>
                                        <p>{{ $wp->kelurahan }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">KODE KPP</h6>
                                        <p>{{ $wp->kd_kpp }}</p>
                                        <h6 class="font-weight-bold text-gray">KECAMATAN</h6>
                                        <p>{{ $wp->kecamatan}}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">KODE CABANG</h6>
                                        <p>{{ $wp->kd_cabang }}</p>
                                        <h6 class="font-weight-bold text-gray">KOTA</h6>
                                        <p>{{ $wp->kota }}</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">NAMA WP</h6>
                                        <p>{{ $wp->nama_wp }}</p>
                                        <h6 class="font-weight-bold text-gray">PROVINSI</h6>
                                        <p>{{ $wp->propinsi }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">JENIS WP</h6>
                                        <p>{{ $wp->wajib_jeniswp }}</p>
                                        <h6 class="font-weight-bold text-gray">NAMA AR</h6>
                                        <p>{{ $wp->nama_ar}}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="font-weight-bold text-gray">TAHUN PAJAK</h6>
                                        <p>{{ $wp->tahun }}</p>
                                        <h6 class="font-weight-bold text-gray">NAMA SEKSI</h6>
                                        <p>{{ $wp->seksi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" align="right">
                        <button onclick="window.history.back();" class="btn elevation-2 btn-warning">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
