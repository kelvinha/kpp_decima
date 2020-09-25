@extends('layouts.backend')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Selamat Datang <strong>{{ Auth::user()->name }}</strong> !<br>di Aplikasi Monitoring Kepatuhan
                    Wajib Pajak </h5> 
                <div class="row container">
                    @if ($target_capaian == null)
                    <p>Target Capaian per AR Tahun ini </p><span class="blinking"> 0%</span>
                    @else
                    <p>Target Capaian per AR Tahun ini </p><span class="blinking">{{$target_capaian->target}}%</span>
                    @endif
                </div>
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

<section class="content px-4 py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)">
                            <div class="card bg-light elevation-3" id="tes1">
                                <div class="card-header">
                                    <h4 class="font-weight-light">Jumlah AR</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-4">
                                            <i class="fas fa-id-card fa-3x"></i>
                                        </div>
                                        <div class="col-sm-10 col-md-8 pt-1">
                                            <span class="h4">{{ $totaladmin }} Orang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('wp.index') }}">
                            <div class="card bg-light elevation-3" id="tes2">
                                <div class="card-header">
                                    <h4 class="font-weight-light">Data Wajib SPT</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-4">
                                            <i class="fas fa-user-friends fa-3x"></i>
                                        </div>
                                        <div class="col-sm-10 col-md-8">
                                            <span class="h4">{{$totalwp}} Wajib SPT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('sudahlapor.index') }}">
                            <div class="card bg-light elevation-3" id="tes3">
                                <div class="card-header">
                                    <h4 class="font-weight-light">Sudah Lapor SPT</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-4">
                                            <i class="fas fa-user-check fa-3x"></i>
                                        </div>
                                        <div class="col-sm-10 col-md-8 pt-1">
                                            <span class="h4">{{ $totalsudahlapor }} Wajib SPT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('belomlapor.index') }}">
                            <div class="card bg-light elevation-3" id="tes4">
                                <div class="card-header">
                                    <h4 class="font-weight-light">Belum Lapor SPT</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-4">
                                            <i class="fas fa-user-slash fa-3x"></i>
                                        </div>
                                        <div class="col-sm-10 col-md-8 pt-1">
                                            <span class="h4">{{ $totalbelumlapor }} Wajib SPT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card elevation-3">
                    <div class="card-header" align="center">
                        <h4>Presentase Capaian KPP</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card elevation-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6" >
                                <h4 class="font-weight-light">Data Seksi Pengawasan</h4>
                            </div>
                            <div class="col-6" align="right">
                                <i class="fas far fas fa-users fa-3x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="bg-kpp">
                                <tr>
                                    <th>Seksi</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pengawasan dan Konsultasi II</td>
                                    <td>{{ $waskon2 }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Pengawasan dan Konsultasi III</td>
                                    <td>{{ $waskon3 }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Pengawasan dan Konsultasi IV</td>
                                    <td>{{ $waskon4 }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Ekstensifikasi dan Penyluhan</td>
                                    <td>{{ $ekspen }} / {{ $totalwp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card elevation-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6" >
                                <h4 class="font-weight-light">Data Wilayah</h4>
                            </div>
                            <div class="col-6" align="right">
                                <i class="fas far fas fa-users fa-3x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="bg-kpp">
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kecamatan Cilodong</td>
                                    <td>{{ $kecil }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan Cimanggis</td>
                                    <td>{{ $kecim }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan Cipayung</td>
                                    <td>{{ $kecip }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan Sukmajaya</td>
                                    <td>{{ $kesuk }} / {{ $totalwp }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan Tapos</td>
                                    <td>{{ $ketap }} / {{ $totalwp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.content -->
@endsection
{{-- chart js --}}
@section('js')
<script src="{{ asset('vendor') }}/dist/js/Chart.bundle.js" integrity="sha512-G8JE1Xbr0egZE5gNGyUm1fF764iHVfRXshIoUWCTPAbKkkItp/6qal5YAHXrxEu4HNfPTQs6HOu3D5vCGS1j3w==" crossorigin="anonymous"></script>
<script>
    var ctx = document.getElementById('myChart');
    var SudahLapor = {{$jumlahSudahLapor }};
    var BelumLapor = {{$jumlahBelumLapor }};
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Sudah Lapor ','Belum Lapor '],
            datasets: [{
                label: '# of Votes',
                data: [SudahLapor,BelumLapor],
                backgroundColor: [
                    'rgba(116, 254, 39, 0.8)',
                    'rgba(254, 34, 67, 0.8)',
                ],
                borderColor: [
                    'rgba(116, 254, 39, 0.8)',
                    'rgba(254, 34, 67, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            // scales: {
            //     yAxes: [{
            //         ticks: {
            //             beginAtZero: true
            //         }
            //     }]
            // }
        }
    });
    </script>
<script>
    $(document).ready(function(){
        $('#filter').on('change', function(e){
            var kec = e.target.value;
            // alert(kec);
            $.get('/dashboard/json?kecamatan=' + kec, function(data){
                $('#masuk').empty();
                $.each(data, function(index, objek){
                    $('#masuk').append(
                        '<option value="'+objek.kelurahan+'"> Kelurahan '+objek.kelurahan+'</option>'
                    );
                })
            })
        });
    });
</script>
@endsection
