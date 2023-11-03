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
            <h1 class="m-0">Tech2Globe All Layouts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Tech2globe All Layouts</li>
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
                  <h3 class="card-title">Tech2Globe All Layouts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="allPages" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Menu</th>
                        <th>Sub Menu</th>
                        <th>Page Name</th>
                        <th>View Page</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                          @foreach($allPages as $row)
                            <tr>
                              <td>{{ $i++; }}</td>
                              <td>
                                @foreach ($mainMenu as $item)
                                    @if($item['id'] == $row['category_id']) {{ $item['categoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>
                                @foreach ($subMenu as $item)
                                    @if($item['id'] == $row['sub_category_id']) {{ $item['subCategoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>{{$row['page_name']}}</td>
                              <td>@if(!empty($row['page_url']))<a target="blank" href="http://localhost:8000/{{ $row['page_url'] }}">View Page</a>@endif</td>
                              <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                              <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                              <td>
                      
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  <a href="{{ url('admin/tech2globe-layout/add-edit-sub-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                  &nbsp;&nbsp;
                                @endif
                                
                              </td>
                            </tr>
                          @endforeach
                      </tfoot>
                    </table>
                  </div>
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
