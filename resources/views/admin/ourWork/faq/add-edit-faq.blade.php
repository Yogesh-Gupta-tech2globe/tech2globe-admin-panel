@extends('admin.layout.layout')
@section('content')

<style>
  .qa-item {
    position: relative;
    margin-bottom: 20px;
  }

  .qa-item button.close-btn {
      background-color: #fff;
      border-radius: 50%;
      height: 25px;
      width: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      right: 0;
      bottom: 5px;
  }

  .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
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
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
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
                
                <form @if(empty($faq['id'])) action="{{ url('admin/add-edit-faq') }}" @else action="{{ url('admin/add-edit-faq/'.$faq['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label>Select Page*</label>
                          <select class="form-control" style="width: 100%;" name="page_id" required>
                              <option value="">Select Inner Page</option>
                                @foreach ($allInnerPages as $row)
                                  <option value="{{ $row['id'] }}" @if($row['id'] == $faq['page_id']) selected @endif>{{ $row['page_name'] }}</option>
                                @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="question">Q1. Question*</label>
                          <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter Question" required @if(!empty($faq['question'])) value="{{ $faq['question'] }}" @endif>
                      </div>
                      <div class="form-group">
                          <label for="answer">A1. Answer*</label>
                          <textarea class="form-control" name="answer[]" id="answer" placeholder="Enter Answer" required>@if(!empty($faq['answer'])) {{ $faq['answer'] }} @endif</textarea>
                      </div>
                      @if(empty($faq['id']))
                      <div id="showQA"></div>
                      <button type="button" class="btn btn-warning" id="addQA">Add Q/A</button>
                      @endif
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
