@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sudah Lapor SPT</li>
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
                        <div class="card-title"><span class="font-weight-w500">Sudah Lapor SPT</span></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-4">
                                <form class="form-inline ps" action="" method="">
                                    <div class="form-group mx-sm-3">
                                        <select class="form-control">
                                            <option disabled selected>Pilih Tahun</option>
                                            @foreach ($tahun as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Tampilkan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <button class="btn btn-primary"><i class="fa fa-upload"></i> &nbsp;Export to
                                    Excel</button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Jenis SPT</th>
                                    <th>Tahun Pajak</th>
                                    <th>Status Lapor</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npwp }}</td>
                                    <td>{{ $item->nama}}</td>
                                    <td>{{ $item->kategori_wp }}</td>
                                    <td class="text-nowrap" >{{ $item->alamat}}</td>
                                    <td>{{ $item->jenis_spt }}</td>
                                    <td>{{ $item->tahun_pajak }}</td>
                                    <td>{{ $item->status_lapor }}</td>
                                    @if ($item->tanggal_lapor === NULL)
                                        <td> - </td>
                                    @else
                                    <td>{{ $item->tanggal_lapor }}</td>
                                    @endif
                                    {{-- <td class="text-nowrap">
                                        <button class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal"
                                        data-target="#hapus" data-myid="{{ $item->npwp }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td> --}}
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
                                    <th>Tahun Pajak</th>
                                    <th>Status Lapor</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Perhatian ! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('wp.destroy') }}" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <p>Apakah anda yakin ingin menghapus ?</p>
                    <input type="text" id="idnpwp" name="idnpwp">
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
    });

</script>
@endsection
