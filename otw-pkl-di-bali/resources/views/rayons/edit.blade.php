@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Rayon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Update Rayon</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Form Update Rayon</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Admin.rayon.update', $rayon['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')

          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">RAYON</label>
                <input type="text" class="form-control @error('rayon') is-invalid @enderror" name="rayon" value="{{ old('rayon', $rayon->rayon) }}" placeholder="Masukkan rayon">
            
                <!-- error message untuk rayon -->
                @error('rayon')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
              <label>PEMBIMBING SISWA</label>
              <select class="form-control select2 select2-purple @error('ps_rayon') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="ps_rayon"  placeholder="Masukkan Role">
                {{-- value="{{ old('ps_rayon', $rayon->ps_rayon) }}" --}}
                @foreach ($user as $item)
                                
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                
                @endforeach
                </select>
                @error('ps_rayon')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
               @enderror
            </div>

          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-danger">Update</button>
          </div>
        </form>
      </div>
    <!-- /.content -->
  </div>
@endsection