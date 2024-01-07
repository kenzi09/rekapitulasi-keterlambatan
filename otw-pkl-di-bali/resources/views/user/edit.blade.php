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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Update Rombel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Form Update Rombel</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Admin.user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')

          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">NAMA</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan name">
            
                <!-- error message untuk name -->
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email">
            
                <!-- error message untuk email -->
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Role</label>
              <select class="form-control select2 select2-purple @error('role') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="role" value="{{ old('role', $user->role) }}" placeholder="Masukkan Role">
                <option selected="selected" value="PembimbingSiswa">Pembimbing Siswa</option>
                <option>Admin</option>
              </select>
              @error('role')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
             @enderror
            </div>

            <div class="card-body">
              <div class="form-group">
                  <label class="font-weight-bold">PASSWORD</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" password="password" value="{{ old('password', $user->password) }}" placeholder="Masukkan password">
              
                  <!-- error message untuk password -->
                  @error('password')
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