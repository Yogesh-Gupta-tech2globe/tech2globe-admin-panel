@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                 <!-- form start -->
                 @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                
                <form @if(empty($subMenu['id'])) action="{{ url('admin/tech2globe-layout/add-edit-sub-menu') }}" @else action="{{ url('admin/tech2globe-layout/add-edit-sub-menu/'.$subMenu['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                      <label>Main Menu*</label>
                      <select class="form-control" style="width: 100%;" name="category_id" required>
                          <option value="">Select Category</option>

                          @foreach ($mainMenu as $row)
                            <option value="{{ $row['id'] }}" @if($row['id'] == $subMenu['category_id']) selected @endif>{{ $row['categoryName'] }}</option>
                          @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="subCategoryName">Sub Menu Name*</label>
                        <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" placeholder="Enter Sub Menu Name" required @if(!empty($subMenu['subCategoryName'])) value="{{ $subMenu['subCategoryName'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="page_url">Page link*</label>
                        <input type="url" class="form-control" id="page_url" name="page_url" placeholder="Enter Page Link" @if(!empty($subMenu['page_url'])) value="{{ $subMenu['page_url'] }}" @endif>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
