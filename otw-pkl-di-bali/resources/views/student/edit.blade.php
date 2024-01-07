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
              <li class="breadcrumb-item"><a href="{{ route( $role . '.dashboard') }}">Home</a></li>
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
        <form action="{{ route( $role . '.student.update', $student['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')

          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">NIS</label>
                <input type="integer" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $student->nis) }}" placeholder="Masukkan nis">
            
                <!-- error message untuk nis -->
                @error('nis')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">NAMA</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $student->name) }}" placeholder="Masukkan name">
            
                <!-- error message untuk name -->
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Rayon</label>
              <select class="form-control select2 select2-purple @error('rayon_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rayon_id">
                {{-- value="{{ old('rayon', $rayon->rayon) }}" --}}
              @foreach ($rayons as $rayon)

                <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    
              @endforeach
                </select>
              @error('rayon_id')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
             @enderror
        </div>  

          <div class="form-group">
              <label>Rombel</label>
              <select class="form-control select2 select2-purple @error('rombel_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rombel_id">
                {{-- value="{{ old('rombel', $rayon->rombel) }}" --}}
              @foreach ($rombels as $rombel)

                <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                    
              @endforeach
                </select>
              @error('rombel_id')
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