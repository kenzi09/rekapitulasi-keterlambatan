@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route($role . '.dashboard') }}">Home</a></li>
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
          <h3 class="card-title">Form Tambah Murid</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route($role . '.student.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="card-body">
            <div class="form-group">
              {{-- <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
              <label>NIS</label>
                            <input type="integer" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" placeholder="Masukkan Nis anda">
                        
                            <!-- error message untuk title -->
                            @error('nis')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        
              <label>NAMA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama anda">
                        
                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <div class="form-group">
                              <label>Rayon</label>
                              <select class="form-control select2 select2-purple @error('rayon_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rayon_id"  placeholder="Masukkan Role">
                                @foreach ($rayons as $item)
                                
                                <option value="{{ $item->id }}">{{ $item->rayon }}</option>
                                
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