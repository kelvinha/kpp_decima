@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Pegawai</li>
                </ol>
            </div>
        </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                        @if(Request::get('keyword'))
                        <div class="col-sm-6 col-md-6 mt-3 ml-3">
                            <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
                        </div>
                        @else
                        <div class="col-sm-6 col-md-6 mt-3 ml-3">
                            <a class="btn btn-primary" href="{{route('user.create')}}"><span class="fas fa-plus"></span>Tambah Data</a>
                        </div>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3 d-flex justify-content-end mr-3 pr-1">
                                <form action="{{route('user.index')}}" method="GET" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" name="keyword" class="ml-2 form-control" placeholder="Search By Name.." value="{{Request::get('keyword')}}">
                                        <span class="input-group-btn">
                                        <button type="submit" id="search-btn" class="btn btn-info ml-2">Cari</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                        
                    <div class="card-body">
                        @if($m = Request::get('keyword'))
                        <div class="callout callout-info" style="color: green;">
                            <p>Hasil Pencarian Pegawai dengan Keyword : <b>{{ $m }}</b></p>
                        </div>
                        @elseif($m = Session::get('error'))
                        <div class="callout callout-info alert" style="color: green;">
                            <p>Hasil Pencarian Pegawai dengan Keyword : <b style="color: red;">{{ $m }}</b> Tidak tersedia</p>
                        </div>
                        @endif
                        @include('backend.alert.success')
                        <table class="table table-striped table-striped text-center table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Seksi</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                <td>{{ $loop->iteration + ($user->perpage()* ($user->currentPage()-1)) }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->seksi }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a href="{{route('user.show',[$item->id])}}" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-info-circle"></i></a>
                                    <a href="{{route('user.edit',[$item->id])}}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('user.reset',[$item->id])}}" method="get" onclick="return confirm('Apakah Anda yakin akan mereset password?')">
                                        {{csrf_field()}}
                                    <button class="btn btn-success btn-sm" title="Reset Password" data-toggle="modal" data-target="#reset" data-myid="{{ $item->user }}">
                                        <i class="fas fa-unlock-alt"></i>
                                    </button>
                                    </a>
                                    <a href="{{route('user.destroy',[$item->id])}}" method="get" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                                        {{csrf_field()}}
                                    <button class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#delete" data-myid="{{ $item->user }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <p class="mt-4 font-weight-w500">Showing {{ $user->firstItem() }} to {{ ($user->firstItem() - 1) + $user->count() }} of {{ $user->total() }} entries</p>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-end mt-4">
                                        {{ $user->links() }}
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