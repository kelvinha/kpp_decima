@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Belom Lapor SPT</li>
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
                        <div class="card-title"><p><span class="font-weight-w500">Belom Lapor SPT</span></p></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <form class="form" action="" method="">
                                    {{-- <div class="row">
                                        <div class="form-group col-md-5">
                                            <select name="kategori_wp" class="form-control" required>
                                                <option selected disabled>Pilih Kategori WP</option>
                                                <option value="Badan">Badan</option>
                                                <option value="Orang Pribadi (Karyawan)">Orang Pribadi (Karyawan)</option>
                                                <option value="Orang Pribadi (Non-Karyawan)">Orang Pribadi (Non-Karyawan)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <select name="nama_seksi" class="form-control" required>
                                                <option selected disabled>Nama Seksi</option>
                                                <option value="waskon 1">Waskon 1</option>
                                                <option value="waskon 2">Waskon 2</option>
                                                <option value="waskon 3">Waskon 3</option>
                                                <option value="waskon 4">Waskon 4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Nama AR</th>
                                    <th>Seksi</th>
                                    <th>Jenis SPT</th>
                                    <th>Tahun Pajak</th>
                                    <th>Status SPT</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npwp }}</td>
                                    <td>{{ $item->nama_wp}}</td>
                                    <td>{{ $item->nama_ar}}</td>
                                    <td>{{ $item->seksi}}</td>
                                    @if($item->jenis_spt == null)
                                        <td> - </td>
                                    @else
                                        <td>{{ $item->jenis_spt }}</td>
                                    @endif
                                        <td>{{ $item->tahun }}</td>
                                    @if($item->status_spt == null)
                                        <td> - </td>
                                    @else
                                    <td>
                                        <strong>{{ $item->status_spt }}</strong>
                                    </td>
                                    @endif
                                    
                                    @if ($item->tgl_spt === NULL)
                                        <td> - </td>
                                    @else
                                    <td>{{ $item->tgl_spt }}</td>
                                    @endif
                                    {{-- <td class="text-nowrap">
                                        <button class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal"
                                            data-target="#modal-default">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
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
    });

</script>
@endsection
