@extends('layouts.backend')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Selamat Datang <strong>{{ Auth::user()->name }}</strong> !<br>di Aplikasi Monitoring Kepatuhan
                    Wajib Pajak </h5> 
                <div class="row container">
                    <p>Target Capaian per AR Tahun ini </p><span class="blinking">86%</span>
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


<!-- Main content -->
{{-- <section class="content px-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-12">
                <div class="card elevation-2">
                    <div class="card-header bg-kpp text-center">
                        <p>Filter Seluruh Data Berdasarkan</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select class="form-control text-center" id="filter">
                                        <option selected disabled>-- Pilih Berdasarkan --</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->kecamatan }}">Kecamatan {{ $item->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select class="form-control text-center" id="masuk">
                                        <option selected disabled>-- Pilih Berdasarkan --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button class="btn bg-kpp px-5">Cari Data</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="content px-4 py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="javascript:void(0)">
                    <div class="card bg-light elevation-3" id="tes1">
                        <div class="card-header">
                            <h4 class="font-weight-light">Total Pegawai</h4>
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
            <div class="col-md-3">
                <a href="{{ route('wp.index') }}">
                    <div class="card bg-light elevation-3" id="tes2">
                        <div class="card-header">
                            <h4 class="font-weight-light">Data Wajib Pajak</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4">
                                    <i class="fas fa-user-friends fa-3x"></i>
                                </div>
                                <div class="col-sm-10 col-md-8">
                                    <span class="h4">{{$totalwp}} Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
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
                                    <span class="h4">{{ $totalsudahlapor }} Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
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
                                    <span class="h4">{{ $totalbelumlapor }} Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="javascript:void(0)">
                    <div class="card bg-light elevation-3" id="tes5">
                        <div class="card-header">
                            <h4 class="font-weight-light">Pengawasan dan Konsultasi 2</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4">
                                    <i class="fas far fas fa-users fa-3x"></i>
                                </div>
                                <div class="col-sm-10 col-md-8 pt-1">
                                    <span class="h4">{{ $waskon2 }} Wajib Pajak</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)">
                    <div class="card bg-light elevation-3" id="tes6">
                        <div class="card-header">
                            <h4 class="font-weight-light">Pengawasan dan Konsultasi 3</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4">
                                    <i class="fas far fas fa-users fa-3x"></i>
                                </div>
                                <div class="col-sm-10 col-md-8 pt-1">
                                    <span class="h4">{{ $waskon3 }} Wajib Pajak</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)">
                    <div class="card bg-light elevation-3" id="tes7">
                        <div class="card-header">
                            <h4 class="font-weight-light">Pengawasan dan Konsultasi 4</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4">
                                    <i class="fas far fas fa-users fa-3x"></i>
                                </div>
                                <div class="col-sm-10 col-md-8 pt-1">
                                    <span class="h4">{{ $waskon4 }} Wajib Pajak</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)">
                    <div class="card bg-light elevation-3" id="tes8">
                        <div class="card-header">
                            <h4 class="font-weight-light">Ekstensifikasi dan Penyuluhan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4">
                                    <i class="fas far fas fa-users fa-3x"></i>
                                </div>
                                <div class="col-sm-10 col-md-8 pt-1">
                                    <span class="h4">{{ $ekspen }} Wajib Pajak</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- /.content -->
@endsection
{{-- chart js --}}
@section('js')
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
        var lineChartData = jQuery.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Chrome',
                'IE',
                'FireFox',
                'Safari',
                'Opera',
                'Navigator',
            ],
            datasets: [{
                data: [700, 500, 400, 600, 300, 100],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = jQuery.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })

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
