@extends('layouts.backend')
@section('content')

<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Detail Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Data Pegawai</li>
            </ol>   
        </div>
    </div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            @include('backend.alert.error')
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('vendor')}}/dist/img/info.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="col-sm-6">
                                    <h6 class="font-weight-bold text-blue">NIP</h6>
                                    <p>{{ $user->nip }}</p><br>
                                    <h6 class="font-weight-bold text-blue">NAMA</h6>
                                    <p>{{ $user->name }}</p><br>
                                    <h6 class="font-weight-bold text-blue">ROLE</h6>
                                    <p>{{ $user->role }}</p><br>
                                    <h6 class="font-weight-bold text-blue">SEKSI</h6>
                                    <p>{{ $user->seksi }}</p><br>
                                    <div class="form-group">
                                        <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
                                    </div>
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