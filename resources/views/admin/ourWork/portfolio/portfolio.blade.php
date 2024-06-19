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
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">Our Work</a></li>
              <li class="breadcrumb-item active">Portfolio</li>
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
                  <h3 class="card-title">Portfolio</h3>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a style="max-width: 150px; float: right;" href="{{ url('admin/add-edit-portfolio') }}" class="btn btn-block btn-primary mt-2">Add Portfolio</a>
                  @endif
                  {{-- <a style="max-width: 200px; float: right;" href="{{ url('admin/portfolio-subcategory') }}" class="btn btn-block btn-primary m-2">Portfolio Sub Category</a>
                  <a style="max-width: 200px; float: right;" href="{{ url('admin/portfolio-category') }}" class="btn btn-block btn-primary">Portfolio Category</a> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="portfolio" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Linked Page</th>
                      <th>Linked Site</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                        @foreach($portfolio as $row)
                    <tr>
                      <td>{{ $i++; }}</td>
                      <td>{{ $row['title'] }}</td>
                      <td>
                        @foreach ($allInnerPages as $page)
                            @if($page['id'] == $row['page_id']) {{ $page['page_name'] }} @endif
                        @endforeach
                      </td>
                      <td><a href="{{ $row['website_link'] }}" target="_blank">View</a></td>
                      <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                      <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                      <td>
                        @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                          @if ($row['status']==1)
                            <a class="updatePortfolioStatus" id="portfolio-{{ $row['id'] }}" portfolio_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                          @else
                            <a class="updatePortfolioStatus" id="portfolio-{{ $row['id'] }}" portfolio_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                          @endif
                          &nbsp;&nbsp;
                        @endif
                        @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                          <a href="{{ url('admin/add-edit-portfolio/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                          &nbsp;&nbsp;
                        @endif
                        {{-- @if ($pagesModule['full_access']==1)
                          <a class="confirmDelete" name="Portfolio" title="Delete Portfolio" href="javascript:void(0)" record="portfolio" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                        @endif --}}
                      </td>
                    </tr>
                        @endforeach
                    </tfoot>
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
