@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <a href="{{ route('register') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
          <div class="card">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table User</h3>
  
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($user as $users)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{  $users->name }}</td>
                              <td>{{  $users->email }}</td>
                              <td>{{  $users->role }}</td>
                              <td>
                                <a href="{{ route('Admin.user.edit', $users->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> EDIT</a>
                                <button data-toggle="modal" data-target="#modal-hapu{{ $users->id }}s" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> HAPUS</button>
                              </td>
                          </tr>
                          <!-- /.modal -->

                            <div class="modal fade" id="modal-hapu{{ $users->id }}s">
                                <div class="modal-dialog">
                                <div class="modal-content bg-secondary">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <p>apakah kamu yakin ingin menghapus <b>{{  $users->users }}</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <form action="{{ route('Admin.user.destroy', $users->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-light">Ya Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div> 
                            <!-- /.modal -->
                        @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                        @endforelse

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection