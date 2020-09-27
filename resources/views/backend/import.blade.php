@extends('layouts.backend')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Import File</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Import File</li>
                </ol>
            </div>
        </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card elevation-2">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close success">×</button> 
                        <h4 class="alert-heading">Selamat !</h4>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="col-md-12">
                       <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('vendor')}}/dist/img/undraw.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="alert alert-info bg-kpp elevation-2" role="alert">
                                        <h4 class="alert-heading"><i class="fas fa-exclamation-circle"></i> Ketentuan:</h4>
                                        <ul>
                                            <li><p>File yang di-import harus berekstensi <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx !</p></li>
                                            <li><p>Import Master Npwp, Master SPT dan Wajib Spt, ketiganya wajib di import.</p></li>
                                        </ul>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <button class="btn btn-success" data-target="#import-m-wp" data-toggle="modal"><i class="fa fa-download"></i> &nbsp;Import Master Wajib Pajak</button>
                                        <button class="btn btn-success" data-target="#import-pegawai" data-toggle="modal"><i class="fa fa-download"></i> &nbsp;Import Data Pegawai</button>
                                        <button class="btn btn-success" data-target="#import-wilayah" data-toggle="modal"><i class="fa fa-download"></i> &nbsp;Import Data Wilayah</button>
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
<div class="modal fade" id="import-pegawai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Import Data Pegawai </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.pegawai') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Masukan file bertipe <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx </p>
                    <input type="file" class="form-control" name="import-pegawai" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="import-m-wp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Import Data Wajib Pajak </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.master-wp') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Import Master NPWP <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx </p>
                    <input type="file" class="form-control" name="import-master-npwp" required><br>
                    <p>Import Master SPT <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx </p>
                    <input type="file" class="form-control" name="import-master-spt" required><br>
                    <p>Import Wajib SPT <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx </p>
                    <input type="file" class="form-control" name="import-wajib-spt" required><br>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="import-wilayah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-kpp">
                <h4 class="modal-title">Import Data Wilayah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.dim-wilayah') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Masukan file bertipe <span class="text-red">*</span>.xls <span class="text-red">*</span>.xlsx </p>
                    <input type="file" class="form-control" name="import-wilayah" required>
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
        $('.close.success').click(function(){
            $('.alert.alert-success').slideUp(500);
        });
    });

</script>
@endsection
