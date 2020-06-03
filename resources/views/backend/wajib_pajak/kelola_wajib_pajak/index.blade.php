@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Wajib Pajak</li>
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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="card-title"><span class="font-weight-w500">Kelola Data Wajib Pajak</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 ps-right" align="right">
                                <a href="{{ route('wp.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i>
                                    &nbsp; Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Jenis SPT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wp as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npwp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{$item->kategori_wp}}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_spt }}</td>
                                    <td class="text-nowrap">
                                    <a href="{{ route('wp.show',['id' => $item->id_wp]) }}" class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('wp.edit',['id' => $item->id_wp]) }}" class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal"
                                    data-target="#delete" data-myid="{{ $item->npwp }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Jenis SPT</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
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
@endsection
