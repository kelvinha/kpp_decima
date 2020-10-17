@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Data Wajib Pajak</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Wajib Pajak</li>
                </ol>
            </div>
        </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close success">×</button> 
                    <h4 class="alert-heading">Selamat !</h4>
                    <p>{{ $message }}</p>
                  </div>
                @endif
                @if ($message = Session::get('deleted'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close success">×</button> 
                    <h4 class="alert-heading">Selamat !</h4>
                    <p>{{ $message }}</p>
                  </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6">
                                <form class="form-inline ps" action="{{route('wp.index')}}" method="get">
                                    <div class="form-group mx-sm-3">
                                        <select class="form-control" name="tahun" required>
                                            <option disabled selected>Pilih Tahun</option>
                                            @foreach ($tahun as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-4 mb-2 d-flex justify-content-end">
                                @if(Request::get('cari'))
                                <form action="{{ route('wp.index') }}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" name="cari" class="ml-2 form-control" placeholder="Search.." required>
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                        <a href="{{route('wp.index')}}" class="btn btn-danger ml-2">Kembali</a>
                                    </div>
                                </form>
                                @elseif(Request::get('tahun'))
                                <form action="{{ route('wp.index') }}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" name="cari" class="ml-2 form-control" placeholder="Search.." required>
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                        <a href="{{route('wp.index')}}" class="btn btn-danger ml-2">Kembali</a>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('wp.index') }}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" name="cari" class="ml-2 form-control" placeholder="Search.." required>
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                        <p>Cari Berdasarkan Kecamatan Dan Kelurahan:</p>
                        <form action="{{ route('wp.index') }}" method="get">
                        <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <select class="form-control text-center" required name="kecamatan" id="filter">
                                            <option selected disabled>-- Pilih Berdasarkan --</option>
                                            @foreach ($kecamatan as $item)
                                                <option value="{{ $item->kecamatan }}">Kecamatan {{ $item->kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <select class="form-control text-center" required name="kelurahan" id="masuk">
                                            <option selected disabled>-- Pilih Berdasarkan --</option>
                                        </select>
                                    </div>
                                </div>
                                @if (Request::get('kecamatan'))
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn bg-kpp" type="submit">Cari Data</button>
                                        <a href="{{ route('wp.index') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                                @else                                    
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn bg-kpp px-5" type="submit">Cari Data</button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                        @if ($message = Session::get('error'))
                        <div class="callout callout-info alert" style="color: green;">
                            <p>Hasil Pencarian Data dengan Keyword : <b style="color: red;">{{ $message }}</b> Tidak tersedia</p>
                        </div>
                        @elseif ($m = Request::get('tahun'))
                        <div class="callout callout-info" style="color: green;">
                            <p>Hasil Pencarian Data dengan Keyword : <b>{{ $m }}</b></p>
                        </div>
                        @elseif ($m = Request::get('cari'))
                        <div class="callout callout-info" style="color: green;">
                            <p>Hasil Pencarian Data dengan Keyword : <b>{{ $m }}</b></p>
                        </div>
                        @endif
                        @if ($data_wp->count() == 0)
                        <table class="table table-bordered table-striped text-center">
                        @else
                        <table class="table table-bordered table-striped text-center table-responsive">
                        @endif
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Jenis WP</th>
                                    <th>Alamat</th>
                                    <th>Nama AR</th>
                                    <th>Seksi</th>
                                    <th>Tahun Pajak</th>
                                    <th>Status SPT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data_wp->count() == 0)
                                    <tr>
                                        <td colspan="12" class="text-center">No Data Available</td>
                                    </tr>
                                @endif
                                @foreach ($data_wp as $i => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->wajib_npwp }}</td>
                                    <td>{{ $item->nama_wp }}</td>
                                    <td>{{ $item->wajib_jeniswp }}</td>
                                    <td>
                                        {{ $item->kota }}.,{{ $item->kelurahan }},{{ $item->kecamatan }}, {{ $item->propinsi }}
                                    </td>
                                    <td>{{ $item->nama_ar }}</td>
                                    <td>{{ $item->seksi }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    @if ($item->status_spt === null)
                                    <td>
                                        <span class="badge badge-danger">Belum Lapor</span>
                                    </td>
                                    @else
                                    <td><span class="badge badge-success">{{ $item->status_spt }}</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('wp.show',['id' => $item->wajib_spt_id]) }}" class="btn btn-primary" title="Detail"><i class="fa fa-info-circle"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <p class="mt-4 font-weight-w500">Showing 1 to {{ $data_wp->count() }} of {{ $total }} entries</p>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-end mt-4">
                                        {{ $data_wp->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Perhatian ! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('wp.destroy') }}" method="GET">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus ?</p>
                <input type="hidden" id="idnpwp" name="idnpwp" value="">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- DataTables -->
<script src="{{ asset('vendor') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('vendor') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
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
        $('.close .success').click(function(){
            $('.alert').slideUp(500);
        });
        $('.close .error').click(function(){
            $('.alert').slideUp(500);
        });
        $('.alert').delay(2000).slideUp(500);
    });

</script>
<script>
    $(document).ready(function(){
        $('#filter').on('change', function(e){
            var kec = e.target.value;
            // alert(kec);
            $.get('{{route('wp.json')}}'+'?kecamatan='+ kec, function(data){
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
