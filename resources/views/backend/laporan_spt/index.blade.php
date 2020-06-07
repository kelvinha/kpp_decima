@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offset-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Laporan SPT</li>
                </ol>
            </div>
        </div>
</section>
<section class="content">
    <div class="container-fluid">
        @if($pesan = Session::get('sukses'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close close-success">×</button>
            <h4 class="alert-heading">Selamat!</h4>
            <p>{{ $pesan }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="font-weight-w500">Laporan SPT</span></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-md-6">
                                <button class="btn btn-success"><i class="fa fa-upload"></i> &nbsp;Print to Pdf</button>
                                <button class="btn btn-primary"><i class="fa fa-upload"></i> &nbsp;Export to
                                    Excel</button>
                            </div>
                            <div class="col-sm-8 col-md-6 ps" align="right">
                                <button class="btn btn-danger" style="margin-left: 55.2%;"><i class="fa fa-eye"></i>
                                    &nbsp;Lihat Presentase</button>
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
                                    <th>Tanggal Lapor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npwp_wp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kategori_wp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_spt }}</td>
                                    <td>{{ $item->tahun_pajak }}</td>
                                    <td>{{ $item->status_lapor }}</td>
                                    @if ($item->tanggal_lapor === NULL)
                                    <td> - </td>
                                    @else
                                    <td>{{ $item->tanggal_lapor }}</td>
                                    @endif
                                    <td class="text-nowrap">
                                        <a href="{{ route('laporanspt.show',['id' => $item->id_wp]) }}"
                                            class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('laporanspt.edit',['id' => $item->id_spt]) }}"
                                            class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></a>
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
                                    <th>Tahun Pajak</th>
                                    <th>Status Lapor</th>
                                    <th>Tanggal</th>
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
        $('.close-success').click(function () {
            $('.alert').delay().slideUp();
        });
    });

</script>
@endsection
