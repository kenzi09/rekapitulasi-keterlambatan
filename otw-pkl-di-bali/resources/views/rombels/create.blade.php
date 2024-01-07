@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Rombel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Rombel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Rombel</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Admin.rombel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="card-body">
            <div class="form-group">
              {{-- <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
              <label>ROMBEL</label>
                            <input type="text" class="form-control @error('rombel') is-invalid @enderror" name="rombel" value="{{ old('rombel') }}" placeholder="Masukkan Rombel anda">
                        
                            <!-- error message untuk title -->
                            @error('rombel')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

            </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    <!-- /.content -->
  </div>
@endsection