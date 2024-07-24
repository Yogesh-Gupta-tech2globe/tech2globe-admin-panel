@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @if(Session::has('success_message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success:</strong>{{ Session::get('success_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('error_message'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error:</strong>{{ Session::get('error_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">File Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item">File Management</li>
            <li class="breadcrumb-item active">{{ $pageName }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

 
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $pageName }} : {{count($fileData)}}</h3>
                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                <a style="max-width: 220px; float: right; display: inline-block;" href="{{ url('admin/add-edit-include-file') }}" class="btn btn-block btn-primary">Upload New Include File</a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="fileManagement" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>File ID</th>
                    <th>File Name</th>
                    <th>View</th>
                    <th>Created on</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($fileData as $row)
                        <tr>
                          <td>F{{ $row['id'] }}</td>
                          <td>{{ $row['file_name'] }}</td>
                          <td><a target="_blank" href="/admin/include/{{ $row['id'] }}">View Page</a></td>
                          <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                          <td>
                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                              <a href="{{ url('admin/add-edit-include-file/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                              &nbsp;&nbsp;
                            @endif
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
