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
          <h1 class="m-0">{{$pageName}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">Extras</a></li>
            <li class="breadcrumb-item active">{{$pageName}}</li>
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
                <h3 class="card-title">@lang('All Achievements')</h3>
                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                <a style="max-width: 200px; float: right; display: inline-block;" href="{{ url('admin/add-edit-achievements') }}" class="btn btn-block btn-primary">Add Achievements</a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Linked Url</th>
                    <th>Image</th>
                    <th>Created on</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                      @foreach($achievements as $row)
                        <tr>
                          <td>{{ $i++; }}</td>
                          <td>{{ $row['name'] }}</td>
                          <td><a href="{{$row['url']}}" target="_blank">View</a></td>
                          <td><img src="{{ url('images/achievements/'.$row['image']) }}" height="50px" width="50px"></td>
                          <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                          <td>
                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                              @if ($row['status']==1)
                                <a class="updateAchievementsStatus" id="achievements-{{ $row['id'] }}" achievements_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                              @else
                                <a class="updateAchievementsStatus" id="achievements-{{ $row['id'] }}" achievements_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                              @endif
                              &nbsp;&nbsp;
                            @endif
                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                              <a href="{{ url('admin/add-edit-achievements/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
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
