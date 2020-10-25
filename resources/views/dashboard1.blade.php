@extends('layouts.backend')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h5 class="m-0 text-dark">Selamat Datang <strong>{{ Auth::user()->name }}</strong>,</h5> 
                <div class="row container">
                    @if ($target_capaian == null)
                    <p>Target Capaian per AR Tahun ini </p><span class="blinking"> 0%</span>
                    @else
                    <p>Target Capaian per AR Tahun ini </p><span class="blinking">{{$target_capaian->target}}%</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content px-1">
    <div class="container-fluid">
        <div class="alert bg-kpp" role="alert">
            @if ($laporan_import == NULL)
            <div class="row">
                <div class="col">
                    <h6>Tanggal Terakhir Import:-, Oleh: -</h6>
                </div>
                <div align="right">
                    <a href="{{ route('refresh') }}" class="btn btn-success" style="text-decoration: none">Refresh</a>
                </div>
            </div>  
            @else
            <div class="row">
                <div class="col">
                    <h6>Tanggal Terakhir Import: <b>{{ date('d M Y', strtotime($laporan_import->created_at)) }}</b>, Oleh: <b>{{ $laporan_import->nama_admin }}</b></h6>
                </div>
                <div align="right">
                    <a href="{{ route('refresh') }}" class="btn btn-success" style="text-decoration: none">Refresh</a>
                </div>
            </div>
            @endif
        </div>
        @if ($dashboard != NULL)
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
                                            <span class="h4">{{ $dashboard->jumlah_ar }} Orang</span>
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
                                            <span class="h4">{{$dashboard->data_wajib_spt}} Wajib SPT</span>
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
                                            <span class="h4">{{ $dashboard->sudah_lapor_spt }} Wajib SPT</span>
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
                                            <span class="h4">{{ $dashboard->belum_lapor_spt }} Wajib SPT</span>
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
                        <div id="chartContainer" style="height: 215px; width: 100%;"></div>
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
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dashboard == null)
                                <tr>
                                    <td colspan="3" align="center">Tidak ada data</td>
                                </tr>
                                @else
                                <tr>
                                    <td><a href="{{ route('waskon2.index') }}">Pengawasan dan Konsultasi II</a></td>
                                    <td>{{ $dashboard->cap_waskon2 }} / {{ $dashboard->waskon2 }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_waskon2 / $dashboard->waskon2) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('waskon3.index') }}">Pengawasan dan Konsultasi III</a></td>
                                    <td>{{ $dashboard->cap_waskon3 }} / {{ $dashboard->waskon3 }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_waskon3 / $dashboard->waskon3) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('waskon4.index') }}">Pengawasan dan Konsultasi IV</a></td>
                                    <td>{{ $dashboard->cap_waskon4 }} / {{ $dashboard->waskon4 }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_waskon4 / $dashboard->waskon4) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('ekspen.index') }}">Ekstensifikasi dan Penyuluhan</a></td>
                                    <td>{{ $dashboard->cap_ekspen }} / {{ $dashboard->ekspen }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_ekspen / $dashboard->ekspen) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                @endif
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
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dashboard == null)
                                <tr>
                                    <td colspan="3" align="center">Tidak ada data</td>
                                </tr>
                                @else
                                <tr>
                                    <td><a href="{{ route('cilodong.index') }}">Kecamatan Cilodong</a></td>
                                    <td>{{ $dashboard->cap_kecil }} / {{ $dashboard->kecil }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_kecil/ $dashboard->kecil) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('cimanggis.index') }}">Kecamatan Cimanggis</a></td>
                                    <td>{{ $dashboard->cap_kecim }} / {{ $dashboard->kecim }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_kecim/ $dashboard->kecim) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('cipayung.index') }}">Kecamatan Cipayung</a></td>
                                    <td>{{ $dashboard->cap_kecip }} / {{ $dashboard->kecip }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_kecip/ $dashboard->kecip) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('sukmajaya.index') }}">Kecamatan Sukmajaya</a></td>
                                    <td>{{ $dashboard->cap_kesuk }} / {{ $dashboard->kesuk }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_kesuk/ $dashboard->kesuk) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('tapos.index') }}">Kecamatan Tapos</a></td>
                                    <td>{{ $dashboard->cap_ketap }} / {{ $dashboard->ketap }}</td>
                                    <td> <span class="badge badge-success" style="font-size: 20px;">{{ round(((( $dashboard->cap_ketap/ $dashboard->ketap) * 100) / $target_capaian->target)*100,2) }} %</span> </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert bg-danger" role="alert">
            <div class="row">
                <div class="col-1">
                    <i class="fas fa-4x fa-info-circle"></i>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold">Perhatian: </h4>
                    <ul>
                        <li>Lakukan import data melalui PhpMyAdmin</li>
                        <li>Silahkan Tekan Tombol Refresh, untuk melakukan Pembaruan Data</li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- /.content -->
@endsection
{{-- chart js --}}
@section('js')
<script src="{{ asset('vendor') }}/dist/js/canvasjs.min.js"></script>
<script>
    window.onload = function() {
    var SudahLapor = {{ $jumlahSudahLapor }};
    var BelumLapor = {{ $jumlahBelumLapor }};
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        data: [{
            type: "pie",
            startAngle: 270,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: [
                {y: SudahLapor, label: "Sudah Lapor", color: '#28a745', indexLabelFontSize: 20},
                {y: BelumLapor, label: "Belum Lapor", color: '#dc3545', indexLabelFontSize: 20},
            ]
        }]
    });
    chart.render();
    
    }
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
