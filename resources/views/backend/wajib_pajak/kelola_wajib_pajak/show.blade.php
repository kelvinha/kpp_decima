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
                            <div class="col-lg-4 col-md-4 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">NPWP</h6>
                                        <p>{{ $wp->npwp }}</p>
                                        <h6 class="font-weight-bold text-gray">NAMA</h6>
                                        <p>{{ $wp->nama }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">ALAMAT</h6>
                                        <p>{{ $wp->alamat }}</p>
                                        <h6 class="font-weight-bold text-gray">KATEGORI WAJIB PAJAK</h6>
                                        <p>{{ $wp->kategori_wp }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">NAMA SEKSI</h6>
                                        <p>Waskon 2</p>
                                        <h6 class="font-weight-bold text-gray">JENIS SPT</h6>
                                        <p>1770 SS</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">TAHUN PAJAK</h6>
                                        <p>2020</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2">
                                <h6 class="font-weight-bold text-gray">STATUS & TAHUN PAJAK</h6>
                                <ul>
                                    <li><span class="badge badge-danger">2016</span>&nbsp;kurang bayar</li>
                                    <li><span class="badge badge-success">2017</span>&nbsp;lebih bayar</li>
                                    <li><span class="badge badge-success">{{ $wp->tahun_pajak }}</span>&nbsp;pas</li>
                                    <li><span class="badge badge-danger">2019</span>&nbsp;kurang bayar</li>
                                    <li><span class="badge badge-danger">{{ date('Y') }}</span>&nbsp;nihil</li>
                                </ul>
                            </div>
                        </div>
                        <p><span style="color: red">*</span>Keterangan :</p>
                        <ul>
                            <li>
                                <p>Warna hijau : sudah lapor</p>
                            </li>
                            <li>
                                <p>Warna merah : belum lapor</p>
                            </li>
                        </ul>
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
