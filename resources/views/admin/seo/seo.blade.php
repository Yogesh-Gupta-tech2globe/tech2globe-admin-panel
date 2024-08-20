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
            <h1 class="m-0">{{$pagename}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">{{$pagename}}</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="row">
          <div class="col-12" id="accordion">
            
            <div class="card card-primary card-outline"> 
                <div class="card-header d-flex justify-content-between">
                  <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseOne">
                    <h4 class="card-title">
                        Manage Pages {{$pagename}}
                    </h4>
                  </a>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                    <a href="{{ url('admin/add-edit-seo') }}" class="d-inline-block border-0 btn btn-primary" style="width: 150px;">Add Page {{$pagename}}</a>
                  @endif
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="mainMenu" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Page Url</th>
                          <th>Page Title</th>
                          <th>View Page</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($seo as $row)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row['page_url'] }}</td>
                                <td>{{ $row['pageTitle'] }}</td>
                                <td>@if(!empty($row['page_url']))<a target="blank" href="{{ url($row['page_url']) }}">View Page</a>@endif</td>
                                <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                                <td>
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    @if ($row['status']==1)
                                      <a class="updateSeoPageStatus" id="seoPage-{{ $row['id'] }}" seoPage_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                    @else
                                      <a class="updateSeoPageStatus" id="seoPage-{{ $row['id'] }}" seoPage_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                    @endif
                                    &nbsp;&nbsp;
                                  @endif
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    <a href="{{ url('admin/add-edit-seo/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div> 
            
          </div>

          <div class="col-md-12">
            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0">
                  <h4 class="card-title">
                      Manage SEO Content same in all Pages
                  </h4>
                </a>
              </div>
              <form action="{{ url('admin/seo-update-static') }}" method="POST">@csrf
                <div class="card-body">
                  <table border width="100%">
                    <tr>
                      <td>msvalidate.01</td>
                      <td><input type="text" class="form-control" name="msvalidate" @if(!empty($seoStatic['msvalidate'])) value="{{$seoStatic['msvalidate']}}" @endif></td>
                    </tr>
                    <tr>
                      <td>Google Site Verification</td>
                      <td><input type="text" class="form-control" name="google-site-verification" @if(!empty($seoStatic['google_site_verification'])) value="{{$seoStatic['google_site_verification']}}" @endif></td>
                    </tr>
                    <tr>
                      <td>Google Analytics Tracking Code</td>
                      <td><textarea class="form-control" rows="10" name="google-tracking-code">@if(!empty($seoStatic['google_tracking_code'])) {{$seoStatic['google_tracking_code']}} @endif</textarea></td>
                    </tr>
                    <tr>
                      <td>Geo Region</td>
                      <td><input type="text" class="form-control" name="geo_region" @if(!empty($seoStatic['geo_region'])) value="{{$seoStatic['geo_region']}}" @endif></td>
                    </tr>
                    <tr>
                      <td>Geo Place name</td>
                      <td><input type="text" class="form-control" name="geo_placename" @if(!empty($seoStatic['geo_placename'])) value="{{$seoStatic['geo_placename']}}" @endif></td>
                    </tr>
                    <tr>
                      <td>Geo Position</td>
                      <td><input type="text" class="form-control" name="geo_position" @if(!empty($seoStatic['geo_position'])) value="{{$seoStatic['geo_position']}}" @endif></td>
                    </tr>
                    <tr>
                      <td>ICBM</td>
                      <td><input type="text" class="form-control" name="icbm" @if(!empty($seoStatic['icbm'])) value="{{$seoStatic['icbm']}}" @endif></td>
                    </tr>
                  </table>
                </div>
                <div class="card-footer">
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <button class="btn btn-primary">Update</button>
                  @endif
                </div>
              </form>
            </div> 
          </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
