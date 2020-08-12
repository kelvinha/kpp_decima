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
                            <div class="col-2">
                                <select name="" id="" class="form-control">
                                    <option>Tahun 2020</option>
                                </select>
                            </div>
                            <button class="btn btn-info mb-4">cari</button>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <p>Data Wajib Pajak:</p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NPWP</th>
                                            <th>Kode KPP</th>
                                            <th>Kode Cabang</th>
                                            <th>Nama</th>
                                            <th>Jenis WP</th>
                                            <th>Tahun Pajak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $wp->npwp }}</td>
                                            <td>{{ $wp->kd_kpp }}</td>
                                            <td>{{ $wp->kd_cabang }}</td>
                                            <td>{{ $wp->nama_wp }}</td>
                                            <td>{{ $wp->jenis_wp }}</td>
                                            <td>{{ $wp->tahun }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <p>Alamat:</p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kota</th>
                                            <th>Provinsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $wp->kelurahan }}</td>
                                            <td>{{ $wp->kecamatan }}</td>
                                            <td>{{ $wp->kota }}</td>
                                            <td>{{ $wp->propinsi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Data AR / Seksi:</p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama AR</th>
                                            <th>Seksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $wp->nama_ar }}</td>
                                            <td>{{ $wp->seksi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-7">
                                <p>Data SPT:</p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Tanda Terima</th>
                                            <th>Jenis SPT</th>
                                            <th>Tanggal SPT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $wp->no_tandaterima }}</td>
                                            <td>{{ $wp->jenis_spt }}</td>
                                            <td>{{ $wp->tgl_spt }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Status SPT:</p>
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Status SPT</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($wp->no_tandaterima == null)
                                        <td colspan="2"><span class="badge badge-danger">Belum Lapor</span> </td>
                                        @else
                                        <td>{{ $wp->status_spt }}</td>
                                        <td><span class="badge badge-success">Sudah Lapor</span> </td>
                                        @endif
                                    </tbody>
                                </table>
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
