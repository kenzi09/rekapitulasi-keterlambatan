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
              <li class="breadcrumb-item active">Tambah Data Murid</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Form Data Keterlambatan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route( $role . '.lates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="card-body">
            <div class="form-group">
              
                <label>NAMA</label>
                <select class="form-control select2 select2-purple @error('student_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="student_id"  placeholder="Masukkan Role">
                  @foreach ($students as $item)
                      
                  <option value="{{ $item->id }}">{{ $item->name }}</option>

                  @endforeach
                  </select>
                  @error('student_id')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                 @enderror

                 <!-- Date and time -->
                 {{-- <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                     <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" @error('date_time_late') is-invalid @enderror name="date_time_late" value="{{ old('date_time_late') }}">
                     <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                         <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                     </div>
                   @error('date_time_late')
                     <div class="alert alert-danger">
                       {{ $message }}
                     </div>
                   @enderror
                 </div> --}}
                 {{-- <label>Date masks:</label> --}}
                 
                 
                 <label>TANGGAL</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @error('date_time_late') is-invalid @enderror name="date_time_late" value="{{ old('date_time_late') }}" placeholder="YYYY-MM-DD">
                  </div>
                <!-- /.form group -->
                      
              <label>ALASAN</label>
                <textarea type="text" class="form-control @error('information') is-invalid @enderror" name="information" value="" placeholder="Masukkan Alasan Keterlambatan">{{ old('information') }}</textarea>
                  
                <!-- error message untuk title -->
                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Bukti Keterlambatan</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="bukti">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>

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