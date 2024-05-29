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
                
                <form @if(empty($mainMenu['id'])) action="{{ url('admin/tech2globe-layout/add-edit-main-menu') }}" @else action="{{ url('admin/tech2globe-layout/add-edit-main-menu/'.$mainMenu['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="categoryName">Main Menu Name*</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Main Menu Name" required @if(!empty($mainMenu['categoryName'])) value="{{ $mainMenu['categoryName'] }}" @endif>
                        <input type="hidden" name="customRadio" value="">
                    </div>

                    <div class="form-group">
                      <label>Choose way of Page link :</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" value="1" name="customRadio" @if($mainMenu['type'] == "1") checked @endif>
                        <label for="customRadio1" class="custom-control-label">Want to create new url</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" value="0" name="customRadio" @if($mainMenu['type'] == "0") checked @endif>
                        <label for="customRadio2" class="custom-control-label">Want to use existing url</label>
                      </div>
                    </div>

                    <div id="create_new_url">
                      <div class="form-group">
                        <label>Select File to link*</label>
                        <select class="form-control" style="width: 100%;" name="file_id" id="linkfile">
                            <option value="">Select File</option>

                            @foreach ($fileData as $row)
                              <option value="{{ $row['id'] }}" @if($row['id'] == $mainMenu['file_id']) selected @endif>{{ $row['file_name'] }} (ID : F{{$row['id']}})</option>
                            @endforeach
                          
                        </select>
                      </div>

                      <div class="form-group" id="pagelinkfield">
                        <label for="page_url">Page link*</label>
                        <input type="text" class="form-control pageUrl" id="page_url" name="page_url" placeholder="Enter Page Link" @if(!empty($mainMenu['page_url'])) value="{{ $mainMenu['page_url'] }}" @endif>
                        <span class="urlVerify"></span>
                      </div>
                    </div>

                    <div class="form-group" id="use_existing_url">
                      <label>Select Url to link*</label>
                      <select class="form-control" style="width: 100%;" name="page_url2" id="selectedPageUrl">
                          <option value="">Select Url</option>

                          @foreach ($allpageurl as $row)
                            @if(!empty($row->file_id))
                            <option value="{{ $row->page_url }},{{$row->file_id}}" @if($row->page_url == $mainMenu['page_url']) selected @endif>{{ $row->page_url }} | (Attached File ID : F{{$row->file_id}})</option>
                            @endif
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
