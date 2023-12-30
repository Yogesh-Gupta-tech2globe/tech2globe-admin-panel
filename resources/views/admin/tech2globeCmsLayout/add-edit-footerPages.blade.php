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
                
                <form @if(empty($footerPages['id'])) action="{{ url('admin/tech2globe-layout/add-edit-footer-pages') }}" @else action="{{ url('admin/tech2globe-layout/add-edit-footer-pages/'.$footerPages['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                      <label>Choose Category*</label>
                      <select class="form-control" style="width: 100%;" name="category_id" required>
                          <option value="">Select Category</option>

                          @foreach ($footerCategory as $row)
                            <option value="{{ $row['id'] }}" @if($row['id'] == $footerPages['category_id']) selected @endif>{{ $row['category_name'] }}</option>
                          @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="pageName">Page Name*</label>
                        <input type="text" class="form-control" name="pageName" placeholder="Enter Page Name" required @if(!empty($footerPages['sub_category_name'])) value="{{ $footerPages['sub_category_name'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="pageLink">Page link*</label>
                        <select class="form-control" style="width: 100%;" name="pageLink" required>
                          <option value="">Select Page For Linked</option>

                          @foreach ($allPagesData as $row)
                                        
                          @if(!empty($row->categoryName1) && !empty($row->pageUrl1))<option value="{{$row->pageUrl1}}" @if(!empty($row) && !empty($row->pageUrl1) && !empty($footerPages['page_link'])) @if($row->pageUrl1 === $footerPages['page_link']) selected @endif @endif>Main Menu / {{$row->categoryName1}}</option> @endif
                          @if(!empty($row->categoryName2) && !empty($row->pageUrl2))<option value="{{$row->pageUrl2}}" @if(!empty($row) && !empty($row->pageUrl2) && !empty($footerPages['page_link'])) @if($row->pageUrl2 === $footerPages['page_link']) selected @endif @endif>Sub Menu / {{$row->categoryName2}}</option>@endif
                          @if(!empty($row->pageName) && !empty($row->pageUrl))<option value="{{$row->pageUrl}}" @if(!empty($row) && !empty($row->pageUrl) && !empty($footerPages['page_link'])) @if($row->pageUrl === $footerPages['page_link']) selected @endif @endif>Inner Pages / {{$row->pageName}}</option>@endif
                          
                          @endforeach
                        
                        </select>
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
