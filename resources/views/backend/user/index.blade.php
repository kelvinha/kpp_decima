@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
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
                    <div class="card-header">
                        <div class="card-title"><span class="font-weight-w500">Data Pegawai</span></div>
                    </div>
                    <div class="form-group col-sm-6 col-md-8">
                        <button class="btn btn-primary" type="submit"><span class="fas fa-plus"></span>Tambah Data</button>
                    </div>
                    <div class="col-sm-6 col-md-8" align="right">
                        <form action="" method="" class="form-inline">
                            <div class="form-group">
                                <label for="">Search</label>
                                <input type="text" class="ml-2 form-control" placeholder="Search..">
                                <button type="submit" class="btn btn-info ml-2">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center table-responsive">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>NIP</th>
                                    <th>Nama Pegawai</th>
                                    <th>Seksi</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                    {{-- <td>{{ $loop->iteration + ($user->perpage()* ($user->currentPage()-1)) }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nip }}<td> 
                                    <td>{{ $item->name }}<td> 
                                    <td>{{ $item->seksi }}<td> 
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}<td> 
                                        <td class="text-nowrap">
                                            <button class="btn btn-info"><i class="fas fa-info-circle"></i></button>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$user->links()}}
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