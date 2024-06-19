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
            <h1 class="m-0">Tech2Globe Mobile Header</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">Header & Footer</a></li>
              <li class="breadcrumb-item active">Mobile Header</li>
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
                        About
                    </h4>
                  </a>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                    <a href="{{ url('admin/tech2globe-layout/add-edit-main-menu') }}" class="d-inline-block w-25 border-0 btn btn-primary">Add Menu</a>
                  @endif
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="mainMenu" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Menu</th>
                          <th>View Page</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                            @foreach($mainMenu as $row)
                              <tr>
                                <td>{{ $i++; }}</td>
                                <td>{{ $row['categoryName'] }}</td>
                                <td>@if(!empty($row['page_url']))<a target="blank" href="/{{ $row['page_url'] }}">View Page</a>@endif</td>
                                <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                                <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                                <td>
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    @if ($row['status']==1)
                                      <a class="updateMainMenuStatus" id="mainMenu-{{ $row['id'] }}" mainMenu_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                    @else
                                      <a class="updateMainMenuStatus" id="mainMenu-{{ $row['id'] }}" mainMenu_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                    @endif
                                    &nbsp;&nbsp;
                                  @endif
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    <a href="{{ url('admin/tech2globe-layout/add-edit-main-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                  @endif
                                  {{-- @if ($pagesModule['full_access']==1)
                                    <a class="confirmDelete" name="MainMenu" title="Delete Main Menu" href="javascript:void(0)" record="mainMenu" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                                  @endif --}}
                                </td>
                              </tr>
                            @endforeach
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseTwo">
                  <h4 class="card-title">
                      Services
                  </h4>
                </a>
                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a href="{{ url('admin/tech2globe-layout/add-edit-sub-menu') }}" class="d-inline-block w-25 border-0 btn btn-primary">Add Sub Menu</a>
                @endif
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="subMenu" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Sub Menu</th>
                        <th>Main Menu</th>
                        <th>View Page</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                          @foreach($subMenu as $row)
                            <tr>
                              <td>{{ $i++; }}</td>
                              <td>{{ $row['subCategoryName'] }}</td>
                              <td>
                                @foreach ($mainMenu as $item)
                                    @if($item['id'] == $row['category_id']) {{ $item['categoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>@if(!empty($row['page_url']))<a target="blank" href="/{{ $row['page_url'] }}">View Page</a>@endif</td>
                              <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                              <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                              <td>
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  @if ($row['status']==1)
                                    <a class="updateSubMenuStatus" id="subMenu-{{ $row['id'] }}" subMenu_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                  @else
                                    <a class="updateSubMenuStatus" id="subMenu-{{ $row['id'] }}" subMenu_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                  @endif
                                  &nbsp;&nbsp;
                                @endif
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  <a href="{{ url('admin/tech2globe-layout/add-edit-sub-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                  &nbsp;&nbsp;
                                @endif
                                {{-- @if ($pagesModule['full_access']==1)
                                  <a class="confirmDelete" name="subMenu" title="Delete Sub Menu" href="javascript:void(0)" record="subMenu" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                                @endif --}}
                              </td>
                            </tr>
                          @endforeach
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>     
          </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
