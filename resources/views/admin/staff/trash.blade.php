@extends('layouts.admin')

@section('content')
  
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
  
    <div class="container-fluid">
  
      <div class="row mb-2">
  
        <div class="col-sm-6">
  
          <h1 class="m-0 text-dark">Data Staff</h1>
  
        </div><!-- /.col -->
  
        <div class="col-sm-6">
  
          <ol class="breadcrumb float-sm-right">
  
            <li class="breadcrumb-item"><a href="#">Home</a></li>
  
            <li class="breadcrumb-item active">Data Staff</li>
  
          </ol>
  
        </div><!-- /.col -->
  
      </div><!-- /.row -->
  
    </div><!-- /.container-fluid -->
  
  </div>
  
  <!-- /.content-header -->
  @if(session('success'))

  <div class="alert alert-success">

      {{session('success')}}

  </div>
  
  @endif

  <div class="card">

    <div class="card-header">

      <a href="{{ route('admin.staff.create') }}" class="card-title">        
 
        <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Data</button>
 
      </a>
 
    </div>
 
    <!-- /.card-header -->
 
    <div class="card-body">
 
      <table id="example1" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th>No.</th>
 
            <th>Nama</th>

            <th>Unit Kerja</th>

            <th>Jabatan</th>

            <th>Role</th>
 
            <th>Action</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($staff as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>{{ $data->name }}</td>

            <td>{{ $data->unit_kerja }}</td>

            <td>{{ $data->jabatan }}</td>

            <td>{{ $data->role }}</td>
        
            <td>
        
                <form method="POST" action="{{route('admin.staff.restore', [$data->id])}}" class="d-inline">
                                    
                    @csrf
                    
                    <input type="submit" value="Restore" class="btn btn-success btn-sm">
                    
                </form>

                <form method="POST" action="{{route('admin.staff.delete-permanent', [$data->id])}}" class="d-inline" onsubmit="return confirm('Delete this nelayan permanently?')">

                    @csrf

                        <input type="hidden" name="_method" value="DELETE">

                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">

                    </form>


            </td>

          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

    <!-- /.card-body -->

  </div>

  @endsection
