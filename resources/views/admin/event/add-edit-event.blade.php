@extends('admin.layout.layout')
@section('content')
<style>
  .cmsevents .card-img{height:150px !important;}
  .cmsevents img {
    object-fit: cover;
    object-position: top;
}
</style>
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
              <a href="/admin/event" type="button" class="btn btn-primary">
                Back
              </a>
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
                
                <form id="eventForm" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="title">Event Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Portfolio Title" required @if(!empty($event['title'])) value="{{ $event['title'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label>Category*</label>
                        <select class="form-control" style="width: 100%;" name="category_id" required id="portcat">
                            <option value="">Select Category</option>
                            @foreach ($category as $row)
                              <option value="{{ $row['id'] }}" @if($row['id'] == $event['category_id']) selected @endif>{{ $row['name'] }}</option>
                            @endforeach
                          
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year*</label>
                        <select class="form-control" name="year" required>
                            <option>Select Year</option>
                            @for ($i=2014; $i<=date('Y'); $i++)
                                <option value="{{$i}}" @if($i == $event['year']) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Upload Cover Image*</label>
                        <input type="file" class="form-control" name="cover_image" @if(empty($event['id'])) required @endif accept="image/*">
                        <ul>
                         <li>Image Size should not be greater than 100KB</li>
                        </ul>
                        @if (!empty($event['cover_image']))
                            <label>Previous Image</label><br>
                            <img src="{{ url('images/event/coverImage/'.$event['cover_image']) }}" height="100px" width="180px">
                            <input type="hidden" name="old_cover_image" value="{{ $event['cover_image'] }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Images*</label>
                        <div class="input-group">
                          <input type="file" class="form-control" name="image[]" @if(empty($event['image'])) required @endif multiple accept="image/*">
                        </div>
                        <ul>
                          <li>Each Image Size should not be greater than 100KB</li>
                        </ul>
                        @if (!empty($event['image']))
                          <label>Previous Image</label><br>
                          @php $allImages = explode(',',$event['image']); @endphp
                          <div class="row cmsevents">
                          @for ($i=0; $i<count($allImages); $i++)
                            
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-6 mb-4">
                              <div class="card">
                                <div class="card-img w-100 object-fit-cover">
                                  <img src="{{ url('images/event/allImage/'.$allImages[$i]) }}" class="w-100 h-100">
                                </div>
                                <button type="button" class="btn btn-danger mt-2 text-center eventImageDeleteBtn" data-id="{{$event['id']}}" data-imgnum="{{$i}}"><i class="fas fa-times-circle"></i> Delete</button>
                              </div>
                            </div>
                            
                          @endfor
                        </div>
                          <input type="hidden" name="current_image" value="{{ $event['image'] }}">
                        @endif
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <input type="hidden" value="{{$event['id']}}" id="eventID">
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
