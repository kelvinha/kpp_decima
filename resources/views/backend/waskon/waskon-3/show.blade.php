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
                                    <thead class="bg-gray">
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Seksi</th>
                                            <th>Total Wajib SPT</th>
                                            <th>Total Realisasi SPT</th>
                                            <th>Realisasi</th>
                                            <th>Capaian</th>
                                            <th>Target Pusat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $waskon3->nip }}</td>
                                            <td>{{ $waskon3->name }}</td>
                                            <td>{{ $waskon3->seksi }}</td>
                                            <td>{{ $totalwp }}</td>
                                            <td>{{ $totalspt }}</td>
                                            <td>{{ round($realisasi, 2) }}%</td>
                                            <td>{{ round($capaian, 2) }}%</td>
                                            <td>{{ $targetPusat->target }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ">
                                <h4 class="text-center mt-2">Data Realisasi SPT:</h4>
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
                            <div class="col-md-8">
                                <table id="example1" class="table table-striped table-bordered text-center">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th>No</th>
                                            <th>Npwp</th>
                                            <th>Nama</th>
                                            <th>Jenis WP</th>
                                            <th>No. Tanda Terima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data_wp->count() == 0)
                                            <td colspan="3" class="text-center">Tidak Ada</td>
                                        @endif
                                        @foreach ($data_wp as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ substr($item->npwp,0,9) }}</td>
                                            <td>{{ $item->nama_wp }}</td>
                                            <td>{{ $item->jenis_wp }}</td>
                                            @if ($item->bukti === NULL)
                                            <td>Tidak Ada</td>
                                            @else
                                            <td>{{ $item->bukti }}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
@section('js')
<script src="{{ asset('vendor') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection