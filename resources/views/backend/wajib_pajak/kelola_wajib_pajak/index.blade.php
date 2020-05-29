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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-10">
                                <div class="card-title"><span class="font-weight-w500">Kelola Data Wajib Pajak</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <a href="{{ route('wp.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i>
                                    &nbsp; Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center text-nowrap">
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
                                    <td> {{$item->kategori_wp}}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_spt }}</td>
                                    <td>
                                        <button class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal"
                                            data-target="#modal-default">
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Perhatian ! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger">Ya, Hapus</button>
            </div>
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
