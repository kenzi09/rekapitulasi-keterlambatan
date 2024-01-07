@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Keterlambatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route( $role . '.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Keterlambatan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Form Update Keterlambatan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route( $role . '.lates.update', $lates['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')

            <div class="card-body">
            <div class="form-group">
              <label>NAMA</label>
              <select class="form-control select2 select2-purple @error('student_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="student_id">
                {{-- value="{{ old('rombel', $rayon->rombel) }}" --}}
              @foreach ($students as $student)

                <option value="{{ $student->id }}">{{ $student->name }}</option>
                    
              @endforeach
                </select>
              @error('student_id')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
             @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">TANGGAL</label>
                <input type="integer" class="form-control @error('date_time_late') is-invalid @enderror" name="date_time_late" value="{{ old('date_time_late', $lates->date_time_late) }}" placeholder="Masukkan date_time_late">
            
                <!-- error message untuk date_time_late -->
                @error('date_time_late')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

          {{-- <div class="card-body"> --}}
            <div class="form-group">
                <label class="font-weight-bold">INFORMATION</label>
                <input type="text" class="form-control @error('information') is-invalid @enderror" name="information" value="{{ old('information', $lates->information) }}" placeholder="Masukkan information">
            
                <!-- error message untuk information -->
                @error('information')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="form-group">
              <label>Keterlambatan</label>
              <select class="form-control select2 select2-purple @error('rayon_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rayon_id">
                {{-- value="{{ old('rayon', $rayon->rayon) }}" --}}
              {{-- @foreach ($rayons as $rayon)

                <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    
              @endforeach
                </select>
              @error('rayon_id')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
             @enderror
        </div> --}}

          

          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-danger">Update</button>
          </div>
        </form>
      </div>
    <!-- /.content -->
  </div>
@endsection