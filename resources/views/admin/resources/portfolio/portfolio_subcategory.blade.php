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
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="">Resources</a></li>
              <li class="breadcrumb-item active">Portfolio Sub Category</li>
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
                  <h3 class="card-title">Portfolio Sub Category</h3>
                  <a style="max-width: 80px; float: right;" href="/admin/resources/portfolio" class="btn btn-block btn-primary mt-2 mx-2">Back</a>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a style="max-width: 250px; float: right;" href="" class="btn btn-block btn-primary mt-2" id="portfoliosubcategoryaddbtn" data-toggle="modal" data-target="#add-sub-category">Add Portfolio Sub Category</a>
                  @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="portfolio" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category</th>
                      <th>Name</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                        @foreach($portfolioSubCat as $row)
                    <tr>
                      <td>{{ $i++; }}</td>
                      <td>
                        @foreach ($portfolioCat as $category)
                            @if($category['id'] == $row['cat_id']) {{ $category['name'] }} @endif
                        @endforeach
                      </td>
                      <td>{{ $row['name'] }}</td>
                      <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                      <td>
                        @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                          @if ($row['status']==1)
                            <a class="updatePortfolioSubCatStatus" id="portfolio-subcat-{{ $row['id'] }}" portfolio_subcat_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                          @else
                            <a class="updatePortfolioSubCatStatus" id="portfolio-subcat-{{ $row['id'] }}" portfolio_subcat_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                          @endif
                          &nbsp;&nbsp;
                        @endif
                        @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                          <a href="" class="portfoliosubcategoryeditbtn" data-toggle="modal" data-target="#add-sub-category" data-catid="{{$row['cat_id']}}" data-name="{{ $row['name'] }}" data-id="{{ $row['id'] }}"><i class="fas fa-edit"></i></a>
                          &nbsp;&nbsp;
                        @endif
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


  <div class="modal fade" id="add-sub-category">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <form id="add-subcategory-form" action="add-edit-portfolio-subcategory" method="post">@csrf
        <div class="modal-header">
          <h4 class="modal-title">Add/Edit Portfolio Sub Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="subcategoryName">Select Category</label>
                <select class="form-control" name="cat_id" required id="portfoliocatid">
                    <option value="">Select Category</option>
                    @foreach ($portfolioCat as $category)
                        <option value="{{$category['id']}}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="categoryName">Sub Category Name</label>
                <input type="text" name="name" id="subcategoryName" class="form-control" required>
            </div>
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
