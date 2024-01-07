@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DATA KETERLAMBATAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Data Keterlambatan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card-group">
    @forelse ($datas as $data)
        {{-- <div class="card">
          <img src="{{ asset('/storage/posts/'.$data->bukti) }}" class="card-img-top imag">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">{{  $data->information }}</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          </div>
        </div>
    </div> --}}

    <div class="card" style="width: 18rem;">
    {{-- <div class="card-group"> --}}
        <img src="{{ asset('/storage/posts/'.$data->bukti) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $data->students->name }}</h5>
          <p class="card-text">{{  $data->information }}</p>
          <a href="{{ route('Admin.data.downloadconto', $data->id) }}" class="btn btn-primary">Download</a>
        </div>
    </div>
    @empty
    </div>
        <div class="alert alert-danger">
            Data belum Tersedia.
        </div>
    @endforelse

</div>

@endsection