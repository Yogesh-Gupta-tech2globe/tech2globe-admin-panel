@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
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
            <h1 class="m-0">{{ $pagename }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">Our Work</a></li>
              <li class="breadcrumb-item active">{{ $pagename }}</li>
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
                  <h3 class="card-title">{{ $pagename }}</h3>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a style="max-width: 150px; float: right;" href="" class="btn btn-block btn-primary mt-2" data-toggle="modal" data-target="#add-casestudy">Add {{ $pagename }}</a>
                  @endif
                  <a style="max-width: 150px; float: right;" href="{{ url('admin/case-study-category') }}" class="btn btn-block btn-primary mt-2 mx-2">Category</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="portfolio" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>View</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                        @foreach($casestudy as $row)
                            <tr>
                              <td>{{ $i++; }}</td>
                              <td>{{ $row['name'] }}</td>
                              <td>
                                @foreach ($category as $cat)
                                  @if ($cat['id'] == $row['category_id']) {{$cat['name']}} @endif
                                @endforeach
                              </td>
                              <td><a href="/casestudy/{{ Str::slug($row['name']) }}" target="_blank">View</a></td>
                              <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                              <td>
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  @if ($row['status']==1)
                                      <a class="updateFaqStatus" id="faq-{{ $row['id'] }}" faq_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                  @else
                                      <a class="updateFaqStatus" id="faq-{{ $row['id'] }}" faq_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                  @endif
                                  &nbsp;&nbsp;
                                  @endif
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  <a href="{{ url('admin/add-edit-case-study/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
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

  <div class="modal fade" id="add-casestudy">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form action="create-case-study-section" method="post" enctype="multipart/form-data">@csrf
            <div class="modal-header">
                <h4 class="modal-title">Add {{$pagename}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Category</label>
                <select class="form-control" name="catid" required>
                  <option value="">Select Case Study Category</option>
                  @foreach ($category as $row)
                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="name">Case Study Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Case Study Name" required>
              </div>
              <div class="form-group">
                  <label for="bannerImage">Banner Image</label>
                  <input type="file" class="form-control" name="bannerImage" id="bannerImage" required>
              </div>
              <input type="hidden" name="section" value="1">   
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@endsection
