@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
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
                    <div class="card-header">
                        <div class="card-title"><span class="font-weight-w500">Data Wajib Pajak</span></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-4">
                                <form class="form-inline ps" action="" method="">
                                    <div class="form-group mx-sm-3">
                                        <select class="form-control">
                                            <option disabled selected>Pilih Tahun</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-8" align="right">
                                <button class="btn btn-success" data-target="#import-excel" data-toggle="modal"><i class="fa fa-download"></i> &nbsp;Import Pegawai</button>
                                <button class="btn btn-success"><i class="fa fa-download"></i> &nbsp;Import from Excel</button>
                                <a href="{{ route('wp.tambah') }}" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Tambah Data Dummy</a>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-2 mt-3">
                                <form action="" method="" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Search</label>
                                        <input type="text" class="ml-2 form-control" placeholder="Search..">
                                        <button type="submit" class="btn btn-info ml-2">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped text-center table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Kategori WP</th>
                                    <th>Alamat</th>
                                    <th>Nama Seksi</th>
                                    <th>Jenis SPT</th>
                                    <th>Tahun Pajak</th>
                                    <th>Status</th>
                                    <th>Tanggal Lapor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wp as $i => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npwp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kategori_wp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->nama_seksi }}</td>
                                    <td>{{ $item->jenis_spt }}</td>
                                    <td>{{ $item->tahun_pajak }}</td>
                                    @if ($item->status_lapor == "Sudah Lapor")
                                    <td> <span class="badge badge-success">{{ $item->status_lapor }}</span> </td>
                                    @else
                                    <td> <span class="badge badge-danger">{{ $item->status_lapor }}</span> </td>  
                                    @endif
                                    @if ( $item->tanggal_lapor == NULL)
                                        <td> - </td>
                                    @else
                                    <td>{{ $item->tanggal_lapor }}</td>
                                    @endif
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
<div class="modal fade" id="import-excel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Perhatian ! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.pegawai') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Masukan file bertipe <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx <span class="text-red">*</span>.csv</p>
                    <input type="file" class="form-control" name="import-pegawai">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
