@extends('admin.layout.layout')
@section('content')

  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
  {{-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>

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

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                  <a style="max-width: 200px; float: right;" class="btn btn-block btn-primary mt-2 eventcategoryaddbtn" data-toggle="modal" data-target="#add-eventCategory">Add {{ $pagename }}</a>
                  @endif
                  <a style="max-width: 100px; float: right;" href="{{ url('admin/event') }}" class="btn btn-block btn-primary mt-2 mx-2">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="eventCategoryTable" class="table table-dark table-striped table-hover">
                    <thead>
                    <tr>
                      <th>Order No.</th>
                      <th>Category Name</th>
                      <th>Image</th>
                      <th style="display: none;">Order</th>
                      <th>Created At</th>
                      <th>Action</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                        @foreach($category as $row)
                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row['name'] }}</td>
                            <td><img src="{{ url('images/event/category/'.$row['image']) }}" width="50px" height="50px"></td>
                            <td style="display: none;">{{ $row['id'] }}</td>
                            <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                            <td>
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                @if ($row['status']==1)
                                    <a class="updateEventCatStatus" id="eventCat-{{ $row['id'] }}" eventCat_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                @else
                                    <a class="updateEventCatStatus" id="eventCat-{{ $row['id'] }}" eventCat_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                @endif
                                &nbsp;&nbsp;
                                @endif
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                <a href="" class="eventcategoryeditbtn" data-toggle="modal" data-target="#add-eventCategory" data-name="{{ $row['name'] }}" data-id="{{ $row['id'] }}" data-image="{{ $row['image'] }}"><i class="fas fa-edit"></i></a>
                                &nbsp;&nbsp;
                                @endif
                            </td>
                            <td class="dragRow" style="cursor: move;"><i class="fas fa-arrows-alt"></i></td>
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

  <div class="modal fade" id="add-eventCategory">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form id="add-eventCategory-form" action="add-edit-eventCategory" method="post" enctype="multipart/form-data">@csrf
            <div class="modal-header">
                <h4 class="modal-title">Add/Edit {{$pagename}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Event Category Name" required>
              </div>
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" accept="image/*" name="image" id="image" required>
                  <ul>
                    <li>Image Size should not be greater than 100KB</li>
                  </ul>
              </div>
              <div id="eventPreviousImage"></div>
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
