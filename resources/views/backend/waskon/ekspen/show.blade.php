@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Detail AR</li>
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
                        <p>Detail Data AR</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Data AR:</p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Seksi</th>
                                            <th>Total Wajib Pajak</th>
                                            <th>Total Realisasi SPT</th>
                                            <th>Capaian Ar</th>
                                            <th>Capaian Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $ekspen->nip }}</td>
                                            <td>{{ $ekspen->name }}</td>
                                            <td>{{ $ekspen->seksi }}</td>
                                            <td>{{ $totalwp }}</td>
                                            <td>{{ $totalspt }}</td>
                                            <td>{{ $capaian_ar * 100 }}%</td>
                                            <td>86%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="text-center mb-4">Data Wajib Pajak yang bersangkutan:</h4>
                        <div class="row">
                            <div class="col-md-4">
                            <p>Karyawan: <span class="badge badge-info">{{$karyawan->count()}}</span></p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Npwp</th>
                                            <th>Nama</th>
                                            <th>Jenis WP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($karyawan->count() == 0)
                                            <td colspan="3" class="text-center">Tidak Ada</td>
                                        @endif
                                        @foreach ($karyawan as $item)
                                        <tr>
                                            <td>{{ substr($item->npwp,0,9) }}</td>
                                            <td>{{ $item->nama_wp }}</td>
                                            <td>{{ $item->jenis_wp }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <p>Non Karyawan: <span class="badge badge-info">{{ $nonkaryawan->count() }}</span></p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Npwp</th>
                                            <th>Nama</th>
                                            <th>Jenis WP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($nonkaryawan->count() == 0)
                                            <td colspan="3" class="text-center">Tidak Ada</td>
                                        @endif
                                        @foreach ($nonkaryawan as $item)
                                        <tr>
                                            <td>{{ substr($item->npwp,0,9) }}</td>
                                            <td>{{ $item->nama_wp }}</td>
                                            <td>{{ $item->jenis_wp }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <p>Badan: <span class="badge badge-info">{{ $badan->count() }}</span></p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Npwp</th>
                                            <th>Nama</th>
                                            <th>Jenis WP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($badan->count() == 0)
                                            <td colspan="3" class="text-center">Tidak Ada</td>
                                        @endif
                                        @foreach ($badan as $item)
                                        <tr>
                                            <td>{{ substr($item->npwp,0,9) }}</td>
                                            <td>{{ $item->nama_wp }}</td>
                                            <td>{{ $item->jenis_wp }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="text-center mt-2">Data Realisasi SPT:</h4>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center bg-gray">Terealisasi SPT</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Karyawan</th>
                                            <th class="text-center">Non Karyawan</th>
                                            <th class="text-center">Badan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($karSpt + $nonkarSpt + $bdnSpt == 0)
                                            <td colspan="3" class="text-center">Tidak Ada</td>
                                        @else
                                        <tr class="text-center">
                                            <td>{{ $karSpt }}</td>
                                            <td>{{ $nonkarSpt }}</td>
                                            <td>{{ $bdnSpt }}</td>
                                        </tr>
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