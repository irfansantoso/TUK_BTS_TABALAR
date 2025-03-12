@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('tongkang.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_tongkang" name="kode_tongkang" placeholder="Kode Tongkang" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Tongkang</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_tongkang" name="nama_tongkang" placeholder="Nama Tongkang">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode Tongkang</th>
            <th>Nama Tongkang</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($tongkang as $tkg)
            <tr>              
                <td>{{ $tkg->kode_tongkang }}</td>
                <td>{{ $tkg->nama_tongkang }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Tongkang</th>
            <th>Nama Tongkang</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection