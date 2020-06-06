@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Data Laporan SPT</li>
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
                        <p>Detail Data Laporan SPT</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-2" align="center">
                                <img src="{{asset('vendor')}}/dist/img/avatar.png" alt="Logo KPP Decima"
                                    class="img-fluid img-circle elevation-2" style="width:50%;">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">NPWP</h6>
                                        <p>{{ $laporan->npwp }}</p>
                                        <h6 class="font-weight-bold text-gray">NAMA</h6>
                                        <p>{{ $laporan->nama }}</p>

                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">EMAIL</h6>
                                        <p>{{ $laporan->email }}</p>
                                        <h6 class="font-weight-bold text-gray">NO.HP</h6>
                                        <p>{{ $laporan->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">ALAMAT</h6>
                                        <p>{{ $laporan->alamat }}</p>
                                        <h6 class="font-weight-bold text-gray">KATEGORI WAJIB PAJAK</h6>
                                        <p>{{ $laporan->kategori_wp }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold text-gray">JENIS SPT</h6>
                                        <p>{{ $laporan->jenis_spt }}</p>
                                        <h6 class="font-weight-bold text-gray">TAHUN PAJAK</h6>
                                        <p>{{ $laporan->tahun_pajak }}</p>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="col-md-8 offset-md-4">
                                <div class="row">
                                    <div class="col-3">
                                        <h6 class="font-weight-bold text-gray">STATUS</h6>
                                        @if($laporan->status_lapor === 'Belum Lapor')
                                        <h4><span class="badge badge-pill badge-danger">{{ $laporan->status_lapor }}</span> </h4>
                                        @else
                                        <h4><span class="badge badge-pill badge-success">{{ $laporan->status_lapor }}</span> </h4>
                                        @endif
                                    </div>
                                    <div class="col-7">
                                        <h6 class="font-weight-bold text-gray" align="center">AKSI</h6>
                                        <div class="row">
                                            @if ($laporan->status_lapor === 'Belum Lapor')
                                            <button class="btn elevation-2 btn-danger"><i class="far fa-envelope"></i>
                                                Kirim
                                                Email</button>
                                                <hr>
                                            @endif
                                            <button class="btn elevation-2 btn-success"><i class="fa fa-file"></i>
                                                Export
                                                PDF</button>
                                            <hr>
                                            <a href="#"
                                                class="btn elevation-2 btn-info"><i class="fas fa-edit"></i> Edit
                                                Laporan</a>
                                        </div>
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
