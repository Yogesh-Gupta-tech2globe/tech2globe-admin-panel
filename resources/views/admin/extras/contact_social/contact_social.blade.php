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
                <h3 class="card-title">@lang('Social Media')</h3>
                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                <a style="max-width: 200px; float: right; display: inline-block;" href="{{ url('admin/add-edit-social-media') }}" class="btn btn-block btn-primary">Add Social Media</a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Redirection Link</th>
                    <th>Created on</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                      @foreach($social as $row)
                        <tr>
                          <td>{{ $i++; }}</td>
                          <td>{{ $row['name'] }}</td>
                          <td><a href="{{ $row['link'] }}" target="_blank">View</a></td>
                          <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                          <td>
                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                              @if ($row['status']==1)
                                <a class="updateSocialStatus" id="social-{{ $row['id'] }}" social_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                              @else
                                <a class="updateSocialStatus" id="social-{{ $row['id'] }}" social_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                              @endif
                              &nbsp;&nbsp;
                            @endif
                            @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                              <a href="{{ url('admin/add-edit-social-media/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@lang('Contact Details')</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <form class="updateContactdetails">
                    <td>Skype ID</td>
                    <td><input type="text" class="form-control" name="skypeid" placeholder="Enter Company Official Skype Id" required @if(!empty('skypeid')) value="{{$skypeid->link}}" @endif></td>
                    <td>@if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)<input type="submit" value="Update" class="btn btn-primary">@endif</td>
                    </form>
                  </tr>
                  <tr>
                    <form class="updateContactdetails">
                    <td>Mail ID</td>
                    <td><input type="email" class="form-control" name="mailid" placeholder="Enter Company Official Mail Id" required @if(!empty('mailid')) value="{{$mailid->link}}" @endif></td>
                    <td>@if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)<input type="submit" value="Update" class="btn btn-primary">@endif</td>
                    </form>
                  </tr>
                  <tr>
                    <form class="updateContactdetails">
                    <td>Phone Number</td>
                    <td><input type="text" class="form-control" name="phone" placeholder="Enter Company Official Phone Number" minlength="10" maxlength="10" required @if(!empty('phone')) value="{{$phone->link}}" @endif></td>
                    <td>@if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)<input type="submit" value="Update" class="btn btn-primary">@endif</td>
                    </form>
                  </tr>
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
