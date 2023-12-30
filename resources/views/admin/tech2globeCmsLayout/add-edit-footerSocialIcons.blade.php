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
                
                <form @if(empty($footerPages['id'])) action="{{ url('admin/tech2globe-layout/add-edit-footer-socialicons') }}" @else action="{{ url('admin/tech2globe-layout/add-edit-footer-socialicons/'.$footerPages['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                      <label>Choose Social Platform*</label>
                      <select class="form-control" style="width: 100%;" name="pageName" required>
                        <option value="">Select Category</option>
                        <option value="facebook" @if($footerPages['sub_category_name'] == 'facebook') selected @endif>Facebook</option>
                        <option value="linkdin" @if($footerPages['sub_category_name'] == 'linkdin') selected @endif>Linkdin</option>
                        <option value="instagram" @if($footerPages['sub_category_name'] == 'instagram') selected @endif>Instagram</option>
                        <option value="youtube" @if($footerPages['sub_category_name'] == 'youtube') selected @endif>Youtube</option>
                        <option value="twitter" @if($footerPages['sub_category_name'] == 'twitter') selected @endif>Twitter</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="pageLink">Social Media Redirection link*</label>
                        <input type="url" name="pageLink" class="form-control" placeholder="Enter social link" required @if(!empty($footerPages['page_link'])) value="{{$footerPages['page_link']}}" @endif>
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
