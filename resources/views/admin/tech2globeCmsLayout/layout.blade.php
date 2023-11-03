@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tech2Globe Layout</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Tech2Globe Layout</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-success">
          <div class="card-body">
            <div class="row">

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo2.png') }}" alt="Home Page">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 1</h3>
                    <p class="card-text text-white pb-2 pt-1">Home Page</p>
                    <a href="http://localhost:8000/" target="blank" class="btn btn-light">View Theme</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                      Create Home Page
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo3.jpg') }}" alt="About Us Page">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 2</h3>
                    <p class="card-text text-white pb-2 pt-1">About Us Page</p>
                    <a href="http://localhost:8000/about-us" target="blank" class="btn btn-light">View Theme</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                      Create About Us Page
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo4.jpg') }}" alt="Service Page">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 3</h3>
                    <p class="card-text text-white pb-2 pt-1">Services Page</p>
                    <a href="https://newsite.tech2globe.co.in/landing_page/amazon-dropshipping" target="blank" class="btn btn-light">View Theme</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#theme3modal">
                      Create Services Page
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo1.png') }}" alt="Technologies Page">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 4</h3>
                    <p class="card-text text-white pb-2 pt-1">Technologies Page</p>
                    <a href="" target="blank" class="btn btn-light">View Theme</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                      Create Technologies Page
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo1.png') }}" alt="Contact Page">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 5</h3>
                    <p class="card-text text-white pb-2 pt-1">Contact Page</p>
                    <a href="" target="blank" class="btn btn-light">View Theme</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                      Create Contact Page
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Create Home Page</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <!-- form start -->
                <form action="{{ url('admin/landing-pages') }}" method="post" enctype="multipart/form-data">@csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="page_name">Page Name*</label>
                      <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Enter Page Name" required>
                    </div>
                    <div class="form-group">
                      <label for="page_url">Page URL*</label>
                      <input type="text" class="form-control" id="page_url" name="page_url" value="" placeholder="Enter Page Name First" required>
                      <span id="urlVerify"></span>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description">
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords">
                    </div> 
                    <div class="form-group">
                        <label for="favicon_icon">Favicon Icon*</label>
                        <input type="file" class="form-control" name="favicon_icon" id="favicon_icon" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo*</label>
                        <input type="file" class="form-control" name="logo" id="logo" required>
                    </div>                
                  </div>
                  <!-- /.card-body -->
  
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="theme3modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Create Service Page</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <!-- form start -->
                <form action="{{ url('admin/create-service-theme') }}" method="post" enctype="multipart/form-data">@csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Select Main Menu*</label>
                      <select class="form-control categoryId" name="category_id" required>
                          <option value="">Select Main Menu</option>

                          @foreach ($mainMenu as $row)
                            <option value="{{ $row['id'] }}">{{ $row['categoryName'] }}</option>
                          @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Select Sub Menu*</label>
                      <select class="form-control subCategoryId" name="subCategory_id" required>
                          <option value="">Select Sub Menu</option>
                        
                      </select>
                    </div>
                    <input type="hidden" name="themeId" value="3" required>
                    <div class="form-group">
                      <label for="page_name">Page Name*</label>
                      <input type="text" class="form-control pageName" name="page_name" placeholder="Enter Page Name" required>
                    </div>
                    <div class="form-group">
                      <label for="page_url">Page URL*</label>
                      <input type="text" class="form-control pageUrl" name="page_url" value="" placeholder="Enter Page Name First" required>
                      <span class="urlVerify"></span>
                    </div>                
                  </div>
                  <!-- /.card-body -->
  
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
