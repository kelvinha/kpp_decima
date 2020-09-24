@extends('layouts.backend')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger text-center" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
    @endif
    @if (session()->get('message'))
    <div class="alert alert-success" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>SUCCESS:</strong>&nbsp;{{ session()->get('message')}}
    </div>
    @endif
</div>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Change Photo</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Change Photo</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<style type="text/css">
blockquote {
  max-width: 1200px;
  margin: 0;
  width: 100%;
  padding: 20px 100px;
  background: #ffc107;
    color: #243170; 
  position: relative;
}
blockquote::before,
blockquote::after {
  font-size: 350%;
  font-family: arial;
  display:block;
  position: absolute;
}
blockquote::before {
  content: open-quote;
  left: 30px;
    line-height: 40px;
}
blockquote::after {
  content: close-quote;
  right: 30px;
    line-height: 30px;
}
</style>

  <!-- page content -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
                {{-- @include('backend.alert.error') --}}
            <div class="card-header">
                {{csrf_field()}}
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form enctype="multipart/form-data" action="{{ route('foto.ubah') }}" method="post">
                        @csrf
                        <div class="form-group">
                            {{-- <label for="new_password"><strong>New Password:</strong></label> --}}
                            <input type="file" name="foto" class="form-control">
                            <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <button class="btn btn-primary" type="submit" id="">Upload Picture</a></button>
                            <a href="{{url('/dashboard')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection