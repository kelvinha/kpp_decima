@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Pengawasan dan Konsultasi IV</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pengawasan dan Konsultasi IV</li>
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
                            <div class="col-md-6 col-sm-4 mb-2">
                                @if(Request::get('cari'))
                                <form action="{{ route('waskon4.index') }}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" name="cari" class="ml-2 form-control" placeholder="Search by name.." required>
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                        <a href="{{route('waskon4.index')}}" class="btn btn-danger ml-2">Kembali</a>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('waskon4.index') }}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" name="cari" class="ml-2 form-control" placeholder="Search by name.." required>
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close success">×</button> 
                            <h4 align="center">Maaf,{{ $message }}</h4>
                        </div>
                        @endif
                        @if ($waskon4->count() == 0)
                        <table class="table table-bordered table-striped text-center">
                        @else
                        <table class="table table-bordered table-striped text-center">
                        @endif
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIP</th>
                                    <th>Nama Ar</th>
                                    <th>Seksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($waskon4->count() == 0)
                                    <tr>
                                        <td colspan="12" class="text-center">No Data Available</td>
                                    </tr>
                                @endif
                                @foreach ($waskon4 as $i => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->seksi }}</td>
                                    <td>
                                        {{-- <a href="{{ route('wp.show',['id' => $item->wajib_spt_id]) }}" class="btn btn-primary" title="Detail"><i class="fa fa-info-circle"></i></a> --}}
                                        <a href="{{ route('waskon4.show',['id'=> $item->id]) }}" class="btn btn-primary"> <i class="fa fa-info-circle"></i> </a>
                                    </td>
                                    {{-- <td class="text-nowrap">
                                    <a href="{{ route('wp.edit',['id' => $item->id_wp]) }}" class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal"
                                    data-target="#delete" data-myid="{{ $item->npwp }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                <p class="mt-4 font-weight-w500">Showing 1 to {{ $waskon4->count() }} of 10 entries</p>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-end mt-4">
                                        {{ $waskon4->links() }}
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
        $('.close .success').click(function(){
            $('.alert').slideUp(500);
        });
        $('.close .error').click(function(){
            $('.alert').slideUp(500);
        });
        $('.alert').delay(2000).slideUp(500);
    });

</script>
@endsection
