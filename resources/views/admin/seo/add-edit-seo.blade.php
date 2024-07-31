@extends('admin.layout.layout')
@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<style>
  body {
      font-family: "Open Sans", sans-serif;
      font-size: 16px;
      line-height: 30px;
      margin: 0;
      background-color: #ffffff;
      font-weight: 300;
      color: #6a7695;
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
              <a href="/admin/seo" type="button" class="btn btn-primary">
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
                
                <form id="seoFormSubmit">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            @if(empty($seo['id']))
                              <label for="title">Select Page*</label>
                              <select class="form-control selectpicker" data-show-subtext="false" data-live-search="true" name="page_url" required>
                                <option value="" class="text-white">Select Page</option>
                                @foreach ($allpageurl as $page)
                                  @if($page['page_url'] != '')
                                    <option value="{{$page['page_url']}}" class="text-white">{{$page['page_url']}}</option>
                                  @endif
                                @endforeach
                              </select>
                              <input type="hidden" value="" id="seoID">
                            @else
                              <label for="title">Selected Page*</label>
                              <input type="text" class="form-control" name="page_url" value="{{$seo['page_url']}}" readonly>
                              <input type="hidden" value="{{$seo['id']}}" id="seoID">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pageTitle">Page Title*</label>
                            <input type="text" class="form-control" name="pageTitle" placeholder="Enter Page Title" required @if(!empty($seo['pageTitle'])) value="{{ $seo['pageTitle'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Enter Description">@if(!empty($seo['description'])) {{ $seo['description'] }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <textarea class="form-control" name="keywords" rows="4" placeholder="Enter Keywords">@if(!empty($seo['keywords'])) {{ $seo['keywords'] }} @endif</textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="canonicalUrl">Canonical Url</label>
                              <input type="link" class="form-control" name="canonicalUrl" placeholder="Enter Canonical Url"  @if(!empty($seo['canonicalUrl'])) value="{{ $seo['canonicalUrl'] }}" @endif>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="ogTitle">Og: Title</label>
                              <input type="text" class="form-control" name="ogTitle" placeholder="Enter Og Title" @if(!empty($seo['ogTitle'])) value="{{ $seo['ogTitle'] }}" @endif>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ogSitename">Og: Site Name</label>
                                    <input type="text" class="form-control" name="ogSitename" placeholder="Enter Og Sitename" @if(!empty($seo['ogSitename'])) value="{{ $seo['ogSitename'] }}" @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ogLocale">Og: Locale</label>
                                    <input type="text" class="form-control" name="ogLocale" placeholder="Enter Og Locale" @if(!empty($seo['ogLocale'])) value="{{ $seo['ogLocale'] }}" @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ogUrl">Og: Url</label>
                                    <input type="link" class="form-control" name="ogUrl" placeholder="Enter Og Url" @if(!empty($seo['ogUrl'])) value="{{ $seo['ogUrl'] }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="ogDescription">Og: Description</label>
                          <textarea class="form-control" name="ogDescription" rows="4" placeholder="Enter Og Description">@if(!empty($seo['ogDescription'])) {{ $seo['ogDescription'] }} @endif</textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="ogType">Og: Type</label>
                              <input type="text" class="form-control" name="ogType" placeholder="Enter Og Type"  @if(!empty($seo['ogType'])) value="{{ $seo['ogType'] }}" @endif>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="ogImage">Og: Image</label>
                              <input type="text" class="form-control" name="ogImage" placeholder="Enter Og Image" @if(!empty($seo['ogImage'])) value="{{ $seo['ogImage'] }}" @endif>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="twitterCard">Twitter: Card</label>
                              <input type="text" class="form-control" name="twitterCard" placeholder="Enter Twitter Card"  @if(!empty($seo['twitterCard'])) value="{{ $seo['twitterCard'] }}" @endif>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="twitterTitle">Twitter: Title</label>
                              <input type="text" class="form-control" name="twitterTitle" placeholder="Enter Twitter Title" @if(!empty($seo['twitterTitle'])) value="{{ $seo['twitterTitle'] }}" @endif>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="twitterDescription">Twitter: Description</label>
                              <textarea class="form-control" name="twitterDescription" placeholder="Enter Twitter Description">@if(!empty($seo['twitterDescription'])) {{ $seo['twitterDescription'] }} @endif</textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="twitterImage">Twitter: Image</label>
                              <input type="text" class="form-control" name="twitterImage" placeholder="Enter Twitter Image" @if(!empty($seo['twitterImage'])) value="{{ $seo['twitterImage'] }}" @endif>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="organization">Organization</label>
                          <textarea class="form-control" name="organization" rows="4" placeholder="Enter Organization">@if(!empty($seo['organization'])) {{ $seo['organization'] }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="schema">Schema</label>
                            <textarea class="form-control" name="schema" rows="4" placeholder="Enter Schema">@if(!empty($seo['schema'])) {{ $seo['schema'] }} @endif</textarea>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

@endsection

