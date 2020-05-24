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
                      <div class="card-title"><span class="font-weight-w500">Belom Lapor SPT</span></div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <form class="form-inline" action="" method="" style="margin-left: -9px;">
                            <div class="form-group mx-sm-3">
                                <select class="form-control">
                                    <option disabled selected>Pilih Tahun</option>
                                    <option>2020</option>
                                    <option>2019</option>
                                    <option>2018</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-3">
                                <button class="btn btn-success" type="submit">Tampilkan</button>
                            </div>
                        </form>
                        <button class="btn btn-primary"><i class="fa fa-upload"></i> &nbsp;Export to Excel</button>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 20; $i++)
                                <tr>
                                <td>{{ $i }}</td>
                                  <td>31233034</td>
                                  <td>Dunno</td>
                                  <td> Not found</td>
                                  <td>Bekasi</td>
                                  <td>Belum Lapor</td>
                                  <td>2020</td>
                                  <td>Belum Lapor</td>
                                  <td>23-05-2020</td>
                                  <td class="text-nowrap">
                                    <button class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i></button>
                                  </td>
                              </tr>
                                @endfor
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
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
